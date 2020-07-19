<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php include '../classes/product.php';?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <link href="/css/style.css" media="screen" rel="stylesheet">
       <script type="text/javascript" src="js/Chart.min.js"></script>
       <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
</head>
<body>
</body>
</html>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Dashboard</h2>
                <div class="block">  
                <div id="piechart"></div>
                <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(drawChart);
                function drawChart() {
              var data = google.visualization.arrayToDataTable([
              ['Task', 'Hours per Day'],
              ['ahihi',1],
              ['ahihi',2],
              [<?php echo $result['productName'] ?>,<?php echo $result['product_soldout'] ?>],
              [<?php echo $result['productName'] ?>,<?php echo $result['product_soldout'] ?>],
              [<?php echo $result['productName'] ?>,<?php echo $result['product_soldout'] ?>],
              [<?php echo $result['productName'] ?>,<?php echo $result['product_soldout'] ?>],
              [<?php echo $result['productName'] ?>,<?php echo $result['product_soldout'] ?>],
              ]);
            var options = {'title':'Thông kê số xe đã bán', 'width':400, 'height':300};
          var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
          }</script>     
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>