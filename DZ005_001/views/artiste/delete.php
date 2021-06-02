<div class="forma" >
<div class="title">Do you want to delete choosen row?</div>
<td><a href="?controller=artiste&action=delete&art=<?php echo $_GET["art"]?>" class="DelBtn"> Confirm</a></td>
<td><a onclick="goBack()" class="DodajBtn">Back</a></td>

<script>
function goBack() {
  window.history.back();
}
</script>
</div>