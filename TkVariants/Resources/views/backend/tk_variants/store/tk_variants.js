Ext.define('Shopware.apps.TkVariants.store.TkVariants', {
    extend: 'Shopware.store.Listing',

    configure: function(){
        return {
            controller: 'TkVariants',
        }
    },

    model: 'Shopware.apps.TkVariants.model.TkVariant'
});