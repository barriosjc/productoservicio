<h1>Listado de Productos/Servicios</h1>

<a href="/productoservicio/create">Crear Nuevo producto/servicio</a>

<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th>
            <th>Rubro</th>
            <th>Tipo</th>
            <th>Unidad de Medida</th>
            <th>Código</th>
            <th>Producto/Servicio</th>
            <th>Condición IVA</th>
            <th>Precio Bruto Unitario</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?= $producto['id_producto_servicio'] ?></td>
                <td><?= $producto['rubro'] ?></td>
                <td><?= $producto['tipo'] == 'P' ? 'Producto' : 'Servicio' ?></td>
                <td><?= $producto['unidad_medida'] ?></td>
                <td><?= $producto['codigo'] ?></td>
                <td><?= $producto['producto_servicio'] ?></td>
                <td><?= $producto['condicion_iva'] ?></td>
                <td><?= number_format($producto['precio_bruto_unitario'], 2) ?></td>
                <td>
                    <a href="/productoservicio/edit/<?= $producto['id_producto_servicio'] ?>">Editar</a>
                    <a href="/productoservicio/delete/<?= $producto['id_producto_servicio'] ?>" onclick="return confirm('¿Estás seguro de eliminar este producto/servicio?')">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
