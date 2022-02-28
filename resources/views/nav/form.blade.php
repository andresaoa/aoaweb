<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{-- {{ Form::label('img_logo') }}
            {{ Form::file('img_logo', $nav->img_logo, ['class' => 'form-control' . ($errors->has('img_logo') ? ' is-invalid' : ''), 'placeholder' => 'Img Logo']) }}
            {!! $errors->first('img_logo', '<div class="invalid-feedback">:message</div>') !!} --}}
            <input type="file">
        </div>
        <div class="form-group">
            {{ Form::label('text_logo') }}
            {{ Form::text('text_logo', $nav->text_logo, ['class' => 'form-control' . ($errors->has('text_logo') ? ' is-invalid' : ''), 'placeholder' => 'Text Logo']) }}
            {!! $errors->first('text_logo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('item1') }}
            {{ Form::text('item1', $nav->item1, ['class' => 'form-control' . ($errors->has('item1') ? ' is-invalid' : ''), 'placeholder' => 'Item1']) }}
            {!! $errors->first('item1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('item2') }}
            {{ Form::text('item2', $nav->item2, ['class' => 'form-control' . ($errors->has('item2') ? ' is-invalid' : ''), 'placeholder' => 'Item2']) }}
            {!! $errors->first('item2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('item3') }}
            {{ Form::text('item3', $nav->item3, ['class' => 'form-control' . ($errors->has('item3') ? ' is-invalid' : ''), 'placeholder' => 'Item3']) }}
            {!! $errors->first('item3', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('item4') }}
            {{ Form::text('item4', $nav->item4, ['class' => 'form-control' . ($errors->has('item4') ? ' is-invalid' : ''), 'placeholder' => 'Item4']) }}
            {!! $errors->first('item4', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('dashboard') }}
            {{ Form::text('dashboard', $nav->dashboard, ['class' => 'form-control' . ($errors->has('dashboard') ? ' is-invalid' : ''), 'placeholder' => 'Dashboard']) }}
            {!! $errors->first('dashboard', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('profile') }}
            {{ Form::text('profile', $nav->profile, ['class' => 'form-control' . ($errors->has('profile') ? ' is-invalid' : ''), 'placeholder' => 'Profile']) }}
            {!! $errors->first('profile', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('login') }}
            {{ Form::text('login', $nav->login, ['class' => 'form-control' . ($errors->has('login') ? ' is-invalid' : ''), 'placeholder' => 'Login']) }}
            {!! $errors->first('login', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('register') }}
            {{ Form::text('register', $nav->register, ['class' => 'form-control' . ($errors->has('register') ? ' is-invalid' : ''), 'placeholder' => 'Register']) }}
            {!! $errors->first('register', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('logout') }}
            {{ Form::text('logout', $nav->logout, ['class' => 'form-control' . ($errors->has('logout') ? ' is-invalid' : ''), 'placeholder' => 'Logout']) }}
            {!! $errors->first('logout', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{-- {{ Form::label('color') }}
            {{ Form::text('color', $nav->color, ['class' => 'form-control' . ($errors->has('color') ? ' is-invalid' : ''), 'placeholder' => 'Color']) }}
            {!! $errors->first('color', '<div class="invalid-feedback">:message</div>') !!} --}}
            <input type="color">
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>