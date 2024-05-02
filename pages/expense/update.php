<?php
require '../../includes/init.php';
$branchDetails = select("SELECT * FROM BranchDetails");
$Id = $_POST["Id"];
$expenses = selectOne("SELECT * FROM expense WHERE Id = $Id");
include pathOf('includes/header.php');
include pathOf('includes/sidebar.php');
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Expense</h4>
            <p class="card-description">Update expense</p>
            <form class="forms-sample">
              <div class="form-group">
                <input class="form-control" type="hidden" id="Id" name="Id" value="<?= $expenses['Id'] ?>">
                <label for="">Name</label>
                <input type="text" class="form-control" id="Name" placeholder="Enter Name" autofocus
                  value="<?= $expenses['Name'] ?>" />
              </div>
              <div>
                <label for="">BranchName</label>
                <select class="form-select" name="" id="BranchId">
                  <?php foreach ($branchDetails as $branchDetail): ?>
                    <option value="<?= $branchDetail['Id'] ?>"><?= $branchDetail['Id'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Amount</label>
                <input type="number" class="form-control" id="Amount" placeholder="Enter Amount"
                  value="<?= $expenses['Amount'] ?>" />
              </div>
              <button class="btn btn-primary me-2" onclick="updateData()">
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
    let data = {
      Id: $("#Id").val(),
      BranchId: $("#BranchId").val(),
      Name: $("#Name").val(),
      Amount: $("#Amount").val(),
    }

    $.ajax({
      url: "../../api/expense/update.php",
      method: "POST",
      data: data,
      success: function (response) {
        alert("Expense Updated!");
        window.location.href = './index.php';
      }
    })
  }
</script>

<?php
include pathOf('/includes/pageEnd.php');
?>