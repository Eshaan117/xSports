<?php

// Writing the php for accessing the login information and testing whether the user is there or not

if( $_SERVER['REQUEST_METHOD']  == 'POST' ){
    // Now if the request method is post then making a connection with  the server as well!
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "catz";

    // Now making a connecting variable as well!
    $connect = mysqli_connect($servername  , $username , $password , $database);

    // Accessing a couple of more variables!

    $usernamez = $_POST['username'];
  
    $passtuff = $_POST['pass'];
    


    // Selecting information from the database from the email and password
    //Running a selecting query!
    $select = " SELECT * FROM `users`  WHERE `Username` = '$usernamez'   ";
    $selectquery = mysqli_query($connect , $select);
    $total = mysqli_num_rows($selectquery);
    if($total==1){
        while($rows = mysqli_fetch_assoc($selectquery)){
            if(   password_verify($passtuff , $rows['Password']) ){
                //Starting the session
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $usernamez;
                $_SESSION['SrNo'] = $rows['SrNo'];

                header("location:index.php?loginsuccess=true");
            }else{
                $error = " because of invalid password";

                header("location:index.php?loginfail=$error");

            }


        }

    }else{
        $err = "becaue of invalid credentials";
        header("location:index.php?loginfail=$err");
    }



    


}




?>