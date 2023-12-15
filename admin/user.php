
<?php include('include/header.php');
?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        
        <h1 class="h2">Users</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
          </div>
          <a class="btn btn-primary" href="/blog_mendoza/admin/create.php"role="buttom"><i class="bi bi-person-fill-add"></i></a>

          

      
        </div>
      </div>
      
      <table class="table">
        <thead>
            <tr>
        <th>ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Email</th>
        <th>Contact</th>
        <th>Password</th>
        
       
            </tr>
        </thead>
        <tbody>
            <?php
            $host = "localhost";
            $user = "root";
            $password = "";
            $database = "bsis_3g_db";
            $connection = mysqli_connect($host, $user, $password, $database);
            if($connection->connect_error)
            {
                die("Connection failed:" . $connection->connect_error);
            }

            $sql = "SELECT * FROM clients";
            $result= $connection->query($sql);

            if(!$result){
                die("Invalid query:" . $connection->connect_error);
            }

            while($row =$result->fetch_assoc())
            {   
                echo "
            <tr>
                <td>$row[ID]</td>
                <td>$row[Firstname]</td>
                <td>$row[Lastname]</td>
                <td>$row[Email]</td>
                <td>$row[Contact]</td>
                <td>$row[Password]</td>

                <td class='action'>
                    <a class='btn btn-primary btn-sm' href='/blog_mendoza/admin/update.php?ID=$row[ID]'><i class='bi bi-pencil'></i></a>
                    <a class='btn btn-danger btn-sm' href='/blog_mendoza/admin/include/delete.php?ID=$row[ID]'><i class='bi bi-trash'></i></a>


                </td>
                
            
            </tr>
            ";
            
            }
            
            ?>
        </tbody>
            
        </table>
        <link href="../ASSETS/css/style.css" rel="stylesheet">
    <!-- bootstrap icon link -->


     
      
    </main>
    <?php include('include/footer.php');
    ?>
