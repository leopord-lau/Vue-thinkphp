<template>
<el-row class="head">
    <el-col :span="24">
        <el-col :span="6" class="logo">
            <img src="../../static/img/logo/logo-3.png" class="logo"/>
        </el-col>
        <el-col :span="4" >
            <div class="wel">欢迎你，{{username}}</div>
        </el-col>
        <el-col :span="6">
            <el-button type="primary" class="storage"  @click="wareOperation" plain>
                仓库作业
            </el-button>
            <el-button  type="primary" class="basic-info" @click="basicInfo" plain >
                基础信息
            </el-button>
            <el-button type="primary" class="excel" @click="report" plain>
                报  表
            </el-button>
        </el-col>
        <el-col :span="4" class="sel1">
            <el-select  placeholder="仓库" v-model="value1" class="operation-storage" >
                <el-option v-for="item in items" :key="item.key" :value="item.text" ></el-option>
            </el-select>
            <el-select  placeholder="作业贷主" v-model="value2" class="operation-loader" >
                <el-option v-for="items in masterItems" :key="items.key" :value="items.text" ></el-option>
            </el-select>
        </el-col>
        <el-col :span="4" class="right">
            <el-dropdown class="user-menu">
                <span class="el-dropdown-link c-gra" @click="info">
                    <i class="el-icon-service"></i> 个人中心<i class="el-icon-arrow-down el-icon--right"></i>
                </span>
                <el-dropdown-menu slot="dropdown">
                    <el-dropdown-item command="logout"><span @click="showlogout"><i class="el-icon-circle-close"></i> 安全退出</span></el-dropdown-item>
                </el-dropdown-menu>
            </el-dropdown>
        </el-col>
    </el-col>
    <el-col :span="24" class="panel-center" >
        <aside class="w-180 ovf-hd">
            <ware-leftMenu class="leftmenu" v-if="showware"></ware-leftMenu>
            <basic-leftMenu class="leftmenu" v-if="showbasic"></basic-leftMenu>
            <form-leftMenu class="leftmenu" v-if="showform"></form-leftMenu>
        </aside>
        <section class="panel">
            <div>
                <el-col :span="24">
                    <transition name="fade" mode="out-in" appear>
                        <router-view></router-view>
                    </transition>
                </el-col>
            </div>
        </section>
    </el-col>
    <logout-dialog class="loading" v-show="iflogout"  @close="closedialog"/>
    <el-col :span="24">
        <my-footer class="foot"></my-footer>
    </el-col>
</el-row>
</template>

<script>
import wareLeftMenu from '../components/storageOperation/leftMenu'
import basicLeftMenu from '../components/basic-info/leftMenu'
import formLeftMenu from '../components/reportForm/leftMenu'
import myFooter from '../components/footer' 
import logoutDialog from '../components/logout-dialog'
import {mapState} from 'vuex'
export default {
    data(){
        return{
            iflogout:false,
            showware:true,
            showbasic:false,
            showform:false,
            value1:'',
            value2:'',
            items:[{key:1,value:1,text:'仓库1'},{key:2,value:'2',text:'仓库2'},{key:3,value:3,text:'仓库3'}],
            masterItems:[{key:1,value:1,text:'广州'},{key:2,value:'2',text:'梅州'},{key:3,value:3,text:'北京'}],
        }
    },
    computed:mapState({username:state=>state.user.username}),
    components:{wareLeftMenu,myFooter,basicLeftMenu,formLeftMenu,logoutDialog},
    methods:{
        wareOperation(){
            this.showware=true
            this.showbasic=false
            this.showform=false
            this.$router.push('/homepage')
        },
        basicInfo(){
            this.showware=false
            this.showbasic=true
            this.showform=false
            this.$router.push('/basic/department')
        },
        report(){
            this.showware=false
            this.showbasic=false
            this.showform=true
            this.$router.push('/report/materialquery')
        },
        info(){
            this.$router.push('/basic/account')
        },
        showlogout(){
            this.iflogout=true
        },
        closedialog(){
            this.iflogout=false
        }
    }
}
</script>

<style lang="less">
.head{
    height:100px;top:0px;left:0px;position:absolute;width:100%;border-radius:0 0 25px 25px; box-shadow: 0 4px 4px rgb(185, 180, 180);
    .logo {
    top: 0;
    left: 0;
    width: 35%;
    height: auto;
    position: absolute;
    }
    .wel{
        position:absolute;left:17%;top:50px;font-weight:100
    }
    .storage{
        position: absolute;left: 34%;top: 30px
    }
    .basic-info{
        position: absolute;left: 42%;top: 30px
    }
    .excel{
        position: absolute;left: 51%;top: 30px
    }
    .sel1{
        position: absolute;left:60%;top: 20px;width: 30%
    }
    .operation-storage{
        width:25%;position: absolute;left: 15%;top:10px
    }
    .operation-loader{
        width: 25%;position: absolute;left: 45%;top:10px
    }
    .right{
        position: absolute;left:90%;top: 20px;width: 30%
    }
    .user-menu{
        cursor:default;position:absolute;top:20px;
    }
    .leftmenu{
        top:105px;width:170px;left:0px;position:absolute;height: 1070px;z-index: 999;
    }
    .panel{
        top:110px;left: 0%;width:100%;position: absolute;
    }
    .foot{
        height:80px; width:100%; top:1090px;position: absolute;
    }
}

</style>
