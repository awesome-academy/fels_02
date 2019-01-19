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

    anychart.onDocumentReady(function() {
        var data = $('#container').data('range');
        var chart = anychart.column();
        chart.animation(true);
        chart.title('Sum test lesson on month');
        var series = chart.column(data);
        series.tooltip().titleFormat('{%X}');
        series.tooltip()
        .position('center-top')
        .anchor('center-bottom')
        .offsetX(0)
        .offsetY(5)
        .format('{%Value}{groupsSeparator: }');
        chart.yScale().minimum(0);
        chart.yAxis().labels().format('{%Value}{groupsSeparator: }');
        chart.tooltip().positionMode('point');
        chart.interactivity().hoverMode('by-x');
        chart.xAxis().title('Date');
        chart.yAxis().title('Sum test');
        chart.container('container');
        chart.draw();
    });
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


