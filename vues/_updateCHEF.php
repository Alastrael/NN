<!DOCTYPE html>
<html lang="en">

<?php
    include_once("../dataAccessCRUD/formations.php");
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>

    <?php
        if($_POST['decision']=="accepter") updateChef($_POST['identifiantFormation'],$_POST['identifiantSalarie']);
        else ;
    ?>

</body>
</html>