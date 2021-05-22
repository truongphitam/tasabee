@if($stated)
    <section id="stated">
        <div class="container hidden-xs">
            @foreach($stated as $i => $item)
                <div class="item-stated">
                    <div class="row">
                        <div class="col-md-8 wow fadeInLeft">
                            <div class="text-stated" role="button" data-toggle="modal"
                                data-target="#modal_stated_{!! $i !!}">
                                {!! $item->expert !!}
                            </div>
                            <div class="info-stated" role="button" data-toggle="modal"
                                data-target="#modal_stated_{!! $i !!}">
                                <div class="img">
                                    <img src="{!! $item->avatar !!}" width="100" alt="{!! $item->title !!}" />
                                </div>
                                <div class="title">
                                    {!! $item->title !!}<br>
                                    {!! $item->sub_title !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="img-stated wow fadeInRight">
                                <div class="child">
                                    <img src="{!! $item->image !!}" width="250" alt="{!! $item->title !!}" />
                                </div>
                            </div>
                        </div>
                        <div class="divider"></div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="container visible-xs">
            <div id="slick_stated">
                @foreach($stated as $item)
                    <div class="item-stated">
                        <div class="text-stated">
                            {!! $item->expert !!}
                        </div>
                        <div class="info-stated">
                            <div class="img">
                                <img src="{!! $item->avatar !!}" width="100" alt="{!! $item->title !!}" />
                            </div>
                            <div class="title">
                                {!! $item->title !!}<br>
                                {!! $item->sub_title !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @foreach($stated as $i => $item)
        <div class="modal fade" id="modal_stated_{!! $i !!}" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">{!! $item->title !!}</h4>
                    </div>
                    <div class="modal-body">
                        <img src="{!! $item->image !!}" class="img-responsive" alt="{!! $item->title !!}" />
                        <hr />
                        {!! $item->description !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
@endif