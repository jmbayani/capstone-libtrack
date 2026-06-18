<?php
include 'db-connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $scndbookcode = $_POST['scndbookcode'];
    $stmt = $conn->prepare("SELECT UID FROM rfid_books WHERE UID = ? ORDER BY UID DESC LIMIT 1");
    $stmt->bind_param("s", $scndbookcode);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // RFID tag exists, proceed with adding the book
        echo "<script>alert('RFID is valid Proceed to Add Books.');</script>";
        header("Location: ManageBooks-AddBook.php?rfid=$scndbookcode");
    } else {
        // RFID tag does not exist, handle accordingly (e.g., show an error message)
        echo "<script>alert('RFID tag not found. Please try again.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>

    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css" />
    <link href="https://fonts.googleapis.com/css2?family=Lilita One&family=Linden Hill:ital@0;1&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Libre Franklin:ital,wght@0,100..900;1,100..900&family=Lilita One&family=Linden Hill:ital@0;1&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script defer src="https://cdn.jsdelivr.net/npm/@coreui/coreui-pro@5.10.0/dist/js/coreui.bundle.min.js"></script>
    <title>LibTrack - Add Book Scan RFID</title>

</head>

<body>
    <button class="button-back" onclick="history.back()" rel="noopener noreferrer">Back</button>
    <div class="container-signup">
        <h2 class="header-signup">Add Book</h2>
        <div class="container-info">
            <form method="POST">
                <label class="label1">
                    Please scan the RFID tag in a book to add a new book to the library system
                </label>
                <input type="text" id="scndbookcode" name="scndbookcode" placeholder="Scan the book" readonly required><br>
                <button class="scanbtn" type="submit">Scan book</button>
            </form>
        </div>
        <div id="skip-text">If the book doesn't have RFID tag yet, proceed to manually <a href="ManageBooks-AddBook.php">add book</a> page</div>

    </div>

</body>


<style>

    .button-back {
        width: 130px;
        height: 35px;
        position: fixed;
        left: 20px;
        text-align: center;
        display: inline-block;
        font-size: 16px;
        margin: 10px 0px 0px 10px;
        background-color: #EFF5FF;
        border: 3.5px solid #2043D5;
        color: #2043D5;
        border-radius: 15px;
        cursor: pointer;
    }


        .button-back:hover {
            background-color: #5966EC;
            border: 3.5px solid #5966EC;
            color: #ffffff;
        }


    body {
        background-color: #2038AD;
    }


    .container-signup {
        height: 700px;
        width: 650px;
        border-radius: 50px;
        margin: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        background-color: #EFF5FF;
        overflow: auto;
    }


    .container-info {
        padding-left: 40px;
        padding-right: 40px;
    }


    .header-signup {
        font-family: "Lilita One", serif;
        font-weight: 400;
        font-style: normal;
        font-size: 40px;
        text-align: center;
    }


    .header1-signup {
        font-family: "Lilita One", serif;
        font-weight: 400;
        font-style: normal;
        font-size: 25px;
    }


    .label1 {
        font-size: 15px;
        font-family: "Libre Franklin", serif;
        font-weight: 400;
        font-style: normal;
        text-align: center;
        display: block;
        margin-top: 180px;
        margin-bottom: 20px;
    }

    a {
        color: #2043D5;
        text-decoration: none;
        font-weight: 400;
    }

    #skip-text {
        font-size: 15px;
        font-family: "Libre Franklin", serif;
        font-weight: 400;
        font-style: normal;
        text-align: center;
        display: none;
        margin-top: 200px;
        margin-bottom: 200px;
    }


    input[type=password], input[type=text] {
        width: 571px;
        height: 49px;
        border: 3px solid #2043D5;
        border-radius: 30px;
        font-family: poppins;
        font-size: 16px;
        margin-bottom: 10px;
        text-align: center;
    }


    .scanbtn {
        background-color: #ffffff;
        color: #2043D5;
        text-align: center;
        margin: 0;
        position: absolute;
        top: 450px;
        left: 50%;
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        border: 3.5px solid #2043D5;
        border-radius: 15px;
        cursor: pointer;
        width: 150px;
        height: 40px;
        font-size: 16px;
        font-family: "Libre Franklin", serif;
        font-weight: 400;
        font-style: normal;
    }


        .scanbtn:hover {
            background-color: #5966EC;
            border: 3.5px solid #5966EC;
            color: #ffffff;
        }


    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }


    ::-webkit-scrollbar {
        display: none;
    }
</style>
<script>
        function fetchUID() {
            fetch('scan_rfid.php')
                .then(response => response.text())
                .then(uid => {
                    console.log("UID Fetched");
                    const uidField = document.getElementById('scndbookcode');
                    if (uidField) {
                        uidField.value = uid;
                    }
                })
                .catch(error => console.error("Fetch error:", error));
        }

        // Start fetching immediately and every 2 seconds
        window.addEventListener("DOMContentLoaded", () => {
            fetchUID();
            setInterval(fetchUID, 1000);
        });

        window.onload = function() {
        setTimeout(function() {
            document.getElementById("skip-text").style.display = "block";
        }, 3000); // 3000 milliseconds = 3 seconds
        };
</script>
</html>
