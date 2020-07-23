jQuery(document).ready(function($){
	//cache some jQuery objects
	var modalTrigger = $('.cd-modal-trigger-dako'),
		transitionLayer = $('.cd-transition-layer-dako'),
		transitionBackground = transitionLayer.children(),
//kosss		modalWindow = $('.cd-modal-dako');
		modalWindow = $('#cd-modal-dako-input');


	var frameProportion = 1.78, //png frame aspect ratio
		frames = 25, //number of png frames
		resize = false;

	//set transitionBackground dimentions
	setLayerDimensions();
	$(window).on('resize', function(){
		if( !resize ) {
			resize = true;
			(!window.requestAnimationFrame) ? setTimeout(setLayerDimensions, 300) : window.requestAnimationFrame(setLayerDimensions);
		}
	});

	//open modal window
	modalTrigger.on('click', function(event){	
		event.preventDefault();
		transitionLayer.addClass('visible opening');
		var delay = ( $('.no-cssanimations').length > 0 ) ? 0 : 600;
		setTimeout(function(){
			modalWindow.addClass('visible');
		}, delay);
	});

	//close modal window
	modalWindow.on('click', '.modal-close-dako', function(event){
		event.preventDefault();
		transitionLayer.addClass('closing');
		modalWindow.removeClass('visible');
		transitionBackground.one('webkitAnimationEnd oanimationend msAnimationEnd animationend', function(){
			transitionLayer.removeClass('closing opening visible');
			transitionBackground.off('webkitAnimationEnd oanimationend msAnimationEnd animationend');
			location.reload(true);
		});
//	console.log('click', '.modal-close-dako');

	});



	function setLayerDimensions() {
		var windowWidth = $(window).width(),
			windowHeight = $(window).height(),
			layerHeight, layerWidth;

		if( windowWidth/windowHeight > frameProportion ) {
			layerWidth = windowWidth;
			layerHeight = layerWidth/frameProportion;
		} else {
			layerHeight = windowHeight*1.2;
			layerWidth = layerHeight*frameProportion;
		}

		transitionBackground.css({
			'width': layerWidth*frames+'px',
			'height': layerHeight+'px',
		});

		resize = false;
	}

	$('#print').on('click', function (event) {
		if ($('.modal-content-dako').is(':visible')) {
			var modalId = $(event.target).closest('.modal-content-dako').attr('id');
			$('body').css('visibility', 'hidden');
			$("#" + modalId).css('visibility', 'visible');
			$('#' + modalId).removeClass('modal-content-dako');
			window.print();
			$('body').css('visibility', 'visible');
			$('#' + modalId).addClass('modal-content-dako');
		} else {
			window.print();
		}
	});
	
	
	//Call modal after open
	$('#myModal').modal('show');
	
	$('#myModal').on('shown.bs.modal', function () {
			// console.log('shown.bs.modal');
			let seconds = 2
			$('#kcout').text(seconds);
			let countdown = setInterval(function() {
				seconds--;
				$('#kcout').text(seconds);
				
				if (seconds <= 0) 
				{
					
					clearInterval(countdown);
					$('#loginbtn').click();
				}
			}, 1000);
			
	})
	

	
});