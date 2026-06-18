<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
		<link rel="stylesheet" type="text/css" href="../public/css/styles.css" /> 
		<title>LibTrack Homepage</title>
	</head>
	<body class='poppins-regular'>
		<div class="no-select container">
            <h1 class="lilita-one-regular">Contact Us</h1>
			<p class="poppins-bold contact-description">
                Have a question about our site or need to report an issue? We're here to help!
			</p>
            <ul class="bullet-container">
                <li class="bullet">Account-Related Inquiries</li>
                <li class="bullet">Assistance for Borrowing and Returning Books</li>
                <li class="bullet">System Errors</li>
                <li class="bullet">Library Policy Questions</li>
                <li class="bullet">Book Reservation Issues</li>
                <li class="bullet">Overdue Fines Inquiries</li>
			</ul>
		</div>
		<div class="librarian">
			<img class="lib-img" src="img/librarian.png" alt="Librarian Head">
			<h2>Ruth Ann V. Fernandez</h2>
			<p>RTU-PASIG Library Head</p>
			<i>rabvelasco@rtu.edu.ph</i>
		</div>
		<div class="librarian">
			<img class="lib-img" src="img/librarian.png" alt="Librarian Head">
			<h2>Arthur L. Notarte</h2>
			<p>RTU-PASIG Library Staff</p>
			<i>alnotarte@rtu.edu.ph</i>
		</div>
		<div class="contact-us">
			<h2>Call Us</h2>
			<p>Tel No. 8534-8234</p>
			<p>Loc. 2408/p>
			<h2>Library Location</h2>
			<p>Room 221 Old Building Rizal Technological University-Pasig Branch</p>
			<h2>Hours of Operation</h2>
			<p>Monday - Sunday</p>
			<p>9:00am - 6:00pm</p>
		</div>
	</body>
	<style>
		body {
            display: flex;
            background-color: #f4f4f4;
            flex-direction: column;
		}
		.no-select {
			-webkit-touch-callout: none; /* iOS Safari */
			-webkit-user-select: none; /* Safari */
			-khtml-user-select: none; /* Konqueror HTML */
			-moz-user-select: none; /* Old versions of Firefox */
			-ms-user-select: none; /* Internet Explorer/Edge */
			user-select: none; /* Non-prefixed version, currently supported by Chrome, Edge, Opera and Firefox */
		}
		h1 {
            font-size: 52px;
            text-indent: 60px;
			margin-top: 2%;
            margin-bottom: 1%;
		}
		.contact-description {
			font-size: 24px;
			text-align: justify;
			width: 90%;
			margin-top: 2%;
            margin-bottom: 2%;
            margin-left: auto;
			margin-right: auto;
		}
		.container {
			display: flex;
			flex-direction: column;
			align-items: start;
            width: 100%;
		}
        .bullet-container {
            display: grid;
            width: 50%;
            margin-left: 50px;
            grid-template-columns: repeat(2, auto);
            gap: 10px;
            text-align: left;
        }
        .bullet {
            list-style-type: disc;
        }
		.librarian {
			margin-left: 20px;
			width: 40%;
		}
		.contact-us {
			margin-left: 60px;
			width: 40%;
		}
		.lib-img {
			float: left;
		}
		::-webkit-scrollbar {
			display: none;
		}
	</style>
	</script>
</html>
