<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Condición IVA</title>
</head>
<body>
    <h1>Editar Condición IVA</h1>
    <form action="" method="post">
        <label>Código: <input type="text" name="codigo" value="<?= $condicion['codigo'] ?>" required></label><br>
        <label>Condición IVA: <input type="text" name="condicion_iva" value="<?= $condicion['condicion_iva'] ?>" required></label><br>
        <label>Alicuota: <input type="text" name="alicuota" value="<?= $condicion['alicuota'] ?>" required></label><br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>
