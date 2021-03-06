<?php
    $action = $_POST["action"];
    $user_id = filter_var($_POST["user_id"],FILTER_SANITIZE_NUMBER_INT);

    //Insert in DB
    if($action === "create"){
        //Import connection
        include "../functions/db_connection.php";
        $pc_name = filter_var($_POST["pc_name"],FILTER_SANITIZE_STRING);
        $pc_desc = filter_var($_POST["pc_desc"],FILTER_SANITIZE_STRING);
        try {
            //Insert in DB using prepare statements
            $stmt = $conn->prepare("INSERT INTO pc (pc_name,pc_desc,user_id) VALUES(?,?,?)");
            $stmt->bind_param("ssi",$pc_name,$pc_desc,$user_id);
            $stmt->execute();
            if($stmt->affected_rows > 0){
                $result = array(
                    'answer' => "success",
                    'inserted_id' => $stmt->insert_id,
                    'action' => $action,
                    'pc_name' => $pc_name
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


    // DELETE in DB
    if($action === "delete"){
        //Import DB connection
        include '../functions/db_connection.php';
        $pc_id = $_POST["pc_id"];
        try {
            //Delete Query
            $stmt = $conn->prepare("DELETE FROM pc WHERE pc_id = $pc_id");
            $stmt->execute();
            if($stmt->affected_rows>0){
                $result = array(
                    'answer' => "success",
                    'action' => $action,
                );
            }
            $stmt->close();
            $conn->close();
        } catch (Exception $e) {
            $result = array(
                "error" => $e->getMessage(),
            );
        }
    }
    echo json_encode($result);
?>
