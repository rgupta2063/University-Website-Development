<!--
Gupta, Ritu
CS545_00
Assignment #4
Fall 2020
Instructor #Cynthia Chie
-->
<?php
 session_start();
?>
<!DOCTYPE html>
<html lang= 'en'>
<head>
	<title>SDSU Natural History Museum</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="museumCSS.css">
	<script src="newfeatures.js"></script>
</head>
<body onload="getLastModified()">
	<header>
		<div class='first'>
			<a href="https://www.sdsu.edu" target="_blank"><img class="fltrght" src="images/SDSUwLSH_3Color_RV.png" alt="San Diego State university: Leadership Starts Here" width="245" height="217" /></a>
			<h1>San Diego State University <br />Natural History Museum</h1>
		</div>
		<nav class="clrflt">
			<ul class="HNav1">
				<li><a href="index.html">Home</a></li>
				<li><a href="about.html">About the Museum</a></li>
				<li><a href="exhibits.html">Exhibits</a></li>
				<li><a href="events.html">Events</a></li>
				<li><a href="science.html">Science</a></li>
				<li><a href="involve.html">Get Involved</a></li>
			</ul>
		</nav>
	</header>
	<section class="flex_container">
		<div class="column_1">
			<?php
			// Define variables and set to empty
			$first_name = $last_name = $address = $phone = $email = $event = $total = $less5 = $bt5to12 = $bt13to17 = $older18 = $signup = $otherevents  = " " ;
			$first_nameErr = $last_nameErr = $emailErr = $eventErr = $totalErr = $matchErr = $less5Err = $bt5to12Err = $bt13to17Err = $older18Err = " ";
			$count='0';
			
			function test_input($data){
				$data = trim($data);
				$data = stripcslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			if ($_SERVER["REQUEST_METHOD"] == "POST"){
				$valid = true;

				/* Validating and storing first name field value*/
				if (empty(filter_input(INPUT_POST, "first_name")))
				{
					$first_name = " ";
					$valid = false;
					$first_nameErr = "Required";
				}
				else{
					$_SESSION['first_name'] = test_input(filter_input(INPUT_POST, "first_name")); 
			   		$first_name = test_input(filter_input(INPUT_POST, "first_name"));				
				}

				/* Validating and storing last name field value*/
				if (empty(filter_input(INPUT_POST, "last_name"))){
					$last_name =" ";
					$valid = false;
					$last_nameErr = "Required";
				}
				else{
					$_SESSION['last_name'] = test_input(filter_input(INPUT_POST, "last_name")); 
			   		$last_name = test_input(filter_input(INPUT_POST, "last_name"));				
				}

				/* Storing phone field value*/
				if (empty(filter_input(INPUT_POST, "phone"))){
					$_SESSION["phone"] = "";
				}
				else {
					$_SESSION["phone"] = test_input(filter_input(INPUT_POST, "phone"));
					$phone = test_input(filter_input(INPUT_POST, "phone"));
				}

				/* Storing address field value*/
				if (empty(filter_input(INPUT_POST, "address"))){
					$_SESSION["address"] = "";
				}
				else {
					$_SESSION["address"] = test_input(filter_input(INPUT_POST, "address"));
					$address = test_input(filter_input(INPUT_POST, "address"));
				}

				/* Validating and storing email field value*/
				if (empty(filter_input(INPUT_POST, "email"))){
					$email = " ";
					$valid = false;
					$emailErr = "Required";
				}
				else{
					$_SESSION['email'] = test_input(filter_input(INPUT_POST, "email")); 
			   		$email = test_input(filter_input(INPUT_POST, "email"));		
			   		/* check if e-mail address is well-formed*/
			   		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			   			$valid = false;
			   			$emailErr = "Invalid email format";
			   		}	
				}

				/* Validating and storing event field value*/
				if (filter_input(INPUT_POST, "event")=="none"){
					$valid = false;
					$eventErr = "Required";
				}
				else{
					$_SESSION['event'] = test_input(filter_input(INPUT_POST, "event")); 
			   		$event = test_input(filter_input(INPUT_POST, "event"));
			   	}


			   	/* Validating and storing under 5 years age group*/
				if (empty(filter_input(INPUT_POST, "less5")) && (filter_input(INPUT_POST, "less5") != '0') ) {
					$less5 = " ";
					$valid = false;
					$less5Err = "Required.Please enter 0 if there is no attendee in this age group.";
				}
				else{
			   		$less5 = test_input(filter_input(INPUT_POST, "less5"));
			   		if(is_numeric($less5)){
			   			$_SESSION['less5'] = test_input(filter_input(INPUT_POST, "less5")); 
			   			$count += $less5;
			   		}
			   		else{
			   			$valid = false;
						$less5Err = "Invalid number format, please enter valid number";
			   		}
			   	}

			   	/* Validating and storing 5 to 12 years age group*/
				if (empty(filter_input(INPUT_POST, "bt5to12")) && (filter_input(INPUT_POST, "bt5to12") != '0')){
					$valid = false;
					$bt5to12Err = "Required.Please enter 0 if there is no attendee in this age group.";
				}
				else{	
					$bt5to12 = test_input(filter_input(INPUT_POST, "bt5to12"));
			   		if(is_numeric($bt5to12)){
			   			$_SESSION['bt5to12'] = test_input(filter_input(INPUT_POST, "bt5to12")); 
			   			$count += $bt5to12;
			   		}
			   		else{
			   			$valid = false;
						$bt5to12Err = "Invalid number format, please enter valid number";
			   		}
			   	}

			   	/* Validating and storing 13 to 17 years age group*/
				if (empty(filter_input(INPUT_POST, "bt13to17")) && (filter_input(INPUT_POST, "bt13to17") != '0')){
					$valid = false;
					$bt13to17Err = "Required.Please enter 0 if there is no attendee in this age group.";
				}
				else{
					$bt13to17 = test_input(filter_input(INPUT_POST, "bt13to17"));
			   		if(is_numeric($bt13to17)){
			   			$_SESSION['bt13to17'] = test_input(filter_input(INPUT_POST, "bt13to17"));
			   			$count += $bt13to17; 
			   		}
			   		else{
			   			$valid = false;
						$bt13to17Err = "Invalid number format, please enter valid number";
			   		}
			   	}
			   	/* Validating and storing above 18 years age group*/
				if (empty(filter_input(INPUT_POST, "older18")) && (filter_input(INPUT_POST, "older18") != '0')){
					$valid = false;
					$older18Err = "Required.Please enter 0 if there is no attendee in this age group.";
				}
				else{
					$older18 = test_input(filter_input(INPUT_POST, "older18"));
			   		if(is_numeric($older18)){
			   			$_SESSION['older18'] = test_input(filter_input(INPUT_POST, "older18")); 
			   			$count += $older18;
			   		}
			   		else{
			   			$valid = false;
						$older18Err = "Invalid number format, please enter valid number";
			   		}
			   	}

			  /* Commenting this code from assignment3. Modified Calculation of Total attendess count and added checkbox to signup option.
			 //   	if ($total != ($less5+$bt5to12+$bt13to17+$older18)){
			 //   		$valid = false;
			 //   		$matchErr = "Total no of candidates are not equal to some of the candidates mentioned below.";
			 //   	}


			 //   	if (empty(filter_input(INPUT_POST, "signup"))) {
    //            		$_SESSION['signup'] = "";
    //         	}
    //         	else {
			 // 		$_SESSION['signup'] = test_input(filter_input(INPUT_POST, "signup"));
				// }
			*/


			   	/* Validating total count to be present and also Storing total count of attendess into total */
			   	if (empty(filter_input(INPUT_POST, "total")) ){
					$valid = false;
					$totalErr = "Total number of candidates is required. Please enter one for yourself.";
				}
				else{
					$_SESSION['total'] = $count;
					$total = $count;
			   	}

				/* Checking the value of Signup option Yes or No */
			   	$_SESSION['signup'] = isset($_POST['signup'])? "Yes" : "No";

 				/* Storing Other Events */
  				if (empty(filter_input(INPUT_POST, "otherevents"))) {
               		$_SESSION['otherevents'] = "";
				} else {
					$_SESSION['otherevents'] = test_input(filter_input(INPUT_POST, "otherevents"));
					$otherevents = test_input(filter_input(INPUT_POST, "otherevents"));
				}

		
				/* Navigating to confirmation page*/
			   	if ($valid){
			   		header("location:confirmation.php");
			   		exit();
			   	}
				
			}
		   ?>


		   <h3>Please fill out this form and click Submit when finished.</h3><br>
		   <form name="newsletter" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >
		   		<p><span class = "required">* required field</span></p>

		   		<fieldset>
		   			<legend>Information:</legend>
		   				<label for="first_name">First Name<span class="required">*</span>:</label><br>
		   				<input type="text" name="first_name" id="first_name" maxlength="60"size="40" value=<?php echo $first_name;?> >
		   				<span class="error"><?php echo " ".$first_nameErr; ?></span>
		   				<br><br>

		   				<label for="last_name">Last Name<span class="required">*</span>:</label><br>
		   				<input type="text" name="last_name" id="last_name" maxlength="60" size="40" value=<?php echo $last_name;?> >
		   				<span class="error"><?php echo " ".$last_nameErr; ?></span>	
		   				<br><br>

		   				<label for="address">Address<span>(Optional)</span>:</label><br>
		   				<textarea name="address" id="address"><?php echo $address;?></textarea>
		   				<br><br>

		   				<label for="phone">Phone Number<span>(Optional)</span>:</label><br>
		   				<input type="text" name="phone" id="phone" maxlength="10" size="40" value="<?php echo $phone;?>">
		   				<br><br>

		   				<label for="email">Email<span class="required">*</span>:</label><br>
		   				<input type="text" name="email" id="email" maxlength="60" size="40" value=<?php echo $email;?> >
		   				<span class="error"><?php echo " ".$emailErr; ?></span>
		   				<br><br>

		   				<!-- Commenting event selection from assignment3. Modified it below to restore the previous event value after page refresh. -->
		   				
		   				<!-- <label for="event">Event Name<span class="required">*</span>:</label><br>
		   				<select name="event" id="event" ><span class="error"><?php echo $eventErr; ?></span>
		   						<option value="Museum">Museum</option>
								<option value="space">Space</option>
								<option value="library">Library</option>
		   				</select>
		   				<br><br>-->
				
		   				<label for="event">Event Name<span class="required">*</span>:</label><br>
		   				<select name="event" id="event">
		   						<option value="none"  <?php echo (isset($_POST['event']) && $_POST['event'] == 'none') ? 'selected="selected"' : ''; ?>>Please select an event</option>
		   						<option value="Museum" <?php echo (isset($_POST['event']) && $_POST['event'] == 'Museum') ? 'selected="selected"' : ''; ?>>Museum</option>
								<option value="space" <?php echo (isset($_POST['event']) && $_POST['event'] == 'space') ? 'selected="selected"' : ''; ?>>Space</option>
								<option value="library" <?php echo (isset($_POST['event']) && $_POST['event'] == 'library') ? 'selected="selected"' : ''; ?>>Library</option>
		   				</select>
		   				<span class = "error"><?php echo " ".$eventErr;?></span>
		   				<br><br>

		   				<label for="less5">Number of attendees under 5 years old<span class="required">*</span>:</label>
		   				<input type="text" name="less5" id="less5" size="20" maxlength="60" onchange="getTotal()" value = <?php echo $less5; ?>>
							   <span class="error"><?php echo " ".$less5Err; ?></span>
		   				<br><br>

		   				<label for="bt5to12">Number of attendees between 5 and 12 years old<span class="required">*</span>:</label>
		   				<input type="text" name="bt5to12" id="bt5to12" size="20" maxlength="60"  onchange = "getTotal();" value=<?php echo $bt5to12; ?>>
							   <span class="error"><?php echo " ".$bt5to12Err; ?></span>
		   				<br><br>

		   				<label for="bt13to17">Number of attendees between 13 and 17 years old<span class="required">*</span>:</label>
		   				<input type="text" name="bt13to17" id="bt13to17" size="20" maxlength="60" onchange = "getTotal();" value=<?php echo $bt13to17; ?>>
							   <span class="error"><?php echo " ".$bt13to17Err; ?></span>
		   				<br><br>

		   				<label for="older18">Number of attendees older than 18 years old<span class="required">*</span>:</label>
		   				<input type="text" name="older18" id="older18" size="20" maxlength="60" onchange = "getTotal();" value=<?php echo $older18; ?>>
							   <span class="error"><?php echo " ".$older18Err; ?></span>
		   				<br><br>

		   				<label for="total">Total Attendees</label>
		   				<input type="text" name="total" id="total" size="20" maxlength="60" value="<?php echo $total; ?>"  readonly>
		   				<span class="error"><?php echo " ".$totalErr; ?></span>
		   				<br><br>

		   				<label for="Other">Other events that you would like to be offered: </label><br/>
		   				<textarea name="otherevents" id="otherevents" value="<?php echo $otherevents;?>"></textarea>
		   				<br><br>
		   				<input type="checkbox" name="signup" id="signup" value="signup" checked value="<?php echo $signup; ?>"> <label for="signup">Signup for the Newsletter</label><br><br>
		   		</fieldset>
  			<input type="submit" value="Submit">
  			<input type="reset"><br><br>


		   </form>
		</div>

			
		<div class="column_2">
			<h2>SDSU NHM</h2>
			<h3>Address</h3>
			<address>
				San Diego State University<br>
				Natural History Museum<br>
				San Diego, CA 92182-0000<br>
				(619) 594-5200<br>
				<a href="mailto:nhmuseum@sdsu.edu">nhmuseum@sdsu.edu</a>
			</address>

			<h3>Our Mission</h3>
			<ul>
			<li>Interpret the natural world through research, education and exhibits</li>
			<li>Promote understanding of the evolution and diversity of southern California and the peninsula of Baja California</li>
			<li>Train and grow our future leaders in research and conservation</li>
			<li>Inspire in all a respect for nature and the environment</li>
			</ul>

		</div>
		
	</section>


	<footer>
		<div class="fcolumn1">
			<address>
			San Diego State University<br />
			Natural History Museum<br />
			San Diego, CA 92182-0000<br />
			(619) 594-5200<br />
			<a href="mailto:nhmuseum@sdsu.edu">nhmuseum@sdsu.edu</a>
			</address>
		</div>
		<div class="fcolumn2">
			<p>Museum Hours<br />
			Daily 10:00am to 5:00pm<br />
			Closed when the campus is closed<br />
			Hours subject to change<br />
			</p>
		</div>
		<div class="fcolumn3">
			<ul class="footerbuttons">
				<li><a href="involve.html">Join</a></li>
				<li><a href="involve.html">Donate</a></li>
				<li><a href="involve.html">Volunteer</a></li>
			</ul>
		</div>
		<div class="fcolumn4">
			Last Modified On <span id="lastmodified">&nbsp;</span>
		</div>
	</footer>