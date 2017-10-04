<?php
    $corePath = preg_replace('/https?:\/\/[^\/]*/is', '', get_option("siteurl"));
    $tmp = str_replace('/view/license', '', dirname(__FILE__));
    $corePath .= '/wp-content/'.preg_replace('/^.*?\/(plugins\/.*?)$/is', '$1', str_replace("\\","/", $tmp));

    $plugin_version = plugin_get_version_WordPress_MagicScroll();
    $isKey = magictoolbox_WordPress_MagicScroll_get_data_from_db();
    $isScrollKey = false;
?>
<div class="license-container">
    <h1>Your Magic Scroll license</h1>

    <?php if (!$isKey) { ?>
    <div class="magictoolbox-trial-text">
        <p>You're using the <b>Trial</b> version (or license key isn't entered) of Magic Scroll.</p>
        <p>All features are included and there's no time limit.</p>

        </br>
        <h2><b>Upgrade now</b></h2>
        <p>To remove the red message "Magic Scroll&trade; trial version", buy a license:</p>
        <p><a href="<?php echo WordPressMagicScroll_url('https://www.magictoolbox.com/buy/magicscroll/','license page buy your license link'); ?>" target="_blank" class="button button-primary orange-button">Buy my Magic Scroll license &gt;</a></p>
        <p>
            <span>As well as no more nagging text, you'll enjoy:</span>
            <ul style="list-style-type: circle; margin-left: 35px;">
                <li>Free tech support</li>
                <li>12 months free updates</li>
                <li>30 day moneyback guarantee</li>
                <li>Choice of 20+ other modules</li>
            </ul>
        </p>

        </br>
        <h2><b>Register your Magic Scroll license</b></h2>
        <p>After buying your license, register it below:</p>
    </div>
    <?php } ?>
    <div>
        <?php if (!$isKey) { ?>
        <div class="CheckLicense" style="display:inline-block;">
            <div style="position: relative; display: inline-block; vertical-alight: middle;">
                <span>License key </span>
                <input class="license-key" type="text" placeholder="License key">
                <button class="button-primary register-btn main-b">Register</button>
                <div class="msg-wrapper">
                    <div class="scanner authentication">
                        <span>authentication</span>
                    </div>
                    <div class="key-is-not-correct sad-message">
                        The key is not correct.
                    </div>
                    <div class="license-failed sad-message">
                        License failed.
                    </div>
                    <div class="wordpress-error sad-message">
                        Wordpress error.
                    </div>
                    <div class="problem sad-message">
                        There was a problem with checking your license key. Please <a target="_blank" href="<?php echo WordPressMagicScroll_url('https://www.magictoolbox.com/contact/','license page problem contact link'); ?>">contact us</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } else { ?>
        <p><span>License key: <?php echo $isKey->license; ?></span></p>
        <?php } ?>
    </div>

    <div>
    </div>
    <br/>
    <hr style="max-width: 50%; margin-left: 0;">
    <p>Thanks for using Magic Scroll!</p>
</div>
