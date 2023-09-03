<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Registration</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </head>
    <body>
       <div class="container col-6">


       <?php
        if(isset($_POST["submit"]))
        {
                $username = $_POST["Username"];
                $email = $_POST["Email"];
                $password = $_POST["Password"];
                $confirm_password = $_POST["ConfirmPassword"];
                $password_hash = password_hash($password,PASSWORD_DEFAULT);
                $errors = array();

                if(empty($username) OR empty($email) OR empty($password) OR empty($confirm_password))
                {
                    array_push($errors,"All firlds are required");
                }
                if(!filter_var($email,FILTER_VALIDATE_EMAIL))
                {
                    array_push($errors,"Email Id is no valid");
                }
                if(strlen($password)<5)
                {
                    array_push($errors,"Passowrd length must be greater than 5");
                }
                if($password!==$confirm_password)
                {
                    array_push($errors,"Password doesnot match");
                }
                require_once "database.php";
                $sql = "SELECT * FROM user WHERE username ='$username'";
                $res = mysqli_query($link,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    array_push($errors,"Username already taken,Try another");
                }
                $sql = "SELECT * FROM user WHERE email ='$email'";
                $res = mysqli_query($link,$sql);
                if(mysqli_num_rows($res)>0)
                {
                    array_push($errors,"Email is already present");
                }
                if(count($errors)>0)
                {
                    foreach ($errors as $error)
                    {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                }
                else{
                    
                    $sql="INSERT INTO user(username,email,password) VALUES(?,?,?)";
                    $stmt=mysqli_stmt_init($link);
                    $preparestmt = mysqli_stmt_prepare($stmt,$sql);
                    if($preparestmt)
                    {
                        mysqli_stmt_bind_param($stmt,"sss",$username,$email,$password_hash);
                        mysqli_stmt_execute($stmt);
                        echo "<div class='alert alert-success'>Successfully registered</div>";

                    }
                    else{
                        die("Something went Wrong");
                    }
                }


        }
       ?>
        <form action="register.php" method="post">
            <h2 class="text-center mt-4">SignUp!</h2>
            <div class="form-group">
            <input type="text" class="form-control" name="Username" placeholder="Enter a username">
            </div>
            <div class="form-group">
            <input type="email" class="form-control" name="Email" placeholder="Enter your email">
            </div>
            <div class="form-group">
            <input type="password" class="form-control" name="Password" placeholder="Enter a Password ">
            </div>
            <div class="form-group">
            <input type="password" class="form-control" name="ConfirmPassword" placeholder="Re-Enter password">
            </div>
            <div class="text-center center">
            <input type="submit" class="btn btn-secondary" name="submit" value="submit">
            </div>
            
            
            <p>Already have an account?<a href="home.php">Login Here</a></p>
        </form>
       </div>
    </body>
</html>