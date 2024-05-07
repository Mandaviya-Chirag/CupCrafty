<?php
require '../../includes/init.php';
$UserId = $_SESSION['UserId'];
$permissions = authenticate('Users', $UserId);
$user = select("SELECT Users.Id, Users.Name, Users.Password, Users.Mobile, Users.Email, Users.Address, Roles.Id AS 'RolesId' FROM Users INNER JOIN Roles ON Users.RoleId = Roles.Id");
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
              <h4 class="card-title col-10">Users</h4>
              <?php if ($permissions['AddPermission'] == 1) { ?>
                <a class="btn btn-primary col-1 mb-5" href="./add">
                  <i class="mdi mdi-plus"></i>
                </a>
              <?php } ?>
            </div>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Sr.no.</th>
                    <th>OwnerName</th>
                    <th>Password</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <?php if ($permissions['EditPermission'] == 1) { ?>
                      <th>Modify</th> 
                    <?php } ?>
                    <?php if ($permissions['DeletePermission'] == 1) { ?>
                      <th>Permissions</th>
                    <?php } ?>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($user as $users): ?>
                    <tr>
                      <td><?= $index += 1 ?></td>
                      <td><?= $users['Name'] ?></td>
                      <td><?= $users['Password'] ?></td>
                      <td><?= $users['Mobile'] ?></td>
                      <td><?= $users['Email'] ?></td>
                      <form action="./update" method="post">
                        <td>
                          <input type="hidden" name="Id" id="Id" value="<?= $users['Id'] ?>">
                          <button type="submit" class="btn btn-primary me-2">
                            <i class="mdi mdi-table-edit"></i>
                          </button>
                        </td>
                      </form>
                      <form action="<?= urlOf('pages/users/permissions') ?>" method="post">
                        <td>
                          <input type="hidden" name="Id" id="Id" value="<?= $users['Id'] ?>">
                          <button type="submit" class="btn btn-primary me-2">
                            <i class="mdi mdi-lock-outline"></i>
                          </button>
                        </td>
                      </form>
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
  include pathOf('/includes/footer.php');
  include pathOf('/includes/script.php');
  ?>

  <!-- <script>

    function deleteUsers(Id) {
      if (confirm("are you sure you want to delete this user"));
      $.ajax({
        url: "../../api/users/delete",
        method: "POST",
        data: {
          Id: Id
        },
        success: function (response) {
          alert('Users Deleted!');
          window.location.href = './index';
        }
      })
    }

  </script> -->

  <?php
  include pathOf('/includes/pageEnd.php');
  ?>