/*
Gupta, Ritu
CS545_00
Assignment #4
Fall 2020
Instructor #Cynthia Chie
*/


/* Calculating the sum of all attendees in each category and displaying them in total*/
function getTotal(){
	var attendees5 = (!isNaN(parseInt(document.getElementById("less5").value))) ? parseInt(document.getElementById("less5").value) : 0;
	var attendees5to12 = (!isNaN(parseInt(document.getElementById("bt5to12").value))) ? parseInt(document.getElementById("bt5to12").value) : 0; 
	var attendees13to17 = (!isNaN(parseInt(document.getElementById("bt13to17").value))) ? parseInt(document.getElementById("bt13to17").value) : 0;
	var attendees18 = (!isNaN(parseInt(document.getElementById("older18").value))) ? parseInt(document.getElementById("older18").value) : 0;
	var total = attendees5 + attendees5to12 + attendees13to17 + attendees18;
	document.getElementById('total').value = total;
}


/* Converting the first letter of the names passed in First Name and Last Name fields to Upper case*/
function checkNames(firstname,lastname){
	//splitting first and last names with spaces and hypens
	var first_1 = firstname.toLocaleLowerCase().split(/[ -]+/);
	var second_1 = lastname.toLocaleLowerCase().split(/[ -]+/);
	for (var i = 0; i < first_1.length; i++) {
		first_1[i] = first_1[i].charAt(0).toUpperCase() + first_1[i].slice(1) + ' ';
	}
	for (var i = 0; i < second_1.length; i++) {
		second_1[i] = second_1[i].charAt(0).toUpperCase() + second_1[i].slice(1) + ' ';
	}
	document.getElementById("firstname").innerHTML = first_1.toString().replace(/,/g, '');
	document.getElementById("lastname").innerHTML = second_1.toString().replace(/,/g, '');
}
	

/* Displaying date and time the last time page was modified */
function getLastModified(){
	if (document.lastModified){
		document.getElementById("lastmodified").innerHTML = new Date(document.lastModified).toLocaleString();
	}
}

/* Generating length of 8 random unique registration number constisting of digits and alphabets */
function genRegistrationNumber() {
		var x = (Math.random().toString(36).substring(2,10)).toUpperCase();
		document.getElementById('registration').innerHTML = x;
}




/* Automatic slideshow for Exhibitions on Exhibit page */
var slideIndex = 0;

function showSlides() {
	var i;
	var slides = document.getElementsByClassName("exhibit-Slides");
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	}
	slideIndex++;
	if (slideIndex > slides.length) {
		slideIndex = 1
	}
	slides[slideIndex - 1].style.display = "block";
	setTimeout(showSlides, 3000); // 3 sec wait in transition
}