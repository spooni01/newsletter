<?php

function can_manage_options() {
    if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
        return false;
	}
    
    return true;
}

?>