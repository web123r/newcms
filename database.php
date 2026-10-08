<?php 
$servername = "localhost";
$username = "root";
$password = '';
$dbname = 'updatedcms';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Unable to connect'. $conn->connect_error);
}else{
    
};

session_start();
?>