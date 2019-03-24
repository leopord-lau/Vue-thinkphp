<template>
    <el-row class="storagebuy">
        <el-col :span="24">
            <el-breadcrumb separator-class="el-icon-arrow-right" class="breadcrumb">
                <el-breadcrumb-item :to="{path:'/'}">首页</el-breadcrumb-item>
                <el-breadcrumb-item>基础设置</el-breadcrumb-item>
                <el-breadcrumb-item>库备请购</el-breadcrumb-item>
            </el-breadcrumb>
        </el-col>
        <el-col class="search-box" :span="24">
            <div class="search-container">
            <div class="demo-search">关键字查询（模糊查询）：
                <el-input v-model="keywords" size="small"></el-input>
            </div>
            <div  class="demo-search">请购仓库：
                <el-input v-model="buyNumber" size="small"></el-input>
            </div>
            <div class="demo-search">工程编号：
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
                <el-button type="primary"  @click="newdocument" plain>新建请购单</el-button>
                <el-badge :value="quanbu" class="alldoc">
                    <el-button type="primary"  @click="alldocument" plain>全部请购单</el-button>
                </el-badge>
                <el-badge :value="tuihui" class="backdoc">
                    <el-button type="primary"  @click="backdocument" plain>退回单据</el-button>
                </el-badge>
            </el-col>
            <el-col :span="4" class="select-btns-right">
                <el-badge :value="quanbuweidao" class="allunre">
                    <el-button type="primary"  @click="allunreceive" plain>全部未到货</el-button>
                </el-badge>
                <el-badge :value="chaoqiweidao" class="outdateunre">
                    <el-button type="primary"  @click="outdateunreceive" plain>超期未到货</el-button>
                </el-badge>
                <el-badge :value="chaoqidao" class="outdatere">
                    <el-button type="primary"  @click="outdatereceive" plain>超期到货</el-button>
                </el-badge>
            </el-col>
            <el-col :span="24" class="form">
                <my-table :tableData="getData" :total="total1"></my-table>
            </el-col>
        </el-col>
        <el-col :span="24" class="mydialog">
            <my-dialog :ifshow="dialogTableVisible" @close="closedialog"></my-dialog>
        </el-col>
    </el-row>
</template>

<script>
import myTable from '../../components/storageOperation/storageBuy-table'
import myDialog from '../../components/storageOperation/storageBuy-dialog.vue'
export default {
    components:{
        myTable,myDialog
    },
    data(){
        return{
            showwhich:'',
            dialogTableVisible:false,
            keywords:'',
            buyNumber:'',
            project:'',
            time1:'',
            time2:'',
            quanbu:12,
            tuihui:2,
            quanbuweidao:3,
            chaoqiweidao:4,
            chaoqidao:3,
            getData:[],
            total1:0
        }
    },
    methods:{
        alldocument(){
           this.quanbu=''
        },
        backdocument(){
           this.tuihui=''
        },
        allunreceive(){
          this.quanbuweidao=''
        },
        outdateunreceive(){
           this.chaoqiweidao=''
        },
        outdatereceive(){
            this.chaoqidao=''
        },
        newdocument(){
            this.dialogTableVisible=true
        },
        closedialog(){
            this.dialogTableVisible=false
        },
        search(){

        },
        clear(){
            this.keywords='',
            this.buyNumber='',
            this.time1='',
            this.time2=''
        },
        more(){
        },
        search(){
            this.$http.post('api/selectApplyBuy',{keywords:this.keywords,buyNumber:this.buyNumber,
            project:this.project}).then((res)=>{
                if(res.data.code===1){
                    this.getData=res.data.data;
                    this.total1=this.getData.length
                    this.$message({message:res.data.msg,type:'success'})
                }else{
                    this.$message({message:res.data.msg,type:'error'})
                }
            })
        }
    },
    created(){
        this.$http.get('api/getApplyBuy').then((res)=>{
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
        top:300px;
        position: absolute;
        .select-btns-left{
            width:400px;float: left;
        }
        .form{
            position: absolute;
        }
    }
}
</style>
