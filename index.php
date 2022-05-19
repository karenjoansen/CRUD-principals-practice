<?php
// sistema CRUD 

require 'config.php';

$list = [];
$sql = $pdo->query("SELECT * FROM users");
if($sql->rowCount() > 0) {
    $list = $sql->fetchAll(PDO::FETCH_ASSOC);
}
?>

<a href="add-user.php">Add User</a>

<table border="1" width="100%">
    <tr>
        <th>ID</th>
        <th>NAME</th>
        <th>EMAIL</th>
        <th>ACTIONS</th>
    </tr>

<?php foreach ($list as $users): ?>
    <tr>
        <td><?=$users['id']; ?><td>
        <td><?=$users['name']; ?><td>
        <td><?=$users['email']; ?><td>
        <td>
            <a href="edit.php?id=<?=$users['id'];?>">[ Edit ]</a>
            <a href="delete.php?id=<?=$users['id'];?>">[ Delete ]</a>    
        <td>
    </tr>
<?php endforeach; ?>
</table>

