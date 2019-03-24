<template>
<div>
    <el-table :data="tableData.slice((currentPage-1)*pageSize,currentPage*pageSize)" stripe style="width:100%" class="select-form">
        <el-table-column prop="materialName" label="物料名称"></el-table-column>
        <el-table-column prop="specs" label="规格" ></el-table-column>
        <el-table-column prop="beginNumber" label="开始库存"></el-table-column>
        <el-table-column prop="instoreNumber" label="入库数量" ></el-table-column>
        <el-table-column prop="outstoreNumber" label="出库数量"></el-table-column>
        <el-table-column prop="endNumber" label="结束库存" ></el-table-column>
        <el-table-column prop="damageNumber" label="损益量"></el-table-column>
        <el-table-column prop="unitName" label="单位"></el-table-column>
        <el-table-column prop="beginTime" label="开始时间" ></el-table-column>
        <el-table-column prop="endTime" label="结束时间"></el-table-column>
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
        this.$http.get('api/getSumup').then((res)=>{
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
</style>
