
<html>
<head>
    <style>
        table, td, tr {
            border: 2px solid black;

        }
    </style>
</head>

<h3>Wystaw nową fakturę</h3>

<form action="pages/finished.php" method="post">
    <table cellpadding="10px">
        <tr>
            <td>
                Numer faktury: <input type="text" name="id">
            </td>
            <td>
                Data: <input type="date" name="date"><br/>
            </td>
        </tr>

        <tr>
            <td>
                <h4>Sprzedający:</h4>
                Nazwa: <input type="text" name="sellername"><br/>
                Adres: <input type="text" name="selleraddress"><br/>
                NIP: <input type="text" name="sellernip"><br/><br/>
            </td>
            <td>
                <h4>Kupujący:</h4>
                Nazwa: <input type="text" name="customername"><br/>
                Adres: <input type="text" name="customeraddress"><br/>
                NIP: <input type="text" name="customernip"><br/><br/>
            </td>
        </tr>
        <tr>
            <td>
                <div id="items">
                    <h4>Zakupione usługi/przedmioty:</h4>

                    Nazwa: <input type="text" name="itemname[]"><br/>
                    Ilość: <input type="number" min="0" name="itemquantity[]"><br/>
                    Cena za szt: <input type="number" step="0.01" min="0" name="itemprice[]"><br/>
                    Stawka vat: <input type="number" min="0" name="itemvat[]"><br/>

                </div>
            </td>
            <td align="center">
                <button id='additem'>Dodaj usługę/przedmiot</button>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center">
                <input type="submit" value="Generuj fakturę">
            </td>
        </tr>
    </table>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function () {
        $("#additem").click(function (e) {
            e.preventDefault();
            $("#items").append("<h4>Zakupione usługi/przedmioty:</h4>");
            $("#items").append("Nazwa: <input type='text' name='itemname[]'><br/>");
            $("#items").append("Ilość: <input type='number' min='0' name='itemquantity[]'><br/>");
            $("#items").append("Cena za szt: <input type='number' step='0.01' min='0' name='itemprice[]'><br/>");
            $("#items").append("Stawka vat: <input type='number' min='0' name='itemvat[]'><br/>");
        });
    });
</script>

</html>
