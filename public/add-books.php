<?php
session_start();
include 'db-connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $rfidUID = isset($_GET['rfid']);
        $abtitle = $_POST['abtitle'];
        $abauthorname = $_POST['abauthorname'];
        $abisbn = $_POST['abisbn'];
        $abphysicaldesc = $_POST['abphysicaldesc'];
        $abshelfloc = $_POST['shelf_loc'];
        $abmaterials = $_POST['abmaterials'];
        $abkeyword = $_POST['abkeyword'];
        $status = $_POST['status'];
        $abpublisher = $_POST['abpublisher'];
        $abpublicationdate = $_POST['abpublicationdate'];
        $abcopyright = $_POST['abcopyright'];
        $ablanguage = $_POST['ablanguage'];
        $abbookdetails = $_POST['abbookdetails'];
    
        $prefix = "PCLIB-";
        $currentYear = date("Y");
    
        $sql = "SELECT Accession_Number FROM book_info WHERE Accession_Number LIKE '$prefix$currentYear-%' ORDER BY Accession_Number DESC LIMIT 1";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $lastId = $row['Accession_Number'];
            $lastNumber = intval(substr($lastId, -3));
            $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT); 
        } else {
            $newNumber = "001";
        }
    
        $abaccession = $prefix . $currentYear . "-" . $newNumber;
    
        if (isset($_FILES['abimage']) && $_FILES['abimage']['error'] === UPLOAD_ERR_OK) {
            $imageData = file_get_contents($_FILES['abimage']['tmp_name']);
            $imgFileType = strtolower(pathinfo($_FILES['abimage']['name'], PATHINFO_EXTENSION));
    
            if ($_FILES['abimage']['size'] > 500000) {
                die("Sorry, your file is too large.");
            }
    
            $allowedTypes = ["jpg", "jpeg", "png", "gif"];
            if (!in_array($imgFileType, $allowedTypes)) {
                die("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");
            }
        } else {
            die("Book image cannot be empty.");
        }
    
        $sql = "INSERT INTO book_info (Book_Image, Accession_Number, Book_Title, Author, ISBN, Physical_Description, Shelf_Location, Material, Genre, Book_Status, Publisher, Publication_Date, Copyright, Book_Language, Book_Details) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("bssssssssssssss", $imageData, $abaccession, $abtitle, $abauthorname, $abisbn, $abphysicaldesc, $abshelfloc, $abmaterials, $abkeyword, $status, $abpublisher, $abpublicationdate, $abcopyright, $ablanguage, $abbookdetails);
    
        // Send binary data for the image
        $stmt->send_long_data(0, $imageData);
    
        if ($stmt->execute()) {
            $sqlRfid = "UPDATE rfid_books SET Accession_Number = ? WHERE UID = ?";
            $stmtRfid = $conn->prepare($sqlRfid);
            $stmtRfid->bind_param("ss", $abaccession, $rfidUID);
            $stmtRfid->execute();

            $sqlAddCopy = "INSERT INTO book_copies (Accession_Number, Book_Condition, Borrowed, Available, Reserved, Total_Copies) VALUES (?, 'Good', '0', '0', '0', '1')";
            $stmtAddCopy = $conn->prepare($sqlAddCopy);
            $stmtAddCopy->bind_param("s", $abaccession);
            $stmtAddCopy->execute();
            header("Location: ManageBooks-AddBook-Success.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    }

?>