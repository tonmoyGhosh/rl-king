"use strict";
// On document ready

        // =================================================================================================================================================
        // begain::API Links
        // =================================================================================================================================================

var chart_url_1 = '/api/dashboard-history-api-call'
var chart_url_2 = '/api/dashboard-call-sms-api'
var chart_url_3 = '/api/dashboard-outbound-receive-not-receive-total-api'
var chart_url_6 = '/api/dashboard-outbound-sent-api'
var chart_url_7 = '/api/dashboard-outbound-receive-api'
var chart_url_8 = '/api/dashboard-inbound-sent-api'
var chart_url_9 = '/api/dashboard-outbound-receive-content-api'
var chart_url_10 = '/api/dashboard-call-receive-hourly-api'
var chart_url_11 = '/api/dashboard-outbound-student-receive-api'
var chart_url_12 = '/api/filter-option'
var chart_url_13 = '/api/request-monthly-summary-report-infography-generator'

        // =================================================================================================================================================
        // end::API Links
        // =================================================================================================================================================

        // =================================================================================================================================================
        // begain::get screenshot function
        // =================================================================================================================================================

function screenShot(ids, doms) {

    document.querySelector(ids).addEventListener('click', function() {
        var elem8 = document.querySelector(doms);
        domtoimage.toPng(elem8, { quality: 0.95 })
            .then(function(dataUrl) {
                var link = document.createElement('a');
                link.download = `Data_Chart_Screenshot`;
                link.href = dataUrl;
                link.click();
            })
       
    });

}
        // =================================================================================================================================================
        // end::get screenshot function
        // =================================================================================================================================================

        // =================================================================================================================================================
        // begain::sum of array Data
        // =================================================================================================================================================
function totalCount(id, Dataarray) {
    id.map((e, i) => {
        document.querySelector(id[i]).innerHTML = Dataarray[i].reduce((p, c) => p + c, 0)
    })
}
        // =================================================================================================================================================
        // end::sum of array Data
        // =================================================================================================================================================





