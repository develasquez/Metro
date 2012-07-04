
$(function () {

	$("#main").click(function(){
	$("#main").css("top","600px");
		$(this).animate({
   		 	rotate: "-90deg"
    		}
  			, 2000
  			, function() {
  			a=0;
    		});
	})	
 })

