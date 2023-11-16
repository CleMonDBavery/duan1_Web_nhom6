<?php
$user = new User();
// Gọi phương thức getList() để lấy danh sách các danh mục
$userList = $user->getUser();
?>

<div class="card-body">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Fullname</th>
                <th>Email</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Permission</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userList as $row) { ?>
                <tr>
                    <td>
                        <?= $row['UserID']; ?>
                    </td>
                    <td>
                        <?= $row['Username']; ?>
                    </td>
                    <td>
                        <?= $row['FullName']; ?>
                    </td>
                    <td>
                        <?= $row['Email']; ?>
                    </td>
                    <td>
                        <?= $row['Address']; ?>
                    </td>
                    <td>
                        <?= $row['Phone']; ?>
                    </td>
                    <td style="
                    <?php
                    if ($row['Permissions'] === 'admin') {
                        echo 'font-weight: bold; color: red;';
                    } ?>">
                        <?= $row['Permissions']; ?>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>