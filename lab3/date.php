<?php
$day = date('N'); // 1 - понедельник, 7 - воскресенье

$john = "Нерабочий день";
$jane = "Нерабочий день";

if ($day == 1 || $day == 3 || $day == 5) {
    $john = "8:00 - 12:00";
}

if ($day == 2 || $day == 4 || $day == 6) {
    $jane = "12:00 - 16:00";
}
?>

<table border="1">
<tr>
    <th>№</th>
    <th>Фамилия Имя</th>
    <th>График работы</th>
</tr>
<tr>
    <td>1</td>
    <td>John Styles</td>
    <td><?php echo $john; ?></td>
</tr>
<tr>
    <td>2</td>
    <td>Jane Doe</td>
    <td><?php echo $jane; ?></td>
</tr>
</table>