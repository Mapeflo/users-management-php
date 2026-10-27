<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($pageTitle ?? 'Editar Carrera Académica') ?></title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; max-width: 700px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 8px; margin-top: 4px; box-sizing: border-box; }
        button { margin-top: 20px; padding: 10px 20px; background: #007bff; color: white; border: none; cursor: pointer; }
        .error { color: red; margin-bottom: 15px; }
        .success { color: green; margin-bottom: 15px; }
    </style>
</head>
<body>
    <h1><?= htmlspecialchars($pageTitle ?? 'Editar Carrera Académica') ?></h1>

    <?php if (!empty($message)): ?>
        <div class="error"><?= htmlspecialchars($message) ?></div>
    <?php endif; ?>

    <form method="POST" action="?route=carreras.update">
        <input type="hidden" name="id" value="<?= htmlspecialchars($carrera['id'] ?? '') ?>">

        <label>Nombre</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($carrera['nombre'] ?? '') ?>" required>

        <label>Número de Créditos</label>
        <input type="number" name="num_creditos" min="1" value="<?= htmlspecialchars((string)($carrera['numCreditos'] ?? '')) ?>" required>

        <label>Número de Asignaturas</label>
        <input type="number" name="num_asignaturas" min="1" value="<?= htmlspecialchars((string)($carrera['numAsignaturas'] ?? '')) ?>" required>

        <label>Número de Semestres</label>
        <input type="number" name="num_semestres" min="1" value="<?= htmlspecialchars((string)($carrera['numSemestres'] ?? '')) ?>" required>

        <label>Nivel de Formación</label>
        <select name="nivel_formacion" required>
            <?php
            $niveles = ['TECNICO','TECNOLOGO','PROFESIONAL','ESPECIALIZACION','MAESTRIA','DOCTORADO'];
            $actual = $carrera['nivelFormacion'] ?? '';
            foreach ($niveles as $nivel) {
                $selected = ($nivel === $actual) ? 'selected' : '';
                echo "<option value=\"$nivel\" $selected>$nivel</option>";
            }
            ?>
        </select>

        <label>Título</label>
        <input type="text" name="titulo" value="<?= htmlspecialchars($carrera['titulo'] ?? '') ?>" required>

        <label>Valor del Semestre</label>
        <input type="number" name="valor_semestre" min="0" step="0.01" value="<?= htmlspecialchars((string)($carrera['valorSemestre'] ?? '')) ?>" required>

        <label>Universidad</label>
        <input type="text" name="universidad" value="<?= htmlspecialchars($carrera['universidad'] ?? '') ?>" required>

        <label>
            <input type="checkbox" name="es_acreditada" value="1" <?= !empty($carrera['esAcreditada']) ? 'checked' : '' ?>>
            Es Acreditada
        </label>

        <label>Perfiles</label>
        <textarea name="perfiles" rows="3"><?= htmlspecialchars($carrera['perfiles'] ?? '') ?></textarea>

        <label>Área de Conocimiento</label>
        <input type="text" name="area_conocimiento" value="<?= htmlspecialchars($carrera['areaConocimiento'] ?? '') ?>" required>

        <button type="submit">Actualizar Carrera</button>
        <a href="?route=carreras.index">Cancelar</a>
    </form>
</body>
</html>