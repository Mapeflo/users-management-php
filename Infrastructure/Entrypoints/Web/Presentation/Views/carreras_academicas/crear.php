<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Carrera Académica</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; max-width: 700px; }
        label { display: block; margin-top: 12px; font-weight: bold; }
        input, select, textarea { width: 100%; padding: 8px; margin-top: 4px; }
        button { margin-top: 20px; padding: 10px 20px; background: #28a745; color: white; border: none; cursor: pointer; }
        .error { color: red; margin-bottom: 15px; }
    </style>
</head>
<body>
    <h1>Nueva Carrera Académica</h1>

    <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <form method="POST" action="?route=carreras.store">
        <label>Nombre</label>
        <input type="text" name="nombre" required>

        <label>Número de Créditos</label>
        <input type="number" name="num_creditos" min="1" required>

        <label>Número de Asignaturas</label>
        <input type="number" name="num_asignaturas" min="1" required>

        <label>Número de Semestres</label>
        <input type="number" name="num_semestres" min="1" required>

        <label>Nivel de Formación</label>
        <select name="nivel_formacion" required>
            <option value="">Seleccione...</option>
            <option value="TECNICO">Técnico</option>
            <option value="TECNOLOGO">Tecnólogo</option>
            <option value="PROFESIONAL">Profesional</option>
            <option value="ESPECIALIZACION">Especialización</option>
            <option value="MAESTRIA">Maestría</option>
            <option value="DOCTORADO">Doctorado</option>
        </select>

        <label>Título</label>
        <input type="text" name="titulo" required>

        <label>Valor del Semestre</label>
        <input type="number" name="valor_semestre" min="0" step="0.01" required>

        <label>Universidad</label>
        <input type="text" name="universidad" required>

        <label>
            <input type="checkbox" name="es_acreditada" value="1"> Es Acreditada
        </label>

        <label>Perfiles</label>
        <textarea name="perfiles" rows="3"></textarea>

        <label>Área de Conocimiento</label>
        <input type="text" name="area_conocimiento" required>

        <button type="submit">Guardar Carrera</button>
        <a href="?controller=carrera&action=index">Cancelar</a>
    </form>
</body>
</html>