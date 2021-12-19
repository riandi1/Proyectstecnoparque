<?php
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;

//ruta archivo excel
$ruta="test.xlsx";

//especificar extensiónn 
$reader = \PhpOffice\PhpSpreadsheet\IOFactory::createReader('Xlsx');

$spreadSheet = $reader->load($ruta);

//Especificar la hoja que se trabajara

$sheet = $spreadSheet->getActiveSheet(5);

echo '<table border="1" cellpading="8" style="margin-left:250px;">';
foreach ($sheet->getRowIterator() as $row) {
    $cellIterator = $row->getCellIterator();
    $cellIterator->setIterateOnlyExistingCells(false);
    echo '<tr>';
    foreach ($cellIterator as $cell) {
        if (!is_null($cell)) {
            $value = $cell->getCalculatedValue();
            echo '<td>'. $value . '</td>';
        }
    }
    echo '<tr>';
}
echo '</table>';

?>