<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <link href="./novus-nvd3-e12d6d3/build/nv.d3.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="./js/jquery_2.1.1.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="./js/d3_3.5.2.min.js" charset="utf-8"></script>
    <script type="text/javascript" src="./novus-nvd3-e12d6d3/build/nv.d3.js" charset="utf-8"></script>
</head>
<body>

<div id="chart" width="400" height="900">
    <svg></svg>
</div>
<div id="chart2" width="400" height="900">
    <svg></svg>
</div>

<script>
	$(function() {
	    $.ajax({
	        type: 'GET',
	        url: 'http://192.168.100.149/sen',
	        dataType: 'html',
	        success: function(txt) {
	            
	            var data_array = txt.split(/\r\n|\r|\n/);  // 改行コードで分割
      		    var len = data_array.length;
		        var data = [];
		        var data_array_array = [];

			    for (var i = 0; i < len-1; i++){
			   		data_array_array[i] = data_array[i].split(",");
			   		data_array_array[i][0] = parseInt(data_array_array[i][0]);
			   		data_array_array[i][1] = parseFloat(data_array_array[i][1]);
			   		if(data_array_array[i][0]!=null && data_array_array[i][1]!=null) {
		        		data.push({x: data_array_array[i][0], y: data_array_array[i][1]});
			   		}
		        } 
		        var data = [{
		        	key: 'people_counter',
		        	values: data
		        }];


		       nv.addGraph(function() {
			    var chart = nv.models.lineChart()
//			      .transitionDuration(350)
			      .showLegend(false)
			      .showYAxis(true)
			      .showXAxis(true);


 		        var xScale = d3.scale.ordinal()
                       .domain([data_array_array[len-2][0]-10,data_array_array[len-2][0]])
                       .range([data_array_array[len-2][0]-10,data_array_array[len-2][0]]);
  
 			    var yScale = d3.scale.ordinal()
                       .domain([0.0,200.0])
                       .range([1.0,0.0]);
/*
				// extentはデータ(dataset)の最小値・最大値を配列で返すものです。
				xScale.domain(d3.extent(dataset, function(d) { return d.date; }));
				yScale.domain(d3.extent(dataset, function(d) { return d.value; }));
*/
			    chart.xAxis
			      .scale(xScale)
			      .orient('bottom')
			      .axisLabel('Time')
                    .tickFormat(function(d) { return d3.time.format('%x')(new Date(d)) });
			    chart.yAxis
			      .scale(yScale)
			      .orient('left')
			      .axisLabel('Info')
			      .tickFormat(d3.format('d'));
			    d3.select('#chart svg')
			      .datum(data)
			      .call(chart);
			    nv.utils.windowResize(function() {
			      chart.update()
			    });
			    return chart;
			  });
	        },
	        error:function() {
	            alert('問題がありました。');
	        }
	    });
	});


function update(){
	    $.ajax({
	        type: 'GET',
	        url: 'http://192.168.100.149/sen',
	        dataType: 'html',
	        success: function(txt) {
	            
	            var data_array = txt.split(/\r\n|\r|\n/);  // 改行コードで分割
      		    var len = data_array.length;
		        var data = [];
		        var data_array_array = [];

			    for (var i = 0; i < len-1; i++){
			   		data_array_array[i] = data_array[i].split(",");
			   		data_array_array[i][0] = parseInt(data_array_array[i][0]);
			   		data_array_array[i][1] = parseFloat(data_array_array[i][1]);
			   		if(data_array_array[i][0]!=null && data_array_array[i][1]!=null) {
		        		data.push({x: data_array_array[i][0], y: data_array_array[i][1]});
			   		}
		        } 
		        var data = [{
		        	key: 'people_counter',
		        	values: data
		        }];


		       nv.addGraph(function() {
			    var chart = nv.models.lineChart()
//			      .transitionDuration(350)
			      .showLegend(false)
			      .showYAxis(true)
			      .showXAxis(true);


 		        var xScale = d3.scale.ordinal()
                       .domain([data_array_array[len-2][0]-10,data_array_array[len-2][0]])
                       .range([data_array_array[len-2][0]-10,data_array_array[len-2][0]]);
  
 			    var yScale = d3.scale.ordinal()
                       .domain([0.0,200.0])
                       .range([1.0,0.0]);
/*
				// extentはデータ(dataset)の最小値・最大値を配列で返すものです。
				xScale.domain(d3.extent(dataset, function(d) { return d.date; }));
				yScale.domain(d3.extent(dataset, function(d) { return d.value; }));
*/
			    chart.xAxis
			      .scale(xScale)
			      .orient('bottom')
			      .axisLabel('Time')
                    .tickFormat(function(d) { return d3.time.format('%X')(new Date(d)) });
			    chart.yAxis
			      .scale(yScale)
			      .orient('left')
			      .axisLabel('Info')
			      .tickFormat(d3.format('d'));
			    d3.select('#chart svg')
			      .datum(data)
			      .call(chart);
			    nv.utils.windowResize(function() {
			      chart.update()
			    });
			    return chart;
			  });
	        },
	        error:function() {
	            alert('問題がありました。');
	        }
	    });
}