if (document.querySelector("#dashboard-data")) {

    
        // =================================================================================================================================================
        // begain::current month 
 // begain::current month 
        // begain::current month 
        // =================================================================================================================================================
 const month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
 var thisMonthinbound = document.querySelector('.this_month_inbound');
 var thisMonth = document.querySelector('.this_month');
 var dashboard = document.querySelector('#dashboard');

 const d = new Date();
 let year = d.getFullYear();
 thisMonthinbound.innerHTML = `For The Month of ${month[d.getMonth()]}`;
 thisMonth.innerHTML = `For The Month of ${month[d.getMonth()]}`;
 dashboard.innerHTML = `Dashboard (${month[d.getMonth()]} ${d.getFullYear()})`;
        // =================================================================================================================================================
            // end::current month 
 // end::current month 
            // end::current month 
        // =================================================================================================================================================

        // =================================================================================================================================================
            // begain::get screenshot function call
        // =================================================================================================================================================
screenShot("#BTN1", ".active.ELEMENT1.show");
screenShot("#BTN2", "#ELEMENT2");
screenShot("#BTN3", "#ELEMENT3");
screenShot("#BTN4", "#ELEMENT4");
screenShot("#BTN5", "#ELEMENT5");
screenShot("#BTN6", "#ELEMENT6");
screenShot("#BTN7", "#ELEMENT7");
screenShot("#BTN8", "#ELEMENT8");
screenShot("#BTN9", "#ELEMENT9");
screenShot("#BTN10", "#ELEMENT10");
screenShot("#BTN11", "#ELEMENT11");
        // =================================================================================================================================================
            // End::get screenshot function call
        // =================================================================================================================================================

    window.onload = () => {
            

        
        // =================================================================================================================================================
            //  API Call for Chart 1 (Monthly Statistics)
        // =================================================================================================================================================
        
            async function Chart1(){
            $(".preloader_inner.ploade-1").show();
            const url = chart_url_1;
                    const response = await fetch(url,{
                        method:"POST"
                    })
                    const data = await response.json()
                    
                    return data.data
           }
        // =================================================================================================================================================
            //  API Call for Chart 2 (Statistics At a Glance)
        // =================================================================================================================================================
        
           async function Chart2(){
            $(".preloader_inner.ploade-2").show();
            const url = chart_url_2;
                    const response = await fetch(url,{
                        method:"POST"
                    })
                    const data = await response.json()
                    return data.data
           }
        // =================================================================================================================================================
            //  API Call for Chart 3,4,5 (Total Target Audience // Total Number of Calls Sent // Total Number of Calls Received)
        // =================================================================================================================================================
           async function Chart345(){
            $(".preloader_inner.ploade-3").show();
            const url = chart_url_3;
                    const response = await fetch(url,{
                        method:"POST"
                    })
                    const data = await response.json()
                    return data.data
           }
        // =================================================================================================================================================
            //  API Call for Chart 6 (Outbound Completed Calls by Stakeholder)
        // =================================================================================================================================================
            async function Chart6(){
            $(".preloader_inner.ploade-4").show();
                const url = chart_url_6;
                    const response = await fetch(url,{
                        method:"POST"
                    })
                    const data = await response.json()
                    return data.data
           }
        // =================================================================================================================================================
            //  API Call for Chart 7 (Outbound Content Played by Stakeholder)
        // =================================================================================================================================================
           async function Chart7(){
            $(".preloader_inner.ploade-5").show();
            const url = chart_url_7;
                    const response = await fetch(url,{
                        method:"POST"
                    })
                    const data = await response.json()
                    return data.data
           }
        // =================================================================================================================================================
            //  API Call for Chart 8 (Inbound Calls Received by Stakeholder)
        // =================================================================================================================================================
           async function Chart8(){
            $(".preloader_inner.ploade-6").show();
            const url = chart_url_8;
                    const response = await fetch(url,{
                        method:"POST"
                    })
                    const data = await response.json()
                    return data.data
           }
        // =================================================================================================================================================
            //  API Call for Chart 9 (Outbound Content Played by Category)
        // =================================================================================================================================================
           async function Chart9(){
            $(".preloader_inner.ploade-7").show();
            const url = chart_url_9;
                    const response = await fetch(url,{
                        method:"POST"
                    })
                    const data = await response.json()
                    return data.data
           }
        // =================================================================================================================================================
            //  API Call for Chart 10 (Call Received Frequency Chart)
        // =================================================================================================================================================
           async function Chart10(){
            $(".preloader_inner.ploade-8").show();
            const url = chart_url_10;
                    const response = await fetch(url,{
                        method:"POST"
                    })
                    const data = await response.json()
                    return data.data
           }
        // =================================================================================================================================================
            //  API Call for Chart 11
        // =================================================================================================================================================
           async function Chart11(){
            $(".preloader_inner.ploade-9").show();
            const url = chart_url_11;
                    const response = await fetch(url,{
                        method:"POST"
                    })
                    const data = await response.json()
                    return data.data
           }
        // =================================================================================================================================================
            //  Chart 1 => Chart Monthly Statistics
        // =================================================================================================================================================
        Chart1().then(data => {

                // $(".preloader").hide();
                // var localStorageData = JSON.parse(window.localStorage.getItem("chartData"))
                var localStorageData = data

            // ================================================================================================================================================================
                // inbound calls and outbound calls
            // ================================================================================================================================================================

                    // Class definition
                var KTChartsWidget13 = (function() {
                    // Private methods
                    var initChart = function(
                        tabSelector,
                        chartSelector,
                        elements,
                        initByDefault
                    ) {
                        var element = document.querySelector(chartSelector);
                        // Check if amchart library is included
                        if (typeof am5 === "undefined") {
                            return;
                        }

                        if (!element) {
                            return;
                        }

                        var init = false;
                        var tab = document.querySelector(tabSelector);

                        am5.ready(function() {
                            // Create root element
                            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                            var root = am5.Root.new(element);

                            // for remove amchart5 logo
                            if(root._logo){
                                root._logo.dispose();
                            }

                            // Set themes
                            // https://www.amcharts.com/docs/v5/concepts/themes/
                            root.setThemes([am5themes_Animated.new(root)]);

                            // Create chart
                            // https://www.amcharts.com/docs/v5/charts/xy-chart/
                            var chart = root.container.children.push(
                                am5xy.XYChart.new(root, {
                                    panX: true,
                                    panY: true,
                                    wheelX: "panX",
                                    wheelY: "zoomX",
                                    width: am5.percent(95)
                                })
                            );

                            // Add cursor
                            // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
                            var cursor = chart.set(
                                "cursor",
                                am5xy.XYCursor.new(root, {
                                    behavior: "none",
                                })
                            );

                            cursor.lineY.set("visible", false);

                            // The data
                            var data = elements;

                            // Create axes
                            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                            var xAxis = chart.xAxes.push(
                                am5xy.CategoryAxis.new(root, {
                                    categoryField: "month",
                                    startLocation: 0.5,
                                    endLocation: 0.5,
                                    renderer: am5xy.AxisRendererX.new(root, {}),
                                    tooltip: am5.Tooltip.new(root, {}),
                                })
                            );

                            xAxis.get("renderer").grid.template.setAll({
                                disabled: true,
                                strokeOpacity: 0,
                            });

                            xAxis.get("renderer").labels.template.setAll({
                                fontWeight: "400",
                                fontSize: 13,
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
                            });

                            xAxis.data.setAll(data);

                            var yAxis = chart.yAxes.push(
                                am5xy.ValueAxis.new(root, {
                                    renderer: am5xy.AxisRendererY.new(root, {}),
                                })
                            );

                            yAxis.get("renderer").grid.template.setAll({
                                stroke: am5.color(KTUtil.getCssVariableValue("--bs-gray-300")),
                                strokeWidth: 1,
                                strokeOpacity: 1,
                                strokeDasharray: [3],
                            });

                            yAxis.get("renderer").labels.template.setAll({
                                fontWeight: "400",
                                fontSize: 13,
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
                            });

                            // Add series
                            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/

                            function createSeries(name, field, color) {
                                var series = chart.series.push(
                                    am5xy.LineSeries.new(root, {
                                        name: name,
                                        xAxis: xAxis,
                                        yAxis: yAxis,
                                        stacked: false,
                                        valueYField: field,
                                        categoryXField: "month",
                                        fill: am5.color(color),
                                        tooltip: am5.Tooltip.new(root, {
                                            pointerOrientation: "horizontal",
                                            labelText: "[bold]{name}[/]\n{categoryX}: {valueY}",
                                        }),
                                    })
                                );

                                series.fills.template.setAll({
                                    fillOpacity: 0.5,
                                    visible: true,
                                });

                                series.data.setAll(data);
                                series.appear(1000);
                            }

                            createSeries(
                                "Not-Received",
                                "failed",
                                KTUtil.getCssVariableValue('--bs-warning')
                            );
                            createSeries(
                                "Received",
                                "success",
                                KTUtil.getCssVariableValue("--bs-primary")
                            );
                            createSeries(
                                "Calls Sent", 
                                "calls_send", 
                                KTUtil.getCssVariableValue("--bs-success")
                                );

                            // Add scrollbar
                            // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
                            var scrollbarX = chart.set(
                                "scrollbarX",
                                am5.Scrollbar.new(root, {
                                    orientation: "horizontal",
                                    marginBottom: 25,
                                    height: 8,
                                })
                            );

                            // Create axis ranges
                            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/axis-ranges/
                            var rangeDataItem = xAxis.makeDataItem({
                                category: "2016",
                                endCategory: "2021",
                            });

                            var range = xAxis.createAxisRange(rangeDataItem);

                            rangeDataItem.get("grid").setAll({
                                stroke: am5.color(KTUtil.getCssVariableValue("--bs-gray-200")),
                                strokeOpacity: 0.5,
                                strokeDasharray: [3],
                            });

                            rangeDataItem.get("axisFill").setAll({
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-200")),
                                fillOpacity: 0.1,
                            });

                            rangeDataItem.get("label").setAll({
                                inside: true,
                                text: " ",
                                rotation: 90,
                                centerX: am5.p100,
                                centerY: am5.p100,
                                location: 0,
                                paddingBottom: 10,
                                paddingRight: 15,
                            });

                            var rangeDataItem2 = xAxis.makeDataItem({
                                category: "2021",
                            });

                            var range2 = xAxis.createAxisRange(rangeDataItem2);

                            rangeDataItem2.get("grid").setAll({
                                stroke: am5.color(KTUtil.getCssVariableValue("--bs-danger")),
                                strokeOpacity: 1,
                                strokeDasharray: [3],
                            });

                            rangeDataItem2.get("label").setAll({
                                inside: true,
                                text: "",
                                rotation: 90,
                                centerX: am5.p100,
                                centerY: am5.p100,
                                location: 0,
                                paddingBottom: 10,
                                paddingRight: 15,
                            });

                            // Make staff animate on load
                            // https://www.amcharts.com/docs/v5/concepts/animations/
                            // chart.appear(1000, 100);

                            if (initByDefault === true) {
                                chart.appear(1000, 100);
                                init = true;
                            }

                            tab.addEventListener("shown.bs.tab", function(event) {
                                if (init == false) {
                                    chart.appear(1000, 100);
                                    init = true;
                                }
                            });
                        }); // end am5.ready()
                    };

                    // Public methods
                    return {
                        init: function() {



                            initChart(
                                "#kt_chart_widget_13_tab_1",
                                "#kt_chart_widget_13_chart_1",
                                localStorageData.inbound_call,
                                true
                            );
                            initChart(
                                "#kt_chart_widget_13_tab_2",
                                "#kt_chart_widget_13_chart_2",
                                localStorageData.outbound_call,
                                true
                            );
                            

                        // =================================================================================================================================================
                                            // only remove duplicate id from initchart for remove the routing problem
                        // =================================================================================================================================================


                            
                            var inbound_call_total = document.querySelector('#Avarage_inbound_call_total');
                            var inbound_target_audience = document.querySelector('#inbound_target_audience');
                            
                            if (!inbound_call_total) {
                                return ''
                            } else if (localStorageData.total.inbound) {
                                inbound_call_total.innerHTML = localStorageData.total.inbound
                                inbound_target_audience.innerHTML = localStorageData.outboundTargetAudience.outboundTargetAudience

                            } else {
                                inbound_call_total.innerHTML = 0
                                inbound_target_audience.innerHTML = 0

                            }

                            var outbound_call_total = document.querySelector('#Avarage_outbound_call_total');
                            var outbound_target_audience = document.querySelector('#outbound_target_audience');

                            if (!outbound_call_total) {
                                return ''
                            } else if (localStorageData.total.outbound) {
                                outbound_call_total.innerHTML = localStorageData.total.outbound
                                outbound_target_audience.innerHTML = localStorageData.outboundTargetAudience.outboundTargetAudience

                            } else {
                                outbound_call_total.innerHTML = 0

                            }

                            var sms_total = document.querySelector('#Avarage_sms_total');
                            var sms_target_audience = document.querySelector('#sms_target_audience');

                            if (!sms_total) {
                                return ''
                            } else if (localStorageData.total.sms) {
                                sms_total.innerHTML = localStorageData.total.sms
                                sms_target_audience.innerHTML = localStorageData.outboundTargetAudience.smsTargetAudience


                            } else {
                                sms_total.innerHTML = 0
                                sms_target_audience.innerHTML = 0


                            }
                        },
                    };
                })();

                // Webpack support
                if (typeof module !== "undefined") {
                    module.exports = KTChartsWidget13;
                }

                // On document ready
                KTUtil.onDOMContentLoaded(function() {
                    KTChartsWidget13.init();
                    $(".preloader_inner.ploade-1").hide();
                });

            // ================================================================================================================================================================
                // total sme
            // ================================================================================================================================================================

                // Class definition
                var KTChartsWidget14 = (function() {
                    // Private methods
                    var initChart = function(
                        tabSelector,
                        chartSelector,
                        elements,
                        initByDefault
                    ) {
                        var element = document.querySelector(chartSelector);
                        // Check if amchart library is included
                        if (typeof am5 === "undefined") {
                            return;
                        }

                        if (!element) {
                            return;
                        }

                        var init = false;
                        var tab = document.querySelector(tabSelector);

                        am5.ready(function() {
                            // Create root element
                            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                            var root = am5.Root.new(element);

                            // for remove amchart5 logo
                            if(root._logo){
                                root._logo.dispose();
                            }
                            // Set themes
                            // https://www.amcharts.com/docs/v5/concepts/themes/
                            root.setThemes([am5themes_Animated.new(root)]);

                            // Create chart
                            // https://www.amcharts.com/docs/v5/charts/xy-chart/
                            var chart = root.container.children.push(
                                am5xy.XYChart.new(root, {
                                    panX: true,
                                    panY: true,
                                    wheelX: "panX",
                                    wheelY: "zoomX",
                                    width: am5.percent(95)
                                })
                            );

                            // Add cursor
                            // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
                            var cursor = chart.set(
                                "cursor",
                                am5xy.XYCursor.new(root, {
                                    behavior: "none",
                                })
                            );

                            cursor.lineY.set("visible", false);

                            // The data
                            var data = elements;

                            // Create axes
                            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                            var xAxis = chart.xAxes.push(
                                am5xy.CategoryAxis.new(root, {
                                    categoryField: "month",
                                    startLocation: 0.5,
                                    endLocation: 0.5,
                                    renderer: am5xy.AxisRendererX.new(root, {}),
                                    tooltip: am5.Tooltip.new(root, {}),
                                })
                            );

                            xAxis.get("renderer").grid.template.setAll({
                                disabled: true,
                                strokeOpacity: 0,
                            });

                            xAxis.get("renderer").labels.template.setAll({
                                fontWeight: "400",
                                fontSize: 13,
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
                            });

                            xAxis.data.setAll(data);

                            var yAxis = chart.yAxes.push(
                                am5xy.ValueAxis.new(root, {
                                    renderer: am5xy.AxisRendererY.new(root, {}),
                                })
                            );

                            yAxis.get("renderer").grid.template.setAll({
                                stroke: am5.color(KTUtil.getCssVariableValue("--bs-gray-300")),
                                strokeWidth: 1,
                                strokeOpacity: 1,
                                strokeDasharray: [3],
                            });

                            yAxis.get("renderer").labels.template.setAll({
                                fontWeight: "400",
                                fontSize: 13,
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
                            });

                            // Add series
                            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/

                            function createSeries(name, field, color) {
                                var series = chart.series.push(
                                    am5xy.LineSeries.new(root, {
                                        name: name,
                                        xAxis: xAxis,
                                        yAxis: yAxis,
                                        stacked: false,
                                        valueYField: field,
                                        categoryXField: "month",
                                        fill: am5.color(color),
                                        tooltip: am5.Tooltip.new(root, {
                                            pointerOrientation: "horizontal",
                                            labelText: "[bold]{name}[/]\n{categoryX}: {valueY}",
                                        }),
                                    })
                                );

                                series.fills.template.setAll({
                                    fillOpacity: 0.5,
                                    visible: true,
                                });

                                series.data.setAll(data);
                                series.appear(1000);
                            }

                            createSeries(
                                "Failed",
                                "failed",
                                KTUtil.getCssVariableValue("--bs-warning")
                            );
                            createSeries(
                                "Success",
                                "success",
                                KTUtil.getCssVariableValue("--bs-primary")
                            );
                            createSeries(
                                "Sms Sent",
                                "sms_send",
                                KTUtil.getCssVariableValue('--bs-success'));
                                

                            // Add scrollbar
                            // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
                            var scrollbarX = chart.set(
                                "scrollbarX",
                                am5.Scrollbar.new(root, {
                                    orientation: "horizontal",
                                    marginBottom: 25,
                                    height: 8,
                                })
                            );

                            // Create axis ranges
                            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/axis-ranges/
                            var rangeDataItem = xAxis.makeDataItem({
                                category: "2016",
                                endCategory: "2021",
                            });

                            var range = xAxis.createAxisRange(rangeDataItem);

                            rangeDataItem.get("grid").setAll({
                                stroke: am5.color(KTUtil.getCssVariableValue("--bs-gray-200")),
                                strokeOpacity: 0.5,
                                strokeDasharray: [3],
                            });

                            rangeDataItem.get("axisFill").setAll({
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-200")),
                                fillOpacity: 0.1,
                            });

                            rangeDataItem.get("label").setAll({
                                inside: true,
                                text: " ",
                                rotation: 90,
                                centerX: am5.p100,
                                centerY: am5.p100,
                                location: 0,
                                paddingBottom: 10,
                                paddingRight: 15,
                            });

                            var rangeDataItem2 = xAxis.makeDataItem({
                                category: "2021",
                            });

                            var range2 = xAxis.createAxisRange(rangeDataItem2);

                            rangeDataItem2.get("grid").setAll({
                                stroke: am5.color(KTUtil.getCssVariableValue("--bs-danger")),
                                strokeOpacity: 1,
                                strokeDasharray: [3],
                            });

                            rangeDataItem2.get("label").setAll({
                                inside: true,
                                text: "",
                                rotation: 90,
                                centerX: am5.p100,
                                centerY: am5.p100,
                                location: 0,
                                paddingBottom: 10,
                                paddingRight: 15,
                            });

                            // Make staff animate on load
                            // https://www.amcharts.com/docs/v5/concepts/animations/
                            // chart.appear(1000, 100);

                            if (initByDefault === true) {
                                chart.appear(1000, 100);
                                init = true;
                            }

                            tab.addEventListener("shown.bs.tab", function(event) {
                                if (init == false) {
                                    chart.appear(1000, 100);
                                    init = true;
                                }
                            });
                        }); // end am5.ready()
                    };

                    // Public methods
                    return {
                        init: function() {

                            initChart(
                                "#kt_chart_widget_13_tab_3",
                                "#kt_chart_widget_13_chart_3",
                                localStorageData.sms,
                                true
                            );

                        },
                    };
                })();

                // Webpack support
                if (typeof module !== "undefined") {
                    module.exports = KTChartsWidget14;
                }

                // On document ready
                KTUtil.onDOMContentLoaded(function() {
                    KTChartsWidget14.init();
                });



                return data;
        })
        .catch(err => {
            $(".preloader_inner.ploade-1").hide();
            console.log(err)
        })
        // ================================================================================================================================================================
            // Chart 2 => Statistics At a Glance
        // ================================================================================================================================================================
        Chart2().then(data => {

                var localStorageData = data
                        // total numbers of call history

                        function totalNumberOfCallHistory() {



                            var fieldArray = [
                                'TARGET AUDIENCE',
                                'TOTAL NUMBER OF OUTBOUND CALLS (SENT)',
                                'TOTAL NUMBER OF OUTBOUND CALLS (RECEIVED)',
                                'TOTAL NUMBER OF OUTBOUND CALLS (COMPLETED)',
                                'WITHDRAWN-BOUNCE RATE (30 SEC)',
                                'TOTAL NUMBER OF SMS SENT(CONTENT LINK)',
                                'TOTAL NUMBER OF INBOUND CALLS (SENT)',
                                'TOTAL NUMBER OF INBOUND CALLS (RECEIVED REGISTERED)',
                                'TOTAL NUMBER OF INBOUND CALLS (RECEIVED UNREGISTERED)',
                            ]
                            
                            var currend_month_percent_data = []
                            var last_month_percent_data = []
                            var current_month_data = []
                            var last_mont_data = []
                            var current_month_persentdata = []
                            var last_month_persentdata = []
                            var current_month_data_from_last_month = []
                            var current_month_persentdata_from_last_month = []
                            
            
            // currend_month_percent_data
                            currend_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudience)
                            currend_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudience)
                            currend_month_percent_data.push(localStorageData.perticular.outbound_call_count)
                            currend_month_percent_data.push(localStorageData.perticular.outbound_call_count)
                            currend_month_percent_data.push(localStorageData.perticular.outbound_call_count)
                            currend_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudience)
                            currend_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudience)
                            currend_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudience)
                            currend_month_percent_data.push(0)
            
            // last_month_percent_data
                            last_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudienceLastMonth)
                            last_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudienceLastMonth)
                            last_month_percent_data.push(localStorageData.perticular.outbound_call_count_last_month)
                            last_month_percent_data.push(localStorageData.perticular.outbound_call_count_last_month)
                            last_month_percent_data.push(localStorageData.perticular.outbound_call_count_last_month)
                            last_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudienceLastMonth)
                            last_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudienceLastMonth)
                            last_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudienceLastMonth)
                            last_month_percent_data.push(0)

            // current_month_data
                            current_month_data.push(localStorageData.outboundTargetAudience.outboundTargetAudience)
                            current_month_data.push(localStorageData.perticular.total_outbound_call_sent)
                            current_month_data.push(localStorageData.perticular.total_outbound_call_received)
                            current_month_data.push(localStorageData.perticular.total_outbound_call_completed)
                            current_month_data.push(localStorageData.perticular.total_outbound_call_dropped)
                            current_month_data.push(localStorageData.perticular.total_outbound_call_sms_sent)
                            current_month_data.push(localStorageData.perticular.total_inbound_call_sent_current_month)
                            current_month_data.push(localStorageData.perticular.total_inbound_call_received)
                            current_month_data.push(localStorageData.perticular.total_inbound_call_received_unregisterd)

            // last_mont_data
                            last_mont_data.push(localStorageData.outboundTargetAudience.outboundTargetAudienceLastMonth)
                            last_mont_data.push(localStorageData.perticular.total_outbound_call_sent_last_month)
                            last_mont_data.push(localStorageData.perticular.total_outbound_call_received_last_month)
                            last_mont_data.push(localStorageData.perticular.total_outbound_call_completed_last_month)
                            last_mont_data.push(localStorageData.perticular.total_outbound_call_dropped_last_month)
                            last_mont_data.push(localStorageData.perticular.total_outbound_call_sms_sent_last_month)
                            last_mont_data.push(localStorageData.perticular.total_inbound_call_sent_last_month)
                            last_mont_data.push(localStorageData.perticular.total_inbound_call_received_last_month)
                            last_mont_data.push(localStorageData.perticular.total_inbound_call_received_unregisterd_last_month)
            
            
                            current_month_data.forEach((e, i) => {
                                var percent_data = (currend_month_percent_data[i] != 0) ? (e * 100) / currend_month_percent_data[i] : 0;
                                i != 0 ? !percent_data ? percent_data= 0: null : percent_data = "--";
                                i != 0 ? current_month_persentdata.push(percent_data.toFixed(2)) : current_month_persentdata.push(percent_data)
            
                            })
                            
                            last_mont_data.forEach((e, i) => {
                                var percent_data = (last_month_percent_data[i]!= 0) ? (e * 100) / last_month_percent_data[i] : 0;
                                i != 0 ? !percent_data ? percent_data= 0: null : percent_data = "--";
    
                                i != 0 ? last_month_persentdata.push(percent_data.toFixed(2)) : last_month_persentdata.push(percent_data)
                            })
                            
                            last_mont_data.forEach((e, i) => {
                                current_month_data_from_last_month.push(current_month_data[i] - last_mont_data[i])
                                current_month_persentdata_from_last_month.push((current_month_persentdata[i] - last_month_persentdata[i]).toFixed(2))
                            })
                             
                            var target_audience_percent_difference = 0;
                             var target_audience_percent_difference = (last_mont_data[0] != 0) ? ((current_month_data[0] - last_mont_data[0])/last_mont_data[0]*100).toFixed(2) : '0.00';
                             
                           
                             current_month_persentdata_from_last_month[0] =  (target_audience_percent_difference = NaN || '' ?  target_audience_percent_difference = 0 : target_audience_percent_difference)
                             current_month_persentdata_from_last_month[7] =  '0.00'
                            
                            if(current_month_persentdata[0] == 100 || 0){
                                current_month_persentdata[0] = '--';
                            }
                             if(last_month_persentdata[0] == 100 || 0){
                                last_month_persentdata[0] = '--';
                            }
                            current_month_persentdata[8] = '--';
                            last_month_persentdata[8] = '--';
                           
                            var table = document.querySelector('#callTable')
                            if (!table) {
                                return ''
                            } else if (localStorageData.perticular) {
                                fieldArray.map((emement, i) => {
                                    table.innerHTML += (
                                        `<tr>
                                        <td class="ps-3 text-start" colspan="2">
                                            <p class="text-gray-800 fw-bolder mb-1 fs-6">${emement}</p>
                                        </td>
                                        <td class="pe-0" colspan="2">
                                            <div class="d-flex justify-content-end">
                                                <span class="text-gray-800 fw-bolder fs-6 me-4">${current_month_data[i]}</span>
                                                <span class="data_tooltip ${current_month_data_from_last_month[i] >= 0 ? "text-success":"text-danger"} min-w-50px d-block text-end fw-bolder fs-6 ">${current_month_data_from_last_month[i]>0 ? "+"+current_month_data_from_last_month[i]: current_month_data_from_last_month[i] }
                                                    <span class="data_tooltiptext">Ratio From Last Month to Current Month</span>
                                                </span>
                                            </div>
                                        </td>
                                        <td class="pe-0" colspan="2">
                                            <div class="d-flex justify-content-end">
                                                <span class="text-gray-800 fw-bolder fs-6">${last_mont_data[i]}</span>
                                            </div>
                                        </td>
                                        <td class="pe-3" colspan="2">
                                            <div class="d-flex justify-content-end">
                                                <span class="text-dark fw-bolder fs-6 me-4">${current_month_persentdata[i]== "--" ? current_month_persentdata[i] :current_month_persentdata[i]+"%" } </span>
                                                <span class="data_tooltip ${current_month_persentdata_from_last_month[i] >= 0 ? "text-success":"text-danger"} min-w-50px d-block text-end fw-bolder fs-6 ">${current_month_persentdata_from_last_month[i]>0 ? "+"+current_month_persentdata_from_last_month[i]+"%" : current_month_persentdata_from_last_month[i]+"%" }
                                                    <span class="data_tooltiptext">Percent Ratio From Last Month to Current Month</span>
                                                </span>

                                            </div>
                                        </td>
                                        <td class="pe-3" colspan="2">
                                            <div class="d-flex justify-content-end">
                                                <span class="text-dark fw-bolder fs-6">${last_month_persentdata[i] == '--' ?last_month_persentdata[i] : last_month_persentdata[i]+"%" } 
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    `)
            
                                })
                            } else {
                                fieldArray.map((emement, i) => {
                                    table.innerHTML += (
                                        `<tr>
                                        <td class="ps-3 text-start" colspan="2">
                                            <p href="#" class="text-gray-800 fw-bolder mb-1 fs-6">${0}</p>
                                        </td>
                                        <td class="pe-0" colspan="2">
                                            <div class="d-flex justify-content-end">
                                                <span class="text-gray-800 fw-bolder fs-6">${0}</span>
                                            </div>
                                        </td>
                                        <td class="pe-3" colspan="2">
                                            <div class="d-flex justify-content-end">
                                                <span class="text-dark fw-bolder fs-6">${0}% </span>
            
                                            </div>
                                        </td>
                                    </tr>
                                    `)
            
                                })
            
                            }
            
            
                        }
                        totalNumberOfCallHistory()
                        $(".preloader_inner.ploade-2").hide();
                    return data;
        })
        .catch(err => {
            $(".preloader_inner.ploade-2").hide();
            console.log(err)
        })
        // ================================================================================================================================================================
            // Chart 3 => Total Target Audience (change hobe) 
            // same url for 3,4,5
        // ================================================================================================================================================================
        Chart345().then(data => {
                var localStorageData = data

                            // Class definition
                            var KTChartsWidget27 = (function() {
                                // Private methods
                                var initChart = function(Notreceived_data, fields) {
                                    var element = document.getElementById("kt_charts_widget_27");

                                    if (!element) {
                                        return;
                                    }

                                    var labelColor = KTUtil.getCssVariableValue("--bs-gray-800");
                                    var borderColor = KTUtil.getCssVariableValue(
                                        "--bs-border-dashed-color"
                                    );
                                    var maxValue = 18;

                                    var options = {
                                        series: [{
                                            name: "Calls",
                                            data: Notreceived_data,
                                        }, ],
                                        chart: {
                                            fontFamily: "inherit",
                                            type: "bar",
                                            height: 350,
                                            toolbar: {
                                                show: false,
                                            },
                                        },
                                        plotOptions: {
                                            bar: {
                                                borderRadius: 8,
                                                horizontal: true,
                                                distributed: true,
                                                barHeight: 50,
                                                dataLabels: {
                                                    position: "bottom", // use 'bottom' for left and 'top' for right align(textAnchor)
                                                },
                                            },
                                        },
                                        dataLabels: {
                                            // Docs: https://apexcharts.com/docs/options/datalabels/
                                            enabled: true,
                                            textAnchor: "start",
                                            offsetX: 30,
                                            formatter: function(val, opts) {
                                                // var val = val * 1000;
                                                var Format = wNumb({
                                                    //prefix: '$',
                                                    //suffix: ',-',
                                                    thousand: ",",
                                                });

                                                return Format.to(val);
                                            },
                                            style: {
                                                colors: ["#000000"],
                                                fontSize: "14px",
                                                fontWeight: "600",
                                                align: "left",
                                            },
                                        },
                                        legend: {
                                            show: false,
                                        },
                                        colors: ["#3E97FF", "#F1416C", "#50CD89", "#FFC700", "#7239EA"],
                                        xaxis: {
                                            categories: fields,
                                            labels: {
                                                formatter: function(val) {
                                                    var values = val>= 500? (val / 1000).toString() + "K" : val.toFixed(1)
                                                    return values;
                                                },
                                                style: {
                                                    colors: labelColor,
                                                    fontSize: "14px",
                                                    fontWeight: "600",
                                                    align: "left",
                                                },
                                            },
                                            axisBorder: {
                                                show: false,
                                            },
                                        },
                                        yaxis: {
                                            labels: {
                                                formatter: function(val, opt) {
                                                    if (Number.isInteger(val)) {
                                                        var percentage = parseInt(
                                                            (val * 100) / maxValue
                                                        ).toString();
                                                        return val + " - " + percentage + "%";
                                                    } else {
                                                        return val;
                                                    }
                                                },
                                                style: {
                                                    colors: labelColor,
                                                    fontSize: "14px",
                                                    fontWeight: "600",
                                                },
                                                offsetY: 2,
                                                align: "left",
                                            },
                                        },
                                        grid: {
                                            borderColor: borderColor,
                                            xaxis: {
                                                lines: {
                                                    show: true,
                                                },
                                            },
                                            yaxis: {
                                                lines: {
                                                    show: false,
                                                },
                                            },
                                            strokeDashArray: 4,
                                        },
                                        tooltip: {
                                            style: {
                                                fontSize: "12px",
                                            },
                                            y: {
                                                formatter: function(val) {
                                                    return val;
                                                },
                                            },
                                        },
                                    };

                                    var chart = new ApexCharts(element, options);

                                    // Set timeout to properly get the parent elements width
                                    setTimeout(function() {
                                        chart.render();
                                    }, 200);
                                };

                                // Public methods
                                return {
                                    init: function() {

                                            initChart(localStorageData.target_audience.values, localStorageData.target_audience.category );

                                            // target_audience
                                            var target_audience = document.querySelector('#target_audience');
                                            var target_audience_percent = document.querySelector('#target_audience_percent');
                                            if (localStorageData.target_audience) {

                                                var current_month_ta = localStorageData.outboundTargetAudience.outboundTargetAudience
                                                var last_month_ta = localStorageData.outboundTargetAudience.outboundTargetAudienceLastMonth
       
       
                                                var percent_ta = (last_month_ta !=0 ?(current_month_ta - last_month_ta)/last_month_ta*100  : 0).toFixed(2)
                                                target_audience.innerHTML = current_month_ta
       
       
       
                                                target_audience_percent.innerHTML = percent_ta >=0 ? `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                            <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                            <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                        </svg> ${percent_ta}%`:`<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                        <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                                        <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor"></path>
                                                    </svg> ${percent_ta}%`
       
                                                    
                                                    if(percent_ta >=0) {
                                                       target_audience_percent.classList.add("badge-success");
                                                       target_audience_percent.classList.remove("badge-danger");
                                                    } else {
                                                       target_audience_percent.classList.add("badge-danger");
                                                       target_audience_percent.classList.remove("badge-success");
                                                   }
       
                                            } else {
                                            target_audience.innerHTML = 0
                                            }

                                            var total_number_of_call_received = document.querySelector('#total_number_of_call_received');
                                            var total_number_of_call_received_percent = document.querySelector('#total_number_of_call_received_percent');
                                            if (localStorageData.student[0].total_recive) {
                                                var current_month_percent = localStorageData.student[0].total_add !=0 ? (( localStorageData.student[0].total_recive * 100) / localStorageData.student[0].total_add) : 0
                                                var last_month_percent = localStorageData.student[0].total_add_last_month !=0 ?((localStorageData.student[0].total_recive_last_month * 100) / localStorageData.student[0].total_add_last_month) : 0

                                                var percent_rc = (last_month_percent !=0? (current_month_percent - last_month_percent) : 0).toFixed(2)

                                                total_number_of_call_received.innerHTML = localStorageData.student[0].total_recive
                                                total_number_of_call_received_percent.innerHTML = percent_rc>=0 ? `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                </svg> ${percent_rc}%`:`<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                                <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor"></path>
                                            </svg> ${percent_rc}%`

                                                
                                                if(percent_rc >=0) {
                                                   total_number_of_call_received_percent.classList.add("badge-success");
                                                   total_number_of_call_received_percent.classList.remove("badge-danger");
                                                } else {
                                                   total_number_of_call_received_percent.classList.add("badge-danger");
                                                   total_number_of_call_received_percent.classList.remove("badge-success");
                                               }


                                            } else {
                                            total_number_of_call_received.innerHTML = 0
                                            }


                                            var total_users_add = document.querySelector('#total_users_add');
                                            var total_users_add_percent = document.querySelector('#total_users_add_percent');

                                            if (localStorageData.student[0].total_add) {
                                                total_users_add.innerHTML = localStorageData.student[0].total_add
           
                                                var current_month_ta = localStorageData.outboundTargetAudience.outboundTargetAudience
                                                var last_month_ta = localStorageData.outboundTargetAudience.outboundTargetAudienceLastMonth
           
                                                var current_month_percent = current_month_ta!= 0 ?((localStorageData.student[0].total_add * 100) / current_month_ta ): 0
                                                var last_month_percent = last_month_ta != 0 ? ((localStorageData.student[0].total_add_last_month * 100) / last_month_ta) : 0
           
                                                var percent_sd = (last_month_percent !=0 ?(current_month_percent - last_month_percent) : 0 ).toFixed(2) 
                                               //  !percent_sd ? percent_sd= 0: null
                                                total_number_of_call_received.innerHTML = localStorageData.student[0].total_recive
                                                total_users_add_percent.innerHTML = percent_sd>=0 ? `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                    <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                </svg> ${percent_sd}%`:`<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                                <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor"></path>
                                            </svg> ${percent_sd}%`
           
                                                if(percent_sd >=0) {
                                                   total_users_add_percent.classList.add("badge-success");
                                                   total_users_add_percent.classList.remove("badge-danger");
                                                } else {
                                                   total_users_add_percent.classList.add("badge-danger");
                                                   total_users_add_percent.classList.remove("badge-success");
                                               }
                                                } else {
                                                total_users_add.innerHTML = 0
                                                }

                                    },
                                };
                            })();

                            // Webpack support
                            if (typeof module !== "undefined") {
                                module.exports = KTChartsWidget27;
                            }

                            // On document ready
                            KTUtil.onDOMContentLoaded(function() {
                                KTChartsWidget27.init();
                                $(".preloader_inner.ploade-3").hide();
                            });
                            return data;
        })
        // ================================================================================================================================================================
            // Chart 4 => Total Number of Call Received
            // same url for 3,4,5
        // ================================================================================================================================================================
        .then(data => {
                var localStorageData = data

                    // Class definition
                    var KTChartsWidget73 = (function() {
                        // Private methods
                        var initChart = function(Received_data,fields) {
                            var element = document.getElementById("kt_charts_widget_73");

                            if (!element) {
                                return;
                            }

                            var labelColor = KTUtil.getCssVariableValue("--bs-gray-800");
                            var borderColor = KTUtil.getCssVariableValue(
                                "--bs-border-dashed-color"
                            );
                            var maxValue = 18;

                            var options = {
                                series: [{
                                    name: "Calls",
                                    data: Received_data,
                                }, ],
                                chart: {
                                    fontFamily: "inherit",
                                    type: "bar",
                                    height: 350,
                                    toolbar: {
                                        show: false,
                                    },
                                },
                                plotOptions: {
                                    bar: {
                                        borderRadius: 8,
                                        horizontal: true,
                                        distributed: true,
                                        barHeight: 50,
                                        dataLabels: {
                                            position: "bottom", // use 'bottom' for left and 'top' for right align(textAnchor)
                                        },
                                    },
                                },
                                dataLabels: {
                                    // Docs: https://apexcharts.com/docs/options/datalabels/
                                    enabled: true,
                                    textAnchor: "start",
                                    offsetX: 30,
                                    formatter: function(val, opts) {
                                        // var val = val * 1000;
                                        var Format = wNumb({
                                            //prefix: '$',
                                            //suffix: ',-',
                                            thousand: ",",
                                        });

                                        return Format.to(val);
                                    },
                                    style: {
                                        colors: ["#000000"],
                                        fontSize: "14px",
                                        fontWeight: "600",
                                        align: "left",
                                    },
                                },
                                legend: {
                                    show: false,
                                },
                                colors: ["#3E97FF", "#F1416C", "#50CD89", "#FFC700", "#7239EA"],

                                xaxis: {
                                    categories: fields,
                                    labels: {
                                        formatter: function(val) {
                                            var values = val>= 500? (val / 1000).toString() + "K" : val.toFixed(1)
                                                    return values;
                                        },
                                        style: {
                                            colors: labelColor,
                                            fontSize: "14px",
                                            fontWeight: "600",
                                            align: "left",
                                        },
                                    },
                                    axisBorder: {
                                        show: false,
                                    },
                                },
                                yaxis: {
                                    labels: {
                                        formatter: function(val, opt) {
                                            if (Number.isInteger(val)) {
                                                var percentage = parseInt(
                                                    (val * 100) / maxValue
                                                ).toString();
                                                return val + " - " + percentage + "%";
                                            } else {
                                                return val;
                                            }
                                        },
                                        style: {
                                            colors: labelColor,
                                            fontSize: "14px",
                                            fontWeight: "600",
                                        },
                                        offsetY: 2,
                                        align: "left",
                                    },
                                },
                                grid: {
                                    borderColor: borderColor,
                                    xaxis: {
                                        lines: {
                                            show: true,
                                        },
                                    },
                                    yaxis: {
                                        lines: {
                                            show: false,
                                        },
                                    },
                                    strokeDashArray: 4,
                                },
                                tooltip: {
                                    style: {
                                        fontSize: "12px",
                                    },
                                    y: {
                                        formatter: function(val) {
                                            return val;
                                        },
                                    },
                                },
                            };

                            var chart = new ApexCharts(element, options);

                            // Set timeout to properly get the parent elements width
                            setTimeout(function() {
                                chart.render();
                            }, 200);
                        };

                        // Public methods
                        return {
                            init: function() {

                                initChart(localStorageData.student[0].total_recive_stakholder, localStorageData.student[0].total_recive_stakholder_category, );

                            },
                        };
                    })();

                    // Webpack support
                    if (typeof module !== "undefined") {
                        module.exports = KTChartsWidget73;
                    }

                    // On document ready
                    KTUtil.onDOMContentLoaded(function() {
                        KTChartsWidget73.init();
                    });
                    return data;
        })
        // ================================================================================================================================================================
            // Chart 5 => Total Number of Call Sent
            // same url for 3,4,5
        // ================================================================================================================================================================
        .then(data => {
                
                var localStorageData = data
                    // Class definition
                    var KTChartsWidget74 = (function() {
                        // Private methods
                        var initChart = function(total_users, fields) {
                            var element = document.getElementById("kt_charts_widget_74");

                            if (!element) {
                                return;
                            }

                            var labelColor = KTUtil.getCssVariableValue("--bs-gray-800");
                            var borderColor = KTUtil.getCssVariableValue(
                                "--bs-border-dashed-color"
                            );
                            var maxValue = 18;

                            var options = {
                                series: [{
                                    name: "Calls",
                                    data: total_users,
                                }, ],
                                chart: {
                                    fontFamily: "inherit",
                                    type: "bar",
                                    height: 350,
                                    toolbar: {
                                        show: false,
                                    },
                                },
                                plotOptions: {
                                    bar: {
                                        borderRadius: 8,
                                        horizontal: true,
                                        distributed: true,
                                        barHeight: 50,
                                        dataLabels: {
                                            position: "bottom", // use 'bottom' for left and 'top' for right align(textAnchor)
                                        },
                                    },
                                },
                                dataLabels: {
                                    // Docs: https://apexcharts.com/docs/options/datalabels/
                                    enabled: true,
                                    textAnchor: "start",
                                    offsetX: 30,
                                    formatter: function(val, opts) {
                                        // var val = val * 1000;
                                        var Format = wNumb({
                                            //prefix: '$',
                                            //suffix: ',-',
                                            thousand: ",",
                                        });

                                        return Format.to(val);
                                    },
                                    style: {
                                        colors: ["#000000"],
                                        fontSize: "14px",
                                        fontWeight: "600",
                                        align: "left",
                                    },
                                },
                                legend: {
                                    show: false,
                                },
                                colors: ["#3E97FF", "#F1416C", "#50CD89", "#FFC700", "#7239EA"],

                                xaxis: {
                                    categories: fields,
                                    labels: {
                                        formatter: function(val) {
                                            var values = val>= 500? (val / 1000).toString() + "K" : val.toFixed(1)
                                                    return values;
                                        },
                                        style: {
                                            colors: labelColor,
                                            fontSize: "14px",
                                            fontWeight: "600",
                                            align: "left",
                                        },
                                    },
                                    axisBorder: {
                                        show: false,
                                    },
                                },
                                yaxis: {
                                    labels: {
                                        formatter: function(val, opt) {
                                            if (Number.isInteger(val)) {
                                                var percentage = parseInt(
                                                    (val * 100) / maxValue
                                                ).toString();
                                                return val + " - " + percentage + "%";
                                            } else {
                                                return val;
                                            }
                                        },
                                        style: {
                                            colors: labelColor,
                                            fontSize: "14px",
                                            fontWeight: "600",
                                        },
                                        offsetY: 2,
                                        align: "left",
                                    },
                                },
                                grid: {
                                    borderColor: borderColor,
                                    xaxis: {
                                        lines: {
                                            show: true,
                                        },
                                    },
                                    yaxis: {
                                        lines: {
                                            show: false,
                                        },
                                    },
                                    strokeDashArray: 4,
                                },
                                tooltip: {
                                    style: {
                                        fontSize: "12px",
                                    },
                                    y: {
                                        formatter: function(val) {
                                            return val;
                                        },
                                    },
                                },
                            };

                            var chart = new ApexCharts(element, options);

                            // Set timeout to properly get the parent elements width
                            setTimeout(function() {
                                chart.render();
                            }, 200);
                        };

                        // Public methods
                        return {
                            init: function() {

                                var total_users = []
                                localStorageData.student[0].total_not_recive_stakholder_category.map((e,i) =>{
                                    total_users.push(localStorageData.student[0].total_not_recive_stakholder[i] + localStorageData.student[0].total_recive_stakholder[i])
                                })

                                initChart(total_users, localStorageData.student[0].total_not_recive_stakholder_category );



                            },
                        };
                    })();

                    // Webpack support
                    if (typeof module !== "undefined") {
                        module.exports = KTChartsWidget74;
                    }

                    // On document ready
                    KTUtil.onDOMContentLoaded(function() {
                        KTChartsWidget74.init();
                    });
                    return data;
        })
        .catch(err => {
            $(".preloader_inner.ploade-3").hide();
            console.log(err)
        })
        // ================================================================================================================================================================
            // Chart 6 => Outbound Call by Stakeholder
        // ================================================================================================================================================================
        Chart6().then(data => {
            var localStorageData = data

                var KTChartsWidget17 = (function() {
                    // Private methods
                    var initChart = function(dataArr, id) {
                        // Check if amchart library is included
                        if (typeof am5 === "undefined") {
                            return;
                        }

                        var element = document.getElementById(id);

                        if (!element) {
                            return;
                        }

                        am5.ready(function() {
                            // Create root element
                            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                            var root = am5.Root.new(element);

                            // for remove amchart5 logo
                            if(root._logo){
                                root._logo.dispose();
                            }

                            // Set themes
                            // https://www.amcharts.com/docs/v5/concepts/themes/
                            root.setThemes([am5themes_Animated.new(root)]);
                            // Create chart
                            // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
                            // start and end angle must be set both for chart and series
                            var chart = root.container.children.push(
                                am5percent.PieChart.new(root, {
                                    startAngle: 180,
                                    endAngle: 360,
                                    layout: root.verticalLayout,
// use to set width set 
                                    centerX: am5.percent(-20),
                                    innerRadius: am5.percent(50),
                                    width: am5.percent(70)
                                })
                            );

                            // Create series
                            // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
                            // start and end angle must be set both for chart and series
                            var series = chart.series.push(
                                am5percent.PieSeries.new(root, {
                                    startAngle: 180,
                                    endAngle: 360,
                                    valueField: "value",
                                    categoryField: "category",
                                    alignLabels: false,
                                })
                            );

                            series.labels.template.setAll({
                                fontWeight: "400",
                                fontSize: 13,
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
// use to set text styles 
                                // fill: am5.color(0x000000),
                                // outline: am5.color(0x000000),
                                // textType: "radial",
                                // centerX: am5.percent(110)
                                // inside: true
                            });

                            series.states.create("hidden", {
                                startAngle: 180,
                                endAngle: 180,
                            });

                            series.slices.template.setAll({
                                cornerRadius: 5,
                            });

                            series.ticks.template.setAll({
                                forceHidden: true,
                                // location: 0.5
                            });
// use to set color 
                            // series.get("colors").set("colors", [
                            //     am5.color(0x095256),
                            //     am5.color(0x087f8c),
                            //     am5.color(0x5aaa95),
                            //     am5.color(0x86a873),
                            //     am5.color(0xbb9f06)
                            //   ]);

                            // Set data
                            // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
                            series.data.setAll(dataArr);
                            // series.data.setAll([{
                            //         value: 10,
                            //         category: "One",
                            //         fill: am5.color(KTUtil.getCssVariableValue("--bs-primary")),
                            //     },
                            //     {
                            //         value: 9,
                            //         category: "Two",
                            //         fill: am5.color(KTUtil.getCssVariableValue("--bs-success")),
                            //     },
                            //     {
                            //         value: 6,
                            //         category: "Three",
                            //         fill: am5.color(KTUtil.getCssVariableValue("--bs-danger")),
                            //     },
                            //     {
                            //         value: 5,
                            //         category: "Four",
                            //         fill: am5.color(KTUtil.getCssVariableValue("--bs-warning")),
                            //     },
                            //     {
                            //         value: 4,
                            //         category: "Five",
                            //         fill: am5.color(KTUtil.getCssVariableValue("--bs-info")),
                            //     },
                            //     {
                            //         value: 3,
                            //         category: "Six",
                            //         fill: am5.color(KTUtil.getCssVariableValue("--bs-secondary")),
                            //     },
                            // ]);

                            series.appear(1000, 100);
                        });
                    };

                    // Public methods
                    return {
                        init: function() {
                            
                            var categoriesArr = localStorageData.call_category_sent.outbound_category
                            var valuesArr = localStorageData.call_category_sent.outbound_call_total
                            var dataArr = []
                            valuesArr.map((e, i) => {
                                dataArr.push({
                                    value: valuesArr[i],
                                    category: categoriesArr[i]
                                })
                            })
                            initChart(dataArr, "kt_charts_widget_17_chart");


                            var totalOutboundCallSend = 0;
                            for (var i = 0; i < valuesArr.length; i++) {
                                totalOutboundCallSend += valuesArr[i];
                            }

                            var total_outbound_call_sent = document.querySelector('#outboundContentPlaybyCategory');
                            if (!total_outbound_call_sent) {
                                return ''
                            } else {
                                total_outbound_call_sent.innerHTML = totalOutboundCallSend;
                            }




                        },
                        
                    };
                })();

                // Webpack support
                if (typeof module !== "undefined") {
                    module.exports = KTChartsWidget17;
                }

                // On document ready
                KTUtil.onDOMContentLoaded(function() {
                    KTChartsWidget17.init();
                    $(".preloader_inner.ploade-4").hide();
                });
                return data;
        })
        .catch(err => {
            $(".preloader_inner.ploade-4").hide();
            console.log(err)
        })
        // ================================================================================================================================================================
            // Chart 7 => Outbound Content Played by Category
        // ================================================================================================================================================================
        Chart7().then(data => {
            var localStorageData = data

                // Class definition
                var KTChartsWidget32 = (function() {
                    // Private methods
                    var initChart = function(tabSelector, chartSelector, data, initByDefault, category) {
                        var element = document.querySelector(chartSelector);

                        if (!element) {
                            return;
                        }

                        var height = parseInt(KTUtil.css(element, "height"));
                        var labelColor = KTUtil.getCssVariableValue("--bs-gray-900");

                        var borderColor = KTUtil.getCssVariableValue(
                            "--bs-border-dashed-color"
                        );

                        var options = {
                            series: [{
                                name: "Calls",
                                data: data,
                            }, ],
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
                                    columnWidth: ["22%"],
                                    borderRadius: 5,
                                    dataLabels: {
                                        position: "top", // top, center, bottom
                                    },
                                    startingShape: "flat",
                                },
                            },
                            legend: {
                                show: false,
                            },
                            dataLabels: {
                                enabled: true,
                                offsetY: -28,
                                style: {
                                    fontSize: "13px",
                                    colors: ["labelColor"],
                                },
                            },
                            stroke: {
                                show: true,
                                width: 2,
                                colors: ["transparent"],
                            },
                            xaxis: {
                                // categories: ["Grossey", "Pet Food", "Flowers", "Restaurant"],
                                categories: category,
                                axisBorder: {
                                    show: false,
                                },
                                axisTicks: {
                                    show: false,
                                },
                                labels: {
                                    style: {
                                        colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                        fontSize: "13px",
                                    },
                                },
                                crosshairs: {
                                    fill: {
                                        gradient: {
                                            opacityFrom: 0,
                                            opacityTo: 0,
                                        },
                                    },
                                },
                            },
                            yaxis: {
                                labels: {
                                    style: {
                                        colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                        fontSize: "13px",
                                    },
                                },
                            },
                            fill: {
                                opacity: 1,
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
                            },
                            colors: [
                                KTUtil.getCssVariableValue("--bs-primary"),
                                KTUtil.getCssVariableValue("--bs-light-primary"),
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

                        var init = false;
                        var tab = document.querySelector(tabSelector);

                        if (initByDefault === true) {
                            chart.render();
                            init = true;
                        }

                        tab.addEventListener("shown.bs.tab", function(event) {
                            if (init == false) {
                                chart.render();
                                init = true;
                            }
                        });
                    };

                    // Public methods
                    return {
                        init: function() {


                            // outbound_total_student

                            if (localStorageData.call_category.outbound_call_category_total_student == 0) {
                                var outbound_call_category_total_student = [0, 0, 0, 0]
                            } else {
                            var outbound_call_category_total_student = localStorageData.call_category.outbound_call_category_total_student

                            }
                            // outbound_total_teacher

                            if (localStorageData.call_category.outbound_call_category_total_teacher == 0) {
                                var outbound_call_category_total_teacher = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_total_teacher = localStorageData.call_category.outbound_call_category_total_teacher
                            }
                            // outbound_category
                            if (localStorageData.call_category.category_outbound == 0) {
                                var outbound_call_category_category = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_category = localStorageData.call_category.category_outbound
                            }
                            // outbound_govt
                            if (localStorageData.call_category.outbound_call_category_total_govt == 0) {
                                var outbound_call_category_total_govt = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_total_govt = localStorageData.call_category.outbound_call_category_total_govt
                            }

                            // outbound_staff
                            if (localStorageData.call_category.outbound_call_category_total_staff == 0) {
                                var outbound_call_category_total_staff = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_total_staff = localStorageData.call_category.outbound_call_category_total_staff
                            }

                            // outbound_unspecified
                            if (localStorageData.call_category.outbound_call_category_total_unspecified == 0) {
                                var outbound_call_category_total_unspecified = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_total_unspecified = localStorageData.call_category.outbound_call_category_total_unspecified
                            }

                            // outbound_total
                            var outbound_call_category_All_total = localStorageData.call_category.outbound_call_category_total
                            
                            
                            totalCount([
                                '#Outbound_all_totla',
                                '#Outbound_all_totla_student',
                                '#Outbound_all_totla_staff',
                                '#Outbound_all_totla_teacher',
                                '#Outbound_all_totla_govt',
                                '#Outbound_all_totla_Unspecified',
                            ],[
                                outbound_call_category_All_total,
                                outbound_call_category_total_student,
                                outbound_call_category_total_staff,
                                outbound_call_category_total_teacher,
                                outbound_call_category_total_govt,
                                outbound_call_category_total_unspecified,
                            ])

                            initChart(
                                "#kt_charts_widget_32_tab_1",
                                "#kt_charts_widget_32_chart_1", outbound_call_category_All_total,
                                true, outbound_call_category_category

                            );
                            initChart(
                                "#kt_charts_widget_32_tab_2",
                                "#kt_charts_widget_32_chart_2", outbound_call_category_total_student,
                                false, outbound_call_category_category
                            );
                            initChart(
                                "#kt_charts_widget_32_tab_3",
                                "#kt_charts_widget_32_chart_3", outbound_call_category_total_staff,
                                false, outbound_call_category_category
                            );
                            initChart(
                                "#kt_charts_widget_32_tab_4",
                                "#kt_charts_widget_32_chart_4", outbound_call_category_total_teacher,
                                false, outbound_call_category_category
                            );
                            initChart(
                                "#kt_charts_widget_32_tab_5",
                                "#kt_charts_widget_32_chart_5", outbound_call_category_total_govt,
                                false, outbound_call_category_category
                            );
                            
                            initChart(
                                "#kt_charts_widget_32_tab_6",
                                "#kt_charts_widget_32_chart_6", outbound_call_category_total_unspecified,
                                false, outbound_call_category_category
                            );


                        },
                    };
                })();

                // Webpack support
                if (typeof module !== "undefined") {
                    module.exports = KTChartsWidget32;
                }

                // On document ready
                KTUtil.onDOMContentLoaded(function() {
                    KTChartsWidget32.init();
                    $(".preloader_inner.ploade-5").hide();
                });
                return data;
        })
        .catch(err => {
            $(".preloader_inner.ploade-5").hide();
            console.log(err)
        })
        // ================================================================================================================================================================
            // Chart 8 => inbound Call by Stakeholder
        // ================================================================================================================================================================
        Chart8().then(data => {
            var localStorageData = data

                var KTChartsWidget17 = (function() {
                    // Private methods
                    var initChart = function(dataArr, id) {
                        // Check if amchart library is included
                        if (typeof am5 === "undefined") {
                            return;
                        }

                        var element = document.getElementById(id);

                        if (!element) {
                            return;
                        }

                        am5.ready(function() {
                            // Create root element
                            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                            var root = am5.Root.new(element);

                            // for remove amchart5 logo
                            if(root._logo){
                                root._logo.dispose();
                            }

                            // Set themes
                            // https://www.amcharts.com/docs/v5/concepts/themes/
                            root.setThemes([am5themes_Animated.new(root)]);

                            // Create chart
                            // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
                            // start and end angle must be set both for chart and series
                            var chart = root.container.children.push(
                                am5percent.PieChart.new(root, {
                                    startAngle: 180,
                                    endAngle: 360,
                                    layout: root.verticalLayout,
                                    centerX: am5.percent(-20),
                                    innerRadius: am5.percent(50),
                                    width: am5.percent(70)
                                })
                            );

                            // Create series
                            // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
                            // start and end angle must be set both for chart and series
                            var series = chart.series.push(
                                am5percent.PieSeries.new(root, {
                                    startAngle: 180,
                                    endAngle: 360,
                                    valueField: "value",
                                    categoryField: "category",
                                    alignLabels: false,
                                })
                            );

                            series.labels.template.setAll({
                                fontWeight: "400",
                                fontSize: 13,
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
                            });

                            series.states.create("hidden", {
                                startAngle: 180,
                                endAngle: 180,
                            });

                            series.slices.template.setAll({
                                cornerRadius: 5,
                            });

                            series.ticks.template.setAll({
                                forceHidden: true,
                            });

                            // Set data
                            // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
                            series.data.setAll(dataArr);
                            // series.data.setAll([{
                            //         value: 10,
                            //         category: "One",
                            //         fill: am5.color(KTUtil.getCssVariableValue("--bs-primary")),
                            //     },
                            //     {
                            //         value: 9,
                            //         category: "Two",
                            //         fill: am5.color(KTUtil.getCssVariableValue("--bs-success")),
                            //     },
                            //     {
                            //         value: 6,
                            //         category: "Three",
                            //         fill: am5.color(KTUtil.getCssVariableValue("--bs-danger")),
                            //     },
                            //     {
                            //         value: 5,
                            //         category: "Four",
                            //         fill: am5.color(KTUtil.getCssVariableValue("--bs-warning")),
                            //     },
                            //     {
                            //         value: 4,
                            //         category: "Five",
                            //         fill: am5.color(KTUtil.getCssVariableValue("--bs-info")),
                            //     },
                            //     {
                            //         value: 3,
                            //         category: "Six",
                            //         fill: am5.color(KTUtil.getCssVariableValue("--bs-secondary")),
                            //     },
                            // ]);

                            series.appear(1000, 100);
                        });
                    };

                    // Public methods
                    return {
                        
                        init: function() {


                            var categoriesArr = localStorageData.call_category_sent.inbound_category
                            var valuesArr = localStorageData.call_category_sent.inbound_call_total
                            var dataArr = []
                            valuesArr.map((e, i) => {
                                dataArr.push({
                                    value: valuesArr[i],
                                    category: categoriesArr[i],
                                })
                            })
                            initChart(dataArr, "kt_charts_widget_18_chart");

                            var totalInboundCallSend = 0;
                            for (var i = 0; i < valuesArr.length; i++) {
                                totalInboundCallSend += valuesArr[i];
                            }


                            var total_inbound_call_received = document.querySelector('#inboundContentPlaybyCategory');


                            if (!total_inbound_call_received) {
                                return ''
                            } else {
                                total_inbound_call_received.innerHTML = totalInboundCallSend;
                            }

                        },
                    };
                })();

                // Webpack support
                if (typeof module !== "undefined") {
                    module.exports = KTChartsWidget17;
                }

                // On document ready
                KTUtil.onDOMContentLoaded(function() {
                    KTChartsWidget17.init();
                    $(".preloader_inner.ploade-6").hide();
                });
                return data;
        })
        .catch(err => {
            $(".preloader_inner.ploade-6").hide();
            console.log(err)
        })
        // ================================================================================================================================================================
            // Chart 9 => inbound Content Played by Category
        // ================================================================================================================================================================
        Chart9().then(data => {
            var localStorageData = data

                // Class definition
                var KTChartsWidget71 = (function() {
                    // Private methods
                    var initChart = function(tabSelector, chartSelector, data, initByDefault, category) {
                        var element = document.querySelector(chartSelector);

                        if (!element) {
                            return;
                        }

                        var height = parseInt(KTUtil.css(element, "height"));
                        var labelColor = KTUtil.getCssVariableValue("--bs-gray-900");

                        var borderColor = KTUtil.getCssVariableValue(
                            "--bs-border-dashed-color"
                        );

                        var options = {
                            series: [{
                                name: "Calls",
                                data: data,
                            }, ],
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
                                    columnWidth: ["22%"],
                                    borderRadius: 5,
                                    dataLabels: {
                                        position: "top", // top, center, bottom
                                    },
                                    startingShape: "flat",
                                },
                            },
                            legend: {
                                show: false,
                            },
                            dataLabels: {
                                enabled: true,
                                offsetY: -28,
                                style: {
                                    fontSize: "13px",
                                    colors: ["labelColor"],
                                },
                            },
                            stroke: {
                                show: true,
                                width: 2,
                                colors: ["transparent"],
                            },
                            xaxis: {
                                categories: category,
                                axisBorder: {
                                    show: false,
                                },
                                axisTicks: {
                                    show: false,
                                },
                                labels: {
                                    style: {
                                        colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                        fontSize: "13px",
                                    },
                                },
                                crosshairs: {
                                    fill: {
                                        gradient: {
                                            opacityFrom: 0,
                                            opacityTo: 0,
                                        },
                                    },
                                },
                            },
                            yaxis: {
                                labels: {
                                    style: {
                                        colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                        fontSize: "13px",
                                    },
                                },
                            },
                            fill: {
                                opacity: 1,
                                colors: ["#70CC8A"],
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
                            },
                            colors: [
                                KTUtil.getCssVariableValue("--bs-primary"),
                                KTUtil.getCssVariableValue("--bs-light-primary"),
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

                        var init = false;
                        var tab = document.querySelector(tabSelector);

                        if (initByDefault === true) {
                            chart.render();
                            init = true;
                        }

                        tab.addEventListener("shown.bs.tab", function(event) {
                            if (init == false) {
                                chart.render();
                                init = true;
                            }
                        });
                    };

                    // Public methods
                    return {
                        init: function() {

                     

                            // outbound_student

                            if (localStorageData.call_category_content.outbound_call_count_content_dhadha == 0) {
                                var outbound_call_count_content_dhadha = [0, 0, 0, 0]
                            } else {
                                var outbound_call_count_content_dhadha = localStorageData.call_category_content.outbound_call_count_content_dhadha
                            }
                            // outbound_teacher

                            if (localStorageData.call_category_content.outbound_call_count_content_gaan == 0) {
                                var outbound_call_count_content_gaan = [0, 0, 0, 0]
                            } else {
                                var outbound_call_count_content_gaan = localStorageData.call_category_content.outbound_call_count_content_gaan
                            }
                            // outbound_category
                            if (localStorageData.call_category_content.outbound_call_count_content_golpo == 0) {
                                var outbound_call_count_content_golpo = [0, 0, 0, 0]
                            } else {
                                var outbound_call_count_content_golpo = localStorageData.call_category_content.outbound_call_count_content_golpo
                            }

                            // outbound_staff
                            if (localStorageData.call_category_content.outbound_call_count_content_kobita == 0) {
                                var outbound_call_count_content_kobita = [0, 0, 0, 0]
                            } else {
                                var outbound_call_count_content_kobita = localStorageData.call_category_content.outbound_call_count_content_kobita
                            }

                            // outbound_total
                            var inbound_call_category_All_total = []
                            outbound_call_count_content_dhadha.map((e,i)=>{
                                inbound_call_category_All_total.push(
                                    outbound_call_count_content_dhadha[i]+
                                    outbound_call_count_content_gaan[i]+
                                    outbound_call_count_content_golpo[i]+
                                    outbound_call_count_content_kobita[i])
                            })
                            totalCount([
                                '#outbound_all_totla_dhada',
                                '#outbound_all_totla_gaan',
                                '#outbound_all_totla_golpo',
                                '#outbound_all_totla_kobita',
                            ],[
                                outbound_call_count_content_dhadha,
                                outbound_call_count_content_gaan,
                                outbound_call_count_content_golpo,
                                outbound_call_count_content_kobita,
                            ])

                          
                            initChart(
                                "#kt_charts_widget_71_tab_22",
                                "#kt_charts_widget_71_chart_22", outbound_call_count_content_kobita,
                                true,
                                localStorageData.call_category_content.outbound_call_category_content_kobita
                            );
                            initChart(
                                "#kt_charts_widget_71_tab_23",
                                "#kt_charts_widget_71_chart_23", outbound_call_count_content_golpo,
                                false,
                                localStorageData.call_category_content.outbound_call_category_content_golpo
                            );
                            initChart(
                                "#kt_charts_widget_71_tab_24",
                                "#kt_charts_widget_71_chart_24", outbound_call_count_content_gaan,
                                false,
                                localStorageData.call_category_content.outbound_call_category_content_gaan

                            );
                            initChart(
                                "#kt_charts_widget_71_tab_25",
                                "#kt_charts_widget_71_chart_25", outbound_call_count_content_dhadha,
                                false,
                                localStorageData.call_category_content.outbound_call_category_content_dhadha
                            );
                            
                            
                            


                        },
                    };
                })();

                // Webpack support
                if (typeof module !== "undefined") {
                    module.exports = KTChartsWidget71;
                }

                // On document ready
                KTUtil.onDOMContentLoaded(function() {
                    KTChartsWidget71.init();
                    $(".preloader_inner.ploade-7").hide();
                });
                return data;
        })
        .catch(err => {
            $(".preloader_inner.ploade-7").hide();
            console.log(err)
        })
        // ================================================================================================================================================================
            // Chart 10 => Call Received Frequency Chart
        // ================================================================================================================================================================
        Chart10().then(data => {
            
            var localStorageData = data
                // Class definition
                var KTChartsWidget11 = (function() {
                    // Private methods
                    var initChart = function(chartSelector, data, initByDefault, times, hourly_call_count) {
                        var element = document.querySelector(chartSelector);
                        var height = parseInt(KTUtil.css(element, "height"));

                        if (!element) {
                            return;
                        }

                        var labelColor = KTUtil.getCssVariableValue("--bs-gray-500");
                        var borderColor = KTUtil.getCssVariableValue("--bs-border-dashed-color");
                        var baseColor = KTUtil.getCssVariableValue("--bs-success");
                        var lightColor = KTUtil.getCssVariableValue("--bs-success");

                        var options = {
                            series: [{
                                name: "Calls",
                                data: data,
                            }, ],
                            chart: {
                                fontFamily: "inherit",
                                type: "area",
                                height: height,
                                toolbar: {
                                    show: false,
                                },
                            },
                            plotOptions: {},
                            legend: {
                                show: false,
                            },
                            dataLabels: {
                                enabled: false,
                            },
                            fill: {
                                type: "gradient",
                                gradient: {
                                    shadeIntensity: 1,
                                    opacityFrom: 0.3,
                                    opacityTo: 0.7,
                                    stops: [0, 90, 100],
                                },
                            },
                            stroke: {
                                curve: "smooth",
                                show: true,
                                width: 3,
                                colors: [baseColor],
                            },
                            xaxis: {
                                categories: times,
                                axisBorder: {
                                    show: false,
                                },
                                axisTicks: {
                                    show: false,
                                },
                                tickAmount: times.length + 1,
                                labels: {
                                    rotate: 0,
                                    rotateAlways: true,
                                    style: {
                                        colors: labelColor,
                                        fontSize: "10px",
                                    },
                                },
                                crosshairs: {
                                    position: "front",
                                    stroke: {
                                        color: baseColor,
                                        width: 1,
                                        dashArray: 3,
                                    },
                                },
                                tooltip: {
                                    enabled: true,
                                    formatter: undefined,
                                    offsetY: 0,
                                    style: {
                                        fontSize: "13px",
                                    },
                                },
                            },
                            yaxis: {
                                tickAmount: 4,
                                max: Math.max(...hourly_call_count) + 500,
                                min: 0,
                                labels: {
                                    style: {
                                        colors: labelColor,
                                        fontSize: "13px",
                                    },
                                },
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
                                        return +val;
                                    },
                                },
                            },
                            colors: [lightColor],
                            grid: {
                                borderColor: borderColor,
                                strokeDashArray: 4,
                                yaxis: {
                                    lines: {
                                        show: true,
                                    },
                                },
                            },
                            markers: {
                                strokeColor: baseColor,
                                strokeWidth: 3,
                            },
                        };

                        var chart = new ApexCharts(element, options);
                        var init = false;
                        // var tab = document.querySelector(tabSelector);

                        if (initByDefault === true) {
                            chart.render();
                            init = true;
                        }

                        // tab.addEventListener("shown.bs.tab", function(event) {
                        //     if (init == false) {
                        //         chart.render();
                        //         init = true;
                        //     }
                        // });
                    };

                    // Public methods
                    return {
                        init: function() {



                            localStorageData.hourly_call.hourly_call_time.unshift(" ")
                            localStorageData.hourly_call.hourly_call_time.push(" ")
                            var times = localStorageData.hourly_call.hourly_call_time

                            localStorageData.hourly_call.hourly_call_count.unshift(localStorageData.hourly_call.hourly_call_count[0])
                            localStorageData.hourly_call.hourly_call_count.push(localStorageData.hourly_call.hourly_call_count[localStorageData.hourly_call.hourly_call_count.length - 1])
                            var timesData = localStorageData.hourly_call.hourly_call_count
                            initChart(

                                "#kt_chart_widget_11_chart", timesData,
                                true,
                                times,
                                localStorageData.hourly_call.hourly_call_count
                            );
                            
                            var timeData_sum = 0
                            timesData.map((e)=>{
                                timeData_sum += e
                            })

                            document.querySelector("#timeDataTotal").innerHTML = `Total Calls (Received): ${timeData_sum}`

                        },
                    };
                })();

                // Webpack support
                if (typeof module !== "undefined") {
                    module.exports = KTChartsWidget11;
                }

                // On document ready
                KTUtil.onDOMContentLoaded(function() {
                    KTChartsWidget11.init();
                    // $(".preloader").hide();
                    $(".preloader_inner.ploade-9").hide();
                });
                return data;
        })
        .catch(err => {
            $(".preloader_inner.ploade-9").hide();
            console.log(err)
        })
        // ================================================================================================================================================================
            // Chart 11 => Outbound Call by Student Grade
        // ================================================================================================================================================================
        Chart11().then(data => {
            var localStorageData = data

                // Class definition
                var KTChartsWidget71 = (function() {
                    // Private methods
                    var initChart = function(tabSelector, chartSelector, data, initByDefault, category) {
                        var element = document.querySelector(chartSelector);

                        if (!element) {
                            return;
                        }

                        var height = parseInt(KTUtil.css(element, "height"));
                        var labelColor = KTUtil.getCssVariableValue("--bs-gray-900");

                        var borderColor = KTUtil.getCssVariableValue(
                            "--bs-border-dashed-color"
                        );

                        var options = {
                            series: [{
                                name: "Calls",
                                data: data,
                            }, ],
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
                                    columnWidth: ["22%"],
                                    borderRadius: 5,
                                    dataLabels: {
                                        position: "top", // top, center, bottom
                                    },
                                    startingShape: "flat",
                                },
                            },
                            legend: {
                                show: false,
                            },
                            dataLabels: {
                                enabled: true,
                                offsetY: -28,
                                style: {
                                    fontSize: "13px",
                                    colors: ["labelColor"],
                                },
                            },
                            stroke: {
                                show: true,
                                width: 2,
                                colors: ["transparent"],
                            },
                            xaxis: {
                                categories: category,
                                axisBorder: {
                                    show: false,
                                },
                                axisTicks: {
                                    show: false,
                                },
                                labels: {
                                    style: {
                                        colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                        fontSize: "13px",
                                    },
                                },
                                crosshairs: {
                                    fill: {
                                        gradient: {
                                            opacityFrom: 0,
                                            opacityTo: 0,
                                        },
                                    },
                                },
                            },
                            yaxis: {
                                labels: {
                                    style: {
                                        colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                        fontSize: "13px",
                                    },
                                },
                            },
                            fill: {
                                opacity: 1,
                                colors: ["#70CC8A"],
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
                            },
                            colors: [
                                KTUtil.getCssVariableValue("--bs-primary"),
                                KTUtil.getCssVariableValue("--bs-light-primary"),
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

                        var init = false;
                        var tab = document.querySelector(tabSelector);

                        if (initByDefault === true) {
                            chart.render();
                            init = true;
                        }

                        tab.addEventListener("shown.bs.tab", function(event) {
                            if (init == false) {
                                chart.render();
                                init = true;
                            }
                        });
                    };

                    // Public methods
                    return {
                        init: function() {



                            // outbound_class_1

                            if (localStorageData.call_class.outbound_call_category_class_1_total == 0) {
                                var outbound_call_category_class_1_total = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_class_1_total = localStorageData.call_class.outbound_call_category_class_1_total
                            }
                            // outbound_class_2

                            if (localStorageData.call_class.outbound_call_category_class_2_total == 0) {
                                var outbound_call_category_class_2_total = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_class_2_total = localStorageData.call_class.outbound_call_category_class_2_total
                            }
                            // outbound_category

                            if (localStorageData.call_class.content_category == 0) {
                                var outbound_call_category_category = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_category = localStorageData.call_class.content_category
                                
                            }
                            
                            // outbound_class_3
                            if (localStorageData.call_class.outbound_call_category_class_3_total == 0) {
                                var outbound_call_category_class_3_total = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_class_3_total = localStorageData.call_class.outbound_call_category_class_3_total
                            }

                            // outbound_class_4
                            if (localStorageData.call_class.outbound_call_category_class_4_total == 0) {
                                var outbound_call_category_class_4_total = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_class_4_total = localStorageData.call_class.outbound_call_category_class_4_total
                            }

                            // outbound_class_5
                            if (localStorageData.call_class.outbound_call_category_class_5_total == 0) {
                                var outbound_call_category_class_5_total = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_class_5_total = localStorageData.call_class.outbound_call_category_class_5_total
                            }

                            // outbound_unspecified
                            if (localStorageData.call_class.outbound_call_category_class_unspecified_total == 0) {
                                var outbound_call_category_class_unspecified_total = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_class_unspecified_total = localStorageData.call_class.outbound_call_category_class_unspecified_total
                            }

                            // outbound_call_category_All_total
                            var outbound_call_category_class_total = []
                            outbound_call_category_class_1_total.map((e,i)=>{
                                    outbound_call_category_class_total.push(
                                        outbound_call_category_class_1_total[i]+
                                        outbound_call_category_class_2_total[i]+
                                        outbound_call_category_class_3_total[i]+
                                        outbound_call_category_class_4_total[i]+
                                        outbound_call_category_class_5_total[i]+
                                        outbound_call_category_class_unspecified_total[i])
                            })


                            totalCount([
                                '#all_class',
                                '#all_class_1',
                                '#all_class_2',
                                '#all_class_3',
                                '#all_class_4',
                                '#all_class_5',
                                '#all_unspecified',
                            ],[
                                outbound_call_category_class_total,
                                outbound_call_category_class_1_total,
                                outbound_call_category_class_2_total,
                                outbound_call_category_class_3_total,
                                outbound_call_category_class_4_total,
                                outbound_call_category_class_5_total,
                                outbound_call_category_class_unspecified_total,
                            ])

                            initChart(
                                "#kt_charts_widget_72_tab_31",
                                "#kt_charts_widget_72_chart_31", outbound_call_category_class_total,
                                true,
                                outbound_call_category_category
                            );
                            initChart(
                                "#kt_charts_widget_72_tab_32",
                                "#kt_charts_widget_72_chart_32", outbound_call_category_class_1_total,
                                false,
                                outbound_call_category_category
                            );
                            initChart(
                                "#kt_charts_widget_72_tab_33",
                                "#kt_charts_widget_72_chart_33", outbound_call_category_class_2_total,
                                false,
                                outbound_call_category_category
                            );
                            initChart(
                                "#kt_charts_widget_72_tab_34",
                                "#kt_charts_widget_72_chart_34", outbound_call_category_class_3_total,
                                false,
                                outbound_call_category_category
                            );
                            initChart(
                                "#kt_charts_widget_72_tab_35",
                                "#kt_charts_widget_72_chart_35", outbound_call_category_class_4_total,
                                false,
                                outbound_call_category_category
                            );
                            initChart(
                                "#kt_charts_widget_72_tab_36",
                                "#kt_charts_widget_72_chart_36", outbound_call_category_class_5_total,
                                false,
                                outbound_call_category_category
                            );
                            initChart(
                                "#kt_charts_widget_72_tab_37",
                                "#kt_charts_widget_72_chart_37", outbound_call_category_class_unspecified_total,
                                false,
                                outbound_call_category_category
                            );

                        },
                    };
                })();

                // Webpack support
                if (typeof module !== "undefined") {
                    module.exports = KTChartsWidget71;
                }

                // On document ready
                KTUtil.onDOMContentLoaded(function() {
                    KTChartsWidget71.init();
                    $(".preloader_inner.ploade-8").hide();
                });
                return data;
        })
        .catch(err => {
            $(".preloader_inner.ploade-8").hide();
            console.log(err)
        })
    }
}



        // ================================================================================================================================================================
            // Chart 1 Details View => Chart Monthly Statistics
        // ================================================================================================================================================================

