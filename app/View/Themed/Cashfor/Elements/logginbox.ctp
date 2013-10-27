<?php if ($loggedIn) { ?>
    <div id="re-investors">
        <span>Hello <?php echo $this->Auth->user('firstname');?></span>
        <div id="re-wrapper">
            <a href="/professionals/account" id="re-signin" title="Real Estate Investors Sign in Link"><span>Account</span></a><a href="/logout" id="re-register" title="Real Estate Investors Register Link"><span>Sign Out</span></a>
        </div>
    </div>
<?php } else { ?>
    <div id="re-investors">
        <span>Real Estate Investors</span>
        <div id="re-wrapper">
            <a href="/login" id="re-signin" title="Real Estate Investors Sign in Link"><span>Sign In</span></a><a href="/register/personal-info" id="re-register" title="Real Estate Investors Register Link"><span>Register</span></a>
        </div>
    </div>
<?php } ?>


