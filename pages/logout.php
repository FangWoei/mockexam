<?php

    // instruction: if user session found, unset it
  
    unset( $_SESSION['user'] );

    header("Location: /");
    exit;


    // instruction: redirect user to home page

