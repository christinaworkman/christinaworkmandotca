(function ($) {

    FLBuilder.addHook('settings-form-init', function () {

        window.uabbPresets = window.uabbPresets || {};
        var form = $('.fl-builder-settings-lightbox .fl-builder-settings'),
            nodeId = form.attr('data-node'),
            parentId = form.closest( '.fl-col' ).attr( 'data-node' ),
            global 	 = form.closest( '.fl-block-overlay-global' ).length > 0
            current_module = form.data('type');
        preset_field = form.find('select.uabb-preset-select').val();

        if (preset_field) {

            if (undefined == window.uabbPresets[current_module]) {

                $.ajax({
                    url: uabb.ajax_url,
                    method: 'GET',
                    data: {
                        action: "uabb_module_presets",
                        current_module: current_module,
                        security: uabb.nonce,
                    }
                }).done(function (result) {
                    if (result.success) {
                        window.uabbPresets[current_module] = JSON.parse(result.data);
                    }
                });
            }

            $('select.uabb-preset-select').on('change', function () {
                var preset = $(this).val();

                if (window.uabbPresets[current_module]) {

                    var preset_data = window.uabbPresets[current_module];

                    if ('none' !== preset) {

                        if (preset_data[preset]) {
                            var merged = $.extend({}, FLBuilderSettingsConfig.nodes[nodeId], preset_data[preset]);

                            merged.preset_select = preset;

                            FLBuilderSettingsConfig.nodes[nodeId] = merged;

                            FLBuilder.ajax({
                                action: 'save_settings',
                                node_id: nodeId,
                                settings: merged
                            }, FLBuilder._saveSettingsComplete.bind(this, true, null));

                            FLBuilder.triggerHook('didSaveNodeSettings', {
                                nodeId: nodeId,
                                settings: merged
                            });

                            FLBuilder._lightbox.close();
                            FLBuilder._showModuleSettings( {
                                type     : current_module,
                                nodeId   : nodeId,
                                parentId : parentId,
                                global   : global
                            } );
                        }
                    } else if ('none' === preset) {
                        var defaultSettings = {},
                            styles = {};

                        var settings = FLBuilder._getSettings(form);

                        for (var key in settings) {

                            arrayInput = form.find('[name*="' + key + '["]'),
                                singleInput = form.find('[name="' + key + '"]'),
                                isStyle = false;

                            if (singleInput.length) {
                                isStyle = singleInput.closest('.fl-field').data('is-style');
                            } else if (arrayInput.length) {
                                isStyle = arrayInput.closest('.fl-field').data('is-style');
                            }

                            if (!isStyle) {
                                styles[key] = settings[key];

                            }

                        }

                        defaultSettings = $.extend({}, FLBuilderSettingsConfig.defaults.modules[current_module], styles);

                        FLBuilder.ajax({
                            action: 'save_settings',
                            node_id: nodeId,
                            settings: defaultSettings
                        }, FLBuilder._saveSettingsComplete.bind(this, true, null));

                        FLBuilder.triggerHook('didSaveNodeSettings', {
                            nodeId: nodeId,
                            settings: defaultSettings
                        });
                        FLBuilder._lightbox.close();
                        FLBuilder._showModuleSettings( {
                            type     : current_module,
                            nodeId   : nodeId,
                            parentId : parentId,
                            global   : global
                        } );
                    }
                }
            });
        }
    });
})(jQuery);