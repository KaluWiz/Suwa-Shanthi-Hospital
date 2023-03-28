<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Admin Renal Management Panel</title>
  </head>
  <body>
   <!--Navbar--> 
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Admin Renal Management Panel</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
          <li class="nav-item">
              <!--<a class="nav-link active" aria-current="page" href="index.php">Home</a>-->
              <a type="button" class="btn btn-primary nav-link active" href="../../admin_panel/index.php">Main page</a>
            </li>
            <li class="nav-item">
              <!--<a class="nav-link active" aria-current="page" href="index.php">Home</a>-->
              <a type="button" class="btn btn-primary nav-link active" href="../index.html">Home</a>
            </li>
            <li class="nav-item">
              <a type="button" class="btn btn-primary nav-link active" href="create.php">Add New</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container my-4">
    <!--Table-->
    <table class="table">
  <thead>
    <tr>
      <th >ID</th>
      <th >Name</th>
      <th >Email</th>
      <th >Phone  Number</th>
      <th >joining date</th>
      <th >Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php
        include "connection.php";
        $sql = "select * from rental";
        $result = $con->query($sql);
        if(!$result){
            die("Invalid query ");
        }
        while($row=$result->fetch_assoc()){
            echo"
    <tr>
      <th>$row[id]</th>
      <td>$row[name]</td>
      <td>$row[email]</td>
      <td>$row[phone]</td>
      <td>$row[join_date]</td>
      <td>
             <a class='btn btn-success' href='edit.php?id=$row[id]'>Edit</a>
             <a class='btn btn-danger' href='delete.php?id=$row[id]'>Delete</a>
      </td>
    </tr> 
    ";
     }
    ?>
  </tbody>
</table>
</div> 

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>
