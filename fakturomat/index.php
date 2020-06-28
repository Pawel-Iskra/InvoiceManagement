<?php
declare(strict_types=1);

use App\View;

include_once("src/view.php");
$page = !empty($_GET) ? $_GET['v'] : 'create';
($view = new View())->render($page);
