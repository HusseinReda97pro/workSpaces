@extends('AdminPanel.panelLayout')

@section('adminPanelContent')
    <div id="citiesAndRegions">
        <input type="hidden" id="idele" value="{{ Session::get('role') }}" >
        <el-row :gutter="20">
            <el-col :span="10"><div class="grid-content bg-purple">
                    <template>
                        <el-table
                            :data="options"
                        >
                            <el-table-column label="Address Info">
                                <el-table-column
                                    prop="city_name"
                                    label="City"
                                    width="180">
                                </el-table-column>
                                <el-table-column
                                    prop="region_name"
                                    label="Region"
                                    width="180">
                                </el-table-column>
                                <el-table-column label="Operations" width="100">
                                    <template slot-scope="scope">
                                        {{--<el-button  size="mini" type="success" ><i class="el-icon-edit"></i>Edit</el-button>--}}
                                        <el-button size="mini" type="danger" @click="dialogVisible = true"><i class="el-icon-delete"></i>Delete</el-button>
                                        <el-dialog
                                            title="Delete Operation"
                                            :visible.sync="dialogVisible"
                                            width="30%"
                                            >
                                            <span>What You Want exactly to Delete .. ? </span>
                                            <span slot="footer" class="dialog-footer">
                                                <el-button type="danger" @click="deleteCity(scope.row.city_id)">the City</el-button>
                                                <el-button type="warning" @click="deleteRegion(scope.row.region_name)">the Region</el-button>
                                              </span>
                                        </el-dialog>
                                    </template>
                                </el-table-column>
                            </el-table-column>
                            </el-table-column>
                        </el-table>
                    </template>
                </div></el-col>
            <el-col :span="10"><div class="grid-content bg-purple">
                    <h1 class="text-center" style="color: #1d68a7 ; padding-top: 20px;">Add City</h1>
                    <el-form :model="ruleForm" :rules="rules" ref="ruleForm" label-width="120px" class="demo-ruleForm">
                        <el-form-item label="City Name" prop="city_name">
                            <el-input v-model="ruleForm.city_name"></el-input>
                        </el-form-item>
                        <el-form-item label="Region Name" prop="region_name">
                            <el-input v-model="ruleForm.region_name"></el-input>
                        </el-form-item>
                        <el-button size="mini" type="primary" @click="submitForm()">Add City</el-button>

                    </el-form>
                    <h1 class="text-center" style="color: #1d68a7 ; padding-top: 20px;">Add Region</h1>
                    <el-form :model="ruleRegionForm" :rules="rules" ref="ruleRegionForm" label-width="120px" class="demo-ruleForm">
                        <el-form-item label="City Name" prop="valueSelected">
                            <el-select v-model="ruleRegionForm.city_id" filterable placeholder="Select">
                                <el-option
                                    v-for="item in options"
                                    :key="item.city_id"
                                    :label="item.city_name"
                                    :value="item.city_id">
                                </el-option>
                            </el-select>
                        </el-form-item>
                        <el-form-item label="Region Name" prop="region_name">
                            <el-input v-model="ruleRegionForm.region_name"></el-input>
                        </el-form-item>
                        <el-button size="mini" type="primary" @click="submitRegionForm()">Add Region</el-button>

                    </el-form>

                </div></el-col>
        </el-row>



    </div>

@endsection
@section('adminPanelScript')
    <script src="{{asset('js/citiesAndRegions.js')}}"></script>
@endsection
