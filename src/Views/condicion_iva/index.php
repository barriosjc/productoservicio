<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Condiciones IVA</title>
</head>
<body>
    <h1>Condiciones IVA</h1>
    <a href="/condicion_iva/create">Crear Nueva Condición IVA</a>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Código</th>
                <th>Condición IVA</th>
                <th>Alicuota</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($condiciones as $condicion): ?>
                <tr>
                    <td><?= $condicion['id_condicion_iva'] ?></td>
                    <td><?= $condicion['codigo'] ?></td>
                    <td><?= $condicion['condicion_iva'] ?></td>
                    <td><?= $condicion['alicuota'] ?></td>
                    <td>
                        <a href="/condicion_iva/edit/<?= $condicion['id_condicion_iva'] ?>">Editar</a>
                        <a href="/condicion_iva/delete/<?= $condicion['id_condicion_iva'] ?>">Eliminar</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
