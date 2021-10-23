(function($){
	FLBuilder.registerModuleHelper('uabb-login-form', {

		init: function()
		{
			var form    	= $('.fl-builder-settings'),
			google_login_select	= form.find('select[name="google_login_select"]'),
			facebook_login_select	= form.find('select[name="facebook_login_select"]'),
			lost_your_pass = form.find('select[name=lost_your_password_select]'),
			register_link = form.find('select[name=custom_link_select]'),
			fields_icon = form.find('select[name=fields_icon]');
			this._socialSelectStyling();
			google_login_select.on('change', $.proxy( this._socialSelectStyling, this ) ) ;
			facebook_login_select.on('change', $.proxy( this._socialSelectStyling, this ) ) ;
			lost_your_pass.on('change',this.login_pwd_toggle );
			register_link.on('change',this.login_pwd_toggle );
			fields_icon.on('change',this.fields_icon_toggle );
			this.login_pwd_toggle();
			this.fields_icon_toggle();
			this._hideDocs();
		},
		fields_icon_toggle: function() {
			var form	= $( '.fl-builder-settings' ),
			fields_icon = form.find('select[name=fields_icon]').val(),
			fields_icon_divider = form.find('select[name=fields_icon_divider]').val();

			if ( 'enable' == fields_icon ) {
				form.find( '#fl-field-fields_icon_divider' ).show();
				form.find( '#fl-field-fields_icon_color' ).show();
				form.find( '#fl-field-fields_icon_size' ).show();

				if ( 'enable' == fields_icon_divider ) {
					form.find( '#fl-field-divider_style' ).show();
					form.find( '#fl-field-divider_color' ).show();
					form.find( '#fl-field-divider_weight' ).show();
				} else {
					form.find( '#fl-field-divider_style' ).hide();
					form.find( '#fl-field-divider_color' ).hide();
					form.find( '#fl-field-divider_weight' ).hide();
				}
			} else {
				form.find( '#fl-field-fields_icon_divider' ).hide();
				form.find( '#fl-field-fields_icon_color' ).hide();
				form.find( '#fl-field-fields_icon_size' ).hide();
				form.find( '#fl-field-divider_style' ).hide();
				form.find( '#fl-field-divider_color' ).hide();
				form.find( '#fl-field-divider_weight' ).hide();
			}
		},
		login_pwd_toggle: function() {
			var form       = $('.fl-builder-settings'),
			lost_your_pass = form.find('select[name=lost_your_password_select]'),
			register_link     = form.find('select[name=custom_link_select]');

			if ( 'enable' === lost_your_pass.val() || 'enable' === register_link.val() ) {
				form.find('#fl-field-form_end_text_align').show();
			} else if ( 'disable' === lost_your_pass.val() && 'disable' === register_link.val() ) {
				form.find('#fl-field-form_end_text_align').hide();
			}
		},
		_socialSelectStyling: function() {
			var form		= $('.fl-builder-settings'),
			facebook_login_select	= form.find('select[name="facebook_login_select"]');
			google_login_select	= form.find('select[name="google_login_select"]');
			social_styling_section = form.find('#fl-builder-settings-section-socail_styling');
			if ( typeof google_login_select.val() !== 'undefined' && typeof facebook_login_select.val() !== 'undefined' ) {
				social_styling_section.show();
				if ( 'no' === google_login_select.val() && 'no' === facebook_login_select.val() ) {
					social_styling_section.hide();
				}
			}
		},
		/**
         * Branding is on hide the Docs Tab.
         *
         * @since 1.24.0
        */
        _hideDocs: function() {
            var form            = $('.fl-builder-settings'),
            branding_selector   = form.find('#fl-field-uabb_helpful_information .uabb-docs-list');
            settings_tab        = form.find('.fl-builder-settings-tabs');
            get_anchor          =  settings_tab.find('a');

            $( get_anchor ).each(function() {

                if ( '#fl-builder-settings-tab-uabb_docs' === $(this) .attr('href') ) {

                    if ( 'yes' === branding_selector.data('branding') ) {
                        $( this ).hide();
                    } else {
                        $( this ).show();
                    }
                }
            });
        }
	});
})(jQuery);
