// ELEMENT.locale(ELEMENT.lang.en);
// Vue.use(DataTables);
// Vue.use(DataTables.DataTablesServer);


new Vue({
    el: '#editData',
    data:
        {
            user_id : document.getElementById('idele').value ,
            work_spaces : [] ,
            city:[],
            region:[],
            ruleForm: {
                ws_id:'',
                address: '',
                name:'',
                city: '',
                region: '',
                phone:'',
                phone2:'',
                websiteURL:'',
                image:'',
                oldImage:'',
                desc: '',
                owner_id:''
            },
            rules: {
                name: [
                    { required: true, message: 'Please input Activity name', trigger: 'blur' },
                    { min:3, max: 25, message: 'Length should be 3 to 25', trigger: 'blur' }
                ],
                address: [
                    { required: true, message: 'Please input address details', trigger: 'blur' },
                    { min: 20, max: 255, message: 'Length should be 20 to 255', trigger: 'blur' }
                ],
                city: [
                    { required: true, message: 'Please select Activity zone', trigger: 'change' }
                ],
                region: [
                    { required: true, message: 'Please select Activity zone', trigger: 'change' }
                ],
                phone: [
                    { required: true, message: 'Please write your phone', trigger: 'change' },
                    { min: 10, max: 15, message: 'Please write a correct phone', trigger: 'blur' }
                ],

                websiteURL: [
                    {required: true, message: 'Please write your website URL or FacebookPage', trigger: 'change' }
                ],
                image: [
                    {  required: true, message: 'Please select image', trigger: 'change' }
                ],
                desc: [
                    { required: true, message: 'Please input Activity name', trigger: 'blur' },
                    { min: 20, max: 255, message: 'Length should be 20 to 255', trigger: 'blur' }
                ]
            }


        },
    mounted: function () {
        var self = this;
        self.auth();
        self.getWS();
        self.getCities();

    },
    methods : {
        auth() {
            var check = document.getElementById('idele').value;
            if(!check){
                throw new Error("Something went badly wrong!");
            }
        },
        readFile() {
            var self = this
            console.log($('#img'))
            if ($('#img')[0].files && $('#img')[0].files[0]) {
                var FR = new FileReader();
                FR.addEventListener("load", (e) => {
                    self.ruleForm.image = e.target.result;
                });
                FR.readAsDataURL($('#img')[0].files[0]);
            }
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
        getWS(){
            var self = this ;
            axios.get('/getWS/'+self.user_id)
                .then(function (response) {
                    console.log(response.data);
                    self.work_spaces = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        getData(){
            var self = this ;

            axios.get('/getPlaceData/'+self.ruleForm.ws_id)
                .then(function (response) {
                    console.log(response.data);
                    self.ruleForm.name = response.data[0].ws_name;
                    self.ruleForm.address = response.data[0].ws_address;
                    // self.ruleForm.city = response.data[0].ws_city_id;
                    // self.ruleForm.region = response.data[0].region_id;
                    self.ruleForm.desc = response.data[0].description;
                    self.ruleForm.phone = response.data[0].phone_number;
                    self.ruleForm.phone2 = response.data[0].phone_number;
                    self.ruleForm.websiteURL = response.data[0].website;
                    self.ruleForm.oldImage = response.data[0].img_url;
                    self.ruleForm.owner_id =self.user_id;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
        update() {
            this.$notify({
                title: 'Success',
                message: 'your data has been updated',
                type: 'success'
            });
        },
        delete() {
            this.$notify({
                title: 'Success',
                message: 'your data has been deleted',
                type: 'danger'
            });
        },
        submitForm(formName) {
            var self = this ;
            console.log(self.ruleForm);
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    axios.post('/updatePlaceData',self.ruleForm)
                        .then(function (response) {
                            console.log(response.data);
                            self.update();
                        })
                        .catch(function (error) {
                            console.log(error);
                        });

                    // self.resetForm(formName);
                } else {
                    console.log('error submit!!');
                    return false;
                }
            });
        },
        resetForm(formName) {
            var self = this ;
            axios.post('/deleteWS/'+self.ruleForm.ws_id)
                .then(function (response) {
                    console.log(response.data);
                    self.update();
                })
                .catch(function (error) {
                    console.log(error);
                });
            this.$refs[formName].resetFields();

        },
        //    file Upload
        handleRemove(file, fileList) {
            console.log(file, fileList);
        },
        handlePreview(file) {
            console.log(file);
        },
        handleExceed(files, fileList) {
            this.$message.warning(`The limit is 3, you selected ${files.length} files this time, add up to ${files.length + fileList.length} totally`);
        },
        beforeRemove(file, fileList) {
            return this.$confirm(`Cancel the transfert of ${ file.name } ?`);
        },
        onChange(){
            var self = this ;
            axios.get('/requestRegion/'+self.ruleForm.city)
                .then(function (response) {
                    console.log(response.data);
                    self.region = response.data;
                })
                .catch(function (error) {
                    console.log(error);
                });
        }



    }
});
