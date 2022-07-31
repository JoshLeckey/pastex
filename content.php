<html>
<head>
    <title>PASTEX</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;1,600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
</head>
<body>
</a><h1 class="logo">PASTEX</h1>
<?php
  include "dbcon.php";
  $URL = $_SERVER['REQUEST_URI'];
  $ident = str_replace("/content.php?", "", $URL);
  $conn = OpenCon();
  $sql = "Select Content from paste where Ident = '" . $ident . "';";
  $result = $conn->query($sql);
  if($result->num_rows > 0){
      while($row = $result->fetch_assoc()) {
            echo "<form>";
            echo '<textarea readonly style="margin: 0px; width: 520px; height: 250px;" name="content">';
            echo $row['Content'];
            echo "</textarea>";
            echo "</form>";
      }
  }

CloseCon($conn);
?>
</body>
</html>