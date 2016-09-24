<div>
	<script type= "text/javascript" src = "./js/countries.js"></script>
	<form>
        <div class="form-group">
            <label class="sr-only" for="country">Country:</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-globe" aria-hidden="true"></i></div>
                <select class="form-control" id="country" name ="country"></select>
            </div>
        </div>
        <div class="form-group">
            <label class="sr-only" for="state">State:</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                <select class="form-control" name ="state" id ="state"></select>
            </div>
        </div>
    </form>
</div>

<script language="javascript">
	populateCountries("country", "state"); // first parameter is id of country drop-down and second parameter is id of state drop-down
</script>
