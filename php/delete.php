<?php

include './login_request.php';

$pdo = include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["transaction_id"]) && isset($_POST["transaction_type"])) {

        $csrf_token = $_POST['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';

        if ($csrf_token !== $_SESSION['csrf_token']) {
         
            header('HTTP/1.1 403 Forbidden');
            exit('Invalid CSRF token');
        }
    
     
        $transaction_id = htmlspecialchars(trim($_POST["transaction_id"]));
        $transaction_type = htmlspecialchars(trim($_POST["transaction_type"]));

        
        if (!in_array($transaction_type, ['income', 'expenses'])) {
            echo json_encode(["status" => "error", "message" => "Invalid transaction type."]);
            exit();
        }


        $sql = "DELETE FROM $transaction_type WHERE idTransaction = :transaction_id";

        try {
            $stmt = $pdo->prepare($sql);

 
            $stmt->bindParam(':transaction_id', $transaction_id, PDO::PARAM_INT);

            if ($stmt->execute()) {
                
                if ($stmt->rowCount() > 0) {
                    echo json_encode(["status" => "success", "message" => "Transaction record deleted successfully!"]);
                } else {
                    echo json_encode(["status" => "error", "message" => "No record found to delete."]);
                }
                exit();
            } else {
                echo json_encode(["status" => "error", "message" => "Error: Could not execute the query."]);
                exit();
            }
        } catch (PDOException $e) {
            echo json_encode(["status" => "error", "message" => "Error: " . $e->getMessage()]);
            exit();
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Transaction ID and type are required to delete the record."]);
        exit();
    }
}
