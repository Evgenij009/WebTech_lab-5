<?php
//include("workCalendar.php");
require_once 'connection.php';

if (isset($_GET["data"])) {
    $numberData = $_GET["data"];
    $link = mysqli_connect($host, $user, $password, $database)
        or die("Ошибка " . mysqli_error($link));
    // echo "<br>Link: ";
    // print_r($link);
    $query = "SELECT * FROM news";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link));
    // echo "<br><br>Result: ";
    // print_r($result);
    // echo "<br><br><br>";
    while ($row = mysqli_fetch_assoc($result)) {
        if ($row['data'] === $numberData) {
            echo $row['text'] . "<br><br>";
            echo '<img src="data:image/jpeg;base64,' . base64_encode($row['img']) . '"/>';
            break;
        }
    }
}
