/*!
 * Bootstrap v3.3.6 (http://getbootstrap.com)
 * Copyright 2011-2015 Twitter, Inc.
 * Licensed under the MIT license
 */
if("undefined"==typeof jQuery)throw new Error("Bootstrap's JavaScript requires jQuery");+function(a){"use strict";var b=a.fn.jquery.split(" ")[0].split(".");if(b[0]<2&&b[1]<9||1==b[0]&&9==b[1]&&b[2]<1||b[0]>2)throw new Error("Bootstrap's JavaScript requires jQuery version 1.9.1 or higher, but lower than version 3")}(jQuery),+function(a){"use strict";function b(){var a=document.createElement("bootstrap"),b={WebkitTransition:"webkitTransitionEnd",MozTransition:"transitionend",OTransition:"oTransitionEnd otransitionend",transition:"transitionend"};for(var c in b)if(void 0!==a.style[c])return{end:b[c]};return!1}a.fn.emulateTransitionEnd=function(b){var c=!1,d=this;a(this).one("bsTransitionEnd",function(){c=!0});var e=function(){c||a(d).trigger(a.support.transition.end)};return setTimeout(e,b),this},a(function(){a.support.transition=b(),a.support.transition&&(a.event.special.bsTransitionEnd={bindType:a.support.transition.end,delegateType:a.support.transition.end,handle:function(b){return a(b.target).is(this)?b.handleObj.handler.apply(this,arguments):void 0}})})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var c=a(this),e=c.data("bs.alert");e||c.data("bs.alert",e=new d(this)),"string"==typeof b&&e[b].call(c)})}var c='[data-dismiss="alert"]',d=function(b){a(b).on("click",c,this.close)};d.VERSION="3.3.6",d.TRANSITION_DURATION=150,d.prototype.close=function(b){function c(){g.detach().trigger("closed.bs.alert").remove()}var e=a(this),f=e.attr("data-target");f||(f=e.attr("href"),f=f&&f.replace(/.*(?=#[^\s]*$)/,""));var g=a(f);b&&b.preventDefault(),g.length||(g=e.closest(".alert")),g.trigger(b=a.Event("close.bs.alert")),b.isDefaultPrevented()||(g.removeClass("in"),a.support.transition&&g.hasClass("fade")?g.one("bsTransitionEnd",c).emulateTransitionEnd(d.TRANSITION_DURATION):c())};var e=a.fn.alert;a.fn.alert=b,a.fn.alert.Constructor=d,a.fn.alert.noConflict=function(){return a.fn.alert=e,this},a(document).on("click.bs.alert.data-api",c,d.prototype.close)}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.button"),f="object"==typeof b&&b;e||d.data("bs.button",e=new c(this,f)),"toggle"==b?e.toggle():b&&e.setState(b)})}var c=function(b,d){this.$element=a(b),this.options=a.extend({},c.DEFAULTS,d),this.isLoading=!1};c.VERSION="3.3.6",c.DEFAULTS={loadingText:"loading..."},c.prototype.setState=function(b){var c="disabled",d=this.$element,e=d.is("input")?"val":"html",f=d.data();b+="Text",null==f.resetText&&d.data("resetText",d[e]()),setTimeout(a.proxy(function(){d[e](null==f[b]?this.options[b]:f[b]),"loadingText"==b?(this.isLoading=!0,d.addClass(c).attr(c,c)):this.isLoading&&(this.isLoading=!1,d.removeClass(c).removeAttr(c))},this),0)},c.prototype.toggle=function(){var a=!0,b=this.$element.closest('[data-toggle="buttons"]');if(b.length){var c=this.$element.find("input");"radio"==c.prop("type")?(c.prop("checked")&&(a=!1),b.find(".active").removeClass("active"),this.$element.addClass("active")):"checkbox"==c.prop("type")&&(c.prop("checked")!==this.$element.hasClass("active")&&(a=!1),this.$element.toggleClass("active")),c.prop("checked",this.$element.hasClass("active")),a&&c.trigger("change")}else this.$element.attr("aria-pressed",!this.$element.hasClass("active")),this.$element.toggleClass("active")};var d=a.fn.button;a.fn.button=b,a.fn.button.Constructor=c,a.fn.button.noConflict=function(){return a.fn.button=d,this},a(document).on("click.bs.button.data-api",'[data-toggle^="button"]',function(c){var d=a(c.target);d.hasClass("btn")||(d=d.closest(".btn")),b.call(d,"toggle"),a(c.target).is('input[type="radio"]')||a(c.target).is('input[type="checkbox"]')||c.preventDefault()}).on("focus.bs.button.data-api blur.bs.button.data-api",'[data-toggle^="button"]',function(b){a(b.target).closest(".btn").toggleClass("focus",/^focus(in)?$/.test(b.type))})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.carousel"),f=a.extend({},c.DEFAULTS,d.data(),"object"==typeof b&&b),g="string"==typeof b?b:f.slide;e||d.data("bs.carousel",e=new c(this,f)),"number"==typeof b?e.to(b):g?e[g]():f.interval&&e.pause().cycle()})}var c=function(b,c){this.$element=a(b),this.$indicators=this.$element.find(".carousel-indicators"),this.options=c,this.paused=null,this.sliding=null,this.interval=null,this.$active=null,this.$items=null,this.options.keyboard&&this.$element.on("keydown.bs.carousel",a.proxy(this.keydown,this)),"hover"==this.options.pause&&!("ontouchstart"in document.documentElement)&&this.$element.on("mouseenter.bs.carousel",a.proxy(this.pause,this)).on("mouseleave.bs.carousel",a.proxy(this.cycle,this))};c.VERSION="3.3.6",c.TRANSITION_DURATION=600,c.DEFAULTS={interval:5e3,pause:"hover",wrap:!0,keyboard:!0},c.prototype.keydown=function(a){if(!/input|textarea/i.test(a.target.tagName)){switch(a.which){case 37:this.prev();break;case 39:this.next();break;default:return}a.preventDefault()}},c.prototype.cycle=function(b){return b||(this.paused=!1),this.interval&&clearInterval(this.interval),this.options.interval&&!this.paused&&(this.interval=setInterval(a.proxy(this.next,this),this.options.interval)),this},c.prototype.getItemIndex=function(a){return this.$items=a.parent().children(".item"),this.$items.index(a||this.$active)},c.prototype.getItemForDirection=function(a,b){var c=this.getItemIndex(b),d="prev"==a&&0===c||"next"==a&&c==this.$items.length-1;if(d&&!this.options.wrap)return b;var e="prev"==a?-1:1,f=(c+e)%this.$items.length;return this.$items.eq(f)},c.prototype.to=function(a){var b=this,c=this.getItemIndex(this.$active=this.$element.find(".item.active"));return a>this.$items.length-1||0>a?void 0:this.sliding?this.$element.one("slid.bs.carousel",function(){b.to(a)}):c==a?this.pause().cycle():this.slide(a>c?"next":"prev",this.$items.eq(a))},c.prototype.pause=function(b){return b||(this.paused=!0),this.$element.find(".next, .prev").length&&a.support.transition&&(this.$element.trigger(a.support.transition.end),this.cycle(!0)),this.interval=clearInterval(this.interval),this},c.prototype.next=function(){return this.sliding?void 0:this.slide("next")},c.prototype.prev=function(){return this.sliding?void 0:this.slide("prev")},c.prototype.slide=function(b,d){var e=this.$element.find(".item.active"),f=d||this.getItemForDirection(b,e),g=this.interval,h="next"==b?"left":"right",i=this;if(f.hasClass("active"))return this.sliding=!1;var j=f[0],k=a.Event("slide.bs.carousel",{relatedTarget:j,direction:h});if(this.$element.trigger(k),!k.isDefaultPrevented()){if(this.sliding=!0,g&&this.pause(),this.$indicators.length){this.$indicators.find(".active").removeClass("active");var l=a(this.$indicators.children()[this.getItemIndex(f)]);l&&l.addClass("active")}var m=a.Event("slid.bs.carousel",{relatedTarget:j,direction:h});return a.support.transition&&this.$element.hasClass("slide")?(f.addClass(b),f[0].offsetWidth,e.addClass(h),f.addClass(h),e.one("bsTransitionEnd",function(){f.removeClass([b,h].join(" ")).addClass("active"),e.removeClass(["active",h].join(" ")),i.sliding=!1,setTimeout(function(){i.$element.trigger(m)},0)}).emulateTransitionEnd(c.TRANSITION_DURATION)):(e.removeClass("active"),f.addClass("active"),this.sliding=!1,this.$element.trigger(m)),g&&this.cycle(),this}};var d=a.fn.carousel;a.fn.carousel=b,a.fn.carousel.Constructor=c,a.fn.carousel.noConflict=function(){return a.fn.carousel=d,this};var e=function(c){var d,e=a(this),f=a(e.attr("data-target")||(d=e.attr("href"))&&d.replace(/.*(?=#[^\s]+$)/,""));if(f.hasClass("carousel")){var g=a.extend({},f.data(),e.data()),h=e.attr("data-slide-to");h&&(g.interval=!1),b.call(f,g),h&&f.data("bs.carousel").to(h),c.preventDefault()}};a(document).on("click.bs.carousel.data-api","[data-slide]",e).on("click.bs.carousel.data-api","[data-slide-to]",e),a(window).on("load",function(){a('[data-ride="carousel"]').each(function(){var c=a(this);b.call(c,c.data())})})}(jQuery),+function(a){"use strict";function b(b){var c,d=b.attr("data-target")||(c=b.attr("href"))&&c.replace(/.*(?=#[^\s]+$)/,"");return a(d)}function c(b){return this.each(function(){var c=a(this),e=c.data("bs.collapse"),f=a.extend({},d.DEFAULTS,c.data(),"object"==typeof b&&b);!e&&f.toggle&&/show|hide/.test(b)&&(f.toggle=!1),e||c.data("bs.collapse",e=new d(this,f)),"string"==typeof b&&e[b]()})}var d=function(b,c){this.$element=a(b),this.options=a.extend({},d.DEFAULTS,c),this.$trigger=a('[data-toggle="collapse"][href="#'+b.id+'"],[data-toggle="collapse"][data-target="#'+b.id+'"]'),this.transitioning=null,this.options.parent?this.$parent=this.getParent():this.addAriaAndCollapsedClass(this.$element,this.$trigger),this.options.toggle&&this.toggle()};d.VERSION="3.3.6",d.TRANSITION_DURATION=350,d.DEFAULTS={toggle:!0},d.prototype.dimension=function(){var a=this.$element.hasClass("width");return a?"width":"height"},d.prototype.show=function(){if(!this.transitioning&&!this.$element.hasClass("in")){var b,e=this.$parent&&this.$parent.children(".panel").children(".in, .collapsing");if(!(e&&e.length&&(b=e.data("bs.collapse"),b&&b.transitioning))){var f=a.Event("show.bs.collapse");if(this.$element.trigger(f),!f.isDefaultPrevented()){e&&e.length&&(c.call(e,"hide"),b||e.data("bs.collapse",null));var g=this.dimension();this.$element.removeClass("collapse").addClass("collapsing")[g](0).attr("aria-expanded",!0),this.$trigger.removeClass("collapsed").attr("aria-expanded",!0),this.transitioning=1;var h=function(){this.$element.removeClass("collapsing").addClass("collapse in")[g](""),this.transitioning=0,this.$element.trigger("shown.bs.collapse")};if(!a.support.transition)return h.call(this);var i=a.camelCase(["scroll",g].join("-"));this.$element.one("bsTransitionEnd",a.proxy(h,this)).emulateTransitionEnd(d.TRANSITION_DURATION)[g](this.$element[0][i])}}}},d.prototype.hide=function(){if(!this.transitioning&&this.$element.hasClass("in")){var b=a.Event("hide.bs.collapse");if(this.$element.trigger(b),!b.isDefaultPrevented()){var c=this.dimension();this.$element[c](this.$element[c]())[0].offsetHeight,this.$element.addClass("collapsing").removeClass("collapse in").attr("aria-expanded",!1),this.$trigger.addClass("collapsed").attr("aria-expanded",!1),this.transitioning=1;var e=function(){this.transitioning=0,this.$element.removeClass("collapsing").addClass("collapse").trigger("hidden.bs.collapse")};return a.support.transition?void this.$element[c](0).one("bsTransitionEnd",a.proxy(e,this)).emulateTransitionEnd(d.TRANSITION_DURATION):e.call(this)}}},d.prototype.toggle=function(){this[this.$element.hasClass("in")?"hide":"show"]()},d.prototype.getParent=function(){return a(this.options.parent).find('[data-toggle="collapse"][data-parent="'+this.options.parent+'"]').each(a.proxy(function(c,d){var e=a(d);this.addAriaAndCollapsedClass(b(e),e)},this)).end()},d.prototype.addAriaAndCollapsedClass=function(a,b){var c=a.hasClass("in");a.attr("aria-expanded",c),b.toggleClass("collapsed",!c).attr("aria-expanded",c)};var e=a.fn.collapse;a.fn.collapse=c,a.fn.collapse.Constructor=d,a.fn.collapse.noConflict=function(){return a.fn.collapse=e,this},a(document).on("click.bs.collapse.data-api",'[data-toggle="collapse"]',function(d){var e=a(this);e.attr("data-target")||d.preventDefault();var f=b(e),g=f.data("bs.collapse"),h=g?"toggle":e.data();c.call(f,h)})}(jQuery),+function(a){"use strict";function b(b){var c=b.attr("data-target");c||(c=b.attr("href"),c=c&&/#[A-Za-z]/.test(c)&&c.replace(/.*(?=#[^\s]*$)/,""));var d=c&&a(c);return d&&d.length?d:b.parent()}function c(c){c&&3===c.which||(a(e).remove(),a(f).each(function(){var d=a(this),e=b(d),f={relatedTarget:this};e.hasClass("open")&&(c&&"click"==c.type&&/input|textarea/i.test(c.target.tagName)&&a.contains(e[0],c.target)||(e.trigger(c=a.Event("hide.bs.dropdown",f)),c.isDefaultPrevented()||(d.attr("aria-expanded","false"),e.removeClass("open").trigger(a.Event("hidden.bs.dropdown",f)))))}))}function d(b){return this.each(function(){var c=a(this),d=c.data("bs.dropdown");d||c.data("bs.dropdown",d=new g(this)),"string"==typeof b&&d[b].call(c)})}var e=".dropdown-backdrop",f='[data-toggle="dropdown"]',g=function(b){a(b).on("click.bs.dropdown",this.toggle)};g.VERSION="3.3.6",g.prototype.toggle=function(d){var e=a(this);if(!e.is(".disabled, :disabled")){var f=b(e),g=f.hasClass("open");if(c(),!g){"ontouchstart"in document.documentElement&&!f.closest(".navbar-nav").length&&a(document.createElement("div")).addClass("dropdown-backdrop").insertAfter(a(this)).on("click",c);var h={relatedTarget:this};if(f.trigger(d=a.Event("show.bs.dropdown",h)),d.isDefaultPrevented())return;e.trigger("focus").attr("aria-expanded","true"),f.toggleClass("open").trigger(a.Event("shown.bs.dropdown",h))}return!1}},g.prototype.keydown=function(c){if(/(38|40|27|32)/.test(c.which)&&!/input|textarea/i.test(c.target.tagName)){var d=a(this);if(c.preventDefault(),c.stopPropagation(),!d.is(".disabled, :disabled")){var e=b(d),g=e.hasClass("open");if(!g&&27!=c.which||g&&27==c.which)return 27==c.which&&e.find(f).trigger("focus"),d.trigger("click");var h=" li:not(.disabled):visible a",i=e.find(".dropdown-menu"+h);if(i.length){var j=i.index(c.target);38==c.which&&j>0&&j--,40==c.which&&j<i.length-1&&j++,~j||(j=0),i.eq(j).trigger("focus")}}}};var h=a.fn.dropdown;a.fn.dropdown=d,a.fn.dropdown.Constructor=g,a.fn.dropdown.noConflict=function(){return a.fn.dropdown=h,this},a(document).on("click.bs.dropdown.data-api",c).on("click.bs.dropdown.data-api",".dropdown form",function(a){a.stopPropagation()}).on("click.bs.dropdown.data-api",f,g.prototype.toggle).on("keydown.bs.dropdown.data-api",f,g.prototype.keydown).on("keydown.bs.dropdown.data-api",".dropdown-menu",g.prototype.keydown)}(jQuery),+function(a){"use strict";function b(b,d){return this.each(function(){var e=a(this),f=e.data("bs.modal"),g=a.extend({},c.DEFAULTS,e.data(),"object"==typeof b&&b);f||e.data("bs.modal",f=new c(this,g)),"string"==typeof b?f[b](d):g.show&&f.show(d)})}var c=function(b,c){this.options=c,this.$body=a(document.body),this.$element=a(b),this.$dialog=this.$element.find(".modal-dialog"),this.$backdrop=null,this.isShown=null,this.originalBodyPad=null,this.scrollbarWidth=0,this.ignoreBackdropClick=!1,this.options.remote&&this.$element.find(".modal-content").load(this.options.remote,a.proxy(function(){this.$element.trigger("loaded.bs.modal")},this))};c.VERSION="3.3.6",c.TRANSITION_DURATION=300,c.BACKDROP_TRANSITION_DURATION=150,c.DEFAULTS={backdrop:!0,keyboard:!0,show:!0},c.prototype.toggle=function(a){return this.isShown?this.hide():this.show(a)},c.prototype.show=function(b){var d=this,e=a.Event("show.bs.modal",{relatedTarget:b});this.$element.trigger(e),this.isShown||e.isDefaultPrevented()||(this.isShown=!0,this.checkScrollbar(),this.setScrollbar(),this.$body.addClass("modal-open"),this.escape(),this.resize(),this.$element.on("click.dismiss.bs.modal",'[data-dismiss="modal"]',a.proxy(this.hide,this)),this.$dialog.on("mousedown.dismiss.bs.modal",function(){d.$element.one("mouseup.dismiss.bs.modal",function(b){a(b.target).is(d.$element)&&(d.ignoreBackdropClick=!0)})}),this.backdrop(function(){var e=a.support.transition&&d.$element.hasClass("fade");d.$element.parent().length||d.$element.appendTo(d.$body),d.$element.show().scrollTop(0),d.adjustDialog(),e&&d.$element[0].offsetWidth,d.$element.addClass("in"),d.enforceFocus();var f=a.Event("shown.bs.modal",{relatedTarget:b});e?d.$dialog.one("bsTransitionEnd",function(){d.$element.trigger("focus").trigger(f)}).emulateTransitionEnd(c.TRANSITION_DURATION):d.$element.trigger("focus").trigger(f)}))},c.prototype.hide=function(b){b&&b.preventDefault(),b=a.Event("hide.bs.modal"),this.$element.trigger(b),this.isShown&&!b.isDefaultPrevented()&&(this.isShown=!1,this.escape(),this.resize(),a(document).off("focusin.bs.modal"),this.$element.removeClass("in").off("click.dismiss.bs.modal").off("mouseup.dismiss.bs.modal"),this.$dialog.off("mousedown.dismiss.bs.modal"),a.support.transition&&this.$element.hasClass("fade")?this.$element.one("bsTransitionEnd",a.proxy(this.hideModal,this)).emulateTransitionEnd(c.TRANSITION_DURATION):this.hideModal())},c.prototype.enforceFocus=function(){a(document).off("focusin.bs.modal").on("focusin.bs.modal",a.proxy(function(a){this.$element[0]===a.target||this.$element.has(a.target).length||this.$element.trigger("focus")},this))},c.prototype.escape=function(){this.isShown&&this.options.keyboard?this.$element.on("keydown.dismiss.bs.modal",a.proxy(function(a){27==a.which&&this.hide()},this)):this.isShown||this.$element.off("keydown.dismiss.bs.modal")},c.prototype.resize=function(){this.isShown?a(window).on("resize.bs.modal",a.proxy(this.handleUpdate,this)):a(window).off("resize.bs.modal")},c.prototype.hideModal=function(){var a=this;this.$element.hide(),this.backdrop(function(){a.$body.removeClass("modal-open"),a.resetAdjustments(),a.resetScrollbar(),a.$element.trigger("hidden.bs.modal")})},c.prototype.removeBackdrop=function(){this.$backdrop&&this.$backdrop.remove(),this.$backdrop=null},c.prototype.backdrop=function(b){var d=this,e=this.$element.hasClass("fade")?"fade":"";if(this.isShown&&this.options.backdrop){var f=a.support.transition&&e;if(this.$backdrop=a(document.createElement("div")).addClass("modal-backdrop "+e).appendTo(this.$body),this.$element.on("click.dismiss.bs.modal",a.proxy(function(a){return this.ignoreBackdropClick?void(this.ignoreBackdropClick=!1):void(a.target===a.currentTarget&&("static"==this.options.backdrop?this.$element[0].focus():this.hide()))},this)),f&&this.$backdrop[0].offsetWidth,this.$backdrop.addClass("in"),!b)return;f?this.$backdrop.one("bsTransitionEnd",b).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION):b()}else if(!this.isShown&&this.$backdrop){this.$backdrop.removeClass("in");var g=function(){d.removeBackdrop(),b&&b()};a.support.transition&&this.$element.hasClass("fade")?this.$backdrop.one("bsTransitionEnd",g).emulateTransitionEnd(c.BACKDROP_TRANSITION_DURATION):g()}else b&&b()},c.prototype.handleUpdate=function(){this.adjustDialog()},c.prototype.adjustDialog=function(){var a=this.$element[0].scrollHeight>document.documentElement.clientHeight;this.$element.css({paddingLeft:!this.bodyIsOverflowing&&a?this.scrollbarWidth:"",paddingRight:this.bodyIsOverflowing&&!a?this.scrollbarWidth:""})},c.prototype.resetAdjustments=function(){this.$element.css({paddingLeft:"",paddingRight:""})},c.prototype.checkScrollbar=function(){var a=window.innerWidth;if(!a){var b=document.documentElement.getBoundingClientRect();a=b.right-Math.abs(b.left)}this.bodyIsOverflowing=document.body.clientWidth<a,this.scrollbarWidth=this.measureScrollbar()},c.prototype.setScrollbar=function(){var a=parseInt(this.$body.css("padding-right")||0,10);this.originalBodyPad=document.body.style.paddingRight||"",this.bodyIsOverflowing&&this.$body.css("padding-right",a+this.scrollbarWidth)},c.prototype.resetScrollbar=function(){this.$body.css("padding-right",this.originalBodyPad)},c.prototype.measureScrollbar=function(){var a=document.createElement("div");a.className="modal-scrollbar-measure",this.$body.append(a);var b=a.offsetWidth-a.clientWidth;return this.$body[0].removeChild(a),b};var d=a.fn.modal;a.fn.modal=b,a.fn.modal.Constructor=c,a.fn.modal.noConflict=function(){return a.fn.modal=d,this},a(document).on("click.bs.modal.data-api",'[data-toggle="modal"]',function(c){var d=a(this),e=d.attr("href"),f=a(d.attr("data-target")||e&&e.replace(/.*(?=#[^\s]+$)/,"")),g=f.data("bs.modal")?"toggle":a.extend({remote:!/#/.test(e)&&e},f.data(),d.data());d.is("a")&&c.preventDefault(),f.one("show.bs.modal",function(a){a.isDefaultPrevented()||f.one("hidden.bs.modal",function(){d.is(":visible")&&d.trigger("focus")})}),b.call(f,g,this)})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.tooltip"),f="object"==typeof b&&b;(e||!/destroy|hide/.test(b))&&(e||d.data("bs.tooltip",e=new c(this,f)),"string"==typeof b&&e[b]())})}var c=function(a,b){this.type=null,this.options=null,this.enabled=null,this.timeout=null,this.hoverState=null,this.$element=null,this.inState=null,this.init("tooltip",a,b)};c.VERSION="3.3.6",c.TRANSITION_DURATION=150,c.DEFAULTS={animation:!0,placement:"top",selector:!1,template:'<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner"></div></div>',trigger:"hover focus",title:"",delay:0,html:!1,container:!1,viewport:{selector:"body",padding:0}},c.prototype.init=function(b,c,d){if(this.enabled=!0,this.type=b,this.$element=a(c),this.options=this.getOptions(d),this.$viewport=this.options.viewport&&a(a.isFunction(this.options.viewport)?this.options.viewport.call(this,this.$element):this.options.viewport.selector||this.options.viewport),this.inState={click:!1,hover:!1,focus:!1},this.$element[0]instanceof document.constructor&&!this.options.selector)throw new Error("`selector` option must be specified when initializing "+this.type+" on the window.document object!");for(var e=this.options.trigger.split(" "),f=e.length;f--;){var g=e[f];if("click"==g)this.$element.on("click."+this.type,this.options.selector,a.proxy(this.toggle,this));else if("manual"!=g){var h="hover"==g?"mouseenter":"focusin",i="hover"==g?"mouseleave":"focusout";this.$element.on(h+"."+this.type,this.options.selector,a.proxy(this.enter,this)),this.$element.on(i+"."+this.type,this.options.selector,a.proxy(this.leave,this))}}this.options.selector?this._options=a.extend({},this.options,{trigger:"manual",selector:""}):this.fixTitle()},c.prototype.getDefaults=function(){return c.DEFAULTS},c.prototype.getOptions=function(b){return b=a.extend({},this.getDefaults(),this.$element.data(),b),b.delay&&"number"==typeof b.delay&&(b.delay={show:b.delay,hide:b.delay}),b},c.prototype.getDelegateOptions=function(){var b={},c=this.getDefaults();return this._options&&a.each(this._options,function(a,d){c[a]!=d&&(b[a]=d)}),b},c.prototype.enter=function(b){var c=b instanceof this.constructor?b:a(b.currentTarget).data("bs."+this.type);return c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c)),b instanceof a.Event&&(c.inState["focusin"==b.type?"focus":"hover"]=!0),c.tip().hasClass("in")||"in"==c.hoverState?void(c.hoverState="in"):(clearTimeout(c.timeout),c.hoverState="in",c.options.delay&&c.options.delay.show?void(c.timeout=setTimeout(function(){"in"==c.hoverState&&c.show()},c.options.delay.show)):c.show())},c.prototype.isInStateTrue=function(){for(var a in this.inState)if(this.inState[a])return!0;return!1},c.prototype.leave=function(b){var c=b instanceof this.constructor?b:a(b.currentTarget).data("bs."+this.type);return c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c)),b instanceof a.Event&&(c.inState["focusout"==b.type?"focus":"hover"]=!1),c.isInStateTrue()?void 0:(clearTimeout(c.timeout),c.hoverState="out",c.options.delay&&c.options.delay.hide?void(c.timeout=setTimeout(function(){"out"==c.hoverState&&c.hide()},c.options.delay.hide)):c.hide())},c.prototype.show=function(){var b=a.Event("show.bs."+this.type);if(this.hasContent()&&this.enabled){this.$element.trigger(b);var d=a.contains(this.$element[0].ownerDocument.documentElement,this.$element[0]);if(b.isDefaultPrevented()||!d)return;var e=this,f=this.tip(),g=this.getUID(this.type);this.setContent(),f.attr("id",g),this.$element.attr("aria-describedby",g),this.options.animation&&f.addClass("fade");var h="function"==typeof this.options.placement?this.options.placement.call(this,f[0],this.$element[0]):this.options.placement,i=/\s?auto?\s?/i,j=i.test(h);j&&(h=h.replace(i,"")||"top"),f.detach().css({top:0,left:0,display:"block"}).addClass(h).data("bs."+this.type,this),this.options.container?f.appendTo(this.options.container):f.insertAfter(this.$element),this.$element.trigger("inserted.bs."+this.type);var k=this.getPosition(),l=f[0].offsetWidth,m=f[0].offsetHeight;if(j){var n=h,o=this.getPosition(this.$viewport);h="bottom"==h&&k.bottom+m>o.bottom?"top":"top"==h&&k.top-m<o.top?"bottom":"right"==h&&k.right+l>o.width?"left":"left"==h&&k.left-l<o.left?"right":h,f.removeClass(n).addClass(h)}var p=this.getCalculatedOffset(h,k,l,m);this.applyPlacement(p,h);var q=function(){var a=e.hoverState;e.$element.trigger("shown.bs."+e.type),e.hoverState=null,"out"==a&&e.leave(e)};a.support.transition&&this.$tip.hasClass("fade")?f.one("bsTransitionEnd",q).emulateTransitionEnd(c.TRANSITION_DURATION):q()}},c.prototype.applyPlacement=function(b,c){var d=this.tip(),e=d[0].offsetWidth,f=d[0].offsetHeight,g=parseInt(d.css("margin-top"),10),h=parseInt(d.css("margin-left"),10);isNaN(g)&&(g=0),isNaN(h)&&(h=0),b.top+=g,b.left+=h,a.offset.setOffset(d[0],a.extend({using:function(a){d.css({top:Math.round(a.top),left:Math.round(a.left)})}},b),0),d.addClass("in");var i=d[0].offsetWidth,j=d[0].offsetHeight;"top"==c&&j!=f&&(b.top=b.top+f-j);var k=this.getViewportAdjustedDelta(c,b,i,j);k.left?b.left+=k.left:b.top+=k.top;var l=/top|bottom/.test(c),m=l?2*k.left-e+i:2*k.top-f+j,n=l?"offsetWidth":"offsetHeight";d.offset(b),this.replaceArrow(m,d[0][n],l)},c.prototype.replaceArrow=function(a,b,c){this.arrow().css(c?"left":"top",50*(1-a/b)+"%").css(c?"top":"left","")},c.prototype.setContent=function(){var a=this.tip(),b=this.getTitle();a.find(".tooltip-inner")[this.options.html?"html":"text"](b),a.removeClass("fade in top bottom left right")},c.prototype.hide=function(b){function d(){"in"!=e.hoverState&&f.detach(),e.$element.removeAttr("aria-describedby").trigger("hidden.bs."+e.type),b&&b()}var e=this,f=a(this.$tip),g=a.Event("hide.bs."+this.type);return this.$element.trigger(g),g.isDefaultPrevented()?void 0:(f.removeClass("in"),a.support.transition&&f.hasClass("fade")?f.one("bsTransitionEnd",d).emulateTransitionEnd(c.TRANSITION_DURATION):d(),this.hoverState=null,this)},c.prototype.fixTitle=function(){var a=this.$element;(a.attr("title")||"string"!=typeof a.attr("data-original-title"))&&a.attr("data-original-title",a.attr("title")||"").attr("title","")},c.prototype.hasContent=function(){return this.getTitle()},c.prototype.getPosition=function(b){b=b||this.$element;var c=b[0],d="BODY"==c.tagName,e=c.getBoundingClientRect();null==e.width&&(e=a.extend({},e,{width:e.right-e.left,height:e.bottom-e.top}));var f=d?{top:0,left:0}:b.offset(),g={scroll:d?document.documentElement.scrollTop||document.body.scrollTop:b.scrollTop()},h=d?{width:a(window).width(),height:a(window).height()}:null;return a.extend({},e,g,h,f)},c.prototype.getCalculatedOffset=function(a,b,c,d){return"bottom"==a?{top:b.top+b.height,left:b.left+b.width/2-c/2}:"top"==a?{top:b.top-d,left:b.left+b.width/2-c/2}:"left"==a?{top:b.top+b.height/2-d/2,left:b.left-c}:{top:b.top+b.height/2-d/2,left:b.left+b.width}},c.prototype.getViewportAdjustedDelta=function(a,b,c,d){var e={top:0,left:0};if(!this.$viewport)return e;var f=this.options.viewport&&this.options.viewport.padding||0,g=this.getPosition(this.$viewport);if(/right|left/.test(a)){var h=b.top-f-g.scroll,i=b.top+f-g.scroll+d;h<g.top?e.top=g.top-h:i>g.top+g.height&&(e.top=g.top+g.height-i)}else{var j=b.left-f,k=b.left+f+c;j<g.left?e.left=g.left-j:k>g.right&&(e.left=g.left+g.width-k)}return e},c.prototype.getTitle=function(){var a,b=this.$element,c=this.options;return a=b.attr("data-original-title")||("function"==typeof c.title?c.title.call(b[0]):c.title)},c.prototype.getUID=function(a){do a+=~~(1e6*Math.random());while(document.getElementById(a));return a},c.prototype.tip=function(){if(!this.$tip&&(this.$tip=a(this.options.template),1!=this.$tip.length))throw new Error(this.type+" `template` option must consist of exactly 1 top-level element!");return this.$tip},c.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".tooltip-arrow")},c.prototype.enable=function(){this.enabled=!0},c.prototype.disable=function(){this.enabled=!1},c.prototype.toggleEnabled=function(){this.enabled=!this.enabled},c.prototype.toggle=function(b){var c=this;b&&(c=a(b.currentTarget).data("bs."+this.type),c||(c=new this.constructor(b.currentTarget,this.getDelegateOptions()),a(b.currentTarget).data("bs."+this.type,c))),b?(c.inState.click=!c.inState.click,c.isInStateTrue()?c.enter(c):c.leave(c)):c.tip().hasClass("in")?c.leave(c):c.enter(c)},c.prototype.destroy=function(){var a=this;clearTimeout(this.timeout),this.hide(function(){a.$element.off("."+a.type).removeData("bs."+a.type),a.$tip&&a.$tip.detach(),a.$tip=null,a.$arrow=null,a.$viewport=null})};var d=a.fn.tooltip;a.fn.tooltip=b,a.fn.tooltip.Constructor=c,a.fn.tooltip.noConflict=function(){return a.fn.tooltip=d,this}}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.popover"),f="object"==typeof b&&b;(e||!/destroy|hide/.test(b))&&(e||d.data("bs.popover",e=new c(this,f)),"string"==typeof b&&e[b]())})}var c=function(a,b){this.init("popover",a,b)};if(!a.fn.tooltip)throw new Error("Popover requires tooltip.js");c.VERSION="3.3.6",c.DEFAULTS=a.extend({},a.fn.tooltip.Constructor.DEFAULTS,{placement:"right",trigger:"click",content:"",template:'<div class="popover" role="tooltip"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content"></div></div>'}),c.prototype=a.extend({},a.fn.tooltip.Constructor.prototype),c.prototype.constructor=c,c.prototype.getDefaults=function(){return c.DEFAULTS},c.prototype.setContent=function(){var a=this.tip(),b=this.getTitle(),c=this.getContent();a.find(".popover-title")[this.options.html?"html":"text"](b),a.find(".popover-content").children().detach().end()[this.options.html?"string"==typeof c?"html":"append":"text"](c),a.removeClass("fade top bottom left right in"),a.find(".popover-title").html()||a.find(".popover-title").hide()},c.prototype.hasContent=function(){return this.getTitle()||this.getContent()},c.prototype.getContent=function(){var a=this.$element,b=this.options;return a.attr("data-content")||("function"==typeof b.content?b.content.call(a[0]):b.content)},c.prototype.arrow=function(){return this.$arrow=this.$arrow||this.tip().find(".arrow")};var d=a.fn.popover;a.fn.popover=b,a.fn.popover.Constructor=c,a.fn.popover.noConflict=function(){return a.fn.popover=d,this}}(jQuery),+function(a){"use strict";function b(c,d){this.$body=a(document.body),this.$scrollElement=a(a(c).is(document.body)?window:c),this.options=a.extend({},b.DEFAULTS,d),this.selector=(this.options.target||"")+" .nav li > a",this.offsets=[],this.targets=[],this.activeTarget=null,this.scrollHeight=0,this.$scrollElement.on("scroll.bs.scrollspy",a.proxy(this.process,this)),this.refresh(),this.process()}function c(c){return this.each(function(){var d=a(this),e=d.data("bs.scrollspy"),f="object"==typeof c&&c;e||d.data("bs.scrollspy",e=new b(this,f)),"string"==typeof c&&e[c]()})}b.VERSION="3.3.6",b.DEFAULTS={offset:10},b.prototype.getScrollHeight=function(){return this.$scrollElement[0].scrollHeight||Math.max(this.$body[0].scrollHeight,document.documentElement.scrollHeight)},b.prototype.refresh=function(){var b=this,c="offset",d=0;this.offsets=[],this.targets=[],this.scrollHeight=this.getScrollHeight(),a.isWindow(this.$scrollElement[0])||(c="position",d=this.$scrollElement.scrollTop()),this.$body.find(this.selector).map(function(){var b=a(this),e=b.data("target")||b.attr("href"),f=/^#./.test(e)&&a(e);return f&&f.length&&f.is(":visible")&&[[f[c]().top+d,e]]||null}).sort(function(a,b){return a[0]-b[0]}).each(function(){b.offsets.push(this[0]),b.targets.push(this[1])})},b.prototype.process=function(){var a,b=this.$scrollElement.scrollTop()+this.options.offset,c=this.getScrollHeight(),d=this.options.offset+c-this.$scrollElement.height(),e=this.offsets,f=this.targets,g=this.activeTarget;if(this.scrollHeight!=c&&this.refresh(),b>=d)return g!=(a=f[f.length-1])&&this.activate(a);if(g&&b<e[0])return this.activeTarget=null,this.clear();for(a=e.length;a--;)g!=f[a]&&b>=e[a]&&(void 0===e[a+1]||b<e[a+1])&&this.activate(f[a])},b.prototype.activate=function(b){this.activeTarget=b,this.clear();var c=this.selector+'[data-target="'+b+'"],'+this.selector+'[href="'+b+'"]',d=a(c).parents("li").addClass("active");
d.parent(".dropdown-menu").length&&(d=d.closest("li.dropdown").addClass("active")),d.trigger("activate.bs.scrollspy")},b.prototype.clear=function(){a(this.selector).parentsUntil(this.options.target,".active").removeClass("active")};var d=a.fn.scrollspy;a.fn.scrollspy=c,a.fn.scrollspy.Constructor=b,a.fn.scrollspy.noConflict=function(){return a.fn.scrollspy=d,this},a(window).on("load.bs.scrollspy.data-api",function(){a('[data-spy="scroll"]').each(function(){var b=a(this);c.call(b,b.data())})})}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.tab");e||d.data("bs.tab",e=new c(this)),"string"==typeof b&&e[b]()})}var c=function(b){this.element=a(b)};c.VERSION="3.3.6",c.TRANSITION_DURATION=150,c.prototype.show=function(){var b=this.element,c=b.closest("ul:not(.dropdown-menu)"),d=b.data("target");if(d||(d=b.attr("href"),d=d&&d.replace(/.*(?=#[^\s]*$)/,"")),!b.parent("li").hasClass("active")){var e=c.find(".active:last a"),f=a.Event("hide.bs.tab",{relatedTarget:b[0]}),g=a.Event("show.bs.tab",{relatedTarget:e[0]});if(e.trigger(f),b.trigger(g),!g.isDefaultPrevented()&&!f.isDefaultPrevented()){var h=a(d);this.activate(b.closest("li"),c),this.activate(h,h.parent(),function(){e.trigger({type:"hidden.bs.tab",relatedTarget:b[0]}),b.trigger({type:"shown.bs.tab",relatedTarget:e[0]})})}}},c.prototype.activate=function(b,d,e){function f(){g.removeClass("active").find("> .dropdown-menu > .active").removeClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!1),b.addClass("active").find('[data-toggle="tab"]').attr("aria-expanded",!0),h?(b[0].offsetWidth,b.addClass("in")):b.removeClass("fade"),b.parent(".dropdown-menu").length&&b.closest("li.dropdown").addClass("active").end().find('[data-toggle="tab"]').attr("aria-expanded",!0),e&&e()}var g=d.find("> .active"),h=e&&a.support.transition&&(g.length&&g.hasClass("fade")||!!d.find("> .fade").length);g.length&&h?g.one("bsTransitionEnd",f).emulateTransitionEnd(c.TRANSITION_DURATION):f(),g.removeClass("in")};var d=a.fn.tab;a.fn.tab=b,a.fn.tab.Constructor=c,a.fn.tab.noConflict=function(){return a.fn.tab=d,this};var e=function(c){c.preventDefault(),b.call(a(this),"show")};a(document).on("click.bs.tab.data-api",'[data-toggle="tab"]',e).on("click.bs.tab.data-api",'[data-toggle="pill"]',e)}(jQuery),+function(a){"use strict";function b(b){return this.each(function(){var d=a(this),e=d.data("bs.affix"),f="object"==typeof b&&b;e||d.data("bs.affix",e=new c(this,f)),"string"==typeof b&&e[b]()})}var c=function(b,d){this.options=a.extend({},c.DEFAULTS,d),this.$target=a(this.options.target).on("scroll.bs.affix.data-api",a.proxy(this.checkPosition,this)).on("click.bs.affix.data-api",a.proxy(this.checkPositionWithEventLoop,this)),this.$element=a(b),this.affixed=null,this.unpin=null,this.pinnedOffset=null,this.checkPosition()};c.VERSION="3.3.6",c.RESET="affix affix-top affix-bottom",c.DEFAULTS={offset:0,target:window},c.prototype.getState=function(a,b,c,d){var e=this.$target.scrollTop(),f=this.$element.offset(),g=this.$target.height();if(null!=c&&"top"==this.affixed)return c>e?"top":!1;if("bottom"==this.affixed)return null!=c?e+this.unpin<=f.top?!1:"bottom":a-d>=e+g?!1:"bottom";var h=null==this.affixed,i=h?e:f.top,j=h?g:b;return null!=c&&c>=e?"top":null!=d&&i+j>=a-d?"bottom":!1},c.prototype.getPinnedOffset=function(){if(this.pinnedOffset)return this.pinnedOffset;this.$element.removeClass(c.RESET).addClass("affix");var a=this.$target.scrollTop(),b=this.$element.offset();return this.pinnedOffset=b.top-a},c.prototype.checkPositionWithEventLoop=function(){setTimeout(a.proxy(this.checkPosition,this),1)},c.prototype.checkPosition=function(){if(this.$element.is(":visible")){var b=this.$element.height(),d=this.options.offset,e=d.top,f=d.bottom,g=Math.max(a(document).height(),a(document.body).height());"object"!=typeof d&&(f=e=d),"function"==typeof e&&(e=d.top(this.$element)),"function"==typeof f&&(f=d.bottom(this.$element));var h=this.getState(g,b,e,f);if(this.affixed!=h){null!=this.unpin&&this.$element.css("top","");var i="affix"+(h?"-"+h:""),j=a.Event(i+".bs.affix");if(this.$element.trigger(j),j.isDefaultPrevented())return;this.affixed=h,this.unpin="bottom"==h?this.getPinnedOffset():null,this.$element.removeClass(c.RESET).addClass(i).trigger(i.replace("affix","affixed")+".bs.affix")}"bottom"==h&&this.$element.offset({top:g-b-f})}};var d=a.fn.affix;a.fn.affix=b,a.fn.affix.Constructor=c,a.fn.affix.noConflict=function(){return a.fn.affix=d,this},a(window).on("load",function(){a('[data-spy="affix"]').each(function(){var c=a(this),d=c.data();d.offset=d.offset||{},null!=d.offsetBottom&&(d.offset.bottom=d.offsetBottom),null!=d.offsetTop&&(d.offset.top=d.offsetTop),b.call(c,d)})})}(jQuery);

/**************************************************************************
 * revolution slider js

**************************************************************************/
(function(t, e) {
    "use strict";

    function n() {
        if (!i.READY) {
            i.event.determineEventTypes();
            for (var t in i.gestures) i.gestures.hasOwnProperty(t) && i.detection.register(i.gestures[t]);
            i.event.onTouch(i.DOCUMENT, i.EVENT_MOVE, i.detection.detect), i.event.onTouch(i.DOCUMENT, i.EVENT_END, i.detection.detect), i.READY = !0
        }
    }
    var i = function(t, e) {
        return new i.Instance(t, e || {})
    };
    i.defaults = {
        stop_browser_behavior: {
            userSelect: "none",
            touchAction: "none",
            touchCallout: "none",
            contentZooming: "none",
            userDrag: "none",
            tapHighlightColor: "rgba(0,0,0,0)"
        }
    }, i.HAS_POINTEREVENTS = navigator.pointerEnabled || navigator.msPointerEnabled, i.HAS_TOUCHEVENTS = "ontouchstart" in t, i.MOBILE_REGEX = /mobile|tablet|ip(ad|hone|od)|android/i, i.NO_MOUSEEVENTS = i.HAS_TOUCHEVENTS && navigator.userAgent.match(i.MOBILE_REGEX), i.EVENT_TYPES = {}, i.DIRECTION_DOWN = "down", i.DIRECTION_LEFT = "left", i.DIRECTION_UP = "up", i.DIRECTION_RIGHT = "right", i.POINTER_MOUSE = "mouse", i.POINTER_TOUCH = "touch", i.POINTER_PEN = "pen", i.EVENT_START = "start", i.EVENT_MOVE = "move", i.EVENT_END = "end", i.DOCUMENT = document, i.plugins = {}, i.READY = !1, i.Instance = function(t, e) {
        var r = this;
        return n(), this.element = t, this.enabled = !0, this.options = i.utils.extend(i.utils.extend({}, i.defaults), e || {}), this.options.stop_browser_behavior && i.utils.stopDefaultBrowserBehavior(this.element, this.options.stop_browser_behavior), i.event.onTouch(t, i.EVENT_START, function(t) {
            r.enabled && i.detection.startDetect(r, t)
        }), this
    }, i.Instance.prototype = {
        on: function(t, e) {
            for (var n = t.split(" "), i = 0; n.length > i; i++) this.element.addEventListener(n[i], e, !1);
            return this
        },
        off: function(t, e) {
            for (var n = t.split(" "), i = 0; n.length > i; i++) this.element.removeEventListener(n[i], e, !1);
            return this
        },
        trigger: function(t, e) {
            var n = i.DOCUMENT.createEvent("Event");
            n.initEvent(t, !0, !0), n.gesture = e;
            var r = this.element;
            return i.utils.hasParent(e.target, r) && (r = e.target), r.dispatchEvent(n), this
        },
        enable: function(t) {
            return this.enabled = t, this
        }
    };
    var r = null,
        o = !1,
        s = !1;
    i.event = {
        bindDom: function(t, e, n) {
            for (var i = e.split(" "), r = 0; i.length > r; r++) t.addEventListener(i[r], n, !1)
        },
        onTouch: function(t, e, n) {
            var a = this;
            this.bindDom(t, i.EVENT_TYPES[e], function(c) {
                var u = c.type.toLowerCase();
                if (!u.match(/mouse/) || !s) {
                    (u.match(/touch/) || u.match(/pointerdown/) || u.match(/mouse/) && 1 === c.which) && (o = !0), u.match(/touch|pointer/) && (s = !0);
                    var h = 0;
                    o && (i.HAS_POINTEREVENTS && e != i.EVENT_END ? h = i.PointerEvent.updatePointer(e, c) : u.match(/touch/) ? h = c.touches.length : s || (h = u.match(/up/) ? 0 : 1), h > 0 && e == i.EVENT_END ? e = i.EVENT_MOVE : h || (e = i.EVENT_END), h || null === r ? r = c : c = r, n.call(i.detection, a.collectEventData(t, e, c)), i.HAS_POINTEREVENTS && e == i.EVENT_END && (h = i.PointerEvent.updatePointer(e, c))), h || (r = null, o = !1, s = !1, i.PointerEvent.reset())
                }
            })
        },
        determineEventTypes: function() {
            var t;
            t = i.HAS_POINTEREVENTS ? i.PointerEvent.getEvents() : i.NO_MOUSEEVENTS ? ["touchstart", "touchmove", "touchend touchcancel"] : ["touchstart mousedown", "touchmove mousemove", "touchend touchcancel mouseup"], i.EVENT_TYPES[i.EVENT_START] = t[0], i.EVENT_TYPES[i.EVENT_MOVE] = t[1], i.EVENT_TYPES[i.EVENT_END] = t[2]
        },
        getTouchList: function(t) {
            return i.HAS_POINTEREVENTS ? i.PointerEvent.getTouchList() : t.touches ? t.touches : [{
                identifier: 1,
                pageX: t.pageX,
                pageY: t.pageY,
                target: t.target
            }]
        },
        collectEventData: function(t, e, n) {
            var r = this.getTouchList(n, e),
                o = i.POINTER_TOUCH;
            return (n.type.match(/mouse/) || i.PointerEvent.matchType(i.POINTER_MOUSE, n)) && (o = i.POINTER_MOUSE), {
                center: i.utils.getCenter(r),
                timeStamp: (new Date).getTime(),
                target: n.target,
                touches: r,
                eventType: e,
                pointerType: o,
                srcEvent: n,
                preventDefault: function() {
                    this.srcEvent.preventManipulation && this.srcEvent.preventManipulation(), this.srcEvent.preventDefault && this.srcEvent.preventDefault()
                },
                stopPropagation: function() {
                    this.srcEvent.stopPropagation()
                },
                stopDetect: function() {
                    return i.detection.stopDetect()
                }
            }
        }
    }, i.PointerEvent = {
        pointers: {},
        getTouchList: function() {
            var t = this,
                e = [];
            return Object.keys(t.pointers).sort().forEach(function(n) {
                e.push(t.pointers[n])
            }), e
        },
        updatePointer: function(t, e) {
            return t == i.EVENT_END ? this.pointers = {} : (e.identifier = e.pointerId, this.pointers[e.pointerId] = e), Object.keys(this.pointers).length
        },
        matchType: function(t, e) {
            if (!e.pointerType) return !1;
            var n = {};
            return n[i.POINTER_MOUSE] = e.pointerType == e.MSPOINTER_TYPE_MOUSE || e.pointerType == i.POINTER_MOUSE, n[i.POINTER_TOUCH] = e.pointerType == e.MSPOINTER_TYPE_TOUCH || e.pointerType == i.POINTER_TOUCH, n[i.POINTER_PEN] = e.pointerType == e.MSPOINTER_TYPE_PEN || e.pointerType == i.POINTER_PEN, n[t]
        },
        getEvents: function() {
            return ["pointerdown MSPointerDown", "pointermove MSPointerMove", "pointerup pointercancel MSPointerUp MSPointerCancel"]
        },
        reset: function() {
            this.pointers = {}
        }
    }, i.utils = {
        extend: function(t, n, i) {
            for (var r in n) t[r] !== e && i || (t[r] = n[r]);
            return t
        },
        hasParent: function(t, e) {
            for (; t;) {
                if (t == e) return !0;
                t = t.parentNode
            }
            return !1
        },
        getCenter: function(t) {
            for (var e = [], n = [], i = 0, r = t.length; r > i; i++) e.push(t[i].pageX), n.push(t[i].pageY);
            return {
                pageX: (Math.min.apply(Math, e) + Math.max.apply(Math, e)) / 2,
                pageY: (Math.min.apply(Math, n) + Math.max.apply(Math, n)) / 2
            }
        },
        getVelocity: function(t, e, n) {
            return {
                x: Math.abs(e / t) || 0,
                y: Math.abs(n / t) || 0
            }
        },
        getAngle: function(t, e) {
            var n = e.pageY - t.pageY,
                i = e.pageX - t.pageX;
            return 180 * Math.atan2(n, i) / Math.PI
        },
        getDirection: function(t, e) {
            var n = Math.abs(t.pageX - e.pageX),
                r = Math.abs(t.pageY - e.pageY);
            return n >= r ? t.pageX - e.pageX > 0 ? i.DIRECTION_LEFT : i.DIRECTION_RIGHT : t.pageY - e.pageY > 0 ? i.DIRECTION_UP : i.DIRECTION_DOWN
        },
        getDistance: function(t, e) {
            var n = e.pageX - t.pageX,
                i = e.pageY - t.pageY;
            return Math.sqrt(n * n + i * i)
        },
        getScale: function(t, e) {
            return t.length >= 2 && e.length >= 2 ? this.getDistance(e[0], e[1]) / this.getDistance(t[0], t[1]) : 1
        },
        getRotation: function(t, e) {
            return t.length >= 2 && e.length >= 2 ? this.getAngle(e[1], e[0]) - this.getAngle(t[1], t[0]) : 0
        },
        isVertical: function(t) {
            return t == i.DIRECTION_UP || t == i.DIRECTION_DOWN
        },
        stopDefaultBrowserBehavior: function(t, e) {
            var n, i = ["webkit", "khtml", "moz", "ms", "o", ""];
            if (e && t.style) {
                for (var r = 0; i.length > r; r++)
                    for (var o in e) e.hasOwnProperty(o) && (n = o, i[r] && (n = i[r] + n.substring(0, 1).toUpperCase() + n.substring(1)), t.style[n] = e[o]);
                "none" == e.userSelect && (t.onselectstart = function() {
                    return !1
                })
            }
        }
    }, i.detection = {
        gestures: [],
        current: null,
        previous: null,
        stopped: !1,
        startDetect: function(t, e) {
            this.current || (this.stopped = !1, this.current = {
                inst: t,
                startEvent: i.utils.extend({}, e),
                lastEvent: !1,
                name: ""
            }, this.detect(e))
        },
        detect: function(t) {
            if (this.current && !this.stopped) {
                t = this.extendEventData(t);
                for (var e = this.current.inst.options, n = 0, r = this.gestures.length; r > n; n++) {
                    var o = this.gestures[n];
                    if (!this.stopped && e[o.name] !== !1 && o.handler.call(o, t, this.current.inst) === !1) {
                        this.stopDetect();
                        break
                    }
                }
                return this.current && (this.current.lastEvent = t), t.eventType == i.EVENT_END && !t.touches.length - 1 && this.stopDetect(), t
            }
        },
        stopDetect: function() {
            this.previous = i.utils.extend({}, this.current), this.current = null, this.stopped = !0
        },
        extendEventData: function(t) {
            var e = this.current.startEvent;
            if (e && (t.touches.length != e.touches.length || t.touches === e.touches)) {
                e.touches = [];
                for (var n = 0, r = t.touches.length; r > n; n++) e.touches.push(i.utils.extend({}, t.touches[n]))
            }
            var o = t.timeStamp - e.timeStamp,
                s = t.center.pageX - e.center.pageX,
                a = t.center.pageY - e.center.pageY,
                c = i.utils.getVelocity(o, s, a);
            return i.utils.extend(t, {
                deltaTime: o,
                deltaX: s,
                deltaY: a,
                velocityX: c.x,
                velocityY: c.y,
                distance: i.utils.getDistance(e.center, t.center),
                angle: i.utils.getAngle(e.center, t.center),
                direction: i.utils.getDirection(e.center, t.center),
                scale: i.utils.getScale(e.touches, t.touches),
                rotation: i.utils.getRotation(e.touches, t.touches),
                startEvent: e
            }), t
        },
        register: function(t) {
            var n = t.defaults || {};
            return n[t.name] === e && (n[t.name] = !0), i.utils.extend(i.defaults, n, !0), t.index = t.index || 1e3, this.gestures.push(t), this.gestures.sort(function(t, e) {
                return t.index < e.index ? -1 : t.index > e.index ? 1 : 0
            }), this.gestures
        }
    }, i.gestures = i.gestures || {}, i.gestures.Hold = {
        name: "hold",
        index: 10,
        defaults: {
            hold_timeout: 500,
            hold_threshold: 1
        },
        timer: null,
        handler: function(t, e) {
            switch (t.eventType) {
                case i.EVENT_START:
                    clearTimeout(this.timer), i.detection.current.name = this.name, this.timer = setTimeout(function() {
                        "hold" == i.detection.current.name && e.trigger("hold", t)
                    }, e.options.hold_timeout);
                    break;
                case i.EVENT_MOVE:
                    t.distance > e.options.hold_threshold && clearTimeout(this.timer);
                    break;
                case i.EVENT_END:
                    clearTimeout(this.timer)
            }
        }
    }, i.gestures.Tap = {
        name: "tap",
        index: 100,
        defaults: {
            tap_max_touchtime: 250,
            tap_max_distance: 10,
            tap_always: !0,
            doubletap_distance: 20,
            doubletap_interval: 300
        },
        handler: function(t, e) {
            if (t.eventType == i.EVENT_END) {
                var n = i.detection.previous,
                    r = !1;
                if (t.deltaTime > e.options.tap_max_touchtime || t.distance > e.options.tap_max_distance) return;
                n && "tap" == n.name && t.timeStamp - n.lastEvent.timeStamp < e.options.doubletap_interval && t.distance < e.options.doubletap_distance && (e.trigger("doubletap", t), r = !0), (!r || e.options.tap_always) && (i.detection.current.name = "tap", e.trigger(i.detection.current.name, t))
            }
        }
    }, i.gestures.Swipe = {
        name: "swipe",
        index: 40,
        defaults: {
            swipe_max_touches: 1,
            swipe_velocity: .7
        },
        handler: function(t, e) {
            if (t.eventType == i.EVENT_END) {
                if (e.options.swipe_max_touches > 0 && t.touches.length > e.options.swipe_max_touches) return;
                (t.velocityX > e.options.swipe_velocity || t.velocityY > e.options.swipe_velocity) && (e.trigger(this.name, t), e.trigger(this.name + t.direction, t))
            }
        }
    }, i.gestures.Drag = {
        name: "drag",
        index: 50,
        defaults: {
            drag_min_distance: 10,
            drag_max_touches: 1,
            drag_block_horizontal: !1,
            drag_block_vertical: !1,
            drag_lock_to_axis: !1,
            drag_lock_min_distance: 25
        },
        triggered: !1,
        handler: function(t, n) {
            if (i.detection.current.name != this.name && this.triggered) return n.trigger(this.name + "end", t), this.triggered = !1, e;
            if (!(n.options.drag_max_touches > 0 && t.touches.length > n.options.drag_max_touches)) switch (t.eventType) {
                case i.EVENT_START:
                    this.triggered = !1;
                    break;
                case i.EVENT_MOVE:
                    if (t.distance < n.options.drag_min_distance && i.detection.current.name != this.name) return;
                    i.detection.current.name = this.name, (i.detection.current.lastEvent.drag_locked_to_axis || n.options.drag_lock_to_axis && n.options.drag_lock_min_distance <= t.distance) && (t.drag_locked_to_axis = !0);
                    var r = i.detection.current.lastEvent.direction;
                    t.drag_locked_to_axis && r !== t.direction && (t.direction = i.utils.isVertical(r) ? 0 > t.deltaY ? i.DIRECTION_UP : i.DIRECTION_DOWN : 0 > t.deltaX ? i.DIRECTION_LEFT : i.DIRECTION_RIGHT), this.triggered || (n.trigger(this.name + "start", t), this.triggered = !0), n.trigger(this.name, t), n.trigger(this.name + t.direction, t), (n.options.drag_block_vertical && i.utils.isVertical(t.direction) || n.options.drag_block_horizontal && !i.utils.isVertical(t.direction)) && t.preventDefault();
                    break;
                case i.EVENT_END:
                    this.triggered && n.trigger(this.name + "end", t), this.triggered = !1
            }
        }
    }, i.gestures.Transform = {
        name: "transform",
        index: 45,
        defaults: {
            transform_min_scale: .01,
            transform_min_rotation: 1,
            transform_always_block: !1
        },
        triggered: !1,
        handler: function(t, n) {
            if (i.detection.current.name != this.name && this.triggered) return n.trigger(this.name + "end", t), this.triggered = !1, e;
            if (!(2 > t.touches.length)) switch (n.options.transform_always_block && t.preventDefault(), t.eventType) {
                case i.EVENT_START:
                    this.triggered = !1;
                    break;
                case i.EVENT_MOVE:
                    var r = Math.abs(1 - t.scale),
                        o = Math.abs(t.rotation);
                    if (n.options.transform_min_scale > r && n.options.transform_min_rotation > o) return;
                    i.detection.current.name = this.name, this.triggered || (n.trigger(this.name + "start", t), this.triggered = !0), n.trigger(this.name, t), o > n.options.transform_min_rotation && n.trigger("rotate", t), r > n.options.transform_min_scale && (n.trigger("pinch", t), n.trigger("pinch" + (1 > t.scale ? "in" : "out"), t));
                    break;
                case i.EVENT_END:
                    this.triggered && n.trigger(this.name + "end", t), this.triggered = !1
            }
        }
    }, i.gestures.Touch = {
        name: "touch",
        index: -1 / 0,
        defaults: {
            prevent_default: !1,
            prevent_mouseevents: !1
        },
        handler: function(t, n) {
            return n.options.prevent_mouseevents && t.pointerType == i.POINTER_MOUSE ? (t.stopDetect(), e) : (n.options.prevent_default && t.preventDefault(), t.eventType == i.EVENT_START && n.trigger(this.name, t), e)
        }
    }, i.gestures.Release = {
        name: "release",
        index: 1 / 0,
        handler: function(t, e) {
            t.eventType == i.EVENT_END && e.trigger(this.name, t)
        }
    }, "object" == typeof module && "object" == typeof module.exports ? module.exports = i : (t.Hammer = i, "function" == typeof t.define && t.define.amd && t.define("hammer", [], function() {
        return i
    }))
})(this),
function(t, e) {
    "use strict";
    t !== e && (Hammer.event.bindDom = function(n, i, r) {
        t(n).on(i, function(t) {
            var n = t.originalEvent || t;
            n.pageX === e && (n.pageX = t.pageX, n.pageY = t.pageY), n.target || (n.target = t.target), n.which === e && (n.which = n.button), n.preventDefault || (n.preventDefault = t.preventDefault), n.stopPropagation || (n.stopPropagation = t.stopPropagation), r.call(this, n)
        })
    }, Hammer.Instance.prototype.on = function(e, n) {
        return t(this.element).on(e, n)
    }, Hammer.Instance.prototype.off = function(e, n) {
        return t(this.element).off(e, n)
    }, Hammer.Instance.prototype.trigger = function(e, n) {
        var i = t(this.element);
        return i.has(n.target).length && (i = t(n.target)), i.trigger({
            type: e,
            gesture: n
        })
    }, t.fn.hammer = function(e) {
        return this.each(function() {
            var n = t(this),
                i = n.data("hammer");
            i ? i && e && Hammer.utils.extend(i.options, e) : n.data("hammer", new Hammer(this, e || {}))
        })
    })
}(window.jQuery || window.Zepto);



(function(t) {
    "use strict";
    var e = t.GreenSockGlobals || t;
    if (!e.TweenLite) {
        var i, s, r, n, a, o = function(t) {
                var i, s = t.split("."),
                    r = e;
                for (i = 0; s.length > i; i++) r[s[i]] = r = r[s[i]] || {};
                return r
            },
            l = o("com.greensock"),
            h = 1e-10,
            _ = [].slice,
            u = function() {},
            m = function() {
                var t = Object.prototype.toString,
                    e = t.call([]);
                return function(i) {
                    return null != i && (i instanceof Array || "object" == typeof i && !!i.push && t.call(i) === e)
                }
            }(),
            f = {},
            p = function(i, s, r, n) {
                this.sc = f[i] ? f[i].sc : [], f[i] = this, this.gsClass = null, this.func = r;
                var a = [];
                this.check = function(l) {
                    for (var h, _, u, m, c = s.length, d = c; --c > -1;)(h = f[s[c]] || new p(s[c], [])).gsClass ? (a[c] = h.gsClass, d--) : l && h.sc.push(this);
                    if (0 === d && r)
                        for (_ = ("com.greensock." + i).split("."), u = _.pop(), m = o(_.join("."))[u] = this.gsClass = r.apply(r, a), n && (e[u] = m, "function" == typeof define && define.amd ? define((t.GreenSockAMDPath ? t.GreenSockAMDPath + "/" : "") + i.split(".").join("/"), [], function() {
                                return m
                            }) : "undefined" != typeof module && module.exports && (module.exports = m)), c = 0; this.sc.length > c; c++) this.sc[c].check()
                }, this.check(!0)
            },
            c = t._gsDefine = function(t, e, i, s) {
                return new p(t, e, i, s)
            },
            d = l._class = function(t, e, i) {
                return e = e || function() {}, c(t, [], function() {
                    return e
                }, i), e
            };
        c.globals = e;
        var v = [0, 0, 1, 1],
            g = [],
            T = d("easing.Ease", function(t, e, i, s) {
                this._func = t, this._type = i || 0, this._power = s || 0, this._params = e ? v.concat(e) : v
            }, !0),
            w = T.map = {},
            P = T.register = function(t, e, i, s) {
                for (var r, n, a, o, h = e.split(","), _ = h.length, u = (i || "easeIn,easeOut,easeInOut").split(","); --_ > -1;)
                    for (n = h[_], r = s ? d("easing." + n, null, !0) : l.easing[n] || {}, a = u.length; --a > -1;) o = u[a], w[n + "." + o] = w[o + n] = r[o] = t.getRatio ? t : t[o] || new t
            };
        for (r = T.prototype, r._calcEnd = !1, r.getRatio = function(t) {
                if (this._func) return this._params[0] = t, this._func.apply(null, this._params);
                var e = this._type,
                    i = this._power,
                    s = 1 === e ? 1 - t : 2 === e ? t : .5 > t ? 2 * t : 2 * (1 - t);
                return 1 === i ? s *= s : 2 === i ? s *= s * s : 3 === i ? s *= s * s * s : 4 === i && (s *= s * s * s * s), 1 === e ? 1 - s : 2 === e ? s : .5 > t ? s / 2 : 1 - s / 2
            }, i = ["Linear", "Quad", "Cubic", "Quart", "Quint,Strong"], s = i.length; --s > -1;) r = i[s] + ",Power" + s, P(new T(null, null, 1, s), r, "easeOut", !0), P(new T(null, null, 2, s), r, "easeIn" + (0 === s ? ",easeNone" : "")), P(new T(null, null, 3, s), r, "easeInOut");
        w.linear = l.easing.Linear.easeIn, w.swing = l.easing.Quad.easeInOut;
        var y = d("events.EventDispatcher", function(t) {
            this._listeners = {}, this._eventTarget = t || this
        });
        r = y.prototype, r.addEventListener = function(t, e, i, s, r) {
            r = r || 0;
            var o, l, h = this._listeners[t],
                _ = 0;
            for (null == h && (this._listeners[t] = h = []), l = h.length; --l > -1;) o = h[l], o.c === e && o.s === i ? h.splice(l, 1) : 0 === _ && r > o.pr && (_ = l + 1);
            h.splice(_, 0, {
                c: e,
                s: i,
                up: s,
                pr: r
            }), this !== n || a || n.wake()
        }, r.removeEventListener = function(t, e) {
            var i, s = this._listeners[t];
            if (s)
                for (i = s.length; --i > -1;)
                    if (s[i].c === e) return s.splice(i, 1), void 0
        }, r.dispatchEvent = function(t) {
            var e, i, s, r = this._listeners[t];
            if (r)
                for (e = r.length, i = this._eventTarget; --e > -1;) s = r[e], s.up ? s.c.call(s.s || i, {
                    type: t,
                    target: i
                }) : s.c.call(s.s || i)
        };
        var b = t.requestAnimationFrame,
            k = t.cancelAnimationFrame,
            A = Date.now || function() {
                return (new Date).getTime()
            },
            S = A();
        for (i = ["ms", "moz", "webkit", "o"], s = i.length; --s > -1 && !b;) b = t[i[s] + "RequestAnimationFrame"], k = t[i[s] + "CancelAnimationFrame"] || t[i[s] + "CancelRequestAnimationFrame"];
        d("Ticker", function(t, e) {
            var i, s, r, o, l, h = this,
                _ = A(),
                m = e !== !1 && b,
                f = function(t) {
                    S = A(), h.time = (S - _) / 1e3;
                    var e, n = h.time - l;
                    (!i || n > 0 || t === !0) && (h.frame++, l += n + (n >= o ? .004 : o - n), e = !0), t !== !0 && (r = s(f)), e && h.dispatchEvent("tick")
                };
            y.call(h), h.time = h.frame = 0, h.tick = function() {
                f(!0)
            }, h.sleep = function() {
                null != r && (m && k ? k(r) : clearTimeout(r), s = u, r = null, h === n && (a = !1))
            }, h.wake = function() {
                null !== r && h.sleep(), s = 0 === i ? u : m && b ? b : function(t) {
                    return setTimeout(t, 0 | 1e3 * (l - h.time) + 1)
                }, h === n && (a = !0), f(2)
            }, h.fps = function(t) {
                return arguments.length ? (i = t, o = 1 / (i || 60), l = this.time + o, h.wake(), void 0) : i
            }, h.useRAF = function(t) {
                return arguments.length ? (h.sleep(), m = t, h.fps(i), void 0) : m
            }, h.fps(t), setTimeout(function() {
                m && (!r || 5 > h.frame) && h.useRAF(!1)
            }, 1500)
        }), r = l.Ticker.prototype = new l.events.EventDispatcher, r.constructor = l.Ticker;
        var x = d("core.Animation", function(t, e) {
            if (this.vars = e = e || {}, this._duration = this._totalDuration = t || 0, this._delay = Number(e.delay) || 0, this._timeScale = 1, this._active = e.immediateRender === !0, this.data = e.data, this._reversed = e.reversed === !0, Q) {
                a || n.wake();
                var i = this.vars.useFrames ? G : Q;
                i.add(this, i._time), this.vars.paused && this.paused(!0)
            }
        });
        n = x.ticker = new l.Ticker, r = x.prototype, r._dirty = r._gc = r._initted = r._paused = !1, r._totalTime = r._time = 0, r._rawPrevTime = -1, r._next = r._last = r._onUpdate = r._timeline = r.timeline = null, r._paused = !1;
        var C = function() {
            a && A() - S > 2e3 && n.wake(), setTimeout(C, 2e3)
        };
        C(), r.play = function(t, e) {
            return arguments.length && this.seek(t, e), this.reversed(!1).paused(!1)
        }, r.pause = function(t, e) {
            return arguments.length && this.seek(t, e), this.paused(!0)
        }, r.resume = function(t, e) {
            return arguments.length && this.seek(t, e), this.paused(!1)
        }, r.seek = function(t, e) {
            return this.totalTime(Number(t), e !== !1)
        }, r.restart = function(t, e) {
            return this.reversed(!1).paused(!1).totalTime(t ? -this._delay : 0, e !== !1, !0)
        }, r.reverse = function(t, e) {
            return arguments.length && this.seek(t || this.totalDuration(), e), this.reversed(!0).paused(!1)
        }, r.render = function() {}, r.invalidate = function() {
            return this
        }, r.isActive = function() {
            var t, e = this._timeline,
                i = this._startTime;
            return !e || !this._gc && !this._paused && e.isActive() && (t = e.rawTime()) >= i && i + this.totalDuration() / this._timeScale > t
        }, r._enabled = function(t, e) {
            return a || n.wake(), this._gc = !t, this._active = this.isActive(), e !== !0 && (t && !this.timeline ? this._timeline.add(this, this._startTime - this._delay) : !t && this.timeline && this._timeline._remove(this, !0)), !1
        }, r._kill = function() {
            return this._enabled(!1, !1)
        }, r.kill = function(t, e) {
            return this._kill(t, e), this
        }, r._uncache = function(t) {
            for (var e = t ? this : this.timeline; e;) e._dirty = !0, e = e.timeline;
            return this
        }, r._swapSelfInParams = function(t) {
            for (var e = t.length, i = t.concat(); --e > -1;) "{self}" === t[e] && (i[e] = this);
            return i
        }, r.eventCallback = function(t, e, i, s) {
            if ("on" === (t || "").substr(0, 2)) {
                var r = this.vars;
                if (1 === arguments.length) return r[t];
                null == e ? delete r[t] : (r[t] = e, r[t + "Params"] = m(i) && -1 !== i.join("").indexOf("{self}") ? this._swapSelfInParams(i) : i, r[t + "Scope"] = s), "onUpdate" === t && (this._onUpdate = e)
            }
            return this
        }, r.delay = function(t) {
            return arguments.length ? (this._timeline.smoothChildTiming && this.startTime(this._startTime + t - this._delay), this._delay = t, this) : this._delay
        }, r.duration = function(t) {
            return arguments.length ? (this._duration = this._totalDuration = t, this._uncache(!0), this._timeline.smoothChildTiming && this._time > 0 && this._time < this._duration && 0 !== t && this.totalTime(this._totalTime * (t / this._duration), !0), this) : (this._dirty = !1, this._duration)
        }, r.totalDuration = function(t) {
            return this._dirty = !1, arguments.length ? this.duration(t) : this._totalDuration
        }, r.time = function(t, e) {
            return arguments.length ? (this._dirty && this.totalDuration(), this.totalTime(t > this._duration ? this._duration : t, e)) : this._time
        }, r.totalTime = function(t, e, i) {
            if (a || n.wake(), !arguments.length) return this._totalTime;
            if (this._timeline) {
                if (0 > t && !i && (t += this.totalDuration()), this._timeline.smoothChildTiming) {
                    this._dirty && this.totalDuration();
                    var s = this._totalDuration,
                        r = this._timeline;
                    if (t > s && !i && (t = s), this._startTime = (this._paused ? this._pauseTime : r._time) - (this._reversed ? s - t : t) / this._timeScale, r._dirty || this._uncache(!1), r._timeline)
                        for (; r._timeline;) r._timeline._time !== (r._startTime + r._totalTime) / r._timeScale && r.totalTime(r._totalTime, !0), r = r._timeline
                }
                this._gc && this._enabled(!0, !1), (this._totalTime !== t || 0 === this._duration) && this.render(t, e, !1)
            }
            return this
        }, r.progress = r.totalProgress = function(t, e) {
            return arguments.length ? this.totalTime(this.duration() * t, e) : this._time / this.duration()
        }, r.startTime = function(t) {
            return arguments.length ? (t !== this._startTime && (this._startTime = t, this.timeline && this.timeline._sortChildren && this.timeline.add(this, t - this._delay)), this) : this._startTime
        }, r.timeScale = function(t) {
            if (!arguments.length) return this._timeScale;
            if (t = t || h, this._timeline && this._timeline.smoothChildTiming) {
                var e = this._pauseTime,
                    i = e || 0 === e ? e : this._timeline.totalTime();
                this._startTime = i - (i - this._startTime) * this._timeScale / t
            }
            return this._timeScale = t, this._uncache(!1)
        }, r.reversed = function(t) {
            return arguments.length ? (t != this._reversed && (this._reversed = t, this.totalTime(this._timeline && !this._timeline.smoothChildTiming ? this.totalDuration() - this._totalTime : this._totalTime, !0)), this) : this._reversed
        }, r.paused = function(t) {
            if (!arguments.length) return this._paused;
            if (t != this._paused && this._timeline) {
                a || t || n.wake();
                var e = this._timeline,
                    i = e.rawTime(),
                    s = i - this._pauseTime;
                !t && e.smoothChildTiming && (this._startTime += s, this._uncache(!1)), this._pauseTime = t ? i : null, this._paused = t, this._active = this.isActive(), !t && 0 !== s && this._initted && this.duration() && this.render(e.smoothChildTiming ? this._totalTime : (i - this._startTime) / this._timeScale, !0, !0)
            }
            return this._gc && !t && this._enabled(!0, !1), this
        };
        var R = d("core.SimpleTimeline", function(t) {
            x.call(this, 0, t), this.autoRemoveChildren = this.smoothChildTiming = !0
        });
        r = R.prototype = new x, r.constructor = R, r.kill()._gc = !1, r._first = r._last = null, r._sortChildren = !1, r.add = r.insert = function(t, e) {
            var i, s;
            if (t._startTime = Number(e || 0) + t._delay, t._paused && this !== t._timeline && (t._pauseTime = t._startTime + (this.rawTime() - t._startTime) / t._timeScale), t.timeline && t.timeline._remove(t, !0), t.timeline = t._timeline = this, t._gc && t._enabled(!0, !0), i = this._last, this._sortChildren)
                for (s = t._startTime; i && i._startTime > s;) i = i._prev;
            return i ? (t._next = i._next, i._next = t) : (t._next = this._first, this._first = t), t._next ? t._next._prev = t : this._last = t, t._prev = i, this._timeline && this._uncache(!0), this
        }, r._remove = function(t, e) {
            return t.timeline === this && (e || t._enabled(!1, !0), t.timeline = null, t._prev ? t._prev._next = t._next : this._first === t && (this._first = t._next), t._next ? t._next._prev = t._prev : this._last === t && (this._last = t._prev), this._timeline && this._uncache(!0)), this
        }, r.render = function(t, e, i) {
            var s, r = this._first;
            for (this._totalTime = this._time = this._rawPrevTime = t; r;) s = r._next, (r._active || t >= r._startTime && !r._paused) && (r._reversed ? r.render((r._dirty ? r.totalDuration() : r._totalDuration) - (t - r._startTime) * r._timeScale, e, i) : r.render((t - r._startTime) * r._timeScale, e, i)), r = s
        }, r.rawTime = function() {
            return a || n.wake(), this._totalTime
        };
        var D = d("TweenLite", function(e, i, s) {
                if (x.call(this, i, s), this.render = D.prototype.render, null == e) throw "Cannot tween a null target.";
                this.target = e = "string" != typeof e ? e : D.selector(e) || e;
                var r, n, a, o = e.jquery || e.length && e !== t && e[0] && (e[0] === t || e[0].nodeType && e[0].style && !e.nodeType),
                    l = this.vars.overwrite;
                if (this._overwrite = l = null == l ? j[D.defaultOverwrite] : "number" == typeof l ? l >> 0 : j[l], (o || e instanceof Array || e.push && m(e)) && "number" != typeof e[0])
                    for (this._targets = a = _.call(e, 0), this._propLookup = [], this._siblings = [], r = 0; a.length > r; r++) n = a[r], n ? "string" != typeof n ? n.length && n !== t && n[0] && (n[0] === t || n[0].nodeType && n[0].style && !n.nodeType) ? (a.splice(r--, 1), this._targets = a = a.concat(_.call(n, 0))) : (this._siblings[r] = B(n, this, !1), 1 === l && this._siblings[r].length > 1 && q(n, this, null, 1, this._siblings[r])) : (n = a[r--] = D.selector(n), "string" == typeof n && a.splice(r + 1, 1)) : a.splice(r--, 1);
                else this._propLookup = {}, this._siblings = B(e, this, !1), 1 === l && this._siblings.length > 1 && q(e, this, null, 1, this._siblings);
                (this.vars.immediateRender || 0 === i && 0 === this._delay && this.vars.immediateRender !== !1) && this.render(-this._delay, !1, !0)
            }, !0),
            E = function(e) {
                return e.length && e !== t && e[0] && (e[0] === t || e[0].nodeType && e[0].style && !e.nodeType)
            },
            I = function(t, e) {
                var i, s = {};
                for (i in t) F[i] || i in e && "x" !== i && "y" !== i && "width" !== i && "height" !== i && "className" !== i && "border" !== i || !(!N[i] || N[i] && N[i]._autoCSS) || (s[i] = t[i], delete t[i]);
                t.css = s
            };
        r = D.prototype = new x, r.constructor = D, r.kill()._gc = !1, r.ratio = 0, r._firstPT = r._targets = r._overwrittenProps = r._startAt = null, r._notifyPluginsOfEnabled = !1, D.version = "1.11.5", D.defaultEase = r._ease = new T(null, null, 1, 1), D.defaultOverwrite = "auto", D.ticker = n, D.autoSleep = !0, D.selector = t.$ || t.jQuery || function(e) {
            return t.$ ? (D.selector = t.$, t.$(e)) : t.document ? t.document.getElementById("#" === e.charAt(0) ? e.substr(1) : e) : e
        };
        var O = D._internals = {
                isArray: m,
                isSelector: E
            },
            N = D._plugins = {},
            L = D._tweenLookup = {},
            U = 0,
            F = O.reservedProps = {
                ease: 1,
                delay: 1,
                overwrite: 1,
                onComplete: 1,
                onCompleteParams: 1,
                onCompleteScope: 1,
                useFrames: 1,
                runBackwards: 1,
                startAt: 1,
                onUpdate: 1,
                onUpdateParams: 1,
                onUpdateScope: 1,
                onStart: 1,
                onStartParams: 1,
                onStartScope: 1,
                onReverseComplete: 1,
                onReverseCompleteParams: 1,
                onReverseCompleteScope: 1,
                onRepeat: 1,
                onRepeatParams: 1,
                onRepeatScope: 1,
                easeParams: 1,
                yoyo: 1,
                immediateRender: 1,
                repeat: 1,
                repeatDelay: 1,
                data: 1,
                paused: 1,
                reversed: 1,
                autoCSS: 1
            },
            j = {
                none: 0,
                all: 1,
                auto: 2,
                concurrent: 3,
                allOnStart: 4,
                preexisting: 5,
                "true": 1,
                "false": 0
            },
            G = x._rootFramesTimeline = new R,
            Q = x._rootTimeline = new R;
        Q._startTime = n.time, G._startTime = n.frame, Q._active = G._active = !0, x._updateRoot = function() {
            if (Q.render((n.time - Q._startTime) * Q._timeScale, !1, !1), G.render((n.frame - G._startTime) * G._timeScale, !1, !1), !(n.frame % 120)) {
                var t, e, i;
                for (i in L) {
                    for (e = L[i].tweens, t = e.length; --t > -1;) e[t]._gc && e.splice(t, 1);
                    0 === e.length && delete L[i]
                }
                if (i = Q._first, (!i || i._paused) && D.autoSleep && !G._first && 1 === n._listeners.tick.length) {
                    for (; i && i._paused;) i = i._next;
                    i || n.sleep()
                }
            }
        }, n.addEventListener("tick", x._updateRoot);
        var B = function(t, e, i) {
                var s, r, n = t._gsTweenID;
                if (L[n || (t._gsTweenID = n = "t" + U++)] || (L[n] = {
                        target: t,
                        tweens: []
                    }), e && (s = L[n].tweens, s[r = s.length] = e, i))
                    for (; --r > -1;) s[r] === e && s.splice(r, 1);
                return L[n].tweens
            },
            q = function(t, e, i, s, r) {
                var n, a, o, l;
                if (1 === s || s >= 4) {
                    for (l = r.length, n = 0; l > n; n++)
                        if ((o = r[n]) !== e) o._gc || o._enabled(!1, !1) && (a = !0);
                        else if (5 === s) break;
                    return a
                }
                var _, u = e._startTime + h,
                    m = [],
                    f = 0,
                    p = 0 === e._duration;
                for (n = r.length; --n > -1;)(o = r[n]) === e || o._gc || o._paused || (o._timeline !== e._timeline ? (_ = _ || $(e, 0, p), 0 === $(o, _, p) && (m[f++] = o)) : u >= o._startTime && o._startTime + o.totalDuration() / o._timeScale > u && ((p || !o._initted) && 2e-10 >= u - o._startTime || (m[f++] = o)));
                for (n = f; --n > -1;) o = m[n], 2 === s && o._kill(i, t) && (a = !0), (2 !== s || !o._firstPT && o._initted) && o._enabled(!1, !1) && (a = !0);
                return a
            },
            $ = function(t, e, i) {
                for (var s = t._timeline, r = s._timeScale, n = t._startTime; s._timeline;) {
                    if (n += s._startTime, r *= s._timeScale, s._paused) return -100;
                    s = s._timeline
                }
                return n /= r, n > e ? n - e : i && n === e || !t._initted && 2 * h > n - e ? h : (n += t.totalDuration() / t._timeScale / r) > e + h ? 0 : n - e - h
            };
        r._init = function() {
            var t, e, i, s, r = this.vars,
                n = this._overwrittenProps,
                a = this._duration,
                o = r.immediateRender,
                l = r.ease;
            if (r.startAt) {
                if (this._startAt && this._startAt.render(-1, !0), r.startAt.overwrite = 0, r.startAt.immediateRender = !0, this._startAt = D.to(this.target, 0, r.startAt), o)
                    if (this._time > 0) this._startAt = null;
                    else if (0 !== a) return
            } else if (r.runBackwards && 0 !== a)
                if (this._startAt) this._startAt.render(-1, !0), this._startAt = null;
                else {
                    i = {};
                    for (s in r) F[s] && "autoCSS" !== s || (i[s] = r[s]);
                    if (i.overwrite = 0, i.data = "isFromStart", this._startAt = D.to(this.target, 0, i), r.immediateRender) {
                        if (0 === this._time) return
                    } else this._startAt.render(-1, !0)
                }
            if (this._ease = l ? l instanceof T ? r.easeParams instanceof Array ? l.config.apply(l, r.easeParams) : l : "function" == typeof l ? new T(l, r.easeParams) : w[l] || D.defaultEase : D.defaultEase, this._easeType = this._ease._type, this._easePower = this._ease._power, this._firstPT = null, this._targets)
                for (t = this._targets.length; --t > -1;) this._initProps(this._targets[t], this._propLookup[t] = {}, this._siblings[t], n ? n[t] : null) && (e = !0);
            else e = this._initProps(this.target, this._propLookup, this._siblings, n);
            if (e && D._onPluginEvent("_onInitAllProps", this), n && (this._firstPT || "function" != typeof this.target && this._enabled(!1, !1)), r.runBackwards)
                for (i = this._firstPT; i;) i.s += i.c, i.c = -i.c, i = i._next;
            this._onUpdate = r.onUpdate, this._initted = !0
        }, r._initProps = function(e, i, s, r) {
            var n, a, o, l, h, _;
            if (null == e) return !1;
            this.vars.css || e.style && e !== t && e.nodeType && N.css && this.vars.autoCSS !== !1 && I(this.vars, e);
            for (n in this.vars) {
                if (_ = this.vars[n], F[n]) _ && (_ instanceof Array || _.push && m(_)) && -1 !== _.join("").indexOf("{self}") && (this.vars[n] = _ = this._swapSelfInParams(_, this));
                else if (N[n] && (l = new N[n])._onInitTween(e, this.vars[n], this)) {
                    for (this._firstPT = h = {
                            _next: this._firstPT,
                            t: l,
                            p: "setRatio",
                            s: 0,
                            c: 1,
                            f: !0,
                            n: n,
                            pg: !0,
                            pr: l._priority
                        }, a = l._overwriteProps.length; --a > -1;) i[l._overwriteProps[a]] = this._firstPT;
                    (l._priority || l._onInitAllProps) && (o = !0), (l._onDisable || l._onEnable) && (this._notifyPluginsOfEnabled = !0)
                } else this._firstPT = i[n] = h = {
                    _next: this._firstPT,
                    t: e,
                    p: n,
                    f: "function" == typeof e[n],
                    n: n,
                    pg: !1,
                    pr: 0
                }, h.s = h.f ? e[n.indexOf("set") || "function" != typeof e["get" + n.substr(3)] ? n : "get" + n.substr(3)]() : parseFloat(e[n]), h.c = "string" == typeof _ && "=" === _.charAt(1) ? parseInt(_.charAt(0) + "1", 10) * Number(_.substr(2)) : Number(_) - h.s || 0;
                h && h._next && (h._next._prev = h)
            }
            return r && this._kill(r, e) ? this._initProps(e, i, s, r) : this._overwrite > 1 && this._firstPT && s.length > 1 && q(e, this, i, this._overwrite, s) ? (this._kill(i, e), this._initProps(e, i, s, r)) : o
        }, r.render = function(t, e, i) {
            var s, r, n, a, o = this._time,
                l = this._duration;
            if (t >= l) this._totalTime = this._time = l, this.ratio = this._ease._calcEnd ? this._ease.getRatio(1) : 1, this._reversed || (s = !0, r = "onComplete"), 0 === l && (a = this._rawPrevTime, (0 === t || 0 > a || a === h) && a !== t && (i = !0, a > h && (r = "onReverseComplete")), this._rawPrevTime = a = !e || t || 0 === a ? t : h);
            else if (1e-7 > t) this._totalTime = this._time = 0, this.ratio = this._ease._calcEnd ? this._ease.getRatio(0) : 0, (0 !== o || 0 === l && this._rawPrevTime > h) && (r = "onReverseComplete", s = this._reversed), 0 > t ? (this._active = !1, 0 === l && (this._rawPrevTime >= 0 && (i = !0), this._rawPrevTime = a = !e || t || 0 === this._rawPrevTime ? t : h)) : this._initted || (i = !0);
            else if (this._totalTime = this._time = t, this._easeType) {
                var _ = t / l,
                    u = this._easeType,
                    m = this._easePower;
                (1 === u || 3 === u && _ >= .5) && (_ = 1 - _), 3 === u && (_ *= 2), 1 === m ? _ *= _ : 2 === m ? _ *= _ * _ : 3 === m ? _ *= _ * _ * _ : 4 === m && (_ *= _ * _ * _ * _), this.ratio = 1 === u ? 1 - _ : 2 === u ? _ : .5 > t / l ? _ / 2 : 1 - _ / 2
            } else this.ratio = this._ease.getRatio(t / l);
            if (this._time !== o || i) {
                if (!this._initted) {
                    if (this._init(), !this._initted || this._gc) return;
                    this._time && !s ? this.ratio = this._ease.getRatio(this._time / l) : s && this._ease._calcEnd && (this.ratio = this._ease.getRatio(0 === this._time ? 0 : 1))
                }
                for (this._active || !this._paused && this._time !== o && t >= 0 && (this._active = !0), 0 === o && (this._startAt && (t >= 0 ? this._startAt.render(t, e, i) : r || (r = "_dummyGS")), this.vars.onStart && (0 !== this._time || 0 === l) && (e || this.vars.onStart.apply(this.vars.onStartScope || this, this.vars.onStartParams || g))), n = this._firstPT; n;) n.f ? n.t[n.p](n.c * this.ratio + n.s) : n.t[n.p] = n.c * this.ratio + n.s, n = n._next;
                this._onUpdate && (0 > t && this._startAt && this._startTime && this._startAt.render(t, e, i), e || (this._time !== o || s) && this._onUpdate.apply(this.vars.onUpdateScope || this, this.vars.onUpdateParams || g)), r && (this._gc || (0 > t && this._startAt && !this._onUpdate && this._startTime && this._startAt.render(t, e, i), s && (this._timeline.autoRemoveChildren && this._enabled(!1, !1), this._active = !1), !e && this.vars[r] && this.vars[r].apply(this.vars[r + "Scope"] || this, this.vars[r + "Params"] || g), 0 === l && this._rawPrevTime === h && a !== h && (this._rawPrevTime = 0)))
            }
        }, r._kill = function(t, e) {
            if ("all" === t && (t = null), null == t && (null == e || e === this.target)) return this._enabled(!1, !1);
            e = "string" != typeof e ? e || this._targets || this.target : D.selector(e) || e;
            var i, s, r, n, a, o, l, h;
            if ((m(e) || E(e)) && "number" != typeof e[0])
                for (i = e.length; --i > -1;) this._kill(t, e[i]) && (o = !0);
            else {
                if (this._targets) {
                    for (i = this._targets.length; --i > -1;)
                        if (e === this._targets[i]) {
                            a = this._propLookup[i] || {}, this._overwrittenProps = this._overwrittenProps || [], s = this._overwrittenProps[i] = t ? this._overwrittenProps[i] || {} : "all";
                            break
                        }
                } else {
                    if (e !== this.target) return !1;
                    a = this._propLookup, s = this._overwrittenProps = t ? this._overwrittenProps || {} : "all"
                }
                if (a) {
                    l = t || a, h = t !== s && "all" !== s && t !== a && ("object" != typeof t || !t._tempKill);
                    for (r in l)(n = a[r]) && (n.pg && n.t._kill(l) && (o = !0), n.pg && 0 !== n.t._overwriteProps.length || (n._prev ? n._prev._next = n._next : n === this._firstPT && (this._firstPT = n._next), n._next && (n._next._prev = n._prev), n._next = n._prev = null), delete a[r]), h && (s[r] = 1);
                    !this._firstPT && this._initted && this._enabled(!1, !1)
                }
            }
            return o
        }, r.invalidate = function() {
            return this._notifyPluginsOfEnabled && D._onPluginEvent("_onDisable", this), this._firstPT = null, this._overwrittenProps = null, this._onUpdate = null, this._startAt = null, this._initted = this._active = this._notifyPluginsOfEnabled = !1, this._propLookup = this._targets ? {} : [], this
        }, r._enabled = function(t, e) {
            if (a || n.wake(), t && this._gc) {
                var i, s = this._targets;
                if (s)
                    for (i = s.length; --i > -1;) this._siblings[i] = B(s[i], this, !0);
                else this._siblings = B(this.target, this, !0)
            }
            return x.prototype._enabled.call(this, t, e), this._notifyPluginsOfEnabled && this._firstPT ? D._onPluginEvent(t ? "_onEnable" : "_onDisable", this) : !1
        }, D.to = function(t, e, i) {
            return new D(t, e, i)
        }, D.from = function(t, e, i) {
            return i.runBackwards = !0, i.immediateRender = 0 != i.immediateRender, new D(t, e, i)
        }, D.fromTo = function(t, e, i, s) {
            return s.startAt = i, s.immediateRender = 0 != s.immediateRender && 0 != i.immediateRender, new D(t, e, s)
        }, D.delayedCall = function(t, e, i, s, r) {
            return new D(e, 0, {
                delay: t,
                onComplete: e,
                onCompleteParams: i,
                onCompleteScope: s,
                onReverseComplete: e,
                onReverseCompleteParams: i,
                onReverseCompleteScope: s,
                immediateRender: !1,
                useFrames: r,
                overwrite: 0
            })
        }, D.set = function(t, e) {
            return new D(t, 0, e)
        }, D.getTweensOf = function(t, e) {
            if (null == t) return [];
            t = "string" != typeof t ? t : D.selector(t) || t;
            var i, s, r, n;
            if ((m(t) || E(t)) && "number" != typeof t[0]) {
                for (i = t.length, s = []; --i > -1;) s = s.concat(D.getTweensOf(t[i], e));
                for (i = s.length; --i > -1;)
                    for (n = s[i], r = i; --r > -1;) n === s[r] && s.splice(i, 1)
            } else
                for (s = B(t).concat(), i = s.length; --i > -1;)(s[i]._gc || e && !s[i].isActive()) && s.splice(i, 1);
            return s
        }, D.killTweensOf = D.killDelayedCallsTo = function(t, e, i) {
            "object" == typeof e && (i = e, e = !1);
            for (var s = D.getTweensOf(t, e), r = s.length; --r > -1;) s[r]._kill(i, t)
        };
        var M = d("plugins.TweenPlugin", function(t, e) {
            this._overwriteProps = (t || "").split(","), this._propName = this._overwriteProps[0], this._priority = e || 0, this._super = M.prototype
        }, !0);
        if (r = M.prototype, M.version = "1.10.1", M.API = 2, r._firstPT = null, r._addTween = function(t, e, i, s, r, n) {
                var a, o;
                return null != s && (a = "number" == typeof s || "=" !== s.charAt(1) ? Number(s) - i : parseInt(s.charAt(0) + "1", 10) * Number(s.substr(2))) ? (this._firstPT = o = {
                    _next: this._firstPT,
                    t: t,
                    p: e,
                    s: i,
                    c: a,
                    f: "function" == typeof t[e],
                    n: r || e,
                    r: n
                }, o._next && (o._next._prev = o), o) : void 0
            }, r.setRatio = function(t) {
                for (var e, i = this._firstPT, s = 1e-6; i;) e = i.c * t + i.s, i.r ? e = 0 | e + (e > 0 ? .5 : -.5) : s > e && e > -s && (e = 0), i.f ? i.t[i.p](e) : i.t[i.p] = e, i = i._next
            }, r._kill = function(t) {
                var e, i = this._overwriteProps,
                    s = this._firstPT;
                if (null != t[this._propName]) this._overwriteProps = [];
                else
                    for (e = i.length; --e > -1;) null != t[i[e]] && i.splice(e, 1);
                for (; s;) null != t[s.n] && (s._next && (s._next._prev = s._prev), s._prev ? (s._prev._next = s._next, s._prev = null) : this._firstPT === s && (this._firstPT = s._next)), s = s._next;
                return !1
            }, r._roundProps = function(t, e) {
                for (var i = this._firstPT; i;)(t[this._propName] || null != i.n && t[i.n.split(this._propName + "_").join("")]) && (i.r = e), i = i._next
            }, D._onPluginEvent = function(t, e) {
                var i, s, r, n, a, o = e._firstPT;
                if ("_onInitAllProps" === t) {
                    for (; o;) {
                        for (a = o._next, s = r; s && s.pr > o.pr;) s = s._next;
                        (o._prev = s ? s._prev : n) ? o._prev._next = o: r = o, (o._next = s) ? s._prev = o : n = o, o = a
                    }
                    o = e._firstPT = r
                }
                for (; o;) o.pg && "function" == typeof o.t[t] && o.t[t]() && (i = !0), o = o._next;
                return i
            }, M.activate = function(t) {
                for (var e = t.length; --e > -1;) t[e].API === M.API && (N[(new t[e])._propName] = t[e]);
                return !0
            }, c.plugin = function(t) {
                if (!(t && t.propName && t.init && t.API)) throw "illegal plugin definition.";
                var e, i = t.propName,
                    s = t.priority || 0,
                    r = t.overwriteProps,
                    n = {
                        init: "_onInitTween",
                        set: "setRatio",
                        kill: "_kill",
                        round: "_roundProps",
                        initAll: "_onInitAllProps"
                    },
                    a = d("plugins." + i.charAt(0).toUpperCase() + i.substr(1) + "Plugin", function() {
                        M.call(this, i, s), this._overwriteProps = r || []
                    }, t.global === !0),
                    o = a.prototype = new M(i);
                o.constructor = a, a.API = t.API;
                for (e in n) "function" == typeof t[e] && (o[n[e]] = t[e]);
                return a.version = t.version, M.activate([a]), a
            }, i = t._gsQueue) {
            for (s = 0; i.length > s; s++) i[s]();
            for (r in f) f[r].func || t.console.log("GSAP encountered missing dependency: com.greensock." + r)
        }
        a = !1
    }
})(window);



(window._gsQueue || (window._gsQueue = [])).push(function() {
    "use strict";
    window._gsDefine("TimelineLite", ["core.Animation", "core.SimpleTimeline", "TweenLite"], function(t, e, i) {
        var s = function(t) {
                e.call(this, t), this._labels = {}, this.autoRemoveChildren = this.vars.autoRemoveChildren === !0, this.smoothChildTiming = this.vars.smoothChildTiming === !0, this._sortChildren = !0, this._onUpdate = this.vars.onUpdate;
                var i, s, r = this.vars;
                for (s in r) i = r[s], a(i) && -1 !== i.join("").indexOf("{self}") && (r[s] = this._swapSelfInParams(i));
                a(r.tweens) && this.add(r.tweens, 0, r.align, r.stagger)
            },
            r = 1e-10,
            n = i._internals.isSelector,
            a = i._internals.isArray,
            o = [],
            h = function(t) {
                var e, i = {};
                for (e in t) i[e] = t[e];
                return i
            },
            l = function(t, e, i, s) {
                t._timeline.pause(t._startTime), e && e.apply(s || t._timeline, i || o)
            },
            _ = o.slice,
            u = s.prototype = new e;
        return s.version = "1.11.5", u.constructor = s, u.kill()._gc = !1, u.to = function(t, e, s, r) {
            return e ? this.add(new i(t, e, s), r) : this.set(t, s, r)
        }, u.from = function(t, e, s, r) {
            return this.add(i.from(t, e, s), r)
        }, u.fromTo = function(t, e, s, r, n) {
            return e ? this.add(i.fromTo(t, e, s, r), n) : this.set(t, r, n)
        }, u.staggerTo = function(t, e, r, a, o, l, u, p) {
            var f, c = new s({
                onComplete: l,
                onCompleteParams: u,
                onCompleteScope: p,
                smoothChildTiming: this.smoothChildTiming
            });
            for ("string" == typeof t && (t = i.selector(t) || t), n(t) && (t = _.call(t, 0)), a = a || 0, f = 0; t.length > f; f++) r.startAt && (r.startAt = h(r.startAt)), c.to(t[f], e, h(r), f * a);
            return this.add(c, o)
        }, u.staggerFrom = function(t, e, i, s, r, n, a, o) {
            return i.immediateRender = 0 != i.immediateRender, i.runBackwards = !0, this.staggerTo(t, e, i, s, r, n, a, o)
        }, u.staggerFromTo = function(t, e, i, s, r, n, a, o, h) {
            return s.startAt = i, s.immediateRender = 0 != s.immediateRender && 0 != i.immediateRender, this.staggerTo(t, e, s, r, n, a, o, h)
        }, u.call = function(t, e, s, r) {
            return this.add(i.delayedCall(0, t, e, s), r)
        }, u.set = function(t, e, s) {
            return s = this._parseTimeOrLabel(s, 0, !0), null == e.immediateRender && (e.immediateRender = s === this._time && !this._paused), this.add(new i(t, 0, e), s)
        }, s.exportRoot = function(t, e) {
            t = t || {}, null == t.smoothChildTiming && (t.smoothChildTiming = !0);
            var r, n, a = new s(t),
                o = a._timeline;
            for (null == e && (e = !0), o._remove(a, !0), a._startTime = 0, a._rawPrevTime = a._time = a._totalTime = o._time, r = o._first; r;) n = r._next, e && r instanceof i && r.target === r.vars.onComplete || a.add(r, r._startTime - r._delay), r = n;
            return o.add(a, 0), a
        }, u.add = function(r, n, o, h) {
            var l, _, u, p, f, c;
            if ("number" != typeof n && (n = this._parseTimeOrLabel(n, 0, !0, r)), !(r instanceof t)) {
                if (r instanceof Array || r && r.push && a(r)) {
                    for (o = o || "normal", h = h || 0, l = n, _ = r.length, u = 0; _ > u; u++) a(p = r[u]) && (p = new s({
                        tweens: p
                    })), this.add(p, l), "string" != typeof p && "function" != typeof p && ("sequence" === o ? l = p._startTime + p.totalDuration() / p._timeScale : "start" === o && (p._startTime -= p.delay())), l += h;
                    return this._uncache(!0)
                }
                if ("string" == typeof r) return this.addLabel(r, n);
                if ("function" != typeof r) throw "Cannot add " + r + " into the timeline; it is not a tween, timeline, function, or string.";
                r = i.delayedCall(0, r)
            }
            if (e.prototype.add.call(this, r, n), (this._gc || this._time === this._duration) && !this._paused && this._duration < this.duration())
                for (f = this, c = f.rawTime() > r._startTime; f._timeline;) c && f._timeline.smoothChildTiming ? f.totalTime(f._totalTime, !0) : f._gc && f._enabled(!0, !1), f = f._timeline;
            return this
        }, u.remove = function(e) {
            if (e instanceof t) return this._remove(e, !1);
            if (e instanceof Array || e && e.push && a(e)) {
                for (var i = e.length; --i > -1;) this.remove(e[i]);
                return this
            }
            return "string" == typeof e ? this.removeLabel(e) : this.kill(null, e)
        }, u._remove = function(t, i) {
            e.prototype._remove.call(this, t, i);
            var s = this._last;
            return s ? this._time > s._startTime + s._totalDuration / s._timeScale && (this._time = this.duration(), this._totalTime = this._totalDuration) : this._time = this._totalTime = this._duration = this._totalDuration = 0, this
        }, u.append = function(t, e) {
            return this.add(t, this._parseTimeOrLabel(null, e, !0, t))
        }, u.insert = u.insertMultiple = function(t, e, i, s) {
            return this.add(t, e || 0, i, s)
        }, u.appendMultiple = function(t, e, i, s) {
            return this.add(t, this._parseTimeOrLabel(null, e, !0, t), i, s)
        }, u.addLabel = function(t, e) {
            return this._labels[t] = this._parseTimeOrLabel(e), this
        }, u.addPause = function(t, e, i, s) {
            return this.call(l, ["{self}", e, i, s], this, t)
        }, u.removeLabel = function(t) {
            return delete this._labels[t], this
        }, u.getLabelTime = function(t) {
            return null != this._labels[t] ? this._labels[t] : -1
        }, u._parseTimeOrLabel = function(e, i, s, r) {
            var n;
            if (r instanceof t && r.timeline === this) this.remove(r);
            else if (r && (r instanceof Array || r.push && a(r)))
                for (n = r.length; --n > -1;) r[n] instanceof t && r[n].timeline === this && this.remove(r[n]);
            if ("string" == typeof i) return this._parseTimeOrLabel(i, s && "number" == typeof e && null == this._labels[i] ? e - this.duration() : 0, s);
            if (i = i || 0, "string" != typeof e || !isNaN(e) && null == this._labels[e]) null == e && (e = this.duration());
            else {
                if (n = e.indexOf("="), -1 === n) return null == this._labels[e] ? s ? this._labels[e] = this.duration() + i : i : this._labels[e] + i;
                i = parseInt(e.charAt(n - 1) + "1", 10) * Number(e.substr(n + 1)), e = n > 1 ? this._parseTimeOrLabel(e.substr(0, n - 1), 0, s) : this.duration()
            }
            return Number(e) + i
        }, u.seek = function(t, e) {
            return this.totalTime("number" == typeof t ? t : this._parseTimeOrLabel(t), e !== !1)
        }, u.stop = function() {
            return this.paused(!0)
        }, u.gotoAndPlay = function(t, e) {
            return this.play(t, e)
        }, u.gotoAndStop = function(t, e) {
            return this.pause(t, e)
        }, u.render = function(t, e, i) {
            this._gc && this._enabled(!0, !1);
            var s, n, a, h, l, _ = this._dirty ? this.totalDuration() : this._totalDuration,
                u = this._time,
                p = this._startTime,
                f = this._timeScale,
                c = this._paused;
            if (t >= _ ? (this._totalTime = this._time = _, this._reversed || this._hasPausedChild() || (n = !0, h = "onComplete", 0 === this._duration && (0 === t || 0 > this._rawPrevTime || this._rawPrevTime === r) && this._rawPrevTime !== t && this._first && (l = !0, this._rawPrevTime > r && (h = "onReverseComplete"))), this._rawPrevTime = this._duration || !e || t || 0 === this._rawPrevTime ? t : r, t = _ + 1e-4) : 1e-7 > t ? (this._totalTime = this._time = 0, (0 !== u || 0 === this._duration && (this._rawPrevTime > r || 0 > t && this._rawPrevTime >= 0)) && (h = "onReverseComplete", n = this._reversed), 0 > t ? (this._active = !1, 0 === this._duration && this._rawPrevTime >= 0 && this._first && (l = !0), this._rawPrevTime = t) : (this._rawPrevTime = this._duration || !e || t || 0 === this._rawPrevTime ? t : r, t = 0, this._initted || (l = !0))) : this._totalTime = this._time = this._rawPrevTime = t, this._time !== u && this._first || i || l) {
                if (this._initted || (this._initted = !0), this._active || !this._paused && this._time !== u && t > 0 && (this._active = !0), 0 === u && this.vars.onStart && 0 !== this._time && (e || this.vars.onStart.apply(this.vars.onStartScope || this, this.vars.onStartParams || o)), this._time >= u)
                    for (s = this._first; s && (a = s._next, !this._paused || c);)(s._active || s._startTime <= this._time && !s._paused && !s._gc) && (s._reversed ? s.render((s._dirty ? s.totalDuration() : s._totalDuration) - (t - s._startTime) * s._timeScale, e, i) : s.render((t - s._startTime) * s._timeScale, e, i)), s = a;
                else
                    for (s = this._last; s && (a = s._prev, !this._paused || c);)(s._active || u >= s._startTime && !s._paused && !s._gc) && (s._reversed ? s.render((s._dirty ? s.totalDuration() : s._totalDuration) - (t - s._startTime) * s._timeScale, e, i) : s.render((t - s._startTime) * s._timeScale, e, i)), s = a;
                this._onUpdate && (e || this._onUpdate.apply(this.vars.onUpdateScope || this, this.vars.onUpdateParams || o)), h && (this._gc || (p === this._startTime || f !== this._timeScale) && (0 === this._time || _ >= this.totalDuration()) && (n && (this._timeline.autoRemoveChildren && this._enabled(!1, !1), this._active = !1), !e && this.vars[h] && this.vars[h].apply(this.vars[h + "Scope"] || this, this.vars[h + "Params"] || o)))
            }
        }, u._hasPausedChild = function() {
            for (var t = this._first; t;) {
                if (t._paused || t instanceof s && t._hasPausedChild()) return !0;
                t = t._next
            }
            return !1
        }, u.getChildren = function(t, e, s, r) {
            r = r || -9999999999;
            for (var n = [], a = this._first, o = 0; a;) r > a._startTime || (a instanceof i ? e !== !1 && (n[o++] = a) : (s !== !1 && (n[o++] = a), t !== !1 && (n = n.concat(a.getChildren(!0, e, s)), o = n.length))), a = a._next;
            return n
        }, u.getTweensOf = function(t, e) {
            for (var s = i.getTweensOf(t), r = s.length, n = [], a = 0; --r > -1;)(s[r].timeline === this || e && this._contains(s[r])) && (n[a++] = s[r]);
            return n
        }, u._contains = function(t) {
            for (var e = t.timeline; e;) {
                if (e === this) return !0;
                e = e.timeline
            }
            return !1
        }, u.shiftChildren = function(t, e, i) {
            i = i || 0;
            for (var s, r = this._first, n = this._labels; r;) r._startTime >= i && (r._startTime += t), r = r._next;
            if (e)
                for (s in n) n[s] >= i && (n[s] += t);
            return this._uncache(!0)
        }, u._kill = function(t, e) {
            if (!t && !e) return this._enabled(!1, !1);
            for (var i = e ? this.getTweensOf(e) : this.getChildren(!0, !0, !1), s = i.length, r = !1; --s > -1;) i[s]._kill(t, e) && (r = !0);
            return r
        }, u.clear = function(t) {
            var e = this.getChildren(!1, !0, !0),
                i = e.length;
            for (this._time = this._totalTime = 0; --i > -1;) e[i]._enabled(!1, !1);
            return t !== !1 && (this._labels = {}), this._uncache(!0)
        }, u.invalidate = function() {
            for (var t = this._first; t;) t.invalidate(), t = t._next;
            return this
        }, u._enabled = function(t, i) {
            if (t === this._gc)
                for (var s = this._first; s;) s._enabled(t, !0), s = s._next;
            return e.prototype._enabled.call(this, t, i)
        }, u.duration = function(t) {
            return arguments.length ? (0 !== this.duration() && 0 !== t && this.timeScale(this._duration / t), this) : (this._dirty && this.totalDuration(), this._duration)
        }, u.totalDuration = function(t) {
            if (!arguments.length) {
                if (this._dirty) {
                    for (var e, i, s = 0, r = this._last, n = 999999999999; r;) e = r._prev, r._dirty && r.totalDuration(), r._startTime > n && this._sortChildren && !r._paused ? this.add(r, r._startTime - r._delay) : n = r._startTime, 0 > r._startTime && !r._paused && (s -= r._startTime, this._timeline.smoothChildTiming && (this._startTime += r._startTime / this._timeScale), this.shiftChildren(-r._startTime, !1, -9999999999), n = 0), i = r._startTime + r._totalDuration / r._timeScale, i > s && (s = i), r = e;
                    this._duration = this._totalDuration = s, this._dirty = !1
                }
                return this._totalDuration
            }
            return 0 !== this.totalDuration() && 0 !== t && this.timeScale(this._totalDuration / t), this
        }, u.usesFrames = function() {
            for (var e = this._timeline; e._timeline;) e = e._timeline;
            return e === t._rootFramesTimeline
        }, u.rawTime = function() {
            return this._paused ? this._totalTime : (this._timeline.rawTime() - this._startTime) * this._timeScale
        }, s
    }, !0)
}), window._gsDefine && window._gsQueue.pop()();
(window._gsQueue || (window._gsQueue = [])).push(function() {
    "use strict";
    window._gsDefine("plugins.CSSPlugin", ["plugins.TweenPlugin", "TweenLite"], function(t, e) {
        var i, r, s, n, a = function() {
                t.call(this, "css"), this._overwriteProps.length = 0, this.setRatio = a.prototype.setRatio
            },
            o = {},
            l = a.prototype = new t("css");
        l.constructor = a, a.version = "1.11.5", a.API = 2, a.defaultTransformPerspective = 0, l = "px", a.suffixMap = {
            top: l,
            right: l,
            bottom: l,
            left: l,
            width: l,
            height: l,
            fontSize: l,
            padding: l,
            margin: l,
            perspective: l,
            lineHeight: ""
        };
        var h, u, _, p, f, c, d = /(?:\d|\-\d|\.\d|\-\.\d)+/g,
            m = /(?:\d|\-\d|\.\d|\-\.\d|\+=\d|\-=\d|\+=.\d|\-=\.\d)+/g,
            g = /(?:\+=|\-=|\-|\b)[\d\-\.]+[a-zA-Z0-9]*(?:%|\b)/gi,
            v = /[^\d\-\.]/g,
            y = /(?:\d|\-|\+|=|#|\.)*/g,
            T = /opacity *= *([^)]*)/,
            x = /opacity:([^;]*)/,
            w = /alpha\(opacity *=.+?\)/i,
            b = /^(rgb|hsl)/,
            P = /([A-Z])/g,
            S = /-([a-z])/gi,
            R = /(^(?:url\(\"|url\())|(?:(\"\))$|\)$)/gi,
            k = function(t, e) {
                return e.toUpperCase()
            },
            C = /(?:Left|Right|Width)/i,
            A = /(M11|M12|M21|M22)=[\d\-\.e]+/gi,
            O = /progid\:DXImageTransform\.Microsoft\.Matrix\(.+?\)/i,
            D = /,(?=[^\)]*(?:\(|$))/gi,
            M = Math.PI / 180,
            L = 180 / Math.PI,
            N = {},
            X = document,
            I = X.createElement("div"),
            E = X.createElement("img"),
            F = a._internals = {
                _specialProps: o
            },
            Y = navigator.userAgent,
            z = function() {
                var t, e = Y.indexOf("Android"),
                    i = X.createElement("div");
                return _ = -1 !== Y.indexOf("Safari") && -1 === Y.indexOf("Chrome") && (-1 === e || Number(Y.substr(e + 8, 1)) > 3), f = _ && 6 > Number(Y.substr(Y.indexOf("Version/") + 8, 1)), p = -1 !== Y.indexOf("Firefox"), /MSIE ([0-9]{1,}[\.0-9]{0,})/.exec(Y) && (c = parseFloat(RegExp.$1)), i.innerHTML = "<a style='top:1px;opacity:.55;'>a</a>", t = i.getElementsByTagName("a")[0], t ? /^0.55/.test(t.style.opacity) : !1
            }(),
            U = function(t) {
                return T.test("string" == typeof t ? t : (t.currentStyle ? t.currentStyle.filter : t.style.filter) || "") ? parseFloat(RegExp.$1) / 100 : 1
            },
            B = function(t) {},
            j = "",
            W = "",
            V = function(t, e) {
                e = e || I;
                var i, r, s = e.style;
                if (void 0 !== s[t]) return t;
                for (t = t.charAt(0).toUpperCase() + t.substr(1), i = ["O", "Moz", "ms", "Ms", "Webkit"], r = 5; --r > -1 && void 0 === s[i[r] + t];);
                return r >= 0 ? (W = 3 === r ? "ms" : i[r], j = "-" + W.toLowerCase() + "-", W + t) : null
            },
            q = X.defaultView ? X.defaultView.getComputedStyle : function() {},
            H = a.getStyle = function(t, e, i, r, s) {
                var n;
                return z || "opacity" !== e ? (!r && t.style[e] ? n = t.style[e] : (i = i || q(t, null)) ? (t = i.getPropertyValue(e.replace(P, "-$1").toLowerCase()), n = t || i.length ? t : i[e]) : t.currentStyle && (n = t.currentStyle[e]), null == s || n && "none" !== n && "auto" !== n && "auto auto" !== n ? n : s) : U(t)
            },
            Q = function(t, e, i, r, s) {
                if ("px" === r || !r) return i;
                if ("auto" === r || !i) return 0;
                var n, a = C.test(e),
                    o = t,
                    l = I.style,
                    h = 0 > i;
                return h && (i = -i), "%" === r && -1 !== e.indexOf("border") ? n = i / 100 * (a ? t.clientWidth : t.clientHeight) : (l.cssText = "border:0 solid red;position:" + H(t, "position") + ";line-height:0;", "%" !== r && o.appendChild ? l[a ? "borderLeftWidth" : "borderTopWidth"] = i + r : (o = t.parentNode || X.body, l[a ? "width" : "height"] = i + r), o.appendChild(I), n = parseFloat(I[a ? "offsetWidth" : "offsetHeight"]), o.removeChild(I), 0 !== n || s || (n = Q(t, e, i, r, !0))), h ? -n : n
            },
            Z = function(t, e, i) {
                if ("absolute" !== H(t, "position", i)) return 0;
                var r = "left" === e ? "Left" : "Top",
                    s = H(t, "margin" + r, i);
                return t["offset" + r] - (Q(t, e, parseFloat(s), s.replace(y, "")) || 0)
            },
            $ = function(t, e) {
                var i, r, s = {};
                if (e = e || q(t, null))
                    if (i = e.length)
                        for (; --i > -1;) s[e[i].replace(S, k)] = e.getPropertyValue(e[i]);
                    else
                        for (i in e) s[i] = e[i];
                else if (e = t.currentStyle || t.style)
                    for (i in e) "string" == typeof i && void 0 === s[i] && (s[i.replace(S, k)] = e[i]);
                return z || (s.opacity = U(t)), r = be(t, e, !1), s.rotation = r.rotation, s.skewX = r.skewX, s.scaleX = r.scaleX, s.scaleY = r.scaleY, s.x = r.x, s.y = r.y, we && (s.z = r.z, s.rotationX = r.rotationX, s.rotationY = r.rotationY, s.scaleZ = r.scaleZ), s.filters && delete s.filters, s
            },
            G = function(t, e, i, r, s) {
                var n, a, o, l = {},
                    h = t.style;
                for (a in i) "cssText" !== a && "length" !== a && isNaN(a) && (e[a] !== (n = i[a]) || s && s[a]) && -1 === a.indexOf("Origin") && ("number" == typeof n || "string" == typeof n) && (l[a] = "auto" !== n || "left" !== a && "top" !== a ? "" !== n && "auto" !== n && "none" !== n || "string" != typeof e[a] || "" === e[a].replace(v, "") ? n : 0 : Z(t, a), void 0 !== h[a] && (o = new _e(h, a, h[a], o)));
                if (r)
                    for (a in r) "className" !== a && (l[a] = r[a]);
                return {
                    difs: l,
                    firstMPT: o
                }
            },
            K = {
                width: ["Left", "Right"],
                height: ["Top", "Bottom"]
            },
            J = ["marginLeft", "marginRight", "marginTop", "marginBottom"],
            te = function(t, e, i) {
                var r = parseFloat("width" === e ? t.offsetWidth : t.offsetHeight),
                    s = K[e],
                    n = s.length;
                for (i = i || q(t, null); --n > -1;) r -= parseFloat(H(t, "padding" + s[n], i, !0)) || 0, r -= parseFloat(H(t, "border" + s[n] + "Width", i, !0)) || 0;
                return r
            },
            ee = function(t, e) {
                (null == t || "" === t || "auto" === t || "auto auto" === t) && (t = "0 0");
                var i = t.split(" "),
                    r = -1 !== t.indexOf("left") ? "0%" : -1 !== t.indexOf("right") ? "100%" : i[0],
                    s = -1 !== t.indexOf("top") ? "0%" : -1 !== t.indexOf("bottom") ? "100%" : i[1];
                return null == s ? s = "0" : "center" === s && (s = "50%"), ("center" === r || isNaN(parseFloat(r)) && -1 === (r + "").indexOf("=")) && (r = "50%"), e && (e.oxp = -1 !== r.indexOf("%"), e.oyp = -1 !== s.indexOf("%"), e.oxr = "=" === r.charAt(1), e.oyr = "=" === s.charAt(1), e.ox = parseFloat(r.replace(v, "")), e.oy = parseFloat(s.replace(v, ""))), r + " " + s + (i.length > 2 ? " " + i[2] : "")
            },
            ie = function(t, e) {
                return "string" == typeof t && "=" === t.charAt(1) ? parseInt(t.charAt(0) + "1", 10) * parseFloat(t.substr(2)) : parseFloat(t) - parseFloat(e)
            },
            re = function(t, e) {
                return null == t ? e : "string" == typeof t && "=" === t.charAt(1) ? parseInt(t.charAt(0) + "1", 10) * Number(t.substr(2)) + e : parseFloat(t)
            },
            se = function(t, e, i, r) {
                var s, n, a, o, l = 1e-6;
                return null == t ? o = e : "number" == typeof t ? o = t : (s = 360, n = t.split("_"), a = Number(n[0].replace(v, "")) * (-1 === t.indexOf("rad") ? 1 : L) - ("=" === t.charAt(1) ? 0 : e), n.length && (r && (r[i] = e + a), -1 !== t.indexOf("short") && (a %= s, a !== a % (s / 2) && (a = 0 > a ? a + s : a - s)), -1 !== t.indexOf("_cw") && 0 > a ? a = (a + 9999999999 * s) % s - (0 | a / s) * s : -1 !== t.indexOf("ccw") && a > 0 && (a = (a - 9999999999 * s) % s - (0 | a / s) * s)), o = e + a), l > o && o > -l && (o = 0), o
            },
            ne = {
                aqua: [0, 255, 255],
                lime: [0, 255, 0],
                silver: [192, 192, 192],
                black: [0, 0, 0],
                maroon: [128, 0, 0],
                teal: [0, 128, 128],
                blue: [0, 0, 255],
                navy: [0, 0, 128],
                white: [255, 255, 255],
                fuchsia: [255, 0, 255],
                olive: [128, 128, 0],
                yellow: [255, 255, 0],
                orange: [255, 165, 0],
                gray: [128, 128, 128],
                purple: [128, 0, 128],
                green: [0, 128, 0],
                red: [255, 0, 0],
                pink: [255, 192, 203],
                cyan: [0, 255, 255],
                transparent: [255, 255, 255, 0]
            },
            ae = function(t, e, i) {
                return t = 0 > t ? t + 1 : t > 1 ? t - 1 : t, 0 | 255 * (1 > 6 * t ? e + 6 * (i - e) * t : .5 > t ? i : 2 > 3 * t ? e + 6 * (i - e) * (2 / 3 - t) : e) + .5
            },
            oe = function(t) {
                var e, i, r, s, n, a;
                return t && "" !== t ? "number" == typeof t ? [t >> 16, 255 & t >> 8, 255 & t] : ("," === t.charAt(t.length - 1) && (t = t.substr(0, t.length - 1)), ne[t] ? ne[t] : "#" === t.charAt(0) ? (4 === t.length && (e = t.charAt(1), i = t.charAt(2), r = t.charAt(3), t = "#" + e + e + i + i + r + r), t = parseInt(t.substr(1), 16), [t >> 16, 255 & t >> 8, 255 & t]) : "hsl" === t.substr(0, 3) ? (t = t.match(d), s = Number(t[0]) % 360 / 360, n = Number(t[1]) / 100, a = Number(t[2]) / 100, i = .5 >= a ? a * (n + 1) : a + n - a * n, e = 2 * a - i, t.length > 3 && (t[3] = Number(t[3])), t[0] = ae(s + 1 / 3, e, i), t[1] = ae(s, e, i), t[2] = ae(s - 1 / 3, e, i), t) : (t = t.match(d) || ne.transparent, t[0] = Number(t[0]), t[1] = Number(t[1]), t[2] = Number(t[2]), t.length > 3 && (t[3] = Number(t[3])), t)) : ne.black
            },
            le = "(?:\\b(?:(?:rgb|rgba|hsl|hsla)\\(.+?\\))|\\B#.+?\\b";
        for (l in ne) le += "|" + l + "\\b";
        le = RegExp(le + ")", "gi");
        var he = function(t, e, i, r) {
                if (null == t) return function(t) {
                    return t
                };
                var s, n = e ? (t.match(le) || [""])[0] : "",
                    a = t.split(n).join("").match(g) || [],
                    o = t.substr(0, t.indexOf(a[0])),
                    l = ")" === t.charAt(t.length - 1) ? ")" : "",
                    h = -1 !== t.indexOf(" ") ? " " : ",",
                    u = a.length,
                    _ = u > 0 ? a[0].replace(d, "") : "";
                return u ? s = e ? function(t) {
                    var e, p, f, c;
                    if ("number" == typeof t) t += _;
                    else if (r && D.test(t)) {
                        for (c = t.replace(D, "|").split("|"), f = 0; c.length > f; f++) c[f] = s(c[f]);
                        return c.join(",")
                    }
                    if (e = (t.match(le) || [n])[0], p = t.split(e).join("").match(g) || [], f = p.length, u > f--)
                        for (; u > ++f;) p[f] = i ? p[0 | (f - 1) / 2] : a[f];
                    return o + p.join(h) + h + e + l + (-1 !== t.indexOf("inset") ? " inset" : "")
                } : function(t) {
                    var e, n, p;
                    if ("number" == typeof t) t += _;
                    else if (r && D.test(t)) {
                        for (n = t.replace(D, "|").split("|"), p = 0; n.length > p; p++) n[p] = s(n[p]);
                        return n.join(",")
                    }
                    if (e = t.match(g) || [], p = e.length, u > p--)
                        for (; u > ++p;) e[p] = i ? e[0 | (p - 1) / 2] : a[p];
                    return o + e.join(h) + l
                } : function(t) {
                    return t
                }
            },
            ue = function(t) {
                return t = t.split(","),
                    function(e, i, r, s, n, a, o) {
                        var l, h = (i + "").split(" ");
                        for (o = {}, l = 0; 4 > l; l++) o[t[l]] = h[l] = h[l] || h[(l - 1) / 2 >> 0];
                        return s.parse(e, o, n, a)
                    }
            },
            _e = (F._setPluginRatio = function(t) {
                this.plugin.setRatio(t);
                for (var e, i, r, s, n = this.data, a = n.proxy, o = n.firstMPT, l = 1e-6; o;) e = a[o.v], o.r ? e = e > 0 ? 0 | e + .5 : 0 | e - .5 : l > e && e > -l && (e = 0), o.t[o.p] = e, o = o._next;
                if (n.autoRotate && (n.autoRotate.rotation = a.rotation), 1 === t)
                    for (o = n.firstMPT; o;) {
                        if (i = o.t, i.type) {
                            if (1 === i.type) {
                                for (s = i.xs0 + i.s + i.xs1, r = 1; i.l > r; r++) s += i["xn" + r] + i["xs" + (r + 1)];
                                i.e = s
                            }
                        } else i.e = i.s + i.xs0;
                        o = o._next
                    }
            }, function(t, e, i, r, s) {
                this.t = t, this.p = e, this.v = i, this.r = s, r && (r._prev = this, this._next = r)
            }),
            pe = (F._parseToProxy = function(t, e, i, r, s, n) {
                var a, o, l, h, u, _ = r,
                    p = {},
                    f = {},
                    c = i._transform,
                    d = N;
                for (i._transform = null, N = e, r = u = i.parse(t, e, r, s), N = d, n && (i._transform = c, _ && (_._prev = null, _._prev && (_._prev._next = null))); r && r !== _;) {
                    if (1 >= r.type && (o = r.p, f[o] = r.s + r.c, p[o] = r.s, n || (h = new _e(r, "s", o, h, r.r), r.c = 0), 1 === r.type))
                        for (a = r.l; --a > 0;) l = "xn" + a, o = r.p + "_" + l, f[o] = r.data[l], p[o] = r[l], n || (h = new _e(r, l, o, h, r.rxp[l]));
                    r = r._next
                }
                return {
                    proxy: p,
                    end: f,
                    firstMPT: h,
                    pt: u
                }
            }, F.CSSPropTween = function(t, e, r, s, a, o, l, h, u, _, p) {
                this.t = t, this.p = e, this.s = r, this.c = s, this.n = l || e, t instanceof pe || n.push(this.n), this.r = h, this.type = o || 0, u && (this.pr = u, i = !0), this.b = void 0 === _ ? r : _, this.e = void 0 === p ? r + s : p, a && (this._next = a, a._prev = this)
            }),
            fe = a.parseComplex = function(t, e, i, r, s, n, a, o, l, u) {
                i = i || n || "", a = new pe(t, e, 0, 0, a, u ? 2 : 1, null, !1, o, i, r), r += "";
                var _, p, f, c, g, v, y, T, x, w, P, S, R = i.split(", ").join(",").split(" "),
                    k = r.split(", ").join(",").split(" "),
                    C = R.length,
                    A = h !== !1;
                for ((-1 !== r.indexOf(",") || -1 !== i.indexOf(",")) && (R = R.join(" ").replace(D, ", ").split(" "), k = k.join(" ").replace(D, ", ").split(" "), C = R.length), C !== k.length && (R = (n || "").split(" "), C = R.length), a.plugin = l, a.setRatio = u, _ = 0; C > _; _++)
                    if (c = R[_], g = k[_], T = parseFloat(c), T || 0 === T) a.appendXtra("", T, ie(g, T), g.replace(m, ""), A && -1 !== g.indexOf("px"), !0);
                    else if (s && ("#" === c.charAt(0) || ne[c] || b.test(c))) S = "," === g.charAt(g.length - 1) ? ")," : ")", c = oe(c), g = oe(g), x = c.length + g.length > 6, x && !z && 0 === g[3] ? (a["xs" + a.l] += a.l ? " transparent" : "transparent", a.e = a.e.split(k[_]).join("transparent")) : (z || (x = !1), a.appendXtra(x ? "rgba(" : "rgb(", c[0], g[0] - c[0], ",", !0, !0).appendXtra("", c[1], g[1] - c[1], ",", !0).appendXtra("", c[2], g[2] - c[2], x ? "," : S, !0), x && (c = 4 > c.length ? 1 : c[3], a.appendXtra("", c, (4 > g.length ? 1 : g[3]) - c, S, !1)));
                else if (v = c.match(d)) {
                    if (y = g.match(m), !y || y.length !== v.length) return a;
                    for (f = 0, p = 0; v.length > p; p++) P = v[p], w = c.indexOf(P, f), a.appendXtra(c.substr(f, w - f), Number(P), ie(y[p], P), "", A && "px" === c.substr(w + P.length, 2), 0 === p), f = w + P.length;
                    a["xs" + a.l] += c.substr(f)
                } else a["xs" + a.l] += a.l ? " " + c : c;
                if (-1 !== r.indexOf("=") && a.data) {
                    for (S = a.xs0 + a.data.s, _ = 1; a.l > _; _++) S += a["xs" + _] + a.data["xn" + _];
                    a.e = S + a["xs" + _]
                }
                return a.l || (a.type = -1, a.xs0 = a.e), a.xfirst || a
            },
            ce = 9;
        for (l = pe.prototype, l.l = l.pr = 0; --ce > 0;) l["xn" + ce] = 0, l["xs" + ce] = "";
        l.xs0 = "", l._next = l._prev = l.xfirst = l.data = l.plugin = l.setRatio = l.rxp = null, l.appendXtra = function(t, e, i, r, s, n) {
            var a = this,
                o = a.l;
            return a["xs" + o] += n && o ? " " + t : t || "", i || 0 === o || a.plugin ? (a.l++, a.type = a.setRatio ? 2 : 1, a["xs" + a.l] = r || "", o > 0 ? (a.data["xn" + o] = e + i, a.rxp["xn" + o] = s, a["xn" + o] = e, a.plugin || (a.xfirst = new pe(a, "xn" + o, e, i, a.xfirst || a, 0, a.n, s, a.pr), a.xfirst.xs0 = 0), a) : (a.data = {
                s: e + i
            }, a.rxp = {}, a.s = e, a.c = i, a.r = s, a)) : (a["xs" + o] += e + (r || ""), a)
        };
        var de = function(t, e) {
                e = e || {}, this.p = e.prefix ? V(t) || t : t, o[t] = o[this.p] = this, this.format = e.formatter || he(e.defaultValue, e.color, e.collapsible, e.multi), e.parser && (this.parse = e.parser), this.clrs = e.color, this.multi = e.multi, this.keyword = e.keyword, this.dflt = e.defaultValue, this.pr = e.priority || 0
            },
            me = F._registerComplexSpecialProp = function(t, e, i) {
                "object" != typeof e && (e = {
                    parser: i
                });
                var r, s, n = t.split(","),
                    a = e.defaultValue;
                for (i = i || [a], r = 0; n.length > r; r++) e.prefix = 0 === r && e.prefix, e.defaultValue = i[r] || a, s = new de(n[r], e)
            },
            ge = function(t) {
                if (!o[t]) {
                    var e = t.charAt(0).toUpperCase() + t.substr(1) + "Plugin";
                    me(t, {
                        parser: function(t, i, r, s, n, a, l) {
                            var h = (window.GreenSockGlobals || window).com.greensock.plugins[e];
                            return h ? (h._cssRegister(), o[r].parse(t, i, r, s, n, a, l)) : (B("Error: " + e + " js file not loaded."), n)
                        }
                    })
                }
            };
        l = de.prototype, l.parseComplex = function(t, e, i, r, s, n) {
            var a, o, l, h, u, _, p = this.keyword;
            if (this.multi && (D.test(i) || D.test(e) ? (o = e.replace(D, "|").split("|"), l = i.replace(D, "|").split("|")) : p && (o = [e], l = [i])), l) {
                for (h = l.length > o.length ? l.length : o.length, a = 0; h > a; a++) e = o[a] = o[a] || this.dflt, i = l[a] = l[a] || this.dflt, p && (u = e.indexOf(p), _ = i.indexOf(p), u !== _ && (i = -1 === _ ? l : o, i[a] += " " + p));
                e = o.join(", "), i = l.join(", ")
            }
            return fe(t, this.p, e, i, this.clrs, this.dflt, r, this.pr, s, n)
        }, l.parse = function(t, e, i, r, n, a) {
            return this.parseComplex(t.style, this.format(H(t, this.p, s, !1, this.dflt)), this.format(e), n, a)
        }, a.registerSpecialProp = function(t, e, i) {
            me(t, {
                parser: function(t, r, s, n, a, o) {
                    var l = new pe(t, s, 0, 0, a, 2, s, !1, i);
                    return l.plugin = o, l.setRatio = e(t, r, n._tween, s), l
                },
                priority: i
            })
        };
        var ve = "scaleX,scaleY,scaleZ,x,y,z,skewX,rotation,rotationX,rotationY,perspective".split(","),
            ye = V("transform"),
            Te = j + "transform",
            xe = V("transformOrigin"),
            we = null !== V("perspective"),
            be = function(t, e, i, r) {
                if (t._gsTransform && i && !r) return t._gsTransform;
                var s, n, o, l, h, u, _, p, f, c, d, m, g, v = i ? t._gsTransform || {
                        skewY: 0
                    } : {
                        skewY: 0
                    },
                    y = 0 > v.scaleX,
                    T = 2e-5,
                    x = 1e5,
                    w = 179.99,
                    b = w * M,
                    P = we ? parseFloat(H(t, xe, e, !1, "0 0 0").split(" ")[2]) || v.zOrigin || 0 : 0;
                for (ye ? s = H(t, Te, e, !0) : t.currentStyle && (s = t.currentStyle.filter.match(A), s = s && 4 === s.length ? [s[0].substr(4), Number(s[2].substr(4)), Number(s[1].substr(4)), s[3].substr(4), v.x || 0, v.y || 0].join(",") : ""), n = (s || "").match(/(?:\-|\b)[\d\-\.e]+\b/gi) || [], o = n.length; --o > -1;) l = Number(n[o]), n[o] = (h = l - (l |= 0)) ? (0 | h * x + (0 > h ? -.5 : .5)) / x + l : l;
                if (16 === n.length) {
                    var S = n[8],
                        R = n[9],
                        k = n[10],
                        C = n[12],
                        O = n[13],
                        D = n[14];
                    if (v.zOrigin && (D = -v.zOrigin, C = S * D - n[12], O = R * D - n[13], D = k * D + v.zOrigin - n[14]), !i || r || null == v.rotationX) {
                        var N, X, I, E, F, Y, z, U = n[0],
                            B = n[1],
                            j = n[2],
                            W = n[3],
                            V = n[4],
                            q = n[5],
                            Q = n[6],
                            Z = n[7],
                            $ = n[11],
                            G = Math.atan2(Q, k),
                            K = -b > G || G > b;
                        v.rotationX = G * L, G && (E = Math.cos(-G), F = Math.sin(-G), N = V * E + S * F, X = q * E + R * F, I = Q * E + k * F, S = V * -F + S * E, R = q * -F + R * E, k = Q * -F + k * E, $ = Z * -F + $ * E, V = N, q = X, Q = I), G = Math.atan2(S, U), v.rotationY = G * L, G && (Y = -b > G || G > b, E = Math.cos(-G), F = Math.sin(-G), N = U * E - S * F, X = B * E - R * F, I = j * E - k * F, R = B * F + R * E, k = j * F + k * E, $ = W * F + $ * E, U = N, B = X, j = I), G = Math.atan2(B, q), v.rotation = G * L, G && (z = -b > G || G > b, E = Math.cos(-G), F = Math.sin(-G), U = U * E + V * F, X = B * E + q * F, q = B * -F + q * E, Q = j * -F + Q * E, B = X), z && K ? v.rotation = v.rotationX = 0 : z && Y ? v.rotation = v.rotationY = 0 : Y && K && (v.rotationY = v.rotationX = 0), v.scaleX = (0 | Math.sqrt(U * U + B * B) * x + .5) / x, v.scaleY = (0 | Math.sqrt(q * q + R * R) * x + .5) / x, v.scaleZ = (0 | Math.sqrt(Q * Q + k * k) * x + .5) / x, v.skewX = 0, v.perspective = $ ? 1 / (0 > $ ? -$ : $) : 0, v.x = C, v.y = O, v.z = D
                    }
                } else if (!(we && !r && n.length && v.x === n[4] && v.y === n[5] && (v.rotationX || v.rotationY) || void 0 !== v.x && "none" === H(t, "display", e))) {
                    var J = n.length >= 6,
                        te = J ? n[0] : 1,
                        ee = n[1] || 0,
                        ie = n[2] || 0,
                        re = J ? n[3] : 1;
                    v.x = n[4] || 0, v.y = n[5] || 0, u = Math.sqrt(te * te + ee * ee), _ = Math.sqrt(re * re + ie * ie), p = te || ee ? Math.atan2(ee, te) * L : v.rotation || 0, f = ie || re ? Math.atan2(ie, re) * L + p : v.skewX || 0, c = u - Math.abs(v.scaleX || 0), d = _ - Math.abs(v.scaleY || 0), Math.abs(f) > 90 && 270 > Math.abs(f) && (y ? (u *= -1, f += 0 >= p ? 180 : -180, p += 0 >= p ? 180 : -180) : (_ *= -1, f += 0 >= f ? 180 : -180)), m = (p - v.rotation) % 180, g = (f - v.skewX) % 180, (void 0 === v.skewX || c > T || -T > c || d > T || -T > d || m > -w && w > m && false | m * x || g > -w && w > g && false | g * x) && (v.scaleX = u, v.scaleY = _, v.rotation = p, v.skewX = f), we && (v.rotationX = v.rotationY = v.z = 0, v.perspective = parseFloat(a.defaultTransformPerspective) || 0, v.scaleZ = 1)
                }
                v.zOrigin = P;
                for (o in v) T > v[o] && v[o] > -T && (v[o] = 0);
                return i && (t._gsTransform = v), v
            },
            Pe = function(t) {
                var e, i, r = this.data,
                    s = -r.rotation * M,
                    n = s + r.skewX * M,
                    a = 1e5,
                    o = (0 | Math.cos(s) * r.scaleX * a) / a,
                    l = (0 | Math.sin(s) * r.scaleX * a) / a,
                    h = (0 | Math.sin(n) * -r.scaleY * a) / a,
                    u = (0 | Math.cos(n) * r.scaleY * a) / a,
                    _ = this.t.style,
                    p = this.t.currentStyle;
                if (p) {
                    i = l, l = -h, h = -i, e = p.filter, _.filter = "";
                    var f, d, m = this.t.offsetWidth,
                        g = this.t.offsetHeight,
                        v = "absolute" !== p.position,
                        x = "progid:DXImageTransform.Microsoft.Matrix(M11=" + o + ", M12=" + l + ", M21=" + h + ", M22=" + u,
                        w = r.x,
                        b = r.y;
                    if (null != r.ox && (f = (r.oxp ? .01 * m * r.ox : r.ox) - m / 2, d = (r.oyp ? .01 * g * r.oy : r.oy) - g / 2, w += f - (f * o + d * l), b += d - (f * h + d * u)), v ? (f = m / 2, d = g / 2, x += ", Dx=" + (f - (f * o + d * l) + w) + ", Dy=" + (d - (f * h + d * u) + b) + ")") : x += ", sizingMethod='auto expand')", _.filter = -1 !== e.indexOf("DXImageTransform.Microsoft.Matrix(") ? e.replace(O, x) : x + " " + e, (0 === t || 1 === t) && 1 === o && 0 === l && 0 === h && 1 === u && (v && -1 === x.indexOf("Dx=0, Dy=0") || T.test(e) && 100 !== parseFloat(RegExp.$1) || -1 === e.indexOf("gradient(" && e.indexOf("Alpha")) && _.removeAttribute("filter")), !v) {
                        var P, S, R, k = 8 > c ? 1 : -1;
                        for (f = r.ieOffsetX || 0, d = r.ieOffsetY || 0, r.ieOffsetX = Math.round((m - ((0 > o ? -o : o) * m + (0 > l ? -l : l) * g)) / 2 + w), r.ieOffsetY = Math.round((g - ((0 > u ? -u : u) * g + (0 > h ? -h : h) * m)) / 2 + b), ce = 0; 4 > ce; ce++) S = J[ce], P = p[S], i = -1 !== P.indexOf("px") ? parseFloat(P) : Q(this.t, S, parseFloat(P), P.replace(y, "")) || 0, R = i !== r[S] ? 2 > ce ? -r.ieOffsetX : -r.ieOffsetY : 2 > ce ? f - r.ieOffsetX : d - r.ieOffsetY, _[S] = (r[S] = Math.round(i - R * (0 === ce || 2 === ce ? 1 : k))) + "px"
                    }
                }
            },
            Se = function() {
                var t, e, i, r, s, n, a, o, l, h, u, _, f, c, d, m, g, v, y, T, x, w, b, P = this.data,
                    S = this.t.style,
                    R = P.rotation * M,
                    k = P.scaleX,
                    C = P.scaleY,
                    A = P.scaleZ,
                    O = P.perspective;
                if (p) {
                    var D = 1e-4;
                    D > k && k > -D && (k = A = 2e-5), D > C && C > -D && (C = A = 2e-5), !O || P.z || P.rotationX || P.rotationY || (O = 0)
                }
                if (R || P.skewX) v = Math.cos(R), y = Math.sin(R), t = v, s = y, P.skewX && (R -= P.skewX * M, v = Math.cos(R), y = Math.sin(R)), e = -y, n = v;
                else {
                    if (!(P.rotationY || P.rotationX || 1 !== A || O)) return S[ye] = "translate3d(" + P.x + "px," + P.y + "px," + P.z + "px)" + (1 !== k || 1 !== C ? " scale(" + k + "," + C + ")" : ""), void 0;
                    t = n = 1, e = s = 0
                }
                u = 1, i = r = a = o = l = h = _ = f = c = 0, d = O ? -1 / O : 0, m = P.zOrigin, g = 1e5, R = P.rotationY * M, R && (v = Math.cos(R), y = Math.sin(R), l = u * -y, f = d * -y, i = t * y, a = s * y, u *= v, d *= v, t *= v, s *= v), R = P.rotationX * M, R && (v = Math.cos(R), y = Math.sin(R), T = e * v + i * y, x = n * v + a * y, w = h * v + u * y, b = c * v + d * y, i = e * -y + i * v, a = n * -y + a * v, u = h * -y + u * v, d = c * -y + d * v, e = T, n = x, h = w, c = b), 1 !== A && (i *= A, a *= A, u *= A, d *= A), 1 !== C && (e *= C, n *= C, h *= C, c *= C), 1 !== k && (t *= k, s *= k, l *= k, f *= k), m && (_ -= m, r = i * _, o = a * _, _ = u * _ + m), r = (T = (r += P.x) - (r |= 0)) ? (0 | T * g + (0 > T ? -.5 : .5)) / g + r : r, o = (T = (o += P.y) - (o |= 0)) ? (0 | T * g + (0 > T ? -.5 : .5)) / g + o : o, _ = (T = (_ += P.z) - (_ |= 0)) ? (0 | T * g + (0 > T ? -.5 : .5)) / g + _ : _, S[ye] = "matrix3d(" + [(0 | t * g) / g, (0 | s * g) / g, (0 | l * g) / g, (0 | f * g) / g, (0 | e * g) / g, (0 | n * g) / g, (0 | h * g) / g, (0 | c * g) / g, (0 | i * g) / g, (0 | a * g) / g, (0 | u * g) / g, (0 | d * g) / g, r, o, _, O ? 1 + -_ / O : 1].join(",") + ")"
            },
            Re = function(t) {
                var e, i, r, s, n, a = this.data,
                    o = this.t,
                    l = o.style;
                return a.rotationX || a.rotationY || a.z || a.force3D ? (this.setRatio = Se, Se.call(this, t), void 0) : (a.rotation || a.skewX ? (e = a.rotation * M, i = e - a.skewX * M, r = 1e5, s = a.scaleX * r, n = a.scaleY * r, l[ye] = "matrix(" + (0 | Math.cos(e) * s) / r + "," + (0 | Math.sin(e) * s) / r + "," + (0 | Math.sin(i) * -n) / r + "," + (0 | Math.cos(i) * n) / r + "," + a.x + "," + a.y + ")") : l[ye] = "matrix(" + a.scaleX + ",0,0," + a.scaleY + "," + a.x + "," + a.y + ")", void 0)
            };
        me("transform,scale,scaleX,scaleY,scaleZ,x,y,z,rotation,rotationX,rotationY,rotationZ,skewX,skewY,shortRotation,shortRotationX,shortRotationY,shortRotationZ,transformOrigin,transformPerspective,directionalRotation,parseTransform,force3D", {
            parser: function(t, e, i, r, n, a, o) {
                if (r._transform) return n;
                var l, h, u, _, p, f, c, d = r._transform = be(t, s, !0, o.parseTransform),
                    m = t.style,
                    g = 1e-6,
                    v = ve.length,
                    y = o,
                    T = {};
                if ("string" == typeof y.transform && ye) u = m.cssText, m[ye] = y.transform, m.display = "block", l = be(t, null, !1), m.cssText = u;

                else if ("object" == typeof y) {
                    if (l = {
                            scaleX: re(null != y.scaleX ? y.scaleX : y.scale, d.scaleX),
                            scaleY: re(null != y.scaleY ? y.scaleY : y.scale, d.scaleY),
                            scaleZ: re(y.scaleZ, d.scaleZ),
                            x: re(y.x, d.x),
                            y: re(y.y, d.y),
                            z: re(y.z, d.z),
                            perspective: re(y.transformPerspective, d.perspective)
                        }, c = y.directionalRotation, null != c)
                        if ("object" == typeof c)
                            for (u in c) y[u] = c[u];
                        else y.rotation = c;
                    l.rotation = se("rotation" in y ? y.rotation : "shortRotation" in y ? y.shortRotation + "_short" : "rotationZ" in y ? y.rotationZ : d.rotation, d.rotation, "rotation", T), we && (l.rotationX = se("rotationX" in y ? y.rotationX : "shortRotationX" in y ? y.shortRotationX + "_short" : d.rotationX || 0, d.rotationX, "rotationX", T), l.rotationY = se("rotationY" in y ? y.rotationY : "shortRotationY" in y ? y.shortRotationY + "_short" : d.rotationY || 0, d.rotationY, "rotationY", T)), l.skewX = null == y.skewX ? d.skewX : se(y.skewX, d.skewX), l.skewY = null == y.skewY ? d.skewY : se(y.skewY, d.skewY), (h = l.skewY - d.skewY) && (l.skewX += h, l.rotation += h)
                }
                for (we && null != y.force3D && (d.force3D = y.force3D, f = !0), p = d.force3D || d.z || d.rotationX || d.rotationY || l.z || l.rotationX || l.rotationY || l.perspective, p || null == y.scale || (l.scaleZ = 1); --v > -1;) i = ve[v], _ = l[i] - d[i], (_ > g || -g > _ || null != N[i]) && (f = !0, n = new pe(d, i, d[i], _, n), i in T && (n.e = T[i]), n.xs0 = 0, n.plugin = a, r._overwriteProps.push(n.n));
                return _ = y.transformOrigin, (_ || we && p && d.zOrigin) && (ye ? (f = !0, i = xe, _ = (_ || H(t, i, s, !1, "50% 50%")) + "", n = new pe(m, i, 0, 0, n, -1, "transformOrigin"), n.b = m[i], n.plugin = a, we ? (u = d.zOrigin, _ = _.split(" "), d.zOrigin = (_.length > 2 && (0 === u || "0px" !== _[2]) ? parseFloat(_[2]) : u) || 0, n.xs0 = n.e = m[i] = _[0] + " " + (_[1] || "50%") + " 0px", n = new pe(d, "zOrigin", 0, 0, n, -1, n.n), n.b = u, n.xs0 = n.e = d.zOrigin) : n.xs0 = n.e = m[i] = _) : ee(_ + "", d)), f && (r._transformType = p || 3 === this._transformType ? 3 : 2), n
            },
            prefix: !0
        }), me("boxShadow", {
            defaultValue: "0px 0px 0px 0px #999",
            prefix: !0,
            color: !0,
            multi: !0,
            keyword: "inset"
        }), me("borderRadius", {
            defaultValue: "0px",
            parser: function(t, e, i, n, a) {
                e = this.format(e);
                var o, l, h, u, _, p, f, c, d, m, g, v, y, T, x, w, b = ["borderTopLeftRadius", "borderTopRightRadius", "borderBottomRightRadius", "borderBottomLeftRadius"],
                    P = t.style;
                for (d = parseFloat(t.offsetWidth), m = parseFloat(t.offsetHeight), o = e.split(" "), l = 0; b.length > l; l++) this.p.indexOf("border") && (b[l] = V(b[l])), _ = u = H(t, b[l], s, !1, "0px"), -1 !== _.indexOf(" ") && (u = _.split(" "), _ = u[0], u = u[1]), p = h = o[l], f = parseFloat(_), v = _.substr((f + "").length), y = "=" === p.charAt(1), y ? (c = parseInt(p.charAt(0) + "1", 10), p = p.substr(2), c *= parseFloat(p), g = p.substr((c + "").length - (0 > c ? 1 : 0)) || "") : (c = parseFloat(p), g = p.substr((c + "").length)), "" === g && (g = r[i] || v), g !== v && (T = Q(t, "borderLeft", f, v), x = Q(t, "borderTop", f, v), "%" === g ? (_ = 100 * (T / d) + "%", u = 100 * (x / m) + "%") : "em" === g ? (w = Q(t, "borderLeft", 1, "em"), _ = T / w + "em", u = x / w + "em") : (_ = T + "px", u = x + "px"), y && (p = parseFloat(_) + c + g, h = parseFloat(u) + c + g)), a = fe(P, b[l], _ + " " + u, p + " " + h, !1, "0px", a);
                return a
            },
            prefix: !0,
            formatter: he("0px 0px 0px 0px", !1, !0)
        }), me("backgroundPosition", {
            defaultValue: "0 0",
            parser: function(t, e, i, r, n, a) {
                var o, l, h, u, _, p, f = "background-position",
                    d = s || q(t, null),
                    m = this.format((d ? c ? d.getPropertyValue(f + "-x") + " " + d.getPropertyValue(f + "-y") : d.getPropertyValue(f) : t.currentStyle.backgroundPositionX + " " + t.currentStyle.backgroundPositionY) || "0 0"),
                    g = this.format(e);
                if (-1 !== m.indexOf("%") != (-1 !== g.indexOf("%")) && (p = H(t, "backgroundImage").replace(R, ""), p && "none" !== p)) {
                    for (o = m.split(" "), l = g.split(" "), E.setAttribute("src", p), h = 2; --h > -1;) m = o[h], u = -1 !== m.indexOf("%"), u !== (-1 !== l[h].indexOf("%")) && (_ = 0 === h ? t.offsetWidth - E.width : t.offsetHeight - E.height, o[h] = u ? parseFloat(m) / 100 * _ + "px" : 100 * (parseFloat(m) / _) + "%");
                    m = o.join(" ")
                }
                return this.parseComplex(t.style, m, g, n, a)
            },
            formatter: ee
        }), me("backgroundSize", {
            defaultValue: "0 0",
            formatter: ee
        }), me("perspective", {
            defaultValue: "0px",
            prefix: !0
        }), me("perspectiveOrigin", {
            defaultValue: "50% 50%",
            prefix: !0
        }), me("transformStyle", {
            prefix: !0
        }), me("backfaceVisibility", {
            prefix: !0
        }), me("userSelect", {
            prefix: !0
        }), me("margin", {
            parser: ue("marginTop,marginRight,marginBottom,marginLeft")
        }), me("padding", {
            parser: ue("paddingTop,paddingRight,paddingBottom,paddingLeft")
        }), me("clip", {
            defaultValue: "rect(0px,0px,0px,0px)",
            parser: function(t, e, i, r, n, a) {
                var o, l, h;
                return 9 > c ? (l = t.currentStyle, h = 8 > c ? " " : ",", o = "rect(" + l.clipTop + h + l.clipRight + h + l.clipBottom + h + l.clipLeft + ")", e = this.format(e).split(",").join(h)) : (o = this.format(H(t, this.p, s, !1, this.dflt)), e = this.format(e)), this.parseComplex(t.style, o, e, n, a)
            }
        }), me("textShadow", {
            defaultValue: "0px 0px 0px #999",
            color: !0,
            multi: !0
        }), me("autoRound,strictUnits", {
            parser: function(t, e, i, r, s) {
                return s
            }
        }), me("border", {
            defaultValue: "0px solid #000",
            parser: function(t, e, i, r, n, a) {
                return this.parseComplex(t.style, this.format(H(t, "borderTopWidth", s, !1, "0px") + " " + H(t, "borderTopStyle", s, !1, "solid") + " " + H(t, "borderTopColor", s, !1, "#000")), this.format(e), n, a)
            },
            color: !0,
            formatter: function(t) {
                var e = t.split(" ");
                return e[0] + " " + (e[1] || "solid") + " " + (t.match(le) || ["#000"])[0]
            }
        }), me("borderWidth", {
            parser: ue("borderTopWidth,borderRightWidth,borderBottomWidth,borderLeftWidth")
        }), me("float,cssFloat,styleFloat", {
            parser: function(t, e, i, r, s) {
                var n = t.style,
                    a = "cssFloat" in n ? "cssFloat" : "styleFloat";
                return new pe(n, a, 0, 0, s, -1, i, !1, 0, n[a], e)
            }
        });
        var ke = function(t) {
            var e, i = this.t,
                r = i.filter || H(this.data, "filter"),
                s = 0 | this.s + this.c * t;
            100 === s && (-1 === r.indexOf("atrix(") && -1 === r.indexOf("radient(") && -1 === r.indexOf("oader(") ? (i.removeAttribute("filter"), e = !H(this.data, "filter")) : (i.filter = r.replace(w, ""), e = !0)), e || (this.xn1 && (i.filter = r = r || "alpha(opacity=" + s + ")"), -1 === r.indexOf("opacity") ? 0 === s && this.xn1 || (i.filter = r + " alpha(opacity=" + s + ")") : i.filter = r.replace(T, "opacity=" + s))
        };
        me("opacity,alpha,autoAlpha", {
            defaultValue: "1",
            parser: function(t, e, i, r, n, a) {
                var o = parseFloat(H(t, "opacity", s, !1, "1")),
                    l = t.style,
                    h = "autoAlpha" === i;
                return "string" == typeof e && "=" === e.charAt(1) && (e = ("-" === e.charAt(0) ? -1 : 1) * parseFloat(e.substr(2)) + o), h && 1 === o && "hidden" === H(t, "visibility", s) && 0 !== e && (o = 0), z ? n = new pe(l, "opacity", o, e - o, n) : (n = new pe(l, "opacity", 100 * o, 100 * (e - o), n), n.xn1 = h ? 1 : 0, l.zoom = 1, n.type = 2, n.b = "alpha(opacity=" + n.s + ")", n.e = "alpha(opacity=" + (n.s + n.c) + ")", n.data = t, n.plugin = a, n.setRatio = ke), h && (n = new pe(l, "visibility", 0, 0, n, -1, null, !1, 0, 0 !== o ? "inherit" : "hidden", 0 === e ? "hidden" : "inherit"), n.xs0 = "inherit", r._overwriteProps.push(n.n), r._overwriteProps.push(i)), n
            }
        });
        var Ce = function(t, e) {
                e && (t.removeProperty ? t.removeProperty(e.replace(P, "-$1").toLowerCase()) : t.removeAttribute(e))
            },
            Ae = function(t) {
                if (this.t._gsClassPT = this, 1 === t || 0 === t) {
                    this.t.className = 0 === t ? this.b : this.e;
                    for (var e = this.data, i = this.t.style; e;) e.v ? i[e.p] = e.v : Ce(i, e.p), e = e._next;
                    1 === t && this.t._gsClassPT === this && (this.t._gsClassPT = null)
                } else this.t.className !== this.e && (this.t.className = this.e)
            };
        me("className", {
            parser: function(t, e, r, n, a, o, l) {
                var h, u, _, p, f, c = t.className,
                    d = t.style.cssText;
                if (a = n._classNamePT = new pe(t, r, 0, 0, a, 2), a.setRatio = Ae, a.pr = -11, i = !0, a.b = c, u = $(t, s), _ = t._gsClassPT) {
                    for (p = {}, f = _.data; f;) p[f.p] = 1, f = f._next;
                    _.setRatio(1)
                }
                return t._gsClassPT = a, a.e = "=" !== e.charAt(1) ? e : c.replace(RegExp("\\s*\\b" + e.substr(2) + "\\b"), "") + ("+" === e.charAt(0) ? " " + e.substr(2) : ""), n._tween._duration && (t.className = a.e, h = G(t, u, $(t), l, p), t.className = c, a.data = h.firstMPT, t.style.cssText = d, a = a.xfirst = n.parse(t, h.difs, a, o)), a
            }
        });
        var Oe = function(t) {
            if ((1 === t || 0 === t) && this.data._totalTime === this.data._totalDuration && "isFromStart" !== this.data.data) {
                var e, i, r, s, n = this.t.style,
                    a = o.transform.parse;
                if ("all" === this.e) n.cssText = "", s = !0;
                else
                    for (e = this.e.split(","), r = e.length; --r > -1;) i = e[r], o[i] && (o[i].parse === a ? s = !0 : i = "transformOrigin" === i ? xe : o[i].p), Ce(n, i);
                s && (Ce(n, ye), this.t._gsTransform && delete this.t._gsTransform)
            }
        };
        for (me("clearProps", {
                parser: function(t, e, r, s, n) {
                    return n = new pe(t, r, 0, 0, n, 2), n.setRatio = Oe, n.e = e, n.pr = -10, n.data = s._tween, i = !0, n
                }
            }), l = "bezier,throwProps,physicsProps,physics2D".split(","), ce = l.length; ce--;) ge(l[ce]);
        l = a.prototype, l._firstPT = null, l._onInitTween = function(t, e, o) {
            if (!t.nodeType) return !1;
            this._target = t, this._tween = o, this._vars = e, h = e.autoRound, i = !1, r = e.suffixMap || a.suffixMap, s = q(t, ""), n = this._overwriteProps;
            var l, p, c, d, m, g, v, y, T, w = t.style;
            if (u && "" === w.zIndex && (l = H(t, "zIndex", s), ("auto" === l || "" === l) && (w.zIndex = 0)), "string" == typeof e && (d = w.cssText, l = $(t, s), w.cssText = d + ";" + e, l = G(t, l, $(t)).difs, !z && x.test(e) && (l.opacity = parseFloat(RegExp.$1)), e = l, w.cssText = d), this._firstPT = p = this.parse(t, e, null), this._transformType) {
                for (T = 3 === this._transformType, ye ? _ && (u = !0, "" === w.zIndex && (v = H(t, "zIndex", s), ("auto" === v || "" === v) && (w.zIndex = 0)), f && (w.WebkitBackfaceVisibility = this._vars.WebkitBackfaceVisibility || (T ? "visible" : "hidden"))) : w.zoom = 1, c = p; c && c._next;) c = c._next;
                y = new pe(t, "transform", 0, 0, null, 2), this._linkCSSP(y, null, c), y.setRatio = T && we ? Se : ye ? Re : Pe, y.data = this._transform || be(t, s, !0), n.pop()
            }
            if (i) {
                for (; p;) {
                    for (g = p._next, c = d; c && c.pr > p.pr;) c = c._next;
                    (p._prev = c ? c._prev : m) ? p._prev._next = p: d = p, (p._next = c) ? c._prev = p : m = p, p = g
                }
                this._firstPT = d
            }
            return !0
        }, l.parse = function(t, e, i, n) {
            var a, l, u, _, p, f, c, d, m, g, v = t.style;
            for (a in e) f = e[a], l = o[a], l ? i = l.parse(t, f, a, this, i, n, e) : (p = H(t, a, s) + "", m = "string" == typeof f, "color" === a || "fill" === a || "stroke" === a || -1 !== a.indexOf("Color") || m && b.test(f) ? (m || (f = oe(f), f = (f.length > 3 ? "rgba(" : "rgb(") + f.join(",") + ")"), i = fe(v, a, p, f, !0, "transparent", i, 0, n)) : !m || -1 === f.indexOf(" ") && -1 === f.indexOf(",") ? (u = parseFloat(p), c = u || 0 === u ? p.substr((u + "").length) : "", ("" === p || "auto" === p) && ("width" === a || "height" === a ? (u = te(t, a, s), c = "px") : "left" === a || "top" === a ? (u = Z(t, a, s), c = "px") : (u = "opacity" !== a ? 0 : 1, c = "")), g = m && "=" === f.charAt(1), g ? (_ = parseInt(f.charAt(0) + "1", 10), f = f.substr(2), _ *= parseFloat(f), d = f.replace(y, "")) : (_ = parseFloat(f), d = m ? f.substr((_ + "").length) || "" : ""), "" === d && (d = a in r ? r[a] : c), f = _ || 0 === _ ? (g ? _ + u : _) + d : e[a], c !== d && "" !== d && (_ || 0 === _) && (u || 0 === u) && (u = Q(t, a, u, c), "%" === d ? (u /= Q(t, a, 100, "%") / 100, e.strictUnits !== !0 && (p = u + "%")) : "em" === d ? u /= Q(t, a, 1, "em") : (_ = Q(t, a, _, d), d = "px"), g && (_ || 0 === _) && (f = _ + u + d)), g && (_ += u), !u && 0 !== u || !_ && 0 !== _ ? void 0 !== v[a] && (f || "NaN" != f + "" && null != f) ? (i = new pe(v, a, _ || u || 0, 0, i, -1, a, !1, 0, p, f), i.xs0 = "none" !== f || "display" !== a && -1 === a.indexOf("Style") ? f : p) : B("invalid " + a + " tween value: " + e[a]) : (i = new pe(v, a, u, _ - u, i, 0, a, h !== !1 && ("px" === d || "zIndex" === a), 0, p, f), i.xs0 = d)) : i = fe(v, a, p, f, !0, null, i, 0, n)), n && i && !i.plugin && (i.plugin = n);
            return i
        }, l.setRatio = function(t) {
            var e, i, r, s = this._firstPT,
                n = 1e-6;
            if (1 !== t || this._tween._time !== this._tween._duration && 0 !== this._tween._time)
                if (t || this._tween._time !== this._tween._duration && 0 !== this._tween._time || this._tween._rawPrevTime === -1e-6)
                    for (; s;) {
                        if (e = s.c * t + s.s, s.r ? e = e > 0 ? 0 | e + .5 : 0 | e - .5 : n > e && e > -n && (e = 0), s.type)
                            if (1 === s.type)
                                if (r = s.l, 2 === r) s.t[s.p] = s.xs0 + e + s.xs1 + s.xn1 + s.xs2;
                                else if (3 === r) s.t[s.p] = s.xs0 + e + s.xs1 + s.xn1 + s.xs2 + s.xn2 + s.xs3;
                        else if (4 === r) s.t[s.p] = s.xs0 + e + s.xs1 + s.xn1 + s.xs2 + s.xn2 + s.xs3 + s.xn3 + s.xs4;
                        else if (5 === r) s.t[s.p] = s.xs0 + e + s.xs1 + s.xn1 + s.xs2 + s.xn2 + s.xs3 + s.xn3 + s.xs4 + s.xn4 + s.xs5;
                        else {
                            for (i = s.xs0 + e + s.xs1, r = 1; s.l > r; r++) i += s["xn" + r] + s["xs" + (r + 1)];
                            s.t[s.p] = i
                        } else -1 === s.type ? s.t[s.p] = s.xs0 : s.setRatio && s.setRatio(t);
                        else s.t[s.p] = e + s.xs0;
                        s = s._next
                    } else
                        for (; s;) 2 !== s.type ? s.t[s.p] = s.b : s.setRatio(t), s = s._next;
                else
                    for (; s;) 2 !== s.type ? s.t[s.p] = s.e : s.setRatio(t), s = s._next
        }, l._enableTransforms = function(t) {
            this._transformType = t || 3 === this._transformType ? 3 : 2, this._transform = this._transform || be(this._target, s, !0)
        }, l._linkCSSP = function(t, e, i, r) {
            return t && (e && (e._prev = t), t._next && (t._next._prev = t._prev), t._prev ? t._prev._next = t._next : this._firstPT === t && (this._firstPT = t._next, r = !0), i ? i._next = t : r || null !== this._firstPT || (this._firstPT = t), t._next = e, t._prev = i), t
        }, l._kill = function(e) {
            var i, r, s, n = e;
            if (e.autoAlpha || e.alpha) {
                n = {};
                for (r in e) n[r] = e[r];
                n.opacity = 1, n.autoAlpha && (n.visibility = 1)
            }
            return e.className && (i = this._classNamePT) && (s = i.xfirst, s && s._prev ? this._linkCSSP(s._prev, i._next, s._prev._prev) : s === this._firstPT && (this._firstPT = i._next), i._next && this._linkCSSP(i._next, i._next._next, s._prev), this._classNamePT = null), t.prototype._kill.call(this, n)
        };
        var De = function(t, e, i) {
            var r, s, n, a;
            if (t.slice)
                for (s = t.length; --s > -1;) De(t[s], e, i);
            else
                for (r = t.childNodes, s = r.length; --s > -1;) n = r[s], a = n.type, n.style && (e.push($(n)), i && i.push(n)), 1 !== a && 9 !== a && 11 !== a || !n.childNodes.length || De(n, e, i)
        };
        return a.cascadeTo = function(t, i, r) {
            var s, n, a, o = e.to(t, i, r),
                l = [o],
                h = [],
                u = [],
                _ = [],
                p = e._internals.reservedProps;
            for (t = o._targets || o.target, De(t, h, _), o.render(i, !0), De(t, u), o.render(0, !0), o._enabled(!0), s = _.length; --s > -1;)
                if (n = G(_[s], h[s], u[s]), n.firstMPT) {
                    n = n.difs;
                    for (a in r) p[a] && (n[a] = r[a]);
                    l.push(e.to(_[s], i, n))
                }
            return l
        }, t.activate([a]), a
    }, !0)
}), window._gsDefine && window._gsQueue.pop()();

function revslider_showDoubleJqueryError(e) {
    var t = "Revolution Slider Error: You have some jquery.js library include that comes after the revolution files js include.";
    t += "<br> This includes make eliminates the revolution slider libraries, and make it not work.";
    t += "<br><br> To fix it you can:<br>&nbsp;&nbsp;&nbsp; 1. In the Slider Settings -> Troubleshooting set option:  <strong><b>Put JS Includes To Body</b></strong> option to true.";
    t += "<br>&nbsp;&nbsp;&nbsp; 2. Find the double jquery.js include and remove it.";
    t = "<span style='font-size:16px;color:#BC0C06;'>" + t + "</span>";
    jQuery(e).show().html(t)
}(function(e, t) {
    function n(e) {
        var t = [],
            n;
        var r = window.location.href.slice(window.location.href.indexOf(e) + 1).split("_");
        for (var i = 0; i < r.length; i++) {
            r[i] = r[i].replace("%3D", "=");
            n = r[i].split("=");
            t.push(n[0]);
            t[n[0]] = n[1]
        }
        return t
    }

    function r(n, i) {
        try {
            if (i.hideThumbsUnderResoluition != 0 && i.navigationType == "thumb") {
                if (i.hideThumbsUnderResoluition > e(window).width()) e(".tp-bullets").css({
                    display: "none"
                });
                else e(".tp-bullets").css({
                    display: "block"
                })
            }
        } catch (s) {}
        n.find(".defaultimg").each(function(t) {
            g(e(this), i)
        });
        var o = n.parent();
        if (e(window).width() < i.hideSliderAtLimit) {
            n.trigger("stoptimer");
            if (o.css("display") != "none") o.data("olddisplay", o.css("display"));
            o.css({
                display: "none"
            })
        } else {
            if (n.is(":hidden")) {
                if (o.data("olddisplay") != t && o.data("olddisplay") != "undefined" && o.data("olddisplay") != "none") o.css({
                    display: o.data("olddisplay")
                });
                else o.css({
                    display: "block"
                });
                n.trigger("restarttimer");
                setTimeout(function() {
                    r(n, i)
                }, 150)
            }
        }
        var u = 0;
        if (i.forceFullWidth == "on") u = 0 - i.container.parent().offset().left;
        try {
            n.parent().find(".tp-bannershadow").css({
                width: i.width,
                left: u
            })
        } catch (s) {}
        var a = n.find(">ul >li:eq(" + i.act + ") .slotholder");
        var f = n.find(">ul >li:eq(" + i.next + ") .slotholder");
        S(n, i);
        f.find(".defaultimg").css({
            opacity: 0
        });
        a.find(".defaultimg").css({
            opacity: 1
        });
        f.find(".defaultimg").each(function() {
            var n = e(this);
            if (n.data("kenburn") != t) n.data("kenburn").restart()
        });
        var l = n.find(">ul >li:eq(" + i.next + ")");
        V(l, i, true);
        m(n, i)
    }

    function s() {
        var e = ["android", "webos", "iphone", "ipad", "blackberry", "Android", "webos", , "iPod", "iPhone", "iPad", "Blackberry", "BlackBerry"];
        var t = false;
        for (i in e) {
            if (navigator.userAgent.split(e[i]).length > 1) {
                t = true
            }
        }
        return t
    }

    function o(t, n) {
        var r = e('<div style="display:none;"/>').appendTo(e("body"));
        r.html("<!--[if " + (n || "") + " IE " + (t || "") + "]><a>&nbsp;</a><![endif]-->");
        var i = r.find("a").length;
        r.remove();
        return i
    }

    function u(e, t) {
        C(t, e)
    }

    function a(n, r) {
        var i = n.parent();
        if (r.navigationType == "thumb" || r.navsecond == "both") {
            i.append('<div class="tp-bullets tp-thumbs ' + r.navigationStyle + '"><div class="tp-mask"><div class="tp-thumbcontainer"></div></div></div>')
        }
        var s = i.find(".tp-bullets.tp-thumbs .tp-mask .tp-thumbcontainer");
        var o = s.parent();
        o.width(r.thumbWidth * r.thumbAmount);
        o.height(r.thumbHeight);
        o.parent().width(r.thumbWidth * r.thumbAmount);
        o.parent().height(r.thumbHeight);
        n.find(">ul:first >li").each(function(e) {
            var i = n.find(">ul:first >li:eq(" + e + ")");
            var o = i.find(".defaultimg").css("backgroundColor");
            if (i.data("thumb") != t) var u = i.data("thumb");
            else var u = i.find("img:first").attr("src");
            s.append('<div class="bullet thumb" style="background-color:' + o + ";position:relative;width:" + r.thumbWidth + "px;height:" + r.thumbHeight + "px;background-image:url(" + u + ') !important;background-size:cover;background-position:center center;"></div>');
            var a = s.find(".bullet:first")
        });
        var a = 10;
        s.find(".bullet").each(function(t) {
            var i = e(this);
            if (t == r.slideamount - 1) i.addClass("last");
            if (t == 0) i.addClass("first");
            i.width(r.thumbWidth);
            i.height(r.thumbHeight);
            if (a < i.outerWidth(true)) a = i.outerWidth(true);
            i.click(function() {
                if (r.transition == 0 && i.index() != r.act) {
                    r.next = i.index();
                    u(r, n)
                }
            })
        });
        var c = a * n.find(">ul:first >li").length;
        var h = s.parent().width();
        r.thumbWidth = a;
        if (h < c) {
            e(document).mousemove(function(t) {
                e("body").data("mousex", t.pageX)
            });
            s.parent().mouseenter(function() {
                var t = e(this);
                t.addClass("over");
                var r = t.offset();
                var i = e("body").data("mousex") - r.left;
                var s = t.width();
                var o = t.find(".bullet:first").outerWidth(true);
                var u = o * n.find(">ul:first >li").length;
                var a = u - s + 15;
                var f = a / s;
                i = i - 30;
                var c = 0 - i * f;
                if (c > 0) c = 0;
                if (c < 0 - u + s) c = 0 - u + s;
                l(t, c, 200)
            });
            s.parent().mousemove(function() {
                var t = e(this);
                var r = t.offset();
                var i = e("body").data("mousex") - r.left;
                var s = t.width();
                var o = t.find(".bullet:first").outerWidth(true);
                var u = o * n.find(">ul:first >li").length - 1;
                var a = u - s + 15;
                var f = a / s;
                i = i - 3;
                if (i < 6) i = 0;
                if (i + 3 > s - 6) i = s;
                var c = 0 - i * f;
                if (c > 0) c = 0;
                if (c < 0 - u + s) c = 0 - u + s;
                l(t, c, 0)
            });
            s.parent().mouseleave(function() {
                var t = e(this);
                t.removeClass("over");
                f(n)
            })
        }
    }

    function f(e) {
        var t = e.parent().find(".tp-bullets.tp-thumbs .tp-mask .tp-thumbcontainer");
        var n = t.parent();
        var r = n.offset();
        var i = n.find(".bullet:first").outerWidth(true);
        var s = n.find(".bullet.selected").index() * i;
        var o = n.width();
        var i = n.find(".bullet:first").outerWidth(true);
        var u = i * e.find(">ul:first >li").length;
        var a = u - o;
        var f = a / o;
        var c = 0 - s;
        if (c > 0) c = 0;
        if (c < 0 - u + o) c = 0 - u + o;
        if (!n.hasClass("over")) {
            l(n, c, 200)
        }
    }

    function l(e, t, n) {
        TweenLite.to(e.find(".tp-thumbcontainer"), .2, {
            left: t,
            ease: Power3.easeOut,
            overwrite: "auto"
        })
    }

    function c(t, n) {
        if (n.navigationType == "bullet" || n.navigationType == "both") {
            t.parent().append('<div class="tp-bullets simplebullets ' + n.navigationStyle + '"></div>')
        }
        var r = t.parent().find(".tp-bullets");
        t.find(">ul:first >li").each(function(e) {
            var n = t.find(">ul:first >li:eq(" + e + ") img:first").attr("src");
            r.append('<div class="bullet"></div>');
            var i = r.find(".bullet:first")
        });
        r.find(".bullet").each(function(r) {
            var i = e(this);
            if (r == n.slideamount - 1) i.addClass("last");
            if (r == 0) i.addClass("first");
            i.click(function() {
                var e = false;
                if (n.navigationArrows == "withbullet" || n.navigationArrows == "nexttobullets") {
                    if (i.index() - 1 == n.act) e = true
                } else {
                    if (i.index() == n.act) e = true
                }
                if (n.transition == 0 && !e) {
                    if (n.navigationArrows == "withbullet" || n.navigationArrows == "nexttobullets") {
                        n.next = i.index() - 1
                    } else {
                        n.next = i.index()
                    }
                    u(n, t)
                }
            })
        });
        r.append('<div class="tpclear"></div>');
        m(t, n)
    }

    function h(e, n) {
        var r = e.find(".tp-bullets");
        var i = "";
        var s = n.navigationStyle;
        if (n.navigationArrows == "none") i = "visibility:hidden;display:none";
        n.soloArrowStyle = "default";
        if (n.navigationArrows != "none" && n.navigationArrows != "nexttobullets") s = n.soloArrowStyle;
        e.parent().append('<div style="' + i + '" class="tp-leftarrow tparrows ' + s + '"></div>');
        e.parent().append('<div style="' + i + '" class="tp-rightarrow tparrows ' + s + '"></div>');
        e.parent().find(".tp-rightarrow").click(function() {
            if (n.transition == 0) {
                if (e.data("showus") != t && e.data("showus") != -1) n.next = e.data("showus") - 1;
                else n.next = n.next + 1;
                e.data("showus", -1);
                if (n.next >= n.slideamount) n.next = 0;
                if (n.next < 0) n.next = 0;
                if (n.act != n.next) u(n, e)
            }
        });
        e.parent().find(".tp-leftarrow").click(function() {
            if (n.transition == 0) {
                n.next = n.next - 1;
                n.leftarrowpressed = 1;
                if (n.next < 0) n.next = n.slideamount - 1;
                u(n, e)
            }
        });
        m(e, n)
    }

    function p(n, r) {
        e(document).keydown(function(e) {
            if (r.transition == 0 && e.keyCode == 39) {
                if (n.data("showus") != t && n.data("showus") != -1) r.next = n.data("showus") - 1;
                else r.next = r.next + 1;
                n.data("showus", -1);
                if (r.next >= r.slideamount) r.next = 0;
                if (r.next < 0) r.next = 0;
                if (r.act != r.next) u(r, n)
            }
            if (r.transition == 0 && e.keyCode == 37) {
                r.next = r.next - 1;
                r.leftarrowpressed = 1;
                if (r.next < 0) r.next = r.slideamount - 1;
                u(r, n)
            }
        });
        m(n, r)
    }

    function d(t, n) {
        if (n.touchenabled == "on") {
            var r = Hammer(t, {
                drag_block_vertical: n.drag_block_vertical,
                drag_lock_to_axis: true,
                swipe_velocity: n.swipe_velocity,
                swipe_max_touches: n.swipe_max_touches,
                swipe_min_touches: n.swipe_min_touches,
                prevent_default: false
            });
            r.on("swipeleft", function() {
                if (n.transition == 0) {
                    n.next = n.next + 1;
                    if (n.next == n.slideamount) n.next = 0;
                    u(n, t)
                }
            });
            r.on("swiperight", function() {
                if (n.transition == 0) {
                    n.next = n.next - 1;
                    n.leftarrowpressed = 1;
                    if (n.next < 0) n.next = n.slideamount - 1;
                    u(n, t)
                }
            });
            r.on("swipeup", function() {
                e("html, body").animate({
                    scrollTop: t.offset().top + t.height() + "px"
                })
            });
            r.on("swipedown", function() {
                e("html, body").animate({
                    scrollTop: t.offset().top - e(window).height() + "px"
                })
            })
        }
    }

    function v(e, t) {
        var n = e.parent().find(".tp-bullets");
        var r = e.parent().find(".tparrows");
        if (n == null) {
            e.append('<div class=".tp-bullets"></div>');
            var n = e.parent().find(".tp-bullets")
        }
        if (r == null) {
            e.append('<div class=".tparrows"></div>');
            var r = e.parent().find(".tparrows")
        }
        e.data("hidethumbs", t.hideThumbs);
        n.addClass("hidebullets");
        r.addClass("hidearrows");
        if (s()) {
            e.hammer().on("touch", function() {
                e.addClass("hovered");
                if (t.onHoverStop == "on") e.trigger("stoptimer");
                clearTimeout(e.data("hidethumbs"));
                n.removeClass("hidebullets");
                r.removeClass("hidearrows")
            });
            e.hammer().on("release", function() {
                e.removeClass("hovered");
                e.trigger("playtimer");
                if (!e.hasClass("hovered") && !n.hasClass("hovered")) e.data("hidethumbs", setTimeout(function() {
                    n.addClass("hidebullets");
                    r.addClass("hidearrows");
                    e.trigger("playtimer")
                }, t.hideNavDelayOnMobile))
            })
        } else {
            n.hover(function() {
                t.overnav = true;
                if (t.onHoverStop == "on") e.trigger("stoptimer");
                n.addClass("hovered");
                clearTimeout(e.data("hidethumbs"));
                n.removeClass("hidebullets");
                r.removeClass("hidearrows")
            }, function() {
                t.overnav = false;
                e.trigger("playtimer");
                n.removeClass("hovered");
                if (!e.hasClass("hovered") && !n.hasClass("hovered")) e.data("hidethumbs", setTimeout(function() {
                    n.addClass("hidebullets");
                    r.addClass("hidearrows")
                }, t.hideThumbs))
            });
            r.hover(function() {
                t.overnav = true;
                if (t.onHoverStop == "on") e.trigger("stoptimer");
                n.addClass("hovered");
                clearTimeout(e.data("hidethumbs"));
                n.removeClass("hidebullets");
                r.removeClass("hidearrows")
            }, function() {
                t.overnav = false;
                e.trigger("playtimer");
                n.removeClass("hovered")
            });
            e.on("mouseenter", function() {
                e.addClass("hovered");
                if (t.onHoverStop == "on") e.trigger("stoptimer");
                clearTimeout(e.data("hidethumbs"));
                n.removeClass("hidebullets");
                r.removeClass("hidearrows")
            });
            e.on("mouseleave", function() {
                e.removeClass("hovered");
                e.trigger("playtimer");
                if (!e.hasClass("hovered") && !n.hasClass("hovered")) e.data("hidethumbs", setTimeout(function() {
                    n.addClass("hidebullets");
                    r.addClass("hidearrows")
                }, t.hideThumbs))
            })
        }
    }

    function m(t, n) {
        var r = t.parent();
        var i = r.find(".tp-bullets");
        if (n.navigationType == "thumb") {
            i.find(".thumb").each(function(t) {
                var r = e(this);
                r.css({
                    width: n.thumbWidth * n.bw + "px",
                    height: n.thumbHeight * n.bh + "px"
                })
            });
            var s = i.find(".tp-mask");
            s.width(n.thumbWidth * n.thumbAmount * n.bw);
            s.height(n.thumbHeight * n.bh);
            s.parent().width(n.thumbWidth * n.thumbAmount * n.bw);
            s.parent().height(n.thumbHeight * n.bh)
        }
        var o = r.find(".tp-leftarrow");
        var u = r.find(".tp-rightarrow");
        if (n.navigationType == "thumb" && n.navigationArrows == "nexttobullets") n.navigationArrows = "solo";
        if (n.navigationArrows == "nexttobullets") {
            o.prependTo(i).css({
                "float": "left"
            });
            u.insertBefore(i.find(".tpclear")).css({
                "float": "left"
            })
        }
        var a = 0;
        if (n.forceFullWidth == "on") a = 0 - n.container.parent().offset().left;
        if (n.navigationArrows != "none" && n.navigationArrows != "nexttobullets") {
            o.css({
                position: "absolute"
            });
            u.css({
                position: "absolute"
            });
            if (n.soloArrowLeftValign == "center") o.css({
                top: "50%",
                marginTop: n.soloArrowLeftVOffset - Math.round(o.innerHeight() / 2) + "px"
            });
            if (n.soloArrowLeftValign == "bottom") o.css({
                top: "auto",
                bottom: 0 + n.soloArrowLeftVOffset + "px"
            });
            if (n.soloArrowLeftValign == "top") o.css({
                bottom: "auto",
                top: 0 + n.soloArrowLeftVOffset + "px"
            });
            if (n.soloArrowLeftHalign == "center") o.css({
                left: "50%",
                marginLeft: a + n.soloArrowLeftHOffset - Math.round(o.innerWidth() / 2) + "px"
            });
            if (n.soloArrowLeftHalign == "left") o.css({
                left: 0 + n.soloArrowLeftHOffset + a + "px"
            });
            if (n.soloArrowLeftHalign == "right") o.css({
                right: 0 + n.soloArrowLeftHOffset - a + "px"
            });
            if (n.soloArrowRightValign == "center") u.css({
                top: "50%",
                marginTop: n.soloArrowRightVOffset - Math.round(u.innerHeight() / 2) + "px"
            });
            if (n.soloArrowRightValign == "bottom") u.css({
                top: "auto",
                bottom: 0 + n.soloArrowRightVOffset + "px"
            });
            if (n.soloArrowRightValign == "top") u.css({
                bottom: "auto",
                top: 0 + n.soloArrowRightVOffset + "px"
            });
            if (n.soloArrowRightHalign == "center") u.css({
                left: "50%",
                marginLeft: a + n.soloArrowRightHOffset - Math.round(u.innerWidth() / 2) + "px"
            });
            if (n.soloArrowRightHalign == "left") u.css({
                left: 0 + n.soloArrowRightHOffset + a + "px"
            });
            if (n.soloArrowRightHalign == "right") u.css({
                right: 0 + n.soloArrowRightHOffset - a + "px"
            });
            if (o.position() != null) o.css({
                top: Math.round(parseInt(o.position().top, 0)) + "px"
            });
            if (u.position() != null) u.css({
                top: Math.round(parseInt(u.position().top, 0)) + "px"
            })
        }
        if (n.navigationArrows == "none") {
            o.css({
                visibility: "hidden"
            });
            u.css({
                visibility: "hidden"
            })
        }
        if (n.navigationVAlign == "center") i.css({
            top: "50%",
            marginTop: n.navigationVOffset - Math.round(i.innerHeight() / 2) + "px"
        });
        if (n.navigationVAlign == "bottom") i.css({
            bottom: 0 + n.navigationVOffset + "px"
        });
        if (n.navigationVAlign == "top") i.css({
            top: 0 + n.navigationVOffset + "px"
        });
        if (n.navigationHAlign == "center") i.css({
            left: "50%",
            marginLeft: a + n.navigationHOffset - Math.round(i.innerWidth() / 2) + "px"
        });
        if (n.navigationHAlign == "left") i.css({
            left: 0 + n.navigationHOffset + a + "px"
        });
        if (n.navigationHAlign == "right") i.css({
            right: 0 + n.navigationHOffset - a + "px"
        })
    }

    function g(n, r) {
        r.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").css({
            height: r.container.height()
        });
        r.container.closest(".rev_slider_wrapper").css({
            height: r.container.height()
        });
        r.width = parseInt(r.container.width(), 0);
        r.height = parseInt(r.container.height(), 0);
        r.bw = r.width / r.startwidth;
        r.bh = r.height / r.startheight;
        if (r.bh > r.bw) r.bh = r.bw;
        if (r.bh < r.bw) r.bw = r.bh;
        if (r.bw < r.bh) r.bh = r.bw;
        if (r.bh > 1) {
            r.bw = 1;
            r.bh = 1
        }
        if (r.bw > 1) {
            r.bw = 1;
            r.bh = 1
        }
        r.height = Math.round(r.startheight * (r.width / r.startwidth));
        if (r.height > r.startheight && r.autoHeight != "on") r.height = r.startheight;
        if (r.fullScreen == "on") {
            r.height = r.bw * r.startheight;
            var i = r.container.parent().width();
            var s = e(window).height();
            if (r.fullScreenOffsetContainer != t) {
                try {
                    var o = r.fullScreenOffsetContainer.split(",");
                    e.each(o, function(t, n) {
                        s = s - e(n).outerHeight(true);
                        if (s < r.minFullScreenHeight) s = r.minFullScreenHeight
                    })
                } catch (u) {}
            }
            r.container.parent().height(s);
            r.container.css({
                height: "100%"
            });
            r.height = s
        } else {
            r.container.height(r.height)
        }
        r.slotw = Math.ceil(r.width / r.slots);
        if (r.fullSreen == "on") r.sloth = Math.ceil(e(window).height() / r.slots);
        else r.sloth = Math.ceil(r.height / r.slots);
        if (r.autoHeight == "on") r.sloth = Math.ceil(n.height() / r.slots)
    }

    function y(n, r) {
        n.find(".tp-caption").each(function() {
            e(this).addClass(e(this).data("transition"));
            e(this).addClass("start")
        });
        n.find(">ul:first").css({
            overflow: "hidden",
            width: "100%",
            height: "100%",
            maxHeight: n.parent().css("maxHeight")
        });
        if (r.autoHeight == "on") {
            n.find(">ul:first").css({
                overflow: "hidden",
                width: "100%",
                height: "100%",
                maxHeight: "none"
            });
            n.css({
                maxHeight: "none"
            });
            n.parent().css({
                maxHeight: "none"
            })
        }
        n.find(">ul:first >li").each(function(n) {
            var r = e(this);
            r.css({
                width: "100%",
                height: "100%",
                overflow: "hidden"
            });
            if (r.data("link") != t) {
                var i = r.data("link");
                var s = "_self";
                var o = 60;
                if (r.data("slideindex") == "back") o = 0;
                var u = r.data("linktoslide");
                if (r.data("target") != t) s = r.data("target");
                if (i == "slide") {
                    r.append('<div class="tp-caption sft slidelink" style="width:100%;height:100%;z-index:' + o + ';" data-x="0" data-y="0" data-linktoslide="' + u + '" data-start="0"><a style="width:100%;height:100%;display:block"><span style="width:100%;height:100%;display:block"></span></a></div>')
                } else {
                    u = "no";
                    r.append('<div class="tp-caption sft slidelink" style="width:100%;height:100%;z-index:' + o + ';" data-x="0" data-y="0" data-linktoslide="' + u + '" data-start="0"><a style="width:100%;height:100%;display:block" target="' + s + '" href="' + i + '"><span style="width:100%;height:100%;display:block"></span></a></div>')
                }
            }
        });
        n.parent().css({
            overflow: "visible"
        });
        n.find(">ul:first >li >img").each(function(n) {
            var i = e(this);
            i.addClass("defaultimg");
            if (i.data("lazyload") != t && i.data("lazydone") != 1) {} else {
                g(i, r)
            }
            i.wrap('<div class="slotholder" style="width:100%;height:100%;"' + 'data-duration="' + i.data("duration") + '"' + 'data-zoomstart="' + i.data("zoomstart") + '"' + 'data-zoomend="' + i.data("zoomend") + '"' + 'data-rotationstart="' + i.data("rotationstart") + '"' + 'data-rotationend="' + i.data("rotationend") + '"' + 'data-ease="' + i.data("ease") + '"' + 'data-duration="' + i.data("duration") + '"' + 'data-bgpositionend="' + i.data("bgpositionend") + '"' + 'data-bgposition="' + i.data("bgposition") + '"' + 'data-duration="' + i.data("duration") + '"' + 'data-kenburns="' + i.data("kenburns") + '"' + 'data-easeme="' + i.data("ease") + '"' + 'data-bgfit="' + i.data("bgfit") + '"' + 'data-bgfitend="' + i.data("bgfitend") + '"' + 'data-owidth="' + i.data("owidth") + '"' + 'data-oheight="' + i.data("oheight") + '"' + "></div>");
            if (r.dottedOverlay != "none" && r.dottedOverlay != t) i.closest(".slotholder").append('<div class="tp-dottedoverlay ' + r.dottedOverlay + '"></div>');
            var s = i.attr("src");
            var a = i.data("bgfit");
            var f = i.data("bgrepeat");
            var l = i.data("bgposition");
            if (a == t) a = "cover";
            if (f == t) f = "no-repeat";
            if (l == t) l = "center center";
            var c = i.closest(".slotholder");
            i.replaceWith('<div class="tp-bgimg defaultimg" data-lazyload="' + i.data("lazyload") + '" data-bgfit="' + a + '"data-bgposition="' + l + '" data-bgrepeat="' + f + '" data-lazydone="' + i.data("lazydone") + '" src="' + s + '" data-src="' + s + '" style="background-color:' + i.css("backgroundColor") + ";background-repeat:" + f + ";background-image:url(" + s + ");background-size:" + a + ";background-position:" + l + ';width:100%;height:100%;"></div>');
            if (o(8)) {
                c.find(".tp-bgimg").css({
                    backgroundImage: "none",
                    "background-image": "none"
                });
                c.find(".tp-bgimg").append('<img class="ieeightfallbackimage defaultimg" src="' + s + '" style="width:100%">')
            }
            i.css({
                opacity: 0
            });
            i.data("li-id", n)
        })
    }

    function b(e, n, r, i) {
        var s = e;
        var u = s.find(".defaultimg");
        var a = s.data("zoomstart");
        var f = s.data("rotationstart");
        if (u.data("currotate") != t) f = u.data("currotate");
        if (u.data("curscale") != t) a = u.data("curscale");
        g(u, n);
        var l = u.data("src");
        var c = u.css("background-color");
        var h = n.width;
        var p = n.height;
        if (n.autoHeight == "on") p = n.container.height();
        var d = u.data("fxof");
        if (d == t) d = 0;
        fullyoff = 0;
        var v = 0;
        var m = u.data("bgfit");
        var y = u.data("bgrepeat");
        var b = u.data("bgposition");
        if (m == t) m = "cover";
        if (y == t) y = "no-repeat";
        if (b == t) b = "center center";
        if (s.data("kenburns") == "on") {
            m = a;
            if (m.toString().length < 4) m = D(m, s, n)
        }
        if (o(8)) {
            var w = l;
            l = ""
        }
        if (i == "horizontal") {
            if (!r) var v = 0 - n.slotw;
            for (var S = 0; S < n.slots; S++) {
                s.append('<div class="slot" style="position:absolute;' + "top:" + (0 + fullyoff) + "px;" + "left:" + (d + S * n.slotw) + "px;" + "overflow:hidden;width:" + n.slotw + "px;" + "height:" + p + 'px">' + '<div class="slotslide" style="position:absolute;' + "top:0px;left:" + v + "px;" + "width:" + n.slotw + "px;" + "height:" + p + 'px;overflow:hidden;">' + '<div style="background-color:' + c + ";" + "position:absolute;top:0px;" + "left:" + (0 - S * n.slotw) + "px;" + "width:" + h + "px;height:" + p + "px;" + "background-image:url(" + l + ");" + "background-repeat:" + y + ";" + "background-size:" + m + ";background-position:" + b + ';">' + "</div></div></div>");
                if (a != t && f != t) TweenLite.set(s.find(".slot").last(), {
                    rotationZ: f
                });
                if (o(8)) {
                    s.find(".slot ").last().find(".slotslide").append('<img class="ieeightfallbackimage" src="' + w + '" style="width:100%;height:auto">');
                    E(s, n)
                }
            }
        } else {
            if (!r) var v = 0 - n.sloth;
            for (var S = 0; S < n.slots + 2; S++) {
                s.append('<div class="slot" style="position:absolute;' + "top:" + (fullyoff + S * n.sloth) + "px;" + "left:" + d + "px;" + "overflow:hidden;" + "width:" + h + "px;" + "height:" + n.sloth + 'px">' + '<div class="slotslide" style="position:absolute;' + "top:" + v + "px;" + "left:0px;width:" + h + "px;" + "height:" + n.sloth + "px;" + 'overflow:hidden;">' + '<div style="background-color:' + c + ";" + "position:absolute;" + "top:" + (0 - S * n.sloth) + "px;" + "left:0px;" + "width:" + h + "px;height:" + p + "px;" + "background-image:url(" + l + ");" + "background-repeat:" + y + ";" + "background-size:" + m + ";background-position:" + b + ';">' + "</div></div></div>");
                if (a != t && f != t) TweenLite.set(s.find(".slot").last(), {
                    rotationZ: f
                });
                if (o(8)) {
                    s.find(".slot ").last().find(".slotslide").append('<img class="ieeightfallbackimage" src="' + w + '" style="width:100%;height:auto;">');
                    E(s, n)
                }
            }
        }
    }

    function w(e, n, r) {
        var i = e;
        var s = i.find(".defaultimg");
        var u = i.data("zoomstart");
        var a = i.data("rotationstart");
        if (s.data("currotate") != t) a = s.data("currotate");
        if (s.data("curscale") != t) u = s.data("curscale") * 100;
        g(s, n);
        var f = s.data("src");
        var l = s.css("backgroundColor");
        var c = n.width;
        var h = n.height;
        if (n.autoHeight == "on") h = n.container.height();
        var p = s.data("fxof");
        if (p == t) p = 0;
        fullyoff = 0;
        var d = 0;
        if (o(8)) {
            var v = f;
            f = ""
        }
        var m = 0;
        if (n.sloth > n.slotw) m = n.sloth;
        else m = n.slotw;
        if (!r) {
            var d = 0 - m
        }
        n.slotw = m;
        n.sloth = m;
        var y = 0;
        var b = 0;
        var w = s.data("bgfit");
        var S = s.data("bgrepeat");
        var x = s.data("bgposition");
        if (w == t) w = "cover";
        if (S == t) S = "no-repeat";
        if (x == t) x = "center center";
        if (i.data("kenburns") == "on") {
            w = u;
            if (w.toString().length < 4) w = D(w, i, n)
        }
        for (var T = 0; T < n.slots; T++) {
            b = 0;
            for (var N = 0; N < n.slots; N++) {
                i.append('<div class="slot" ' + 'style="position:absolute;' + "top:" + (fullyoff + b) + "px;" + "left:" + (p + y) + "px;" + "width:" + m + "px;" + "height:" + m + "px;" + 'overflow:hidden;">' + '<div class="slotslide" data-x="' + y + '" data-y="' + b + '" ' + 'style="position:absolute;' + "top:" + 0 + "px;" + "left:" + 0 + "px;" + "width:" + m + "px;" + "height:" + m + "px;" + 'overflow:hidden;">' + '<div style="position:absolute;' + "top:" + (0 - b) + "px;" + "left:" + (0 - y) + "px;" + "width:" + c + "px;" + "height:" + h + "px;" + "background-color:" + l + ";" + "background-image:url(" + f + ");" + "background-repeat:" + S + ";" + "background-size:" + w + ";background-position:" + x + ';">' + "</div></div></div>");
                b = b + m;
                if (o(8)) {
                    i.find(".slot ").last().find(".slotslide").append('<img src="' + v + '">');
                    E(i, n)
                }
                if (u != t && a != t) TweenLite.set(i.find(".slot").last(), {
                    rotationZ: a
                })
            }
            y = y + m
        }
    }

    function E(e, t) {
        if (o(8)) {
            var n = e.find(".ieeightfallbackimage");
            var r = n.width(),
                i = n.height();
            if (t.startwidth / t.startheight < e.data("owidth") / e.data("oheight")) n.css({
                width: "auto",
                height: "100%"
            });
            else n.css({
                width: "100%",
                height: "auto"
            });
            setTimeout(function() {
                var r = n.width(),
                    i = n.height();
                if (e.data("bgposition") == "center center") n.css({
                    position: "absolute",
                    top: t.height / 2 - i / 2 + "px",
                    left: t.width / 2 - r / 2 + "px"
                });
                if (e.data("bgposition") == "center top" || e.data("bgposition") == "top center") n.css({
                    position: "absolute",
                    top: "0px",
                    left: t.width / 2 - r / 2 + "px"
                });
                if (e.data("bgposition") == "center bottom" || e.data("bgposition") == "bottom center") n.css({
                    position: "absolute",
                    bottom: "0px",
                    left: t.width / 2 - r / 2 + "px"
                });
                if (e.data("bgposition") == "right top" || e.data("bgposition") == "top right") n.css({
                    position: "absolute",
                    top: "0px",
                    right: "0px"
                });
                if (e.data("bgposition") == "right bottom" || e.data("bgposition") == "bottom right") n.css({
                    position: "absolute",
                    bottom: "0px",
                    right: "0px"
                });
                if (e.data("bgposition") == "right center" || e.data("bgposition") == "center right") n.css({
                    position: "absolute",
                    top: t.height / 2 - i / 2 + "px",
                    right: "0px"
                });
                if (e.data("bgposition") == "left bottom" || e.data("bgposition") == "bottom left") n.css({
                    position: "absolute",
                    bottom: "0px",
                    left: "0px"
                });
                if (e.data("bgposition") == "left center" || e.data("bgposition") == "center left") n.css({
                    position: "absolute",
                    top: t.height / 2 - i / 2 + "px",
                    left: "0px"
                })
            }, 20)
        }
    }

    function S(n, r, i) {
        if (i == t) i == 80;
        setTimeout(function() {
            n.find(".slotholder .slot").each(function() {
                clearTimeout(e(this).data("tout"));
                e(this).remove()
            });
            r.transition = 0
        }, i)
    }

    function x(n, r) {
        n.find("img, .defaultimg").each(function(n) {
            var i = e(this);
            if (i.data("lazyload") != i.attr("src") && r < 3 && i.data("lazyload") != t && i.data("lazyload") != "undefined") {
                if (i.data("lazyload") != t && i.data("lazyload") != "undefined") {
                    i.attr("src", i.data("lazyload"));
                    var s = new Image;
                    s.onload = function(e) {
                        i.data("lazydone", 1);
                        if (i.hasClass("defaultimg")) T(i, s)
                    };
                    s.error = function() {
                        i.data("lazydone", 1)
                    };
                    s.src = i.attr("src");
                    if (s.complete) {
                        if (i.hasClass("defaultimg")) T(i, s);
                        i.data("lazydone", 1)
                    }
                }
            } else {
                if ((i.data("lazyload") === t || i.data("lazyload") === "undefined") && i.data("lazydone") != 1) {
                    var s = new Image;
                    s.onload = function() {
                        if (i.hasClass("defaultimg")) T(i, s);
                        i.data("lazydone", 1)
                    };
                    s.error = function() {
                        i.data("lazydone", 1)
                    };
                    if (i.attr("src") != t && i.attr("src") != "undefined") {
                        s.src = i.attr("src")
                    } else s.src = i.data("src");
                    if (s.complete) {
                        if (i.hasClass("defaultimg")) {
                            T(i, s)
                        }
                        i.data("lazydone", 1)
                    }
                }
            }
        })
    }

    function T(e, t) {
        var n = e.closest("li");
        var r = t.width;
        var i = t.height;
        n.data("owidth", r);
        n.data("oheight", i);
        n.find(".slotholder").data("owidth", r);
        n.find(".slotholder").data("oheight", i);
        n.data("loadeddone", 1)
    }

    function C(e, n) {
        try {
            var r = e.find(">ul:first-child >li:eq(" + n.act + ")")
        } catch (i) {
            var r = e.find(">ul:first-child >li:eq(1)")
        }
        n.lastslide = n.act;
        var s = e.find(">ul:first-child >li:eq(" + n.next + ")");
        var u = s.find(".defaultimg");
        n.bannertimeronpause = true;
        e.trigger("stoptimer");
        n.cd = 0;
        if (u.data("lazyload") != t && u.data("lazyload") != "undefined" && u.data("lazydone") != 1) {
            if (!o(8)) u.css({
                backgroundImage: 'url("' + s.find(".defaultimg").data("lazyload") + '")'
            });
            else {
                u.attr("src", s.find(".defaultimg").data("lazyload"))
            }
            u.data("src", s.find(".defaultimg").data("lazyload"));
            u.data("lazydone", 1);
            u.data("orgw", 0);
            s.data("loadeddone", 1);
            TweenLite.set(e.find(".tp-loader"), {
                display: "block",
                opacity: 0
            });
            TweenLite.to(e.find(".tp-loader"), .3, {
                autoAlpha: 1
            });
            N(s, function() {
                k(n, u, e)
            }, n)
        } else {
            if (s.data("loadeddone") === t) {
                s.data("loadeddone", 1);
                N(s, function() {
                    k(n, u, e)
                }, n)
            } else k(n, u, e)
        }
    }

    function k(e, t, n) {
        e.bannertimeronpause = false;
        e.cd = 0;
        n.trigger("nulltimer");
        TweenLite.to(n.find(".tp-loader"), .3, {
            autoAlpha: 0
        });
        g(t, e);
        m(n, e);
        g(t, e);
        L(n, e)
    }

    function L(n, r) {
        function x() {
            e.each(v, function(e, t) {
                if (t[0] == p || t[8] == p) {
                    l = t[1];
                    d = t[2];
                    y = E
                }
                E = E + 1
            })
        }
        n.trigger("revolution.slide.onbeforeswap");
        r.transition = 1;
        r.videoplaying = false;
        try {
            var i = n.find(">ul:first-child >li:eq(" + r.act + ")")
        } catch (s) {
            var i = n.find(">ul:first-child >li:eq(1)")
        }
        r.lastslide = r.act;
        var u = n.find(">ul:first-child >li:eq(" + r.next + ")");
        var a = i.find(".slotholder");
        var f = u.find(".slotholder");
        i.css({
            visibility: "visible"
        });
        u.css({
            visibility: "visible"
        });
        if (f.data("kenburns") == "on") M(n, r);
        if (r.ie) {
            if (p == "boxfade") p = "boxslide";
            if (p == "slotfade-vertical") p = "slotzoom-vertical";
            if (p == "slotfade-horizontal") p = "slotzoom-horizontal"
        }
        if (u.data("delay") != t) {
            r.cd = 0;
            r.delay = u.data("delay")
        } else {
            r.delay = r.origcd
        }
        n.trigger("restarttimer");
        i.css({
            left: "0px",
            top: "0px"
        });
        u.css({
            left: "0px",
            top: "0px"
        });
        if (u.data("differentissplayed") == "prepared") {
            u.data("differentissplayed", "done");
            u.data("transition", u.data("savedtransition"));
            u.data("slotamount", u.data("savedslotamount"));
            u.data("masterspeed", u.data("savedmasterspeed"))
        }
        if (u.data("fstransition") != t && u.data("differentissplayed") != "done") {
            u.data("savedtransition", u.data("transition"));
            u.data("savedslotamount", u.data("slotamount"));
            u.data("savedmasterspeed", u.data("masterspeed"));
            u.data("transition", u.data("fstransition"));
            u.data("slotamount", u.data("fsslotamount"));
            u.data("masterspeed", u.data("fsmasterspeed"));
            u.data("differentissplayed", "prepared")
        }
        var l = 0;
        var c = u.data("transition").split(",");
        var h = u.data("nexttransid");
        if (h == t) {
            h = 0;
            u.data("nexttransid", h)
        } else {
            h = h + 1;
            if (h == c.length) h = 0;
            u.data("nexttransid", h)
        }
        var p = c[h];
        var d = 0;
        if (p == "slidehorizontal") {
            p = "slideleft";
            if (r.leftarrowpressed == 1) p = "slideright"
        }
        if (p == "slidevertical") {
            p = "slideup";
            if (r.leftarrowpressed == 1) p = "slidedown"
        }
        var v = [
            ["boxslide", 0, 1, 10, 0, "box", false, null, 0],
            ["boxfade", 1, 0, 10, 0, "box", false, null, 1],
            ["slotslide-horizontal", 2, 0, 0, 200, "horizontal", true, false, 2],
            ["slotslide-vertical", 3, 0, 0, 200, "vertical", true, false, 3],
            ["curtain-1", 4, 3, 0, 0, "horizontal", true, true, 4],
            ["curtain-2", 5, 3, 0, 0, "horizontal", true, true, 5],
            ["curtain-3", 6, 3, 25, 0, "horizontal", true, true, 6],
            ["slotzoom-horizontal", 7, 0, 0, 400, "horizontal", true, true, 7],
            ["slotzoom-vertical", 8, 0, 0, 0, "vertical", true, true, 8],
            ["slotfade-horizontal", 9, 0, 0, 500, "horizontal", true, null, 9],
            ["slotfade-vertical", 10, 0, 0, 500, "vertical", true, null, 10],
            ["fade", 11, 0, 1, 300, "horizontal", true, null, 11],
            ["slideleft", 12, 0, 1, 0, "horizontal", true, true, 12],
            ["slideup", 13, 0, 1, 0, "horizontal", true, true, 13],
            ["slidedown", 14, 0, 1, 0, "horizontal", true, true, 14],
            ["slideright", 15, 0, 1, 0, "horizontal", true, true, 15],
            ["papercut", 16, 0, 0, 600, "", null, null, 16],
            ["3dcurtain-horizontal", 17, 0, 20, 100, "vertical", false, true, 17],
            ["3dcurtain-vertical", 18, 0, 10, 100, "horizontal", false, true, 18],
            ["cubic", 19, 0, 20, 600, "horizontal", false, true, 19],
            ["cube", 19, 0, 20, 600, "horizontal", false, true, 20],
            ["flyin", 20, 0, 4, 600, "vertical", false, true, 21],
            ["turnoff", 21, 0, 1, 1600, "horizontal", false, true, 22],
            ["incube", 22, 0, 20, 600, "horizontal", false, true, 23],
            ["cubic-horizontal", 23, 0, 20, 500, "vertical", false, true, 24],
            ["cube-horizontal", 23, 0, 20, 500, "vertical", false, true, 25],
            ["incube-horizontal", 24, 0, 20, 500, "vertical", false, true, 26],
            ["turnoff-vertical", 25, 0, 1, 1600, "horizontal", false, true, 27],
            ["fadefromright", 12, 1, 1, 0, "horizontal", true, true, 28],
            ["fadefromleft", 15, 1, 1, 0, "horizontal", true, true, 29],
            ["fadefromtop", 14, 1, 1, 0, "horizontal", true, true, 30],
            ["fadefrombottom", 13, 1, 1, 0, "horizontal", true, true, 31],
            ["fadetoleftfadefromright", 12, 2, 1, 0, "horizontal", true, true, 32],
            ["fadetorightfadetoleft", 15, 2, 1, 0, "horizontal", true, true, 33],
            ["fadetobottomfadefromtop", 14, 2, 1, 0, "horizontal", true, true, 34],
            ["fadetotopfadefrombottom", 13, 2, 1, 0, "horizontal", true, true, 35],
            ["parallaxtoright", 12, 3, 1, 0, "horizontal", true, true, 36],
            ["parallaxtoleft", 15, 3, 1, 0, "horizontal", true, true, 37],
            ["parallaxtotop", 14, 3, 1, 0, "horizontal", true, true, 38],
            ["parallaxtobottom", 13, 3, 1, 0, "horizontal", true, true, 39],
            ["scaledownfromright", 12, 4, 1, 0, "horizontal", true, true, 40],
            ["scaledownfromleft", 15, 4, 1, 0, "horizontal", true, true, 41],
            ["scaledownfromtop", 14, 4, 1, 0, "horizontal", true, true, 42],
            ["scaledownfrombottom", 13, 4, 1, 0, "horizontal", true, true, 43],
            ["zoomout", 13, 5, 1, 0, "horizontal", true, true, 44],
            ["zoomin", 13, 6, 1, 0, "horizontal", true, true, 45],
            ["notransition", 26, 0, 1, 0, "horizontal", true, null, 46]
        ];
        var m = [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45];
        var g = [16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27];
        var l = 0;
        var d = 1;
        var y = 0;
        var E = 0;
        var S = new Array;
        if (p == "random") {
            p = Math.round(Math.random() * v.length - 1);
            if (p > v.length - 1) p = v.length - 1
        }
        if (p == "random-static") {
            p = Math.round(Math.random() * m.length - 1);
            if (p > m.length - 1) p = m.length - 1;
            p = m[p]
        }
        if (p == "random-premium") {
            p = Math.round(Math.random() * g.length - 1);
            if (p > g.length - 1) p = g.length - 1;
            p = g[p]
        }
        if (r.isJoomla == true && p == 16) {
            p = Math.round(Math.random() * g.length - 2) + 1;
            if (p > g.length - 1) p = g.length - 1;
            p = g[p]
        }
        x();
        if (o(8) && l > 15 && l < 28) {
            p = Math.round(Math.random() * m.length - 1);
            if (p > m.length - 1) p = m.length - 1;
            p = m[p];
            E = 0;
            x()
        }
        var T = -1;
        if (r.leftarrowpressed == 1 || r.act > r.next) T = 1;
        r.leftarrowpressed = 0;
        if (l > 26) l = 26;
        if (l < 0) l = 0;
        var N = 300;
        if (u.data("masterspeed") != t && u.data("masterspeed") > 99 && u.data("masterspeed") < 4001) N = u.data("masterspeed");
        S = v[y];
        n.parent().find(".bullet").each(function() {
            var t = e(this);
            t.removeClass("selected");
            if (r.navigationArrows == "withbullet" || r.navigationArrows == "nexttobullets") {
                if (t.index() - 1 == r.next) t.addClass("selected")
            } else {
                if (t.index() == r.next) t.addClass("selected")
            }
        });
        n.find(">li").each(function() {
            var t = e(this);
            if (t.index != r.act && t.index != r.next) t.css({
                "z-index": 16
            })
        });
        i.css({
            "z-index": 18
        });
        u.css({
            "z-index": 20
        });
        u.css({
            opacity: 0
        });
        if (i.index() != u.index() && r.firststart != 1) {
            Q(i, r)
        }
        V(u, r);
        if (u.data("slotamount") == t || u.data("slotamount") < 1) {
            r.slots = Math.round(Math.random() * 12 + 4);
            if (p == "boxslide") r.slots = Math.round(Math.random() * 6 + 3);
            else if (p == "flyin") r.slots = Math.round(Math.random() * 4 + 1)
        } else {
            r.slots = u.data("slotamount")
        }
        if (u.data("rotate") == t) r.rotate = 0;
        else if (u.data("rotate") == 999) r.rotate = Math.round(Math.random() * 360);
        else r.rotate = u.data("rotate");
        if (!e.support.transition || r.ie || r.ie9) r.rotate = 0;
        if (r.firststart == 1) {
            i.css({
                opacity: 0
            });
            r.firststart = 0
        }
        N = N + S[4];
        if ((l == 4 || l == 5 || l == 6) && r.slots < 3) r.slots = 3;
        if (S[3] != 0) r.slots = Math.min(r.slots, S[3]);
        if (l == 9) r.slots = r.width / 20;
        if (l == 10) r.slots = r.height / 20;
        if (S[5] == "box") {
            if (S[7] != null) w(a, r, S[7]);
            if (S[6] != null) w(f, r, S[6])
        } else if (S[5] == "vertical" || S[5] == "horizontal") {
            if (S[7] != null) b(a, r, S[7], S[5]);
            if (S[6] != null) b(f, r, S[6], S[5])
        }
        if (l < 12 || l > 16) u.css({
            opacity: 1
        });
        if (l == 0) {
            f.find(".defaultimg").css({
                opacity: 0
            });
            var C = Math.ceil(r.height / r.sloth);
            var k = 0;
            f.find(".slotslide").each(function(t) {
                var s = e(this);
                k = k + 1;
                if (k == C) k = 0;
                TweenLite.fromTo(s, N / 600, {
                    opacity: 0,
                    top: 0 - r.sloth,
                    left: 0 - r.slotw,
                    rotation: r.rotate
                }, {
                    opacity: 1,
                    transformPerspective: 600,
                    top: 0,
                    left: 0,
                    scale: 1,
                    rotation: 0,
                    delay: (t * 15 + k * 30) / 1500,
                    ease: Power2.easeOut,
                    onComplete: function() {
                        if (t == r.slots * r.slots - 1) {
                            F(n, r, f, a, u, i)
                        }
                    }
                })
            })
        }
        if (l == 1) {
            f.find(".defaultimg").css({
                opacity: 0
            });
            var L;
            f.find(".slotslide").each(function(t) {
                var n = e(this);
                rand = Math.random() * N + 300;
                rand2 = Math.random() * 500 + 200;
                if (rand + rand2 > L) L = rand2 + rand2;
                TweenLite.fromTo(n, rand / 1e3, {
                    opacity: 0,
                    transformPerspective: 600,
                    rotation: r.rotate
                }, {
                    opacity: 1,
                    ease: Power2.easeInOut,
                    rotation: 0,
                    delay: rand2 / 1e3
                })
            });
            setTimeout(function() {
                F(n, r, f, a, u, i)
            }, N + 300)
        }
        if (l == 2) {
            f.find(".defaultimg").css({
                opacity: 0
            });
            a.find(".slotslide").each(function() {
                var t = e(this);
                TweenLite.to(t, N / 1e3, {
                    left: r.slotw,
                    rotation: 0 - r.rotate,
                    onComplete: function() {
                        F(n, r, f, a, u, i)
                    }
                })
            });
            f.find(".slotslide").each(function() {
                var t = e(this);
                TweenLite.fromTo(t, N / 1e3, {
                    left: 0 - r.slotw,
                    rotation: r.rotate,
                    transformPerspective: 600
                }, {
                    left: 0,
                    rotation: 0,
                    ease: Power2.easeOut,
                    onComplete: function() {
                        F(n, r, f, a, u, i)
                    }
                })
            })
        }
        if (l == 3) {
            f.find(".defaultimg").css({
                opacity: 0
            });
            a.find(".slotslide").each(function() {
                var t = e(this);
                TweenLite.to(t, N / 1e3, {
                    top: r.sloth,
                    rotation: r.rotate,
                    transformPerspective: 600,
                    onComplete: function() {
                        F(n, r, f, a, u, i)
                    }
                })
            });
            f.find(".slotslide").each(function() {
                var t = e(this);
                TweenLite.fromTo(t, N / 1e3, {
                    top: 0 - r.sloth,
                    rotation: r.rotate,
                    transformPerspective: 600
                }, {
                    top: 0,
                    rotation: 0,
                    ease: Power2.easeOut,
                    onComplete: function() {
                        F(n, r, f, a, u, i)
                    }
                })
            })
        }
        if (l == 4 || l == 5) {
            f.find(".defaultimg").css({
                opacity: 0
            });
            setTimeout(function() {
                a.find(".defaultimg").css({
                    opacity: 0
                })
            }, 100);
            var A = N / 1e3;
            var O = A;
            a.find(".slotslide").each(function(t) {
                var n = e(this);
                var i = t * A / r.slots;
                if (l == 5) i = (r.slots - t - 1) * A / r.slots / 1.5;
                TweenLite.to(n, A * 3, {
                    transformPerspective: 600,
                    top: 0 + r.height,
                    opacity: .5,
                    rotation: r.rotate,
                    ease: Power2.easeInOut,
                    delay: i
                })
            });
            f.find(".slotslide").each(function(t) {
                var s = e(this);
                var o = t * A / r.slots;
                if (l == 5) o = (r.slots - t - 1) * A / r.slots / 1.5;
                TweenLite.fromTo(s, A * 3, {
                    top: 0 - r.height,
                    opacity: .5,
                    rotation: r.rotate,
                    transformPerspective: 600
                }, {
                    top: 0,
                    opacity: 1,
                    rotation: 0,
                    ease: Power2.easeInOut,
                    delay: o,
                    onComplete: function() {
                        if (t == r.slots - 1) {
                            F(n, r, f, a, u, i)
                        }
                    }
                })
            })
        }
        if (l == 6) {
            if (r.slots < 2) r.slots = 2;
            f.find(".defaultimg").css({
                opacity: 0
            });
            setTimeout(function() {
                a.find(".defaultimg").css({
                    opacity: 0
                })
            }, 100);
            a.find(".slotslide").each(function(t) {
                var n = e(this);
                if (t < r.slots / 2) var i = (t + 2) * 60;
                else var i = (2 + r.slots - t) * 60;
                TweenLite.to(n, (N + i) / 1e3, {
                    top: 0 + r.height,
                    opacity: 1,
                    rotation: r.rotate,
                    transformPerspective: 600,
                    ease: Power2.easeInOut
                })
            });
            f.find(".slotslide").each(function(t) {
                var s = e(this);
                if (t < r.slots / 2) var o = (t + 2) * 60;
                else var o = (2 + r.slots - t) * 60;
                TweenLite.fromTo(s, (N + o) / 1e3, {
                    top: 0 - r.height,
                    opacity: 1,
                    rotation: r.rotate,
                    transformPerspective: 600
                }, {
                    top: 0,
                    opacity: 1,
                    rotation: 0,
                    ease: Power2.easeInOut,
                    onComplete: function() {
                        if (t == Math.round(r.slots / 2)) {
                            F(n, r, f, a, u, i)
                        }
                    }
                })
            })
        }
        if (l == 7) {
            N = N * 2;
            f.find(".defaultimg").css({
                opacity: 0
            });
            setTimeout(function() {
                a.find(".defaultimg").css({
                    opacity: 0
                })
            }, 100);
            a.find(".slotslide").each(function() {
                var t = e(this).find("div");
                TweenLite.to(t, N / 1e3, {
                    left: 0 - r.slotw / 2 + "px",
                    top: 0 - r.height / 2 + "px",
                    width: r.slotw * 2 + "px",
                    height: r.height * 2 + "px",
                    opacity: 0,
                    rotation: r.rotate,
                    transformPerspective: 600,
                    ease: Power2.easeOut
                })
            });
            f.find(".slotslide").each(function(t) {
                var s = e(this).find("div");
                TweenLite.fromTo(s, N / 1e3, {
                    left: 0,
                    top: 0,
                    opacity: 0,
                    transformPerspective: 600
                }, {
                    left: 0 - t * r.slotw + "px",
                    ease: Power2.easeOut,
                    top: 0 + "px",
                    width: r.width,
                    height: r.height,
                    opacity: 1,
                    rotation: 0,
                    delay: .1,
                    onComplete: function() {
                        F(n, r, f, a, u, i)
                    }
                })
            })
        }
        if (l == 8) {
            N = N * 3;
            f.find(".defaultimg").css({
                opacity: 0
            });
            a.find(".slotslide").each(function() {
                var t = e(this).find("div");
                TweenLite.to(t, N / 1e3, {
                    left: 0 - r.width / 2 + "px",
                    top: 0 - r.sloth / 2 + "px",
                    width: r.width * 2 + "px",
                    height: r.sloth * 2 + "px",
                    transformPerspective: 600,
                    opacity: 0,
                    rotation: r.rotate
                })
            });
            f.find(".slotslide").each(function(t) {
                var s = e(this).find("div");
                TweenLite.fromTo(s, N / 1e3, {
                    left: 0,
                    top: 0,
                    opacity: 0,
                    transformPerspective: 600
                }, {
                    left: 0 + "px",
                    top: 0 - t * r.sloth + "px",
                    width: f.find(".defaultimg").data("neww") + "px",
                    height: f.find(".defaultimg").data("newh") + "px",
                    opacity: 1,
                    rotation: 0,
                    onComplete: function() {
                        F(n, r, f, a, u, i)
                    }
                })
            })
        }
        if (l == 9 || l == 10) {
            f.find(".defaultimg").css({
                opacity: 0
            });
            var _ = 0;
            f.find(".slotslide").each(function(t) {
                var n = e(this);
                _++;
                TweenLite.fromTo(n, N / 1e3, {
                    opacity: 0,
                    transformPerspective: 600,
                    left: 0,
                    top: 0
                }, {
                    opacity: 1,
                    ease: Power2.easeInOut,
                    delay: t * 4 / 1e3
                })
            });
            setTimeout(function() {
                F(n, r, f, a, u, i)
            }, N + _ * 4)
        }
        if (l == 11 || l == 26) {
            f.find(".defaultimg").css({
                opacity: 0,
                position: "relative"
            });
            var _ = 0;
            if (l == 26) N = 0;
            f.find(".slotslide").each(function(t) {
                var n = e(this);
                TweenLite.fromTo(n, N / 1e3, {
                    opacity: 0
                }, {
                    opacity: 1,
                    ease: Power2.easeInOut
                })
            });
            setTimeout(function() {
                F(n, r, f, a, u, i)
            }, N + 15)
        }
        if (l == 12 || l == 13 || l == 14 || l == 15) {
            setTimeout(function() {
                a.find(".defaultimg").css({
                    opacity: 0
                })
            }, 100);
            f.find(".defaultimg").css({
                opacity: 0
            });
            var D = r.width;
            var P = r.height;
            var H = f.find(".slotslide");
            if (r.fullWidth == "on" || r.fullSreen == "on") {
                D = H.width();
                P = H.height()
            }
            var B = 0;
            var j = 0;
            if (l == 12) B = D;
            else if (l == 15) B = 0 - D;
            else if (l == 13) j = P;
            else if (l == 14) j = 0 - P;
            var I = 1;
            var q = 1;
            var R = 1;
            var U = Power2.easeInOut;
            var z = Power2.easeInOut;
            var W = N / 1e3;
            var X = W;
            if (d == 1) I = 0;
            if (d == 2) I = 0;
            if (d == 3) {
                U = Power2.easeInOut;
                z = Power1.easeInOut;
                i.css({
                    position: "absolute",
                    "z-index": 20
                });
                u.css({
                    position: "absolute",
                    "z-index": 15
                });
                W = N / 1200
            }
            if (d == 4 || d == 5) q = .6;
            if (d == 6) q = 1.4;
            if (d == 5 || d == 6) {
                R = 1.4;
                I = 0;
                D = 0;
                P = 0;
                B = 0;
                j = 0
            }
            if (d == 6) R = .6;
            TweenLite.fromTo(H, W, {
                left: B,
                top: j,
                scale: R,
                opacity: I,
                rotation: r.rotate
            }, {
                opacity: 1,
                rotation: 0,
                left: 0,
                top: 0,
                scale: 1,
                ease: z,
                onComplete: function() {
                    F(n, r, f, a, u, i);
                    i.css({
                        position: "absolute",
                        "z-index": 18
                    });
                    u.css({
                        position: "absolute",
                        "z-index": 20
                    })
                }
            });
            var $ = a.find(".slotslide");
            if (d == 4 || d == 5) {
                D = 0;
                P = 0
            }
            if (d != 1) {
                if (l == 12) TweenLite.to($, X, {
                    left: 0 - D + "px",
                    scale: q,
                    opacity: I,
                    rotation: r.rotate,
                    ease: U
                });
                else if (l == 15) TweenLite.to($, X, {
                    left: D + "px",
                    scale: q,
                    opacity: I,
                    rotation: r.rotate,
                    ease: U
                });
                else if (l == 13) TweenLite.to($, X, {
                    top: 0 - P + "px",
                    scale: q,
                    opacity: I,
                    rotation: r.rotate,
                    ease: U
                });
                else if (l == 14) TweenLite.to($, X, {
                    top: P + "px",
                    scale: q,
                    opacity: I,
                    rotation: r.rotate,
                    ease: U
                })
            }
            u.css({
                opacity: 1
            })
        }
        if (l == 16) {
            i.css({
                position: "absolute",
                "z-index": 20
            });
            u.css({
                position: "absolute",
                "z-index": 15
            });
            i.wrapInner('<div class="tp-half-one" style="position:relative; width:100%;height:100%"></div>');
            i.find(".tp-half-one").clone(true).appendTo(i).addClass("tp-half-two");
            i.find(".tp-half-two").removeClass("tp-half-one");
            var D = r.width;
            var P = r.height;
            if (r.autoHeight == "on") P = n.height();
            i.find(".tp-half-one .defaultimg").wrap('<div class="tp-papercut" style="width:' + D + "px;height:" + P + 'px;"></div>');
            i.find(".tp-half-two .defaultimg").wrap('<div class="tp-papercut" style="width:' + D + "px;height:" + P + 'px;"></div>');
            i.find(".tp-half-two .defaultimg").css({
                position: "absolute",
                top: "-50%"
            });
            i.find(".tp-half-two .tp-caption").wrapAll('<div style="position:absolute;top:-50%;left:0px"></div>');
            TweenLite.set(i.find(".tp-half-two"), {
                width: D,
                height: P,
                overflow: "hidden",
                zIndex: 15,
                position: "absolute",
                top: P / 2,
                left: "0px",
                transformPerspective: 600,
                transformOrigin: "center bottom"
            });
            TweenLite.set(i.find(".tp-half-one"), {
                width: D,
                height: P / 2,
                overflow: "visible",
                zIndex: 10,
                position: "absolute",
                top: "0px",
                left: "0px",
                transformPerspective: 600,
                transformOrigin: "center top"
            });
            var J = i.find(".defaultimg");
            var K = Math.round(Math.random() * 20 - 10);
            var G = Math.round(Math.random() * 20 - 10);
            var Y = Math.round(Math.random() * 20 - 10);
            var Z = Math.random() * .4 - .2;
            var et = Math.random() * .4 - .2;
            var tt = Math.random() * 1 + 1;
            var nt = Math.random() * 1 + 1;
            TweenLite.fromTo(i.find(".tp-half-one"), N / 1e3, {
                width: D,
                height: P / 2,
                position: "absolute",
                top: "0px",
                left: "0px",
                transformPerspective: 600,
                transformOrigin: "center top"
            }, {
                scale: tt,
                rotation: K,
                y: 0 - P - P / 4,
                ease: Power2.easeInOut
            });
            setTimeout(function() {
                TweenLite.set(i.find(".tp-half-one"), {
                    overflow: "hidden"
                })
            }, 50);
            TweenLite.fromTo(i.find(".tp-half-one"), N / 2e3, {
                opacity: 1,
                transformPerspective: 600,
                transformOrigin: "center center"
            }, {
                opacity: 0,
                delay: N / 2e3
            });
            TweenLite.fromTo(i.find(".tp-half-two"), N / 1e3, {
                width: D,
                height: P,
                overflow: "hidden",
                position: "absolute",
                top: P / 2,
                left: "0px",
                transformPerspective: 600,
                transformOrigin: "center bottom"
            }, {
                scale: nt,
                rotation: G,
                y: P + P / 4,
                ease: Power2.easeInOut
            });
            TweenLite.fromTo(i.find(".tp-half-two"), N / 2e3, {
                opacity: 1,
                transformPerspective: 600,
                transformOrigin: "center center"
            }, {
                opacity: 0,
                delay: N / 2e3
            });
            if (i.html() != null) TweenLite.fromTo(u, (N - 200) / 1e3, {
                opacity: 0,
                scale: .8,
                x: r.width * Z,
                y: P * et,
                rotation: Y,
                transformPerspective: 600,
                transformOrigin: "center center"
            }, {
                rotation: 0,
                scale: 1,
                x: 0,
                y: 0,
                opacity: 1,
                ease: Power2.easeInOut
            });
            f.find(".defaultimg").css({
                opacity: 1
            });
            setTimeout(function() {
                i.css({
                    position: "absolute",
                    "z-index": 18
                });
                u.css({
                    position: "absolute",
                    "z-index": 20
                });
                f.find(".defaultimg").css({
                    opacity: 1
                });
                a.find(".defaultimg").css({
                    opacity: 0
                });
                if (i.find(".tp-half-one").length > 0) {
                    i.find(".tp-half-one .defaultimg").unwrap();
                    i.find(".tp-half-one .slotholder").unwrap()
                }
                i.find(".tp-half-two").remove();
                r.transition = 0;
                r.act = r.next
            }, N);
            u.css({
                opacity: 1
            })
        }
        if (l == 17) {
            f.find(".defaultimg").css({
                opacity: 0
            });
            f.find(".slotslide").each(function(t) {
                var s = e(this);
                TweenLite.fromTo(s, N / 800, {
                    opacity: 0,
                    rotationY: 0,
                    scale: .9,
                    rotationX: -110,
                    transformPerspective: 600,
                    transformOrigin: "center center"
                }, {
                    opacity: 1,
                    top: 0,
                    left: 0,
                    scale: 1,
                    rotation: 0,
                    rotationX: 0,
                    rotationY: 0,
                    ease: Power3.easeOut,
                    delay: t * .06,
                    onComplete: function() {
                        if (t == r.slots - 1) F(n, r, f, a, u, i)
                    }
                })
            })
        }
        if (l == 18) {
            f.find(".defaultimg").css({
                opacity: 0
            });
            f.find(".slotslide").each(function(t) {
                var s = e(this);
                TweenLite.fromTo(s, N / 500, {
                    opacity: 0,
                    rotationY: 310,
                    scale: .9,
                    rotationX: 10,
                    transformPerspective: 600,
                    transformOrigin: "center center"
                }, {
                    opacity: 1,
                    top: 0,
                    left: 0,
                    scale: 1,
                    rotation: 0,
                    rotationX: 0,
                    rotationY: 0,
                    ease: Power3.easeOut,
                    delay: t * .06,
                    onComplete: function() {
                        if (t == r.slots - 1) F(n, r, f, a, u, i)
                    }
                })
            })
        }
        if (l == 19 || l == 22) {
            f.find(".defaultimg").css({
                opacity: 0
            });
            setTimeout(function() {
                a.find(".defaultimg").css({
                    opacity: 0
                })
            }, 100);
            var rt = u.css("z-index");
            var it = i.css("z-index");
            var st = 90;
            var I = 1;
            if (T == 1) st = -90;
            if (l == 19) {
                var ot = "center center -" + r.height / 2;
                I = 0
            } else {
                var ot = "center center " + r.height / 2
            }
            TweenLite.fromTo(f, N / 2e3, {
                transformPerspective: 600,
                z: 0,
                x: 0,
                rotationY: 0
            }, {
                rotationY: 1,
                ease: Power1.easeInOut,
                z: -40
            });
            TweenLite.fromTo(f, N / 2e3, {
                transformPerspective: 600,
                z: -40,
                rotationY: 1
            }, {
                rotationY: 0,
                z: 0,
                ease: Power1.easeInOut,
                x: 0,
                delay: 3 * (N / 4e3)
            });
            TweenLite.fromTo(a, N / 2e3, {
                transformPerspective: 600,
                z: 0,
                x: 0,
                rotationY: 0
            }, {
                rotationY: 1,
                x: 0,
                ease: Power1.easeInOut,
                z: -40
            });
            TweenLite.fromTo(a, N / 2e3, {
                transformPerspective: 600,
                z: -40,
                x: 0,
                rotationY: 1
            }, {
                rotationY: 0,
                z: 0,
                x: 0,
                ease: Power1.easeInOut,
                delay: 3 * (N / 4e3)
            });
            f.find(".slotslide").each(function(t) {
                var s = e(this);
                TweenLite.fromTo(s, N / 1e3, {
                    left: 0,
                    rotationY: r.rotate,
                    opacity: I,
                    top: 0,
                    scale: .8,
                    transformPerspective: 600,
                    transformOrigin: ot,
                    rotationX: st
                }, {
                    left: 0,
                    rotationY: 0,
                    opacity: 1,
                    top: 0,
                    z: 0,
                    scale: 1,
                    rotationX: 0,
                    delay: t * 50 / 1e3,
                    ease: Power2.easeInOut,
                    onComplete: function() {
                        if (t == r.slots - 1) F(n, r, f, a, u, i)
                    }
                });
                TweenLite.to(s, .1, {
                    opacity: 1,
                    delay: t * 50 / 1e3 + N / 3e3
                })
            });
            a.find(".slotslide").each(function(t) {
                var s = e(this);
                var o = -90;
                if (T == 1) o = 90;
                TweenLite.fromTo(s, N / 1e3, {
                    opacity: 1,
                    rotationY: 0,
                    top: 0,
                    z: 0,
                    scale: 1,
                    transformPerspective: 600,
                    transformOrigin: ot,
                    rotationX: 0
                }, {
                    opacity: 1,
                    rotationY: r.rotate,
                    top: 0,
                    scale: .8,
                    rotationX: o,
                    delay: t * 50 / 1e3,
                    ease: Power2.easeInOut,
                    onComplete: function() {
                        if (t == r.slots - 1) F(n, r, f, a, u, i)
                    }
                });
                TweenLite.to(s, .1, {
                    opacity: 0,
                    delay: t * 50 / 1e3 + (N / 1e3 - N / 1e4)
                })
            })
        }
        if (l == 20) {
            f.find(".defaultimg").css({
                opacity: 0
            });
            setTimeout(function() {
                a.find(".defaultimg").css({
                    opacity: 0
                })
            }, 100);
            var rt = u.css("z-index");
            var it = i.css("z-index");
            if (T == 1) {
                var ut = -r.width;
                var st = 70;
                var ot = "left center -" + r.height / 2
            } else {
                var ut = r.width;
                var st = -70;
                var ot = "right center -" + r.height / 2
            }
            f.find(".slotslide").each(function(t) {
                var s = e(this);
                TweenLite.fromTo(s, N / 1500, {
                    left: ut,
                    rotationX: 40,
                    z: -600,
                    opacity: I,
                    top: 0,
                    transformPerspective: 600,
                    transformOrigin: ot,
                    rotationY: st
                }, {
                    left: 0,
                    delay: t * 50 / 1e3,
                    ease: Power2.easeInOut
                });
                TweenLite.fromTo(s, N / 1e3, {
                    rotationX: 40,
                    z: -600,
                    opacity: I,
                    top: 0,
                    scale: 1,
                    transformPerspective: 600,
                    transformOrigin: ot,
                    rotationY: st
                }, {
                    rotationX: 0,
                    opacity: 1,
                    top: 0,
                    z: 0,
                    scale: 1,
                    rotationY: 0,
                    delay: t * 50 / 1e3,
                    ease: Power2.easeInOut,
                    onComplete: function() {
                        if (t == r.slots - 1) F(n, r, f, a, u, i)
                    }
                });
                TweenLite.to(s, .1, {
                    opacity: 1,
                    delay: t * 50 / 1e3 + N / 2e3
                })
            });
            a.find(".slotslide").each(function(t) {
                var s = e(this);
                if (T != 1) {
                    var o = -r.width;
                    var l = 70;
                    var c = "left center -" + r.height / 2
                } else {
                    var o = r.width;
                    var l = -70;
                    var c = "right center -" + r.height / 2
                }
                TweenLite.fromTo(s, N / 1e3, {
                    opacity: 1,
                    rotationX: 0,
                    top: 0,
                    z: 0,
                    scale: 1,
                    left: 0,
                    transformPerspective: 600,
                    transformOrigin: c,
                    rotationY: 0
                }, {
                    opacity: 1,
                    rotationX: 40,
                    top: 0,
                    z: -600,
                    left: o,
                    scale: .8,
                    rotationY: l,
                    delay: t * 50 / 1e3,
                    ease: Power2.easeInOut,
                    onComplete: function() {
                        if (t == r.slots - 1) F(n, r, f, a, u, i)
                    }
                });
                TweenLite.to(s, .1, {
                    opacity: 0,
                    delay: t * 50 / 1e3 + (N / 1e3 - N / 1e4)
                })
            })
        }
        if (l == 21 || l == 25) {
            f.find(".defaultimg").css({
                opacity: 0
            });
            setTimeout(function() {
                a.find(".defaultimg").css({
                    opacity: 0
                })
            }, 100);
            var rt = u.css("z-index");
            var it = i.css("z-index");
            if (T == 1) {
                var ut = -r.width;
                var st = 110;
                if (l == 25) {
                    var ot = "center top 0";
                    rot2 = -st;
                    st = r.rotate
                } else {
                    var ot = "left center 0";
                    rot2 = r.rotate
                }
            } else {
                var ut = r.width;
                var st = -110;
                if (l == 25) {
                    var ot = "center bottom 0";
                    rot2 = -st;
                    st = r.rotate
                } else {
                    var ot = "right center 0";
                    rot2 = r.rotate
                }
            }
            f.find(".slotslide").each(function(t) {
                var s = e(this);
                TweenLite.fromTo(s, N / 1500, {
                    left: 0,
                    rotationX: rot2,
                    z: 0,
                    opacity: 0,
                    top: 0,
                    scale: 1,
                    transformPerspective: 600,

                    transformOrigin: ot,
                    rotationY: st
                }, {
                    left: 0,
                    rotationX: 0,
                    top: 0,
                    z: 0,
                    scale: 1,
                    rotationY: 0,
                    delay: t * 100 / 1e3 + N / 1e4,
                    ease: Power2.easeInOut,
                    onComplete: function() {
                        if (t == r.slots - 1) F(n, r, f, a, u, i)
                    }
                });
                TweenLite.to(s, .3, {
                    opacity: 1,
                    delay: t * 100 / 1e3 + N * .2 / 2e3 + N / 1e4
                })
            });
            if (T != 1) {
                var ut = -r.width;
                var st = 90;
                if (l == 25) {
                    var ot = "center top 0";
                    rot2 = -st;
                    st = r.rotate
                } else {
                    var ot = "left center 0";
                    rot2 = r.rotate
                }
            } else {
                var ut = r.width;
                var st = -90;
                if (l == 25) {
                    var ot = "center bottom 0";
                    rot2 = -st;
                    st = r.rotate
                } else {
                    var ot = "right center 0";
                    rot2 = r.rotate
                }
            }
            a.find(".slotslide").each(function(t) {
                var n = e(this);
                TweenLite.fromTo(n, N / 3e3, {
                    left: 0,
                    rotationX: 0,
                    z: 0,
                    opacity: 1,
                    top: 0,
                    scale: 1,
                    transformPerspective: 600,
                    transformOrigin: ot,
                    rotationY: 0
                }, {
                    left: 0,
                    rotationX: rot2,
                    top: 0,
                    z: 0,
                    scale: 1,
                    rotationY: st,
                    delay: t * 100 / 1e3,
                    ease: Power1.easeInOut
                });
                TweenLite.to(n, .2, {
                    opacity: 0,
                    delay: t * 50 / 1e3 + (N / 3e3 - N / 1e4)
                })
            })
        }
        if (l == 23 || l == 24) {
            f.find(".defaultimg").css({
                opacity: 0
            });
            setTimeout(function() {
                a.find(".defaultimg").css({
                    opacity: 0
                })
            }, 100);
            var rt = u.css("z-index");
            var it = i.css("z-index");
            var st = -90;
            if (T == 1) st = 90;
            var I = 1;
            if (l == 23) {
                var ot = "center center -" + r.width / 2;
                I = 0
            } else {
                var ot = "center center " + r.width / 2
            }
            var at = 0;
            TweenLite.fromTo(f, N / 2e3, {
                transformPerspective: 600,
                z: 0,
                x: 0,
                rotationY: 0
            }, {
                rotationY: 1,
                ease: Power1.easeInOut,
                z: -90
            });
            TweenLite.fromTo(f, N / 2e3, {
                transformPerspective: 600,
                z: -90,
                rotationY: 1
            }, {
                rotationY: 0,
                z: 0,
                ease: Power1.easeInOut,
                x: 0,
                delay: 3 * (N / 4e3)
            });
            TweenLite.fromTo(a, N / 2e3, {
                transformPerspective: 600,
                z: 0,
                x: 0,
                rotationY: 0
            }, {
                rotationY: 1,
                x: 0,
                ease: Power1.easeInOut,

                z: -90
            });
            TweenLite.fromTo(a, N / 2e3, {
                transformPerspective: 600,
                z: -90,
                x: 0,
                rotationY: 1
            }, {
                rotationY: 0,
                z: 0,
                x: 0,
                ease: Power1.easeInOut,
                delay: 3 * (N / 4e3)
            });
            f.find(".slotslide").each(function(t) {
                var s = e(this);
                TweenLite.fromTo(s, N / 1e3, {
                    left: at,
                    rotationX: r.rotate,
                    opacity: I,
                    top: 0,
                    scale: 1,
                    transformPerspective: 600,
                    transformOrigin: ot,
                    rotationY: st
                }, {
                    left: 0,
                    rotationX: 0,
                    opacity: 1,
                    top: 0,
                    z: 0,
                    scale: 1,
                    rotationY: 0,
                    delay: t * 50 / 1e3,
                    ease: Power2.easeInOut,
                    onComplete: function() {
                        if (t == r.slots - 1) F(n, r, f, a, u, i)
                    }
                });
                TweenLite.to(s, .1, {
                    opacity: 1,
                    delay: t * 50 / 1e3 + N / 3e3
                })
            });
            st = 90;
            if (T == 1) st = -90;
            a.find(".slotslide").each(function(t) {
                var s = e(this);
                TweenLite.fromTo(s, N / 1e3, {
                    left: 0,
                    opacity: 1,
                    rotationX: 0,
                    top: 0,
                    z: 0,
                    scale: 1,
                    transformPerspective: 600,
                    transformOrigin: ot,
                    rotationY: 0
                }, {
                    left: at,
                    opacity: 1,
                    rotationX: r.rotate,
                    top: 0,
                    scale: 1,
                    rotationY: st,
                    delay: t * 50 / 1e3,
                    ease: Power2.easeInOut,
                    onComplete: function() {
                        if (t == r.slots - 1) F(n, r, f, a, u, i)
                    }
                });
                TweenLite.to(s, .1, {
                    opacity: 0,
                    delay: t * 50 / 1e3 + (N / 1e3 - N / 1e4)
                })
            })
        }
        var ft = {};
        ft.slideIndex = r.next + 1;
        n.trigger("revolution.slide.onchange", ft);
        setTimeout(function() {
            n.trigger("revolution.slide.onafterswap")
        }, N);
        n.trigger("revolution.slide.onvideostop")
    }

    function A(e, t) {}

    function O(t, n) {
        t.find(">ul:first-child >li").each(function() {
            var t = e(this);
            for (var r = 0; r < 10; r++) t.find(".rs-parallaxlevel-" + r).wrapAll('<div style="position:absolute;top:0px;left:0px;width:100%;height:100%;" class="tp-parallax-container" data-parallaxlevel="' + n.parallaxLevels[r] + '"></div>')
        });
        t.on("mousemove.hoverdir, mouseleave.hoverdir", function(n) {
            console.log("event:" + n.type);
            switch (n.type) {
                case "mousemove":
                    var r = t.offset().top,
                        i = t.offset().left,
                        s = r + t.height() / 2,
                        o = i + t.width() / 2,
                        u = o - n.pageX,
                        a = s - n.pageY;
                    e(".tp-parallax-container").each(function() {
                        var t = e(this),
                            n = parseInt(t.data("parallaxlevel"), 0) / 100,
                            r = u * n,
                            i = a * n;
                        TweenLite.to(t, .2, {
                            x: r,
                            y: i,
                            ease: Power3.easeOut
                        })
                    });
                    break;
                case "mouseleave":
                    e(".tp-parallax-container").each(function() {
                        var t = e(this);
                        TweenLite.to(t, .4, {
                            x: 0,
                            y: 0,
                            ease: Power3.easeOut
                        })
                    });
                    break
            }
        });
        window.ondeviceorientation = function(n) {
            var r = Math.round(n.beta || 0),
                i = Math.round(n.gamma || 0),
                s = 360 / t.width() * i,
                o = 180 / t.height() * r;
            e(".tp-parallax-container").each(function() {
                var t = e(this),
                    n = parseInt(t.data("parallaxlevel"), 0) / 100,
                    r = s * n,
                    i = o * n;
                TweenLite.to(t, .2, {
                    x: r,
                    y: i,
                    ease: Power3.easeOut
                })
            })
        };
        e(window).bind("deviceorientation", {
            option: n,
            cont: t
        }, function(e) {
            var t = e.data.option;
            var n = e.data.container;
            if (!t.desktop && e.beta !== null && e.gamma !== null) {
                var r = (e.beta || 0) / MAGIC_NUMBER;
                var i = (e.gamma || 0) / MAGIC_NUMBER;
                var s = window.innerHeight > window.innerWidth
            }
        })
    }

    function M(n, r) {
        try {
            var i = n.find(">ul:first-child >li:eq(" + r.act + ")")
        } catch (s) {
            var i = n.find(">ul:first-child >li:eq(1)")
        }
        r.lastslide = r.act;
        var o = n.find(">ul:first-child >li:eq(" + r.next + ")");
        var u = i.find(".slotholder");
        var a = o.find(".slotholder");
        a.find(".defaultimg").each(function() {
            var n = e(this);
            if (n.data("kenburn") != t) n.data("kenburn").restart();
            TweenLite.killTweensOf(n, false);
            TweenLite.set(n, {
                scale: 1,
                rotationZ: 0
            });
            n.data("bgposition", a.data("bgposition"));
            n.data("currotate", a.data("rotationstart"));
            n.data("curscale", a.data("bgfit"))
        })
    }

    function _(n, r) {
        try {
            var i = n.find(">ul:first-child >li:eq(" + r.act + ")")
        } catch (s) {
            var i = n.find(">ul:first-child >li:eq(1)")
        }
        r.lastslide = r.act;
        var u = n.find(">ul:first-child >li:eq(" + r.next + ")");
        var a = i.find(".slotholder");
        var f = u.find(".slotholder");
        var l = f.data("bgposition"),
            c = f.data("bgpositionend"),
            h = f.data("zoomstart") / 100,
            p = f.data("zoomend") / 100,
            d = f.data("rotationstart"),
            v = f.data("rotationend"),
            m = f.data("bgfit"),
            g = f.data("bgfitend"),
            y = f.data("easeme"),
            b = f.data("duration") / 1e3;
        if (m == t) m = 100;
        if (g == t) g = 100;
        m = D(m, f, r);
        g = D(g, f, r);
        if (h == t) h = 1;
        if (p == t) p = 1;
        if (d == t) d = 0;
        if (v == t) v = 0;
        if (h < 1) h = 1;
        if (p < 1) p = 1;
        f.find(".defaultimg").each(function() {
            var t = e(this);
            t.data("kenburn", TweenLite.fromTo(t, b, {
                transformPerspective: 1200,
                backgroundSize: m,
                z: 0,
                backgroundPosition: l,
                rotationZ: d
            }, {
                yoyo: 2,
                rotationZ: v,
                ease: y,
                backgroundSize: g,
                backgroundPosition: c,
                onUpdate: function() {
                    t.data("bgposition", t.css("backgroundPosition"));
                    if (!o(8)) t.data("currotate", j(t));
                    if (!o(8)) t.data("curscale", t.css("backgroundSize"))
                }
            }))
        })
    }

    function D(e, t, n) {
        var r = t.data("owidth");
        var i = t.data("oheight");
        var s = n.container.width() / r;
        var o = i * s;
        var u = o / n.container.height() * e;
        return e + "% " + u + "%"
    }

    function P(e) {
        var t = e.css("-webkit-transform") || e.css("-moz-transform") || e.css("-ms-transform") || e.css("-o-transform") || e.css("transform");
        return t
    }

    function H(e) {
        return e.replace(/^matrix(3d)?\((.*)\)$/, "$2").split(/, /)
    }

    function B(e) {
        var t = H(P(e)),
            n = 1;
        if (t[0] !== "none") {
            var r = t[0],
                i = t[1],
                s = 10;
            n = Math.round(Math.sqrt(r * r + i * i) * s) / s
        }
        return n
    }

    function j(e) {
        var t = e.css("-webkit-transform") || e.css("-moz-transform") || e.css("-ms-transform") || e.css("-o-transform") || e.css("transform");
        if (t !== "none") {
            var n = t.split("(")[1].split(")")[0].split(",");
            var r = n[0];
            var i = n[1];
            var s = Math.round(Math.atan2(i, r) * (180 / Math.PI))
        } else {
            var s = 0
        }
        return s < 0 ? s += 360 : s
    }

    function F(e, t, n, r, i, s) {
        S(e, t);
        n.find(".defaultimg").css({
            opacity: 1
        });
        if (i.index() != s.index()) r.find(".defaultimg").css({
            opacity: 0
        });
        t.act = t.next;
        f(e);
        if (n.data("kenburns") == "on") _(e, t)
    }

    function I(t) {
        var n = t.target.getVideoEmbedCode();
        var r = e("#" + n.split('id="')[1].split('"')[0]);
        var i = r.closest(".tp-simpleresponsive");
        var s = r.parent().data("player");
        if (t.data == YT.PlayerState.PLAYING) {
            var o = i.find(".tp-bannertimer");
            var u = o.data("opt");
            if (r.closest(".tp-caption").data("volume") == "mute") s.mute();
            u.videoplaying = true;
            i.trigger("stoptimer");
            i.trigger("revolution.slide.onvideoplay")
        } else {
            var o = i.find(".tp-bannertimer");
            var u = o.data("opt");
            if (t.data != -1) {
                u.videoplaying = false;
                i.trigger("playtimer");
                i.trigger("revolution.slide.onvideostop")
            }
        }
        if (t.data == 0 && u.nextslideatend == true) u.container.revnext()
    }

    function q(e, t, n) {
        if (e.addEventListener) e.addEventListener(t, n, false);
        else e.attachEvent(t, n, false)
    }

    function R(t, n) {
        var r = $f(t);
        var i = e("#" + t);
        var s = i.closest(".tp-simpleresponsive");
        r.addEvent("ready", function(e) {
            if (n) r.api("play");
            r.addEvent("play", function(e) {
                var t = s.find(".tp-bannertimer");
                var n = t.data("opt");
                n.videoplaying = true;
                s.trigger("stoptimer");
                if (i.closest(".tp-caption").data("volume") == "mute") r.api("setVolume", "0")
            });
            r.addEvent("finish", function(e) {
                var t = s.find(".tp-bannertimer");
                var n = t.data("opt");
                n.videoplaying = false;
                s.trigger("playtimer");
                s.trigger("revolution.slide.onvideoplay");
                if (n.nextslideatend == true) n.container.revnext()
            });
            r.addEvent("pause", function(e) {
                var t = s.find(".tp-bannertimer");
                var n = t.data("opt");
                n.videoplaying = false;
                s.trigger("playtimer");
                s.trigger("revolution.slide.onvideostop")
            })
        })
    }

    function U(e, t) {
        var n = t.width();
        var r = t.height();
        var i = e.data("mediaAspect");
        var s = n / r;
        e.css({
            position: "absolute"
        });
        var o = e.find("video");
        if (s < i) {
            e.width(r * i).height(r);
            e.css("top", 0).css("left", -(r * i - n) / 2).css("height", r)
        } else {
            e.width(n).height(n / i);
            e.css("top", -(n / i - r) / 2).css("left", 0).css("height", n / i)
        }
    }

    function z() {
        var e = new Object;
        e.x = 0;
        e.y = 0;
        e.rotationX = 0;
        e.rotationY = 0;
        e.rotationZ = 0;
        e.scale = 1;
        e.scaleX = 1;
        e.scaleY = 1;
        e.skewX = 0;
        e.skewY = 0;
        e.opacity = 0;
        e.transformOrigin = "center, center";
        e.transformPerspective = 400;
        e.rotation = 0;
        return e
    }

    function W(t, n) {
        var r = n.split(";");
        e.each(r, function(e, n) {
            n = n.split(":");
            var r = n[0],
                i = n[1];
            if (r == "rotationX") t.rotationX = parseInt(i, 0);
            if (r == "rotationY") t.rotationY = parseInt(i, 0);
            if (r == "rotationZ") t.rotationZ = parseInt(i, 0);
            if (r == "rotationZ") t.rotation = parseInt(i, 0);
            if (r == "scaleX") t.scaleX = parseFloat(i);
            if (r == "scaleY") t.scaleY = parseFloat(i);
            if (r == "opacity") t.opacity = parseFloat(i);
            if (r == "skewX") t.skewX = parseInt(i, 0);
            if (r == "skewY") t.skewY = parseInt(i, 0);
            if (r == "x") t.x = parseInt(i, 0);
            if (r == "y") t.y = parseInt(i, 0);
            if (r == "z") t.z = parseInt(i, 0);
            if (r == "transformOrigin") t.transformOrigin = i.toString();
            if (r == "transformPerspective") t.transformPerspective = parseInt(i, 0)
        });
        return t
    }

    function X(t) {
        var n = t.split("animation:");
        var r = new Object;
        r.animation = W(z(), n[1]);
        var i = n[0].split(";");
        e.each(i, function(e, t) {
            t = t.split(":");
            var n = t[0],
                i = t[1];
            if (n == "typ") r.typ = i;
            if (n == "speed") r.speed = parseInt(i, 0) / 1e3;
            if (n == "start") r.start = parseInt(i, 0) / 1e3;
            if (n == "elementdelay") r.elementdelay = parseFloat(i);
            if (n == "ease") r.ease = i
        });
        return r
    }

    function V(n, r, i) {
        var o = 0;
        var u = 0;
        n.find(".tp-caption").each(function(n) {
            o = r.width / 2 - r.startwidth * r.bw / 2;
            var a = r.bw;
            var f = r.bh;
            if (r.fullScreen == "on") u = r.height / 2 - r.startheight * r.bh / 2;
            if (r.autoHeight == "on") u = r.container.height() / 2 - r.startheight * r.bh / 2;
            if (u < 0) u = 0;
            var l = e(this);
            var c = 0;
            if (r.width < r.hideCaptionAtLimit && l.data("captionhidden") == "on") {
                l.addClass("tp-hidden-caption");
                c = 1
            } else {
                if (r.width < r.hideAllCaptionAtLimit || r.width < r.hideAllCaptionAtLilmit) {
                    l.addClass("tp-hidden-caption");
                    c = 1
                } else {
                    l.removeClass("tp-hidden-caption")
                }
            }
            if (c == 0) {
                if (l.data("linktoslide") != t && !l.hasClass("hasclicklistener")) {
                    l.addClass("hasclicklistener");
                    l.css({
                        cursor: "pointer"
                    });
                    if (l.data("linktoslide") != "no") {
                        l.click(function() {
                            var t = e(this);
                            var n = t.data("linktoslide");
                            if (n != "next" && n != "prev") {
                                r.container.data("showus", n);
                                r.container.parent().find(".tp-rightarrow").click()
                            } else if (n == "next") r.container.parent().find(".tp-rightarrow").click();
                            else if (n == "prev") r.container.parent().find(".tp-leftarrow").click()
                        })
                    }
                }
                if (o < 0) o = 0;
                var h = "iframe" + Math.round(Math.random() * 1e3 + 1);
                if (l.find("iframe").length > 0 || l.find("video").length > 0) {
                    if (l.data("autoplayonlyfirsttime") == true || l.data("autoplayonlyfirsttime") == "true") {
                        l.data("autoplay", true)
                    }
                    l.find("iframe").each(function() {
                        var n = e(this);
                        if (s()) {
                            var o = n.attr("src");
                            n.attr("src", "");
                            n.attr("src", o)
                        }
                        r.nextslideatend = l.data("nextslideatend");
                        if (l.data("thumbimage") != t && l.data("thumbimage").length > 2 && l.data("autoplay") != true && !i) {
                            l.find(".tp-thumb-image").remove();
                            l.append('<div class="tp-thumb-image" style="cursor:pointer; position:absolute;top:0px;left:0px;width:100%;height:100%;background-image:url(' + l.data("thumbimage") + '); background-size:cover"></div>')
                        }
                        if (n.attr("src").toLowerCase().indexOf("youtube") >= 0) {
                            if (!n.hasClass("HasListener")) {
                                try {
                                    n.attr("id", h);
                                    var u;
                                    var a = setInterval(function() {
                                        if (YT != t)
                                            if (typeof YT.Player != t && typeof YT.Player != "undefined") {
                                                if (l.data("autoplay") == true) {
                                                    u = new YT.Player(h, {
                                                        events: {
                                                            onStateChange: I,
                                                            onReady: function(e) {
                                                                e.target.playVideo()
                                                            }
                                                        }
                                                    })
                                                } else u = new YT.Player(h, {
                                                    events: {
                                                        onStateChange: I
                                                    }
                                                });
                                                n.addClass("HasListener");
                                                l.data("player", u);
                                                clearInterval(a)
                                            }
                                    }, 100)
                                } catch (f) {}
                            } else {
                                if (l.data("autoplay") == true) {
                                    var u = l.data("player");
                                    l.data("timerplay", setTimeout(function() {
                                        if (l.data("forcerewind") == "on") u.seekTo(0);
                                        u.playVideo()
                                    }, l.data("start")))
                                }
                            }
                            l.find(".tp-thumb-image").click(function() {
                                TweenLite.to(e(this), .3, {
                                    opacity: 0,
                                    ease: Power3.easeInOut,
                                    onComplete: function() {
                                        l.find(".tp-thumb-image").remove()
                                    }
                                });
                                var t = l.data("player");
                                t.playVideo()
                            })
                        } else {
                            if (n.attr("src").toLowerCase().indexOf("vimeo") >= 0) {
                                if (!n.hasClass("HasListener")) {
                                    n.addClass("HasListener");
                                    n.attr("id", h);
                                    var c = n.attr("src");
                                    var p = {},
                                        d = c,
                                        v = /([^&=]+)=([^&]*)/g,
                                        m;
                                    while (m = v.exec(d)) {
                                        p[decodeURIComponent(m[1])] = decodeURIComponent(m[2])
                                    }
                                    if (p["player_id"] != t) c = c.replace(p["player_id"], h);
                                    else c = c + "&player_id=" + h;
                                    try {
                                        c = c.replace("api=0", "api=1")
                                    } catch (f) {}
                                    c = c + "&api=1";
                                    n.attr("src", c);
                                    var u = l.find("iframe")[0];
                                    var g = setInterval(function() {
                                        if ($f != t)
                                            if (typeof $f(h).api != t && typeof $f(h).api != "undefined") {
                                                $f(u).addEvent("ready", function() {
                                                    R(h, l.data("autoplay"))
                                                });
                                                clearInterval(g)
                                            }
                                    }, 100)
                                } else {
                                    if (l.data("autoplay") == true) {
                                        var n = l.find("iframe");
                                        var y = n.attr("id");
                                        var g = setInterval(function() {
                                            if ($f != t)
                                                if (typeof $f(y).api != t && typeof $f(y).api != "undefined") {
                                                    var e = $f(y);
                                                    l.data("timerplay", setTimeout(function() {
                                                        if (l.data("forcerewind") == "on") e.api("seekTo", 0);
                                                        e.api("play")
                                                    }, l.data("start")));
                                                    clearInterval(g)
                                                }
                                        }, 100)
                                    }
                                }
                                l.find(".tp-thumb-image").click(function() {
                                    TweenLite.to(e(this), .3, {
                                        opacity: 0,
                                        ease: Power3.easeInOut,
                                        onComplete: function() {
                                            l.find(".tp-thumb-image").remove()
                                        }
                                    });
                                    var n = l.find("iframe");
                                    var r = n.attr("id");
                                    var i = setInterval(function() {
                                        if ($f != t)
                                            if (typeof $f(r).api != t && typeof $f(r).api != "undefined") {
                                                var e = $f(r);
                                                e.api("play");
                                                clearInterval(i)
                                            }
                                    }, 100)
                                })
                            }
                        }
                    });
                    if (l.find("video").length > 0) {
                        l.find("video").each(function(n) {
                            var i = e(this);
                            var s = this;
                            if (!i.parent().hasClass("html5vid")) {
                                i.wrap('<div class="html5vid" style="position:relative;top:0px;left:0px;width:auto;height:auto"></div>')
                            }
                            var o = e(this).parent();
                            if (s.addEventListener) s.addEventListener("loadedmetadata", function() {
                                o.data("metaloaded", 1)
                            });
                            else s.attachEvent("loadedmetadata", function() {
                                o.data("metaloaded", 1)
                            });
                            if (!i.hasClass("HasListener")) {
                                i.addClass("HasListener");
                                s.addEventListener("play", function() {
                                    o.addClass("videoisplaying");
                                    o.find(".tp-poster").remove();
                                    if (l.data("volume") == "mute") s.muted = true;
                                    r.container.trigger("revolution.slide.onvideoplay");
                                    r.videoplaying = true;
                                    r.container.trigger("stoptimer")
                                });
                                s.addEventListener("pause", function() {
                                    o.removeClass("videoisplaying");
                                    r.videoplaying = false;
                                    r.container.trigger("playtimer");
                                    r.container.trigger("revolution.slide.onvideostop")
                                });
                                s.addEventListener("ended", function() {
                                    o.removeClass("videoisplaying");
                                    r.videoplaying = false;
                                    r.container.trigger("playtimer");
                                    r.container.trigger("revolution.slide.onvideostop");
                                    if (r.nextslideatend == true) r.container.revnext()
                                })
                            }
                            if (i.attr("poster") != t && o.find(".tp-poster").length == 0) o.append('<div class="tp-poster" style="position:absolute;z-index:1;width:100%;height:100%;top:0px;left:0px;background:url(' + i.attr("poster") + '); background-position:center center;background-size:100%;background-repeat:no-repeat;"></div>');
                            if (i.attr("control") == t && o.find(".tp-video-play-button").length == 0) {
                                o.append('<div class="tp-video-play-button"><i class="revicon-right-dir"></i><div class="tp-revstop"></div></div>');
                                o.find(".tp-video-play-button").click(function() {
                                    if (o.hasClass("videoisplaying")) s.pause();
                                    else s.play()
                                })
                            }
                            if (i.attr("control") == t) {
                                o.find("video, .tp-poster").click(function() {
                                    if (o.hasClass("videoisplaying")) s.pause();
                                    else s.play()
                                })
                            }
                            if (l.data("forcecover") == 1) {
                                U(o, r.container);
                                o.addClass("fullcoveredvideo");
                                l.addClass("fullcoveredvideo")
                            }
                            if (l.data("forcecover") == 1 || l.hasClass("fullscreenvideo")) {
                                o.css({
                                    width: "100%",
                                    height: "100%"
                                })
                            }
                            var u = false;
                            if (l.data("autoplayonlyfirsttime") == true || l.data("autoplayonlyfirsttime") == "true") u = true;
                            clearInterval(o.data("interval"));
                            o.data("interval", setInterval(function() {
                                if (o.data("metaloaded") == 1 || s.duration != NaN) {
                                    clearInterval(o.data("interval"));
                                    if (l.data("dottedoverlay") != "none" && l.data("dottedoverlay") != t)
                                        if (l.find(".tp-dottedoverlay").length != 1) o.append('<div class="tp-dottedoverlay ' + l.data("dottedoverlay") + '"></div>');
                                    var n = 16 / 9;
                                    if (l.data("aspectratio") == "4:3") n = 4 / 3;
                                    o.data("mediaAspect", n);
                                    if (o.closest(".tp-caption").data("forcecover") == 1) {
                                        U(o, r.container);
                                        o.addClass("fullcoveredvideo")
                                    }
                                    i.css({
                                        display: "block"
                                    });
                                    r.nextslideatend = l.data("nextslideatend");
                                    if (l.data("autoplay") == true || u == true) {
                                        var a = e("body").find("#" + r.container.attr("id")).find(".tp-bannertimer");
                                        setTimeout(function() {
                                            r.videoplaying = true;
                                            r.container.trigger("stoptimer")
                                        }, 200);
                                        if (l.data("forcerewind") == "on" && !o.hasClass("videoisplaying"))
                                            if (s.currentTime > 0) s.currentTime = 0;
                                        if (l.data("volume") == "mute") s.muted = true;
                                        o.data("timerplay", setTimeout(function() {
                                            if (l.data("forcerewind") == "on" && !o.hasClass("videoisplaying"))
                                                if (s.currentTime > 0) s.currentTime = 0;
                                            if (l.data("volume") == "mute") s.muted = true;
                                            setTimeout(function() {
                                                s.play()
                                            }, 500)
                                        }, 10 + l.data("start")))
                                    }
                                    if (o.data("ww") == t) o.data("ww", i.attr("width"));
                                    if (o.data("hh") == t) o.data("hh", i.attr("height"));
                                    if (!l.hasClass("fullscreenvideo") && l.data("forcecover") == 1) {
                                        try {
                                            o.width(o.data("ww") * r.bw);
                                            o.height(o.data("hh") * r.bh)
                                        } catch (f) {}
                                    }
                                    clearInterval(o.data("interval"))
                                }
                            }), 100)
                        })
                    }
                    if (l.data("autoplay") == true) {
                        var p = e("body").find("#" + r.container.attr("id")).find(".tp-bannertimer");
                        setTimeout(function() {
                            r.videoplaying = true;
                            r.container.trigger("stoptimer")
                        }, 200);
                        r.videoplaying = true;
                        r.container.trigger("stoptimer");
                        if (l.data("autoplayonlyfirsttime") == true || l.data("autoplayonlyfirsttime") == "true") {
                            l.data("autoplay", false);
                            l.data("autoplayonlyfirsttime", false)
                        }
                    }
                }
                var d = 0;
                var v = 0;
                if (l.find("img").length > 0) {
                    var m = l.find("img");
                    if (m.data("ww") == t) m.data("ww", m.width());
                    if (m.data("hh") == t) m.data("hh", m.height());
                    var g = m.data("ww");
                    var y = m.data("hh");
                    m.width(g * r.bw);
                    m.height(y * r.bh);
                    d = m.width();
                    v = m.height()
                } else {
                    if (l.find("iframe").length > 0 || l.find("video").length > 0) {
                        var b = false;
                        var m = l.find("iframe");
                        if (m.length == 0) {
                            m = l.find("video");
                            b = true
                        }
                        m.css({
                            display: "block"
                        });
                        if (l.data("ww") == t) l.data("ww", m.width());
                        if (l.data("hh") == t) l.data("hh", m.height());
                        var g = l.data("ww");
                        var y = l.data("hh");
                        var w = l;
                        if (w.data("fsize") == t) w.data("fsize", parseInt(w.css("font-size"), 0) || 0);
                        if (w.data("pt") == t) w.data("pt", parseInt(w.css("paddingTop"), 0) || 0);
                        if (w.data("pb") == t) w.data("pb", parseInt(w.css("paddingBottom"), 0) || 0);
                        if (w.data("pl") == t) w.data("pl", parseInt(w.css("paddingLeft"), 0) || 0);
                        if (w.data("pr") == t) w.data("pr", parseInt(w.css("paddingRight"), 0) || 0);
                        if (w.data("mt") == t) w.data("mt", parseInt(w.css("marginTop"), 0) || 0);
                        if (w.data("mb") == t) w.data("mb", parseInt(w.css("marginBottom"), 0) || 0);
                        if (w.data("ml") == t) w.data("ml", parseInt(w.css("marginLeft"), 0) || 0);
                        if (w.data("mr") == t) w.data("mr", parseInt(w.css("marginRight"), 0) || 0);
                        if (w.data("bt") == t) w.data("bt", parseInt(w.css("borderTop"), 0) || 0);
                        if (w.data("bb") == t) w.data("bb", parseInt(w.css("borderBottom"), 0) || 0);
                        if (w.data("bl") == t) w.data("bl", parseInt(w.css("borderLeft"), 0) || 0);
                        if (w.data("br") == t) w.data("br", parseInt(w.css("borderRight"), 0) || 0);
                        if (w.data("lh") == t) w.data("lh", parseInt(w.css("lineHeight"), 0) || 0);
                        var E = r.width;
                        var S = r.height;
                        if (E > r.startwidth) E = r.startwidth;
                        if (S > r.startheight) S = r.startheight;
                        if (!l.hasClass("fullscreenvideo")) l.css({
                            "font-size": w.data("fsize") * r.bw + "px",
                            "padding-top": w.data("pt") * r.bh + "px",
                            "padding-bottom": w.data("pb") * r.bh + "px",
                            "padding-left": w.data("pl") * r.bw + "px",
                            "padding-right": w.data("pr") * r.bw + "px",
                            "margin-top": w.data("mt") * r.bh + "px",
                            "margin-bottom": w.data("mb") * r.bh + "px",
                            "margin-left": w.data("ml") * r.bw + "px",
                            "margin-right": w.data("mr") * r.bw + "px",
                            "border-top": w.data("bt") * r.bh + "px",
                            "border-bottom": w.data("bb") * r.bh + "px",
                            "border-left": w.data("bl") * r.bw + "px",
                            "border-right": w.data("br") * r.bw + "px",
                            "line-height": w.data("lh") * r.bh + "px",
                            height: y * r.bh + "px"
                        });
                        else {
                            o = 0;
                            u = 0;
                            l.data("x", 0);
                            l.data("y", 0);
                            var x = r.height;
                            if (r.autoHeight == "on") x = r.container.height();
                            l.css({
                                width: r.width,
                                height: x
                            })
                        }
                        if (b == false) {
                            m.width(g * r.bw);
                            m.height(y * r.bh)
                        } else if (l.data("forcecover") != 1 && !l.hasClass("fullscreenvideo")) {
                            m.width(g * r.bw);
                            m.height(y * r.bh)
                        }
                        d = m.width();
                        v = m.height()
                    } else {
                        l.find(".tp-resizeme, .tp-resizeme *").each(function() {
                            K(e(this), r)
                        });
                        if (l.hasClass("tp-resizeme")) {
                            l.find("*").each(function() {
                                K(e(this), r)
                            })
                        }
                        K(l, r);
                        v = l.outerHeight(true);
                        d = l.outerWidth(true);
                        var T = l.outerHeight();
                        var N = l.css("backgroundColor");
                        l.find(".frontcorner").css({
                            borderWidth: T + "px",
                            left: 0 - T + "px",
                            borderRight: "0px solid transparent",
                            borderTopColor: N
                        });
                        l.find(".frontcornertop").css({
                            borderWidth: T + "px",
                            left: 0 - T + "px",
                            borderRight: "0px solid transparent",
                            borderBottomColor: N
                        });
                        l.find(".backcorner").css({
                            borderWidth: T + "px",
                            right: 0 - T + "px",
                            borderLeft: "0px solid transparent",
                            borderBottomColor: N
                        });
                        l.find(".backcornertop").css({
                            borderWidth: T + "px",
                            right: 0 - T + "px",
                            borderLeft: "0px solid transparent",
                            borderTopColor: N
                        })
                    }
                }

                if (r.fullScreenAlignForce == "on") {
                    o = 0;
                    u = 0
                }
                if (l.data("voffset") == t) l.data("voffset", 0);
                if (l.data("hoffset") == t) l.data("hoffset", 0);
                var C = l.data("voffset") * a;
                var k = l.data("hoffset") * a;
                var L = r.startwidth * a;
                var A = r.startheight * a;
                if (r.fullScreenAlignForce == "on") {
                    L = r.container.width();
                    A = r.container.height()
                }
                if (l.data("x") == "center" || l.data("xcenter") == "center") {
                    l.data("xcenter", "center");
                    l.data("x", L / 2 - l.outerWidth(true) / 2 + k)
                }
                if (l.data("x") == "left" || l.data("xleft") == "left") {
                    l.data("xleft", "left");
                    l.data("x", 0 / a + k)
                }
                if (l.data("x") == "right" || l.data("xright") == "right") {
                    l.data("xright", "right");
                    l.data("x", (L - l.outerWidth(true) + k) / a)
                }
                if (l.data("y") == "center" || l.data("ycenter") == "center") {
                    l.data("ycenter", "center");
                    l.data("y", A / 2 - l.outerHeight(true) / 2 + C)
                }
                if (l.data("y") == "top" || l.data("ytop") == "top") {
                    l.data("ytop", "top");
                    l.data("y", 0 / r.bh + C)
                }
                if (l.data("y") == "bottom" || l.data("ybottom") == "bottom") {
                    l.data("ybottom", "bottom");
                    l.data("y", (A - l.outerHeight(true) + C) / a)
                }
                if (l.data("start") == t) l.data("start", 1e3);
                var O = l.data("easing");
                if (O == t) O = "Power1.easeOut";
                var M = l.data("start") / 1e3;
                var _ = l.data("speed") / 1e3;
                if (l.data("x") == "center" || l.data("xcenter") == "center") var D = l.data("x") + o;
                else {
                    var D = a * l.data("x") + o
                }
                if (l.data("y") == "center" || l.data("ycenter") == "center") var P = l.data("y") + u;
                else {
                    var P = r.bh * l.data("y") + u
                }
                TweenLite.set(l, {
                    top: P,
                    left: D,
                    overwrite: "auto"
                });
                if (!i) {
                    if (l.data("timeline") != t) l.data("timeline").clear();

                    function H() {
                        setTimeout(function() {
                            l.css({
                                transform: "none",
                                "-moz-transform": "none",
                                "-webkit-transform": "none"
                            })
                        }, 100)
                    }

                    function B() {
                        l.data("timer", setTimeout(function() {
                            if (l.hasClass("fullscreenvideo")) l.css({
                                display: "block"
                            })
                        }, l.data("start")))
                    }
                    var j = new TimelineLite({
                        smoothChildTiming: true,
                        onStart: B
                    });
                    if (r.fullScreenAlignForce == "on") {}
                    var F = l;
                    if (l.data("mySplitText") != t) l.data("mySplitText").revert();
                    if (l.data("splitin") == "chars" || l.data("splitin") == "words" || l.data("splitin") == "lines" || l.data("splitout") == "chars" || l.data("splitout") == "words" || l.data("splitout") == "lines") {
                        if (l.find("a").length > 0) l.data("mySplitText", new SplitText(l.find("a"), {
                            type: "lines,words,chars",
                            charsClass: "tp-splitted",
                            wordsClass: "tp-splitted",
                            linesClass: "tp-splitted"
                        }));
                        else l.data("mySplitText", new SplitText(l, {
                            type: "lines,words,chars",
                            charsClass: "tp-splitted",
                            wordsClass: "tp-splitted",
                            linesClass: "tp-splitted"
                        }));
                        l.addClass("splitted")
                    }
                    if (l.data("splitin") == "chars") F = l.data("mySplitText").chars;
                    if (l.data("splitin") == "words") F = l.data("mySplitText").words;
                    if (l.data("splitin") == "lines") F = l.data("mySplitText").lines;
                    var q = z();
                    var V = z();
                    if (l.data("repeat") != t) repeatV = l.data("repeat");
                    if (l.data("yoyo") != t) yoyoV = l.data("yoyo");
                    if (l.data("repeatdelay") != t) repeatdelayV = l.data("repeatdelay");
                    if (l.hasClass("customin")) q = W(q, l.data("customin"));
                    else if (l.hasClass("randomrotate")) {
                        q.scale = Math.random() * 3 + 1;
                        q.rotation = Math.round(Math.random() * 200 - 100);
                        q.x = Math.round(Math.random() * 200 - 100);
                        q.y = Math.round(Math.random() * 200 - 100)
                    } else if (l.hasClass("lfr") || l.hasClass("skewfromright")) q.x = 15 + r.width;
                    else if (l.hasClass("lfl") || l.hasClass("skewfromleft")) q.x = -15 - d;
                    else if (l.hasClass("sfl") || l.hasClass("skewfromleftshort")) q.x = -50;
                    else if (l.hasClass("sfr") || l.hasClass("skewfromrightshort")) q.x = 50;
                    else if (l.hasClass("lft")) q.y = -25 - v;
                    else if (l.hasClass("lfb")) q.y = 25 + r.height;
                    else if (l.hasClass("sft")) q.y = -50;
                    else if (l.hasClass("sfb")) q.y = 50;
                    if (l.hasClass("skewfromright") || l.hasClass("skewfromrightshort")) q.skewX = -85;
                    else if (l.hasClass("skewfromleft") || l.hasClass("skewfromleftshort")) q.skewX = 85;
                    if (l.hasClass("fade") || l.hasClass("sft") || l.hasClass("sfl") || l.hasClass("sfb") || l.hasClass("skewfromleftshort") || l.hasClass("sfr") || l.hasClass("skewfromrightshort")) q.opacity = 0;
                    if ($().toLowerCase() == "safari") {
                        q.rotationX = 0;
                        q.rotationY = 0
                    }
                    var J = l.data("elementdelay") == t ? 0 : l.data("elementdelay");
                    V.ease = q.ease = l.data("easing") == t ? Power1.easeInOut : l.data("easing");
                    q.data = new Object;
                    q.data.oldx = q.x;
                    q.data.oldy = q.y;
                    V.data = new Object;
                    V.data.oldx = V.x;
                    V.data.oldy = V.y;
                    q.x = q.x * a;
                    q.y = q.y * a;
                    var Q = new TimelineLite;
                    if (l.hasClass("customin")) {
                        if (F != l) j.add(TweenLite.set(l, {
                            opacity: 1,
                            scaleX: 1,
                            scaleY: 1,
                            rotationX: 0,
                            rotationY: 0,
                            rotationZ: 0,
                            skewX: 0,
                            skewY: 0,
                            z: 0,
                            x: 0,
                            y: 0,
                            visibility: "visible",
                            opacity: 1,
                            delay: 0,
                            overwrite: "all"
                        }));
                        q.visibility = "hidden";
                        V.visibility = "visible";
                        V.overwrite = "all";
                        V.opacity = 1;
                        V.onComplete = H();
                        V.delay = M;
                        j.add(Q.staggerFromTo(F, _, q, V, J), "frame0")
                    } else {
                        q.visibility = "visible";
                        q.transformPerspective = 600;
                        if (F != l) j.add(TweenLite.set(l, {
                            opacity: 1,
                            scaleX: 1,
                            scaleY: 1,
                            rotationX: 0,
                            rotationY: 0,
                            rotationZ: 0,
                            skewX: 0,
                            skewY: 0,
                            z: 0,
                            x: 0,
                            y: 0,
                            visibility: "visible",
                            opacity: 1,
                            delay: 0,
                            overwrite: "all"
                        }));
                        V.visibility = "visible";
                        V.delay = M;
                        V.onComplete = H();
                        V.opacity = 1;
                        if (l.hasClass("randomrotate") && F != l) {
                            for (var n = 0; n < F.length; n++) {
                                var Z = new Object;
                                var et = new Object;
                                e.extend(Z, q);
                                e.extend(et, V);
                                q.scale = Math.random() * 3 + 1;
                                q.rotation = Math.round(Math.random() * 200 - 100);
                                q.x = Math.round(Math.random() * 200 - 100);
                                q.y = Math.round(Math.random() * 200 - 100);
                                if (n != 0) et.delay = M + n * J;
                                j.append(TweenLite.fromTo(F[n], _, Z, et), "frame0")
                            }
                        } else j.add(Q.staggerFromTo(F, _, q, V, J), "frame0")
                    }
                    l.data("timeline", j);
                    var tt = new Array;
                    if (l.data("frames") != t) {
                        var nt = l.data("frames");
                        nt = nt.replace(/\s+/g, "");
                        nt = nt.replace("{", "");
                        var rt = nt.split("}");
                        e.each(rt, function(e, t) {
                            if (t.length > 0) {
                                var n = X(t);
                                G(l, r, n, "frame" + (e + 10), a)
                            }
                        })
                    }
                    j = l.data("timeline");
                    if (l.data("end") != t) {
                        Y(l, r, l.data("end") / 1e3, q, "frame99", a)
                    } else {
                        Y(l, r, 999999, q, "frame99", a)
                    }
                    j = l.data("timeline");
                    l.data("timeline", j)
                }
            }
            if (i) {
                if (l.data("timeline") != t) {
                    var it = l.data("timeline").getTweensOf();
                    e.each(it, function(e, n) {
                        if (n.vars.data != t) {
                            var r = n.vars.data.oldx * a;
                            var i = n.vars.data.oldy * a;
                            if (n.progress() != 1 && n.progress() != 0) {
                                try {
                                    n.vars.x = r;
                                    n.vary.y = i
                                } catch (s) {}
                            } else {
                                if (n.progress() == 1) {
                                    TweenLite.set(n.target, {
                                        x: r,
                                        y: i
                                    })
                                }
                            }
                        }
                    })
                }
            }
        });
        var a = e("body").find("#" + r.container.attr("id")).find(".tp-bannertimer");
        a.data("opt", r)
    }

    function $() {
        var e = navigator.appName,
            t = navigator.userAgent,
            n;
        var r = t.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
        if (r && (n = t.match(/version\/([\.\d]+)/i)) != null) r[2] = n[1];
        r = r ? [r[1], r[2]] : [e, navigator.appVersion, "-?"];
        return r[0]
    }

    function J() {
        var e = navigator.appName,
            t = navigator.userAgent,
            n;
        var r = t.match(/(opera|chrome|safari|firefox|msie)\/?\s*(\.?\d+(\.\d+)*)/i);
        if (r && (n = t.match(/version\/([\.\d]+)/i)) != null) r[2] = n[1];
        r = r ? [r[1], r[2]] : [e, navigator.appVersion, "-?"];
        return r[1]
    }

    function K(e, n) {
        if (e.data("fsize") == t) e.data("fsize", parseInt(e.css("font-size"), 0) || 0);
        if (e.data("pt") == t) e.data("pt", parseInt(e.css("paddingTop"), 0) || 0);
        if (e.data("pb") == t) e.data("pb", parseInt(e.css("paddingBottom"), 0) || 0);
        if (e.data("pl") == t) e.data("pl", parseInt(e.css("paddingLeft"), 0) || 0);
        if (e.data("pr") == t) e.data("pr", parseInt(e.css("paddingRight"), 0) || 0);
        if (e.data("mt") == t) e.data("mt", parseInt(e.css("marginTop"), 0) || 0);
        if (e.data("mb") == t) e.data("mb", parseInt(e.css("marginBottom"), 0) || 0);
        if (e.data("ml") == t) e.data("ml", parseInt(e.css("marginLeft"), 0) || 0);
        if (e.data("mr") == t) e.data("mr", parseInt(e.css("marginRight"), 0) || 0);
        if (e.data("bt") == t) e.data("bt", parseInt(e.css("borderTopWidth"), 0) || 0);
        if (e.data("bb") == t) e.data("bb", parseInt(e.css("borderBottomWidth"), 0) || 0);
        if (e.data("bl") == t) e.data("bl", parseInt(e.css("borderLeftWidth"), 0) || 0);
        if (e.data("br") == t) e.data("br", parseInt(e.css("borderRightWidth"), 0) || 0);
        if (e.data("ls") == t) e.data("ls", parseInt(e.css("letterSpacing"), 0) || 0);
        if (e.data("lh") == t) e.data("lh", parseInt(e.css("lineHeight"), 0) || 0);
        if (e.data("minwidth") == t) e.data("minwidth", parseInt(e.css("minWidth"), 0) || 0);
        if (e.data("minheight") == t) e.data("minheight", parseInt(e.css("minHeight"), 0) || 0);
        if (e.data("maxwidth") == t) e.data("maxwidth", parseInt(e.css("maxWidth"), 0) || "none");
        if (e.data("maxheight") == t) e.data("maxheight", parseInt(e.css("maxHeight"), 0) || "none");
        if (e.data("wan") == t) e.data("wan", e.css("-webkit-transition"));
        if (e.data("moan") == t) e.data("moan", e.css("-moz-animation-transition"));
        if (e.data("man") == t) e.data("man", e.css("-ms-animation-transition"));
        if (e.data("ani") == t) e.data("ani", e.css("transition"));
        if (!e.hasClass("tp-splitted")) {
            e.css("-webkit-transition", "none");
            e.css("-moz-transition", "none");
            e.css("-ms-transition", "none");
            e.css("transition", "none");
            TweenLite.set(e, {
                fontSize: Math.round(e.data("fsize") * n.bw) + "px",
                letterSpacing: Math.floor(e.data("ls") * n.bw) + "px",
                paddingTop: Math.round(e.data("pt") * n.bh) + "px",
                paddingBottom: Math.round(e.data("pb") * n.bh) + "px",
                paddingLeft: Math.round(e.data("pl") * n.bw) + "px",
                paddingRight: Math.round(e.data("pr") * n.bw) + "px",
                marginTop: e.data("mt") * n.bh + "px",
                marginBottom: e.data("mb") * n.bh + "px",
                marginLeft: e.data("ml") * n.bw + "px",
                marginRight: e.data("mr") * n.bw + "px",
                borderTopWidth: Math.round(e.data("bt") * n.bh) + "px",
                borderBottomWidth: Math.round(e.data("bb") * n.bh) + "px",
                borderLeftWidth: Math.round(e.data("bl") * n.bw) + "px",
                borderRightWidth: Math.round(e.data("br") * n.bw) + "px",
                lineHeight: Math.round(e.data("lh") * n.bh) + "px",
                minWidth: e.data("minwidth") * n.bw + "px",
                minHeight: e.data("minheight") * n.bh + "px",
                overwrite: "auto"
            });
            setTimeout(function() {
                e.css("-webkit-transition", e.data("wan"));
                e.css("-moz-transition", e.data("moan"));
                e.css("-ms-transition", e.data("man"));
                e.css("transition", e.data("ani"))
            }, 30);
            if (e.data("maxheight") != "none") e.css({
                maxHeight: e.data("maxheight") * n.bh + "px"
            });
            if (e.data("maxwidth") != "none") e.css({
                maxWidth: e.data("maxwidth") * n.bw + "px"
            })
        }
    }

    function Q(t, n) {
        t.find(".tp-caption").each(function(t) {
            var n = e(this);
            if (n.find("iframe").length > 0) {
                try {
                    var r = n.find("iframe");
                    var i = r.attr("id");
                    var s = $f(i);
                    s.api("pause");
                    clearTimeout(n.data("timerplay"))
                } catch (o) {}
                try {
                    var u = n.data("player");
                    u.stopVideo();
                    clearTimeout(n.data("timerplay"))
                } catch (o) {}
            }
            if (n.find("video").length > 0) {
                try {
                    n.find("video").each(function(t) {
                        var n = e(this).parent();
                        var r = n.attr("id");
                        clearTimeout(n.data("timerplay"));
                        var i = this;
                        i.pause()
                    })
                } catch (o) {}
            }
            try {
                var a = n.data("timeline");
                var f = a.getLabelTime("frame99");
                var l = a.time();
                if (f > l) {
                    var c = a.getTweensOf(n);
                    e.each(c, function(e, t) {
                        if (e != 0) t.pause()
                    });
                    if (n.css("opacity") != 0) a.play("frame99");
                    else a.progress(1, false)
                }
            } catch (o) {}
        })
    }

    function G(e, n, r, i, s) {
        var o = e.data("timeline");
        var u = new TimelineLite;
        var a = e;
        if (r.typ == "chars") a = e.data("mySplitText").chars;
        else if (r.typ == "words") a = e.data("mySplitText").words;
        else if (r.typ == "lines") a = e.data("mySplitText").lines;
        r.animation.ease = r.ease;
        if (r.animation.rotationZ != t) r.animation.rotation = r.animation.rotationZ;
        r.animation.data = new Object;
        r.animation.data.oldx = r.animation.x;
        r.animation.data.oldy = r.animation.y;
        r.animation.x = r.animation.x * s;
        r.animation.y = r.animation.y * s;
        o.add(u.staggerTo(a, r.speed, r.animation, r.elementdelay), r.start);
        o.addLabel(i, r.start);
        e.data("timeline", o)
    }

    function Y(e, n, r, i, s, o) {
        var u = e.data("timeline");
        var a = new TimelineLite;
        var f = z();
        var l = e.data("endspeed") == t ? e.data("speed") : e.data("endspeed");
        f.ease = e.data("endeasing") == t ? Power1.easeInOut : e.data("endeasing");
        l = l / 1e3;
        if (e.hasClass("ltr") || e.hasClass("ltl") || e.hasClass("str") || e.hasClass("stl") || e.hasClass("ltt") || e.hasClass("ltb") || e.hasClass("stt") || e.hasClass("stb") || e.hasClass("skewtoright") || e.hasClass("skewtorightshort") || e.hasClass("skewtoleft") || e.hasClass("skewtoleftshort") || e.hasClass("fadeout") || e.hasClass("randomrotateout")) {
            if (e.hasClass("skewtoright") || e.hasClass("skewtorightshort")) f.skewX = 35;
            else if (e.hasClass("skewtoleft") || e.hasClass("skewtoleftshort")) f.skewX = -35;
            if (e.hasClass("ltr") || e.hasClass("skewtoright")) f.x = n.width + 60;
            else if (e.hasClass("ltl") || e.hasClass("skewtoleft")) f.x = 0 - (n.width + 60);
            else if (e.hasClass("ltt")) f.y = 0 - (n.height + 60);
            else if (e.hasClass("ltb")) f.y = n.height + 60;
            else if (e.hasClass("str") || e.hasClass("skewtorightshort")) {
                f.x = 50;
                f.opacity = 0
            } else if (e.hasClass("stl") || e.hasClass("skewtoleftshort")) {
                f.x = -50;
                f.opacity = 0
            } else if (e.hasClass("stt")) {
                f.y = -50;
                f.opacity = 0
            } else if (e.hasClass("stb")) {
                f.y = 50;
                f.opacity = 0
            } else if (e.hasClass("randomrotateout")) {
                f.x = Math.random() * n.width;
                f.y = Math.random() * n.height;
                f.scale = Math.random() * 2 + .3;
                f.rotation = Math.random() * 360 - 180;
                f.opacity = 0
            } else if (e.hasClass("fadeout")) {
                f.opacity = 0
            }
            if (e.hasClass("skewtorightshort")) f.x = 270;
            else if (e.hasClass("skewtoleftshort")) f.x = -270;
            f.data = new Object;
            f.data.oldx = f.x;
            f.data.oldy = f.y;
            f.x = f.x * o;
            f.y = f.y * o;
            f.overwrite = "auto";
            var c = e;
            var c = e;
            if (e.data("splitout") == "chars") c = e.data("mySplitText").chars;
            else if (e.data("splitout") == "words") c = e.data("mySplitText").words;
            else if (e.data("splitout") == "lines") c = e.data("mySplitText").lines;
            var h = e.data("endelementdelay") == t ? 0 : e.data("endelementdelay");
            u.add(a.staggerTo(c, l, f, h), r)
        } else if (e.hasClass("customout")) {
            f = W(f, e.data("customout"));
            var c = e;
            if (e.data("splitout") == "chars") c = e.data("mySplitText").chars;
            else if (e.data("splitout") == "words") c = e.data("mySplitText").words;
            else if (e.data("splitout") == "lines") c = e.data("mySplitText").lines;
            var h = e.data("endelementdelay") == t ? 0 : e.data("endelementdelay");
            f.onStart = function() {
                TweenLite.set(e, {
                    transformPerspective: f.transformPerspective,
                    transformOrigin: f.transformOrigin,
                    overwrite: "auto"
                })
            };
            f.data = new Object;
            f.data.oldx = f.x;
            f.data.oldy = f.y;
            f.x = f.x * o;
            f.y = f.y * o;
            u.add(a.staggerTo(c, l, f, h), r)
        } else {
            i.delay = 0;
            u.add(TweenLite.to(e, l, i), r)
        }
        u.addLabel(s, r);
        e.data("timeline", u)
    }

    function Z(t, n) {
        t.children().each(function() {
            try {
                e(this).die("click")
            } catch (t) {}
            try {
                e(this).die("mouseenter")
            } catch (t) {}
            try {
                e(this).die("mouseleave")
            } catch (t) {}
            try {
                e(this).unbind("hover")
            } catch (t) {}
        });
        try {
            t.die("click", "mouseenter", "mouseleave")
        } catch (r) {}
        clearInterval(n.cdint);
        t = null
    }

    function et(n, r) {
        r.cd = 0;
        r.loop = 0;
        if (r.stopAfterLoops != t && r.stopAfterLoops > -1) r.looptogo = r.stopAfterLoops;
        else r.looptogo = 9999999;
        if (r.stopAtSlide != t && r.stopAtSlide > -1) r.lastslidetoshow = r.stopAtSlide;
        else r.lastslidetoshow = 999;
        r.stopLoop = "off";
        if (r.looptogo == 0) r.stopLoop = "on";
        if (r.slideamount > 1 && !(r.stopAfterLoops == 0 && r.stopAtSlide == 1)) {
            var i = n.find(".tp-bannertimer");
            n.on("stoptimer", function() {
                i.data("tween").pause();
                if (r.hideTimerBar == "on") i.css({
                    visibility: "hidden"
                })
            });
            n.on("starttimer", function() {
                if (r.conthover != 1 && r.videoplaying != true && r.width > r.hideSliderAtLimit && r.bannertimeronpause != true && r.overnav != true)
                    if (r.stopLoop == "on" && r.next == r.lastslidetoshow - 1) {} else {
                        i.css({
                            visibility: "visible"
                        });
                        i.data("tween").play()
                    }
                if (r.hideTimerBar == "on") i.css({
                    visibility: "hidden"
                })
            });
            n.on("restarttimer", function() {
                if (r.stopLoop == "on" && r.next == r.lastslidetoshow - 1) {} else {
                    i.css({
                        visibility: "visible"
                    });
                    i.data("tween", TweenLite.fromTo(i, r.delay / 1e3, {
                        width: "0%"
                    }, {
                        width: "100%",
                        ease: Linear.easeNone,
                        onComplete: o,
                        delay: 1
                    }))
                }
                if (r.hideTimerBar == "on") i.css({
                    visibility: "hidden"
                })
            });
            n.on("nulltimer", function() {
                i.data("tween").pause(0);
                if (r.hideTimerBar == "on") i.css({
                    visibility: "hidden"
                })
            });

            function o() {
                if (e("body").find(n).length == 0) {
                    Z(n, r);
                    clearInterval(r.cdint)
                }
                if (n.data("conthover-changed") == 1) {
                    r.conthover = n.data("conthover");
                    n.data("conthover-changed", 0)
                }
                r.act = r.next;
                r.next = r.next + 1;
                if (r.next > n.find(">ul >li").length - 1) {
                    r.next = 0;
                    r.looptogo = r.looptogo - 1;
                    if (r.looptogo <= 0) {
                        r.stopLoop = "on"
                    }
                }
                if (r.stopLoop == "on" && r.next == r.lastslidetoshow - 1) {
                    n.find(".tp-bannertimer").css({
                        visibility: "hidden"
                    });
                    n.trigger("revolution.slide.onstop")
                } else {
                    i.data("tween").restart()
                }
                C(n, r)
            }
            i.data("tween", TweenLite.fromTo(i, r.delay / 1e3, {
                width: "0%"
            }, {
                width: "100%",
                ease: Linear.easeNone,
                onComplete: o,
                delay: 1
            }));
            i.data("opt", r);
            n.hover(function() {
                if (r.onHoverStop == "on" && !s()) {
                    n.trigger("stoptimer");
                    n.trigger("revolution.slide.onpause");
                    var i = n.find(">ul >li:eq(" + r.next + ") .slotholder");
                    i.find(".defaultimg").each(function() {
                        var n = e(this);
                        if (n.data("kenburn") != t) n.data("kenburn").pause()
                    })
                }
            }, function() {
                if (n.data("conthover") != 1) {
                    n.trigger("revolution.slide.onresume");
                    n.trigger("starttimer");
                    var i = n.find(">ul >li:eq(" + r.next + ") .slotholder");
                    i.find(".defaultimg").each(function() {
                        var n = e(this);
                        if (n.data("kenburn") != t) n.data("kenburn").play()
                    })
                }
            })
        }
    }
    e.fn.extend({
        revolution: function(i) {
            e.fn.revolution.defaults = {
                delay: 9e3,
                startheight: 500,
                startwidth: 960,
                fullScreenAlignForce: "off",
                autoHeight: "off",
                hideTimerBar: "off",
                hideThumbs: 200,
                hideNavDelayOnMobile: 1500,
                thumbWidth: 100,
                thumbHeight: 50,
                thumbAmount: 3,
                navigationType: "bullet",
                navigationArrows: "solo",
                hideThumbsOnMobile: "off",
                hideBulletsOnMobile: "off",
                hideArrowsOnMobile: "off",
                hideThumbsUnderResoluition: 0,
                navigationStyle: "round",
                navigationHAlign: "center",
                navigationVAlign: "bottom",
                navigationHOffset: 0,
                navigationVOffset: 20,
                soloArrowLeftHalign: "left",
                soloArrowLeftValign: "center",
                soloArrowLeftHOffset: 20,
                soloArrowLeftVOffset: 0,
                soloArrowRightHalign: "right",
                soloArrowRightValign: "center",
                soloArrowRightHOffset: 20,
                soloArrowRightVOffset: 0,
                keyboardNavigation: "on",
                touchenabled: "on",
                onHoverStop: "on",
                stopAtSlide: -1,
                stopAfterLoops: -1,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLimit: 0,
                hideSliderAtLimit: 0,
                shadow: 0,
                fullWidth: "off",
                fullScreen: "off",
                minFullScreenHeight: 0,
                fullScreenOffsetContainer: "",
                dottedOverlay: "none",
                forceFullWidth: "off",
                spinner: "spinner0",
                swipe_velocity: .4,
                swipe_max_touches: 1,
                swipe_min_touches: 1,
                drag_block_vertical: false,
                isJoomla: false,
                parallax: "off",
                parallaxLevels: [10, 15, 20, 25, 30, 35, 40, 45, 50, 55, 60, 65, 70, 75, 80, 85]
            };
            i = e.extend({}, e.fn.revolution.defaults, i);
            return this.each(function() {
                var o = i;
                o.desktop = !navigator.userAgent.match(/(iPhone|iPod|iPad|Android|BlackBerry|BB10|mobi|tablet|opera mini|nexus 7)/i);
                if (o.fullWidth != "on" && o.fullScreen != "on") o.autoHeight = "off";
                if (o.fullScreen == "on") o.autoHeight = "on";
                if (o.fullWidth != "on" && o.fullScreen != "on") forceFulWidth = "off";
                var u = e(this);
                if (o.fullWidth == "on" && o.autoHeight == "off") u.css({
                    maxHeight: o.startheight + "px"
                });
                if (s() && o.hideThumbsOnMobile == "on" && o.navigationType == "thumb") o.navigationType = "none";
                if (s() && o.hideBulletsOnMobile == "on" && o.navigationType == "bullet") o.navigationType = "none";
                if (s() && o.hideBulletsOnMobile == "on" && o.navigationType == "both") o.navigationType = "none";
                if (s() && o.hideArrowsOnMobile == "on") o.navigationArrows = "none";
                if (o.forceFullWidth == "on") {
                    var f = u.parent().offset().left;
                    var l = u.parent().css("marginBottom");
                    var m = u.parent().css("marginTop");
                    if (l == t) l = 0;
                    if (m == t) m = 0;
                    u.parent().wrap('<div style="position:relative;width:100%;height:auto;margin-top:' + m + ";margin-bottom:" + l + '" class="forcefullwidth_wrapper_tp_banner"></div>');
                    u.closest(".forcefullwidth_wrapper_tp_banner").append('<div class="tp-fullwidth-forcer" style="width:100%;height:' + u.height() + 'px"></div>');
                    u.css({
                        backgroundColor: u.parent().css("backgroundColor"),
                        backgroundImage: u.parent().css("backgroundImage")
                    });
                    u.parent().css({
                        left: 0 - f + "px",
                        position: "absolute",
                        width: e(window).width()
                    });
                    o.width = e(window).width()
                }
                try {
                    if (o.hideThumbsUnderResolution > e(window).width() && o.hideThumbsUnderResolution != 0) {
                        u.parent().find(".tp-bullets.tp-thumbs").css({
                            display: "none"
                        })
                    } else {
                        u.parent().find(".tp-bullets.tp-thumbs").css({
                            display: "block"
                        })
                    }
                } catch (g) {}
                if (!u.hasClass("revslider-initialised")) {
                    u.addClass("revslider-initialised");
                    if (u.attr("id") == t) u.attr("id", "revslider-" + Math.round(Math.random() * 1e3 + 5));
                    o.firefox13 = false;
                    o.ie = !e.support.opacity;
                    o.ie9 = document.documentMode == 9;
                    o.origcd = o.delay;
                    var b = e.fn.jquery.split("."),
                        w = parseFloat(b[0]),
                        E = parseFloat(b[1]),
                        S = parseFloat(b[2] || "0");
                    if (w == 1 && E < 7) {
                        u.html('<div style="text-align:center; padding:40px 0px; font-size:20px; color:#992222;"> The Current Version of jQuery:' + b + " <br>Please update your jQuery Version to min. 1.7 in Case you wish to use the Revolution Slider Plugin</div>")
                    }
                    if (w > 1) o.ie = false;
                    if (!e.support.transition) e.fn.transition = e.fn.animate;
                    u.find(".caption").each(function() {
                        e(this).addClass("tp-caption")
                    });
                    if (s()) {
                        u.find(".tp-caption").each(function() {
                            if (e(this).data("autoplay") == true) e(this).data("autoplay", false)
                        })
                    }
                    var x = 0;
                    var T = 0;
                    var N = 0;
                    var k = "http";
                    if (location.protocol === "https:") {
                        k = "https"
                    }
                    u.find(".tp-caption iframe").each(function(t) {
                        try {
                            if (e(this).attr("src").indexOf("you") > 0 && x == 0) {
                                x = 1;
                                var n = document.createElement("script");
                                var r = "https";
                                n.src = r + "://www.youtube.com/iframe_api";
                                var i = document.getElementsByTagName("script")[0];
                                var s = true;
                                e("head").find("*").each(function() {
                                    if (e(this).attr("src") == r + "://www.youtube.com/iframe_api") s = false
                                });
                                if (s) {
                                    i.parentNode.insertBefore(n, i)
                                }
                            }
                        } catch (o) {}
                    });
                    u.find(".tp-caption iframe").each(function(t) {
                        try {
                            if (e(this).attr("src").indexOf("vim") > 0 && T == 0) {
                                T = 1;
                                var n = document.createElement("script");
                                n.src = k + "://a.vimeocdn.com/js/froogaloop2.min.js";
                                var r = document.getElementsByTagName("script")[0];
                                var i = true;
                                e("head").find("*").each(function() {
                                    if (e(this).attr("src") == k + "://a.vimeocdn.com/js/froogaloop2.min.js") i = false
                                });
                                if (i) r.parentNode.insertBefore(n, r)
                            }
                        } catch (s) {}
                    });
                    u.find(".tp-caption video").each(function(t) {
                        e(this).removeClass("video-js").removeClass("vjs-default-skin");
                        e(this).attr("preload", "");
                        e(this).css({
                            display: "none"
                        })
                    });
                    if (o.shuffle == "on") {
                        for (var L = 0; L < u.find(">ul:first-child >li").length; L++) {
                            var A = Math.round(Math.random() * u.find(">ul:first-child >li").length);
                            u.find(">ul:first-child >li:eq(" + A + ")").prependTo(u.find(">ul:first-child"))
                        }
                    }
                    o.slots = 4;
                    o.act = -1;
                    o.next = 0;
                    if (o.startWithSlide != t) o.next = o.startWithSlide;
                    var M = n("#")[0];
                    if (M.length < 9) {
                        if (M.split("slide").length > 1) {
                            var _ = parseInt(M.split("slide")[1], 0);
                            if (_ < 1) _ = 1;
                            if (_ > u.find(">ul:first >li").length) _ = u.find(">ul:first >li").length;
                            o.next = _ - 1
                        }
                    }
                    o.firststart = 1;
                    if (o.navigationHOffset == t) o.navOffsetHorizontal = 0;
                    if (o.navigationVOffset == t) o.navOffsetVertical = 0;
                    u.append('<div class="tp-loader ' + o.spinner + '">' + '<div class="dot1"></div>' + '<div class="dot2"></div>' + '<div class="bounce1"></div>' + '<div class="bounce2"></div>' + '<div class="bounce3"></div>' + "</div>");
                    if (u.find(".tp-bannertimer").length == 0) u.append('<div class="tp-bannertimer" style="visibility:hidden"></div>');
                    var D = u.find(".tp-bannertimer");
                    if (D.length > 0) {
                        D.css({
                            width: "0%"
                        })
                    }
                    u.addClass("tp-simpleresponsive");
                    o.container = u;
                    o.slideamount = u.find(">ul:first >li").length;
                    if (u.height() == 0) u.height(o.startheight);
                    if (o.startwidth == t || o.startwidth == 0) o.startwidth = u.width();
                    if (o.startheight == t || o.startheight == 0) o.startheight = u.height();
                    o.width = u.width();
                    o.height = u.height();
                    o.bw = o.startwidth / u.width();
                    o.bh = o.startheight / u.height();
                    if (o.width != o.startwidth) {
                        o.height = Math.round(o.startheight * (o.width / o.startwidth));
                        u.height(o.height)
                    }
                    if (o.shadow != 0) {
                        u.parent().append('<div class="tp-bannershadow tp-shadow' + o.shadow + '"></div>');
                        var f = 0;
                        if (o.forceFullWidth == "on") f = 0 - o.container.parent().offset().left;
                        u.parent().find(".tp-bannershadow").css({
                            width: o.width,
                            left: f
                        })
                    }
                    u.find("ul").css({
                        display: "none"
                    });
                    var P = u;
                    u.find("ul").css({
                        display: "block"
                    });
                    y(u, o);
                    if (o.parallax != "off") O(u, o);
                    if (o.slideamount > 1) c(u, o);
                    if (o.slideamount > 1) a(u, o);
                    if (o.slideamount > 1) h(u, o);
                    if (o.keyboardNavigation == "on") p(u, o);
                    d(u, o);
                    if (o.hideThumbs > 0) v(u, o);
                    C(u, o);
                    if (o.slideamount > 1) et(u, o);
                    setTimeout(function() {
                        u.trigger("revolution.slide.onloaded")
                    }, 500);
                    e("body").data("rs-fullScreenMode", false);
                    e(window).on("mozfullscreenchange webkitfullscreenchange fullscreenchange", function() {
                        e("body").data("rs-fullScreenMode", !e("body").data("rs-fullScreenMode"));
                        if (e("body").data("rs-fullScreenMode")) {
                            setTimeout(function() {
                                e(window).trigger("resize")
                            }, 200)
                        }
                    });
                    e(window).resize(function() {
                        if (e("body").find(u) != 0)
                            if (o.forceFullWidth == "on") {
                                var t = o.container.closest(".forcefullwidth_wrapper_tp_banner").offset().left;
                                o.container.parent().css({
                                    left: 0 - t + "px",
                                    width: e(window).width()
                                })
                            }
                        if (u.outerWidth(true) != o.width || u.is(":hidden")) {
                            r(u, o)
                        }
                    });
                    try {
                        if (o.hideThumbsUnderResoluition != 0 && o.navigationType == "thumb") {
                            if (o.hideThumbsUnderResoluition > e(window).width()) e(".tp-bullets").css({
                                display: "none"
                            });
                            else e(".tp-bullets").css({
                                display: "block"
                            })
                        }
                    } catch (g) {}
                    u.find(".tp-scrollbelowslider").on("click", function() {
                        var t = 0;
                        try {
                            t = e("body").find(o.fullScreenOffsetContainer).height()
                        } catch (n) {}
                        try {
                            t = t - e(this).data("scrolloffset")
                        } catch (n) {}
                        e("body,html").animate({
                            scrollTop: u.offset().top + u.find(">ul >li").height() - t + "px"
                        }, {
                            duration: 400
                        })
                    });
                    var H = u.parent();
                    if (e(window).width() < o.hideSliderAtLimit) {
                        u.trigger("stoptimer");
                        if (H.css("display") != "none") H.data("olddisplay", H.css("display"));
                        H.css({
                            display: "none"
                        })
                    }
                }
            })
        },
        revscroll: function(t) {
            return this.each(function() {
                var n = e(this);
                e("body,html").animate({
                    scrollTop: n.offset().top + n.find(">ul >li").height() - t + "px"
                }, {
                    duration: 400
                })
            })
        },
        revredraw: function(t) {
            return this.each(function() {
                var t = e(this);
                var n = t.parent().find(".tp-bannertimer");
                var i = n.data("opt");
                r(t, i)
            })
        },
        revpause: function(t) {
            return this.each(function() {
                var t = e(this);
                t.data("conthover", 1);
                t.data("conthover-changed", 1);
                t.trigger("revolution.slide.onpause");
                var n = t.parent().find(".tp-bannertimer");
                var r = n.data("opt");
                r.bannertimeronpause = true;
                t.trigger("stoptimer")
            })
        },
        revresume: function(t) {
            return this.each(function() {
                var t = e(this);
                t.data("conthover", 0);
                t.data("conthover-changed", 1);
                t.trigger("revolution.slide.onresume");
                var n = t.parent().find(".tp-bannertimer");
                var r = n.data("opt");
                r.bannertimeronpause = false;
                t.trigger("starttimer")
            })
        },
        revnext: function(t) {
            return this.each(function() {
                var t = e(this);
                t.parent().find(".tp-rightarrow").click()
            })
        },
        revprev: function(t) {
            return this.each(function() {
                var t = e(this);
                t.parent().find(".tp-leftarrow").click()
            })
        },
        revmaxslide: function(t) {
            return e(this).find(">ul:first-child >li").length
        },
        revcurrentslide: function(t) {
            var n = e(this);
            var r = n.parent().find(".tp-bannertimer");
            var i = r.data("opt");
            return i.act
        },
        revlastslide: function(t) {
            var n = e(this);
            var r = n.parent().find(".tp-bannertimer");
            var i = r.data("opt");
            return i.lastslide
        },
        revshowslide: function(t) {
            return this.each(function() {
                var n = e(this);
                n.data("showus", t);
                n.parent().find(".tp-rightarrow").click()
            })
        }
    });
    var N = function(n, r, i) {
        x(n, 0);
        var s = setInterval(function() {
            i.bannertimeronpause = true;
            i.container.trigger("stoptimer");
            i.cd = 0;
            var o = 0;
            n.find("img, .defaultimg").each(function(t) {
                if (e(this).data("lazydone") != 1) {
                    o++
                }
            });
            if (o > 0) x(n, o);
            else {
                clearInterval(s);
                if (r != t) r()
            }
        }, 100)
    };
})(jQuery);
(function(e) {
    "use strict";
    var t = e.GreenSockGlobals || e,
        n = function(e) {
            var n, r = e.split("."),
                i = t;
            for (n = 0; r.length > n; n++) i[r[n]] = i = i[r[n]] || {};
            return i
        },
        r = n("com.greensock.utils"),
        i = function(e) {
            var t = e.nodeType,
                n = "";
            if (1 === t || 9 === t || 11 === t) {
                if ("string" == typeof e.textContent) return e.textContent;
                for (e = e.firstChild; e; e = e.nextSibling) n += i(e)
            } else if (3 === t || 4 === t) return e.nodeValue;
            return n
        },
        s = document,
        o = s.defaultView ? s.defaultView.getComputedStyle : function() {},
        u = /([A-Z])/g,
        a = function(e, t, n, r) {
            var i;
            return (n = n || o(e, null)) ? (e = n.getPropertyValue(t.replace(u, "-$1").toLowerCase()), i = e || n.length ? e : n[t]) : e.currentStyle && (n = e.currentStyle, i = n[t]), r ? i : parseInt(i, 10) || 0
        },
        f = function(e) {
            return e.length && e[0] && (e[0].nodeType && e[0].style && !e.nodeType || e[0].length && e[0][0]) ? !0 : !1
        },
        l = function(e) {
            var t, n, r, i = [],
                s = e.length;
            for (t = 0; s > t; t++)
                if (n = e[t], f(n))
                    for (r = n.length, r = 0; n.length > r; r++) i.push(n[r]);
                else i.push(n);
            return i
        },
        c = ")eefec303079ad17405c",
        h = /(?:<br>|<br\/>|<br \/>)/gi,
        p = s.all && !s.addEventListener,
        d = "<div style='position:relative;display:inline-block;" + (p ? "*display:inline;*zoom:1;'" : "'"),
        v = function(e) {
            e = e || "";
            var t = -1 !== e.indexOf("++"),
                n = 1;
            return t && (e = e.split("++").join("")),
                function() {
                    return d + (e ? " class='" + e + (t ? n++ : "") + "'>" : ">")
                }
        },
        m = r.SplitText = t.SplitText = function(e, t) {
            if ("string" == typeof e && (e = m.selector(e)), !e) throw "cannot split a null element.";
            this.elements = f(e) ? l(e) : [e], this.chars = [], this.words = [], this.lines = [], this._originals = [], this.vars = t || {}, this.split(t)
        },
        g = function(e, t, n, r, u) {
            h.test(e.innerHTML) && (e.innerHTML = e.innerHTML.replace(h, c));
            var f, l, p, d, m, g, y, b, w, E, S, x, T, N = i(e),
                C = t.type || t.split || "chars,words,lines",
                k = -1 !== C.indexOf("lines") ? [] : null,
                L = -1 !== C.indexOf("words"),
                A = -1 !== C.indexOf("chars"),
                O = "absolute" === t.position || t.absolute === !0,
                M = O ? "&#173; " : " ",
                _ = -999,
                D = o(e),
                P = a(e, "paddingLeft", D),
                H = a(e, "borderBottomWidth", D) + a(e, "borderTopWidth", D),
                B = a(e, "borderLeftWidth", D) + a(e, "borderRightWidth", D),
                j = a(e, "paddingTop", D) + a(e, "paddingBottom", D),
                F = a(e, "paddingLeft", D) + a(e, "paddingRight", D),
                I = a(e, "textAlign", D, !0),
                q = e.clientHeight,
                R = e.clientWidth,
                U = N.length,
                z = "</div>",
                W = v(t.wordsClass),
                X = v(t.charsClass),
                V = -1 !== (t.linesClass || "").indexOf("++"),
                $ = t.linesClass;
            for (V && ($ = $.split("++").join("")), p = W(), d = 0; U > d; d++) g = N.charAt(d), ")" === g && N.substr(d, 20) === c ? (p += z + "<BR/>", d !== U - 1 && (p += " " + W()), d += 19) : " " === g && " " !== N.charAt(d - 1) && d !== U - 1 ? (p += z, d !== U - 1 && (p += M + W())) : p += A && " " !== g ? X() + g + "</div>" : g;
            for (e.innerHTML = p + z, m = e.getElementsByTagName("*"), U = m.length, y = [], d = 0; U > d; d++) y[d] = m[d];
            if (k || O)
                for (d = 0; U > d; d++) b = y[d], l = b.parentNode === e, (l || O || A && !L) && (w = b.offsetTop, k && l && w !== _ && "BR" !== b.nodeName && (f = [], k.push(f), _ = w), O && (b._x = b.offsetLeft, b._y = w, b._w = b.offsetWidth, b._h = b.offsetHeight), k && (L !== l && A || (f.push(b), b._x -= P), l && d && (y[d - 1]._wordEnd = !0)));
            for (d = 0; U > d; d++) b = y[d], l = b.parentNode === e, "BR" !== b.nodeName ? (O && (S = b.style, L || l || (b._x += b.parentNode._x, b._y += b.parentNode._y), S.left = b._x + "px", S.top = b._y + "px", S.position = "absolute", S.display = "block", S.width = b._w + 1 + "px", S.height = b._h + "px"), L ? l ? r.push(b) : A && n.push(b) : l ? (e.removeChild(b), y.splice(d--, 1), U--) : !l && A && (w = !k && !O && b.nextSibling, e.appendChild(b), w || e.appendChild(s.createTextNode(" ")), n.push(b))) : k || O ? (e.removeChild(b), y.splice(d--, 1), U--) : L || e.appendChild(b);
            if (k) {
                for (O && (E = s.createElement("div"), e.appendChild(E), x = E.offsetWidth + "px", w = E.offsetParent === e ? 0 : e.offsetLeft, e.removeChild(E)), S = e.style.cssText, e.style.cssText = "display:none;"; e.firstChild;) e.removeChild(e.firstChild);
                for (T = !O || !L && !A, d = 0; k.length > d; d++) {
                    for (f = k[d], E = s.createElement("div"), E.style.cssText = "display:block;text-align:" + I + ";position:" + (O ? "absolute;" : "relative;"), $ && (E.className = $ + (V ? d + 1 : "")), u.push(E), U = f.length, m = 0; U > m; m++) "BR" !== f[m].nodeName && (b = f[m], E.appendChild(b), T && (b._wordEnd || L) && E.appendChild(s.createTextNode(" ")), O && (0 === m && (E.style.top = b._y + "px", E.style.left = P + w + "px"), b.style.top = "0px", w && (b.style.left = b._x - w + "px")));
                    L || A || (E.innerHTML = i(E).split(String.fromCharCode(160)).join(" ")), O && (E.style.width = x, E.style.height = b._h + "px"), e.appendChild(E)
                }
                e.style.cssText = S
            }
            O && (q > e.clientHeight && (e.style.height = q - j + "px", q > e.clientHeight && (e.style.height = q + H + "px")), R > e.clientWidth && (e.style.width = R - F + "px", R > e.clientWidth && (e.style.width = R + B + "px")))
        },
        y = m.prototype;
    y.split = function(e) {
        this.isSplit && this.revert(), this.vars = e || this.vars, this._originals.length = this.chars.length = this.words.length = this.lines.length = 0;
        for (var t = 0; this.elements.length > t; t++) this._originals[t] = this.elements[t].innerHTML, g(this.elements[t], this.vars, this.chars, this.words, this.lines);
        return this.isSplit = !0, this
    }, y.revert = function() {
        if (!this._originals) throw "revert() call wasn't scoped properly.";
        for (var e = this._originals.length; --e > -1;) this.elements[e].innerHTML = this._originals[e];
        return this.chars = [], this.words = [], this.lines = [], this.isSplit = !1, this
    }, m.selector = e.$ || e.jQuery || function(t) {
        return e.$ ? (m.selector = e.$, e.$(t)) : s ? s.getElementById("#" === t.charAt(0) ? t.substr(1) : t) : t
    }
})(window || {})

jQuery(document).ready(function() {
    "use strict";
    /* Navigation */
    /* Mega Menu */
    jQuery('.mega-menu-title').on('click', function() {
        if (jQuery('.mega-menu-category').is(':visible')) {
            jQuery('.mega-menu-category').slideUp();
        } else {
            jQuery('.mega-menu-category').slideDown();
        }
    });


    jQuery('.mega-menu-category .nav > li').hover(function() {
        jQuery(this).addClass("active");
        jQuery(this).find('.popup').stop(true, true).fadeIn('slow');
    }, function() {
        jQuery(this).removeClass("active");
        jQuery(this).find('.popup').stop(true, true).fadeOut('slow');
    });


    jQuery('.mega-menu-category .nav > li.view-more-cat').on('click', function(e) {
        if (jQuery('.mega-menu-category .nav > li.more-menu').is(':visible')) {
            jQuery('.mega-menu-category .nav > li.more-menu').stop().slideUp();
            jQuery(this).find('a').text('More');
        } else {
            jQuery('.mega-menu-category .nav > li.more-menu').stop().slideDown();
            jQuery(this).find('a').text('Close menu');
            jQuery(this).find('a').addClass('menu-hide');

        }
        e.preventDefault();
    });


    /* Bestsell slider */
    jQuery("#bestsell-slider .slider-items").owlCarousel({
        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1024, 3], //5 items between 1024px and 901px
        itemsDesktopSmall: [900, 3], // 3 items betweem 900px and 601px
        itemsTablet: [768, 2], //2 items between 600 and 0;
        itemsMobile: [360, 1],
        navigation: true,
        navigationText: ["<a class=\"flex-prev\"></a>", "<a class=\"flex-next\"></a>"],
        slideSpeed: 500,
        pagination: false
    });
    /* Featured slider */
    jQuery("#featured-slider .slider-items").owlCarousel({
        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1024, 3], //5 items between 1024px and 901px
        itemsDesktopSmall: [900, 3], // 3 items betweem 900px and 601px
        itemsTablet: [768, 2], //2 items between 600 and 0;
        itemsMobile: [360, 1],
        navigation: true,
        navigationText: ["<a class=\"flex-prev\"></a>", "<a class=\"flex-next\"></a>"],
        slideSpeed: 500,
        pagination: false
    });
    /* New arrivals slider */
    jQuery("#new-arrivals-slider .slider-items").owlCarousel({
        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1024, 3], //5 items between 1024px and 901px
        itemsDesktopSmall: [900, 3], // 3 items betweem 900px and 601px
        itemsTablet: [768, 2], //2 items between 600 and 0;
        itemsMobile: [360, 1],
        navigation: true,
        navigationText: ["<a class=\"flex-prev\"></a>", "<a class=\"flex-next\"></a>"],
        slideSpeed: 500,
        pagination: false
    });
    /* Brand logo slider */
    jQuery("#brand-logo-slider .slider-items").owlCarousel({
        autoPlay: true,
        items: 6, //10 items above 1000px browser width
        itemsDesktop: [1024, 4], //5 items between 1024px and 901px
        itemsDesktopSmall: [900, 3], // 3 items betweem 900px and 601px
        itemsTablet: [600, 2], //2 items between 600 and 0;
        itemsMobile: [320, 1],
        navigation: true,
        navigationText: ["<a class=\"flex-prev\"></a>", "<a class=\"flex-next\"></a>"],
        slideSpeed: 500,
        pagination: false
    });
    /* Category desc slider */
    jQuery("#category-desc-slider .slider-items").owlCarousel({
        autoPlay: true,
        items: 1, //10 items above 1000px browser width
        itemsDesktop: [1024, 1], //5 items between 1024px and 901px
        itemsDesktopSmall: [900, 1], // 3 items betweem 900px and 601px
        itemsTablet: [600, 1], //2 items between 600 and 0;
        itemsMobile: [320, 1],
        navigation: true,
        navigationText: ["<a class=\"flex-prev\"></a>", "<a class=\"flex-next\"></a>"],
        slideSpeed: 500,
        pagination: false
    });
    /* Related products slider */
    jQuery("#related-products-slider .slider-items").owlCarousel({
        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1024, 4], //5 items between 1024px and 901px
        itemsDesktopSmall: [900, 3], // 3 items betweem 900px and 601px
        itemsTablet: [600, 2], //2 items between 600 and 0;
        itemsMobile: [360, 1],
        navigation: true,
        navigationText: ["<a class=\"flex-prev\"></a>", "<a class=\"flex-next\"></a>"],
        slideSpeed: 500,
        pagination: false
    });
    /* Upsell products slider */
    jQuery("#upsell-products-slider .slider-items").owlCarousel({
        items: 4, //10 items above 1000px browser width
        itemsDesktop: [1024, 4], //5 items between 1024px and 901px
        itemsDesktopSmall: [900, 3], // 3 items betweem 900px and 601px
        itemsTablet: [600, 2], //2 items between 600 and 0;
        itemsMobile: [360, 1],
        navigation: true,
        navigationText: ["<a class=\"flex-prev\"></a>", "<a class=\"flex-next\"></a>"],
        slideSpeed: 500,
        pagination: false
    });
    /* testimonials slider */
    jQuery("#testimonials-slider .slider-items").owlCarousel({
        autoPlay: true,
        items: 1,
        itemsDesktop: [1024, 1],
        itemsDesktopSmall: [900, 1],
        itemsTablet: [640, 1],
        itemsMobile: [390, 1],
        navigation: false,
        navigationText: ['<a class="flex-prev"></a>', '<a class="flex-next"></a>'],
        slideSpeed: 500,
        pagination: false

    });

    /* Mobile menu */
    jQuery("#mobile-menu").mobileMenu({
        MenuWidth: 250,
        SlideSpeed: 300,
        WindowsMaxWidth: 767,
        PagePush: true,
        FromLeft: true,
        Overlay: true,
        CollapseMenu: true,
        ClassName: "mobile-menu"
    });
    /* side nav categories */
    if (jQuery('.subDropdown')[0]) {
        jQuery('.subDropdown').on("click", function() {
            jQuery(this).toggleClass('plus');
            jQuery(this).toggleClass('minus');
            jQuery(this).parent().find('ul').slideToggle();
        });
    }
    jQuery.extend(jQuery.easing, {
        easeInCubic: function(x, t, b, c, d) {
            return c * (t /= d) * t * t + b;
        },
        easeOutCubic: function(x, t, b, c, d) {
            return c * ((t = t / d - 1) * t * t + 1) + b;
        },
    });
    (function(jQuery) {
        jQuery.fn.extend({
            accordion: function() {
                return this.each(function() {
                    function activate(el, effect) {
                        jQuery(el).siblings(panelSelector)[(effect || activationEffect)](((effect == "show") ? activationEffectSpeed : false), function() {
                            jQuery(el).parents().show();
                        });
                    }
                });
            }
        });
    })(jQuery);
    jQuery(function(jQuery) {
        jQuery('.accordion').accordion();
        jQuery('.accordion').each(function(index) {
            var activeItems = jQuery(this).find('li.active');
            activeItems.each(function(i) {
                jQuery(this).children('ul').css('display', 'block');
                if (i == activeItems.length - 1) {
                    jQuery(this).addClass("current");
                }
            });
        });
    });
    /* Top Cart js */
    function slideEffectAjax() {
        jQuery('.top-cart-contain').mouseenter(function() {
            jQuery(this).find(".top-cart-content").stop(true, true).slideDown();
        });
        jQuery('.top-cart-contain').mouseleave(function() {
            jQuery(this).find(".top-cart-content").stop(true, true).slideUp();
        });
    }
    jQuery(document).ready(function() {
        slideEffectAjax();
    });
    /*  sticky header  */
    jQuery(window).scroll(function() {
        jQuery(this).scrollTop() > 1 ? jQuery("nav").addClass("sticky-header") : jQuery("nav").removeClass("sticky-header")
    });
});
/*  UItoTop */
jQuery.fn.UItoTop = function(options) {
    var defaults = {
        text: '',
        min: 200,
        inDelay: 600,
        outDelay: 400,
        containerID: 'toTop',
        containerHoverID: 'toTopHover',
        scrollSpeed: 1200,
        easingType: 'linear'
    };
    var settings = jQuery.extend(defaults, options);
    var containerIDhash = '#' + settings.containerID;
    var containerHoverIDHash = '#' + settings.containerHoverID;
    jQuery('body').append('<a href="#" id="' + settings.containerID + '">' + settings.text + '</a>');
    jQuery(containerIDhash).hide().on("click", function() {
        jQuery('html, body').animate({
            scrollTop: 0
        }, settings.scrollSpeed, settings.easingType);
        jQuery('#' + settings.containerHoverID, this).stop().animate({
            'opacity': 0
        }, settings.inDelay, settings.easingType);
        return false;
    }).prepend('<span id="' + settings.containerHoverID + '"></span>').hover(function() {
        jQuery(containerHoverIDHash, this).stop().animate({
            'opacity': 1
        }, 600, 'linear');
    }, function() {
        jQuery(containerHoverIDHash, this).stop().animate({
            'opacity': 0
        }, 700, 'linear');
    });
    jQuery(window).scroll(function() {
        var sd = jQuery(window).scrollTop();
        if (typeof document.body.style.maxHeight === "undefined") {
            jQuery(containerIDhash).css({
                'position': 'absolute',
                'top': jQuery(window).scrollTop() + jQuery(window).height() - 50
            });
        }
        if (sd > settings.min) jQuery(containerIDhash).fadeIn(settings.inDelay);
        else jQuery(containerIDhash).fadeOut(settings.Outdelay);
    });
};
/* mobileMenu */
var isTouchDevice = ('ontouchstart' in window) || (navigator.msMaxTouchPoints > 0);
jQuery(window).on("load", function() {
    if (isTouchDevice) {
        jQuery('#nav a.level-top').on("click", function(e) {
            jQueryt = jQuery(this);
            jQueryparent = jQueryt.parent();
            if (jQueryparent.hasClass('parent')) {
                if (!jQueryt.hasClass('menu-ready')) {
                    jQuery('#nav a.level-top').removeClass('menu-ready');
                    jQueryt.addClass('menu-ready');
                    return false;
                } else {
                    jQueryt.removeClass('menu-ready');
                }
            }
        });
    }
    jQuery().UItoTop();
});

/*
 * jQuery FlexSlider v2.2.0
 * Copyright 2012 WooThemes
 * Contributing Author: Tyler Smith
 */
;
(function ($) {

  //FlexSlider: Object Instance
  $.flexslider = function(el, options) {
    var slider = $(el);

    // making variables public
    slider.vars = $.extend({}, $.flexslider.defaults, options);

    var namespace = slider.vars.namespace,
        msGesture = window.navigator && window.navigator.msPointerEnabled && window.MSGesture,
        touch = (( "ontouchstart" in window ) || msGesture || window.DocumentTouch && document instanceof DocumentTouch) && slider.vars.touch,
        // depricating this idea, as devices are being released with both of these events
        //eventType = (touch) ? "touchend" : "click",
        eventType = "click touchend MSPointerUp",
        watchedEvent = "",
        watchedEventClearTimer,
        vertical = slider.vars.direction === "vertical",
        reverse = slider.vars.reverse,
        carousel = (slider.vars.itemWidth > 0),
        fade = slider.vars.animation === "fade",
        asNav = slider.vars.asNavFor !== "",
        methods = {},
        focused = true;

    // Store a reference to the slider object
    $.data(el, "flexslider", slider);

    // Private slider methods
    methods = {
      init: function() {
        slider.animating = false;
        // Get current slide and make sure it is a number
        slider.currentSlide = parseInt( ( slider.vars.startAt ? slider.vars.startAt : 0) );
        if ( isNaN( slider.currentSlide ) ) slider.currentSlide = 0;
        slider.animatingTo = slider.currentSlide;
        slider.atEnd = (slider.currentSlide === 0 || slider.currentSlide === slider.last);
        slider.containerSelector = slider.vars.selector.substr(0,slider.vars.selector.search(' '));
        slider.slides = $(slider.vars.selector, slider);
        slider.container = $(slider.containerSelector, slider);
        slider.count = slider.slides.length;
        // SYNC:
        slider.syncExists = $(slider.vars.sync).length > 0;
        // SLIDE:
        if (slider.vars.animation === "slide") slider.vars.animation = "swing";
        slider.prop = (vertical) ? "top" : "marginLeft";
        slider.args = {};
        // SLIDESHOW:
        slider.manualPause = false;
        slider.stopped = false;
        //PAUSE WHEN INVISIBLE
        slider.started = false;
        slider.startTimeout = null;
        // TOUCH/USECSS:
        slider.transitions = !slider.vars.video && !fade && slider.vars.useCSS && (function() {
          var obj = document.createElement('div'),
              props = ['perspectiveProperty', 'WebkitPerspective', 'MozPerspective', 'OPerspective', 'msPerspective'];
          for (var i in props) {
            if ( obj.style[ props[i] ] !== undefined ) {
              slider.pfx = props[i].replace('Perspective','').toLowerCase();
              slider.prop = "-" + slider.pfx + "-transform";
              return true;
            }
          }
          return false;
        }());
        // CONTROLSCONTAINER:
        if (slider.vars.controlsContainer !== "") slider.controlsContainer = $(slider.vars.controlsContainer).length > 0 && $(slider.vars.controlsContainer);
        // MANUAL:
        if (slider.vars.manualControls !== "") slider.manualControls = $(slider.vars.manualControls).length > 0 && $(slider.vars.manualControls);

        // RANDOMIZE:
        if (slider.vars.randomize) {
          slider.slides.sort(function() { return (Math.round(Math.random())-0.5); });
          slider.container.empty().append(slider.slides);
        }

        slider.doMath();

        // INIT
        slider.setup("init");

        // CONTROLNAV:
        if (slider.vars.controlNav) methods.controlNav.setup();

        // DIRECTIONNAV:
        if (slider.vars.directionNav) methods.directionNav.setup();

        // KEYBOARD:
        if (slider.vars.keyboard && ($(slider.containerSelector).length === 1 || slider.vars.multipleKeyboard)) {
          $(document).bind('keyup', function(event) {
            var keycode = event.keyCode;
            if (!slider.animating && (keycode === 39 || keycode === 37)) {
              var target = (keycode === 39) ? slider.getTarget('next') :
                           (keycode === 37) ? slider.getTarget('prev') : false;
              slider.flexAnimate(target, slider.vars.pauseOnAction);
            }
          });
        }
        // MOUSEWHEEL:
        if (slider.vars.mousewheel) {
          slider.bind('mousewheel', function(event, delta, deltaX, deltaY) {
            event.preventDefault();
            var target = (delta < 0) ? slider.getTarget('next') : slider.getTarget('prev');
            slider.flexAnimate(target, slider.vars.pauseOnAction);
          });
        }

        // PAUSEPLAY
        if (slider.vars.pausePlay) methods.pausePlay.setup();

        //PAUSE WHEN INVISIBLE
        if (slider.vars.slideshow && slider.vars.pauseInvisible) methods.pauseInvisible.init();

        // SLIDSESHOW
        if (slider.vars.slideshow) {
          if (slider.vars.pauseOnHover) {
            slider.hover(function() {
              if (!slider.manualPlay && !slider.manualPause) slider.pause();
            }, function() {
              if (!slider.manualPause && !slider.manualPlay && !slider.stopped) slider.play();
            });
          }
          // initialize animation
          //If we're visible, or we don't use PageVisibility API
          if(!slider.vars.pauseInvisible || !methods.pauseInvisible.isHidden()) {
            (slider.vars.initDelay > 0) ? slider.startTimeout = setTimeout(slider.play, slider.vars.initDelay) : slider.play();
          }
        }

        // ASNAV:
        if (asNav) methods.asNav.setup();

        // TOUCH
        if (touch && slider.vars.touch) methods.touch();

        // FADE&&SMOOTHHEIGHT || SLIDE:
        if (!fade || (fade && slider.vars.smoothHeight)) $(window).bind("resize orientationchange focus", methods.resize);

        slider.find("img").attr("draggable", "false");

        // API: start() Callback
        setTimeout(function(){
          slider.vars.start(slider);
        }, 200);
      },
      asNav: {
        setup: function() {
          slider.asNav = true;
          slider.animatingTo = Math.floor(slider.currentSlide/slider.move);
          slider.currentItem = slider.currentSlide;
          slider.slides.removeClass(namespace + "active-slide").eq(slider.currentItem).addClass(namespace + "active-slide");
          if(!msGesture){
              slider.slides.click(function(e){
                e.preventDefault();
                var $slide = $(this),
                    target = $slide.index();
                var posFromLeft = $slide.offset().left - $(slider).scrollLeft(); // Find position of slide relative to left of slider container
                if( posFromLeft <= 0 && $slide.hasClass( namespace + 'active-slide' ) ) {
                  slider.flexAnimate(slider.getTarget("prev"), true);
                } else if (!$(slider.vars.asNavFor).data('flexslider').animating && !$slide.hasClass(namespace + "active-slide")) {
                  slider.direction = (slider.currentItem < target) ? "next" : "prev";
                  slider.flexAnimate(target, slider.vars.pauseOnAction, false, true, true);
                }
              });
          }else{
              el._slider = slider;
              slider.slides.each(function (){
                  var that = this;
                  that._gesture = new MSGesture();
                  that._gesture.target = that;
                  that.addEventListener("MSPointerDown", function (e){
                      e.preventDefault();
                      if(e.currentTarget._gesture)
                          e.currentTarget._gesture.addPointer(e.pointerId);
                  }, false);
                  that.addEventListener("MSGestureTap", function (e){
                      e.preventDefault();
                      var $slide = $(this),
                          target = $slide.index();
                      if (!$(slider.vars.asNavFor).data('flexslider').animating && !$slide.hasClass('active')) {
                          slider.direction = (slider.currentItem < target) ? "next" : "prev";
                          slider.flexAnimate(target, slider.vars.pauseOnAction, false, true, true);
                      }
                  });
              });
          }
        }
      },
      controlNav: {
        setup: function() {
          if (!slider.manualControls) {
            methods.controlNav.setupPaging();
          } else { // MANUALCONTROLS:
            methods.controlNav.setupManual();
          }
        },
        setupPaging: function() {
          var type = (slider.vars.controlNav === "thumbnails") ? 'control-thumbs' : 'control-paging',
              j = 1,
              item,
              slide;

          slider.controlNavScaffold = $('<ol class="'+ namespace + 'control-nav ' + namespace + type + '"></ol>');

          if (slider.pagingCount > 1) {
            for (var i = 0; i < slider.pagingCount; i++) {
              slide = slider.slides.eq(i);
              item = (slider.vars.controlNav === "thumbnails") ? '<img src="' + slide.attr( 'data-thumb' ) + '"/>' : '<a>' + j + '</a>';
              if ( 'thumbnails' === slider.vars.controlNav && true === slider.vars.thumbCaptions ) {
                var captn = slide.attr( 'data-thumbcaption' );
                if ( '' != captn && undefined != captn ) item += '<span class="' + namespace + 'caption">' + captn + '</span>';
              }
              slider.controlNavScaffold.append('<li>' + item + '</li>');
              j++;
            }
          }

          // CONTROLSCONTAINER:
          (slider.controlsContainer) ? $(slider.controlsContainer).append(slider.controlNavScaffold) : slider.append(slider.controlNavScaffold);
          methods.controlNav.set();

          methods.controlNav.active();

          slider.controlNavScaffold.delegate('a, img', eventType, function(event) {
            event.preventDefault();

            if (watchedEvent === "" || watchedEvent === event.type) {
              var $this = $(this),
                  target = slider.controlNav.index($this);

              if (!$this.hasClass(namespace + 'active')) {
                slider.direction = (target > slider.currentSlide) ? "next" : "prev";
                slider.flexAnimate(target, slider.vars.pauseOnAction);
              }
            }

            // setup flags to prevent event duplication
            if (watchedEvent === "") {
              watchedEvent = event.type;
            }
            methods.setToClearWatchedEvent();

          });
        },
        setupManual: function() {
          slider.controlNav = slider.manualControls;
          methods.controlNav.active();

          slider.controlNav.bind(eventType, function(event) {
            event.preventDefault();

            if (watchedEvent === "" || watchedEvent === event.type) {
              var $this = $(this),
                  target = slider.controlNav.index($this);

              if (!$this.hasClass(namespace + 'active')) {
                (target > slider.currentSlide) ? slider.direction = "next" : slider.direction = "prev";
                slider.flexAnimate(target, slider.vars.pauseOnAction);
              }
            }

            // setup flags to prevent event duplication
            if (watchedEvent === "") {
              watchedEvent = event.type;
            }
            methods.setToClearWatchedEvent();
          });
        },
        set: function() {
          var selector = (slider.vars.controlNav === "thumbnails") ? 'img' : 'a';
          slider.controlNav = $('.' + namespace + 'control-nav li ' + selector, (slider.controlsContainer) ? slider.controlsContainer : slider);
        },
        active: function() {
          slider.controlNav.removeClass(namespace + "active").eq(slider.animatingTo).addClass(namespace + "active");
        },
        update: function(action, pos) {
          if (slider.pagingCount > 1 && action === "add") {
            slider.controlNavScaffold.append($('<li><a>' + slider.count + '</a></li>'));
          } else if (slider.pagingCount === 1) {
            slider.controlNavScaffold.find('li').remove();
          } else {
            slider.controlNav.eq(pos).closest('li').remove();
          }
          methods.controlNav.set();
          (slider.pagingCount > 1 && slider.pagingCount !== slider.controlNav.length) ? slider.update(pos, action) : methods.controlNav.active();
        }
      },
      directionNav: {
        setup: function() {
          var directionNavScaffold = $('<ul class="' + namespace + 'direction-nav"><li><a class="' + namespace + 'prev" href="#">' + slider.vars.prevText + '</a></li><li><a class="' + namespace + 'next" href="#">' + slider.vars.nextText + '</a></li></ul>');

          // CONTROLSCONTAINER:
          if (slider.controlsContainer) {
            $(slider.controlsContainer).append(directionNavScaffold);
            slider.directionNav = $('.' + namespace + 'direction-nav li a', slider.controlsContainer);
          } else {
            slider.append(directionNavScaffold);
            slider.directionNav = $('.' + namespace + 'direction-nav li a', slider);
          }

          methods.directionNav.update();

          slider.directionNav.bind(eventType, function(event) {
            event.preventDefault();
            var target,
                disabledClass = namespace + 'disabled';

            if($(this).hasClass(disabledClass)){
                return this;
            }

            if (watchedEvent === "" || watchedEvent === event.type) {
              target = ($(this).hasClass(namespace + 'next')) ? slider.getTarget('next') : slider.getTarget('prev');
              slider.flexAnimate(target, slider.vars.pauseOnAction);
            }

            // setup flags to prevent event duplication
            if (watchedEvent === "") {
              watchedEvent = event.type;
            }
            methods.setToClearWatchedEvent();
          });
        },
        update: function() {
          var disabledClass = namespace + 'disabled';
          if (slider.pagingCount === 1) {
            slider.directionNav.addClass(disabledClass).attr('tabindex', '-1');
          } else if (!slider.vars.animationLoop) {
            if (slider.animatingTo === 0) {
              slider.directionNav.removeClass(disabledClass).filter('.' + namespace + "prev").addClass(disabledClass).attr('tabindex', '-1');
            } else if (slider.animatingTo === slider.last) {
              slider.directionNav.removeClass(disabledClass).filter('.' + namespace + "next").addClass(disabledClass).attr('tabindex', '-1');
            } else {
              slider.directionNav.removeClass(disabledClass).removeAttr('tabindex');
            }
          } else {
            slider.directionNav.removeClass(disabledClass).removeAttr('tabindex');
          }
        }
      },
      pausePlay: {
        setup: function() {
          var pausePlayScaffold = $('<div class="' + namespace + 'pauseplay"><a></a></div>');

          // CONTROLSCONTAINER:
          if (slider.controlsContainer) {
            slider.controlsContainer.append(pausePlayScaffold);
            slider.pausePlay = $('.' + namespace + 'pauseplay a', slider.controlsContainer);
          } else {
            slider.append(pausePlayScaffold);
            slider.pausePlay = $('.' + namespace + 'pauseplay a', slider);
          }

          methods.pausePlay.update((slider.vars.slideshow) ? namespace + 'pause' : namespace + 'play');

          slider.pausePlay.bind(eventType, function(event) {
            event.preventDefault();

            if (watchedEvent === "" || watchedEvent === event.type) {
              if ($(this).hasClass(namespace + 'pause')) {
                slider.manualPause = true;
                slider.manualPlay = false;
                slider.pause();
              } else {
                slider.manualPause = false;
                slider.manualPlay = true;
                slider.play();
              }
            }

            // setup flags to prevent event duplication
            if (watchedEvent === "") {
              watchedEvent = event.type;
            }
            methods.setToClearWatchedEvent();
          });
        },
        update: function(state) {
          (state === "play") ? slider.pausePlay.removeClass(namespace + 'pause').addClass(namespace + 'play').html(slider.vars.playText) : slider.pausePlay.removeClass(namespace + 'play').addClass(namespace + 'pause').html(slider.vars.pauseText);
        }
      },
      touch: function() {
        var startX,
          startY,
          offset,
          cwidth,
          dx,
          startT,
          scrolling = false,
          localX = 0,
          localY = 0,
          accDx = 0;

        if(!msGesture){
            el.addEventListener('touchstart', onTouchStart, false);

            function onTouchStart(e) {
              if (slider.animating) {
                e.preventDefault();
              } else if ( ( window.navigator.msPointerEnabled ) || e.touches.length === 1 ) {
                slider.pause();
                // CAROUSEL:
                cwidth = (vertical) ? slider.h : slider. w;
                startT = Number(new Date());
                // CAROUSEL:

                // Local vars for X and Y points.
                localX = e.touches[0].pageX;
                localY = e.touches[0].pageY;

                offset = (carousel && reverse && slider.animatingTo === slider.last) ? 0 :
                         (carousel && reverse) ? slider.limit - (((slider.itemW + slider.vars.itemMargin) * slider.move) * slider.animatingTo) :
                         (carousel && slider.currentSlide === slider.last) ? slider.limit :
                         (carousel) ? ((slider.itemW + slider.vars.itemMargin) * slider.move) * slider.currentSlide :
                         (reverse) ? (slider.last - slider.currentSlide + slider.cloneOffset) * cwidth : (slider.currentSlide + slider.cloneOffset) * cwidth;
                startX = (vertical) ? localY : localX;
                startY = (vertical) ? localX : localY;

                el.addEventListener('touchmove', onTouchMove, false);
                el.addEventListener('touchend', onTouchEnd, false);
              }
            }

            function onTouchMove(e) {
              // Local vars for X and Y points.

              localX = e.touches[0].pageX;
              localY = e.touches[0].pageY;

              dx = (vertical) ? startX - localY : startX - localX;
              scrolling = (vertical) ? (Math.abs(dx) < Math.abs(localX - startY)) : (Math.abs(dx) < Math.abs(localY - startY));

              var fxms = 500;

              if ( ! scrolling || Number( new Date() ) - startT > fxms ) {
                e.preventDefault();
                if (!fade && slider.transitions) {
                  if (!slider.vars.animationLoop) {
                    dx = dx/((slider.currentSlide === 0 && dx < 0 || slider.currentSlide === slider.last && dx > 0) ? (Math.abs(dx)/cwidth+2) : 1);
                  }
                  slider.setProps(offset + dx, "setTouch");
                }
              }
            }

            function onTouchEnd(e) {
              // finish the touch by undoing the touch session
              el.removeEventListener('touchmove', onTouchMove, false);

              if (slider.animatingTo === slider.currentSlide && !scrolling && !(dx === null)) {
                var updateDx = (reverse) ? -dx : dx,
                    target = (updateDx > 0) ? slider.getTarget('next') : slider.getTarget('prev');

                if (slider.canAdvance(target) && (Number(new Date()) - startT < 550 && Math.abs(updateDx) > 50 || Math.abs(updateDx) > cwidth/2)) {
                  slider.flexAnimate(target, slider.vars.pauseOnAction);
                } else {
                  if (!fade) slider.flexAnimate(slider.currentSlide, slider.vars.pauseOnAction, true);
                }
              }
              el.removeEventListener('touchend', onTouchEnd, false);

              startX = null;
              startY = null;
              dx = null;
              offset = null;
            }
        }else{
            el.style.msTouchAction = "none";
            el._gesture = new MSGesture();
            el._gesture.target = el;
            el.addEventListener("MSPointerDown", onMSPointerDown, false);
            el._slider = slider;
            el.addEventListener("MSGestureChange", onMSGestureChange, false);
            el.addEventListener("MSGestureEnd", onMSGestureEnd, false);

            function onMSPointerDown(e){
                e.stopPropagation();
                if (slider.animating) {
                    e.preventDefault();
                }else{
                    slider.pause();
                    el._gesture.addPointer(e.pointerId);
                    accDx = 0;
                    cwidth = (vertical) ? slider.h : slider. w;
                    startT = Number(new Date());
                    // CAROUSEL:

                    offset = (carousel && reverse && slider.animatingTo === slider.last) ? 0 :
                        (carousel && reverse) ? slider.limit - (((slider.itemW + slider.vars.itemMargin) * slider.move) * slider.animatingTo) :
                            (carousel && slider.currentSlide === slider.last) ? slider.limit :
                                (carousel) ? ((slider.itemW + slider.vars.itemMargin) * slider.move) * slider.currentSlide :
                                    (reverse) ? (slider.last - slider.currentSlide + slider.cloneOffset) * cwidth : (slider.currentSlide + slider.cloneOffset) * cwidth;
                }
            }

            function onMSGestureChange(e) {
                e.stopPropagation();
                var slider = e.target._slider;
                if(!slider){
                    return;
                }
                var transX = -e.translationX,
                    transY = -e.translationY;

                //Accumulate translations.
                accDx = accDx + ((vertical) ? transY : transX);
                dx = accDx;
                scrolling = (vertical) ? (Math.abs(accDx) < Math.abs(-transX)) : (Math.abs(accDx) < Math.abs(-transY));

                if(e.detail === e.MSGESTURE_FLAG_INERTIA){
                    setImmediate(function (){
                        el._gesture.stop();
                    });

                    return;
                }

                if (!scrolling || Number(new Date()) - startT > 500) {
                    e.preventDefault();
                    if (!fade && slider.transitions) {
                        if (!slider.vars.animationLoop) {
                            dx = accDx / ((slider.currentSlide === 0 && accDx < 0 || slider.currentSlide === slider.last && accDx > 0) ? (Math.abs(accDx) / cwidth + 2) : 1);
                        }
                        slider.setProps(offset + dx, "setTouch");
                    }
                }
            }

            function onMSGestureEnd(e) {
                e.stopPropagation();
                var slider = e.target._slider;
                if(!slider){
                    return;
                }
                if (slider.animatingTo === slider.currentSlide && !scrolling && !(dx === null)) {
                    var updateDx = (reverse) ? -dx : dx,
                        target = (updateDx > 0) ? slider.getTarget('next') : slider.getTarget('prev');

                    if (slider.canAdvance(target) && (Number(new Date()) - startT < 550 && Math.abs(updateDx) > 50 || Math.abs(updateDx) > cwidth/2)) {
                        slider.flexAnimate(target, slider.vars.pauseOnAction);
                    } else {
                        if (!fade) slider.flexAnimate(slider.currentSlide, slider.vars.pauseOnAction, true);
                    }
                }

                startX = null;
                startY = null;
                dx = null;
                offset = null;
                accDx = 0;
            }
        }
      },
      resize: function() {
        if (!slider.animating && slider.is(':visible')) {
          if (!carousel) slider.doMath();

          if (fade) {
            // SMOOTH HEIGHT:
            methods.smoothHeight();
          } else if (carousel) { //CAROUSEL:
            slider.slides.width(slider.computedW);
            slider.update(slider.pagingCount);
            slider.setProps();
          }
          else if (vertical) { //VERTICAL:
            slider.viewport.height(slider.h);
            slider.setProps(slider.h, "setTotal");
          } else {
            // SMOOTH HEIGHT:
            if (slider.vars.smoothHeight) methods.smoothHeight();
            slider.newSlides.width(slider.computedW);
            slider.setProps(slider.computedW, "setTotal");
          }
        }
      },
      smoothHeight: function(dur) {
        if (!vertical || fade) {
          var $obj = (fade) ? slider : slider.viewport;
          (dur) ? $obj.animate({"height": slider.slides.eq(slider.animatingTo).height()}, dur) : $obj.height(slider.slides.eq(slider.animatingTo).height());
        }
      },
      sync: function(action) {
        var $obj = $(slider.vars.sync).data("flexslider"),
            target = slider.animatingTo;

        switch (action) {
          case "animate": $obj.flexAnimate(target, slider.vars.pauseOnAction, false, true); break;
          case "play": if (!$obj.playing && !$obj.asNav) { $obj.play(); } break;
          case "pause": $obj.pause(); break;
        }
      },
      pauseInvisible: {
        visProp: null,
        init: function() {
          var prefixes = ['webkit','moz','ms','o'];

          if ('hidden' in document) return 'hidden';
          for (var i = 0; i < prefixes.length; i++) {
            if ((prefixes[i] + 'Hidden') in document) 
            methods.pauseInvisible.visProp = prefixes[i] + 'Hidden';
          }
          if (methods.pauseInvisible.visProp) {
            var evtname = methods.pauseInvisible.visProp.replace(/[H|h]idden/,'') + 'visibilitychange';
            document.addEventListener(evtname, function() {
              if (methods.pauseInvisible.isHidden()) {
                if(slider.startTimeout) clearTimeout(slider.startTimeout); //If clock is ticking, stop timer and prevent from starting while invisible
                else slider.pause(); //Or just pause
              }
              else {
                if(slider.started) slider.play(); //Initiated before, just play
                else (slider.vars.initDelay > 0) ? setTimeout(slider.play, slider.vars.initDelay) : slider.play(); //Didn't init before: simply init or wait for it
              }
            });
          }       
        },
        isHidden: function() {
          return document[methods.pauseInvisible.visProp] || false;
        }
      },
      setToClearWatchedEvent: function() {
        clearTimeout(watchedEventClearTimer);
        watchedEventClearTimer = setTimeout(function() {
          watchedEvent = "";
        }, 3000);
      }
    }

    // public methods
    slider.flexAnimate = function(target, pause, override, withSync, fromNav) {
      if (!slider.vars.animationLoop && target !== slider.currentSlide) {
        slider.direction = (target > slider.currentSlide) ? "next" : "prev";
      }

      if (asNav && slider.pagingCount === 1) slider.direction = (slider.currentItem < target) ? "next" : "prev";

      if (!slider.animating && (slider.canAdvance(target, fromNav) || override) && slider.is(":visible")) {
        if (asNav && withSync) {
          var master = $(slider.vars.asNavFor).data('flexslider');
          slider.atEnd = target === 0 || target === slider.count - 1;
          master.flexAnimate(target, true, false, true, fromNav);
          slider.direction = (slider.currentItem < target) ? "next" : "prev";
          master.direction = slider.direction;

          if (Math.ceil((target + 1)/slider.visible) - 1 !== slider.currentSlide && target !== 0) {
            slider.currentItem = target;
            slider.slides.removeClass(namespace + "active-slide").eq(target).addClass(namespace + "active-slide");
            target = Math.floor(target/slider.visible);
          } else {
            slider.currentItem = target;
            slider.slides.removeClass(namespace + "active-slide").eq(target).addClass(namespace + "active-slide");
            return false;
          }
        }

        slider.animating = true;
        slider.animatingTo = target;

        // SLIDESHOW:
        if (pause) slider.pause();

        // API: before() animation Callback
        slider.vars.before(slider);

        // SYNC:
        if (slider.syncExists && !fromNav) methods.sync("animate");

        // CONTROLNAV
        if (slider.vars.controlNav) methods.controlNav.active();

        // !CAROUSEL:
        // CANDIDATE: slide active class (for add/remove slide)
        if (!carousel) slider.slides.removeClass(namespace + 'active-slide').eq(target).addClass(namespace + 'active-slide');

        // INFINITE LOOP:
        // CANDIDATE: atEnd
        slider.atEnd = target === 0 || target === slider.last;

        // DIRECTIONNAV:
        if (slider.vars.directionNav) methods.directionNav.update();

        if (target === slider.last) {
          // API: end() of cycle Callback
          slider.vars.end(slider);
          // SLIDESHOW && !INFINITE LOOP:
          if (!slider.vars.animationLoop) slider.pause();
        }

        // SLIDE:
        if (!fade) {
          var dimension = (vertical) ? slider.slides.filter(':first').height() : slider.computedW,
              margin, slideString, calcNext;

          // INFINITE LOOP / REVERSE:
          if (carousel) {
            //margin = (slider.vars.itemWidth > slider.w) ? slider.vars.itemMargin * 2 : slider.vars.itemMargin;
            margin = slider.vars.itemMargin;
            calcNext = ((slider.itemW + margin) * slider.move) * slider.animatingTo;
            slideString = (calcNext > slider.limit && slider.visible !== 1) ? slider.limit : calcNext;
          } else if (slider.currentSlide === 0 && target === slider.count - 1 && slider.vars.animationLoop && slider.direction !== "next") {
            slideString = (reverse) ? (slider.count + slider.cloneOffset) * dimension : 0;
          } else if (slider.currentSlide === slider.last && target === 0 && slider.vars.animationLoop && slider.direction !== "prev") {
            slideString = (reverse) ? 0 : (slider.count + 1) * dimension;
          } else {
            slideString = (reverse) ? ((slider.count - 1) - target + slider.cloneOffset) * dimension : (target + slider.cloneOffset) * dimension;
          }
          slider.setProps(slideString, "", slider.vars.animationSpeed);
          if (slider.transitions) {
            if (!slider.vars.animationLoop || !slider.atEnd) {
              slider.animating = false;
              slider.currentSlide = slider.animatingTo;
            }
            slider.container.unbind("webkitTransitionEnd transitionend");
            slider.container.bind("webkitTransitionEnd transitionend", function() {
              slider.wrapup(dimension);
            });
          } else {
            slider.container.animate(slider.args, slider.vars.animationSpeed, slider.vars.easing, function(){
              slider.wrapup(dimension);
            });
          }
        } else { // FADE:
          if (!touch) {
            //slider.slides.eq(slider.currentSlide).fadeOut(slider.vars.animationSpeed, slider.vars.easing);
            //slider.slides.eq(target).fadeIn(slider.vars.animationSpeed, slider.vars.easing, slider.wrapup);

            slider.slides.eq(slider.currentSlide).css({"zIndex": 1}).animate({"opacity": 0}, slider.vars.animationSpeed, slider.vars.easing);
            slider.slides.eq(target).css({"zIndex": 2}).animate({"opacity": 1}, slider.vars.animationSpeed, slider.vars.easing, slider.wrapup);

          } else {
            slider.slides.eq(slider.currentSlide).css({ "opacity": 0, "zIndex": 1 });
            slider.slides.eq(target).css({ "opacity": 1, "zIndex": 2 });
            slider.wrapup(dimension);
          }
        }
        // SMOOTH HEIGHT:
        if (slider.vars.smoothHeight) methods.smoothHeight(slider.vars.animationSpeed);
      }
    }
    slider.wrapup = function(dimension) {
      // SLIDE:
      if (!fade && !carousel) {
        if (slider.currentSlide === 0 && slider.animatingTo === slider.last && slider.vars.animationLoop) {
          slider.setProps(dimension, "jumpEnd");
        } else if (slider.currentSlide === slider.last && slider.animatingTo === 0 && slider.vars.animationLoop) {
          slider.setProps(dimension, "jumpStart");
        }
      }
      slider.animating = false;
      slider.currentSlide = slider.animatingTo;
      // API: after() animation Callback
      slider.vars.after(slider);
    }

    // SLIDESHOW:
    slider.animateSlides = function() {
      if (!slider.animating && focused ) slider.flexAnimate(slider.getTarget("next"));
    }
    // SLIDESHOW:
    slider.pause = function() {
      clearInterval(slider.animatedSlides);
      slider.animatedSlides = null;
      slider.playing = false;
      // PAUSEPLAY:
      if (slider.vars.pausePlay) methods.pausePlay.update("play");
      // SYNC:
      if (slider.syncExists) methods.sync("pause");
    }
    // SLIDESHOW:
    slider.play = function() {
      if (slider.playing) clearInterval(slider.animatedSlides);
      slider.animatedSlides = slider.animatedSlides || setInterval(slider.animateSlides, slider.vars.slideshowSpeed);
      slider.started = slider.playing = true;
      // PAUSEPLAY:
      if (slider.vars.pausePlay) methods.pausePlay.update("pause");
      // SYNC:
      if (slider.syncExists) methods.sync("play");
    }
    // STOP:
    slider.stop = function () {
      slider.pause();
      slider.stopped = true;
    }
    slider.canAdvance = function(target, fromNav) {
      // ASNAV:
      var last = (asNav) ? slider.pagingCount - 1 : slider.last;
      return (fromNav) ? true :
             (asNav && slider.currentItem === slider.count - 1 && target === 0 && slider.direction === "prev") ? true :
             (asNav && slider.currentItem === 0 && target === slider.pagingCount - 1 && slider.direction !== "next") ? false :
             (target === slider.currentSlide && !asNav) ? false :
             (slider.vars.animationLoop) ? true :
             (slider.atEnd && slider.currentSlide === 0 && target === last && slider.direction !== "next") ? false :
             (slider.atEnd && slider.currentSlide === last && target === 0 && slider.direction === "next") ? false :
             true;
    }
    slider.getTarget = function(dir) {
      slider.direction = dir;
      if (dir === "next") {
        return (slider.currentSlide === slider.last) ? 0 : slider.currentSlide + 1;
      } else {
        return (slider.currentSlide === 0) ? slider.last : slider.currentSlide - 1;
      }
    }

    // SLIDE:
    slider.setProps = function(pos, special, dur) {
      var target = (function() {
        var posCheck = (pos) ? pos : ((slider.itemW + slider.vars.itemMargin) * slider.move) * slider.animatingTo,
            posCalc = (function() {
              if (carousel) {
                return (special === "setTouch") ? pos :
                       (reverse && slider.animatingTo === slider.last) ? 0 :
                       (reverse) ? slider.limit - (((slider.itemW + slider.vars.itemMargin) * slider.move) * slider.animatingTo) :
                       (slider.animatingTo === slider.last) ? slider.limit : posCheck;
              } else {
                switch (special) {
                  case "setTotal": return (reverse) ? ((slider.count - 1) - slider.currentSlide + slider.cloneOffset) * pos : (slider.currentSlide + slider.cloneOffset) * pos;
                  case "setTouch": return (reverse) ? pos : pos;
                  case "jumpEnd": return (reverse) ? pos : slider.count * pos;
                  case "jumpStart": return (reverse) ? slider.count * pos : pos;
                  default: return pos;
                }
              }
            }());

            return (posCalc * -1) + "px";
          }());

      if (slider.transitions) {
        target = (vertical) ? "translate3d(0," + target + ",0)" : "translate3d(" + target + ",0,0)";
        dur = (dur !== undefined) ? (dur/1000) + "s" : "0s";
        slider.container.css("-" + slider.pfx + "-transition-duration", dur);
      }

      slider.args[slider.prop] = target;
      if (slider.transitions || dur === undefined) slider.container.css(slider.args);
    }

    slider.setup = function(type) {
      // SLIDE:
      if (!fade) {
        var sliderOffset, arr;

        if (type === "init") {
          slider.viewport = $('<div class="' + namespace + 'viewport"></div>').css({"overflow": "hidden", "position": "relative"}).appendTo(slider).append(slider.container);
          // INFINITE LOOP:
          slider.cloneCount = 0;
          slider.cloneOffset = 0;
          // REVERSE:
          if (reverse) {
            arr = $.makeArray(slider.slides).reverse();
            slider.slides = $(arr);
            slider.container.empty().append(slider.slides);
          }
        }
        // INFINITE LOOP && !CAROUSEL:
        if (slider.vars.animationLoop && !carousel) {
          slider.cloneCount = 2;
          slider.cloneOffset = 1;
          // clear out old clones
          if (type !== "init") slider.container.find('.clone').remove();
          slider.container.append(slider.slides.first().clone().addClass('clone').attr('aria-hidden', 'true')).prepend(slider.slides.last().clone().addClass('clone').attr('aria-hidden', 'true'));
        }
        slider.newSlides = $(slider.vars.selector, slider);

        sliderOffset = (reverse) ? slider.count - 1 - slider.currentSlide + slider.cloneOffset : slider.currentSlide + slider.cloneOffset;
        // VERTICAL:
        if (vertical && !carousel) {
          slider.container.height((slider.count + slider.cloneCount) * 200 + "%").css("position", "absolute").width("100%");
          setTimeout(function(){
            slider.newSlides.css({"display": "block"});
            slider.doMath();
            slider.viewport.height(slider.h);
            slider.setProps(sliderOffset * slider.h, "init");
          }, (type === "init") ? 100 : 0);
        } else {
          slider.container.width((slider.count + slider.cloneCount) * 200 + "%");
          slider.setProps(sliderOffset * slider.computedW, "init");
          setTimeout(function(){
            slider.doMath();
            slider.newSlides.css({"width": slider.computedW, "float": "left", "display": "block"});
            // SMOOTH HEIGHT:
            if (slider.vars.smoothHeight) methods.smoothHeight();
          }, (type === "init") ? 100 : 0);
        }
      } else { // FADE:
        slider.slides.css({"width": "100%", "float": "left", "marginRight": "-100%", "position": "relative"});
        if (type === "init") {
          if (!touch) {
            //slider.slides.eq(slider.currentSlide).fadeIn(slider.vars.animationSpeed, slider.vars.easing);
            slider.slides.css({ "opacity": 0, "display": "block", "zIndex": 1 }).eq(slider.currentSlide).css({"zIndex": 2}).animate({"opacity": 1},slider.vars.animationSpeed,slider.vars.easing);
          } else {
            slider.slides.css({ "opacity": 0, "display": "block", "webkitTransition": "opacity " + slider.vars.animationSpeed / 1000 + "s ease", "zIndex": 1 }).eq(slider.currentSlide).css({ "opacity": 1, "zIndex": 2});
          }
        }
        // SMOOTH HEIGHT:
        if (slider.vars.smoothHeight) methods.smoothHeight();
      }
      // !CAROUSEL:
      // CANDIDATE: active slide
      if (!carousel) slider.slides.removeClass(namespace + "active-slide").eq(slider.currentSlide).addClass(namespace + "active-slide");
    }


    slider.doMath = function() {
      var slide = slider.slides.first(),
          slideMargin = slider.vars.itemMargin,
          minItems = slider.vars.minItems,
          maxItems = slider.vars.maxItems;

      slider.w = (slider.viewport===undefined) ? slider.width() : slider.viewport.width();
      slider.h = slide.height();
      slider.boxPadding = slide.outerWidth() - slide.width();

      // CAROUSEL:
      if (carousel) {
        slider.itemT = slider.vars.itemWidth + slideMargin;
        slider.minW = (minItems) ? minItems * slider.itemT : slider.w;
        slider.maxW = (maxItems) ? (maxItems * slider.itemT) - slideMargin : slider.w;
        slider.itemW = (slider.minW > slider.w) ? (slider.w - (slideMargin * (minItems - 1)))/minItems :
                       (slider.maxW < slider.w) ? (slider.w - (slideMargin * (maxItems - 1)))/maxItems :
                       (slider.vars.itemWidth > slider.w) ? slider.w : slider.vars.itemWidth;

        slider.visible = Math.floor(slider.w/(slider.itemW));
        slider.move = (slider.vars.move > 0 && slider.vars.move < slider.visible ) ? slider.vars.move : slider.visible;
        slider.pagingCount = Math.ceil(((slider.count - slider.visible)/slider.move) + 1);
        slider.last =  slider.pagingCount - 1;
        slider.limit = (slider.pagingCount === 1) ? 0 :
                       (slider.vars.itemWidth > slider.w) ? (slider.itemW * (slider.count - 1)) + (slideMargin * (slider.count - 1)) : ((slider.itemW + slideMargin) * slider.count) - slider.w - slideMargin;
      } else {
        slider.itemW = slider.w;
        slider.pagingCount = slider.count;
        slider.last = slider.count - 1;
      }
      slider.computedW = slider.itemW - slider.boxPadding;
    }


    slider.update = function(pos, action) {
      slider.doMath();

      // update currentSlide and slider.animatingTo if necessary
      if (!carousel) {
        if (pos < slider.currentSlide) {
          slider.currentSlide += 1;
        } else if (pos <= slider.currentSlide && pos !== 0) {
          slider.currentSlide -= 1;
        }
        slider.animatingTo = slider.currentSlide;
      }

      // update controlNav
      if (slider.vars.controlNav && !slider.manualControls) {
        if ((action === "add" && !carousel) || slider.pagingCount > slider.controlNav.length) {
          methods.controlNav.update("add");
        } else if ((action === "remove" && !carousel) || slider.pagingCount < slider.controlNav.length) {
          if (carousel && slider.currentSlide > slider.last) {
            slider.currentSlide -= 1;
            slider.animatingTo -= 1;
          }
          methods.controlNav.update("remove", slider.last);
        }
      }
      // update directionNav
      if (slider.vars.directionNav) methods.directionNav.update();

    }

    slider.addSlide = function(obj, pos) {
      var $obj = $(obj);

      slider.count += 1;
      slider.last = slider.count - 1;

      // append new slide
      if (vertical && reverse) {
        (pos !== undefined) ? slider.slides.eq(slider.count - pos).after($obj) : slider.container.prepend($obj);
      } else {
        (pos !== undefined) ? slider.slides.eq(pos).before($obj) : slider.container.append($obj);
      }

      // update currentSlide, animatingTo, controlNav, and directionNav
      slider.update(pos, "add");

      // update slider.slides
      slider.slides = $(slider.vars.selector + ':not(.clone)', slider);
      // re-setup the slider to accomdate new slide
      slider.setup();

      //FlexSlider: added() Callback
      slider.vars.added(slider);
    }
    slider.removeSlide = function(obj) {
      var pos = (isNaN(obj)) ? slider.slides.index($(obj)) : obj;

      // update count
      slider.count -= 1;
      slider.last = slider.count - 1;

      // remove slide
      if (isNaN(obj)) {
        $(obj, slider.slides).remove();
      } else {
        (vertical && reverse) ? slider.slides.eq(slider.last).remove() : slider.slides.eq(obj).remove();
      }

      // update currentSlide, animatingTo, controlNav, and directionNav
      slider.doMath();
      slider.update(pos, "remove");

      // update slider.slides
      slider.slides = $(slider.vars.selector + ':not(.clone)', slider);
      // re-setup the slider to accomdate new slide
      slider.setup();

      // FlexSlider: removed() Callback
      slider.vars.removed(slider);
    }

    //FlexSlider: Initialize
    methods.init();
  }

  // Ensure the slider isn't focussed if the window loses focus.
  $( window ).blur( function ( e ) {
    focused = false;
  }).focus( function ( e ) {
    focused = true;
  });

  //FlexSlider: Default Settings
  $.flexslider.defaults = {
    namespace: "flex-",             //{NEW} String: Prefix string attached to the class of every element generated by the plugin
    selector: ".slides > li",       //{NEW} Selector: Must match a simple pattern. '{container} > {slide}' -- Ignore pattern at your own peril
    animation: "fade",              //String: Select your animation type, "fade" or "slide"
    easing: "swing",                //{NEW} String: Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!
    direction: "horizontal",        //String: Select the sliding direction, "horizontal" or "vertical"
    reverse: false,                 //{NEW} Boolean: Reverse the animation direction
    animationLoop: true,            //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
    smoothHeight: false,            //{NEW} Boolean: Allow height of the slider to animate smoothly in horizontal mode
    startAt: 0,                     //Integer: The slide that the slider should start on. Array notation (0 = first slide)
    slideshow: true,                //Boolean: Animate slider automatically
    slideshowSpeed: 7000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
    animationSpeed: 600,            //Integer: Set the speed of animations, in milliseconds
    initDelay: 0,                   //{NEW} Integer: Set an initialization delay, in milliseconds
    randomize: false,               //Boolean: Randomize slide order
    thumbCaptions: false,           //Boolean: Whether or not to put captions on thumbnails when using the "thumbnails" controlNav.

    // Usability features
    pauseOnAction: true,            //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
    pauseOnHover: false,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
    pauseInvisible: true,   		//{NEW} Boolean: Pause the slideshow when tab is invisible, resume when visible. Provides better UX, lower CPU usage.
    useCSS: true,                   //{NEW} Boolean: Slider will use CSS3 transitions if available
    touch: true,                    //{NEW} Boolean: Allow touch swipe navigation of the slider on touch-enabled devices
    video: false,                   //{NEW} Boolean: If using video in the slider, will prevent CSS3 3D Transforms to avoid graphical glitches

    // Primary Controls
    controlNav: true,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
    directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
    prevText: "Previous",           //String: Set the text for the "previous" directionNav item
    nextText: "Next",               //String: Set the text for the "next" directionNav item

    // Secondary Navigation
    keyboard: true,                 //Boolean: Allow slider navigating via keyboard left/right keys
    multipleKeyboard: false,        //{NEW} Boolean: Allow keyboard navigation to affect multiple sliders. Default behavior cuts out keyboard navigation with more than one slider present.
    mousewheel: false,              //{UPDATED} Boolean: Requires jquery.mousewheel.js (https://github.com/brandonaaron/jquery-mousewheel) - Allows slider navigating via mousewheel
    pausePlay: false,               //Boolean: Create pause/play dynamic element
    pauseText: "Pause",             //String: Set the text for the "pause" pausePlay item
    playText: "Play",               //String: Set the text for the "play" pausePlay item

    // Special properties
    controlsContainer: "",          //{UPDATED} jQuery Object/Selector: Declare which container the navigation elements should be appended too. Default container is the FlexSlider element. Example use would be $(".flexslider-container"). Property is ignored if given element is not found.
    manualControls: "",             //{UPDATED} jQuery Object/Selector: Declare custom control navigation. Examples would be $(".flex-control-nav li") or "#tabs-nav li img", etc. The number of elements in your controlNav should match the number of slides/tabs.
    sync: "",                       //{NEW} Selector: Mirror the actions performed on this slider with another slider. Use with care.
    asNavFor: "",                   //{NEW} Selector: Internal property exposed for turning the slider into a thumbnail navigation for another slider

    // Carousel Options
    itemWidth: 0,                   //{NEW} Integer: Box-model width of individual carousel items, including horizontal borders and padding.
    itemMargin: 0,                  //{NEW} Integer: Margin between carousel items.
    minItems: 1,                    //{NEW} Integer: Minimum number of carousel items that should be visible. Items will resize fluidly when below this.
    maxItems: 0,                    //{NEW} Integer: Maxmimum number of carousel items that should be visible. Items will resize fluidly when above this limit.
    move: 0,                        //{NEW} Integer: Number of carousel items that should move on animation. If 0, slider will move all visible items.
    allowOneSlide: true,           //{NEW} Boolean: Whether or not to allow a slider comprised of a single slide

    // Callback API
    start: function(){},            //Callback: function(slider) - Fires when the slider loads the first slide
    before: function(){},           //Callback: function(slider) - Fires asynchronously with each slider animation
    after: function(){},            //Callback: function(slider) - Fires after each slider animation completes
    end: function(){},              //Callback: function(slider) - Fires when the slider reaches the last slide (asynchronous)
    added: function(){},            //{NEW} Callback: function(slider) - Fires after a slide is added
    removed: function(){}           //{NEW} Callback: function(slider) - Fires after a slide is removed
  }


  //FlexSlider: Plugin Function
  $.fn.flexslider = function(options) {
    if (options === undefined) options = {};

    if (typeof options === "object") {
      return this.each(function() {
        var $this = $(this),
            selector = (options.selector) ? options.selector : ".slides > li",
            $slides = $this.find(selector);

      if ( ( $slides.length === 1 && options.allowOneSlide === true ) || $slides.length === 0 ) {
          $slides.fadeIn(400);
          if (options.start) options.start($this);
        } else if ($this.data('flexslider') === undefined) {
          new $.flexslider(this, options);
        }
      });
    } else {
      // Helper strings to quickly perform functions on the slider
      var $slider = $(this).data('flexslider');
      switch (options) {
        case "play": $slider.play(); break;
        case "pause": $slider.pause(); break;
        case "stop": $slider.stop(); break;
        case "next": $slider.flexAnimate($slider.getTarget("next"), true); break;
        case "prev":
        case "previous": $slider.flexAnimate($slider.getTarget("prev"), true); break;
        default: if (typeof options === "number") $slider.flexAnimate(options, true);
      }
    }
  }
})(jQuery);

/**
 * jQuery flexVSlider, fixed vertical carousel of flexslider
 */
(function( $ ) {
    $.fn.flexVSlider = function( settings ) {
        $( this ).each(function() {
            var $this = $( this );

            $this.flexslider($.extend( {}, settings, {
                direction: "vertical",
                animationLoop: false,
                start: function( slider ) {
                    var $wrapper = $( ".flex-viewport", $this),
                        height, setVisible;

                    if ( $wrapper.length && settings && settings.visible && settings.visible > 1 ) {
                        height = parseInt( $wrapper.get( 0 ).style.height );
                        $wrapper.get( 0 ).style.setProperty( "height", height * settings.visible + "px", "important" );
                    } else if ( $wrapper.length && ( !settings || !settings.visible ) ) {
                        height = parseInt( $wrapper.get( 0 ).style.height );
                        setVisible = Math.round( $wrapper.height() / height );
                    }

                    if ( settings && settings.move && settings.move > 1 ) {
                        var $nav = $( ".flex-direction-nav", $this );

                        $nav = $nav.clone().insertAfter( $nav.hide() );

                        var $next = $( ".flex-next", $nav ).unbind( "click" ),
                            $prev = $( ".flex-prev", $nav ).unbind( "click" ),
                            count = slider.count,
                            move = settings.move,
                            visible = settings && settings.visible || setVisible;

                        if ( !slider.transitions ) {
                            move = 1;
                        }

                        if ( ( count - slider.currentSlide - visible ) < 1 ) {
                            $next.addClass( "flex-disabled" );
                        } else {
                            $next.removeClass( "flex-disabled" );
                        }

                        if ( slider.currentSlide < 1 ) {
                            $prev.addClass( "flex-disabled" );
                        } else {
                            $prev.removeClass( "flex-disabled" );
                        }

                        $next.click(function( e ) {
                            e.preventDefault();

                            if ( $next.hasClass( "flex-disabled" ) ) {
                                return true;
                            }

                            var total = count - slider.currentSlide - visible,
                                cycles = Math.min( total, move );

                            if ( move >= total ) {
                                $next.addClass( "flex-disabled" );
                            }

                            for ( var i = 0; i < cycles; i++ ) {
                                $this.flexslider( "next" );
                            }

                            $prev.removeClass( "flex-disabled" );

                            return true;
                        });

                        $prev.click(function( e ) {
                            e.preventDefault();

                            if ( $prev.hasClass( "flex-disabled" ) ) {
                                return true;
                            }

                            var total = slider.currentSlide,
                                cycles = Math.min( total, move );

                            if ( move >= total ) {
                                $prev.addClass( "flex-disabled" );
                            }

                            for ( var i = 0; i < cycles; i++ ) {
                                $this.flexslider( "prev" );
                            }

                            $next.removeClass( "flex-disabled" );

                            return true;
                        });

                    }

                    if ( settings.start ) {
                        settings.start.apply( this, arguments );
                    }
                }
            }));
        });
    };
})( jQuery );

/*
 *	jQuery OwlCarousel v1.31
 *
 */
if (typeof Object.create !== "function") {
	"use strict";
    Object.create = function(e) {
        function t() {}
        t.prototype = e;
        return new t
    }
}(function(e, t, n, r) {
    var i = {
        init: function(t, n) {
            var r = this;
            r.$elem = e(n);
            r.options = e.extend({}, e.fn.owlCarousel.options, r.$elem.data(), t);
            r.userOptions = t;
            r.loadContent()
        },
        loadContent: function() {
            var t = this;
            if (typeof t.options.beforeInit === "function") {
                t.options.beforeInit.apply(this, [t.$elem])
            }
            if (typeof t.options.jsonPath === "string") {
                var n = t.options.jsonPath;

                function r(e) {
                    if (typeof t.options.jsonSuccess === "function") {
                        t.options.jsonSuccess.apply(this, [e])
                    } else {
                        var n = "";
                        for (var r in e["owl"]) {
                            n += e["owl"][r]["item"]
                        }
                        t.$elem.html(n)
                    }
                    t.logIn()
                }
                e.getJSON(n, r)
            } else {
                t.logIn()
            }
        },
        logIn: function(e) {
            var t = this;
            t.$elem.data("owl-originalStyles", t.$elem.attr("style")).data("owl-originalClasses", t.$elem.attr("class"));
            t.$elem.css({
                opacity: 0
            });
            t.orignalItems = t.options.items;
            t.checkBrowser();
            t.wrapperWidth = 0;
            t.checkVisible;
            t.setVars()
        },
        setVars: function() {
            var e = this;
            if (e.$elem.children().length === 0) {
                return false
            }
            e.baseClass();
            e.eventTypes();
            e.$userItems = e.$elem.children();
            e.itemsAmount = e.$userItems.length;
            e.wrapItems();
            e.$owlItems = e.$elem.find(".owl-item");
            e.$owlWrapper = e.$elem.find(".owl-wrapper");
            e.playDirection = "next";
            e.prevItem = 0;
            e.prevArr = [0];
            e.currentItem = 0;
            e.customEvents();
            e.onStartup()
        },
        onStartup: function() {
            var e = this;
            e.updateItems();
            e.calculateAll();
            e.buildControls();
            e.updateControls();
            e.response();
            e.moveEvents();
            e.stopOnHover();
            e.owlStatus();
            if (e.options.transitionStyle !== false) {
                e.transitionTypes(e.options.transitionStyle)
            }
            if (e.options.autoPlay === true) {
                e.options.autoPlay = 5e3
            }
            e.play();
            e.$elem.find(".owl-wrapper").css("display", "block");
            if (!e.$elem.is(":visible")) {
                e.watchVisibility()
            } else {
                e.$elem.css("opacity", 1)
            }
            e.onstartup = false;
            e.eachMoveUpdate();
            if (typeof e.options.afterInit === "function") {
                e.options.afterInit.apply(this, [e.$elem])
            }
        },
        eachMoveUpdate: function() {
            var e = this;
            if (e.options.lazyLoad === true) {
                e.lazyLoad()
            }
            if (e.options.autoHeight === true) {
                e.autoHeight()
            }
            e.onVisibleItems();
            if (typeof e.options.afterAction === "function") {
                e.options.afterAction.apply(this, [e.$elem])
            }
        },
        updateVars: function() {
            var e = this;
            if (typeof e.options.beforeUpdate === "function") {
                e.options.beforeUpdate.apply(this, [e.$elem])
            }
            e.watchVisibility();
            e.updateItems();
            e.calculateAll();
            e.updatePosition();
            e.updateControls();
            e.eachMoveUpdate();
            if (typeof e.options.afterUpdate === "function") {
                e.options.afterUpdate.apply(this, [e.$elem])
            }
        },
        reload: function(e) {
            var t = this;
            setTimeout(function() {
                t.updateVars()
            }, 0)
        },
        watchVisibility: function() {
            var e = this;
            if (e.$elem.is(":visible") === false) {
                e.$elem.css({
                    opacity: 0
                });
                clearInterval(e.autoPlayInterval);
                clearInterval(e.checkVisible)
            } else {
                return false
            }
            e.checkVisible = setInterval(function() {
                if (e.$elem.is(":visible")) {
                    e.reload();
                    e.$elem.animate({
                        opacity: 1
                    }, 200);
                    clearInterval(e.checkVisible)
                }
            }, 500)
        },
        wrapItems: function() {
            var e = this;
            e.$userItems.wrapAll('<div class="owl-wrapper">').wrap('<div class="owl-item"></div>');
            e.$elem.find(".owl-wrapper").wrap('<div class="owl-wrapper-outer">');
            e.wrapperOuter = e.$elem.find(".owl-wrapper-outer");
            e.$elem.css("display", "block")
        },
        baseClass: function() {
            var e = this;
            var t = e.$elem.hasClass(e.options.baseClass);
            var n = e.$elem.hasClass(e.options.theme);
            if (!t) {
                e.$elem.addClass(e.options.baseClass)
            }
            if (!n) {
                e.$elem.addClass(e.options.theme)
            }
        },
        updateItems: function() {
            var t = this;
            if (t.options.responsive === false) {
                return false
            }
            if (t.options.singleItem === true) {
                t.options.items = t.orignalItems = 1;
                t.options.itemsCustom = false;
                t.options.itemsDesktop = false;
                t.options.itemsDesktopSmall = false;
                t.options.itemsTablet = false;
                t.options.itemsTabletSmall = false;
                t.options.itemsMobile = false;
                return false
            }
            var n = e(t.options.responsiveBaseWidth).width();
            if (n > (t.options.itemsDesktop[0] || t.orignalItems)) {
                t.options.items = t.orignalItems
            }
            if (typeof t.options.itemsCustom !== "undefined" && t.options.itemsCustom !== false) {
                t.options.itemsCustom.sort(function(e, t) {
                    return e[0] - t[0]
                });
                for (var r in t.options.itemsCustom) {
                    if (typeof t.options.itemsCustom[r] !== "undefined" && t.options.itemsCustom[r][0] <= n) {
                        t.options.items = t.options.itemsCustom[r][1]
                    }
                }
            } else {
                if (n <= t.options.itemsDesktop[0] && t.options.itemsDesktop !== false) {
                    t.options.items = t.options.itemsDesktop[1]
                }
                if (n <= t.options.itemsDesktopSmall[0] && t.options.itemsDesktopSmall !== false) {
                    t.options.items = t.options.itemsDesktopSmall[1]
                }
                if (n <= t.options.itemsTablet[0] && t.options.itemsTablet !== false) {
                    t.options.items = t.options.itemsTablet[1]
                }
                if (n <= t.options.itemsTabletSmall[0] && t.options.itemsTabletSmall !== false) {
                    t.options.items = t.options.itemsTabletSmall[1]
                }
                if (n <= t.options.itemsMobile[0] && t.options.itemsMobile !== false) {
                    t.options.items = t.options.itemsMobile[1]
                }
            }
            if (t.options.items > t.itemsAmount && t.options.itemsScaleUp === true) {
                t.options.items = t.itemsAmount
            }
        },
        response: function() {
            var n = this,
                r;
            if (n.options.responsive !== true) {
                return false
            }
            var i = e(t).width();
            n.resizer = function() {
                if (e(t).width() !== i) {
                    if (n.options.autoPlay !== false) {
                        clearInterval(n.autoPlayInterval)
                    }
                    clearTimeout(r);
                    r = setTimeout(function() {
                        i = e(t).width();
                        n.updateVars()
                    }, n.options.responsiveRefreshRate)
                }
            };
            e(t).resize(n.resizer)
        },
        updatePosition: function() {
            var e = this;
            e.jumpTo(e.currentItem);
            if (e.options.autoPlay !== false) {
                e.checkAp()
            }
        },
        appendItemsSizes: function() {
            var t = this;
            var n = 0;
            var r = t.itemsAmount - t.options.items;
            t.$owlItems.each(function(i) {
                var s = e(this);
                s.css({
                    width: t.itemWidth
                }).data("owl-item", Number(i));
                if (i % t.options.items === 0 || i === r) {
                    if (!(i > r)) {
                        n += 1
                    }
                }
                s.data("owl-roundPages", n)
            })
        },
        appendWrapperSizes: function() {
            var e = this;
            var t = 0;
            var t = e.$owlItems.length * e.itemWidth;
            e.$owlWrapper.css({
                width: t * 2,
                left: 0
            });
            e.appendItemsSizes()
        },
        calculateAll: function() {
            var e = this;
            e.calculateWidth();
            e.appendWrapperSizes();
            e.loops();
            e.max()
        },
        calculateWidth: function() {
            var e = this;
            e.itemWidth = Math.round(e.$elem.width() / e.options.items)
        },
        max: function() {
            var e = this;
            var t = (e.itemsAmount * e.itemWidth - e.options.items * e.itemWidth) * -1;
            if (e.options.items > e.itemsAmount) {
                e.maximumItem = 0;
                t = 0;
                e.maximumPixels = 0
            } else {
                e.maximumItem = e.itemsAmount - e.options.items;
                e.maximumPixels = t
            }
            return t
        },
        min: function() {
            return 0
        },
        loops: function() {
            var t = this;
            t.positionsInArray = [0];
            t.pagesInArray = [];
            var n = 0;
            var r = 0;
            for (var i = 0; i < t.itemsAmount; i++) {
                r += t.itemWidth;
                t.positionsInArray.push(-r);
                if (t.options.scrollPerPage === true) {
                    var s = e(t.$owlItems[i]);
                    var o = s.data("owl-roundPages");
                    if (o !== n) {
                        t.pagesInArray[n] = t.positionsInArray[i];
                        n = o
                    }
                }
            }
        },
        buildControls: function() {
            var t = this;
            if (t.options.navigation === true || t.options.pagination === true) {
                t.owlControls = e('<div class="owl-controls"/>').toggleClass("clickable", !t.browser.isTouch).appendTo(t.$elem)
            }
            if (t.options.pagination === true) {
                t.buildPagination()
            }
            if (t.options.navigation === true) {
                t.buildButtons()
            }
        },
        buildButtons: function() {
            var t = this;
            var n = e('<div class="owl-buttons"/>');
            t.owlControls.append(n);
            t.buttonPrev = e("<div/>", {
                "class": "owl-prev",
                html: t.options.navigationText[0] || ""
            });
            t.buttonNext = e("<div/>", {
                "class": "owl-next",
                html: t.options.navigationText[1] || ""
            });
            n.append(t.buttonPrev).append(t.buttonNext);
            n.on("touchstart.owlControls mousedown.owlControls", 'div[class^="owl"]', function(e) {
                e.preventDefault()
            });
            n.on("touchend.owlControls mouseup.owlControls", 'div[class^="owl"]', function(n) {
                n.preventDefault();
                if (e(this).hasClass("owl-next")) {
                    t.next()
                } else {
                    t.prev()
                }
            })
        },
        buildPagination: function() {
            var t = this;
            t.paginationWrapper = e('<div class="owl-pagination"/>');
            t.owlControls.append(t.paginationWrapper);
            t.paginationWrapper.on("touchend.owlControls mouseup.owlControls", ".owl-page", function(n) {
                n.preventDefault();
                if (Number(e(this).data("owl-page")) !== t.currentItem) {
                    t.goTo(Number(e(this).data("owl-page")), true)
                }
            })
        },
        updatePagination: function() {
            var t = this;
            if (t.options.pagination === false) {
                return false
            }
            t.paginationWrapper.html("");
            var n = 0;
            var r = t.itemsAmount - t.itemsAmount % t.options.items;
            for (var i = 0; i < t.itemsAmount; i++) {
                if (i % t.options.items === 0) {
                    n += 1;
                    if (r === i) {
                        var s = t.itemsAmount - t.options.items
                    }
                    var o = e("<div/>", {
                        "class": "owl-page"
                    });
                    var u = e("<span></span>", {
                        text: t.options.paginationNumbers === true ? n : "",
                        "class": t.options.paginationNumbers === true ? "owl-numbers" : ""
                    });
                    o.append(u);
                    o.data("owl-page", r === i ? s : i);
                    o.data("owl-roundPages", n);
                    t.paginationWrapper.append(o)
                }
            }
            t.checkPagination()
        },
        checkPagination: function() {
            var t = this;
            if (t.options.pagination === false) {
                return false
            }
            t.paginationWrapper.find(".owl-page").each(function(n, r) {
                if (e(this).data("owl-roundPages") === e(t.$owlItems[t.currentItem]).data("owl-roundPages")) {
                    t.paginationWrapper.find(".owl-page").removeClass("active");
                    e(this).addClass("active")
                }
            })
        },
        checkNavigation: function() {
            var e = this;
            if (e.options.navigation === false) {
                return false
            }
            if (e.options.rewindNav === false) {
                if (e.currentItem === 0 && e.maximumItem === 0) {
                    e.buttonPrev.addClass("disabled");
                    e.buttonNext.addClass("disabled")
                } else if (e.currentItem === 0 && e.maximumItem !== 0) {
                    e.buttonPrev.addClass("disabled");
                    e.buttonNext.removeClass("disabled")
                } else if (e.currentItem === e.maximumItem) {
                    e.buttonPrev.removeClass("disabled");
                    e.buttonNext.addClass("disabled")
                } else if (e.currentItem !== 0 && e.currentItem !== e.maximumItem) {
                    e.buttonPrev.removeClass("disabled");
                    e.buttonNext.removeClass("disabled")
                }
            }
        },
        updateControls: function() {
            var e = this;
            e.updatePagination();
            e.checkNavigation();
            if (e.owlControls) {
                if (e.options.items >= e.itemsAmount) {
                    e.owlControls.hide()
                } else {
                    e.owlControls.show()
                }
            }
        },
        destroyControls: function() {
            var e = this;
            if (e.owlControls) {
                e.owlControls.remove()
            }
        },
        next: function(e) {
            var t = this;
            if (t.isTransition) {
                return false
            }
            t.currentItem += t.options.scrollPerPage === true ? t.options.items : 1;
            if (t.currentItem > t.maximumItem + (t.options.scrollPerPage == true ? t.options.items - 1 : 0)) {
                if (t.options.rewindNav === true) {
                    t.currentItem = 0;
                    e = "rewind"
                } else {
                    t.currentItem = t.maximumItem;
                    return false
                }
            }
            t.goTo(t.currentItem, e)
        },
        prev: function(e) {
            var t = this;
            if (t.isTransition) {
                return false
            }
            if (t.options.scrollPerPage === true && t.currentItem > 0 && t.currentItem < t.options.items) {
                t.currentItem = 0
            } else {
                t.currentItem -= t.options.scrollPerPage === true ? t.options.items : 1
            }
            if (t.currentItem < 0) {
                if (t.options.rewindNav === true) {
                    t.currentItem = t.maximumItem;
                    e = "rewind"
                } else {
                    t.currentItem = 0;
                    return false
                }
            }
            t.goTo(t.currentItem, e)
        },
        goTo: function(e, t, n) {
            var r = this;
            if (r.isTransition) {
                return false
            }
            if (typeof r.options.beforeMove === "function") {
                r.options.beforeMove.apply(this, [r.$elem])
            }
            if (e >= r.maximumItem) {
                e = r.maximumItem
            } else if (e <= 0) {
                e = 0
            }
            r.currentItem = r.owl.currentItem = e;
            if (r.options.transitionStyle !== false && n !== "drag" && r.options.items === 1 && r.browser.support3d === true) {
                r.swapSpeed(0);
                if (r.browser.support3d === true) {
                    r.transition3d(r.positionsInArray[e])
                } else {
                    r.css2slide(r.positionsInArray[e], 1)
                }
                r.afterGo();
                r.singleItemTransition();
                return false
            }
            var i = r.positionsInArray[e];
            if (r.browser.support3d === true) {
                r.isCss3Finish = false;
                if (t === true) {
                    r.swapSpeed("paginationSpeed");
                    setTimeout(function() {
                        r.isCss3Finish = true
                    }, r.options.paginationSpeed)
                } else if (t === "rewind") {
                    r.swapSpeed(r.options.rewindSpeed);
                    setTimeout(function() {
                        r.isCss3Finish = true
                    }, r.options.rewindSpeed)
                } else {
                    r.swapSpeed("slideSpeed");
                    setTimeout(function() {
                        r.isCss3Finish = true
                    }, r.options.slideSpeed)
                }
                r.transition3d(i)
            } else {
                if (t === true) {
                    r.css2slide(i, r.options.paginationSpeed)
                } else if (t === "rewind") {
                    r.css2slide(i, r.options.rewindSpeed)
                } else {
                    r.css2slide(i, r.options.slideSpeed)
                }
            }
            r.afterGo()
        },
        jumpTo: function(e) {
            var t = this;
            if (typeof t.options.beforeMove === "function") {
                t.options.beforeMove.apply(this, [t.$elem])
            }
            if (e >= t.maximumItem || e === -1) {
                e = t.maximumItem
            } else if (e <= 0) {
                e = 0
            }
            t.swapSpeed(0);
            if (t.browser.support3d === true) {
                t.transition3d(t.positionsInArray[e])
            } else {
                t.css2slide(t.positionsInArray[e], 1)
            }
            t.currentItem = t.owl.currentItem = e;
            t.afterGo()
        },
        afterGo: function() {
            var e = this;
            e.prevArr.push(e.currentItem);
            e.prevItem = e.owl.prevItem = e.prevArr[e.prevArr.length - 2];
            e.prevArr.shift(0);
            if (e.prevItem !== e.currentItem) {
                e.checkPagination();
                e.checkNavigation();
                e.eachMoveUpdate();
                if (e.options.autoPlay !== false) {
                    e.checkAp()
                }
            }
            if (typeof e.options.afterMove === "function" && e.prevItem !== e.currentItem) {
                e.options.afterMove.apply(this, [e.$elem])
            }
        },
        stop: function() {
            var e = this;
            e.apStatus = "stop";
            clearInterval(e.autoPlayInterval)
        },
        checkAp: function() {
            var e = this;
            if (e.apStatus !== "stop") {
                e.play()
            }
        },
        play: function() {
            var e = this;
            e.apStatus = "play";
            if (e.options.autoPlay === false) {
                return false
            }
            clearInterval(e.autoPlayInterval);
            e.autoPlayInterval = setInterval(function() {
                e.next(true)
            }, e.options.autoPlay)
        },
        swapSpeed: function(e) {
            var t = this;
            if (e === "slideSpeed") {
                t.$owlWrapper.css(t.addCssSpeed(t.options.slideSpeed))
            } else if (e === "paginationSpeed") {
                t.$owlWrapper.css(t.addCssSpeed(t.options.paginationSpeed))
            } else if (typeof e !== "string") {
                t.$owlWrapper.css(t.addCssSpeed(e))
            }
        },
        addCssSpeed: function(e) {
            var t = this;
            return {
                "-webkit-transition": "all " + e + "ms ease",
                "-moz-transition": "all " + e + "ms ease",
                "-o-transition": "all " + e + "ms ease",
                transition: "all " + e + "ms ease"
            }
        },
        removeTransition: function() {
            return {
                "-webkit-transition": "",
                "-moz-transition": "",
                "-o-transition": "",
                transition: ""
            }
        },
        doTranslate: function(e) {
            return {
                "-webkit-transform": "translate3d(" + e + "px, 0px, 0px)",
                "-moz-transform": "translate3d(" + e + "px, 0px, 0px)",
                "-o-transform": "translate3d(" + e + "px, 0px, 0px)",
                "-ms-transform": "translate3d(" + e + "px, 0px, 0px)",
                transform: "translate3d(" + e + "px, 0px,0px)"
            }
        },
        transition3d: function(e) {
            var t = this;
            t.$owlWrapper.css(t.doTranslate(e))
        },
        css2move: function(e) {
            var t = this;
            t.$owlWrapper.css({
                left: e
            })
        },
        css2slide: function(e, t) {
            var n = this;
            n.isCssFinish = false;
            n.$owlWrapper.stop(true, true).animate({
                left: e
            }, {
                duration: t || n.options.slideSpeed,
                complete: function() {
                    n.isCssFinish = true
                }
            })
        },
        checkBrowser: function() {
            var e = this;
            var r = "translate3d(0px, 0px, 0px)",
                i = n.createElement("div");
            i.style.cssText = "  -moz-transform:" + r + "; -ms-transform:" + r + "; -o-transform:" + r + "; -webkit-transform:" + r + "; transform:" + r;
            var s = /translate3d\(0px, 0px, 0px\)/g,
                o = i.style.cssText.match(s),
                u = o !== null && o.length === 1;
            var a = "ontouchstart" in t || navigator.msMaxTouchPoints;
            e.browser = {
                support3d: u,
                isTouch: a
            }
        },
        moveEvents: function() {
            var e = this;
            if (e.options.mouseDrag !== false || e.options.touchDrag !== false) {
                e.gestures();
                e.disabledEvents()
            }
        },
        eventTypes: function() {
            var e = this;
            var t = ["s", "e", "x"];
            e.ev_types = {};
            if (e.options.mouseDrag === true && e.options.touchDrag === true) {
                t = ["touchstart.owl mousedown.owl", "touchmove.owl mousemove.owl", "touchend.owl touchcancel.owl mouseup.owl"]
            } else if (e.options.mouseDrag === false && e.options.touchDrag === true) {
                t = ["touchstart.owl", "touchmove.owl", "touchend.owl touchcancel.owl"]
            } else if (e.options.mouseDrag === true && e.options.touchDrag === false) {
                t = ["mousedown.owl", "mousemove.owl", "mouseup.owl"]
            }
            e.ev_types["start"] = t[0];
            e.ev_types["move"] = t[1];
            e.ev_types["end"] = t[2]
        },
        disabledEvents: function() {
            var t = this;
            t.$elem.on("dragstart.owl", function(e) {
                e.preventDefault()
            });
            t.$elem.on("mousedown.disableTextSelect", function(t) {
                return e(t.target).is("input, textarea, select, option")
            })
        },
        gestures: function() {
            function o(e) {
                if (e.touches) {
                    return {
                        x: e.touches[0].pageX,
                        y: e.touches[0].pageY
                    }
                } else {
                    if (e.pageX !== r) {
                        return {
                            x: e.pageX,
                            y: e.pageY
                        }
                    } else {
                        return {
                            x: e.clientX,
                            y: e.clientY
                        }
                    }
                }
            }

            function u(t) {
                if (t === "on") {
                    e(n).on(i.ev_types["move"], f);
                    e(n).on(i.ev_types["end"], l)
                } else if (t === "off") {
                    e(n).off(i.ev_types["move"]);
                    e(n).off(i.ev_types["end"])
                }
            }

            function a(n) {
                var n = n.originalEvent || n || t.event;
                if (n.which === 3) {
                    return false
                }
                if (i.itemsAmount <= i.options.items) {
                    return
                }
                if (i.isCssFinish === false && !i.options.dragBeforeAnimFinish) {
                    return false
                }
                if (i.isCss3Finish === false && !i.options.dragBeforeAnimFinish) {
                    return false
                }

                if (i.options.autoPlay !== false) {
                    clearInterval(i.autoPlayInterval)
                }
                if (i.browser.isTouch !== true && !i.$owlWrapper.hasClass("grabbing")) {
                    i.$owlWrapper.addClass("grabbing")
                }
                i.newPosX = 0;
                i.newRelativeX = 0;
                e(this).css(i.removeTransition());
                var r = e(this).position();
                s.relativePos = r.left;
                s.offsetX = o(n).x - r.left;
                s.offsetY = o(n).y - r.top;
                u("on");
                s.sliding = false;
                s.targetElement = n.target || n.srcElement
            }

            function f(r) {
                var r = r.originalEvent || r || t.event;
                i.newPosX = o(r).x - s.offsetX;
                i.newPosY = o(r).y - s.offsetY;
                i.newRelativeX = i.newPosX - s.relativePos;
                if (typeof i.options.startDragging === "function" && s.dragging !== true && i.newRelativeX !== 0) {
                    s.dragging = true;
                    i.options.startDragging.apply(i, [i.$elem])
                }
                if (i.newRelativeX > 8 || i.newRelativeX < -8 && i.browser.isTouch === true) {
                    r.preventDefault ? r.preventDefault() : r.returnValue = false;
                    s.sliding = true
                }
                if ((i.newPosY > 10 || i.newPosY < -10) && s.sliding === false) {
                    e(n).off("touchmove.owl")
                }
                var u = function() {
                    return i.newRelativeX / 5
                };
                var a = function() {
                    return i.maximumPixels + i.newRelativeX / 5
                };
                i.newPosX = Math.max(Math.min(i.newPosX, u()), a());
                if (i.browser.support3d === true) {
                    i.transition3d(i.newPosX)
                } else {
                    i.css2move(i.newPosX)
                }
            }

            function l(n) {
                var n = n.originalEvent || n || t.event;
                n.target = n.target || n.srcElement;
                s.dragging = false;
                if (i.browser.isTouch !== true) {
                    i.$owlWrapper.removeClass("grabbing")
                }
                if (i.newRelativeX < 0) {
                    i.dragDirection = i.owl.dragDirection = "left"
                } else {
                    i.dragDirection = i.owl.dragDirection = "right"
                }
                if (i.newRelativeX !== 0) {
                    var r = i.getNewPosition();
                    i.goTo(r, false, "drag");
                    if (s.targetElement === n.target && i.browser.isTouch !== true) {
                        e(n.target).on("click.disable", function(t) {
                            t.stopImmediatePropagation();
                            t.stopPropagation();
                            t.preventDefault();
                            e(n.target).off("click.disable")
                        });
                        var o = e._data(n.target, "events")["click"];
                        var a = o.pop();
                        o.splice(0, 0, a)
                    }
                }
                u("off")
            }
            var i = this;
            var s = {
                offsetX: 0,
                offsetY: 0,
                baseElWidth: 0,
                relativePos: 0,
                position: null,
                minSwipe: null,
                maxSwipe: null,
                sliding: null,
                dargging: null,
                targetElement: null
            };
            i.isCssFinish = true;
            i.$elem.on(i.ev_types["start"], ".owl-wrapper", a)
        },
        getNewPosition: function() {
            var e = this,
                t;
            t = e.closestItem();
            if (t > e.maximumItem) {
                e.currentItem = e.maximumItem;
                t = e.maximumItem
            } else if (e.newPosX >= 0) {
                t = 0;
                e.currentItem = 0
            }
            return t
        },
        closestItem: function() {
            var t = this,
                n = t.options.scrollPerPage === true ? t.pagesInArray : t.positionsInArray,
                r = t.newPosX,
                i = null;
            e.each(n, function(s, o) {
                if (r - t.itemWidth / 20 > n[s + 1] && r - t.itemWidth / 20 < o && t.moveDirection() === "left") {
                    i = o;
                    if (t.options.scrollPerPage === true) {
                        t.currentItem = e.inArray(i, t.positionsInArray)
                    } else {
                        t.currentItem = s
                    }
                } else if (r + t.itemWidth / 20 < o && r + t.itemWidth / 20 > (n[s + 1] || n[s] - t.itemWidth) && t.moveDirection() === "right") {
                    if (t.options.scrollPerPage === true) {
                        i = n[s + 1] || n[n.length - 1];
                        t.currentItem = e.inArray(i, t.positionsInArray)
                    } else {
                        i = n[s + 1];
                        t.currentItem = s + 1
                    }
                }
            });
            return t.currentItem
        },
        moveDirection: function() {
            var e = this,
                t;
            if (e.newRelativeX < 0) {
                t = "right";
                e.playDirection = "next"
            } else {
                t = "left";
                e.playDirection = "prev"
            }
            return t
        },
        customEvents: function() {
            var e = this;
            e.$elem.on("owl.next", function() {
                e.next()
            });
            e.$elem.on("owl.prev", function() {
                e.prev()
            });
            e.$elem.on("owl.play", function(t, n) {
                e.options.autoPlay = n;
                e.play();
                e.hoverStatus = "play"
            });
            e.$elem.on("owl.stop", function() {
                e.stop();
                e.hoverStatus = "stop"
            });
            e.$elem.on("owl.goTo", function(t, n) {
                e.goTo(n)
            });
            e.$elem.on("owl.jumpTo", function(t, n) {
                e.jumpTo(n)
            })
        },
        stopOnHover: function() {
            var e = this;
            if (e.options.stopOnHover === true && e.browser.isTouch !== true && e.options.autoPlay !== false) {
                e.$elem.on("mouseover", function() {
                    e.stop()
                });
                e.$elem.on("mouseout", function() {
                    if (e.hoverStatus !== "stop") {
                        e.play()
                    }
                })
            }
        },
        lazyLoad: function() {
            var t = this;
            if (t.options.lazyLoad === false) {
                return false
            }
            for (var n = 0; n < t.itemsAmount; n++) {
                var i = e(t.$owlItems[n]);
                if (i.data("owl-loaded") === "loaded") {
                    continue
                }
                var s = i.data("owl-item"),
                    o = i.find(".lazyOwl"),
                    u;
                if (typeof o.data("src") !== "string") {
                    i.data("owl-loaded", "loaded");
                    continue
                }
                if (i.data("owl-loaded") === r) {
                    o.hide();
                    i.addClass("loading").data("owl-loaded", "checked")
                }
                if (t.options.lazyFollow === true) {
                    u = s >= t.currentItem
                } else {
                    u = true
                }
                if (u && s < t.currentItem + t.options.items && o.length) {
                    t.lazyPreload(i, o)
                }
            }
        },
        lazyPreload: function(e, t) {
            function s() {
                r += 1;
                if (n.completeImg(t.get(0)) || i === true) {
                    o()
                } else if (r <= 100) {
                    setTimeout(s, 100)
                } else {
                    o()
                }
            }

            function o() {
                e.data("owl-loaded", "loaded").removeClass("loading");
                t.removeAttr("data-src");
                n.options.lazyEffect === "fade" ? t.fadeIn(400) : t.show();
                if (typeof n.options.afterLazyLoad === "function") {
                    n.options.afterLazyLoad.apply(this, [n.$elem])
                }
            }
            var n = this,
                r = 0;
            if (t.prop("tagName") === "DIV") {
                t.css("background-image", "url(" + t.data("src") + ")");
                var i = true
            } else {
                t[0].src = t.data("src")
            }
            s()
        },
        autoHeight: function() {
            function s() {
                i += 1;
                if (t.completeImg(n.get(0))) {
                    o()
                } else if (i <= 100) {
                    setTimeout(s, 100)
                } else {
                    t.wrapperOuter.css("height", "")
                }
            }

            function o() {
                var n = e(t.$owlItems[t.currentItem]).height();
                t.wrapperOuter.css("height", n + "px");
                if (!t.wrapperOuter.hasClass("autoHeight")) {
                    setTimeout(function() {
                        t.wrapperOuter.addClass("autoHeight")
                    }, 0)
                }
            }
            var t = this;
            var n = e(t.$owlItems[t.currentItem]).find("img");
            if (n.get(0) !== r) {
                var i = 0;
                s()
            } else {
                o()
            }
        },
        completeImg: function(e) {
            if (!e.complete) {
                return false
            }
            if (typeof e.naturalWidth !== "undefined" && e.naturalWidth == 0) {
                return false
            }
            return true
        },
        onVisibleItems: function() {
            var t = this;
            if (t.options.addClassActive === true) {
                t.$owlItems.removeClass("active")
            }
            t.visibleItems = [];
            for (var n = t.currentItem; n < t.currentItem + t.options.items; n++) {
                t.visibleItems.push(n);
                if (t.options.addClassActive === true) {
                    e(t.$owlItems[n]).addClass("active")
                }
            }
            t.owl.visibleItems = t.visibleItems
        },
        transitionTypes: function(e) {
            var t = this;
            t.outClass = "owl-" + e + "-out";
            t.inClass = "owl-" + e + "-in"
        },
        singleItemTransition: function() {
            function u(e, t) {
                return {
                    position: "relative",
                    left: e + "px"
                }
            }
            var e = this;
            e.isTransition = true;
            var t = e.outClass,
                n = e.inClass,
                r = e.$owlItems.eq(e.currentItem),
                i = e.$owlItems.eq(e.prevItem),
                s = Math.abs(e.positionsInArray[e.currentItem]) + e.positionsInArray[e.prevItem],
                o = Math.abs(e.positionsInArray[e.currentItem]) + e.itemWidth / 2;
            e.$owlWrapper.addClass("owl-origin").css({
                "-webkit-transform-origin": o + "px",
                "-moz-perspective-origin": o + "px",
                "perspective-origin": o + "px"
            });
            var a = "webkitAnimationEnd oAnimationEnd MSAnimationEnd animationend";
            i.css(u(s, 10)).addClass(t).on(a, function() {
                e.endPrev = true;
                i.off(a);
                e.clearTransStyle(i, t)
            });
            r.addClass(n).on(a, function() {
                e.endCurrent = true;
                r.off(a);
                e.clearTransStyle(r, n)
            })
        },
        clearTransStyle: function(e, t) {
            var n = this;
            e.css({
                position: "",
                left: ""
            }).removeClass(t);
            if (n.endPrev && n.endCurrent) {
                n.$owlWrapper.removeClass("owl-origin");
                n.endPrev = false;
                n.endCurrent = false;
                n.isTransition = false
            }
        },
        owlStatus: function() {
            var e = this;
            e.owl = {
                userOptions: e.userOptions,
                baseElement: e.$elem,
                userItems: e.$userItems,
                owlItems: e.$owlItems,
                currentItem: e.currentItem,
                prevItem: e.prevItem,
                visibleItems: e.visibleItems,
                isTouch: e.browser.isTouch,
                browser: e.browser,
                dragDirection: e.dragDirection
            }
        },
        clearEvents: function() {
            var r = this;
            r.$elem.off(".owl owl mousedown.disableTextSelect");
            e(n).off(".owl owl");
            e(t).off("resize", r.resizer)
        },
        unWrap: function() {
            var e = this;
            if (e.$elem.children().length !== 0) {
                e.$owlWrapper.unwrap();
                e.$userItems.unwrap().unwrap();
                if (e.owlControls) {
                    e.owlControls.remove()
                }
            }
            e.clearEvents();
            e.$elem.attr("style", e.$elem.data("owl-originalStyles") || "").attr("class", e.$elem.data("owl-originalClasses"))
        },
        destroy: function() {
            var e = this;
            e.stop();
            clearInterval(e.checkVisible);
            e.unWrap();
            e.$elem.removeData()
        },
        reinit: function(t) {
            var n = this;
            var r = e.extend({}, n.userOptions, t);
            n.unWrap();
            n.init(r, n.$elem)
        },
        addItem: function(e, t) {
            var n = this,
                i;
            if (!e) {
                return false
            }
            if (n.$elem.children().length === 0) {
                n.$elem.append(e);
                n.setVars();
                return false
            }
            n.unWrap();
            if (t === r || t === -1) {
                i = -1
            } else {
                i = t
            }
            if (i >= n.$userItems.length || i === -1) {
                n.$userItems.eq(-1).after(e)
            } else {
                n.$userItems.eq(i).before(e)
            }
            n.setVars()
        },
        removeItem: function(e) {
            var t = this,
                n;
            if (t.$elem.children().length === 0) {
                return false
            }
            if (e === r || e === -1) {
                n = -1
            } else {
                n = e
            }
            t.unWrap();
            t.$userItems.eq(n).remove();
            t.setVars()
        }
    };
    e.fn.owlCarousel = function(t) {
        return this.each(function() {
            if (e(this).data("owl-init") === true) {
                return false
            }
            e(this).data("owl-init", true);
            var n = Object.create(i);
            n.init(t, this);
            e.data(this, "owlCarousel", n)
        })
    };
    e.fn.owlCarousel.options = {
        items: 5,
        itemsCustom: false,
        itemsDesktop: [1199, 4],
        itemsDesktopSmall: [979, 3],
        itemsTablet: [768, 2],
        itemsTabletSmall: false,
        itemsMobile: [479, 1],
        singleItem: false,
        itemsScaleUp: false,
        slideSpeed: 200,
        paginationSpeed: 800,
        rewindSpeed: 1e3,
        autoPlay: false,
        stopOnHover: false,
        navigation: false,
        navigationText: ["prev", "next"],
        rewindNav: true,
        scrollPerPage: false,
        pagination: true,
        paginationNumbers: false,
        responsive: true,
        responsiveRefreshRate: 200,
        responsiveBaseWidth: t,
        baseClass: "owl-carousel",
        theme: "owl-theme",
        lazyLoad: false,
        lazyFollow: true,
        lazyEffect: "fade",
        autoHeight: false,
        jsonPath: false,
        jsonSuccess: false,
        dragBeforeAnimFinish: true,
        mouseDrag: true,
        touchDrag: true,
        addClassActive: false,
        transitionStyle: false,
        beforeUpdate: false,
        afterUpdate: false,
        beforeInit: false,
        afterInit: false,
        beforeMove: false,
        afterMove: false,
        afterAction: false,
        startDragging: false,
        afterLazyLoad: false
    }
})(jQuery, window, document)

/************************
*************************
  Mobile Menu v1.0
    (c) 2016 Magik Commerce
************************
************************/
!function(s){"use strict";s.fn.mobileMenu=function(e){var i={MenuWidth:250,SlideSpeed:300,WindowsMaxWidth:767,PagePush:!0,FromLeft:!0,Overlay:!0,CollapseMenu:!0,ClassName:"mobile-menu"};return this.each(function(){function n(){1==d.FromLeft?c.css("left",-d.MenuWidth):c.css("right",-d.MenuWidth),c.find("ul:first").addClass(d.ClassName),g=d.ClassName,c.css("width",d.MenuWidth),c.find("."+g+" ul").css("display","none");var e='<span class="expand fa fa-plus"></span>';c.find("li ul").parent().prepend(e),s("."+g).append('<li style="height: 2px;"></li>'),s("."+g+" li:has(span)").each(function(){s(this).find("a:first").css("padding-right",55)})}function a(){var e=0,i=s(document).height();return c.find("."+g+" > li").each(function(){var i=s(this).height();e+=i}),i>=e&&(e=i),e}function l(e){C=s("."+g+" span.expand").height(),1===e&&c.find("."+g+" > li:has(span)").each(function(){var e=s(this).height(),i=(e-C)/2;s(this).find("span").css({"padding-bottom":i,"padding-top":i})}),2===e&&c.find("."+g+" > li > ul > li:has(span)").each(function(){var e=s(this).height(),i=(e-C)/2;s(this).find("span").css({"padding-bottom":i,"padding-top":i})})}function t(){u.addClass("mmPushBody"),1==d.Overlay?h.addClass("overlay"):h.addClass("overlay").css("opacity",0),c.css({display:"block",overflow:"hidden"}),1==d.FromLeft?(1==d.PagePush&&p.animate({left:d.MenuWidth},d.SlideSpeed,"linear"),c.animate({left:"0"},d.SlideSpeed,"linear",function(){c.css("height",a()),r=!0})):(1==d.PagePush&&p.animate({left:-d.MenuWidth},d.SlideSpeed,"linear"),c.animate({right:"0"},d.SlideSpeed,"linear",function(){c.css("height",a()),r=!0})),m||(l(1),m=!0)}function o(){1==d.FromLeft?(1==d.PagePush&&p.animate({left:"0"},d.SlideSpeed,"linear"),c.animate({left:-d.MenuWidth},d.SlideSpeed,"linear",function(){u.removeClass("mmPushBody"),h.css("height",0).removeClass("overlay"),c.css("display","none"),r=!1})):(1==d.PagePush&&p.animate({left:"0"},d.SlideSpeed,"linear"),c.animate({right:-d.MenuWidth},d.SlideSpeed,"linear",function(){u.removeClass("mmPushBody"),h.css("height",0).removeClass("overlay"),c.css("display","none"),r=!1}))}var d=s.extend({},i,e),c=s(this),h=s("#overlay"),u=s("body"),p=s("#page"),r=!1,m=!1,f=!1,C=0,g="";n(),s(".mm-toggle").click(function(){c.css("height",s(document).height()),1==d.Overlay&&h.css("height",s(document).height()),r?o():t()}),s(window).resize(function(){s(window).width()>=d.WindowsMaxWidth&&r&&c.css("left")!=-d.MenuWidth&&o()}),s("."+g+" > li > span.expand").click(function(){if(1==d.CollapseMenu){var e=s("."+g+" li span");e.hasClass("open")&&"none"===s(this).next().next().css("display")&&(s("."+g+" li ul").slideUp(),e.hasClass("open")?e.removeClass("fa fa-minus").addClass("fa fa-plus"):e.removeClass("fa fa-plus").addClass("fa fa-minus"),e.removeClass("open"))}s(this).nextAll("."+g+" ul").slideToggle(function(){1==d.CollapseMenu?s(this).promise().done(function(){c.css("height",a())}):c.css("height",a())}),s(this).hasClass("fa fa-plus")?s(this).removeClass("fa fa-plus").addClass("fa fa-minus"):s(this).removeClass("fa fa-minus").addClass("fa fa-plus"),s(this).toggleClass("open"),f||(l(2),f=!0)}),s("."+g+" > li > ul > li > span.expand").click(function(){if(1==d.CollapseMenu){var e=s("."+g+" li ul li span");e.hasClass("open")&&"none"===s(this).next().next().css("display")&&(s("."+g+" li ul ul").slideUp(),e.hasClass("open")?e.removeClass("fa fa-minus").addClass("fa fa-plus"):e.removeClass("fa fa-plus").addClass("fa fa-minus"),e.removeClass("open"))}s(this).nextAll("."+g+" ul ul").slideToggle(function(){1==d.CollapseMenu?s(this).promise().done(function(){c.css("height",a())}):c.css("height",a())}),s(this).hasClass("fa fa-plus")?s(this).removeClass("fa fa-plus").addClass("fa fa-minus"):s(this).removeClass("fa fa-minus").addClass("fa fa-plus"),s(this).toggleClass("open")}),s("."+g+" li a").click(function(){s("."+g+" li a").removeClass("active"),s(this).addClass("active"),o()}),h.click(function(){o()}),s("."+g+" li a.active").parent().children(".expand").removeClass("fa fa-plus").addClass("fa fa-minus open"),s("."+g+" li a.active").parent().children("ul").css("display","block")})}}(jQuery);



/* Time Sale */
if (typeof(BackColor)=="undefined")
	BackColor = "white";
if (typeof(ForeColor)=="undefined")
	ForeColor= "black";
if (typeof(DisplayFormat)=="undefined")
	DisplayFormat = "<div class='day box-time-date'><span class='time-num time-day'>%%D%%</span>Days</div><div class='hour box-time-date'><span class='time-num'>%%H%%</span>Hrs</div><div class='min box-time-date'><span class='time-num'>%%M%%</span>Mins</div><div class='sec box-time-date'><span class='time-num'>%%S%%</span>Secs</div>";
if (typeof(CountActive)=="undefined")
	CountActive = true;
if (typeof(FinishMessage)=="undefined")
	FinishMessage = "";
if (typeof(CountStepper)!="number")
	CountStepper = -1;
if (typeof(LeadingZero)=="undefined")
	LeadingZero = true;
CountStepper = Math.ceil(CountStepper);
if (CountStepper == 0)
	CountActive = false;
var SetTimeOutPeriod = (Math.abs(CountStepper)-1)*1000 + 990;
function calcage(secs, num1, num2) {
	s = ((Math.floor(secs/num1)%num2)).toString();
	if (LeadingZero && s.length < 2)
		s = "0" + s;
	return s;
}
//function for slider
function CountBack_slider(secs,iid,j_timer) {
	if (secs < 0) {
		document.getElementById(iid).innerHTML = FinishMessage;
		document.getElementById('caption'+j_timer).style.display = "none";
		document.getElementById('heading'+j_timer).style.display = "none";
		return;
	}
	DisplayStr = DisplayFormat.replace(/%%D%%/g, calcage(secs,86400,100000));
	DisplayStr = DisplayStr.replace(/%%H%%/g, calcage(secs,3600,24));
	DisplayStr = DisplayStr.replace(/%%M%%/g, calcage(secs,60,60));
	DisplayStr = DisplayStr.replace(/%%S%%/g, calcage(secs,1,60));
	
	var elems = document.getElementsByTagName('*'), i;
	for (i in elems) {
		if((' ' + elems[i].className + ' ').indexOf(' ' + iid + ' ')
				> -1) {
			elems[i].innerHTML = DisplayStr;
		}
	}
	
	jQuery('.'+iid).innerHTML = DisplayStr;
	  if (CountActive)
		setTimeout(function(){CountBack_slider((secs+CountStepper),iid,j_timer)}, SetTimeOutPeriod);
}

//function default
function CountBack(secs,iid,j) {
	if (secs < 0) {
		document.getElementById(iid).innerHTML = FinishMessage;
		document.getElementById('caption'+j).style.display = "none";
		document.getElementById('heading'+j).style.display = "none";
		return;
	}
	DisplayStr = DisplayFormat.replace(/%%D%%/g, calcage(secs,86400,100000));
	DisplayStr = DisplayStr.replace(/%%H%%/g, calcage(secs,3600,24));
	DisplayStr = DisplayStr.replace(/%%M%%/g, calcage(secs,60,60));
	DisplayStr = DisplayStr.replace(/%%S%%/g, calcage(secs,1,60));
	document.getElementById(iid).innerHTML = DisplayStr;
	 if (CountActive)
		setTimeout(function(){CountBack((secs+CountStepper),iid,j)}, SetTimeOutPeriod);
}


/*
 *	Cloud Zoom js
 */
if (typeof Object.create !== 'function') {
	"use strict";
	Object.create = function(obj) {
		function F() {};
		F.prototype = obj;
		return new F();
	};
}
(function(jQuery, window, document, undefined) {
	var ElevateZoom = {
		init: function(options, elem) {
			var self = this;
			self.elem = elem;
			self.jQueryelem = jQuery(elem);
			self.imageSrc = self.jQueryelem.data("zoom-image") ? self.jQueryelem.data("zoom-image") : self.jQueryelem.attr("src");
			self.options = jQuery.extend({}, jQuery.fn.elevateZoom.options, options);
			//TINT OVERRIDE SETTINGS
			if (self.options.tint) {
				self.options.lensColour = "none", //colour of the lens background
					self.options.lensOpacity = "1" //opacity of the lens
			}
			//INNER OVERRIDE SETTINGS
			if (self.options.zoomType == "inner") {
				self.options.showLens = false;
			}
			//Remove alt on hover
			self.jQueryelem.parent().removeAttr('title').removeAttr('alt');
			self.zoomImage = self.imageSrc;
			self.refresh(1);
			//Create the image swap from the gallery 
			jQuery('#' + self.options.gallery + ' a').click(function(e) {
				//Set a class on the currently active gallery image
				if (self.options.galleryActiveClass) {
					jQuery('#' + self.options.gallery + ' a').removeClass(self.options.galleryActiveClass);
					jQuery(this).addClass(self.options.galleryActiveClass);
				}
				//stop any link on the a tag from working
				e.preventDefault();
				//call the swap image function            
				if (jQuery(this).data("zoom-image")) {
					self.zoomImagePre = jQuery(this).data("zoom-image")
				} else {
					self.zoomImagePre = jQuery(this).data("image");
				}
				self.swaptheimage(jQuery(this).data("image"), self.zoomImagePre);
				return false;
			});
		},
		refresh: function(length) {
			var self = this;
			setTimeout(function() {
				self.fetch(self.imageSrc);
			}, length || self.options.refresh);
		},
		fetch: function(imgsrc) {
			//get the image
			var self = this;
			var newImg = new Image();
			newImg.onload = function() {
				//set the large image dimensions - used to calculte ratio's
				self.largeWidth = newImg.width;
				self.largeHeight = newImg.height;
				//once image is loaded start the calls
				self.startZoom();
				self.currentImage = self.imageSrc;
				//let caller know image has been loaded
				self.options.onZoomedImageLoaded(self.jQueryelem);
			}
			newImg.src = imgsrc; // this must be done AFTER setting onload
			return;
		},
		startZoom: function() {
			var self = this;
			//get dimensions of the non zoomed image
			self.nzWidth = self.jQueryelem.width();
			self.nzHeight = self.jQueryelem.height();
			//activated elements
			self.isWindowActive = false;
			self.isLensActive = false;
			self.isTintActive = false;
			self.overWindow = false;
			//CrossFade Wrappe
			if (self.options.imageCrossfade) {
				self.zoomWrap = self.jQueryelem.wrap('<div style="height:' + self.nzHeight + 'px;width:' + self.nzWidth + 'px;" class="zoomWrapper" />');
				self.jQueryelem.css('position', 'absolute');
			}
			self.zoomLock = 1;
			self.scrollingLock = false;
			self.changeBgSize = false;
			self.currentZoomLevel = self.options.zoomLevel;
			//get offset of the non zoomed image
			self.nzOffset = self.jQueryelem.offset();
			//calculate the width ratio of the large/small image
			self.widthRatio = (self.largeWidth / self.currentZoomLevel) / self.nzWidth;
			self.heightRatio = (self.largeHeight / self.currentZoomLevel) / self.nzHeight;
			//if window zoom        
			if (self.options.zoomType == "window") {
				self.zoomWindowStyle = "overflow: hidden;" + "background-position: 0px 0px;text-align:center;" + "background-color: " + String(self.options.zoomWindowBgColour) + ";width: " + String(self.options.zoomWindowWidth) + "px;" + "height: " + String(self.options.zoomWindowHeight) + "px;float: left;" + "background-size: " + self.largeWidth / self.currentZoomLevel + "px " + self.largeHeight / self.currentZoomLevel + "px;" + "display: none;z-index:100;" + "border: " + String(self.options.borderSize) + "px solid " + self.options.borderColour + ";background-repeat: no-repeat;" + "position: absolute;";
			}
			//if inner  zoom    
			if (self.options.zoomType == "inner") {
				//has a border been put on the image? Lets cater for this
				var borderWidth = self.jQueryelem.css("border-left-width");
				self.zoomWindowStyle = "overflow: hidden;" + "margin-left: " + String(borderWidth) + ";" + "margin-top: " + String(borderWidth) + ";" + "background-position: 0px 0px;" + "width: " + String(self.nzWidth) + "px;" + "height: " + String(self.nzHeight) + "px;float: left;" + "display: none;" + "cursor:" + (self.options.cursor) + ";" + "px solid " + self.options.borderColour + ";background-repeat: no-repeat;" + "position: absolute;";
			}
			//lens style for window zoom
			if (self.options.zoomType == "window") {
				// adjust images less than the window height
				if (self.nzHeight < self.options.zoomWindowWidth / self.widthRatio) {
					lensHeight = self.nzHeight;
				} else {
					lensHeight = String((self.options.zoomWindowHeight / self.heightRatio))
				}
				if (self.largeWidth < self.options.zoomWindowWidth) {
					lensWidth = self.nzWidth;
				} else {
					lensWidth = (self.options.zoomWindowWidth / self.widthRatio);
				}
				self.lensStyle = "background-position: 0px 0px;width: " + String((self.options.zoomWindowWidth) / self.widthRatio) + "px;height: " + String((self.options.zoomWindowHeight) / self.heightRatio) + "px;float: right;display: none;" + "overflow: hidden;" + "z-index: 999;" + "-webkit-transform: translateZ(0);" + "opacity:" + (self.options.lensOpacity) + ";filter: alpha(opacity = " + (self.options.lensOpacity * 100) + "); zoom:1;" + "width:" + lensWidth + "px;" + "height:" + lensHeight + "px;" + "background-color:" + (self.options.lensColour) + ";" + "cursor:" + (self.options.cursor) + ";" + "border: " + (self.options.lensBorderSize) + "px" + " solid " + (self.options.lensBorderColour) + ";background-repeat: no-repeat;position: absolute;";
			}
			//tint style
			self.tintStyle = "display: block;" + "position: absolute;" + "background-color: " + self.options.tintColour + ";" + "filter:alpha(opacity=0);" + "opacity: 0;" + "width: " + self.nzWidth + "px;" + "height: " + self.nzHeight + "px;";
			//lens style for lens zoom with optional round for modern browsers
			self.lensRound = '';
			if (self.options.zoomType == "lens") {
				self.lensStyle = "background-position: 0px 0px;" + "float: left;display: none;" + "border: " + String(self.options.borderSize) + "px solid " + self.options.borderColour + ";" + "width:" + String(self.options.lensSize) + "px;" + "height:" + String(self.options.lensSize) + "px;" + "background-repeat: no-repeat;position: absolute;";
			}
			//does not round in all browsers
			if (self.options.lensShape == "round") {
				self.lensRound = "border-top-left-radius: " + String(self.options.lensSize / 2 + self.options.borderSize) + "px;" + "border-top-right-radius: " + String(self.options.lensSize / 2 + self.options.borderSize) + "px;" + "border-bottom-left-radius: " + String(self.options.lensSize / 2 + self.options.borderSize) + "px;" + "border-bottom-right-radius: " + String(self.options.lensSize / 2 + self.options.borderSize) + "px;";
			}
			//create the div's                                                + ""
			//self.zoomContainer = jQuery('<div/>').addClass('zoomContainer').css({"position":"relative", "height":self.nzHeight, "width":self.nzWidth});
			self.zoomContainer = jQuery('<div class="zoomContainer" style="-webkit-transform: translateZ(0);position:absolute;left:' + self.nzOffset.left + 'px;top:' + self.nzOffset.top + 'px;height:' + self.nzHeight + 'px;width:' + self.nzWidth + 'px;"></div>');
			jQuery('body').append(self.zoomContainer);
			//this will add overflow hidden and contrain the lens on lens mode       
			if (self.options.containLensZoom && self.options.zoomType == "lens") {
				self.zoomContainer.css("overflow", "hidden");
			}
			if (self.options.zoomType != "inner") {
				self.zoomLens = jQuery("<div class='zoomLens' style='" + self.lensStyle + self.lensRound + "'>&nbsp;</div>").appendTo(self.zoomContainer).click(function() {
					self.jQueryelem.trigger('click');
				});
				if (self.options.tint) {
					self.tintContainer = jQuery('<div/>').addClass('tintContainer');
					self.zoomTint = jQuery("<div class='zoomTint' style='" + self.tintStyle + "'></div>");
					self.zoomLens.wrap(self.tintContainer);
					self.zoomTintcss = self.zoomLens.after(self.zoomTint);
					//if tint enabled - set an image to show over the tint
					self.zoomTintImage = jQuery('<img style="position: absolute; left: 0px; top: 0px; max-width: none; width: ' + self.nzWidth + 'px; height: ' + self.nzHeight + 'px;" src="' + self.imageSrc + '">').appendTo(self.zoomLens).click(function() {
						self.jQueryelem.trigger('click');
					});
				}
			}
			//create zoom window 
			if (isNaN(self.options.zoomWindowPosition)) {
				self.zoomWindow = jQuery("<div style='z-index:999;left:" + (self.windowOffsetLeft) + "px;top:" + (self.windowOffsetTop) + "px;" + self.zoomWindowStyle + "' class='zoomWindow'>&nbsp;</div>").appendTo('body').click(function() {
					self.jQueryelem.trigger('click');
				});
			} else {
				self.zoomWindow = jQuery("<div style='z-index:999;left:" + (self.windowOffsetLeft) + "px;top:" + (self.windowOffsetTop) + "px;" + self.zoomWindowStyle + "' class='zoomWindow'>&nbsp;</div>").appendTo(self.zoomContainer).click(function() {
					self.jQueryelem.trigger('click');
				});
			}
			self.zoomWindowContainer = jQuery('<div/>').addClass('zoomWindowContainer').css("width", self.options.zoomWindowWidth);
			self.zoomWindow.wrap(self.zoomWindowContainer);
			//  self.captionStyle = "text-align: left;background-color: black;color: white;font-weight: bold;padding: 10px;font-family: sans-serif;font-size: 11px";                                                                                                                                                                                                                                          
			// self.zoomCaption = jQuery('<div class="elevatezoom-caption" style="'+self.captionStyle+'display: block; width: 280px;">INSERT ALT TAG</div>').appendTo(self.zoomWindow.parent());
			if (self.options.zoomType == "lens") {
				self.zoomLens.css({
					backgroundImage: "url('" + self.imageSrc + "')"
				});
			}
			if (self.options.zoomType == "window") {
				self.zoomWindow.css({
					backgroundImage: "url('" + self.imageSrc + "')"
				});
			}
			if (self.options.zoomType == "inner") {
				self.zoomWindow.css({
					backgroundImage: "url('" + self.imageSrc + "')"
				});
			}
			/*-------------------END THE ZOOM WINDOW AND LENS----------------------------------*/
			//touch events
			self.jQueryelem.bind('touchmove', function(e) {
				e.preventDefault();
				var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
				self.setPosition(touch);
			});
			self.zoomContainer.bind('touchmove', function(e) {
				if (self.options.zoomType == "inner") {
					self.showHideWindow("show");
				}
				e.preventDefault();
				var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
				self.setPosition(touch);
			});
			self.zoomContainer.bind('touchend', function(e) {
				self.showHideWindow("hide");
				if (self.options.showLens) {
					self.showHideLens("hide");
				}
				if (self.options.tint && self.options.zoomType != "inner") {
					self.showHideTint("hide");
				}
			});
			self.jQueryelem.bind('touchend', function(e) {
				self.showHideWindow("hide");
				if (self.options.showLens) {
					self.showHideLens("hide");
				}
				if (self.options.tint && self.options.zoomType != "inner") {
					self.showHideTint("hide");
				}
			});
			if (self.options.showLens) {
				self.zoomLens.bind('touchmove', function(e) {
					e.preventDefault();
					var touch = e.originalEvent.touches[0] || e.originalEvent.changedTouches[0];
					self.setPosition(touch);
				});
				self.zoomLens.bind('touchend', function(e) {
					self.showHideWindow("hide");
					if (self.options.showLens) {
						self.showHideLens("hide");
					}
					if (self.options.tint && self.options.zoomType != "inner") {
						self.showHideTint("hide");
					}
				});
			}
			//Needed to work in IE
			self.jQueryelem.bind('mousemove', function(e) {
				if (self.overWindow == false) {
					self.setElements("show");
				}
				//make sure on orientation change the setposition is not fired
				if (self.lastX !== e.clientX || self.lastY !== e.clientY) {
					self.setPosition(e);
					self.currentLoc = e;
				}
				self.lastX = e.clientX;
				self.lastY = e.clientY;
			});
			self.zoomContainer.bind('mousemove', function(e) {
				if (self.overWindow == false) {
					self.setElements("show");
				}
				//make sure on orientation change the setposition is not fired 
				if (self.lastX !== e.clientX || self.lastY !== e.clientY) {
					self.setPosition(e);
					self.currentLoc = e;
				}
				self.lastX = e.clientX;
				self.lastY = e.clientY;
			});
			if (self.options.zoomType != "inner") {
				self.zoomLens.bind('mousemove', function(e) {
					//make sure on orientation change the setposition is not fired
					if (self.lastX !== e.clientX || self.lastY !== e.clientY) {
						self.setPosition(e);
						self.currentLoc = e;
					}
					self.lastX = e.clientX;
					self.lastY = e.clientY;
				});
			}
			if (self.options.tint && self.options.zoomType != "inner") {
				self.zoomTint.bind('mousemove', function(e) {
					//make sure on orientation change the setposition is not fired
					if (self.lastX !== e.clientX || self.lastY !== e.clientY) {
						self.setPosition(e);
						self.currentLoc = e;
					}
					self.lastX = e.clientX;
					self.lastY = e.clientY;
				});
			}
			if (self.options.zoomType == "inner") {
				self.zoomWindow.bind('mousemove', function(e) {
					//self.overWindow = true;
					//make sure on orientation change the setposition is not fired
					if (self.lastX !== e.clientX || self.lastY !== e.clientY) {
						self.setPosition(e);
						self.currentLoc = e;
					}
					self.lastX = e.clientX;
					self.lastY = e.clientY;
				});
			}
			//  lensFadeOut: 500,  zoomTintFadeIn
			self.zoomContainer.add(self.jQueryelem).mouseenter(function() {
				if (self.overWindow == false) {
					self.setElements("show");
				}
			}).mouseleave(function() {
				if (!self.scrollLock) {
					self.setElements("hide");
				}
			});
			//end ove image
			if (self.options.zoomType != "inner") {
				self.zoomWindow.mouseenter(function() {
					self.overWindow = true;
					self.setElements("hide");
				}).mouseleave(function() {
					self.overWindow = false;
				});
			}
			//end ove image
			//				var delta = parseInt(e.originalEvent.wheelDelta || -e.originalEvent.detail);
			//      jQuery(this).empty();    
			//    return false;
			//fix for initial zoom setting
			if (self.options.zoomLevel != 1) {
				//	self.changeZoomLevel(self.currentZoomLevel);
			}
			//set the min zoomlevel
			if (self.options.minZoomLevel) {
				self.minZoomLevel = self.options.minZoomLevel;
			} else {
				self.minZoomLevel = self.options.scrollZoomIncrement * 2;
			}
			if (self.options.scrollZoom) {
				self.zoomContainer.add(self.jQueryelem).bind('mousewheel DOMMouseScroll MozMousePixelScroll', function(e) {
					//						in IE there is issue with firing of mouseleave - So check whether still scrolling
					//						and on mouseleave check if scrolllock          
					self.scrollLock = true;
					clearTimeout(jQuery.data(this, 'timer'));
					jQuery.data(this, 'timer', setTimeout(function() {
						self.scrollLock = false;
						//do something
					}, 250));
					var theEvent = e.originalEvent.wheelDelta || e.originalEvent.detail * -1
						//this.scrollTop += ( delta < 0 ? 1 : -1 ) * 30;
						//   e.preventDefault();
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
					if (theEvent / 120 > 0) {
						//scrolling up
						if (self.currentZoomLevel >= self.minZoomLevel) {
							self.changeZoomLevel(self.currentZoomLevel - self.options.scrollZoomIncrement);
						}
					} else {
						//scrolling down
						if (self.options.maxZoomLevel) {
							if (self.currentZoomLevel <= self.options.maxZoomLevel) {
								self.changeZoomLevel(parseFloat(self.currentZoomLevel) + self.options.scrollZoomIncrement);
							}
						} else {
							//andy 
							self.changeZoomLevel(parseFloat(self.currentZoomLevel) + self.options.scrollZoomIncrement);
						}
					}
					return false;
				});
			}
		},
		setElements: function(type) {
			var self = this;
			if (!self.options.zoomEnabled) {
				return false;
			}
			if (type == "show") {
				if (self.isWindowSet) {
					if (self.options.zoomType == "inner") {
						self.showHideWindow("show");
					}
					if (self.options.zoomType == "window") {
						self.showHideWindow("show");
					}
					if (self.options.showLens) {
						self.showHideLens("show");
					}
					if (self.options.tint && self.options.zoomType != "inner") {
						self.showHideTint("show");
					}
				}
			}
			if (type == "hide") {
				if (self.options.zoomType == "window") {
					self.showHideWindow("hide");
				}
				if (!self.options.tint) {
					self.showHideWindow("hide");
				}
				if (self.options.showLens) {
					self.showHideLens("hide");
				}
				if (self.options.tint) {
					self.showHideTint("hide");
				}
			}
		},
		setPosition: function(e) {
			var self = this;
			if (!self.options.zoomEnabled) {
				return false;
			}
			//recaclc offset each time in case the image moves
			//this can be caused by other on page elements
			self.nzHeight = self.jQueryelem.height();
			self.nzWidth = self.jQueryelem.width();
			self.nzOffset = self.jQueryelem.offset();
			if (self.options.tint && self.options.zoomType != "inner") {
				self.zoomTint.css({
					top: 0
				});
				self.zoomTint.css({
					left: 0
				});
			}
			//set responsive       
			//will checking if the image needs changing before running this code work faster?
			if (self.options.responsive && !self.options.scrollZoom) {
				if (self.options.showLens) {
					if (self.nzHeight < self.options.zoomWindowWidth / self.widthRatio) {
						lensHeight = self.nzHeight;
					} else {
						lensHeight = String((self.options.zoomWindowHeight / self.heightRatio))
					}
					if (self.largeWidth < self.options.zoomWindowWidth) {
						lensWidth = self.nzWidth;
					} else {
						lensWidth = (self.options.zoomWindowWidth / self.widthRatio);
					}
					self.widthRatio = self.largeWidth / self.nzWidth;
					self.heightRatio = self.largeHeight / self.nzHeight;
					if (self.options.zoomType != "lens") {
						//possibly dont need to keep recalcalculating
						//if the lens is heigher than the image, then set lens size to image size
						if (self.nzHeight < self.options.zoomWindowWidth / self.widthRatio) {
							lensHeight = self.nzHeight;
						} else {
							lensHeight = String((self.options.zoomWindowHeight / self.heightRatio))
						}
						if (self.options.zoomWindowWidth < self.options.zoomWindowWidth) {
							lensWidth = self.nzWidth;
						} else {
							lensWidth = (self.options.zoomWindowWidth / self.widthRatio);
						}
						self.zoomLens.css('width', lensWidth);
						self.zoomLens.css('height', lensHeight);
						if (self.options.tint) {
							self.zoomTintImage.css('width', self.nzWidth);
							self.zoomTintImage.css('height', self.nzHeight);
						}
					}
					if (self.options.zoomType == "lens") {
						self.zoomLens.css({
							width: String(self.options.lensSize) + 'px',
							height: String(self.options.lensSize) + 'px'
						})
					}
					//end responsive image change
				}
			}
			//container fix
			self.zoomContainer.css({
				top: self.nzOffset.top
			});
			self.zoomContainer.css({
				left: self.nzOffset.left
			});
			self.mouseLeft = parseInt(e.pageX - self.nzOffset.left);
			self.mouseTop = parseInt(e.pageY - self.nzOffset.top);
			//calculate the Location of the Lens
			//calculate the bound regions - but only if zoom window
			if (self.options.zoomType == "window") {
				self.Etoppos = (self.mouseTop < (self.zoomLens.height() / 2));
				self.Eboppos = (self.mouseTop > self.nzHeight - (self.zoomLens.height() / 2) - (self.options.lensBorderSize * 2));
				self.Eloppos = (self.mouseLeft < 0 + ((self.zoomLens.width() / 2)));
				self.Eroppos = (self.mouseLeft > (self.nzWidth - (self.zoomLens.width() / 2) - (self.options.lensBorderSize * 2)));
			}
			//calculate the bound regions - but only for inner zoom
			if (self.options.zoomType == "inner") {
				self.Etoppos = (self.mouseTop < ((self.nzHeight / 2) / self.heightRatio));
				self.Eboppos = (self.mouseTop > (self.nzHeight - ((self.nzHeight / 2) / self.heightRatio)));
				self.Eloppos = (self.mouseLeft < 0 + (((self.nzWidth / 2) / self.widthRatio)));
				self.Eroppos = (self.mouseLeft > (self.nzWidth - (self.nzWidth / 2) / self.widthRatio - (self.options.lensBorderSize * 2)));
			}
			// if the mouse position of the slider is one of the outerbounds, then hide  window and lens
			if (self.mouseLeft <= 0 || self.mouseTop < 0 || self.mouseLeft > self.nzWidth || self.mouseTop > self.nzHeight) {
				self.setElements("hide");
				return;
			}
			//else continue with operations
			else {
				//lens options
				if (self.options.showLens) {
					//		self.showHideLens("show");
					//set background position of lens
					self.lensLeftPos = String(self.mouseLeft - self.zoomLens.width() / 2);
					self.lensTopPos = String(self.mouseTop - self.zoomLens.height() / 2);
				}
				//adjust the background position if the mouse is in one of the outer regions 
				//Top region
				if (self.Etoppos) {
					self.lensTopPos = 0;
				}
				//Left Region
				if (self.Eloppos) {
					self.windowLeftPos = 0;
					self.lensLeftPos = 0;
					self.tintpos = 0;
				}
				//Set bottom and right region for window mode
				if (self.options.zoomType == "window") {
					if (self.Eboppos) {
						self.lensTopPos = Math.max((self.nzHeight) - self.zoomLens.height() - (self.options.lensBorderSize * 2), 0);
					}
					if (self.Eroppos) {
						self.lensLeftPos = (self.nzWidth - (self.zoomLens.width()) - (self.options.lensBorderSize * 2));
					}
				}
				//Set bottom and right region for inner mode
				if (self.options.zoomType == "inner") {
					if (self.Eboppos) {
						self.lensTopPos = Math.max(((self.nzHeight) - (self.options.lensBorderSize * 2)), 0);
					}
					if (self.Eroppos) {
						self.lensLeftPos = (self.nzWidth - (self.nzWidth) - (self.options.lensBorderSize * 2));
					}
				}
				//if lens zoom
				if (self.options.zoomType == "lens") {
					self.windowLeftPos = String(((e.pageX - self.nzOffset.left) * self.widthRatio - self.zoomLens.width() / 2) * (-1));
					self.windowTopPos = String(((e.pageY - self.nzOffset.top) * self.heightRatio - self.zoomLens.height() / 2) * (-1));
					self.zoomLens.css({
						backgroundPosition: self.windowLeftPos + 'px ' + self.windowTopPos + 'px'
					});
					if (self.changeBgSize) {
						if (self.nzHeight > self.nzWidth) {
							if (self.options.zoomType == "lens") {
								self.zoomLens.css({
									"background-size": self.largeWidth / self.newvalueheight + 'px ' + self.largeHeight / self.newvalueheight + 'px'
								});
							}
							self.zoomWindow.css({
								"background-size": self.largeWidth / self.newvalueheight + 'px ' + self.largeHeight / self.newvalueheight + 'px'
							});
						} else {
							if (self.options.zoomType == "lens") {
								self.zoomLens.css({
									"background-size": self.largeWidth / self.newvaluewidth + 'px ' + self.largeHeight / self.newvaluewidth + 'px'
								});
							}
							self.zoomWindow.css({
								"background-size": self.largeWidth / self.newvaluewidth + 'px ' + self.largeHeight / self.newvaluewidth + 'px'
							});
						}
						self.changeBgSize = false;
					}
					self.setWindowPostition(e);
				}
				//if tint zoom   
				if (self.options.tint && self.options.zoomType != "inner") {
					self.setTintPosition(e);
				}
				//set the css background position 
				if (self.options.zoomType == "window") {
					self.setWindowPostition(e);
				}
				if (self.options.zoomType == "inner") {
					self.setWindowPostition(e);
				}
				if (self.options.showLens) {
					if (self.fullwidth && self.options.zoomType != "lens") {
						self.lensLeftPos = 0;
					}
					self.zoomLens.css({
						left: self.lensLeftPos + 'px',
						top: self.lensTopPos + 'px'
					})
				}
			} //end else
		},
		showHideWindow: function(change) {
			var self = this;
			if (change == "show") {
				if (!self.isWindowActive) {
					if (self.options.zoomWindowFadeIn) {
						self.zoomWindow.stop(true, true, false).fadeIn(self.options.zoomWindowFadeIn);
					} else {
						self.zoomWindow.show();
					}
					self.isWindowActive = true;
				}
			}
			if (change == "hide") {
				if (self.isWindowActive) {
					if (self.options.zoomWindowFadeOut) {
						self.zoomWindow.stop(true, true).fadeOut(self.options.zoomWindowFadeOut);
					} else {
						self.zoomWindow.hide();
					}
					self.isWindowActive = false;
				}
			}
		},
		showHideLens: function(change) {
			var self = this;
			if (change == "show") {
				if (!self.isLensActive) {
					if (self.options.lensFadeIn) {
						self.zoomLens.stop(true, true, false).fadeIn(self.options.lensFadeIn);
					} else {
						self.zoomLens.show();
					}
					self.isLensActive = true;
				}
			}
			if (change == "hide") {
				if (self.isLensActive) {
					if (self.options.lensFadeOut) {
						self.zoomLens.stop(true, true).fadeOut(self.options.lensFadeOut);
					} else {
						self.zoomLens.hide();
					}
					self.isLensActive = false;
				}
			}
		},
		showHideTint: function(change) {
			var self = this;
			if (change == "show") {
				if (!self.isTintActive) {
					if (self.options.zoomTintFadeIn) {
						self.zoomTint.css({
							opacity: self.options.tintOpacity
						}).animate().stop(true, true).fadeIn("slow");
					} else {
						self.zoomTint.css({
							opacity: self.options.tintOpacity
						}).animate();
						self.zoomTint.show();
					}
					self.isTintActive = true;
				}
			}
			if (change == "hide") {
				if (self.isTintActive) {
					if (self.options.zoomTintFadeOut) {
						self.zoomTint.stop(true, true).fadeOut(self.options.zoomTintFadeOut);
					} else {
						self.zoomTint.hide();
					}
					self.isTintActive = false;
				}
			}
		},
		setLensPostition: function(e) {},
		setWindowPostition: function(e) {
			//return obj.slice( 0, count );
			var self = this;
			if (!isNaN(self.options.zoomWindowPosition)) {
				switch (self.options.zoomWindowPosition) {
					case 1: //done         
						self.windowOffsetTop = (self.options.zoomWindowOffety); //DONE - 1
						self.windowOffsetLeft = (+self.nzWidth); //DONE 1, 2, 3, 4, 16
						break;
					case 2:
						if (self.options.zoomWindowHeight > self.nzHeight) { //positive margin
							self.windowOffsetTop = ((self.options.zoomWindowHeight / 2) - (self.nzHeight / 2)) * (-1);
							self.windowOffsetLeft = (self.nzWidth); //DONE 1, 2, 3, 4, 16
						} else { //negative margin
						}
						break;
					case 3: //done        
						self.windowOffsetTop = (self.nzHeight - self.zoomWindow.height() - (self.options.borderSize * 2)); //DONE 3,9
						self.windowOffsetLeft = (self.nzWidth); //DONE 1, 2, 3, 4, 16
						break;
					case 4: //done  
						self.windowOffsetTop = (self.nzHeight); //DONE - 4,5,6,7,8
						self.windowOffsetLeft = (self.nzWidth); //DONE 1, 2, 3, 4, 16
						break;
					case 5: //done  
						self.windowOffsetTop = (self.nzHeight); //DONE - 4,5,6,7,8
						self.windowOffsetLeft = (self.nzWidth - self.zoomWindow.width() - (self.options.borderSize * 2)); //DONE - 5,15
						break;
					case 6:
						if (self.options.zoomWindowHeight > self.nzHeight) { //positive margin
							self.windowOffsetTop = (self.nzHeight); //DONE - 4,5,6,7,8
							self.windowOffsetLeft = ((self.options.zoomWindowWidth / 2) - (self.nzWidth / 2) + (self.options.borderSize * 2)) * (-1);
						} else { //negative margin
						}
						break;
					case 7: //done  
						self.windowOffsetTop = (self.nzHeight); //DONE - 4,5,6,7,8
						self.windowOffsetLeft = 0; //DONE 7, 13
						break;
					case 8: //done  
						self.windowOffsetTop = (self.nzHeight); //DONE - 4,5,6,7,8
						self.windowOffsetLeft = (self.zoomWindow.width() + (self.options.borderSize * 2)) * (-1); //DONE 8,9,10,11,12
						break;
					case 9: //done  
						self.windowOffsetTop = (self.nzHeight - self.zoomWindow.height() - (self.options.borderSize * 2)); //DONE 3,9
						self.windowOffsetLeft = (self.zoomWindow.width() + (self.options.borderSize * 2)) * (-1); //DONE 8,9,10,11,12
						break;
					case 10:
						if (self.options.zoomWindowHeight > self.nzHeight) { //positive margin
							self.windowOffsetTop = ((self.options.zoomWindowHeight / 2) - (self.nzHeight / 2)) * (-1);
							self.windowOffsetLeft = (self.zoomWindow.width() + (self.options.borderSize * 2)) * (-1); //DONE 8,9,10,11,12
						} else { //negative margin
						}
						break;
					case 11:
						self.windowOffsetTop = (self.options.zoomWindowOffety);
						self.windowOffsetLeft = (self.zoomWindow.width() + (self.options.borderSize * 2)) * (-1); //DONE 8,9,10,11,12
						break;
					case 12: //done  
						self.windowOffsetTop = (self.zoomWindow.height() + (self.options.borderSize * 2)) * (-1); //DONE 12,13,14,15,16
						self.windowOffsetLeft = (self.zoomWindow.width() + (self.options.borderSize * 2)) * (-1); //DONE 8,9,10,11,12
						break;
					case 13: //done  
						self.windowOffsetTop = (self.zoomWindow.height() + (self.options.borderSize * 2)) * (-1); //DONE 12,13,14,15,16
						self.windowOffsetLeft = (0); //DONE 7, 13
						break;
					case 14:
						if (self.options.zoomWindowHeight > self.nzHeight) { //positive margin
							self.windowOffsetTop = (self.zoomWindow.height() + (self.options.borderSize * 2)) * (-1); //DONE 12,13,14,15,16
							self.windowOffsetLeft = ((self.options.zoomWindowWidth / 2) - (self.nzWidth / 2) + (self.options.borderSize * 2)) * (-1);
						} else { //negative margin
						}
						break;
					case 15: //done   
						self.windowOffsetTop = (self.zoomWindow.height() + (self.options.borderSize * 2)) * (-1); //DONE 12,13,14,15,16
						self.windowOffsetLeft = (self.nzWidth - self.zoomWindow.width() - (self.options.borderSize * 2)); //DONE - 5,15
						break;
					case 16: //done  
						self.windowOffsetTop = (self.zoomWindow.height() + (self.options.borderSize * 2)) * (-1); //DONE 12,13,14,15,16
						self.windowOffsetLeft = (self.nzWidth); //DONE 1, 2, 3, 4, 16
						break;
					default: //done  
						self.windowOffsetTop = (self.options.zoomWindowOffety); //DONE - 1
						self.windowOffsetLeft = (self.nzWidth); //DONE 1, 2, 3, 4, 16
				}
			} //end isNAN
			else {
				//WE CAN POSITION IN A CLASS - ASSUME THAT ANY STRING PASSED IS
				self.externalContainer = jQuery('#' + self.options.zoomWindowPosition);
				self.externalContainerWidth = self.externalContainer.width();
				self.externalContainerHeight = self.externalContainer.height();
				self.externalContainerOffset = self.externalContainer.offset();
				self.windowOffsetTop = self.externalContainerOffset.top; //DONE - 1
				self.windowOffsetLeft = self.externalContainerOffset.left; //DONE 1, 2, 3, 4, 16
			}
			self.isWindowSet = true;
			self.windowOffsetTop = self.windowOffsetTop + self.options.zoomWindowOffety;
			self.windowOffsetLeft = self.windowOffsetLeft + self.options.zoomWindowOffetx;
			self.zoomWindow.css({
				top: self.windowOffsetTop
			});
			self.zoomWindow.css({
				left: self.windowOffsetLeft
			});
			if (self.options.zoomType == "inner") {
				self.zoomWindow.css({
					top: 0
				});
				self.zoomWindow.css({
					left: 0
				});
			}
			self.windowLeftPos = String(((e.pageX - self.nzOffset.left) * self.widthRatio - self.zoomWindow.width() / 2) * (-1));
			self.windowTopPos = String(((e.pageY - self.nzOffset.top) * self.heightRatio - self.zoomWindow.height() / 2) * (-1));
			if (self.Etoppos) {
				self.windowTopPos = 0;
			}
			if (self.Eloppos) {
				self.windowLeftPos = 0;
			}
			if (self.Eboppos) {
				self.windowTopPos = (self.largeHeight / self.currentZoomLevel - self.zoomWindow.height()) * (-1);
			}
			if (self.Eroppos) {
				self.windowLeftPos = ((self.largeWidth / self.currentZoomLevel - self.zoomWindow.width()) * (-1));
			}
			//stops micro movements
			if (self.fullheight) {
				self.windowTopPos = 0;
			}
			if (self.fullwidth) {
				self.windowLeftPos = 0;
			}
			//set the css background position 
			if (self.options.zoomType == "window" || self.options.zoomType == "inner") {
				if (self.zoomLock == 1) {
					//overrides for images not zoomable
					if (self.widthRatio <= 1) {
						self.windowLeftPos = 0;
					}
					if (self.heightRatio <= 1) {
						self.windowTopPos = 0;
					}
				}
				// adjust images less than the window height
				if (self.largeHeight < self.options.zoomWindowHeight) {
					self.windowTopPos = 0;
				}
				if (self.largeWidth < self.options.zoomWindowWidth) {
					self.windowLeftPos = 0;
				}
				//set the zoomwindow background position
				if (self.options.easing) {
					//     if(self.changeZoom){
					//           clearInterval(self.loop);
					//           self.changeZoom = false;
					//           self.loop = false;
					//            }
					//set the pos to 0 if not set
					if (!self.xp) {
						self.xp = 0;
					}
					if (!self.yp) {
						self.yp = 0;
					}
					//if loop not already started, then run it 
					if (!self.loop) {
						self.loop = setInterval(function() {
							//using zeno's paradox    
							self.xp += (self.windowLeftPos - self.xp) / self.options.easingAmount;
							self.yp += (self.windowTopPos - self.yp) / self.options.easingAmount;
							if (self.scrollingLock) {
								clearInterval(self.loop);
								self.xp = self.windowLeftPos;
								self.yp = self.windowTopPos
								self.xp = ((e.pageX - self.nzOffset.left) * self.widthRatio - self.zoomWindow.width() / 2) * (-1);
								self.yp = (((e.pageY - self.nzOffset.top) * self.heightRatio - self.zoomWindow.height() / 2) * (-1));
								if (self.changeBgSize) {
									if (self.nzHeight > self.nzWidth) {
										if (self.options.zoomType == "lens") {
											self.zoomLens.css({
												"background-size": self.largeWidth / self.newvalueheight + 'px ' + self.largeHeight / self.newvalueheight + 'px'
											});
										}
										self.zoomWindow.css({
											"background-size": self.largeWidth / self.newvalueheight + 'px ' + self.largeHeight / self.newvalueheight + 'px'
										});
									} else {
										if (self.options.zoomType != "lens") {
											self.zoomLens.css({
												"background-size": self.largeWidth / self.newvaluewidth + 'px ' + self.largeHeight / self.newvalueheight + 'px'
											});
										}
										self.zoomWindow.css({
											"background-size": self.largeWidth / self.newvaluewidth + 'px ' + self.largeHeight / self.newvaluewidth + 'px'
										});
									}
									/*
             if(!self.bgxp){self.bgxp = self.largeWidth/self.newvalue;}
						if(!self.bgyp){self.bgyp = self.largeHeight/self.newvalue ;}  
                 if (!self.bgloop){   
                 	self.bgloop = setInterval(function(){   

                 self.bgxp += (self.largeWidth/self.newvalue  - self.bgxp) / self.options.easingAmount; 
								self.bgyp += (self.largeHeight/self.newvalue  - self.bgyp) / self.options.easingAmount;

           self.zoomWindow.css({ "background-size": self.bgxp + 'px ' + self.bgyp + 'px' });


                  }, 16);

                 }
										 */
									self.changeBgSize = false;
								}
								self.zoomWindow.css({
									backgroundPosition: self.windowLeftPos + 'px ' + self.windowTopPos + 'px'
								});
								self.scrollingLock = false;
								self.loop = false;
							} else {
								if (self.changeBgSize) {
									if (self.nzHeight > self.nzWidth) {
										if (self.options.zoomType == "lens") {
											self.zoomLens.css({
												"background-size": self.largeWidth / self.newvalueheight + 'px ' + self.largeHeight / self.newvalueheight + 'px'
											});
										}
										self.zoomWindow.css({
											"background-size": self.largeWidth / self.newvalueheight + 'px ' + self.largeHeight / self.newvalueheight + 'px'
										});
									} else {
										if (self.options.zoomType != "lens") {
											self.zoomLens.css({
												"background-size": self.largeWidth / self.newvaluewidth + 'px ' + self.largeHeight / self.newvaluewidth + 'px'
											});
										}
										self.zoomWindow.css({
											"background-size": self.largeWidth / self.newvaluewidth + 'px ' + self.largeHeight / self.newvaluewidth + 'px'
										});
									}
									self.changeBgSize = false;
								}
								self.zoomWindow.css({
									backgroundPosition: self.xp + 'px ' + self.yp + 'px'
								});
							}
						}, 16);
					}
				} else {
					if (self.changeBgSize) {
						if (self.nzHeight > self.nzWidth) {
							if (self.options.zoomType == "lens") {
								self.zoomLens.css({
									"background-size": self.largeWidth / self.newvalueheight + 'px ' + self.largeHeight / self.newvalueheight + 'px'
								});
							}
							self.zoomWindow.css({
								"background-size": self.largeWidth / self.newvalueheight + 'px ' + self.largeHeight / self.newvalueheight + 'px'
							});
						} else {
							if (self.options.zoomType == "lens") {
								self.zoomLens.css({
									"background-size": self.largeWidth / self.newvaluewidth + 'px ' + self.largeHeight / self.newvaluewidth + 'px'
								});
							}
							if ((self.largeHeight / self.newvaluewidth) < self.options.zoomWindowHeight) {
								self.zoomWindow.css({
									"background-size": self.largeWidth / self.newvaluewidth + 'px ' + self.largeHeight / self.newvaluewidth + 'px'
								});
							} else {
								self.zoomWindow.css({
									"background-size": self.largeWidth / self.newvalueheight + 'px ' + self.largeHeight / self.newvalueheight + 'px'
								});
							}
						}
						self.changeBgSize = false;
					}
					self.zoomWindow.css({
						backgroundPosition: self.windowLeftPos + 'px ' + self.windowTopPos + 'px'
					});
				}
			}
		},
		setTintPosition: function(e) {
			var self = this;
			self.nzOffset = self.jQueryelem.offset();
			self.tintpos = String(((e.pageX - self.nzOffset.left) - (self.zoomLens.width() / 2)) * (-1));
			self.tintposy = String(((e.pageY - self.nzOffset.top) - self.zoomLens.height() / 2) * (-1));
			if (self.Etoppos) {
				self.tintposy = 0;
			}
			if (self.Eloppos) {
				self.tintpos = 0;
			}
			if (self.Eboppos) {
				self.tintposy = (self.nzHeight - self.zoomLens.height() - (self.options.lensBorderSize * 2)) * (-1);
			}
			if (self.Eroppos) {
				self.tintpos = ((self.nzWidth - self.zoomLens.width() - (self.options.lensBorderSize * 2)) * (-1));
			}
			if (self.options.tint) {
				//stops micro movements
				if (self.fullheight) {
					self.tintposy = 0;
				}
				if (self.fullwidth) {
					self.tintpos = 0;
				}
				self.zoomTintImage.css({
					'left': self.tintpos + 'px'
				});
				self.zoomTintImage.css({
					'top': self.tintposy + 'px'
				});
			}
		},
		swaptheimage: function(smallimage, largeimage) {
			var self = this;
			var newImg = new Image();
			if (self.options.loadingIcon) {
				self.spinner = jQuery('<div style="background: url(\'' + self.options.loadingIcon + '\') no-repeat center;height:' + self.nzHeight + 'px;width:' + self.nzWidth + 'px;z-index: 2000;position: absolute; background-position: center center;"></div>');
				self.jQueryelem.after(self.spinner);
			}
			self.options.onImageSwap(self.jQueryelem);
			newImg.onload = function() {
				self.largeWidth = newImg.width;
				self.largeHeight = newImg.height;
				self.zoomImage = largeimage;
				self.zoomWindow.css({
					"background-size": self.largeWidth + 'px ' + self.largeHeight + 'px'
				});
				self.zoomWindow.css({
					"background-size": self.largeWidth + 'px ' + self.largeHeight + 'px'
				});
				self.swapAction(smallimage, largeimage);
				return;
			}
			newImg.src = largeimage; // this must be done AFTER setting onload
		},
		swapAction: function(smallimage, largeimage) {
			var self = this;
			var newImg2 = new Image();
			newImg2.onload = function() {
				//re-calculate values
				self.nzHeight = newImg2.height;
				self.nzWidth = newImg2.width;
				self.options.onImageSwapComplete(self.jQueryelem);
				self.doneCallback();
				return;
			}
			newImg2.src = smallimage;
			//reset the zoomlevel to that initially set in options
			self.currentZoomLevel = self.options.zoomLevel;
			self.options.maxZoomLevel = false;
			//swaps the main image
			//self.jQueryelem.attr("src",smallimage);
			//swaps the zoom image     
			if (self.options.zoomType == "lens") {
				self.zoomLens.css({
					backgroundImage: "url('" + largeimage + "')"
				});
			}
			if (self.options.zoomType == "window") {
				self.zoomWindow.css({
					backgroundImage: "url('" + largeimage + "')"
				});
			}
			if (self.options.zoomType == "inner") {
				self.zoomWindow.css({
					backgroundImage: "url('" + largeimage + "')"
				});
			}
			self.currentImage = largeimage;
			if (self.options.imageCrossfade) {
				var oldImg = self.jQueryelem;
				var newImg = oldImg.clone();
				self.jQueryelem.attr("src", smallimage)
				self.jQueryelem.after(newImg);
				newImg.stop(true).fadeOut(self.options.imageCrossfade, function() {
					jQuery(this).remove();
				});
				//       				if(self.options.zoomType == "inner"){
				//remove any attributes on the cloned image so we can resize later
				self.jQueryelem.width("auto").removeAttr("width");
				self.jQueryelem.height("auto").removeAttr("height");
				//   }
				oldImg.fadeIn(self.options.imageCrossfade);
				if (self.options.tint && self.options.zoomType != "inner") {
					var oldImgTint = self.zoomTintImage;
					var newImgTint = oldImgTint.clone();
					self.zoomTintImage.attr("src", largeimage)
					self.zoomTintImage.after(newImgTint);
					newImgTint.stop(true).fadeOut(self.options.imageCrossfade, function() {
						jQuery(this).remove();
					});
					oldImgTint.fadeIn(self.options.imageCrossfade);
					//self.zoomTintImage.attr("width",elem.data("image"));
					//resize the tint window
					self.zoomTint.css({
						height: self.jQueryelem.height()
					});
					self.zoomTint.css({
						width: self.jQueryelem.width()
					});
				}
				self.zoomContainer.css("height", self.jQueryelem.height());
				self.zoomContainer.css("width", self.jQueryelem.width());
				if (self.options.zoomType == "inner") {
					if (!self.options.constrainType) {
						self.zoomWrap.parent().css("height", self.jQueryelem.height());
						self.zoomWrap.parent().css("width", self.jQueryelem.width());
						self.zoomWindow.css("height", self.jQueryelem.height());
						self.zoomWindow.css("width", self.jQueryelem.width());
					}
				}
				if (self.options.imageCrossfade) {
					self.zoomWrap.css("height", self.jQueryelem.height());
					self.zoomWrap.css("width", self.jQueryelem.width());
				}
			} else {
				self.jQueryelem.attr("src", smallimage);
				if (self.options.tint) {
					self.zoomTintImage.attr("src", largeimage);
					//self.zoomTintImage.attr("width",elem.data("image"));
					self.zoomTintImage.attr("height", self.jQueryelem.height());
					//self.zoomTintImage.attr('src') = elem.data("image");
					self.zoomTintImage.css({
						height: self.jQueryelem.height()
					});
					self.zoomTint.css({
						height: self.jQueryelem.height()
					});
				}
				self.zoomContainer.css("height", self.jQueryelem.height());
				self.zoomContainer.css("width", self.jQueryelem.width());
				if (self.options.imageCrossfade) {
					self.zoomWrap.css("height", self.jQueryelem.height());
					self.zoomWrap.css("width", self.jQueryelem.width());
				}
			}
			if (self.options.constrainType) {
				//This will contrain the image proportions
				if (self.options.constrainType == "height") {
					self.zoomContainer.css("height", self.options.constrainSize);
					self.zoomContainer.css("width", "auto");
					if (self.options.imageCrossfade) {
						self.zoomWrap.css("height", self.options.constrainSize);
						self.zoomWrap.css("width", "auto");
						self.constwidth = self.zoomWrap.width();
					} else {
						self.jQueryelem.css("height", self.options.constrainSize);
						self.jQueryelem.css("width", "auto");
						self.constwidth = self.jQueryelem.width();
					}
					if (self.options.zoomType == "inner") {
						self.zoomWrap.parent().css("height", self.options.constrainSize);
						self.zoomWrap.parent().css("width", self.constwidth);
						self.zoomWindow.css("height", self.options.constrainSize);
						self.zoomWindow.css("width", self.constwidth);
					}
					if (self.options.tint) {
						self.tintContainer.css("height", self.options.constrainSize);
						self.tintContainer.css("width", self.constwidth);
						self.zoomTint.css("height", self.options.constrainSize);
						self.zoomTint.css("width", self.constwidth);
						self.zoomTintImage.css("height", self.options.constrainSize);
						self.zoomTintImage.css("width", self.constwidth);
					}
				}
				if (self.options.constrainType == "width") {
					self.zoomContainer.css("height", "auto");
					self.zoomContainer.css("width", self.options.constrainSize);
					if (self.options.imageCrossfade) {
						self.zoomWrap.css("height", "auto");
						self.zoomWrap.css("width", self.options.constrainSize);
						self.constheight = self.zoomWrap.height();
					} else {
						self.jQueryelem.css("height", "auto");
						self.jQueryelem.css("width", self.options.constrainSize);
						self.constheight = self.jQueryelem.height();
					}
					if (self.options.zoomType == "inner") {
						self.zoomWrap.parent().css("height", self.constheight);
						self.zoomWrap.parent().css("width", self.options.constrainSize);
						self.zoomWindow.css("height", self.constheight);
						self.zoomWindow.css("width", self.options.constrainSize);
					}
					if (self.options.tint) {
						self.tintContainer.css("height", self.constheight);
						self.tintContainer.css("width", self.options.constrainSize);
						self.zoomTint.css("height", self.constheight);
						self.zoomTint.css("width", self.options.constrainSize);
						self.zoomTintImage.css("height", self.constheight);
						self.zoomTintImage.css("width", self.options.constrainSize);
					}
				}
			}
		},
		doneCallback: function() {
			var self = this;
			if (self.options.loadingIcon) {
				self.spinner.hide();
			}
			self.nzOffset = self.jQueryelem.offset();
			self.nzWidth = self.jQueryelem.width();
			self.nzHeight = self.jQueryelem.height();
			// reset the zoomlevel back to default
			self.currentZoomLevel = self.options.zoomLevel;
			//ratio of the large to small image
			self.widthRatio = self.largeWidth / self.nzWidth;
			self.heightRatio = self.largeHeight / self.nzHeight;
			//NEED TO ADD THE LENS SIZE FOR ROUND
			// adjust images less than the window height
			if (self.options.zoomType == "window") {
				if (self.nzHeight < self.options.zoomWindowWidth / self.widthRatio) {
					lensHeight = self.nzHeight;
				} else {
					lensHeight = String((self.options.zoomWindowHeight / self.heightRatio))
				}
				if (self.options.zoomWindowWidth < self.options.zoomWindowWidth) {
					lensWidth = self.nzWidth;
				} else {
					lensWidth = (self.options.zoomWindowWidth / self.widthRatio);
				}
				if (self.zoomLens) {
					self.zoomLens.css('width', lensWidth);
					self.zoomLens.css('height', lensHeight);
				}
			}
		},
		getCurrentImage: function() {
			var self = this;
			return self.zoomImage;
		},
		getGalleryList: function() {
			var self = this;
			//loop through the gallery options and set them in list for fancybox
			self.gallerylist = [];
			if (self.options.gallery) {
				jQuery('#' + self.options.gallery + ' a').each(function() {
					var img_src = '';
					if (jQuery(this).data("zoom-image")) {
						img_src = jQuery(this).data("zoom-image");
					} else if (jQuery(this).data("image")) {
						img_src = jQuery(this).data("image");
					}
					//put the current image at the start
					if (img_src == self.zoomImage) {
						self.gallerylist.unshift({
							href: '' + img_src + '',
							title: jQuery(this).find('img').attr("title")
						});
					} else {
						self.gallerylist.push({
							href: '' + img_src + '',
							title: jQuery(this).find('img').attr("title")
						});
					}
				});
			}
			//if no gallery - return current image
			else {
				self.gallerylist.push({
					href: '' + self.zoomImage + '',
					title: jQuery(this).find('img').attr("title")
				});
			}
			return self.gallerylist;
		},
		changeZoomLevel: function(value) {
			var self = this;
			//flag a zoom, so can adjust the easing during setPosition     
			self.scrollingLock = true;
			//round to two decimal places
			self.newvalue = parseFloat(value).toFixed(2);
			newvalue = parseFloat(value).toFixed(2);
			//maxwidth & Maxheight of the image
			maxheightnewvalue = self.largeHeight / ((self.options.zoomWindowHeight / self.nzHeight) * self.nzHeight);
			maxwidthtnewvalue = self.largeWidth / ((self.options.zoomWindowWidth / self.nzWidth) * self.nzWidth);
			//calculate new heightratio
			if (self.options.zoomType != "inner") {
				if (maxheightnewvalue <= newvalue) {
					self.heightRatio = (self.largeHeight / maxheightnewvalue) / self.nzHeight;
					self.newvalueheight = maxheightnewvalue;
					self.fullheight = true;
				} else {
					self.heightRatio = (self.largeHeight / newvalue) / self.nzHeight;
					self.newvalueheight = newvalue;
					self.fullheight = false;
				}
				//					calculate new width ratio
				if (maxwidthtnewvalue <= newvalue) {
					self.widthRatio = (self.largeWidth / maxwidthtnewvalue) / self.nzWidth;
					self.newvaluewidth = maxwidthtnewvalue;
					self.fullwidth = true;
				} else {
					self.widthRatio = (self.largeWidth / newvalue) / self.nzWidth;
					self.newvaluewidth = newvalue;
					self.fullwidth = false;
				}
				if (self.options.zoomType == "lens") {
					if (maxheightnewvalue <= newvalue) {
						self.fullwidth = true;
						self.newvaluewidth = maxheightnewvalue;
					} else {
						self.widthRatio = (self.largeWidth / newvalue) / self.nzWidth;
						self.newvaluewidth = newvalue;
						self.fullwidth = false;
					}
				}
			}
			if (self.options.zoomType == "inner") {
				maxheightnewvalue = parseFloat(self.largeHeight / self.nzHeight).toFixed(2);
				maxwidthtnewvalue = parseFloat(self.largeWidth / self.nzWidth).toFixed(2);
				if (newvalue > maxheightnewvalue) {
					newvalue = maxheightnewvalue;
				}
				if (newvalue > maxwidthtnewvalue) {
					newvalue = maxwidthtnewvalue;
				}
				if (maxheightnewvalue <= newvalue) {
					self.heightRatio = (self.largeHeight / newvalue) / self.nzHeight;
					if (newvalue > maxheightnewvalue) {
						self.newvalueheight = maxheightnewvalue;
					} else {
						self.newvalueheight = newvalue;
					}
					self.fullheight = true;
				} else {
					self.heightRatio = (self.largeHeight / newvalue) / self.nzHeight;
					if (newvalue > maxheightnewvalue) {
						self.newvalueheight = maxheightnewvalue;
					} else {
						self.newvalueheight = newvalue;
					}
					self.fullheight = false;
				}
				if (maxwidthtnewvalue <= newvalue) {
					self.widthRatio = (self.largeWidth / newvalue) / self.nzWidth;
					if (newvalue > maxwidthtnewvalue) {
						self.newvaluewidth = maxwidthtnewvalue;
					} else {
						self.newvaluewidth = newvalue;
					}
					self.fullwidth = true;
				} else {
					self.widthRatio = (self.largeWidth / newvalue) / self.nzWidth;
					self.newvaluewidth = newvalue;
					self.fullwidth = false;
				}
			} //end inner
			scrcontinue = false;
			if (self.options.zoomType == "inner") {
				if (self.nzWidth >= self.nzHeight) {
					if (self.newvaluewidth <= maxwidthtnewvalue) {
						scrcontinue = true;
					} else {
						scrcontinue = false;
						self.fullheight = true;
						self.fullwidth = true;
					}
				}
				if (self.nzHeight > self.nzWidth) {
					if (self.newvaluewidth <= maxwidthtnewvalue) {
						scrcontinue = true;
					} else {
						scrcontinue = false;
						self.fullheight = true;
						self.fullwidth = true;
					}
				}
			}
			if (self.options.zoomType != "inner") {
				scrcontinue = true;
			}
			if (scrcontinue) {
				self.zoomLock = 0;
				self.changeZoom = true;
				//if lens height is less than image height
				if (((self.options.zoomWindowHeight) / self.heightRatio) <= self.nzHeight) {
					self.currentZoomLevel = self.newvalueheight;
					if (self.options.zoomType != "lens" && self.options.zoomType != "inner") {
						self.changeBgSize = true;
						self.zoomLens.css({
							height: String((self.options.zoomWindowHeight) / self.heightRatio) + 'px'
						})
					}
					if (self.options.zoomType == "lens" || self.options.zoomType == "inner") {
						self.changeBgSize = true;
					}
				}
				if ((self.options.zoomWindowWidth / self.widthRatio) <= self.nzWidth) {
					if (self.options.zoomType != "inner") {
						if (self.newvaluewidth > self.newvalueheight) {
							self.currentZoomLevel = self.newvaluewidth;
						}
					}
					if (self.options.zoomType != "lens" && self.options.zoomType != "inner") {
						self.changeBgSize = true;
						self.zoomLens.css({
							width: String((self.options.zoomWindowWidth) / self.widthRatio) + 'px'
						})
					}
					if (self.options.zoomType == "lens" || self.options.zoomType == "inner") {
						self.changeBgSize = true;
					}
				}
				if (self.options.zoomType == "inner") {
					self.changeBgSize = true;
					if (self.nzWidth > self.nzHeight) {
						self.currentZoomLevel = self.newvaluewidth;
					}
					if (self.nzHeight > self.nzWidth) {
						self.currentZoomLevel = self.newvaluewidth;
					}
				}
			} //under
			//sets the boundry change, called in setWindowPos
			self.setPosition(self.currentLoc);
			//
		},
		closeAll: function() {
			if (self.zoomWindow) {
				self.zoomWindow.hide();
			}
			if (self.zoomLens) {
				self.zoomLens.hide();
			}
			if (self.zoomTint) {
				self.zoomTint.hide();
			}
		},
		changeState: function(value) {
			var self = this;
			if (value == 'enable') {
				self.options.zoomEnabled = true;
			}
			if (value == 'disable') {
				self.options.zoomEnabled = false;
			}
		}
	};
	jQuery.fn.elevateZoom = function(options) {
		return this.each(function() {
			var elevate = Object.create(ElevateZoom);
			elevate.init(options, this);
			jQuery.data(this, 'elevateZoom', elevate);
		});
	};
	jQuery.fn.elevateZoom.options = {
		zoomActivation: "hover", // Can also be click (PLACEHOLDER FOR NEXT VERSION)
		zoomEnabled: true, //false disables zoomwindow from showing
		preloading: 1, //by default, load all the images, if 0, then only load images after activated (PLACEHOLDER FOR NEXT VERSION)
		zoomLevel: 1, //default zoom level of image
		scrollZoom: true, //allow zoom on mousewheel, true to activate
		scrollZoomIncrement: 0.01, //steps of the scrollzoom
		minZoomLevel: false,
		maxZoomLevel: false,
		easing: false,
		easingAmount: 12,
		lensSize: 200,
		zoomWindowWidth: 845,
		zoomWindowHeight: 600,
		zoomWindowOffetx: 0,
		zoomWindowOffety: 0,
		zoomWindowPosition: 1,
		zoomWindowBgColour: "#fff",
		lensFadeIn: false,
		lensFadeOut: false,
		debug: false,
		zoomWindowFadeIn: false,
		zoomWindowFadeOut: false,
		zoomWindowAlwaysShow: false,
		zoomTintFadeIn: false,
		zoomTintFadeOut: false,
		borderSize: 1,
		showLens: true,
		borderColour: "#000",
		lensBorderSize: 1,
		lensBorderColour: "#000",
		lensShape: "square", //can be "round", "square"
		zoomType: "window", //window is default,  also "lens" available -
		containLensZoom: false,
		lensColour: "white", //colour of the lens background
		lensOpacity: 0.5, //opacity of the lens
		lenszoom: false,
		tint: false, //enable the tinting
		tintColour: "#333", //default tint color, can be anything, red, #ccc, rgb(0,0,0)
		tintOpacity: 0.3, //opacity of the tint
		gallery: false,
		galleryActiveClass: "zoomGalleryActive",
		imageCrossfade: false,
		constrainType: false, //width or height
		constrainSize: false, //in pixels the dimensions you want to constrain on
		loadingIcon: false, //http://www.example.com/spinner.gif
		cursor: "default", // user should set to what they want the cursor as, if they have set a click function
		responsive: true,
		onComplete: jQuery.noop,
		onZoomedImageLoaded: function() {},
		onImageSwap: jQuery.noop,
		onImageSwapComplete: jQuery.noop
	};
})(jQuery, window, document);
/* Zoom image */
if (jQuery('#product-zoom').length > 0) {
	jQuery('#product-zoom').elevateZoom({
		zoomType: "window",
		cursor: "crosshair",
		zoomWindowFadeIn: 500,
		zoomWindowFadeOut: 750,
        gallery: 'gallery_01',
	});
}
jQuery("#gallery_01 .slider-items").owlCarousel({
	autoplay: false,
	items: 3, //10 items above 1000px browser width
	itemsDesktop: [1024, 3], //5 items between 1024px and 901px
	itemsDesktopSmall: [900, 2], // 3 items betweem 900px and 601px
	itemsTablet: [600, 3], //2 items between 600 and 0;
	itemsMobile: [320, 2],
	navigation: true,
	navigationText: ["<a class=\"flex-prev\"></a>", "<a class=\"flex-next\"></a>"],
	slideSpeed: 500,
	pagination: false
});

/*!
Waypoints - 4.0.0
Copyright © 2011-2015 Caleb Troughton
Licensed under the MIT license.
https://github.com/imakewebthings/waypoints/blog/master/licenses.txt
*/
!function(){"use strict";function t(o){if(!o)throw new Error("No options passed to Waypoint constructor");if(!o.element)throw new Error("No element option passed to Waypoint constructor");if(!o.handler)throw new Error("No handler option passed to Waypoint constructor");this.key="waypoint-"+e,this.options=t.Adapter.extend({},t.defaults,o),this.element=this.options.element,this.adapter=new t.Adapter(this.element),this.callback=o.handler,this.axis=this.options.horizontal?"horizontal":"vertical",this.enabled=this.options.enabled,this.triggerPoint=null,this.group=t.Group.findOrCreate({name:this.options.group,axis:this.axis}),this.context=t.Context.findOrCreateByElement(this.options.context),t.offsetAliases[this.options.offset]&&(this.options.offset=t.offsetAliases[this.options.offset]),this.group.add(this),this.context.add(this),i[this.key]=this,e+=1}var e=0,i={};t.prototype.queueTrigger=function(t){this.group.queueTrigger(this,t)},t.prototype.trigger=function(t){this.enabled&&this.callback&&this.callback.apply(this,t)},t.prototype.destroy=function(){this.context.remove(this),this.group.remove(this),delete i[this.key]},t.prototype.disable=function(){return this.enabled=!1,this},t.prototype.enable=function(){return this.context.refresh(),this.enabled=!0,this},t.prototype.next=function(){return this.group.next(this)},t.prototype.previous=function(){return this.group.previous(this)},t.invokeAll=function(t){var e=[];for(var o in i)e.push(i[o]);for(var n=0,r=e.length;r>n;n++)e[n][t]()},t.destroyAll=function(){t.invokeAll("destroy")},t.disableAll=function(){t.invokeAll("disable")},t.enableAll=function(){t.invokeAll("enable")},t.refreshAll=function(){t.Context.refreshAll()},t.viewportHeight=function(){return window.innerHeight||document.documentElement.clientHeight},t.viewportWidth=function(){return document.documentElement.clientWidth},t.adapters=[],t.defaults={context:window,continuous:!0,enabled:!0,group:"default",horizontal:!1,offset:0},t.offsetAliases={"bottom-in-view":function(){return this.context.innerHeight()-this.adapter.outerHeight()},"right-in-view":function(){return this.context.innerWidth()-this.adapter.outerWidth()}},window.Waypoint=t}(),function(){"use strict";function t(t){window.setTimeout(t,1e3/60)}function e(t){this.element=t,this.Adapter=n.Adapter,this.adapter=new this.Adapter(t),this.key="waypoint-context-"+i,this.didScroll=!1,this.didResize=!1,this.oldScroll={x:this.adapter.scrollLeft(),y:this.adapter.scrollTop()},this.waypoints={vertical:{},horizontal:{}},t.waypointContextKey=this.key,o[t.waypointContextKey]=this,i+=1,this.createThrottledScrollHandler(),this.createThrottledResizeHandler()}var i=0,o={},n=window.Waypoint,r=window.onload;e.prototype.add=function(t){var e=t.options.horizontal?"horizontal":"vertical";this.waypoints[e][t.key]=t,this.refresh()},e.prototype.checkEmpty=function(){var t=this.Adapter.isEmptyObject(this.waypoints.horizontal),e=this.Adapter.isEmptyObject(this.waypoints.vertical);t&&e&&(this.adapter.off(".waypoints"),delete o[this.key])},e.prototype.createThrottledResizeHandler=function(){function t(){e.handleResize(),e.didResize=!1}var e=this;this.adapter.on("resize.waypoints",function(){e.didResize||(e.didResize=!0,n.requestAnimationFrame(t))})},e.prototype.createThrottledScrollHandler=function(){function t(){e.handleScroll(),e.didScroll=!1}var e=this;this.adapter.on("scroll.waypoints",function(){(!e.didScroll||n.isTouch)&&(e.didScroll=!0,n.requestAnimationFrame(t))})},e.prototype.handleResize=function(){n.Context.refreshAll()},e.prototype.handleScroll=function(){var t={},e={horizontal:{newScroll:this.adapter.scrollLeft(),oldScroll:this.oldScroll.x,forward:"right",backward:"left"},vertical:{newScroll:this.adapter.scrollTop(),oldScroll:this.oldScroll.y,forward:"down",backward:"up"}};for(var i in e){var o=e[i],n=o.newScroll>o.oldScroll,r=n?o.forward:o.backward;for(var s in this.waypoints[i]){var a=this.waypoints[i][s],l=o.oldScroll<a.triggerPoint,h=o.newScroll>=a.triggerPoint,p=l&&h,u=!l&&!h;(p||u)&&(a.queueTrigger(r),t[a.group.id]=a.group)}}for(var c in t)t[c].flushTriggers();this.oldScroll={x:e.horizontal.newScroll,y:e.vertical.newScroll}},e.prototype.innerHeight=function(){return this.element==this.element.window?n.viewportHeight():this.adapter.innerHeight()},e.prototype.remove=function(t){delete this.waypoints[t.axis][t.key],this.checkEmpty()},e.prototype.innerWidth=function(){return this.element==this.element.window?n.viewportWidth():this.adapter.innerWidth()},e.prototype.destroy=function(){var t=[];for(var e in this.waypoints)for(var i in this.waypoints[e])t.push(this.waypoints[e][i]);for(var o=0,n=t.length;n>o;o++)t[o].destroy()},e.prototype.refresh=function(){var t,e=this.element==this.element.window,i=e?void 0:this.adapter.offset(),o={};this.handleScroll(),t={horizontal:{contextOffset:e?0:i.left,contextScroll:e?0:this.oldScroll.x,contextDimension:this.innerWidth(),oldScroll:this.oldScroll.x,forward:"right",backward:"left",offsetProp:"left"},vertical:{contextOffset:e?0:i.top,contextScroll:e?0:this.oldScroll.y,contextDimension:this.innerHeight(),oldScroll:this.oldScroll.y,forward:"down",backward:"up",offsetProp:"top"}};for(var r in t){var s=t[r];for(var a in this.waypoints[r]){var l,h,p,u,c,d=this.waypoints[r][a],f=d.options.offset,w=d.triggerPoint,y=0,g=null==w;d.element!==d.element.window&&(y=d.adapter.offset()[s.offsetProp]),"function"==typeof f?f=f.apply(d):"string"==typeof f&&(f=parseFloat(f),d.options.offset.indexOf("%")>-1&&(f=Math.ceil(s.contextDimension*f/100))),l=s.contextScroll-s.contextOffset,d.triggerPoint=y+l-f,h=w<s.oldScroll,p=d.triggerPoint>=s.oldScroll,u=h&&p,c=!h&&!p,!g&&u?(d.queueTrigger(s.backward),o[d.group.id]=d.group):!g&&c?(d.queueTrigger(s.forward),o[d.group.id]=d.group):g&&s.oldScroll>=d.triggerPoint&&(d.queueTrigger(s.forward),o[d.group.id]=d.group)}}return n.requestAnimationFrame(function(){for(var t in o)o[t].flushTriggers()}),this},e.findOrCreateByElement=function(t){return e.findByElement(t)||new e(t)},e.refreshAll=function(){for(var t in o)o[t].refresh()},e.findByElement=function(t){return o[t.waypointContextKey]},window.onload=function(){r&&r(),e.refreshAll()},n.requestAnimationFrame=function(e){var i=window.requestAnimationFrame||window.mozRequestAnimationFrame||window.webkitRequestAnimationFrame||t;i.call(window,e)},n.Context=e}(),function(){"use strict";function t(t,e){return t.triggerPoint-e.triggerPoint}function e(t,e){return e.triggerPoint-t.triggerPoint}function i(t){this.name=t.name,this.axis=t.axis,this.id=this.name+"-"+this.axis,this.waypoints=[],this.clearTriggerQueues(),o[this.axis][this.name]=this}var o={vertical:{},horizontal:{}},n=window.Waypoint;i.prototype.add=function(t){this.waypoints.push(t)},i.prototype.clearTriggerQueues=function(){this.triggerQueues={up:[],down:[],left:[],right:[]}},i.prototype.flushTriggers=function(){for(var i in this.triggerQueues){var o=this.triggerQueues[i],n="up"===i||"left"===i;o.sort(n?e:t);for(var r=0,s=o.length;s>r;r+=1){var a=o[r];(a.options.continuous||r===o.length-1)&&a.trigger([i])}}this.clearTriggerQueues()},i.prototype.next=function(e){this.waypoints.sort(t);var i=n.Adapter.inArray(e,this.waypoints),o=i===this.waypoints.length-1;return o?null:this.waypoints[i+1]},i.prototype.previous=function(e){this.waypoints.sort(t);var i=n.Adapter.inArray(e,this.waypoints);return i?this.waypoints[i-1]:null},i.prototype.queueTrigger=function(t,e){this.triggerQueues[e].push(t)},i.prototype.remove=function(t){var e=n.Adapter.inArray(t,this.waypoints);e>-1&&this.waypoints.splice(e,1)},i.prototype.first=function(){return this.waypoints[0]},i.prototype.last=function(){return this.waypoints[this.waypoints.length-1]},i.findOrCreate=function(t){return o[t.axis][t.name]||new i(t)},n.Group=i}(),function(){"use strict";function t(t){this.$element=e(t)}var e=window.jQuery,i=window.Waypoint;e.each(["innerHeight","innerWidth","off","offset","on","outerHeight","outerWidth","scrollLeft","scrollTop"],function(e,i){t.prototype[i]=function(){var t=Array.prototype.slice.call(arguments);return this.$element[i].apply(this.$element,t)}}),e.each(["extend","inArray","isEmptyObject"],function(i,o){t[o]=e[o]}),i.adapters.push({name:"jquery",Adapter:t}),i.Adapter=t}(),function(){"use strict";function t(t){return function(){var i=[],o=arguments[0];return t.isFunction(arguments[0])&&(o=t.extend({},arguments[1]),o.handler=arguments[0]),this.each(function(){var n=t.extend({},o,{element:this});"string"==typeof n.context&&(n.context=t(this).closest(n.context)[0]),i.push(new e(n))}),i}}var e=window.Waypoint;window.jQuery&&(window.jQuery.fn.waypoint=t(window.jQuery)),window.Zepto&&(window.Zepto.fn.waypoint=t(window.Zepto))}();

$(document).ready(function(){
	/*Pre Loader*/
	setTimeout(function(){
		$('body').addClass('loaded');
		$('h1').css('color','#222222');
	}, 3000);
	//
    $('section#screenshots a').on('click', function(){
        $('div#modal img').attr('src', $(this).attr('data-image-url'));
    });
	
	var navB = $('.navbar-fixed-top');
	
	$(window).scroll(function(){
		var scro = $(window).scrollTop();
		//consol.log(scro);
		
		if(scro >= 300)
	{
		navB.addClass('effect');
	}
	else
	{
		navB.removeClass('effect');
	}
		});
/* #carouse */
$('.carousel-inner .item h4').waypoint(function(){
	$(this.element).addClass('animated infinite zoomInDown')
	},{
	offset:'50%'
});	

/* #home Animation with jquery.waypoints.min.js and animate.css */
$('#home .homeCircle').waypoint(function(){
	$('#home .homeCircle').addClass('animated fadeInUp')
	},{
	offset:'50%'
});

/* #features */
$('#features .featuresCircle').waypoint(function(){
	$(this.element).addClass('animated fadeInUp')
	},{
	offset:'50%'
});		
/* #features .featureImage */
$('.featureImage img').waypoint(function(){
	$('.featureImage img').addClass('animated flip')
	},{
	offset:'80%'
});
/* #services */
$('#services .servicesCircle').waypoint(function(){
	$(this.element).addClass('animated fadeInUp')
	},{
	offset:'50%'
});	
/* #video .featureImage */
$('#video .thumbnail').waypoint(function(){
	$('#video .thumbnail').addClass('animated zoomIn')
	},{
	offset:'80%'
});
/* #screenshots */
$('#screenshots .col-xs-4').waypoint(function(){
	$(this.element).addClass('animated zoomIn');
	$(this.element).css({'opacity':1});
	},{
	offset:'50%'
});	

/* #technology */
$('#technology .technologyCircle').waypoint(function(){
	$('#technology .technologyCircle').addClass('animated fadeInUp')
	},{
	offset:'50%'
});

/* #contact */
$('#contact h3').waypoint(function(){
	$('#contact h3').addClass('animated bounceInRight')
	},{
	offset:'50%'
});

//	
/* #portfolio*/
$('#portfolio .homeCategory').waypoint(function(){
	$(this.element).addClass('animated zoomIn');
	$(this.element).css({'opacity':1});
	},{
	offset:'80%'
});	

//
});

$(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');
        
        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('1000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('3000');
            $('.filter').filter('.'+value).show('3000');
            
        }
    });

});

/*!
 * Masonry PACKAGED v4.2.2
 * Cascading grid layout library
 * https://masonry.desandro.com
 * MIT License
 * by David DeSandro
 */

!function(t,e){"function"==typeof define&&define.amd?define("jquery-bridget/jquery-bridget",["jquery"],function(i){return e(t,i)}):"object"==typeof module&&module.exports?module.exports=e(t,require("jquery")):t.jQueryBridget=e(t,t.jQuery)}(window,function(t,e){"use strict";function i(i,r,a){function h(t,e,n){var o,r="$()."+i+'("'+e+'")';return t.each(function(t,h){var u=a.data(h,i);if(!u)return void s(i+" not initialized. Cannot call methods, i.e. "+r);var d=u[e];if(!d||"_"==e.charAt(0))return void s(r+" is not a valid method");var l=d.apply(u,n);o=void 0===o?l:o}),void 0!==o?o:t}function u(t,e){t.each(function(t,n){var o=a.data(n,i);o?(o.option(e),o._init()):(o=new r(n,e),a.data(n,i,o))})}a=a||e||t.jQuery,a&&(r.prototype.option||(r.prototype.option=function(t){a.isPlainObject(t)&&(this.options=a.extend(!0,this.options,t))}),a.fn[i]=function(t){if("string"==typeof t){var e=o.call(arguments,1);return h(this,t,e)}return u(this,t),this},n(a))}function n(t){!t||t&&t.bridget||(t.bridget=i)}var o=Array.prototype.slice,r=t.console,s="undefined"==typeof r?function(){}:function(t){r.error(t)};return n(e||t.jQuery),i}),function(t,e){"function"==typeof define&&define.amd?define("ev-emitter/ev-emitter",e):"object"==typeof module&&module.exports?module.exports=e():t.EvEmitter=e()}("undefined"!=typeof window?window:this,function(){function t(){}var e=t.prototype;return e.on=function(t,e){if(t&&e){var i=this._events=this._events||{},n=i[t]=i[t]||[];return-1==n.indexOf(e)&&n.push(e),this}},e.once=function(t,e){if(t&&e){this.on(t,e);var i=this._onceEvents=this._onceEvents||{},n=i[t]=i[t]||{};return n[e]=!0,this}},e.off=function(t,e){var i=this._events&&this._events[t];if(i&&i.length){var n=i.indexOf(e);return-1!=n&&i.splice(n,1),this}},e.emitEvent=function(t,e){var i=this._events&&this._events[t];if(i&&i.length){i=i.slice(0),e=e||[];for(var n=this._onceEvents&&this._onceEvents[t],o=0;o<i.length;o++){var r=i[o],s=n&&n[r];s&&(this.off(t,r),delete n[r]),r.apply(this,e)}return this}},e.allOff=function(){delete this._events,delete this._onceEvents},t}),function(t,e){"function"==typeof define&&define.amd?define("get-size/get-size",e):"object"==typeof module&&module.exports?module.exports=e():t.getSize=e()}(window,function(){"use strict";function t(t){var e=parseFloat(t),i=-1==t.indexOf("%")&&!isNaN(e);return i&&e}function e(){}function i(){for(var t={width:0,height:0,innerWidth:0,innerHeight:0,outerWidth:0,outerHeight:0},e=0;u>e;e++){var i=h[e];t[i]=0}return t}function n(t){var e=getComputedStyle(t);return e||a("Style returned "+e+". Are you running this code in a hidden iframe on Firefox? See https://bit.ly/getsizebug1"),e}function o(){if(!d){d=!0;var e=document.createElement("div");e.style.width="200px",e.style.padding="1px 2px 3px 4px",e.style.borderStyle="solid",e.style.borderWidth="1px 2px 3px 4px",e.style.boxSizing="border-box";var i=document.body||document.documentElement;i.appendChild(e);var o=n(e);s=200==Math.round(t(o.width)),r.isBoxSizeOuter=s,i.removeChild(e)}}function r(e){if(o(),"string"==typeof e&&(e=document.querySelector(e)),e&&"object"==typeof e&&e.nodeType){var r=n(e);if("none"==r.display)return i();var a={};a.width=e.offsetWidth,a.height=e.offsetHeight;for(var d=a.isBorderBox="border-box"==r.boxSizing,l=0;u>l;l++){var c=h[l],f=r[c],m=parseFloat(f);a[c]=isNaN(m)?0:m}var p=a.paddingLeft+a.paddingRight,g=a.paddingTop+a.paddingBottom,y=a.marginLeft+a.marginRight,v=a.marginTop+a.marginBottom,_=a.borderLeftWidth+a.borderRightWidth,z=a.borderTopWidth+a.borderBottomWidth,E=d&&s,b=t(r.width);b!==!1&&(a.width=b+(E?0:p+_));var x=t(r.height);return x!==!1&&(a.height=x+(E?0:g+z)),a.innerWidth=a.width-(p+_),a.innerHeight=a.height-(g+z),a.outerWidth=a.width+y,a.outerHeight=a.height+v,a}}var s,a="undefined"==typeof console?e:function(t){console.error(t)},h=["paddingLeft","paddingRight","paddingTop","paddingBottom","marginLeft","marginRight","marginTop","marginBottom","borderLeftWidth","borderRightWidth","borderTopWidth","borderBottomWidth"],u=h.length,d=!1;return r}),function(t,e){"use strict";"function"==typeof define&&define.amd?define("desandro-matches-selector/matches-selector",e):"object"==typeof module&&module.exports?module.exports=e():t.matchesSelector=e()}(window,function(){"use strict";var t=function(){var t=window.Element.prototype;if(t.matches)return"matches";if(t.matchesSelector)return"matchesSelector";for(var e=["webkit","moz","ms","o"],i=0;i<e.length;i++){var n=e[i],o=n+"MatchesSelector";if(t[o])return o}}();return function(e,i){return e[t](i)}}),function(t,e){"function"==typeof define&&define.amd?define("fizzy-ui-utils/utils",["desandro-matches-selector/matches-selector"],function(i){return e(t,i)}):"object"==typeof module&&module.exports?module.exports=e(t,require("desandro-matches-selector")):t.fizzyUIUtils=e(t,t.matchesSelector)}(window,function(t,e){var i={};i.extend=function(t,e){for(var i in e)t[i]=e[i];return t},i.modulo=function(t,e){return(t%e+e)%e};var n=Array.prototype.slice;i.makeArray=function(t){if(Array.isArray(t))return t;if(null===t||void 0===t)return[];var e="object"==typeof t&&"number"==typeof t.length;return e?n.call(t):[t]},i.removeFrom=function(t,e){var i=t.indexOf(e);-1!=i&&t.splice(i,1)},i.getParent=function(t,i){for(;t.parentNode&&t!=document.body;)if(t=t.parentNode,e(t,i))return t},i.getQueryElement=function(t){return"string"==typeof t?document.querySelector(t):t},i.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},i.filterFindElements=function(t,n){t=i.makeArray(t);var o=[];return t.forEach(function(t){if(t instanceof HTMLElement){if(!n)return void o.push(t);e(t,n)&&o.push(t);for(var i=t.querySelectorAll(n),r=0;r<i.length;r++)o.push(i[r])}}),o},i.debounceMethod=function(t,e,i){i=i||100;var n=t.prototype[e],o=e+"Timeout";t.prototype[e]=function(){var t=this[o];clearTimeout(t);var e=arguments,r=this;this[o]=setTimeout(function(){n.apply(r,e),delete r[o]},i)}},i.docReady=function(t){var e=document.readyState;"complete"==e||"interactive"==e?setTimeout(t):document.addEventListener("DOMContentLoaded",t)},i.toDashed=function(t){return t.replace(/(.)([A-Z])/g,function(t,e,i){return e+"-"+i}).toLowerCase()};var o=t.console;return i.htmlInit=function(e,n){i.docReady(function(){var r=i.toDashed(n),s="data-"+r,a=document.querySelectorAll("["+s+"]"),h=document.querySelectorAll(".js-"+r),u=i.makeArray(a).concat(i.makeArray(h)),d=s+"-options",l=t.jQuery;u.forEach(function(t){var i,r=t.getAttribute(s)||t.getAttribute(d);try{i=r&&JSON.parse(r)}catch(a){return void(o&&o.error("Error parsing "+s+" on "+t.className+": "+a))}var h=new e(t,i);l&&l.data(t,n,h)})})},i}),function(t,e){"function"==typeof define&&define.amd?define("outlayer/item",["ev-emitter/ev-emitter","get-size/get-size"],e):"object"==typeof module&&module.exports?module.exports=e(require("ev-emitter"),require("get-size")):(t.Outlayer={},t.Outlayer.Item=e(t.EvEmitter,t.getSize))}(window,function(t,e){"use strict";function i(t){for(var e in t)return!1;return e=null,!0}function n(t,e){t&&(this.element=t,this.layout=e,this.position={x:0,y:0},this._create())}function o(t){return t.replace(/([A-Z])/g,function(t){return"-"+t.toLowerCase()})}var r=document.documentElement.style,s="string"==typeof r.transition?"transition":"WebkitTransition",a="string"==typeof r.transform?"transform":"WebkitTransform",h={WebkitTransition:"webkitTransitionEnd",transition:"transitionend"}[s],u={transform:a,transition:s,transitionDuration:s+"Duration",transitionProperty:s+"Property",transitionDelay:s+"Delay"},d=n.prototype=Object.create(t.prototype);d.constructor=n,d._create=function(){this._transn={ingProperties:{},clean:{},onEnd:{}},this.css({position:"absolute"})},d.handleEvent=function(t){var e="on"+t.type;this[e]&&this[e](t)},d.getSize=function(){this.size=e(this.element)},d.css=function(t){var e=this.element.style;for(var i in t){var n=u[i]||i;e[n]=t[i]}},d.getPosition=function(){var t=getComputedStyle(this.element),e=this.layout._getOption("originLeft"),i=this.layout._getOption("originTop"),n=t[e?"left":"right"],o=t[i?"top":"bottom"],r=parseFloat(n),s=parseFloat(o),a=this.layout.size;-1!=n.indexOf("%")&&(r=r/100*a.width),-1!=o.indexOf("%")&&(s=s/100*a.height),r=isNaN(r)?0:r,s=isNaN(s)?0:s,r-=e?a.paddingLeft:a.paddingRight,s-=i?a.paddingTop:a.paddingBottom,this.position.x=r,this.position.y=s},d.layoutPosition=function(){var t=this.layout.size,e={},i=this.layout._getOption("originLeft"),n=this.layout._getOption("originTop"),o=i?"paddingLeft":"paddingRight",r=i?"left":"right",s=i?"right":"left",a=this.position.x+t[o];e[r]=this.getXValue(a),e[s]="";var h=n?"paddingTop":"paddingBottom",u=n?"top":"bottom",d=n?"bottom":"top",l=this.position.y+t[h];e[u]=this.getYValue(l),e[d]="",this.css(e),this.emitEvent("layout",[this])},d.getXValue=function(t){var e=this.layout._getOption("horizontal");return this.layout.options.percentPosition&&!e?t/this.layout.size.width*100+"%":t+"px"},d.getYValue=function(t){var e=this.layout._getOption("horizontal");return this.layout.options.percentPosition&&e?t/this.layout.size.height*100+"%":t+"px"},d._transitionTo=function(t,e){this.getPosition();var i=this.position.x,n=this.position.y,o=t==this.position.x&&e==this.position.y;if(this.setPosition(t,e),o&&!this.isTransitioning)return void this.layoutPosition();var r=t-i,s=e-n,a={};a.transform=this.getTranslate(r,s),this.transition({to:a,onTransitionEnd:{transform:this.layoutPosition},isCleaning:!0})},d.getTranslate=function(t,e){var i=this.layout._getOption("originLeft"),n=this.layout._getOption("originTop");return t=i?t:-t,e=n?e:-e,"translate3d("+t+"px, "+e+"px, 0)"},d.goTo=function(t,e){this.setPosition(t,e),this.layoutPosition()},d.moveTo=d._transitionTo,d.setPosition=function(t,e){this.position.x=parseFloat(t),this.position.y=parseFloat(e)},d._nonTransition=function(t){this.css(t.to),t.isCleaning&&this._removeStyles(t.to);for(var e in t.onTransitionEnd)t.onTransitionEnd[e].call(this)},d.transition=function(t){if(!parseFloat(this.layout.options.transitionDuration))return void this._nonTransition(t);var e=this._transn;for(var i in t.onTransitionEnd)e.onEnd[i]=t.onTransitionEnd[i];for(i in t.to)e.ingProperties[i]=!0,t.isCleaning&&(e.clean[i]=!0);if(t.from){this.css(t.from);var n=this.element.offsetHeight;n=null}this.enableTransition(t.to),this.css(t.to),this.isTransitioning=!0};var l="opacity,"+o(a);d.enableTransition=function(){if(!this.isTransitioning){var t=this.layout.options.transitionDuration;t="number"==typeof t?t+"ms":t,this.css({transitionProperty:l,transitionDuration:t,transitionDelay:this.staggerDelay||0}),this.element.addEventListener(h,this,!1)}},d.onwebkitTransitionEnd=function(t){this.ontransitionend(t)},d.onotransitionend=function(t){this.ontransitionend(t)};var c={"-webkit-transform":"transform"};d.ontransitionend=function(t){if(t.target===this.element){var e=this._transn,n=c[t.propertyName]||t.propertyName;if(delete e.ingProperties[n],i(e.ingProperties)&&this.disableTransition(),n in e.clean&&(this.element.style[t.propertyName]="",delete e.clean[n]),n in e.onEnd){var o=e.onEnd[n];o.call(this),delete e.onEnd[n]}this.emitEvent("transitionEnd",[this])}},d.disableTransition=function(){this.removeTransitionStyles(),this.element.removeEventListener(h,this,!1),this.isTransitioning=!1},d._removeStyles=function(t){var e={};for(var i in t)e[i]="";this.css(e)};var f={transitionProperty:"",transitionDuration:"",transitionDelay:""};return d.removeTransitionStyles=function(){this.css(f)},d.stagger=function(t){t=isNaN(t)?0:t,this.staggerDelay=t+"ms"},d.removeElem=function(){this.element.parentNode.removeChild(this.element),this.css({display:""}),this.emitEvent("remove",[this])},d.remove=function(){return s&&parseFloat(this.layout.options.transitionDuration)?(this.once("transitionEnd",function(){this.removeElem()}),void this.hide()):void this.removeElem()},d.reveal=function(){delete this.isHidden,this.css({display:""});var t=this.layout.options,e={},i=this.getHideRevealTransitionEndProperty("visibleStyle");e[i]=this.onRevealTransitionEnd,this.transition({from:t.hiddenStyle,to:t.visibleStyle,isCleaning:!0,onTransitionEnd:e})},d.onRevealTransitionEnd=function(){this.isHidden||this.emitEvent("reveal")},d.getHideRevealTransitionEndProperty=function(t){var e=this.layout.options[t];if(e.opacity)return"opacity";for(var i in e)return i},d.hide=function(){this.isHidden=!0,this.css({display:""});var t=this.layout.options,e={},i=this.getHideRevealTransitionEndProperty("hiddenStyle");e[i]=this.onHideTransitionEnd,this.transition({from:t.visibleStyle,to:t.hiddenStyle,isCleaning:!0,onTransitionEnd:e})},d.onHideTransitionEnd=function(){this.isHidden&&(this.css({display:"none"}),this.emitEvent("hide"))},d.destroy=function(){this.css({position:"",left:"",right:"",top:"",bottom:"",transition:"",transform:""})},n}),function(t,e){"use strict";"function"==typeof define&&define.amd?define("outlayer/outlayer",["ev-emitter/ev-emitter","get-size/get-size","fizzy-ui-utils/utils","./item"],function(i,n,o,r){return e(t,i,n,o,r)}):"object"==typeof module&&module.exports?module.exports=e(t,require("ev-emitter"),require("get-size"),require("fizzy-ui-utils"),require("./item")):t.Outlayer=e(t,t.EvEmitter,t.getSize,t.fizzyUIUtils,t.Outlayer.Item)}(window,function(t,e,i,n,o){"use strict";function r(t,e){var i=n.getQueryElement(t);if(!i)return void(h&&h.error("Bad element for "+this.constructor.namespace+": "+(i||t)));this.element=i,u&&(this.$element=u(this.element)),this.options=n.extend({},this.constructor.defaults),this.option(e);var o=++l;this.element.outlayerGUID=o,c[o]=this,this._create();var r=this._getOption("initLayout");r&&this.layout()}function s(t){function e(){t.apply(this,arguments)}return e.prototype=Object.create(t.prototype),e.prototype.constructor=e,e}function a(t){if("number"==typeof t)return t;var e=t.match(/(^\d*\.?\d*)(\w*)/),i=e&&e[1],n=e&&e[2];if(!i.length)return 0;i=parseFloat(i);var o=m[n]||1;return i*o}var h=t.console,u=t.jQuery,d=function(){},l=0,c={};r.namespace="outlayer",r.Item=o,r.defaults={containerStyle:{position:"relative"},initLayout:!0,originLeft:!0,originTop:!0,resize:!0,resizeContainer:!0,transitionDuration:"0.4s",hiddenStyle:{opacity:0,transform:"scale(0.001)"},visibleStyle:{opacity:1,transform:"scale(1)"}};var f=r.prototype;n.extend(f,e.prototype),f.option=function(t){n.extend(this.options,t)},f._getOption=function(t){var e=this.constructor.compatOptions[t];return e&&void 0!==this.options[e]?this.options[e]:this.options[t]},r.compatOptions={initLayout:"isInitLayout",horizontal:"isHorizontal",layoutInstant:"isLayoutInstant",originLeft:"isOriginLeft",originTop:"isOriginTop",resize:"isResizeBound",resizeContainer:"isResizingContainer"},f._create=function(){this.reloadItems(),this.stamps=[],this.stamp(this.options.stamp),n.extend(this.element.style,this.options.containerStyle);var t=this._getOption("resize");t&&this.bindResize()},f.reloadItems=function(){this.items=this._itemize(this.element.children)},f._itemize=function(t){for(var e=this._filterFindItemElements(t),i=this.constructor.Item,n=[],o=0;o<e.length;o++){var r=e[o],s=new i(r,this);n.push(s)}return n},f._filterFindItemElements=function(t){return n.filterFindElements(t,this.options.itemSelector)},f.getItemElements=function(){return this.items.map(function(t){return t.element})},f.layout=function(){this._resetLayout(),this._manageStamps();var t=this._getOption("layoutInstant"),e=void 0!==t?t:!this._isLayoutInited;this.layoutItems(this.items,e),this._isLayoutInited=!0},f._init=f.layout,f._resetLayout=function(){this.getSize()},f.getSize=function(){this.size=i(this.element)},f._getMeasurement=function(t,e){var n,o=this.options[t];o?("string"==typeof o?n=this.element.querySelector(o):o instanceof HTMLElement&&(n=o),this[t]=n?i(n)[e]:o):this[t]=0},f.layoutItems=function(t,e){t=this._getItemsForLayout(t),this._layoutItems(t,e),this._postLayout()},f._getItemsForLayout=function(t){return t.filter(function(t){return!t.isIgnored})},f._layoutItems=function(t,e){if(this._emitCompleteOnItems("layout",t),t&&t.length){var i=[];t.forEach(function(t){var n=this._getItemLayoutPosition(t);n.item=t,n.isInstant=e||t.isLayoutInstant,i.push(n)},this),this._processLayoutQueue(i)}},f._getItemLayoutPosition=function(){return{x:0,y:0}},f._processLayoutQueue=function(t){this.updateStagger(),t.forEach(function(t,e){this._positionItem(t.item,t.x,t.y,t.isInstant,e)},this)},f.updateStagger=function(){var t=this.options.stagger;return null===t||void 0===t?void(this.stagger=0):(this.stagger=a(t),this.stagger)},f._positionItem=function(t,e,i,n,o){n?t.goTo(e,i):(t.stagger(o*this.stagger),t.moveTo(e,i))},f._postLayout=function(){this.resizeContainer()},f.resizeContainer=function(){var t=this._getOption("resizeContainer");if(t){var e=this._getContainerSize();e&&(this._setContainerMeasure(e.width,!0),this._setContainerMeasure(e.height,!1))}},f._getContainerSize=d,f._setContainerMeasure=function(t,e){if(void 0!==t){var i=this.size;i.isBorderBox&&(t+=e?i.paddingLeft+i.paddingRight+i.borderLeftWidth+i.borderRightWidth:i.paddingBottom+i.paddingTop+i.borderTopWidth+i.borderBottomWidth),t=Math.max(t,0),this.element.style[e?"width":"height"]=t+"px"}},f._emitCompleteOnItems=function(t,e){function i(){o.dispatchEvent(t+"Complete",null,[e])}function n(){s++,s==r&&i()}var o=this,r=e.length;if(!e||!r)return void i();var s=0;e.forEach(function(e){e.once(t,n)})},f.dispatchEvent=function(t,e,i){var n=e?[e].concat(i):i;if(this.emitEvent(t,n),u)if(this.$element=this.$element||u(this.element),e){var o=u.Event(e);o.type=t,this.$element.trigger(o,i)}else this.$element.trigger(t,i)},f.ignore=function(t){var e=this.getItem(t);e&&(e.isIgnored=!0)},f.unignore=function(t){var e=this.getItem(t);e&&delete e.isIgnored},f.stamp=function(t){t=this._find(t),t&&(this.stamps=this.stamps.concat(t),t.forEach(this.ignore,this))},f.unstamp=function(t){t=this._find(t),t&&t.forEach(function(t){n.removeFrom(this.stamps,t),this.unignore(t)},this)},f._find=function(t){return t?("string"==typeof t&&(t=this.element.querySelectorAll(t)),t=n.makeArray(t)):void 0},f._manageStamps=function(){this.stamps&&this.stamps.length&&(this._getBoundingRect(),this.stamps.forEach(this._manageStamp,this))},f._getBoundingRect=function(){var t=this.element.getBoundingClientRect(),e=this.size;this._boundingRect={left:t.left+e.paddingLeft+e.borderLeftWidth,top:t.top+e.paddingTop+e.borderTopWidth,right:t.right-(e.paddingRight+e.borderRightWidth),bottom:t.bottom-(e.paddingBottom+e.borderBottomWidth)}},f._manageStamp=d,f._getElementOffset=function(t){var e=t.getBoundingClientRect(),n=this._boundingRect,o=i(t),r={left:e.left-n.left-o.marginLeft,top:e.top-n.top-o.marginTop,right:n.right-e.right-o.marginRight,bottom:n.bottom-e.bottom-o.marginBottom};return r},f.handleEvent=n.handleEvent,f.bindResize=function(){t.addEventListener("resize",this),this.isResizeBound=!0},f.unbindResize=function(){t.removeEventListener("resize",this),this.isResizeBound=!1},f.onresize=function(){this.resize()},n.debounceMethod(r,"onresize",100),f.resize=function(){this.isResizeBound&&this.needsResizeLayout()&&this.layout()},f.needsResizeLayout=function(){var t=i(this.element),e=this.size&&t;return e&&t.innerWidth!==this.size.innerWidth},f.addItems=function(t){var e=this._itemize(t);return e.length&&(this.items=this.items.concat(e)),e},f.appended=function(t){var e=this.addItems(t);e.length&&(this.layoutItems(e,!0),this.reveal(e))},f.prepended=function(t){var e=this._itemize(t);if(e.length){var i=this.items.slice(0);this.items=e.concat(i),this._resetLayout(),this._manageStamps(),this.layoutItems(e,!0),this.reveal(e),this.layoutItems(i)}},f.reveal=function(t){if(this._emitCompleteOnItems("reveal",t),t&&t.length){var e=this.updateStagger();t.forEach(function(t,i){t.stagger(i*e),t.reveal()})}},f.hide=function(t){if(this._emitCompleteOnItems("hide",t),t&&t.length){var e=this.updateStagger();t.forEach(function(t,i){t.stagger(i*e),t.hide()})}},f.revealItemElements=function(t){var e=this.getItems(t);this.reveal(e)},f.hideItemElements=function(t){var e=this.getItems(t);this.hide(e)},f.getItem=function(t){for(var e=0;e<this.items.length;e++){var i=this.items[e];if(i.element==t)return i}},f.getItems=function(t){t=n.makeArray(t);var e=[];return t.forEach(function(t){var i=this.getItem(t);i&&e.push(i)},this),e},f.remove=function(t){var e=this.getItems(t);this._emitCompleteOnItems("remove",e),e&&e.length&&e.forEach(function(t){t.remove(),n.removeFrom(this.items,t)},this)},f.destroy=function(){var t=this.element.style;t.height="",t.position="",t.width="",this.items.forEach(function(t){t.destroy()}),this.unbindResize();var e=this.element.outlayerGUID;delete c[e],delete this.element.outlayerGUID,u&&u.removeData(this.element,this.constructor.namespace)},r.data=function(t){t=n.getQueryElement(t);var e=t&&t.outlayerGUID;return e&&c[e]},r.create=function(t,e){var i=s(r);return i.defaults=n.extend({},r.defaults),n.extend(i.defaults,e),i.compatOptions=n.extend({},r.compatOptions),i.namespace=t,i.data=r.data,i.Item=s(o),n.htmlInit(i,t),u&&u.bridget&&u.bridget(t,i),i};var m={ms:1,s:1e3};return r.Item=o,r}),function(t,e){"function"==typeof define&&define.amd?define(["outlayer/outlayer","get-size/get-size"],e):"object"==typeof module&&module.exports?module.exports=e(require("outlayer"),require("get-size")):t.Masonry=e(t.Outlayer,t.getSize)}(window,function(t,e){var i=t.create("masonry");i.compatOptions.fitWidth="isFitWidth";var n=i.prototype;return n._resetLayout=function(){this.getSize(),this._getMeasurement("columnWidth","outerWidth"),this._getMeasurement("gutter","outerWidth"),this.measureColumns(),this.colYs=[];for(var t=0;t<this.cols;t++)this.colYs.push(0);this.maxY=0,this.horizontalColIndex=0},n.measureColumns=function(){if(this.getContainerWidth(),!this.columnWidth){var t=this.items[0],i=t&&t.element;this.columnWidth=i&&e(i).outerWidth||this.containerWidth}var n=this.columnWidth+=this.gutter,o=this.containerWidth+this.gutter,r=o/n,s=n-o%n,a=s&&1>s?"round":"floor";r=Math[a](r),this.cols=Math.max(r,1)},n.getContainerWidth=function(){var t=this._getOption("fitWidth"),i=t?this.element.parentNode:this.element,n=e(i);this.containerWidth=n&&n.innerWidth},n._getItemLayoutPosition=function(t){t.getSize();var e=t.size.outerWidth%this.columnWidth,i=e&&1>e?"round":"ceil",n=Math[i](t.size.outerWidth/this.columnWidth);n=Math.min(n,this.cols);for(var o=this.options.horizontalOrder?"_getHorizontalColPosition":"_getTopColPosition",r=this[o](n,t),s={x:this.columnWidth*r.col,y:r.y},a=r.y+t.size.outerHeight,h=n+r.col,u=r.col;h>u;u++)this.colYs[u]=a;return s},n._getTopColPosition=function(t){var e=this._getTopColGroup(t),i=Math.min.apply(Math,e);return{col:e.indexOf(i),y:i}},n._getTopColGroup=function(t){if(2>t)return this.colYs;for(var e=[],i=this.cols+1-t,n=0;i>n;n++)e[n]=this._getColGroupY(n,t);return e},n._getColGroupY=function(t,e){if(2>e)return this.colYs[t];var i=this.colYs.slice(t,t+e);return Math.max.apply(Math,i)},n._getHorizontalColPosition=function(t,e){var i=this.horizontalColIndex%this.cols,n=t>1&&i+t>this.cols;i=n?0:i;var o=e.size.outerWidth&&e.size.outerHeight;return this.horizontalColIndex=o?i+t:this.horizontalColIndex,{col:i,y:this._getColGroupY(i,t)}},n._manageStamp=function(t){var i=e(t),n=this._getElementOffset(t),o=this._getOption("originLeft"),r=o?n.left:n.right,s=r+i.outerWidth,a=Math.floor(r/this.columnWidth);a=Math.max(0,a);var h=Math.floor(s/this.columnWidth);h-=s%this.columnWidth?0:1,h=Math.min(this.cols-1,h);for(var u=this._getOption("originTop"),d=(u?n.top:n.bottom)+i.outerHeight,l=a;h>=l;l++)this.colYs[l]=Math.max(d,this.colYs[l])},n._getContainerSize=function(){this.maxY=Math.max.apply(Math,this.colYs);var t={height:this.maxY};return this._getOption("fitWidth")&&(t.width=this._getContainerFitWidth()),t},n._getContainerFitWidth=function(){for(var t=0,e=this.cols;--e&&0===this.colYs[e];)t++;return(this.cols-t)*this.columnWidth-this.gutter},n.needsResizeLayout=function(){var t=this.containerWidth;return this.getContainerWidth(),t!=this.containerWidth},i});

$(window).on('load', function(){
$('.products-grid').masonry(
{
columnWidth: '.item',
itemSelector: '.item'
}	
);
});
