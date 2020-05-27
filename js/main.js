/*
Author				Date			Description
Jorge Villalobos	May/27/2020		Initial creation
*/

// IIFE = Immediately Invoked Function Expression
(function(init) {
    // The global jQuery object is passed as a parameter
  	init(window.jQuery, window, document);
}(function($, window, document) {
	// The $ object is now locally scoped (this is for security)
	// code here is executed at the very begining (before dom is available)

   // DOM READY
   $(function() {
	// logic goes inside here
   	const inputs = document.querySelectorAll(".input");

	function addcl(){
		let parent = this.parentNode.parentNode;
		parent.classList.add("focus");
	}

	function remcl(){
		let parent = this.parentNode.parentNode;
		if(this.value == ""){
			parent.classList.remove("focus");
		}
	}

	inputs.forEach(input => {
		input.addEventListener("focus", addcl);
		input.addEventListener("blur", remcl);
	});
   
  	// $('#preloader').fadeOut();

   
   });// DOM ready end

}
));// END


