<?php
$database = "mysql:host=127.0.0.1:3306;dbname=students";
$databaseName = "root";
$databasePassword = "root";

try {
    $PDOConnection = new PDO($database, $databaseName, $databasePassword);
    $PDOConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $queryStudents = $PDOConnection->query("SELECT * FROM students WHERE 1");
} catch (PDOException $e) {
    echo "" . $e->getMessage();
}

foreach ($queryStudents as $student) {
    try {
        $checkoutUserQuery = $PDOConnection->prepare("SELECT checkout_time FROM checkouts WHERE student_name=?");
        $checkoutUserQuery->execute([$student["student_name"]]);
        $checkoutUserQuery=$checkoutUserQuery->fetchAll(PDO::FETCH_ASSOC);

        $checkoutIndex = 0;

        echo htmlspecialchars($student["student_name"]) . " || počet príchodov: " . count($checkoutUserQuery)."<br>";
        echo "<ul>";

        rsort($checkoutUserQuery);// aby to išlo od najnovších pridaní

        foreach ($checkoutUserQuery as $checkoutInfo) {
            $isLate = $checkoutInfo["is_late"] ? "na čas" : "neskoro"; 
            
            $checkoutIndex++;
            echo "<li>" . $checkoutIndex . ". " . $checkoutInfo["checkout_time"] . " || " . $isLate ."</li>";// "<br>";
        }
        echo "</ul>";
    } catch (PDOException $e) {
        echo "" . $e->getMessage();
    }
}

$PDOConnection = null;
?>

<a href="../index.php">Go back</a>