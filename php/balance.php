<?php

include '../php/login_request.php';
$pdo = include '../php/connection.php';

$userId = $_SESSION["user_id"];

function calculateTotals($transactions) {
    $totals = [
        'totalIncome' => 0,
        'totalExpenses' => 0
    ];

    foreach ($transactions as $transaction) {
        if ($transaction['type'] === 'income') {
            $totals['totalIncome'] += $transaction['amount'];
        } else if ($transaction['type'] === 'expense') {
            $totals['totalExpenses'] += $transaction['amount'];
        }
    }

    return $totals;
}

function fetchResults($pdo, $sql, $params) {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function prepareQuery($transactionType, $startDate, $finishDate, $userId) {
    if ($transactionType === "all-transaction") {
        $sql = "
            SELECT 'income' AS type, method, trasaction_date AS date, amount, category, comment, idTransaction
            FROM income 
            WHERE trasaction_date BETWEEN ? AND ? AND idUser = ? 
            UNION ALL 
            SELECT 'expense' AS type, method, trasaction_date AS date, amount, category, comment,idTransaction
            FROM expenses 
            WHERE trasaction_date BETWEEN ? AND ? AND idUser = ?
            ORDER BY date
        ";
        $params = [$startDate, $finishDate, $userId, $startDate, $finishDate, $userId];
    } else {
        $table = $transactionType === 'income' ? 'income' : 'expenses';
        $sql = "
            SELECT '$transactionType' AS type, method, trasaction_date AS date, amount, category, comment, 	idTransaction
            FROM $table
            WHERE trasaction_date BETWEEN ? AND ? AND idUser = ?
            ORDER BY date
        ";
        $params = [$startDate, $finishDate, $userId];
    }
    return [$sql, $params];

}


function generateChartData($transactions,$transactionType) {
            $chartData = [];
    
        if ($transactionType === 'all-transaction') {
          
            $totalIncome = 0;
            $totalExpenses = 0;
    
            foreach ($transactions as $transaction) {
                if ($transaction['type'] === 'income') {
                    $totalIncome += $transaction['amount'];
                } else if ($transaction['type'] === 'expense') {
                    $totalExpenses += $transaction['amount'];
                }
            }
    
            
            $chartData['Incomes'] = $totalIncome;
            $chartData['Expenses'] = $totalExpenses;
        } else {
          
            foreach ($transactions as $transaction) {
                $category = $transaction['category'];
                $amount = $transaction['amount'];
    
                if (!isset($chartData[$category])) {
                    $chartData[$category] = 0;
                }
                $chartData[$category] += $amount;
            }
        }
    
        return $chartData;
}


if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest') {

    $startDate = htmlspecialchars($_POST["start-date"]);
    $finishDate = htmlspecialchars($_POST["finish-date"]);
    $transactionType = htmlspecialchars($_POST["transaction"]);

    list($sql, $params) = prepareQuery($transactionType, $startDate, $finishDate, $userId);
    $results = fetchResults($pdo, $sql, $params);

    $chartData = generateChartData($results,$transactionType);
    $totals = calculateTotals($results);

    header('Content-Type: application/json');  
    echo json_encode(["status" => "success", "data" => ["transactions" => $results, "chartData" => $chartData,"totals" => $totals]]);
    exit;
}
