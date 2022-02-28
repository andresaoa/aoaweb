<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('url_left') }}
            {{ Form::text('url_left', $banner->url_left, ['class' => 'form-control' . ($errors->has('url_left') ? ' is-invalid' : ''), 'placeholder' => 'Url Left']) }}
            {!! $errors->first('url_left', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('img_left') }}
            {{ Form::text('img_left', $banner->img_left, ['class' => 'form-control' . ($errors->has('img_left') ? ' is-invalid' : ''), 'placeholder' => 'Img Left']) }}
            {!! $errors->first('img_left', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('url_right') }}
            {{ Form::text('url_right', $banner->url_right, ['class' => 'form-control' . ($errors->has('url_right') ? ' is-invalid' : ''), 'placeholder' => 'Url Right']) }}
            {!! $errors->first('url_right', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('img_right') }}
            {{ Form::text('img_right', $banner->img_right, ['class' => 'form-control' . ($errors->has('img_right') ? ' is-invalid' : ''), 'placeholder' => 'Img Right']) }}
            {!! $errors->first('img_right', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>