<div class="wrap">
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
                                <a target="_blank" href="<?php echo get_bloginfo('wpurl');?>/?src=spooni_newsletter&action=subscribe&group=<?php _e($term->slug); ?>">
                                    <?php echo get_bloginfo('wpurl');?>/?src=spooni_newsletter&action=subscribe&group=<?php _e($term->slug); ?>
                                </a>
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
        If you want to add users name to email, just add <i>{{first_name}}</i> into text.
        You can also get <i>{{last_name}}</i>, <i>{{name}}</i>, or <i>{{email}}</i>.
    </p>
    <hr>
   
    <p>
        All rights reserved.<br>
        No part of this program cannot be spread or changed without the written consent of the author.<br>
        The only author of this software is <a href="https://github.com/spooni01" target="blank">Spooni</a>.<br>
        <br>
        ©<?php echo date("Y"); ?><br>
    </p>
</div>