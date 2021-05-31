<?php
/**
 * Template Name: Insert
 */

if ( ! defined( 'ABSPATH' ) )  {
	exit; // Exit if accessed directly.
}

get_header(); ?>
<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>
	<div id="primary" <?php astra_primary_class(); ?>>
		<form method="POST">
			Enter Name: <input type="text" name="nm">
			<br><br>
			Enter Class:<input type="text" name="class">
			<br><br> 
			Enter Marks:<input type="text" name="marks">
			<br><br> 
			<input type="Submit" value="Insert Record" name="insert">
			<br><br> 
		</form>
		<?php
		if(isset($_POST['insert']))
		{
			$n=$_POST['nm'];
			$c=$_POST['class'];
			$m=$_POST['marks'];
			
			global $wpdb;
			//$wpdb ->insert("TableName", array(); 
			$sql=$wpdb->insert("wp_student_marks", array("name"=>$n,"class"=>$c,"marks"=>$m));
			
			if($sql==true)
			{
				echo"<script>alert('data inserted')</script>";
			}
			else 
			{
				echo"<script>alert('Falied to Insert')</script>";
			}
		}
		?>
	</div><!-- #primary -->
<?php 
if ( astra_page_layout() == 'right-sidebar' ) :

	get_sidebar();

endif;

get_footer();
