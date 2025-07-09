<!DOCTYPE html>
<html>
<head>
    <title>Login/Register Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }

        .container {
            width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        input[type="text"],
        input[type="password"] {
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        .switch-form {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form id="loginForm">
            <input type="text" id="loginUsername" placeholder="Username" required>
            <input type="password" id="loginPassword" placeholder="Password" required>
            <input type="submit" value="Login">
        </form>
        <div class="switch-form">
            Don't have an account? <a href="#" onclick="switchForm('register')">Register</a>
        </div>

        <h2>Register</h2>
        <form id="registerForm" style="display: none;">
            <input type="text" id="registerUsername" placeholder="Username" required>
            <input type="password" id="registerPassword" placeholder="Password" required>
            <input type="password" id="registerConfirmPassword" placeholder="Confirm Password" required>
            <input type="submit" value="Register">
        </form>
        <div class="switch-form">
            Already have an account? <a href="#" onclick="switchForm('login')">Login</a>
        </div>
    </div>

    <script>
        function switchForm(form) {
            document.getElementById('loginForm').style.display = form === 'login' ? 'flex' : 'none';
            document.getElementById('registerForm').style.display = form === 'register' ? 'flex' : 'none';
        }
    </script>
</body>
</html>