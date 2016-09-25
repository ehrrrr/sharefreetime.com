var category_arr = new Array("Arts", "Books", "Charity", "Sport", "Science");

function categorySelection(categoryId){
	// given the id of the <select> tag as function argument, it inserts <option> tags
	var category = document.getElementById(categoryId);
	category.options[0] = new Option('Select Category','');
	for (var i=0; i<category_arr.length; i++) {
		category.options[category.length] = new Option(category_arr[i]);
	}
}