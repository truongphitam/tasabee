<section id="news_home">
    <div class="container">
        <div class="news-home">
            <h4 class="title">
                {!! trans('web.field.achievements') !!}
            </h4>
            @if($achievements)
                <div class="row">
                    @foreach ($achievements as $i => $achievement)
                        <div class="col-md-4 col-xs-12">
                            <div class="item-news-home wow fadeInUp" role="button" data-toggle="modal" data-target="#modal_achievements_{!! $i !!}">
                                <img src="{!! $achievement->image !!}" class="img-responsive" alt="{!! $achievement->title !!}"/>
                                <div class="expert">
                                    {!! $achievement->title !!}
                                </div>
                            </div>
                            <div class="modal fade" id="modal_achievements_{!! $i !!}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">{!! $achievement->title !!}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{!! $achievement->image !!}" class="img-responsive" alt="{!! $achievement->title !!}"/>
                                            <hr/>
                                            {!! $achievement->description !!}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-readmore pull-right"
                                                data-dismiss="modal">{!! trans('web.field.exit') !!}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @endforeach
                </div>
            @endif
            <div class="clear-fix text-center">
                <a href="{!! route('achievements') !!}" class="btn btn-default btn-readmore">{!! trans('web.field.readmore') !!}</a>
            </div>
        </div>
        <div class="news-home">
            <h4 class="title">
                {!! trans('web.field.posts') !!}
            </h4>
            @if($posts)
                <div class="row">
                    @foreach ($posts as $i => $post)
                        <div class="col-md-4 col-xs-12">
                            <div class="item-news-home wow fadeInDown" role="button" data-toggle="modal" data-target="#modal_news_{!! $i !!}">
                                <img src="{!! $post->image !!}" class="img-responsive b-r-20" alt="{!! $post->title !!}"/>
                                <div class="expert">
                                    {!! $post->title !!}
                                </div>
                            </div>
                            <div class="modal fade" id="modal_news_{!! $i !!}" style="display: none;">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span></button>
                                            <h4 class="modal-title">{!! $post->title !!}</h4>
                                        </div>
                                        <div class="modal-body">
                                            <img src="{!! $post->image !!}" class="img-responsive" alt="{!! $post->title !!}"/>
                                            <hr/>
                                            {!! $post->description !!}
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default btn-readmore pull-right"
                                                data-dismiss="modal">{!! trans('web.field.exit') !!}</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    @endforeach
                </div>
            @endif
            <div class="clear-fix text-center">
                <a href="{!! route('news') !!}" class="btn btn-default btn-readmore">{!! trans('web.field.readmore') !!}</a>
            </div>
        </div>
    </div>
</section>