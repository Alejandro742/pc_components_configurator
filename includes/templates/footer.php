<script src="js/sweetalert2.all.min.js"></script>
<?php
    // if(verifyOpenProject()){
    //     echo " <script src = 'js/components.js'></script> ";
    // }else{
    //     echo " <script src = 'js/computers.js'></script> ";
    // }
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php","",$archivo);
    if($pagina==="login" || $pagina === "signup"){
        echo " <script src = 'js/users.js'></script> ";
    }else{
        if(verifyOpenProject()){
            echo " <script src = 'js/components.js'></script> ";
        }else{
            echo " <script src = 'js/computers.js'></script> ";
        }
    }

?>

</body>
</html>