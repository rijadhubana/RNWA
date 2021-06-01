<div class="container">
<form action="?controller=artiste&action=updateartiste" method="POST">
  <div class="form-group">
    <label for="art">Artiste ID:</label>
    <input type="number" readonly class="form-control" name="art" value=<?php echo $artistedetails->artisteID?>>
  <div class="form-group">
    <label for="artisteName">Artiste name:</label>
    <input type="text" class="form-control" name="artisteName" value=<?php echo $artistedetails->artisteName?>>
  </div>
  <div class="form-group">
    <label for="artisteNationality">Artiste nationality:</label>
    <input type="text" class="form-control" name="artisteNationality" value=<?php echo $artistedetails->artisteNationality?>>
  </div>
    <button type="submit" class="btn btn-default">Confirm</button>
</form> 
</div>
