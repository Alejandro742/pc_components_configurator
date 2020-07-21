<?php
    include './includes/functions/functions.php';

    include './includes/templates/header.php';
    include './includes/templates/navbar.php';
?>
    <div class="index-container">
        <?php
            if(verifyOpenProject()){
                include './includes/templates/sidebarComponents.php';
            }else{
                include './includes/templates/sidebar.php';
            }

        ?>
        <main class="components-container container">
            <h2>PC MASTER 0<?php echo $pc_id?></h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem nesciunt similique aspernatur. Veniam iure quae quisquam id ullam error delectus labore obcaecati, laboriosam, velit sequi ut officia repellat ratione repudiandae?</p>
            <div class="components">

            </div>
        </main>
    </div>



<?php
    include './includes/templates/footer.php';
?>