<?php
 if(isset($_GET['ID'])){
$ID=$_GET["ID"];  


$host = "localhost";
$user = "root";
$password = "";
$database = "bsis_3g_db";

$connection = new mysqli($host, $user, $password, $database);


$sql= "DELETE FROM clients  WHERE ID=$ID";
        $connection->query($sql);
}
header('location: /blog_mendoza/admin/user.php');
        exit;
?>