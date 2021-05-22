@php
    $length = 10;
    $id = 'input-' . str_shuffle(substr(str_repeat(md5(mt_rand()), 2 + $length / 32), 0, $length));
    $data = isset($$model) ? (isset($attr) ? (method_exists($$model, 'translate') ? $$model->translate($attr) : $$model->{$attr}) : (is_array($$model) ? $$model : [])) : [];
    if (isset($$model) && $$model instanceof App\Option) {
        $nameString = $$model->name;
    } else {
        $nameString = isset($attr) ? $attr : (isset($model) ? $model : '');
    }
    $rows = 7;
    if(isset($row))
        $rows = $row;
@endphp

@if (isset($title))
    <label class="multilingual active">{{ $title }}</label>
@endif
<ul class="lang-switch" role="tablist">
    @foreach($supported_locales as $localeCode => $properties)
        <li class="{{ $current_locale === $localeCode ? 'active' : '' }}" role="presentation">
            <a href="#{{ "{$id}-{$localeCode}" }}" role="tab" data-toggle="tab"
               data-tab-lang="{{ $localeCode }}">{{{ $properties['name'] }}}</a>
        </li>
    @endforeach
</ul>
<div class="tab-content">
    @foreach($supported_locales as $localeCode => $properties)
        <div class="tab-pane{{ $current_locale === $localeCode ? ' active' : '' }}" id="{{ "{$id}-{$localeCode}" }}">
            @if ($type === 'text')
                {{ Form::text("{$nameString}[{$localeCode}]", ($data ? array_get($data, $localeCode) : old("{$nameString}[{$localeCode}]")), ['class' => ('form-control' . (isset($class) ? " $class" : '')), 'data-lang' => $localeCode, 'placeholder' => '']) }}
            @elseif ($type === 'textarea')
                {{ Form::textarea("{$nameString}[{$localeCode}]", ($data ? array_get($data, $localeCode) : old("{$nameString}[{$localeCode}]")), ['class' => ('form-control' . (isset($class) ? " $class" : '')), 'data-lang' => $localeCode, 'placeholder' => '','rows'=> $rows]) }}
            @endif
        </div>
    @endforeach
</div>
