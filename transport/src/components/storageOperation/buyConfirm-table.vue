<template>
<div>
    <el-table :data="tableData.slice((currentPage-1)*pageSize,currentPage*pageSize)" stripe style="width:100%" class="select-form">
        <el-table-column prop="materialName" label="物料名称"></el-table-column>
        <el-table-column prop="applyCode" label="请购编码"></el-table-column>   
        <el-table-column prop="specs" label="规格"></el-table-column>
        <el-table-column prop="type" label="型号"></el-table-column>
        <el-table-column prop="applyNumber" label="请购数量"></el-table-column>
        <el-table-column prop="applyPerson" label="请购人"></el-table-column>
        <el-table-column prop="projectNumber" label="工程编号"></el-table-column>
        <el-table-column prop="applyTime" label="请购时间"></el-table-column>
        <el-table-column prop="checkePerson" label="审核人"></el-table-column>
        <el-table-column prop="buyStatus" label="采购状态" :filters="[{text:'进行中',value:'进行中'},{text:'已完成',value:'已完成'}]"
          :filter-method="filterCheckStatus" filter-placement="bottom-end">
             <template slot-scope="scope">
                 <i :class="scope.row.checkStatus==='已完成'?'el-icon-success':'el-icon-info'" disable-transitions></i>{{scope.row.checkStatus}}
             </template>
        </el-table-column>
        <el-table-column prop="buyPerson" label="采购人"></el-table-column>
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
    data(){
        return{
            tableData:[],
            total:0,
            pageSize:3,
            currentPage:1
        }
    },
    created(){
        this.$http.get('api/getConfirmBuy').then((res)=>{
            if(res.data.code===1){
                this.tableData=res.data.data;
                this.total=this.tableData.length
            }else{
                this.$message(res.data.msg)
            }
        })
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
    .el-icon-success{
        color: green
    }
</style>
