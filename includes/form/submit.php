<?php

    // instruction: call DB class
    $database = new DB();

    // instruction: get all the questions
    $sql = "SELECT * from questions";
    $questions = $database->fetchAll($sql);


    // loop through all the questions to make sure all the answers are set
    foreach ( $questions as $question ) {
        // instruction: if answer is not set, set $error
        if ( !isset( $_POST["q" . $question['id']] ) ) { 
            $error = "Please fields all the things";
        }
    }

    // if $error is set, redirect to home page
    if ( isset( $error ) ) {
        $_SESSION['error'] = $error;
        header( 'Location: /' );
        exit;
    }

    // if no error, loop through all the questions to insert the answer to the results table
    foreach ( $questions as $question ) {
        // instruction: call the $db->insert() method to insert the answer to the results table
        $sql = "INSERT INTO results (`answer`, `question_id`, `user_id`)
        VALUES(:answer, :question_id, :user_id)";
        $database->insert($sql , [
            'question_id' => $question['id'],
            'answer' => $_POST["q" . $question['id']],
            'user_id' => $_SESSION['user']['id']
        ]);
    }
        
    // set success message
    $_SESSION["success"] = "Thank you for your feedback!";
    
    // instruction: redirect to home page
    header("Location: /");
    exit;
