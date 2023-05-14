<?php

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: dashboard.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bounted</title>
    <link rel="icon" type="img/png" href="Assets/img/favicon-light.png">
    <script src="https://kit.fontawesome.com/099a75ced2.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100&display=swap">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital@1&display=swap" rel="stylesheet">
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Assets/Style/Style.css">
</head>

<body>
    <section class="side-bar">
        <div class="sidebar">
            <div class="logo_content">
                <div class="logo">
                    <img src="Assets/img/favicon-light.png" height="40px">
                    <div class="logo_name"> ounted </div>
                </div>
                <i class="fas fa-bars" id="bttn"></i>
            </div>
            <div class="line1">
                <hr>
            </div>
            <!--MAIN MENU-->
            <ul class="nav_list">
                        <li>
                            <a href="dashboard.php">
                                <i class="fas fa-wallet"></i>
                                <span class="links_name">Wallet</span>
                            </a>
                            <span class="tooltip">Wallet</span>
                        </li>

                        <li>
                            <a href="Deposite.php">
                                <i class="fas fa-coins"></i>
                                <span class="links_name">Deposit-Withdraw</span>
                            </a>
                            <span class="tooltip">Deposit-withdraw</span>

                        </li>
                        <li>
                            <a href="transfers.php">
                                <i class="fas fa-exchange-alt"></i>
                                <span class="links_name">Transfers</span>
                            </a>
                            <span class="tooltip">Transfers</span>

                        </li>
                        <li>
                            <a href="transfershistory.php">
                                <i class="fas fa-chart-line"></i>
                                <span class="links_name">History</span>
                            </a>
                            <span class="tooltip">History</span>

                        </li>
                        <li>
                            <a href="transportation.php">
                            <i class="fas fa-shuttle-van"></i>
                                <span class="links_name">Transportation</span>
                            </a>
                            <span class="tooltip">Wallet</span>
                        </li>
                        <li>
                            <a href="payments.php">
                                <i class="fas fa-credit-card"></i>
                                <span class="links_name">Pay Services</span>
                            </a>
                            <span class="tooltip">Pay Services</span>

                        </li>
                        <li>
                            <a href="phonerecharge.php">
                                <i class="fas fa-mobile-alt"></i>
                                <span class="links_name">Phone Recharge</span>
                            </a>
                            <span class="tooltip">Phone Recharge</span>

                        </li>

                    
                        <li>
                            <a href="profile.php">
                                <i class="fas fa-user"></i>
                                <span class="links_name">Profile</span>
                            </a>
                            <span class="tooltip">Profile</span>

                        </li>
                    </ul>
            <div class="profile_content">
                <div class="line1">
                    <hr>
                </div>
                <div class="profile">
                    <div class="profile_details">
                        <i class="fas fa-user-circle"></i>
                        <div class="name"><?php echo "<a>Welcome " . $_SESSION['username'] . "</a>"; ?></div>
                    </div>
                    <a href="index.html">
                        <i class="fas fa-sign-out-alt" id="log-out"></i> </a>
                </div>
            </div>
        </div>
    </section>
    <div class="home_content">
        <div class="text">
            <div class="col-md-6 phone-recharge-form">
                <div class="card deposite_card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6 deposite_header"> <span>Recharge Phone</span> </div>
                            <div class="col-md-6 text-right recharge_logo">
                                <img src="Assets/img/we.png.png"> <img class="img1" src="Assets/img/Logo-etisalat-vector-download-free-PNG.png"><img src="https://cdn.freelogovectors.net/wp-content/uploads/2011/09/Vodafone_Logo_2017.png"> <img src="https://cdn.freelogovectors.net/wp-content/uploads/2018/08/orange-logo.png">
                            </div>
                        </div>
                    </div>
                    <!--PHONE RECHARGE FORM-->
                    <div class="card-body " style="height: 200px">
                        <form method="post" action="">
                            <div class="form-group"> <label for="cc-number" class="control-label">Phone Number</label> <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="+20 ••• •••••••" required> </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input recharge-radio" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label recharge-radio" for="inlineRadio1">We Egypt</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input recharge-radio" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label recharge-radio" for="inlineRadio1">Vodafone</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input recharge-radio" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label recharge-radio" for="inlineRadio1">Etisalat</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input recharge-radio" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label recharge-radio" for="inlineRadio1">Oragne</label>
                            </div>
                            <select class="form-select form-select-sm amount-menu" aria-label=".form-select-sm example">
                                <option selected>Amount</option>
                                <option value="1">5EGP</option>
                                <option value="2">10EGP</option>
                                <option value="2">20EGP</option>
                                <option value="3">25EGP</option>
                                <option value="1">30EGP</option>
                                <option value="2">100EGP</option>
                                <option value="3">300EGP</option>
                           
                                <!------------------------------------------------SUBMIT BTN--------------------------------------------->
                                <div class="form-group"> <input value="Recharge" type="button" class=" form-control deposite_btn recharge_btn" style="font-size: .8rem; 
                                 font-family: 'Noto Sans', sans-serif; font-weight:600"> </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </div>
    <script>
        let btn = document.querySelector("#bttn");
        let sidebar = document.querySelector(".sidebar");
        let home_content = document.querySelector(".home_content")
        btn.onclick = function() {
            sidebar.classList.toggle("active");
            home_content.classList.toggle("active");
        }
    </script>
</body>

</html>