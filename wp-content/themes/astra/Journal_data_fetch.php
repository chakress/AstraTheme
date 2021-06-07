<?php
/*
 * Template Name: Journal Data Fetch
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

input[type=text]{
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

table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  text-align: center;
}
</style>
	<div id="datainsert">
		<h2>Author Details</h2>
		<p></p>
		<ol>
		
		<table class="center">
      <tbody>
		<?php
		global $wpdb;
		$all_journal_data = $wpdb->get_results($wpdb->prepare("SELECT * FROM wp_journal_sub_details",""),ARRAY_A);
		
		if(count($all_journal_data) >0){
			?>
			<table cellpadding="10" border="1">
			<tr>
				<th width="5%">Sl No</th>
				<th width="20%">Document Name</th>
				<th width="10%">Author's ID</th>
				<th width="20%">Author Submitted Date</th>
				<th width="40%">File Location</th>
				<th width="20%">Edit</th>
			</tr>
			<?php
			$count = 1;
			foreach($all_journal_data as $index => $student){
				?>
				<tr>	
						<td width='5%'><?php echo $count++; ?></td>
						<td width='20%'><?php echo $student['name']; ?></td>
						<td width='10%'><?php echo $student['jou_insert_id']; ?></td>	
						<td width='10%'><?php echo $student['jou_insert_date']; ?></td>
						<td width='40%'><?php echo $student['type']; ?></td>
						<td width='20%'>
							<a href="?page_id=2968&action=edit&id=<?php echo $student['id']; ?>"><button type='button'>EDIT</button>
							</a> 
						</td>
					</tr>
					<?php
			}
		}
			
			
		?>
		</tbody>  
    </table>
		</ol>
		
		
		
		
		</div>
	
	
<?php 
if ( astra_page_layout() == 'right-sidebar' ) :

	get_sidebar();

endif;

get_footer();
