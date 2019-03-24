<template>
<div>
    <el-table :data="tableData.slice((currentPage-1)*pageSize,currentPage*pageSize)" stripe style="width:100%" class="select-form">
        <el-table-column prop="id" label="序号"></el-table-column>
        <el-table-column prop="department" label="部门"></el-table-column>
        <el-table-column prop="limit" label="年预算限额"></el-table-column>
        <el-table-column label="操作">
            <template slot-scope="scope">
                <el-button size="mini" type="primary" @click="handleClick(scope.$index, scope.row)">查看</el-button>
            </template>
        </el-table-column>
    </el-table>
    <el-pagination layout="prev,pager,next" @current-change="current_change"
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
        this.$http.get('api/getLimit').then((res)=>{
            if(res.data.code===1){
                this.tableData=res.data.data;
                this.total=this.tableData.length
            }else{
                this.$message(res.data.msg)
            }
        })
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
    }
</style>
