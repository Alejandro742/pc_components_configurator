<?php
    function verifyOpenProject() {
        if(key($_GET)){
            //If the use selected a project
            return true;
        }
        else{
            return false;
        }
    }
?>