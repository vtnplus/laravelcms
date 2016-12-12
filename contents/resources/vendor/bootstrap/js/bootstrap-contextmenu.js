/*!
 * Bootstrap Context Menu
 * Author: @sydcanem
 * https://github.com/sydcanem/bootstrap-contextmenu
 *
 * Inspired by Bootstrap's dropdown plugin.
 * Bootstrap (http://getbootstrap.com).
 *
 * Licensed under MIT
 * ========================================================= */

/*
 * Corrections By Roman Shuplov
 * 
 * Use this version of file until version of this library < 0.3.3. It will need to diff after apdated library.
 * Added previous pull requests
 * Changed target for scrollLeft() -> to window
 * 
 * Now real version is 0.3.2
 * 
 */

(function (root, factory) {
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        module.exports = factory(require('jquery'));
    } else {
        factory(root.jQuery);
  }
}(this, function ($) {

	'use strict';

	/* CONTEXTMENU CLASS DEFINITION
	 * ============================ */
	var toggle = '[data-toggle="context"]';

	var ContextMenu = function (element, options) {
		this.$element = $(element);

		this.before = options.before || this.before;
                this.after = options.after || this.after;
		this.onItem = options.onItem || this.onItem;
		this.scopes = options.scopes || null;
                this.trigger = options.trigger || 'right';
                this.container = options.container || window;

		if (options.target) {
			this.$element.data('target', options.target);
		}

		this.listen();
	};

	ContextMenu.prototype = {

		constructor: ContextMenu
		,show: function(e) {

			var $menu
				, evt
				, tp
				, items
				, relatedTarget = { relatedTarget: this, target: e.currentTarget };

			if (this.isDisabled()) return;

			this.closemenu();

			if (this.before.call(this,e,$(e.currentTarget)) === false) return;

			$menu = this.getMenu();
			$menu.trigger(evt = $.Event('show.bs.context', relatedTarget));

			tp = this.getPosition(e, $menu);
			items = 'li:not(.divider)';
			$menu.attr('style', '')
				.css(tp)
				.addClass('open')
				.on('click.context.data-api', items, $.proxy(this.onItem, this, $(e.currentTarget)))
				.trigger('shown.bs.context', relatedTarget);

			// Delegating the `closemenu` only on the currently opened menu.
			// This prevents other opened menus from closing.
			$('html')
				.on('click.context.data-api', $menu.selector, $.proxy(this.closemenu, this));

			return false;
		}

		,closemenu: function(e) {
			var $menu
				, evt
				, items
				, relatedTarget;

			$menu = this.getMenu();

			if(!$menu.hasClass('open')) return;

			relatedTarget = { relatedTarget: this };
			$menu.trigger(evt = $.Event('hide.bs.context', relatedTarget));

			items = 'li:not(.divider)';
			$menu.removeClass('open')
				.off('click.context.data-api', items)
				.trigger('hidden.bs.context', relatedTarget);

			$('html')
				.off('click.context.data-api', $menu.selector);
                        
                        if (typeof e !== 'object') return;
                        
                        if (!this.after.call(this,e,$(e.currentTarget))) return;
                        
			// Don't propagate click event so other currently
			// opened menus won't close.
			e.stopPropagation();
		}

		,keydown: function(e) {
			if (e.which == 27) this.closemenu(e);
		}

		,before: function(e) {
			return true;
		}

                ,after: function(e) {
			return true;
		}

		,onItem: function(e) {
			return true;
		}

		,listen: function () {
			var listenEvent = 'contextmenu';
			if (this.trigger === 'left') {
				listenEvent = 'click';
			}
			this.$element.on(listenEvent+'.context.data-api', this.scopes, $.proxy(this.show, this));
			$('html').on('click.context.data-api', $.proxy(this.closemenu, this));
			$('html').on('keydown.context.data-api', $.proxy(this.keydown, this));
		}

		,destroy: function() {
			this.$element.off('.context.data-api').removeData('context');
			$('html').off('.context.data-api');
		}

		,isDisabled: function() {
			return this.$element.hasClass('disabled') || 
					this.$element.attr('disabled');
		}

		,getMenu: function () {
			var selector = this.$element.data('target')
				, $menu;

			if (!selector) {
				selector = this.$element.attr('href');
				selector = selector && selector.replace(/.*(?=#[^\s]*$)/, ''); //strip for ie7
			}

			$menu = $(selector);

			return $menu && $menu.length ? $menu : this.$element.find(selector);
		}

		,getPosition: function(e, $menu) {
			var mouseX = e.clientX
				, mouseY = e.clientY
				, boundsX = $(this.container).width()
				, boundsY = $(this.container).height()
				, menuWidth = $menu.find('.dropdown-menu').outerWidth()
				, menuHeight = $menu.find('.dropdown-menu').outerHeight()
				, tp = {"position":"absolute","z-index":9999}
				, Y, X, parentOffset, menuParentOffset;

			if (mouseY + menuHeight > boundsY) {
				Y = {"top": mouseY - menuHeight + $(this.container).scrollTop()};
			} else {
				Y = {"top": mouseY + $(this.container).scrollTop()};
			}

                        parentOffset = this.offsetPosition($(this.container).get(0)) || {left: 0, top: 0};

                        if ((mouseX + menuWidth - parentOffset.left > boundsX) && ((mouseX - menuWidth) > 0)) {
				X = {"left": mouseX - menuWidth + $(window).scrollLeft()};
			} else {
				X = {"left": mouseX + $(window).scrollLeft()};
			}

			// If context-menu's parent is positioned using absolute or relative positioning,
			// the calculated mouse position will be incorrect.
			// Adjust the position of the menu by its offset parent position.
			menuParentOffset = $menu.offsetParent().offset() || { left: 0, top: 0};
			X.left = X.left - menuParentOffset.left + $menu.offsetParent().scrollLeft();
			Y.top = Y.top - menuParentOffset.top;
 
			return $.extend(tp, Y, X);
		}
                ,offsetPosition: function (element) {
                    var offsetLeft = 0, offsetTop = 0;
                    do {
                        offsetLeft += element.offsetLeft;
                        offsetTop  += element.offsetTop;
                    } while (element = element.offsetParent);
                    return {left:offsetLeft, top:offsetTop};
                }


	};

	/* CONTEXT MENU PLUGIN DEFINITION
	 * ========================== */

	$.fn.contextmenu = function (option,e) {
		return this.each(function () {
			var $this = $(this)
				, data = $this.data('context')
				, options = (typeof option == 'object') && option;

			if (!data) $this.data('context', (data = new ContextMenu($this, options)));
			if (typeof option == 'string') data[option].call(data, e);
		});
	};

	$.fn.contextmenu.Constructor = ContextMenu;

	/* APPLY TO STANDARD CONTEXT MENU ELEMENTS
	 * =================================== */

	$(document)
	   .on('contextmenu.context.data-api', function() {
			$(toggle).each(function () {
				var data = $(this).data('context');
				if (!data) return;
				data.closemenu();
			});
		})
		.on('contextmenu.context.data-api', toggle, function(e) {
			$(this).contextmenu('show', e);

			e.preventDefault();
			e.stopPropagation();
		});
		
}));