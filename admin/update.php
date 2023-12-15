<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "bsis_3g_db";

$connection = new mysqli($host, $user, $password, $database);

$ID="";
$Firstname="";
$Lastname="";
$Email="";
$Contact=""; 
$Password="";

$errorMessage="";
$successMessage ="";

if($_SERVER ['REQUEST_METHOD'] == 'GET')
 {
    if(!isset($_GET['ID'])){
        header("location: /blog_mendoza/create.php");
        exit;    
    }
        $ID=$_GET["ID"];
    $sql = "SELECT * FROM clients WHERE ID= $ID";
                $result = $connection->query($sql);
                $row =$result->fetch_assoc();


                if(!$row){
                    header("location: /bsis3g_carl/create.php");
                    exit;
                }

                $Firstname=$row["Firstname"];
                $Lastname=$row["Lastname"];
                $Email=$row["Email"];
                $Contact=$row["Contact"];
                $Password=$row["Password"];

                
                
}
            
else
 {
    $ID=$_POST["ID"];
    $Firstname=$_POST["Firstname"];
    $Lastname=$_POST["Lastname"];
    $Email=$_POST["Email"];
    $Contact=$_POST["Contact"];
    $Password=$_POST["Password"];

    do{
        if( empty($ID) || empty($Firstname) || empty($Lastname) || empty($Email) || empty($Contact) || empty($Password) )
        {
    $errorMessage = "All fields must be filled out.";
    break;
        }
        $sql = "UPDATE clients " . 
        "SET Firstname ='$Firstname', Lastname='$Lastname', Email='$Email', Contact='$Contact', Password='$Password'".
        "WHERE ID=$ID";
        $result = $connection->query($sql);

        if(!$result){
            $errorMessage = "Invalid query" . $connection->error;
            break;
        }
        $successMessage = "User update successful";
        header("location: /blog_mendoza/admin/user.php");
            exit;
    }while(true);

 }
?>


<body>
<link href="../ASSETS/css/style.css" rel="stylesheet">
    <!-- bootstrap icon link -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">


    <div class="container02">
        <h2>New User</h2>
        <?php
        if(!empty($errorMessage))
        {
            echo"
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$errorMessage</strong>
            <button type='button' class ='btn-close' data-bs-dismiss='alert' aria label='Close'></button>
            </div>
            ";
        }
        ?>
        <form method="post">
            <input type="hidden" name ="ID" value="<?php echo $ID;?>">
            <div class="row mb-3">
                
                <label class="col-sm-3 col-form-label">Firstname</label>
                
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Firstname" value="<?php echo $Firstname;?>">

                </div>
            </div>

                <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Lastname</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Lastname" value="<?php echo $Lastname;?>">

                </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Email" value="<?php echo $Email;?>">

                </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Contact</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Contact" value="<?php echo $Contact;?>">

                </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="Password" value="<?php echo $Password;?>">

                </div>
                
            </div>
            
            
            <div class="row mb-3">
            
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Update</button>
                    
                </div>
                

                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/blog_mendoza/admin/user.php" role="button">Cancel</a>

                </div>
                

            </div>

        </form>
    </div>
</body>
</html>