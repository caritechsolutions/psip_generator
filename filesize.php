<?php

function formatFileSize($bytes) {
    return number_format($bytes);
}

clearstatcache();
$files = [
    "/var/www/html/transports/ts3/ts3_eit0.xml",
    "/var/www/html/transports/ts3/ts3_eit1.xml",
    "/var/www/html/transports/ts3/ts3_eit2.xml",
    "/var/www/html/transports/ts3/ts3_eit3.xml",
    "/var/www/html/transports/ts3/ts3_eit4.xml",
    "/var/www/html/transports/ts3/ts3_eit5.xml",
    "/var/www/html/transports/ts3/ts3_eit6.xml",
    "/var/www/html/transports/ts3/ts3_eit7.xml",
    "/var/www/html/transports/ts3/ts3_ett0.xml",
    "/var/www/html/transports/ts3/ts3_ett1.xml",
    "/var/www/html/transports/ts3/ts3_ett2.xml",
    "/var/www/html/transports/ts3/ts3_ett3.xml",
    "/var/www/html/transports/ts3/ts3_ett4.xml",
    "/var/www/html/transports/ts3/ts3_ett5.xml",
    "/var/www/html/transports/ts3/ts3_ett6.xml",
    "/var/www/html/transports/ts3/ts3_ett7.xml"
];

foreach ($files as $file) {
    echo formatFileSize(filesize($file)) . "</br>";
}



?>