if (document.querySelector("#statistics")) {
// get screenshot function call
screenShot("#BTN1", ".active.ELEMENT1.show");

window.onload = () => {
    
    $(".preloader").show();
    // ================================================================================================================================================================
    // Begin:: Reset filter fields 
    // ================================================================================================================================================================


    var resetBtn = document.getElementById("filter-reset")
    const fieldUrl = chart_url_12;
    async function returnField() {
        const response = await fetch(fieldUrl)
        const data = await response.json()

        var filterArea = document.getElementById("filter-area")
        var filterDistrict = document.getElementById("filter-district")
        var filterDivision = document.getElementById("filter-division")

        filterArea.innerHTML = '<option value="" default >Select Area</option>'
        filterDistrict.innerHTML = '<option value="" default >Select District</option>'
        filterDivision.innerHTML = '<option value="" default >Select Division</option>'

        data.data.area.map(value => {
            filterArea.innerHTML += `<option value="${value}">${value}</option>`
            
        })
        data.data.district.map(value => {
            filterDistrict.innerHTML += `<option value="${value}">${value}</option>`
        })
        data.data.division.map(value => {
            filterDivision.innerHTML += `<option value="${value}">${value}</option>`
        })

    }
    returnField()
    resetBtn.addEventListener('click', function() {
       
     
            var filterGender = document.getElementById("filter-gender")
            var filterSelectFromDate = document.getElementById("filter-fromDate")
            var filterSelectToDate = document.getElementById("filter-toDate")
            var filterArea = document.getElementById("filter-area")
            var filterDistrict = document.getElementById("filter-district")
            var filterDivision = document.getElementById("filter-division")

            filterArea.innerHTML = '<option value="" default >Select Area</option>'
            filterDistrict.innerHTML = '<option value="" default >Select District</option>'
            filterDivision.innerHTML = '<option value="" default >Select Division</option>'
            filterGender.innerHTML = ''
            filterSelectFromDate.value = ''
            filterSelectToDate.value = ''

            filterGender.innerHTML = `  <option value="" default >Select Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                            <option value="others">Others</option>`
            returnField()
            $('#filter-area').attr("disabled", false);
            $('#filter-district').attr("disabled", false);
            $('#filter-division').attr("disabled", false);
            
    })
// ================================================================================================================================================================
// End:: Reset filter fields 
// ================================================================================================================================================================





        var searchistory = document.getElementById("filter-searchhiostory")

                    // Class definition
                    var KTChartsWidget13 = (function() {
                        // Private methods
                        var initChart = function(
                            tabSelector,
                            chartSelector,
                            elements,
                            initByDefault
                        ) {
                            var element = document.querySelector(chartSelector);
                            // Check if amchart library is included
                            if (typeof am5 === "undefined") {
                                return;
                            }
    
                            if (!element) {
                                return;
                            }
    
                            var init = false;
                            var tab = document.querySelector(tabSelector);
    
                            am5.ready(function() {
                                // Create root element
                                // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                                if(window.root1){
                                    window.root1.dispose();
                                }
                                var root = am5.Root.new(element);
                                window.root1 = root
                                
                                if(root._logo){
                                    root._logo.dispose();
                                }
                                
                                // Set themes
                                // https://www.amcharts.com/docs/v5/concepts/themes/
                                root.setThemes([am5themes_Animated.new(root)]);
    
                                // Create chart
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/
                                var chart = root.container.children.push(
                                    am5xy.XYChart.new(root, {
                                        panX: true,
                                        panY: true,
                                        wheelX: "panX",
                                        wheelY: "zoomX",
                                        width: am5.percent(95)
                                    })
                                );
    
                                // Add cursor
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
                                var cursor = chart.set(
                                    "cursor",
                                    am5xy.XYCursor.new(root, {
                                        behavior: "none",
                                    })
                                );
    
                                cursor.lineY.set("visible", false);
    
                                // The data
                                var data = elements;
    
                                // Create axes
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                                var xAxis = chart.xAxes.push(
                                    am5xy.CategoryAxis.new(root, {
                                        categoryField: "month",
                                        startLocation: 0.5,
                                        endLocation: 0.5,
                                        renderer: am5xy.AxisRendererX.new(root, {}),
                                        tooltip: am5.Tooltip.new(root, {}),
                                    })
                                );
    
                                xAxis.get("renderer").grid.template.setAll({
                                    disabled: true,
                                    strokeOpacity: 0,
                                });
    
                                xAxis.get("renderer").labels.template.setAll({
                                    fontWeight: "400",
                                    fontSize: 13,
                                    fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
                                });
    
                                xAxis.data.setAll(data);
    
                                var yAxis = chart.yAxes.push(
                                    am5xy.ValueAxis.new(root, {
                                        renderer: am5xy.AxisRendererY.new(root, {}),
                                    })
                                );
    
                                yAxis.get("renderer").grid.template.setAll({
                                    stroke: am5.color(KTUtil.getCssVariableValue("--bs-gray-300")),
                                    strokeWidth: 1,
                                    strokeOpacity: 1,
                                    strokeDasharray: [3],
                                });
    
                                yAxis.get("renderer").labels.template.setAll({
                                    fontWeight: "400",
                                    fontSize: 13,
                                    fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
                                });
    
                                // Add series
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    
                                function createSeries(name, field, color) {
                                    var series = chart.series.push(
                                        am5xy.LineSeries.new(root, {
                                            name: name,
                                            xAxis: xAxis,
                                            yAxis: yAxis,
                                            stacked: false,
                                            valueYField: field,
                                            categoryXField: "month",
                                            fill: am5.color(color),
                                            tooltip: am5.Tooltip.new(root, {
                                                pointerOrientation: "horizontal",
                                                labelText: "[bold]{name}[/]\n{categoryX}: {valueY}",
                                            }),
                                        })
                                    );
    
                                    series.fills.template.setAll({
                                        fillOpacity: 0.5,
                                        visible: true,
                                    });
    
                                    series.data.setAll(data);
                                    series.appear(1000);
                                }
    
                                createSeries(
                                    "Not-Received",
                                    "failed",
                                    KTUtil.getCssVariableValue('--bs-warning')
    
                                );
                                createSeries(
                                    "Received",
                                    "success",
                                    KTUtil.getCssVariableValue("--bs-primary")
    
                                );
                                createSeries(
                                    "Calls Sent", 
                                    "calls_send", 
                                    KTUtil.getCssVariableValue("--bs-success"));
    
                                // Add scrollbar
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
                                var scrollbarX = chart.set(
                                    "scrollbarX",
                                    am5.Scrollbar.new(root, {
                                        orientation: "horizontal",
                                        marginBottom: 25,
                                        height: 8,
                                    })
                                );
    
                                // Create axis ranges
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/axis-ranges/
                                var rangeDataItem = xAxis.makeDataItem({
                                    category: "2016",
                                    endCategory: "2021",
                                });
    
                                var range = xAxis.createAxisRange(rangeDataItem);
    
                                rangeDataItem.get("grid").setAll({
                                    stroke: am5.color(KTUtil.getCssVariableValue("--bs-gray-200")),
                                    strokeOpacity: 0.5,
                                    strokeDasharray: [3],
                                });
    
                                rangeDataItem.get("axisFill").setAll({
                                    fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-200")),
                                    fillOpacity: 0.1,
                                });
    
                                rangeDataItem.get("label").setAll({
                                    inside: true,
                                    text: " ",
                                    rotation: 90,
                                    centerX: am5.p100,
                                    centerY: am5.p100,
                                    location: 0,
                                    paddingBottom: 10,
                                    paddingRight: 15,
                                });
    
                                var rangeDataItem2 = xAxis.makeDataItem({
                                    category: "2021",
                                });
    
                                var range2 = xAxis.createAxisRange(rangeDataItem2);
    
                                rangeDataItem2.get("grid").setAll({
                                    stroke: am5.color(KTUtil.getCssVariableValue("--bs-danger")),
                                    strokeOpacity: 1,
                                    strokeDasharray: [3],
                                });
    
                                rangeDataItem2.get("label").setAll({
                                    inside: true,
                                    text: "",
                                    rotation: 90,
                                    centerX: am5.p100,
                                    centerY: am5.p100,
                                    location: 0,
                                    paddingBottom: 10,
                                    paddingRight: 15,
                                });
    
                                // Make staff animate on load
                                // https://www.amcharts.com/docs/v5/concepts/animations/
                                // chart.appear(1000, 100);
    
                                if (initByDefault === true) {
                                    chart.appear(1000, 100);
                                    init = true;
                                }
    
                                tab.addEventListener("shown.bs.tab", function(event) {
                                    if (init == false) {
                                        chart.appear(1000, 100);
                                        init = true;
                                    }
                                });
                            }); // end am5.ready()
                        };
    
                        // Public methods
                        return {
                            init: function(data) {
    
                                initChart(
                                    data.tabId,
                                    data.chartID,
                                    data.chartData,
                                    data.status,
                                );
    
                            },
                        };
                    })();
    
                    // Webpack support
                    if (typeof module !== "undefined") {
                        module.exports = KTChartsWidget13;
                    }
                    // Class definition
                    var KTChartsWidget14 = (function() {
                        // Private methods
                        var initChart = function(
                            tabSelector,
                            chartSelector,
                            elements,
                            initByDefault
                        ) {
                            var element = document.querySelector(chartSelector);
                            // Check if amchart library is included
                            if (typeof am5 === "undefined") {
                                return;
                            }
    
                            if (!element) {
                                return;
                            }
    
                            var init = false;
                            var tab = document.querySelector(tabSelector);
    
                            am5.ready(function() {
                                // Create root element
                                // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                                if(window.root2){
                                    window.root2.dispose();
                                }
                                var root = am5.Root.new(element);
                                window.root2 = root
                                
                                // for remove amchart5 logo
                                if(root._logo){
                                    root._logo.dispose();
                                }
                                // Set themes
                                // https://www.amcharts.com/docs/v5/concepts/themes/
                                root.setThemes([am5themes_Animated.new(root)]);
    
                                // Create chart
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/
                                var chart = root.container.children.push(
                                    am5xy.XYChart.new(root, {
                                        panX: true,
                                        panY: true,
                                        wheelX: "panX",
                                        wheelY: "zoomX",
                                        width: am5.percent(95)
                                    })
                                );
    
                                // Add cursor
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
                                var cursor = chart.set(
                                    "cursor",
                                    am5xy.XYCursor.new(root, {
                                        behavior: "none",
                                    })
                                );
    
                                cursor.lineY.set("visible", false);
    
                                // The data
                                var data = elements;
    
                                // Create axes
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                                var xAxis = chart.xAxes.push(
                                    am5xy.CategoryAxis.new(root, {
                                        categoryField: "month",
                                        startLocation: 0.5,
                                        endLocation: 0.5,
                                        renderer: am5xy.AxisRendererX.new(root, {}),
                                        tooltip: am5.Tooltip.new(root, {}),
                                    })
                                );
    
                                xAxis.get("renderer").grid.template.setAll({
                                    disabled: true,
                                    strokeOpacity: 0,
                                });
    
                                xAxis.get("renderer").labels.template.setAll({
                                    fontWeight: "400",
                                    fontSize: 13,
                                    fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
                                });
    
                                xAxis.data.setAll(data);
    
                                var yAxis = chart.yAxes.push(
                                    am5xy.ValueAxis.new(root, {
                                        renderer: am5xy.AxisRendererY.new(root, {}),
                                    })
                                );
    
                                yAxis.get("renderer").grid.template.setAll({
                                    stroke: am5.color(KTUtil.getCssVariableValue("--bs-gray-300")),
                                    strokeWidth: 1,
                                    strokeOpacity: 1,
                                    strokeDasharray: [3],
                                });
    
                                yAxis.get("renderer").labels.template.setAll({
                                    fontWeight: "400",
                                    fontSize: 13,
                                    fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
                                });
    
                                // Add series
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    
                                function createSeries(name, field, color) {
                                    var series = chart.series.push(
                                        am5xy.LineSeries.new(root, {
                                            name: name,
                                            xAxis: xAxis,
                                            yAxis: yAxis,
                                            stacked: false,
                                            valueYField: field,
                                            categoryXField: "month",
                                            fill: am5.color(color),
                                            tooltip: am5.Tooltip.new(root, {
                                                pointerOrientation: "horizontal",
                                                labelText: "[bold]{name}[/]\n{categoryX}: {valueY}",
                                            }),
                                        })
                                    );
    
                                    series.fills.template.setAll({
                                        fillOpacity: 0.5,
                                        visible: true,
                                    });
    
                                    series.data.setAll(data);
                                    series.appear(1000);
                                }
    
                                createSeries(
                                    "Not-Received",
                                    "failed",
                                    KTUtil.getCssVariableValue('--bs-warning')
    
                                );
                                createSeries(
                                    "Received",
                                    "success",
                                    KTUtil.getCssVariableValue("--bs-primary")
    
                                );
                                createSeries(
                                    "Calls Sent", 
                                    "calls_send", 
                                    KTUtil.getCssVariableValue("--bs-success"));
    
                                // Add scrollbar
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
                                var scrollbarX = chart.set(
                                    "scrollbarX",
                                    am5.Scrollbar.new(root, {
                                        orientation: "horizontal",
                                        marginBottom: 25,
                                        height: 8,
                                    })
                                );
    
                                // Create axis ranges
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/axis-ranges/
                                var rangeDataItem = xAxis.makeDataItem({
                                    category: "2016",
                                    endCategory: "2021",
                                });
    
                                var range = xAxis.createAxisRange(rangeDataItem);
    
                                rangeDataItem.get("grid").setAll({
                                    stroke: am5.color(KTUtil.getCssVariableValue("--bs-gray-200")),
                                    strokeOpacity: 0.5,
                                    strokeDasharray: [3],
                                });
    
                                rangeDataItem.get("axisFill").setAll({
                                    fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-200")),
                                    fillOpacity: 0.1,
                                });
    
                                rangeDataItem.get("label").setAll({
                                    inside: true,
                                    text: " ",
                                    rotation: 90,
                                    centerX: am5.p100,
                                    centerY: am5.p100,
                                    location: 0,
                                    paddingBottom: 10,
                                    paddingRight: 15,
                                });
    
                                var rangeDataItem2 = xAxis.makeDataItem({
                                    category: "2021",
                                });
    
                                var range2 = xAxis.createAxisRange(rangeDataItem2);
    
                                rangeDataItem2.get("grid").setAll({
                                    stroke: am5.color(KTUtil.getCssVariableValue("--bs-danger")),
                                    strokeOpacity: 1,
                                    strokeDasharray: [3],
                                });
    
                                rangeDataItem2.get("label").setAll({
                                    inside: true,
                                    text: "",
                                    rotation: 90,
                                    centerX: am5.p100,
                                    centerY: am5.p100,
                                    location: 0,
                                    paddingBottom: 10,
                                    paddingRight: 15,
                                });
    
                                // Make staff animate on load
                                // https://www.amcharts.com/docs/v5/concepts/animations/
                                // chart.appear(1000, 100);
    
                                if (initByDefault === true) {
                                    chart.appear(1000, 100);
                                    init = true;
                                }
    
                                tab.addEventListener("shown.bs.tab", function(event) {
                                    if (init == false) {
                                        chart.appear(1000, 100);
                                        init = true;
                                    }
                                });
                            }); // end am5.ready()
                        };
    
                        // Public methods
                        return {
                            init: function(data) {
    
                                initChart(
                                    data.tabId,
                                    data.chartID,
                                    data.chartData,
                                    data.status,

                                );
    
                            },
                        };
                    })();
    
                    // Webpack support
                    if (typeof module !== "undefined") {
                        module.exports = KTChartsWidget13;
                    }
    
                    // Class definition
                    var KTChartsWidget15 = (function() {
                        // Private methods
                        var initChart = function(
                            tabSelector,
                            chartSelector,
                            elements,
                            initByDefault
                        ) {
                            var element = document.querySelector(chartSelector);
                            // Check if amchart library is included
                            if (typeof am5 === "undefined") {
                                return;
                            }
    
                            if (!element) {
                                return;
                            }
    
                            var init = false;
                            var tab = document.querySelector(tabSelector);
    
                            am5.ready(function() {
                                // Create root element
                                // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                                if(window.root3){
                                    window.root3.dispose();
                                }
                                var root = am5.Root.new(element);
                                window.root3 = root

                                // for remove amchart5 logo
                                if(root._logo){
                                    root._logo.dispose();
                                }

                                // Set themes
                                // https://www.amcharts.com/docs/v5/concepts/themes/
                                root.setThemes([am5themes_Animated.new(root)]);
    
                                // Create chart
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/
                                var chart = root.container.children.push(
                                    am5xy.XYChart.new(root, {
                                        panX: true,
                                        panY: true,
                                        wheelX: "panX",
                                        wheelY: "zoomX",
                                        width: am5.percent(95)
                                    })
                                );
    
                                // Add cursor
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
                                var cursor = chart.set(
                                    "cursor",
                                    am5xy.XYCursor.new(root, {
                                        behavior: "none",
                                    })
                                );
    
                                cursor.lineY.set("visible", false);
    
                                // The data
                                var data = elements;
    
                                // Create axes
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                                var xAxis = chart.xAxes.push(
                                    am5xy.CategoryAxis.new(root, {
                                        categoryField: "month",
                                        startLocation: 0.5,
                                        endLocation: 0.5,
                                        renderer: am5xy.AxisRendererX.new(root, {}),
                                        tooltip: am5.Tooltip.new(root, {}),
                                    })
                                );
    
                                xAxis.get("renderer").grid.template.setAll({
                                    disabled: true,
                                    strokeOpacity: 0,
                                });
    
                                xAxis.get("renderer").labels.template.setAll({
                                    fontWeight: "400",
                                    fontSize: 13,
                                    fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
                                });
    
                                xAxis.data.setAll(data);
    
                                var yAxis = chart.yAxes.push(
                                    am5xy.ValueAxis.new(root, {
                                        renderer: am5xy.AxisRendererY.new(root, {}),
                                    })
                                );
    
                                yAxis.get("renderer").grid.template.setAll({
                                    stroke: am5.color(KTUtil.getCssVariableValue("--bs-gray-300")),
                                    strokeWidth: 1,
                                    strokeOpacity: 1,
                                    strokeDasharray: [3],
                                });
    
                                yAxis.get("renderer").labels.template.setAll({
                                    fontWeight: "400",
                                    fontSize: 13,
                                    fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
                                });
    
                                // Add series
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
    
                                function createSeries(name, field, color) {
                                    var series = chart.series.push(
                                        am5xy.LineSeries.new(root, {
                                            name: name,
                                            xAxis: xAxis,
                                            yAxis: yAxis,
                                            stacked: false,
                                            valueYField: field,
                                            categoryXField: "month",
                                            fill: am5.color(color),
                                            tooltip: am5.Tooltip.new(root, {
                                                pointerOrientation: "horizontal",
                                                labelText: "[bold]{name}[/]\n{categoryX}: {valueY}",
                                            }),
                                        })
                                    );
    
                                    series.fills.template.setAll({
                                        fillOpacity: 0.5,
                                        visible: true,
                                    });
    
                                    series.data.setAll(data);
                                    series.appear(1000);
                                }
    
                                createSeries(
                                    "Failed",
                                    "failed",
                                    KTUtil.getCssVariableValue("--bs-warning")
                                );
                                createSeries(
                                    "Success",
                                    "success",
                                    KTUtil.getCssVariableValue("--bs-primary")
                                );
                                createSeries(
                                    "Sms Sent", 
                                    "sms_send", 
                                    KTUtil.getCssVariableValue('--bs-success'));
    
                                // Add scrollbar
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/scrollbars/
                                var scrollbarX = chart.set(
                                    "scrollbarX",
                                    am5.Scrollbar.new(root, {
                                        orientation: "horizontal",
                                        marginBottom: 25,
                                        height: 8,
                                    })
                                );
    
                                // Create axis ranges
                                // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/axis-ranges/
                                var rangeDataItem = xAxis.makeDataItem({
                                    category: "2016",
                                    endCategory: "2021",
                                });
    
                                var range = xAxis.createAxisRange(rangeDataItem);
    
                                rangeDataItem.get("grid").setAll({
                                    stroke: am5.color(KTUtil.getCssVariableValue("--bs-gray-200")),
                                    strokeOpacity: 0.5,
                                    strokeDasharray: [3],
                                });
    
                                rangeDataItem.get("axisFill").setAll({
                                    fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-200")),
                                    fillOpacity: 0.1,
                                });
    
                                rangeDataItem.get("label").setAll({
                                    inside: false,
                                    text: " ",
                                    rotation: 90,
                                    centerX: am5.p100,
                                    centerY: am5.p100,
                                    location: 0,
                                    paddingBottom: 10,
                                    paddingRight: 15,
                                });
    
                                var rangeDataItem2 = xAxis.makeDataItem({
                                    category: "2021",
                                });
    
                                var range2 = xAxis.createAxisRange(rangeDataItem2);
    
                                rangeDataItem2.get("grid").setAll({
                                    stroke: am5.color(KTUtil.getCssVariableValue("--bs-danger")),
                                    strokeOpacity: 1,
                                    strokeDasharray: [3],
                                });
    
                                rangeDataItem2.get("label").setAll({
                                    inside: true,
                                    text: "",
                                    rotation: 90,
                                    centerX: am5.p100,
                                    centerY: am5.p100,
                                    location: 0,
                                    paddingBottom: 10,
                                    paddingRight: 15,
                                });
    
                                // Make staff animate on load
                                // https://www.amcharts.com/docs/v5/concepts/animations/
                                // chart.appear(1000, 100);
    
                                if (initByDefault === true) {
                                    chart.appear(1000, 100);
                                    init = true;
                                }
    
                                tab.addEventListener("shown.bs.tab", function(event) {
                                    if (init == false) {
                                        chart.appear(1000, 100);
                                        init = true;
                                    }
                                });
                            }); // end am5.ready()
                        };
    
                        // Public methods
                        return {
                            init: function(data) {
    
                                initChart(
                                    data.tabId,
                                    data.chartID,
                                    data.chartData,
                                    data.status,
                                );
                            },
                        };
                    })();
    
                    // Webpack support
                    if (typeof module !== "undefined") {
                        module.exports = KTChartsWidget14;
                    }
    
