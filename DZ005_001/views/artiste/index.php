	
	<div class="desniTableDiv">
		<div class="desniTableNaslov">
			<center><h2>Artiste</h2></center>
		</div>
  <div class="AddBtn">
		<a class="DodajBtn" href="?controller=artiste&action=verifyinsert" role="button">New <i class="fa fa-plus"></i></a>
  </div>

    <table class="tabela">
        <tr>
            <th>Artiste ID</th>
            <th>Artiste Name</th>
            <th>Artiste Nationality</th>
						<th colspan="2"></th>
        </tr>
        <?php foreach ($artiste as $row): ?>
        <tr>
            <td><?php echo $row->artisteID ?></td>
            <td><?php echo $row->artisteName ?></td>
            <td><?php echo $row->artisteNationality ?></td>
            <td><a href="?controller=artiste&action=verifyupdate&art=<?php echo $row->artisteID?>" class="actionBtn"><i class="fa fa-edit"></i></a></td>
						<td><a href="?controller=artiste&action=verifydelete&art=<?php echo $row->artisteID?>" class="actionBtn"><i class="fa fa-trash"></i></a></td>

        </tr>
        <?php endforeach ?>
    </table>
  </div>
 
    
