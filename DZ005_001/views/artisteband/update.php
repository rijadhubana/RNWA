<div class="forma">
<div class="title">Edit Artist Band</div>
<form action="?controller=artisteband&action=updateartisteband" method="POST">
  <div class="form-group">
    <input type="number" readonly class="form-control" placeholder="ArtisteBand ID:" name="artiste_bandID" value=<?php echo $artistebanddetails->artiste_bandID?>>
  <div class="form-group">
    <input type="text" class="form-control" name="bandRole"  placeholder="Band role:" value=<?php echo $artistebanddetails->bandRole?>>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="a_artisteID"  placeholder="Artiste ID:" value=<?php echo $artistebanddetails->a_artisteID?>>
  </div>
  <div class="form-group">
    <input type="text" class="form-control" name="b_bandID"  placeholder="Band ID:" value=<?php echo $artistebanddetails->b_bandID?>>
  </div>
    <button type="submit" class="DodajBtn">Confirm</button>
</form> 
</div>
