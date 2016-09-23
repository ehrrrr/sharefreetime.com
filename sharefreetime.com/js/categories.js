var category_arr = new Array();

function categorySelection(categoryId){
	// given the id of the <select> tag as function argument, it inserts <option> tags
	var category = document.getElementById(categoryId);
	category.length=0;
	category.options[0] = new Option('Select Category','-1');
	category.selectedIndex = 0;
	for (var i=0; i<category_arr.length; i++) {
		category.options[category.length] = new Option(category_arr[i],category_arr[i]);
	}
}