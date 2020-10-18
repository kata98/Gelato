$(document).ready(function(){
	$('#dugme').click(function(){
		$('#sakriveno').slideToggle('slow', function(){
			$('#dugme').fadeOut();
		});
	});

	$('#dugme1').click(function(){
		$('#sakriveno1').slideToggle('slow', function(){
			$('#dugme1').fadeOut();
		});
	});

	$('#pictures').mouseover(function(){
		$('.aktivna').hide();
		$('.sakrivena').show();
	});

	$('#pictures').mouseout(function(){
		$('.aktivna').show();
		$('.sakrivena').hide();
	});

	$("#register").click(proveriKorisnika);
	$("#insertI").click(proveriProizvod);

});

function proveriKorisnika(){

	var ime = document.getElementsByClassName("ime")[0].value.trim();
	var prezime = document.getElementsByClassName("prezime")[0].value.trim();
	var mejl = document.getElementsByClassName("mejl1")[0].value.trim();
	var lozinka = document.getElementsByClassName("lozinka")[0].value.trim();

	var imeError = document.getElementById("imeError");
	var prezimeError = document.getElementById("prezimeError");
	var mejlError = document.getElementById("mejlError");
	var lozinkaError = document.getElementById("lozinkaError");
// var datumError=document.getElementById("datumError");

	var regIme=/^[A-Z]{1}[a-z]{2,25}$/;
	var regPrezime=/^[A-Z]{1}[a-z]{2,25}$/;
	var regMejl=/^[A-z]+\d*\@(gmail|yahoo|hotmail)\.(com)$/;
	var regLozinka=/^(?=.*\d).{6,}$/;
// var regDatum=/^\d{4}\-(0?[1-9]|1[012])\-(0?[1-9]|[12][0-9]|3[01])$/;

	var greske = [];

	if (ime == "") {
		imeError.textContent = "First name is required";
		greske.push("First name is required");
	} else if (!regIme.test(ime)) {
		imeError.textContent = "First name is not valid";
		greske.push("First name is not valid");
	} else {
		imeError.textContent = "";
	}

	if (prezime == "") {
		prezimeError.textContent = "Last name is required";
		greske.push("Last name is not required");
	} else if (!regPrezime.test(prezime)) {
		prezimeError.textContent = "First name is not valid";
		greske.push("Last name is not valid");
	} else {
		prezimeError.textContent = "";
	}

	if (mejl == "") {
		mejlError.textContent = "Email is required";
		greske.push("Email is required");
	} else if (!regMejl.test(mejl)) {
		mejlError.textContent = "Email is not valid";
		greske.push("Email is not valid");
	} else {
		mejlError.textContent = "";
	}

	if (lozinka == "") {
		lozinkaError.textContent = "Password is required";
		greske.push("Password is required");
	} else if (!regLozinka.test(lozinka)) {
		lozinkaError.textContent = "Password is not valid";
		greske.push("Password is not valid");
	} else {
		lozinkaError.textContent = "";
	}

	if (greske.length == 0) {
		$.ajax({
			url: "index.php?page=register",
			method: "POST",
			data: {
				register: true,
				firstname: ime,
				lastname: prezime,
				email: mejl,
				lozinka: lozinka
			},
			success: function (data) {
				alert("Registration has been succesful");
			},
			error: function (xhr, status, error) {
				var status = xhr.status;
				switch (status) {
					case 422:
						alert('Informations are not good!');
						break;
					case 409:
						alert('Mail already exist.');
						break;
					case 500:
						alert("Error with DataBase.");
						break;
					case 412:
						alert("User already exists.");
						break;
					default:
						alert("Error:" + xhr.status);
				}
			}
		});
	}
};

function proveriProizvod() {

	var naziv = document.getElementsByClassName("nazivI")[0].value.trim();
	var cena = document.getElementsByClassName("cenaI")[0].value.trim();
	var opis = document.getElementsByClassName("opisI")[0].value.trim();

	var regNaziv = /^[A-Z]{1}[a-z]{2,25}$/;
	var regCena = /^(0,9)/;
	var regOpis = /^[a-z]{2,255}$/;

	var greske = [];

	if (naziv == "") {
		greske.push("Product name is required");
	} else if(!regNaziv.test(naziv)) {
		greske.push("Product name is not valid");
	} else {
		// imeError.textContent = "";
	}

	if (cena == "") {
		greske.push("Price is required");
	} else if (!regCena.test(cena)) {
		greske.push("Price is not valid");
	} else {
		// prezimeError.textContent = "";
	}

	if (opis == "") {
		greske.push("Description is required");
	} else if (!regOpis.test(opis)) {
		greske.push("Description is not valid");
	} else {
		// mejlError.textContent = "";
	}

	if (greske.length == 0) {
		$.ajax({
			url: "index.php?page=insertProizvod",
			method: "POST",
			data: {
				insertI: true,
				naziv: naziv,
				cena: cena,
				opis: opis,
			},
			success: function (data) {
				alert("Insert has been succesful");
			},
			error: function (xhr, status, error) {
				var status = xhr.status;
				switch (status) {
					case 422:
						alert('Informations are not good!');
						break;
					case 409:
						alert('Mail already exist.');
						break;
					case 500:
						alert("Error with DataBase.");
						break;
					case 412:
						alert("User already exists.");
						break;
					default:
						alert("Error:" + xhr.status);
				}
			}
		});
	}
};

