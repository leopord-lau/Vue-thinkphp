<template>
<div @mouseenter="enter" @mouseleave="leave">
    
    <el-menu  background-color="#003c79"
    text-color="#fff" router 
    style="border-radius:0 25px 0 0;height:100%;"
     :collapse="isCollapse" mode="vertical">
     <div style="top:20px; height:20px;"></div>
        <el-menu-item index="1">
            <i class="el-icon-document"></i>
            <span slot="title">统计报表</span>
        </el-menu-item>
        <el-submenu index='2'>
            <template slot="title">
                <i class="el-icon-document"></i>
                <span>库存查询</span>
            </template>
            <el-menu-item-group>
            <el-menu-item index="/report/materialquery">> 物料库存</el-menu-item>
            <el-menu-item index="/report/batch">> 批次库存</el-menu-item>
            </el-menu-item-group>
        </el-submenu>
        <el-menu-item index="/report/inventoryalert">
            <i class="el-icon-document"></i>
            <span slot="title">库存预警</span>
        </el-menu-item>
        <el-menu-item index="/report/daysum">
            <i class="el-icon-document"></i>
            <span slot="title">日收发汇总</span>
        </el-menu-item>
        <el-menu-item index="/report/monthsum">
            <i class="el-icon-document"></i>
            <span slot="title">月收发汇总</span>
        </el-menu-item>
        <el-menu-item index="/report/allsum">
            <i class="el-icon-document"></i>
            <span slot="title">收发汇总查询</span>
        </el-menu-item>
        <el-menu-item index="/report/top10">
            <i class="el-icon-location"></i>
            <span slot="title">TOP 10</span>
        </el-menu-item>
        <el-menu-item index="/report/bottom10">
            <i class="el-icon-document"></i>
            <span slot="title">BOTTOM 10</span>
        </el-menu-item>
        <el-menu-item index="/report/batchinventory">
            <i class="el-icon-document"></i>
            <span slot="title">批次库存</span>
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
