<!DOCTYPE html>
    <head>
        <title>Newsletter</title>
    </head>
    <body style="margin: 0 auto;width: 500px;font-family: sans-serif;">
        <div style="text-align: center;margin: 1rem auto;color: white;background: #607d8b;padding: 1rem">
            <h2>Subscribe for our newsletter!</h2>
        </div>
        <div>
            <?php if(isset($_GET['error']) || $error_msg) : ?>
                <div style="color: red;margin-bottom: 1rem;">
                    <?php if(isset($_GET['error'])) { echo $_GET['error']; } else { echo $error_msg; }; ?>
                </div>
            <?php endif; ?>    
            <form action="<?php echo home_url(); ?>/?src=spooni_newsletter&action=add_subscribe&group=<?php echo $_GET['group']; ?>" method="POST">
                Your e-mail:
                <input type="email" name="email" style="font-size: 15px;padding: 1rem;width: 93%;">
                <input type="submit" value="Subscribe" style="width: 100%;background: #607d8b;padding: 1rem;font-weight: 600;color: white;font-size: 17px;margin-top: 1rem;border: none;cursor:pointer">
            </form>
        </div>
    </body>
</html>