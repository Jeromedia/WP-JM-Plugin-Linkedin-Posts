<div id="jm-li-dashboard" class="wrap">
    <h1>JM LinkedIn Posts - API Connection</h1>
    <?php //echo $connection->connection_message ?>
    <?php //echo $connection_posts->connection_message ?>
    <div style="display: flex; 
flex-direction: column; ">
        <div>
            <?php
            if ($connection->http_status_code === 200) {
                echo 'Connection to Jeromedia: ✅';
            } else {
                echo 'Connection to Jeromedia: ❌';
            }
            ?>
        </div>
    </div>
</div>