<?php
require '../../includes/init.php';
$userPermissionId = $_POST['Id'];
$permissions = select("SELECT Modules.Name AS 'ModuleName', Modules.Id, Users.Name, Permissions.AddPermission, Permissions.EditPermission, Permissions.DeletePermission, Permissions.ViewPermission FROM Permissions INNER JOIN Modules ON Permissions.ModuleId = Modules.Id INNER JOIN Users ON Permissions.UserId = Users.Id WHERE Permissions.UserId =?", [$userPermissionId]);

$UserId = $_SESSION['UserId'];
$userPermission = authenticate('Users', $UserId);

$index = 0;
include pathOf('includes/header.php');
include pathOf('includes/sidebar.php');
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="row justiyfy-content-between">
                            <h4 class="card-title col-10">User Permissions</h4>
                            <a class="btn btn-primary col-1 mb-5" href="./add.php">
                                <i class="mdi mdi-plus"></i>
                            </a>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sr No.</th>
                                        <th>Modules</th>
                                        <th>Add Permission</th>
                                        <th>Edit Permission</th>
                                        <th>View Permission</th>
                                        <th>Delete Permission</th>
                                    </tr>
                                </thead>
                                 <tbody>
                                        <?php foreach ($permissions as $permission): ?>
                                            <tr>
                                                <input type="text" value="<?= $userPermissionId ?>" id="userId">
                                                <input type="text" value="<?= $permission['Id'] ?>" id="userId">
                                                <td><?= $index += 1 ?></td>
                                                <td><?= $permission['ModuleName'] ?></td>
                                                <td><input type="checkbox" id="addPermission"
                                                        <?= $permission['AddPermission'] == 1 ? 'Checked' : '' ?>
                                                        onchange="addPermission(<?= $permission['Id'] ?>, <?= $permission['AddPermission'] ?>)">
                                                </td>
                                                <td><input type="checkbox" id="editPermission"
                                                        <?= $permission['EditPermission'] == 1 ? 'Checked' : '' ?>
                                                        onchange="editPermission(<?= $permission['Id'] ?>, <?= $permission['EditPermission'] ?>)">
                                                </td>
                                                <td><input type="checkbox" id="viewPermission"
                                                        <?= $permission['ViewPermission'] == 1 ? 'Checked' : '' ?>
                                                        onchange="viewPermission(<?= $permission['Id'] ?>, <?= $permission['ViewPermission'] ?>)">
                                                </td>
                                                <td><input type="checkbox" id="deletePermission"
                                                        <?= $permission['DeletePermission'] == 1 ? 'Checked' : '' ?>
                                                        onchange="deletePermission(<?= $permission['Id'] ?>, <?= $permission['DeletePermission'] ?>)">
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <?php
    include pathOf('includes/footer.php');
    include pathOf('includes/script.php');
    ?>
    <script>
        function addPermission(moduleId, permission) {
            let addPermission = permission == 1 ? 0 : 1;

            let data = {
                userId: $('#UserId').val(),
                moduleId: moduleId,
                addPermission: addPermission
            }

            $.post('../../api/updatePermission.php?action=addPermission', data, function (response) {
                console.log(response.success);
                if (response.success !== true)
                    return;

                window.location.reload();
            });
        }

        function editPermission(moduleId, permission) {
            let editPermission = permission == 1 ? 0 : 1;
            
            let data = {
                userId: $('#UserId').val(),
                moduleId: moduleId,
                editPermission: editPermission
            }

            $.post('../../api/updatePermission.php?action=editPermission', data, function (response) {
                console.log(response.success);
                if (response.success !== true)
                    return;

                window.location.reload();
            });
        }

        function deletePermission(moduleId, permission) {
            let deletePermission = permission == 1 ? 0 : 1;

            let data = {
                userId: $('#UserId').val(),
                moduleId: moduleId,
                deletePermission: deletePermission
            }

            $.post('../../api/updatePermission.php?action=deletePermission', data, function (response) {
                console.log(response.success);
                if (response.success !== true)
                    return;

                window.location.reload();
            });
        }

        function viewPermission(moduleId, permission) {
            let viewPermission = permission == 1 ? 0 : 1;

            let data = {
                userId: $('#UserId').val(),
                moduleId: moduleId,
                viewPermission: viewPermission
            }

            $.post('../../api/updatePermission.php?action=viewPermission', data, function (response) {
                console.log(response.success);
                if (response.success !== true)
                    return;

                window.location.reload();
            });
        }
    </script>
    <?php
    include pathOf('includes/pageEnd.php');
    ?>