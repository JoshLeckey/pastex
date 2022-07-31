<html>
<head>
    <title>PASTEX</title>
    
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;1,600&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="style.css">
  
</head>
<body>
    
<h1 class="logo">PASTEX</h1>
<form method="post">
<textarea name="content" required placeholder="Your Text" style="margin: 0px; width: 520px; height: 250px;" name="content">
</textarea>  
<br>
    <input type="submit" name="subcon" class="button" value="Submit" />
</form>

<?php
include "dbcon.php";
if (isset($_POST['subcon'])){
    Submit();
}
    
function genIdent($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}

function Submit(){
    $ident = genIdent(10);
    $content=$_POST['content'];
    $scontent = str_replace("'", "''", $content);
    $sql = "Insert into paste (Content, Ident) Values('" . $scontent . "','" . $ident . "')";
    if(OpenCon()->query($sql) === TRUE){
        header("Location: /content.php?" . $ident);
        exit;
    }
    else{
        echo "help";
    }
} 
?>
</body>
</html>