<?php
include "assets.php" ; 
top("Josh Gordon's Map", "map") ;
?> 
 <script type="text/javascript" src="//www.google.com/jsapi"></script>
  <script type="text/javascript">
    google.load('visualization', '1', {packages: ['geochart']});

    function drawVisualization() {
      var data = google.visualization.arrayToDataTable([
/*
      For these: 
        4: Lived in state
        3: Been to state multiple times
        2: Been to state once
        1: Driven/ridden through state 
        0: Never been but want to go. 
*/ 
        ['State', 'Status'],
        ['Maryland', 4],
        ['Texas', 3],
        ['Washington', 2],
        ['Oregon', 2],
        ['Idaho', 3],
        ['Montana', 3],
        ['Wyoming', 3],
        ['South Dakota', 2],
        ['Nevada', 2],
        ['Arizona', 2],
        ['Colorado', 3],
        ['Utah', 3],
        ['New Mexico', 2],
        ['PA', 3],
        ['ak', 0],
        ['hi', 0], 
        ['fl', 3], 
        ['ga', 1], 
        ['sc', 3], 
        ['nc', 3], 
        ['tn', 3], 
        ['va', 3], 
        ['wv', 2], 
        ['mo', 2],  
        ['il', 1], 
        ['in', 1], 
        ['oh', 3], 
        ['mi', 3], 
        ['nj', 3], 
        ['ny', 3], 
        ['ma', 3], 
        ['ct', 2], 
        ['nh', 3], 
        ['me', 2],  
        ['ne', 0], 
        ['de', 3], 
    
      ]);
    
      var geochart = new google.visualization.GeoChart(
          document.getElementById('visualization'));
        geochart.draw(data, {region:"US", resolution:"provinces",
        enableRegionInteractivity:false, 
        colorAxis:
          {colors:['#3399FF', '#fdcc8a', '#fc8d59', '#e34a33', '#b30000'], 
          values:[0, 1, 2, 3, 4]}, datalessRegionColor:'#fef0d9',
         legend:false});
    }
    

    google.setOnLoadCallback(drawVisualization);
  </script>
  <style>
     .color { 
        height: 75px;
        width: 100px;
        float: left;
        margin: 10px;
        border: 1px solid #000; 
        position: relative;
        -webkit-box-shadow: 0 0 10px #eee; 
        -moz-box-shadow: 0 0 10px #eee; 
        box-shadow: 0 0 10px #eee; 
      }
    .color:hover {
        -webkit-box-shadow: 0 0 10px #666; 
        -moz-box-shadow: 0 0 10px #666; 
        box-shadow: 0 0 10px #666; 
      }
    .info { 
        background-color: #fff;
        background-color: rgba(255,255,255,.5);
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        padding: 5px;
        border-top: 1px solid #000;
        font-size: 12px;
        text-align: center;
      }

  </style> 
<body style="font-family: Arial;border: 0 none;">
<div id="visualization"></div>

<div class="color" style="background-color: #b30000">
  <div class="info">
    Lived
  </div>
</div>

<div class="color" style="background-color: #e34a33">  
  <div class="info"> 
    Multiple Visits
  </div> 
</div> 

<div class="color" style="background-color: #fc8d59">
  <div class="info"> 
    One Visit
  </div> 
</div> 

<div class="color" style="background-color: #fdcc8a"> 
  <div class="info"> 
    Passed Through
  </div> 
</div>

<div class="color" style="background-color: #3399FF"> 
  <div class="info"> 
    Want to visit
  </div> 
</div>  
<div class="color" style="background-color: #fef0d9"> 
  <div class="info"> 
    Never Been
  </div> 
</div> 
<?php 
bottom() ; 
?> 
