<?php require_once("../includes/db.connection.php"); ?>
<?php require_once("../includes/functions.php"); ?>
<?php include("../includes/layouts/header.php"); ?>

<div id="main">
	<div id="navigation">
		<ul class="subjects">
		<?php $subject_set = find_all_subjects(); ?>
		<?php
		while($subject = mysqli_fetch_assoc($subject_set)) {
		?>  
			<?php
				echo "<li";
				if($subject["id"] == $selected_subject_id){
					echo " class=\"selected\"";
				}
				echo ">";
			?>
			<li>
				<?php echo $subject["menu_name"]; ?>
				<?php $page_set = find_pages_for_subject($subject["id"]); ?>
				<ul class="pages">
				<?php
					while($page = mysqli_fetch_assoc($page_set)) {
				?>  
				<?php
					echo "<li";
					if($page["id"] == $selected_page_id){
						echo " class=\"selected\"";
					}
					echo ">";
				?> 
					<li><?php echo $page["menu_name"]; ?></li>
				<?php
					}
				?>
				<?php mysqli_free_result($page _set); ?>
				</ul>
			</li>
		<?php
			}
		?>
		<?php mysqli_free_result($subject_set); ?>
		</ul>
	</div>
	<div id="page">
		<h2>Manage Content</h2>
	</div>
</div>


<?php include("../includes/layouts/footer.php"); ?>
