<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link href="<?= base_url('css/estilo.css'); ?>" rel="stylesheet">
    
</head>
<body style="margin:30px;">

<!-- HEADER: MENU + HEROE SECTION -->
<header>

    

    <div class="heroe">

        

    </div>

</header>

<!-- CONTENT -->

    <h3 class="my-3">Modificar Cliente </h3>

    <?php if(session()->getFlashdata('error')!== null) { ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?> 
        </div>      
    <?php } ?>

    <form action="<?= base_url('clientes/'.$cliente['id']); ?>" class="row g-3" method="post" enctype="multipart/form-data" autocomplete="off">

                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="cliente_id" value="<?=$cliente['id']; ?>">  

                <div class="col-md-8">
                    <label for="nombre_contacto" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" value="<?= $cliente['nombre_contacto']; ?>" required>
                </div>

                <div class="col-md-8">
                    <label for="correo_electronico" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" value="<?= $cliente['correo_electronico']; ?>" required>
                </div>
                <div class="col-md-8">
                    <label for="nombre_empresa" class="form-label">Nombre de Empresa</label>
                    <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" value="<?= $cliente['nombre_empresa']; ?>" required>
                </div>

                <div class="col-md-8">
                    <label for="estado_id" class="form-label">Estado</label>
                    <select class="form-select" id="estado_id" name="estado_id">
                        <option value="">Seleccionar</option>
                        <?php foreach($estados as $estado): ?>
                            <option value="<?= $estado['id']; ?>" <?php echo($estado['id'] == $cliente['estado_id']) ? 'selected': ''; ?> ><?= $estado['nombre']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div> 

                <div class="col-md-8">
                    <label for="logotipo" class="form-label">Logotipo</label>
                    <?php if (!empty($cliente['logotipo'])): ?>
                        <div class="mb-2">
                            <img src="<?= base_url('uploads/'.$cliente['logotipo']); ?>" alt="Logotipo" style="max-width: 200px;">
                        </div>
                    <?php endif; ?>
                    <input type="file" class="form-control" id="logotipo" name="logotipo">
                </div>

               

                <div class="col-md-8">
                    <label for="descripcion_producto" class="form-label">Descripción del Producto</label>
                    <input type="text" class="form-control" id="descripcion_producto" name="descripcion_producto" value="<?= $cliente['descripcion_producto']; ?>">
                </div>

                <div class="col-md-8">
                    <label for="fecha_registro" class="form-label">Fecha registro</label>
                    <input type="date" class="form-control" id="fecha_registro" name="fecha_registro" value="<?= $cliente['fecha_registro']; ?>">
                </div>

                


                

                <div class="col-12">
                    <a href="<?= base_url('clientes');?>" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-secondary">Guardar</button>
                </div>

    </form>


</body>
</html>