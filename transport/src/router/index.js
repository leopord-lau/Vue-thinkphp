import Vue from 'vue'
import Router from 'vue-router'
import Login from '../view/login'
import Index from '../view/index'
import Homepage from '../view/homepage/homepage'
import StorageBuy from '../view/buyOperation/storageBuy'
import BuyConfirm from '../view/buyOperation/BuyConfirm' 
import Buycheck from '../view/buyOperation/Buycheck'
import buyinStorage from '../view/storageOperation/buyInStorage'
import instoragecheck from '../view/storageOperation/inStorageCheck'
import OutStorageManagement from '../view/outStorageOperation/OutStorageManagement'
import PickoutTask from '../view/outStorageOperation/PickoutTask'
import borrow from '../view/StorageManagement/borrow-return'
import DamageManagement from '../view/StorageManagement/DamageManagement'
import AdjustManagement from '../view/StorageManagement/AdjustManagement'
import WarePosition from '../view/calculateOperation/WarePosition'
import WareNumber from '../view/calculateOperation/wareNumber'
import DepartmentManagement from '../view/organization/departmentManagement'
import Loader from '../view/organization/loader'
import Suppler from '../view/organization/suppler'
import client from '../view/organization/client'
import limit from '../view/limitManagement/limit'
import warehouse from '../view/warehouse/warehouse'
import waresection from '../view/warehouse/waresection'
import warepositionsetting from '../view/warehouse/warepositionSetting'
import wareshelf from '../view/warehouse/wareshelf'
import tray from '../view/warehouse/tray'
import material from '../view/material/material'
import kind from '../view/material/kind'
import unit from '../view/material/unit'
import currency from '../view/finance/currency'
import exchangerate from '../view/finance/exchangerate'
import setting from '../view/engineering/setting'
import series from '../view/engineering/series'
import attribute from '../view/engineering/attribute'
import account from '../view/user/account'
import role from '../view/user/role'
import examine from '../view/examine/examine'
import materialquery from '../view/inventoryQuery/material'
import batch from '../view/inventoryQuery/batch'
import inventoryalert from '../view/inventoryAlert/index'
import daysum from '../view/daysumup/index'
import monthsum from '../view/monthsumup/index'
import allsum from '../view/allsumup/index'
import batchinventory from '../view/batchinventory/index'
import top10 from '../view/top10/index'
import bottom10 from '../view/bottom10/index'
Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/login',
      name: 'login',
      component: Login
    },
    {
      path: '/',
      name: 'index',
      component: Index,
      children:[
        {path:'/homepage',name:'homepage',component:Homepage},
        {path:'/storagebuy',name:'storagebuy',component:StorageBuy},
        {path:'/buyconfirm',name:'buyconfirm',component:BuyConfirm},
        {path:'/buycheck',name:'buycheck',component:Buycheck},
        {path:'/buyinstorage',name:'buyinstorage',component:buyinStorage},
        {path:'/instoragecheck',name:'instoragecheck',component:instoragecheck},
        {path:'/outstoragemanagement',name:'outstoragemanagement',component:OutStorageManagement},
        {path:'/pickouttask',name:'pickouttask',component:PickoutTask},
        {path:'/borrowreturn',name:'borrowreturn',component:borrow},
        {path:'/damagemanagement',name:'damangement',component:DamageManagement},
        {path:'/adjustmanagement',name:'adjustmanagement',component:AdjustManagement},
        {path:'/wareposition',name:'wareposition',component:WarePosition},
        {path:'/warenumber',name:'warenumber',component:WareNumber},

        {path:'/basic/department',name:'department',component:DepartmentManagement},
        {path:'/basic/loader',name:'loader',component:Loader},
        {path:'/basic/supplier',name:'supplier',component:Suppler},
        {path:'/basic/client',name:'client',component:client},
        {path:'/basic/limit',name:'limit',component:limit},
        {path:'/basic/warehouse',name:'warehouse',component:warehouse},
        {path:'/basic/warepositionsetting',name:'warepositionsetting',component:warepositionsetting},
        {path:'/basic/waresection',name:'waresection',component:waresection},
        {path:'/basic/wareshelf',name:'wareshelf',component:wareshelf},
        {path:'/basic/tray',name:'tray',component:tray}, 
        {path:'/basic/material',name:'material',component:material},
        {path:'/basic/kind',name:'kind',component:kind},
        {path:'/basic/unit',name:'unit',component:unit},
        {path:'/basic/currency',name:'currency',component:currency},
        {path:'/basic/exchangerate',name:'exchangerate',component:exchangerate},
        {path:'/basic/setting',name:'setting',component:setting},
        {path:'/basic/series',name:'series',component:series},
        {path:'/basic/attribute',name:'attribute',component:attribute},
        {path:'/basic/account',name:'account',component:account},
        {path:'/basic/role',name:'role',component:role},
        {path:'/basic/examine',name:'examine',component:examine},

        {path:'/report/materialquery',name:'materialquery',component:materialquery},
        {path:'/report/batch',name:'batch',component:batch},
        {path:'/report/inventoryalert',name:'inventoryalert',component:inventoryalert},
        {path:'/report/daysum',name:'daysum',component:daysum},
        {path:'/report/monthsum',name:'monthsum',component:monthsum},
        {path:'/report/allsum',name:'allsum',component:allsum},
        {path:'/report/batchinventory',name:"batchinventory",component:batchinventory},
        {path:'/report/top10',name:'top10',component:top10},
        {path:'/report/bottom10',name:'bottom10',component:bottom10}
      ]
    }
  ]
})
