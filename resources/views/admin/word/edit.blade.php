<div class="modal fade" id="editWord" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('adminMess.title_edit_word')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'word_form_edit', 'files' => true]) !!}
            <div class="modal-body">
                <div class="card-body card-block">
                    <div class="row form-group">
                        <div class="col-12 col-md-9">
                            {!! Form::text('word_id', '', ['class' => 'form-control', 'id' => 'word_id', 'hidden' => true]) !!}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            {!! Form::label('word_name', trans('adminMess.lb_word_name'), ['class' => 'form-control-label', 'id' => 'word_name_label']) !!}
                        </div>
                        <div class="col-12 col-md-9">
                            {!! Form::text('word_name', '', ['class' => 'form-control', 'id' => 'word_name']) !!}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            {!! Form::label('spelling', trans('adminMess.lb_word_spell'), ['class' => 'form-control-label', 'id' => 'spelling_label']) !!}
                        </div>
                        <div class="col-12 col-md-9">
                            {!! Form::text('spelling', '', ['class' => 'form-control', 'id' => 'spelling']) !!}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            {!! Form::label('translate', trans('adminMess.lb_word_translate'), ['class' => 'form-control-label', 'id' => 'translate_label']) !!}
                        </div>
                        <div class="col-12 col-md-9">
                            {!! Form::text('translate', '', ['class' => 'form-control', 'id' => 'translate']) !!}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            {!! Form::label('lesson_id', trans('adminMess.lb_lesson_name'), ['class' => 'form-control-label', 'id' => 'lessonid_label']) !!}
                        </div>
                        <div class="col-12 col-md-9">
                            {!! Form::select('lesson_id', $lesson, null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                    <div class="row form-group ">
                        <div class="col col-md-3">
                            {!! Form::label('picture', trans('adminMess.lb_word_picture'), ['class' => 'form-control-label', 'id' => 'picture_label']) !!}
                        </div>
                        <div class="col-12 col-md-9">
                            <img class="img-preview" id="img-preview"/>
                            {!! Form::file('picture', ['class' => 'form-control-file', 'id' => 'picture'])  !!}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            {!! Form::label('sound', trans('adminMess.lb_word_sound'), ['class' => 'form-control-label', 'sound' => 'picture_label']) !!}
                        </div>
                        <div class="col-12 col-md-9">
                            {!! Form::file('sound', ['class' => 'form-control-file', 'id' => 'sound'])  !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="border rounded border-secondary btn btn-secondary" data-dismiss="modal">@lang('adminMess.btn_close')</button>
                {!! Form::submit(trans('adminMess.btn_save'), ['class' => 'btn btn-primary btn-sm']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
