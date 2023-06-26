<?php

    // start session
    session_start();

    // require all the files
    require 'includes/class-db.php';
    require 'includes/functions.php';
    
    // get route
    $path = trim( $_SERVER['REQUEST_URI'], '/' ); // remove starting and ending slashes

    // remove query string
    $path = parse_url( $path, PHP_URL_PATH );

    if ( isset( $path ) ) {
        switch( $path ) {
            case 'form/submit':
                require 'includes/form/submit.php';
                break;
            case 'auth/login':
                require 'includes/auth/login.php';
                break;
            case 'auth/signup':
                require 'includes/auth/signup.php';
                break;
            case 'questions/add':
                require 'includes/questions/add.php';
                break;
            case 'questions/edit':
                require 'includes/questions/edit.php';
                break;
            case 'questions/delete':
                require 'includes/questions/delete.php';
                break;
            case 'users/add':
                require 'includes/users/add.php';
                break;
            case 'users/edit':
                require 'includes/users/edit.php';
                break;
            case 'users/changepwd':
                require 'includes/users/changepwd.php';
                break;
            case 'users/delete':
                require 'includes/users/delete.php';
                break;                                   
            case 'results':
                require 'pages/results.php';
                break;
            case 'manage-users':
                require 'pages/manage-users.php';
                break;
            case 'manage-users-add':
                require 'pages/manage-users-add.php';
                break;
            case 'manage-users-edit':
                require 'pages/manage-users-edit.php';
                break;
            case 'manage-users-changepwd':
                require 'pages/manage-users-changepwd.php';
                break;
            case 'manage-questions':
                require 'pages/manage-questions.php';
                break;
            case 'manage-questions-add':
                require 'pages/manage-questions-add.php';
                break;
            case 'manage-questions-edit':
                require 'pages/manage-questions-edit.php';
                break;
            case 'dashboard':
                require 'pages/dashboard.php';
                break;
            case 'login':
                require 'pages/login.php';
                break;
            case 'logout':
                require 'pages/logout.php';
                break;
            case 'signup':
                require 'pages/signup.php';
                break;
            default:
                require 'pages/home.php';
                break;
        }
    } else {
        require 'pages/home.php';
    }