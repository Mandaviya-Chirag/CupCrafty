<?php
require '../../includes/init.php';

$cities = select("SELECT * FROM city");
include pathOf('includes/header.php');
include pathOf('includes/sidebar.php');
?>

<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">BranchDetails Add</h4>
            <p class="card-description">Add new BranchDetails</p>
            <form class="forms-sample">
              <div class="form-group">
                <div class="form-group">
                  <label for="">Owner</label>
                  <input type="text" class="form-control" id="OwnerName" placeholder="Enter Name" autofocus/>
                </div>
                <div>
                <label for="">CityName</label>
                <select name="" id="cityId">
                  <?php foreach ($cities as $city): ?>
                    <option value="<?= $city['Id'] ?>"><?= $city['Name'] ?></option>
                  <?php endforeach; ?>
                </select>
                </div>
                <div class="form-group">
                  <label for="">SquareFeet</label>
                  <input type="text" class="form-control" id="SquareFeet" name="SquareFeet" placeholder="Enter SquareFeet"/>
                </div>
                <label for="">Address</label>
                <input type="text" class="form-control" id="Address" name="Address" placeholder="Enter Address"/>
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
</div>
<?php
include pathOf('/includes/footer.php');
include pathOf('/includes/script.php');
?>
<script>
  function sendData() {
    var OwnerName = $('#OwnerName').val();
    var cityId = $('#cityId').val();
    var SquareFeet = $('#SquareFeet').val();
    var Address =  $('#Address').val();


    $.ajax({
      url: '../../api/branchdetails/insert.php',
      method: 'POST',
      data: {
        OwnerName :OwnerName,
        cityId :cityId,
        SquareFeet :SquareFeet,
        Address :Address
      },
      success: function (response) {
        alert("Branchdetails Added");
        window.location.href = './index.php';
      }

    })
  }
</script>

<?php
include pathOf('/includes/pageEnd.php');
?>
