new Vue({
    el: '#citiesAndRegions',
    data:
        {
            tableData3 : [],
            ruleForm: {
                city_name: '',
                region_name: '',
            },
            rules: {
                city_name: [
                    {required: true, message: 'Please input City Name', trigger: 'blur'},
                    {min: 3, max: 20, message: 'Length should be 3 to 20', trigger: 'blur'}
                ],
                region_name: [
                    {required: true, message: 'Please select Activity zone', trigger: 'change'}
                ]
            },
            activate:''  ,
        // Region
            options: [],
            ruleRegionForm: {
                city_id: '' ,
                region_name: ''
            },
            dialogVisible: false
        },
    mounted: function () {
        var self = this;
        // self.auth();
        self.showCities();
    },
    methods : {
        // auth : function(){
        //     // var check = document.getElementById('idele').value;
        //     if(!check){
        //         throw new Error("Something went badly wrong!");
        //     }
        // },
        showCities: function () {
            var self = this;
            axios.get('/showCities')
                .then(function (response) {
                    console.log(response.data);
                    self.options = response.data;
                    console.log(self.options);

                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        submitForm() {
            var self = this ;
            axios.post('/addCity',self.ruleForm)
                .then(function (response) {
                    self.ruleForm.city_name = '';
                    self.ruleForm.region_name = '';
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        submitRegionForm() {
            var self = this ;
            axios.post('/addRegion',self.ruleRegionForm)
                .then(function (response) {
                    self.ruleRegionForm.city_id = '';
                    self.ruleRegionForm.region_name = '';
                    console.log(response.data);
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        deleteCity(city_id) {
            var self = this ;
            console.log(city_id);
            axios.post('/deleteCity/'+city_id)
                .then(function (response) {
                    console.log(response.data);
                    self.dialogVisible = false ;
                    self.showCities() ;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        deleteRegion(region_name) {
            var self = this ;
            console.log(region_name);
            axios.post('/deleteRegion/'+region_name)
                .then(function (response) {
                    console.log(response.data);
                    self.dialogVisible = false ;
                    self.showCities() ;
                })
                .catch(function (error) {
                    console.log(error);
                });
        }


    }
});
