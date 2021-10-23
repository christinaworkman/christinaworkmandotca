(function($){

    FLBuilder.registerModuleHelper('uabb-timeline', {

        init: function() {
            var form        = $('.fl-builder-settings'),
                layout = form.find('select[name=layout]'),
                post_type = form.find('select[name=post_type]'),
                show_card_arrow = form.find('select[name=show_card_arrow]'),
                arrow_pos = form.find('select[name=arrow_pos]'),
                total_posts_switch  = form.find('select[name=total_posts_switch]'),
                order_by = form.find('select[name=order_by]'),
                pagination = form.find('select[name=infinite_load]');

            layout.on('change',$.proxy( this._toggleLayout, this ));
            show_card_arrow.on('change',$.proxy( this._toggleLayout, this ));
            pagination.on('change', $.proxy( this._togglePagination, this ) );
            total_posts_switch.on('change', $.proxy( this._toggle, this ) );
            order_by.on('change',$.proxy( this._selectionOrder, this ));
            post_type.on('change', $.proxy( this._toggleFilter, this ) );

            this._toggleLayout();
            this._togglePagination();
            this._hideDocs();
            this._toggle();
            this._selectionOrder();
            this._toggleFilter();
        },

        _toggleLayout: function() {
            var form        = $('.fl-builder-settings'),
                layout = form.find('select[name=layout]').val(),
                show_card_arrow = form.find('select[name=show_card_arrow]').val(),
                arrow_pos = form.find('select[name=arrow_pos]').val(),
                arrow_pos_field = form.find('#fl-field-arrow_pos');

            if( layout == 'vertical' ) {
                if( show_card_arrow == 'yes' ) {
                    arrow_pos_field.show();
                } else {
                    arrow_pos_field.hide();
                }
            } else if( layout == 'horizontal' ) {
                arrow_pos_field.hide();
            }
        },

        _togglePagination: function() {

            var form        = $('.fl-builder-settings'),
            layout = form.find('select[name=layout]').val(),
            content_type = form.find('select[name=content_type]').val(),
            pagination = form.find('select[name=infinite_load]').val(),
            total_posts_switch = form.find('#fl-field-total_posts_switch'),
            total_posts = form.find('#fl-field-total_posts');
            if( 'posts' == content_type && 'vertical' == layout && pagination == 'yes' ) {
                total_posts_switch.hide();
                total_posts.hide();
            }
            else if( 'posts' == content_type && 'vertical' == layout && pagination == 'no' ) {
                total_posts_switch.show();
                total_posts.show();
            }
        },

        _toggle: function() {
            var form        = $('.fl-builder-settings'),
                total_posts_switch    = form.find('select[name=total_posts_switch]').val(),
                data_source = form.find('select[name=data_source]').val(),
                total_posts_field = form.find('#fl-field-total_posts');

            if( total_posts_switch == 'all' ) {
                total_posts_field.hide();
            } else {
                total_posts_field.show();
            }
        },

        _selectionOrder: function() {
            var form        = $('.fl-builder-settings'),
            order_by = form.find('select[name=order_by]').val(),
            order_field = form.find('#fl-field-order');

            if ( 'post__in' === order_by ) {
                order_field.hide();
            } else {
                order_field.show();
            }
        },

        _toggleFilter: function() {

            var form = $('.fl-builder-settings'),
                post_type = form.find('select[name=post_type]').val();
                form.find('.fl-loop-builder-filter').hide();
                form.find('.fl-loop-builder-' + post_type + '-filter').show();
        },

        /**
         * Branding is on hide the Docs Tab.
         *
         * @since 1.33.0
        */
        _hideDocs: function() {
            var form            = $('.fl-builder-settings'),
            branding_selector   = form.find('#fl-field-uabb_helpful_information .uabb-docs-list'),
            settings_tab        = form.find('.fl-builder-settings-tabs'),
            get_anchor          = settings_tab.find('a'),
            $this               = $( this );

            $( get_anchor ).each(function() {

                if ( '#fl-builder-settings-tab-uabb_docs' === $this.attr('href') ) {

                    if ( 'yes' === branding_selector.data('branding') ) {
                        $this.hide();
                    } else {
                        $this.show();
                    }
                }
            });
        },
    });

})(jQuery);