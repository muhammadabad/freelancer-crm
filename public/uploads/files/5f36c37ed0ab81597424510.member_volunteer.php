
  <?php
  define('GW_UPLOADPATH', 'admin/images/volunteer/');
  define('GW_MAXFILESIZE', 3145728); 
  include 'inc/config.php';
include 'inc/new-header.php';
// Start the session
session_start();
if(isset($_POST['submit'])){
	$name = $_POST['name'];
    $email = $_POST['email'];
    $bloodgrp = $_POST['bloodgrp'];
    $gender = $_POST['gender'];
    $nationality = $_POST['nationality'];
    $phone = $_POST['phone'];
    $profession = $_POST['profession'];
    $address = $_POST['address'];
    $whyAaghaz = mysqli_escape_string($con,$_POST['why_aaghaz']);
    
	$image = $_FILES['photo']['name']; 
    $id_proof =  $_FILES['id_proof']['name'];
// $target = GW_UPLOADPATH . $image;
$date = date("Y/m/d");
move_uploaded_file($_FILES['photo']['tmp_name'], GW_UPLOADPATH . $image);
move_uploaded_file($_FILES['id_proof']['tmp_name'], GW_UPLOADPATH . $id_proof);

	$sql = "INSERT INTO `volunteers`( `name`,`email`, `blood_group`,`gender`,`phone`,`profession`,`address`,`nationality`,`why_aaghaz`,`photo`,`id_proof`, `create_at`)
	 VALUES ('$name','$email','$bloodgrp',' $gender','$phone','$profession',' $address','$nationality','$whyAaghaz','$image','$id_proof','$date')";
     $run = mysqli_query($con,$sql);
     if($run){
        $_SESSION['success']=true;
     }else{
        $_SESSION['error']=true;
     }

}

    ?>
<div class="header-height"></div>
	<div class="pager-header">
		<div class="container">



			<div class="page-content">
				<h2>Become a Member/ Volunteer</h2>
				<p>Connect today with us, and become a part of our family </p>
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="index.php">Home</a></li>
					<li class="breadcrumb-item " style="color: white">Member/ Volunteer</li>
				</ol>
			</div>
		</div>
	</div>
	<section class="contact-section padding">
		<div class="container">
		
		<?php
	if($_SESSION['success'])               
        echo "<div class=\"alert alert-success alert-dismissable\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
        Thanks for Joining Us, we’ll get back to you soon.!
        </div>";
        unset($_SESSION['success']);
        ?>
		<?php
	if($_SESSION['error'])               
        echo "<div class=\"alert alert-danger alert-dismissable\">
        <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>    
          Something went wrong, Please try again later.
        </div>";
        unset($_SESSION['error']);
        ?>
			<div class="row contact-wrap">
				<div class="col-md-4 xs-padding">
					<div class="contact-form">
						<h3>Become a Member / volunteer</h3>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
						<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Main has survived not only five centuries.</p>
					</div>
				</div>
				<div class="col-md-8 xs-padding">
					<div class="contact-form">
						<form action="" method="post" name="myForm" onsubmit = "return validateForm()"  class="form-horizontal" enctype="multipart/form-data">
							<div class="form-group colum-row row">
								<div class="col-sm-6">
									<input type="text" id="name" name="name" class="form-control" placeholder="Name" required> </div>
								<div class="col-sm-6">
									<input type="text" id="email" name="nationality" class="form-control" placeholder="Nationality" required> </div>
							</div>
							<div class="form-group colum-row row">
								<div class="col-sm-6">
									<select class="form-last-name form-control" name="bloodgrp" id="MainContent_DropDownList1" required>
										<option value="">Choose Blood Group...</option>
										<option value="A Positive">A Positive</option>
										<option value="A Negative">A Negative</option>
										<option value="B Positive">B Positive</option>
										<option value="B Negative">B Negative</option>
										<option value="AB Positive">AB Positive</option>
										<option value="AB Negative">AB Negative</option>
										<option value="O Positive">O Positive</option>
										<option value="O Negative">O Negative</option>
										<option value="Not Know">Not Know</option>
									</select>
								</div>
								<div class="col-sm-6">
									<select class="form-last-name form-control" name="gender" id="MainContent_DropDownList1" required>
										<option value="">Select Gender...</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
										<option value="Other">Other</option>
									</select>
								</div>
							</div>
							<div class="form-group colum-row row">
								<div class="col-sm-6">
									<input type="number" id="name phone" pattern="[1-9]{1}[0-9]{9}" name="phone" class="form-control" placeholder="Phone" maxlength="10" required> </div>
								<div class="col-sm-6">
									<input type="email" id="email" name="email" class="form-control" placeholder="Email" required> </div>
							</div>
							<div class="form-group colum-row row">
								<div class="col-sm-6">
									<input type="text" id="name" name="profession" class="form-control" placeholder="Profession" required> </div>
								<div class="col-sm-6">
									<input type="text" id="email" name="address" class="form-control" placeholder="Address" required> </div>
							</div>
							<div class="form-group colum-row row">
								<div class="col-sm-6">
									<label>Upload ID Proof</label>
									<input type="file" name="id_proof" id="myFile" multiple="" size="50" onchange="myFunction()" required> </div>
								<div class="col-sm-6">
									<label>Upload Photo</label>
									<input type="file" name="photo" id="myFile" multiple="" size="50" onchange="myFunction()" required> </div>
							</div>
							<div class="form-group colum-row row">
								<div class="col-sm-12">
									<textarea type="text" name="why_aaghaz" placeholder="Why do you want to be a part of Aaghaz..." class="form-control" id="form-last-name" spellcheck="false" style="height: 100%" required></textarea>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-md-12">
									<button id="submit" name="submit" class="default-btn" type="submit">Submit Form</button>
								</div>
							</div>
							<!-- <div id="form-messages" class="alert" role="alert"></div> -->
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
	<script type="text/javascript">
    function validateForm() {
        return checkPhone();
    }
    function checkPhone() {
		debugger;
        var phone = document.forms["myForm"]["phone"].value;
        var phoneNum = /^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/; 
            if(phone.value.match(phoneNum)) {
                return true;
            }
            else {
                document.getElementById("phone").className = document.getElementById("phone").className + " error";
                return false;
            }
        }
</script>
  <?php
include 'inc/new-footer.php';
    ?>