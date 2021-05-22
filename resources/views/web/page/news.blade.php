@extends('web.master')
@section('content')

<section id="first-post">
    <div class="container-fluid">
        @if($stick)
            <div class="row">
                <div class="col-md-6 col-xs-12 wow fadeInLeft">
                    <div class="img">
                        <img src="{!! $stick->image !!}"
                            class="img-responsive b-r-20" alt="{!! $stick->title !!}" />
                    </div>
                </div>
                <div class="col-md-6 col-xs-12 wow fadeInRight">
                    <div class="clear-fix">
                        <h4>
                            {!! $stick->title !!}
                        </h4>
                        <div class="clear-fix">
                            {!! $stick->expert !!}
                        </div>
                        <div class="clear-fix">
                            <a href="{!! get_link_detail_post($stick->post_type, $stick->slug) !!}" class="btn btn-default btn-readmore">
                                {!! trans('web.field.readmore') !!}
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
<section id="list-post">
    <div class="container-fluid">
        @if(isset($data))
            <div class="row">
                @foreach($data as $key => $item )
                    <div class="col-md-4 col-xs-12 item_news wow fadeInUp">
                        <a href="{!! get_link_detail_post($item->post_type, $item->slug) !!}" title="{!! $item->title !!}">
                            <div class="item-news-home">
                                <img src="{!! $item->image !!}"
                                    class="img-responsive b-r-20" alt="{!! $item->title !!}" />
                                <div class="expert">
                                    {!! $item->title !!}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @endif
        @if( $data->lastPage() > 1)
            <div class="clear-fix text-center paginate-news">
                <nav aria-label="">
                    <ul class="pagination">
                        @if($data->currentPage() > 1)
                            <li>
                                <a href="{!! $link !!}?page={!! $data->currentPage() - 1 !!}" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                </a>
                            </li>
                        @endif
                        @for($i=1 ; $i<= $data->lastPage(); $i++)
                            <li class="@if($data->currentPage() == $i) active @endif"><a href="{!! $link !!}?page={!! $i !!}">{!! $i !!}</a></li> 
                        @endfor
                        @if($data->currentPage() < $data->lastPage())
                            <li>
                                <a href="{!! $link !!}?page={!! $data->currentPage()+1 !!}" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </nav>
            </div>
        @endif
    </div>
</section>
@include('web.inc.sponsors')
@endsection
@section('css')

@endsection
@section('js')

@endsection