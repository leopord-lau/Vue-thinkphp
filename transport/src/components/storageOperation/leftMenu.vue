<template>
<div @mouseenter="enter" @mouseleave="leave">
    <el-menu router  background-color="#003c79"
    text-color="#fff"
    style="border-radius:0 25px 0 0;height:100%;"
     :collapse="isCollapse" mode="vertical">
        <el-menu-item  index="/homepage" style="top:20px; height:90px;">
            <i class="el-icon-menu"></i>
            <span slot="title" >首页</span>
        </el-menu-item>
        <el-submenu index='2'>
            <template slot="title">
                <i class="el-icon-document"></i>
                <span>请购作业</span>
            </template>
            <el-menu-item-group>
            <el-menu-item  index="/storagebuy">> 库备请购</el-menu-item>
            <el-menu-item index="/buycheck">> 请购审核</el-menu-item>
            <el-menu-item index="/buyconfirm">> 采购确认</el-menu-item>
            </el-menu-item-group>
        </el-submenu>
        <el-submenu index='3'>
            <template slot="title">
                <i class="el-icon-document"></i>
                <span>入库作业</span>
            </template>
            <el-menu-item index="/buyinstorage">> 采购入库</el-menu-item>
            <el-menu-item index="/instoragecheck">> 入库验收</el-menu-item>
        </el-submenu>
        <el-submenu index='4'>
            <template slot="title">
                <i class="el-icon-document"></i>
                <span>出库作业</span>
            </template>
            <el-menu-item index="/outstoragemanagement">> 出库单</el-menu-item>
            <el-menu-item index="/pickouttask">> 拣货任务</el-menu-item>
        </el-submenu>
        <el-submenu index='5'>
            <template slot="title">
                <i class="el-icon-setting"></i>
                <span>库内管理</span>
            </template>
            <el-menu-item index="/borrowreturn">> 借还管理</el-menu-item>
            <el-menu-item index="/damagemanagement">> 报损管理</el-menu-item>
            <el-menu-item index="/adjustmanagement">> 调拨管理</el-menu-item>
        </el-submenu>
        <el-submenu index='6'>
            <template slot="title">
                <i class="el-icon-document"></i>
                <span>盘点作业</span>
            </template>
            <el-menu-item index="/wareposition">> 货位盘点</el-menu-item>
            <el-menu-item index="/warenumber">> 库存盘点</el-menu-item>
        </el-submenu>
        <el-menu-item index="7">
            <i class="el-icon-location"></i>
            <span slot="title">货位一览</span>
        </el-menu-item>
    </el-menu>
</div>
</template>

<script>
export default {
    data(){
        return{
            isCollapse:true
        }
    },
    methods: {
        handleOpen(key, keyPath) {
            console.log(key, keyPath);
        },
        handleClose(key, keyPath) {
            console.log(key, keyPath);
        },
        enter(){
            this.isCollapse=false;
        },
        leave(){
            this.isCollapse=true;
        }

    }
}
</script>

<style lang="less">
div .del-menu-vertical-demo{
    background-color:#003c79;
    border-radius:30px;
    @text-color:#fff;
    @active-text-color:#8bcbff
}
</style>
