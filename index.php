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
        <main class="components-container">
            <h2>PC MASTER 0<?php echo $pc_id?></h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem nesciunt similique aspernatur. Veniam iure quae quisquam id ullam error delectus labore obcaecati, laboriosam, velit sequi ut officia repellat ratione repudiandae?</p>
            <hr>
            <div id="components-list"class="components-list">
                <div class="item-component">
                    <h4>NAME</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum sint eaque quibusdam.</p>
                    <p class="price">$1000</p>
                </div>
                <hr>
                <div class="item-component">
                    <h4>NAME2</h4>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum sint eaque quibusdam.</p>
                    <p class="price">$2000</p>
                </div>
            </div>
        </main>
    </div>



<?php
    include './includes/templates/footer.php';
?>