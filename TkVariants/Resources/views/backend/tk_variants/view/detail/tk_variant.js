Ext.define('Shopware.apps.TkVariants.view.detail.TkVariant', {
    extend: 'Shopware.model.Container',
    alias: 'widget.tk-variants-detail-view',
    padding: 20,

    configure: function () {
        return {
            controller: 'TkVariants',
            fieldSets: [
                {
                   title: "Add new association",
                   fields: {
                       articleId:  {
                           fieldLabel: "Article",
                           allowBlank: false,
                           emptyText: "Choose article",
                           valueField: "id",
                           displayField: "name"
                       },
                       detailId: {
                           fieldLabel: "Variant",
                           allowBlank: false,
                           emptyText: "Choose variant",
                           displayField: "number",
                           valueField: "id",
                           store: Ext.create('Shopware.apps.TkVariants.store.Variants'),
                       }
                   }
                }

            ],
        }
    },







});