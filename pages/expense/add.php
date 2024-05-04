<?php
require '../../includes/init.php';

$branchDetails = select("SELECT * FROM BranchDetails");
include pathOf('includes/header.php');
include pathOf('includes/sidebar.php');
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Expense Add</h4>
            <p class="card-description">Add new expense</p>
            <form class="forms-sample">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="Name" placeholder="Enter Name" autofocus />
              </div>
              <div>
                <label for="">BranchName</label>
                <select name="" id="BranchId" class="form-select" >
                  <?php foreach ($branchDetails as $branchDetail): ?>
                    <option value="<?= $branchDetail['Id'] ?>"><?= $branchDetail['Id'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label for="">Amount</label>
                <input type="number" class="form-control" id="Amount" placeholder="Enter Amount" />
              </div>
              <button class="btn btn-primary me-2" onclick="sendData()">
                Add
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

  function sendData() {
        let data = {
          BranchId : $('#BranchId').val(),
          Name : $('#Name').val(),
          Amount : $('#Amount').val(),
          
        }

    $.ajax({
      url: '../../api/expense/insert.php',
      method: 'POST',
      data: data,
      success: function (response) {
        alert("expense added!");
        window.location.href = './index.php';
      }
    })

  }

</script>


<?php
include pathOf('/includes/pageEnd.php');
?>