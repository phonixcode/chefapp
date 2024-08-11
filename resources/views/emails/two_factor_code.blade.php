<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            border: 1px solid #ddd;
        }
        h2 {
            color: #555;
        }
        .code {
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Your Two-Factor Authentication Code</h2>
        <p>Please use the following code to complete your login:</p>
        <div class="code">{{ $code }}</div>
        <p>This code will expire in 10 minutes.</p>
    </div>
</body>
</html>
