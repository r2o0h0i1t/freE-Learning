<?php
include("../config.php");

$query = "SELECT * FROM course";

$result = mysqli_query($con,$query);

$rows = mysqli_fetch_all($result,MYSQLI_ASSOC);

echo json_encode($rows);