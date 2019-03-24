<?php
namespace app\index\controller;

use think\Controller;
use think\Request;


class Index extends Controller
{   
    public function showres(){
        echo "简单接口";
    }
    public function captcha(){
        $captcha = new \think\captcha\Captcha();
        $captcha->imageW=121;
        $captcha->imageH = 32;  //图片高
        $captcha->fontSize =14;  //字体大小
        $captcha->length   = 4;  //字符数
        $captcha->fontttf = '5.ttf';  //字体
        $captcha->expire = 30;  //有效期
        $captcha->useNoise = false;  //不添加杂点
        return $captcha->entry();
    }
}
