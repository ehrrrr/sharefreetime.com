<form>
   <?php 
        $date= $_SESSION["BirthDate"];
    ?>
    <div class="form-group">
        <label class="sr-only" for="birth_date">Birth Date</label>
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
            <input class="form-control" id="birth_date" name="birth_date" placeholder="Birth Date" value="<?php echo $date ?>" type="text" tabindex="5">
        </div>                                   
    </div>
</form>

<script type="text/javascript">
    $(function() {
        $('input[name="birth_date"]').daterangepicker({
            singleDatePicker: true,
            showDropdowns: true
        }
    });
</script>