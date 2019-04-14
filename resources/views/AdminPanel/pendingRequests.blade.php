@extends('AdminPanel.panelLayout')

@section('adminPanelContent')
    <div id="adminShowRequests">
{{--Table--}}
        <template>
            <el-table :data="tableData" style="width: 100%">
                <el-table-column label="Date" width="180">
                    <template slot-scope="scope">
                        <i class="el-icon-time"></i>
                        <span style="margin-left: 10px">@{{ scope.row.created_at }}</span>
                    </template>
                </el-table-column>
                <el-table-column
                    prop="user_name"
                    label="Name"
                    >
                </el-table-column>
                <el-table-column
                    prop="email"
                    label="E-Mail"
                    >
                </el-table-column>
                <el-table-column
                    prop="user_phone"
                    label="Phone"
                    width="180">
                </el-table-column>
                <el-table-column label="Name" width="180">
                    <template slot-scope="scope">
                        <el-popover trigger="hover" placement="top">
                            <p>Name: @{{ scope.row.commercial_register }}</p>

                            <div slot="reference" class="name-wrapper">
                                <el-tag size="medium">@{{ scope.row.user_name }}</el-tag>
                            </div>
                        </el-popover>
                    </template>
                </el-table-column>
                <el-table-column label="Operations">
                    <el-button
                        slot-scope="scope"
                        size="mini"
                        @click="handleActivation( scope.row)"
                        :type="scope.row.activate === 1 ? 'danger' : 'primary'"
                    >

                        <span v-if="scope.row.activate === 1">Deactivate</span>
                        <span v-else>Activate</span>

                    </el-button>
                </el-table-column>
            </el-table>
        </template>

    </div>

@endsection
@section('adminPanelScript')
    <script src="{{asset('js/pendingRequests.js')}}"></script>
    @endsection
