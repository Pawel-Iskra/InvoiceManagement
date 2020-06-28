<?php
declare(strict_types=1);
session_start();

use App\Invoice;
use App\Seller;
use App\Item;
use App\Customer;

include_once("invoice.php");


$count = count($_POST['itemname']);
$items = [];
$sum = 0;
for ($i = 0; $i < $count; $i++) {
    $price = floatval($_POST['itemprice'][$i]);
    $quantity = (int)($_POST['itemquantity'][$i]);
    $vat = floatval($_POST['itemvat'][$i]);

    $item = new Item($_POST['itemname'][$i], $quantity, $price, $vat);
    $items[] = $item;

    $sum = $sum + $price * $quantity + $quantity * ($vat * $price / 100.0);
}
$sum = round($sum, 2);


$customer = new Customer($_POST['customername'], $_POST['customeraddress'], $_POST['customernip']);
$seller = new Seller($_POST['sellername'], $_POST['selleraddress'], $_POST['sellernip']);

$invoice = new Invoice($_POST['id'], $_POST['date'], $customer, $seller, $items, $sum);

$_SESSION[$_POST['id']] = $invoice;

echo '<a href="/">Powrót do strony głównej</a><br/>';
echo '<h4>Faktura o numerze: ' . $_POST['id'] . ' została dodana do rejestru.</h4>';
echo '<h3>Wygenerowana faktura</h3>';

?>
<html lang="pl">

<table style=" border: 2px solid black;" cellpadding="5">
    <tr>
        <td align="left">
            Numer faktury:</br>
            <B><?php echo $_POST['id']; ?></B></br></br>
        </td>

        <td align="right">
            Data wystawienia: </br>
            <B><?php echo $_POST['date']; ?></B></br></br>
        </td>
    </tr>

    <tr>
        <td align="left">
            Sprzedający: </br>
            <B><?php echo $_POST['sellername']; ?></B></br>
            <B><?php echo $_POST['selleraddress']; ?></B></br>
            <B><?php echo $_POST['sellernip']; ?></B></br></br>
        </td>

        <td align="right">
            Kupujący: </br>
            <B><?php echo $_POST['customername']; ?></B></br>
            <B><?php echo $_POST['customeraddress']; ?></B></br>
            <B><?php echo $_POST['customernip']; ?></B></br></br>
        </td>
    </tr>


    <tr>
        <td style="align-content: center">

            <table cellspacing="0">
                <tr>
                    <td style="border: 1px solid #333;" align="center">
                        LP
                    </td>
                    <td style="border: 1px solid #333;" align="center">
                        Usługa / towar
                    </td>
                    <td style="border: 1px solid #333;" align="center">
                        Ilość
                    </td>
                    <td style="border: 1px solid #333;" align="center">
                        Cena netto</br>za szt [zł/szt]
                    </td>
                    <td style="border: 1px solid #333;" align="center">
                        Stawka vat [%]
                    </td>
                    <td style="border: 1px solid #333;" align="center">
                        Cena brutto [zł]
                    </td>
                </tr>

                <?php
                for ($i = 0; $i < $count; $i++) {
                    $ordinal = $i + 1;
                    $itemName = $_POST['itemname'][$i];
                    $quantity = $_POST['itemquantity'][$i];
                    $price = floatval($_POST['itemprice'][$i]);
                    $vat = floatval($_POST['itemvat'][$i]);
                    $gross = round($price * $quantity + $quantity * ($price * $vat / 100.0), 2);

                    echo <<< END
                    <tr>
                    <td style="border: 1px solid #333;" align="center">$ordinal</td>
                    <td style="border: 1px solid #333;" align="center">$itemName</td>
                    <td style="border: 1px solid #333;" align="center">$quantity</td>
                    <td style="border: 1px solid #333;" align="center">$price</td>
                    <td style="border: 1px solid #333;" align="center">$vat</td>
                    <td style="border: 1px solid #333;" align="center">$gross</td>
                    </tr>
                    END;

                }
                ?>

                <tr>
                    <td align="right" colspan="5" align="right" style="border: 1px solid #333;">
                        SUMA &nbsp&nbsp&nbsp
                    </td>
                    <td align="center" style="border: 1px solid #333;">
                        <B><?php echo floatval($sum) ?> zł</B>
                    </td>
                </tr>

            </table>
        </td>
    </tr>

    <tr>
        <td>
            </br>KWOTA DO ZAPŁATY = <B><?php echo floatval($sum) ?> zł</B>
        </td>
    </tr>

</table>
</html>





