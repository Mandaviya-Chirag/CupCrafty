<?php
require '../../includes/init.php';
$UserId = $_SESSION['UserId'];
$permissions = authenticate('City', $UserId);
if ($permissions['AddPermission'] != 1)
  header('Location: ./index');
include pathOf('includes/header.php');
include pathOf('includes/sidebar.php');
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">City Add</h4>
            <p class="card-description">Add new City</p>
            <form class="forms-sample">
              <div class="form-group">
                <label for="">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" autofocus />
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
    var name = $("#name").val();

    $.ajax({
      url: "../../api/city/insert",
      method: "POST",
      data: {
        name: name,
      },
      success: function (response) {
        alert("City Added");
        window.location.href = './index';
      }
    })
  }
</script>

<?php
include pathOf('/includes/pageEnd.php');
?>