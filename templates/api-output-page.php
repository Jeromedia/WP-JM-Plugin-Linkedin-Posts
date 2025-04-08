<div id="jm-li-dashboard" class="wrap">
    <h1>JM LinkedIn Posts - API Connection</h1>

    <div>
        <?php if ($connection && isset($connection->http_status_code) && $connection->http_status_code === 200): ?>
            <p>✅ Connection: <?php echo esc_html($connection->connection_message); ?> to <?php echo esc_html($company); ?>
            </p>
        <?php elseif ($connection && isset($connection->http_status_code)): ?>
            <p>⚠️ Not connected to <?php echo esc_html($company); ?></p>
            <p><strong>Reason:</strong> <?php echo esc_html($connection->reason ?? 'Unknown'); ?></p>
        <?php else: ?>
            <p>⚠️ Could not fetch connection data.</p>
        <?php endif; ?>

        <?php if ($connection && isset($connection->http_status_code) && $connection->http_status_code !== 200 && $connection->http_status_code !== 403): ?>
            <h2>Reconnection Needed?</h2>
            <p><a href="<?php echo esc_url($base_url . '/linkedin/connect/jeromedia'); ?>">Reconnect now</a></p>
        <?php endif; ?>
    </div>
    <div>
        <h2>Current cached and not expired</h2>
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
        </table>
    </div>
</div>