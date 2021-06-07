<?php
/*
 * Template Name: Journal Reviewer Edit Template
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
global $wpdb, $current_user;
get_currentuserinfo();
$current_user=wp_get_current_user();
$current_username = $current_user->user_login;

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

label{
	font-weight: bold;
	width: 200px;
	display: inline-block;
   text-align: left;
}

input[type=text], input:disabled{
  border: none !important;
  border-bottom: 2px solid #f39c12 !important;
  padding: 10px 10px 10px 20px !important;
  background-color: #F6F2F1 !important;
  color: #242A56 !important;
  margin: 4px 0 !important;
  transition: 0.5s all !important;
}

input[type=text]:focus{
  border: none !important;
  padding: 10px 10px 10px 20px !important;
  background-color: #FFFFFF !important;
  border-bottom: 4px solid #162636 !important;
   margin: 4px 0 !important;
  transition: 0.5s all !important;
}
textarea:focus, input:focus{
    outline: none;
}

.center {
  text-align: center;
}

textarea{
	width: 80%;
	border-style: solid;
	border-width:2px !important;
	border-color:#f39c12;
	border-style:solid;
	padding-left:10px;
	padding-right:20px;
	padding-top:10px;
	padding-bottom:10px;
	vertical-align: middle;
}

textarea:focus{
	width: 80%;
	border-style: solid;
	border-width:3px !important;
	border-color:#f39c12;
	border-style:solid;
	padding-left:10px;
	padding-right:20px;
	padding-top:10px;
	padding-bottom:10px;
	vertical-align: middle;
}

.custom-file-upload, custom-file-upload:focus{
	border-style: solid;
	border-width:2px !important;
	border-color:#f39c12;
	border-style:solid;
	padding-left:10px;
	padding-right:20px;
	padding-top:10px;
	padding-bottom:10px;
    display: inline-block;
    cursor: pointer;
}

</style>

	<div id="datainsert">
		<form method="POST" class="wpac-custom-login-form">	
				<label for="manu_nbr">Manuscript Number:</label>
				<input type="text" readonly="readonly" name="manu_nbr" value="<?php echo isset($row_details['jou_manuscript_number']) ? $row_details['jou_manuscript_number'] : ""; ?>"></input>
			<br><br>
				<label for="full_title">Full Title:</label>
				<input type="text" name="full_title" size="100" value="<?php echo isset($row_details['jou_full_title']) ? $row_details['jou_full_title'] : ""; ?>" placeholder="Enter Full Title"/>
			<br><br>
				<label for="article_type">Article Type:</label>
				<input type="text" name="article_type" size="50" placeholder='Please Enter Article Type'></input>
			<br><br>
				<label for="section_category">Section / Category:</label>
				<input type="text" name="section_category" size="100" placeholder='Please Enter Section / Category'></input>
			<br><br>
				<label for="funding_info">Funding Information:</label>
				<input type="text" name="funding_info" size="100" placeholder='Please Enter Funding Information'></input>
			<br><br>	
				<label for="abstract">Abstract:</label>
				<textarea type="text" name="abstract" placeholder='Enter Abstract of the thesis' rows="10"></textarea>
			<br><br>
				<label for="corr_author">Co-Author:</label>
				<textarea type="text" name="corr_author" placeholder='Enter Author names separated by line' rows="4"></textarea>
			<br><br>
				<label for="corr_author_email">Co-Author Email:</label>
				<input type="text" name="corr_author_email" size="100" placeholder='Please Enter Author Email'></input>
			<br><br>
				<label for="corr_author_sec_info">Co-Author Secondary Information:</label>
				<input type="text" name="corr_author_sec_info" size="100" placeholder='Please Enter Secondary Author Information'></input>
			<br><br>
				<label for="corr_author_institution">Co-Author Institution:</label>
				<input type="text" name="corr_author_institution" size="100" placeholder='Please Enter Authors Institution'></input>
			<br><br>
				<label for="corr_author_sec_institution">Co-Author Secondary Institution:</label>
				<input type="text" name="corr_author_sec_institution" size="100" placeholder='Please Enter Authors Secondary Institution'></input>
			<br><br>
				<label for="first_author">First Author:</label>
				<input type="text" name="first_author" size="50" placeholder='Please Enter First Author'></input>
			<br><br>
				<label for="first_author_sec_info">First Author Secondary Information:</label>
				<input type="text" name="first_author_sec_info" size="100" placeholder='Please Enter First Author Information'></input>
			<br><br>
				<label for="order_of_authors">Order Of Authors:</label>
				<textarea type="text" name="order_of_authors" placeholder='Please enter the Author orders to display on the Journal' rows="3"></textarea>
			<br><br>
				<label for="order_of_authors_sec_info">Order of Author's Secondary Information:</label>
				<input type="text" name="order_of_authors_sec_info" size="100" placeholder='Please Enter Order of Authors secondary Information'></input>
			<br><br>
				<label for="author_comments">Author Comments:</label>
				<textarea type="text" name="author_comments" placeholder='Please enter the Author comments if any' rows="3"></textarea>
			<br><br>
				<label for="sugg_reviews">Suggested Reviews:</label>
				<textarea type="text" name="sugg_reviews" placeholder='Please enter suggested reviews if any' rows="3"></textarea>
			<br><br>
				<label for="keywords">Keywords:</label>
				<textarea type="text" name="keywords" placeholder='Please enter Journal Keywords' rows="3"></textarea>
			<br><br>
				<label for="journal_file">Choose file to upload:</label>
				<input class="custom-file-upload" type="file" id="journal_file" name="journal_filename">
			<br><br>
				<div class="btn-group">
					<input type="submit" value="Submit" name="jour_insert">
					<input type="submit" value="Cancel" name="cancel">
					<input type="submit" value="Clear Data" name="clear_data">
				</div>
			<br><br>
		</form>
		<?php 
			$action = isset($_GET['action'])?trim($_GET['action']):"";
			$id = isset($_GET['id'])?intval($_GET['id']): "";
			
			$row_details = $wpdb->get_row(
				$wpdb->prepare(
					"SELECT * FROM wp_journal_sub_details WHERE id = %d",$id
				)
			);
			print_r($row_details);
		?>
	</div>
	
	
<?php 
if ( astra_page_layout() == 'right-sidebar' ) :

	get_sidebar();

endif;

get_footer();
