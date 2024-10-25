<?php
echo '<pre>';
passthru('php artisan config:cache');
passthru('php artisan route:cache');
passthru('php artisan view:cache');
passthru('php artisan cache:clear');
echo '</pre>';
?>
