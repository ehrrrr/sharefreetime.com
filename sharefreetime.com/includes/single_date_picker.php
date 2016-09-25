<div class="form-group">
    <label class="sr-only" for="birth_date">Birth Date</label>
    <div class="input-group">
        <span class="input-group-addon"><i class="fa fa-calendar-o" aria-hidden="true"></i></span>
        <input class="form-control"  type="text" name="birth_date" id="birth_date" value="" placeholder="Birth Date" />
    </div>                                   
</div>
 
<script type="text/javascript">
$(function() {
    $('input[name="birth_date"]').daterangepicker({
        singleDatePicker: true,
        showDropdowns: true
    });
});
</script>