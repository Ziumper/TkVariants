Ext.define('Shopware.apps.TkVariants.view.list.TkVariants', {
    extend: 'Shopware.grid.Panel',
    alias: 'widget.tk-variants-listing-grid',
    region: 'center',

    configure: function() {
       var me = this;
        return {
            detailWindow: 'Shopware.apps.TkVariants.view.detail.Window',
            eventAlias: 'tk-variants-listing-grid',
            columns: {
               articleId: me.createArticleColumn,
               detailId: me.createDetailColumn
            }
        };
    },

    createDetailColumn:  function(model, column) {
        column.header = "Variant";
        column.renderer =  function (value,metaData,record) {
            var number = record.raw.detail.number;
            if(number) return number;
            return value;
        };
        
        return column;
    },

    createArticleColumn: function(model,column) {
        column.header = "Article";
        return column;
    }

});