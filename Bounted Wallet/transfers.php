<?php
include 'config.php';
include 'Idgeneration.php';

session_start();

$fromuser = $_SESSION['email'];

$crr_balance = "SELECT balance FROM profile WHERE email='$fromuser' ";
 $result5 = mysqli_query($conn, $crr_balance);
 $row = mysqli_fetch_assoc($result5);

if (!isset($_SESSION)) {
    header("Location: dashboard.php");

    
}
 if (isset($_POST['submit'])) {

            $sender_username = $_SESSION['username'];
            $fromuser       = $_SESSION['email'];
            $touser         = $_POST['transferto'];
            $amount         = $_POST['amount'];
            
            $sql5 = "SELECT * FROM profile WHERE email='$touser'";
            $result6 = mysqli_query($conn, $sql5);
if ($result6->num_rows > 0) {
    
    if ($touser == $fromuser) {

        echo "<script>alert('Transaction Failed!')</script>";
    }

    else {

    if ($amount < 0){
    echo "<script>alert('Invalid Amount!')</script>";
    
}
else{
            (int)$sql1 = "SELECT balance FROM profile WHERE email='$fromuser'";
            $result1 = mysqli_query($conn, $sql1);
            $row2 = mysqli_fetch_assoc($result1);

            (int)$sql2 = "SELECT balance FROM profile WHERE email='$touser'";
            $result2 = mysqli_query($conn, $sql2);
            $row1 = mysqli_fetch_assoc($result2);

            $sql8 = "SELECT username FROM profile WHERE email='$touser'";
            $result8 = mysqli_query($conn, $sql8);
            $row3 = mysqli_fetch_assoc($result8);


// Code for fetching all the ID
            $sql9 = "SELECT userid1 FROM profile WHERE email='$touser'";
            $result9 = mysqli_query($conn, $sql9);
            $row4 = mysqli_fetch_assoc($result9);

            $sql10 = "SELECT userid2 FROM profile WHERE email='$touser'";
            $result10 = mysqli_query($conn, $sql10);
            $row5 = mysqli_fetch_assoc($result10);

            $sql11 = "SELECT userid3 FROM profile WHERE email='$touser'";
            $result11 = mysqli_query($conn, $sql11);
            $row6 = mysqli_fetch_assoc($result11);

            $sql12 = "SELECT userid4 FROM profile WHERE email='$touser'";
            $result12 = mysqli_query($conn, $sql12);
            $row7 = mysqli_fetch_assoc($result12);
            
    if ($amount > $row2['balance']){
    echo "<script>alert('Transaction failed! Not enough Funds.')</script>";
    
}

else{
        $balance1= (int)$row['balance'] - (int)$amount;
        @$balance2= (int)$row1['balance'] + (int)$amount;

            $sql3 = " UPDATE profile SET balance = $balance1  WHERE email='$fromuser'";
            $result3 = mysqli_query($conn, $sql3);
            
            $sql4 = " UPDATE profile SET balance = $balance2  WHERE email='$touser'";
            $result4 = mysqli_query($conn, $sql4);
            
            echo("<script>alert(Transaction successful!')</script>");

            $date = date('Y-m-d H:i:s');
            $trans_id =random_num7(8);

            $username_receiver = $row3['username'];

            $sql7 = "INSERT INTO history (sender_username, trans_id, username, email, amount, date)
					VALUES ('$sender_username', '$trans_id', '$username_receiver', '$touser', '$amount', '$date')";
            $result7 = mysqli_query($conn, $sql7);

            //Saved Wallet Table in database
            
            $wallet_id = $row4['userid1'] . $row5['userid2'] . $row6['userid3'] . $row7['userid4'];

        $sql20 = "SELECT * FROM saved WHERE wallet_id='$wallet_id' AND sent_by='$sender_username'";
		$result20 = mysqli_query($conn, $sql20);

		if (!$result20->num_rows > 0) {
            $sql13 = "INSERT INTO saved (wallet_id, user_name, sent_by)
					VALUES ('$wallet_id', '$username_receiver', '$sender_username')";
            $result13 = mysqli_query($conn, $sql13);
        }
            echo("<script>alert('Transaction successful!')</script>");
            $secondsWait = 1;
            header("Refresh:$secondsWait");
            
            
            
            
}       


}
}
}
else{
    
    echo "<script>alert('This Email does not exist!')</script>";
    
    
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Assets/Style/Style.css">
</head>

<body id="transfers_page">
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
        <div class="container transfers_container">
            <div class="row">
                <div class="col-md-6 transfers_col">
                    <div class="transfers_heading">
                        <div class="container ">
                            <div class="transfers">
                                <main class="main-container">
                                    <div class="scene">
                                        <!--CARD-->
                                        <div class="cardd">
                                            <!--card front-->
                                            <div class="card_front">
                                                <img class="Bounted_card_img" src="Assets/img/favicon-light.png" />
                                                <div class="card_number number">

                                                    <div class="number-group number-group--0">
                                                    <?php echo $_SESSION['userid1']; ?>
                                                    </div>
                                                    <div class="number-group number-group--1">
                                                    <?php echo $_SESSION['userid2']; ?>
                                                    </div>
                                                    <div class="number-group number-group--2">
                                                    <?php echo $_SESSION['userid3']; ?>
                                                    </div>
                                                    <div class="number-group number-group--3">
                                                    <?php echo $_SESSION['userid4']; ?>
                                                    </div>

                                                </div>
                                                <div class="card_details">
                                                    <div class="card_balance">
                                                        <span class="card_balance_title">Balance</span>
                                                        <span class="card_balance_amount"><?php echo $row['balance']; echo" "; echo "EGP";?></span>
                                                    </div>
                                                    <div class="card_holder">
                                                        <span class="card_holder_title">Card Holder</span>
                                                        <span class="card_holder_name">
                                                        <?php echo $_SESSION['firstname']; echo " "; echo $_SESSION['lastname']; ?>
                                                        </span>
                                                    </div>

                                                </div>
                                            </div>
                                            <!--card back-->
                                            <div class="card_back">
                                                <div class="card_stripe"></div>
                                                <div class="card_signature">
                                                    <span class="card_cvv">CVV</span>
                                                    <span class="card_cvv_number">***</span>
                                                </div>
                                                <p calss="card_info">Using This Card to Purchase goods and services whenever you see the BOUNTED symbol. your use of this card is acceptance to your issuer's arragements including amendments</p>
                                            </div>
                                        </div>
                                    </div>
                                    <script>
                                        const cardd = document.querySelector(".cardd");
                                        cardd.addEventListener("click", () => {
                                            cardd.classList.toggle("is-flipped");
                                        });
                                    </script>
                                </main>
                            </div>
                            <form method="post" id="transaction_form">
                                <h3>Transactions</h3>
                                <div class="row">

                                    <div class="payto">
                                        <lable><span>Transfer to</span></lable>
                                        <input type="text" name="transferto" class="form-control" placeholder="Wallet Email address" value="" required />
                                    </div>
                                    <p id="pay_to_describtion">Please enter destination Email address</p>
                                    <div class="amount">
                                        <lable><span>Amount</span></lable>
                                        <input type="text" name="amount" class="form-control" placeholder="Amount In EGP" value="" required />
                                    </div>
                                    <div class="sendd">
                                        <button class="send_button" type="submit" class="btn-u" name="submit">
                                            <span class="send_span"><i class="far fa-paper-plane"></i>
                                                Transfer

                                            </span>
                                            <svg class="send_svg" xmLns="https://ww.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                <path d="M0 11c2.761.575 6.312 1.688 9 3.438 3.157-4.23 
                                             8.828-8.187 15-11.438-5.861 5.775-10.711
                                             12.328-14 18.917-2.651-3.766-5.547-7.271-10-10.917z"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </div>

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