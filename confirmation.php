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
<!-- Adding javascript function for converting first letter of first and last name to Uppercase, displaying last modified date and time , generating random registration number of each application. -->
<body onload="checkNames( '<?php echo $_SESSION['first_name']; ?>', '<?php echo $_SESSION['last_name']; ?>'); getLastModified(); genRegistrationNumber();">	
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

	<!-- Commenting previous code from Assignment 3 to display all signup Form values . Modified this php page to add new table format to display all values from Signup Form page into this page. -->
<!-- 	<section class="flex_container">
		<div class="column2_1_form">
			<h3 class="form_header">Thank You for subscribing to our events.</h3>
			<?php 
			// $first_name      = $_SESSION['first_name'];
			// $last_name       = $_SESSION['last_name'];
			// $address         = $_SESSION['address'];
			// $phone           = $_SESSION['phone'];
			// $email			 = $_SESSION['email'];
			// $event 			 = $_SESSION['event'];
			// $total           = $_SESSION['total'];
			// $less5			 = $_SESSION['less5'];
			// $bt5to12		 = $_SESSION['bt5to12'];
			// $bt13to17		 = $_SESSION['bt13to17'];
			// $older18		 = $_SESSION['older18'];
			// $otherevents     = $_SESSION['otherevents'];
			?> -->
			 <!-- <?php 
			// echo "Name: " . $first_name . " " . $last_name;

			// echo "<br>";
			// echo "<br>";
			// if ($address != null) {
			// 	echo "Address: " . $address;
			// }
			// echo "<br>";

			// if ($phone != null){
			// 	echo "Phone Number:". $phone;
			// }
			// echo "<br>";
			// echo "Email: " . $email; 
			// echo "<br>";
			// echo "Events: " . $event;
			// echo "<br>";
			// echo "Total Attendees: " . $total . "<br>";
			// echo "Attendees under 5 years: " . $less5 . "<br>"; 
			// echo "Attendees between 5 and 12 years: " . $bt5to12 . "<br>";
			// echo "Attendees between 13 and 17 years: " . $bt13to17 . "<br>";
			// echo "Attendees older than 18 years: " . $older18 . "<br>";
			// echo "<br>";
			// if ($otherevents != null) {
			// 	echo "Additional Interests: " . $otherevents; 
			// }
			?>
		</div>
		<-- <aside>
			<h2>SDSU NHM</h2>
			<h3 class="form_header">Address</h3>
			<address>
				San Diego State University<br>
				Natural History Museum<br>
				San Diego, CA 92182-0000<br>
				(619) 594-5200<br>
				<a href="mailto:nhmuseum@sdsu.edu">nhmuseum@sdsu.edu</a>
			</address>
		</aside>	
	</section> -->


	<section class="flex_container">
		<div class="column1_confirmation">
			<h3 class="form_header">Thank You for subscribing to our events.</h3>
					<table>
					<tr>
						<td class="form_label" for="registration">Registration Number:</td>
						<td><label class="form_label_ans" for="registration" id="registration"></label></td>
					</tr>
					<tr>
						<td class="form_label" for="first_name">First Name:</td>
						<td><label class="form_label_ans" for="firstname" id="firstname"><?php echo $_SESSION['first_name']; ?></label></td>
					</tr>
					<tr>
						<td class="form_label" for="last_name">Last Name:</td>
						<td><label class="form_label_ans" for="lastname" id="lastname"><?php echo $_SESSION['last_name']; ?></label></td>
					</tr>
					<?php if ($_SESSION['address'] != null) { ?>
					<tr>
						<td class="form_label" for="last_name">Address:</td>
						<td><label class="form_label_ans" for="address" id="address"><?php echo $_SESSION['address']; ?></label></td>
					</tr>
					<?php }?>
					<?php if ($_SESSION['phone']!= null) {?>
					<tr>
						<td class="form_label" for="phone">Phone Number:</td>
						<td><label class="form_label_ans" for="phone" id="phone"><?php echo $_SESSION['phone']; ?></label></td>
					</tr>
					<?php }?>
					<tr>
						<td class="form_label" for="email">Email:</td>
						<td><label class="form_label_ans" for="email" id="email"><?php echo $_SESSION['email']; ?></label></td>
					</tr>
					<tr>
						<td class="form_label" for="event">Event:</td>
						<td><label class="form_label_ans" for="event" id="event"><?php echo $_SESSION['event']; ?></label></td>
					</tr>
					<tr>
						<td><label class="form_label" for="total">Number of Attendees:</label></td>
						<td><label class="form_label_ans" for="total"><?php echo $_SESSION['total'];?></label></td>
					</tr>
					<tr>
						<td class="form_label" for="less5">Attendees (under 5 years):</td>
						<td><label class="form_label_ans" for="less5" id="less5"><?php echo $_SESSION['less5']; ?></label></td>
					</tr>
					<tr>
						<td class="form_label" for="bt5to12">Attendees (5 to 12 years):</td>
						<td><label class="form_label_ans" for="bt5to12" id="bt5to12"><?php echo $_SESSION['bt5to12']; ?></label></td>
					</tr>
					<tr>
						<td class="form_label" for="bt13to17">Attendees (13 to 17 years):</td>
						<td><label class="form_label_ans" for="bt13to17" id="bt13to17"><?php echo $_SESSION['bt13to17']; ?></label></td>
					</tr>
					<tr>
						<td class="form_label" for="older18">Attendees (above 18 years):</td>
						<td><label class="form_label_ans" for="older18" id="older18"><?php echo $_SESSION['older18']; ?></label></td>
					</tr>
					<tr>
						<td><label class="form_label" for="signup">Signup for Newsletter:</label></td>
						<td><label class="form_label_ans" for="signup"><?php echo $_SESSION['signup'];?></label></td>
					</tr>

					<?php if ($_SESSION['otherevents'] != null) { ?>
					<tr>
						<td><label class="form_label" for="otherevents">Other events that you would like to be offered:</label></td>
						<td><label class="form_label_ans" for="otherevents"><?php echo $_SESSION['otherevents'];?></label></td>
					</tr>
					<?php } ?>

				</table>
		</div>


		<div class="column_2">
			<h2>SDSU NHM</h2>
			<h3 class="form_header">Address</h3>
			<address>
				San Diego State University<br>
				Natural History Museum<br>
				San Diego, CA 92182-0000<br>
				(619) 594-5200<br>
				<a href="mailto:nhmuseum@sdsu.edu">nhmuseum@sdsu.edu</a>
			</address>
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