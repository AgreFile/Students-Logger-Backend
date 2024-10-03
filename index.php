<?php
error_reporting(E_ERROR | E_PARSE);
// $nameErr = "";
// $name = "";
// $echoThing = "";

// if (empty($_REQUEST["name"])) {
//     $nameErr = "Meno je požadované";
// } else {
//     $host = $_SERVER['HTTP_HOST'];
//     $extra = 'showpeople.php';

//     $echoThing = htmlspecialchars($_REQUEST["name"]) . " " . date("d-m-y H:m:s") . "\n";
//     $logger = fopen("logger.txt", "a+") or die("CANNOT OPEN");
//     fwrite($logger, $echoThing);
//     fclose($logger);
//     header("Location: http://$host/$extra");
// }
?>

<!-- <form action="<?php //htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
    Meno: <input type="text" name="name"> <?php //echo $nameErr; ?>
    <br>
    <input type="submit" value="">
</form> -->

<form action="../log.php" method="post">
    Meno: <input type="text" name="name"> <?php if ($_GET["error"]) {echo "Meno je požadované";}?>
    <br>
    <input type="submit" value="">
</form>