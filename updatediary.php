<?php

session_start();

include("connection.php");

$diary = $_POST['diary'];

$sql = "UPDATE users SET diary = '".mysqli_real_escape_string($conn, $diary)."'
            WHERE id = '".$_SESSION['id']."' LIMIT 1";

$conn->query($sql);


