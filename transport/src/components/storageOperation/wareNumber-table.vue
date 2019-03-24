<template>
<div>
    <el-table :data="tableData.slice((currentPage-1)*pageSize,currentPage*pageSize)" stripe style="width:100%" class="select-form">
        <el-table-column prop="materialName" width="100px" label="物料名称"></el-table-column>
        <el-table-column prop="batch" label="批次" width="80px"></el-table-column>   
        <el-table-column prop="status" label="状态" :filters="[{text:'缺货',value:'缺货'},{text:'充足',value:'充足'}]"
          :filter-method="filterstatus" filter-placement="bottom-end">
             <template slot-scope="scope">
                 <i :class="scope.row.status==='充足'?'el-icon-success':'el-icon-error'" disable-transitions></i>{{scope.row.status}}
             </template>
        </el-table-column>
        <el-table-column prop="accountNumber" label="账面数量" width="90px"></el-table-column>
        <el-table-column prop="firstCountNumber" label="初盘数量" width="90px"></el-table-column>
        <el-table-column prop="firstCountPerson" label="初盘人员" width="90px"></el-table-column>
        <el-table-column prop="firstCountTime" label="初盘时间"></el-table-column>
        <el-table-column prop="reCountNumber" label="复盘数量" width="90px"></el-table-column>
        <el-table-column prop="reCountPerson" label="复盘人员" width="90px"></el-table-column>
        <el-table-column prop="reCountTime" label="复盘时间"></el-table-column>
        <el-table-column label="操作">
            <template slot-scope="scope">
                <el-button size="mini" type="primary" @click="handleCheck(scope.$index, scope.row)">查看</el-button>
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
    methods:{
        filterCheckStatus(value, row, column) {
            const property = column['property'];
            return row[property] === value;
        },
    },
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
