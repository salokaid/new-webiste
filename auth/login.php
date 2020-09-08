<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>
    <div class="login-form">    
        <form action="prosesLogin.php" method="post">
            <div class="avatar"><i class="material-icons">&#xE7FF;</i></div>
                <h4 class="modal-title">Login Admin</h4>
                <div class="form-group">
                    <input type="text" name="username" class="form-control" placeholder="Username" required="required">
                </div>
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="required">
                </div>
                <input type="submit" name="login" class="btn btn-primary btn-block btn-lg" value="Login"> 
                <div class="clearfix">
                    <?php
                    if(isset($_GET['r'])){
                        if($_GET['r'] == "err"){
                            echo '<p style= "color:red; font-style:italic"> Login gagal! username dan password salah! </p>';
                        }
                    }
                    ?>

                </div>             
        </form>			
        <div class="text-center small">Don't have an account? <a href="register.php">Sign up</a></div>
    </div>
</body>
</html>