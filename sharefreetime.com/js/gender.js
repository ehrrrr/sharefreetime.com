var gender_arr = new Array("Male", "Female", "Other");

function genderSelection(genderId){
	// given the id of the <select> tag as function argument, it inserts <option> tags
	var gender = document.getElementById(genderId);
	gender.options[0] = new Option('Select Gender','-1');
	for (var i=0; i<gender_arr.length; i++) {
		gender.options[gender.length] = new Option(gender_arr[i]);
	}
}