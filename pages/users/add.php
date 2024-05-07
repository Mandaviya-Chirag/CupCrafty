<?php
require '../../includes/init.php';
$UserId = $_SESSION['UserId'];
$permissions = authenticate('Users', $UserId);
if ($permissions['AddPermission'] != 1)
  header('Location: ./index');
$branchDetails = select("SELECT * FROM BranchDetails");
$roles = select("SELECT * FROM Roles");
include pathOf('includes/header.php');
include pathOf('includes/sidebar.php');
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Users Add</h4>
            <p class="card-description">Add new user</p>
            <form class="forms-sample">
              <div class="form-group">
                <label for="">Role</label>
                <select name="" id="RoleId" class="form-select">
                  <?php foreach ($roles as $role): ?>
                    <option value="<?= $role['Id'] ?>"><?= $role['Name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Branch</label>
                <select name="" class="form-select" id="BranchId" autofocus>
                  <?php foreach ($branchDetails as $branchDetail): ?>
                    <option value="<?= $branchDetail['Id'] ?>"><?= $branchDetail['OwnerName'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="Name" placeholder="Enter Name" />
              </div>
              <div class="form-group">
                <label for="">Password</label>
                <input type="text" class="form-control" id="Password" placeholder="Password" />
              </div>
              <div class="form-group">
                <label for="">Mobile</label>
                <input type="text" class="form-control" id="Mobile" placeholder="Enter Number" />
              </div>
              <div class="form-group">
                <label for="">Email</label>
                <input type="email" class="form-control" id="Email" placeholder="Enter Email" />
              </div>
              <div class="form-group">
                <label for="">Address</label>
                <input type="text" class="form-control" id="Address" placeholder="Enter Address" />
              </div>
              <button type="submit" class="btn btn-primary me-2" onclick="sendData()">
                Add
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
    function sendData() {
      let data = {
        RoleId: $('#RoleId').val(),
        BranchId: $('#BranchId').val(),
        Name: $('#Name').val(),
        Password: $('#Password').val(),
        Mobile: $('#Mobile').val(),
        Email: $('#Email').val(),
        Address: $('#Address').val(),

      };


      $.ajax({
        url: '../../api/users/insert',
        method: 'POST',
        data: data,
        success: function (response) {
          alert("Users Added");
          window.location.href = './index';
        }

      })
    }
  </script>

  <?php
  include pathOf('/includes/pageEnd.php');
  ?>