<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
        }
        th {
            background-color: lightgray;
        }
    </style>
</head>
<body>
    <h1>List of games</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Release Date</th>
            <th>Developer</th>
            <th>Publisher</th>
            <th>Price</th>
        </tr>
        <?php foreach ($game as $row): ?>
        <tr>
            <td><?= esc($row->name) ?></td>
            <td><?= esc(date("d. m. Y", strtotime($row->release_date))) ?></td>
            <td><?= esc($row->name_developer) ?></td>
            <td><?= esc($row->name_publisher) ?></td>
            <td>$<?= esc($row->price) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>