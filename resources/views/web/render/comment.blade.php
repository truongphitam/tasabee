<div class="clearfix">
    <p>
        <strong>{{ $comment['name'] }}</strong>
        <br />
        <small class="c_363636">
            <i class="fa fa-calendar"></i> {{ date('d/m/Y') }}
        </small>
    </p>
    {!! $comment['content'] !!}
</div> 