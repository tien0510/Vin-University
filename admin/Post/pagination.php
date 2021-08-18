
<div class = "pagination"  >

<?php for($num = 1 ; $num <= $total_page; $num++ ) { ?>
	<?php	if($num!=$page){ ?>
			<?php	if($num > $page - 3 && $num < $page +3 ){ ?>
				<a class="page-item" href="?per_page=<?=$numberpage?>&page=<?=$num?>"><?=$num?></a>
			<?php } ?>
	<?php } else { ?>
		<strong style="color : black" class="$page page-item"><?=$num?></strong>
	<?php } ?>
<?php } ?>
</div>
 



