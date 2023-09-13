
<?php
include "db_conn.php";
?>



<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>
    <div class="container my-5">
        <form action="" method="post">
            <input type="text" placeholder="Search data" name="search">
            <button class="btn btn-dark btn-sm" name="submit">Search</button>
        </form>
        <div class="container my-5">
            <table class="table">
                <?php 
                if (isset($_POST["submit"])) {
   $search = $_POST['search'];
   $sql = "SELECT * from `crud` WHERE id like '%$search%' or first_name like '%$search%' or last_name like '%$search%'";
   $result = mysqli_query($conn, $sql);

   if($result){
    if(mysqli_num_rows($result)>0){
        echo '<thead>
        <tr>
        <th>SI NO</th>
    <th>FirstName</th>
    <th>LastName</th></tr>
    </thread>';
    while($row=mysqli_fetch_assoc($result)){
    echo '<tbody>
    <tr>
            <td>'.$row["id"] .'</td>
            <td>'.$row["first_name"].'</td>
            <td>'.$row["last_name"].'</td></tr>
    </tbody>';

    }}
    else{
        echo "<h2 class=text-denger> Data Not Found</h2>";
    };

   }
}

   ?>
   <div class="tr">
    <th></th>
    <th></th>
    <th></th>
   </div>
            </table>
        </div>
    </div>

    
</body>
</html>