<template>
<div>
    <el-table :data="tableData.slice((currentPage-1)*pageSize,currentPage*pageSize)" stripe style="width:100%" class="select-form">
        <el-table-column prop="id" label="序号" width="70px;"></el-table-column>
        <el-table-column prop="warePositionCode" label="货位编码" ></el-table-column>
        <el-table-column prop="warePositionName" label="货位名称" width="80px;"></el-table-column>
        <el-table-column prop="status" label="状态" :filters="[{text:'有货',value:'有货'},{text:'停用',value:'停用'}]"
         filter-placement="bottom-end">
            <template slot-scope="scope">
                 <i :class="scope.row.status==='有货'?'el-icon-success':'el-icon-error'" disable-transitions></i>{{scope.row.status}}
             </template>
        </el-table-column>
        <el-table-column prop="wareShelf" label="货架" width="80px;"></el-table-column>
        <el-table-column prop="cols" label="列" width="80px;"></el-table-column>
        <el-table-column prop="rows" label="行" width="100px;"></el-table-column>
        <el-table-column prop="remark" label="备注"></el-table-column>
        <el-table-column label="操作">
            <template slot-scope="scope">
                <el-button size="mini" type="primary" @click="handleChange(scope.$index, scope.row)">修改</el-button>
                <el-button size="mini" type="primary" @click="handleDelete(scope.$index, scope.row)">打印凭条</el-button>
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
            pageSize:3,
            currentPage:1
        }
    },
    methods:{
        current_change(currentPage){
            this.currentPage=currentPage
        }
    }
}
</script>

<style lang="less">
    .el-icon-success{
        color: green
    }
    .el-icon-error{
        color: red
    }
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
