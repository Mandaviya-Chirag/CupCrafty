<?php
require '../../includes/init.php';
include pathOf('includes/header.php');
include pathOf('includes/sidebar.php');
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Category Add</h4>
            <p class="card-description">Add new category</p>
            <form class="forms-sample">
              <div class="form-group">
                <label for="example-text-input">Name</label>
                <input type="text" class="form-control" id="Name" name="Name" placeholder="Enter Name" autofocus>
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
</div>
</div>
<?php
include pathOf('/includes/footer.php');
include pathOf('/includes/script.php');

?>
<script>
  function sendData() {
    var Name = $("#Name").val();

    $.ajax({
      url: "../../api/categories/insert.php",
      method: "POST",
      data: {
        Name: Name,
      },
      success: function (response) {
        alert("Categorie Added");
        window.location.href = './index.php';
      }
    })
  }
</script>
<?php
include pathOf('/includes/pageEnd.php');
?>