<template>
    <el-row class="storagebuy">
        <el-col :span="24">
            <el-breadcrumb separator-class="el-icon-arrow-right" class="breadcrumb">
                <el-breadcrumb-item :to="{path:'/'}">首页</el-breadcrumb-item>
                <el-breadcrumb-item>统计报表</el-breadcrumb-item>
                <el-breadcrumb-item>批次库存</el-breadcrumb-item>
            </el-breadcrumb>
        </el-col>
        <el-col class="search-box" :span="24">
            <div class="search-container">
            <div class="demo-search status">仓库
                <el-select v-model="keywords" placeholder="请选择">
                    <el-option value="仓库 1">仓库 1</el-option>
                    <el-option value="仓库 2">仓库 2</el-option>
                </el-select> 
            </div>
            <div class="demo-time">时间：
                <el-date-picker v-model="time1"  type="date"></el-date-picker>
                -
                <el-date-picker v-model="time2" type="date"></el-date-picker>
            </div>
            <div class="btns">
                <el-button type="primary" size="small" @click="search" plain>查询</el-button>
                <el-button type="primary" size="small" @click="clear" plain>清空</el-button>
            </div>
            </div>
        </el-col>
        <el-col :span="24" class="btn-form">
            <el-col :span="4" class="select-btns-left">
                <el-button type="primary"  @click="print" plain>打印</el-button>
            </el-col>
            <el-col :span="24">
                <my-table id="table" :tableData="getData" :total="total1"></my-table>
            </el-col>
        </el-col>
    </el-row>
</template>

<script>
import myTable from '../../components/reportForm/batchinventory-table'
export default {
    components:{
        myTable
    },
    data(){
        return{
            keywords:'',
            time1:'',
            time2:'',
            getData:[],
            total1:0
        }
    },
    methods:{
        print(){
            var newstr=document.getElementById('table').innerHTML;
            var oldstr=document.body.innerHTML;
            document.body.innerHTML=newstr;
            window.print();
            document.body.innerHTML=oldstr;
            return false;
        },
        search(){
            this.$http.post('api/selectBatchStore',{keywords:this.keywords}).then((res)=>{
                if(res.data.code===1){
                    this.getData=res.data.data;
                    this.total1=this.getData.length
                }else{
                    this.$message(res.data.msg)
                }
            })
        },
        clear(){
            this.value='',
            this.time1='',
            this.time2=''
        },
    },
    created(){
        this.$http.get('api/getBatchStore').then((res)=>{
            if(res.data.code===1){
                this.getData=res.data.data;
                this.total1=this.getData.length
            }else{
                this.$message(res.data.msg)
            }
        })
    },
}
</script>

<style lang="less">
.storagebuy{
    top:0px;width:100%;position: absolute;
    .breadcrumb{
        left:10%;position: absolute;
    }
    .search-box{
        position:absolute;top:25px;background-color:rgba(241, 241, 241, 0.349);height:130px;box-shadow:1px 1px 1px 1px rgb(235, 233, 233);
        .search-container{
            left: 10%;position:absolute; width:auto;
            .demo-search{
                font-size: 14px;font-weight: 100; width: 250px;
            }
            .demo-time{
                width: 600px;top: 80px;position: absolute;font-size: 14px;font-weight: 100;
            }
            .btns{
                top:85px;left:700px;position: absolute;width:250px;
            }
        }
    }
    .btn-form{
        top:190px;position:absolute;
        .select-btns-left{
            width:300px;left:5%;position: absolute;
        }
        .select-btns-right{
            left: 700px; width: 600px;position: absolute;
        }
    }
    .el-icon-success{
        color:green
    }
}
</style>
