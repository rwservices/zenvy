import { TextControl, ToggleControl, SelectControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

const General = ({ settings, onSettingsUpdate, isSaving }) => {
    return (
        <div className="zenvy-general-settings">
            <h3>{__('General Settings', 'zenvy')}</h3>
            
            <TextControl
                label={__('Setting 1', 'zenvy')}
                help={__('First text setting description.', 'zenvy')}
                value={settings.setting1 || ''}
                onChange={(value) => onSettingsUpdate('setting1', value)}
                disabled={isSaving}
            />
            
            <TextControl
                label={__('Setting 2', 'zenvy')}
                help={__('Second text setting description.', 'zenvy')}
                value={settings.setting2 || ''}
                onChange={(value) => onSettingsUpdate('setting2', value)}
                disabled={isSaving}
            />
            
            <ToggleControl
                label={__('Enable Setting 3', 'zenvy')}
                help={__('Toggle this setting on or off.', 'zenvy')}
                checked={settings.setting3 || false}
                onChange={(value) => onSettingsUpdate('setting3', value)}
                disabled={isSaving}
            />
            
            <ToggleControl
                label={__('Enable Quiz Block', 'zenvy')}
                help={__('Enable or disable the quiz functionality.', 'zenvy')}
                checked={settings.quiz !== false} // Default is true
                onChange={(value) => onSettingsUpdate('quiz', value)}
                disabled={isSaving}
            />
            
            <SelectControl
                label={__('Option Selection', 'zenvy')}
                value={settings.setting5 || 'option-1'}
                options={[
                    { label: __('Option 1', 'zenvy'), value: 'option-1' },
                    { label: __('Option 2', 'zenvy'), value: 'option-2' },
                ]}
                onChange={(value) => onSettingsUpdate('setting5', value)}
                disabled={isSaving}
            />
        </div>
    );
};

export default General;