<?php
    require_once './php/session.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Form</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./assets/css/form.css" />
</head>

<body>
    <?php

    include "./php/database.php";

         if (isset($_POST['submit'])){
            $username = mysqli_real_escape_string($con,$_POST['username']);
            $email = mysqli_real_escape_string($con,$_POST['email']);
            // $password = mysqli_real_escape_string($con,$_POST['password']);
            $password = md5(mysqli_real_escape_string($con,$_POST['password']));

            //pass = password_hash($password, PASSWORD_BCRYPT);


            $emailquery = " SELECT * FROM purnadrive_data WHERE email='$email' ";
            $query = mysqli_query($con,$emailquery);

            $emailcount = mysqli_num_rows($query);

            if($emailcount>0){
    ?>
    <script>
    alert("Email already exists!!!!");
    </script>
    <?php
    }else{
        $insertquery = " INSERT INTO purnadrive_data(username,email,password) VALUES('$username','$email','$password') ";
        // $insertquery = " INSERT INTO purnadrive_data(username,email,password) VALUES('$username','$email','$pass') ";
        $iquery = mysqli_query($con,$insertquery);

    if($iquery){
    ?>
    <script>
    alert("Inserted Successful");
    </script>
    <?php
        }else{
    ?>
    <script>
    alert("Not inserted");
    </script>
    <?php
    }
    }
}
    ?>
    <div class="box">
        <div class="inner">
            <div class="island_popup">
                <div class="content">
                    <div class="details">
                        <div class="imgBx">
                            <img
                                src="https://scontent.fktm10-1.fna.fbcdn.net/v/t1.6435-9/151131837_1180343149061811_3483781015844367494_n.jpg?_nc_cat=102&ccb=1-7&_nc_sid=174925&_nc_ohc=Zww2hP-j1BIAX_t5AW9&_nc_ht=scontent.fktm10-1.fna&oh=00_AfBpa28sHXOchiI_aRtXdoDdqZmi_mhJR_polCdLdbNbIg&oe=63CFA8BC" />
                        </div>
                        <p>Purna Drive<i class="fa-solid fa-lock"></i></p>
                    </div>
                    <div class="action">
                        <i class="fa-solid fa-lock-open"></i>
                    </div>
                </div>
            </div>
            <div class="main">
                <input type="checkbox" id="check" aria-hidden="true" />

                <div class="signup">
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);?>" method="POST">
                        <label class="label-title" for="check" aria-hidden="true">Sign up</label>

                        <div class="inputBox">
                            <input type="text" name="username" required="" id="username" />
                            <!-- <i class="bi bi-person-fill-check"></i> -->
                            <span>Username</span>
                        </div>
                        <div class="inputBox">
                            <input type="email" name="email" required="" id="email" />
                            <!-- <i class="bi bi-envelope-at-fill"></i> -->
                            <span>Email</span>
                        </div>
                        <div class="inputBox">
                            <input type="password" name="password" required="" id="password" />
                            <!-- <i class="bi bi-lock-fill"></i> -->
                            <span>Password</span>
                        </div>

                        <input type="submit" name="submit" class="signup-btn" value="Sign up" />
                    </form>
                </div>

                <div class="login">
                    <form action="./php/process.php" method="POST">
                        <label class="label-title" for="check" aria-hidden="true">Login</label>
                        <div class="inputBox">
                            <input type="text" name="username" required="" />
                            <!-- <i class="bi bi-person-fill-check"></i> -->
                            <span>Username</span>
                        </div>
                        <div class="inputBox">
                            <input type="password" name="password" required="" />
                            <!-- <i class="bi bi-lock-fill"></i> -->
                            <span>Password</span>
                        </div>
                        <div class="checkBox">
                            <input class="checkbox-btn" type="checkbox" name="" />
                            <span>remember me</span>
                            </br>
                            <a href="./php/logout.php">logout</a>
                        </div>
                        <input type="submit" name="submit" class="login-btn" value="log in" />
                    </form>
                </div>
            </div>
        </div>
        <i class="btn btn1"></i>
        <i class="btn btn2"></i>
        <i class="btn btn3"></i>
        <i class="rightSideBtn"></i>
    </div>
    <script>
    let popup = document.querySelector(".island_popup");
    popup.onclick = function() {
        popup.classList.toggle("active");
    };
    </script>
</body>

</html>