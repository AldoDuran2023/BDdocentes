<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Facultades</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Gestión de Facultades</h1>

        <form id="formulario" class="mb-4">
            <div class="mb-3">
                <label for="facultad" class="form-label">Nombre de la Facultad</label>
                <input type="text" class="form-control" id="facultad" name="facultad" required>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Facultad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tablaFac">
            </tbody>
        </table>
    </div>

    <script src="public/js/jquery-3.7.1.min.js"></script>
    <script src="public/js/scripts.js"></script>
</body>
</html>