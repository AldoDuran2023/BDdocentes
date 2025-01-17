<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud Facultad</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">
        <h1>Las facultades</h1>

        <form action="" id="formulario">
            <input type="text" id="facultad" name="facultad" required class="form-control">
            <input type="submit" class="btn btn-primary mt-2" value="Guardar">
        </form>

        <table class="table table-border">
            <thead>
                <th>id</th>
                <th>facultad</th>
                <th>acciones</th>
            </thead>
            <tbody id="tablaFac">
            </tbody>
        </table>
    </div>

    <script src="public/js/jquery-3.7.1.min.js"></script>
    <script src="public/js/scripts.js"></script>
</body>
</html>