<template>
<div>
    <el-table :data="tableData.slice((currentPage-1)*pageSize,currentPage*pageSize)" stripe style="width:100%" class="select-form">
        <el-table-column prop="id" label="序号" width="60px;"></el-table-column>
        <el-table-column prop="materialName" label="物料名称"></el-table-column>
        <el-table-column prop="applyPerson" label="请购人"></el-table-column>
        <el-table-column prop="applyNumber" label="请购数量"></el-table-column>
        <el-table-column prop="applyinventory" label="请购仓库"></el-table-column>
        <el-table-column prop="projectNumber" label="工程编号"></el-table-column>
        <el-table-column prop="applyTime" label="请购时间"></el-table-column>
        <el-table-column prop="checkName" label="审核人"></el-table-column>
        <el-table-column prop="checkTime" label="审核时间"></el-table-column>
        <el-table-column prop="buyTime" label="采购时间"></el-table-column>
        <el-table-column prop="receivePerson" label="收料人"></el-table-column>
        <el-table-column prop="receiveTime" label="到货时间"></el-table-column>
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
