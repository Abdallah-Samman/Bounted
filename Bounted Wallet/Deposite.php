<?php
include 'config.php';
include 'Idgeneration.php';

session_start();

if (!isset($_SESSION['username'])) {
    header("Location: dashboard.php");
}


if (isset($_POST['submit'])) {

    $amount = $_POST['amount'];
    $username = $_SESSION['username'];


    (int)$sql1 = "SELECT balance FROM profile WHERE username='$username'";
    $result1 = mysqli_query($conn, $sql1);
    $row2 = mysqli_fetch_assoc($result1);


    $balance1 = (int)$row2['balance'] + (int)$amount;

    $sql3 = " UPDATE profile SET balance = $balance1  WHERE username='$username'";
    $result3 = mysqli_query($conn, $sql3);

    echo ("<script>alert(Transaction successful!')</script>");

    $date = date('Y-m-d H:i:s');
    $deposit_id = random_num7(8);


    $sql7 = "INSERT INTO deposit (deposit_id, username, deposit_amount, date)
            VALUES ('$deposit_id', '$username', '$amount', '$date')";
    $result7 = mysqli_query($conn, $sql7);

    //Saved Wallet Table in database


    echo ("<script>alert('Transaction successful!')</script>");
    $secondsWait = 1;
    header("Refresh:$secondsWait");
}

if (isset($_POST['submit2'])) {

    $amount2 = $_POST['amount2'];
    $username = $_SESSION['username'];
    $balance= $_SESSION['balance'];
    
   if ((int)$amount2 > (int)$balance)
   {
    echo ("<script>alert('Not Enough Funds!')</script>");
    $secondsWait = 1;
    header("Refresh:$secondsWait");
   }
   else {

    (int)$sql1 = "SELECT balance FROM profile WHERE username='$username'";
    $result1 = mysqli_query($conn, $sql1);
    $row2 = mysqli_fetch_assoc($result1);


    $balance1 = (int)$row2['balance'] - (int)$amount2;


    $sql3 = " UPDATE profile SET balance = $balance1  WHERE username='$username'";
    $result3 = mysqli_query($conn, $sql3);

    echo ("<script>alert(Transaction successful!')</script>");

    $date = date('Y-m-d H:i:s');
    $withdraw_id = random_num7(8);


    $sql55 = "INSERT INTO withdraw (withdraw_id, username, withdraw_amount, date)
            VALUES ('$withdraw_id', '$username', '$amount2', '$date')";
    $result55 = mysqli_query($conn, $sql55);

    //Saved Wallet Table in database


    echo ("<script>alert('Transaction successful!')</script>");
    $secondsWait = 1;
    header("Refresh:$secondsWait");
   }
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
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
    <div class="section">
        <div class="home_content">
            <!--DEPOSITEPART-->
            <div class="container deposit_container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card deposite_card">
                            <div class="card-header">
                                <div class="row">

                                    <div class="col-md-6 deposite_header"> <span class="header_2">Deposit</span> </div>
                                    <div class="col-md-6 text-right"> <img src="https://img.icons8.com/color/36/000000/visa.png"> <img src="https://img.icons8.com/color/36/000000/mastercard.png"> <img src="https://img.icons8.com/color/36/000000/amex.png"> </div>
                                </div>
                            </div>
                            <div class="card-body" style="height: 350px">
                                <form method="post" action="">
                                    <div class="form-group"> <label for="numeric" class="control-label">AMOUNT</label> <input placeholder="Amount in EGP" type="int" class="input-lg form-control" name="amount"> </div>
                                    <div class="form-group"> <label for="cc-number" class="control-label">CARD NUMBER</label> <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required> </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group"> <label for="cc-exp" class="control-label">CARD EXPIRY</label> <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="•• / ••" required> </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group"> <label for="cc-cvc" class="control-label">CARD CVV</label> <input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="••••" required> </div>
                                        </div>
                                    </div>
                                    <div class="form-group"> <label for="numeric" class="control-label">CARD HOLDER NAME</label> <input type="text" class="input-lg form-control"> </div>
                                    <!------------------------------------------------SUBMIT BTN--------------------------------------------->
                                    <div class="form-group"> <button type="submit" class=" form-control deposite_btn" style="font-size: .8rem; 
                                 font-family: 'Noto Sans', sans-serif; font-weight:600" name="submit">
                                            <span >Deposit</span>
                                            


                                </form>
                               
                            </div>
                        </div>



                    </div>
                </div>
                <!--WITHDRAW PART-->
                <div class="col-md-6">
                    <div class="card deposite_card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6 deposite_header"> <span>Withdraw</span> </div>
                                <div class="col-md-6 text-right"> <img src="https://img.icons8.com/color/36/000000/visa.png"> <img src="https://img.icons8.com/color/36/000000/mastercard.png"> <img src="https://img.icons8.com/color/36/000000/amex.png"> </div>
                            </div>
                        </div>
                        <div class="card-body" style="height: 350px">
                        <form method="post" action="">
                            <div class="form-group"> <label for="numeric" class="control-label">AMOUNT</label> <input placeholder="Amount in EGP" type="int" class="input-lg form-control" name="amount2"> </div>
                            <div class="form-group"> <label for="cc-number" class="control-label">CARD NUMBER</label> <input id="cc-number" type="tel" class="input-lg form-control cc-number" autocomplete="cc-number" placeholder="•••• •••• •••• ••••" required> </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group"> <label for="cc-exp" class="control-label">CARD EXPIRY</label> <input id="cc-exp" type="tel" class="input-lg form-control cc-exp" autocomplete="cc-exp" placeholder="•• / ••" required> </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group"> <label for="cc-cvc" class="control-label">CARD CVV</label> <input id="cc-cvc" type="tel" class="input-lg form-control cc-cvc" autocomplete="off" placeholder="••••" required> </div>
                                </div>
                            </div>
                            <div class="form-group"> <label for="numeric" class="control-label">CARD HOLDER NAME</label> <input type="text" class="input-lg form-control"> </div>
                            <!------------------------------------------------SUBMIT BTN--------------------------------------------->
                            <div class="form-group"> <button type="submit" class=" form-control deposite_btn" style="font-size: .8rem; 
                                 font-family: 'Noto Sans', sans-serif; font-weight:600" name="submit2">
                                            <span >Withdraw</span> </div>
                                 </form>
                        </div>
                    </div>
                </div>

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