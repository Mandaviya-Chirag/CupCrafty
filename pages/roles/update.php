<?php
require '../../includes/init.php';
include pathOf('includes/header.php');
include pathOf('includes/sidebar.php');
?>

<?php

$id = $_GET["id"];
$query = "SELECT * FROM roles WHERE Id = $id";
$rows = selectOne($query);

?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Role</h4>
            <p class="card-description">Update Roles</p>
            <form class="forms-sample">
              <div class="form-group">
                <label for="">Id</label>
                <input type="text" class="form-control" id="Id" name="Id" readonly value="<?= $rows['Id'] ?>" autofocus>
              </div>
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="Name" name="Name" value="<?= $rows['Name'] ?>"
                  placeholder="Enter Name">
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
</div>
</div>
<?php
include pathOf('/includes/footer.php');
include pathOf('/includes/script.php');
?>

<script>
  function updateData() {
    var Id = $("#Id").val();
    var Name = $("#Name").val();

    $.ajax({
      url: "../../api/roles/update.php",
      method: "POST",
      data: {
        Id: Id,
        Name: Name
      },
      success: function (response) {
        alert("Roles Updated");
        window.location.href = './index.php';
      }
    })
  }
</script>

<?php
include pathOf('/includes/pageEnd.php');
?>