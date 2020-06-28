<html lang="pl">
<h3>Wyświetlanie faktur</h3>

Wprowadź numer faktury do wyświetlenia:</br>
<form action="pages/showOne.php" method="post">
    Numer faktury: <input type="text" name="invoicenumber"></br>
    <input type="submit" value="Wyświetl fakturę">
</form>

</br>
</html>

<?php
session_start();
$count = count($_SESSION);
echo "Aktualna ilość faktur w rejestrze: $count. </br> Są to faktury o numerach: </br>";

$keys = array_keys($_SESSION);
for ($i = 0; $i < $count; $i++) {
    $ordinalNumber = $i + 1;
    echo "$ordinalNumber. $keys[$i] </br> ";
}

?>






