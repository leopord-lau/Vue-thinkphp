<template>
    <el-row class="storagebuy">
        <el-col :span="24">
            <el-breadcrumb separator-class="el-icon-arrow-right" class="breadcrumb">
                <el-breadcrumb-item :to="{path:'/'}">首页</el-breadcrumb-item>
                <el-breadcrumb-item>基础设置</el-breadcrumb-item>
                <el-breadcrumb-item>采购确认</el-breadcrumb-item>
            </el-breadcrumb>
        </el-col>
        <el-col class="search-box" :span="24">
            <div class="search-container">
            <div class="demo-search">关键字查询（模糊查询）：
                <el-input v-model="keywords" size="small"></el-input>
            </div>
            <div  class="demo-search">请购单号：
                <el-input v-model="buyNumber" size="small"></el-input>
            </div>
            <div class="demo-search">工程：
                <el-input v-model="project" size="small"> </el-input>
            </div>
            <div class="demo-time">请购时间：
                <el-date-picker v-model="time1"  type="date"></el-date-picker>
                -
                <el-date-picker v-model="time2" type="date"></el-date-picker>
            </div>
            <div class="btns">
                <el-button type="primary" size="small" @click="search" plain>查询</el-button>
                <el-button type="primary" size="small" @click="clear" plain>清空</el-button>
                <el-button type="primary" size="small" @click="more" plain>更多</el-button>
            </div>
            </div>
        </el-col>
        <el-col :span="24" class="btn-form">
            <el-col :span="4" class="select-btns-left">
                <el-badge :value="waithandle" class="alldoc">
                    <el-button type="primary"  @click="allwaitdeal" plain>全部待处理</el-button>
                </el-badge>
                <el-badge :value="confirmpbuy" class="backdoc">
                    <el-button type="primary"  @click="confirmbuy" plain>代采购确认</el-button>
                </el-badge>
                <el-badge :value="instore" class="allunre">
                    <el-button type="primary"  @click="reserin" plain>带预约入库</el-button>
                </el-badge>
                <el-badge :value="backbuy" class="outdateunre">
                    <el-button type="primary"  @click="buyback" plain>采购退回</el-button>
                </el-badge>
                <el-badge :value="instorelist" class="outdatere">
                    <el-button type="primary"  @click="ineddoc" plain>已入库单据</el-button>
                </el-badge>
            </el-col>
            <el-col :span="24">
                <my-table></my-table>
            </el-col>
        </el-col>
    </el-row>
</template>

<script>
import myTable from '../../components/storageOperation/buyConfirm-table'
export default {
    components:{
        myTable
    },
    data(){
        return{
            showwhich:'',
            keywords:'',
            buyNumber:'',
            project:'',
            time1:'',
            time2:'',
            waithandle:1,
            confirmpbuy:3,
            instore:3,
            backbuy:6,
            instorelist:2
        }
    },
    methods:{
        allwaitdeal(){
            this.waithandle=''
        },
        confirmbuy(){
            this.confirmbuy=''
        },
        reserin(){
            this.instore=''
        },
        buyback(){
            this.backbuy=''
        },
        ineddoc(){
            this.instorelist=''
        },
        search(){},
        clear(){
            this.keywords='',
            this.buyNumber='',
            this.project='',
            this.time1='',
            this.time2=''
        },
        more(){}
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
        position:absolute;top:25px;background-color:rgba(241, 241, 241, 0.349);height:230px;box-shadow:1px 1px 1px 1px rgb(235, 233, 233);
        .search-container{
            left: 10%;position:absolute; width:auto;
            .demo-search{
                font-size: 14px;font-weight: 100; width: 250px;
            }
            .demo-time{
                width: 600px;top: 180px;position: absolute;font-size: 14px;font-weight: 100;
            }
            .btns{
                top:180px;left:700px;position: absolute;width:250px;
            }
        }
    }
    .btn-form{
        .select-btns-left{
            width: 900px;
            text-indent: 0px;
        }
    }
}
</style>
