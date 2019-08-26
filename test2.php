<!DOCTYPE html>
<html>
    <head>
        <title>PHP MySQL Stored Procedure Demo with Updates</title>
        <link rel="stylesheet" href="css/table.css" type="text/css" />
    </head>
    <body>
        <?php        
        require_once 'dbconfig.php';
        try 
        {            
            $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            // execute the stored procedure
            $sql = 'CALL TestCall()';
            // call the stored procedure
            $q = $pdo->query($sql);
            var_dump($pdo->query($sql));
            $q->setFetchMode(PDO::FETCH_ASSOC);
        } 
        catch (PDOException $e) 
        {
            die("Error occurred:" . $e->getMessage());
        }
        ?>
        <table>
            <tr>
                <th>Name</th>
                <th>Number of Rounds</th>
            </tr>
            <?php while ($r = $q->fetch()): ?>
                <tr>
                    <td><?php echo $r['name'] ?></td>
                    <td><?php echo $r['funding_rounds'] ?></td>
                    <td><?php echo '$' . number_format($r['raised_amount_usd'], 2) ?> </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </body>
</html>    
