<div class="forma">
	<div class="title">Add Artist Band</div>
	<form action="?controller=artisteband&action=insertartisteband" method="POST">
		<div class="form-group">
			<input type="number" class="form-control" name="artiste_bandID" placeholder="ArtisteBand ID:">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="bandRole" placeholder="Band role:">
		</div>
		<div class="form-group">
			<input type="number" class="form-control" name="a_artisteID" placeholder="Artiste ID:">
		</div>
		<div class="form-group">
			<input type="number" class="form-control" name="b_bandID" placeholder="Band ID:">
		</div>
			<button type="submit" class="DodajBtn">Confirm</button>
	</form> 
</div>