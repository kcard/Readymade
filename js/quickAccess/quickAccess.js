(function($) {
	$.fn.quickAccess = function(options) {
		var opts = $.extend(true, {}, $.fn.quickAccess.defaults, options);
		return new quickAccessClass($(this), opts);
	};
	$.fn.quickAccess.defaults = {
		screenPosition: 'left',
		margin: '9px',
		width: '110px',
		radius: {},
		itemCss: {},
		iconType: 'light',
		change: []
	};
	var quickAccessClass = function (el, opts) {
		// GTFHRCPH
		var qa = this;
		qa.el = el;
		qa.classes = ['light', 'medium_dark', 'dark'];
		qa.items = qa.el.find('a');
		qa.opts = opts;

		qa.__construct = function() {
			qa.el.addClass('quickAccess_holder');
			qa.setContainerClass(qa.opts.iconType);
			qa.applyCss();
			qa.applyPosition(qa.opts.screenPosition);
			qa.applyRadius(qa.opts.radius);
			qa.addHover();
			qa.fireChange('end constructor');
		};
		qa.fireChange = function(event) {
//			console.log(event);
			var i = qa.opts.change.length;
			while (i--) qa.opts.change[i](qa);
		};
		qa.setOption = function(new_options) {
			qa.opts = $.extend(true, qa.opts, new_options);
			return qa;
		};
		qa.getOption = function(index) {
			return qa.opts[index];
		};
		qa.getCssOption = function(index) {
			return qa.opts.itemCss[index];
		};
		qa.applyCss = function() {
			$.each(qa.opts.css, function(index, val) {
				qa.el.css(index, val);
			});
			$.each(qa.opts.itemCss, function(index, val) {
				qa.items.css(index, val);
			});
			qa.fireChange('apply css');
			return qa;
		};
		qa.removeCss = function() {
			$.each(qa.opts.css, function(index, val) {
				qa.el.css(index, '');
			});
			$.each(qa.opts.itemCss, function(index, val) {
				qa.items.css(index, '');
			});
			return qa;
		};
		qa.applyPosition = function(screenPosition) {
			qa.el.addClass(screenPosition);
			switch (screenPosition) {
			case 'right':
				qa.items.css('marginBottom', opts.margin);
				break;
			case 'top':
				qa.items.css('marginRight', opts.margin);
				break;
			case 'bottom':
				qa.items.css('marginRight', opts.margin);
				break;
			default: // left
				qa.items.css('marginBottom', opts.margin);
				break;
			}
			qa.fireChange('apply position');
			return qa;
		};
		qa.removePosition = function(screenPosition) {
			qa.el.removeClass(screenPosition);
			switch (screenPosition) {
			case 'right':
				qa.items.css('marginBottom', '');
				break;
			case 'top':
				qa.items.css('marginRight', '');
				break;
			case 'bottom':
				qa.items.css('marginRight', '');
				break;
			default: // left
				qa.items.css('marginBottom', '');
				break;
			}
			return qa;
		};
		qa.changePosition = function(screenPosition) {
			qa.removePosition(qa.opts.screenPosition);
			qa.setOption({screenPosition: screenPosition});
			qa.applyPosition(screenPosition);
			return qa;
		};
		// radius
		qa.applyRadius = function(radius_info) {
			qa.items.css(radius_info);
			qa.fireChange('apply radius');
			return qa;
		};
		qa.changeRadius = function(radius_info) {
			qa.setOption({radius: radius_info});
			qa.applyRadius(radius_info);
			return qa;
		};
		qa.removeRadius = function(radius_info) {
			$.each(radius_info, function(index, val) {
				qa.items.css(index, '');
			});
			return qa;
		};
		qa.getPosition = function() {
			return qa.getOption('screenPosition');
		};
		qa.setContainerClass = function (classname) {
			$.each(qa.classes, function(index, value) {
				qa.el.removeClass(value);
			});
			qa.el.addClass(classname);
		};
		// hover
		qa.addHover = function() {
			qa.removeHover();
			// click, internal
			var offs = 0;
			qa.items.filter('[href*=#]').click(function() {
				if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
					var $target = $(this.hash);
					$target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
					if ($target.length) {
						var targetOffset = $target.offset().top - offs;
						$('html,body').animate({scrollTop : targetOffset}, 700);
						var hash = this.hash;
						$('#nav a').each(function() {
							el = this;
							$el = $(this);
							if (el.hash == hash) {
								$('#nav a').parent().removeClass('active');
								$el.parent().addClass('active');
							}
						});
						return true;
					}
				}
			});
			qa.items.each(function() {
				var or_bk = $(this).css('backgroundColor');
				$(this).hover(function(ev) {
					if ($(this).is(':animated')) {
						return false;
					}
					or_bk = $(this).css('backgroundColor');
					var bk = getBk(or_bk);
					if (qa.opts.screenPosition == 'right') {
						$(this).animate({width: qa.opts.width, marginLeft: '-'+qa.opts.width, backgroundColor: bk});
					}
					else {
						$(this).animate({width: qa.opts.width, backgroundColor: bk});
					}
				},
				function(ev) {
					if (qa.opts.screenPosition == 'right') {
						$(this).animate({width: '0px', marginLeft: '0px', backgroundColor: or_bk});
					}
					else {
						$(this).animate({width: '0px', backgroundColor: or_bk});
					}
				});
			});
			return qa;
		};
		qa.removeHover = function() {
			qa.items.each(function() {
				$(this).unbind('mouseenter').unbind('mouseleave'); // remove former hover
			});
			return qa;
		};

		// destroy the instance
		qa.__destruct = function() {
			qa.el.removeClass('quickAccess_holder');
			qa.removeCss();
			qa.removeRadius(qa.opts.radius);
			qa.removePosition(qa.opts.screenPosition);
			qa.removeHover();
			qa.opts = {};
		};
		qa.__construct();
		
		var getBk = function(color) {
		    var rgb = getRGB(color);
		    for(var i = 0; i < rgb.length; i++){
		        rgb[i] = Math.max(0, rgb[i] - 40);
		    }
		    var newColor = 'rgb(' + rgb[0] + ',' + rgb[1] + ',' + rgb[2] + ')';
		    return newColor;
		};
		//getRGB function taken from jQuery color plugin:
		//http://plugins.jquery.com/files/jquery.color.js.txt
		var getRGB = function(color) {
		 var result;
		 
		 // Look for rgb(num,num,num)
		 if (result = /rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(color)) return [parseInt(result[1]), parseInt(result[2]), parseInt(result[3])];

		 // Look for rgb(num%,num%,num%)
		 if (result = /rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(color)) return [parseFloat(result[1]) * 2.55, parseFloat(result[2]) * 2.55, parseFloat(result[3]) * 2.55];

		 // Look for #a0b1c2
		 if (result = /#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(color)) return [parseInt(result[1], 16), parseInt(result[2], 16), parseInt(result[3], 16)];

		 // Look for #fff
		 if (result = /#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(color)) return [parseInt(result[1] + result[1], 16), parseInt(result[2] + result[2], 16), parseInt(result[3] + result[3], 16)];
		};
	};
})(jQuery);
// color plugin
// http://plugins.jquery.com/files/jquery.color.js.txt
/*
 * jQuery Color Animations
 * Copyright 2007 John Resig
 * Released under the MIT and GPL licenses.
 */
(function(d){d.each(["backgroundColor","borderBottomColor","borderLeftColor","borderRightColor","borderTopColor","color","outlineColor"],function(f,e){d.fx.step[e]=function(g){if(!g.colorInit){g.start=c(g.elem,e);g.end=b(g.end);g.colorInit=true}g.elem.style[e]="rgb("+[Math.max(Math.min(parseInt((g.pos*(g.end[0]-g.start[0]))+g.start[0]),255),0),Math.max(Math.min(parseInt((g.pos*(g.end[1]-g.start[1]))+g.start[1]),255),0),Math.max(Math.min(parseInt((g.pos*(g.end[2]-g.start[2]))+g.start[2]),255),0)].join(",")+")"}});function b(f){var e;if(f&&f.constructor==Array&&f.length==3){return f}if(e=/rgb\(\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*,\s*([0-9]{1,3})\s*\)/.exec(f)){return[parseInt(e[1]),parseInt(e[2]),parseInt(e[3])]}if(e=/rgb\(\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*,\s*([0-9]+(?:\.[0-9]+)?)\%\s*\)/.exec(f)){return[parseFloat(e[1])*2.55,parseFloat(e[2])*2.55,parseFloat(e[3])*2.55]}if(e=/#([a-fA-F0-9]{2})([a-fA-F0-9]{2})([a-fA-F0-9]{2})/.exec(f)){return[parseInt(e[1],16),parseInt(e[2],16),parseInt(e[3],16)]}if(e=/#([a-fA-F0-9])([a-fA-F0-9])([a-fA-F0-9])/.exec(f)){return[parseInt(e[1]+e[1],16),parseInt(e[2]+e[2],16),parseInt(e[3]+e[3],16)]}if(e=/rgba\(0, 0, 0, 0\)/.exec(f)){return a.transparent}return a[d.trim(f).toLowerCase()]}function c(g,e){var f;do{f=d.curCSS(g,e);if(f!=""&&f!="transparent"||d.nodeName(g,"body")){break}e="backgroundColor"}while(g=g.parentNode);return b(f)}var a={aqua:[0,255,255],azure:[240,255,255],beige:[245,245,220],black:[0,0,0],blue:[0,0,255],brown:[165,42,42],cyan:[0,255,255],darkblue:[0,0,139],darkcyan:[0,139,139],darkgrey:[169,169,169],darkgreen:[0,100,0],darkkhaki:[189,183,107],darkmagenta:[139,0,139],darkolivegreen:[85,107,47],darkorange:[255,140,0],darkorchid:[153,50,204],darkred:[139,0,0],darksalmon:[233,150,122],darkviolet:[148,0,211],fuchsia:[255,0,255],gold:[255,215,0],green:[0,128,0],indigo:[75,0,130],khaki:[240,230,140],lightblue:[173,216,230],lightcyan:[224,255,255],lightgreen:[144,238,144],lightgrey:[211,211,211],lightpink:[255,182,193],lightyellow:[255,255,224],lime:[0,255,0],magenta:[255,0,255],maroon:[128,0,0],navy:[0,0,128],olive:[128,128,0],orange:[255,165,0],pink:[255,192,203],purple:[128,0,128],violet:[128,0,128],red:[255,0,0],silver:[192,192,192],white:[255,255,255],yellow:[255,255,0],transparent:[255,255,255]}})(jQuery);
