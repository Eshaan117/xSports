<!DOCTYPE html>
<html lang="en">
<head>
       <meta charset="UTF-8">
       <meta http-equiv="X-UA-Compatible" content="IE=edge">
       <meta name="viewport" content="width=device-width, initial-scale=1.0">
       <title>xSports : Talk about sports</title>
       <link rel = "stylesheet" href = "index.css"/>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>
       <!-- Now we are going to paste a picture of a sports guy-->

       <!--Getting from the internet-->
       <!--Making the front end first of all and then making some sort of changes-->
       <div class="fred">

              <img src = "baller.jpeg"  class="images">

       </div>


       <nav class  = "Naverz">

              <!-- Making certain changes!-->

              <a id = "homr" href = "#" >Home</a>
              <a href = "About.html" >About</a>
              <a href = "Contact.html">Contact</a>
              <a href = "Explore.html">Explore</a>

           
       </nav>

       <?php
       // Starting the sesion!
       session_start();
       if( isset($_SESSION['loggedin'])  && $_SESSION['loggedin'] == true){

              echo '
              <nav class  = "navb">

              <!-- Making certain changes!-->


              <a href = "logout.php">Logout</a>
             

    
                 </nav>
              
              
              ';

       }else{

              echo '
              
              <nav class  = "navb">

              <!-- Making certain changes!-->


              <a href = "sign.html">SignUp</a>
              <a href = "login.html">Login</a>

    
       </nav>
              
              ';



       }
       
       ?>


       <?php
       
           if(  isset($_GET['logoutsucces']) && $_GET['logoutsucces'] == true  ){
                  echo '
                  
                  <div class="alert alert-warning" role="alert" style = "margin-top:30px;">
                 You have now logged out of the site.
                  </div>
                  
                  
                  ';

           }
       
       
       
       ?>
  


     <?php
         
          if( isset($_GET['signupsuccess']) && $_GET['signupsuccess'] == true ){
                 echo '


                 <div class="alert alert-success" role="alert" style = "margin-top:30px;">
                Congrats , You have signed up! To log in  <a href = "Login.html">Click here</a>.
                 </div>
                 
                 ';


              }else{
      if(  isset($_GET['signupfail']) && $_GET['signupfail'] == true ){
             echo '

             <div class="alert alert-danger" role="alert" style = "margin-top:30px;">
                    Sorry , you cannot sign up because  '.$_GET['signupfail'].' 
              </div>
             
             
             ';

      }
}



     
     ?>

     <?php
     
         if(  isset($_GET['loginsuccess']) && $_GET['loginsuccess'] == true  ){
                echo '
                

                
                <div class="alert alert-success" role="alert" style = "margin-top:30px;">
               <strong> Congrats ,  '.$_SESSION['username'].' .</strong> You have logged in  to the site. You can now start any <strong>dicussions</strong> and <strong>comment</strong> on the site.<a href = "Login.html"></a>
              
                 </div>
                
                
                
                
                ';

         }else{

              if( isset($_GET['loginfail']) &&  $_GET['loginfail']  == true ){
                     echo '
                     

                     <div class="alert alert-danger" role="alert" style = "margin-top:30px;">
                     Sorry , you cannot loggin to the site    '.$_GET['loginfail'].' . If not signed in  <a href = "sign.html">Click here</a>
               </div>
                     
                     
                     ';

              }


         }

     
     ?>






  
       <div class = "BigWrapper">

                      <div class = "SmallWrapper">

                           <img src = "Footb.jfif"/>
                           <h2>Football</h2>

                           <p>Football is a family of team sports that involve, to varying degrees, kicking a ball to score a goal. 
                            Unqualified, the word football normally means the form of football that is the most popular.</p>

                            
                            <a class = "moton" href = "ThreadList.php?catid=1"><i class="fa fa-eye"></i>View Discussions</a>

                      </div>

                      <div class = "SmallWrapper">

<img src = "mah.jpg"/>
<h2>Cricket</h2>

<p>Cricket is a bat-and-ball game played between two teams of eleven players on a field at the centre of which 
       is a 22-yard pitch with a wicket at each end, each comprising two bails balanced on three stumps. 
     </p>

     <a class = "moton" href = "ThreadList.php?catid=2"><i class="fa fa-eye"></i>View Discussions</a>

</div>

<div class = "SmallWrapper">

<img src = "tt.png"/>
<h2>Table Tennis</h2>

<p>Table tennis, also known as ping-pong and whiff-whaff, is a sport in which two or four players hit a lightweight
       ball, also known as the ping-pong ball.</p>

       <a class = "moton" href = "ThreadList.php?catid=3"><i class="fa fa-eye"></i>View Discussions</a>

</div>

<div class = "SmallWrapper">

<img src = "base.jpg"/>
<h2>Baseball</h2>

<p>Baseball is a bat-and-ball game played between two opposing teams, typically of nine players each, that take 
       turns batting and fielding. 
</p>
<a class = "moton" href = "ThreadList.php?catid=4"><i class="fa fa-eye"></i>View Discussions</a>

</div>


<div class = "SmallWrapper">

<img src = "USA.jpg"/>
<h2>Basketball</h2>

<p>Basketball is a team sport in which two teams, most commonly of five players each, opposing one another on a
        rectangular court, compete with the primary objective of shooting a basketball.</p>

        <a class = "moton" href = "ThreadList.php?catid=5"><i class="fa fa-eye"></i>View Discussions</a>

</div>


<div class = "SmallWrapper">

<img src = "swim.jpg"/>
<h2>Swimming</h2>

<p>Swimming is an individual or team racing sport that requires the use of one's 
 entire body to move through water. The sport takes place in pools or open water</p>
 <a class = "moton" href = "ThreadList.php?catid=6"><i class="fa fa-eye"></i>View Discussions</a>
</div>


<div class = "SmallWrapper">

<img src = "kl.jfif"/>
<h2>Wrestling</h2>

<p>Wrestling is a combat sport involving grappling-type techniques such as clinch fighting, throws and takedowns, joint locks, pins and other grappling holds.</p>
<a class = "moton" href = "ThreadList.php?catid=7"><i class="fa fa-eye"></i>View Discussions</a>
</div>

<div class = "SmallWrapper">

<img src = "L.jpg"/>
<h2>Lawn Tennis</h2>

<p>Tennis is a racket sport that can be played individually against a single opponent or between two teams
        of two players each. </p>
        <a class = "moton" href = "ThreadList.php?catid=8"><i class="fa fa-eye"></i>View Discussions</a>
</div>





<div class = "SmallWrapper">

<img src = "opl.jfif"/>
<h2>Badminton</h2>

<p>Badminton is a racquet sport played using racquets to hit a shuttlecock across a net. 
Although it may be played with larger teams, the most common forms of the game are "singles" and "doubles".</p>
<a class = "moton" href = "ThreadList.php?catid=9"><i class="fa fa-eye"></i>View Discussions</a>
</div>







       </div>


       






       <nav class = "nb">

                 <a class = "alinker">&copy;xSports.com . All rights reserved.</a>

                 <div class = "Sider">Follow us at:</div>

                 <div class = "diveon">

                   <!-- Now lets make some things changes man! -->
                   

                   <a href="https://www.facebook.com/ishaan.punetha" class="fa fa-facebook"></a>
                   <a href="#" class="fa fa-twitter"></a>
                   <a href="#" class="fa fa-youtube"></a>
                   <a href="#" class="fa fa-instagram"></a>
                   <a href="#" class="fa fa-reddit"></a>



                 </div>

  
       </nav>






       
</body>
</html>