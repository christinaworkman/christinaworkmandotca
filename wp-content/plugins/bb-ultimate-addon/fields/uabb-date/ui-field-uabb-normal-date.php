<?php
/**
 *  User Interface Field Normal dat file
 *
 *  @package UI Field Normal Date
 */

?>
<#
var field   = data.field,
	name    = data.name,
	settings = data.settings,
	preview = data.preview,
	selected = '',
	sel = '',
	yr = parseInt( '<?php echo date( 'Y' ); // @codingStandardsIgnoreLine. ( WordPress.DateTime.RestrictedFunctions.date_date , WordPress.Security.EscapeOutput.OutputNotEscaped ) ?>' );
#>

<div class="uabb-date-wrap fl-field" data-type="select" data-preview="{{field.preview}}">
	<div class="uabb-countdown-custom-fields">
	<select class="text text-full" name="{{name}}_days" >
		<option value="0"><?php esc_html_e( 'Date', 'uabb' ); ?></option>
			<#
			for ( var i=1; i <= 31; i++ ) {
				selected = "";
				if ( settings.fixed_date_days != '' ) {
					if ( i == settings.fixed_date_days ) {
						selected = "selected";
					} else {
						selected = "";
					}
				} else if( i == 29 ) {
				selected = "selected";
			}
		if( i <= 9 ) {
		#>
		<option value="{{i}}" {{selected}}>0{{i}}</option>
		<#
		} else {
		#>
		<option value="{{i}}" {{selected}}>{{i}}</option>
		<#
		}
	}
	#>
	</select>
	</br>
	<label><?php esc_html_e( 'Date', 'uabb' ); ?></label>
	</div>
	<div class="uabb-countdown-custom-fields">
	<select class="text text-full" name="{{name}}_month" >
		<option value="0"><?php esc_html_e( 'Month', 'uabb' ); ?></option>
		<#
		if( 'undefined' != typeof settings.fixed_date_month && settings.fixed_date_month == '01' ) {
			sel = "selected";
		} else {
			sel = "";
		}
		#>
		<option value="01" {{sel}} ><?php esc_html_e( 'Jan', 'uabb' ); ?></option>
		<#
		if( 'undefined' != typeof settings.fixed_date_month && settings.fixed_date_month == '02' ) {
			sel = "selected";
		} else {
			sel = "";
		}
		#>
		<option value="02" {{sel}} ><?php esc_html_e( 'Feb', 'uabb' ); ?></option>
		<#
		if( 'undefined' != typeof settings.fixed_date_month && settings.fixed_date_month == '03' ) {
			sel = "selected";
		} else {
			sel = "";
		}
		#>
		<option value="03" {{sel}} ><?php esc_html_e( 'Mar', 'uabb' ); ?></option>
		<#
		if( 'undefined' != typeof settings.fixed_date_month && settings.fixed_date_month == '04' ) {
			sel = "selected";
		} else {
			sel = "";
		}
		#>
		<option value="04" {{sel}} ><?php esc_html_e( 'Apr', 'uabb' ); ?></option>
		<#
		if( 'undefined' != typeof settings.fixed_date_month && settings.fixed_date_month == '05' ) {
			sel = "selected";
		} else {
			sel = "";
		}
		#>
		<option value="05" {{sel}} ><?php esc_html_e( 'May', 'uabb' ); ?></option>
		<#
		if( 'undefined' != typeof settings.fixed_date_month && settings.fixed_date_month == '06' ) {
			sel = "selected";
		} else {
			sel = "";
		}
		#>
		<option value="06" {{sel}} ><?php esc_html_e( 'Jun', 'uabb' ); ?></option>
		<#
		if( 'undefined' != typeof settings.fixed_date_month && settings.fixed_date_month == '07' ) {
			sel = "selected";
		} else {
			sel = "";
		}
		#>
		<option value="07" {{sel}} ><?php esc_html_e( 'Jul', 'uabb' ); ?></option>
		<#
		if( 'undefined' != typeof settings.fixed_date_month && settings.fixed_date_month == '08' ) {
			sel = "selected";
		} else {
			sel = "";
		}
		#>
		<option value="08" {{sel}} ><?php esc_html_e( 'Aug', 'uabb' ); ?></option>
		<#
		if( 'undefined' != typeof settings.fixed_date_month && settings.fixed_date_month == '09' ) {
			sel = "selected";
		} else {
			sel = "";
		}
		#>
		<option value="09" {{sel}} ><?php esc_html_e( 'Sep', 'uabb' ); ?></option>
		<#
		if( 'undefined' != typeof settings.fixed_date_month && settings.fixed_date_month == '10' ) {
			sel = "selected";
		} else {
			sel = "";
		}
		#>
		<option value="10" {{sel}} ><?php esc_html_e( 'Oct', 'uabb' ); ?></option>
		<#
		if( 'undefined' != typeof settings.fixed_date_month && settings.fixed_date_month == '11' ) {
			sel = "selected";
		} else {
			sel = "";
		}
		#>
		<option value="11" {{sel}} ><?php esc_html_e( 'Nov', 'uabb' ); ?></option>
		<#
		if( 'undefined' != typeof settings.fixed_date_month && settings.fixed_date_month == '12' ) {
			sel = "selected";
		} else {
			sel = "";
		}
		#>
		<option value="12" {{sel}} ><?php esc_html_e( 'Dec', 'uabb' ); ?></option>
	</select>
	</br>
	<label><?php esc_html_e( 'Months', 'uabb' ); ?></label>
