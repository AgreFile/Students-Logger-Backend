<?php
error_reporting(E_ERROR | E_PARSE);
?>

<form action="../log.php" method="post">
    Meno: <input type="text" name="name"> <?php if ($_GET["error"]) {echo "Meno je požadované";}?>
    <br>
    <input type="submit" value="">
</form>