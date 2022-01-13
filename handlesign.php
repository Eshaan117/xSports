<?php

/* If the server request method happens to be post then we can futher continue checking the 
the credentials and shifting it to the database */

if( $_SERVER['REQUEST_METHOD'] == 'POST' ){

    //Making the connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "catz";
    // Connecting variable
    $connect = mysqli_connect($servername , $username , $password , $database);
   //Other variable
   $user = $_POST['user'];
   $emailer = $_POST['useremail'];
   $passed = $_POST['pass'];
   $confpassed = $_POST['confpass'];
   $gend = $_POST['mygen'];

   // Selecting the information from the database!
   //INSERT INTO `users` (`SrNo`, `Username`, `Email`, `Password`, `Gender`, `Joined`) VALUES ('1', 'Fredric Mactone', 'fredderrgmail.com', '##%#%%&####67676767667676#^^#**#^**@^*#^*#^**&%5575757%&%@&', 'Male', current_timestamp());

   $select = "  SELECT * FROM `users` WHERE `Username` = '$user' ";
   $runmysqli = mysqli_query($connect , $select);
   $totalrows = mysqli_num_rows($runmysqli);
   if($totalrows==1){
       // Then making a variable just like that
       $error = "Username already exists";
       header("location:index.php?signupfail=$error");

   }else{
       if($passed==$confpassed){

           $hashed = password_hash($passed , PASSWORD_DEFAULT);
           $insert = "INSERT INTO `users` ( `Username`, `Email`, `Password`, `Gender`, `Joined`) VALUES ( '$user', '$emailer', '$hashed', '$gend', current_timestamp())";
           $rquery = mysqli_query($connect , $insert);
           //Also Starting  a session as well
           session_start();
           $_SESSION['username'] = $user;
           header("location:index.php?signupsuccess=true");

       }else{

          $e = "Invalid Passwords";
          header("location:index.php?signupfail=$e");

       }

   }
   

}



?>