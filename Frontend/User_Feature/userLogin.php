<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - StatRics</title>
    <!-- Loaded FontAwesome for the password eye icon vector -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/user.css">
</head>
<body style="display: block; background-color: #0f172a;">

    <div class="auth-container">
        <h2>Login to StatRics</h2>
        <div">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <!-- Password Field with Visibility Toggle -->
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-wrapper" style="position: relative; display: flex; align-items: center;">
                    <input type="password" id="password" name="password" required style="width: 100%; padding-right: 40px;">
                    <i class="fa-solid fa-eye toggle-password-eye" onclick="togglePasswordVisibility('password', this)" style="position: absolute; right: 15px; cursor: pointer; color: #94a3b8; font-size: 14px;"></i>
                </div>
            </div>

            <button type="submit" onclick=" login()" class="auth-btn">Sign In</button>
        </div>
        <div class="auth-switch">
            Don't have an account? <a href="../User_Feature/userRegister.php">Register here</a>
        </div>
    </div>

    <!-- Interface View Controller Scripts -->
    <script>
        function togglePasswordVisibility(fieldId, iconElement) {
            const passwordField = document.getElementById(fieldId);
            if (passwordField.type === "password") {
                passwordField.type = "text";
                iconElement.classList.remove("fa-eye");
                iconElement.classList.add("fa-eye-slash");
                iconElement.style.color = "#3b82f6"; // Dynamic highlight matching your active interface color rules
            } else {
                passwordField.type = "password";
                iconElement.classList.remove("fa-eye-slash");
                iconElement.classList.add("fa-eye");
                iconElement.style.color = "#94a3b8";
            }
        }

        function login() {


            let email = document.getElementById("email").value;
            let password = document.getElementById("password").value;
            console.log(email,password);
            fetch("http://localhost:8080/users/login", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    email: email,
                    password: password
                })
            })
            .then(response => {
                if(!response.ok){
                    throw new Error("Login failed");
                }
                console.log(response);
                return response.json();
            })
            .then(user => {
                if(user != null){
                    console.log(user.userId);
                    // Save user details for next pages
                    localStorage.setItem(
                        "userId",
                        user.userId
                    );
                    localStorage.setItem(
                        "userName",
                        user.name
                    );
                    localStorage.setItem(
                        "userEmail",
                        user.email
                    );
                    alert("Login Successful");
                    // redirect page
                    window.location.href ="http://localhost:3000/User_Feature/home.php?id="+user.userId;
                }
                else{
                    alert("Invalid Email or Password");
                }
            })
            .catch(error => {
                console.log(error);
                alert("Server connection error");
            });
        }
    </script>
</body>
</html>