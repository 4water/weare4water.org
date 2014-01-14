// @codekit-prepend 'jquery-1.8.3.min.js', 'jquery.placeholder.min.js', 'selectivizr-min.js', 'modernizr-2.6.2-respond-1.1.0.min.js';

WebFont.load({
    google: {
      families: ['Source+Code+Pro:200,400:latin', 'Swanky+and+Moo+Moo::latin']
    }
  });

$(function() {

	$('<li><a href="#primary"><i class="icon-reorder icon-2x"></i>Menu</a></li>').prependTo('.root .cta');
	setNavigation();
	
	setHeader();
	$('header.child .cta').click(function (e) {
		e.stopPropagation();
		if ($(this).hasClass('close')) {
			$(this).removeClass('close');
			$('header.root').animate({top:'0px'}, 500);
			$(this).animate({top:'0px'}, 500);
		} else {
			$(this).addClass('close');
			$('header.root').animate({top:'207px'}, 500);
			$(this).animate({top:'207px'}, 500);
		}
	});


	$('header.child nav ul li').click(function (e) {
		if ($(window).width() > 960) return;
		e.stopPropagation();
		var list = $(this).parent();
		if (list.hasClass('collapsed')) {
			list.removeClass('collapsed').find('li').show();
			return false;
		} else if ($(this).hasClass('active')) {
			list.addClass('collapsed').find('li').not('.active').hide()
			return false;
		}
	});

	$(window).resize(setNavigation);
	$('.cta').children().first().click(function () {
		var icon = $(this).find('i').toggleClass('icon-remove').toggleClass('icon-reorder');
		$('.root .primary').slideToggle(200, function () {
			var isOpen = $(icon).hasClass('icon-remove');
			if (isOpen) {
				$('.root .cta').animate({top:$('.root .primary').height()-2});
			} else {
				$('.root .cta').animate({top:0});
			}
		});
	});


	var heroPos = 0
	$('.multihero').data('position', 0);
	$('.multihero a.carousel-control').click(function() {
 		var list = $(this).parent().children().first();
 		var length = $(list).children().length;

 		var position = $(this).parent().data('position');
 			position = $(this).hasClass('left') ? position+1 : position - 1;

 		if (position*-1 == length)		position = 0;
		if (position*-1 < 0)			position = (length - 1) * -1;

		$(list).animate({marginLeft: (position*100)+'%'});

		$(this).parent().data('position', position);
	});

	var loop = setInterval(function () {
		console.log('called');
		$('.multihero .right').trigger('click');
	}, 6000);

	var z = 5;
	$('.worldmap>div').click(function () {
		$(this).css('z-index', z);
		$('.wordmap>div ul').hide();
		$(this).find('ul').show();
		z++;
	});

	$('.email').on('blur', function() {
		$(this).mailcheck({
			suggested: function(element, suggestion) {	// suggestion - prompt
				$('.warning').remove();
				$(element).parent().append('<span class="warning">Do you mean ' + suggestion.full + '?</span>');
			},
			empty: function(element) {
				$('.warning').remove();
				$(element).parent().append('<span class="warning">Are you sure this is valid?</span>');
			}
		});
	});

	$('form.mailing_list').submit(function () {
		$('.error').remove();
		var errors = [];
		$(this).find('input[type=text]').each(function (i, input) {
			if ($(input).val() === '') {
				errors.push({
					element:input,
					message: 'Required'
				});
			}
		});

		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		if(!emailReg.test($('.email').val()	) ) {
			errors.push({
				element:$('#email'),
				message: 'Invalid'
			});
		}

		if (errors.length > 0) {
			$(errors).each(function (i, error) {
				$(error.element).parent().append('<span class="error">' + error.message + '</span>');
			});
			return false;
		}

		var btn = $(this).find('input[type=submit]').prop('disabled', true).fadeTo(1, 0.2);
		var loader = $('<div style="width:256px; text-align:center; position:relative; top:-28px; height:9px"><img src="/img/loader.gif" alt="loading..." /></div>').insertAfter(btn.parent());

		jQuery.ajax({
			type : "post",
			dataType : "json",
			url :'/wp-admin/admin-ajax.php',
			data : {
				action: "subscribe",
				nonce: $('#subscribe_nonce').val(),
				fullname : $('#fullname').val(),
				email : $('#email').val(),
				interest: $('#blog_name').val()
			},
			success: function(response) {
				loader.remove();
				if (response.errors.length > 0) {
					$(response.errors).each(function (i, err) {
						$('#post_id').after('<p class="error">'+err.message+'</p>');
					});
					$(btn).prop('disabled', false).fadeTo(0, 1);
				} else {
					$('form.mailing_list').hide().parent().append('<h3>Thanks!</h3><p>If not already subscribed to another of our sites, please now confirm your subscription via the email we just sent you.</p>');
				}
			},
			error:function (obj, status, err) {
				loader.remove();
				$(btn).prop('disabled', false).fadeTo(0, 1);
				$('form.mailing_list').after('<p class="error">'+err+'</p>');
			}
		});

		return false;

	});


    $('input, textarea').placeholder();
    $('.chromeframe').on('click', function() {
        $(this).slideUp('fast');
    });

});

