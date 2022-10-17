<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'page_head.php'; ?>
    <title>Cacti Succulent Kuching</title>
</head>
<body>
    <?php include 'header.php'; ?>
    <h1 class="text-center mt-5">Visitor Pattern Report</h1>
    <h2 class="text-center mt-5">Daily Report</h2>
    <hr />
    <h3 class="text-center mt-5">Time Based Report</h3>
    <div class="text-center mt-5">
        <canvas id="TimeChart"></canvas>
    </div>
    <h3 class="text-center mt-5">Day Based Report</h3>
    <div class="text-center mt-5">
        <canvas id="DayChart"></canvas>
    </div>
    <h2 class="text-center mt-5">Monthly Report</h2>
    <hr />
    <div class="text-center mt-5">
        <canvas id="MonthChart"></canvas>
    </div>
    <h2 class="text-center mt-5">Yearly Report</h3>
    <hr />
    <div class="text-center mt-5">
        <canvas id="YearChart"></canvas>
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