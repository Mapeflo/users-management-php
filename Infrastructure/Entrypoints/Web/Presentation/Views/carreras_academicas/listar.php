<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Carreras Académicas</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a { margin-right: 10px; }
        .btn { padding: 6px 12px; background: #007bff; color: white; text-decoration: none; border-radius: 4px; }
    </style>
</head>
<body>
    <h1>Carreras Académicas</h1>
    <p>
        <a class="btn" href="?controller=carrera&action=create">+ Nueva Carrera</a>
        <a href="?controller=user&action=index">Volver a Usuarios</a>
    </p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Créditos</th>
                <th>Semestres</th>
                <th>Nivel</th>
                <th>Universidad</th>
                <th>Acreditada</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($data)): ?>
                <tr><td colspan="8">No hay carreras registradas.</td></tr>
            <?php else: ?>
                <?php foreach ($data as $carrera): ?>
                    <tr>
                        <td><?= htmlspecialchars($carrera['id']) ?></td>
                        <td><?= htmlspecialchars($carrera['nombre']) ?></td>
                        <td><?= $carrera['numCreditos'] ?></td>
                        <td><?= $carrera['numSemestres'] ?></td>
                        <td><?= htmlspecialchars($carrera['nivelFormacion']) ?></td>
                        <td><?= htmlspecialchars($carrera['universidad']) ?></td>
                        <td><?= $carrera['esAcreditada'] ? 'Sí' : 'No' ?></td>
                        <td>
                            <a href="?controller=carrera&action=edit&id=<?= urlencode($carrera['id']) ?>">Editar</a>
                            <a href="?controller=carrera&action=delete&id=<?= urlencode($carrera['id']) ?>"
                               onclick="return confirm('¿Seguro que deseas eliminar esta carrera?')">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>