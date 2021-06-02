<div class="forma" >
<div class="title">Do you want to delete choosen row?</div>
<td><a href="?controller=artisteband&action=delete&ab=<?php echo $_GET["ab"]?>" class="DelBtn"> Confirm</a></td>
<td><a onclick="goBack()" class="DodajBtn">Back</a></td>

<script>
function goBack() {
  window.history.back();
}
</script>
</div>