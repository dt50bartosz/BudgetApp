<?php


$pdo = include 'connection.php';
$error_message = "";
$response = ["status" => "error", "message" => ""];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["name"], $_POST["user-password"])) {


        $username = htmlspecialchars(trim($_POST["name"]));
        $password = htmlspecialchars(trim($_POST["user-password"]));

        if (!empty($username) && !empty($password)) {

            $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->execute();

            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                session_start();

                $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
                
                $_SESSION["user_id"] = $user["idUser"];
                $_SESSION["username"] = $user["username"];

                
                $response["status"] = "success";
                $response["message"] = "Login successful.";
                $response["redirect"] = "http://localhost/Aplikacje/main"; 
            } else {
                
                $response["message"] = "Invalid username or password.";
            }
        } else {
            
            $response["message"] = "Please enter both username and password.";
        }
    }
    
    echo json_encode($response);
    exit();
}
