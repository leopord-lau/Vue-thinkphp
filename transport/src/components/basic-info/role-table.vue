<template>
<div>
    <el-table :data="tableData.slice((currentPage-1)*pageSize,currentPage*pageSize)" stripe style="width:100%" class="select-form">
        <el-table-column prop="id" label="序号"></el-table-column>
        <el-table-column prop="roleName" label="角色名称" ></el-table-column>
        <el-table-column prop="roleLevel" label="角色级别"></el-table-column>
        <el-table-column prop="superRoleId" label="上级角色ID" ></el-table-column>
        <el-table-column prop="roleDescription" label="角色描述" ></el-table-column>
        <el-table-column prop="belongInstitude" label="所属机构"></el-table-column>
        <el-table-column prop="createTime" label="创建时间" ></el-table-column>
        <el-table-column label="操作">
            <template slot-scope="scope">
                <el-button size="mini" type="primary" @click="handleClick(scope.$index, scope.row)">查看</el-button>
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
        this.$http.get('api/getRole').then((res)=>{
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
