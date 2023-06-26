<?php

    // redirect to home page if user is not admin
    if ( !isCurrentUserAdmin() ) {
        header( 'Location: /' );
        exit;
    }

    // instruction: call DB class
    $db = new DB();

    // instruction: get all POST data
    $question = $_POST['question'];


    /* 
        instruction: do error checking 
        - make sure all the fields are not empty
    */
    if ( empty($question) ){
        $error = "Please fields All questions";
    }


    // if error found, set error message session & redirect user back to /manage-questions-add page
    if( isset ($error)){
        $_SESSION['error'] = $error;
        header("Location: /manage-questions-add");    
        exit;
    } 

    // instruction: add new question
    $sql = "INSERT INTO questions (`question`)
    VALUES(:question)";
    $db->insert($sql ,[
        'question' => $question
    ]);


    // set success message
    $_SESSION["success"] = "Question added";

    // instruction: redirect user back to manage-questions page
    header("Location: /manage-questions");
    exit;