<?php
$studentsArray = json_decode(file_get_contents("students.json"), true);
foreach ($studentsArray as $studentName => $value) {
    echo $studentName . " || počet príchodov: " . count($value["logs"]);
    echo "<br>";
    rsort($value["logs"]);
    
    foreach ($value["logs"] as $log => $logValues) {
        echo ".. " . $log+1 . ". " .$logValues[0];
        if ($logValues[1] == 1) {
            echo " || Neskoro";
        }else {
            echo " || Na čas";
        }
        echo "<br>";
    }
    echo "<br>";
}
?>
<a href="../index.php">Go back</a>