<?php
require '../../includes/init.php';
$UserId = $_SESSION['UserId'];
$permissions = authenticate('Expenses', $UserId);
if ($permissions['EditPermission'] != 1)
  header('Location: ./index');
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
              <input class="form-control" type="hidden" id="Id" name="Id" value="<?= $expenses['Id'] ?>">
              <div>
                <label class="col-md-2 col-form-label">Branch</label>
                <select class="form-select" name="" id="BranchId" autofocus>
                  <?php foreach ($branchDetails as $branchDetail): ?>
                    <option value="<?= $branchDetail['Id'] ?>"><?= $branchDetail['OwnerName'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div>
                <label class="col-md-2 col-form-label">Name</label>
                <input type="text" class="form-control" id="Name" placeholder="Enter Name" 
                  value="<?= $expenses['Name'] ?>" />
              </div>
              <div>
                <label class="col-md-2 col-form-label">Amount</label>
                <input type="number" class="form-control mb-3" id="Amount" placeholder="Enter Amount"
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
      url: "../../api/expense/update",
      method: "POST",
      data: data,
      success: function (response) {
        alert("Expense Updated!");
        window.location.href = './index';
      }
    })
  }
</script>

<?php
include pathOf('/includes/pageEnd.php');
?>