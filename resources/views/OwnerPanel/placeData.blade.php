@extends('OwnerPanel.panelLayout')

@section('ownerPanelContent')
    <div id="ownerFillData">
        <div class="container">
            <h2 class="text-center" style="padding-top: 30px;">Fill your WorkSpace Data</h2>
            <p class="text-center lead"><small>Here's you can show what you want the customer to see.</small></p>
            <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="120px" class="demo-ruleForm">
                <el-form-item label="Activity zone" prop="city">
                    <el-select v-model="ruleForm.city" placeholder="City"  v-on:change="onChange">
                        <el-option v-for="city in city"
                                   :key="city.city_id"
                                   :value="city.city_id"
                                   :label="city.city_name"></el-option>
                    </el-select>
                    <el-select v-model="ruleForm.region" placeholder="Region">
                        <el-option v-for="region in region"
                                   :key="region.region_id"
                                   :value="region.region_id"
                                   :label="region.region_name"></el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="Address" prop="address">
                    <el-col :span="10">
                    <el-input v-model="ruleForm.address"></el-input>
                    </el-col>
                </el-form-item>
                <el-form-item label="Phone" prop="phone">
                    <el-col :span="6">
                    <el-input v-model="ruleForm.phone"></el-input>
                    </el-col>
                </el-form-item>
                <el-form-item label="Phone" prop="phone2">
                    <el-col :span="6">
                        <el-input v-model="ruleForm.phone2"></el-input>
                    </el-col>
                </el-form-item>
                <el-form-item label="Website URL" prop="websiteURL">
                    <el-col :span="6">
                        <el-input v-model="ruleForm.websiteURL"></el-input>
                    </el-col>
                </el-form-item>
                <el-form-item label="Place images">
                    <el-col :span="6">
                    <el-upload
                        class="upload-demo"
                        action="https://jsonplaceholder.typicode.com/posts/"
                        :on-preview="handlePreview"
                        :on-remove="handleRemove"
                        :before-remove="beforeRemove"
                        multiple
                        :limit="3"
                        :on-exceed="handleExceed"
                        :file-list="ruleForm.fileList">
                        <el-button size="small" type="success">Click to upload</el-button>
                        <div slot="tip" class="el-upload__tip">jpg/png files with a size less than 500kb</div>
                    </el-upload>
                    </el-col>
                </el-form-item>
                <el-form-item label="Description" prop="desc">
                    <el-input type="textarea" v-model="ruleForm.desc"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button type="primary" @click="submitForm('ruleForm')">Create</el-button>
                    <el-button @click="resetForm('ruleForm')">Reset</el-button>
                </el-form-item>
            </el-form>
        </div>

    </div>
@endsection
@section('ownerPanelScript')
    <script src="{{asset('js/ownerScript/fillData.js')}}"></script>
@endsection
