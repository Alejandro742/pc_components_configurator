<script src="js/sweetalert2.all.min.js"></script>
<?php
    if(verifyOpenProject()){
        echo " <script src = 'js/components.js'></script> ";
    }else{
        echo " <script src = 'js/computers.js'></script> ";
    }

?>

</body>
</html>