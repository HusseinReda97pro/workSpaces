// ELEMENT.locale(ELEMENT.lang.en);
// Vue.use(DataTables);
// Vue.use(DataTables.DataTablesServer);


new Vue({
    el: '#adminShowRequests',
    data:
        {
            tableData: []
        },
    mounted: function () {
        var self = this;
        // self.auth();
        self.getContent();
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
            axios.get('/RequestsData')
                            .then(function (response) {
                                console.log(self.tableData);
                                self.tableData = response.data;
                                console.log(self.tableData);

                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        handleAccept(index, row) {
            var self = this;
            axios.post('/acceptRequest/'+row.id,row)
                .then(function (response) {
                    console.log(response);
                    self.getContent();
                })
                .catch(function (error) {
                    console.log(error);
                });
            // console.log(row['id']);
        },
        handleDelete(index, row) {
            var self = this;
            axios.post('/deleteRequest/'+row.id,row)
                .then(function (response) {
                    console.log(response);
                    self.getContent();
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

    }
});
