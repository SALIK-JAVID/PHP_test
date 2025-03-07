<?php
// Sample user data stored in an associative array
$users = [
    ['id' => 1, 'name' => 'John Doe', 'email' => 'john.doe@example.com'],
    ['id' => 2, 'name' => 'Jane Doe', 'email' => 'jane.doe@example.com'],
    ['id' => 3, 'name' => 'Alice Smith', 'email' => 'alice.smith@example.com'],
    ['id' => 4, 'name' => 'Bob Johnson', 'email' => 'bob.johnson@example.com']
];

// Determine sorting parameters
$sortColumn = $_GET['sort'] ?? 'id'; // Default sorting by ID
$sortOrder = $_GET['order'] ?? 'asc';

// Sorting function
usort($users, function ($a, $b) use ($sortColumn, $sortOrder) {
    if ($sortOrder === 'asc') {
        return $a[$sortColumn] <=> $b[$sortColumn];
    } else {
        return $b[$sortColumn] <=> $a[$sortColumn];
    }
});

// Toggle sorting order
$newOrder = ($sortOrder === 'asc') ? 'desc' : 'asc';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sortable Users Table</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
            margin: 20px auto;
            text-align: left;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f4f4f4;
            cursor: pointer;
        }
        a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th><a href="?sort=id&order=<?= $newOrder ?>">ID</a></th>
                <th><a href="?sort=name&order=<?= $newOrder ?>">Name</a></th>
                <th><a href="?sort=email&order=<?= $newOrder ?>">Email</a></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['name'] ?></td>
                    <td><?= $user['email'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
