<div class="slider">
    <div id="carouselExampleIndicators" class="carousel slide">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label=""></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                aria-label=""></button>
            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                aria-label=""></button>
        </div>
        <div class="carousel-inner">
            @if (count($sliders) == 0)
                <div class="carousel-item active">
                    <img data-src="{{ asset('imgs/sliders/slider1.jpg') }}" class="d-block w-100 slider_img"
                        alt="...">
                    <div class="slider_float_in">
                        <img src="{{ asset('imgs/sliders/wonkidsclub_logo_slider.png') }}" alt=""
                            class="slider_logo_img">
                        <p class="slider_float_in_content">{{ $description }}</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img data-src="{{ asset('imgs/sliders/slider2.jfif') }}" class="d-block w-100 slider_img"
                        alt="...">
                    <div class="slider_float_in">
                        <img src="{{ asset('imgs/sliders/wonkidsclub_logo_slider.png') }}" alt=""
                            class="slider_logo_img">
                        <p class="slider_float_in_content">{{ $description }}</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img data-src="{{ asset('imgs/sliders/slider3.jfif') }}" class="d-block w-100 slider_img"
                        alt="...">
                    <div class="slider_float_in">
                        <img src="{{ asset('imgs/sliders/wonkidsclub_logo_slider.png') }}" alt=""
                            class="slider_logo_img">
                        <p class="slider_float_in_content">{{ $description }}</p>
                    </div>
                </div>
            @else
                <div class="carousel-item active">
                    <img data-src="{{ $sliders[0]->links }}" class="d-block w-100 slider_img"
                        alt="...">
                    <div class="slider_float_in">
                        <img src="{{ asset('imgs/sliders/wonkidsclub_logo_slider.png') }}" alt=""
                            class="slider_logo_img">
                        <p class="slider_float_in_content">{{ $description }}</p>
                    </div>
                </div>

                @foreach ($sliders as $index => $slider)
                    @if ($index > 0)
                        <div class="carousel-item">
                            <img data-src="{{ $slider->links }}" class="d-block w-100 slider_img"
                                alt="...">
                            <div class="slider_float_in">
                                <img src="{{ asset('imgs/sliders/wonkidsclub_logo_slider.png') }}" alt=""
                                    class="slider_logo_img">
                                <p class="slider_float_in_content">{{ $description }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
                
            @endif

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>
