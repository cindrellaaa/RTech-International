<?php
include('../../backend/authentication.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1" />
    <title>RTech International | Projects</title>
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
            <li>
                <a href="dashboard.php">
                    <i class="fa-regular fa-user"></i>
                    <span class="link_names">Account</span>
                </a>
                <span class="tooltip">Account</span>
            </li>
            <li class="li-active">
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
        <div class="mb-4">
            <h2 class="">Your Projects</h2>
        </div>
        <table id="mytable" class="table align-middle mb-0 bg-white">
            <thead class="table-dark">
                <tr class="header-row">
                    <th>Date</th>
                    <th>Project Name</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include('../../backend/DBController.php');
                    $user = $_SESSION['auth_user'];
                    $sql = "SELECT p_date, p_name, p_status FROM project_details WHERE email='{$user['email']}'";
                    $res=$con->query($sql);
                    while ($row = $res->fetch_assoc()) {
                    ?>
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            <div>
                                <p class="fw-bold mb-1"><?= $row['p_date']?></p>
                            </div>
                        </div>
                    </td>
                    <td>
                        <p class="fw-bold fw-normal mb-1"><?= $row['p_name']?></p>
                    </td>
                    <td>
                        <?php 
                          if($row['p_status']=="Pending"){
                          echo "<span class='badge bg-warning text-dark rounded-pill d-inline'>Pending</span>";
                          }elseif($row['p_status']=="Approved"){
                          echo "<span class='badge bg-success rounded-pill d-inline'>Approved</span>";
                          }else{
                          echo "<span class='badge bg-danger rounded-pill d-inline'>Rejected</span>";
                          }
                          ?>
                    </td>
                </tr>
                <?php }?>
            </tbody>
        </table>
    </div>

    <!-- sidebar button -->
    <script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");

    btn.onclick = function() {
        sidebar.classList.toggle("active");
    };
    </script>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>