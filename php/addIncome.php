<?php

include './login_request.php';

$pdo = include 'connection.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["amount"]) && isset($_POST["date"]) && isset($_POST["income_type"])) {

        $csrf_token = $_POST['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';

        if ($csrf_token !== $_SESSION['csrf_token']) {
         
            header('HTTP/1.1 403 Forbidden');
            exit('Invalid CSRF token');
        }
    

        $income_method =  htmlspecialchars(trim($_POST["income-method"]));
        $amount = htmlspecialchars(trim($_POST["amount"]));
        $date = htmlspecialchars(trim($_POST["date"]));
        $comment = htmlspecialchars(trim($_POST["comment"] ?? 'N/A'));
        $category = htmlspecialchars(trim($_POST["income_type"])); 
        $user_id = $_SESSION["user_id"];

        if (empty($amount) || empty($date) || empty($category)) {
            echo json_encode(["status" => "error", "message" => "Please fill in all required fields."]);
            exit();
        } else {
            $sql = "INSERT INTO income (idUser, trasaction_date, amount, category, comment,method) 
                    VALUES (:idUser,:trasaction_date, :amount, :category, :comment,:method)";

            try {
                $stmt = $pdo->prepare($sql);             
                $stmt->bindParam(':idUser', $user_id);
                $stmt->bindParam(':trasaction_date', $date); 
                $stmt->bindParam(':amount', $amount);
                $stmt->bindParam(':category', $category); 
                $stmt->bindParam(':comment', $comment);
                $stmt->bindParam(':method', $income_method);

                if ($stmt->execute()) {
                    echo json_encode(["status" => "success", "message" => "Income added successfully!"]);
                    exit();
                } else {
                    echo json_encode(["status" => "error", "message" => "Error: Could not execute the query."]);
                    exit();
                }
            } catch (PDOException $e) {
                echo json_encode(["status" => "error", "message" => "Error: " . $e->getMessage()]);
                exit();
            }
        }

    } else {
        echo json_encode(["status" => "error", "message" => "Please fill in all the fields."]);
        exit();
    }
}
