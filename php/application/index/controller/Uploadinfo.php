<?php
namespace app\index\controller;

use app\util\ReturnCode;
use think\Db;
use app\index\controller\Base;

class Uploadinfo extends Base{
    public function submitApplyBuy(){
        $data=[
            'materialName'=>input('materialName'),
            'applyPerson'=>input('applyPerson'),
            'applyNumber'=>input('applyNumber'),
            'applyinventory'=>input('applyinventory'),
            'projectNumber'=>input('projectNumber'),
            'applyTime'=>input('applyTime'),
            'checkName'=>input('checkName'),
            'checkTime'=>input('checkTime'),
            'buyTime'=>input('buyTime'),
            'receivePerson'=>input('receivePerson'),
            'receiveTime'=>input('receiveTime')
        ];
        $info=Db::name('trans_applybuy')->insert($data);
        if($info){
            return $this->buildSuccess([],'新建请购单成功');
        }else{
            return $this->buildFailed(ReturnCode::ADD_FAILED,'新建失败，请重试!');
        }
    }
    public function submitMaterialType(){
        $data=[
            'type'=>input('type'),
            'remark'=>input('remark'),
        ];
        $info=Db::name('trans_materialtype')->insert($data);
        if($info){
            return $this->buildSuccess([],'新建物料类型成功');
        }else{
            return $this->buildFailed(ReturnCode::ADD_FAILED,'新建失败，请重试!');
        }
    }
    public function submitProjectType(){
        $data=[
            'projectType'=>input('projectType'),
            'createTime'=>input('createTime'),
            'createPerson'=>input('createPerson'),
            'remark'=>input('remark')
        ];
        $info=Db::name('trans_projecttype')->insert($data);
        if($info){
            return $this->buildSuccess([],'新建成功');
        }else{
            return $this->buildFailed(ReturnCode::ADD_FAILED,'新建失败，请重试!');
        }
    }
    public function submitDepartment(){
        $data=[
            'departmentName'=>input('departmentName'),
            'superDepartment'=>input('superDepartment'),
            'remark'=>input('remark')
        ];
        $info=Db::name('trans_department')->insert($data);
        if($info){
            return $this->buildSuccess([],'新建成功');
        }else{
            return $this->buildFailed(ReturnCode::ADD_FAILED,'新建失败，请重试!');
        }
    }
    public function submitCheck(){
        $data=[
            'checkCode'=>input('checkCode'),
            'checkName'=>input('checkName'),
            'status'=>input('status'),
            'remark'=>input('remark')
        ];
        $info=Db::name('trans_check')->insert($data);
        if($info){
            return $this->buildSuccess([],'新建成功');
        }else{
            return $this->buildFailed(ReturnCode::ADD_FAILED,'新建失败，请重试!');
        }
    }
    public function submitLoader(){
        $data=[
            'loaderCode'=>input('loaderCode'),
            'loaderName'=>input('loaderName'),
            'contactPerson'=>input('contactPerson'),
            'contactWay'=>input('contactWay'),
            'remark'=>input('remark')
        ];
        $info=Db::name('trans_loader')->insert($data);
        if($info){
            return $this->buildSuccess([],'新建成功');
        }else{
            return $this->buildFailed(ReturnCode::ADD_FAILED,'新建失败，请重试!');
        }
    }
    public function submitMaterial(){
        $data=[
            'materialName'=>input('materialName'),
            'materialNumber'=>input('materialNumber'),
            'specs'=>input('specs'),
            'model'=>input('model'),
            'type'=>input('type'),
            'unitName'=>input('unitName'),
            'circle'=>input('circle'),
            'remark'=>input('remark')
        ];
        $info=Db::name('trans_material')->insert($data);
        if($info){
            return $this->buildSuccess([],'新建成功');
        }else{
            return $this->buildFailed(ReturnCode::ADD_FAILED,'新建失败，请重试!');
        }
    }
    public function submitProjectSeries(){
        $data=[
            'projectSeries'=>input('projectSeries'),
            'createTime'=>input('createTime'),
            'createPerson'=>input('createPerson'),
            'remark'=>input('remark')
        ];
        $info=Db::name('trans_projectseries')->insert($data);
        if($info){
            return $this->buildSuccess([],'新建成功');
        }else{
            return $this->buildFailed(ReturnCode::ADD_FAILED,'新建失败，请重试!');
        }
    }
    public function submitSetting(){
        $data=[
            'projectName'=>input('projectName'),
            'projectCode'=>input('projectCode'),
            'projectType'=>input('projectType'),
            'projectSeries'=>input('projectSeries'),
            'financalOrganization'=>input('financalOrganization'),
            'createTime'=>input('createTime'),
            'status'=>input('status'),
            'address'=>input('address'),
            'progress'=>input('progress'),
            'remark'=>input('remark')
        ];
        $info=Db::name('trans_project')->insert($data);
        if($info){
            return $this->buildSuccess([],'新建成功');
        }else{
            return $this->buildFailed(ReturnCode::ADD_FAILED,'新建失败，请重试!');
        }
    }
    public function submitSupplier(){
        $data=[
            'supplierCode'=>input('supplierCode'),
            'supplierName'=>input('supplierName'),
            'createTime'=>input('createTime')
        ];
        $info=Db::name('trans_supplier')->insert($data);
        if($info){
            return $this->buildSuccess([],'新建成功');
        }else{
            return $this->buildFailed(ReturnCode::ADD_FAILED,'新建失败，请重试!');
        }
    }
    public function submitPallet(){
        $data=[
            'palletName'=>input('palletName'),
            'palletType'=>input('palletType'),
            'palletCode'=>input('palletCode'),
            'warePosition'=>input('warePosition'),
            'remark'=>input('remark')
        ];
        $info=Db::name('trans_pallet')->insert($data);
        if($info){
            return $this->buildSuccess([],'新建成功');
        }else{
            return $this->buildFailed(ReturnCode::ADD_FAILED,'新建失败，请重试!');
        }
    }
    public function submitMaterialUnit(){
        $data=[
            'unitNumber'=>input('unitNumber'),
            'unitName'=>input('unitName'),
            'remark'=>input('remark')
        ];
        $info=Db::name('trans_materialunit')->insert($data);
        if($info){
            return $this->buildSuccess([],'新建成功');
        }else{
            return $this->buildFailed(ReturnCode::ADD_FAILED,'新建失败，请重试!');
        }
    }
    public function submitInventory(){
        $data=[
            'inventoryCode'=>input('inventoryCode'),
            'inventoryName'=>input('inventoryName'),
            'address'=>input('address'),
            'lock'=>input('lock'),
            'contactPerson'=>input('contactPerson'),
            'contactWay'=>input('contactWay'),
            'guardMan'=>input('guardMan'),
            'company'=>input('company'),
            'remark'=>input('remark'),
        ];
        $info=Db::name('trans_inventory')->insert($data);
        if($info){
            return $this->buildSuccess([],'新建成功');
        }else{
            return $this->buildFailed(ReturnCode::ADD_FAILED,'新建失败，请重试!');
        }
    }
    public function submitAdjust(){
        $data=[
            'documentNumber'=>input('documentNumber'),
            'inventory'=>input('inventory'),
            'status'=>input('status'),
            'makePerson'=>input('makePerson'),
            'makeTime'=>input('makeTime')
        ];
        $info=Db::name('trans_adjust')->insert($data);
        if($info){
            return $this->buildSuccess([],'新建成功');
        }else{
            return $this->buildFailed(ReturnCode::ADD_FAILED,'新建失败，请重试!');
        }
    }
    public function submitDamage(){
        $data=[
            'documentNumber'=>input('documentNumber'),
            'inventory'=>input('inventory'),
            'status'=>input('status'),
            'makePerson'=>input('makePerson'),
            'makeTime'=>input('makeTime'),
            'remark'=>input('remark')
        ];
        $info=Db::name('trans_damage')->insert($data);
        if($info){
            return $this->buildSuccess([],'新建成功');
        }else{
            return $this->buildFailed(ReturnCode::ADD_FAILED,'新建失败，请重试!');
        }
    }
    public function submitOutstore(){
        $data=[
            'documentNumber'=>input('documentNumber'),
            'inventory'=>input('inventory'),
            'contackNumber'=>input('contackNumber'),
            'checkStatus'=>input('checkStatus'),
            'outstoreStatus'=>input('outstoreStatus'),
            'makePerson'=>input('makePerson'),
            'makeTime'=>input('makeTime')
            
        ];
        $info=Db::name('trans_outstore')->insert($data);
        if($info){
            return $this->buildSuccess([],'新建成功');
        }else{
            return $this->buildFailed(ReturnCode::ADD_FAILED,'新建失败，请重试!');
        }
    }
}