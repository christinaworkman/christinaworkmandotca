(function($) {
	window.onLoadUABBReCaptcha = function() {
		var reCaptchaFields = $( '.uabb-grecaptcha' ),
			widgetID;
		if ( reCaptchaFields.length > 0 ) {
			reCaptchaFields.each(function(){
				var self 		= $( this ),
				 	attrWidget 	= self.attr('data-widgetid');

				// Avoid re-rendering as it's throwing API error
				if ( (typeof attrWidget !== typeof undefined && attrWidget !== false) ) {
					return;
				}
				else {
					widgetID = grecaptcha.render( self.attr('id'), { 
						sitekey : self.data( 'sitekey' ),
						callback: function( response ) {
						 	if ( response != '' ) {
						 		self.attr( 'data-uabb-grecaptcha-response', response );
						 	}
						}
					});
					self.attr( 'data-widgetid', widgetID );					
				}
			});
		}
	};
	UABBRegistrationFormModule = function( settings ) {
		this.settings       		 = settings;
		this.node           		 = settings.id;
		this.required       		 = settings.required;
		this.check_password_strength = settings.check_password_strength;
		this.redirect_after_register = settings.redirect_after_register;
		this.redirect_after_link     = settings.redirect_after_link;
		this.recaptcha_version       = settings.recaptcha_version;
		$node_module 		         = $( '.fl-node-' + this.node );
		this.uabb_ajaxurl            = settings.uabb_ajaxurl;
		email_regex                  = /\S+@\S+\.\S+/;
		submit_button		         = $node_module.find('.uabb-registration-form-submit');
		reCaptchaField               = $('#'+ this.settings.id + '-uabb-grecaptcha');
		reCaptchaValue               = reCaptchaField.data( 'uabb-grecaptcha-response' );
		this.password_match_err_msg		 = settings.password_match_err_msg;
		this.email_invalid_err_msg		 = settings.email_invalid_err_msg;
		this.phone_invalid_err_msg		 = settings.phone_invalid_err_msg;
		this.required_field_err_msg		 = settings.required_field_err_msg;
		this.wp_version                  = settings.wp_version;
		submit_button.on('click', $.proxy( this._submitform, this ) );
		confirm_password = $node_module.find( 'input[name=uabb_confirm_pass]' );

		confirm_password.on('keyup change',$.proxy( this.checkPassword, this ) );
		
		if ( 'yes' == this.check_password_strength ) {
			$node_module.find( 'input[name=uabb_user_pass]' ).on('keyup change',$.proxy( this.strengthMeterPassword, this ) );
		}

		if ( 'v3' === this.recaptcha_version && reCaptchaField.length > 0 ) {
			grecaptcha.ready( function () {
				recaptcha_id = reCaptchaField.attr( 'data-widgetid' );
				grecaptcha.execute( recaptcha_id );
			});
		}

	};
	UABBRegistrationFormModule.prototype = {

		strengthMeterPassword: function() {

			node_module 		= $( '.fl-node-' + this.node );
			user_pass 			=  node_module.find( 'input[name=uabb_user_pass]' );
			confirm_password 	=  node_module.find( 'input[name=uabb_confirm_password]' );
			user_pass_selector  =  node_module.find( '.uabb-user_pass' );
			error_message		=  user_pass_selector.find( '.uabb-registration-form-pass-verify' );

			this.checkPasswordStrength( user_pass, confirm_password, error_message, ['black', 'listed', 'word'] );
		},
		checkPasswordStrength: function( $pass1, $pass2, meter, blacklistArray ) {

			var pass1 = $pass1.val();
   			var pass2 = $pass2.val();

   			// Extend our blacklist array with those from the inputs & site data
   			if ( this.wp_version ) {
   				blacklistArray = blacklistArray.concat( wp.passwordStrength.userInputDisallowedList() );
   			} else {
    			blacklistArray = blacklistArray.concat( wp.passwordStrength.userInputBlacklist() );
    		}

    			// Get the password strength
   			var strength = wp.passwordStrength.meter( pass1, blacklistArray );
 
   			// Add the strength meter results
	    	switch ( strength ) {
				case 0:
				case 1:
					meter.addClass('short').html( 'Weak' );
					break;
				case 2:
					meter.removeClass('short');
					meter.addClass('good').html( pwsL10n.good );
					break;
				case 3:
				case 4:
					meter.removeClass('good');
					meter.addClass('strong').html( pwsL10n.strong );
					break;
			}
		},
		checkPassword: function() {
			node_module 		= $( '.fl-node-' + this.node );
			var match_field = node_module.find( '.uabb-registration-form-pass-match' );
			pass = node_module.find( 'input[name=uabb_user_pass]' ).val();
			confirm_pass = node_module.find( 'input[name=uabb_confirm_pass]' ).val();
		
			if( pass === confirm_pass){
            
            match_field.removeClass('error');
            match_field.addClass('success');
            match_field.show();
            match_field.html('Password matched');

            setTimeout(function() {
                match_field.fadeOut('slow');
            }, 5000);

          }else if( pass !== confirm_pass ){
            
            match_field.removeClass('success');
            match_field.addClass('error');
            match_field.show();
            match_field.html('Password do not match');

          }

		},
		_submitform: function() {

			
			var self = this;
			node_module 		= $( '.fl-node-' + self.node );
			node_Class          = '.fl-node-' + self.node;
			$flag 				= false;
			first_name 			=  node_module.find( 'input[name=uabb_first_name]' );
			last_name  			=  node_module.find( 'input[name=uabb_last_name]' );
			user_login 			=  node_module.find( 'input[name=uabb_user_login]' );
			user_pass 			=  node_module.find( 'input[name=uabb_user_pass]' );
			confirm_password 	=  node_module.find( 'input[name=uabb_confirm_pass]' );
			user_url 			=  node_module.find( 'input[name=uabb_user_url]' );
			user_email 			=  node_module.find( 'input[name=uabb_user_email]' );
			user_nicename 		=  node_module.find( 'input[name=uabb_user_nicename]' );
			user_nicename 		=  node_module.find( 'input[name=uabb_user_nicename]' );
			phone   			=  node_module.find( 'input[name=uabb_phone]' );
			theForm	  			= $( node_Class + ' .uabb-registration-form')
			post_id      	    = theForm.closest( '.fl-builder-content' ).data( 'post-id' );
			template_id		    = theForm.data( 'template-id' );
			template_node_id	= theForm.data( 'template-node-id' );
			node_id      	    = theForm.closest( '.fl-module' ).data( 'node' );
			honeypot_field		= node_module.find( 'input[name=input_text]' );
			reCaptchaField      = $('#'+ self.settings.id + '-uabb-grecaptcha');
			termsCheckbox 	= $( node_Class + ' .uabb-terms-checkbox input' );

			reCaptchaValue      = reCaptchaField.data( 'uabb-grecaptcha-response' );
			user_email_regex	= /\S+@\S+\.\S+/;
			phone_regex         = /^[0-9()#&+*-=.]+$/;
			ajaxurl             = self.uabb_ajaxurl
			_nonce              = node_module.find( '.uabb-registration-form' ).data('nonce');
			$password           = '';		
			$first_name         = '';
			$last_name          = '';
			$user_login         = '';
			$user_url           = '';
			$user_email         = '';
			$phone              = '';
			$valid_field        = false;

			event.preventDefault();

			first_name.on('focus', self._removeErrorClass);
			last_name.on('focus', self._removeErrorClass);
			user_login.on('focus', self._removeErrorClass);
			user_pass.on('focus', self._removeErrorClass);
			user_email.on('focus', self._removeErrorClass);
			confirm_password.on('focus', self._removeErrorClass);

			if ( '' !== honeypot_field.val() && 'undefined' !== typeof honeypot_field.val() ) {

				$valid_field = true;

				node_module.find( '.uabb-rf-honeypot' ).show();
				
			} else {
				node_module.find( '.uabb-rf-honeypot' ).hide();
			}

			if ( user_pass.length > 0  && '' !== user_pass.val() ) {
				$password = user_pass.val();
			}

			if ( user_pass.length > 0 && confirm_password.length > 0 ) {
				if ( user_pass.val() === confirm_password.val() && '' !== user_pass.val() && '' !== confirm_password.val() ) {

					$password = user_pass.val();
				} else {
					$valid_field = true;

					confirm_password.parent().addClass('uabb-registration-form-error');
					confirm_password.addClass( 'uabb-form-error' );
					if ( confirm_password.siblings( '.uabb-registration_form-error-message' ).empty() ) {
						confirm_password.siblings('.uabb-registration_form-error-message').append(self.password_match_err_msg).show();
					}
				}					
			}
			if ( '' == user_pass.val() && user_pass.length > 0 && user_pass.hasClass( 'uabb-registration-form-requried-yes' ) ) {
					
				$valid_field = true;

				user_pass.parent().addClass('uabb-registration-form-error');
				user_pass.addClass( 'uabb-form-error' );
				if ( user_pass.siblings( '.uabb-registration_form-error-message' ).empty() ) {
					user_pass.siblings( '.uabb-registration_form-error-message' ).append( self.required_field_err_msg ).show();
				}
			} else if ( '' == user_pass.val() && user_pass.length > 0 ) {
					
				$valid_field = true;

				user_pass.parent().addClass('uabb-registration-form-error');
				user_pass.addClass( 'uabb-form-error' );
				if ( user_pass.siblings( '.uabb-registration_form-error-message' ).empty() ) {
					user_pass.siblings( '.uabb-registration_form-error-message' ).append( self.required_field_err_msg ).show();
				}
			} 
			if ( '' == confirm_password.val() && confirm_password.length > 0 && confirm_password.hasClass( 'uabb-registration-form-requried-yes' ) ) {
				$valid_field = true;

				confirm_password.parent().addClass('uabb-registration-form-error');
				confirm_password.addClass( 'uabb-form-error' );
				if ( confirm_password.siblings( '.uabb-registration_form-error-message' ).empty() ) {
					confirm_password.siblings( '.uabb-registration_form-error-message' ).append( self.required_field_err_msg ).show();
				}
			}
			if ( first_name.length > 0  && '' !== first_name.val() ) {
				$first_name = first_name.val();	

			} else if ( first_name.length > 0 && first_name.hasClass( 'uabb-registration-form-requried-yes' ) ) {
					
				$valid_field = true;

				first_name.parent().addClass('uabb-registration-form-error');
				first_name.addClass( 'uabb-form-error' );
				if ( first_name.siblings( '.uabb-registration_form-error-message' ).empty() ) {
					first_name.siblings( '.uabb-registration_form-error-message' ).append( self.required_field_err_msg ).show();
				}
			}
			if ( last_name.length > 0  && '' !== last_name.val() ) {

				$last_name = last_name.val();

			} else if ( last_name.length > 0 && last_name.hasClass( 'uabb-registration-form-requried-yes' ) ) {
					
				$valid_field = true;

				last_name.parent().addClass('uabb-registration-form-error');
				last_name.addClass( 'uabb-form-error' );
				if ( last_name.siblings( '.uabb-registration_form-error-message' ).empty() ) {
					last_name.siblings( '.uabb-registration_form-error-message' ).append( self.required_field_err_msg ).show();
				}
			}
			if ( user_login.length > 0  && '' !== user_login.val() ) {
				$user_login = user_login.val();

			} else if ( user_login.length > 0 && user_login.hasClass( 'uabb-registration-form-requried-yes' ) ) {
					
				$valid_field = true;

				user_login.parent().addClass('uabb-registration-form-error');
				user_login.addClass( 'uabb-form-error' );

				if ( user_login.siblings( '.uabb-registration_form-error-message' ).empty() ) {
					user_login.siblings( '.uabb-registration_form-error-message' ).append( self.required_field_err_msg ).show();
				}
			}
			if ( user_url.length > 0  && '' !== user_url.val() ) {
				$user_url = user_url.val();					
			} else if ( user_url.length > 0 && user_url.hasClass( 'uabb-registration-form-requried-yes' ) ) {
					
				$valid_field = true;

				user_url.parent().addClass('uabb-registration-form-error');
				user_url.addClass( 'uabb-form-error' );

				if ( user_url.siblings( '.uabb-registration_form-error-message' ).empty() ) {
					user_url.siblings( '.uabb-registration_form-error-message' ).append( self.required_field_err_msg ).show();
				}
			}
			if ( user_email.length > 0  && '' !== user_email.val() ) {

				if ( user_email.val().trim() !== '') {

					if ( user_email_regex.test( user_email.val().trim() ) ) {

					user_email.parent().removeClass('uabb-form-error');

					user_email.siblings( '.uabb-registration_form-error-message' ).hide();

					$user_email = user_email.val();

					} else {

						$valid_field = true;
						last_name.parent().addClass('uabb-registration-form-error');
						user_email.parent().removeClass('uabb-form-error');

						if ( user_email.siblings( '.uabb-registration_form-error-message' ).empty() ) {
							user_email.siblings('.uabb-registration_form-error-message').append(self.email_invalid_err_msg ).show();
						}
					}
				}					
			} else if ( user_email.length > 0 && user_email.hasClass( 'uabb-registration-form-requried-yes' ) ) {
					
				$valid_field = true;

				user_email.parent().addClass('uabb-registration-form-error');
				user_email.addClass( 'uabb-form-error' );
				if ( user_email.siblings( '.uabb-registration_form-error-message' ).empty() ) {
					user_email.siblings( '.uabb-registration_form-error-message' ).append( self.required_field_err_msg ).show();
				}
			}

			if ( phone.length > 0  && '' !== phone.val() ) {

				if ( phone.val().trim() !== '') {

					if ( phone_regex.test( phone.val().trim() ) ) {

					phone.parent().removeClass('uabb-form-error');

					phone.siblings( '.uabb-registration_form-error-message' ).hide();

					$phone = phone.val();

					} else {

						$valid_field = true;
						phone.parent().addClass('uabb-registration-form-error');
						phone.parent().removeClass('uabb-form-error');

						if ( phone.siblings( '.uabb-registration_form-error-message' ).empty() ) {
							phone.siblings('.uabb-registration_form-error-message').append(self.phone_invalid_err_msg ).show();
						}
					}
				}					
			} else if ( phone.length > 0 && phone.hasClass( 'uabb-registration-form-requried-yes' ) ) {
					
				$valid_field = true;

				phone.parent().addClass('uabb-registration-form-error');
				phone.addClass( 'uabb-form-error' );
				if ( phone.siblings( '.uabb-registration_form-error-message' ).empty() ) {
					phone.siblings( '.uabb-registration_form-error-message' ).append( self.required_field_err_msg ).show();
				}
			}
			// validate if checkbox is checked
			if ( termsCheckbox.length ) {
				if ( ! termsCheckbox.is(':checked') ) {
					$valid_field = true;
					termsCheckbox.closest( '.uabb-registration-form .uabb-terms-checkbox' ).addClass( 'uabb-registration-form-error' );
				}
				else if ( termsCheckbox.closest( '.uabb-registration-form .uabb-terms-checkbox' ).hasClass( 'uabb-registration-form-error' ) ) {
					termsCheckbox.closest( '.uabb-registration-form .uabb-terms-checkbox' ).removeClass( 'uabb-registration-form-error' );
				}
			}
			// validate if reCAPTCHA is enabled and checked
			if ( 'v2' == self.recaptcha_version && reCaptchaField.length > 0 ) {

				if ( 'undefined' === typeof reCaptchaValue || reCaptchaValue === false ) {
					$valid_field = true;
					node_module.find( '.uabb-recaptcha .uabb-registration-error' ).show();
					reCaptchaField.parent().addClass( 'uabb-registration-form-error' );
				} else {
					reCaptchaField.parent().removeClass( 'uabb-registration-form-error' );
					node_module.find( '.uabb-recaptcha .uabb-registration-error' ).hide();
				}
			}
			if ( $valid_field ) {
				return false;
			} else {
				$recaptcha_version = self.recaptcha_version;
				button_text =  node_module.find( '.uabb-registration-form-button-text' );
				form_wrap   = node_module.find( '.uabb-registration-form' );
				$reCaptchaValue = reCaptchaValue;

				var user_data = { "user_login": $user_login, 
					"user_pass": $password, 
					"first_name": $first_name, 
					"last_name": $last_name,
	     			"user_email": $user_email,
	     			"user_url": $user_url,
	     			"phone": $phone,
	     			"recaptcha_version":$recaptcha_version,
	     			"recaptcha_response" : reCaptchaValue,
	     		};
	     		form_wrap.animate({
					opacity: '0.45'
				}, 500 ).addClass( 'uabb-form-waiting' );

				if( ! button_text.hasClass( 'disabled' ) ) {
					button_text.addClass( 'disabled' );
					button_text.append( '<span class="uabb-form-loader"></span>' );
				}

				user_pass.siblings( '.uabb-pass-wrapper' ).remove();

				$.post(ajaxurl, {
					action	: 'uabb_registration_form',
					method:'post',
					security : _nonce,
					data: user_data,
					post_id: post_id,
					node_id: node_id,
					template_id: template_id,
	     			template_node_id: template_node_id						
				}, $.proxy( self._submitComplete, self ) );
			}
		},
		_submitComplete: function( data ) {

			var self = this;
			node_module = $( '.fl-node-' + self.node );

			button_text =  node_module.find( '.uabb-registration-form-button-text' );
			form_wrap   = node_module.find( '.uabb-registration-form' );

			button_text.find( '.uabb-form-loader' ).remove();

			button_text.removeClass( 'disabled' );

			form_wrap.animate({
				opacity: '1'
			}, 100 ).removeClass( 'uabb-form-waiting' );

			if ( true == data.success ) {

				node_module.find( '.uabb-rf-success-message-wrap' ).css('display', 'block');
				node_module.find( '.uabb-registration-form' ).trigger( 'reset' );
				
				if ( 'yes' === self.redirect_after_register && '' !== self.redirect_after_link ) {

					redirect_url = self.redirect_after_link

					window.setTimeout( function () {
						window.location = redirect_url;
					});
				}
			}

            jQuery.each( data.error, function ( key, message ) {

				$error_class = node_module.find( '.uabb-' + key );

				$error_class_child = $error_class.find( '.uabb-registration_form-error-message' );

				if ( $error_class_child.empty() ) {
					$error_class_child.append( message );
				}

				$error_class_child.css('display', 'block');
			});
		},
		_removeErrorClass: function(){
			$( this ).parent().removeClass('uabb-registration-form-error');
			$( this ).siblings('.uabb-registration_form-error-message-required').hide();
		},
	}
})(jQuery);