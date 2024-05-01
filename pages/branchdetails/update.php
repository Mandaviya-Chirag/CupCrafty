<?php
require ('../../includes/init.php');
$cities = select("SELECT * FROM City");
include pathOf('includes/header.php');
include pathOf('includes/navbar.php');
$Id = $_GET["Id"];
$result = select("SELECT * FROM branchdetails WHERE Id = $Id");
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
                  <label for="">Name</label>
                  <input type="text" class="form-control" id="ownername" placeholder="Enter name" autofocus />
                </div>
                <div class="form-group">
                  <label for="">Squarefeet</label>
                  <input type="text" class="form-control" id="squarefeet" placeholder="Enter squarefeet" />
                </div>
                <label for="">Adress</label>
                <input type="text" class="form-control" id="address" placeholder="Enter address"/>
              </div>
              <button type="submit" class="btn btn-primary me-2">
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
<?php
function deleteBranch(Id) {
            if (confirm("sure you want to delete this branch"));
            $.ajax({
                url: "../../api/branchdetails/delete.php",
                method: "POST",
                data: {
                    Id: Id
                },
                success: function (response) {
                    alert('BranchDetails Deleted');
                }
            })
        }
include pathOf('/includes/pageEnd.php');
?>