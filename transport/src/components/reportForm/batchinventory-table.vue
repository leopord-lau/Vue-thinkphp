<template>
<div>
    <el-table :data="tableData.slice((currentPage-1)*pageSize,currentPage*pageSize)" stripe style="width:100%" class="select-form">
        <el-table-column prop="inventoryName" label="仓库"></el-table-column>
        <el-table-column prop="loader" label="货主" ></el-table-column>
        <el-table-column prop="materialName" label="物料名称" ></el-table-column>
        <el-table-column prop="batch" label="批次"></el-table-column>
        <el-table-column prop="number" label="数量" ></el-table-column>
        <el-table-column prop="unit" label="单位"></el-table-column>
        <el-table-column label="操作">
            <template slot-scope="scope">
                <el-button size="mini" type="primary" @click="handleprint(scope.$index, scope.row)">打印条码</el-button>
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
