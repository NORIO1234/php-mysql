<?php

session_start();

include_once('config.php');

$sql = "SELECT * FROM users";
$selecUser = $connect->prepare($sql);
$selecUser->execute();

$users = $selecUser->fetchAll();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        table, th, td{
            border: 1px solid black;
        }

        td,th{
            padding: 20px;
        }
    </style>
</head>
<body>


<table>
    <tr>
        <th>Name</th>
        <th>Surname</th>
        <th>Username</th>
        <th>Email</th>
        <th>Password</th>
        <th>Delete</th>
        <th></th>
    </tr>


    <tr>
        <?php
            foreach($users as $user){
        ?>


        <td><?= $user['name']?></td>
        <td><?= $user['surname']?></td>
        <td><?= $user['username']?></td>
        <td><?= $user['email']?></td>
        <td><?= $user['password']?></td>
        <td><a href="delete.php?id=<?= $user_data['id']; ?>">DELTE</a></td>


        </tr>


                <?php } ?>


</table>
</body>
</html>
