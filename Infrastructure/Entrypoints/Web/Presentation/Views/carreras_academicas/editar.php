<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Carrera Académica</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; max-width: 700px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 8px; margin-top: 4px; }
        button { margin-top: 20px; padding: 10px 20px; background: #007bff; color: white; border: none; cursor: pointer; }
        .error { color: red; margin-bottom: 15px; }
    </style>
</head>
<body>
    <h1>Editar Carrera Académica</h1>

    <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="?route=carreras.update">
        <input type="hidden" name="id" value="<?= htmlspecialchars($data['id'] ?? '') ?>">

        <label>Nombre</label>
        <input type="text" name="nombre" value="<?= htmlspecialchars($data['nombre'] ?? '') ?>" required>

        <label>Número de Créditos</label>
        <input type="number" name="num_creditos" min="1" value="<?= $data['numCreditos'] ?? '' ?>" required>

        <label>Número de Asignaturas</label>
        <input type="number" name="num_asignaturas" min="1" value="<?= $data['numAsignaturas'] ?? '' ?>" required>

        <label>Número de Semestres</label>
        <input type="number" name="num_semestres" min="1" value="<?= $data['numSemestres'] ?? '' ?>" required>

        <label>Nivel de Formación</label>
        <select name="nivel_formacion" required>
            <?php
            $niveles = ['TECNICO','TECNOLOGO','PROFESIONAL','ESPECIALIZACION','MAESTRIA','DOCTORADO'];
            $actual = $data['nivelFormacion'] ?? '';
            foreach ($niveles as $nivel) {
                $selected = ($nivel === $actual) ? 'selected' : '';
                echo "<option value=\"$nivel\" $selected>$nivel</option>";
            }
            ?>
        </select>

        <label>Título</label>
        <input type="text" name="titulo" value="<?= htmlspecialchars($data['titulo'] ?? '') ?>" required>

        <label>Valor del Semestre</label>
        <input type="number" name="valor_semestre" min="0" step="0.01" value="<?= $data['valorSemestre'] ?? '' ?>" required>

        <label>Universidad</label>
        <input type="text" name="universidad" value="<?= htmlspecialchars($data['universidad'] ?? '') ?>" required>

        <label>
            <input type="checkbox" name="es_acreditada" value="1" <?= !empty($data['esAcreditada']) ? 'checked' : '' ?>>
            Es Acreditada
        </label>

        <label>Perfiles</label>
        <textarea name="perfiles" rows="3"><?= htmlspecialchars($data['perfiles'] ?? '') ?></textarea>

        <label>Área de Conocimiento</label>
        <input type="text" name="area_conocimiento" value="<?= htmlspecialchars($data['areaConocimiento'] ?? '') ?>" required>

        <button type="submit">Actualizar Carrera</button>
        <a href="?controller=carrera&action=index">Cancelar</a>
    </form>
</body>
</html>