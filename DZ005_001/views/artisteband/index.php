	<div class="desniTableDiv">
		<div class="desniTableNaslov">
			<center><h2>ArtisteBand</h2></center>
		</div>
  <div class="AddBtn">
  <a class="DodajBtn" href="?controller=artisteband&action=verifyinsert" role="button">New <i class="fa fa-plus"></i></a>
  </div>

 
    <table class="tabela">
        <tr>
            <th>ArtisteBand ID</th>
            <th>Band Role</th>
            <th>Artiste ID</th>
            <th>Band ID</th>
						<th colspan="2"></th>
        </tr>
        <?php foreach ($artisteband as $row): ?>
        <tr>
            <td><?php echo $row->artiste_bandID ?></td>
            <td><?php echo $row->bandRole ?></td>
            <td><?php echo $row->a_artisteID ?></td>
            <td><?php echo $row->b_bandID ?></td>
            <td><a href="?controller=artisteband&action=verifyupdate&ab=<?php echo $row->artiste_bandID?>" class="actionBtn"><i class="fa fa-edit"></i></a></td>
            <td><a href="?controller=artisteband&action=verifydelete&ab=<?php echo $row->artiste_bandID?>" class="actionBtn"><i class="fa fa-trash"></i></a></td>

        </tr>
        <?php endforeach ?>
    </table>
	</div>
 
    
