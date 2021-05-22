<div class="row">
    <div class="col-md-9">
        <div class="form-group">
            {!! Form::hidden('id', $post->id) !!}
            @include('partials.lang_input', ['type' => 'text', 'model' => 'post', 'attr' => 'title', 'title' => trans('admin.field.title'), 'required' => 'required'])
        </div>
        <div class="form-group">
            <label>{!! trans('admin.field.slug') !!}</label>
            {{ Form::text('slug', '', ['class'=>'form-control','id' => 'slug', 'placeholder' => '']) }}
        </div>
        <div class="form-group">
            @include('partials.lang_input', ['type' => 'textarea', 'model' => 'post','class' => 'form-control', 'attr' => 'expert', 'title' => trans('admin.field.expert')])
        </div>
        <div class="form-group">
            @include('partials.lang_input', ['type' => 'textarea', 'model' => 'post','class' => 'form-control ckeditor', 'attr' => 'description', 'title' => trans('admin.field.description')])
        </div>
        @include('partials.seo')
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label>{!! trans('admin.field.price') !!}</label>
            {{ Form::number('price', $post->id ? $post->price : 0, ['class'=>'form-control','id' => 'price', 'placeholder' => '']) }}
        </div>
        <div class="form-group">
            <label>{!! trans('admin.field.status') !!}</label>
            <select class="form-control" name="is_published">
                <option value="on">{!! trans('admin.field.publish') !!}</option>
                <option value="">{!! trans('admin.field.hide') !!}</option>
            </select>
        </div>
        <div class="form-group">
            <hr>
            <label>{!! trans('admin.field.categories') !!}</label>
            <div class="box-body chat" id="chat-box">
                <?php
                categories(0, '', $categories, 'products');
                ?>
            </div>
        </div>
        <div class="form-group">
            <hr>
            <label>{!! trans('admin.field.gallery') !!}</label>
            <div class="row">
                <div class="col-md-12">
                    <button type="button" class="btn btn-info" onclick="addMoreGallery()">
                        <i class="fa fa-fw fa-plus"></i>
                    </button>
                </div>
            </div>
            <div class="row" id="list_gallery">
                @if($post->gallery && !$post->gallery->isEmpty())
                    @foreach ($post->gallery as $key => $item)
                        <div class="col-md-6 item_gallery m-t-10" id="item_gallery_{{ $key }}">
                            <div class="form-group">
                                <img src="{{ $item->image }}" class="img-responsive" onclick="selectImage('image_{{ $key }}')" id="img_image_{{ $key }}">
                                <input type="hidden" name="gallery[]" value="{{ $item->image }}" id="input_image_{{ $key }}">
                                <button onclick="deleteItemGallary('{{ $key }}')" type="button" class="btn btn-danger btn-xs btn-delete-gallery">
                                    <i class="fa fa-fw fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="form-group">
            <hr>
            <label>{!! trans('admin.field.image') !!}</label>
            <img src="{{ $post->id ? $post->image : '/assets/admin/1200x630.png' }}" class="img-responsive" onclick="selectImage('image')"
                id="img_image">
            <input type="hidden" name="image" value="{{ $post->id ? $post->image : '/assets/admin/1200x630.png' }}" id="input_image"/>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-block btn-success btn-sm">
                {!! isset($post) ? trans('admin.button.update') : trans('admin.button.save') !!}
            </button>
        </div>
    </div>
</div>