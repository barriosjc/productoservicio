<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listados</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4"> Listados</h1>
        <form method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tipo">Listado:</label>
                        <select class="form-control" id="tipo" name="tipo">
                            <option value="">--Seleccione--</option>
                            <option value="DIA" <?= $tipo == 'DIA' ? 'selected' : '' ?> >Dia</option>
                            <option value="SEM" <?= $tipo == 'SEM' ? 'selected' : '' ?> >Semana</option>
                            <option value="MES" <?= $tipo == 'MES' ? 'selected' : '' ?> >Mes</option>
                            <option value="ANO" <?= $tipo == 'ANO' ? 'selected' : '' ?> >Año</option>
                        </select>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Generar</button>
        </form>
</br>
        <table border="1" cellpadding="10" cellspacing="0">
            <thead>
                <tr>
                    <th>Periodo</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listado as $item): ?>
                    <tr>
                        <td><?= $item['periodo'] ?></td>
                        <td><?= $item['cantidad'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>