<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link  rel  = "stylesheet" href = "Comment.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>xSports: See Threads</title>


</head>

<body>

<h2 class = "frt">Selected Discussion</h2>

<!-- First of all writing the php and then making  a comment section like thing -->
<?php
// Making a connection to the server
//The connecting to the database having that thread id and then displaying that thread!

$servername  = "localhost";
$username = "root";
$password = "";
$database = "Catz";

$connection  = mysqli_connect($servername , $username , $password , $database);
//Now Accesing the thread id along with it!
$idthread = $_GET['idofthread'];
$select =  " SELECT * FROM `threads` WHERE `ThreadId` = '$idthread' ";
$runner = mysqli_query($connection , $select);
//Now making sure that there is no special thing happening as well!
while($rows = mysqli_fetch_assoc($runner)){

    $userd = $rows['Made By'];
    $threader = $rows['ThreadAc'];
    echo '

    
    <div class="media" style = "margin-top:20px;border:2px solid #ddd;padding:5px;margin-left:30px;margin-right:30px;"> 
    <img class="mr-3" src= "stok.jpg" width = "64px" height = "64px" alt="Generic placeholder image">
    <div class="media-body" style = "margin-top:10px;">
      <h5 class="mt-0" >'.$userd.'</h5>
      '.$threader.'
    </div>
  </div>
    
    ';

}




?>




    <h2 class = "hrd">Make a comment</h2>

    <?php
    //Again writing the php for this as well!
    // Starting the session as well!
    session_start();

    if(  isset($_SESSION['loggedin'])  && $_SESSION['loggedin'] ==true  ){
      echo '
      
                  
                  
      <form    method = "POST" class = "Former"  action = "'. $_SERVER['REQUEST_URI'].'">
                        
      <textarea name = "texterthread" class = "text"
      style = "width:100%;height:90px;
      margin-top:20px; border-radius:5px;padding:10px; 
      font-size:auto;opacity:70%;">Whats on your mind , '.$_SESSION['username'].'?</textarea>

      <input type = "submit" value = "POST" style = "background-color:rgb(17, 194, 17); color:white
      border-radius:5px;
      padding:3px;
      width:60px;
      margin-top:15px;
      font-size:auto;
      color:white;
   
      border:none;
      border-radius:4px;

      
      ">
    
      
      </form>
              

      ';

    }else{

       echo '
               
       <div class="alert alert-warning" role="alert" style = "margin-top:30px; padding:25px;">
        You need to login first to make a comment . To login <a href = "login.html" style = "text-decoration:none;">click here</a>
        </div>
        
       '; 
    }

  
    
    
    ?>

    <?php
    
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $servername = "localhost";
    $username  = "root";
    $password = "";
    $database  = "Catz";
    $connection  = mysqli_connect($servername , $username , $password , $database);

    $getter = $_GET['idofthread'];

    $con = $_POST['texterthread'];


    $insert = "INSERT INTO `commentreader` ( `CommentAc`, `MadeBy`, `CommentThreadId`, `Dated`) VALUES ( '$con', '{$_SESSION['username']}', '$getter', current_timestamp())";
    $run = mysqli_query($connection , $insert);
    if($run){
      echo '
      <div class="alert alert-info" role="alert" style = "margin-top:20px;">
      Your comment has been added.
    </div>';

    }

    
    }
    
    ?>


     <h2 class  = "hea">Browse Comments</h2>

     
    <?php
    
    $servername  = "localhost";
    $username = "root";
    $password =  "";
    $database = "Catz";

    $getter = $_GET['idofthread'];
    $select = " SELECT * FROM `commentreader` WHERE `CommentThreadId` = '$getter' ";
    $rn = mysqli_query($connection , $select);
    $noc = true;
    while($total = mysqli_fetch_assoc($rn)){
      $noc = false;
      $coment = $total['CommentAc'];
      $commentBy = $total['MadeBy'];
      echo '
      <div class="media" style = "border:1px solid #ddd;width:100%;height:auto; padding:10px;margin-top:50px;">


      <img class="mr-3" src="stok.jpg" style = "width:90px;height:90px;border-radius:5px;" alt="Generic placeholder image">
      <div class="media-body" style = "padding:10px;">
        <h5 class="mt-0" >'.$commentBy.'</h5>
        <p>'.$coment.'</p>
      </div>
    
                
    
            </div>
      
      
      
      
      
      
      
      ';

    }

    ?>

    <?php
     
              if($noc){

                echo '
                
                <div class="alert alert-primary" role="alert" style = "padding:25px; margin-top:30px; ">

                No comments have been posted yet .  Be the first one to initiate one!

                </div>
                
                ';

              }
    
    
    
    ?>





   



  
</body>
</html>