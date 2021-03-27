Ext.define('Shopware.apps.TkVariants.view.list.Window', {
    extend: 'Shopware.window.Listing',
    alias: 'widget.tk-variants-list-window',
    height: 450,
    title: 'Tk Variants',

    configure: function() {
        return {
            listingGrid: 'Shopware.apps.TkVariants.view.list.TkVariants',
            listingStore: 'Shopware.apps.TkVariants.store.TkVariants',
        }
    }
})
