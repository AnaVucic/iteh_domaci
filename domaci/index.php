<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNOS</title>
</head>
<body>
    <h1>UNOS PODATAKA</h1>
    <hr/>

    <form method="post" action="">
        MemberID:<input type="text" name="MemberID"/><br/>
        Firstname:<input type="text" name="Firstname"/><br/>
        Lastname:<input type="text" name="Lastname"/><br/>
    <input type="submit" name="Unos" value="Ubaci" />
</form>

<?php
    require 'db_connection.php';
    $conn = OpenCon();
    echo 'Connected Successfully!';


    CloseCon($conn);
?>
</body>
</html>

