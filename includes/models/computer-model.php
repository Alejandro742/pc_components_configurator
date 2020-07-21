<?php
    $action = $_POST["action"];


    //Insert in DB
    if($action === "create"){
        //Import connection
        include "../functions/db_connection.php";
        $pc_name = $_POST["pc_name"];
        $pc_desc = $_POST["pc_desc"];
        try {
            //Insert in DB using prepare statements
            $stmt = $conn->prepare("INSERT INTO pc (pc_name,pc_desc) VALUES(?,?)");
            $stmt->bind_param("ss",$pc_name,$pc_desc);
            $stmt->execute();
            if($stmt->affected_rows > 0){
                $result = array(
                    'answer' => "success",
                    'inserted_id' => $stmt->insert_id,
                    'action' => $action,
                    'pc_name' => $pc_name
                );
            }
        } catch (Exception $error) {
            $result = array(
                'error' => $error->getMessage(),
            );
        }
    }
    echo json_encode($result);
?>
