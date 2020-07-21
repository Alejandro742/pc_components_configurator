<?php
    function verifyOpenProject() {
        if(key($_GET)){
            //If the use selected a project
            return true;
        }
        else{
            return false;
        }
    };
    function getComputers(){
        include "db_connection.php";
        try {
            return $conn->query("SELECT * FROM pc");
        } catch (Exception $e) {
            echo 'ERROR!: '. $e->getMessage();
            return false;
        }
    };
?>