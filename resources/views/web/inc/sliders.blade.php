<section id="home-banner" class="clearfix">
    <div id="home-slider">
        @if($sliders)
        @foreach ($sliders as $slider)
            <div>
                <div class="home-banner-item">
                    <img src="{{ $slider->image }}" class="img-responsive" alt="{{ $slider->title }}">
                    <div class="home-banner-box">
                        <div class="container">
                            <p>
                                <b>{{ $slider->title }}</b>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <img src="/assets/web/images/icon-calendar.png" height="20"> {{ $slider->event_date }}
                                </li>
                                <li class="list-inline-item">
                                    <img src="/assets/web/images/icon-location.png" height="20"> {{ $slider->address }}
                                </li>
                            </ul>
                            @if($slider->link)
                                <p class="center-xs">
                                    <a href="{{ $slider->link }}" class="btn btn-style-1 font-italic" title="{{ $slider->title }}">
                                        {{ trans('web.field.detail') }}
                                    </a>
                                </p>
                            @endif
                        </div>
                    </div>
                </div>
            </div> 
        @endforeach
        @endif
    </div>
</section>