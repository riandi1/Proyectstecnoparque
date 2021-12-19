<?php

$name= $_POST['nombre'];
$last= $_POST['apellido'];

header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename= archivo.xls");

?>
<table>
    <tr>
        <th>nombre</th>
        <th>apellido</th>
    </tr>
    <tr>
        <td><?php echo$name?></td>
        <td><?php echo$last?></td>
    </tr>
</table>