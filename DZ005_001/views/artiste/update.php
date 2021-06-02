<div class="forma">
<div class="title">Edit Artist</div>
<form action="?controller=artiste&action=updateartiste" method="POST">
  <div class="form-group">
    <input type="number" readonly class="form-control" placeholder="Artiste ID:" name="art" value=<?php echo $artistedetails->artisteID?>>
  <div class="form-group">
    <input type="text" class="form-control" name="artisteName" placeholder="Artiste name:" value=<?php echo $artistedetails->artisteName?>>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="artisteNationality" placeholder="Artiste nationality:" value=<?php echo $artistedetails->artisteNationality?>>
  </div>
    <button type="submit" class="DodajBtn">Confirm</button>
</form> 
</div>
