<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../public/css/styles.css" /> 
    <title>Library Portal</title>
    <style>
        :root {
            --primary-color: #2043D5;
            --primary-light: #4a6bff;
            --primary-dark: #10269a;
            --accent-color: #2038AD;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            margin: 0;
            padding: 0;
            background: 
                radial-gradient(circle at 10% 20%, rgba(32, 67, 213, 0.05) 0%, transparent 20%),
                radial-gradient(circle at 90% 80%, rgba(0, 201, 255, 0.05) 0%, transparent 20%),
                linear-gradient(135deg, #f9fafe 0%, #e6ecff 100%);
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .header {
            text-align: center;
            padding: 40px 20px 30px;
            width: 100%;
            max-width: 1200px;
        }

        .header h1 {
            font-size: 2.8rem;
            margin: 0;
            background: linear-gradient(90deg, var(--primary-color) 0%, var(--accent-color) 100%);
            -webkit-background-clip: text;
            background-clip: text;
            position: relative;
            display: inline-block;
        }

        .header h1::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 4px;
            border-radius: 2px;
        }

        .header p {
            font-size: 1.1rem;
            color: #666;
            max-width: 600px;
            margin: 20px auto 0;
            line-height: 1.6;
        }

        .cards-container {
            display: flex;
            justify-content: center;
            gap: 40px;
            flex-wrap: wrap;
            max-width: 1200px;
            padding: 20px;
            margin-bottom: 60px;
            position: relative;
            z-index: 1;
        }

        .card {
            width: 340px;
            height: 260px;
            background: rgba(255, 255, 255, 0.9);
            border: 3px solid #2043D5;
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 
                0 10px 30px rgba(32, 67, 213, 0.1),
                0 0 0 1px rgba(255, 255, 255, 0.8);
            cursor: pointer;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            padding: 30px;
            position: relative;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 
                0 15px 40px rgba(32, 67, 213, 0.2),
                0 0 0 1px rgba(255, 255, 255, 0.9);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 8px;
        }

        .card-icon {
            width: 80px;
            height: 80px;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 25px;
            color: white;
            font-size: 36px;
            position: relative;
            z-index: 1;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .borrow .card-icon {
            background: linear-gradient(135deg, var(--primary-light) 0%, var(--primary-color) 100%);
        }

        .return .card-icon {
            background: linear-gradient(135deg, var(--accent-color) 0%, var(--primary-light) 100%);
        }

        .card h2 {
            margin: 0 0 15px 0;
            color: #333;
            font-weight: 700;
            font-size: 26px;
        }

        .card p {
            color: #666;
            margin: 0;
            line-height: 1.6;
            font-size: 16px;
        }

        .card-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 20px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
            font-size: 15px;
        }

        .borrow .card-footer {
            color: var(--primary-color);
        }

        .return .card-footer {
            color: var(--accent-color);
        }

        .card-footer i {
            transition: transform 0.3s ease;
        }

        .card:hover .card-footer i {
            transform: translateX(5px);
        }

        .floating-shapes {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: -1;
        }

        .shape {
            position: absolute;
            opacity: 0.1;
            border-radius: 50%;
        }

        .shape-1 {
            width: 300px;
            height: 300px;
            background: var(--primary-color);
            top: -100px;
            right: -100px;
        }

        .shape-2 {
            width: 200px;
            height: 200px;
            background: var(--accent-color);
            bottom: -50px;
            left: -50px;
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }
            
            .header p {
                font-size: 1rem;
            }
            
            .card {
                width: 100%;
                max-width: 340px;
            }
        }
    </style>
</head>
<body>
    <div class="floating-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
    </div>

    <div class="header">
        <h1>Library Portal</h1>
        <p>Manage your library transactions with ease. Borrow and return books with just one click.</p>
    </div>

    <div class="cards-container">
        <div class="card borrow" onclick="redirectToPage('BorrowBookPage.php')">
            <div class="card-icon">
                <i class="fas fa-book-open"></i>
            </div>
            <h2>Borrow Books</h2>
            <p>Discover our extensive collection of books. Borrow up to 3 books at a time. Renewals available if not reserved.</p>
            <div class="card-footer">
                <span>Start Borrowing</span>
                <i class="fas fa-arrow-right"></i>
            </div>
        </div>
        
        <div class="card return" onclick="redirectToPage('ReturnBookPage.php')">
            <div class="card-icon">
                <i class="fas fa-exchange-alt"></i>
            </div>
            <h2>Return Books</h2>
            <p>Return your borrowed books easily. Automatic due date reminders. Avoid late fees by returning on time.</p>
            <div class="card-footer">
                <span>Return Items</span>
                <i class="fas fa-arrow-right"></i>
            </div>
        </div>
    </div>

    <script>
        function redirectToPage(url) {
            window.location.href = url;
        }
    </script>
</body>
</html>