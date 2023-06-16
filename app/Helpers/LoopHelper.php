<?php
namespace App\Helpers;

use App\Models\Category;

class LoopHelper {
    public static function dataTree($data, $parent_id = 0, $level = 0) {
        $result = [];
        foreach ($data as $item) {
            if($item['parent_id'] == $parent_id) {
                $item['level'] = $level;
                $result[] = $item;
                $child = LoopHelper::dataTree($data, $item['id'], $level + 1);
                $result = array_merge($result, $child);
            }
        }
        return $result;
    }

    public static function buildHTML($data, $listClass, $itemClass, $linkClass, $parent_id = 0) {
        $html = "<ul class='$listClass'>";
        foreach ($data as $item) {
            $route = route('posts.index')."?category=".$item['id'];
            if ($item['parent_id'] == $parent_id) {
                $html .= "<li class='$itemClass'><a class='$linkClass' href='$route'>" . $item['name'] . "</a>";
                $html .= LoopHelper::buildHTML($data, $listClass, $itemClass, $linkClass, $item['id']);
                $html .= "</li>";
            }
        }
        $html .= "</ul>";
        return $html;
    }

    public static function getIdArrayByData($data, $state = 'parent') {
        $result = [];
        if($state === 'parent') {
            while($data != null) {
                $result[] = $data->parent_id;
                $data = Category::find($data->parent_id);
            }
            return array_reverse($result);
        }

        else if($state === 'child') {
            $childs = LoopHelper::dataTree($data, request()->input('category'));
            foreach ($childs as $child) {
                if($child['level'] == 0)
                    $result[] = $child['id'];
            }
            return $result;
        }
        else return null;
    }

    private static function buildFlatHTML($ids, $listClass, $itemClass, $linkClass, $state = 'parent') {
        $result = '';
        $locale = app()->getLocale();
        $data = [];

        if($state === 'parent') {
            foreach ($ids as $id) {
                $data = Category::where('parent_id', $id)->get();
                $result .= "<ul class='$listClass'>";
                foreach ($data as $item) {
                    $name = $item->languages()->where('locale', $locale)->first()->pivot->name;
                    $route = route('posts.index')."?category=".$item['id'];
                    $result .= "<li class='$itemClass'><a class='$linkClass' href='$route'>" . $name . "</a>";
                    $result .= "</li>";
                }
                $result .= "</ul>";

            }
            return $result;
        }

        else if ($state === 'child') {
            $childData = [];
            $result .= "<ul class='$listClass'>";
            foreach($ids as $id)
                $childData[] = Category::find($id);
            foreach ($childData as $key => $item) {
                $childData[$key] = [
                    'name' => $item->languages()->where('locale', $locale)->first()->pivot->name,
                    'id' => $item->id,
                ];
            }

            foreach ($childData as $item) {
                $route = route('posts.index')."?category=".$item['id'];
                $result .= "<li class='$itemClass'><a class='$linkClass' href='$route'>" . $item['name'] . "</a>";
                $result .= "</li>";
            }
            $result .= "</ul>";
            return $result;
        }
        else return null;

    }

    public static function buildCategorySubListHTML($data, $listClass, $itemClass, $linkClass) {
        
        $parentIds = LoopHelper::getIdArrayByData($data);
        $data = Category::all();
        $childIds = LoopHelper::getIdArrayByData($data->toArray(), 'child');
        
        $html = LoopHelper::buildFlatHTML($parentIds, $listClass, $itemClass, $linkClass);
        $html .= LoopHelper::buildFlatHTML($childIds, $listClass, $itemClass, $linkClass, 'child');

        return $html;
    }

    public static function hasChild($id, $data) {
        foreach($data as $item)
            if($id == $item['parent_id'])
                return true;
        return false;
    }

    public static function buildSideNavHTML($data, $listClass, $itemClass, $linkClass, $parent_id = 0) {
        $html = "<ul class='$listClass'>";
        foreach ($data as $item) {
            $route = route('posts.index')."?category=".$item['id'];
            if ($item['parent_id'] == $parent_id) {
                if(LoopHelper::hasChild($item['id'], $data)) {
                    $html .= "<li class='$itemClass'><span class='d-flex justify-content-between'><a class='$linkClass' href='$route'>" . $item['name'] . "</a><button class='side-nav-submenu-open-btn'>
                                                    <i class='fa-solid fa-plus side-nav-icon'></i>
                                                    </button></span>";
                }
                else {
                    $html .= "<li class='$itemClass'><span class='d-flex justify-content-between'><a class='$linkClass' href='$route'>" . $item['name'] . "</a></span>";
                }
                $html .= LoopHelper::buildHTML($data, $listClass, $itemClass, $linkClass, $item['id']);
                $html .= "</li>";
            }
        }
        $html .= "</ul>";
        return $html;
    }

    public static function buildHeaderHTML($categories) {
        $oneLevelCategories = [];
        foreach (LoopHelper::dataTree($categories) as $category) {
            if($category['level'] >= 1) {
                if($category['level'] == 1)
                    $category['parent_id'] = 0;
                $oneLevelCategories[] = $category;
            }
        }
        return $oneLevelCategories;
    }

    public static function filterCategory($categories) {

        $categoriesArr = [];

        foreach($categories as $category) {
            $temp = [];
            $temp['id'] = $category->id;
            $temp['name'] = $category->pivot->name;
            $temp['parent_id'] = $category->parent_id;
            $categoriesArr[] = $temp;
        }

        return $categoriesArr;
    }
}