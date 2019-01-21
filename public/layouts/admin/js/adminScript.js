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

$('.btn_del').on('click', function (e) {
    if (confirm($(this).data('confirm'))) {
        $('#delete-form').submit();
        return true;
    }
    else {
        return false;
    }
});

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
        modal.find('.modal-body #xemtruoc').attr("src", stringPicture);
        $("#topic_id option[value='" + topicid + "']").attr("selected", "selected");
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
