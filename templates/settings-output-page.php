<div id="jm-li-settings" class="wrap">
    <h1>JM LinkedIn Posts - Settings</h1>
    <p>Welcome to the Settings of JM LinkedIn Posts.</p>
    <div>
    <form method="post" action="options.php">
            <?php
            settings_fields('jm_li_settings_group');
            do_settings_sections('jm_li_settings');
            submit_button();
            ?>
        </form>
    </div>
</div>