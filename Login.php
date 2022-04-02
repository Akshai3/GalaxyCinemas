<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCTB | LOGIN</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    <div class="main">
        <div class="box">
            <div class="content">
                <div class="mainHead">
                    <img class="logo" src="./img/Logo2.png">
                    <h1 class="logmainhead">GALAXY CINEMAS</h1>
                </div>
                <br>
                <h2 class="logsubhead">Log in</h2><br>

                <div class="errmsg" id="errmsg">
                    <span class="errspan">
                        <?php
                        session_start();
                        include 'connect.php';
                        if (isset($_POST['loginbt'])) {
                            $username = $_POST['un'];
                            $password = $_POST['psw'];
                            $query = "SELECT * FROM registration WHERE uname='$username' AND pass=md5('$password') and status='approved'";
                            $result = mysqli_query($con, $query);
                            $total = mysqli_num_rows($result);
                            if ($total == 1) {
                                $row = mysqli_fetch_assoc($result);
                                $_SESSION['loginstat'] = "active";
                                $_SESSION['uname'] = $username;
                                $_SESSION['uid'] = $row['uid'];


                                if ($row['isAdmin'] == 1) {
                                    header('location:admin.php');
                                } else {
                                    header('location:index.php');
                                }
                            } else {
                                echo "
                                <script>document.getElementById('errmsg').style.display='flex'</script>
                                ";
                                echo "Login Failed!!!   &nbsp    invalid username or password";
                            }
                        }
                        ?>
                    </span>
                </div>


                <form action method="POST">

                    <div class="txt_field">
                        <label>Username</label>
                        <div class="input-container">
                        <i class="fa fa-user icon"></i>
                        <input class="input-field" type="text" name="un" placeholder="username" required="">
                        </div>
                    </div>

                    <div class="txt_field">
                        <label>Password</label>
                        <div class="input-container">
                        <i class="fa fa-key icon"></i>
                        <input class="input-field" type="password" name="psw" placeholder="password" required="">
                        </div>
                    </div>

                    <div class="resetpass">
                        <label class="CheckCont">Keep me logged in
                            <input type="checkbox">
                            <span class="mark"></span>
                        </label>


                        <div class="fpass">
                            <a href="forgot.php"> Forgot Password</a>
                        </div>
                    </div>

                    <input type="Submit" class="input1" name="loginbt" value="Login" />

                    <div class="register_link">
                        Don't have an account yet?
                        <a href="Register.php"> Register</a>
                    </div>

                </form>
            </div>
            <div class="img"></div>
        </div>
    </div>

</body>

</html>