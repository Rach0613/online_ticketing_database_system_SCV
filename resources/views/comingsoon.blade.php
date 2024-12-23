<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7));
            color: #fff;
            text-align: center;
        }
        .coming-soon-container {
            max-width: 500px;
            padding: 20px;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        .coming-soon-image {
            width: 100%; 
            max-width: 300px; 
            margin: 20px 0; 
        }
        .content h1 {
            font-size: 3rem;
            margin-bottom: 10px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.3);
            font-weight: bold;
        }
        .content p {
            font-size: 1.2rem;
            margin-bottom: 20px;
            line-height: 1.5;
        }
        button {
            padding: 10px 20px;
            font-size: 1rem;
            color: #4facfe;
            background: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-shadow: 0 3px 5px rgba(0, 0, 0, 0.2);
            transition: background 0.3s, transform 0.3s;
        }
        button:hover {
            background: #f1f1f1;
            transform: translateY(-2px);
        }
        button:active {
            transform: translateY(0);
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="coming-soon-container text-center">
            <div class="content">
                <img src="../images/comingsoon.png" alt="Working on it" class="coming-soon-image">
                <h1>Coming Soon</h1>
                <p>We're working hard to bring you this page.</p>
                <p>Stay tuned!</p>
                <button onclick="goBack()">Go Back</button>
            </div>
        </div>
    </div>

    <script>
        // Go back to the previous page
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
