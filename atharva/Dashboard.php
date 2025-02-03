<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome to Your Dashboard</h2>
    <button onclick="logout()">Logout</button>

    <script>
        function logout() {
            alert("Logged Out!");
            window.location.href = "index.html";
        }
    </script>
</body>
</html>

