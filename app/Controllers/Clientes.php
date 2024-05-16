<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\EstadosModel;
use App\Models\ClientesModel;


class Clientes extends BaseController
{
    protected $helpers = ['form'];
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    public function index():string
    {
        return view ('prototipo');
    }

    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        $estadosModel = new EstadosModel();
        $data['estados']= $estadosModel->findAll(); 
        return view('nuevo', $data);
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        $clientesModel = new ClientesModel();

        if ($this->request->getMethod() === 'post') {
            // Definir las reglas básicas
            $rules = [
                'nombre_contacto' => 'required|max_length[255]',
                'correo_electronico' => 'required|valid_email|max_length[255]|is_unique[clientes.correo_electronico]',
                'nombre_empresa' => 'required|max_length[255]|is_unique[clientes.nombre_empresa]',
                'estado_id' => 'required|integer',
                'logotipo' => 'uploaded[logotipo]|max_size[logotipo,1024]|is_image[logotipo]|mime_in[logotipo,image/jpg,image/jpeg,image/gif,image/png]',
                'descripcion_producto' => 'permit_empty',
                'fecha_registro' => 'permit_empty|valid_date',
            ];

            // Validar las reglas básicas
            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
            }

            // Verificar la condición personalizada
            $estadoId = $this->request->getPost('estado_id');
            $descripcionProducto = $this->request->getPost('descripcion_producto');
            $fechaRegistro = $this->request->getPost('fecha_registro');
            
            // Asumiendo que el ID de Ciudad de México es 1
            if ($estadoId == 1) {
                $errors = [];
                if (empty($descripcionProducto)) {
                    $errors['descripcion_producto'] = 'Descripción del producto es requerida para Ciudad de México.';
                }
                if (empty($fechaRegistro)) {
                    $errors['fecha_registro'] = 'Fecha de registro es requerida para Ciudad de México.';
                }
                if (!empty($errors)) {
                    return redirect()->back()->withInput()->with('errors', $errors);
                }
            }

            $file = $this->request->getFile('logotipo');
            if ($file->isValid() && !$file->hasMoved()) {
                $newName = $file->getRandomName();
                $file->move(WRITEPATH . 'uploads', $newName);
            }

            $data = [
                'nombre_contacto' => $this->request->getPost('nombre_contacto'),
                'correo_electronico' => $this->request->getPost('correo_electronico'),
                'nombre_empresa' => $this->request->getPost('nombre_empresa'),
                'estado_id' => $estadoId,
                'logotipo' => isset($newName) ? $newName : null,
                'descripcion_producto' => $descripcionProducto,
                'fecha_registro' => $fechaRegistro,
            ];

            if ($clientesModel->insert($data)) {

                return redirect()->to('clientes')->with('success', 'Cliente creado exitosamente');
            } else {

                return redirect()->back()->withInput()->with('error', 'Hubo un problema al crear el cliente');
            }

            
        }

        //return view('clientes');
    }


    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
