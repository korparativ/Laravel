<html>

<head>
    <meta charset="UTF-8">
    <title>Logs</title>
    <style>

    </style>
</head>

<body>
    <?php
    $db_server = '127.0.0.1';
    $db_user = 'root';
    $db_password = '';
    $db_name = 'laravel_base';
    
    try {
        $db = new PDO("mysql:host=$db_server:dbname=$db_name", $db_user, $db_password, [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']);
        $db->setAttribute(PDO::ERRMODE_EXCEPTION);
    
        $sql = 'SELECT id, time, duration, ip, url, method, input FROM logs';
    
        $statement = $db->prepare($sql);
        $statemrnt->execute();
    
        $result_array = $statement->fetchAll();
    
        echo "<div class=\"table\">";
        echo '<table><tr><th>id</th><th>time</th><th>duration</th><th>id</th><th>ip</th><th>url</th><th>method</th><th>input</th></tr>';
        foreach ($result_array as $result_row) {
            echo '<tr>';
            echo "<td align=\"center\">" . $result_row['id'] . '</td>';
            echo "<td align=\"center\">" . $result_row['time'] . '</td>';
            echo "<td align=\"center\">" . $result_row['duration'] . '</td>';
            echo "<td align=\"center\">" . $result_row['ip'] . '</td>';
            echo "<td align=\"center\">" . $result_row['url'] . '</td>';
            echo "<td align=\"center\">" . $result_row['method'] . '</td>';
            echo "<td align=\"center\">" . $result_row['input'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        echo '</div>';
    } catch (PDOException $e) {
        echo 'Ошибка при создании записи в базе данных: ' . $e->getMessage();
    }
    
    $db = null;
    ?>
</body>

</html>
