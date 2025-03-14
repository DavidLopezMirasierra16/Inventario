<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('titulo')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
</head>
<body class="container">

    <header class="text-center">
        <nav class="row align-items-center">
            <img src="images/2.png" alt="" class="col-2">
            <a href={{route('index_productos')}} class="text-decoration-none col fs-5">Productos</a>
            <a href={{route('index_categorias')}} class="text-decoration-none col fs-5">Categorias</a>
            <a href={{route('index_proveedores')}} class="text-decoration-none col fs-5">Proveedores</a>
        </nav>
    </header>

    @yield('contenido')
</body>
</html>