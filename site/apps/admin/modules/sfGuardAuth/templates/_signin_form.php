<?php use_helper('I18N') ?>

<div id="da-login">
    <div id="da-login-box-wrapper">
        <div id="da-login-top-shadow">
        </div>
        <div id="da-login-box">
            <div id="da-login-box-header">
                <h1>Reminder system Login</h1>
            </div>
            <div id="da-login-box-content">
                
                <form id="da-login-form" action="<?php echo url_for('@sf_guard_signin') ?>" method="post">
                    <?php echo $form['_csrf_token']; ?>
                    <?php echo $form['username']->renderError(); ?>
                    <div id="da-login-input-wrapper">
                        <div class="da-login-input">
                            <?php echo $form['username']->render(array('id'=>'da-login-username', 'placeholder'=>'Username')); ?>
                        </div>
                        <div class="da-login-input">
                            <?php echo $form['password']->renderError(); ?>
                            <?php echo $form['password']->render(array('id'=>'da-login-password', 'placeholder'=>'Password')); ?>
                        </div>
                        <div class="da-login-input">
                            <?php echo $form['remember']->render(); ?> Remember me?
                        </div>
                    </div>
                    <div id="da-login-button">
                        <input type="submit" value="Login" id="da-login-submit" />
                    </div>
                </form>
            </div>
            <div id="da-login-box-footer">
                <a href="#">forgot your password?</a>
                <div id="da-login-tape"></div>
            </div>
        </div>
        <div id="da-login-bottom-shadow">
        </div>
    </div>
</div>
