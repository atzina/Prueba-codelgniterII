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
                    <tr>
                        <td>Juan Perez</td>
                        <td>juan@gmail.com</td>
                        <td>Correos de México</td>
                        <td>CDMX</td>
                        <td>RECURSOS HUMANOS</td>
                        <td>Descripcion</td>
                        <td>10/12/2024</td>
                        <td>
                            <a href="edita.html" class="btn btn-warning btn-sm me-2">Editar</a>

                            <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#eliminaModal" data-bs-id="1">Eliminar</button>
                        </td>
                    </tr>

                </tbody>
            </table>


</body>
</html>