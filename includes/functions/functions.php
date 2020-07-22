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
    function getIdComputerIdInURL(){
        $url = key($_GET);
        return substr($url,6);
    };



    // DATABASE QUERY's
    function getComputers(){
        include "db_connection.php";
        try {
            return $conn->query("SELECT * FROM pc");
        } catch (Exception $e) {
            echo 'ERROR!: '. $e->getMessage();
            return false;
        }
    };
    function getComputer($pc_id){
        include "db_connection.php";
        try {
            return $conn->query("SELECT * FROM pc WHERE pc_id = $pc_id");
        } catch (Exception $e) {
            echo 'ERROR!: '. $e->getMessage();
            return false;
        }
    }
    function getComponents($pc_id){
        include "db_connection.php";
        try {
            return $conn->query("SELECT * FROM components WHERE pc_id = $pc_id");
        } catch (Exception $e) {
            echo 'ERROR!: '. $e->getMessage();
            return false;
        }
    };
?>