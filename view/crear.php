<form class="form" id="crear">
    <h2>Crear Pregunta</h2>
    <label>
        <textarea placeholder="Pregunta" class="select" name="pregunta" id="pregunta" cols="40" rows="20" required></textarea>
    </label>

    <label>
        <input class="select" type="text" name="opcion1" id="opcion1" placeholder="Opcion 1" required>
    </label>

    <label>
        <input class="select" type="text" name="opcion2" id="opcion2" placeholder="Opcion 2" required>
    </label>

    <label>
        <input class="select" type="text" name="opcion3" id="opcion3" placeholder="Opcion 3">
    </label>

    <label>
        <input class="select" type="text" name="opcion4" id="opcion4" placeholder="Opcion 4">
    </label>

    <label>
        <input class="select" type="text" name="opcion5" id="opcion5" placeholder="Opcion 5">
    </label>

    <label>
        <input class="select" type="number" name="respuesta" id="respuesta" title="solo mumero" placeholder="Respuesta correcta" required>
    </label>
    <label>
        <select class="select" name="campaña" id="campaña" required>
            <option value="">---Campaña---</option>
            <option value="Hogar">Hogar</option>
            <option value="Movil">Movil</option>
        </select>
    </label>
    <button type="submit" class="btn">Enviar</button>
</form>
<script src="../js/script.js"></script>