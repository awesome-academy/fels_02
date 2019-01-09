$(document).ready(function(){
    var date_input=$('input[name="birthday"]'); //our date input has the name "date"
    var container=$('.bootstrap-iso form').length>0 ? $('.bootstrap-iso form').parent() : "body";
    date_input.datepicker({
        format: 'yyyy-mm-dd',
        container: container,
        todayHighlight: true,
        autoclose: true,
    })
});

$('#btn_del').on('click', function (e) {
    if (confirm($(this).data('confirm'))) {
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
            alert('có lỗi xảy ra');
        }
    });
}
