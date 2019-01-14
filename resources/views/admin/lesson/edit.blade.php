<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">@lang('adminMess.edit_lesson')</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::open(['method' => 'PUT', 'class' => 'form-horizontal', 'id' => 'form-edit-lesson', 'files' => true]) !!}
            <div class="modal-body">
                <div class="card-body card-block canduoi2">
                    <div class="row form-group">
                        <div class="col-12 col-md-9">
                            {!! Form::text('lesson_id', '', ['class' => 'form-control', 'id' => 'lesson_id', 'hidden' => true]) !!}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            {!! Form::label('lesson_name', trans('adminMess.lb_lesson_name'), ['class' => 'form-control-label']) !!}
                        </div>
                        <div class="col-12 col-md-9">
                            {!! Form::text('lesson_name', '', ['class' => 'form-control', 'placeholder' => trans('adminMess.placeholder_lsname'), 'id' => 'lesson_name']) !!}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            {!! Form::label('preview', trans('adminMess.lb_lesson_preview'), ['class' => 'form-control-label']) !!}
                        </div>
                        <div class="col-12 col-md-9">
                            {!! Form::textarea('preview', '', ['class' => 'form-control', 'placeholder' => trans('adminMess.textarea'), 'id' => 'preview']) !!}
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            {!! Form::label('topic_id', trans('adminMess.lb_topic'), ['class' => 'form-control-label']) !!}
                        </div>
                        <div class="col-12 col-md-9">
                            {!! Form::select('topic_id', $topic, null, ['class' => 'form-control', 'id' => 'topic_id']) !!}
                        </div>
                    </div>
                    <div class="row form-group canduoi">
                        <div class="col col-md-3">
                            {!! Form::label('picture', trans('adminMess.lb_lesson_picture'), ['class' => 'form-control-label']) !!}
                        </div>
                        <div class="col-12 col-md-9 ">
                            <img src="" id="xemtruoc" class="img-preview"/>
                            {!! Form::file('picture',['class' => 'form-control-file', 'id' => 'picture'])  !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="border rounded border-secondary btn btn-secondary" data-dismiss="modal">Đóng</button>
                {!! Form::submit(trans('adminMess.btn_save'), ['class' => 'border rounded border-secondary btn btn-secondary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
