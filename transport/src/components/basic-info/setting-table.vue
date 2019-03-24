<template>
<div>
    <el-table :data="tableData.slice((currentPage-1)*pageSize,currentPage*pageSize)" stripe style="width:100%" class="select-form">
        <el-table-column prop="id" label="序号" fixed width="70px"></el-table-column>
        <el-table-column prop="projectName" label="工程名称" ></el-table-column>
        <el-table-column prop="projectCode" label="工程编号" ></el-table-column>
        <el-table-column prop="projectType" label="工程类别" ></el-table-column>
        <el-table-column prop="financalOrganization" label="财务组织" ></el-table-column>
        <el-table-column prop="createTime" label="创建时间" ></el-table-column>
        <el-table-column prop="status" label="状态" :filters="[{text:'进行中',value:'进行中'},{text:'已完工',value:'已完工'}]"
          :filter-method="filterCheckStatus" filter-placement="bottom-end">
             <template slot-scope="scope">
                 <i :class="scope.row.status==='已完工'?'el-icon-success':'el-icon-info'" disable-transitions></i>{{scope.row.status}}
             </template>
        </el-table-column>
        <el-table-column prop="address" label="地址" ></el-table-column>
        <el-table-column prop="startTime" label="开工时间" ></el-table-column>
        <el-table-column prop="progress" label="进度" >
            <template slot-scope="scope1">
                <el-progress :percentage="scope1.row.progress"></el-progress>
            </template>
        </el-table-column>
        <el-table-column prop="remark" label="备注" ></el-table-column>
        <el-table-column label="操作">
            <template slot-scope="scope">
                <el-button size="mini" type="primary" @click="handleChange(scope.$index, scope.row)">修改</el-button>
                <el-button size="mini" type="primary" @click="handleDelete(scope.$index, scope.row)">删除</el-button>
            </template>
        </el-table-column>
    </el-table>
    <el-pagination class="pagination" layout="prev,pager,next" @current-change="current_change"
        :current-page="currentPage"
        :page-size="pageSize" :total="total" background></el-pagination>
</div>
</template>

<script>
export default {
    props:['tableData','total'],
    data(){
        return{
            scope1:{
                row:{
                    progress:0
                }
            },
            pageSize:3,
            currentPage:1
        }
    },
    methods:{
        filterCheckStatus(value, row, column) {
            const property = column['property'];
            return row[property] === value;
        },
        current_change(currentPage){
            this.currentPage=currentPage
        }
    },
}
</script>

<style lang="less">
    .btn-form{
        left:7%;position: absolute; top:280px;width: 100%;
        .select-btns-left{
            top:0px;position: absolute;width: 400px;
        }
        .select-btns-right{
            top: 0px;position: absolute;width: 400px;left: 55%;
        }
        .select-form{
            top:50px;position: absolute;
        }
        .pagination{
            top:400px;position: absolute;left: 60%;
        }
    }
</style>
