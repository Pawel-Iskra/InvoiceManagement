<html lang="pl">
<head>
    <title>FAKTUROMAT</title>
    <meta charset="utf-8">
</head>

<body>
<div class="header">
    <h3>Menu główne:</h3>
</div>

<div class="menu">
    <ul>
        <li>
            <a href="/">Powrót do strony głównej</a>
        </li>
        <li>
            <a href="/?v=create">Wystaw nową fakturę</a>
        </li>
        <li>
            <a href="/?v=show">Pokaż faktury w rejestrze</a>
        </li>
        <li>
            <a href="/?v=remove">Usuwanie faktur z rejestru</a>
        </li>
    </ul>
</div>
<hr>
<div class="page">

    <?php
    if (!empty($_GET['v'])) {
        include_once("pages/$page.php");
    }
    ?>
</div>

<div class="footer" align="center">
    <hr>
    Fakturomat - 2020 </br>
    Paweł Iskra
</div>
</body>
</html>