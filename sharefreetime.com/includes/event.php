<?php 
    function displayEvent($eventTitle, $eventLocation, $eventDate, $eventTime, $eventRate, $eventAutor) {
        echo '
        <article>
            <div class="well row">
                <h1 class="event-name"><?php echo $eventTitle ?></h1>
                <div>
                    <div class="event-location"><?php echo $eventLocation ?></div>
                    <div class="event-date"><?php echo $eventDate ?></div>
                    <div class="event-time"><?php echo $eventTime ?></div>
                    <div class="event-rate"><?php echo $eventRate ?></div>
                    <div class="event-autor"><?php echo $eventAutor ?></div>
                </div>
            </div>
        </article>';
    }
?>
   

   