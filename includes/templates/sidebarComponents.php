<div class="sidebar">
    <h2>Agregar Componente</h2>
    <form action="#" id="components_form">
        <div class="input-group">
            <label for="component_name">Nombre</label>
            <input type="text" for="component_name" id="component_name" placeholder="Nombre Componente">
        </div>
        <div class="input-group">
            <label for="component_desc">Descripción</label>
            <textarea name="component_desc" id="component_desc"></textarea>
        </div>
        <div class="input-group">
            <label for="component_price">Precio</label>
            <input type="number" name="component_price" id="component_price" placeholder="Precio">
        </div>
        <input type="submit" class="btn btn-primary btn-block" value="Agregar Componente">
    </form>
    <h3><a href="index.php">--- TUS PC's ---</a></h3>
    <?php include "./includes/layouts/computers_list.php"?>
</div>