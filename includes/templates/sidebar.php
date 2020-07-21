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
    <ul id="computers-list">
        <?php
        $computers = getComputers();
        if (!$computers) {
        ?>
            <li>
                <p>No hay Computadoras!</p>
                <i class='fas fa-tired'></i>;
            </li>
        <?php
        } else {
            foreach($computers as $computer){
        ?>
                <li id=<?php echo $computer["pc_id"] ?> >
                        <a href='index.php?pc_id:<?php echo $computer["pc_id"];?>'><?php echo $computer["pc_name"] ?></a> 
                        <i class='far fa-trash-alt'></i>
                     </li>
            <?php
            }
        }
        ?>
        
    </ul>
</div>