<template>
    <el-row class="storagebuy">
        <el-col :span="24">
            <el-breadcrumb separator-class="el-icon-arrow-right" class="breadcrumb">
                <el-breadcrumb-item :to="{path:'/'}">首页</el-breadcrumb-item>
                <el-breadcrumb-item>入库作业</el-breadcrumb-item>
                <el-breadcrumb-item>采购入库</el-breadcrumb-item>
            </el-breadcrumb>
        </el-col>
        <el-col class="search-box" :span="24">
            <div class="search-container">
            <div class="demo-search">入库单号（模糊搜索）：
                <el-input v-model="keywords" size="small"></el-input>
            </div>
            <div class="demo-search status">状态：
                <el-select v-model="value" placeholder="状态">
                    <el-option value="审核中">审核中</el-option>
                    <el-option value="已完成">已完成</el-option>
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
                <el-button type="primary"  @click="newdocument" plain>新建入库单</el-button>
            </el-col>
            <el-col :span="24">
                <my-table :tableData='getData' :total='total1'></my-table>
            </el-col>
        </el-col>
        <el-col :span="24" class="mydialog">
            <my-dialog :ifshow="dialogTableVisible" @close="closedialog"></my-dialog>
        </el-col> 
    </el-row>
</template>

<script>
import myTable from '../../components/storageOperation/buyInStorage-table'
import myDialog from '../../components/storageOperation/storageBuy-dialog'
export default {
    components:{
        myTable,myDialog
    },
    data(){
        return{
            showwhich:'',
            keywords:'',
            value:'',
            time1:'',
            time2:'',
            dialogTableVisible:false,
            getData:[],
            total1:0
        }
    },
    methods:{
        clear(){
            this.keywords='',
            this.value='',
            this.time1='',
            this.time2=''
        },
        newdocument(){
            this.dialogTableVisible=true
        },
        closedialog(){
            this.dialogTableVisible=false
        },
        search(){
            this.$http.post('api/selectInstore',{keywords:this.keywords,value:this.value}).then((res)=>{
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
        this.$http.get('api/getInstore').then((res)=>{
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
        position:absolute;top:25px;background-color:rgba(241, 241, 241, 0.349);height:230px;box-shadow:1px 1px 1px 1px rgb(235, 233, 233);
        .search-container{
            left: 10%;position:absolute; width:auto;
            .demo-search{
                font-size: 14px;font-weight: 100; width: 250px;
                status{
                    top:70px;position: absolute;
                }
            }
            .demo-time{
                width: 600px;top: 140px;position: absolute;font-size: 14px;font-weight: 100;
            }
            .btns{
                top:180px;left:700px;position: absolute;width:250px;
            }
        }
    }
    .btn-form{
        .select-btns-left{
            width:300px;
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
