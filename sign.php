<?php
    $user = 0;
    $succes = 0;
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        include 'connect.php';
        $username = $_POST['username'];
        $password = $_POST['password'];
     

        $sql = "Select * from `registration` where username = '$username' ";
        $result = mysqli_query($con,$sql);
        if ($result)
        {
            $num = mysqli_num_rows($result);
            if ($num > 0)
            {
                $user = 1;
            }
            else 
            {
                $sql ="insert into `registration`(username,password) values ('$username', '$password')";
                $result = mysqli_query($con,$sql);
                if ($result)
                {
                    $succes = 1;
                    header('location:login.php');


                }else die(mysqli_error($con));
            }
        }
    }

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fastly.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">

    <title>Signup Page</title>
  </head>
  <body>
    <?php 
        if ($user)
        {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Sorry </strong> User is already exist
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
         if ($succes)
        {
            echo '<div class="alert alert-success  alert-dismissible fade show" role="alert">
            <strong>Good </strong> Sign Up Successfully
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
        }
    ?>
    <h1 class= "text-center">Sign up Page</h1>
    <div class="container mt-5">
    <form action = "sign.php" method = "post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" class="form-control" placeholder = "Enter your username" name = "username" >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder = "Enter your Password" name = "password">
  </div>
 
  <button type="submit" class="btn btn-primary w-100">Sign Up</button>
</form>
    </div>
  </body>
</html>