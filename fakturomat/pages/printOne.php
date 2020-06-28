<html lang="pl">

<table style=" border: 2px solid black;" cellpadding="5">
    <tr>
        <td align="left">
            Numer faktury:</br>
            <B><?php echo $invoice->getId(); ?></B></br></br>
        </td>

        <td align="right">
            Data wystawienia: </br>
            <B><?php echo $invoice->getDate(); ?></B></br></br>
        </td>
    </tr>

    <tr>
        <td align="left">
            Sprzedający: </br>
            <B><?php echo $invoice->getSeller()->getName(); ?></B></br>
            <B><?php echo $invoice->getSeller()->getAddress(); ?></B></br>
            <B><?php echo $invoice->getSeller()->getNip(); ?></B></br></br>
        </td>

        <td align="right">
            Kupujący: </br>
            <B><?php echo $invoice->getCustomer()->getName(); ?></B></br>
            <B><?php echo $invoice->getCustomer()->getAddress(); ?></B></br>
            <B><?php echo $invoice->getCustomer()->getNip(); ?></B></br></br>
        </td>
    </tr>

    <tr>
        <td style="align-content: center">
            <table cellspacing="0">
                <tr>
                    <td style="border: 1px solid #333;" align="center"> LP </td>
                    <td style="border: 1px solid #333;" align="center">Usługa / towar</td>
                    <td style="border: 1px solid #333;" align="center">Ilość</td>
                    <td style="border: 1px solid #333;" align="center">Cena netto</br>za szt [zł/szt]</td>
                    <td style="border: 1px solid #333;" align="center">Stawka vat [%]</td>
                    <td style="border: 1px solid #333;" align="center">Cena brutto [zł]</td>
                </tr>

                <?php
                $count = count($invoice->getItems());
                for ($i = 0; $i < $count; $i++) {
                    $ordinal = $i + 1;
                    $itemName = $invoice->getItems()[$i]->getItemname();
                    $quantity = $invoice->getItems()[$i]->getQuantity();
                    $price = $invoice->getItems()[$i]->getPrice();
                    $vat = $invoice->getItems()[$i]->getVat();
                    $gross = round($price * $quantity + $quantity * ($price * $vat / 100.0),2);

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
                        <B><?php echo $invoice->getGrossSum(); ?> zł</B>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

    <tr>
        <td>
            </br>KWOTA DO ZAPŁATY = <B><?php echo $invoice->getGrossSum() ?> zł</B>
        </td>
    </tr>

</table>
</html>
