	<div class="container">
	<br>
    <center><h1>Artiste</h1></center>
	<br>
  <div class="mb-2">
  <a class="btn btn-primary" href="?controller=artiste&action=verifyinsert" role="button">Dodaj</a>
  </div>

  <div class="table-responsive"> 
    <table class="table">
        <tr>
            <th>Artiste ID</th>
            <th>Artiste Name</th>
            <th>Artiste Nationality</th>
        </tr>
        <?php foreach ($artiste as $row): ?>
        <tr>
            <td><?php echo $row->artisteID ?></td>
            <td><?php echo $row->artisteName ?></td>
            <td><?php echo $row->artisteNationality ?></td>
            <td><a href="?controller=artiste&action=verifyupdate&art=<?php echo $row->artisteID?>" class="btn btn-primary btn-xs"> Edit</a></td>
            <td><a href="?controller=artiste&action=verifydelete&art=<?php echo $row->artisteID?>" class="btn btn-danger btn-xs"> Delete</a></td>

        </tr>
        <?php endforeach ?>
    </table>
	</div>
  </div>
 
    