// Reload function
    function Reload (){
        async function postdata() {
            const response = await fetch(chart_url_1, {
                    method: "POST",
                    headers: {
                        "Content-type": "application/json; charset=UTF-8"
                    },
                    body: JSON.stringify({
                        gender: document.getElementById("filter-gender").value,
                        area: document.getElementById("filter-area").value,
                        district: document.getElementById("filter-district").value,
                        division: document.getElementById("filter-division").value,
                        fromDate: document.getElementById("filter-fromDate").value,
                        toDate: document.getElementById("filter-toDate").value,
                    })
                })


                const data = await response.json()
                return data
                
        }
        postdata()
        .then(data=>{
            $(".preloader").hide();
            var  localStorageData  = data.data
            
            var inbound_call_total = document.querySelector('#Avarage_inbound_call_total');
            var inbound_target_audience = document.querySelector('#inbound_target_audience');
            
            if (!inbound_call_total) {
                return ''
            } else if (localStorageData.total.inbound) {
                inbound_call_total.innerHTML = localStorageData.total.inbound
                inbound_target_audience.innerHTML = localStorageData.outboundTargetAudience.outboundTargetAudience

            } else {
                inbound_call_total.innerHTML = 0
                inbound_target_audience.innerHTML = 0

            }

            var outbound_call_total = document.querySelector('#Avarage_outbound_call_total');
            var outbound_target_audience = document.querySelector('#outbound_target_audience');

            if (!outbound_call_total) {
                return ''
            } else if (localStorageData.total.outbound) {
                outbound_call_total.innerHTML = localStorageData.total.outbound
                outbound_target_audience.innerHTML = localStorageData.outboundTargetAudience.outboundTargetAudience

            } else {
                outbound_call_total.innerHTML = 0
                outbound_target_audience.innerHTML = 0

            }

            var sms_total = document.querySelector('#Avarage_sms_total');
            var sms_target_audience = document.querySelector('#sms_target_audience');

            if (!sms_total) {
                return ''
            } else if (localStorageData.total.sms) {
                sms_total.innerHTML = localStorageData.total.sms
                sms_target_audience.innerHTML = localStorageData.outboundTargetAudience.smsTargetAudience


            } else {
                sms_total.innerHTML = 0
                sms_target_audience.innerHTML = 0


            }


        

            // On document ready
            KTUtil.onDOMContentLoaded(function() {
                KTChartsWidget13.init({
                        tabId: "#kt_chart_widget_13_tab_1",
                        chartID: "#kt_chart_widget_13_chart_1",
                        chartData: localStorageData.inbound_call,
                        status: true,
                                        
                });
            });

            // On document ready
            KTUtil.onDOMContentLoaded(function() {
                KTChartsWidget14.init({
                        tabId: "#kt_chart_widget_13_tab_2",
                        chartID: "#kt_chart_widget_13_chart_2",
                        chartData: localStorageData.outbound_call,
                        status: true,
                                        
                });
            });

            // On document ready
            KTUtil.onDOMContentLoaded(function() {
                KTChartsWidget15.init({
                    tabId: "#kt_chart_widget_13_tab_3",
                    chartID: "#kt_chart_widget_13_chart_3",
                    chartData: localStorageData.sms,
                    status: true,
                                    
                });
            });

        })
        .catch(err=>{
            console.log(err)
            $(".preloader").hide();
        })
   }

   Reload ()

    searchistory.addEventListener('click', function() {
        var to_data = document.getElementById("filter-toDate").value;
            var from_data =document.getElementById("filter-fromDate").value;
            
            if (to_data == "" || from_data == "" ) {
                return false;
              }
           
            $(".preloader").show();
        $(".preloader").show();
        
        document.querySelector('#Avarage_inbound_call_total').innerHTML = '0';
        document.querySelector('#inbound_target_audience').innerHTML = '0';
        document.querySelector('#Avarage_outbound_call_total').innerHTML = '0';
        document.querySelector('#outbound_target_audience').innerHTML = '0';
        document.querySelector('#Avarage_sms_total').innerHTML = '0'
        document.querySelector('#sms_target_audience').innerHTML = '0';

        document.querySelector('#kt_chart_widget_13_chart_1').innerHTML = '';
        document.querySelector('#kt_chart_widget_13_chart_2').innerHTML = '';
        document.querySelector('#kt_chart_widget_13_chart_3').innerHTML = '';

        
     

        setTimeout(()=>{
            Reload ()
        },3000)

        });


}

}

        // ================================================================================================================================================================
            // Chart 2 => Statistics At a Glance
        // ================================================================================================================================================================
 
if (document.querySelector("#calls_sms")) {

    // get screen shoot
    screenShot("#BTN2", "#ELEMENT2");

    window.onload = () => {
        $(".preloader").show();
        // ================================================================================================================================================================
        // Begin:: Reset filter fields 
        // ================================================================================================================================================================

        var resetBtn = document.getElementById("filter-reset")
        const fieldUrl = chart_url_12;
        async function returnField() {
            const response = await fetch(fieldUrl)
            const data = await response.json()

            var filterArea = document.getElementById("filter-area")
            var filterDistrict = document.getElementById("filter-district")
            var filterDivision = document.getElementById("filter-division")

            filterArea.innerHTML = '<option value="" default >Select Area</option>'
            filterDistrict.innerHTML = '<option value="" default >Select District</option>'
            filterDivision.innerHTML = '<option value="" default >Select Division</option>'

            data.data.area.map(value => {
                filterArea.innerHTML += `<option value="${value}">${value}</option>`
                
            })
            data.data.district.map(value => {
                filterDistrict.innerHTML += `<option value="${value}">${value}</option>`
            })
            data.data.division.map(value => {
                filterDivision.innerHTML += `<option value="${value}">${value}</option>`
            })

        }
        returnField()
        resetBtn.addEventListener('click', function() {
        
         
                var filterGender = document.getElementById("filter-gender")
                var filterSelectMonth = document.getElementById("filter-SelectMonth")
                var filterArea = document.getElementById("filter-area")
                var filterDistrict = document.getElementById("filter-district")
                var filterDivision = document.getElementById("filter-division")

                filterArea.innerHTML = '<option value="" default >Select Area</option>'
                filterDistrict.innerHTML = '<option value="" default >Select District</option>'
                filterDivision.innerHTML = '<option value="" default >Select Division</option>'
                filterGender.innerHTML = ''
                filterSelectMonth.value = ''

                filterGender.innerHTML = `  <option value="" default >Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="others">Others</option>`
                returnField()
                $('#filter-area').attr("disabled", false);
                $('#filter-district').attr("disabled", false);
                $('#filter-division').attr("disabled", false);
                
            
                
        })
        // ================================================================================================================================================================
        // Begin:: Reset filter fields
        // ================================================================================================================================================================


        var searchistory = document.getElementById("filter-searchhiostory")
        const url = chart_url_2;

        function Reload (){
            async function returndata() {
                const response = await fetch(url, {
                    method: "POST",
                    headers: {
                        "Content-type": "application/json; charset=UTF-8"
                    },
                    body: JSON.stringify({
                        gender: document.getElementById("filter-gender").value,
                        area: document.getElementById("filter-area").value,
                        district: document.getElementById("filter-district").value,
                        division: document.getElementById("filter-division").value,
                        fromDate: document.getElementById("filter-SelectMonth").value,
    
                    })
                })
                const data = await response.json()
                return data
            }
    
            returndata().then(data => {
                $(".preloader").hide();
    
                var localStorageData = data.data
    
                    function totalNumberOfCallHistory() {
    
    
    
                        var fieldArray = [
                            'TARGET AUDIENCE',
                            'TOTAL NUMBER OF OUTBOUND CALLS (SENT)',
                            'TOTAL NUMBER OF OUTBOUND CALLS (RECEIVED)',
                            'TOTAL NUMBER OF OUTBOUND CALLS (COMPLETED)',
                            'WITHDRAWN-BOUNCE RATE (30 SEC)',
                            'TOTAL NUMBER OF SMS SENT(CONTENT LINK)',
                            'TOTAL NUMBER OF INBOUND CALLS (SENT)',
                            'TOTAL NUMBER OF INBOUND CALLS (RECEIVED REGISTERED)',
                            'TOTAL NUMBER OF INBOUND CALLS (RECEIVED UNREGISTERED)',
                        ]
                        
                        var currend_month_percent_data = []
                        var last_month_percent_data = []
                        var current_month_data = []
                        var last_mont_data = []
                        var current_month_persentdata = []
                        var last_month_persentdata = []
                        var current_month_data_from_last_month = []
                        var current_month_persentdata_from_last_month = []

                        
        
        // currend_month_percent_data
                        currend_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudience)
                        currend_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudience)
                        currend_month_percent_data.push(localStorageData.perticular.outbound_call_count)
                        currend_month_percent_data.push(localStorageData.perticular.outbound_call_count)
                        currend_month_percent_data.push(localStorageData.perticular.outbound_call_count)
                        currend_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudience)
                        currend_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudience)
                        currend_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudience)
                        currend_month_percent_data.push(0)
        
        // last_month_percent_data
                        last_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudienceLastMonth)
                        last_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudienceLastMonth)
                        last_month_percent_data.push(localStorageData.perticular.outbound_call_count_last_month)
                        last_month_percent_data.push(localStorageData.perticular.outbound_call_count_last_month)
                        last_month_percent_data.push(localStorageData.perticular.outbound_call_count_last_month)
                        last_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudienceLastMonth)
                        last_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudienceLastMonth)
                        last_month_percent_data.push(localStorageData.outboundTargetAudience.outboundTargetAudienceLastMonth)
                        last_month_percent_data.push(0)
        // current_month_data
                        current_month_data.push(localStorageData.outboundTargetAudience.outboundTargetAudience)
                        current_month_data.push(localStorageData.perticular.total_outbound_call_sent)
                        current_month_data.push(localStorageData.perticular.total_outbound_call_received)
                        current_month_data.push(localStorageData.perticular.total_outbound_call_completed)
                        current_month_data.push(localStorageData.perticular.total_outbound_call_dropped)
                        current_month_data.push(localStorageData.perticular.total_outbound_call_sms_sent)
                        current_month_data.push(localStorageData.perticular.total_inbound_call_sent_current_month)
                        current_month_data.push(localStorageData.perticular.total_inbound_call_received)
                        current_month_data.push(localStorageData.perticular.total_inbound_call_received_unregisterd)

        // last_mont_data
                        last_mont_data.push(localStorageData.outboundTargetAudience.outboundTargetAudienceLastMonth)
                        last_mont_data.push(localStorageData.perticular.total_outbound_call_sent_last_month)
                        last_mont_data.push(localStorageData.perticular.total_outbound_call_received_last_month)
                        last_mont_data.push(localStorageData.perticular.total_outbound_call_completed_last_month)
                        last_mont_data.push(localStorageData.perticular.total_outbound_call_dropped_last_month)
                        last_mont_data.push(localStorageData.perticular.total_outbound_call_sms_sent_last_month)
                        last_mont_data.push(localStorageData.perticular.total_inbound_call_sent_last_month)
                        last_mont_data.push(localStorageData.perticular.total_inbound_call_received_last_month)
                        last_mont_data.push(localStorageData.perticular.total_inbound_call_received_unregisterd_last_month)
        
        
                        current_month_data.forEach((e, i) => {
                            var percent_data = (currend_month_percent_data[i] != 0) ? (e * 100) / currend_month_percent_data[i] : 0;
                            i != 0 ? !percent_data ? percent_data= 0: null : percent_data = "--";
                            i != 0 ? current_month_persentdata.push(percent_data.toFixed(2)) : current_month_persentdata.push(percent_data)
        
                        })
                        
                        last_mont_data.forEach((e, i) => {
                            var percent_data = (last_month_percent_data[i]!= 0) ? (e * 100) / last_month_percent_data[i] : 0;
                            i != 0 ? !percent_data ? percent_data= 0: null : percent_data = "--";

                            i != 0 ? last_month_persentdata.push(percent_data.toFixed(2)) : last_month_persentdata.push(percent_data)
                        })
                        
                        last_mont_data.forEach((e, i) => {
                            current_month_data_from_last_month.push(current_month_data[i] - last_mont_data[i])
                            current_month_persentdata_from_last_month.push((current_month_persentdata[i] - last_month_persentdata[i]).toFixed(2))
                        })
                         
                        var target_audience_percent_difference = 0;
                         var target_audience_percent_difference = (last_mont_data[0] != 0) ? ((current_month_data[0] - last_mont_data[0])/last_mont_data[0]*100).toFixed(2) : '0.00';
                         
                       
                         current_month_persentdata_from_last_month[0] =  (target_audience_percent_difference = NaN || '' ?  target_audience_percent_difference = 0 : target_audience_percent_difference)
                         current_month_persentdata_from_last_month[7] =  '0.00'
                        
                         if(current_month_persentdata[0] == 100 || 0){
                            current_month_persentdata[0] = '--';
                        }
                         if(last_month_persentdata[0] == 100 || 0){
                            last_month_persentdata[0] = '--';
                        }

                        current_month_persentdata[8] = '--';
                        last_month_persentdata[8] = '--';
                         var table = document.querySelector('#callTable')
                        if (!table) {
                            return ''
                        } else if (localStorageData.perticular) {
                            fieldArray.map((emement, i) => {
                                table.innerHTML += (
                                    `<tr>
                                    <td class="ps-3 text-start" colspan="2">
                                        <p class="text-gray-800 fw-bolder mb-1 fs-6">${emement}</p>
                                    </td>
                                    <td class="pe-0" colspan="2">
                                        <div class="d-flex justify-content-end">
                                            <span class="text-gray-800 fw-bolder fs-6 me-4">${current_month_data[i]}</span>
                                            <span class="data_tooltip ${current_month_data_from_last_month[i] >= 0 ? "text-success":"text-danger"} min-w-50px d-block text-end fw-bolder fs-6 ">${current_month_data_from_last_month[i]>0 ? "+"+current_month_data_from_last_month[i]: current_month_data_from_last_month[i] }
                                                <span class="data_tooltiptext">Ratio From Last Month to Current Month</span>
                                            </span>
                                        </div>
                                    </td>
                                    <td class="pe-0" colspan="2">
                                        <div class="d-flex justify-content-end">
                                            <span class="text-gray-800 fw-bolder fs-6">${last_mont_data[i]}</span>
                                        </div>
                                    </td>
                                    <td class="pe-3" colspan="2">
                                        <div class="d-flex justify-content-end">
                                            <span class="text-dark fw-bolder fs-6 me-4">${current_month_persentdata[i]== "--" ? current_month_persentdata[i] :current_month_persentdata[i]+"%" } </span>
                                            <span class="data_tooltip ${current_month_persentdata_from_last_month[i] >= 0 ? "text-success":"text-danger"} min-w-50px d-block text-end fw-bolder fs-6 ">${current_month_persentdata_from_last_month[i]>0 ? "+"+current_month_persentdata_from_last_month[i]+"%" : current_month_persentdata_from_last_month[i]+"%" }
                                                <span class="data_tooltiptext">Percent Ratio From Last Month to Current Month</span>
                                            </span>

                                        </div>
                                    </td>
                                    <td class="pe-3" colspan="2">
                                        <div class="d-flex justify-content-end">
                                            <span class="text-dark fw-bolder fs-6">${last_month_persentdata[i] == '--' ?last_month_persentdata[i] : last_month_persentdata[i]+"%" } 
                                            </span>
                                        </div>
                                    </td>
                                </tr>
                                `)
        
                            })
                        } else {
                            fieldArray.map((emement, i) => {
                                table.innerHTML += (
                                    `<tr>
                                    <td class="ps-3 text-start" colspan="2">
                                        <p href="#" class="text-gray-800 fw-bolder mb-1 fs-6">${0}</p>
                                    </td>
                                    <td class="pe-0" colspan="2">
                                        <div class="d-flex justify-content-end">
                                            <span class="text-gray-800 fw-bolder fs-6">${0}</span>
                                        </div>
                                    </td>
                                    <td class="pe-3" colspan="2">
                                        <div class="d-flex justify-content-end">
                                            <span class="text-dark fw-bolder fs-6">${0}% </span>
        
                                        </div>
                                    </td>
                                </tr>
                                `)
        
                            })
        
                        }
        
        
                    }
                    totalNumberOfCallHistory()
    
            }).catch(err=>{
                console.log(err)
                $(".preloader").hide();
            })
        }
        Reload ()


        searchistory.addEventListener('click', function() {
            var from_data =document.getElementById("filter-SelectMonth").value;
            
            if (from_data == "" ) {
                return false;
              }
           
            $(".preloader").show();
             document.querySelector('#callTable').innerHTML =''


            setTimeout(() => {
                Reload ()
            }, 3000);
            
        
        })

    }

}
        // ================================================================================================================================================================
            // Chart 3 => Total Number of Call Not Received (change hobe)
            // Chart 4 => Total Number of Call Received
            // Chart 5 => Total Number of Call Sent
        // ================================================================================================================================================================

