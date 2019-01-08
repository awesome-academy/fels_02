<div class="row row-mar">
    <div class="col-md-6 col-mar">
        <label>@lang('auth.username'):</label>
    </div>
    <div class="col-md-6">
        {!! Form::text('username', Auth::user()->username, ['class' =>'form-control input-word', 'placeholder' => trans('auth.username'), 'required' => 'required', 'id' => 'username', 'pattern' => '^[a-z\d\.]{4,}$', 'title' => trans('messages.validation_js_username')]) !!}
    </div>
</div>
<div class="row row-mar">
    <div class="col-md-6 col-mar">
        <label>@lang('auth.fullname')</label>
    </div>
    <div class="col-md-6">
        {!! Form::text('fullname', Auth::user()->fullname, ['class' =>'form-control input-word', 'placeholder' => trans('auth.fullname'), 'required' => 'required', 'id' => 'fullname', 'pattern' => config('setting.patter_fullname'),  'title' => trans('messages.validation_js_fullname')]) !!}
    </div>
</div>
<div class="row row-mar">
    <div class="col-md-6 col-mar">
        <label>@lang('auth.birthday'):</label>
    </div>
    <div class="col-md-6">
        {!! Form::text('birthday', Auth::user()->date_of_birth, ['class' =>'form-control input-word', 'placeholder' => trans('auth.birthday'), 'required' => 'required', 'id' => 'birthday']) !!}
    </div>
</div>
<div class="row row-mar">
    <div class="col-md-6 col-mar">
        <label>@lang('auth.email'):</label>
    </div>
    <div class="col-md-6">
        {!! Form::text('email', Auth::user()->email, ['class' =>'form-control input-word', 'placeholder' => trans('auth.email'), 'required' => 'required', 'id' => 'email', 'pattern' => config('setting.patter_email'),  'title' => trans('messages.validation_js_email')]) !!}
    </div>
</div>
<div class="row row-mar">
    <div class="col-md-6 col-mar">
        <label>@lang('auth.phone'):</label>
    </div>
    <div class="col-md-6">
        {!! Form::text('phone', Auth::user()->phone, ['class' =>'form-control input-word', 'placeholder' => trans('auth.phone'), 'required' => 'required', 'id' => 'phone', 'pattern' => config('setting.patter_phone'), 'title' => trans('messages.validation_js_phone')]) !!}
    </div>
</div>
<div class="row row-mar">
    <div class="col-md-6 col-mar">
        <label>@lang('auth.address'):</label>
    </div>
    <div class="col-md-6">
        {!! Form::text('address', Auth::user()->address, ['class' =>'form-control input-word', 'placeholder' => trans('auth.address'), 'required' => 'required', 'id' => 'address', 'pattern' => config('setting.patter_address'), 'title' => trans('messages.validation_js_address')]) !!}
    </div>
</div>
<div class="row row-mar">
    <div class="col-md-6 col-mar">
        <label>@lang('auth.gender'):</label>
    </div>
    <div class="col-md-6">
       {!! Form::select('gender', [config('setting.male_set') => trans('messages.male'), config('setting.female_set') => trans('messages.female')], Auth::user()->gender,['class' =>'form-control input-word', 'required' => 'required']) !!}
    </div>
</div>
<div class="form-group save-button">
    {!! Form::submit(trans('messages.btn_save'), ['class' => 'btn btn-success save-input', 'id' => 'save_info']) !!}
</div>
