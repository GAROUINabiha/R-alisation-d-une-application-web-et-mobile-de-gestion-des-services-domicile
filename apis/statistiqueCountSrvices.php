<?php
include 'config.inc.php';
$sql = 'SELECT s.idSer,s.nomSer, s.description, count(d.idSer) AS totalCount
FROM service s LEFT JOIN demande d ON (s.idSer=d.idSer)
GROUP BY s.idSer';
$stmt = $conn->prepare($sql);

$stmt->execute();
$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

echo json_encode($stmt->fetchAll());
