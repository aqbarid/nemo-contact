<?php
function delete_contact() {
	@$id = $_GET['id'];

	if (!empty($id)) {
	    global $wpdb;
			$table = $wpdb->prefix . 'nemocontact';
			$delete = $wpdb->delete( $table, array( 'ID' => $id));
		if($delete){
			echo "<meta http-equiv=\"refresh\" content=\"0; URL='".admin_url('admin.php?page=nemo-contact')."'\"/>";
		}else{
			echo "<meta http-equiv=\"refresh\" content=\"0; URL='".admin_url('admin.php?page=nemo-contact')."'\"/>";
		}
	}else{
			echo "<meta http-equiv=\"refresh\" content=\"0; URL='".admin_url('admin.php?page=nemo-contact')."'\"/>";
	}
}
?>