<div id="jm-li-dashboard" class="wrap">
    <h1>JM LinkedIn Posts - Dashboard</h1>
    <p>Welcome to the dashboard of JM LinkedIn Posts.</p>
    <div>
        <ul>
            <?php
            foreach ($posts as $post) {
                if ($post['lifecycleState'] == "PUBLISHED" && $post['visibility'] == "PUBLIC") {
                    echo '<li>';
                    echo $post['commentary'];
                    echo '</li>';
                } else {
                    echo "no data";
                }
            }
            ?>
        </ul>
    </div>
</div>