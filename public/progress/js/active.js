jQuery(document).ready(function($) {
    var progress = $('#progress').data('progress');
    console.log(progress);
    for (var i = 0; i < progress.length; i++){
        var number1 = progress[i]['progress'].slice(0, 1);
        var number2 = progress[i]['progress'].slice(2, 3);
        var value = (number1 / number2);
        var valuePercent = (number1 / number2) * 100;
        var usertopic_id = progress[i]['usertopic_id'];
        $('#cirlc-'+usertopic_id).circleProgress({
          value: value,
          size: 200,
          thickness:10,
          fill: '#FFA100',

        });
        $('#inner'+usertopic_id).html(Math.round(valuePercent) + '<i>%</i>');
    }
});
