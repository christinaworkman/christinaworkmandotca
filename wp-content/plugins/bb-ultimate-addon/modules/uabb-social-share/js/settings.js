(function($){
	var ico_image_style = 'simple';
	FLBuilder.registerModuleHelper('uabb-social-share', {

		init: function()
		{	
			var form    	= $('.fl-builder-settings'),
				icoimage_style	= form.find('select[name=icoimage_style]');
				skins	= form.find('select[name=skins]');
				color_style	= form.find('select[name=color_style]');

			this._toggleBorderOptions();

			skins.on( 'change', this._toggleSkins );
			color_style.on( 'change', this._toggleSkins );
			form.find('select[name=display_position]').on( 'change', this._toggleSkins );

			this._toggleSkins();

				// Validation events
			icoimage_style.on('change', $.proxy( this._toggleBorderOptions, this ) ) ;
		},
		_toggleBorderOptions: function() {
			var form		= $('.fl-builder-settings'),
				icoimage_style 	= form.find('select[name=icoimage_style]').val(),
				border_style 	= form.find('select[name=border_style]').val();

			ico_image_style = icoimage_style;
				
			if( icoimage_style == 'custom' ){
				if ( border_style != 'none' ) {
					form.find('#fl-field-border_width').show();
					form.find('#fl-field-border_color').show();
					form.find('#fl-field-border_hover_color').show();
				}
			}else {
				//alert();
				form.find('#fl-field-border_width').hide();
				form.find('#fl-field-border_color').hide();
				form.find('#fl-field-border_hover_color').hide();
			}
		},
		_toggleSkins: function() {
			var form		= $('.fl-builder-settings');

			if ( 'default' !== form.find('select[name=skins]').val() ) {
				form.find('#fl-field-column').show();
				form.find('#fl-field-display_position').show();
				form.find('#fl-builder-settings-section-social_skins').show();
				form.find('#fl-field-share_alignment').show();
				form.find('#fl-field-share_shape').show();
				form.find('#fl-field-share_view').show();
				if ( 'default' !== form.find('select[name=color_style]').val() ) {
					form.find('#fl-builder-settings-section-social_color_skin').show();				
				} else {
					form.find('#fl-builder-settings-section-social_color_skin').hide();
				}
				if ( 'floating' === form.find('select[name=display_position]').val() ) {
					form.find('#fl-field-floating_alignment').show();
					form.find('#fl-field-share_alignment').hide();
					form.find('#fl-field-column').hide();
				} else {
					form.find('#fl-field-floating_alignment').hide();
					form.find('#fl-field-share_alignment').show();
					form.find('#fl-field-column').show();
				}
			} else {
				form.find('#fl-field-column').hide();
				form.find('#fl-field-display_position').hide();
				form.find('#fl-builder-settings-section-social_skins').hide();
				form.find('#fl-builder-settings-section-social_color_skin').hide();
				form.find('#fl-field-floating_alignment').hide();
				form.find('#fl-field-share_alignment').hide();
				form.find('#fl-field-share_shape').hide();
				form.find('#fl-field-share_view').hide();

			}
		}
	});
	
	FLBuilder.registerModuleHelper('uabb_social_share_form', {

		init: function() {	

			var form    		= $('.fl-builder-settings'),
				image_type		= form.find('select[name=image_type]');

			this._changeImageType();

			image_type.on( 'change', this._changeImageType );
		},

		_changeImageType : function() {

			var form    		= $('.fl-builder-settings'),
				image_type		= form.find('select[name=image_type]').val(),
				icon			= form.find('input[name=icon]'),
				photo			= form.find('input[name=photo]');

			icon.rules('remove');
			photo.rules('remove');

			if ( image_type == 'photo' ) {
				photo.rules('add', { required: true });
				if( ico_image_style == 'simple' ) {
					form.find('.fl-builder-settings-tabs a[href="#fl-builder-settings-tab-form_style"]').hide();
				} else {
					if( ico_image_style == 'circle' || ico_image_style == 'square' ) {
						form.find('#fl-field-border_color').hide();
						form.find('#fl-field-border_hover_color').hide();
					} else {
						form.find('#fl-field-border_color').show();
						form.find('#fl-field-border_hover_color').show();
					}
					form.find('.fl-builder-settings-tabs a[href="#fl-builder-settings-tab-form_style"]').show();
				}
				
			} else if ( image_type == 'icon' ) {
				if ( 'default' !== form.find('select[name=skins]').val() ) {
				form.find('.fl-builder-settings-tabs a[href="#fl-builder-settings-tab-form_style"]').hide();
				} else {
				form.find('.fl-builder-settings-tabs a[href="#fl-builder-settings-tab-form_style"]').show();
				}
				if( ico_image_style == 'simple' ) {
					form.find('#fl-field-bg_color').hide();
					form.find('#fl-field-bg_color_opc').hide();
					form.find('#fl-field-bg_hover_color').hide();
					form.find('#fl-field-bg_hover_color_opc').hide();
					form.find('#fl-field-border_color').hide();
					form.find('#fl-field-border_hover_color').hide();
				} else if( ico_image_style == 'circle' || ico_image_style == 'square' ) {
					form.find('#fl-field-bg_color').show();
					form.find('#fl-field-bg_color_opc').show();
					form.find('#fl-field-bg_hover_color').show();
					form.find('#fl-field-bg_hover_color_opc').show();
					form.find('#fl-field-border_color').hide();
					form.find('#fl-field-border_hover_color').hide();
				} else {
					form.find('#fl-field-bg_color').show();
					form.find('#fl-field-bg_color_opc').show();
					form.find('#fl-field-bg_hover_color').show();
					form.find('#fl-field-bg_hover_color_opc').show();
					form.find('#fl-field-border_color').show();
					form.find('#fl-field-border_hover_color').show();
				}
			}	
		}
	});

})(jQuery);