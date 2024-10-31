<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios de api</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2 class="text-center mb-4">Lista de Usuarios</h2>
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Correo Electrónico</th>
                <th>Ciudad</th>
                <th>Empresa</th>
            </tr>
        </thead>
        <tbody id="user-table">

        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        $.ajax({
            url: '/apiEjemplo/public/api/users', // URL completa al endpoint
            method: 'GET',
            success: function(data) {
                console.log(data); // Verifica que los datos se impriman en consola
                let userTable = $('#user-table');
                userTable.empty(); // Limpia la tabla antes de agregar las filas

                data.forEach(user => {
                    userTable.append(`
                        <tr>
                            <td>${user.id}</td>
                            <td>${user.name}</td>
                            <td>${user.email}</td>
                            <td>${user.address.city}</td>
                            <td>${user.company.name}</td>
                        </tr>
                    `);
                });
            },
            error: function(xhr, status, error) {
                console.error("Error de API:", error); // Registra errores en consola
                alert('No se pudieron cargar los datos de la API');
            }
        });
    });
</script>
</body>
</html>