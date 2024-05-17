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

    <style>
        .hidden {
            display:none;
        }
    </style>
    
</head>
<body style="margin:30px;">

<!-- HEADER: MENU + HEROE SECTION -->
<header>

    

    <div class="heroe">

        

    </div>

</header>

<!-- CONTENT -->

    <h3 class="my-3">Agregar Cliente</h3>

    <?php if(session()->getFlashdata('error')!== null) { ?>
        <div class="alert alert-danger">
            <?= session()->getFlashdata('error'); ?> 
        </div>      
    <?php } ?>

    <form action="<?= base_url('clientes') ?>" class="row g-3" method="post" autocomplete="off">

                <div class="col-md-8">
                    <label for="nombre_contacto" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto" value="<?= set_value('nombre_contacto') ?>" required>
                </div>

                <div class="col-md-8">
                    <label for="correo_electronico" class="form-label">Correo electrónico</label>
                    <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" value="<?= set_value('correo_electronico') ?>" required>
                </div>
                <div class="col-md-8">
                    <label for="nombre_empresa" class="form-label">Nombre de Empresa</label>
                    <input type="text" class="form-control" id="nombre_empresa" name="nombre_empresa" value="<?= set_value('nombre_empresa') ?>" required>
                </div>

                <div class="col-md-8">
                    <label for="estado_id" class="form-label">Estado</label>
                    <select class="form-select" id="estado_id" name="estado_id">
                        <option value="">Seleccionar</option>
                        <?php foreach($estados as $estado): ?>
                            <option value="<?= $estado['id']; ?>"><?= $estado['nombre']; ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div> 

                <div class="col-md-8">
                    <label for="logotipo" class="form-label">Logotipo</label>
                    <input type="file" class="form-control" id="logotipo" name="logotipo">
                </div>

               

                <div class="col-md-8 hidden"  id="descripcion_producto_div">
                    <label for="descripcion_producto" class="form-label">Descripción del Producto</label>
                    <input type="text" class="form-control" id="descripcion_producto" name="descripcion_producto" value="<?= set_value('descripcion_producto') ?>">
                </div>

                <div class="col-md-8 hidden" id="fecha_registro_div">
                    <label for="fecha_registro hidden" class="form-label">Fecha registro</label>
                    <input type="date" class="form-control" id="fecha_registro" name="fecha_registro" value="<?= set_value('fecha_registro') ?>">
                </div>

                


                

                <div class="col-12">
                    <a href="<?= base_url('clientes');?>" class="btn btn-secondary">Regresar</a>
                    <button type="submit" class="btn btn-secondary">Guardar</button>
                </div>

    </form>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
    
    <script>
        $(document).ready(function() {
            $('#estado_id').on('change', function() {
                if ($(this).val() == 1) { // Asumiendo que el ID de Ciudad de México es 1
                    $('#descripcion_producto_div').removeClass('hidden');
                    $('#fecha_registro_div').removeClass('hidden');
                } else {
                    $('#descripcion_producto_div').addClass('hidden');
                    $('#fecha_registro_div').addClass('hidden');
                }
            });
        });
    </script>

</body>
</html>