<?php
    include './includes/functions/sessions.php';
    include './includes/functions/functions.php';

    include './includes/templates/header.php';
    include './includes/templates/navbar.php';
?>
    <div class="index-container">
        <?php
            if(verifyOpenProject()){
                include './includes/templates/sidebarComponents.php';
        ?>
                <main class="components-container">
                <?php
                    $id_pc = getIdComputerIdInURL();
                    $computer = getComputer($id_pc);
                    foreach($computer as $data){
                ?>
                    <h2><?php echo $data["pc_name"];?></h2>
                    <p><?php echo $data["pc_desc"];?></p>
                <?php
                    } 
                ?>
                <hr>
                <div id="components-list"class="components-list">
                    <hr>
    
                    <?php
                        $components = getComponents($id_pc);
                        if($components->num_rows===0){
                    ?>
                            <p class="msg-componente">No hay componentes para mostrar</p>
                    <?php
                        }else{
                            foreach($components as $component){
                    ?>
                                <div class="item-component" id="<?php echo $component["component_id"]; ?>">
                                    <h4><?php echo ($component["component_name"]);?></h4>
                                    <p><?php echo $component["component_desc"];?></p>
                                    <p class="price">$<?php echo $component["component_price"];?></p>
                                    <i class='far fa-trash-alt'></i>
                                </div>
                    <?php
                            }
                        }
                    ?>
    
                </div>
            </main>
        
        <?php
            }else{
                include './includes/templates/sidebar.php';
        ?>
                <p class="msg-pc mt-1r">No hay computadora para mostrar</p>
        <?php
            }
        ?>

    </div>



<?php
    include './includes/templates/footer.php';
?>