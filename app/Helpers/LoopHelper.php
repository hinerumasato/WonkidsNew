<?php
namespace App\Helpers;

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