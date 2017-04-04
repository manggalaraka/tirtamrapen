		

			$(function() {
				$('nav#menu').mmenu({
					extensions: ["effect-menu-slide-100", "effect-listitems-slide","pagedim-black","theme-custom1"],
					navbars: true,
					searchfield	: true,
					counters	: true,
					dragOpen: true,
					offCanvas: {
			            pageNodetype: "section"
			         },
					navbar 		: {
						title		: 'Tirta Mrapen',
						height 		: 2
					},
					navbars		: [
						{
							position	: 'top',
							content		: [ 'searchfield']
						}, {
							position	: 'bottom',
							content		: [
								'<p>Design By Manggalaraka</p>'
							]
						}
					]
				});

				var $menu = $('nav#menu'),
					$html = $('html, body');
				var $anchor = false;
				$menu.find( 'li > a' ).on('click',function( e ){
						$anchor = $(this);
					}
				);

				var api = $menu.data( 'mmenu' );
				api.bind( 'closed',
					function()
					{
						if ( $anchor )
						{
							var href = $anchor.attr( 'href' );
							$anchor = false;

							//	if the clicked link is linked to an anchor, scroll the page to that anchor 
							if ( href.slice( 0, 1 ) == '#' )
							{
								$html.animate({
									scrollTop: $( href ).offset().top
								});	
							}
						}
					}
				);

				// $('#menu li a').on("click", function(){
				//     alert(this.id);
				// });
			});


			// function closet(){
			// 	$('#menu').on('closed.mm', function() {
			// 	alert("hai closed");
			// 	});

			// }


			//jQuery utk collapse judul halaman utama
			$(window).scroll(function() {
			    if ($("#menu").offset().top < 70) {
			       $("#header-title").show();
			    }else{
			       $("#header-title").fadeOut();
			    }

			});

			// $(function() {
			//     $('a.icon').bind('click', function(event) {
			//         var $anchor = $(this);
			//         $('html, body').stop().animate({
			//             scrollTop: $($anchor.attr('href')).offset().top
			//         }, 1500, 'easeInOutExpo');
			//         event.preventDefault();
			//     });
			// });


			// $(function() {
			// 	$('nav#menu2').mmenu({
			// 		extensions: ["effect-menu-slide-100", "effect-listitems-slide","pagedim-black","theme-custom1"],
			// 		searchfield	: true,
			// 		counters	: true,
			// 		navbar 		: {
			// 			title		: '<h1> Tirta Mrapen </h1>',
			// 			height 		: 2
			// 		},
			// 		navbars		: [
			// 			{
			// 				position	: 'top',
			// 				content		: [ 'searchfield']
			// 			},{
			// 				position	: 'bottom',
			// 				content		: [
			// 					'<p>Design By Manggalaraka</p>'
			// 				]
			// 			}
			// 		]
			// 	});
			// });

