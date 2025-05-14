<?php
// Database configuration
$servername = "localhost";
$username = "newroot";
$password = "Password!10";
$dbname = "cariepg";

try {
    // Create connection
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // Set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Array of services
    $services = [
        "0x0001" => "TLC-GUYANA",
        "0x0002" => "NCN-GUYANA",
        "0x03E8" => "1000-TLC-Radio",
        "0x03E9" => "NCN-RADIO",
        "0x03EA" => "1002-TLC-Radio-3",
        "0x0730" => "BET",
        "0x078A" => "SONY-MOVIES",
        "0x07D0" => "PARAMOUNT",
        "0x07DA" => "TNTSERIES",
        "0x07E4" => "TRAVEL",
        "0x07EE" => "ALJAZEERA",
        "0x07F8" => "DISC-I",
        "0x0816" => "TLCL",
        "0x0820" => "UNIVERSAL-TV",
        "0x082A" => "WBTV",
        "0x0834" => "GODTV",
        "0x083E" => "REVIVAL",
        "0x0848" => "SONY",
        "0x085C" => "H2",
        "0x0866" => "LIFETIME-LAT",
        "0x0870" => "AE-LAT",
        "0x087A" => "DREAMWORKS",
        "0x0884" => "USA",
        "0x088E" => "MSNBC",
        "0x08A2" => "COOKING",
        "0x08CA" => "COMEDY",
        "0x01F4" => "ESPNCAR",
        "0x01FE" => "ESPN2",
        "0x0294" => "HBO2",
        "0x02A8" => "HBOF",
        "0x03CA" => "SM1",
        "0x03D4" => "SM2",
        "0x03DE" => "TNT",
        "0x0456" => "AE",
        "0x0460" => "HISTE",
        "0x046A" => "HBO",
        "0x04BA" => "TURCM",
        "0x04CE" => "NATGEO",
        "0x04D8" => "HBOMUN",
        "0x04E2" => "HBOPOP",
        "0x04EC" => "HBOEXT",
        "0x04F6" => "LIFETIME",
        "0x0500" => "LIFE-MN",
        "0x06D6" => "AMCLA",
        "0x06E0" => "ADULTSWIM",
        "0x06EA" => "VH1",
        "0x06F4" => "FOXSR",
        "0x06FE" => "AXN",
        "0x0712" => "BBCWLA",
        "0x071C" => "BLOOMBERG",
        "0x006E" => "ANIMP",
        "0x01D6" => "CARTOONITO",
        "0x02B2" => "HBOPLUS",
        "0x02BC" => "HBOS",
        "0x0302" => "CNNUS",
        "0x037A" => "WPLG-ABC",
        "0x0384" => "WFOR-CBS",
        "0x0398" => "WPBT-PBS",
        "0x03A2" => "WTVJ-NBC",
        "0x041A" => "HGTVE",
        "0x0492" => "FOXSOC",
        "0x04A6" => "FOXNUS",
        "0x074E" => "DISC-HOME",
        "0x0762" => "DISC-SCI",
        "0x076C" => "DISC-TURBO",
        "0x07B2" => "FOXS2"
    ];

    // Prepare SQL and bind parameters
    $stmt = $conn->prepare("INSERT INTO services (service_id, service_name) 
                            VALUES (:service_id, :service_name)
                            ON DUPLICATE KEY UPDATE service_name = VALUES(service_name)");

    foreach ($services as $service_id => $service_name) {
        $stmt->bindParam(':service_id', $service_id);
        $stmt->bindParam(':service_name', $service_name);
        $stmt->execute();
    }

    echo "Service data inserted/updated successfully!";
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

$conn = null;

?>
