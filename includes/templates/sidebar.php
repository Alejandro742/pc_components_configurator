<div class="sidebar">
    <h2>Agregar PC</h2>
    <form action="#" id="form_pc">
        <div class="input-group">
            <label for="pc_name">Nombre</label>
            <input type="text" for="pc_name" id="pc_name" placeholder="Nombre PC">
        </div>
        <div class="input-group">
            <label for="pc_desc">Descripción</label>
            <textarea name="pc_desc" id="pc_desc"></textarea>
        </div>
        <input type="submit" class="btn btn-primary btn-block" value="Agregar PC">
    </form>
    <?php include "./includes/layouts/computers_list.php"?>
</div>