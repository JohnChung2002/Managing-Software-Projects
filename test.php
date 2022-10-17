<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'page_head.php'; ?>
    <title>Cacti Succulent Kuching</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <div>
        <canvas id="demoDayChart"></canvas>
    </div>
    <div>
        <canvas id="demoMonthChart"></canvas>
    </div>
    <div>
        <canvas id="demoTimeChart"></canvas>
    </div>
    <div>
        <canvas id="demoYearChart"></canvas>
    </div>
    <script src="script/chart.js"></script>
    <script>
        initialiseDayChart();
        initialiseMonthChart();
        initialiseTimeChart();
        initialiseYearChart();
    </script>
    <?php include 'footer.php'; ?>
</body>
</html>