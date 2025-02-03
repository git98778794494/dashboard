<php> </php>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saral Infosoft | Login & Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <style>
        /* General Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #f8f9fa;
        }

        .container {
            display: flex;
            width: 900px;
            height: 550px;
            background: white;
            border-radius: 10px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        /* Left Side (Login/Register Form) */
        .form-section {
            width: 50%;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .form-section h2 {
            font-size: 24px;
            color: #333;
            margin-bottom: 15px;
        }

        .form-section input {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .form-section button {
            width: 100%;
            background: linear-gradient(45deg, #0052D4, #4364F7, #6FB1FC);
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            transition: 0.3s;
            margin-top: 10px;
        }

        .form-section button:hover {
            opacity: 0.9;
        }

        .switch-form {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .switch-form a {
            color: #007bff;
            cursor: pointer;
            text-decoration: none;
        }

        .switch-form a:hover {
            text-decoration: underline;
        }

        .g-recaptcha {
            margin-top: 10px;
        }

        /* Right Side (Welcome + Logo) */
        .welcome-section {
            width: 50%;
            background: linear-gradient(0deg, #FFDEE9 0%, #B5FFFC 100%);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: black;
        }

        .welcome-section img {
            width: 240px;
            margin-bottom: 20px;
        }

        .welcome-section h2 {
            font-size: 26px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                height: auto;
            }

            .form-section,
            .welcome-section {
                width: 100%;
                padding: 30px;
            }
        }

        /* Hide Register Form Initially */
        #register-form {
            display: none;
        }
    </style>
</head>

<body>

    <div class="container">
        <!-- Left Side (Login/Register Form) -->
        <div class="form-section">
            <!-- Login Form -->
            <div id="login-form">
                <h2>Sign In</h2>
                <input type="text" id="login-userid" placeholder="User ID" required>
                <input type="password" id="login-password" placeholder="Password" required>
                <div class="g-recaptcha" data-sitekey="6Lc4nMcqAAAAADVx6ubnzHSc_4xnUqIBJhfCbw-3"></div>
                <button onclick="login()">Sign In</button>
                <p class="switch-form">Don't have an account? <a onclick="showRegister()">Register Here</a></p>
            </div>

            <!-- Register Form -->
            <div id="register-form">
                <h2>Register</h2>
                <input type="text" id="reg-name" placeholder="Full Name" required>
                <input type="text" id="reg-business" placeholder="Business Name" required>
                <input type="tel" id="reg-contact" placeholder="Contact Number" required>
                <input type="url" id="reg-location" placeholder="Google Location Link" required>
                <input type="password" id="reg-password" placeholder="Password" required>
                <button onclick="register()">Register</button>
                <p class="switch-form">Already have an account? <a onclick="showLogin()">Sign In</a></p>
            </div>
        </div>

        <!-- Right Side (Welcome + Logo) -->
        <div class="welcome-section">
            <h2>Welcome To</h2>
            <img src="C:\Users\Admin\MAGICQR.html\logo-esy-saral-1 (3).webp" alt="Saral Infosoft Logo">
        </div>
    </div>

    <script>
        function showRegister() {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'block';
        }

        function showLogin() {
            document.getElementById('login-form').style.display = 'block';
            document.getElementById('register-form').style.display = 'none';
        }
        function login() {
            let userid = document.getElementById('login-userid').value;
            let password = document.getElementById('login-password').value;

            let formData = new FormData();
            formData.append('userid', userid);
            formData.append('password', password);

            fetch('login.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    if (data.includes("Login Successful")) {
                        window.location.href = "dashboard.html"; // Redirect to dashboard
                    }
                });
        }


        function register() {
            let fullname = document.getElementById('reg-name').value;
            let business = document.getElementById('reg-business').value;
            let contact = document.getElementById('reg-contact').value;
            let location = document.getElementById('reg-location').value;
            let userid = document.getElementById('reg-contact').value; // Use contact as user ID
            let password = document.getElementById('reg-password').value;

            let formData = new FormData();
            formData.append('fullname', fullname);
            formData.append('business', business);
            formData.append('contact', contact);
            formData.append('location', location);
            formData.append('userid', userid);
            formData.append('password', password);

            fetch('register.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    alert(data);
                    if (data.includes("Registration Successful")) {
                        showLogin();
                    }
                });
        }

    </script>
</body>
</html>
</php>