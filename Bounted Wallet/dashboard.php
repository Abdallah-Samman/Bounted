<?php
include 'config.php';
include 'Idgeneration.php';
include 'qrgene.php';


session_start();

if (!isset($_SESSION)) {
    header("Location: dashboard.php");
}
$e = $_SESSION['userid1'] . $_SESSION['userid2'] . $_SESSION['userid3'] . $_SESSION['userid4'];
$qr = new QR_BarCode();

// create text QR code 
$qr->text($e);

// display QR code image
$qr->qrCode(350, $e);

$usr = $_SESSION['username'];
(int)$sql10 = "SELECT balance FROM profile WHERE username='$usr'";
$result10 = mysqli_query($conn, $sql10);
$row10 = mysqli_fetch_assoc($result10);
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
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
                <div class="container dashboard">

                    <div class="balance">
                        <div class="sideline">
                        </div>
                        <!--BALANCE PART (php)-->
                        <div class="balance_content">
                            <h6>Bounted Balance</h6>
                            <a href="Deposite.php"> <i class="fas fa-plus"></i></a>
                            <p class="p1"><?php echo  $row10['balance'];
                                            echo " ";
                                            echo "EGP"; ?></p>
                            <p class=p2> Available</p>
                        </div>
                    </div>
                    <!--graph part-->
                    <div class="graph">
                        <div class="sideline"></div>
                        <p class="qr2">Graph</p>
                        <div class="Graph">
                            <div>
                                <canvas id="canvas"></canvas>
                                <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.4.0/chart.min.js"></script>
                                <script src="Assets/Js/graph.js"></script>
                            </div>
                        </div>

                    </div>
                    <!--INFO PART (php)-->
                    <div class="walletinfo">
                        <div class="sideline"></div>
                        <div class="walletcontent">
                            <h6>Information</h6>
                            <a href="editprofile.php"><i class="far fa-edit"></i></a>
                            <p class="inf1"> Username: <?php echo " " ; ?> <?php echo "<a>" . $_SESSION['username'] . "</a>"; ?></p>
                            <div>
                                <p class="inf2">Bounted ID: <?php echo $_SESSION['userid1'];
                                                            echo "-";
                                                            echo $_SESSION['userid2'];
                                                            echo "-";
                                                            echo $_SESSION['userid3'];
                                                            echo "-";
                                                            echo $_SESSION['userid4'];  ?>.</p>
                            </div>
                        </div>
                    </div>
                    <!-- QR Part (php)-->
                    <div class="DashboardQR">
                        <div class="sideline"></div>
                        <p class="qr1">Personal QR</p>
                        <img class="dashboardQR" src="<?php echo $e . ".png"; ?>" />

                    </div>
                    <!--RECENT ACTIVITY (php)-->
                    <div class="transactions">
                        <div class="sideline"></div>
                        <div class="transactioncontent">
                            <h6>Recent Activity</h6>
                            <a href="transfershistory.php"><i class="fas fa-ellipsis-v"></i></a>
                            <table class="table table-striped tabledash">
                                <tr>
                                    <th class="tabledash_head">Username</th>
                                    <th class="tabledash_wallet">Wallet</th>
                                    <th class="tabledash_head">Amount</th>
                                    <th class="tabledash_head">date</th>
                                </tr>
                                <?php
                                $sql5 = "SELECT * FROM history WHERE sender_username='$usr' ORDER BY ID DESC";
                                $result5 = mysqli_query($conn, $sql5);
                                $row1 = mysqli_fetch_assoc($result5);

                                if ($result5->num_rows > 0) {
                                    echo "<tr><td>" . $row1['username'] . "</td><td>" . $row1['email'] . "</td><td>" . $row1['amount'] . "</td><td>" . $row1['date'];
                                }
                                while ($row1 = mysqli_fetch_array($result5, MYSQLI_ASSOC)) {
                                    echo "<tr><td>" . $row1['username'] . "</td><td>" . $row1['email'] . "</td><td>" . $row1['amount'] . "</td><td>" . $row1['date'];
                                }

                                ?>
                            </table>
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

    </section>
</body>

</html>