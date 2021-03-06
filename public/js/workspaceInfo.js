new Vue({
    el: '#workspaceInfo',
    data:
        {
            city:[],
            region:[],
            workspaces : [],
            searchRegion :{
                city_id: '',
                region_id:''
            },
            name: '',
            dialogVisible: false ,
            user:{
                mail:'',
                ws_id:''
            }

        },
        mounted: function () {
            var self = this;
            self.getContent();
            self.getCities();
        },
    methods : {
        getContent () {
            var self = this;
            axios.get('/RequestWorkspaces')
                .then(function (response) {
                    self.workspaces = response.data;
                    console.log(self.workspaces);

                })
                .catch(function (error) {
                    console.log(error);
                });

        },
        getCities(){
            var self = this ;
            axios.get('/requestCity')
                .then(function (response) {
                    console.log(response.data);
                    self.city = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        onChange(){
            var self = this ;
            axios.get('/requestRegion/'+self.searchRegion.city_id)
                .then(function (response) {
                    console.log(response.data);
                    self.region = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        searchByRegion(){
            var self = this ;
            axios.post('/searchWorkspaceRegion',self.searchRegion)
                .then(function (response) {
                    self.workspaces = response.data;
                    console.log(self.workspaces);

                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        searchByName(){
            var self = this ;
            axios.get('/searchWorkspaceName/'+self.name)
                .then(function (response) {
                    self.workspaces = response.data;
                    console.log(self.workspaces);

                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        mailSuccess() {
            this.$notify({
                title: 'Success',
                message: 'Check your Mailbox to see our Mail',
                type: 'success'
            });
        },
        userMail(ws_id){
            var self = this ;
            self.user.ws_id = ws_id;
            self.dialogVisible = true ;
        },
        sendmail(){
            var self = this ;
            axios.post('/userSeeDetails',self.user)
                .then(function (response) {
                    console.log(response);
                    self.mailSuccess();
                    self.dialogVisible = false ;
                })
                .catch(function (error) {
                    console.log(error);
                });
        }

    }
});
