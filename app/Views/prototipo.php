<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to CodeIgniter 4!</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

 <link href="css/estilo.css" rel="stylesheet">
    
</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
<header>

    

    <div class="heroe">

        <h1>Prueba prototipo </h1>

        

    </div>

</header>

<!-- CONTENT -->

<h3 class="my-3" id="titulo">Registros</h3>

<a href="<?= base_url ('clientes/new'); ?>" class="btn btn-success">Agregar</a>

<table class="table table-hover table-bordered my-3" aria-describedby="titulo">


                <thead class="table-dark">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Nombre empresa</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Logotipo</th>
                        <th scope="col">Descripcipon</th>
                        <th scope="col">Fecha de registro</th>
                    </tr>
                </thead>

                <tbody>
                 
                    <?php foreach($clientes as $cliente) : ?>
                        <tr>
                            <td><?= $cliente['nombre_contacto']; ?></td>
                            <td><?= $cliente['correo_electronico']; ?></td>
                            <td><?= $cliente['nombre_empresa']; ?></td>
                            <td><?= $cliente['estado_id']; ?></td>
                            <td><?= $cliente['logotipo']; ?></td>
                            <td><?= $cliente['descripcion_producto']; ?></td>
                            <td><?= $cliente['fecha_registro']; ?></td>
                            
                            <td>
                                <a href="<?= base_url('clientes/'.$cliente['id'].'/edit'); ?>" class="btn btn-light btn-sm me-2">Editar</a>

                                <button type="button" class="btn btn-light btn-sm" data-bs-toggle="modal"
                                data-bs-target="#eliminaModal" data-bs-url="<?= base_url('clientes/'.$cliente['id']); ?>">Eliminar</button>
                                
                            </td>    
                        </tr>
                
                     <?php endforeach; ?>


                

                </tbody>
</table>

            <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="eliminaModalLabel">Aviso</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>¿Desea eliminar este registro?</p>
                        </div>
                        <div class="modal-footer">
                            <form id="form-elimina" action="" method="post">
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-light">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
             </div>  

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <script>

        const eliminaModal = document.getElementById('eliminaModal')
        if (eliminaModal) {
            eliminaModal.addEventListener('show.bs.modal', event => {
                // Button that triggered the modal
                const button = event.relatedTarget;
                // Extract info from data-bs-* attributes
                const url = button.getAttribute('data-bs-url');

                // Update the modal's content.
                const form = eliminaModal.querySelector('#form-elimina');
                form.setAttribute('action', url);
            });
        }
    </script>
</body>
</html>