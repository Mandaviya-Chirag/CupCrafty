<?php
require ('../../includes/init.php');
$UserId = $_SESSION['UserId'];
$permissions = authenticate('Categories', $UserId);
if ($permissions['EditPermission'] != 1)
  header('Location: ./index');
$Id = $_POST["Id"];
$query = ("SELECT * FROM categories WHERE Id = $Id");
$categories = selectOne($query);
include pathOf('includes/header.php');
include pathOf('includes/sidebar.php');
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Category</h4>
            <p class="card-description">Update category</p>
            <form class="forms-sample">
              <div class="form-group">
                <input type="hidden" class="form-control" id="Id" name="Id" readonly value="<?= $categories['Id'] ?>"
                  autofocus>
              </div>
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="Name" name="Name" value="<?= $categories['Name'] ?>"
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
      url: "../../api/categories/update",
      method: "POST",
      data: {
        Id: Id,
        Name: Name
      },
      success: function (response) {
        alert("Categorie Updated");
        window.location.href = './index';
      }
    })
  }
</script>
<?php
include pathOf('/includes/pageEnd.php');
?>