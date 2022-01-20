<div style="margin-bottom: 1rem;">
    <div style="display:inline-block; width:30%;text-align:center">
        <div style="font-size:30px; margin: 1rem; font-weight: 600"><?php echo $total_num_of_seen; ?></div>
        <div>Total number of seen</div>
    </div>
    <div style="display:inline-block; width:30%;text-align:center">
        <div style="font-size:30px; margin: 1rem; font-weight: 600"><?php echo round(($num_of_opened_emails/$num_of_emails)*100, 2); ?>%</h2></div>
        <div><?php echo $num_of_opened_emails." of ".$num_of_emails; ?> emails was opened</div>
    </div>
    <div style="display:inline-block; width:30%;text-align:center">
        <div style="font-size:30px; margin: 1rem; font-weight: 600"><?php echo round($total_num_of_seen/$num_of_opened_emails,2); ?></h2></div>
        <div>Average number of reopen</div>
    </div>
</div>
<hr>
<div>
    <div style="font-size:17px; margin: 1rem 0; font-weight:600">Email seen by:</div>
    <?php foreach($users_seen_email as $user) : ?>
        <div>
            <?php echo $user->first_name." ".$user->last_name." (".$user->user_email.")"; ?>
        </div>
    <?php endforeach; ?>
</div>