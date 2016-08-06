<?php
function dashboard(){
    echo '<link rel="stylesheet" href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">';
    echo '<script src="//code.jquery.com/jquery-1.12.3.js"></script>';
    echo '<script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>';

    global $wpdb;
    $table = $wpdb->prefix . 'nemocontact';
    $contacts = $wpdb->get_results("SELECT * FROM $table order by id desc");

    echo '<div class="wrap">';
        echo '<h1>Contact List</h1>';
        echo '<br>';
        echo '<table id="contact" class="display dataTable wp-list-table widefat" style="float:left;">';
            echo '<thead>';
            echo "<tr>";
                echo '<th scope="col" class="manage-column column-tags">Name</th>';
                echo '<th scope="col" class="manage-column column-tags">Email</th>';
                echo '<th scope="col" class="manage-column column-tags">Date</th>';
                echo '<th scope="col" class="manage-column column-tags"></th>';
                echo "</tr>";
            echo "</thead>";
        foreach($contacts as $contact){
            echo "<tr>";
            echo "<td>".$contact->name."</td>";
            echo "<td>".$contact->email."</td>";
            echo "<td>".$contact->date."</td>";
            echo "<td><a href='".admin_url('admin.php?page=delete-contact&id='.$contact->id)."'>Delete</a></td>";
            echo "</tr>";
        }
            echo "<tfoot>";
                echo "<tr>";
                echo '<th scope="col" class="manage-column column-tags">&nbsp;</th>';
                echo '<th scope="col" class="manage-column column-tags">&nbsp;</th>';
                echo '<th scope="col" class="manage-column column-tags">&nbsp;</th>';
                echo '<th scope="col" class="manage-column column-tags">&nbsp;</th>';
                echo "</tr>";
            echo "</tfoot>";
        echo "</table>";

    echo "</div>";

    echo '<script>';
    echo '$(document).ready(function(){$("#contact").DataTable({pageLength:10})});';
    echo '</script>';
    echo '<style>';
    echo '.dataTables_wrapper {max-width:1100px !important;}';
    echo '</style>';
}
?>
