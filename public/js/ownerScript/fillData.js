// ELEMENT.locale(ELEMENT.lang.en);
// Vue.use(DataTables);
// Vue.use(DataTables.DataTablesServer);


new Vue({
    el: '#ownerFillData',
    data:
        {
            city:[],
            region:[],
            ruleForm: {
                address: '',
                name:'',
                city: '',
                region: '',
                phone:'',
                phone2:'',
                websiteURL:'',
                image:'',
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
        self.getCities();

    },
    methods : {
        // auth : function(){
        //     // var check = document.getElementById('idele').value;
        //     if(!check){
        //         throw new Error("Something went badly wrong!");
        //     }
        // },
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
        submitForm(formName,id) {
            var self = this ;
            self.ruleForm.owner_id = id ;
            console.log(self.ruleForm);
            this.$refs[formName].validate((valid) => {
                if (valid) {
                    axios.post('/placeData',self.ruleForm)
                        .then(function (response) {
                            console.log(response.data);
                            alert('submit!');
                        })
                        .catch(function (error) {
                            console.log(error);
                        });

                    self.resetForm(formName);
                } else {
                    console.log('error submit!!');
                    return false;
                }
            });
        },
        resetForm(formName) {
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
