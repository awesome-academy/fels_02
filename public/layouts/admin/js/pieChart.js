$(document).ready(function () {
    var gettest = $('#container').data('gettest');
    var grouptopic = $('#container').data('grouptopic');
    var sumPercent = 0;
    for (var i = 0; i < grouptopic.length; i++) {
        var sumPercent = sumPercent + grouptopic[i]['y'];
    }
    var lastPercent = grouptopic[grouptopic.length - 1]['y'] + (100 - sumPercent);
    var lastName = grouptopic[grouptopic.length - 1]['name'];
    var lastID = grouptopic[grouptopic.length - 1]['drilldown'];
    grouptopic.push({
        name: lastName,
        y: lastPercent,
        drilldown: lastID
    });
    data = JSON.stringify(grouptopic);
    var array = [];
    var count = 0;
    for (var i = 0; i < gettest.length; i++) {
        if (i != 0 && gettest[i]['name'] == gettest[i - 1]['name']) {
            count += 1;
            var key = i;
        }
    }
    var result = key - count;
    for (var i = 0; i < gettest.length; i++) {
        array[i] = {};
        if (i == 0) {
            var name = gettest[i]['name'];
            var id = gettest[i]['id'];
            var lesson_name = gettest[i]['lesson_name'];
            var percentTest = gettest[i]['percentTest'];
            array[i] = {};
            array[i].name = name;
            array[i].id = id;
            array[i].data = {};
            array[i].data = [lesson_name, percentTest];
        } else {
            if (gettest[i]['name'] != gettest[i - 1]['name']) {
                var name = gettest[i]['name'];
                var id = gettest[i]['id'];
                var lesson_name = gettest[i]['lesson_name'];
                var percentTest = gettest[i]['percentTest'];
                array[i] = {};
                array[i].name = name;
                array[i].id = id;
                array[i].data = Array();
                array[i].data.push([lesson_name, percentTest]);
            } else {
                var firstname = gettest[i - 1]['name'];
                var firstid = gettest[i - 1]['id'];
                var lesson_name = gettest[i]['lesson_name'];
                var percentTest = gettest[i]['percentTest'];

                array[result].data.push([lesson_name, percentTest]);

            }

        }

    }
    dataDetail = JSON.stringify(array);

    Highcharts.chart('container', {
        chart: {
            type: 'pie'
        },
        title: {
            text: 'Test Lesson of Topic in Month'
        },
        subtitle: {
            text: 'Click the slices to view detail'
        },
        plotOptions: {
            series: {
                dataLabels: {
                    enabled: true,
                    format: '{point.name}: {point.y:.1f}%'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        "series": [{
            "name": "Framgia E-learning",
            "colorByPoint": true,
            "data": JSON.parse(data)
        }],
        "drilldown": {
            "series": JSON.parse(dataDetail)
        }
    });
});
