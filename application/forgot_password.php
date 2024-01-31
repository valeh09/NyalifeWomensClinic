<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-image: url('dist/img/forgot.jpg'); /* Adjust the path to your background photo */
            background-size: cover;
            background-position: center;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .container {
            max-width: 400px;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        img.logo {
            width: 200px;
            height: 100px;
            margin-bottom: 20px;
        }

        h2 {
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input {
            padding: 10px;
            margin-bottom: 15px;
            box-sizing: border-box;
            width: 100%;
        }

        button {
            background-color: #007BFF;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            font-weight: bold;
        }

        a {
            color: #333;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="container">
    <img class="logo" src="dist/img/logo.png" alt="Logo"> <!-- Adjust the path to your logo -->
    <h2>Forgot Password</h2>

    <form action="process_forgot_password.php" method="post">
        <input type="email" name="email" placeholder="Enter your email" required>

        <button type="submit">Reset Password</button>
    </form>

    <p><a href="../index.php">Back to Login</a></p>
</div>

</body>
</html>
