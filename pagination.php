<?php
$param="";
if (isset($_GET['searchText'])) {
	$param = "searchText=".$_GET['searchText']."&";
}
?>
<div class = "pagination"  >

<?php 
if ($page > 3) {
	$first_page = 1 ; ?>
	<a class="page-item"href="?<?=$param?>&per_page=<?=$numberpage?>&page=<?=$first_page?>" >First</a>

<?php } ?>


<?php for($num = 1 ; $num <= $total_page; $num++ ) { ?>
	<?php	if($num!=$page){ ?>
			<?php	if($num > $page - 3 && $num < $page +3 ){ ?>
				<a class="page-item" href="?<?=$param?>&per_page=<?=$numberpage?>&page=<?=$num?>"><?=$num?></a>
			<?php } ?>
	<?php } else { ?>
		<strong style="color : black" class="$page page-item"><?=$num?></strong>
	<?php } ?>
<?php } ?>
<?php 
if ($page < $total_page -3) {
	$last_page = $total_page ; ?>
	<a class="page-item"href="?<?=$param?>&per_page=<?=$numberpage?>&page=<?=$last_page?>" >Last</a>

<?php } ?>
</div>
 



