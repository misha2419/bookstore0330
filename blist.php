<?php
$servername = "localhost";
$bdname="bookstore";
$username = "bookstore";
$password = "asd24193969";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$bdname", $username, $password);

  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT * FROM `book`";
  $sth = $conn->prepare($sql);
  $sth->execute();
  $ds = $sth->fetchAll(PDO::FETCH_ASSOC); 

  echo "Connected successfully";

} catch(PDOException $e) {
  echo "無法連接 Connection failed: " . $e->getMessage();
}

$conn = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

  <title>Book list</title>
</head>
<body>
  <div class="container">
  <h1>Book Store</h1>
  <table class="table">
    <tr>
      <td>書名</td>
      <td>作者</td>
      <td>出版社</td>
      <td>出版日期</td>
      <td>定價</td>
      <td>類型</td>
    </tr>
    <?php
        foreach ($ds as $d){
          $btype = array('1'=>"平裝", '2'=>"精裝", '3'=>"盒裝", '4'=>"其他");
          echo "<tr>";
          echo "<td>". $d['bookname'] ."</td>";
          echo "<td>". $d['author'] ."</td>";
          echo "<td>". $d['publisher'] ."</td>";
          echo "<td>". $d['pubdate'] ."</td>";
          echo "<td>". $d['price'] ."</td>";
          echo "<td>". $d['booktype'] ."</td>";
          echo "</tr>";
        }
        ?>
  </table>
      </div>
</body>
</html>
