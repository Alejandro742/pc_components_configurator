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
                        <a href='index.php?pc_id:<?php echo $computer["pc_id"];?>'><?php echo strtoupper($computer["pc_name"]) ?></a> 
                        <i class='far fa-trash-alt'></i>
                     </li>
            <?php
            }
        }
        ?>
        
    </ul>