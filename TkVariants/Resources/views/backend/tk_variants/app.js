Ext.define('Shopware.apps.TkVariants', {
    extend: 'Enlight.app.SubApplication',

    name: 'Shopware.apps.TkVariants',

    loadPath: '{url action=load}',
    bulkLoad: true,

    controllers: [ 'Main' ],

    views: [
       'list.Window',
       'detail.Window',
       'list.TkVariants',
       'detail.TkVariant'
    ],

    models: [ 'TkVariant'],
    stores: [ 'TkVariants','Variants'],

    launch: function(){
        return this.getController('Main').mainWindow;
    }
});