<?php
session_start();
if (isset($_SESSION['logged'])) {
    $session_open = true;
    $user_email = $_SESSION['email'];
} else {
    $session_open = false;
}
include 'view.phtml';
