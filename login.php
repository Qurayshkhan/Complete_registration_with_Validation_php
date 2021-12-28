<?php
session_start();
?>

<!doctype html>
        <html lang="en">

        <head>
            <!-- Required meta tags -->
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

            <!-- Bootstrap CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

            <title>Hello, world!</title>
        </head>

        <body>
            
    <?php
    include "dbconn.php";
    if (isset($_POST['submit'])) {
        
        $email=$_POST['email'];
        $password=$_POST['password'];

        $email_search="SELECT * FROM reg WHERE email='$email'";
        $query=mysqli_query($conn,$email_search);
        $email_count=mysqli_num_rows($query);

        if ($email_count) {

            $email_pass=mysqli_fetch_assoc($query);
            $dbpass=$email_pass['password'];
            $_SESSION['name']=$email_pass['name'];
            $password_decode=password_verify($password,$dbpass);

    if ($password_decode) {
   ?>

        <script>
            alert("Login succefull");
            location.replace("home.php");
        </script>

   <?php
    }else{
        ?>

        <script>
            alert("Password Did not match");
        </script>

   <?php
    }

        }else{
            ?>

            <script>
                alert("Invalid Email");
            </script>
    
       <?php
        }


    }

    ?>


        <h1 class="text-center my-5"> Login Account</h1>
                        <h4 class="text-center my-1"> Get Started With Your Free Account</h4>

                        <div class="container">

                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                            <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Enter Your email" required>

                                </div>


                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="type password" required>

                                </div>

                                <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Create Account</button>
        <div class="container my-3"><span>Not Have an Account?</span><a href="signup.php">signup Here</a></div>

                        <!-- Optional JavaScript; choose one of the two! -->

                        <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
                        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

                        <!-- Option 2: Separate Popper and Bootstrap JS -->
                        <!--
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
            -->
        </body>

        </html>