<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/_admin/modules/Aws_S3.php';
?>
<?php
$jsonFilePath = $_SERVER['DOCUMENT_ROOT'] . '/es/assets/data/bingo.json';

$jsonData = file_get_contents($jsonFilePath);
$affirmations = json_decode($jsonData, true);

$today = date('j');

$arrayLength = count($affirmations);
$startIndex = ($today - 1) % $arrayLength;
$selectionCount = 16;


$goodTxt = [];;
for ($i = 0; $i < $selectionCount; $i++) {
  $index = ($startIndex + $i) % $arrayLength;
  $goodTxt[] = $affirmations[$index];
}

?>