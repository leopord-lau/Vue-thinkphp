<?php
namespace app\index\controller;

use app\util\ReturnCode;
use think\Db;
use app\index\controller\Base;

class Login extends Base{
    public function login(){
        $username=input('username');
        $password=input("password");
        $captcha=input('captcha');
        /*if(!$username){
            //return $this->buildFailed(ReturnCode::LOGIN_ERROR,'缺少用户名');
        }
        if(!$password){
            //return $this->buildFailed(ReturnCode::LOGIN_ERROR,'缺少密码');
        }*/
        $userinfo=Db::name('trans_user')->where('username',$username)->find();
        if(empty($userinfo)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'用户名不存在');
        }
        if($userinfo['password']!=$password){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'密码错误');
        }
        if(!captcha_check($captcha)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'验证码错误');
        }
        return $this->buildSuccess([],'登陆成功');
    }
    public function getUser(){
        $user=Db::name('trans_user')->select();
        if(empty($user)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($user,'获取信息成功');
    }
    public function getInventoryAlert(){
        $alertInfo=Db::name('trans_inventoryalert')->select();
        if(empty($alertInfo)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($alertInfo,'获取信息成功');
    }
}