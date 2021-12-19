<?php
$fecha = "2017-04-19";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <input type="date" value="<?php echo strftime('%Y-%m-%d',
  strtotime($fecha)); ?>">
</body>
</html>