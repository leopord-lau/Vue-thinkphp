<template>
<div>
    <el-table :data="tableData.slice((currentPage-1)*pageSize,currentPage*pageSize)" stripe style="width:100%" class="select-form">
        <el-table-column prop="documentNumber" label="出库单据"></el-table-column>
        <el-table-column prop="wareSection" label="货区" width="60px"></el-table-column>   
        <el-table-column prop="wareShelf" label="货架" width="60px;"></el-table-column>
        <el-table-column prop="warePosition" label="货位"></el-table-column>
        <el-table-column prop="cols" label="列" width="50px"></el-table-column>
        <el-table-column prop="rows" label="行" width="50px"></el-table-column>
        <el-table-column prop="materialName" label="物料" width="80px;"></el-table-column>
        <el-table-column prop="batch" label="批次" width="90px;"></el-table-column>
        <el-table-column prop="code" label="条码"></el-table-column>
        <el-table-column prop="number" label="数量" width="90px;"></el-table-column>
        <el-table-column prop="pickoutBatch" label="分拣批次"></el-table-column>
        <el-table-column prop="status" label="状态" :filters="[{text:'已完成',value:'已完成'},{text:'未完成',value:'未完成'}]"
         filter-placement="bottom-end">
            <template slot-scope="scope">
                 <i :class="scope.row.status==='已完成'?'el-icon-success':'el-icon-info'" disable-transitions></i>{{scope.row.status}}
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
        filterButton(value, row, column) {
            const property = column['property'];
            return row[property] === value;
        },
        current_change(currentPage){
            this.currentPage=currentPage
        }
    },
   data(){
        return{
            pageSize:3,
            currentPage:1
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
    .el-icon-success{
        color: green
    }
</style>
