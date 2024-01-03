<div class="small-slider_container py-3">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 col-12">
                @if (!empty($newSmallSliderTitle))
                    <h2 class="text-uppercase text-white">{{ $newSmallSliderTitle }}</h2>    
                @else
                    <h2 class="text-uppercase text-white">{{ $smallSliderTitle }}</h2>
                @endif

                @if (!empty($newSmallSliderDescription))
                    <p class="text-white small-slider-description">
                        {!! $newSmallSliderDescription !!}
                    </p>
                @endif
                
            </div>
            <div class="col-md-6 col-12 d-none d-md-block">
                <div class="d-flex justify-content-center align-items-center">
                    <img width="370" height="180"
                        src="https://wonkidsclub.net/imgs/sliders/wonkidsclub_logo_slider.png" alt="">
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container my-3">
    @include('vendor.breadcumb.default')
</div>