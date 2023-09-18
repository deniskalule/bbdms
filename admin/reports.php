<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{
if(isset($_REQUEST['hidden']))
	{
$eid=intval($_GET['hidden']);
$status="0";
$sql = "UPDATE tblblooddonars SET Status=:status WHERE  id=:eid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':eid',$eid, PDO::PARAM_STR);
$query -> execute();

$msg="Donor details hidden Successfully";
}


if(isset($_REQUEST['public']))
	{
$aeid=intval($_GET['public']);
$status=1;

$sql = "UPDATE tblblooddonars SET Status=:status WHERE  id=:aeid";
$query = $dbh->prepare($sql);
$query -> bindParam(':status',$status, PDO::PARAM_STR);
$query-> bindParam(':aeid',$aeid, PDO::PARAM_STR);
$query -> execute();

$msg="Donor details public";
}
//Code for Deletion
if(isset($_REQUEST['del']))
	{
$did=intval($_GET['del']);
$sql = "delete from patients WHERE  id=:did";
$query = $dbh->prepare($sql);
$query-> bindParam(':did',$did, PDO::PARAM_STR);
$query -> execute();

$msg="Record deleted Successfully ";
}

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
	
	<title>ECDIS | Volunteer List  </title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
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
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">

						<h2 class="page-title">Generate Patient reports</h2>

                        <div class="search-section">
                            <h4><b><u>Filter by Date</u></b></h4>
                            <form action="" class="form d-flex">
                                <div class="form-group">
                                    <label>From:  </label>
                                    <input type="date" name="from_date" required style="width: 300px; border: 1px solid #2222220;">
                                </div>
                                <div class="form-group ml-4">
                                    <label>To:  </label>
                                    <input type="date" name="from_date" required style="width: 300px; border: 1px solid #2222220;">
                                </div>
                                <button type="submit" class="search btn btn-sm btn-primary ml-4" style="height: 30px;">Search</button>
                            </form>
                        </div>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default mb-2">
							<div class="panel-heading">Patients List</div>
								<!-- <a href="download-records.php" style="font-size:16px;" class="btn btn-info btn-sm">Download Volunteers List</a> -->
							<div class="panel-body">
							<?php if($error){?><div class="alert alert-danger errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
							else if($msg){?><div class="alert alert-success succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
			
                                <a href="" class="btn btn-sm btn-success mb-2"><i class="fa fa-print" aria-hidden="true"></i> Print Report </a>
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>ID</th>
											<th>Name</th>
											<th>Gender</th>
											<th>DOB</th>
											<th>Address</th>
											<th>Contact</th>
											<th>Disease</th>
											<th>Disease Duration</th>
											<th>Health Facility </th>
											<th>Added by </th>
											<th>Message </th>
											<th>action </th>
										</tr>
									</thead>
									
									<tbody>
										<?php $sql = "SELECT * from  patients ";
										$query = $dbh -> prepare($sql);
										$query->execute();
										$results=$query->fetchAll(PDO::FETCH_OBJ);
										$cnt=1;
										if($query->rowCount() > 0)
										{
										foreach($results as $result)
										{?>	
											<tr>
														<td><?php echo htmlentities($cnt);?></td>
														<td><?php echo htmlentities($result->patient_name);?></td>
														<td><?php echo htmlentities($result->gender);?></td>
														<td><?php echo htmlentities($result->date_of_birth);?></td>
														<td><?php echo htmlentities($result->address);?></td>
														<td><?php echo htmlentities($result->contact);?></td>
														<td><?php echo htmlentities($result->disease);?></td>
														<td><?php echo htmlentities($result->disease_duration);?></td>
														<td><?php echo htmlentities($result->health_facility);?></td>
														<td><?php $uid = $result->volunteer;
															 $sql = "SELECT * from  tblblooddonars where id=$uid ";
															 $query = $dbh -> prepare($sql);
															 $query->execute();
															 $results=$query->fetchAll(PDO::FETCH_OBJ);

															 foreach($results as $name)
															 {
																echo $name->FullName;
															 }
														?></td>
														<td><?php echo htmlentities($result->message);?></td>
													
													
													<td>
												        <a href="patients.php?del=<?php echo htmlentities($result->id);?>" onclick="return confirm('Do you really want to delete this record')" class="btn btn-danger" style="margin-top:1%;"> Delete</a>
												    </td>
											</tr>
										<?php $cnt=$cnt+1; }} ?>
									</tbody>
								</table>
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
</body>
</html>
<?php } ?>
