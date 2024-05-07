<?php
require '../../includes/init.php';
$UserId = $_SESSION['UserId'];
$permissions = authenticate('Users', $UserId);
if ($permissions['AddPermission'] != 1)
  header('Location: ./index');
$roles = select("SELECT * FROM roles");
$Id = $_POST["Id"];
$users = selectOne("SELECT * FROM users WHERE Id = $Id");
include pathOf('includes/header.php');
include pathOf('includes/sidebar.php');
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Users</h4>
            <p class="card-description">Update user</p>
            <form class="forms-sample">
              <div class="form-group">
                <input class="form-control" type="hidden" id="Id" name="Id" value="<?= $users['Id'] ?>">
                <label for="">Role</label>
                <select name="" id="roleId" class="form-select" autofocus>
                  <?php foreach ($roles as $role): ?>
                    <option value="<?= $role['Id'] ?>"><?= $role['Id'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="Name" placeholder="Enter Name" autofocus
                  value="<?= $users['Name'] ?>" />
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="text" class="form-control" id="Password" placeholder="Enter Password"
                  value="<?= $users['Password'] ?>" />
              </div>
              <div class="form-group">
                <label for="">Mobile</label>
                <input type="Number" class="form-control" id="Mobile" placeholder="Enter Number"
                  value="<?= $users['Mobile'] ?>" />
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" id="Email" placeholder="Enter Email"
                  value="<?= $users['Email'] ?>" />
              </div>
              <div class="form-group">
                <label for="">Address</label>
                <input type="text" class="form-control" id="Address" placeholder="Enter Address"
                  value="<?= $users['Address'] ?>" />
              </div>
              <button type="submit" class="btn btn-primary me-2" onclick="updateData()">
                Update
              </button>
              <button class="btn btn-light">Cancel</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php
  include pathOf('/includes/footer.php');
  include pathOf('/includes/script.php');
  ?>
  <script>
    function updateData() {
      let data = {
        Id: $('#Id').val(),
        roleId: $('#roleId').val(),
        Name: $('#Name').val(),
        Password: $('#Password').val(),
        Mobile: $('#Mobile').val(),
        Email: $('#Email').val(),
        Address: $('#Address').val()

      };


      $.ajax({
        url: '../../api/users/update',
        method: 'POST',
        data: data,
        success: function (response) {
          alert("Users Updated!");
          window.location.href = './index';
        }

      })
    }
  </script>

  <?php
  include pathOf('includes/pageEnd.php');
  ?>