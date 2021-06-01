<div class="container">
<form action="?controller=artisteband&action=updateartisteband" method="POST">
  <div class="form-group">
    <label for="artiste_bandID">ArtisteBand ID:</label>
    <input type="number" readonly class="form-control" name="artiste_bandID" value=<?php echo $artistebanddetails->artiste_bandID?>>
  <div class="form-group">
    <label for="bandRole">Band role:</label>
    <input type="text" class="form-control" name="bandRole" value=<?php echo $artistebanddetails->bandRole?>>
  </div>
  <div class="form-group">
    <label for="a_artisteID">Artiste ID:</label>
    <input type="text" class="form-control" name="a_artisteID" value=<?php echo $artistebanddetails->a_artisteID?>>
  </div>
  <div class="form-group">
    <label for="b_bandID">Band ID:</label>
    <input type="text" class="form-control" name="b_bandID" value=<?php echo $artistebanddetails->b_bandID?>>
  </div>
    <button type="submit" class="btn btn-default">Confirm</button>
</form> 
</div>
