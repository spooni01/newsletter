<div class="wrap">
    <div>
        <h1>Statistics for all emails</h1>
    </div>

    <div style="margin: 1rem 0;padding: 3rem;background: #ffdab4;border-radius: 12px;">
        <div style="display:inline-block; width:45%;text-align:center">
            <div style="font-size:50px; margin: 1rem; font-weight: 600"><?php echo get_num_of_all_emails_seen(); ?></div>
            <div>Total number of seen</div>
        </div>
        <div style="display:inline-block; width:45%;text-align:center">
            <div style="font-size:50px; margin: 1rem; font-weight: 600"><?php echo round(get_num_of_all_emails_send(), 2); ?></h2></div>
            <div>Total number of emails send</div>
        </div>
    </div>
    <div style="margin-top:3rem">
        <h2>Recent emails</h2>
        Click on link to see email statistics.
        <ul>
        <?php
            foreach(get_recent_emails() as $email)
                echo '<li><a href="'.get_edit_post_link($email->ID).'" title="'.esc_attr($email->post_title).'">'.$email->post_title.'</a></li>';
        ?>
        </ul>
    </div>
</div>