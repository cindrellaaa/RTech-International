<?php
include('../../backend/authentication.php');
include('../../backend/DBController.php');

$email = $_SESSION['auth_user'];

$query = "SELECT * FROM user_details WHERE email='{$email['email']}'";
$query_run = mysqli_query($con, $query);

if ($row = mysqli_fetch_array($query_run)) {
    $_SESSION['user_detail'] = [
        'phone' => $row['phone'],
        'dob' => $row['dob'],
        'gender' => $row['gender'],
        'address' => $row['address'],
        'city' => $row['city'],
        'state' => $row['state'],
        'zip' => $row['zip'],
        'passport' => $row['passport']
    ];
} elseif (empty($_SESSION['user_detail']['phone']) || empty($_SESSION['user_detail']['dob']) || empty($_SESSION['user_detail']['gender']) || empty($_SESSION['user_detail']['address']) || empty($_SESSION['user_detail']['city']) || empty($_SESSION['user_detail']['state']) || empty($_SESSION['user_detail']['zip']) || empty($_SESSION['user_detail']['passport']) ){
    $_SESSION['user_detail'] = [
        'phone' => '',
        'dob' => '',
        'gender' => '',
        'address' => '',
        'city' => '',
        'state' => '',
        'zip' => '',
        'passport' => ''
    ];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1" />
    <title>RTech International | Form</title>
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
            <li>
                <a href="project.php">
                    <i class="fa-regular fa-folder-open"></i>
                    <span class="link_names">Projects</span>
                </a>
                <span class="tooltip">Projects</span>
            </li>
            <li class="li-active">
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
    <!-- sidebar end -->
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
    <!-- project form start -->
    <div class="container home_content">
        <form class="row g-4" action="../../backend/submitform.php" method="POST">
            <div class="col-md-4">
                <label for="phone" class="form-label">Contact Number</label>
                <div class="form-text">
                    Enter your contact number, e.g., +12 123-456-7890.
                </div>
                <input id="phone" name="phone" type="text" class="form-control" required
                    value="<?= $_SESSION['user_detail']['phone']; ?>" />
            </div>
            <div class="col-md-4">
                <label for="dob" class="form-label">Date of Birth</label>
                <div class="form-text">
                    Enter your Date of Birth as on your official documents.
                </div>
                <input id="dob" name="dob" type="date" class="form-control" required
                    value="<?= $_SESSION['user_detail']['dob']; ?>" />
            </div>
            <div class="col-md-4">
                <label for="gender" class="form-label">Gender</label>
                <div class="form-text">Select your gender.</div>
                <select id="gender" name="gender" class="form-select">
                    <option value="Male" <?= ($_SESSION['user_detail']['gender'] == 'Male') ? 'selected' : '' ?>>Male
                    </option>
                    <option value="Female" <?= ($_SESSION['user_detail']['gender'] == 'Female') ? 'selected' : '' ?>>
                        Female</option>
                    <option value="Other" <?= ($_SESSION['user_detail']['gender'] == 'Other') ? 'selected' : '' ?>>Other
                    </option>
                </select>
            </div>
            <div class="col-12">
                <label for="address" class="form-label">Address</label>
                <div class="form-text">
                    Enter your address as on your official documents.
                </div>
                <input id="address" name="address" type="text" class="form-control" required
                    value="<?= $_SESSION['user_detail']['address']; ?>" />
            </div>
            <div class="col-md-6">
                <label for="city" class="form-label">City</label>
                <div class="form-text">Enter your city</div>
                <input id="city" name="city" type="text" class="form-control" required
                    value="<?= $_SESSION['user_detail']['city']; ?>" />
            </div>
            <div class="col-md-4">
                <label for="state" class="form-label">State</label>
                <div class="form-text">Enter your state</div>
                <input id="state" name="state" type="text" class="form-control" required
                    value="<?= $_SESSION['user_detail']['state']; ?>" />
            </div>
            <div class="col-md-2">
                <label for="zip" class="form-label">Zip</label>
                <div class="form-text">Enter your zip number</div>
                <input id="zip" name="zip" type="text" class="form-control" required
                    value="<?= $_SESSION['user_detail']['zip']; ?>" />
            </div>
            <div class="col-12">
                <label for="pname" class="form-label">Project Name</label>
                <div class="form-text">
                    Enter the name or title of your project.
                </div>
                <input id="pname" name="pname" type="text" class="form-control" required />
            </div>
            <div class="mb-3">
                <label for="psummary" class="form-label">Project Summary</label>
                <div class="form-text">
                    Please provide a 200-300 word brief summary of your project. This summary will be displayed on our
                    website to attract potential investors.
                </div>
                <textarea class="form-control" rows="8" id="psummary" name="psummary" required></textarea>
            </div>
            <div class="mb-3">
                <label for="puses" class="form-label">Project Uses</label>
                <div class="form-text">
                    Please upload PDF file of how your project is
                    useful in a GCC country. (Not more that 16 MB)
                </div>
                <div class="input-group">
                    <input type="file" class="form-control" id="puses" name="puses" required />
                </div>
            </div>
            <div class="mb-3">
                <label for="pthesis" class="form-label">Project Thesis</label>
                <div class="form-text">
                    Please upload your project thesis or related documentation here.
                </div>
                <div class="input-group">
                    <input type="file" class="form-control" id="pthesis" name="pthesis" required />
                </div>
            </div>
            <div class="mb-3">
                <label for="pimg" class="form-label">Project Image</label>
                <div class="form-text">
                    Please upload the best image of your project, which will be
                    used for display on our website. (Not more that 16 MB)
                </div>
                <div class="input-group">
                    <input type="file" class="form-control" id="pimg" name="pimg" required />
                </div>
            </div>
            <div class="mb-3">
                <label for="pdemo" class="form-label">Project Demo</label>
                <div class="form-text">
                    Please upload a video demonstration of your project.
                </div>
                <div class="input-group">
                    <input type="file" class="form-control" id="pdemo" name="pdemo" required />
                </div>
            </div>
            <div class="mb-3">
                <label for="passport" class="form-label">Passport Copy</label>
                <div class="form-text">
                    Please upload a copy of your passport (front & back), which will be
                    used as address proof. (Not more that 16 MB)
                </div>
                <div class="input-group">
                    <input type="file" class="form-control" id="passport" name="passport" required />
                </div>
                <div id="file-name" class="text-muted">
                    <?php echo $_SESSION['user_detail']['passport']; ?>
                </div>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="ts" required />
                    <label class="form-check-label" for="ts">
                        I accept the <a href="" id="termsLink">terms and conditions.</a>
                    </label>
                </div>
            </div>
            <script>
            document.getElementById('termsLink').addEventListener('click', function(event) {
                event.preventDefault();
                window.open('../assets/RTech Company Profile.pdf', '_blank');
            });
            </script>
            <div class="col-12">
                <button id="confirm_btn" type="button" name="confirm_btn" class="btn btn-primary">Submit Form</button>
            </div>

            <!-- Confirmation Popup -->
            <div id="confirmationPopup">
                <p>Once you click submit, you cannot make any changes. Are you sure?</p>
                <button id="submit_btn" type="submit" name="submit_btn" class="btn btn-primary">Submit</button>
                <button id="cancel_btn" type="button" class="btn btn-secondary">Cancel</button>
            </div>
        </form>
    </div>

    <!-- side bar button js -->
    <script>
    let btn = document.querySelector("#btn");
    let sidebar = document.querySelector(".sidebar");
    btn.onclick = function() {
        sidebar.classList.toggle("active");
    };
    </script>

    <!-- js for adding disabled attribute to input field -->
    <script>
    const inputElements = document.querySelectorAll('.form-control');
    inputElements.forEach((input) => {
        if (input.value.trim() !== '') {
            input.disabled = true;
        }
    });
    inputElements.forEach((input) => {
        input.addEventListener('input', function() {
            if (this.value.trim() === '') {
                this.removeAttribute('disabled');
            }
        });
    });
    </script>

    <!-- js for disabling gender option -->
    <script>
    const selectElement = document.getElementById('gender');
    const genderValueInDatabase = "<?php echo $_SESSION['user_detail']['gender']; ?>";
    if (genderValueInDatabase) {
        selectElement.disabled = true;
    }
    </script>

    <!-- js for disabling passport upload option -->
    <script>
    const fileNameElement = document.getElementById('file-name');
    const passportInput = document.getElementById('passport');
    if (fileNameElement.textContent.trim() !== '') {
        passportInput.disabled = true;
    }
    </script>

    <!-- js for confirmation button -->
    <script>
    function showConfirmationPopup() {
        document.getElementById('confirmationPopup').style.display = 'block';
    }

    function hideConfirmationPopup() {
        document.getElementById('confirmationPopup').style.display = 'none';
    }
    document.getElementById('confirm_btn').addEventListener('click', function() {
        showConfirmationPopup();
    });
    document.getElementById('cancel_btn').addEventListener('click', function() {
        hideConfirmationPopup();
    });
    </script>

    <!-- Bootstrap JS CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>