$(function() {
	$('#sdt_menu > li').bind('mouseenter',function(){
		var $elem = $(this);
		$elem.find('img')
			 .stop(true)
			 .animate({
				'width':'170px',
				'height':'170px',
				'left':'0px'
			 },400,'easeOutBack')
			 .andSelf()
			 .find('.sdt_wrap')
			 .stop(true)
			 .animate({'top':'140px'},500,'easeOutBack')
			 .andSelf()
			 .find('.sdt_active')
			 .stop(true)
			 .animate({'height':'170px'},300,function(){
			var $sub_menu = $elem.find('.sdt_box');
			if($sub_menu.length){
				var left = '170px';
				if($elem.parent().children().length == $elem.index()+1)
					left = '-170px';
				$sub_menu.show().animate({'left':left},200);
			}	
		});
	}).bind('mouseleave',function(){
		var $elem = $(this);
		var $sub_menu = $elem.find('.sdt_box');
		if($sub_menu.length)
			$sub_menu.hide().css('left','0px');
		
		$elem.find('.sdt_active')
			 .stop(true)
			 .animate({'height':'0px'},300)
			 .andSelf().find('img')
			 .stop(true)
			 .animate({
				'width':'0px',
				'height':'0px',
				'left':'85px'},400)
			 .andSelf()
			 .find('.sdt_wrap')
			 .stop(true)
			 .animate({'top':'25px'},500);
	});
});
$(function() {

	var Page = (function() {

		var $nav = $( '#nav-dots > span' ),
			slitslider = $( '#slider' ).slitslider( {
				onBeforeChange : function( slide, pos ) {

					$nav.removeClass( 'nav-dot-current' );
					$nav.eq( pos ).addClass( 'nav-dot-current' );

				}
			} ),

			init = function() {

				initEvents();
				
			},
			initEvents = function() {

				$nav.each( function( i ) {
				
					$( this ).on( 'click', function( event ) {
						
						var $dot = $( this );
						
						if( !slitslider.isActive() ) {

							$nav.removeClass( 'nav-dot-current' );
							$dot.addClass( 'nav-dot-current' );
						
						}
						
						slitslider.jump( i + 1 );
						return false;
					
					} );
					
				} );

			};

			return { init : init };

	})();

	Page.init();

	/**
	 * Notes: 
	 * 
	 * example how to add items:
	 */

	/*
	
	var $items  = $('<div class="sl-slide sl-slide-color-2" data-orientation="horizontal" data-slice1-rotation="-5" data-slice2-rotation="10" data-slice1-scale="2" data-slice2-scale="1"><div class="sl-slide-inner bg-1"><div class="sl-deco" data-icon="t"></div><h2>some text</h2><blockquote><p>bla bla</p><cite>Margi Clarke</cite></blockquote></div></div>');
	
	call the plugin's add method
	ss.add($items);

	*/

});