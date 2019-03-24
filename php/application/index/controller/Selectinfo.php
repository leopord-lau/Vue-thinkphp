<?php
namespace app\index\controller;

use app\util\ReturnCode;
use think\Db;
use app\index\controller\Base;

class Selectinfo extends Base{
    public function selectInventoryAlert(){
        $data=input('keywords');
        $min=input('min');
        $max=input('max');
        if(empty($min)){
            $min=0;
        }
        if(empty($max)){
            $max=9999;     //不能超过9999,否则会出现异常结果
        }
        //$where['inventory']=array('like','%'.$data.'%');
        $info=Db::name('trans_inventoryalert')->where('materialNumber','between',[$min,$max])
        ->where('inventory','like','%'.$data.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectApplyBuy(){
        $data1=input('keywords');
        $data2=input('buyNumber');
        $data3=input('project');
        //$data4=input('time1');
        //$data5=input('time2');
        $info=Db::name('trans_applybuy')
        ->where('keywords','like','%'.$data1.'%')
        ->where('buyNumber','like','%'.$data2.'%')
        ->where('projectNumber','like','%'.$data3.'%')
        //->where('applyTime','between',[$data4,$data5])
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectInstore(){
        $data1=input('keywords');
        $data2=input('value');
        $info=Db::name('trans_instore')
        ->where('documentNumber','like','%'.$data1.'%')
        ->where('checkStatus','like','%'.$data2.'%')
        //->where('applyTime','between',[$data4,$data5])
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectOutstore(){
        $data1=input('keywords');
        $data2=input('value');
        $info=Db::name('trans_outstore')
        ->where('documentNumber','like','%'.$data1.'%')
        ->where('checkStatus','like','%'.$data2.'%')
        //->where('applyTime','between',[$data4,$data5])
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectPickout(){
        $data1=input('keywords');
        $info=Db::name('trans_pickout')
        ->where('documentNumber','like','%'.$data1.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectDamage(){
        $data1=input('keywords');
        $data2=input('value');
        $info=Db::name('trans_damage')
        ->where('documentNumber','like','%'.$data1.'%')
        ->where('status','like','%'.$data2.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectAdjust(){
        $data1=input('keywords');
        $data2=input('value');
        $info=Db::name('trans_adjust')
        ->where('documentNumber','like','%'.$data1.'%')
        ->where('status','like','%'.$data2.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectWareposition(){
        $data1=input('keywords');
        $info=Db::name('trans_wareposition')
        ->where('materialName','like','%'.$data1.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectStoreCount(){
        $data1=input('keywords');
        $info=Db::name('trans_storecount')
        ->where('materialName','like','%'.$data1.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectDepartment(){
        $data1=input('keywords');
        $info=Db::name('trans_department')
        ->where('departmentName','like','%'.$data1.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectLoader(){
        $data1=input('keywords');
        $info=Db::name('trans_loader')
        ->where('loaderName','like','%'.$data1.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectClient(){
        $data1=input('keywords');
        $info=Db::name('trans_client')
        ->where('clientName','like','%'.$data1.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectSupplier(){
        $data1=input('keywords');
        $info=Db::name('trans_supplier')
        ->where('supplierCode','like','%'.$data1.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectInventory(){
        $data1=input('keywords');
        $info=Db::name('trans_inventory')
        ->where('inventoryCode','like','%'.$data1.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectWarepositionSetting(){
        $data1=input('keywords');
        $info=Db::name('trans_warepositionsetting')
        ->where('warePositionCode','like','%'.$data1.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectPallet(){
        $data1=input('keywords');
        $info=Db::name('trans_pallet')
        ->where('PalletName','like','%'.$data1.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectMaterial(){
        $data1=input('keywords');
        $info=Db::name('trans_material')
        ->where('materialName','like','%'.$data1.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectMaterialType(){
        $data1=input('keywords');
        $info=Db::name('trans_materialtype')
        ->where('type','like','%'.$data1.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectMaterialUnit(){
        $data1=input('keywords');
        $info=Db::name('trans_materialunit')
        ->where('unitNumber','like','%'.$data1.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectProject(){
        $data1=input('keywords');
        $info=Db::name('trans_project')
        ->where('projectName','like','%'.$data1.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectProjectSeries(){
        $data1=input('keywords');
        $info=Db::name('trans_projectseries')
        ->where('projectSeries','like','%'.$data1.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectProjectType(){
        $data1=input('keywords');
        $info=Db::name('trans_projecttype')
        ->where('projectType','like','%'.$data1.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
    public function selectBatchStore(){
        $data1=input('keywords');
        $data2=input('value');
        $info=Db::name('trans_batchstore')
        ->where('inventoryName','like','%'.$data1.'%')
        ->where('loader','like','%'.$data2.'%')
        ->select();
        if(empty($info)){
            return $this->buildFailed(ReturnCode::INVALID,'未找到记录');
        }else{
            return $this->buildSuccess($info,'查询成功');
        }
    }
}