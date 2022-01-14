<div class="wrap">
    <div style="margin-top: 1rem;background: #ffc107;padding:1rem">
        <h1>Get Pro version</h1>
        <div>
            <h2>In the Pro version, you will get access to:</h3>
            <ul style="font-size:15px;">
                <li>- writing emails with custom names of your subscribers</li>
                <li>- custom text at the end of the email</li>
                <li>- custom desing</li>
                <li>- widgets on website</li>
                <li>- statistics of each email</li>
                <li>- record of all subscriptions and unsubscriptions for each user</li>
                <li>- scheduling of emails</li>
                <li>- automatic emails</li>
                <li>- automatic sending of the best articles once a day / week / month</li>
                <li>- and more</li>
            </ul>     
        </div>
        <div>
            <h2><a href="https://github.com/spooni01" target="blank">Get Pro version here.</a></h3>
        </div>
    </div>

    <div>
        <h1>Spooni Newsletter</h1>
    </div>
    <hr>
    <div>
        <h2>Links for subscription</h2>
        <table class="form-table">       
            <?php
            $count = 0;
            $terms = get_terms("spooni_newsletter_groups", array(
                'hide_empty' => 0,
            ));
            if (count($terms) > 0):
                    foreach ($terms as $term) : ?>
                        <?php $count++; ?>
                        <tr>
                            <th><label for="spooni_newsletter_group_<?php _e($term->slug); ?>"><?php _e($term->name); ?></label></th>
                            <td>
                                <?php echo get_bloginfo('wpurl');?>/?src=spooni_newsletter&action=subscribe&group=<?php _e($term->slug); ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
            <?php endif; ?>  

            <?php if($count == 0) : ?>
                <tr>
                    <th>No group set yet.</th>
                </tr>
            <?php endif; ?>
        </table>
    </div>
    
    <hr>
    <p>
        You are now using <span style="color: red;"><b><i>demo version</i></b></span>.
    </p>
    <p>
        You can get the full version by contacting <a href="https://github.com/spooni01" target="blank">Spooni</a>.
    </p>
    <p>
        All rights reserved.<br>
        No part of this program cannot be spread or changed without the written consent of the author.<br>
        The only author of this software is <a href="https://github.com/spooni01" target="blank">Spooni</a>.<br>
        <br>
        ©<?php echo date("Y"); ?><br>
    </p>
</div>