<?php

namespace src\Services;

use src\Models\ProductoServicio;
use src\Models\Rubro;

class ProductoServicioValidator
{
    /**
     * Sanitiza una entrada eliminando espacios en blanco y convirtiendo caracteres especiales a sus entidades HTML.
     *
     * @param string $input Entrada a sanitizar.
     * @return string Entrada sanitizada.
     */
    public function sanitizeInput($input)
    {
        return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
    }

    /**
     * Valida los datos de un producto o servicio según las reglas definidas.
     *
     * @param array $data Datos del producto o servicio a validar.
     * @param ProductoServicio $productoServicio Instancia del modelo ProductoServicio para realizar consultas.
     * @return array Arreglo de errores si existen validaciones que no se cumplen.
     */
    public function validate($data, $productoServicio)
    {
        $errors = [];

        // Validación del rubro
        if (empty($data['id_rubro'])) {
            $errors['id_rubro'] = 'El rubro es obligatorio.';
        } else {
            // Validación de la existencia del rubro
            $rubro = new Rubro;
            if (empty($rubro->getById($data['id_rubro']))) {
                $errors['rubro'] = 'El rubro ingresado no existe.';
            }
        }

        // Validación del nombre del producto/servicio
        if (empty($data['producto_servicio'])) {
            $errors['producto_servicio'] = 'El nombre del producto/servicio es obligatorio.';
        } else {
            if (strlen($data['producto_servicio']) > 255) {
                $errors['producto_servicio'] = 'El producto/servicio ingresado debe tener una longitud máxima de 255 caracteres.';
            }
        }

        // Validación del precio
        if (!is_numeric($data['precio_bruto_unitario']) || $data['precio_bruto_unitario'] <= 0) {
            $errors['precio_bruto_unitario'] = 'El precio debe ser un número positivo.';
        }

        // Validación del código
        if (empty(trim($data['codigo']))) {
            $errors['codigo'] = 'El ingreso del código es obligatorio.';
        } else {
            if (!ctype_alnum($data['codigo'])) {
                $errors['codigo'] = 'El código solo permite ingresar números y letras.';
            }
            if (strlen($data['codigo']) > 20) {
                $errors['codigo'] = 'El código debe tener una longitud máxima de 20 caracteres.';
            }
        }

        // Verificación de la unicidad del código
        $prodServ = $productoServicio->getByFilter(['codigo' => $data['codigo']]);

        // Validación para nuevo registro
        if (empty($data['id_producto_servicio'])) {
            if (!empty($prodServ)) {
                $errors['codigo'] = 'El código ingresado ya fue asignado a otro producto o servicio existente.';
            }
        } else {
            // Validación para la modificación del registro
            if (!empty($prodServ['id_producto_servicio'])) {
                if ($prodServ['id_producto_servicio'] != $data['id_producto_servicio']) {
                    $errors['codigo'] = 'El código ingresado ya fue asignado a otro producto o servicio existente.';
                }
            }
        }

        return $errors;
    }
}
