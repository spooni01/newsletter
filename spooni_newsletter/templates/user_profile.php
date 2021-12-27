<hr>
<h3><?php _e("Newsletter", "blank"); ?></h3>

<table class="form-table">       
    <?php
    
    $terms = get_terms("spooni_newsletter_groups", array(
        'hide_empty' => 0,
    ));
    if (count($terms) > 0):
            foreach ($terms as $term) : ?>
                <tr>
                    <th><label for="spooni_newsletter_group_<?php _e($term->slug); ?>"><?php _e($term->name); ?></label></th>
                    <td>
                        <input type="checkbox" name="<?php _e($term->slug); ?>" id="spooni_newsletter_group_<?php _e($term->slug); ?>" value="subscribed" <?php if(esc_attr(get_the_author_meta($term->slug, $user->ID ))=="subscribed"){ echo "checked"; } ?> class="regular-text">
                        <span class="description"><?php _e("Subscription for <i>".$term->name."</i>."); ?></span>
                    </td>
                </tr>
            <?php endforeach; ?>
    <?php endif; ?>    
</table>
<hr>
