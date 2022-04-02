<?php
include 'connect.php';
extract($_POST);
if (isset($_POST["regbt"])) {
    $fname = $_POST["fn"];
    $uname = $_POST["un"];
    $email = $_POST["mail"];
    $phono = $_POST["phn"];
    $psw = md5($_POST["psw"]);



    $sql = "INSERT INTO `registration`(`fname`, `uname`, `email`, `phno`, `pass`) VALUES ('$fname','$uname','$email','$phono','$psw')";
    $res = mysqli_query($con, $sql);
    if ($res > 0) {
        $fetchId = "SELECT * FROM `registration` WHERE `email`='$email'";
        $result = mysqli_query($con, $fetchId);
        $row = mysqli_fetch_assoc($result);
        $uid = $row['uid'];

        mysqli_query($con, "INSERT INTO `tbl_login`(`uid`, `username`, `password`, `user_type`) VALUES('$uid','$uname','$psw','2')");

        header('location:Login.php');
    } else {
        echo "not inserted";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GCTB | REGISTER</title>
    <link rel="stylesheet" href="./css/styleReg.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <script>
        var myInput = document.getElementById('ps1');
        var letter = document.getElementById('letter');
        var capital = document.getElementById('capital');
        var number = document.getElementById('number');
        var length = document.getElementById('length');

        // When the user clicks on the password field, show the message box
        function myfunction() {
            document.getElementById('message').style.display = "block";
        }

        // When the user clicks outside of the password field, hide the message box
        function my2function() {
            document.getElementById('message').style.display = "none";
        }

        // When the user starts to type something inside the password field
        function my33function() {
            // Validate lowercase letters
            var lowerCaseLetters = /[a-z]/g;
            if (myInput.value.match(lowerCaseLetters)) {
                letter.classList.remove("invalid");
                letter.classList.add("valid");
            } else {
                letter.classList.remove("valid");
                letter.classList.add("invalid");
            }

            // Validate capital letters
            var upperCaseLetters = /[A-Z]/g;
            if (myInput.value.match(upperCaseLetters)) {
                capital.classList.remove("invalid");
                capital.classList.add("valid");
            } else {
                capital.classList.remove("valid");
                capital.classList.add("invalid");
            }

            // Validate numbers
            var numbers = /[0-9]/g;
            if (myInput.value.match(numbers)) {
                number.classList.remove("invalid");
                number.classList.add("valid");
            } else {
                number.classList.remove("valid");
                number.classList.add("invalid");
            }

            // Validate length
            if (myInput.value.length >= 8) {
                length.classList.remove("invalid");
                length.classList.add("valid");
            } else {
                length.classList.remove("valid");
                length.classList.add("invalid");
            }
        }







        function validateForm() {
            if (document.getElementById('fnn').value.length == 0 || document.getElementById('unn').value.length == 0 ||
                document.getElementById('em1').value.length == 0 || document.getElementById('ph1').value.length == 0 || document.getElementById('ps1').value.length == 0 || document.getElementById('ps2').value.length == 0) {
                alert("Fill The Form");
                return false;
            } else {
                var ch = /^([a-z A-Z 0-9_\-\.])+\@([a-z A-Z 0-9_\-])+\.([a-z A-Z]{2,4}).$/;
                var num = /^\(?([6-9]{1})\)?[-. ]?([0-9]{5})[-. ]?([0-9]{4})$/;
                if (document.getElementById("em1").value.match(ch)) {} else {
                    alert("Invaild E-Mail ID");
                    document.getElementById("em1").focus();
                    return false;
                }

                if (document.getElementById("ph1").value.match(num)) {} else {
                    alert("Invalid Phone Number");
                    document.getElementById("ph1").focus();
                    return false;
                }
                if (document.getElementById("ps1").value == document.getElementById("ps2").value) {} else {
                    alert("Password Missmatch");
                    document.getElementById("ps1").focus();
                    return false;
                }
            }
        }
    </script>
</head>

<body>
    <div class="main">
        <div class="box">
            <div class="img"></div>
            <div class="content">
                <div class="mainHead">
                    <div class="logo"></div>
                    <h1 class="regmainhead">Galaxy Cinemas</h1>
                </div>
                <br>
                <h2 class="regsubhead">Sign up</h2>

                <form action="#" method="POST">
                    <div class="flexBox">
                        <div class="subField">
                            <div class="txt_field">
                                <label>Full Name</label>
                                <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" name="fn" id="fnn" placeholder="full name" required="">
                                </div>
                            </div>

                            <div class="txt_field">
                                <label>Username</label>
                                <div class="input-container">
                                <i class="fa fa-user icon"></i>
                                <input class="input-field" type="text" name="un" id="unn" placeholder="username" required="">
                                </div>
                            </div>
                        </div>

                        <div class="subField">
                            <div class="txt_field">
                                <label>Email</label>
                                <div class="input-container">
                                <i class="fa fa-envelope icon"></i>
                                <input class="input-field" type="text" name="mail" id="em1" placeholder="email" required="">
                                </div>
                            </div>

                            <div class="txt_field">
                                <label>Phone No</label>
                                <div class="input-container">
                                <i class="fa fa-phone icon"></i>
                                <input class="input-field" type="number" name="phn" id="ph1" placeholder="phone no" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxlength="10" title="Phone Number Must contain 10 digits and first letters should be 6 , 7 , 8 , or 9" required="">
                            </div>
                        </div>
                        </div>

                        <div class="subField">
                            <div class="txt_field">
                                <label>Password</label>
                                <div class="input-container">
                                <i class="fa fa-key icon"></i>
                                <input class="input-field" type="password" name="psw" id="ps1" placeholder="password" onfocus="myfunction()" onblur="my2function()" onkeyup="my33function()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required="">
                                </div>
                            </div>

                            <div class="txt_field">
                                <label>Confirm Password</label>
                                <div class="input-container">
                                <i class="fa fa-key icon"></i>
                                <input class="input-field" type="password" name="cpsw" id="ps2" placeholder="confirm password" required="">
                                </div>
                            </div>
                        </div>

                    </div>

                    <input type="Submit" class="input1" name="regbt" value="Register" onclick="return validateForm()" />

                    <div class="register_link">
                        Already have an account?
                        <a href="Login.php"> Login</a>
                    </div>

                </form>
            </div>

            <div id="message" class="message">
                <img class="close" src="./img/CloseIcon.svg">
                <div id="message" class="msgbox">
                    <h3>Password must contain the following:</h3>
                    <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                    <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                    <p id="number" class="invalid">A <b>number</b></p>
                    <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                </div>
            </div>
        </div>
    </div>



</body>

</html>