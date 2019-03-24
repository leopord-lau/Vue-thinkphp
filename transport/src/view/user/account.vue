<template>
    <el-row class="storagebuy">
        <el-col :span="24">
            <el-breadcrumb separator-class="el-icon-arrow-right" class="breadcrumb">
                <el-breadcrumb-item :to="{path:'/'}">首页</el-breadcrumb-item>
                <el-breadcrumb-item>个人中心</el-breadcrumb-item>
            </el-breadcrumb>
        </el-col>
        <el-col class="search-box" :span="24">
        </el-col>
        <el-col :span="24" class="btn-form">
            <el-col :span="24">
                个人信息
                <el-form class="info" size="mini" style="width:300px;">
                    <el-form-item><img src="../../../static/img/asset/location.png" /></el-form-item>
                    <el-form-item label="姓名"><el-input type="text" placeholder="leopord" disabled /></el-form-item>
                    <el-form-item label="联系电话"><el-input type="text" placeholder="123456789" disabled /></el-form-item>
                    <el-form-item label="账户角色"><el-input type="text" placeholder="董事长" disabled /></el-form-item>
                    <el-form-item label="电子邮箱"><el-input type="text" placeholder="2279846752@qq.com" disabled /></el-form-item>
                    <el-form-item label="公司名称"><el-input type="text" placeholder="leopord club" disabled /></el-form-item>
                    <el-form-item label="公司地址"><el-input type="text" placeholder="广州" disabled /></el-form-item>
                    <el-form-item label="公司电话"><el-input type="text" placeholder="123456789" disabled /></el-form-item>
                    <el-form-item style="float:right">
                        <el-button type="primary" @click="update" >修改</el-button>
                    </el-form-item>
                </el-form>
            </el-col>
        </el-col>
    </el-row>
</template>

<script>
export default {
    methods:{
        update(){

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
        top:50px;position: absolute;left:10%;
        .print{
            left:10%;position: absolute
        }
    }
    .el-icon-success{
        color:green
    }
}
</style>