function setNavigation() {
	if ($(window).width() < 960) {
		$('.root .logo').before($('.root .primary').slideUp(0));
		$('.cta').children().first().show();
		$('.child nav ul li').not('.active').hide().parent().addClass('collapsed');
	} else {
		$('.root .logo').after($('.root .primary').slideDown(0)).css('overflow', 'visible');
		$('.cta').children().first().hide();
		$('.child nav ul li').not('.active').show().parent().removeClass('collapsed');
	}
	$('nav').css('overflow', 'visible');
}

function setHeader() {
	if ($('body > header').length > 1) {
		$('header.root').css({margin:0, position:'relative', zIndex:999}).animate({marginTop:'-207px'}, 0);
		$('header.root nav > ul .active a').css('background', 'none');
	}
}

/* MailCheck.js 1.1*/var Kicksend={mailcheck:{threshold:3,defaultDomains:"yahoo.com google.com hotmail.com gmail.com me.com aol.com mac.com live.com comcast.net googlemail.com msn.com hotmail.co.uk yahoo.co.uk facebook.com verizon.net sbcglobal.net att.net gmx.com mail.com".split(" "),defaultTopLevelDomains:"co.uk com net org info edu gov mil".split(" "),run:function(a){a.domains=a.domains||Kicksend.mailcheck.defaultDomains;a.topLevelDomains=a.topLevelDomains||Kicksend.mailcheck.defaultTopLevelDomains;a.distanceFunction=
a.distanceFunction||Kicksend.sift3Distance;var b=Kicksend.mailcheck.suggest(encodeURI(a.email),a.domains,a.topLevelDomains,a.distanceFunction);b?a.suggested&&a.suggested(b):a.empty&&a.empty()},suggest:function(a,b,c,d){a=a.toLowerCase();a=this.splitEmail(a);if(b=this.findClosestDomain(a.domain,b,d)){if(b!=a.domain)return{address:a.address,domain:b,full:a.address+"@"+b}}else if(c=this.findClosestDomain(a.topLevelDomain,c),a.domain&&c&&c!=a.topLevelDomain)return b=a.domain,b=b.substring(0,b.lastIndexOf(a.topLevelDomain))+
c,{address:a.address,domain:b,full:a.address+"@"+b};return!1},findClosestDomain:function(a,b,c){var d,e=99,g=null;if(!a||!b)return!1;c||(c=this.sift3Distance);for(var f=0;f<b.length;f++){if(a===b[f])return a;d=c(a,b[f]);d<e&&(e=d,g=b[f])}return e<=this.threshold&&null!==g?g:!1},sift3Distance:function(a,b){if(null==a||0===a.length)return null==b||0===b.length?0:b.length;if(null==b||0===b.length)return a.length;for(var c=0,d=0,e=0,g=0;c+d<a.length&&c+e<b.length;){if(a.charAt(c+d)==b.charAt(c+e))g++;
else for(var f=e=d=0;5>f;f++){if(c+f<a.length&&a.charAt(c+f)==b.charAt(c)){d=f;break}if(c+f<b.length&&a.charAt(c)==b.charAt(c+f)){e=f;break}}c++}return(a.length+b.length)/2-g},splitEmail:function(a){a=a.split("@");if(2>a.length)return!1;for(var b=0;b<a.length;b++)if(""===a[b])return!1;var c=a.pop(),d=c.split("."),e="";if(0==d.length)return!1;if(1==d.length)e=d[0];else{for(b=1;b<d.length;b++)e+=d[b]+".";2<=d.length&&(e=e.substring(0,e.length-1))}return{topLevelDomain:e,domain:c,address:a.join("@")}}}};
window.jQuery&&function(a){a.fn.mailcheck=function(a){var c=this;if(a.suggested){var d=a.suggested;a.suggested=function(a){d(c,a)}}if(a.empty){var e=a.empty;a.empty=function(){e.call(null,c)}}a.email=this.val();Kicksend.mailcheck.run(a)}}(jQuery);