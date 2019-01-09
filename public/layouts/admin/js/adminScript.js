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

    $('#showmodal').click(function () {
        $('#myModal').modal();
    })

    $('#myModal').on('show.bs.modal', function (event) {
        var username = $('#showmodal').attr('data-username');
        var fullname = $('#showmodal').attr('data-fullname');
        var examname = $('#showmodal').attr('data-test');
        var dayend = $('#showmodal').attr('data-dayend');
        var sumanswer = $('#showmodal').attr('data-sumanswer');
        var status = ($('#showmodal').attr('data-status') == 1) ? "PASS":"FAIL";
        var modal = $(this);
        modal.find('.modal-body #fullname').text(username+' ( '+fullname+' )');
        modal.find('.modal-body #examname').text(examname);
        modal.find('.modal-body #day').text(dayend);
        modal.find('.modal-body #sumanswer').text(sumanswer);
        modal.find('.modal-body #status').text(status);
    });
});

$('.btn_del').on('click', function (e) {
    if (confirm($(this).data('confirm'))) 
    {
        return true;
    }
    else 
    {
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
