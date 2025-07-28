<?php
// Database credentials
$host = 'localhost';
$user = 'root';
$password = 'safar1.c0m';
$dbname = 'safisha_rugs';

// Create connection
$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// Get and sanitize POST data
$name = trim($_POST['name'] ?? '');
$email = trim($_POST['email'] ?? '');
$phone = trim($_POST['phone'] ?? '');
$message = trim($_POST['message'] ?? '');

// Validate required fields
if ($name === '' || $email === '' || $message === '') {
    die('Please fill in all required fields.');
}

// Prepare and bind
$stmt = $conn->prepare('INSERT INTO Inquiries (name, email, phone, message) VALUES (?, ?, ?, ?)');
if (!$stmt) {
    die('Prepare failed: ' . $conn->error);
}
$stmt->bind_param('ssss', $name, $email, $phone, $message);

if ($stmt->execute()) {
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inquiry Sent | Safisha Rugs</title>
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
        <style>
            body {
                margin: 0;
                font-family: 'Montserrat', Arial, sans-serif;
                background: linear-gradient(135deg, #8B6F4E 0%, #bfa074 100%);
                min-height: 100vh;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #fff;
            }
            .success-container {
                text-align: center;
                background: rgba(255, 255, 255, 0.1);
                backdrop-filter: blur(10px);
                border-radius: 20px;
                padding: 40px;
                box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
                border: 1px solid rgba(255, 255, 255, 0.2);
                max-width: 500px;
                margin: 20px;
            }
            .success-icon {
                font-size: 4rem;
                margin-bottom: 20px;
                animation: bounce 0.6s ease-in-out;
            }
            h1 {
                font-size: 2.5rem;
                margin-bottom: 15px;
                font-weight: 700;
            }
            p {
                font-size: 1.2rem;
                margin-bottom: 30px;
                opacity: 0.9;
            }
            .redirect-text {
                font-size: 1rem;
                opacity: 0.8;
                margin-top: 20px;
            }
            @keyframes bounce {
                0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
                40% { transform: translateY(-10px); }
                60% { transform: translateY(-5px); }
            }
        </style>
    </head>
    <body>
        <div class="success-container">
            <div class="success-icon">✅</div>
            <h1>Thank You!</h1>
            <p>Your inquiry has been received successfully. We will get back to you as soon as possible.</p>
            <div class="redirect-text">Redirecting back to contact page...</div>
        </div>
        <script>
            setTimeout(() => {
                window.location.href = 'contact.html';
            }, 3000);
        </script>
    </body>
    </html>
    <?php
} else {
    echo 'Error: ' . $stmt->error;
}

$stmt->close();
$conn->close();
?> 