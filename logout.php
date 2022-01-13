<?php

       // Session Starts
       session_start();
       session_unset();
       session_destroy();
       header("location:index.php?logoutsucces=true");
       exit();



?>