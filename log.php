<?php
date_default_timezone_set("Europe/Prague");
require "studentsFile.php";

$name = $_REQUEST["name"];

if (empty($name)) {
    header("Location: ../index.php?error=true");
    die();
}
if ((int) date("H") >= 20 and (int) date("H") <= 24) {
    die("Nemôžem zaznamenať. Moc neskoro");
}

$studentFileHandler = new StudentFile("students.json");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $studentFileHandler->createNewRecord($name);
}else {
    echo"no poster";
}

header("Location: ../showPeople.php");