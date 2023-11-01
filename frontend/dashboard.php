<?php
include('../backend/authentication.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1" />
    <title>RTech International | Dashboard</title>
    <link rel="icon" href="../assets/images/logo1.png" type="icon" />
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- Font Awesome ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="../assets/css/dashboard.css" />
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
        <div class="logo_content">
            <div class="logo">
                <!-- <img id="logo" src="../assets/images/logo1.png" /> -->
            </div>
            <i class="fa-solid fa-bars" id="btn" style="font-size: 25px"></i>
        </div>
        <ul class="nav_list">
            <li>
                <a href="dashboard.php">
                    <i class="fa-solid fa-user"></i>
                    <span class="link_names">Account</span>
                </a>
                <span class="tooltip">Account</span>
            </li>
            <li>
                <a href="#">
                    <i class="fa-regular fa-folder-open"></i>
                    <span class="link_names">Projects</span>
                </a>
                <span class="tooltip">Projects</span>
            </li>
            <li>
                <a href="#">
                    <i class="fa-solid fa-folder-plus"></i>
                    <span class="link_names">Add Project</span>
                </a>
                <span class="tooltip">Add Project</span>
            </li>
        </ul>
        <div class="profile_content">
            <div class="profile">
                <div class="profile_details">
                    <div class="name_job">
                        <div class="name"><?= $_SESSION['auth_user'] ['name']; ?></div>
                    </div>
                </div>
                <a href="../backend/logout.php" style="color: #ffff">
                    <i class="fa-solid fa-right-from-bracket" id="log_out"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="home_content">
        <div class="col-8">
            <form class="row g-3">
                <div class="col-12">
                    <label for="inputEmail4" class="form-label">Name</label>
                    <input type="text" class="form-control" id="inputEmail4">
                </div>
                <div class="col-12">
                    <label for="inputPassword4" class="form-label">Email</label>
                    <input type="email" class="form-control" id="inputPassword4">
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Current Password</label>
                    <input type="text" class="form-control" id="inputAddress">
                </div>
                <div class="col-12">
                    <label for="inputAddress2" class="form-label">New Password</label>
                    <input type="text" class="form-control" id="inputAddress2">
                </div>
                <div class="col-12">
                    <label for="inputCity" class="form-label">Confirm New Password</label>
                    <input type="text" class="form-control" id="inputCity">
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </div>
    </div>

    <script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function() {
        sidebar.classList.toggle("active");
    };
    searchBtn.onclick = function() {
        sidebar.classList.toggle("active");
    };
    </script>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <!-- custom js file -->
    <script src="../assets/index.js"></script>
</body>

</html>