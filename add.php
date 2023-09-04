<?php session_start();
    error_reporting(0);
    include('includes/config.php');
    if(isset($_POST['submit'])) 
    {
        echo $volunteer = $_POST['uid'];
        $patient_name=$_POST['patient_name'];
        $gender=$_POST['gender'];
        $date_of_birth=$_POST['date_of_birth'];
        $address=$_POST['address'];
        $contact=$_POST['contact'];
        $disease=$_POST['disease'];
        $disease_duration=$_POST['disease_duration'];
        $health_facility=$_POST['health_facility'];
        $message=$_POST['message'];
        
        $sql="INSERT INTO patients(patient_name,gender,date_of_birth,address,contact,disease,disease_duration,health_facility,message,volunteer) 
        VALUES(:patient_name,:gender,:date_of_birth,:address,:contact,:disease,:disease_duration,:health_facility,:message,:volunteer)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':patient_name',$patient_name,PDO::PARAM_STR);
        $query->bindParam(':gender',$gender,PDO::PARAM_STR);
        $query->bindParam(':date_of_birth',$date_of_birth,PDO::PARAM_STR);
        $query->bindParam(':address',$address,PDO::PARAM_STR);
        $query->bindParam(':contact',$contact,PDO::PARAM_STR);
        $query->bindParam(':disease',$disease,PDO::PARAM_STR);
        $query->bindParam(':disease_duration',$disease_duration,PDO::PARAM_STR);
        $query->bindParam(':health_facility',$health_facility,PDO::PARAM_STR);
        $query->bindParam(':message',$message,PDO::PARAM_STR);
        $query->bindParam(':volunteer',$volunteer,PDO::PARAM_STR);
        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if($lastInsertId)
        {

        echo "<script>alert('You have Scuccessfully added a new patient');</script>";
        }
        else
        {

        echo "<script>alert('Something went wrong.Please try again');</script>";
        }
        }


?>


<!DOCTYPE html>
<html lang="en">

<head>
	<title>Elderly Chronic Disease Information System | About Us </title>
	<!-- Meta tag Keywords -->
	
	<script>
		addEventListener("load", function () {
			setTimeout(hideURLbar, 0);
		}, false);

		function hideURLbar() {
			window.scrollTo(0, 1);
		}
	</script>
	<!--// Meta tag Keywords -->

	<!-- Custom-Files -->
	<link rel="stylesheet" href="css/bootstrap.css">
	<!-- Bootstrap-Core-CSS -->
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	<!-- Style-CSS -->
	<link rel="stylesheet" href="css/fontawesome-all.css">
	<!-- Font-Awesome-Icons-CSS -->
	<!-- //Custom-Files -->

	<!-- Web-Fonts -->
	<link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese"
	    rel="stylesheet">
	<!-- //Web-Fonts -->
</head>

<body>
	<?php include('includes/header.php');?>

	<!-- banner 2 -->
	<div class="inner-banner-w3ls">
		<div class="container">

		</div>
		<!-- //banner 2 -->
	</div>
	<!-- page details -->
	<div class="breadcrumb-agile">
		<div aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="index.php">Home</a>
				</li>
				<li class="breadcrumb-item active" aria-current="page">Add patient</li>
			</ol>
		</div>
	</div>
	<!-- //page details -->

	<!-- about -->
	<section class="about py-5">
		<div class="row ">
			<div class="container">
				<div class="shadow bg-light">
					<h5 class="text-center mb-4 pt-4">Add Patient </h5>
                    <hr>
					<form action="" name="add" method="post" class="p-3" onsubmit="return checkpass();">
                        <h5 class=" mb-3"><b>Personal Information</b></h5>
                        <input type="hidden" value="<?= $_SESSION['bbdmsdid']; ?>" name="uid">
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Full Name</label>
                                <input type="text" class="form-control" name="patient_name" required>
                            </div>
                            <div class="form-group col-6">
                                <label for="">Gender</label>
                                <select class="form-control" name="gender" required>
                                    <option value="" selected disabled>Select gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Date of Birth</label>
                                <input type="date" class="form-control" name="date_of_birth" required>
                                
                            </div>
                            <div class="form-group col-6">
                                <label for="">Address</label>
                                <input type="text" class="form-control" name="address" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Contact</label>
                                <input type="text" class="form-control" name="contact" required>
                            </div>
                        </div>

                        <hr>
						<h5 class=" mb-3"><b>Health Information</b></h5>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Type of Chronic Disease</label>
                                <select class="form-control" name="disease" required>
                                    <option value="" selected disabled>Select disease</option>
                                    <?php $sql = "SELECT * from  tblbloodgroup ";
                                        $query = $dbh -> prepare($sql);
                                        $query->execute();
                                        $results=$query->fetchAll(PDO::FETCH_OBJ);
                                        $cnt=1;
                                        if($query->rowCount() > 0){
                                            foreach($results as $result)
                                            {
                                                ?>
                                                <option value="<?= htmlentities($result->BloodGroup); ?>"><?= htmlentities($result->BloodGroup); ?></option>

                                                <?php
                                            }
                                        }	
                                        ?>
                                </select>
                            </div>
                            <div class="form-group col-6">
                                <label for="">How many years has the patient suffered from this disease</label>
                                <input type="text" class="form-control" name="disease_duration" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-6">
                                <label for="">Has the patient ever visited a health facility?</label>
                                <select class="form-control" id="question" name="health_facility_visit" required>
                                    <option value="" selected disabled>Select option</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            <div class="form-group col-6" id="display" style="display:none;">
                                <label for="">If Yes, which health facility?</label>
                                <input type="text" class="form-control" name="health_facility" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Message: </label>
                            <textarea name="message" id=""rows="5" class="form-control"></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-primary submit mb-4" name="submit">Save</button>

                        <!-- <button type="submit" name="submit" class="btn btn-sm w-25 submit btn-success">Save information</button> -->
					</form>
				</div>
			</div>
		</div>
	</section>
	<!-- //about -->

	<?php include('includes/footer.php');?>

	<!-- Js files -->
	<!-- JavaScript -->
	<script src="js/jquery-2.2.3.min.js"></script>
	<!-- Default-JavaScript-File -->

	<!-- fixed navigation -->
	<script src="js/fixed-nav.js"></script>
	<!-- //fixed navigation -->

	<!-- smooth scrolling -->
	<script src="js/SmoothScroll.min.js"></script>
	<!-- move-top -->
	<script src="js/move-top.js"></script>
	<!-- easing -->
	<script src="js/easing.js"></script>
	<!--  necessary snippets for few javascript files -->
	<script src="js/medic.js"></script>

	<script src="js/bootstrap.js"></script>
	<!-- Necessary-JavaScript-File-For-Bootstrap -->

	<!-- //Js files -->

    <script>
        $(document).ready(function () {
            $("#question").change(function (e) { 
                e.preventDefault();
                var ans = $(this).val();
                
                if(ans == "Yes"){
                    $("#display").show();
                }
                else{
                    $("#display").hide();
                }
            });
        });
    </script>

</body>

</html>