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
			<img class="logo-image" src="img/libtrack-logo-3.png" alt="LibTrack Logo">
			<p class="about-description">
				The LibTrack System is a modern library management tool that uses Internet of Things (IoT) technology. 
				It aims to improve library operations and has a simple website interface for tracking and managing resources. 
				Our system uses advanced RFID technology, which allows for real-time management of library items and makes borrowing and returning materials easy.
				With LibTrack, people can easily borrow a book, just pick a book to read and tap it on the RFID card reader then you can finally 
				read a book without going to the librarian to log your details on their log book. Just remember to tap it again when you want to 
				return the book and please drop it in the drop box, stealing and vandalizing a book will reflect on your account.
			</p>
			<p class="about-description"> 
				 This system project created by us, group Archivist where the team consists of 5 members (Angel Alisbo, Josh Michael Bayani, Jenica Dela Cruz,
				 Reginald Flores, and Kian Gregorio). It was designed to modernize library operations by enabling easy resource tracking 
				 and monitoring through a user-friendly website interface.
			</p>
			<div class="developer-image">
				<img class="devimg" src="img/aalisbo.png" alt="Angel Alisbo">
				<img class="devimg" src="img/jmbayani.png" alt="Josh Michael Bayani">
				<img class="devimg" src="img/jdelacruz.png" alt="Jenica Dela Cruz">
				<img class="devimg" src="img/rflores.png" alt="Reginald Flores">
				<img class="devimg" src="img/kgregorio.png" alt="Kian Gregorio">
			</div>
			<h1 class="lilita-one-regular">Key Features</h1>
			<div class="grid-container">
				<div class="image-container">
					<img src="img/rfid-features.png" alt="Feature 1">
					<div class=" overlay">
						<b class="lilita-one-regular">RFID Technology</b>
						<p class="poppins-regular">Real-time management of library items using RFID tags and readers.</p>
					</div>
				</div>
				<div class="image-container">
					<img src="img/security-features.png" alt="Feature 2">
					<div class=" overlay">
						<b class="lilita-one-regular">Enhanced Security</b>
						<p class="poppins-regular">Implementing sensor gates detect and alert staff to unauthorized removal attempts.</p>
					</div>
				</div>
				<div class="image-container">
					<img src="img/automating-features.png" alt="Feature 3">
					<div class=" overlay">
						<b class="lilita-one-regular">Check-In/Check-Out:</b>
						<p class="poppins-regular">Simplified book borrowing and returning by scanning RFID tags.</p>
					</div>
				</div>
				<div class="image-container">
					<img src="img/opac-features.png" alt="Feature 4">
					<div class=" overlay">
						<b class="lilita-one-regular">Online Public Access Catalog (OPAC)</b>
						<p class="poppins-regular">Filtered search for easily locating books and checking their status.</p>
					</div>
				</div>
				<div class="image-container">
					<img src="img/responsive-features.png" alt="Feature 5">
					<div class=" overlay">
						<b class="lilita-one-regular">Mobile App Access</b>
						<p class="poppins-regular">Easily reserve books, search for book availability, and manage accounts on the go.</p>
					</div>
				</div>
				<div class="image-container">
					<img src="img/accountability-features.png" alt="Image 6">
					<div class=" overlay">
						<b class="lilita-one-regular">Accountability</b>
						<p class="poppins-regular">Tracks incidents of theft or vandalism, promoting responsible resource use.</p>
					</div>
				</div>
			</div>
			<h1 class="lilita-one-regular">Mission</h1>
			<p class="mission-description"> 
				Our mission is to provide an accessible and efficient library experience through the use of modern tools that streamline resource tracking and borrowing. 
				We aim to make accessing and enjoying our library resources easy and convenient for Rizal Technological University Students, promoting a passion for reading and learning within the Library.
		   </p>
		   <h1 class="lilita-one-regular">Vision</h1>
		   <p class="vision-description"> 
				Our vision is to modernize and implement the process of using RFID technologies in school services including the library in Rizal Technological University in both Boni and Pasig branches.
		  </p>
		  <h1 class="lilita-one-regular">User Policies</h1>
		  <p class="vision-description"> 
			The LibTrack System is governed by a set of rules and policies to ensure fair and efficient use of library resources. 
			Compliance with these rules, including penalties for late returns, damaged or lost books, and abusive behavior, is essential for maintaining the availability and integrity of the collection. 
			Users are encouraged to handle all materials responsibly and adhere to library regulations.
		 </p>
		</div>
	</body>
	<style>
		body {
            display: flex;
            justify-content: center;
            align-items: center;
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
		.logo-image {
			display: block;
			padding: 40px;
			margin-left: auto;
			margin-right: auto;
			width: 50%;
		}
		h1 {
			margin-top: 5%;
		}
		.developer-image {
			display: flex;
			flex-direction: row;
			justify-content: center;
			margin-left: auto;
			margin-right: auto;
		}
		.devimg {
			display: block;
            align-items: center;
			flex-direction: row;
			margin-left: 1%;
			border-radius: 100px;
		}
		.about-description {
			font-size: 16px;
			text-align: justify;
			width: 90%;
			margin: 2%;
		}
		.mission-description, .vision-description, .user-policy {
			font-size: 16px;
			text-align: center;
			width: 90%;
			margin: 1%;
		}
		.container {
			display: flex;
			flex-direction: column;
			align-items: center;
		}
        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 10px;
        }
        .image-container {
            position: relative;
            width: 100%;
            height: 100%;
            overflow: hidden;
            border-radius: 8px;
        }
        .image-container img {
            width: 100%;
            height: 100%;
            display: block;
            object-fit: cover;
        }
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
			padding: 30px;
            background: rgba(32, 67, 213, 0.8);
			border-radius: 30px;
            color: white;
            display: flex;
			flex-direction: column;
            justify-content: center;
            align-items: center;
            font-size: 32px;
            opacity: 0;
            transition: opacity 0.3s;
        }
        .image-container:hover .overlay {
            opacity: 1;
        }
		::-webkit-scrollbar {
			display: none;
		}
	</style>
	</script>
</html>
