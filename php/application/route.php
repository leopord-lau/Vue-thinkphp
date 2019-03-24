<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
/*
return [
    '__pattern__' => [
        'name' => '\w+',
    ],
    '[hello]'     => [
        ':id'   => ['index/hello', ['method' => 'get'], ['id' => '\d+']],
        ':name' => ['index/hello', ['method' => 'post']],
    ],
    'show'=>'index/index/showres'
];
*/
use think\Route;
Route::rule("show","index/index/showres");
Route::rule('hi/[:name]','index/index/hi');
Route::rule('/captcha','index/index/captcha');
Route::rule('/checkas','index/index/checkcaptcha');
Route::rule('/jianyan','index/index/upload');
Route::rule("/check/[:captcha]",'index/index/check');

Route::rule("/login",'index/login/login');
Route::rule("/getuser",'index/login/getUser');
Route::rule('/getInventoryAlert','index/info/getInventoryalert');
Route::rule("/getOutdateAlert",'index/info/getOutdateAlert');
Route::rule("/getWaitCheck",'index/info/getWaitCheck');
Route::rule("/getAdjust",'index/info/getAdjust');
Route::rule("/getApplyBuy",'index/info/getApplyBuy');
Route::rule("/getBatchStore",'index/info/getBatchStore');
Route::rule("/getCheck",'index/info/getCheck');
Route::rule("/getClient",'index/info/getClient');
Route::rule("/getConfirmBuy",'index/info/getConfirmBuy');
Route::rule("/getDamage",'index/info/getDamage');
Route::rule("/getDepartment",'index/info/getDepartment');
Route::rule("/getInstore",'index/info/getInstore');
Route::rule("/getInventory",'index/info/getInventory');
Route::rule("/getLoader",'index/info/getLoader');
Route::rule("/getMaterial",'index/info/getMaterial');
Route::rule("/getMaterialStore",'index/info/getMaterialStore');
Route::rule("/getMaterialType",'index/info/getMaterialType');
Route::rule("/getMaterialUnit",'index/info/getMaterialUnit');
Route::rule("/getOutstore",'index/info/getOutstore');
Route::rule("/getPallet",'index/info/getPallet');
Route::rule("/getPickout",'index/info/getPickout');
Route::rule("/getProject",'index/info/getProject');
Route::rule("/getProjectSeries",'index/info/getProjectSeries');
Route::rule("/getProjectType",'index/info/getProjectType');
Route::rule("/getRole",'index/info/getRole');
Route::rule("/getStoreCount",'index/info/getStoreCount');
Route::rule("/getSumup",'index/info/getSumup');
Route::rule("/getSupplier",'index/info/getSupplier');
Route::rule("/getWareposition",'index/info/getWareposition');
Route::rule("/getWarepositionSetting",'index/info/getWarepositionSetting');

Route::rule("/submitApplyBuy",'index/uploadinfo/submitApplyBuy');
Route::rule('/submitMaterialType','index/uploadinfo/submitMaterialType');
Route::rule('/submitProjectType','index/uploadinfo/submitProjectType');
Route::rule('/submitDepartment','index/uploadinfo/submitDepartment');
Route::rule('/submitCheck','index/uploadinfo/submitCheck');
Route::rule('/submitLoader','index/uploadinfo/submitLoader');
Route::rule('/submitMaterial','index/uploadinfo/submitMaterial');
Route::rule('/submitprojectSeries','index/uploadinfo/submitProjectSeries');
Route::rule('/submitSetting','index/uploadinfo/submitSetting');
Route::rule('/submitSupplier','index/uploadinfo/submitSupplier');
Route::rule('/submitPallet','index/uploadinfo/submitPallet');
Route::rule('/submitMaterialUnit','index/uploadinfo/submitMaterialUnit');
Route::rule('/submitInventory','index/uploadinfo/submitInventory');
Route::rule('/submitAdjust','index/uploadinfo/submitAdjust');
Route::rule('/submitDamage','index/uploadinfo/submitDamage');
Route::rule('/submitOutstore','index/uploadinfo/submitOutstore');

Route::rule('/selectInventoryAlert','index/selectinfo/selectInventoryAlert');
Route::rule('selectApplyBuy','index/selectinfo/selectApplyBuy');
Route::rule('selectInstore','index/selectinfo/selectInstore');
Route::rule('selectOutstore','index/selectinfo/selectOutstore');
Route::rule('selectPickout','index/selectinfo/selectPickout');
Route::rule('selectDamage','index/selectinfo/selectDamage');
Route::rule('selectAdjust','index/selectinfo/selectAdjust');
Route::rule('selectWareposition','index/selectinfo/selectWareposition');
Route::rule('selectStoreCount','index/selectinfo/selectStoreCount');
Route::rule('selectDepartment','index/selectinfo/selectDepartment');
Route::rule('selectLoader','index/selectinfo/selectLoader');
Route::rule('selectClient','index/selectinfo/selectClient');
Route::rule('selectSupplier','index/selectinfo/selectSupplier');
Route::rule('selectInventory','index/selectinfo/selectInventory');
Route::rule('selectWarepositionSetting','index/selectinfo/selectWarepositionSetting');
Route::rule('selectPallet','index/selectinfo/selectPallet');
Route::rule('selectMaterial','index/selectinfo/selectMaterial');
Route::rule('selectMaterialType','index/selectinfo/selectMaterialType');
Route::rule('selectMaterialUnit','index/selectinfo/selectMaterialUnit');
Route::rule('selectProject','index/selectinfo/selectProject');
Route::rule('selectProjectSeries','index/selectinfo/selectProjectSeries');
Route::rule('selectProjectType','index/selectinfo/selectProjectType');
Route::rule('selectBatchStore','index/selectinfo/selectBatchStore');