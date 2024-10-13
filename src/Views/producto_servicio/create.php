<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear producto/servicio</title>
</head>

<body>
    <div class="container mt-5">
        <h1 class="mb-4"> <?= $titulo ?> producto/servicio</h1>
        <form method="POST">
        <?= "El id de producto: ". $producto['id_producto_servicio'] ?>
            <input type="hidden" name="id_producto_servicio" value="<?= $producto['id_producto_servicio'] ?>">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="id_rubro">Rubro:</label>
                        <select class="form-control" id="id_rubro" name="id_rubro">
                            <option value="">--Seleccione--</option>
                            <?php foreach ($rubros as $rubro) : ?>
                                <option value="<?= $rubro['id_rubro'] ?>" <?= $producto['id_rubro'] == $rubro['id_rubro'] ? 'selected' : '' ?>>
                                <?= $rubro['rubro'] ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="tipo">Tipo:</label>
                        <select class="form-control" id="tipo" name="tipo">
                            <option value="">--Seleccione--</option>
                            <option value="P" <?= $producto['tipo'] == "P" ? 'selected' : '' ?>>Producto</option>
                            <option value="S" <?= $producto['tipo'] == "S" ? 'selected' : '' ?>>Servicio</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="id_unidad_medida">Unidad de Medida:</label>
                        <select class="form-control" id="id_unidad_medida" name="id_unidad_medida">
                            <option value="">--Seleccione--</option>
                            <?php foreach ($unidades as $unidad) : ?>
                                <option value="<?= $unidad['id_unidad_medida'] ?>" <?= $producto['id_unidad_medida'] == $unidad['id_unidad_medida'] ? 'selected' : '' ?>>
                                <?= $unidad['unidad_medida'] ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="codigo">Código:</label>
                        <input type="text" class="form-control" id="codigo" name="codigo"  value="<?= $producto['codigo'] ?>"required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="producto_servicio">Producto/Servicio:</label>
                        <input type="text" class="form-control" id="producto_servicio" name="producto_servicio" 
                                value="<?= $producto['producto_servicio'] ?>" required>
                    </div>

                    <div class="form-group">
                        <label for="id_condicion_iva">Condición IVA:</label>
                        <select class="form-control" id="id_condicion_iva" name="id_condicion_iva">
                            <option value="">--Seleccione--</option>
                            <?php foreach ($condiciones as $condicion) : ?>
                                <option value="<?= $condicion['id_condicion_iva'] ?>" <?= $producto['id_condicion_iva'] == $condicion['id_condicion_iva'] ? 'selected' : '' ?>>
                                <?= $condicion['condicion_iva'] ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="precio_bruto_unitario">Precio Bruto Unitario:</label>
                        <input type="number" step="0.01" class="form-control" id="precio_bruto_unitario" name="precio_bruto_unitario" 
                                value="<?= $producto['precio_bruto_unitario'] ?>" required>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

</body>

</html>