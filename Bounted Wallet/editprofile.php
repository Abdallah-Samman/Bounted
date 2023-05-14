<?php
include 'config.php';

session_start();

if (!isset($_SESSION)) {
    header("Location: dashboard.php");
}
if (isset($_POST['submit'])) {
    $username = $_SESSION['username'];
    $email = $_SESSION['email'];

    $gender = $_POST['flexRadioDefault'];
    $birthdate = $_POST['birthday'];
    $phone = $_POST['phone'];

    $sql5 = "SELECT * FROM personal WHERE email='$email'";
    $result6 = mysqli_query($conn, $sql5);
    if (!$result6->num_rows > 0) {

        $sql7 = "INSERT INTO personal (birth_date, gender, email)
					VALUES ('$birthdate', '$gender', '$email')";
        $result7 = mysqli_query($conn, $sql7);

        echo ("<script>alert(Info Updated Successfully!')</script>");
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

<body id=profile>
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
    <section>
        <div class="home_content">

            <div class="container portfolio">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading">
                            <img src="Assets/img/profile-menu.png" />
                        </div>
                    </div>
                </div>
                <div class="bio-info">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                     <!--PROFILE PIC-->
                                    <div class="bio-image">
                                        <img src="Assets/img/undraw_male_avatar_323b.svg" alt="image" id="user-img" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bio-content">
                                <div class=" col-md-9 col-lg-9 ">
                                    <form action="" method="post">
                                        <!--PROFILE TABLE-->
                                        <table class="table table-user-information">
                                            <tbody>
                                                <tr>
                                                    <td>Username</td>
                                                    <td>
                                                        <div class="name"><?php echo $_SESSION['username'] . "</a>"; ?></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Email</td>
                                                    <td><div class="name"><?php echo $_SESSION['email'] . "</a>"; ?></div></td>
                                                </tr>
                                                <tr>
                                                    <td>Birth Date</td>
                                                    <td><input type="date" id="birthday" name="birthday"></td>
                                                </tr>

                                                <tr>
                                                <tr>
                                                    <td>Address</td>
                                                    <td>
                                                        <input type="tel" id="phone" placeholder="Address" name="phone">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Phone </td>
                                                    <td><input type="tel" id="phone" placeholder="Phone Number" name="phone"></td>
                                                </tr>
                                                <td>Wallet ID</td>
                                                <td><?php echo $_SESSION['userid1'];
                                                    echo "-";
                                                    echo $_SESSION['userid2'];
                                                    echo "-";
                                                    echo $_SESSION['userid3'];
                                                    echo "-";
                                                    echo $_SESSION['userid4'];  ?>
                                                </td>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="edit">
                            <a href="profile.php"><button type="button" name="submit" class="btn btn-primary" style="font-size: .8rem; 
                                 font-family: 'Noto Sans', sans-serif; font-weight:600">Update</button></a>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
    </section>
    <script>
        let btn = document.querySelector("#bttn");
        let sidebar = document.querySelector(".sidebar");
        btn.onclick = function() {
            sidebar.classList.toggle("active");
        }
    </script>
</body>

</html>