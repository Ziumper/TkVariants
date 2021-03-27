Ext.define('Shopware.apps.TkVariants.store.Variants', {
    extend: 'Shopware.apps.Base.store.Variant',
    proxy: {
        type: 'ajax',
        url: '/shopware/backend/TkVariants/searchAssociation',
        reader: Ext.create('Shopware.apps.TkVariants.store.reader.Variants'),
        extraParams: {
            association: "detail"
        }
    },
});


