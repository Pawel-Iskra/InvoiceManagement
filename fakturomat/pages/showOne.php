<?php

use App\Invoice;
use App\Seller;
use App\Item;
use App\Customer;

include_once("invoice.php");

session_start();

$id = $_POST['invoicenumber'];
echo '<a href="/">Powrót do strony głównej</a><br/></br>';

if (array_key_exists($id, $_SESSION)) {
    $invoice = $_SESSION[$id];

    include_once("printOne.php");

} else echo "<B></br>W rejestrze nie istnieje faktura o numerze $id.</B>";
