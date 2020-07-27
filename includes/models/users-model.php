<?php
  $action = filter_var($_POST["action"],FILTER_SANITIZE_STRING);
  $email = filter_var($_POST["email"],FILTER_SANITIZE_STRING);
  $password = filter_var($_POST['password'],FILTER_SANITIZE_STRING);
  if($action === "signup"){
    // Hashing password
    $options = array(
      'cost'=>12,
    );
    $hash_password = password_hash($password,PASSWORD_BCRYPT,$options);
    //Import connection
    include '../functions/db_connection.php';
    try {
      $stmt = $conn->prepare("INSERT INTO users (password,email) VALUES(?,?)");
      $stmt->bind_param("ss",$hash_password,$email);
      $stmt->execute();
      if($stmt->affected_rows>0){
        $result = array(
          'answer' => "success",
          'action' => $action,
          'inserted_id' => $stmt->insert_id,
        );
      }
      $stmt->close();
      $conn->close();
    } catch (Exception $error) {
      $result = array(
          'error' => $error->getMessage(),
      );
    }
  }else if($action === "login"){
    //Import connection
    include '../functions/db_connection.php';
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s",$email);
    $stmt->execute();
    //Like destructurin in JS
    $stmt->bind_result($user_id,$user_password,$user_email);
    $stmt->fetch();
    if($user_email){
      if(password_verify($password,$user_password)){
        //sessions code
        $result = array(
          "answer" => "success",
          "action" => $action,
          "user_email" =>$user_email,
          "user_id" => $user_id
        );
      }else{
        $result = array(
          "answer" =>"Incorrect Password"
        );
      }
    }else{
      //iNCORRECT login
      $result = array(
        "answer" =>"User not found",
        "code" => "404",
      );
    }

    $stmt->close();
    $conn->close();
  }
  echo json_encode($result);
