Ext.define('Shopware.apps.TkVariants.model.TkVariant', {
    extend: 'Shopware.data.Model',

    configure: function () {
        return {
            controller: 'TkVariants',
            detail: 'Shopware.apps.TkVariants.view.detail.TkVariant'
        };
    },

    fields: [
        { name: 'id', type: 'int', useNull: true },
        { name: 'articleId', type: 'int' },
        { name: 'detailId', type:'int' },
    ],

    associations: [
        {
            relation: 'ManyToOne',
            field: 'articleId',
            type: 'hasMany',
            model: 'Shopware.apps.Base.model.Article',
            name: 'getArticle',
            associationKey: 'article'
        },
        {
            relation: 'ManyToOne',
            field: 'detailId',
            type: 'hasMany',
            model: 'Shopware.apps.Base.model.Variant',
            name: 'getDetails',
            associationKey: 'detail'
        }
    ],

});