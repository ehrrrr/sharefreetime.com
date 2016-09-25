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
            <label class="sr-only" for="city">City:</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                <select class="form-control" name ="city" id ="city"></select>
            </div>
        </div>
    </form>
</div>

<script language="javascript">
	populateCountries("country", "city"); // first parameter is id of country drop-down and second parameter is id of city drop-down
</script>