function update_human(){
	    $.ajax({
	        type: 'GET',
	        url: 'http://192.168.100.149/sen_human',
	        dataType: 'html',
	        success: function(txt) {
	            
	            var data_array = txt.split(/\r\n|\r|\n/);  // 改行コードで分割
      		    var len = data_array.length;
		        var data = [];
		        var data_array_array = [];

			    for (var i = 0; i < len-1; i++){
			   		data_array_array[i] = data_array[i].split(",");
			   		data_array_array[i][0] = parseInt(data_array_array[i][0]);
			   		data_array_array[i][1] = parseFloat(data_array_array[i][1]);
			   		if(data_array_array[i][0]!=null && data_array_array[i][1]!=null) {
		        		data.push({x: data_array_array[i][0], y: data_array_array[i][1]});
			   		}
		        } 
		        var data = [{
		        	key: 'people_counter',
		        	values: data
		        }];


		       nv.addGraph(function() {
			    var chart2 = nv.models.lineChart()
//			      .transitionDuration(350)
			      .showLegend(false)
			      .showYAxis(true)
			      .showXAxis(true);


 		        var xScale = d3.scale.ordinal()
                       .domain([data_array_array[len-2][0]-10,data_array_array[len-2][0]])
                       .range([data_array_array[len-2][0]-10,data_array_array[len-2][0]]);
  
 			    var yScale = d3.scale.ordinal()
                       .domain([0.0,200.0])
                       .range([1.0,0.0]);
/*
				// extentはデータ(dataset)の最小値・最大値を配列で返すものです。
				xScale.domain(d3.extent(dataset, function(d) { return d.date; }));
				yScale.domain(d3.extent(dataset, function(d) { return d.value; }));
*/
			    chart2.xAxis
			      .scale(xScale)
			      .orient('bottom')
			      .axisLabel('Time')
                    .tickFormat(function(d) { return d3.time.format('%X')(new Date(d)) });
			    chart2.yAxis
			      .scale(yScale)
			      .orient('left')
			      .axisLabel('Info')
			      .tickFormat(d3.format('d'));
			    d3.select('#chart2 svg')
			      .datum(data)
			      .call(chart2);
			    nv.utils.windowResize(function() {
			      chart2.update()
			    });
			    return chart2;
			  });
	        },
	        error:function() {
	            alert('問題がありました。');
	        }
	    });
}
/*
	var data = []
	for(var i = 1; i <= Math.E; i += 0.01) {
	  data.push({x: i, y: Math.log(i)});
	}

	var data = [{
	  key: 'y = log(x)',
	  values: data
	}];

	nv.addGraph(function() {
	  var chart = nv.models.lineChart()
	    .showLegend(false)
	    .showYAxis(true)
	    .showXAxis(true);

	  chart.xAxis
	    .axisLabel('x')
	    .tickFormat(d3.format('.2f'));

	  chart.yAxis
	    .axisLabel('y')
	    .tickFormat(d3.format('.2f'));

	  d3.select('svg')
	    .datum(data)
	    .call(chart);

	  nv.utils.windowResize(function() {
	    chart.update()
	  });

	  return chart;
	});
*/
	update_human();
	setInterval("update()", 2000);
	setInterval("update_human()", 2000);


</script>


 <img src="http://192.168.100.149:8081" width="500" height="400">
 <br/>
 <?php
  	$result = file_get_contents("http://192.168.100.149/getImage.php");
	$array = explode (",", $result);
	for($i =0;$i<10;$i++){
		echo "<img border=\"0\" src=\"$array[$i]\" width=\"200px\" ></img>";
	}
 ?>
</body>
</html>