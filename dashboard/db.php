<?php

$conn = mysqli_connect("localhost", "root", "", "dayly");
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
