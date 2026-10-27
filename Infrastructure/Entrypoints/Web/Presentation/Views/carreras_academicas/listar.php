<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($pageTitle ?? 'Carreras Académicas') ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        table { border-collapse: collapse; width: 100%; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        a { margin-right: 10px; text-decoration: none; }
        .btn { padding: 6px 12px; background: #007bff; color: white; border-radius: 4px; }
        .success { color: green; margin-bottom: 15px; }
        .error { color: red; margin-bottom: 15px; }
    </style>
</head>
<body>
    <h1><?= htmlspecialchars($pageTitle ?? 'Carreras Académicas') ?></h1>

    <?php if (!empty($success)): ?>
        <div class="success"><?= htmlspecialchars($success) ?></div>
    <?php endif; ?>

    <?php if (!empty($message)): ?>
        <div class="error"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <p>
        <a class="btn" href="?route=carreras.create">+ Nueva Carrera</a>
        <a href="?route=home">Volver al Menú</a>
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
            <?php if (empty($carreras)): ?>
                <tr>
                    <td colspan="8">No hay carreras registradas.</td>
                </tr>
            <?php else: ?>
                <?php foreach ($carreras as $carrera): ?>
                    <tr>
                        <td><?= htmlspecialchars($carrera['id'] ?? '') ?></td>
                        <td><?= htmlspecialchars($carrera['nombre'] ?? '') ?></td>
                        <td><?= htmlspecialchars((string)($carrera['numCreditos'] ?? '')) ?></td>
                        <td><?= htmlspecialchars((string)($carrera['numSemestres'] ?? '')) ?></td>
                        <td><?= htmlspecialchars($carrera['nivelFormacion'] ?? '') ?></td>
                        <td><?= htmlspecialchars($carrera['universidad'] ?? '') ?></td>
                        <td><?= !empty($carrera['esAcreditada']) ? 'Sí' : 'No' ?></td>
                        <td>
                            <a href="?route=carreras.edit&id=<?= urlencode($carrera['id'] ?? '') ?>">Editar</a>
                            |
                            <form method="POST" action="?route=carreras.delete" style="display:inline;" onsubmit="return confirm('¿Seguro que deseas eliminar esta carrera?');">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($carrera['id'] ?? '') ?>">
                                <button type="submit" style="background:none; border:none; color:red; cursor:pointer; padding:0;">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>