<?php
    include "auth/is_admin.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'page_head.php'; ?>   
    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Cacti Succulent Kuching</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <div class="container">
        <h1 class="text-center mt-5">Visitor Pattern Report</h1>
        <p class="text-center mt-5"><?php echo "Report based on: " . date("d/m/Y") . "<br>";?></p> 
        
        <h2 class="text-center mt-5">Daily Report</h2>
        <hr />
        
        <h3 class="text-center mt-5">Day Based Report</h3>
        <div class="text-center mt-5">
            <canvas id="DayChart"></canvas>
        </div>
        
        <h3 class="text-center mt-5">Daily Month Report</h3>
        <div class="text-center mt-5">
            <canvas id="MonthChart"></canvas>
        </div>

        <h2 class="text-center mt-5">Yearly Report</h3>
        <hr />
        
        <div class="text-center mt-5">
            <canvas id="YearChart"></canvas>
        </div>
    </div>
    <br />
    <script src="script/chart.js"></script>
    <script>
        initialiseDayChart();
        initialiseMonthChart();
        initialiseYearChart();
    </script>
    <?php include 'footer.php'; ?>
</body>
</html>