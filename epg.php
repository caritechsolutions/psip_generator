<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Event Schedule</title>
<link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'events.php'; ?>
<div class="epg">
    <div class="channels">
        <?php // Display channel names on the Y-axis
        $channels = array_unique(array_column($events, 'service_name')); // Get unique channel names
        foreach ($channels as $channel): ?>
            <div class="channel"><?php echo $channel; ?></div>
        <?php endforeach; ?>
    </div>
    <div class="events-grid">
        <!-- Display time slots at the top -->
        <div class="time-slots"></div>
        <!-- Events grid with time slots -->
        <?php
        $timeSlots = range(strtotime('00:00'), strtotime('23:00'), 3600); // Generate time slots every hour
        foreach ($timeSlots as $time): ?>
            <div class="time-slot"><?php echo date('H:i', $time); ?></div>
        <?php endforeach; ?>
        <?php foreach ($events as $event): ?>
    <?php 
        $column = date('G', strtotime($event['start_time'])) + 2; // Calculate column position
        $row = array_search($event['service_name'], $channels) + 1; // Calculate row position
        $start = strtotime($event['start_time']); // Event start time
        $end = strtotime('+' . $event['duration'] . ' minutes', $start); // Event end time
        $duration = ($end - $start) / 60; // Event duration in minutes
        $top = ($start % 86400) / 60; // Convert start time to minutes within a day
    ?>
    <div class="event" style="grid-column: <?php echo $column; ?>; grid-row: <?php echo $row; ?>;
        width: <?php echo $duration + 1; ?>px; top: <?php echo $top; ?>px;">
        <div class="event-name"><?php echo $event['event_name']; ?></div>
    </div>
<?php endforeach; ?>
    </div>
</div>
<div class="slider"></div>
<script src="script.js"></script>
</body>
</html>
