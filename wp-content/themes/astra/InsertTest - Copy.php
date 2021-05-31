<?php
/*
 * Template Name: Insert Santosh
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
   width: 25%;
  border: none !important;
  border-bottom: 4px solid #A6A2A1 !important;
  padding: 20px 20px 20px 20px !important;
  background-color: #FFFFFF !important;
  color: #242A56 !important;
  margin: 8px 0 !important;
  transition: 0.5s all !important;
}

input[type=text]:focus {
  width: 25%;
  border: none !important;
  padding: 20px 20px 20px 20px !important;
  background-color: #F6F2F1 !important;
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
		</form>
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
    <table class="center">
      <thead>
        <tr>
          <th width="20%">Sl No</th>
          <th width="20%">Name</th>
          <th width="20%">Class</th>
          <th width="20%">Marks</th>
		  <th width="20%">Update</th>
		  <th width="20%">Delete</th>
        </tr>
      </thead>
      <tbody>
		<?php
          $result = $wpdb->get_results("SELECT * FROM wp_student_marks ORDER BY ID DESC");
          foreach ($result as $print) {
            echo "
              <tr>	
                <td width='20%'>$print->id</td>
                <td width='20%'>$print->name</td>
                <td width='20%'>$print->class</td>
				<td width='20%'>$print->marks</td>
                <td width='20%'><a href='admin.php?page=services.php&upt=$print->id'><button type='button'>UPDATE</button></a> </td>
				<td width='20%'><a href='admin.php?page=services.php&del=$print->id'><button type='button'>DELETE</button></a> </td>
								
			  </tr>
            ";
          }
        ?>
      </tbody>  
    </table>
    <br>
    <br>
    <?php
	if (isset($_POST['uptsubmit'])) {
    $id = $_POST['uptid'];
    $name = $_POST['uptname'];
    $class = $_POST['uptclass'];
	$marks = $_POST['uptmarks'];
    $wpdb->query("UPDATE wp_student_marks SET name='$name',class='$class', marks='$marks' WHERE user_id='$id'");
  }
      if (isset($_GET['upt'])) {
        $upt_id = $_GET['upt'];
        $result = $wpdb->get_results("SELECT * FROM wp_student_marks WHERE user_id='$upt_id'");
        foreach($result as $print) {
          $name = $print->name;
          $class = $print->class;
		  $marks = $print->marks;
		  echo "<script>location.replace('admin.php?page=services.php');</script>";
        }
        echo "
        <table class='wp-list-table widefat striped'>
          <thead>
            <tr>
              <th width='20%'>User ID</th>
              <th width='20%'>Name</th>
              <th width='20%'>Class</th>
              <th width='20%'>Marks</th>
			  <th width='20%'>Actions</th>
            </tr>
          </thead>
          <tbody>
            <form action='' method='post'>
              <tr>
                <td width='25%'>$print->user_id <input type='hidden' id='uptid' name='uptid' value='$print->user_id'></td>
                <td width='25%'><input type='text' id='uptname' name='uptname' value='$print->name'></td>
                <td width='25%'><input type='text' id='uptclass' name='uptclass' value='$print->class'></td>
				<td width='25%'><input type='text' id='uptmarks' name='uptmarks' value='$print->marks'></td>
                <td width='25%'><button id='uptsubmit' name='uptsubmit' type='submit'>UPDATE</button> <a href='admin.php?page=services.php'><button type='button'>CANCEL</button></a></td>
              </tr>
            </form>
          </tbody>
        </table>";
      }
    ?>
  </div>
  
<?php 
if ( astra_page_layout() == 'right-sidebar' ) :

	get_sidebar();

endif;

get_footer();