</div>

<div class="uabb-countdown-custom-fields">
	<select class="text text-full" name="{{name}}_year" >
		<option value="0"><?php esc_html_e( 'Year', 'uabb' ); ?></option>
		<#
		for ( i = yr; i < yr + 6; i++ ) {
		selected = "";
		if ( settings.fixed_date_year != '' ) {
			if ( i == settings.fixed_date_year ) {
				selected = "selected";
			} else {
				selected = "";
			}
		} else if ( i == yr + 5 ) {
		selected = "selected";
		}
		#>
		<option value="{{i}}" {{selected}}>{{i}}</option>
		<#
		}
		#>
	</select>
	</br>
	<label><?php esc_html_e( 'Years', 'uabb' ); ?></label>
</div>

<div class="uabb-countdown-custom-fields">
	<select class="text text-full" name="{{name}}_hour" >
	<option value="0"><?php esc_html_e( 'Hour', 'uabb' ); ?></option>
	<#
	for ( i = 0; i < 24; i++ ) {
		selected = "";
		if ( '' != settings.fixed_date_hour ) {
			if ( i == settings.fixed_date_hour ) {
				selected = "selected";
			} else {
				selected = "";
			}
		} else if( i == 23 ) {
			selected = "selected";
		}
		if( i <= 9 ) {
		#>
	<option value="{{i}}" {{selected}}>0{{i}}</option>
	<#
	} else {
	#>
	<option value="{{i}}" {{selected}}>{{i}}</option>
	<#
	}
	}
	#>
	</select>
	</br>
	<label><?php esc_html_e( 'Hours', 'uabb' ); ?></label>
</div>
<div class="uabb-countdown-custom-fields">
	<select class="text text-full" name="{{name}}_minutes" >
	<option value="0"><?php esc_html_e( 'Minutes', 'uabb' ); ?></option>
	<#
	for ( i = 0; i < 60; i++ ) {
		selected = "";
		if ( '' != settings.fixed_date_minutes ) {
			if ( i == settings.fixed_date_minutes ) {
				selected = "selected";
			} else {
				selected = "";
			}
		} else if( i == 59 ) {
			selected = "selected";
		}
		if( i <= 9 ) {
		#>
		<option value="{{i}}" {{selected}}>0{{i}}</option>
		<#
		} else {
		#>
		<option value="{{i}}" {{selected}}>{{i}}</option>
		<#
		}
	}
	#>
	</select>
	</br>
	<label><?php esc_html_e( 'Minutes', 'uabb' ); ?></label>
</div>
