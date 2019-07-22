var jason = {
    init: function() {
		var self = this;
		window.sr = ScrollReveal();
        $(document).ready(function() {
            self.setHeaderStyle();
            self.registerEvents();
        });
    },

    registerEvents: function() {
        var self = this;
        $(document).scroll(function() {
            self.setHeaderStyle();
        });
        $('a[href*="#"]').click(function(e) {
            e = e || window.event;
            let parts = $(this).attr('href').split('/');
            let hash = parts[parts.length - 1];
            if ($(hash + '-section').length > 0) {
                e.preventDefault();
                e.stopPropagation();
                // if(history.pushState) {
                //     history.pushState(null, null, hash);
                // }
                // else {
                //     window.location.hash = hash;
                // }                
                self.animateScrollTo($(hash + '-section'));
            } else if (hash == "#home") {
                e.preventDefault();
                e.stopPropagation();
				window.location.assign($(this).attr('href').replace(hash, ''));
			}
        });
        if (window.location.hash != "" && window.location.hash != "#home" && $(window.location.hash + '-section').length > 0) {
            setTimeout(function() {
                self.animateScrollTo($(window.location.hash + '-section'));
            }, 300);
		}
		
		sr.reveal('.hero-image h1, .hero-image h2, .hero-image a', { duration: 800, viewFactor: 0.5 }, 350);
		sr.reveal('#websites-section h2, #websites-section div[class^="col-"]', { duration: 800, viewFactor: 0.5 }, 100);
		sr.reveal('#images-section h2, #images-section p, #images-section div[class^="col-"]', { duration: 800, viewFactor: 0.5 }, 100);
		sr.reveal('footer .container .row', { duration: 800, viewFactor: 0.5 });

    },

    setHeaderStyle: function() {
        if($(document).scrollTop() > 0) {
            $('body').addClass('solid-nav');
        } else {
            $('body').removeClass('solid-nav');
        }
    },

    animateScrollTo: function($elm, offset) {
		offset = typeof offset == "undefined" ? 0 : offset;
		$('html, body').animate({ scrollTop: $elm.offset().top - $('header').outerHeight() + offset }, 1000);
	},

	loading: function(isLoading, noTimeout) {
		var self = this;
        var doIt = typeof isLoading == "undefined" ? true : isLoading;
        var noTimeout = typeof noTimeout == "undefined" ? false : noTimeout;
        clearTimeout(self.loadingTimeout);
		if (doIt) {
            $('body').addClass('loading');
            if (!noTimeout) {
                self.loadingTimeout = setTimeout(function () {
                    jason.loading(false);
                    jason.showStatus('Something is taking too long to respond. Please try again or contact support if the problem persists.', 2000, true);
                }, 60000);
            }
		} else {
			$('body').removeClass('loading');
		}
	},

	showStatus: function (msg, delay, warning, width) {
		delay = delay || 2000;
		warning = warning || false;

		var obj = $('<div />\
				</div>\
			</div>\
		</div>');

		msg = '<i class="fa fa-times-circle u-floatRight" onclick="jason.hideStatus(this)"></i>' + msg;

		if ($('.disappearing-status-message').length > 0) {
			$(obj).addClass('disappearing-status-message' + (warning ? ' warning' : '')).html(msg);
			var top = $('.disappearing-status-message').last().position().top + $('.disappearing-status-message').last().outerHeight() + 10;
			$(obj).css('top', top);
		} else {
			$(obj).addClass('disappearing-status-message' + (warning ? ' warning' : '')).html(msg);
		}

		if (typeof width != "undefined") {
			$(obj).width(width);
		}
		$('body').append(obj);

		setTimeout(function () {
			$(obj).addClass("slideDown");
		}, 100);

		setTimeout(function () {
			if ($(obj).length > 0) {
				$(obj).removeClass("slideDown");
			}
			setTimeout(function () {
				if ($(obj).length > 0) {
					$(obj).remove();
				}
			}, 1000);
		}, delay);
	},
	hideStatus: function(elm) {
		var obj = $(elm).parents('.disappearing-status-message').eq(0);
		$(obj).removeClass("slideDown");
		setTimeout(function () {
			$(obj).remove();
		}, 1000);
	},

	isValidEmail: function (val) {
		var emailRegex = /^([a-zA-Z0-9_.\-''])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
		if (!emailRegex.test(val)) {
			return false;
		}
		return true;
	},

	contactSubmit: function() {
		var self = this;
		var f = {
			name: $.trim($('#contact-form #name').val()),
			email: $.trim($('#contact-form #email').val()),
			message: $.trim($('#contact-form #message').val())
		};
		if ($.trim(f.name) != "" && self.isValidEmail(f.email)) {
			self.loading();
			var doit = $.post("/wp-content/themes/jrwd/contact.php", f);
			doit.done(function() {
				self.loading(false);
				self.showStatus('Thanks for reaching out!<br />I\'ll get back to you ASAP.', 8000);
				$('#contact-form #name').val('');
				$('#contact-form #email').val('');
				$('#contact-form #message').val('');
			});
		} 
		if ($.trim(f.name) == "") {
			self.showStatus('Please enter your name', 3500, true);
			$('#contact-form #name').addClass('error');
			$('#contact-form #name').keydown(function() { $(this).removeClass('error'); });
		}
		if (!self.isValidEmail(f.email)) {
			self.showStatus('Please enter a valid email address', 3500, true);
			$('#contact-form #email').addClass('error');
			$('#contact-form #email').keydown(function() { $(this).removeClass('error'); });
		}
	}
};

jason.init();