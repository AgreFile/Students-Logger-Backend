<?php
date_default_timezone_set("Europe/Prague");

function getLateString($isLate) : string {
    if ($isLate){
        return "Mešká";
    }else{
        return "Načas";
    }
}
function logName($name) {
    $echoThing = "";
    $late = false;

    if (empty($name)) {
        header("Location: ../index.php?error=true");
        die();
    }
    
    if ((int) date("H") >= 20 and (int) date("H") <= 24) {
        die("Nemôžem zaznamenať. Moc neskoro");
    }elseif ((int) date("H") > 7 ) {
        $late = true;
    }else {
        $late = false;
    }

    $studentsFile = fopen("students.json","a");
    fclose($studentsFile);

    $studentsArray = json_decode(file_get_contents("students.json"), true);

    $studentsArray[$name]["logs"][] = array(date("d-m-y H:i:s"),$late);
    ksort($studentsArray);
    $studentsFile = fopen("students.json","w");
    fwrite($studentsFile, json_encode($studentsArray));
    header("Location: ../showPeople.php");
}

logName($_REQUEST["name"]);