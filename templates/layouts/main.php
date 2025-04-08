<?php require_once JM_LI_PLUGIN_PATH . 'assets/css/main.css';
?>
<div class="jmli-main-layout">
    <?php if (jm_li_get_testing_mode() === true): ?>
        <div class="testing-mode-active">
            <p>Testing mode is currently active.</p>
        </div>
    <?php endif; ?>
    <div>
        <?php require_once JM_LI_PLUGIN_PATH . '/templates/' . $page . '-output-page.php'; ?>
    </div>
</div>