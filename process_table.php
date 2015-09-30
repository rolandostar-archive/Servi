<?php
require('simple_html_dom.php');
$html = file_get_html('t.html');

$table = $html->find('table[id=ctl00_mainCopy_dbgHorarios]', 0);
$rowData = array();

foreach(array_slice($table->find('tr'),1) as $row) {
    // initialize array to store the cell data from each row
    $flight = array();
    foreach($row->find('td') as $cell) {
        // push the cell's text to the array
        $flight[] = $cell->plaintext;
    }
    $rowData[] = $flight;
}

/*echo '<table>';
foreach ($rowData as $row => $tr) {
    echo '<tr>'; 
    foreach ($tr as $td)
        echo '<td>' . $td .'</td>';
    echo '</tr>';
}
echo '</table>';*/

echo '<pre>';
print_r($rowData);
echo '</pre>';



?>