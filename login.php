<?php
        session_start();

        if(isset($_SESSION["name"]))
        {
            header("Location: index.php");
        }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login here</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
    <!-- Section: Design Block -->
<section class="text-center">

   
  <!-- Background image -->
  <div class="p-5 bg-image" style="
        background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
        height: 350px;
        "></div>
  <!-- Background image -->

  <div class="card mx-4 mx-md-5 shadow-5-strong" style="
        margin-top: -100px;
        background: hsla(0, 0%, 100%, 0.8);
        backdrop-filter: blur(30px);
        ">
    <div class="card-body py-5 px-md-5">

      <div class="row d-flex justify-content-center">
        <div class="col-lg-8">
          <h2 class="fw-bold mb-5">Login Now</h2>

          <?php
    
    if(isset($_POST["submit"]))
    {
        $username = $_POST["Username"];
        $password = $_POST["Password"];
        $errors = array();
        if(empty($username) OR empty($password))
        {
            array_push($errors,"All fields are mandatory");
        }
        if(count($errors)>0)
                {
                    foreach ($errors as $error)
                    {
                        echo "<div class='alert alert-danger'>$error</div>";
                    }
                }

        else{
            require_once "database.php";

            $sql = "SELECT * FROM user WHERE username = '$username'";
    
            $res = mysqli_query($link,$sql);
    
            $user = mysqli_fetch_array($res,MYSQLI_ASSOC);
            
    
            if($user)
            {
               if(password_verify($password,$user["password"]))
               {

                session_start();
                $_SESSION["name"]=$username;
                header("Location: index.php");
                die();
               }
               else{
                echo "<div class = 'alert alert-danger'>Credentials does not match</div>";
               }
            }
            else{
                echo "<div class = 'alert alert-danger'>Username does not exists</div>";
            }
        }
       
    }
    
    ?>
          <form action="login.php" method="post">
           

            <!-- username input -->
            <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Username</label>
              <input type="username" name="Username" id="form3Example3" class="form-control" />
              
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
            <label class="form-label" for="form3Example4">Password</label>
              <input type="password" name="Password" id="form3Example4" class="form-control" />
             
            </div>

           

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4" name="submit">
              Sign up
            </button>

            <!-- Register buttons -->
            <div class="text-center">
              <p>Not a user yet ? <a href="register.php">Signup Here</a></p>

             
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Section: Design Block -->
    
</body>
</html>