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
        $clientesModel = new ClientesModel();
        $data['clientes'] = $clientesModel->findAll();

        return view ('prototipo', $data);
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
      

    
            // Definir las reglas básicas
            $rules = [
                'nombre_contacto' => 'required',
                'correo_electronico' => 'required|valid_email|max_length[255]|',
                'nombre_empresa' => 'required',
                'estado_id' => 'required|is_not_unique[estados.id]',
                'logotipo' => 'required',//'uploaded[logotipo]|max_size[logotipo,1024]|is_image[logotipo]|mime_in[logotipo,image/jpg,image/jpeg,image/gif,image/png]',
                'descripcion_producto' => 'permit_empty',
                'fecha_registro' => 'permit_empty|valid_date',
            ];

            // Validar las reglas básicas
            if (!$this->validate($rules)) {
                return redirect()->back()->withInput()->with('error', $this->validator->listErrors()); //listErrors()) ??
            }

            //de vid
            $post = $this->request->getPost(['nombre_contacto', 'correo_electronico', 'nombre_empresa','estado_id', 'logotipo','descripcion_producto','fecha_registro']);
            
            $clientesModel = new ClientesModel();

            $clientesModel->insert([
                    'nombre_contacto' => trim($post['nombre_contacto']),
                    'correo_electronico' =>$post['correo_electronico'],
                    'nombre_empresa' => $post['nombre_empresa'],
                    'estado_id' => $post['estado_id'],
                    'logotipo' => $post['logotipo'],
                    'descripcion_producto' => $post['descripcion_producto'],
                    'fecha_registro' => $post['fecha_registro'],
            ]); 

            return redirect()->to('clientes');
            
            

            

            


            // Verificar la condición personalizada
            // $estadoId = $this->request->getPost('estado_id');
            // $descripcionProducto = $this->request->getPost('descripcion_producto');
            // $fechaRegistro = $this->request->getPost('fecha_registro');
            
            // Asumiendo que el ID de Ciudad de México es 1
            // if ($estadoId == 1) {
            //     $errors = [];
            //     if (empty($descripcionProducto)) {
            //         $errors['descripcion_producto'] = 'Descripción del producto es requerida para Ciudad de México.';
            //     }
            //     if (empty($fechaRegistro)) {
            //         $errors['fecha_registro'] = 'Fecha de registro es requerida para Ciudad de México.';
            //     }
            //     if (!empty($errors)) {
            //         return redirect()->back()->withInput()->with('errors', $errors);
            //     }
            // }

            // $file = $this->request->getFile('logotipo');
            // if ($file->isValid() && !$file->hasMoved()) {
            //     $newName = $file->getRandomName();
            //     $file->move(WRITEPATH . 'uploads', $newName);
            // } else {
            //     $newName = null;
            // }

            // $data = [
            //     'nombre_contacto' => $this->request->getPost('nombre_contacto'),
            //     'correo_electronico' => $this->request->getPost('correo_electronico'),
            //     'nombre_empresa' => $this->request->getPost('nombre_empresa'),
            //     'estado_id' => $estadoId,
            //     'logotipo' =>  $newName,
            //     'descripcion_producto' => $descripcionProducto,
            //     'fecha_registro' => $fechaRegistro,
            // ];

            // if ($clientesModel->insert($data)) {

            //     return redirect()->to('clientes')->with('success', 'Cliente creado exitosamente');
            // } else {

            //     return redirect()->back()->withInput()->with('error', 'Hubo un problema al crear el cliente');
            // }

            
            
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
        if($id == null){
            return redirect()->route('clientes');
        } 

        $clientesModel = new ClientesModel();
        $estadosModel = new EstadosModel();

        $data['estados']= $estadosModel->findAll();
        $data['cliente']= $clientesModel->find($id);

        return view('editar', $data);
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
        if (!$this->request->is('put') || $id == null) {
            return redirect()->back()->with('error', 'Invalid request method');
        }

       // Definir las reglas básicas
       $rules = [
        'nombre_contacto' => 'required',
        'correo_electronico' => 'required|valid_email|max_length[255]|',
        'nombre_empresa' => 'required',
        'estado_id' => 'required|is_not_unique[estados.id]',
        'logotipo' => 'permit_empty',//'uploaded[logotipo]|max_size[logotipo,1024]|is_image[logotipo]|mime_in[logotipo,image/jpg,image/jpeg,image/gif,image/png]',
        'descripcion_producto' => 'permit_empty',
        'fecha_registro' => 'valid_date','permit_empty',
    ];

    // Validar las reglas básicas
    if (!$this->validate($rules)) {
        return redirect()->back()->withInput()->with('error', $this->validator->listErrors()); //listErrors()) ??
    }

    //de vid
    $post = $this->request->getPost(['nombre_contacto', 'correo_electronico', 'nombre_empresa','estado_id', 'logotipo','descripcion_producto','fecha_registro']);

       // Manejar la carga del archivo logotipo
       $file = $this->request->getFile('logotipo');
       if ($file && $file->isValid() && !$file->hasMoved()) {
           $newName = $file->getRandomName();
           $file->move(WRITEPATH . 'uploads', $newName);
           $post['logotipo'] = $newName;
       } else {
           // Mantener el logotipo existente si no se ha subido uno nuevo
           $post['logotipo'] = $this->request->getPost('logotipo_actual');
       }
    
    $clientesModel = new ClientesModel();

    $clientesModel->update($id, [
            'nombre_contacto' => trim($post['nombre_contacto']),
            'correo_electronico' =>$post['correo_electronico'],
            'nombre_empresa' => $post['nombre_empresa'],
            'estado_id' => $post['estado_id'],
            'logotipo' => $post['logotipo'],
            'descripcion_producto' => $post['descripcion_producto'],
            'fecha_registro' => $post['fecha_registro'],
    ]); 

    return redirect()->to('clientes');
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
        if (!$this->request->is('delete') || $id == null) {
            return redirect()->route('clientes');
        }

        $clientesModel = new ClientesModel();
        $clientesModel->delete($id);

        return redirect()->to('clientes');
    }
}
