<?php  include "includes/db.php"; ?>
 <?php  include "includes/header.php"; ?>

 <?php 
 
 if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(!empty($username) && !empty($email) && !empty($password)){

    $username = mysqli_real_escape_string($connection, $username);
    $email = mysqli_real_escape_string($connection,$email);
    $password = mysqli_real_escape_string($connection, $password);

    $password = password_hash('$password',PASSWORD_DEFAULT,array('cost'=>12));

    

    // $query = "SELECT randSalt FROM users";
    // $select_rand_salt_query = mysqli_query($connection,$query);


    // if(!$select_rand_salt_query){

    //     die("QUERY FAILED". $connection);
    // }

    //    $row = mysqli_fetch_array($select_rand_salt_query);
    //    $salt = $row['randSalt']; 
    // var_dump($salt);

    //     $hasFormat = "$2y$10$"; // the 10 at the end means, we want to run the encryption 10 times

    //      $salt = "iusesomecrazystrings22";

    //      $hashF_and_salt = $hasFormat . $salt;

    //    $password = crypt($password, $hashF_and_salt);

    $query = "INSERT INTO users (username, user_email, user_password, user_role)";
    $query .= "VALUES ('{$username}','{$email}','{$password}','subscriber')";

    $register_user_query = mysqli_query($connection,$query);
    if(!$register_user_query){
        die("QUWERY FAILED" . mysqli_error($connection));
    }

   $message = "Your Registration is completed";
   ?><h4 class="text-center bg-success"><?php echo $message;?></h4><?php

 }
    else{

    echo  "<script>alert('Please make sure all the fields are filled')</script>";
    }
 
 }
 ?>

    <!-- Navigation -->
    
    <?php  include "includes/navigation.php"; ?>
    
 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                       
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="password" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>



<?php include "includes/footer.php";?>
