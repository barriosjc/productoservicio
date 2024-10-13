<?php

namespace src\Controllers;

require_once __DIR__ . "/../Interfaces/ProductoServicioInterface.php";
require_once __DIR__ . "/../Services/ProductoServicioValidator.php";
require_once __DIR__ . "/../Models/CondicionIva.php";
require_once __DIR__ . "/../Models/Rubro.php";
require_once __DIR__ . "/../Models/UnidadMedida.php";

use src\Interfaces\ProductoServicioInterface;
use src\Models\CondicionIva;
use src\Models\Rubro;
use src\Models\UnidadMedida;
use src\Services\ProductoServicioValidator;

/**
 * Controlador para gestionar productos y servicios.
 */
class ProductoServicioController
{
    private $model;
    private $validator;

    /**
     * Constructor.
     *
     * @param ProductoServicioInterface $model Modelo de ProductoServicio.
     * @param ProductoServicioValidator $validator Servicio de validación de ProductoServicio.
     */
    public function __construct(ProductoServicioInterface $model, ProductoServicioValidator $validator)
    {
        $this->model = $model;
        $this->validator = $validator;
    }

    /**
     * Muestra la lista de productos y servicios.
     */
    public function index()
    {
        $productos = $this->model->getAll();
        $this->render('producto_servicio/index', ['productos' => $productos]);
    }

    /**
     * Crea un nuevo producto o servicio.
     */
    public function create()
    {
        $data = $this->getFormData();
        $data['titulo'] = "Crear";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data['inputs'] = $this->sanitizeInputs($_POST);
            $errors = $this->validator->validate($data['inputs'], $this->model);

            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo $error . "<br>";
                }
                $data['producto'] = $data['inputs'];
            } else {
                $this->model->create($data['inputs']);
                $this->redirect('/productoservicio');
            }
        }

        $this->render('producto_servicio/create', $data);
    }

    /**
     * Edita un producto o servicio existente.
     *
     * @param int $id ID del producto o servicio a editar.
     */
    public function edit($id)
    {
        $data = $this->getFormData($id);
        $data['titulo'] = "Modificar";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data['inputs'] = $this->sanitizeInputs($_POST);
            $errors = $this->validator->validate($data['inputs'], $this->model);

            if (!empty($errors)) {
                foreach ($errors as $error) {
                    echo $error . "<br>";
                }
                $data['producto'] = $data['inputs'];
            } else {
                $this->model->update($id, $data['inputs']);
                $this->redirect('/productoservicio');
            }
        }

        $this->render('producto_servicio/create', $data);
    }

    /**
     * Elimina un producto o servicio.
     *
     * @param int $id ID del producto o servicio a eliminar.
     */
    public function delete($id)
    {
        $this->model->delete($id);
        $this->redirect('/productoservicio');
    }

    /**
     * Muestra el listado de productos y servicios por tipo de período.
     */
    public function listados()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $this->sanitizeInputs($_POST);

            if (!empty($data)) {
                $listado = $this->model->listado($data['tipo']);
                $this->render('producto_servicio/listados', ['listado' => $listado, 'tipo' => $data['tipo']]);
            } else {
                $this->redirect('/listados');
            }
        } else {
            $this->render('producto_servicio/listados');
        }
    }

    /**
     * Obtiene los datos del formulario para crear o editar un producto/servicio.
     *
     * @param int|null $id ID del producto o servicio (opcional).
     * @return array Datos del formulario, incluyendo rubros, unidades, condiciones y producto/servicio.
     */
    private function getFormData($id = null)
    {
        return [
            'rubros' => (new Rubro)->getAll(),
            'unidades' => (new UnidadMedida)->getAll(),
            'condiciones' => (new CondicionIva)->getAll(),
            'producto' => $id ? $this->model->getById($id) : $this->model->getEmpty(),
        ];
    }

    /**
     * Sanitiza las entradas del formulario.
     *
     * @param array $inputs Entradas del formulario.
     * @return array Entradas sanitizadas.
     */
    private function sanitizeInputs($inputs)
    {
        return array_map([$this->validator, 'sanitizeInput'], $inputs);
    }

    /**
     * Renderiza una vista con los datos proporcionados.
     *
     * @param string $view Nombre de la vista a renderizar.
     * @param array $data Datos a pasar a la vista.
     */
    private function render($view, $data = [])
    {
        extract($data);
        include __DIR__ . '/../Views/' . $view . '.php';
    }

    /**
     * Redirecciona a una URL específica.
     *
     * @param string $url URL de destino.
     */
    private function redirect($url)
    {
        header('Location: ' . $url);
        exit;
    }
}
