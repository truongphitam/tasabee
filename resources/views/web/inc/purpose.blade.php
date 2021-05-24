@if($purpose)
<section id="purpose">
    <div class="container-fluid">
        <div class="row">
            @foreach ($purpose as $i => $item )
            <div class="col-md-4 {!! $i == 2 ? 'col-xs-12' : 'col-xs-6' !!} wow @if($i == 0) fadeInLeft @endif @if($i == 1) fadeInUp @endif @if($i == 2) fadeInRight @endif">
                <div class="row">
                    <div class="purpose" role="button" data-toggle="modal" data-target="#modal_purpose_{!! $i !!}">
                        <div class="img-purpose">
                            <img src="{!! $item->image !!}" class="img-responsive" alt="{!! $item->title !!}" />
                        </div>
                        <div class="text-purpose">
                            <div class="arrow-up"></div>
                            <h4>
                                <span>
                                    {!! $item->title !!}
                                </span>
                            </h4>
                            <div class="expert">
                                {!! $item->expert !!}
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="modal_purpose_{!! $i !!}" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">{!! $item->title !!}</h4>
                                </div>
                                <div class="modal-body">
                                    <img src="{!! $item->image !!}" class="img-responsive" alt="{!! $item->title !!}" />
                                    <hr/>
                                    {!! $item->description !!}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-right"
                                        data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif