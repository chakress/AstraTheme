<?php
/*
 * Template Name: Insert Deepaksha
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
<style> 
input[type=text] {
 
  border: none !important;
  border-bottom: 4px solid #A6A2A1 !important;
  padding: 20px 20px 20px 20px !important;
  margin: 8px 0 !important;
  transition: 0.5s all !important;
}

input[type=text]:focus {
  
  border: none !important;
  padding: 20px 20px 20px 20px !important;
  border-bottom: 4px solid #242A56 !important;
   margin: 8px 0 !important;
  transition: 0.5s all !important;
}
textarea:focus, input:focus{
    outline: none;
}

.center {
  text-align: center;
}

</style>

	<div id="datainsert">
		<form method="POST" class="wpac-custom-login-form">
			<input type="text" placeholder="Enter name" name="nm">
	<br><br>
	<input type="text" placeholder="Enter class" name="class">
	<br><br>
	<input type="text" placeholder="Enter marks" name="marks">
	<br><br>
	<input type="submit" value="Insert Record" name="insert">
		
		<?php 
			if(isset($_POST['insert']))
			{
				$n=$_POST['nm'];
				$c=$_POST['class'];
				$m=$_POST['marks'];
				
					
					global $wpdb;
					//$wpdb->insert("Table name", array());
					$sql=$wpdb->insert("wp_student_marks",array("name"=>$n,"class"=>$c,"marks"=>$m));
					
					if($sql==true)
					{
						echo"<script>alert('data inserted Successfully')</script>";
					} else {
						echo"<script>alert('error while inserting data to table')</script>";
					}
			}
		?>
	</div>
	
	

	<div class="wrap">
    <h2>CRUD Operations</h2>
    <table>
      <thead>
        <tr>
          <th>Sl No</th>
          <th>Name</th>
          <th>Class</th>
          <th>Marks</th>
		  <th>Update</th>
		  <th>Delete</th>
        </tr>
      </thead>
      <tbody>
		<?php
          $result = $wpdb->get_results("SELECT * FROM wp_student_marks ORDER BY ID DESC");
          foreach ($result as $print) {
            ?>
              <tr>	
               <td><input type="text" name="user_id" value="<?php echo ($print->id);?>"></td>
				<td><input type="text" name="user_name" value="<?php echo ($print->name);?>" ></td>
                <td><input type="text" name="user_class" value="<?php echo ($print->class);?>" ></td>
				<td><input type="text" name="user_marks" value="<?php echo ($print->marks);?>" ></td>	
                <td><input type="submit" value="Update" name="update"></td>
				<td><input type="submit" value="Delete" name="delete"> </td>
								
			  </tr>
           <?php
          }
        ?>
      </tbody>  
    </table>
    <br>
    <br>
	
   
  </div>
  </form>
  
<?php 
		if(isset($_POST['update'])){
			$i=$_POST['user_id'];
			$n=$_POST['user_name'];
			$c=$_POST['user_class'];
			$m=$_POST['user_marks'];
		$sql=$wpdb->update('wp_student_marks',array("name"=>$n,"class"=>$c,"marks"=>$m),array("id"=>$i));
		}
		
		if(isset($_POST['delete'])){
		$wpdb->delete( 'wp_student_marks', array( "id"=>$i ) );
		}

if ( astra_page_layout() == 'right-sidebar' ) :

	get_sidebar();

endif;

get_footer();
