/**
 * File : addCollege.js
 * 
 * This file contain the validation of add user form
 * 
 * Using validation plugin : jquery.validate.js
 * 
 * @author Ashwini Naidu
 */

$(document).ready(function(){
	
	var addCollegeForm = $("#addNewCollege");
	
	var validator = addCollegeForm.validate({
		
		rules:{
			cname :{ required : true },
			cemail : { required : true, email : true },
			cmobile : { required : true, digits : true  },
			cimage : { required : true, selected : true}
		},
		messages:{
			cname :{ required : "This field is required" },
			cemail : { required : "This field is required", email : "Please enter valid email address" },
			cmobile : { required : "This field is required", digits : "Please enter numbers only" },
			cimage : { required : "This field is required", selected : "Please select atleast one option" }			
		}
	});
});
