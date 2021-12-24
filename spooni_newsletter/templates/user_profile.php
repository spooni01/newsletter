<h3><?php _e("Newsletter", "blank"); ?></h3>

<table class="form-table">
    <?php //todo: List groups of newsletters */ ?>
    <tr>
        <th><label for="subscriber"><?php _e("Subscriber"); ?></label></th>
        <td>
            <input type="checkbox" name="subscriber" id="subscriber" value="subscriber" <?php if(esc_attr(get_the_author_meta("subscriber", $user->ID ))=="subscriber"){ echo "checked"; } ?> class="regular-text">
            <span class="description"><?php _e("Subscription for newsletter emails."); ?></span>
        </td>
    </tr>
</table>