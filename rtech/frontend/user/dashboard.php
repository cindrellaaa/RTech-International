<?php
include('../../backend/authentication.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1" />
    <title>RTech International | Dashboard</title>
    <link rel="icon" href="../../assets/images/logo1.png" type="icon" />
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- Font Awesome ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="../../assets/css/dashboard.css" />
</head>

<body>
    <?php
    if (isset($_SESSION['status'])) {
    $status = $_SESSION['status'];
    unset($_SESSION['status']);
    echo '<script>
            window.addEventListener("DOMContentLoaded", function () {
                alert("' . $status . '");
            });
          </script>';
    }
    ?>
    <div class="sidebar active">
        <div class="logo_content mb-5">
            <i class="fa-solid fa-bars" id="btn" style="font-size: 25px"></i>
        </div>
        <ul class="nav_list">
            <li class="li-active">
                <a href="dashboard.php">
                    <i class="fa-regular fa-user"></i>
                    <span class="link_names">Account</span>
                </a>
                <span class="tooltip">Account</span>
            </li>
            <li>
                <a href="project.php">
                    <i class="fa-regular fa-folder-open"></i>
                    <span class="link_names">Projects</span>
                </a>
                <span class="tooltip">Projects</span>
            </li>
            <li>
                <a href="projectform.php">
                    <i class="fa-solid fa-folder-plus"></i>
                    <span class="link_names">Add Project</span>
                </a>
                <span class="tooltip">Add Project</span>
            </li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                    <div class="name"><?= $_SESSION['auth_user'] ['name']; ?></div>
                </div>
                <a href="../../backend/logout.php" style="color: #ffff">
                    <i class="fa-solid fa-right-from-bracket" id="log_out"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="container home_content">
        <div class="col-8">
            <form class="row g-3" action="../../backend/change-password.php" method="POST">
                <div class="col-12">
                    <label class="form-label">Name</label>
                    <input type="text" class="form-control" disabled value="<?= $_SESSION['auth_user']['name']; ?>">
                </div>
                <div class="col-12">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" disabled value="<?= $_SESSION['auth_user']['email']; ?>">
                </div>
                <div class="col-12">
                    <label class="form-label">Current Password</label>
                    <input type="password" name="cur_psw" class="form-control" id="cur_psw" required>
                </div>
                <div class="col-12">
                    <label class="form-label">New Password</label>
                    <input type="password" name="new_psw" class="form-control" id="new_psw" required>
                </div>
                <div class="form-group">
                    <label class="form-control-label">Confirm Password</label>
                    <div class="input-with-icon">
                        <input type="password" id="confirmPsw" class="form-control" required />
                        <i class="fa-solid fa-eye-slash icon show"></i>
                    </div>
                </div>
                <div class="alert">
                    <i class="fas fa-exclamation-circle errorIcon"></i>
                    <span class="text">Enter atleast 8 characters</span>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary" id="button" name="change_password_btn">Change
                        Password</button>
                </div>
            </form>
        </div>
    </div>

    <!-- sidebar button -->
    <script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function() {
        sidebar.classList.toggle("active");
    };
    </script>

    <!-- password validations -->
    <script>
    const pwShow = document.querySelector(".show"),
        psw = document.querySelector("#new_psw"),
        confirmPsw = document.querySelector("#confirmPsw"),
        alertIcon = document.querySelector(".errorIcon"),
        alertText = document.querySelector(".text"),
        submitBtn = document.querySelector("#button");

    // Password hide and unhide
    pwShow.addEventListener("click", () => {
        if (psw.type === "password" && confirmPsw.type === "password") {
            psw.type = "text";
            confirmPsw.type = "text";
            pwShow.classList.replace("fa-eye-slash", "fa-eye");
        } else {
            psw.type = "password";
            confirmPsw.type = "password";
            pwShow.classList.replace("fa-eye", "fa-eye-slash");
        }
    });

    // To check and confirm password input field
    psw.addEventListener("input", () => {
        let inputValue = psw.value.trim();

        if (inputValue.length >= 8 && psw.value === confirmPsw.value) {
            enableSubmitButton();
            alertText.style.color = "#000";
        } else if (inputValue.length >= 8) {
            alertText.innerText = "Password do not match";
            alertText.style.color = "#D93025";
            alertIcon.style.display = "block";
            submitBtn.setAttribute("disabled", true);
            submitBtn.classList.remove("active");
        } else {
            disableSubmitButton("Enter at least 8 characters");
        }
    });

    confirmPsw.addEventListener("input", () => {
        if (psw.value === confirmPsw.value && psw.value.length >= 8) {
            enableSubmitButton();
        } else {
            disableSubmitButton("Enter at least 8 characters");
        }
    });

    function enableSubmitButton() {
        alertText.innerText = "Password match";
        alertText.style.color = "#4070F4";
        alertIcon.style.display = "none";
        submitBtn.removeAttribute("disabled");
        submitBtn.classList.add("active");
    }

    function disableSubmitButton(message) {
        alertText.innerText = message;
        alertText.style.color = "#D93025";
        alertIcon.style.display = "block";
        submitBtn.setAttribute("disabled", true);
        submitBtn.classList.remove("active");
    }
    </script>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>