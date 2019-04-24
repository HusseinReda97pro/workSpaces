@extends('OwnerPanel.panelLayout')

@section('ownerPanelContent')
    <div id="ownerFillData">
        <div class="container">
            <h2 class="text-center" style="padding-top: 30px;">Fill your WorkSpace Data</h2>
            <p class="text-center lead"><small>Here's you can show what you want the customer to see.</small></p>
            <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="120px" class="demo-ruleForm">
                <el-form-item label="Activity zone" prop="region">
                    <el-select v-model="ruleForm.region" placeholder="City">
                        <el-option label="Zone one" value="shanghai"></el-option>
                        <el-option label="Zone two" value="beijing"></el-option>
                    </el-select>
                    <el-select v-model="ruleForm.region" placeholder="Region">
                        <el-option label="Zone one" value="shanghai"></el-option>
                        <el-option label="Zone two" value="beijing"></el-option>
                    </el-select>
                </el-form-item>
                <el-form-item label="Address" prop="name">
                    <el-col :span="10">
                    <el-input v-model="ruleForm.name"></el-input>
                    </el-col>
                </el-form-item>
                <el-form-item label="Phone" prop="name">
                    <el-col :span="6">
                    <el-input v-model="ruleForm.name"></el-input>
                    </el-col>
                </el-form-item>
                <el-form-item label="Phone" prop="name">
                    <el-col :span="6">
                        <el-input v-model="ruleForm.name"></el-input>
                    </el-col>
                </el-form-item>
                <el-form-item label="Website URL" prop="name">
                    <el-col :span="6">
                        <el-input v-model="ruleForm.name"></el-input>
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
                        :file-list="fileList">
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
