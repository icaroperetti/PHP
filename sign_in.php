<?php
    session_start();

    if(isset($_SESSION['flash'])){
        $error = $_SESSION['flash']['error'];
        $message = $_SESSION['flash']['message'];
        //Não esquecer desta linha
        unset($_SESSION['flash']);
    }
    

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap-reboot.css" />
    <link rel="stylesheet" href="css/bootstrap-grid.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/login.css" />
</head>
<body>
    <div id="login">
     <?php if($error) : ?>   

        <p class="alert alert-danger"> <?= $error ?> </p>

     <?php endif ?> 

     <?php if($message) : ?>   

        <p class="alert alert-success"> <?= $message ?> </p>

    <?php endif ?> 
     

        <h3 class="text-center text-white pt-5"></h3>
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6 " >
                    <div id="login-box" class="col-md-12 rounded">
                        <form id="login-form" class="form" action="login.php" method="post">
                            <h3 class="text-center text-info"></h3>
                            <div class="form-group">
                                <label for="username" nameclass="text-info">Email:</label><br>
                                <input type="text" name="email" id="username" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="password" class="text-info">Password:</label><br>
                                <input type="password" name="password" id="password" class="form-control">
                            </div>
                            <div class="form-group">
                            <a href="#" class="text-info float-right" >Register here</a>
                                <input type="submit" name="submit" class="btn btn-info btn-md" value="Submit">
                            </div>
        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<!------ Include the above in your HEAD tag ---------->

