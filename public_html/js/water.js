$(document).ready(function() {
			try {
				$('#water').ripples({
					resolution: 512,
					dropRadius: 20, //px
					perturbance: 0.04,
				});
				$('main').ripples({
					resolution: 128,
					dropRadius: 10, //px
					perturbance: 0.04,
				});
			}
			catch (e) {
				$('.error').show().text(e);
			}

			$('.disable').show().on('click', function() {
				$('#water, main').ripples('destroy');
				$(this).hide();
			});

			// Automatic drops
			setInterval(function() {
				var $el = $('main');
				var x = Math.random() * $el.outerWidth();
				var y = Math.random() * $el.outerHeight();
				var dropRadius = 20;
				var strength = 0.04 + Math.random() * 0.04;
				
				$el.ripples('drop', x, y, dropRadius, strength);
			}, 400);
		});