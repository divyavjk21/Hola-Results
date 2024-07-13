<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (!isset($_SESSION['username'])) {
    header("location: login.php");
} elseif ($_SESSION['usertype'] == 'student') {
    header("location: login.php");
}

$host = "localhost";
$user = "root";
$password = "";
$db = "srmsdb";
$data = mysqli_connect($host, $user, $password, $db);

// Check if connection was successful
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to get the count of students for each grade
$query = "SELECT grade, COUNT(*) as student_count FROM result GROUP BY grade";

$result = $data->query($query);

// Initialize empty arrays for storing the data
$grades = array();
$studentCounts = array();

// Fetch data and populate arrays
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $grades[] = $row["grade"];
        $studentCounts[] = $row["student_count"];
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Statistics | Parent</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style3.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="selogo.jpeg">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    
</head>
<body>
<header class="header" style="background-color:black;">
        <a href="parenthome.php" class="btn btn-light">PARENT DASHBOARD</a>
        <div class="logout">
         <a href="home.php" class="btn btn-light">Logout</a>   
        </div>
    </header>
    <canvas id="resultsChart"></canvas>
    
    <script>
        // Get the data from PHP
        var grades = <?php echo json_encode($grades); ?>;
        var studentCounts = <?php echo json_encode($studentCounts); ?>;

        // Create the chart using Chart.js
        var ctx = document.getElementById('resultsChart').getContext('2d');
        var chart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: grades,
                datasets: [{
                    label: 'Number of Students',
                    data: studentCounts,
                    backgroundColor: 'rgba(47, 194, 12, 0.2)',
                    borderColor: 'rgba(32, 12, 92, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }
            }
        });
    </script>
</body>
</html>
