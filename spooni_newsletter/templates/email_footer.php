<?php
$mail_footer = "
    <div style='text-align:center;width:100%'>
        <div style='margin-top:2rem; font-size:12px; color: #787878; text-align:center;width:400px;margin-right: auto; margin-left: auto'>
            <a style='color: #787878' href='".get_permalink($post_id)."'>Show email in new tab</a>.
            <br>
            This email was delivered to you because you subscribed to our newsletter. Don't want to subscribe to these emails anymore?<br>
            <a style='color: #787878' href='".$url."/?src=spooni_newsletter&action=unsubscribe&group=".$slugs_of_groups[0]."&hash=".$hash."&usid=".$user->ID."'>You can unsubscribe here</a>.
        </div>
        <img style='display:none' src='".get_bloginfo('wpurl')."/?src=spooni_newsletter&action=email_seen&mail_id=".$post_id."&hash=".$hash."&usid=".$user->ID."'>
    </div>";
?>