jQuery(document).ready(function($){
	$this = $(this);

	//show pop up for contact form
	$(function(){
		$('#hireTim a').click(function(e){
			e.preventDefault();
			$('#popUp').show();
			$('#popUp #popForm').show();
		});
		$('#hamburger').click(function(){
			$('#popUp').hide();
			$('#popUp #popForm').hide();
		});
	});

	//show pop up for contact buttons
	$(function(){
		$('#callCTA a.button').click(function(e){
			e.preventDefault();
			$('#popUp').show();
			$('#popUp #popContact').show();
		});
		$('#hamburger').click(function(){
			$('#popUp').hide();
			$('#popUp #popContact').hide();
		});
	});

	$(document).keyup(function(e) {
	  if (e.keyCode == 27) { $('#popUp, #popForm, #popContact').hide(); }
	});

	$(function(){
		$eventImgPH = $('#eventCall').height();
		$eventImgH = $('#eventLeft .eventBG').height($eventImgPH);
	});
	$(function(){
		$barHeight = $('#callCTA').height();
		$arrowImgH = $('.arrow').height($barHeight);
	});
});
