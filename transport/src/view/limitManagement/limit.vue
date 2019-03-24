<template>
    <el-row class="storagebuy">
        <el-col :span="24">
            <el-breadcrumb separator-class="el-icon-arrow-right" class="breadcrumb">
                <el-breadcrumb-item :to="{path:'/'}">首页</el-breadcrumb-item>
                <el-breadcrumb-item>限额管理</el-breadcrumb-item>
                <el-breadcrumb-item>限额管理</el-breadcrumb-item>
            </el-breadcrumb>
        </el-col>
        <el-col class="search-box" :span="24">
        </el-col>
        <el-col :span="24" class="btn-form">
            <el-col :span="24">
                <my-table :tableData="showwhich"></my-table>
            </el-col>
        </el-col>
    </el-row>
</template>

<script>
import myTable from '../../components/basic-info/limit-table'
export default {
    components:{
        myTable
    },
    data(){
        return{
            showwhich:'',
        }
    },
    created(){
        this.alldocument();
    },
    methods:{
        alldocument(){
            this.showwhich=[{
                id:1,department:'财务部',limit:'3225'
            },{
                id:2,department:'仓储部',limit:'1435'
            }]
        }
    }
}
</script>
<style lang="less">
.storagebuy{
    top:0px;width:100%;position: absolute;
    .breadcrumb{
        left:10%;position: absolute;
    }
    .search-box{
        position:absolute;top:25px;background-color:rgba(241, 241, 241, 0.349);height:15px;box-shadow:1px 1px 1px 1px rgb(235, 233, 233);
    }
    .btn-form{
        top:50px;position: absolute;
        .print{
            left:10%;position: absolute
        }
    }
    .el-icon-success{
        color:green
    }
}
</style>
