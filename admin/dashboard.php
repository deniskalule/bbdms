<?php
session_start();	
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>ECDIS | Admin Dashboard</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
<?php include('includes/header.php');?>

	<div class="ts-main-content">
<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h4 class="page-title">Dashboard</h4>
						
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body text-light" style="background: rgb(5, 5, 70);">
												<div class="stat-panel text-center">
													<?php 
													$sql ="SELECT id from tblbloodgroup ";
													$query = $dbh -> prepare($sql);
													$query->execute();
													$results=$query->fetchAll(PDO::FETCH_OBJ);
													$bg=$query->rowCount();
													?>
													<div class="row">
														<div class="col-5">
	
															<div class="stat-panel-number h1 "><?php echo htmlentities($bg);?></div>
														</div>
														<div class="col-7" style="border-left: 2px solid #fff">
															<i class="fa fa-crosshairs" aria-hidden="true" style="font-size: 2rem;"></i>
															<div class="stat-panel-title text-uppercase"  style="margin-top: 5px;">Listed Chronic Diseases</div>

														</div>
													</div>
												</div>
											</div>
											<a href="manage-diseases.php" class="block-anchor panel-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body  text-light" style="background: green;">
												<div class="stat-panel text-center">
												<?php 
													$sql1 ="SELECT id from tblblooddonars ";
													$query1 = $dbh -> prepare($sql1);;
													$query1->execute();
													$results1=$query1->fetchAll(PDO::FETCH_OBJ);
													$regbd=$query1->rowCount();
													?>
													<div class="row">
														<div class="col-5">
	
															<div class="stat-panel-number h1 "><?php echo htmlentities($regbd);?></div>	
														</div>
														<div class="col-7" style="border-left: 2px solid #fff">
															<i class="fa fa-users" aria-hidden="true" style="font-size: 2rem;"></i>
															<div class="stat-panel-title text-uppercase mt-2">Registered Volunteers</div>

														</div>
													</div>
													
												</div>
											</div>
											<a href="donor-list.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
									<div class="col-md-3">
										<div class="panel panel-default">
											<div class="panel-body  text-light" style="background: rgb(5, 5, 70);">
												<div class="stat-panel text-center">
												<?php 
													$sql6 ="SELECT id from tblcontactusquery ";
													$query6 = $dbh -> prepare($sql6);;
													$query6->execute();
													$results6=$query6->fetchAll(PDO::FETCH_OBJ);
													$query=$query6->rowCount();
													?>
													<div class="row">
														<div class="col-5">
	
															<div class="stat-panel-number h1 "><?php echo htmlentities($query);?></div>
														</div>
														<div class="col-7" style="border-left: 2px solid #fff">
															<i class="fa fa-book" aria-hidden="true" style="font-size: 2rem;"></i>
															<div class="stat-panel-title text-uppercase mt-3	">Total Queries</div>

														</div>
													</div>
												</div>
											</div>
											<a href="manage-conactusquery.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>

									<div class="col-md-3">
										<div class="panel panel-danger">
											<div class="panel-body bg-dark text-light">
												<div class="stat-panel text-center">
												<?php 
													$sql6 ="SELECT id  from patients ";
													$query6 = $dbh -> prepare($sql6);;
													$query6->execute();
													$results6=$query6->fetchAll(PDO::FETCH_OBJ);
													$totalreuqests=$query6->rowCount();
													?>
													<div class="row">
														<div class="col-5">
	
															<div class="stat-panel-number h1 "><?php echo htmlentities($totalreuqests);?></div>
														</div>
														<div class="col-7" style="border-left: 2px solid #fff">
															<i class="fa fa-users" aria-hidden="true" style="font-size: 2rem;"></i>
															<div class="stat-panel-title text-uppercase mt-2">Registered Patients</div>

														</div>
													</div>
												</div>
											</div>
											<a href="patients.php" class="block-anchor panel-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
										</div>
									</div>
								</div>

								
							</div>
						</div>

						<div class="row mt-3">
							<div class="col-md-5">
								<h4 class="text-center">Chronicle Disease Statistics</h4>

								<div class="donut-chart shadow rounded bg-light">
									<canvas id="donut"></canvas>
								</div>
							</div>
							<div class="col-md-7">
								<h4 class="text-center">Disease Distribution</h4>

								<div class="bar-chart shadow rounded bg-light">
									<canvas id="bar"></canvas>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>
			
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
<?php
	// Inside the PHP section
$sqlGender = "SELECT COUNT(*) AS male_count FROM patients WHERE gender = 'Male'";
$queryGender = $dbh->prepare($sqlGender);
$queryGender->execute();
$maleCount = $queryGender->fetch(PDO::FETCH_ASSOC)['male_count'];

$sqlGender = "SELECT COUNT(*) AS female_count FROM patients WHERE gender = 'Female'";
$queryGender = $dbh->prepare($sqlGender);
$queryGender->execute();
$femaleCount = $queryGender->fetch(PDO::FETCH_ASSOC)['female_count'];
?>

<!-- Inside the JavaScript section -->
<script>
var ctx = document.getElementById('donut').getContext('2d');
var data = {
    labels: ['Male Patients', 'Female Patients'],
    datasets: [{
        data: [<?php echo $maleCount; ?>, <?php echo $femaleCount; ?>],
        backgroundColor: ['rgb(5, 5, 70)', 'green']
    }]
};
var config = {
    type: 'doughnut',
    data: data,
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                display: true,
                position: 'top'
            }
        }
    }
};
var myChart = new Chart(ctx, config);
</script>

<?php
// ... Your existing PHP code ...

// Fetch data for Disease Distribution
$sqlDiseases = "SELECT disease, COUNT(*) AS patient_count FROM patients GROUP BY disease";
$queryDiseases = $dbh->prepare($sqlDiseases);
$queryDiseases->execute();
$resultsDiseases = $queryDiseases->fetchAll(PDO::FETCH_ASSOC);

$diseaseLabels = [];
$patientCounts = [];

foreach ($resultsDiseases as $row) {
    $diseaseLabels[] = $row['disease'];
    $patientCounts[] = $row['patient_count'];
}
?>

<!-- ... Your existing HTML and chart setup ... -->

<script>
    // Bar chart for Disease Distribution
    var ctx = document.getElementById('bar').getContext('2d');

    var data = {
        labels: <?php echo json_encode($diseaseLabels); ?>,
        datasets: [{
            label: 'Number of Patients per disease',
            data: <?php echo json_encode($patientCounts); ?>,
            backgroundColor: 'green',
            fill: false
        }]
    };

    var config = {
        type: 'bar',
        data: data,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            },
            scales: {
                x: {
                    display: true,
                    title: {
                        display: true,
                        text: 'Chronic Diseases'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Number of Patients'
                    }
                }
            }
        }
    };

    var myChart = new Chart(ctx, config);
</script>

<!-- ... Rest of your HTML ... -->


</body>
</html>
<?php } ?>