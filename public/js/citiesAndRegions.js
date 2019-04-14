new Vue({
    el: '#citiesAndRegions',
    data:
        {
            tableData3: [{
                date: '2016-05-03',
                name: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036'
            }, {
                date: '2016-05-02',
                name: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036'
            }, {
                date: '2016-05-04',
                name: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036'
            }, {
                date: '2016-05-01',
                name: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036'
            }, {
                date: '2016-05-08',
                name: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036'
            }, {
                date: '2016-05-06',
                name: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036'
            }, {
                date: '2016-05-07',
                name: 'Tom',
                state: 'California',
                city: 'Los Angeles',
                address: 'No. 189, Grove St, Los Angeles',
                zip: 'CA 90036'
            }],
            formInline: {
                city: ''
            },
            labelPosition: 'left',
            formLabelAlign: {
                name: '',
                region: '',
                type: ''
            },
            activate:''
        },
    mounted: function () {
        var self = this;
        // self.auth();
        // self.getContent();
    },
    methods : {
        // auth : function(){
        //     // var check = document.getElementById('idele').value;
        //     if(!check){
        //         throw new Error("Something went badly wrong!");
        //     }
        // },
        getContent: function () {
            var self = this;
            axios.get('/showpending')
                .then(function (response) {
                    console.log(self.tableData);
                    self.tableData = response.data;
                    console.log(self.tableData);

                })
                .catch(function (error) {
                    console.log(error);
                });
        },


    }
});
