<?php
require ('../../includes/init.php');
$UserId = $_SESSION['UserId'];
$permissions = authenticate('BranchDetails', $UserId);
if ($permissions['EditPermission'] != 1)
  header('Location: ./index');
$cities = select("SELECT * FROM City");
$Id = $_POST["Id"];
$branchDetail = selectOne("SELECT * FROM branchdetails WHERE Id = $Id");
include pathOf('includes/header.php');
include pathOf('includes/sidebar.php');
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">BranchDetails</h4>
            <p class="card-description">Update BranchDetails</p>
            <form class="forms-sample">
              <div class="form-group">
                <div class="form-group">
                  <input type="hidden" class="form-control" id="Id" value="<?= $branchDetail['Id'] ?>" />
                  <label for="">Owner</label>
                  <input type="text" class="form-control" id="OwnerName" value="<?= $branchDetail['OwnerName'] ?>"
                    autofocus />
                </div>
                <div>
                  <label for="">CityName</label>
                  <select name="" id="cityId" class="form-select mb-3" >
                    <?php foreach ($cities as $city): ?>
                      <option value="<?= $city['Id'] ?>"><?= $city['Name'] ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="">SquareFeet</label>
                  <input type="number" class="form-control" id="SquareFeet"
                    value="<?= $branchDetail['SquareFeet'] ?>" />
                </div>
                <label for="">Address</label>
                <input type="text" class="form-control" id="Address" value="<?= $branchDetail['Address'] ?>" />
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
</div>
<?php
include pathOf('/includes/footer.php');
include pathOf('/includes/script.php');
?>

<script>

  function updateData() {
    let data = {
      Id: $("#Id").val(),
      OwnerName: $("#OwnerName").val(),
      cityId: $("#cityId").val(),
      SquareFeet: $("#SquareFeet").val(),
      Address: $("#Address").val(),
    }
    $.ajax({
      url: "../../api/branchdetails/update",
      method: "POST",
      data: data,
      success: function (response) {
        alert('BranchDetails Updated!');
        window.location.href = './index';
      }
    })
  }

</script>
<?php
include pathOf('/includes/pageEnd.php');
?>