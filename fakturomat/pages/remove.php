<html lang="pl">
<h3>Usuwanie faktur</h3>

Usuń jedną fakturę o podanym numerze:</br>
<form method="post">
    Numer faktury: <input type="text" name="number"></br>
    <input type="submit" value="Usuń fakturę">
</form>

</br>

<?php
session_start();

if (key_exists('number', $_POST)) {
    $id = $_POST['number'];

    if (key_exists($id, $_SESSION)) {
        unset($_SESSION[$id]);
        echo "Usunięto fakturę o numerze $id.</br></br>";
    } else echo "Nie ma w rejestrze faktury o numerze: $id.</br></br>";
}

$count = count($_SESSION);

echo "Aktualna ilość faktur w rejestrze: $count. </br> Są to faktury o numerach: </br>";

$keys = array_keys($_SESSION);
for ($i = 0; $i < $count; $i++) {
    $ord = $i + 1;
    echo "$ord. $keys[$i] </br> ";
}
?>
</html>