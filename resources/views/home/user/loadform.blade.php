<div class="row row-mar">
    <div class="col-md-6 col-mar">
        <label>@lang('auth.username'):</label>
    </div>
    <div class="col-md-6">
        {!! Form::text('username', Auth::user()->username, ['class' =>'required form-control input-word', 'placeholder' => trans('auth.username')]) !!}
    </div>
</div>
<div class="row row-mar">
    <div class="col-md-6 col-mar">
        <label>@lang('auth.fullname')</label>
    </div>
    <div class="col-md-6">
        {!! Form::text('fullname', Auth::user()->fullname, ['class' =>'required form-control input-word', 'placeholder' => trans('auth.fullname')]) !!}
    </div>
</div>
<div class="row row-mar">
    <div class="col-md-6 col-mar">
        <label>@lang('auth.birthday'):</label>
    </div>
    <div class="col-md-6">
        {!! Form::text('birthday', Auth::user()->date_of_birth, ['class' =>'required form-control input-word', 'placeholder' => trans('auth.birthday')]) !!}
    </div>
</div>
<div class="row row-mar">
    <div class="col-md-6 col-mar">
        <label>@lang('auth.email'):</label>
    </div>
    <div class="col-md-6">
        {!! Form::text('email', Auth::user()->email, ['class' =>'required form-control input-word', 'placeholder' => trans('auth.email')]) !!}
    </div>
</div>
<div class="row row-mar">
    <div class="col-md-6 col-mar">
        <label>@lang('auth.phone'):</label>
    </div>
    <div class="col-md-6">
        {!! Form::text('phone', Auth::user()->phone, ['class' =>'required form-control input-word', 'placeholder' => trans('auth.phone')]) !!}
    </div>
</div>
<div class="row row-mar">
    <div class="col-md-6 col-mar">
        <label>@lang('auth.address'):</label>
    </div>
    <div class="col-md-6">
        {!! Form::text('address', Auth::user()->address, ['class' =>'required form-control input-word', 'placeholder' => trans('auth.address')]) !!}
    </div>
</div>
<div class="row row-mar">
    <div class="col-md-6 col-mar">
        <label>@lang('auth.gender'):</label>
    </div>
    <div class="col-md-6">
       {!! Form::select('gender', [config('setting.male_set') => trans('messages.male'), config('setting.female_set') => trans('messages.female')], Auth::user()->gender,['class' =>'required form-control input-word']) !!}
    </div>
</div>
<div class="form-group save-button">
    {!! Form::submit(trans('messages.btn_save'), ['class' => 'btn btn-success save-input']) !!}
</div>
