import { __ } from '@wordpress/i18n';

const Header = () => {
    return (
        <div className="zenvy-settings-header">
            <h1 className="zenvy-settings-title">
                {__('Zenvy Settings', 'zenvy')}
            </h1>
            <p className="zenvy-settings-description">
                {__('Configure your plugin settings here. Changes will be saved automatically when you navigate away from a field.', 'zenvy')}
            </p>
        </div>
    );
};

export default Header;