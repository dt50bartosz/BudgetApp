<?php

include './login_request.php';
$pdo = include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["transaction_type"]) && isset($_POST["transaction_id"])) {

        $csrf_token = $_POST['csrf_token'] ?? $_SERVER['HTTP_X_CSRF_TOKEN'] ?? '';

        if ($csrf_token !== $_SESSION['csrf_token']) {
         
            header('HTTP/1.1 403 Forbidden');
            exit('Invalid CSRF token');
        }
    
    

        $newDate = htmlspecialchars(trim($_POST["date"]));
        $newAmount = htmlspecialchars(trim($_POST["amount"]));
        $newComment = htmlspecialchars(trim($_POST["comment"]));
        $idTransaction = htmlspecialchars(trim($_POST["transaction_id"]));
        $transactionType = htmlspecialchars(trim($_POST["transaction_type"]));
        $user_id = $_SESSION["user_id"];

    

        try {            
            $allowedTypes = ['income', 'expenses']; 
            if (!in_array($transactionType, $allowedTypes)) {
                echo json_encode(["status" => "error", "message" => "Invalid transaction type."]);
                exit();
            }

            if(empty($newDate) && empty($newAmount) && empty($newComment)) {

                echo json_encode(["status" => "error", "message" => "Please fill at least one option."]);
                exit();
            }

            $sql = "UPDATE " . $transactionType . " SET ";
            $params = [];

            if (!empty($newDate)) {
                $sql .= "trasaction_date = :newDate, ";
                $params[':newDate'] = $newDate;
            }
            if (!empty($newAmount)) {
                $sql .= "amount = :newAmount, ";
                $params[':newAmount'] = $newAmount;
            }
            if (!empty($newComment)) {
                $sql .= "comment = :newComment, ";
                $params[':newComment'] = $newComment;
            }

            $sql = rtrim($sql, ', ') . " WHERE idTransaction = :idTransaction AND idUser = :user_id";
            $params[':idTransaction'] = $idTransaction;
            $params[':user_id'] = $user_id;

            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);

            echo json_encode(["status" => "success", "message" => "Transaction updated successfully."]);

        } catch (PDOException $e) {
            
            error_log("PDOException: " . $e->getMessage(), 3, 'errors.log');

            echo json_encode(["status" => "error", "message" => "Failed to update transaction. Please try again later."]);
        }
        
    }
    
}
?>
