	<div class="container">
	<br>
    <center><h1>ArtisteBand</h1></center>
	<br>
  <div class="mb-2">
  <a class="btn btn-primary" href="?controller=artisteband&action=verifyinsert" role="button">Dodaj</a>
  </div>

  <div class="table-responsive"> 
    <table class="table">
        <tr>
            <th>ArtisteBand ID</th>
            <th>Band Role</th>
            <th>Artiste ID</th>
            <th>Band ID</th>
        </tr>
        <?php foreach ($artisteband as $row): ?>
        <tr>
            <td><?php echo $row->artiste_bandID ?></td>
            <td><?php echo $row->bandRole ?></td>
            <td><?php echo $row->a_artisteID ?></td>
            <td><?php echo $row->b_bandID ?></td>
            <td><a href="?controller=artisteband&action=verifyupdate&ab=<?php echo $row->artiste_bandID?>" class="btn btn-primary btn-xs"> Edit</a></td>
            <td><a href="?controller=artisteband&action=verifydelete&ab=<?php echo $row->artiste_bandID?>" class="btn btn-danger btn-xs"> Delete</a></td>

        </tr>
        <?php endforeach ?>
    </table>
	</div>
  </div>
 
    
