@extends('OwnerPanel.panelLayout')

@section('ownerPanelContent')
    <div id="editData">
        <div class="container">
            <input type="hidden" id="idele" value="{{ Session::get('id') }}" >

            <h2 class="text-center" style="padding-top: 30px;"><span style="color: #1d68a7">Update</span> your WorkSpace Data</h2>
            <p class="text-center lead"><small>Here's you can show what you want the customer to see.</small></p>
            <div class="demo-input-suffix">
            <span class="demo-input-label">Choose a Specific Work Space</span>
                <el-select  v-model="ruleForm.ws_id" placeholder="your WorkSpace"  v-on:change="getData">
                    <el-option v-for="ws in work_spaces"
                               :key="ws.ws_id"
                               :value="ws.ws_id"
                               :label="ws.ws_name"></el-option>
                </el-select>
            </div>
            <br>
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
                <el-form-item label="WS Name" prop="name">
                    <el-col :span="10">
                        <el-input v-model="ruleForm.name"></el-input>
                    </el-col>
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
                        <input @change="readFile()"  type="file" name="img_src" id="img">
                        <small>jpg/jpeg files with a size less than 500kb</small>

                        <div slot="tip" class="el-upload__tip">jpg/png files with a size less than 500kb</div>
                        </el-upload>
                    </el-col>
                </el-form-item>
                <el-form-item label="Description" prop="desc">
                    <el-input type="textarea" v-model="ruleForm.desc"></el-input>
                </el-form-item>
                <el-form-item>
                    <el-button type="warning" @click="submitForm('ruleForm')">Update</el-button>
                    <el-button type="danger" @click="resetForm('ruleForm')">Delete Workspace</el-button>
                </el-form-item>
            </el-form>
        </div>
    </div>
@endsection
@section('ownerPanelScript')
    <script src="{{asset('js/ownerScript/editData.js')}}"></script>
@endsection
