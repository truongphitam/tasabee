{{-- @if(isset($sponsor))
<section id="sponsors">
    <div class="container">
        @foreach ($sponsor as $item)
            <div class="organizers">
                <h4 class="title text-center wow slideInLeft">
                    <span>{!! $item->title !!}</span>
                </h4>
                <div class="list-organizers d-flex">
                    @if($item->gallery)
                        @foreach ( json_decode($item->gallery) as $id => $allery)
                            <div class="item wow slideInRight" style="flex: 1 1 30%;">
                                <img src="{!! $allery !!}" class="img-responsive"/>
                            </div> 
                        @endforeach
                    @endif
                </div>
            </div> 
        @endforeach
    </div>
</section>
@endif --}}
@php 
    $link = link_sponsor();
@endphp
<section id="sponsors">
    <div class="container">
        <div class="organizers">
            <h4 class="title text-center wow slideInLeft">
                <span>Ban tổ chức</span>
            </h4>
            <div class="list-organizers list-0 d-flex">
                <div class="item wow slideInRight">
                    <a href="#">
                        <img src="/assets/web/sponsor/0_0.png" class="img-responsive"/>
                    </a>
                </div> 
                <div class="item wow slideInRight">
                    <a href="#">
                        <img src="/assets/web/sponsor/0_1.png" class="img-responsive"/>
                    </a>
                </div> 
            </div>
        </div> 
        <div class="organizers">
            <h4 class="title text-center wow slideInLeft">
                <span>Đơn vị đồng hành</span>
            </h4>
            <div class="list-organizers list-1 d-flex">
                @for($i = 1; $i< 4; $i++)
                    <div class="item wow slideInRight">
                        <a href="{!! $link[$i]!!} " target="_blank">
                            <img src="/assets/web/sponsor/{{$i}}.png" class="img-responsive"/>
                        </a>
                    </div> 
                @endfor
            </div> 
            <div class="list-organizers list-2 d-flex">
                @for($i = 4; $i< 9; $i++)
                    <div class="item wow slideInRight">
                        <a href="{!! $link[$i]!!} " target="_blank">
                            <img src="/assets/web/sponsor/{{$i}}.png" class="img-responsive"/>
                        </a>
                    </div> 
                @endfor
            </div> 
            <div class="list-organizers list-3 d-flex">
                @for($i = 9; $i< 17; $i++)
                    <div class="item wow slideInRight">
                        <a href="{!! $link[$i]!!} " target="_blank">
                            <img src="/assets/web/sponsor/{{$i}}.png" class="img-responsive"/>
                        </a>
                    </div> 
                @endfor
            </div> 
            <div class="list-organizers list-4 d-flex">
                @for($i = 17; $i< 26; $i++)
                    <div class="item wow slideInRight">
                        <a href="{!! $link[$i]!!} " target="_blank">
                            <img src="/assets/web/sponsor/{{$i}}.png" class="img-responsive"/>
                        </a>
                    </div> 
                @endfor
            </div> 
            <div class="list-organizers list-5 d-flex">
                <div class="item hidden-xs">
                    <img src="/assets/web/sponsor/blank.png" class="img-responsive"/>
                </div> 
                <div class="item hidden-xs">
                    <img src="/assets/web/sponsor/blank.png" class="img-responsive"/>
                </div> 
                @for($i = 26; $i< 32; $i++)
                    <div class="item wow slideInRight">
                        <a href="{!! $link[$i]!!} " target="_blank">
                            <img src="/assets/web/sponsor/{{$i}}.png" class="img-responsive"/>
                        </a>
                    </div> 
                @endfor
                <div class="item hidden-xs">
                    <img src="/assets/web/sponsor/blank.png" class="img-responsive"/>
                </div> 
                <div class="item hidden-xs">
                    <img src="/assets/web/sponsor/blank.png" class="img-responsive"/>
                </div> 
            </div> 
        </div> 
    </div>
</section>