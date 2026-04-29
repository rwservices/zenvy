import { Button, Spinner } from '@wordpress/components';
import { __ } from '@wordpress/i18n';

const Footer = ({ hasUnsavedChanges, isSaving, onSave, onReset }) => {
    return (
        <div className="zenvy-settings-footer">
            <div className="zenvy-settings-actions">
                <Button
                    isPrimary
                    onClick={onSave}
                    disabled={!hasUnsavedChanges || isSaving}
                >
                    {isSaving ? (
                        <>
                            <Spinner />
                            {__('Saving...', 'zenvy')}
                        </>
                    ) : (
                        __('Save Changes', 'zenvy')
                    )}
                </Button>
                
                <Button
                    isSecondary
                    onClick={onReset}
                    disabled={isSaving}
                >
                    {__('Reset to Defaults', 'zenvy')}
                </Button>
            </div>
            
            {hasUnsavedChanges && !isSaving && (
                <div className="zenvy-settings-unsaved-notice">
                    {__('You have unsaved changes.', 'zenvy')}
                </div>
            )}
        </div>
    );
};

export default Footer;