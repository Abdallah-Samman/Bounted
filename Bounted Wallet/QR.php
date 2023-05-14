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
            <!-- MAIN MENU-->
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
    <div class="home_content QRbackground">
        <!--QR pic-->
        <div class="text QRbackground">
            <div class="card QRcard">
                <img class="QRlogo" src="Assets/img/favicon-light.png" style="height:30px; width:30px; " />
                <div class="QRcard-img">
                    <img src="Assets/img/QR.png" alt="profile">
                    <p class="QRp">Scan QR and enjoy seamless cash transfer</p>
                </div>
                <!--QR paragraph-->
                <div class="vl"></div>
                <div class="service">
                    <h5>Bounted Personal QR</h5>
                    <p>Enjoy seamless cash transfers with Bounted.</p>
                    <p>1)Scan QR.</p>
                    <p>2)Enter the amount In EGP.</p>
                    <p>3)Enjoy faster transactions.</p>
                </div>
            </div>

        </div>
    </div>
</body>

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