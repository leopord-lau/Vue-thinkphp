<template>
    <el-row class="storagebuy">
        <el-col :span="24">
            <el-breadcrumb separator-class="el-icon-arrow-right" class="breadcrumb">
                <el-breadcrumb-item :to="{path:'/'}">首页</el-breadcrumb-item>
                <el-breadcrumb-item>盘点作业</el-breadcrumb-item>
                <el-breadcrumb-item>库存盘点</el-breadcrumb-item>
            </el-breadcrumb>
        </el-col>
        <el-col class="search-box" :span="24">
            <div class="search-container">
            <div class="demo-search">物料名称：
                <el-input v-model="keywords" placeholder="请输入物料名称" size="small"></el-input>
            </div>
            <div class="btns">
                <el-button type="primary" size="small" @click="search" plain>查询</el-button>
                <el-button type="primary" size="small" @click="clear" plain>清空</el-button>
            </div>
            </div>
        </el-col>
        <el-col :span="24" class="btn-form">
            <el-col :span="4" class="print">
                <el-button type="primary"  @click="print" plain>打印</el-button>
            </el-col>
            <el-col :span="24">
                <my-table id="table" :tableData="getData" :total="total1"></my-table>
            </el-col>
        </el-col>
    </el-row>
</template>

<script>
import myTable from '../../components/storageOperation/wareNumber-table'
export default {
    components:{
        myTable
    },
    data(){
        return{
            showwhich:'',
            keywords:'',
            getData:[],
            total1:0
        }
    },
    methods:{
        clear(){
            this.keywords=''
        },
        search(){},
        print(){
            var newstr=document.getElementById('table').innerHTML;
            var oldstr=document.body.innerHTML;
            document.body.innerHTML=newstr;
            window.print();
            document.body.innerHTML=oldstr;
            return false;
        },
        search(){
            this.$http.post('api/selectStoreCount',{keywords:this.keywords}).then((res)=>{
                if(res.data.code===1){
                    this.getData=res.data.data;
                    this.total1=this.getData.length
                }else{
                    this.$message(res.data.msg)
                }
            })
        }
    },
    created(){
        this.$http.get('api/getStoreCount').then((res)=>{
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
        left:15%;position: absolute;
    }
    .search-box{
        position:absolute;top:25px;background-color:rgba(241, 241, 241, 0.349);height:65px;box-shadow:1px 1px 1px 1px rgb(235, 233, 233);
        .search-container{
            left: 10%;position:absolute; width:auto;
            .demo-search{
                font-size: 14px;font-weight: 100; width: 250px;
            }
            .btns{
                top:20px;left:300px;position: absolute;width:250px;
            }
        }
    }
    .btn-form{
        top:120px;position: absolute;
        .print{
            left:5%;position: absolute
        }
    }
    .el-icon-success{
        color:green
    }
    .el-icon-error{
        color: red
    }
}
</style>
