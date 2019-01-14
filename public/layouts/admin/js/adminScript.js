$(document).ready(function(){
    var date_input=$('input[name="birthday"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
        endDate: '+0d'
    })

});

function del_lesson($lesson_id){
    if (confirm(Lang.get('adminMess.del_confirm'))) {
        $("#form-lesson").attr("action", ['adminlesson/'+$lesson_id])
        $("#form-lesson").submit();

        return true;
    }
    else {

        return false;
    }
};

function del_word($word_id){
    if (confirm(Lang.get('adminMess.del_confirm'))) {
        $("#form-word").attr("action", ['adminword/'+$word_id])
        $("#form-word").submit();

        return true;
    }
    else {

        return false;
    }
};

function ajaxToggleActiveStatus(id, presentStatus){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
    });
    $.ajax({
        url: "/user/update-status",
        type: 'POST',
        cache: false,
        data: {id:id, presentStatus:presentStatus},
        success: function(data){
        },
        error: function (){
            alert(Lang.get('auth.errors'));
        }
    });
}
$(document).ready(function () {
    $('#exampleModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var lessonid = button.data('lessonid');
        var lessonname = button.data('lessonname');
        var preview = button.data('preview');
        var picture = button.data('picture');
        var topicid = button.data('topicid');
        var modal = $(this);
        modal.find('.modal-body #lesson_id').val(lessonid);
        modal.find('.modal-body #lesson_name').val(lessonname);
        modal.find('.modal-body #preview').val(preview);
        var stringPicture="images/lessons/" + picture;
        modal.find('.modal-body #xemtruoc').attr("src", stringPicture);
        modal.find('#form-edit-lesson').attr("action", ['adminlesson/'+lessonid]);
        modal.find('.modal-body #img-preview').attr("src", stringPicture);
        $("#topic_id option[value='" + topicid + "']").attr("selected", "selected");
    });
    $('#editWord').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var wordid = button.data('wordid');
        var wordname = button.data('wordname');
        var picture = button.data('picture');
        var sound = button.data('sound');
        var spell = button.data('spell');
        var translate = button.data('translate');
        var idlesson = button.data('idlesson');
        var filepath = button.data('path')+picture;
        var audiofilepath = button.data('audiopath')+sound;
        var modal = $(this);
        modal.find('.modal-body #word_id').val(wordid);
        modal.find('.modal-body #word_name').val(wordname);
        modal.find('.modal-body #spelling').val(spell);
        modal.find('.modal-body #translate').val(translate);
        modal.find('#word_form_edit').attr("action", ['adminword/'+wordid]);
        $("#lesson_id option[value='" + idlesson + "']").attr("selected", "selected");
        modal.find('.modal-body #img-preview').attr("src", filepath);
        modal.find('.modal-body #pre_audio').attr("src", audiofilepath);
    });

    function readURLPicTure(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#img-preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#picture").change(function() {
        readURLPicTure(this);
    });

});

jQuery(function(){
    jQuery('#btnDisplayNone').click();
});

document.getElementById("btnDisplayNone").onclick = function () {
    document.getElementById("chooseFile").style.display = 'none';
    $("#file-input").val("");
};

document.getElementById("btnDisplayBlock").onclick = function () {
    document.getElementById("chooseFile").style.display = 'block';
};
