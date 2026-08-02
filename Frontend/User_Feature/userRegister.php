<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - StatRics</title>
    <!-- Loaded FontAwesome for the password eye icon vector -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../css/user.css">
</head>
<body style="display: block; background-color: #0f172a;">

    <div class="auth-container">
        <h2>Create StatRics Account</h2>
        <div >
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <!-- Primary Password Field -->
            <div class="form-group">
                <label for="password">Password</label>
                <div class="password-wrapper" style="position: relative; display: flex; align-items: center;">
                    <input type="password" id="password" name="password" required style="width: 100%; padding-right: 40px;">
                    <i class="fa-solid fa-eye toggle-password-eye" onclick="togglePasswordVisibility('password', this)" style="position: absolute; right: 15px; cursor: pointer; color: #94a3b8; font-size: 14px;"></i>
                </div>
            </div>

            <!-- New: Confirm Password Field -->
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <div class="password-wrapper" style="position: relative; display: flex; align-items: center;">
                    <input type="password" id="confirm_password" name="confirm_password" required style="width: 100%; padding-right: 40px;">
                    <i class="fa-solid fa-eye toggle-password-eye" onclick="togglePasswordVisibility('confirm_password', this)" style="position: absolute; right: 15px; cursor: pointer; color: #94a3b8; font-size: 14px;"></i>
                </div>
                <span id="passwordErrorMsg" style="color: #ef4444; font-size: 12px; margin-top: 5px; display: none;">
                    <i class="fa-solid fa-circle-exclamation"></i> Passwords do not match.
                </span>
            </div>

            <button onclick="register()" class="auth-btn">Register</button>
        </div>
        <div class="auth-switch">
            Already have an account? <a href="login.php">Login here</a>
        </div>
    </div>

    <!-- Client-Side Interface Controller Scripts -->
    <script>
        // Toggles input types between password strings and clear text fields
        function togglePasswordVisibility(fieldId, iconElement) {
            const passwordField = document.getElementById(fieldId);
            if (passwordField.type === "password") {
                passwordField.type = "text";
                iconElement.classList.remove("fa-eye");
                iconElement.classList.add("fa-eye-slash");
                iconElement.style.color = "#3b82f6"; // Highlight color when visible
            } else {
                passwordField.type = "password";
                iconElement.classList.remove("fa-eye-slash");
                iconElement.classList.add("fa-eye");
                iconElement.style.color = "#94a3b8";
            }
        }

        // Checks string equivalence before allowing form submission strings to hit processing
        function validatePasswords(event) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            const errorElement = document.getElementById('passwordErrorMsg');

            if (password !== confirmPassword) {
                event.preventDefault(); // Stop processing path execution
                errorElement.style.display = 'block';
                return false;
            }
            errorElement.style.display = 'none';
            return true;
        }

        function register() {

            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            console.log(name,email,password);

            fetch("http://localhost:8080/users", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            name,email,password
        })
    })
        .then(response => response.text())
        .then(data => console.log(data))
        .catch(error => console.error(error));
            
        }
    </script>
</body>
</html>