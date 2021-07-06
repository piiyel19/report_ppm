<div class="content-wrapper">
  <section class="content">

<!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}

</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);

// Add data
chart.data = [{
  "Day": "2021-05-31",
  "Moisture": 14,
  "Temperature": 33,
  "Electrical Conductivity": 13,
}, {
  "Day": "2021-06-01",
  "Moisture": 8,
  "Temperature": 41,
  "Electrical Conductivity": 16,
}, {
  "Day": "2021-06-02",
  "Moisture": 9,
  "Temperature": 38,
  "Electrical Conductivity": 14,
}, {
  "Day": "2021-06-03",
  "Moisture": 10,
  "Temperature": 34,
  "Electrical Conductivity": 17,
}, {
  "Day": "2021-06-04",
  "Moisture": 10,
  "Temperature": 41,
  "Electrical Conductivity": 15,
}, {
  "Day": "2021-06-05",
  "Moisture": 9,
  "Temperature": 42,
  "Electrical Conductivity": 17,
}, {
  "Day": "2021-06-06",
  "Moisture": 10,
  "Temperature": 42,
  "Electrical Conductivity": 33,
}];

// Create category axis
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "Day";
categoryAxis.renderer.opposite = true;

// Create value axis
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
valueAxis.renderer.inversed = true;
valueAxis.title.text = "Soil Value (Avg)";
valueAxis.renderer.minLabelPosition = 0.01;

// Create series
var series1 = chart.series.push(new am4charts.LineSeries());
series1.dataFields.valueY = "Moisture";
series1.dataFields.categoryX = "Day";
series1.name = "Moisture";
series1.bullets.push(new am4charts.CircleBullet());
series1.tooltipText = "{name} in {categoryX}: {valueY}";
series1.legendSettings.valueText = "{valueY}";
series1.visible  = false;

var series2 = chart.series.push(new am4charts.LineSeries());
series2.dataFields.valueY = "Temperature";
series2.dataFields.categoryX = "Day";
series2.name = 'Temperature';
series2.bullets.push(new am4charts.CircleBullet());
series2.tooltipText = "{name} in {categoryX}: {valueY}";
series2.legendSettings.valueText = "{valueY}";

var series3 = chart.series.push(new am4charts.LineSeries());
series3.dataFields.valueY = "Electrical Conductivity";
series3.dataFields.categoryX = "Day";
series3.name = 'Electrical Conductivity';
series3.bullets.push(new am4charts.CircleBullet());
series3.tooltipText = "{name} in {categoryX}: {valueY}";
series3.legendSettings.valueText = "{valueY}";


// Add chart cursor
chart.cursor = new am4charts.XYCursor();
chart.cursor.behavior = "zoomY";


let hs1 = series1.segments.template.states.create("hover")
hs1.properties.strokeWidth = 5;
series1.segments.template.strokeWidth = 1;

let hs2 = series2.segments.template.states.create("hover")
hs2.properties.strokeWidth = 5;
series2.segments.template.strokeWidth = 1;

let hs3 = series3.segments.template.states.create("hover")
hs3.properties.strokeWidth = 5;
series3.segments.template.strokeWidth = 1;

// Add legend
chart.legend = new am4charts.Legend();
chart.legend.itemContainers.template.events.on("over", function(event){
  var segments = event.target.dataItem.dataContext.segments;
  segments.each(function(segment){
    segment.isHover = true;
  })
})

chart.legend.itemContainers.template.events.on("out", function(event){
  var segments = event.target.dataItem.dataContext.segments;
  segments.each(function(segment){
    segment.isHover = false;
  })
})

}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv"></div>

  </section>
</div>