<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link  rel  = "stylesheet" href = "ThreadList.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>xSports: See Threads</title>


</head>
<body>

  <!-- Now we are going to  redesign this page specially for holding up discussions --> 
  
  <?php
  
 
   // Making a connection with the local server!
   $servername  = "localhost";
   $username = "root";
   $password = "";
   $database = "catz";

   // Making a connection variables
   $connect = mysqli_connect($servername  ,$username , $password , $database);

   $catid = $_GET['catid'];


   //Selecting some information from the server!
   $select = " SELECT * FROM `catzname` WHERE  `CatId` = '$catid'  ";
   $runner = mysqli_query($connect  , $select);
   while($rowz = mysqli_fetch_assoc($runner)){
      $category = $rowz['CatName'];
      $categorydesc = $rowz['CatDesc'];

   }

  
  
  
  ?>

  <img src  = "this.jfif" class = "imagernoon">

  <div class  = "BigWrapper">

      <h2 class  = "Header">Discuss on <?php echo $category;?></h2>

         
         <div  class = "SmallWrapper">

             <h2 class = "Headerr">Discussion Info</h2>
             <p>This is an end to end to <?php echo $category ;?> Discussion corner , made to make people interact about the sport. </p>

             <p>Make sure while commenting or initiating any random discussion you follow the <a href = "Commn.php" class = "mo">community guidelines</a></p>

         </div>

         <h2 class = "Heads">Start a discussion</h2>

       


       
        <?php
        
        session_start();
              if(  $_SERVER['REQUEST_METHOD']  == 'POST'){
                //Now making some more stuff as well!
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "Catz";

                $connection = mysqli_connect($servername , $username , $password  , $database);
                
                $ider = $_GET['catid'];
                $stuff = $_POST['texterthread'];
                $insert = " INSERT INTO `threads` ( `ThreadAc`, `Made By`, `ThreadCatId`, `Made`) VALUES ('$stuff',  '{$_SESSION['username']}' , '$ider', current_timestamp())";
                $runol  = mysqli_query($connection , $insert);
           
                if($runol){
                 echo '
                 
                 <div class="alert alert-info" role="alert" style = "margin-top:20px;">
                   Your discussion  has been added.
                 </div>
                 
                 
                 ';


                }


              }

        ?>





         <?php
             



       

         
                if( isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true  ){

               
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
                  
                     <ul class = "uler">
                           
                             <li>Sorry , you cannot start a discussion as your have not logged in.</li>
                             <li>To continue to login . <a href = "login.html">Click here</a>.</li>
                             <li>No account ? <a href = "sign.html">Click here</a> to make one.</li>
                     
                     </ul>
                  
                  
                  ';

                }
         
         
         
         ?>





         </form>

    


         <!-- Making certain changes to the site -->

         <h2 class = "Head">See Discussions</h2>


         <?php
         
         // Using the php script again as well!
         
        $catter = $_GET['catid'];
        $selec =  "  SELECT * FROM `threads`  WHERE `ThreadCatId` = '$catter' ";
        $runit = mysqli_query($connect , $selec );
        $nocomment = true;
        while($trt = mysqli_fetch_assoc($runit)){
          $nocomment = false;
          // Now let us make it happen again!
          $userx = $trt['Made By'];
          $tid = $trt['ThreadId'];
          $td = $trt['ThreadAc'];
          $catt = $trt['ThreadCatId'];

          echo '
          
          <div class="media" style = "border:1px solid #ddd;width:100%;height:auto; padding:10px;margin-top:50px;">


          <img class="mr-3" src="stok.jpg" style = "width:90px;height:90px;border-radius:5px;" alt="Generic placeholder image">
          <div class="media-body" style = "padding:10px;">
            <h5 class="mt-0" >'.$userx.'</h5>
            <p>'.$td.'</p>
          </div>
        
          <a href = "Comment.php?idofthread='.$tid.'" class = "greener">Leave a comment</a>
                    
        
                </div>
          
          
          
          
          
          
          ';



        }

         
         
         ?>

         <?php
         
                    if($nocomment){

                      echo '
                      
                      <div class="alert alert-primary" role="alert" style = "padding:25px; margin-top:30px; ">

                      No discussions have been posted yet .  Be the first one to initiate one!
  
                      </div>

                      
                      ';

                    }
         
         ?>
  </div>





  
</body>
</html>