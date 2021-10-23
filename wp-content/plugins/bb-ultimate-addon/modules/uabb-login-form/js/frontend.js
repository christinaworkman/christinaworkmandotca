(function($) {
	
		var is_google_button_clicked = false;	
		var ajaxurl = '';
		var uabb_lf_dashboard_url = '';
		var uabb_lf_google_redirect_login_url = '';
		var uabb_lf_facebook_redirect_login_url = '';
		var uabb_facebook_app_id = '';
		var uabb_social_google_client_id = '';
		var uabb_lf_nonce = '';
		
	UABBLoginForm = function( settings ) {

		
		this.settings       					= settings;
		this.nodeClass							= '.fl-node-' + settings.id;
		this.uabb_lf_ajaxurl   					= settings.uabb_lf_ajaxurl;
		node_module 		                    = $( '.fl-node-' + settings.id );
		this.uabb_lf_wp_form_redirect_toggle 	= settings.uabb_lf_wp_form_redirect_toggle;
		this.uabb_lf_wp_form_redirect_login_url = settings.uabb_lf_wp_form_redirect_login_url;
		this.uabb_lf_dashboard_url 				= settings.uabb_lf_dashboard_url;
		this.uabb_lf_google_redirect_url 		= settings.uabb_lf_google_redirect_url;
		this.uabb_lf_facebook_redirect_url 		= settings.uabb_lf_facebook_redirect_url;
		this.uabb_social_facebook_app_id 		= settings.uabb_social_facebook_app_id;
		this.uabb_social_google_client_id 		= settings.uabb_social_google_client_id;
		this.google_login_select				= settings.google_login_select;
		this.facebook_login_select				= settings.facebook_login_select;
		this.uabb_lf_nonce						= node_module.find( '.uabb-lf-form-wrap' ).data('nonce');
		this.uabb_lf_username_empty_err_msg     = settings.uabb_lf_username_empty_err_msg;
		this.uabb_lf_password_empty_err_msg     = settings.uabb_lf_password_empty_err_msg;
		this.uabb_lf_both_empty_err_msg 		= settings.uabb_lf_both_empty_err_msg;
		this.uabb_lf_username_invalid_err_msg 	= settings.uabb_lf_username_invalid_err_msg;
		this.uabb_lf_password_invalid_err_msg 	= settings.uabb_lf_password_invalid_err_msg;
		this.username                           = $(this.nodeClass + ' .uabb-lf-login-form').find('.uabb-lf-username');
		this.password 							= $(this.nodeClass + ' .uabb-lf-login-form').find('.uabb-lf-password');
		this.rememberme 						= $(this.nodeClass + ' .uabb-lf-login-form').find('.uabb-lf-remember-me-checkbox');
		this.errormessage 						= $( this.nodeClass + ' .uabb-lf-form-wrap').find('.uabb-lf-error-message');
		this.errormessagewrap 					= $( this.nodeClass + ' .uabb-lf-form-wrap').find('.uabb-lf-error-message-wrap');
		uabb_lf_dashboard_url 				    = this.uabb_lf_dashboard_url;
		ajaxurl 							    = this.uabb_lf_ajaxurl;
		uabb_lf_google_redirect_login_url 	    = this.uabb_lf_google_redirect_url; 
		uabb_lf_facebook_redirect_login_url     = this.uabb_lf_facebook_redirect_url;
		uabb_facebook_app_id 				    = this.uabb_social_facebook_app_id;
		uabb_social_google_client_id			= this.uabb_social_google_client_id;
		uabb_lf_nonce							= this.uabb_lf_nonce;
		button_text                             = node_module.find( '.uabb-login-form-button-text' );
		form_wrap                               = node_module.find( '.uabb-lf-login-form' );
		this._init();

	}
	UABBLoginForm.prototype = {


		_init: function()
		{	
			var nodeClass = this.nodeClass;
			$(".toggle-password").click(function() {
			  $(this).toggleClass("fa-eye fa-eye-slash");
			  var input = $($(this).attr("toggle"));
			  if (input.attr("type") == "password") {
			    input.attr("type", "text");
			  } else {
			    input.attr("type", "password");
			  }
			});

			$( nodeClass + ' .uabb-google-login' ).click( $.proxy( this._googleClick, this ) );
			$( nodeClass + ' .uabb-lf-submit-button' ).click( $.proxy( this._submit, this ) );
			$( nodeClass + ' .uabb-facebook-content-wrapper' ).click( $.proxy( this._fbClick, this ) );
			/**
			 * Login with Facebook.
			 *
			 */
			window.fbAsyncInit = function() {
			    // FB JavaScript SDK configuration and setup.
			    FB.init({
			      appId      : uabb_facebook_app_id, // FB App ID.
			      cookie     : true,  // enable cookies to allow the server to access the session.
			      xfbml      : true,  // parse social plugins on this page.
			      version    : 'v2.8' // use graph api version 2.8.
			    });
			};
			if( 'yes' === this.facebook_login_select ) {
				// Load the JavaScript SDK asynchronously.
				( function( d, s, id ) {
				    var js, fjs = d.getElementsByTagName( s )[0];
				    if ( d.getElementById( id ) ) {
				    	return;
				    }
				    js = d.createElement( s ); 
				    js.id = id;
				    js.src = '//connect.facebook.net/en_US/sdk.js';
				    fjs.parentNode.insertBefore( js, fjs );
				} ( document, 'script', 'facebook-jssdk' ) );
			}

			/**
			 * Login with Google.
			 *
			 */
			if ( 'undefined' !== typeof( gapi ) ) {
				gapi.load( 'auth2', function() {
					// Retrieve the singleton for the GoogleAuth library and set up the client.
					auth2 = gapi.auth2.init({
						client_id: uabb_social_google_client_id,
						cookiepolicy: 'single_host_origin',
					});
					
					auth2.attachClickHandler( 'uabb-google-login', {},

						function( googleUser ) {
		
							var profile = googleUser.getBasicProfile();
							var name =  profile.getName();
							var email = profile.getEmail();
							var id_token = googleUser.getAuthResponse().id_token;
				
							var data = {
										'action'  : 'uabb-lf-google-submit',
										'name'  : name,
										'email' : email,
										'nonce' : uabb_lf_nonce,
										'security_string' : id_token
									};
							if( is_google_button_clicked === true ) {
								
								$.post( ajaxurl, data, function( response ) {

								google_button_text = node_module.find( '.uabb-google-text' );

								google_button_text.find( '.uabb-login-form-loader' ).remove();
								
								$( location ).attr( 'href', uabb_lf_google_redirect_login_url );
								
								is_google_button_clicked = false;

								} );
							}

						}, function( error ) {

							// console.log( JSON.stringify( error, undefined, 2 ) );

						}
					);

				});
			}
			
		},
		_fbClick: function()
		{ 
			FB.login( function( response ) {

				fb_button_text = node_module.find( '.uabb-facebook-text' );

				form_wrap.animate({
					opacity: '0.45'
				}, 500 ).addClass( 'uabb-form-waiting' );

				fb_button_text.append( '<span class="uabb-login-form-loader"></span>' );

				if ( response.status === 'connected' ) {
					 FB.api( '/me', { fields: 'id, email, name , first_name, last_name,link, gender, locale, picture' },
					    function ( response ) {
				
					 		var access_token =   FB.getAuthResponse()['accessToken'];
					 		var userID =   FB.getAuthResponse()['userID'];
	
					        var fb_data = {
					        	'action'  : 'uabb-lf-facebook-submit',
								'userID'  : userID,
								'name' : response.name,
								'first_name' : response.first_name,
								'last_name' : response.last_name,
								'email' : response.email,
								'link' : response.link,
								'nonce' : uabb_lf_nonce,
								'security_string' : access_token,
							};

					  	$.post( ajaxurl, fb_data, function( response ) {

					  		fb_button_text.find( '.uabb-login-form-loader' ).remove();
					
							$( location ).attr( 'href', uabb_lf_facebook_redirect_login_url );
						
						} );
				    });
				
				} else {

					console.log( 'Error: Not connected to facebook' );
				}
			} , {
			    scope: 'email', 
			    return_scopes: true
			});
		},
		_googleClick: function()
		{
			google_button_text = node_module.find( '.uabb-google-text' );

			is_google_button_clicked = true;

			form_wrap.animate({
					opacity: '0.45'
				}, 500 ).addClass( 'uabb-form-waiting' );

			google_button_text.append( '<span class="uabb-login-form-loader"></span>' );
		},
		_submit: function( event )
		{
			event.preventDefault();
			var self = this,
				username = self.username.val(),
				password = self.password.val();

			if ( '' === username ) {

				self.errormessagewrap.css( "display", "inline-block" );
				self.errormessage.text( self.uabb_lf_username_empty_err_msg );
			}
			if ( '' === password ) {
				self.errormessagewrap.css( "display", "inline-block" );
				self.errormessage.text( self.uabb_lf_password_empty_err_msg );
			}
			if ( '' === username && '' === password ) {
				self.errormessagewrap.css( "display", "inline-block" );
				self.errormessage.text( self.uabb_lf_both_empty_err_msg );
			}
			if  ( '' !== username && '' !== password ) {

				var data = {
					'action'  : 'uabb-lf-form-submit',
					'username'  : username,
					'password' : password,
					'rememberme' : self.rememberme.val(),
					'nonce' : self.uabb_lf_nonce,
				};
				
				form_wrap.animate({
					opacity: '0.45'
				}, 500 ).addClass( 'uabb-form-waiting' );

				button_text.append( '<span class="uabb-login-form-loader"></span>' );

				$.post( self.uabb_lf_ajaxurl, data, $.proxy( this._submitComplete, this ) );
			}
		},
		_submitComplete: function ( response )
		{
				var self = this;
				button_text.find( '.uabb-login-form-loader' ).remove();

				form_wrap.animate({
					opacity: '1'
				}, 100 ).removeClass( 'uabb-form-waiting' );

				if ( true === response.success ) {

					if ( 'default' === self.uabb_lf_wp_form_redirect_toggle ) {
						$( location ).attr( 'href', self.uabb_lf_dashboard_url );
					} else if ( 'custom' === self.uabb_lf_wp_form_redirect_toggle ) {
						$( location ).attr( 'href', self.uabb_lf_wp_form_redirect_login_url );
					}
				} else if ( false === response.success && 'Incorrect Password' === response.data ) {
					self.errormessagewrap.css( "display", "inline-block" );
					self.errormessage.text( self.uabb_lf_password_invalid_err_msg );
					
				} else if ( false === response.success && 'Incorrect Username' === response.data ) {
					self.errormessagewrap.css( "display", "inline-block" );
					self.errormessage.text( self.uabb_lf_username_invalid_err_msg );
					
				}
		},
	}

})(jQuery);


