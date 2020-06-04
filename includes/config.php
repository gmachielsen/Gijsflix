<?php
ob_start(); //Turns on output buffering
session_start();

date_default_timezone_set("Europe/Amsterdam");

try {
  $con = new PDO("mysql:dbname=Gijsflix;host=localhost", "root", ""); // PDO stands for php data objects
  $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  // trying to connect with the database.
} catch (PDOException $e) {
    exit("Connection failed: " . $e->getMessage());
}
?>
