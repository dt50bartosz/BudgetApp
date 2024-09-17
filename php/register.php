<?php

session_start();

$min_length = 1; 
$pdo = include 'connection.php';

$response = ['status' => 'error','message' => ''];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["name"]) && isset($_POST["surname"]) && isset($_POST["username"]) && isset($_POST['password']) && isset($_POST["confirm_password"])) {

    
        $name = htmlspecialchars(trim($_POST["name"]));
        $surname = htmlspecialchars(trim($_POST["surname"]));
        $username = htmlspecialchars(trim($_POST["username"]));
        $password = trim($_POST['password']);
        $confirm_password = trim($_POST["confirm_password"]);

        if (empty($name) || empty($surname) || empty($username) || empty($password) || empty($confirm_password)) {
            $response['message'] = "Please fill in all required fields.";
        } elseif ($password !== $confirm_password) {
            $response['message'] = "Passwords do not match.";
        } elseif (strlen($password) < $min_length) {
            $response['message'] = "Password must be at least $min_length characters.";
        } else {
            
            $check_sql = "SELECT COUNT(*) FROM users WHERE username = :username";
            $check_stmt = $pdo->prepare($check_sql);
            $check_stmt->bindParam(':username', $username);
            $check_stmt->execute();
            $user_exists = $check_stmt->fetchColumn();

            if ($user_exists) {
                $response['message'] = "Username already taken.";
            } else {

                $password_hash = password_hash($password, PASSWORD_DEFAULT);
                
                $sql = "INSERT INTO users (name, surname, username, password) VALUES (:name, :surname, :username, :password)";

                try {
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':name', $name);
                    $stmt->bindParam(':surname', $surname);
                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':password', $password_hash);

                    if ($stmt->execute()) {
                        $response['status'] = 'success';
                        $response['message'] = "Registration successful!";                        
                        $user_id = $pdo->lastInsertId(); 
                        $_SESSION["user_id"] = $user_id;
                        $_SESSION["username"] = $username;
                        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));

                    } else {
                        $response['message'] = "Error: Could not execute the query.";
                    }
                } catch (PDOException $e) {
                    $response['message'] = "Error: " . $e->getMessage();
                }
            }
        }
    } else {
        $response['message'] = "Invalid request.";
    }
}

echo json_encode($response);
?>
