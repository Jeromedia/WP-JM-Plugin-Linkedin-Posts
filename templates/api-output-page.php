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
        <div>
            <?php
            if ($connection_posts->http_status_code === 200) {
                echo 'Connection to Posts: ✅';
            } else {
                echo 'Connection to Posts: ❌';
            }
            ?>
        </div>
        <div>
            <?php
            if ($connection_logo->http_status_code === 200) {
                echo 'Connection to Logo: ✅';
            } else {
                echo 'Connection to Logo: ❌';
            }
            ?>
        </div>
    </div>
    <div>
        <!-- <h2>Current cached and not expired</h2>
        <table>
            <tr>
                <th>Connection</th>
                <td>Test</td>
            </tr>
            <tr>
                <th>Logo</th>
                <td>Test</td>
            </tr>
            <tr>
                <th>Posts</th>
                <td>Test</td>
            </tr>
        </table> -->
    </div>
</div>