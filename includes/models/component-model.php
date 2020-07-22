<?php
    $action = $_POST["action"];

    if($action === "create"){
        //import the connection
        include "../functions/db_connection.php";

        //get the data in the request
        $component_name = filter_var($_POST["component_name"],FILTER_SANITIZE_STRING);
        $component_price = filter_var($_POST["component_price"],FILTER_SANITIZE_NUMBER_INT);
        $component_desc = filter_var($_POST["component_desc"],FILTER_SANITIZE_STRING);
        $pc_id = filter_var($_POST["pc_id"],FILTER_SANITIZE_NUMBER_INT);

        //Code to handle the db query
        try {
            $stmt = $conn->prepare("INSERT INTO components (component_name,component_desc,component_price,pc_id) VALUES(?,?,?,?)");
            $stmt->bind_param("ssii",$component_name,$component_desc,$component_price,$pc_id);
            $stmt->execute();
            if($stmt->affected_rows>0){
                $result = array(
                    "answer" => "success",
                    "action" => $action,
                    "inserted_id" => $stmt->insert_id,
                    "pc_id" => $pc_id,
                );
            }
            $stmt->close();
            $conn->close();
        } catch (Exception $error) {
            $result = array(
                'error' => $error->getMessage(),
            );
        }
    }

    echo json_encode($result);

?>