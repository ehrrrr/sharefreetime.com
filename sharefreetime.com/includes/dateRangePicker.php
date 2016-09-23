<form>
   <?php 
    $currentDateTime = date("d/m/Y h:i:sa");
    $newDateTime = date('h:i A', strtotime($currentDateTime));
    $date = date("d/m/Y");
    $currentDateTime = $date . " " . $newDateTime?>
    <div class="form-group">
        <label class="sr-only" for="daterange">Date and time:</label>
        <div class="input-group">
            <div class="input-group-addon"><i class="fa fa-calendar-o" aria-hidden="true"></i></div>
            <input  class="form-control" type="text" name="daterange" value="<?php  $currentDateTime . ' - ' .  $currentDateTime?>" />
        </div>
    </div>

</form>

<script type="text/javascript">
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY h:mm A'
            }
        });
    });
</script>