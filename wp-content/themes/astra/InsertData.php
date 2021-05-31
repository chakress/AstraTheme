<?php
/**
* Template Name:Insert
*/

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>
<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>
	<div id="primary" <?php astra_primary_class(); ?>>
		<?php 
		astra_primary_content_top();
		
		astra_content_loop();

		astra_pagination();

		astra_primary_content_bottom(); 
		?>
	</div><!-- #primary -->
	
<?php 
if ( astra_page_layout() == 'right-sidebar' ) :

	get_sidebar();

endif;
?>
<form method="POST">
	Enter name: <input type="text" name="nm">
	<br><br>
	Enter class: &sn <input type="text" name="class">
	<br><br>
	Enter marks: <input type="text" name="marks">
	<br><br>
	<input type="submit" value="Insert Record" name="insert">
	
	</form>
	<?php
		if(isset($_POST['insert']))
		{
			$n=$_POST['nm'];
			$c=$_POST['class'];
			$m=$_POST['marks'];
			
			global $wpdb;
			$sql=$wpdb->insert("student_record",array("name"=>$n,"class"=>$c,"marks"=>$m));
			if($sql==true){
				echo "<script>alert('data inserted')</script>";
			}
			else{
				echo "<script>alert('data not inserted')</script>";
			}
		}
	
get_footer();
