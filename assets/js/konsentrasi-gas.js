var chart;
function requestData() {
    setInterval(
        function () {
            $.ajax({
                url: 'function/konsentrasi-gas.php',
                success: function(point) {
                    var series = chart.series[0],
                        shift = series.data.length > 20; // shift if the series is 
                    chart.series[0].addPoint(point, true, shift);
                },
                //cache: false
            });
        }, 5000);
}
$(document).ready(function() {
    chart = new Highcharts.Chart({
        chart: {
            renderTo: 'test',
            defaultSeriesType: 'spline',
            events: {
                load: requestData
            }
        },
        tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                        //Highcharts.dateFormat('%Y-%m-%d %H:%M:%S', this.x) + '<br/>' +
                        Highcharts.numberFormat(this.y, 2) + ' ppm';
                }
        },
        title: {
            text: 'KONSENTRASI GAS'
        },
        xAxis: {
            type: 'datetime',
            tickPixelInterval: 150,
            maxZoom: 20 * 1000
        },
        yAxis: {
            minPadding: 0.2,
            maxPadding: 0.2,
            title: {
                text: 'Part per million (ppm)',
                margin: 20
            }
        },
        series: [{
            name: 'Konsentrasi Gas',
            data: []
        }]
    });        
});
