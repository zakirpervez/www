<?php
/**
 * Return the user authentication status
 * @return boolean true if a user is logged in else return false.
 */
function isLoggedIn() {
    return isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in'];
}