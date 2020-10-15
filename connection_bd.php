
<?php
$db = new mysqli("localhost", "root", "", "pfe");
if ($db->connect_errno) {
    die("Erreur connection Base de données");
}
