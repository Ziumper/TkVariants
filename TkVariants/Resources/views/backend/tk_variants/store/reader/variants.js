 Ext.define('Shopware.apps.TkVariants.store.reader.Variants',{
    extend: 'Shopware.data.reader.Application',

    type: 'application',
    root: 'data',
    useSimpleAccessors: true,
    totalProperty: 'total',

    readRecords: function (data) {
        var me = this;
        var result = me.callParent([data]);
        result.records = me.addAssociationFieldForOrderNumbers(result.records);
        return result;
    },

    /**
     * The most important part of code that is working for association loaded data
     * extract method for some reason is not working as it should work
     *
     */
    addAssociationFieldForOrderNumbers: function (records) {

        var recordCount = records.length

        for(var i = 0 ; i < recordCount; i++) {
            var singleRecord = records[i];
            var recordData = singleRecord.data;
            var rawData = singleRecord.raw;
            if(recordData && rawData) {
                recordData['ordernumber'] = rawData['number'];
                recordData['number'] = rawData['number'];
            }
        }

        return records;
    }

});