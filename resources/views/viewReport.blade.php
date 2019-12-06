@extends('adminLayout')

@section('contentTitle')
View Report
@endsection

@section('content')
<head>
  <script type="text/javascript">
  window.onload = function () {
    var class1 = "CSCI 340 (Fall 2019)";
    var class2 = "CSCI 340 (Spring 2019)";
    var class3 = "CSCI 340 (Spring 2018)";
    var class4 = "CSCI 340 (Fall 2018)"
    var class5 = "CSCI 340 (Fall 2017)";
    var chart = new CanvasJS.Chart("chartContainer",
    {
      theme: "light2",
      title:{
      text: "Q1 Results for CSCI 340"
      },
      axisX: {
        interval: .1,
      },
      axisY:{
        maximum: 1
      },
      data: [
      {
        type: "stackedBar",
        legendText: "STR",
        showInLegend: "true",
        percentFormatString: "#0.##",
        toolTipContent: "STR (#percent%)",
        dataPoints: [
        {y: 1/10, label: class5},
        {y: 2/10, label: class4},
        {y: 3/10, label: class3},
        {y: 1/10, label: class2},
        {y: 4/10, label: class1}
        ]
      },
        {
        type: "stackedBar",
        legendText: "SAT",
        showInLegend: "true",
        percentFormatString: "#0.##",
        toolTipContent: "SAT (#percent%)",
        dataPoints: [
        {y: 1/10, label: class5},
        {y: 3/10, label: class4},
        {y: 1/10,label: class3},
        {y: 4/10,label: class2},
        {y: 1/10, label: class1}
        ]
      },
        {
        type: "stackedBar",
        legendText: "NG",
        showInLegend: "true",
        percentFormatString: "#0.##",
        toolTipContent: "NG (#percent%)",
        dataPoints: [
        {y: 2/10, label: class5},
        {y: 2/10, label: class4},
        {y: 2/10, label: class3},
        {y: 3/10, label: class2},
        {y: 1/10, label: class1}
        ]
      },
        {
        type: "stackedBar",
        legendText: "UNSAT",
        showInLegend: "true",
        percentFormatString: "#0.##",
        toolTipContent: "UNSAT (#percent%)",
        dataPoints: [
        {y: 4/10, label: class5},
        {y: 2/10, label: class4},
        {y: 1/10, label: class3},
        {y: 1/10, label: class2},
        {y: 3/10, label: class1}
        ]
      },
        {
        type: "stackedBar",
        legendText: "NA",
        showInLegend: "true",
        percentFormatString: "#0.##",
        toolTipContent: "NA (#percent%)",
        dataPoints: [
        {y: 2/10, label: class5},
        {y: 1/10, label: class4},
        {y: 3/10, label: class3},
        {y: 1/10, label: class2},
        {y: 1/10, label: class1}
        ]
      }
      ]
    });
    chart.render();
  }
  </script>
 <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script></head>
<body>
  <div id="chartContainer" style="height: 300px; width: 100%;">
  </div>
</body>
@endsection
