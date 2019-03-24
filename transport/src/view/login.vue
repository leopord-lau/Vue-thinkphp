<template>
<div class="login-page main-container">
    <div class="header">
        <div class="inner-wrapper">
            <h1 class="logo"><a href="index"><img src="../../static/img/logo/logo-3.png"></a></h1>
        </div>
    </div>
    <div class="body">
        <div class="login-body login-body-hook">
            <div class="login-left">
                <h1>连接全球智能仓储</h1>
                <h1 class="left30">开创物联新时代</h1>
                <div class="login-img">
                    <img src="../../static/img/login-img.png" alt="">
                </div>
            </div>
            <div class="login-right">
                <div class="login-form">
                    <el-form  :rules="rules" :model="formData" ref="form" class="form">
                        <p class="login-p">用户登录</p>
                        <el-form-item prop="username">
                            <el-input type="text" v-model="formData.username"  placeholder="account"></el-input>
                        </el-form-item>
                        <el-form-item prop="password">
                            <el-input type="password" v-model="formData.password"  placeholder="password"></el-input>
                        </el-form-item>
                        <el-form-item prop="captcha">
                            <el-input type="text" v-model="formData.captcha"  placeholder="captcha" class="w-150"></el-input>
                            <img :src="verifyUrl" @click="refreshVerify" class="verify-pos" />
                        </el-form-item>
                        <div class="form-group form-btn">
                            <el-button type="primary" style="width:100%" v-loading="loading" @click.native.prevent="handleSubmit">登陆</el-button>
                        </div>
                        <a class="pwd-forget" href="" >忘记密码？</a>
                        <a class="register-new" href="" >注册新用户</a>
                    </el-form>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="inner-wrapper">
           南京巡城鹿信息科技有限公司 &copy;版权所有
        </div>
    </div>
</div>
</template>

<script>
import {mapActions} from 'vuex'
import {USER_LOGIN} from '../store/user.js'
import axios from 'axios'
export default {
    data(){
        return{
            formData:{
                username:'',
                password:'',
                captcha:'',
            },
            rules:{
                username:[
                    {required:true,minleng:1,maxlength:30,message:'请输入用户名',trigger:'blur'}
                ],
                password:[
                    {required:true,maxlength:20,trigger:"blur",message:'请输入密码'}
                ],
                captcha:[
                    {required:true,maxlength:5,trigger:'blur',message:"请输入验证码"}
                ]
            },
            loading:false,
            verifyUrl:''
        }
    },
    methods:{
        ...mapActions([USER_LOGIN]),
        handleSubmit(){
            this.loading=true
            this.USER_LOGIN(this.formData)
            axios.post("api/login",{
                username:this.formData.username,
                password:this.formData.password,
                captcha:this.formData.captcha}).then((res)=>{
                if(res.data.code===1){
                    this.loading=false
                    this.$message({
                        message:res.data.msg,
                        type:'success'
                    })
                    this.$router.push({path:'/homepage'})
                }else{
                    this.$message({
                        message:res.data.msg,
                        type:'error'
                    });
                    this.loading=false
                }
            })
        },
        refreshVerify(){
            this.verifyUrl="api/captcha?id="+Math.random();
        }
    },
    created(){
        this.verifyUrl='api/captcha'
    },
    mounted(){
        window.addEventListener('keyup',(e)=>{
            if(e.keyCode===13){
                this.handleSubmit()
            }
        })
    },
}
</script>

<style lang="less">
@import "../assets/less/base.less";
.header{
    width:100px;
    height: 30px;
    img{
        width:15%;
        height: auto;
        top: 0px;
        left: 0px;
        position: absolute;
    }
}

.login-body {
  margin: 0 auto;
  width: 100%;
  height: 100%;
  .login-left {
    top:80px;
    position: absolute;
    width: 53%;
    float: left;
    padding-left: 160px;
    h1 {
      color: #0B8DD9;
      font-weight: bold;
      font-size: 36px;
      line-height: 20px;
      &.left30 {
        margin-left: 165px;
      }
    }
    .login-img{
      margin-top: 34px;
      img{
        border-radius: 3px;
      }
    }
  }
  .login-right {
    //width: 52%;
    float: right;
    padding: 0 560px 0 0;
    .login-form {
      top:80px;
      width:270px;
      height: 400px;
      position:absolute;
      border: 1px solid #e5e5e5;
      border-radius: 5px;
      padding: 0 60px;
      form {
        .pwd-forget, .register-new {
          cursor: pointer;
        }
        .login-p {
          border-radius: 10px;
          color: #fff;
          background-color: #0B8DD9;
          font-size: 28px;
          font-weight: bold;
          width: 100%;
          text-align: center;
          //margin-left: 56px;
        }
        .register-new {
          float: right;
          font-size: 12px;
          font-weight: 100;
          padding-bottom: 12px;
          list-style: none;
        }
        .pwd-forget {
          float: left;
          font-size: 12px;
          font-weight:100;
          list-style: none;
        }
        .form-group{
          label.error{
            position: absolute;
            left: 72px;
            top: 53px;
          }
        }
      }
    }
  }
}
.footer{
    bottom:0;
    position: absolute;
    background-color:#f0efef;
    width: 100%;
    height: 19%;
    left: 0;
    .inner-wrapper{
        font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
        left: 37%;
        font-size: 10px;
        font-weight: 100;
        position: absolute;
        padding-top: 30px;
    }
}
</style>
