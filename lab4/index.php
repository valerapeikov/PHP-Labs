<?php
declare(strict_types=1);

/**
 * Массив транзакций
 */
$transactions = [
    [
        "id" => 1,
        "date" => "2019-01-01",
        "amount" => 100.00,
        "description" => "Payment for groceries",
        "merchant" => "SuperMart",
    ],
    [
        "id" => 2,
        "date" => "2020-02-15",
        "amount" => 75.50,
        "description" => "Dinner with friends",
        "merchant" => "Local Restaurant",
    ],
];

/**
 * Подсчет общей суммы транзакций
 * @param array $transactions
 * @return float
 */
function calculateTotalAmount(array $transactions): float {
    $total = 0;
    foreach ($transactions as $t) {
        $total += $t['amount'];
    }
    return $total;
}

/**
 * Поиск по описанию
 * @param string $descriptionPart
 * @return array
 */
function findTransactionByDescription(string $descriptionPart): array {
    global $transactions;

    return array_filter($transactions, function($t) use ($descriptionPart) {
        return stripos($t['description'], $descriptionPart) !== false;
    });
}

/**
 * Поиск по ID (foreach)
 * @param int $id
 * @return ?array
 */
function findTransactionById(int $id): ?array {
    global $transactions;

    foreach ($transactions as $t) {
        if ($t['id'] === $id) {
            return $t;
        }
    }
    return null;
}

/**
 * Поиск по ID (array_filter)
 * @param int $id
 * @return array
 */
function findTransactionByIdFilter(int $id): array {
    global $transactions;

    return array_filter($transactions, fn($t) => $t['id'] === $id);
}

/**
 * Количество дней с момента транзакции
 * @param string $date
 * @return int
 */
function daysSinceTransaction(string $date): int {
    $transactionDate = new DateTime($date);
    $now = new DateTime();

    return $now->diff($transactionDate)->days;
}

/**
 * Добавление транзакции
 */
function addTransaction(int $id, string $date, float $amount, string $description, string $merchant): void {
    global $transactions;

    $transactions[] = [
        "id" => $id,
        "date" => $date,
        "amount" => $amount,
        "description" => $description,
        "merchant" => $merchant,
    ];
}

/**
 * Сортировка по дате
 */
usort($transactions, function($a, $b) {
    return strtotime($a['date']) <=> strtotime($b['date']);
});

/**
 * Сортировка по сумме (убывание)
 */
usort($transactions, function($a, $b) {
    return $b['amount'] <=> $a['amount'];
});
?>

<!DOCTYPE html>
<html>
<head>
    <title>Transactions</title>
</head>
<body>

<h2>Список транзакций</h2>

<table border="1">
<thead>
<tr>
    <th>ID</th>
    <th>Date</th>
    <th>Amount</th>
    <th>Description</th>
    <th>Merchant</th>
    <th>Days Ago</th>
</tr>
</thead>

<tbody>
<?php foreach ($transactions as $t): ?>
<tr>
    <td><?= $t['id'] ?></td>
    <td><?= $t['date'] ?></td>
    <td><?= $t['amount'] ?></td>
    <td><?= $t['description'] ?></td>
    <td><?= $t['merchant'] ?></td>
    <td><?= daysSinceTransaction($t['date']) ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>

<h3>Общая сумма: <?= calculateTotalAmount($transactions) ?></h3>

</body>
</html>


<h2>Галерея</h2>

<?php
$dir = 'images/';
$files = scandir($dir);

if ($files !== false) {
    foreach ($files as $file) {
        if ($file !== "." && $file !== "..") {
            $path = $dir . $file;
            echo "<img src='$path' width='150' style='margin:10px'>";
        }
    }
}
?>