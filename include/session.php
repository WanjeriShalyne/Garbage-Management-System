<?php 

// Start the session.Way of storing information in variables to be used across multiple pages.The computer willl know 
//who you are when you start and end
//starts when users login, end when user logs out 
session_start();

//if session is not set to  $_SESSION['user'] - redirected to the login page.
//isset function checks whether a variable is set and is not NULL.
// also checks if a declared variable, array or array key has null value, if it does, 
//isset() returns false, it returns true in all other possible cases
 if(!isset($_SESSION['user']))    
{
	header("Location:login.php"); //log out
}