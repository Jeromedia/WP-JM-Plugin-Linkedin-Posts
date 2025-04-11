<div id="jmli-dashboard" class="wrap">
    <h1>JM LinkedIn Posts - Dashboard</h1>
    <p>Welcome to the dashboard of JM LinkedIn Posts.</p>
    <div>
        <br>
        base_url: <?php echo jm_li_get_api_base_url(); ?><br>
        company: <?php echo jm_li_get_active_company_name(); ?><br>
        <!-- url: <?php echo jm_li_get_api_base_url() ."/posts/". jm_li_get_active_company_name(); ?><br> -->
        </div>


        <?php require_once JM_LI_PLUGIN_PATH . '/templates/' . 'shortcode-output-page.php'; ?>
    </div>
</div>