<template>
<div @mouseenter="enter" @mouseleave="leave">
    
    <el-menu  background-color="#003c79"
    text-color="#fff" router
    style="border-radius:0 25px 0 0;height:100%;"
     :collapse="isCollapse" mode="vertical">
     <div style="top:20px; height:20px;"></div>
        <el-submenu index='1'>
            <template slot="title">
                <i class="el-icon-document"></i>
                <span>组织机构</span>
            </template>
            <el-menu-item-group>
            <el-menu-item index="1-1">> 机构管理</el-menu-item>
            <el-menu-item index="/basic/department">> 部门管理</el-menu-item>
            <el-menu-item index="/basic/loader">> 货主管理</el-menu-item>
            <el-menu-item index="/basic/supplier">> 供应商管理</el-menu-item>
            <el-menu-item index="/basic/client">> 客户管理</el-menu-item>
            </el-menu-item-group>
        </el-submenu>
        <el-submenu index='2'>
            <template slot="title">
                <i class="el-icon-document"></i>
                <span>仓库管理</span>
            </template>
            <el-menu-item-group>
            <el-menu-item index="/basic/warehouse">> 仓库设置</el-menu-item>
            <el-menu-item index="/basic/waresection">> 货区设置</el-menu-item>
            <el-menu-item index="/basic/wareshelf">> 货架设置</el-menu-item>
            <el-menu-item index="/basic/warepositionsetting">> 货位设置</el-menu-item>
            <el-menu-item index="/basic/tray">> 托盘管理</el-menu-item>
            </el-menu-item-group>
        </el-submenu>
        <el-submenu index='3'>
            <template slot="title">
                <i class="el-icon-document"></i>
                <span>物料管理</span>
            </template>
            <el-menu-item index="/basic/material">> 物料设置</el-menu-item>
            <el-menu-item index="/basic/kind">> 物料种类</el-menu-item>
            <el-menu-item index="/basic/unit">> 单位设置</el-menu-item>
        </el-submenu>
        <el-submenu index='4'>
            <template slot="title">
                <i class="el-icon-document"></i>
                <span>财务设置</span>
            </template>
            <el-menu-item index="/basic/currency">> 国家货币</el-menu-item>
            <el-menu-item index="/basic/exchangeRate">> 汇率设置</el-menu-item>
        </el-submenu>
        <el-submenu index='5'>
            <template slot="title">
                <i class="el-icon-setting"></i>
                <span>工程管理</span>
            </template>
            <el-menu-item index="/basic/setting">> 工程设置</el-menu-item>
            <el-menu-item index="/basic/series">> 工程系列</el-menu-item>
            <el-menu-item index="/basic/attribute">> 工程属性</el-menu-item>
        </el-submenu>
        <el-submenu index='6'>
            <template slot="title">
                <i class="el-icon-document"></i>
                <span>用户管理</span>
            </template>
            <el-menu-item index="/basic/account">> 账户管理</el-menu-item>
            <el-menu-item index="/basic/role">> 角色管理</el-menu-item>
        </el-submenu>
        <el-menu-item index="/basic/examine">
            <i class="el-icon-location"></i>
            <span slot="title">审核管理</span>
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
