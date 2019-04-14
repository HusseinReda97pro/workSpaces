@extends('AdminPanel.panelLayout')

@section('adminPanelContent')
    <div id="citiesAndRegions">
        <el-row :gutter="20">
            <el-col :span="12"><div class="grid-content bg-purple">
                    <template>
                        <el-table
                            :data="tableData3"
                        >
                            <el-table-column label="Address Info">
                                <el-table-column
                                    prop="state"
                                    label="State"
                                    width="150">
                                </el-table-column>
                                <el-table-column
                                    prop="city"
                                    label="City"
                                    width="150">
                                </el-table-column>
                                <el-table-column label="Operations" width="180">
                                    <template slot-scope="scope">
                                        <el-button  size="mini" type="success" >Accept</el-button>
                                        <el-button size="mini" type="danger" >Delete</el-button>
                                    </template>
                                </el-table-column>
                            </el-table-column>
                            </el-table-column>
                        </el-table>
                    </template>
                </div></el-col>
            <el-col :span="10"><div class="grid-content bg-purple">
                    <el-form :label-position="labelPosition" label-width="100px" :model="formLabelAlign">
                        <h1 class="text-center" style="color: #1d68a7 ; padding-top: 20px;">Add City</h1>
                        <el-form-item label="City Name">
                            <el-input v-model="formLabelAlign.name"></el-input>
                        </el-form-item>
                        <el-form-item label="Region Name">
                            <el-input v-model="formLabelAlign.region"></el-input>
                        </el-form-item>
                        <el-button size="mini" type="primary" >Add City</el-button>

                    </el-form>
                    <el-form :label-position="labelPosition" label-width="100px" :model="formLabelAlign">
                        <h1 class="text-center" style="color: #1d68a7 ; padding-top: 20px;">Add Region</h1>
                        {{--DropDown For Cities--}}
                        <el-form-item label="City Name">
                            <el-input v-model="formLabelAlign.name"></el-input>
                        </el-form-item>
                        <el-form-item label="Region Name">
                            <el-input v-model="formLabelAlign.region"></el-input>
                        </el-form-item>
                        <el-button size="mini" type="primary" >Add Region</el-button>

                    </el-form>
                </div></el-col>
        </el-row>



    </div>

@endsection
@section('adminPanelScript')
    <script src="{{asset('js/citiesAndRegions.js')}}"></script>
@endsection
