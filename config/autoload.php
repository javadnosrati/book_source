<?php
//require config file
require_once __DIR__ . '/config.php';

// start session
session_start();

// create and init database connection
$db = mysqli_connect(
    APP_CONFIG['DB']['hostname'],
    APP_CONFIG['DB']['username'],
    APP_CONFIG['DB']['password'],
    APP_CONFIG['DB']['database']
);

// test database connection
if (!$db) {
    echo mysqli_connect_errno();
    return die('<br><br><h2>database connection is failed!</h2>');
}


// helper-function

/**
 * Set the user ID session, a boolean and the time the session
 * was authenticated.
 * @param $user
 */
function login($user)
{
    $_SESSION['user_id'] = $user['id'];
    $_SESSION['is_logged_in'] = true;
    $_SESSION['time_logged_in'] = time();
}

/**
 * Unset all session variables and destroy the session.
 */
function logout()
{
    unset($_SESSION['is_logged_in']);
    unset($_SESSION['user_id']);
    unset($_SESSION['time_logged_in']);
    session_destroy();
}

/**
 * Return true if user is logged in.
 * @return boolean
 */
function isUserLoggedIn()
{
    if (!isset($_SESSION['user_id']) || !isset($_SESSION['is_logged_in'])) {
        return false;
    } else {
        return true;
    }
}


function redirect($url)
{
    header("Location: {$url}");
}


function setFlash($key, $message)
{
    $_SESSION['message'][$key][] = $message;
}

function getFlash($key)
{
    $message = (isset($_SESSION['message'][$key]))?$_SESSION['message'][$key]:[];
    unset($_SESSION['message']);
    return $message;
}



