<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DescompliCars</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Include Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body>
    <?php
    require_once './../Components/Navbar.php';
    ?>

    <div class="container mt-5 d-flex justify-content-center">
        <div class="row">
            <div class="col-12" id="login-section">
                <h2 class="text-center">Login</h2>
                <form action="login_process.php" method="POST">
                    <div class="form-group">
                        <label for="loginEmail">Email</label>
                        <input type="email" class="form-control" id="loginEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="loginPassword">Password</label>
                        <input type="password" class="form-control" id="loginPassword" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                    <button type="button" class="btn btn-link btn-block" id="show-register">Don't have an account? Register</button>
                </form>
            </div>
            <div class="col-12 d-none" id="register-section">
                <h2 class="text-center">Register</h2>
                <form action="register_process.php" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="registerName">Name</label>
                        <input type="text" class="form-control" id="registerName" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="registerEmail">Email</label>
                        <input type="email" class="form-control" id="registerEmail" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="registerPassword">Password</label>
                        <input type="password" class="form-control" id="registerPassword" name="password" required>
                    </div>
                    <div class="form-group">
                        <label for="registerProfileImage">Profile Image</label>
                        <input type="file" accept="image/*" class="form-control-file" id="registerProfileImage" name="profile_image" required>
                    <small class="form-text text-muted">Only image files are allowed.</small>
                    </div>
                    <div class="form-group">
                        <label for="registerBirthDate">Birth Date</label>
                        <input type="date" class="form-control" id="registerBirthDate" name="birth_date" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                    <button type="button" class="btn btn-link btn-block" id="show-login">Already have an account? Login</button>
                </form>
            </div>
        </div>
    </div>

    <style>
        .d-none {
            display: none;
        }

        .btn-primary {
            background-color: #004aad;
            border-color: #004aad;
        }

        .btn-primary:hover {
            background-color: #003a8c;
            border-color: #003a8c;
        }
    </style>

    <script>
        document.getElementById('show-register').addEventListener('click', function() {
            document.getElementById('login-section').classList.add('d-none');
            document.getElementById('register-section').classList.remove('d-none');
        });

        document.getElementById('show-login').addEventListener('click', function() {
            document.getElementById('register-section').classList.add('d-none');
            document.getElementById('login-section').classList.remove('d-none');
        });
    </script>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>