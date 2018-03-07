$(function () {

    $('#container2').highcharts({

        chart: {
            type: 'gauge',
            plotBackgroundColor: null,
            plotBackgroundImage: null,
            plotBorderWidth: 0,
            plotShadow: false
        },

        title: {
            text: 'Is Gas Dalam Tabung (Kg)'
        },

        pane: {
            startAngle: -150,
            endAngle: 150,
            background: [{
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#FFF'],
                        [1, '#333']
                    ]
                },
                borderWidth: 0,
                outerRadius: '109%'
            }, {
                backgroundColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1 },
                    stops: [
                        [0, '#333'],
                        [1, '#FFF']
                    ]
                },
                borderWidth: 1,
                outerRadius: '107%'
            }, {
                // default background
            }, {
                backgroundColor: '#DDD',
                borderWidth: 0,
                outerRadius: '105%',
                innerRadius: '103%'
            }]
        },

        // the value axis
        yAxis: {
            min: 0,
            max: 5,

            minorTickInterval: 'auto',
            minorTickWidth: 1,
            minorTickLength: 10,
            minorTickPosition: 'inside',
            minorTickColor: '#666',

            tickPixelInterval: 30,
            tickWidth: 2,
            tickPosition: 'inside',
            tickLength: 10,
            tickColor: '#666',
            labels: {
                step: 2,
                rotation: 'auto'
            },
            title: {
                text: 'Isi Gas (Kg)'
            },
            plotBands: [{
                from: 0,
                to: 1,
                color: '#DF5353' // green
            }, {
                from: 1,
                to: 2,
                color: '#DDDF0D' // yellow
            }, {
                from: 2,
                to: 5,
                color: '#55BF3B' // red
            }]
        },

        series: [{
            name: 'Isi Gas',
            data: [0],
            tooltip: {
                valueSuffix: ' Kg'
            }
        }]

    },
        // Add some life
        function (chart) {
            if (!chart.renderer.forExport) {
                setInterval(
                    function () {
                        $.ajax({
                            url         : "function/isi-gas.php",
                            type        : "GET",
                            data        : "",
                            success     : function(isigas){
                                var Number_isigas;
                                //karena nilai isigas adalah string
                                //mengubah menjadi Integer : Number(isigas)
                                Number_isigas = Number(isigas);
                                var point = chart.series[0].points[0];;
                                point.update(Number_isigas);
                            }
                        });
                    }, 100);
                
            }
        }
        );
});