<?php
namespace app\index\controller;

use app\util\ReturnCode;
use think\Db;
use app\index\controller\Base;

class Info extends Base{
    public function getInventoryAlert(){
        $inventoryalertInfo=Db::name('trans_inventoryalert')->select();
        if(empty($inventoryalertInfo)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($inventoryalertInfo,'获取信息成功');
    }
    public function getOutdateAlert(){
        $outdatealertInfo=Db::name('trans_outdatealert')->select();
        if(empty($outdatealertInfo)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($outdatealertInfo,'获取信息成功');
    }
    public function getWaitCheck(){
        $outdatealertInfo=Db::name('trans_waitcheck')->select();
        if(empty($outdatealertInfo)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($outdatealertInfo,'获取信息成功');
    }
    public function getAdjust(){
        $Info=Db::name('trans_adjust')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getApplyBuy(){
        $Info=Db::name('trans_applybuy')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getBatchStore(){
        $Info=Db::name('trans_batchstore')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getCheck(){
        $Info=Db::name('trans_check')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getClient(){
        $Info=Db::name('trans_client')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getConfirmBuy(){
        $Info=Db::name('trans_confirmBuy')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getDamage(){
        $Info=Db::name('trans_damage')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getDepartment(){
        $Info=Db::name('trans_department')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getInstore(){
        $Info=Db::name('trans_instore')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getInventory(){
        $Info=Db::name('trans_inventory')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getLoader(){
        $Info=Db::name('trans_loader')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getMaterial(){
        $Info=Db::name('trans_material')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getMaterialStore(){
        $Info=Db::name('trans_materialstore')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getMaterialType(){
        $Info=Db::name('trans_materialtype')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getMaterialUnit(){
        $Info=Db::name('trans_materialunit')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getOutstore(){
        $Info=Db::name('trans_outstore')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getPallet(){
        $Info=Db::name('trans_pallet')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getPickout(){
        $Info=Db::name('trans_pickout')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getProject(){
        $Info=Db::name('trans_project')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getProjectSeries(){
        $Info=Db::name('trans_projectseries')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getProjectType(){
        $Info=Db::name('trans_projecttype')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getRole(){
        $Info=Db::name('trans_role')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getStoreCount(){
        $Info=Db::name('trans_storecount')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getSumup(){
        $Info=Db::name('trans_sumup')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getSupplier(){
        $Info=Db::name('trans_supplier')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getWareposition(){
        $Info=Db::name('trans_wareposition')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
    public function getWarepositionSetting(){
        $Info=Db::name('trans_warepositionsetting')->select();
        if(empty($Info)){
            return $this->buildFailed(ReturnCode::LOGIN_ERROR,'获取信息失败');
        }
        return $this->buildSuccess($Info,'获取信息成功');
    }
}