if (document.querySelector("#perticular")) {
    // get screenshot
    screenShot("#BTN3", "#ELEMENT3");
    screenShot("#BTN4", "#ELEMENT4");
    screenShot("#BTN5", "#ELEMENT5");
    // Class definition
    window.onload = () => {
            $(".preloader").show();
    // ================================================================================================================================================================
    // Begin:: Reset filter fields 
    // ================================================================================================================================================================


        var resetBtn = document.getElementById("filter-reset")
        const fieldUrl = chart_url_12;
        async function returnField() {
            const response = await fetch(fieldUrl)
            const data = await response.json()

            var filterArea = document.getElementById("filter-area")
            var filterDistrict = document.getElementById("filter-district")
            var filterDivision = document.getElementById("filter-division")

            filterArea.innerHTML = '<option value="" default >Select Area</option>'
            filterDistrict.innerHTML = '<option value="" default >Select District</option>'
            filterDivision.innerHTML = '<option value="" default >Select Division</option>'

            data.data.area.map(value => {
                filterArea.innerHTML += `<option value="${value}">${value}</option>`
                
            })
            data.data.district.map(value => {
                filterDistrict.innerHTML += `<option value="${value}">${value}</option>`
            })
            data.data.division.map(value => {
                filterDivision.innerHTML += `<option value="${value}">${value}</option>`
            })

        }
        returnField()
        resetBtn.addEventListener('click', function() {
           
         
                var filterGender = document.getElementById("filter-gender")
                var filterSelectMonth = document.getElementById("filter-SelectMonth")
                var filterArea = document.getElementById("filter-area")
                var filterDistrict = document.getElementById("filter-district")
                var filterDivision = document.getElementById("filter-division")

                filterArea.innerHTML = '<option value="" default >Select Area</option>'
                filterDistrict.innerHTML = '<option value="" default >Select District</option>'
                filterDivision.innerHTML = '<option value="" default >Select Division</option>'
                filterGender.innerHTML = ''
                filterSelectMonth.value = ''

                filterGender.innerHTML = `  <option value="" default >Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="others">Others</option>`
                returnField()
                $('#filter-area').attr("disabled", false);
                $('#filter-district').attr("disabled", false);
                $('#filter-division').attr("disabled", false);
                
               
                
        })
    // ================================================================================================================================================================
    // End:: Reset filter fields 
    // ================================================================================================================================================================





            var searchistory = document.getElementById("filter-searchhiostory")
            const url = chart_url_3;
            




            function Reload (){
            
                async function returndata() {
                    const response = await fetch(url, {
                        method: "POST",
                        headers: {
                            "Content-type": "application/json; charset=UTF-8"
                        },
                        body: JSON.stringify({
                            gender: document.getElementById("filter-gender").value,
                            area: document.getElementById("filter-area").value,
                            district: document.getElementById("filter-district").value,
                            division: document.getElementById("filter-division").value,
                            fromDate: document.getElementById("filter-SelectMonth").value,
    
                        })
                    })
                    const data = await response.json()
                    return data
                }
    
                returndata().then(data => {
                            $(".preloader").hide();
    
                            var localStorageData = data.data

                                     // Total_target_audience
                                     var target_audience = document.querySelector('#target_audience');
                                     var target_audience_percent = document.querySelector('#target_audience_percent');

                                      if (localStorageData.target_audience) {

                                         var current_month_ta = localStorageData.outboundTargetAudience.outboundTargetAudience
                                         var last_month_ta = localStorageData.outboundTargetAudience.outboundTargetAudienceLastMonth


                                         var percent_ta = (last_month_ta !=0 ?(current_month_ta - last_month_ta)/last_month_ta*100  : 0).toFixed(2)
                                         target_audience.innerHTML = current_month_ta



                                         target_audience_percent.innerHTML = percent_ta >=0 ? `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                     <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                     <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                 </svg> ${percent_ta}%`:`<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                 <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                                 <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor"></path>
                                             </svg> ${percent_ta}%`

                                             
                                             if(percent_ta >=0) {
                                                target_audience_percent.classList.add("badge-success");
                                                target_audience_percent.classList.remove("badge-danger");
                                             } else {
                                                target_audience_percent.classList.add("badge-danger");
                                                target_audience_percent.classList.remove("badge-success");
                                            }

                                     } else {
                                     target_audience.innerHTML = 0
                                     }
                                    //  total outbound received

                                     var total_number_of_call_received = document.querySelector('#total_number_of_call_received');
                                     var total_number_of_call_received_percent = document.querySelector('#total_number_of_call_received_percent');
                                      if (localStorageData.student[0].total_recive) {
                                                 var current_month_percent = localStorageData.student[0].total_add !=0 ? (( localStorageData.student[0].total_recive * 100) / localStorageData.student[0].total_add) : 0
                                                 var last_month_percent = localStorageData.student[0].total_add_last_month !=0 ?((localStorageData.student[0].total_recive_last_month * 100) / localStorageData.student[0].total_add_last_month) : 0

                                                 var percent_rc = (last_month_percent !=0? (current_month_percent - last_month_percent) : 0).toFixed(2)

                                                 total_number_of_call_received.innerHTML = localStorageData.student[0].total_recive
                                                 total_number_of_call_received_percent.innerHTML = percent_rc>=0 ? `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                     <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                                     <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                                 </svg> ${percent_rc}%`:`<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                                 <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                                 <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor"></path>
                                             </svg> ${percent_rc}%`

                                                 
                                                 if(percent_rc >=0) {
                                                    total_number_of_call_received_percent.classList.add("badge-success");
                                                    total_number_of_call_received_percent.classList.remove("badge-danger");
                                                 } else {
                                                    total_number_of_call_received_percent.classList.add("badge-danger");
                                                    total_number_of_call_received_percent.classList.remove("badge-success");
                                                }


                                     } else {
                                     total_number_of_call_received.innerHTML = 0
                                     }


                                     var total_users_add = document.querySelector('#total_users_add');
                                     var total_users_add_percent = document.querySelector('#total_users_add_percent');

                                    // total outbound send 
// total outbound send 
                                    // total outbound send 
                                     if (localStorageData.student[0].total_add) {
                                     total_users_add.innerHTML = localStorageData.student[0].total_add

                                     var current_month_ta = localStorageData.outboundTargetAudience.outboundTargetAudience
                                     var last_month_ta = localStorageData.outboundTargetAudience.outboundTargetAudienceLastMonth

                                     var current_month_percent = current_month_ta!= 0 ?((localStorageData.student[0].total_add * 100) / current_month_ta ): 0
                                     var last_month_percent = last_month_ta != 0 ? ((localStorageData.student[0].total_add_last_month * 100) / last_month_ta) : 0

                                     var percent_sd = (last_month_percent !=0 ?(current_month_percent - last_month_percent) : 0 ).toFixed(2) 
                                    //  !percent_sd ? percent_sd= 0: null
                                     total_number_of_call_received.innerHTML = localStorageData.student[0].total_recive
                                     total_users_add_percent.innerHTML = percent_sd>=0 ? `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                         <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                         <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                     </svg> ${percent_sd}%`:`<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                     <rect opacity="0.5" x="11" y="18" width="13" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor"></rect>
                                     <path d="M11.4343 15.4343L7.25 11.25C6.83579 10.8358 6.16421 10.8358 5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75L11.2929 18.2929C11.6834 18.6834 12.3166 18.6834 12.7071 18.2929L18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25C17.8358 10.8358 17.1642 10.8358 16.75 11.25L12.5657 15.4343C12.2533 15.7467 11.7467 15.7467 11.4343 15.4343Z" fill="currentColor"></path>
                                 </svg> ${percent_sd}%`

                                     if(percent_sd >=0) {
                                        total_users_add_percent.classList.add("badge-success");
                                        total_users_add_percent.classList.remove("badge-danger");
                                     } else {
                                        total_users_add_percent.classList.add("badge-danger");
                                        total_users_add_percent.classList.remove("badge-success");
                                    }




                                     } else {
                                     total_users_add.innerHTML = 0
                                     }


                                
    
                       
                                var KTChartsWidget27 = (function() {
                                    // Private methods
                                    var initChart = function(Notreceived_data, fields) {
                                        var element = document.getElementById("kt_charts_widget_27");

                                        if (!element) {
                                            return;
                                        }

                                        var labelColor = KTUtil.getCssVariableValue("--bs-gray-800");
                                        var borderColor = KTUtil.getCssVariableValue(
                                            "--bs-border-dashed-color"
                                        );
                                        var maxValue = 18;

                                        var options = {
                                            series: [{
                                                name: "Calls",
                                                data: Notreceived_data,
                                            }, ],
                                            chart: {
                                                fontFamily: "inherit",
                                                type: "bar",
                                                height: 350,
                                                toolbar: {
                                                    show: false,
                                                },
                                            },
                                            plotOptions: {
                                                bar: {
                                                    borderRadius: 8,
                                                    horizontal: true,
                                                    distributed: true,
                                                    barHeight: 50,
                                                    dataLabels: {
                                                        position: "bottom", // use 'bottom' for left and 'top' for right align(textAnchor)
                                                    },
                                                },
                                            },
                                            dataLabels: {
                                                // Docs: https://apexcharts.com/docs/options/datalabels/
                                                enabled: true,
                                                textAnchor: "start",
                                                offsetX: 30,
                                                formatter: function(val, opts) {
                                                    // var val = val * 1000;
                                                    var Format = wNumb({
                                                        //prefix: '$',
                                                        //suffix: ',-',
                                                        thousand: ",",
                                                    });

                                                    return Format.to(val);
                                                },
                                                style: {
                                                    colors: ["#000000"],
                                                    fontSize: "14px",
                                                    fontWeight: "600",
                                                    align: "left",
                                                },
                                            },
                                            legend: {
                                                show: false,
                                            },
                                            colors: ["#3E97FF", "#F1416C", "#50CD89", "#FFC700", "#7239EA"],
                                            xaxis: {
                                                categories: fields,
                                                labels: {
                                                    formatter: function(val) {
                                                        var values = val>= 500? (val / 1000).toString() + "K" : val.toFixed(1)
                                                        return values;
                                                    },
                                                    style: {
                                                        colors: labelColor,
                                                        fontSize: "14px",
                                                        fontWeight: "600",
                                                        align: "left",
                                                    },
                                                },
                                                axisBorder: {
                                                    show: false,
                                                },
                                            },
                                            yaxis: {
                                                labels: {
                                                    formatter: function(val, opt) {
                                                        if (Number.isInteger(val)) {
                                                            var percentage = parseInt(
                                                                (val * 100) / maxValue
                                                            ).toString();
                                                            return val + " - " + percentage + "%";
                                                        } else {
                                                            return val;
                                                        }
                                                    },
                                                    style: {
                                                        colors: labelColor,
                                                        fontSize: "14px",
                                                        fontWeight: "600",
                                                    },
                                                    offsetY: 2,
                                                    align: "left",
                                                },
                                            },
                                            grid: {
                                                borderColor: borderColor,
                                                xaxis: {
                                                    lines: {
                                                        show: true,
                                                    },
                                                },
                                                yaxis: {
                                                    lines: {
                                                        show: false,
                                                    },
                                                },
                                                strokeDashArray: 4,
                                            },
                                            tooltip: {
                                                style: {
                                                    fontSize: "12px",
                                                },
                                                y: {
                                                    formatter: function(val) {
                                                        return val;
                                                    },
                                                },
                                            },
                                        };

                                        var chart = new ApexCharts(element, options);

                                        // Set timeout to properly get the parent elements width
                                        setTimeout(function() {
                                            chart.render();
                                        }, 200);
                                    };

                                    // Public methods
                                    return {
                                        init: function() {
                                            // document.write('<br/>');
                                            // var categories = []
                                          

                                            initChart(localStorageData.target_audience.values, localStorageData.target_audience.category );

                                           
                                    },
                                };
                                })();

                                // Webpack support
                                if (typeof module !== "undefined") {
                                module.exports = KTChartsWidget27;
                                }

                                // On document ready
                                KTUtil.onDOMContentLoaded(function() {
                                KTChartsWidget27.init();
                                });

                                // Class definition
                                var KTChartsWidget73 = (function() {
                                // Private methods
                                var initChart = function(Received_data, fields) {
                                var element = document.getElementById("kt_charts_widget_73");

                                if (!element) {
                                return;
                                }

                                var labelColor = KTUtil.getCssVariableValue("--bs-gray-800");
                                var borderColor = KTUtil.getCssVariableValue(
                                "--bs-border-dashed-color"
                                );
                                var maxValue = 18;

                                var options = {
                                series: [{
                                name: "Calls",
                                data: Received_data,
                                }, ],
                                chart: {
                                fontFamily: "inherit",
                                type: "bar",
                                height: 350,
                                toolbar: {
                                show: false,
                                },
                                },
                                plotOptions: {
                                bar: {
                                borderRadius: 8,
                                horizontal: true,
                                distributed: true,
                                barHeight: 50,
                                dataLabels: {
                                    position: "bottom", // use 'bottom' for left and 'top' for right align(textAnchor)
                                },
                                },
                                },
                                dataLabels: {
                                // Docs: https://apexcharts.com/docs/options/datalabels/
                                enabled: true,
                                textAnchor: "start",
                                offsetX: 30,
                                formatter: function(val, opts) {
                                // var val = val * 1000;
                                var Format = wNumb({
                                    //prefix: '$',
                                    //suffix: ',-',
                                    thousand: ",",
                                });

                                return Format.to(val);
                                },
                                style: {
                                colors: ["#000000"],
                                fontSize: "14px",
                                fontWeight: "600",
                                align: "left",
                                },
                                },
                                legend: {
                                show: false,
                                },
                                colors: ["#3E97FF", "#F1416C", "#50CD89", "#FFC700", "#7239EA"],

                                xaxis: {
                                categories: fields,
                                labels: {
                                formatter: function(val) {
                                    var values = val>= 500? (val / 1000).toString() + "K" : val.toFixed(1)
                                    return values;
                                },
                                style: {
                                    colors: labelColor,
                                    fontSize: "14px",
                                    fontWeight: "600",
                                    align: "left",
                                },
                                },
                                axisBorder: {
                                show: false,
                                },
                                },
                                yaxis: {
                                labels: {
                                formatter: function(val, opt) {
                                    if (Number.isInteger(val)) {
                                        var percentage = parseInt(
                                            (val * 100) / maxValue
                                        ).toString();
                                        return val + " - " + percentage + "%";
                                    } else {
                                        return val;
                                    }
                                },
                                style: {
                                    colors: labelColor,
                                    fontSize: "14px",
                                    fontWeight: "600",
                                },
                                offsetY: 2,
                                align: "left",
                                },
                                },
                                grid: {
                                borderColor: borderColor,
                                xaxis: {
                                lines: {
                                    show: true,
                                },
                                },
                                yaxis: {
                                lines: {
                                    show: false,
                                },
                                },
                                strokeDashArray: 4,
                                },
                                tooltip: {
                                style: {
                                fontSize: "12px",
                                },
                                y: {
                                formatter: function(val) {
                                    return val;
                                },
                                },
                                },
                                };

                                var chart = new ApexCharts(element, options);

                                // Set timeout to properly get the parent elements width
                                setTimeout(function() {
                                chart.render();
                                }, 200);
                                };

                                // Public methods
                                return {
                                init: function() {
                                    // var categories = []

                                                
                                initChart(localStorageData.student[0].total_recive_stakholder, localStorageData.student[0].total_recive_stakholder_category );

                                },
                                };
                                })();

                                // Webpack support
                                if (typeof module !== "undefined") {
                                module.exports = KTChartsWidget73;
                                }

                                // On document ready
                                KTUtil.onDOMContentLoaded(function() {
                                KTChartsWidget73.init();
                                });
                                // Class definition
                                var KTChartsWidget74 = (function() {
                                // Private methods
                                var initChart = function(total_users, fields) {
                                var element = document.getElementById("kt_charts_widget_74");

                                if (!element) {
                                return;
                                }

                                var labelColor = KTUtil.getCssVariableValue("--bs-gray-800");
                                var borderColor = KTUtil.getCssVariableValue(
                                "--bs-border-dashed-color"
                                );
                                var maxValue = 18;

                                var options = {
                                series: [{
                                name: "Calls",
                                data: total_users,
                                }, ],
                                chart: {
                                fontFamily: "inherit",
                                type: "bar",
                                height: 350,
                                toolbar: {
                                show: false,
                                },
                                },
                                plotOptions: {
                                bar: {
                                borderRadius: 8,
                                horizontal: true,
                                distributed: true,
                                barHeight: 50,
                                dataLabels: {
                                    position: "bottom", // use 'bottom' for left and 'top' for right align(textAnchor)
                                },
                                },
                                },
                                dataLabels: {
                                // Docs: https://apexcharts.com/docs/options/datalabels/
                                enabled: true,
                                textAnchor: "start",
                                offsetX: 30,
                                formatter: function(val, opts) {
                                // var val = val * 1000;
                                var Format = wNumb({
                                    //prefix: '$',
                                    //suffix: ',-',
                                    thousand: ",",
                                });

                                return Format.to(val);
                                },
                                style: {
                                colors: ["#000000"],
                                fontSize: "14px",
                                fontWeight: "600",
                                align: "left",
                                },
                                },
                                legend: {
                                show: false,
                                },
                                colors: ["#3E97FF", "#F1416C", "#50CD89", "#FFC700", "#7239EA"],

                                xaxis: {
                                categories: fields,
                                labels: {
                                formatter: function(val) {
                                var values = val>= 500? (val / 1000).toString() + "K" : val.toFixed(1)
                                return values;
                                },
                                style: {
                                    colors: labelColor,
                                    fontSize: "14px",
                                    fontWeight: "600",
                                    align: "left",
                                },
                                },
                                axisBorder: {
                                show: false,
                                },
                                },
                                yaxis: {
                                labels: {
                                formatter: function(val, opt) {
                                    if (Number.isInteger(val)) {
                                        var percentage = parseInt(
                                            (val * 100) / maxValue
                                        ).toString();
                                        return val + " - " + percentage + "%";
                                    } else {
                                        return val;
                                    }
                                },
                                style: {
                                    colors: labelColor,
                                    fontSize: "14px",
                                    fontWeight: "600",
                                },
                                offsetY: 2,
                                align: "left",
                                },
                                },
                                grid: {
                                borderColor: borderColor,
                                xaxis: {
                                lines: {
                                    show: true,
                                },
                                },
                                yaxis: {
                                lines: {
                                    show: false,
                                },
                                },
                                strokeDashArray: 4,
                                },
                                tooltip: {
                                style: {
                                fontSize: "12px",
                                },
                                y: {
                                formatter: function(val) {
                                    return val;
                                },
                                },
                                },
                                };

                                var chart = new ApexCharts(element, options);

                                // Set timeout to properly get the parent elements width
                                setTimeout(function() {
                                chart.render();
                                }, 200);
                                };

                                // Public methods
                                return {
                                init: function() {


                                var total_users = []
                                localStorageData.student[0].total_not_recive_stakholder_category.map((e,i) =>{
                                total_users.push(localStorageData.student[0].total_not_recive_stakholder[i] + localStorageData.student[0].total_recive_stakholder[i])
                                })

                                // var categories = []


                                initChart(total_users, localStorageData.student[0].total_not_recive_stakholder_category );
                                // initChart(total_users, ['Staff', 'Govt', 'Teacher', 'Student', "null"] );


                                },
                                };
                                })();

                                // Webpack support
                                if (typeof module !== "undefined") {
                                module.exports = KTChartsWidget74;
                                }

                                // On document ready
                                KTUtil.onDOMContentLoaded(function() {
                                KTChartsWidget74.init();
                                });
    
                        }).catch(err=>{
                            console.log(err)
                            $(".preloader").hide();
                        })
            }
            Reload ()

        searchistory.addEventListener('click', function() {
            var from_data =document.getElementById("filter-SelectMonth").value;
            
            if (from_data == "" ) {
                return false;
              }
           
            $(".preloader").show();


                var total_number_of_call_received = document.querySelector('#total_number_of_call_received');
                var total_users_add = document.querySelector('#total_users_add');
                var target_audience = document.querySelector('#target_audience');
                                     

                var kt_charts_widget_27 = document.querySelector('#kt_charts_widget_27');
                var kt_charts_widget_73 = document.querySelector('#kt_charts_widget_73');
                var kt_charts_widget_74 = document.querySelector('#kt_charts_widget_74');

                kt_charts_widget_27.innerHTML = ''
                kt_charts_widget_73.innerHTML = ''
                kt_charts_widget_74.innerHTML = ''

                target_audience.innerHTML = ''
                total_users_add.innerHTML = ''
                total_number_of_call_received.innerHTML = ''

                var total_users_add_percent = document.querySelector('#total_users_add_percent');
                total_users_add_percent.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                         <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                         <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                     </svg> 0%`
                total_users_add_percent.classList.remove("badge-success");
                total_users_add_percent.classList.remove("badge-danger");
                total_users_add_percent.classList.add("badge-success");

                var total_number_of_call_received_percent = document.querySelector('#total_number_of_call_received_percent');
                total_number_of_call_received_percent.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                    </svg> 0%`
                total_number_of_call_received_percent.classList.remove("badge-success");
                total_number_of_call_received_percent.classList.remove("badge-danger");
                total_number_of_call_received_percent.classList.add("badge-success");

                var target_audience_percent = document.querySelector('#target_audience_percent');
                target_audience_percent.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)" fill="currentColor" />
                                        <path d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z" fill="currentColor" />
                                    </svg> 0%`
                target_audience_percent.classList.remove("badge-success");
                target_audience_percent.classList.remove("badge-danger");
                target_audience_percent.classList.add("badge-success");

                setTimeout(()=>{
                    Reload ()
                },3000)



            
        })
 


    }



}

        // ================================================================================================================================================================
            // Chart 6 => Outbound Completed Calls by Stakeholder
        // ================================================================================================================================================================

if (document.querySelector("#ounbound_send")) {
    const month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var thisMonth = document.querySelector('.this_month');
   
    const d = new Date();
    let year = d.getFullYear();
    thisMonth.innerHTML = `For The Month of ${month[d.getMonth()]}`;
    // get screenshot
    screenShot("#BTN6", "#ELEMENT6");

    window.onload = () => {
        $(".preloader").show();
        // ================================================================================================================================================================
        // Begin:: Reset filter fields 
        // ================================================================================================================================================================

        var resetBtn = document.getElementById("filter-reset")
        const fieldUrl = chart_url_12;
        async function returnField() {
            const response = await fetch(fieldUrl)
            const data = await response.json()

            var filterArea = document.getElementById("filter-area")
            var filterDistrict = document.getElementById("filter-district")
            var filterDivision = document.getElementById("filter-division")

            filterArea.innerHTML = '<option value="" default >Select Area</option>'
            filterDistrict.innerHTML = '<option value="" default >Select District</option>'
            filterDivision.innerHTML = '<option value="" default >Select Division</option>'

            data.data.area.map(value => {
                filterArea.innerHTML += `<option value="${value}">${value}</option>`
                
            })
            data.data.district.map(value => {
                filterDistrict.innerHTML += `<option value="${value}">${value}</option>`
            })
            data.data.division.map(value => {
                filterDivision.innerHTML += `<option value="${value}">${value}</option>`
            })

        }
        returnField()
        resetBtn.addEventListener('click', function() {
        
         
                var filterGender = document.getElementById("filter-gender")
                var filterSelectFromDate = document.getElementById("filter-fromDate")
                var filterSelectToDate = document.getElementById("filter-toDate")
                var filterArea = document.getElementById("filter-area")
                var filterDistrict = document.getElementById("filter-district")
                var filterDivision = document.getElementById("filter-division")

                filterArea.innerHTML = '<option value="" default >Select Area</option>'
                filterDistrict.innerHTML = '<option value="" default >Select District</option>'
                filterDivision.innerHTML = '<option value="" default >Select Division</option>'
                filterGender.innerHTML = ''
                filterSelectFromDate.value = ''
                filterSelectToDate.value = ''

                filterGender.innerHTML = `  <option value="" default >Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="others">Others</option>`
                returnField()
                $('#filter-area').attr("disabled", false);
                $('#filter-district').attr("disabled", false);
                $('#filter-division').attr("disabled", false);
                
            
                
        })
        // ================================================================================================================================================================
        // Begin:: Reset filter fields
        // ================================================================================================================================================================





        var searchistory = document.getElementById("filter-searchhiostory")

    const url = chart_url_6;
    function Reload (){
        async function returndata() {
            const response = await fetch(url, {
                method: "POST",
                headers: {
                    "Content-type": "application/json; charset=UTF-8"
                },
                body: JSON.stringify({
                    gender: document.getElementById("filter-gender").value,
                    area: document.getElementById("filter-area").value,
                    district: document.getElementById("filter-district").value,
                    division: document.getElementById("filter-division").value,
                    fromDate: document.getElementById("filter-fromDate").value,
                    toDate: document.getElementById("filter-toDate").value,

                })
            })
            const data = await response.json()
            return data
        }

        returndata().then(data => {
                    // console.log(data)
                    $(".preloader").hide();

                    var localStorageData = data.data
                        // total numbers of call history

                            var KTChartsWidget17 = (function() {
                                // Private methods
                                var initChart = function(dataArr, id) {
                                    // Check if amchart library is included
                                    if (typeof am5 === "undefined") {
                                        return;
                                    }
                        
                                    var element = document.getElementById(id);
                        
                                    if (!element) {
                                        return;
                                    }
                        
                                    am5.ready(function() {
                                        // Create root element
                                        // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                                        if(window.root5){
                                            window.root5.dispose();
                                        }
                                        var root = am5.Root.new(element);
                                        window.root5 = root
                                        
                                        // for remove amchart5 logo
                                            if(root._logo){
                                                root._logo.dispose();
                                            }
                                        // Set themes
                                        // https://www.amcharts.com/docs/v5/concepts/themes/
                                        root.setThemes([am5themes_Animated.new(root)]);
                        
                                        // Create chart
                                        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
                                        // start and end angle must be set both for chart and series
                                        var chart = root.container.children.push(
                                            am5percent.PieChart.new(root, {
                                                startAngle: 180,
                                                endAngle: 360,
                                                layout: root.verticalLayout,
                                                centerX: am5.percent(-20),
                                                innerRadius: am5.percent(50),
                                                width: am5.percent(70)
                                            })
                                        );
                        
                                        // Create series
                                        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
                                        // start and end angle must be set both for chart and series
                                        var series = chart.series.push(
                                            am5percent.PieSeries.new(root, {
                                                startAngle: 180,
                                                endAngle: 360,
                                                valueField: "value",
                                                categoryField: "category",
                                                alignLabels: false,
                                            })
                                        );
                        
                                        series.labels.template.setAll({
                                            fontWeight: "400",
                                            fontSize: 13,
                                            fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
                                        });
                        
                                        series.states.create("hidden", {
                                            startAngle: 180,
                                            endAngle: 180,
                                        });
                        
                                        series.slices.template.setAll({
                                            cornerRadius: 5,
                                        });
                        
                                        series.ticks.template.setAll({
                                            forceHidden: true,
                                        });
                        
                                        // Set data
                                        // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
                                        series.data.setAll(dataArr);
                                        // series.data.setAll([{
                                        //         value: 10,
                                        //         category: "One",
                                        //         fill: am5.color(KTUtil.getCssVariableValue("--bs-primary")),
                                        //     },
                                        //     {
                                        //         value: 9,
                                        //         category: "Two",
                                        //         fill: am5.color(KTUtil.getCssVariableValue("--bs-success")),
                                        //     },
                                        //     {
                                        //         value: 6,
                                        //         category: "Three",
                                        //         fill: am5.color(KTUtil.getCssVariableValue("--bs-danger")),
                                        //     },
                                        //     {
                                        //         value: 5,
                                        //         category: "Four",
                                        //         fill: am5.color(KTUtil.getCssVariableValue("--bs-warning")),
                                        //     },
                                        //     {
                                        //         value: 4,
                                        //         category: "Five",
                                        //         fill: am5.color(KTUtil.getCssVariableValue("--bs-info")),
                                        //     },
                                        //     {
                                        //         value: 3,
                                        //         category: "Six",
                                        //         fill: am5.color(KTUtil.getCssVariableValue("--bs-secondary")),
                                        //     },
                                        // ]);
                        
                                        series.appear(1000, 100);
                                    });
                                };
                        
                                // Public methods
                                return {
                                    init1: function() {
                        
                                        var categoriesArr = localStorageData.call_category_sent.outbound_category
                                        var valuesArr = localStorageData.call_category_sent.outbound_call_total
                                        var dataArr = []

                                        valuesArr.map((e, i) => {
                                            dataArr.push({
                                                value: valuesArr[i],
                                                category: categoriesArr[i],
                                            })
                                        })
                                        initChart(dataArr, "kt_charts_widget_17_chart");
                        
                        
                                        var totalOutboundCallSend = 0;
                                        for (var i = 0; i < valuesArr.length; i++) {
                                            totalOutboundCallSend += valuesArr[i];
                                        }
                        
                                        var total_outbound_call_sent = document.querySelector('#outboundContentPlaybyCategory');
                                        if (!total_outbound_call_sent) {
                                            return ''
                                        } else {
                                            total_outbound_call_sent.innerHTML = totalOutboundCallSend;
                                        }
                        
                        
                        
                        
                        
                                    },
                                };
                            })();
                        
                            // Webpack support
                            if (typeof module !== "undefined") {
                                module.exports = KTChartsWidget17;
                            }
                        
                            // On document ready
                            KTUtil.onDOMContentLoaded(function() {
                                KTChartsWidget17.init1();
                            });

                }).catch(err=>{
                    console.log(err)
                    $(".preloader").hide();
                })
    }
    Reload ()

        searchistory.addEventListener('click', function() {
            var fromDate = (document.getElementById("filter-fromDate").value).split('-')
            var toDate = (document.getElementById("filter-toDate").value).split('-')
            thisMonth.innerHTML = `From ${fromDate[2]} ${month[parseInt(fromDate[1])-1]} ${fromDate[0]} To ${toDate[2]} ${month[parseInt(toDate[1])-1]} ${toDate[0]}`;
            var to_data = document.getElementById("filter-toDate").value;
            var from_data =document.getElementById("filter-fromDate").value;
            
            if (to_data == "" || from_data == "" ) {
                return false;
              }
           
            $(".preloader").show();
            document.querySelector('#outboundContentPlaybyCategory').innerHTML = "0"
            document.querySelector('#kt_charts_widget_17_chart').innerHTML = " "

            setTimeout(() => {
                Reload ()
            }, 2000);
        })

        
    }
  
}

        // ================================================================================================================================================================
            // Chart 8 => Outbound Content Played by Category
        // ================================================================================================================================================================

if (document.querySelector("#inbound_received")) {

            // get screenshot
            screenShot("#BTN10", "#ELEMENT10");
            
            window.onload = () => {
                $(".preloader").show();
        
                // ================================================================================================================================================================
                // Begin:: Reset filter fields 
        // Begin:: Reset filter fields 
                // Begin:: Reset filter fields 
                // ================================================================================================================================================================
        
                var resetBtn = document.getElementById("filter-reset")
                const fieldUrl = chart_url_12;
                async function returnField() {
                    const response = await fetch(fieldUrl)
                    const data = await response.json()
        
                    var filterArea = document.getElementById("filter-area")
                    var filterDistrict = document.getElementById("filter-district")
                    var filterDivision = document.getElementById("filter-division")
        
                    filterArea.innerHTML = '<option value="" default >Select Area</option>'
                    filterDistrict.innerHTML = '<option value="" default >Select District</option>'
                    filterDivision.innerHTML = '<option value="" default >Select Division</option>'
        
                    data.data.area.map(value => {
                        filterArea.innerHTML += `<option value="${value}">${value}</option>`
                        
                    })
                    data.data.district.map(value => {
                        filterDistrict.innerHTML += `<option value="${value}">${value}</option>`
                    })
                    data.data.division.map(value => {
                        filterDivision.innerHTML += `<option value="${value}">${value}</option>`
                    })
        
                }
                returnField()
                resetBtn.addEventListener('click', function() {
                    
        
                
                    
                        var filterGender = document.getElementById("filter-gender")
                        var filterSelectFromDate = document.getElementById("filter-fromDate")
                        var filterSelectToDate = document.getElementById("filter-toDate")
                        var filterArea = document.getElementById("filter-area")
                        var filterDistrict = document.getElementById("filter-district")
                        var filterDivision = document.getElementById("filter-division")
        
                        filterArea.innerHTML = '<option value="" default >Select Area</option>'
                        filterDistrict.innerHTML = '<option value="" default >Select District</option>'
                        filterDivision.innerHTML = '<option value="" default >Select Division</option>'
                        filterGender.innerHTML = ''
                        filterSelectFromDate.value = ''
                        filterSelectToDate.value = ''
        
                        filterGender.innerHTML = `  <option value="" default >Select Gender</option>
                                                        <option value="male">Male</option>
                                                        <option value="female">Female</option>
                                                        <option value="others">Others</option>`
                        returnField()
                        $('#filter-area').attr("disabled", false);
                        $('#filter-district').attr("disabled", false);
                        $('#filter-division').attr("disabled", false);
                        
                    
                        
                })
                // ================================================================================================================================================================
                // Begin:: Reset filter fields
                // ================================================================================================================================================================
        
        
        
        
                var searchistory = document.getElementById("filter-searchhiostory")
        
        
                // Class definition
                var KTChartsWidget71 = (function() {
                    // Private methods
                    var initChart = function(tabSelector, chartSelector, data, initByDefault, category) {
                        var element = document.querySelector(chartSelector);
        
                        if (!element) {
                            return;
                        }
        
                        var height = parseInt(KTUtil.css(element, "height"));
                        var labelColor = KTUtil.getCssVariableValue("--bs-gray-900");
        
                        var borderColor = KTUtil.getCssVariableValue(
                            "--bs-border-dashed-color"
                        );
        
                        var options = {
                            series: [{
                                name: "Calls",
                                data: data,
                            }, ],
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
                                    columnWidth: ["22%"],
                                    borderRadius: 5,
                                    dataLabels: {
                                        position: "top", // top, center, bottom
                                    },
                                    startingShape: "flat",
                                },
                            },
                            legend: {
                                show: false,
                            },
                            dataLabels: {
                                enabled: true,
                                offsetY: -28,
                                style: {
                                    fontSize: "13px",
                                    colors: ["labelColor"],
                                },
                            },
                            stroke: {
                                show: true,
                                width: 2,
                                colors: ["transparent"],
                            },
                            xaxis: {
                                categories: category,
                                axisBorder: {
                                    show: false,
                                },
                                axisTicks: {
                                    show: false,
                                },
                                labels: {
                                    style: {
                                        colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                        fontSize: "13px",
                                    },
                                },
                                crosshairs: {
                                    fill: {
                                        gradient: {
                                            opacityFrom: 0,
                                            opacityTo: 0,
                                        },
                                    },
                                },
                            },
                            yaxis: {
                                labels: {
                                    style: {
                                        colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                        fontSize: "13px",
                                    },
                                },
                            },
                            fill: {
                                opacity: 1,
                                colors: ["#70CC8A"],
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
                            },
                            colors: [
                                KTUtil.getCssVariableValue("--bs-primary"),
                                KTUtil.getCssVariableValue("--bs-light-primary"),
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
                        
        
                        var init = false;
                        var tab = document.querySelector(tabSelector);
        
                        if (initByDefault === true) {
                            chart.render();
                            init = true;
                        }
        
                        tab.addEventListener("shown.bs.tab", function(event) {
                            if (init == false) {
                                chart.render();
                                init = true;
                            }
                        });
                    };
        
                    // Public methods
                    return {
                        init1: function(data) {
        
                            initChart(
                                data.tabId2,
                                data.chartId2,
                                data. outbound_dhadha_data,
                                data. status_dhadha,
                                data. outbound_field_dhadha,
                            );
                            initChart(
                                data.tabId3,
                                data.chartId3,
                                data.outbound_golpo_data,
                                data.status_golpo,
                                data.outbound_field_golpo,
                            );
                            initChart(
                                data.tabId4,
                                data.chartId4,
                                data.outbound_gaan_data,
                                data.status_gaan,
                                data.outbound_field_gaan,
        
                            );
                            initChart(
                                data.tabId5,
                                data.chartId5,
                                data.outbound_kobita_data,
                                data.status_kobita,
                                data.outbound_field_kobita,
                            );
                            
                            
                            
        
        
                        },
                    };
                })();
        
                // Webpack support
                if (typeof module !== "undefined") {
                    module.exports = KTChartsWidget71;
                }
        
        
        
        
        
                const url = chart_url_9;
                function Reload (){
                    async function returndata() {
                        const response = await fetch(url, {
                            method: "POST",
                            headers: {
                                "Content-type": "application/json; charset=UTF-8"
                            },
                            body: JSON.stringify({
                                gender: document.getElementById("filter-gender").value,
                                area: document.getElementById("filter-area").value,
                                district: document.getElementById("filter-district").value,
                                division: document.getElementById("filter-division").value,
                                toDate: document.getElementById("filter-toDate").value,
                                fromDate: document.getElementById("filter-fromDate").value,
            
                            })
                        })
                        const data = await response.json()
                        return data
                    }
            
                    returndata().then(data => {
                        $(".preloader").hide();
            
                        // var localStorageData = JSON.parse(window.localStorage.getItem("chartData"))
                        var localStorageData = data.data
                            // total numbers of call history
                            
        
        
                            
                                    // outbound_student
        
                                    if (localStorageData.call_category_content.outbound_call_count_content_dhadha == 0) {
                                        var outbound_call_count_content_dhadha = [0, 0, 0, 0]
                                    } else {
                                        var outbound_call_count_content_dhadha = localStorageData.call_category_content.outbound_call_count_content_dhadha
                                    }
                                    // outbound_teacher
        
                                    if (localStorageData.call_category_content.outbound_call_count_content_gaan == 0) {
                                        var outbound_call_count_content_gaan = [0, 0, 0, 0]
                                    } else {
                                        var outbound_call_count_content_gaan = localStorageData.call_category_content.outbound_call_count_content_gaan
                                    }
                                    // outbound_call_category_category
                                    if (localStorageData.call_category_content.outbound_call_count_content_golpo == 0) {
                                        var outbound_call_count_content_golpo = [0, 0, 0, 0]
                                    } else {
                                        var outbound_call_count_content_golpo = localStorageData.call_category_content.outbound_call_count_content_golpo
                                    }
        
                                    // outbound_staff
                                    if (localStorageData.call_category_content.outbound_call_count_content_kobita == 0) {
                                        var outbound_call_count_content_kobita = [0, 0, 0, 0]
                                    } else {
                                        var outbound_call_count_content_kobita = localStorageData.call_category_content.outbound_call_count_content_kobita
                                    }
        
                                    var inbound_call_category_All_total = []
                                    outbound_call_count_content_dhadha.map((e,i)=>{
                                        inbound_call_category_All_total.push(
                                            outbound_call_count_content_dhadha[i]+
                                            outbound_call_count_content_gaan[i]+
                                            outbound_call_count_content_golpo[i]+
                                            outbound_call_count_content_kobita[i])
                                    })
                                    totalCount([
                                        '#outbound_all_totla_dhada',
                                        '#outbound_all_totla_gaan',
                                        '#outbound_all_totla_golpo',
                                        '#outbound_all_totla_kobita',
                                    ],[
                                        outbound_call_count_content_dhadha,
                                        outbound_call_count_content_gaan,
                                        outbound_call_count_content_golpo,
                                        outbound_call_count_content_kobita,
                                    ])
        
            
                        // On document ready
                        KTUtil.onDOMContentLoaded(function() {
                            KTChartsWidget71.init1(
                                {
                                    tabId2:"#kt_charts_widget_71_tab_25",
                                    chartId2:"#kt_charts_widget_71_chart_25", 
                            chartId2:"#kt_charts_widget_71_chart_25", 
                                    chartId2:"#kt_charts_widget_71_chart_25", 
                                    outbound_dhadha_data:outbound_call_count_content_dhadha,
                                    status_dhadha:true, 
                            status_dhadha:true, 
                                    status_dhadha:true, 
                                    outbound_field_dhadha:localStorageData.call_category_content.outbound_call_category_content_dhadha,
                                    
                                    tabId3:"#kt_charts_widget_71_tab_23",
                                    chartId3:"#kt_charts_widget_71_chart_23", 
                            chartId3:"#kt_charts_widget_71_chart_23", 
                                    chartId3:"#kt_charts_widget_71_chart_23", 
                                    outbound_golpo_data:outbound_call_count_content_golpo,
                                    status_golpo:true, 
                            status_golpo:true, 
                                    status_golpo:true, 
                                    outbound_field_golpo:localStorageData.call_category_content.outbound_call_category_content_golpo,
        
                                    tabId4:"#kt_charts_widget_71_tab_24",
                                    chartId4:"#kt_charts_widget_71_chart_24", 
                            chartId4:"#kt_charts_widget_71_chart_24", 
                                    chartId4:"#kt_charts_widget_71_chart_24", 
                                    outbound_gaan_data:outbound_call_count_content_gaan,
                                    status_gaan:true, 
                            status_gaan:true, 
                                    status_gaan:true, 
                                    outbound_field_gaan:localStorageData.call_category_content.outbound_call_category_content_gaan,
        
                                    
                                    tabId5:"#kt_charts_widget_71_tab_22",
                                    chartId5:"#kt_charts_widget_71_chart_22", 
                            chartId5:"#kt_charts_widget_71_chart_22", 
                                    chartId5:"#kt_charts_widget_71_chart_22", 
                                    outbound_kobita_data:outbound_call_count_content_kobita,
                                    status_kobita:true, 
                            status_kobita:true, 
                                    status_kobita:true, 
                                    outbound_field_kobita:localStorageData.call_category_content.outbound_call_category_content_kobita,
        
                                    
                                });
                        });
                    }).catch(err=>{
                        console.log(err)
                        $(".preloader").hide();
                    })
                }
        
                Reload ()
        
                searchistory.addEventListener('click', function() {
                    var to_data = document.getElementById("filter-toDate").value;
                    var from_data =document.getElementById("filter-fromDate").value;
                    
                    if (to_data == "" || from_data == "" ) {
                        return false;
                        }
                    
                    $(".preloader").show();
        
                
        
                    document.querySelector("#outbound_all_totla_dhada").innerHTML = 0
                    document.querySelector("#outbound_all_totla_gaan").innerHTML = 0
                    document.querySelector("#outbound_all_totla_golpo").innerHTML = 0
                    document.querySelector("#outbound_all_totla_kobita").innerHTML = 0
        
                    document.querySelector("#kt_charts_widget_71_chart_22").innerHTML = ""
                    document.querySelector("#kt_charts_widget_71_chart_23").innerHTML = ""
                    document.querySelector("#kt_charts_widget_71_chart_24").innerHTML = ""
                    document.querySelector("#kt_charts_widget_71_chart_25").innerHTML = ""
        
                    setTimeout(()=>{
                        Reload ()
                    },3000)
        
                })
        
            }
        }
        
        // ================================================================================================================================================================
            // Chart 9 => Outbound Completed Calls
        // ================================================================================================================================================================

if (document.querySelector("#inbound_send")) {
    const month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    var thisMonth = document.querySelector('.this_month');
   
    const d = new Date();
    let year = d.getFullYear();
    thisMonth.innerHTML = `For The Month of ${month[d.getMonth()]}`;
    // get screenshot
    screenShot("#BTN7", "#ELEMENT7");

    window.onload = () => {
        // $(".preloader").show();
        // ================================================================================================================================================================
        // Begin:: Reset filter fields 
        // ================================================================================================================================================================

        var resetBtn = document.getElementById("filter-reset")
        const fieldUrl = chart_url_12;
        async function returnField() {
            const response = await fetch(fieldUrl)
            const data = await response.json()

            var filterArea = document.getElementById("filter-area")
            var filterDistrict = document.getElementById("filter-district")
            var filterDivision = document.getElementById("filter-division")

            filterArea.innerHTML = '<option value="" default >Select Area</option>'
            filterDistrict.innerHTML = '<option value="" default >Select District</option>'
            filterDivision.innerHTML = '<option value="" default >Select Division</option>'

            data.data.area.map(value => {
                filterArea.innerHTML += `<option value="${value}">${value}</option>`
                
            })
            data.data.district.map(value => {
                filterDistrict.innerHTML += `<option value="${value}">${value}</option>`
            })
            data.data.division.map(value => {
                filterDivision.innerHTML += `<option value="${value}">${value}</option>`
            })

        }
        returnField()
        resetBtn.addEventListener('click', function() {
        
            
                var filterGender = document.getElementById("filter-gender")
                var filterSelectFromDate = document.getElementById("filter-fromDate")
                var filterSelectToDate = document.getElementById("filter-toDate")
                var filterArea = document.getElementById("filter-area")
                var filterDistrict = document.getElementById("filter-district")
                var filterDivision = document.getElementById("filter-division")

                filterArea.innerHTML = '<option value="" default >Select Area</option>'
                filterDistrict.innerHTML = '<option value="" default >Select District</option>'
                filterDivision.innerHTML = '<option value="" default >Select Division</option>'
                filterGender.innerHTML = ''
                filterSelectFromDate.value = ''
                filterSelectToDate.value = ''

                filterGender.innerHTML = `  <option value="" default >Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="others">Others</option>`
                returnField()
                $('#filter-area').attr("disabled", false);
                $('#filter-district').attr("disabled", false);
                $('#filter-division').attr("disabled", false);
                
            
                
        })
        // ================================================================================================================================================================
        // Begin:: Reset filter fields
        // ================================================================================================================================================================





        var searchistory = document.getElementById("filter-searchhiostory")
        const url = chart_url_8;
        function Reload (){
            async function returndata() {
                const response = await fetch(url, {
                    method: "POST",
                    headers: {
                        "Content-type": "application/json; charset=UTF-8"
                    },
                    body: JSON.stringify({
                        gender: document.getElementById("filter-gender").value,
                        area: document.getElementById("filter-area").value,
                        district: document.getElementById("filter-district").value,
                        division: document.getElementById("filter-division").value,
                        fromDate: document.getElementById("filter-fromDate").value,
                        toDate: document.getElementById("filter-toDate").value,
    
                    })
                })
                const data = await response.json()
                return data
            }
    
            returndata().then(data => {
                        $(".preloader").hide();
    
                        var localStorageData = data.data
                            // total numbers of call history
                                // Class definition
                                var KTChartsWidget17 = (function() {
                                    // Private methods
                                    var initChart = function(dataArr, id) {
                                        // Check if amchart library is included
                                        if (typeof am5 === "undefined") {
                                            return;
                                        }

                                        var element = document.getElementById(id);

                                        if (!element) {
                                            return;
                                        }

                                        am5.ready(function() {
                                            // Create root element
                                            // https://www.amcharts.com/docs/v5/getting-started/#Root_element

                                            if(window.root4){
                                                window.root4.dispose();
                                            }
                                            var root = am5.Root.new(element);
                                            window.root4 = root

                                            // for remove amchart5 logo
                                            if(root._logo){
                                                root._logo.dispose();
                                            }
                                            // Set themes
                                            // https://www.amcharts.com/docs/v5/concepts/themes/
                                            root.setThemes([am5themes_Animated.new(root)]);

                                            // Create chart
                                            // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
                                            // start and end angle must be set both for chart and series
                                            var chart = root.container.children.push(
                                                am5percent.PieChart.new(root, {
                                                    startAngle: 180,
                                                    endAngle: 360,
                                                    layout: root.verticalLayout,
                                                    centerX: am5.percent(-20),
                                                    innerRadius: am5.percent(50),
                                                    width: am5.percent(70)
                                                })
                                            );

                                            // Create series
                                            // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
                                            // start and end angle must be set both for chart and series
                                            var series = chart.series.push(
                                                am5percent.PieSeries.new(root, {
                                                    startAngle: 180,
                                                    endAngle: 360,
                                                    valueField: "value",
                                                    categoryField: "category",
                                                    alignLabels: false,
                                                })
                                            );

                                            series.labels.template.setAll({
                                                fontWeight: "400",
                                                fontSize: 13,
                                                fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
                                            });

                                            series.states.create("hidden", {
                                                startAngle: 180,
                                                endAngle: 180,
                                            });

                                            series.slices.template.setAll({
                                                cornerRadius: 5,
                                            });

                                            series.ticks.template.setAll({
                                                forceHidden: true,
                                            });

                                            // Set data
                                            // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data
                                            series.data.setAll(dataArr);

                                            series.appear(1000, 100);
                                        });
                                    };

                                    // Public methods
                                    return {
                                        init2: function() {



                                            var categoriesArr = localStorageData.call_category_sent.inbound_category
                                            var valuesArr = localStorageData.call_category_sent.inbound_call_total
                                            var dataArr = []
                                            valuesArr.map((e, i) => {
                                                dataArr.push({
                                                    value: valuesArr[i],
                                                    category: categoriesArr[i],
                                                })
                                            })
                                            initChart(dataArr, "kt_charts_widget_18_chart");

                                            var totalInboundCallSend = 0;
                                            for (var i = 0; i < valuesArr.length; i++) {
                                                totalInboundCallSend += valuesArr[i];
                                            }


                                            var total_inbound_call_received = document.querySelector('#inboundContentPlaybyCategory');


                                            if (!total_inbound_call_received) {
                                                return ''
                                            } else {
                                                total_inbound_call_received.innerHTML = totalInboundCallSend;
                                            }


                                        },
                                    };
                                })();

                                // Webpack support
                                if (typeof module !== "undefined") {
                                    module.exports = KTChartsWidget17;
                                }

                                // On document ready
                                KTUtil.onDOMContentLoaded(function() {
                                    KTChartsWidget17.init2();
                                });
    
                            
    
                    
    
                    }).catch(err=>{
                        console.log(err)
                        $(".preloader").hide();
                    })
        }
        Reload ()
    
            searchistory.addEventListener('click', function() {
                var fromDate = (document.getElementById("filter-fromDate").value).split('-')
                var toDate = (document.getElementById("filter-toDate").value).split('-')
                thisMonth.innerHTML = `From ${fromDate[2]} ${month[parseInt(fromDate[1])-1]} ${fromDate[0]} To ${toDate[2]} ${month[parseInt(toDate[1])-1]} ${toDate[0]}`;
                var to_data = document.getElementById("filter-toDate").value;
            var from_data =document.getElementById("filter-fromDate").value;
            
            if (to_data == "" || from_data == "" ) {
                return false;
                }
            
                $(".preloader").show();
                document.querySelector('#inboundContentPlaybyCategory').innerHTML = "0"
                document.querySelector('#kt_charts_widget_18_chart').innerHTML = ""
    
                setTimeout(() => {
                    Reload ()
                }, 2000);
            })

            

    }

}

        // ================================================================================================================================================================
            // Chart 7 => Outbound Content Played by Stakeholder
        // ================================================================================================================================================================

if (document.querySelector("#outbound_receive")) {

    // get screenshot
    screenShot("#BTN11", "#ELEMENT11");
    // var localStorageData = JSON.parse(window.localStorage.getItem("chartData"))
    window.onload = () => {
        $(".preloader").show();
        // ================================================================================================================================================================
        // Begin:: Reset filter fields 
        // ================================================================================================================================================================

        var resetBtn = document.getElementById("filter-reset")
        const fieldUrl = chart_url_12;
        async function returnField() {
            const response = await fetch(fieldUrl)
            const data = await response.json()

            var filterArea = document.getElementById("filter-area")
            var filterDistrict = document.getElementById("filter-district")
            var filterDivision = document.getElementById("filter-division")

            filterArea.innerHTML = '<option value="" default >Select Area</option>'
            filterDistrict.innerHTML = '<option value="" default >Select District</option>'
            filterDivision.innerHTML = '<option value="" default >Select Division</option>'

            data.data.area.map(value => {
                filterArea.innerHTML += `<option value="${value}">${value}</option>`
                
            })
            data.data.district.map(value => {
                filterDistrict.innerHTML += `<option value="${value}">${value}</option>`
            })
            data.data.division.map(value => {
                filterDivision.innerHTML += `<option value="${value}">${value}</option>`
            })

        }
        returnField()
        resetBtn.addEventListener('click', function() {
        
            
                var filterGender = document.getElementById("filter-gender")
                var filterSelectFromDate = document.getElementById("filter-fromDate")
                var filterSelectToDate = document.getElementById("filter-toDate")
                var filterArea = document.getElementById("filter-area")
                var filterDistrict = document.getElementById("filter-district")
                var filterDivision = document.getElementById("filter-division")

                filterArea.innerHTML = '<option value="" default >Select Area</option>'
                filterDistrict.innerHTML = '<option value="" default >Select District</option>'
                filterDivision.innerHTML = '<option value="" default >Select Division</option>'
                filterGender.innerHTML = ''
                filterSelectFromDate.value = ''
                filterSelectToDate.value = ''

                filterGender.innerHTML = `  <option value="" default >Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="others">Others</option>`
                returnField()
                $('#filter-area').attr("disabled", false);
                $('#filter-district').attr("disabled", false);
                $('#filter-division').attr("disabled", false);
                
            
                
        })
        // ================================================================================================================================================================
        // Begin:: Reset filter fields
        // ================================================================================================================================================================





        var searchistory = document.getElementById("filter-searchhiostory")

        // Class definition
        var KTChartsWidget32 = (function() {
            // Private methods
            var initChart = function(tabSelector, chartSelector, data, initByDefault, category) {
                var element = document.querySelector(chartSelector);

                if (!element) {
                    return;
                }

                var height = parseInt(KTUtil.css(element, "height"));
                var labelColor = KTUtil.getCssVariableValue("--bs-gray-900");

                var borderColor = KTUtil.getCssVariableValue(
                    "--bs-border-dashed-color"
                );

                var options = {
                    series: [{
                        name: "Calls",
                        data: data,
                    }, ],
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
                            columnWidth: ["22%"],
                            borderRadius: 5,
                            dataLabels: {
                                position: "top", // top, center, bottom
                            },
                            startingShape: "flat",
                        },
                    },
                    legend: {
                        show: false,
                    },
                    dataLabels: {
                        enabled: true,
                        offsetY: -28,
                        style: {
                            fontSize: "13px",
                            colors: ["labelColor"],
                        },
                    },
                    stroke: {
                        show: true,
                        width: 2,
                        colors: ["transparent"],
                    },
                    xaxis: {
                        // categories: ["Grossey", "Pet Food", "Flowers", "Restaurant"],
                        categories: category,
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
                        },
                        labels: {
                            style: {
                                colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                fontSize: "13px",
                            },
                        },
                        crosshairs: {
                            fill: {
                                gradient: {
                                    opacityFrom: 0,
                                    opacityTo: 0,
                                },
                            },
                        },
                    },
                    yaxis: {
                        labels: {
                            style: {
                                colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                fontSize: "13px",
                            },
                        },
                    },
                    fill: {
                        opacity: 1,
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
                    },
                    colors: [
                        KTUtil.getCssVariableValue("--bs-primary"),
                        KTUtil.getCssVariableValue("--bs-light-primary"),
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

                var init = false;
                var tab = document.querySelector(tabSelector);

                if (initByDefault === true) {
                    chart.render();
                    init = true;
                }

                tab.addEventListener("shown.bs.tab", function(event) {
                    if (init == false) {
                        chart.render();
                        init = true;
                    }
                });
            };

            // Public methods
            return {
                init: function(data) {

                    

                    initChart(
                        data.tabId1,
                        data.chartId1,
                        data.outbound_All_data,
                        data.status_All,
                        data.outbound_field_all
                    );
                    initChart(
                        data.tabId2,
                        data.chartId2,
                        data.outbound_student_data,
                        data.status_student,
                        data.outbound_field_student
                    );

                    initChart(
                        data.tabId3,
                        data.chartId3,
                        data.outbound_staff_data,
                        data.status_staff,
                        data.outbound_field_staff
                    );

                    initChart(
                        data.tabId4,
                        data.chartId4,
                        data.outbound_teacher_data,
                        data.status_teacher,
                        data.outbound_field_teacher
                    );

                    initChart(
                        data.tabId5,
                        data.chartId5,
                        data.outbound_govt_data,
                        data.status_govt,
                        data.outbound_field_govt
                    );

                    initChart(
                        data.tabId6,
                        data.chartId6,
                        data.outbound_unspecified_data,
                        data.status_unspecified,
                        data.outbound_field_unspecified
                    );


                },
            };
        })();

        // Webpack support
        if (typeof module !== "undefined") {
            module.exports = KTChartsWidget32;
        }



        const url = chart_url_7;
        function Reload (){
            async function returndata() {
                const response = await fetch(url, {
                    method: "POST",
                    headers: {
                        "Content-type": "application/json; charset=UTF-8"
                    },
                    body: JSON.stringify({
                        gender: document.getElementById("filter-gender").value,
                        area: document.getElementById("filter-area").value,
                        district: document.getElementById("filter-district").value,
                        division: document.getElementById("filter-division").value,
                        toDate: document.getElementById("filter-toDate").value,
                        fromDate: document.getElementById("filter-fromDate").value,
    
                    })
                })
                const data = await response.json()
                return data
            }
    
            returndata().then(data => {
                $(".preloader").hide();
    
                var localStorageData = data.data



                            // outbound_student

                            if (localStorageData.call_category.outbound_call_category_total_student == 0) {
                                var outbound_call_category_total_student = [0, 0, 0, 0]
                            } else {
                            var outbound_call_category_total_student = localStorageData.call_category.outbound_call_category_total_student

                            }
                            // outbound_teacher

                            if (localStorageData.call_category.outbound_call_category_total_teacher == 0) {
                                var outbound_call_category_total_teacher = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_total_teacher = localStorageData.call_category.outbound_call_category_total_teacher
                            }
                            // outbound_category
                            if (localStorageData.call_category.category_outbound == 0) {
                                var outbound_call_category_category = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_category = localStorageData.call_category.category_outbound
                            }
                            // outbound_govt
                            if (localStorageData.call_category.outbound_call_category_total_govt == 0) {
                                var outbound_call_category_total_govt = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_total_govt = localStorageData.call_category.outbound_call_category_total_govt
                            }

                            // outbound_staff
                            if (localStorageData.call_category.outbound_call_category_total_staff == 0) {
                                var outbound_call_category_total_staff = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_total_staff = localStorageData.call_category.outbound_call_category_total_staff
                            }

                            // outbound_unspecified
                            if (localStorageData.call_category.outbound_call_category_total_unspecified == 0) {
                                var outbound_call_category_total_unspecified = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_total_unspecified = localStorageData.call_category.outbound_call_category_total_unspecified
                            }
                            


                            // outbound_total
                            var outbound_call_category_All_total = localStorageData.call_category.outbound_call_category_total
                            
                            totalCount([
                                '#Outbound_all_totla',
                                '#Outbound_all_totla_student',
                                '#Outbound_all_totla_staff',
                                '#Outbound_all_totla_teacher',
                                '#Outbound_all_totla_govt',
                                '#Outbound_all_totla_Unspecified',
                            ],[
                                outbound_call_category_All_total,
                                outbound_call_category_total_student,
                                outbound_call_category_total_staff,
                                outbound_call_category_total_teacher,
                                outbound_call_category_total_govt,
                                outbound_call_category_total_unspecified,
                            ])
    
                
                // On document ready
                KTUtil.onDOMContentLoaded(function() {
                    KTChartsWidget32.init({
                        tabId1:"#kt_charts_widget_32_tab_1",
                        chartId1:"#kt_charts_widget_32_chart_1", 
                        outbound_All_data:outbound_call_category_All_total,
                        status_All:true,
                        outbound_field_all:outbound_call_category_category,

                        tabId2:"#kt_charts_widget_32_tab_2",
                        chartId2:"#kt_charts_widget_32_chart_2", 
                        outbound_student_data:outbound_call_category_total_student,
                        status_student:true, 
                        outbound_field_student:outbound_call_category_category,

                        tabId3:"#kt_charts_widget_32_tab_3",
                        chartId3:"#kt_charts_widget_32_chart_3", 
                        outbound_staff_data:outbound_call_category_total_staff,
                        status_staff:true, 
                        outbound_field_staff:outbound_call_category_category,

                        tabId4:"#kt_charts_widget_32_tab_4",
                        chartId4:"#kt_charts_widget_32_chart_4", 
                        outbound_teacher_data:outbound_call_category_total_teacher,
                        status_teacher:true, 
                        outbound_field_teacher:outbound_call_category_category,

                        tabId5:"#kt_charts_widget_32_tab_5",
                        chartId5:"#kt_charts_widget_32_chart_5", 
                        outbound_govt_data:outbound_call_category_total_govt,
                        status_govt:true, 
                        outbound_field_govt:outbound_call_category_category,
                        
                        tabId6:"#kt_charts_widget_32_tab_6",
                        chartId6:"#kt_charts_widget_32_chart_6", 
                        outbound_unspecified_data:outbound_call_category_total_unspecified,
                        status_unspecified:true, 
                        outbound_field_unspecified:outbound_call_category_category

                        
                    });
                });
            }).catch(err=>{
                console.log(err)
                $(".preloader").hide();
            })
        }
        Reload ()

        searchistory.addEventListener('click', function() {
            var to_data = document.getElementById("filter-toDate").value;
            var from_data =document.getElementById("filter-fromDate").value;
            
            if (to_data == "" || from_data == "" ) {
                return false;
                }
            
            $(".preloader").show();
            document.querySelector("#kt_charts_widget_32_chart_1").innerHTML = ""
            document.querySelector("#kt_charts_widget_32_chart_2").innerHTML = ""
            document.querySelector("#kt_charts_widget_32_chart_3").innerHTML = ""
            document.querySelector("#kt_charts_widget_32_chart_4").innerHTML = ""
            document.querySelector("#kt_charts_widget_32_chart_5").innerHTML = ""
            document.querySelector("#kt_charts_widget_32_chart_6").innerHTML = ""

            document.querySelector("#Outbound_all_totla").innerHTML = "0"
            document.querySelector("#Outbound_all_totla_student").innerHTML = "0"
            document.querySelector("#Outbound_all_totla_staff").innerHTML = "0"
            document.querySelector("#Outbound_all_totla_teacher").innerHTML = "0"
            document.querySelector("#Outbound_all_totla_govt").innerHTML = "0"
            document.querySelector("#Outbound_all_totla_Unspecified").innerHTML = "0"


            setTimeout(()=>{
                Reload ()
            },3000)
        })

    }

}


        // ================================================================================================================================================================
            // Chart 10 => Call Received Frequency Chart
        // ================================================================================================================================================================

if (document.querySelector("#hourly")) {
    // get screenshot
    screenShot("#BTN8", "#ELEMENT8");

    window.onload = () => {
        $(".preloader").show();

    // Class definition
    var KTChartsWidget11 = (function() {
        // Private methods
        var initChart = function(chartSelector, data, initByDefault, times, hourly_call_count) {
            var element = document.querySelector(chartSelector);
            var height = parseInt(KTUtil.css(element, "height"));

            if (!element) {
                return;
            }

            var labelColor = KTUtil.getCssVariableValue("--bs-gray-500");
            var borderColor = KTUtil.getCssVariableValue("--bs-border-dashed-color");
            var baseColor = KTUtil.getCssVariableValue("--bs-success");
            var lightColor = KTUtil.getCssVariableValue("--bs-success");

            var options = {
                series: [{
                    name: "Calls",
                    data: data,
                }, ],
                chart: {
                    fontFamily: "inherit",
                    type: "area",
                    height: height,
                    toolbar: {
                        show: false,
                    },
                },
                plotOptions: {},
                legend: {
                    show: false,
                },
                dataLabels: {
                    enabled: false,
                },
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.3,
                        opacityTo: 0.7,
                        stops: [0, 90, 100],
                    },
                },
                stroke: {
                    curve: "smooth",
                    show: true,
                    width: 3,
                    colors: [baseColor],
                },
                xaxis: {
                    categories: times,
                    axisBorder: {
                        show: false,
                    },
                    axisTicks: {
                        show: false,
                    },
                    tickAmount: times.length + 1,
                    labels: {
                        rotate: 0,
                        rotateAlways: true,
                        style: {
                            colors: labelColor,
                            fontSize: "13px",
                        },
                    },
                    crosshairs: {
                        position: "front",
                        stroke: {
                            color: baseColor,
                            width: 1,
                            dashArray: 3,
                        },
                    },
                    tooltip: {
                        enabled: true,
                        formatter: undefined,
                        offsetY: 0,
                        style: {
                            fontSize: "13px",
                        },
                    },
                },
                yaxis: {
                    tickAmount: 4,
                    max: Math.max(...hourly_call_count) + 500,
                    min: 0,
                    labels: {
                        style: {
                            colors: labelColor,
                            fontSize: "13px",
                        },
                    },
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
                            return +val;
                        },
                    },
                },
                colors: [lightColor],
                grid: {
                    borderColor: borderColor,
                    strokeDashArray: 4,
                    yaxis: {
                        lines: {
                            show: true,
                        },
                    },
                },
                markers: {
                    strokeColor: baseColor,
                    strokeWidth: 3,
                },
            };

            var chart = new ApexCharts(element, options);
            var init = false;
            // var tab = document.querySelector(tabSelector);

            if (initByDefault === true) {
                chart.render();
                init = true;
            }

            // tab.addEventListener("shown.bs.tab", function(event) {
            //     if (init == false) {
            //         chart.render();
            //         init = true;
            //     }
            // });
        };

        // Public methods
        return {
            init: function( data) {

                initChart(

                    data.id , 
                    data.timesData,
                    data.status ,
                    data.timesString,
                    data.hourly_call_count
                );

            },
        };
    })();

    // Webpack support
    if (typeof module !== "undefined") {
        module.exports = KTChartsWidget11;
    }





        // ================================================================================================================================================================
        // Begin:: Reset filter fields 
        // ================================================================================================================================================================

        var resetBtn = document.getElementById("filter-reset")
        const fieldUrl = chart_url_12;
        async function returnField() {
            const response = await fetch(fieldUrl)
            const data = await response.json()

            var filterArea = document.getElementById("filter-area")
            var filterDistrict = document.getElementById("filter-district")
            var filterDivision = document.getElementById("filter-division")

            filterArea.innerHTML = '<option value="" default >Select Area</option>'
            filterDistrict.innerHTML = '<option value="" default >Select District</option>'
            filterDivision.innerHTML = '<option value="" default >Select Division</option>'

            data.data.area.map(value => {
                filterArea.innerHTML += `<option value="${value}">${value}</option>`
                
            })
            data.data.district.map(value => {
                filterDistrict.innerHTML += `<option value="${value}">${value}</option>`
            })
            data.data.division.map(value => {
                filterDivision.innerHTML += `<option value="${value}">${value}</option>`
            })

        }
        returnField()
        resetBtn.addEventListener('click', function() {
        
         
                var filterGender = document.getElementById("filter-gender")
                var filterSelectFromDate = document.getElementById("filter-fromDate")
                var filterSelectToDate = document.getElementById("filter-toDate")
                var filterArea = document.getElementById("filter-area")
                var filterDistrict = document.getElementById("filter-district")
                var filterDivision = document.getElementById("filter-division")

                filterArea.innerHTML = '<option value="" default >Select Area</option>'
                filterDistrict.innerHTML = '<option value="" default >Select District</option>'
                filterDivision.innerHTML = '<option value="" default >Select Division</option>'
                filterGender.innerHTML = ''
                filterSelectFromDate.value = ''
                filterSelectToDate.value = ''

                filterGender.innerHTML = `  <option value="" default >Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="others">Others</option>`
                returnField()
                $('#filter-area').attr("disabled", false);
                $('#filter-district').attr("disabled", false);
                $('#filter-division').attr("disabled", false);
                
            
                
        })
        // ================================================================================================================================================================
        // Begin:: Reset filter fields
        // ================================================================================================================================================================





        var searchistory = document.getElementById("filter-searchhiostory")
        const url = chart_url_10;

        function Reload (){
            async function returndata() {
                const response = await fetch(url, {
                    method: "POST",
                    headers: {
                        "Content-type": "application/json; charset=UTF-8"
                    },
                    body: JSON.stringify({
                        gender: document.getElementById("filter-gender").value,
                        area: document.getElementById("filter-area").value,
                        district: document.getElementById("filter-district").value,
                        division: document.getElementById("filter-division").value,
                        fromDate: document.getElementById("filter-fromDate").value,
                        toDate: document.getElementById("filter-toDate").value,

                    })
                })
                const data = await response.json()
                
                return data
            }

            returndata()
            .then(data => {
                $(".preloader").hide();

                var localStorageData = data.data




                localStorageData.hourly_call.hourly_call_time.unshift(" ")
                localStorageData.hourly_call.hourly_call_time.push(" ")
                var times = localStorageData.hourly_call.hourly_call_time
                localStorageData.hourly_call.hourly_call_count.unshift(localStorageData.hourly_call.hourly_call_count[0])
                localStorageData.hourly_call.hourly_call_count.push(localStorageData.hourly_call.hourly_call_count[localStorageData.hourly_call.hourly_call_count.length - 1])
                var timesData = localStorageData.hourly_call.hourly_call_count

                var timeData_sum = 0
                timesData.map((e)=>{
                    timeData_sum += e
                })

                document.querySelector("#timeDataTotal").innerHTML = `Total Calls (Received): ${timeData_sum}`
                    

                    // On document ready
                    KTUtil.onDOMContentLoaded(function() {
                        KTChartsWidget11.init({
                            id:"#kt_chart_widget_11_chart",
                            timesData: timesData,
                            status: true, 
                            timesString : times,
                            hourly_call_count: localStorageData.hourly_call.hourly_call_count,
                        });
                    });
            }).catch(err=>{
                console.log(err)
                $(".preloader").hide();
            })
            
        }
        Reload()
        

        searchistory.addEventListener('click', function() {
            var to_data = document.getElementById("filter-toDate").value;
            var from_data =document.getElementById("filter-fromDate").value;
            
            if (to_data == "" || from_data == "" ) {
                return false;
              }
           
            $(".preloader").show();

            // On document ready
            KTUtil.onDOMContentLoaded(function() {
                KTChartsWidget11.init({
                    id:"#kt_chart_widget_11_chart",
                    timesData: [],
                    status: false, 
                    timesString : [],
                    hourly_call_count: [],
                });
            });

            document.querySelector("#kt_chart_widget_11_chart").innerHTML = ""
            document.querySelector("#timeDataTotal").innerHTML = `Total Calls (Received): 0`

            setTimeout(()=>{
                Reload()
            },3000)
        })
            

    }
}
        // ================================================================================================================================================================
            // Chart 11 => Outbound Call by Student Grade
        // ================================================================================================================================================================

if (document.querySelector("#outbound_student_receive")) {
    // get screenshot
    screenShot("#BTN9", "#ELEMENT9");

    // begain::total arrayData count
    function totalCount(id, Dataarray) {
        id.map((e, i) => {
            document.querySelector(id[i]).innerHTML = Dataarray[i].reduce((p, c) => p + c, 0)
        })
    }
    // End::total arrayData count

    window.onload = () => {
        $(".preloader").show();
        // ================================================================================================================================================================
        // Begin:: Reset filter fields 
        // ================================================================================================================================================================

        var resetBtn = document.getElementById("filter-reset")
        const fieldUrl = chart_url_12;
        async function returnField() {
            const response = await fetch(fieldUrl)
            const data = await response.json()

            var filterArea = document.getElementById("filter-area")
            var filterDistrict = document.getElementById("filter-district")
            var filterDivision = document.getElementById("filter-division")

            filterArea.innerHTML = '<option value="" default >Select Area</option>'
            filterDistrict.innerHTML = '<option value="" default >Select District</option>'
            filterDivision.innerHTML = '<option value="" default >Select Division</option>'

            data.data.area.map(value => {
                filterArea.innerHTML += `<option value="${value}">${value}</option>`
                
            })
            data.data.district.map(value => {
                filterDistrict.innerHTML += `<option value="${value}">${value}</option>`
            })
            data.data.division.map(value => {
                filterDivision.innerHTML += `<option value="${value}">${value}</option>`
            })

        }
        returnField()
        resetBtn.addEventListener('click', function() {
        
                var filterGender = document.getElementById("filter-gender")
                var filterSelectFromDate = document.getElementById("filter-fromDate")
                var filterSelectToDate = document.getElementById("filter-toDate")
                var filterArea = document.getElementById("filter-area")
                var filterDistrict = document.getElementById("filter-district")
                var filterDivision = document.getElementById("filter-division")

                filterArea.innerHTML = '<option value="" default >Select Area</option>'
                filterDistrict.innerHTML = '<option value="" default >Select District</option>'
                filterDivision.innerHTML = '<option value="" default >Select Division</option>'
                filterGender.innerHTML = ''
                filterSelectFromDate.value = ''
                filterSelectToDate.value = ''

                filterGender.innerHTML = `  <option value="" default >Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                                <option value="others">Others</option>`
                returnField()
                $('#filter-area').attr("disabled", false);
                $('#filter-district').attr("disabled", false);
                $('#filter-division').attr("disabled", false);
                
            
                
        })
        // ================================================================================================================================================================
        // Begin:: Reset filter fields
        // ================================================================================================================================================================





        var searchistory = document.getElementById("filter-searchhiostory")
        const url = chart_url_11;
        function Reload(){
            async function returndata() {
                const response = await fetch(url, {
                    method: "POST",
                    headers: {
                        "Content-type": "application/json; charset=UTF-8"
                    },
                    body: JSON.stringify({
                        gender: document.getElementById("filter-gender").value,
                        area: document.getElementById("filter-area").value,
                        district: document.getElementById("filter-district").value,
                        division: document.getElementById("filter-division").value,
                        toDate: document.getElementById("filter-toDate").value,
                        fromDate: document.getElementById("filter-fromDate").value,
    
                    })
                })
                const data = await response.json()
                return data
            }
    
            returndata().then(data => {
                $(".preloader").hide();
    
                var localStorageData = data.data

                // Class definition
                var KTChartsWidget71 = (function() {
                    // Private methods
                    var initChart = function(tabSelector, chartSelector, data, initByDefault, category) {
                        var element = document.querySelector(chartSelector);
    
                        if (!element) {
                            return;
                        }
    
                        var height = parseInt(KTUtil.css(element, "height"));
                        var labelColor = KTUtil.getCssVariableValue("--bs-gray-900");
    
                        var borderColor = KTUtil.getCssVariableValue(
                            "--bs-border-dashed-color"
                        );
    
                        var options = {
                            series: [{
                                name: "Calls",
                                data: data,
                            }, ],
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
                                    columnWidth: ["22%"],
                                    borderRadius: 5,
                                    dataLabels: {
                                        position: "top", // top, center, bottom
                                    },
                                    startingShape: "flat",
                                },
                            },
                            legend: {
                                show: false,
                            },
                            dataLabels: {
                                enabled: true,
                                offsetY: -28,
                                style: {
                                    fontSize: "13px",
                                    colors: ["labelColor"],
                                },
                            },
                            stroke: {
                                show: true,
                                width: 2,
                                colors: ["transparent"],
                            },
                            xaxis: {
                                categories: category,
                                axisBorder: {
                                    show: false,
                                },
                                axisTicks: {
                                    show: false,
                                },
                                labels: {
                                    style: {
                                        colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                        fontSize: "13px",
                                    },
                                },
                                crosshairs: {
                                    fill: {
                                        gradient: {
                                            opacityFrom: 0,
                                            opacityTo: 0,
                                        },
                                    },
                                },
                            },
                            yaxis: {
                                labels: {
                                    style: {
                                        colors: KTUtil.getCssVariableValue("--bs-gray-500"),
                                        fontSize: "13px",
                                    },
                                },
                            },
                            fill: {
                                opacity: 1,
                                colors: ["#70CC8A"],
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
                            },
                            colors: [
                                KTUtil.getCssVariableValue("--bs-primary"),
                                KTUtil.getCssVariableValue("--bs-light-primary"),
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
    
                        var init = false;
                        var tab = document.querySelector(tabSelector);
    
                        if (initByDefault === true) {
                            chart.render();
                            init = true;
                        }
    
                        tab.addEventListener("shown.bs.tab", function(event) {
                            if (init == false) {
                                chart.render();
                                init = true;
                            }
                        });
                    };
    
                    // Public methods
                    return {
                        init2: function() {
    
    
    
    
                            // outbound_class_total
                            if (localStorageData.call_class.outbound_call_category_class_total == 0) {
                                var outbound_call_category_class_total = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_class_total = localStorageData.call_class.outbound_call_category_class_total
                            }
    
                            // outbound_class_1_total
    
                            if (localStorageData.call_class.outbound_call_category_class_1_total == 0) {
                                var outbound_call_category_class_1_total = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_class_1_total = localStorageData.call_class.outbound_call_category_class_1_total
                            }
                            // outbound_class_2_total
    
                            if (localStorageData.call_class.outbound_call_category_class_2_total == 0) {
                                var outbound_call_category_class_2_total = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_class_2_total = localStorageData.call_class.outbound_call_category_class_2_total
                            }
                            // outbound_category
                            if (localStorageData.call_class.content_category == 0) {
                                var outbound_call_category_category = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_category = localStorageData.call_class.content_category
                            }
                            // outbound_class_3_total
                            if (localStorageData.call_class.outbound_call_category_class_3_total == 0) {
                                var outbound_call_category_class_3_total = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_class_3_total = localStorageData.call_class.outbound_call_category_class_3_total
                            }
    
                            // outbound_class_4_total
                            if (localStorageData.call_class.outbound_call_category_class_4_total == 0) {
                                var outbound_call_category_class_4_total = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_class_4_total = localStorageData.call_class.outbound_call_category_class_4_total
                            }
    
                            // outbound_class_6_total
                            if (localStorageData.call_class.outbound_call_category_class_5_total == 0) {
                                var outbound_call_category_class_5_total = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_class_5_total = localStorageData.call_class.outbound_call_category_class_5_total
                            }
                            // outbound_unspecified_total
                            if (localStorageData.call_class.outbound_call_category_class_unspecified_total == 0) {
                                var outbound_call_category_class_unspecified_total = [0, 0, 0, 0]
                            } else {
                                var outbound_call_category_class_unspecified_total = localStorageData.call_class.outbound_call_category_class_unspecified_total
                            }
    
                            var outbound_call_category_class_total = []
                            outbound_call_category_class_1_total.map((e, i) => {
                                outbound_call_category_class_total.push(
                                    outbound_call_category_class_1_total[i] +
                                    outbound_call_category_class_2_total[i] +
                                    outbound_call_category_class_3_total[i] +
                                    outbound_call_category_class_4_total[i] +
                                    outbound_call_category_class_5_total[i] +
                                    outbound_call_category_class_unspecified_total[i])
                            })
    
    
                            totalCount([
                                '#all_class',
                                '#all_class_1',
                                '#all_class_2',
                                '#all_class_3',
                                '#all_class_4',
                                '#all_class_5',
                                '#all_unspecified',
                            ], [
                                outbound_call_category_class_total,
                                outbound_call_category_class_1_total,
                                outbound_call_category_class_2_total,
                                outbound_call_category_class_3_total,
                                outbound_call_category_class_4_total,
                                outbound_call_category_class_5_total,
                                outbound_call_category_class_unspecified_total,
                            ])
    
    
    
    
    
                            initChart(
                                "#kt_charts_widget_72_tab_31",
                                "#kt_charts_widget_72_chart_31", outbound_call_category_class_total,
                                true,
                                outbound_call_category_category
                            );
                            initChart(
                                "#kt_charts_widget_72_tab_32",
                                "#kt_charts_widget_72_chart_32", outbound_call_category_class_1_total,
                                true,
                                outbound_call_category_category
                            );
                            initChart(
                                "#kt_charts_widget_72_tab_33",
                                "#kt_charts_widget_72_chart_33", outbound_call_category_class_2_total,
                                true,
                                outbound_call_category_category
                            );
                            initChart(
                                "#kt_charts_widget_72_tab_34",
                                "#kt_charts_widget_72_chart_34", outbound_call_category_class_3_total,
                                true,
                                outbound_call_category_category
                            );
                            initChart(
                                "#kt_charts_widget_72_tab_35",
                                "#kt_charts_widget_72_chart_35", outbound_call_category_class_4_total,
                                true,
                                outbound_call_category_category
                            );
                            initChart(
                                "#kt_charts_widget_72_tab_36",
                                "#kt_charts_widget_72_chart_36", outbound_call_category_class_5_total,
                                true,
                                outbound_call_category_category
                            );
                            initChart(
                                "#kt_charts_widget_72_tab_37",
                                "#kt_charts_widget_72_chart_37", outbound_call_category_class_unspecified_total,
                                true,
                                outbound_call_category_category
                            );
                        },
                    };
                })();
    
                // Webpack support
                if (typeof module !== "undefined") {
                    module.exports = KTChartsWidget71;
                }
    
                // On document ready
                KTUtil.onDOMContentLoaded(function() {
                    KTChartsWidget71.init2();
                });
            }).catch(err=>{
                console.log(err)
                $(".preloader").hide();
            })
        }
        Reload ()

        searchistory.addEventListener('click', function() {
            var to_data= document.getElementById("filter-toDate").value;
            var from_data= document.getElementById("filter-fromDate").value;

            if (to_data == "" || from_data == "" ) {
                return false;
              }
           
            $(".preloader").show();
            document.querySelector("#kt_charts_widget_72_chart_31").innerHTML = ""
            document.querySelector("#kt_charts_widget_72_chart_32").innerHTML = ""
            document.querySelector("#kt_charts_widget_72_chart_33").innerHTML = ""
            document.querySelector("#kt_charts_widget_72_chart_34").innerHTML = ""
            document.querySelector("#kt_charts_widget_72_chart_35").innerHTML = ""
            document.querySelector("#kt_charts_widget_72_chart_36").innerHTML = ""
            document.querySelector("#kt_charts_widget_72_chart_37").innerHTML = ""
            
            document.querySelector("#all_class").innerHTML = "0"
            document.querySelector("#all_class_1").innerHTML = "0"
            document.querySelector("#all_class_2").innerHTML = "0"
            document.querySelector("#all_class_3").innerHTML = "0"
            document.querySelector("#all_class_4").innerHTML = "0"
            document.querySelector("#all_class_5").innerHTML = "0"
            document.querySelector("#all_unspecified").innerHTML = "0"

            setTimeout(()=>{
                Reload ()
            },2000)
          
        })

    }

}
        // =================================================================================================================================================
            // Infography Generator report Charts
        // =================================================================================================================================================
if(document.getElementById("infography_content")){

    
        screenShot("#BTN12", "#ELEMENT12");
        screenShot("#BTN13", "#ELEMENT13");
        screenShot("#BTN14", "#ELEMENT14");
        screenShot("#BTN15", "#ELEMENT15");
        screenShot("#BTN16", "#ELEMENT16");


        

        
        function Reload (){
            async function Ready(){
                var url = chart_url_13
                const response = await fetch(url, {
                       method: "POST",
                       headers: {
                           "Content-type": "application/json; charset=UTF-8"
                       },
                       body: JSON.stringify({

                           toDate: document.getElementById("toDate").value,
   
                       })
                   })
                   const data = await response.json()
                   return data
               }
   
               Ready()
               .then (data=>{
   
               
                           
                           var infodataarr = data.data
                        //    console.log(infodataarr)
   
                           var currentmonthArray = infodataarr.current_month.split('-')
                           var previousmonthArray = infodataarr.previous_month.split('-')
                           const month = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
   
                           document.querySelector("#current_month_1").innerHTML = `${currentmonthArray[0]}-${month[parseInt(currentmonthArray[1])-1]}`;
                           document.querySelector("#previous_month_1").innerHTML = `${previousmonthArray[0]}-${month[parseInt(previousmonthArray[1])-1]}`;

                           document.querySelector("#current_month_2").innerHTML = `${currentmonthArray[0]}-${month[parseInt(currentmonthArray[1])-1]}`;
                           document.querySelector("#previous_month_2").innerHTML = `${previousmonthArray[0]}-${month[parseInt(previousmonthArray[1])-1]}`;

                           document.querySelector("#current_month_3").innerHTML = `${currentmonthArray[0]}-${month[parseInt(currentmonthArray[1])-1]}`;
                           document.querySelector("#previous_month_3").innerHTML = `${previousmonthArray[0]}-${month[parseInt(previousmonthArray[1])-1]}`;
   
                           document.querySelector("#current_month_p1").innerHTML = `${currentmonthArray[0]}-${month[parseInt(currentmonthArray[1]) -1]}`;
                           document.querySelector("#previous_month_p2").innerHTML = `${previousmonthArray[0]}-${month[parseInt(previousmonthArray[1])-1]}`;
                           
                           // chart 1 data fields =>infodataarr.
                           var  student_current = infodataarr.breakdown_of_ivrs_call_time_student_current_month;
                           var student_previous = infodataarr.breakdown_of_ivrs_call_time_student_previous_month;
   
                           var  teacher_current = infodataarr.breakdown_of_ivrs_call_time_teacher_current_month;
                           var teacher_previous = infodataarr.breakdown_of_ivrs_call_time_teacher_previous_month;
                                                   
                           var govt_current = infodataarr.breakdown_of_ivrs_call_time_govt_current_month;
                           var govt_previous = infodataarr.breakdown_of_ivrs_call_time_govt_previous_month;
   
                           var staff_current = infodataarr.breakdown_of_ivrs_call_time_staff_current_month;
                            var staff_previous = infodataarr.breakdown_of_ivrs_call_time_staff_previous_month;
   
                           var unspecified_current = infodataarr.breakdown_of_ivrs_call_time_unspecified_current_month;
                           var unspecified_previous = infodataarr.breakdown_of_ivrs_call_time_unspecified_previous_month;
   
                           var ivrCallsTime = {
                               current_data: [
                                   student_current.toFixed(2),
                                   teacher_current.toFixed(2),
                                   govt_current.toFixed(2),
                                   staff_current.toFixed(2),
                                   unspecified_current.toFixed(2)],
                               previous_data: [
                                   student_previous.toFixed(2),
                                   teacher_previous.toFixed(2),
                                   govt_previous.toFixed(2),
                                   staff_previous.toFixed(2),
                                   unspecified_previous.toFixed(2)]
                           }

                           // chart 2 data fields =>infodataarr.
                           var  student_current = infodataarr.current_student_outbound_call_mintues;
                           var student_previous = infodataarr.previous_student_outbound_call_mintues;
   
                           var  teacher_current = infodataarr.current_teacher_outbound_call_mintues;
                           var teacher_previous = infodataarr.previous_teacher_outbound_call_mintues;
                                                   
                           var govt_current = infodataarr.current_govt_outbound_call_mintues;
                           var govt_previous = infodataarr.previous_govt_outbound_call_mintues;
   
                           var staff_current = infodataarr.current_staff_outbound_call_mintues;
                            var staff_previous = infodataarr.previous_staff_outbound_call_mintues;
   
                           var unspecified_current = infodataarr.current_unspecified_outbound_call_mintues;
                           var unspecified_previous = infodataarr.previous_unspecified_outbound_call_mintues;

                           var ivrCallsTime_outbound = {
                               current_data: [
                                   student_current.toFixed(2),
                                   teacher_current.toFixed(2),
                                   govt_current.toFixed(2),
                                   staff_current.toFixed(2),
                                   unspecified_current.toFixed(2)],
                               previous_data: [
                                   student_previous.toFixed(2),
                                   teacher_previous.toFixed(2),
                                   govt_previous.toFixed(2),
                                   staff_previous.toFixed(2),
                                   unspecified_previous.toFixed(2)]
                           }

                           // chart 3 data fields =>infodataarr.
                           var  student_current = infodataarr.current_student_inbound_call_mintues;
                           var student_previous = infodataarr.previous_student_inbound_call_mintues;
   
                           var  teacher_current = infodataarr.current_teacher_inbound_call_mintues;
                           var teacher_previous = infodataarr.previous_teacher_inbound_call_mintues;
                                                   
                           var govt_current = infodataarr.current_govt_inbound_call_mintues;
                           var govt_previous = infodataarr.previous_govt_inbound_call_mintues;
   
                           var staff_current = infodataarr.current_staff_inbound_call_mintues;
                            var staff_previous = infodataarr.previous_staff_inbound_call_mintues;
   
                           var unspecified_current = infodataarr.current_unspecified_inbound_call_mintues;
                           var unspecified_previous = infodataarr.previous_unspecified_inbound_call_mintues;

                           var sms_notification_sent_current = infodataarr.sms_notification_were_sent_current_month;
                           var sms_notification_sent_previou = infodataarr.sms_notification_were_sent_previous_month;
   
                           var ivrCallsTime_inbound = {
                               current_data: [
                                   student_current.toFixed(2),
                                   teacher_current.toFixed(2),
                                   govt_current.toFixed(2),
                                   staff_current.toFixed(2),
                                   unspecified_current.toFixed(2),
                                   sms_notification_sent_current.toFixed(2),
                                ],
                               previous_data: [
                                   student_previous.toFixed(2),
                                   teacher_previous.toFixed(2),
                                   govt_previous.toFixed(2),
                                   staff_previous.toFixed(2),
                                   unspecified_previous.toFixed(2),
                                   sms_notification_sent_previou.toFixed(2),
                                ]
                           }
   
   
                           // chart 4 data fields =>infodataarr.
                           var minutes_of_ivrs_content_were_accessed_current = infodataarr.minutes_of_ivrs_content_were_accessed_current_month;
                           var minutes_of_ivrs_content_were_accessed_previous = infodataarr.minutes_of_ivrs_content_were_accessed_previous_month;
   
                           var call_were_received_current_month = infodataarr.call_were_received_current_month;
                           var call_were_received_previous_month = infodataarr.call_were_received_previous_month;
                           
                           var person_received_phone_call_current_month = infodataarr.person_received_phone_call_current_month;
                           var person_received_phone_call_previous_month = infodataarr.person_received_phone_call_previous_month;
   
                           var call_requested_by_stakeholder_current_month = infodataarr.call_requested_by_stakeholder_current_month;
                           var call_requested_by_stakeholder_previous_month = infodataarr.call_requested_by_stakeholder_previous_month;
                           
                           var stakeholder_coverage_current_month = infodataarr.stakeholder_coverage_current_month;
                           var stakeholder_coverage_previous_month = infodataarr.stakeholder_coverage_previous_month;
   
                           var sms_notification_sent_current = infodataarr.sms_notification_were_sent_current_month;
                           var sms_notification_sent_previou = infodataarr.sms_notification_were_sent_previous_month;
   
   
                           var ivrFunctionalStatus = {
                               current_data: [
                                   minutes_of_ivrs_content_were_accessed_current.toFixed(2), 
                                   call_were_received_current_month.toFixed(2),
                                   person_received_phone_call_current_month.toFixed(2),
                                   call_requested_by_stakeholder_current_month.toFixed(2),
                                   stakeholder_coverage_current_month.toFixed(2),
                                   sms_notification_sent_current.toFixed(2)],
                               previous_data: [
                                   minutes_of_ivrs_content_were_accessed_previous.toFixed(2), 
                                   call_were_received_previous_month.toFixed(2),
                                   person_received_phone_call_previous_month.toFixed(2),
                                   call_requested_by_stakeholder_previous_month.toFixed(2),
                                   stakeholder_coverage_previous_month.toFixed(2),
                                   sms_notification_sent_previou.toFixed(2)]
                           }
   
                           var stakeholder_listened_of_ivrs_content_student_current_month =infodataarr.stakeholder_listened_of_ivrs_content_student_current_month;
                           var stakeholder_listened_of_ivrs_content_student_previous_month = infodataarr.stakeholder_listened_of_ivrs_content_student_previous_month;
   
                           var stakeholder_listened_of_ivrs_content_teacher_current_month = infodataarr.stakeholder_listened_of_ivrs_content_teacher_current_month;
                           var stakeholder_listened_of_ivrs_content_teacher_previous_month = infodataarr.stakeholder_listened_of_ivrs_content_teacher_previous_month;
   
                           var stakeholder_listened_of_ivrs_content_govt_current_month = infodataarr.stakeholder_listened_of_ivrs_content_govt_current_month;
                           var stakeholder_listened_of_ivrs_content_govt_previous_month = infodataarr.stakeholder_listened_of_ivrs_content_govt_previous_month;
   
                           var stakeholder_listened_of_ivrs_content_staff_current_month = infodataarr.stakeholder_listened_of_ivrs_content_staff_current_month;
                           var stakeholder_listened_of_ivrs_content_staff_previous_month = infodataarr.stakeholder_listened_of_ivrs_content_staff_previous_month;
   
   
                           var stakeholder_listened_of_ivrs_content_unspecified_current_month = infodataarr.stakeholder_listened_of_ivrs_content_unspecified_current_month;
                           var stakeholder_listened_of_ivrs_content_unspecified_previous_month = infodataarr.stakeholder_listened_of_ivrs_content_unspecified_previous_month;
   
                           var ivrStakeholderExperience = {
                               current_data: [
                                   stakeholder_listened_of_ivrs_content_student_current_month, 
                                   stakeholder_listened_of_ivrs_content_teacher_current_month,
                                   stakeholder_listened_of_ivrs_content_govt_current_month,
                                   stakeholder_listened_of_ivrs_content_staff_current_month,
                                   stakeholder_listened_of_ivrs_content_unspecified_current_month],
                               previous_data: [
                                   stakeholder_listened_of_ivrs_content_student_previous_month, 
                                   stakeholder_listened_of_ivrs_content_teacher_previous_month,
                                   stakeholder_listened_of_ivrs_content_govt_previous_month,
                                   stakeholder_listened_of_ivrs_content_staff_previous_month,
                                   stakeholder_listened_of_ivrs_content_unspecified_previous_month]
                           }
        // =================================================================================================================================================
            // Infography Generator report Charts
        // =================================================================================================================================================

  // Class definition
                var KTChartsWidget10 = (function() {
                    // Private methods
                    var initChart = function(dataArr, id, currendate, previousdate) {
                        // Check if amchart library is included
                        if (typeof am5 === "undefined") {
                            return;
                        }

                        var element = document.getElementById(id);

                        if (!element) {
                            return;
                        }

                        am5.ready(function() {

                            // Create root element
                            // https://www.amcharts.com/docs/v5/getting-started/#Root_element
                            if(window.root1){
                                window.root1.dispose();
                            }
                            var root = am5.Root.new(element);
                            window.root1 = root
                            // var root = am5.Root.new(id);
                            
                            // for remove amchart5 logo
                            if(root._logo){
                                root._logo.dispose();
                            }
                            // Set themes
                            // https://www.amcharts.com/docs/v5/concepts/themes/
                            root.setThemes([
                                am5themes_Animated.new(root)
                            ]);
                            
                            
                            // Create chart
                            // https://www.amcharts.com/docs/v5/charts/xy-chart/
                            var chart = root.container.children.push(am5xy.XYChart.new(root, {
                                panX: false,
                                panY: false,
                                wheelX: "panX",
                                wheelY: "zoomX",
                                layout: root.verticalLayout
                            }));
                            
                            
                            // Add legend
                            // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
                            var legend = chart.children.push(am5.Legend.new(root, {
                                centerX: am5.p50,
                                x: am5.p50
                            }))
                            
                            var data = dataArr;
                            
                            // // Data
                            // var data = [{
                            //   year: "Minutes of IVRs Content Were Accessed(Minutes)",
                            //   income: 23.5,
                            //   expenses: 18.1
                            // }, {
                            //     // ['Minutes of IVRs Content Were Accessed(Minutes)', 'Call Were Received(NOS)','Person Received Phone Call', 'Call Requested by Stakeholder ', 'Stakeholder Coverage', 'Sms Notification']
                            //   year: "Call Were Received(NOS)",
                            //   income: 26.2,
                            //   expenses: 22.8
                            // }, {
                            //   year: "Person Received Phone Call",
                            //   income: 30.1,
                            //   expenses: 23.9
                            // }, {
                            //   year: "Call Requested by Stakeholder",
                            //   income: 29.5,
                            //   expenses: 25.1
                            // }, {
                            //   year: "Stakeholder Coverage",
                            //   income: 24.6,
                            //   expenses: 25
                            // }];
                            
                            
                            // Create axes
                            // https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
                            var yAxis = chart.yAxes.push(am5xy.CategoryAxis.new(root, {
                                categoryField: "filds",
                                renderer: am5xy.AxisRendererY.new(root, {
                                inversed: true,
                                cellStartLocation: 0.1,
                                cellEndLocation: 0.9
                                })
                            }));
                            
                            yAxis.data.setAll(data);
                            
                            var xAxis = chart.xAxes.push(am5xy.ValueAxis.new(root, {
                                renderer: am5xy.AxisRendererX.new(root, {}),
                                min: 0
                            }));
                            
                            
                            // Add series
                            // https://www.amcharts.com/docs/v5/charts/xy-chart/series/
                            function createSeries(field, name) {
                                var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                                name: name,
                                xAxis: xAxis,
                                yAxis: yAxis,
                                valueXField: field,
                                categoryYField: "filds",
                                sequencedInterpolation: true,
                                tooltip: am5.Tooltip.new(root, {
                                    pointerOrientation: "horizontal",
                                    labelText: "[bold]{name}[/]\n{categoryY}: {valueX}"
                                })
                                }));
                            
                                series.columns.template.setAll({
                                height: am5.p100
                                });
                            
                            
                                series.bullets.push(function() {
                                return am5.Bullet.new(root, {
                                    locationX: 1,
                                    locationY: 0.5,
                                    sprite: am5.Label.new(root, {
                                    centerY: am5.p50,
                                    text: "{valueX}",
                                    populateText: true
                                    })
                                });
                                });
                            
                                series.bullets.push(function() {
                                return am5.Bullet.new(root, {
                                    locationX: 1,
                                    locationY: 0.5,
                                    sprite: am5.Label.new(root, {
                                    centerX: am5.p100,
                                    centerY: am5.p50,
                                    text: "{name}",
                                    fill: am5.color(0xffffff),
                                    populateText: true
                                    })
                                });
                                });
                            
                                series.data.setAll(data);
                                series.appear();
                            
                                return series;
                            }
                            
                            createSeries("CurrentData", currendate);
                            createSeries("PreviousData", previousdate);
                            
                            
                            // Add legend
                            // https://www.amcharts.com/docs/v5/charts/xy-chart/legend-xy-series/
                            var legend = chart.children.push(am5.Legend.new(root, {
                                centerX: am5.p50,
                                x: am5.p50
                            }));
                            
                            legend.data.setAll(chart.series.values);
                            
                            
                            // Add cursor
                            // https://www.amcharts.com/docs/v5/charts/xy-chart/cursor/
                            var cursor = chart.set("cursor", am5xy.XYCursor.new(root, {
                                behavior: "zoomY"
                            }));
                            cursor.lineY.set("forceHidden", true);
                            cursor.lineX.set("forceHidden", true);
                            
                            
                            // Make stuff animate on load
                            // https://www.amcharts.com/docs/v5/concepts/animations/
                            chart.appear(1000, 100);
                            
                            }); // end am5.ready()
                    };

                    // Public methods
                    return {
                        init: function(dataarray,id,currendate,previousdate) {
                            initChart(dataarray, id,currendate,previousdate);

                        },
                    };
                })();

                // Webpack support
                if (typeof module !== "undefined") {
                    module.exports = KTChartsWidget10;
                }


        // =================================================================================================================================================
            // Infography Generator report Charts
        // =================================================================================================================================================

            // Class definition
            var KTChartsWidget9 = (function() {
                // Private methods
                 // Charts widgets
                var initChart = function(field_data1, field_data2, fields, id, initByDefault) {
                    var element = document.getElementById(id);

                    var height = parseInt(KTUtil.css(element, 'height'));
                    var labelColor = KTUtil.getCssVariableValue('--bs-gray-500');
                    var borderColor = KTUtil.getCssVariableValue('--bs-gray-200');
                    // var baseColor = KTUtil.getCssVariableValue('--bs-primary');
                    var baseColor = '#60DEF5';
                    var secondaryColor = '#FFF707';
                    // var secondaryColor = KTUtil.getCssVariableValue('--bs-active-warning');

                    if (!element) {
                        return;
                    }

                    var options = {
                        series: [{
                            name: '',
                            data: field_data1
                        }, {
                            name: '',
                            data: field_data2
                        }],
                        chart: {
                            fontFamily: 'inherit',
                            type: 'bar',
// height should be fixed in case of update this chart
                            height: 450,
                            toolbar: {
                                show: false
                            }
                        },
                        plotOptions: {
                            bar: {
                                horizontal: false,
                                columnWidth: ['50%'],
                                borderRadius: 4,
                                position: "top",
                            },
                        },
                        legend: {
                            show: false
                        },
                        dataLabels: {
                            enabled: true,
                            offsetY: -28,
                            style: {
                                fontSize: "13px",
                                colors: ["labelColor"],
                            },
                        },
                        stroke: {
                            show: false,
                            width: 2,
                            colors: ['transparent']
                        },
                        xaxis: {
                            categories: fields,
                            axisBorder: {
                                show: true,
                            },
                            axisTicks: {
                                show: true
                            },
                            labels: {
                                style: {
                                    colors: labelColor,
                                    fontSize: '12px'
                                }
                            }
                        },
                        yaxis: {
                            labels: {
                                style: {
                                    colors: labelColor,
                                    fontSize: '12px'
                                }
                            }
                        },
                        fill: {
                            opacity: 1
                        },
                        states: {
                            normal: {
                                filter: {
                                    type: 'none',
                                    value: 0
                                }
                            },
                            hover: {
                                filter: {
                                    type: 'none',
                                    value: 0
                                }
                            },
                            active: {
                                allowMultipleDataPointsSelection: false,
                                filter: {
                                    type: 'none',
                                    value: 0
                                }
                            }
                        },
                        tooltip: {
                            style: {
                                fontSize: '12px'
                            },
                            y: {
                                formatter: function (val) {
                                    return  val 
                                }
                            }
                        },
                        colors: [baseColor, secondaryColor],
                        grid: {
                            borderColor: borderColor,
                            strokeDashArray: 4,
                            yaxis: {
                                lines: {
                                    show: true
                                }
                            }
                        }
                    };

                    var chart = new ApexCharts(element, options);
                    var init = false;
        
                        if (initByDefault === true) {
                            chart.render();
                            init = true;
                        }   
                }

                // Public methods
                return {
                    init: function(current_data,previous_data,fields,id,status) {
                        initChart(current_data,previous_data,fields,id,status);

                    },
                };
            })();
            // Webpack support
            if (typeof module !== "undefined") {
                module.exports = KTChartsWidget9;
            }
            
        // =================================================================================================================================================
            // Infography Generator report Charts
        // =================================================================================================================================================
        

            

            // Class definition
            var KTChartsWidget22 = (function() {
                // Private methods
                var initChart = function(chartSelector, field_data, label, initByDefault) {
                    var element = document.querySelector(chartSelector);

                    if (!element) {
                        return;
                    }

                    var height = parseInt(KTUtil.css(element, "height"));

                    var options = {
                        series: field_data,
                        chart: {
                            fontFamily: "inherit",
                            type: "donut",
                            width: 450,
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    size: "50%",
                                    labels: {
                                        value: {
                                            fontSize: "10px",
                                        },
                                    },
                                },
                            },
                        },
                        colors: [
                            KTUtil.getCssVariableValue("--bs-info"),
                            KTUtil.getCssVariableValue("--bs-success"),
                            KTUtil.getCssVariableValue("--bs-primary"),
                            KTUtil.getCssVariableValue("--bs-danger"),
                            KTUtil.getCssVariableValue("--bs-warning"),
                        ],
                        stroke: {
                            width: 0,
                        },
                        labels:  label,
                        legend: {
                            show: false,
                        },
                        fill: {
                            type: "false",
                        },
                    };

                    var chart = new ApexCharts(element, options);

                    setTimeout(() => {
                        chart.render();
                    }, 200);

                };

                // Public methods
                return {
                    init: function(chartSelector,field_data,label,status) {
                        initChart(
                            chartSelector,field_data,label,status
                        );
                    },
                };
            })();

            // Webpack support
            if (typeof module !== "undefined") {
                module.exports = KTChartsWidget22;
            }
             
        // =================================================================================================================================================
            // Infography Generator report Charts 
        // =================================================================================================================================================

                // On document ready
                KTUtil.onDOMContentLoaded(function() {
                    KTChartsWidget9.init(ivrCallsTime.current_data, ivrCallsTime.previous_data,['Student/Parents', 'Teacher','Govt.', 'Staff', 'unspecified',],"kt_charts_widget_9_chart", true);
                    KTChartsWidget9.init(ivrCallsTime_outbound.current_data, ivrCallsTime_outbound.previous_data,['Student/Parents', 'Teacher','Govt.', 'Staff', 'unspecified',],"kt_charts_widget_9.1_chart", true);
                    KTChartsWidget9.init(ivrCallsTime_inbound.current_data, ivrCallsTime_inbound.previous_data,['Student/Parents', 'Teacher','Govt.', 'Staff', 'unspecified','Unregistered'],"kt_charts_widget_9.2_chart", true);
                });
            //    // On document ready
               KTUtil.onDOMContentLoaded(function() {
                var filds = [
                    // 'Minutes of IVRs Content Were Accessed(Minutes)', 
                    'No. of Total Outbound Calls (Received)',
                    // 'Call Were Received(NOS)',
                    'Minutes of Total outbound Calls',
                    // 'Person Received Phone Call', 
                    'No. of Total Inbound Registered Calls (Received)',
                    'Minutes of Total Inbound Registered Calls', 
                    // 'Stakeholder Coverage', 
                    'No. of Total Inbound Unregistered Calls (Received) ',
                    'Minutes of Total Inbound Unregistered Calls',
                    // 'Sms Notification'
                ];
                var dataArray = []
                filds.map((e,i)=>{
                    dataArray.push({
                        filds: e,
                        CurrentData: Number(ivrFunctionalStatus.current_data[i]),
                        PreviousData: Number(ivrFunctionalStatus.previous_data[i])
                    })
                })        
                      
                KTChartsWidget10.init(dataArray, "kt_charts_widget_10_chart",`${currentmonthArray[0]}-${month[parseInt(currentmonthArray[1])-1]}`,`${previousmonthArray[0]}-${month[parseInt(previousmonthArray[1])-1]}`);
            });
            
                           
                // On document ready
                KTUtil.onDOMContentLoaded(function() {
                    KTChartsWidget22.init(
                        "#kt_chart_widgets_22_chart_1", ivrStakeholderExperience.current_data,['Student/Parents', 'Teacher','Govt.', 'Staff', 'unspecified',],
                                true
                    );
                });

                // On document ready
                KTUtil.onDOMContentLoaded(function() {
                    KTChartsWidget22.init(
                        "#kt_chart_widgets_22_chart_2", ivrStakeholderExperience.previous_data,['Student/Parents', 'Teacher','Govt.', 'Staff', 'unspecified',],
                                true
                    );
                });
                $('.preloader').hide()
                $('.infoGraph').show()
            })
        }

        document.querySelector("#saveBtn").addEventListener('click', function(){
            $('.preloader').show()
            $('.infoGraph').hide()
            
            document.querySelector("#kt_charts_widget_9_chart").innerHTML = ''
            document.querySelector("#kt_charts_widget_10_chart").innerHTML = ''
            document.querySelector("#kt_chart_widgets_22_chart_1").innerHTML = ''
            document.querySelector("#kt_chart_widgets_22_chart_2").innerHTML = ''
            setTimeout(()=>{
                Reload()
            },2000)
        })
        

}
    // ======================================================================================================================
    // end of Dashboard, Dashboard details, Infography Generator report Charts js
    // ======================================================================================================================