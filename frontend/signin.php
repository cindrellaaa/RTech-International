<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1" />
    <title>RTech International | Register</title>
    <link rel="icon" href="../assets/images/logo1.png" type="icon" />
    <!-- Bootstrap CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
    <!-- Font Awesome ICON -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS file -->
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link rel="stylesheet" href="../assets/css/login.css" />
</head>

<body>
    <!-- hero section start -->
    <div class="container hero">
        <div class="row">
            <div class="col justify-content-start mt-4">
                <img src="../assets/images/logo.png" alt="logo" />
            </div>
            <nav class="navbar navbar-expand-lg bg-light col mt-4">
                <div class="container-fluid">
                    <button class="navbar-toggler mx-auto pt-1" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa-solid fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0 text-center">
                            <li class="nav-item">
                                <a class="nav-link" href="../index.html">Home</a>
                            </li>
                            <li class="nav-item dropdown active">
                                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Services
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li>
                                        <a class="dropdown-item" href="info.html">Information Technology</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="science.html">Science & Technology</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="coming-soon.html">Digital Marketing Training</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="event.html">Event Management</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="technical.html">Technical Services</a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="contact.html">Contact</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="col"></div>
        </div>
    </div>
    <!-- hero section end -->
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
    <!-- login form start -->
    <div class="px-4 py-5 mx-auto login">
        <div class="card card0">
            <div class="d-flex flex-lg-row flex-column-reverse">
                <div class="card card1">
                    <form action="../backend/register.php" method="POST">
                        <div class="row justify-content-center my-auto">
                            <div class="col-md-8 col-10 my-5">
                                <div class="row justify-content-center px-3 mb-3">
                                    <img id="logo" src="../assets/images/logo1.png" />
                                </div>
                                <h3 class="mb-5 text-center heading">RTech International</h3>
                                <h6 class="msg-info">Please register your account</h6>
                                <div class="form-group">
                                    <label class="form-control-label">Full Name</label>
                                    <input type="text" id="name" name="name" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Email</label>
                                    <input type="text" id="email" name="email" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Password</label>
                                    <input type="password" id="psw" name="psw" class="form-control" required />
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
                                <div class="row justify-content-center my-3 px-3">
                                    <button class="btn-block btn-color" name="register_btn" value="Check" id="button"
                                        disabled>Register</button>
                                </div>
                                <div class="row justify-content-center my-2">
                                    <a href="#"><small class="text-muted">Forgot Password?</small></a>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="bottom text-center mb-5">
                        <p href="login.php" class="sm-text">
                            Already have an account?
                            <br />
                            <a href="login.php" class="btn btn-white ml-2">Log In</a>
                        </p>
                    </div>
                </div>
                <div class="card card2">
                    <div class="my-auto mx-md-5 px-md-5 right">
                        <h3 class="text-white">We are more than just a company</h3>
                        <small class="text-white">RTech is a dynamic company specializing in Information
                            Technology, Digital Marketing Training, Event Management, and
                            Technical Services (MEP). With a commitment to excellence, we
                            deliver innovative solutions to meet diverse client
                            needs.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login form end -->

    <!-- footer start -->
    <footer class="footer-section">
        <div class="container">
            <div class="footer-cta pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-map-marker-alt"></i>
                            <div class="cta-text">
                                <h4>Find Us</h4>
                                <span>Al Karama, Dubai, UAE</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="fas fa-phone"></i>
                            <div class="cta-text">
                                <h4>Call Us</h4>
                                <span><a href="tel:+97143987949">+971 4 398 7949</a></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 mb-30">
                        <div class="single-cta">
                            <i class="far fa-envelope-open"></i>
                            <div class="cta-text">
                                <h4>Mail Us</h4>
                                <span><a href="mailto:info@rtechglobal.ae">info@rtechglobal.ae</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-content pt-5 pb-5">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 mb-50">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="../index.html"><img src="../assets/images/logo1.png" class="img-fluid"
                                        alt="logo" /></a>
                            </div>
                            <div class="footer-text">
                                <p>
                                    RTech is a dynamic company specializing in Information
                                    Technology, Digital Marketing Training, Event Management,
                                    and Technical Services (MEP). With a commitment to
                                    excellence, we deliver innovative solutions to meet diverse
                                    client needs.
                                </p>
                            </div>
                            <div class="footer-social-icon">
                                <span>Follow us</span>
                                <a href="https://www.facebook.com/rtechuae" target="_blank"><i
                                        class="fab fa-facebook-f facebook-bg"></i></a>
                                <a href="https://linkedin.com/company/rtech-international-fze" target="_blank"><i
                                        class="fab fa-linkedin-in linkedin-bg"></i></a>
                                <a href="https://www.instagram.com/rtechuae/" target="_blank"><i
                                        class="fab fa-instagram instagram-bg"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-30">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Useful Links</h3>
                            </div>
                            <ul>
                                <li><a href="../index.html">Home</a></li>
                                <li>
                                    <a href="coming-soon.html">Digital Marketing Training</a>
                                </li>
                                <li><a href="../index.html">Our Services</a></li>
                                <li><a href="info.html">Information Technology</a></li>
                                <li><a href="coming-soon.html">Careers</a></li>
                                <li><a href="science.html">Science & Technology</a></li>
                                <li>
                                    <a href="login.php" target="_blank">Login</a>
                                </li>
                                <li><a href="event.html">Event Management</a></li>
                                <li><a href="contact.html">Contact us</a></li>
                                <li><a href="technical.html">Technical Services</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 mb-50">
                        <div class="footer-widget">
                            <div class="footer-widget-heading">
                                <h3>Subscribe</h3>
                            </div>
                            <div class="footer-text mb-25">
                                <p>
                                    Don’t miss to subscribe to our new feeds, kindly fill the
                                    form below.
                                </p>
                            </div>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="text" placeholder="Email Address" />
                                    <button><i class="fab fa-telegram-plane"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-area">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 text-center text-lg-left">
                        <div class="copyright-text">
                            <p>
                                Copyright &copy; 2023, All Right Reserved
                                <a href="#">R-Tech International</a>
                            </p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                        <div class="footer-menu">
                            <ul>
                                <li><a href="../index.html">Home</a></li>
                                <li><a href="coming-soon.html">Terms</a></li>
                                <li><a href="coming-soon.html">Privacy</a></li>
                                <li><a href="coming-soon.html">Policy</a></li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- foorter end -->

    <script>
    const pwShow = document.querySelector(".show"),
        psw = document.querySelector("#psw"),
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
    <!-- custom js file -->
    <script src="../assets/index.js"></script>
</body>

</html>