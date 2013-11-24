/*! jQuery navigation.js
  Add toggle icon for mobile navigation and dropdown animations for widescreen navigation
  Author: Thomas W (themezee.com)
*/
jQuery(document).ready(function($) {
						
	/** Mobile Navigation */
	/* Add menu icon */
	$('#mainnav').before('<h3 id=\"mainnav-icon\">' + customNavigationParams.menuTitle + '</h3>');
	
	/* Add toggle effect */
	$('#mainnav-icon').on('click', function(){
		$('#mainnav-menu').slideToggle();
		$(this).toggleClass('active');
	});

	/** Widescreen Dropdown Navigation */
	/* Get Screen Size with Listener */ 
	if(typeof matchMedia == 'function') {
		var mq = window.matchMedia('(min-width: 60em)');
		mq.addListener(zeeWidthChange);
		zeeWidthChange(mq);
	}
	function zeeWidthChange(mq) {
		if (mq.matches) {
	
			/* Add dropdown animations */
			$('#mainnav-menu ul').css({display: 'none'}); // Opera Fix
			$('#mainnav-menu li').hover(function(){
				$(this).find('ul:first').css({visibility: 'visible',display: 'none'}).slideDown(300);
			},function(){
				$(this).find('ul:first').css({visibility: 'hidden'});
			});
		
		} else {
			/* Reset dropdown animations */
			$('#mainnav-menu ul').css({display: 'block'}); // Opera Fix
			$('#mainnav-menu li ul').css({visibility: 'visible', display: 'block'});
			$('#mainnav-menu li').unbind('mouseenter mouseleave');
		}
	}
	
	/** Widget Toggle Menu */
	/* Add toggle effect */
	$('#header-widgets-icon').click(function(){
		$('#header-widgets').slideToggle('slow', function() {
			if ($('#header-widgets').is(':hidden'))
			{
				$('#header-widgets-icon').removeClass('widget-icon-collapse');
				$('#header-widgets-icon').addClass('widget-icon-expand');
				
			}
			else
			{
				$('#header-widgets-icon').removeClass('widget-icon-expand');
				$('#header-widgets-icon').addClass('widget-icon-collapse');
			}
		}); 
	});
});
	