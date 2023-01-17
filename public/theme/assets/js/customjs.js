$(document).ready(function() {
    // dashboard_chart_1
    var element = document.getElementById("dashboard_chart_1");

    var height = parseInt(KTUtil.css(element, "height"));
    var labelColor = KTUtil.getCssVariableValue("--bs-gray-500");
    var borderColor = KTUtil.getCssVariableValue("--bs-gray-200");
    var primaryColor = KTUtil.getCssVariableValue("--bs-primary");
    var secondaryColor = KTUtil.getCssVariableValue("--bs-gray-400");
    var warningColor = KTUtil.getCssVariableValue("--bs-warning");
    var infoColor = KTUtil.getCssVariableValue("--bs-info");
    var successColor = KTUtil.getCssVariableValue("--bs-success");

    if (!element) {
        return;
    }

    var options = {
        series: [{
                name: "# Of Phone Calls",
                data: ["76", "85", "101", "58", "76", "85", "101", "98", "57", "56", "61", "58"],
            },
            {
                name: "# Of Live Conversations",
                data: [44, 55, 57, 56, 61, 58, 56, 85, 101, 98, 87, 105],
            },
            {
                name: "# Of Voicemails",
                data: [44, 55, 57, 56, 21, 58, 66, 85, 101, 56, 61, 58],
            },
            {
                name: "# Of Emails",
                data: [44, 55, 57, 56, 41, 58, 96, 85, 101, 98, 87, 105],
            },
            {
                name: "# Of Meetings",
                data: [44, 55, 57, 56, 31, 58, 86, 56, 61, 58, 87, 105],
            },
        ],
        chart: {
            fontFamily: "inherit",
            type: "bar",
            height: height,
            toolbar: {
                show: false,
            },
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: ["75%"],
                endingShape: "rounded",
                borderRadius: 5,
            },
        },
        legend: {
            // show: false
        },
        dataLabels: {
            enabled: false,
        },
        stroke: {
            show: true,
            width: 1,
            // colors: ['transparent']
        },
        xaxis: {
            categories: [
                "Jan",
                "Feb",
                "Mar",
                "Apr",
                "May",
                "Jun",
                "Jul",
                "Aug",
                "Sep",
                "Oct",
                "Nov",
                "Dec",
            ],
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false,
            },
            labels: {
                style: {
                    colors: labelColor,
                    fontSize: "12px",
                },
            },
        },
        yaxis: {
            labels: {
                style: {
                    colors: labelColor,
                    fontSize: "12px",
                },
            },
        },
        fill: {
            opacity: 0.6,
        },
        states: {
            normal: {
                filter: {
                    type: "none",
                    value: 0,
                },
            },
            hover: {
                filter: {
                    type: "none",
                    value: 0,
                },
            },
            active: {
                allowMultipleDataPointsSelection: false,
                filter: {
                    type: "none",
                    value: 0,
                },
            },
        },
        tooltip: {
            style: {
                fontSize: "12px",
            },
            y: {
                formatter: function(val) {
                    return "$" + val + " thousands";
                },
            },
        },
        colors: [
            primaryColor,
            secondaryColor,
            warningColor,
            infoColor,
            successColor,
        ],
        grid: {
            borderColor: borderColor,
            strokeDashArray: 4,
            yaxis: {
                lines: {
                    show: true,
                },
            },
        },
    };

    var chart = new ApexCharts(element, options);
    chart.render();

    // dashboard_chart_2
    var KTChartsWidget17 = {
        init: function() {
            !(function() {
                if ("undefined" != typeof am5) {
                    var e = document.getElementById("dashboard_chart_2");
                    e &&
                        am5.ready(function() {
                            var t = am5.Root.new(e);
                            t.setThemes([am5themes_Animated.new(t)]);
                            var a = t.container.children
                                .push(
                                    am5percent.PieChart.new(t, {
                                        startAngle: 180,
                                        endAngle: 360,
                                        layout: t.verticalLayout,
                                        innerRadius: am5.percent(50),
                                    })
                                )
                                .series.push(
                                    am5percent.PieSeries.new(t, {
                                        startAngle: 180,
                                        endAngle: 360,
                                        valueField: "value",
                                        categoryField: "category",
                                        alignLabels: !1,
                                    })
                                );
                            a.labels.template.setAll({
                                    fontWeight: "400",
                                    fontSize: 13,
                                    fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
                                }),
                                a.states.create("hidden", { startAngle: 180, endAngle: 180 }),
                                a.slices.template.setAll({ cornerRadius: 5 }),
                                a.ticks.template.setAll({ forceHidden: !0 }),
                                a.data.setAll([{
                                        value: 1,
                                        category: "Notes",
                                        fill: am5.color(KTUtil.getCssVariableValue("--bs-primary")),
                                    },
                                    {
                                        value: 2,
                                        category: "Tasks",
                                        fill: am5.color(KTUtil.getCssVariableValue("--bs-success")),
                                    },
                                ]),
                                a.appear(1e3, 100);
                        });
                }
            })();
        },
    };
    "undefined" != typeof module && (module.exports = KTChartsWidget17),
        KTUtil.onDOMContentLoaded(function() {
            KTChartsWidget17.init();
        });
});