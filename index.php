<?php     

    ob_start();
    if(!isset($_SESSION)) {
        session_start();
    }
// if (! isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] == 'off' ) {
//     $redirect_url = "https://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//     header("Location: $redirect_url");
//     exit();
// }
?>


<?php

    if(isset($_SESSION['username']) && isset($_SESSION['password'])) {

        header("Location: dashboard.php");
    }

 ?>


<!DOCTYPE html>
<html>
<head>
    <title>Login to SmallAcademy</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
</head>
<body>

<main class="login-form container">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header center" id="msg">Welcome Back !</div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">Email</label>
                                <div class="col-md-6">
                                    <input type="email" id="email_address" class="form-control" name="email" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>
                            
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</main>
    
</body>
</html>

<?php if(!empty($_POST['email']) && !empty($_POST['password'])){

        $username = $_POST['email'];
        
        require('db.php');


        $sql = "select password,id from users where username='".$username."'";
        $results = $conn->query($sql);

        if($results->num_rows > 0){

            $row = $results->fetch_assoc();

            $hash = $row['password'];
            $password = $_POST['password'];

            if(password_verify($password,$hash)){

                $_SESSION['valid'] = true;
                $_SESSION['username'] = $username;
                $_SESSION['password'] = "success";
                $_SESSION['timeout'] = time();
                $_SESSION['userid'] = $row['id'];

                header('Location: dashboard.php');
            }else {
                echo "<script>document.getElementById('msg').innerHTML = 'Incorect Password';</script>";
            }

           

        }else {
            echo "<script>document.getElementById('msg').innerHTML = 'User Doesnot Exists.';</script>";
        }

   } ?>