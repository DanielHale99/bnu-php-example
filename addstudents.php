<?php
	

	include("_includes/config.inc");
	include("_includes/dbconnect.inc");
	include("_includes/functions.inc");
	

	

	// check if logged in
	if (isset($_SESSION['id'])) {
	

	   echo template("templates/partials/header.php");
	   echo template("templates/partials/nav.php");
	

	   // form submitted
	   if (isset($_POST['submit'])) {
	

	

	      // build sql statment to update the student details
	      // add student sql
	    
	    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
	

	      $sql = "INSERT into student (studentid, password, firstname, lastname, dob, house, town, county, country, postcode) values ('$_POST[studentid]', '$password',
	      '$_POST[firstname]', '$_POST[lastname]', '$_POST[dob]', '$_POST[house]', '$_POST[town]', '$_POST[county]', '$_POST[country]', '$_POST[postcode]');";
	

	      $result = mysqli_query($conn,$sql);
	

	      
	      $data['content'] .= "<div class='alert alert-success' role='alert'>Student added successfully</div>";
	

	   }
	

	

	   $data['content'] .= <<<EOD
	
	   <h2>Add Student</h2>
	   <form name="formaddstudent" action="" method="post">
	   <div class="form-group">
	   Student ID :
	   <input name="studentid" type="text" value="" class="form-control"/><br/>
	   </div>
	   <div class="form-group">
	   Password :
	   <input name="password" type="text" value="" class="form-control"/><br/>
	   </div>
	   <div class="form-group">
	   First Name :
	   <input name="firstname" type="text" value="" class="form-control"/><br/>
	   </div>
	   <div class="form-group">
	   Last Name :
	   <input name="lastname" type="text" value="" class="form-control"/><br/>
	   </div>
	   <div class="form-group">
	   Date of birth :
	   <input name="dob" type="text" value="" class="form-control"/><br/>
	   </div>
	   <div class="form-group">
	   House :
	   <input name="house" type="text" value="" class="form-control"/><br/>
	   </div>
	   <div class="form-group">
	   Town :
	   <input name="town" type="text" value="" class="form-control"/><br/>
	   </div>
	   <div class="form-group">
	   County :
	   <input name="county" type="text" value="" class="form-control"/><br/>
	   </div>
	   <div class="form-group">
	   Country :
	   <input name="country" type="text" value="" class="form-control"/><br/>
	   </div>
	   <div class="form-group">
	   Postcode :
	   <input name="postcode" type="text" value="" class="form-control"/><br/>
	   </div>
	   <div class="form-group">
	   Image : 
	   <input name "image" type "file" value="" class="form-control"/><br/>
	   </div>
	   <br>
	   <input type="submit" value="Save" name="submit"/>
	   </form>
	
	EOD;
	


	   // render the template
	   echo template("templates/default.php", $data);
	

	} else {
	   header("Location: student.php");
	}
	

	echo template("templates/partials/footer.php");
	

	?>
