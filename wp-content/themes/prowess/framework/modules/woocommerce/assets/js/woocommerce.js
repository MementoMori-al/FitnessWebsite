(function($) {
    'use strict';

    var woocommerce = {};
    qodef.modules.woocommerce = woocommerce;

    woocommerce.qodefOnDocumentReady = qodefOnDocumentReady;
    woocommerce.qodefOnWindowLoad = qodefOnWindowLoad;
    woocommerce.qodefOnWindowResize = qodefOnWindowResize;

    $(document).ready(qodefOnDocumentReady);
    $(window).on('load',qodefOnWindowLoad);
    $(window).resize(qodefOnWindowResize);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function qodefOnDocumentReady() {
        qodefInitQuantityButtons();
        qodefInitSelect2();
	    qodefInitSingleProductLightbox();
    }

    /* 
        All functions to be called on $(window).load() should be in this function
    */
    function qodefOnWindowLoad() {
        qodefInitProductListMasonryShortcode();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function qodefOnWindowResize() {
        qodefInitProductListMasonryShortcode();
    }
	
    /*
    ** Init quantity buttons to increase/decrease products for cart
    */
	function qodefInitQuantityButtons() {
		$(document).on('click', '.qodef-quantity-minus, .qodef-quantity-plus', function (e) {
			e.stopPropagation();
			
			var button = $(this),
				inputField = button.siblings('.qodef-quantity-input'),
				step = parseFloat(inputField.data('step')),
				max = parseFloat(inputField.data('max')),
				minus = false,
				inputValue = parseFloat(inputField.val()),
				newInputValue;
			
			if (button.hasClass('qodef-quantity-minus')) {
				minus = true;
			}
			
			if (minus) {
				newInputValue = inputValue - step;
				if (newInputValue >= 1) {
					inputField.val(newInputValue);
				} else {
					inputField.val(0);
				}
			} else {
				newInputValue = inputValue + step;
				if (max === undefined) {
					inputField.val(newInputValue);
				} else {
					if (newInputValue >= max) {
						inputField.val(max);
					} else {
						inputField.val(newInputValue);
					}
				}
			}
			
			inputField.trigger('change');
		});
	}

    /*
    ** Init select2 script for select html dropdowns
    */
	function qodefInitSelect2() {
		var orderByDropDown = $('.woocommerce-ordering .orderby');
		if (orderByDropDown.length) {
			orderByDropDown.select2({
				minimumResultsForSearch: Infinity
			});
		}
		
		var variableProducts = $('.qodef-woocommerce-page .qodef-content .variations td.value select');
		if (variableProducts.length) {
			variableProducts.select2();
		}
		
		var shippingCountryCalc = $('#calc_shipping_country');
		if (shippingCountryCalc.length) {
			shippingCountryCalc.select2();
		}
		
		var shippingStateCalc = $('.cart-collaterals .shipping select#calc_shipping_state');
		if (shippingStateCalc.length) {
			shippingStateCalc.select2();
		}
	}
	
	/*
	 ** Init Product Single Pretty Photo attributes
	 */
	function qodefInitSingleProductLightbox() {
		var item = $('.qodef-woo-single-page.qodef-woo-single-has-pretty-photo .images .woocommerce-product-gallery__image');
		
		if(item.length) {
			item.children('a').attr('data-rel', 'prettyPhoto[woo_single_pretty_photo]');
			
			if (typeof qodef.modules.common.qodefPrettyPhoto === "function") {
				qodef.modules.common.qodefPrettyPhoto();
			}
		}
	}
	
	/*
	 ** Init Product List Masonry Shortcode Layout
	 */
	function qodefInitProductListMasonryShortcode() {
		var container = $('.qodef-pl-holder.qodef-masonry-layout .qodef-pl-outer');
		
		if (container.length) {
			container.each(function () {
				var thisContainer = $(this),
					size = thisContainer.find('.qodef-pl-sizer').width();
				
				thisContainer.waitForImages(function () {
					thisContainer.isotope({
						itemSelector: '.qodef-pli',
						resizable: false,
						masonry: {
							columnWidth: '.qodef-pl-sizer',
							gutter: '.qodef-pl-gutter'
						}
					});
					
					qodefResizeWooCommerceMasonryLayoutItems(size, thisContainer);
					
					thisContainer.isotope('layout').css('opacity', 1);
				});
			});
		}
	}
	
	function qodefResizeWooCommerceMasonryLayoutItems(size,container){
		if(container.find('.qodef-woo-image-large-width').length || container.find('.qodef-woo-image-large-height').length || container.find('.qodef-woo-image-large-width-height').length) {
			var space_between_items = parseInt(container.find('.qodef-pli').css('paddingLeft'), 10),
				newSize = size - 2 * space_between_items,
				defaultMasonryItem = container.find('.qodef-woo-image-small'),
				largeWidthMasonryItem = container.find('.qodef-woo-image-large-width'),
				largeHeightMasonryItem = container.find('.qodef-woo-image-large-height'),
				largeWidthHeightMasonryItem = container.find('.qodef-woo-image-large-width-height');
			
			defaultMasonryItem.css('height', newSize);
			largeHeightMasonryItem.css('height', Math.round(2 * ( newSize + space_between_items )));
			
			if (qodef.windowWidth > 680) {
				largeWidthHeightMasonryItem.css('height', Math.round(2 * ( newSize + space_between_items )));
				largeWidthMasonryItem.css('height', newSize);
			} else {
				largeWidthHeightMasonryItem.css('height', newSize);
				largeWidthMasonryItem.css('height', Math.round(newSize / 2));
			}
		}
	}

})(jQuery);