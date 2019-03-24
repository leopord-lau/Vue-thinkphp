CREATE TABLE `trans_materialtype` (
 `id` int AUTO_INCREMENT PRIMARY KEY,
 `type` CHARACTER(20) NOT NULL COMMENT '物料类型',
 `remark` CHARACTER(50) DEFAULT NULL COMMENT '备注'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_materialtype`(`type`) VALUES ('type1');
INSERT INTO `trans_materialtype`(`type`) VALUES ('type2');
INSERT INTO `trans_materialtype`(`type`) VALUES ('type3');

CREATE TABLE `trans_materialUnit` (
 `unitNumber` CHARACTER(20) NOT NULL COMMENT '单位编号',
 `unitName` CHARACTER(50) NOT NULL COMMENT '单位名称',
`remark` CHARACTER(50) DEFAULT NULL COMMENT '备注'
)ENGINE=myisam DEFAULT CHARSET=utf8;
 
INSERT INTO `trans_materialUnit`(`unitNumber`, `unitName`) VALUES ('unit-1','kg');
INSERT INTO `trans_materialUnit`(`unitNumber`, `unitName`) VALUES ('unit-2','ea');
INSERT INTO `trans_materialUnit`(`unitNumber`, `unitName`) VALUES ('unit-1','pc')

CREATE TABLE `trans_material` (
 `id` int AUTO_INCREMENT PRIMARY KEY,
 `materialName` CHARACTER(20) NOT NULL COMMENT '物料名称',
 `materialNumber` CHARACTER(50) NOT NULL COMMENT '物料编码',
`specs` CHARACTER(10) NOT NULL COMMENT '规格',
 `model` CHARACTER(10) NOT NULL COMMENT '型号',
  `type` CHARACTER(10) NOT NULL COMMENT '物料类型',
 `unitName` CHARACTER(20) NOT NULL COMMENT '单位名称',
    `circle` CHARACTER(30) NOT NULL COMMENT '采购周期',
    `remark` CHARACTER(50) DEFAULT NULL COMMENT '备注'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_material`(`materialName`, `materialNumber`, `specs`, `model`, `type`, `unitName`, `circle`, `remark`) VALUES ('material 1','MA-1203-153','small','model 1','type 1','kg','1个季度','none');
INSERT INTO `trans_material`(`materialName`, `materialNumber`, `specs`, `model`, `type`, `unitName`, `circle`, `remark`) VALUES ('material 2','MA-1453-543','small','model 4','type 2','kg','4个季度','none');
INSERT INTO `trans_material`(`materialName`, `materialNumber`, `specs`, `model`, `type`, `unitName`, `circle`, `remark`) VALUES ('material 3','MA-1203-531','small','model 2','type 3','ea','1个季度','none');
INSERT INTO `trans_material`(`materialName`, `materialNumber`, `specs`, `model`, `type`, `unitName`, `circle`, `remark`) VALUES ('material 4','MA-1203-942','small','model 3','type 1','pc','2个季度','none');
INSERT INTO `trans_material`(`materialName`, `materialNumber`, `specs`, `model`, `type`, `unitName`, `circle`, `remark`) VALUES ('material 5','MA-1203-147','small','model 1','type 1','kg','1个季度','none');
INSERT INTO `trans_material`(`materialName`, `materialNumber`, `specs`, `model`, `type`, `unitName`, `circle`, `remark`) VALUES ('material 6','MA-1505-357','small','model 1','type 4','pc','1个季度','none');

CREATE TABLE `trans_applyBuy` (
 `id` int AUTO_INCREMENT PRIMARY KEY,
 `materialName` CHARACTER(20) NOT NULL COMMENT '物料名称',
 `applyPerson` CHARACTER(20) NOT NULL COMMENT '请购人',
 `applyNumber` CHARACTER(200) NOT NULL COMMENT '请购数量',
 `applyinventory` CHARACTER(20) NOT NULL COMMENT "请购仓库",
 `projectNumber` CHARACTER(20) NOT NULL COMMENT '工程编号',
 `applyTime` datetime COMMENT '请购时间',
 `checkName` CHARACTER(10) NOT NULL COMMENT '审核人',
 `checkTime` datetime COMMENT '审核时间',
 `buyTime` datetime COMMENT '采购时间',
 `receivePerson` CHARACTER(10) NOT NULL COMMENT '收料人',
 `receiveTime` datetime COMMENT '到货时间'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_applyBuy`( `materialName`, `applyPerson`, `applyNumber`, `applyinventory`, `projectNumber`, `checkName`, `receivePerson`) VALUES ('material 1','leopord','6500','仓库 1','PRO-135-1532','jack','mark');
INSERT INTO `trans_applyBuy`( `materialName`, `applyPerson`, `applyNumber`, `applyinventory`, `projectNumber`, `checkName`, `receivePerson`) VALUES ('material 2','leopord','100','仓库 1','PRO-412-4252','jack','mark');
INSERT INTO `trans_applyBuy`( `materialName`, `applyPerson`, `applyNumber`, `applyinventory`, `projectNumber`, `checkName`, `receivePerson`) VALUES ('material 3','leopord','3000','仓库 2','PRO-412-1332','jack','mark');
INSERT INTO `trans_applyBuy`( `materialName`, `applyPerson`, `applyNumber`, `applyinventory`, `projectNumber`, `checkName`, `receivePerson`) VALUES ('material 4','leopord','1500','仓库 3','PRO-423-1531','jack','mark');
INSERT INTO `trans_applyBuy`( `materialName`, `applyPerson`, `applyNumber`, `applyinventory`, `projectNumber`, `checkName`, `receivePerson`) VALUES ('material 5','leopord','2400','仓库 3','PRO-645-1752','jack','mark');
INSERT INTO `trans_applyBuy`( `materialName`, `applyPerson`, `applyNumber`, `applyinventory`, `projectNumber`, `checkName`, `receivePerson`) VALUES ('material 6','leopord','3500','仓库 1','PRO-167-1725','jack','mark');

CREATE TABLE `trans_inventoryAlert` (
`inventory` CHARACTER(10) NOT NULL COMMENT '仓库',
`materialName` CHARACTER(20) NOT NULL COMMENT '物料名称',
`materialNumber` CHARACTER(200) NOT NULL COMMENT '数量',
`upLimit` CHARACTER(20) NOT NULL COMMENT '库存上限',
`downLimit` CHARACTER(20) NOT NULL COMMENT '库存下限',
`status` CHARACTER(20) NOT NULL COMMENT '状态'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_inventoryAlert`(`inventory`, `materialName`, `materialNumber`, `upLimit`, `downLimit`, `status`) VALUES ('仓库 1','material 1','8000','10000','0','积压');
INSERT INTO `trans_inventoryAlert`(`inventory`, `materialName`, `materialNumber`, `upLimit`, `downLimit`, `status`) VALUES ('仓库 1','material 2','100','10000','0','缺货');
INSERT INTO `trans_inventoryAlert`(`inventory`, `materialName`, `materialNumber`, `upLimit`, `downLimit`, `status`) VALUES ('仓库 2','material 3','5000','10000','0','积压');
INSERT INTO `trans_inventoryAlert`(`inventory`, `materialName`, `materialNumber`, `upLimit`, `downLimit`, `status`) VALUES ('仓库 3','material 4','200','10000','0','缺货');
INSERT INTO `trans_inventoryAlert`(`inventory`, `materialName`, `materialNumber`, `upLimit`, `downLimit`, `status`) VALUES ('仓库 3','material 5','7900','10000','0','积压');

CREATE TABLE `trans_outdateAlert` (
`materialName` CHARACTER(20) NOT NULL COMMENT '物料名称',
`batch` CHARACTER(10) NOT NULL COMMENT '批次',
`materialNumber` CHARACTER(200) NOT NULL COMMENT '数量',
`instoreTime` datetime COMMENT '入库时间',
`keepFresh` CHARACTER(10) NOT NULL COMMENT '保质期（天）',
`status` CHARACTER(20) NOT NULL COMMENT '状态'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_outdateAlert`(`materialName`, `batch`, `materialNumber`, `keepFresh`, `status`) VALUES ('material 6','第二批','3000','20','已过期');

CREATE TABLE `trans_waitCheck` (
`type` CHARACTER(10) NOT NULL COMMENT '类型',
`number` CHARACTER(20) NOT NULL COMMENT '数量',
`documentNumber` CHARACTER(20) NOT NULL COMMENT '单据号',
`applyName` CHARACTER(20) NOT NULL COMMENT '申请人',
`applyTime` datetime COMMENT '申请时间'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_waitCheck`(`type`, `number`, `documentNumber`, `applyName`) VALUES ('type 1','2','DOC-4653-142','jack');
INSERT INTO `trans_waitCheck`(`type`, `number`, `documentNumber`, `applyName`) VALUES ('type 2','1','DOC-5413-362','mary');

CREATE TABLE `trans_confirmBuy` (
`materialName` CHARACTER(20) NOT NULL COMMENT '物料名称',
`applyCode` CHARACTER(20) NOT NULL COMMENT '请购编码',
    `specs` CHARACTER(20) NOT NULL COMMENT '规格',
    `type` CHARACTER(20) NOT NULL COMMENT '型号',
    `applyNumber` CHARACTER(200) NOT NULL COMMENT '请购数量',
    `applyPerson` CHARACTER(20) NOT NULL COMMENT '请购人',
    `projectNumber` CHARACTER(20) NOT NULL COMMENT '工程编号',
    `applyTime` datetime COMMENT '请购时间',
    `checkPerson` CHARACTER(10) NOT NULL COMMENT '审核人',
    `buyStatus` CHARACTER(10) NOT NULL COMMENT '采购状态',
    `buyPerson` CHARACTER(10) NOT NULL COMMENT '采购人'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_confirmBuy`(`materialName`, `applyCode`, `specs`, `type`, `applyNumber`, `applyPerson`, `projectNumber`, `checkPerson`, `buyStatus`, `buyPerson`) VALUES ('material 3','CO-562-453','MA-1542-453','small','3000','mary','PO-5123-21','leopord','进行中','jack');

CREATE TABLE `trans_instore` (
    `documentNumber` CHARACTER(20) NOT NULL COMMENT '单据号',
    `inventory` CHARACTER(10) NOT NULL COMMENT '仓库',
    `loader` CHARACTER(10) NOT NULL COMMENT '货主',
    `contackNumber` CHARACTER(20) NOT NULL COMMENT '合同号',
    `checkStatus` CHARACTER(10) NOT NULL COMMENT '审核状态',
    `instoreStatus` CHARACTER(10) NOT NULL COMMENT '入库状态',
    `makePerson` CHARACTER(10) NOT NULL COMMENT '制单人',
    `makeTime` datetime COMMENT '制单时间',
    `checkPerson` CHARACTER(10) NOT NULL COMMENT '审核人',
    `remark` CHARACTER(50) NOT NULL COMMENT '备注'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_instore`(`documentNumber`, `inventory`, `loader`, `contackNumber`, `checkStatus`, `instoreStatus`, `makePerson`, `checkPerson`, `remark`) VALUES ('DOC-512-2156','仓库3','阿里巴巴','CON-145-612','审核中','未入库','mark','leopord','none');
INSERT INTO `trans_instore`(`documentNumber`, `inventory`, `loader`, `contackNumber`, `checkStatus`, `instoreStatus`, `makePerson`, `checkPerson`, `remark`) VALUES ('DOC-512-5346','仓库1','腾讯','CON-623-112','已完成','已入库','lucy','leopord','none');
INSERT INTO `trans_instore`(`documentNumber`, `inventory`, `loader`, `contackNumber`, `checkStatus`, `instoreStatus`, `makePerson`, `checkPerson`, `remark`) VALUES ('DOC-534-5156','仓库2','恒大','CON-135-642','审核中','未入库','mark','leopord','none');

CREATE TABLE `trans_outstore` (
    `documentNumber` CHARACTER(20) NOT NULL COMMENT '单据号',
    `inventory` CHARACTER(10) NOT NULL COMMENT '仓库',
    `contackNumber` CHARACTER(20) NOT NULL COMMENT '合同号',
    `checkStatus` CHARACTER(10) NOT NULL COMMENT '审核状态',
    `outstoreStatus` CHARACTER(10) NOT NULL COMMENT '出库状态',
    `makePerson` CHARACTER(10) NOT NULL COMMENT '制单人',
    `makeTime` datetime COMMENT '制单时间'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_outstore`(`documentNumber`, `inventory`, `contackNumber`, `checkStatus`, `outstoreStatus`, `makePerson`) VALUES ('DOC-1236-365','仓库2','CON-553-123','审核中','未出库','jack');
INSERT INTO `trans_outstore`(`documentNumber`, `inventory`, `contackNumber`, `checkStatus`, `outstoreStatus`, `makePerson`) VALUES ('DOC-1236-356','仓库2','CON-483-123','已完成','已出库','jack');

CREATE TABLE `trans_pickout` (
    `documentNumber` CHARACTER(20) NOT NULL COMMENT '出库单据号',
    `wareSection` CHARACTER(10) NOT NULL COMMENT '货区',
    `wareShelf` CHARACTER(10) NOT NULL COMMENT '货架',
    `warePosition` CHARACTER(10) NOT NULL COMMENT '货位',
    `cols` CHARACTER(10) NOT NULL COMMENT '列',
    `rows` CHARACTER(10) NOT NULL COMMENT '行',
    `materialName` CHARACTER(10) NOT NULL COMMENT '物料名称',
    `batch` CHARACTER(10) NOT NULL COMMENT '批次',
    `code` CHARACTER(10) NOT NULL COMMENT '条码',
    `number` CHARACTER(10) NOT NULL COMMENT '数量',
    `pickoutBatch` CHARACTER(10) NOT NULL COMMENT '分拣批次',
    `status` CHARACTER(10) NOT NULL COMMENT '状态'
)ENGINE=myisam DEFAULT CHARSET=utf8;


INSERT INTO `trans_pickout`(`documentNumber`, `wareSection`, `wareShelf`, `warePosition`, `cols`, `rows`, `materialName`, `batch`, `code`, `number`, `pickoutBatch`, `status`) VALUES ('DOC-4562-156','SEC-12-02','SHE-03','POS-01','3','5','material 3','第一批','3214569524','3500','第三批','已完成');
INSERT INTO `trans_pickout`(`documentNumber`, `wareSection`, `wareShelf`, `warePosition`, `cols`, `rows`, `materialName`, `batch`, `code`, `number`, `pickoutBatch`, `status`) VALUES ('DOC-7854-126','SEC-22-21','SHE-06','POS-11','11','15','material 2','第二批','321451516','6500','第五批','未完成');

CREATE TABLE `trans_damage` (
    `documentNumber` CHARACTER(20) NOT NULL COMMENT '单据号',
    `inventory` CHARACTER(10) NOT NULL COMMENT '仓库',
    `status` CHARACTER(10) NOT NULL COMMENT '状态',
    `makePerson` CHARACTER(10) NOT NULL COMMENT '制单人',
    `makeTime` datetime COMMENT '制单时间',
    `remark` CHARACTER(100) NOT NULL COMMENT '备注'
)ENGINE=myisam DEFAULT CHARSET=utf8;

CREATE TABLE `trans_adjust` (
    `documentNumber` CHARACTER(20) NOT NULL COMMENT '单据号',
    `inventory` CHARACTER(10) NOT NULL COMMENT '仓库',
    `status` CHARACTER(10) NOT NULL COMMENT '状态',
    `makePerson` CHARACTER(10) NOT NULL COMMENT '制单人',
    `makeTime` datetime COMMENT '制单时间'
)ENGINE=myisam DEFAULT CHARSET=utf8;


CREATE TABLE `trans_warePosition` (
    `wareSection` CHARACTER(10) NOT NULL COMMENT '货区',
    `wareShelf` CHARACTER(10) NOT NULL COMMENT '货架',
    `warePosition` CHARACTER(10) NOT NULL COMMENT '货位',
    `pallet` CHARACTER(10) NOT NULL COMMENT '托盘',
    `materialName` CHARACTER(10) NOT NULL COMMENT '物料名称',
    `batch` CHARACTER(10) NOT NULL COMMENT '批次',
    `accountNumber` CHARACTER(10) NOT NULL COMMENT '账面数量',
    `calculateNumber` CHARACTER(10) NOT NULL COMMENT '盘点数量'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_warePosition`(`wareSection`, `wareShelf`, `warePosition`, `pallet`, `materialName`, `batch`, `accountNumber`, `calculateNumber`) VALUES ('SEC-1465-213','SHE-126-34','POS-213-12','无','material 4','第一批','6500','6450')

CREATE TABLE `trans_storecount` (
    `materialName` CHARACTER(10) NOT NULL COMMENT '物料名称',
    `batch` CHARACTER(10) NOT NULL COMMENT '批次',
    `status` CHARACTER(10) NOT NULL COMMENT '状态',
    `accountNumber` CHARACTER(10) NOT NULL COMMENT '账面数量',
    `firstCountNumber` CHARACTER(10) NOT NULL COMMENT '初盘数量',
    `firstCountPerson` CHARACTER(10) NOT NULL COMMENT '初盘人员',
    `firstCountTime` datetime COMMENT '初盘时间',
    `reCountNumber` CHARACTER(10) NOT NULL COMMENT '复盘数量',
    `reCountPerson` CHARACTER(10) NOT NULL COMMENT '复盘人员',
    `reCountTime` datetime COMMENT '复盘时间'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_storecount`(`materialName`, `batch`, `status`, `accountNumber`, `firstCountNumber`, `firstCountPerson`, `firstCountTime`, `reCountNumber`, `reCountPerson`) VALUES ('metarial 2','第五批','缺货','120','120','jerry','2018-12-09','120','spell')

CREATE TABLE `trans_department` (
    `departmentName` CHARACTER(10) NOT NULL COMMENT '部门名称',
    `superDepartment` CHARACTER(10) NOT NULL COMMENT '上级部门',
    `remark` CHARACTER(100) NOT NULL COMMENT '备注'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_department`(`departmentName`, `superDepartment`, `remark`) VALUES ('市场营销部门','行政部门','none');

CREATE TABLE `trans_loader` (
    `loaderCode` CHARACTER(10) NOT NULL COMMENT '货主编号',
    `loaderName` CHARACTER(10) NOT NULL COMMENT '货主名称',
    `contactPerson` CHARACTER(11) NOT NULL COMMENT '联系人',
    `contactWay` CHARACTER(10) NOT NULL COMMENT '联系方式',
    `remark` CHARACTER(100) NOT NULL COMMENT '备注'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_loader`(`loaderCode`, `loaderName`, `contactPerson`, `contactWay`, `remark`) VALUES ('LOA-213','阿里巴巴','马云','123456789','none');
INSERT INTO `trans_loader`(`loaderCode`, `loaderName`, `contactPerson`, `contactWay`, `remark`) VALUES ('LOA-569','腾讯','马化腾','456123789','none');

CREATE TABLE `trans_supplier` (
    `supplierCode` CHARACTER(10) NOT NULL COMMENT '供应商编号',
    `supplierName` CHARACTER(10) NOT NULL COMMENT '供应商名称',
    `createTime` datetime COMMENT '创建时间'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_supplier`(`supplierCode`, `supplierName`) VALUES ('SUP-321456','亚马逊');
INSERT INTO `trans_supplier`(`supplierCode`, `supplierName`) VALUES ('SUP-521364','欧米茄')

CREATE TABLE `trans_client` (
    `clientCode` CHARACTER(20) NOT NULL COMMENT '客户编号',
    `codeName` CHARACTER(10) NOT NULL COMMENT '客户名称',
    `address` CHARACTER(100) NOT NULL COMMENT '地址',
    `contactPerson` CHARACTER(10) NOT NULL COMMENT '联系人',
    `contactPhone` CHARACTER(20) NOT NULL COMMENT '联系电话',
    `email` CHARACTER(50) NOT NULL COMMENT '邮箱',
    `fax` CHARACTER(20) NOT NULL COMMENT '传真',
    `createTime` datetime COMMENT '创建时间',
    `remark` CHARACTER(100) NOT NULL COMMENT '备注'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_client`(`clientCode`, `codeName`, `address`, `contactPerson`, `contactPhone`, `email`, `fax`,`remark`) VALUES ('CLI-6651-632','保洁','广州宝洁公司','刘董','123789456','123@163.com','FAX-512-314','none')

CREATE TABLE `trans_inventory` (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `inventoryCode` CHARACTER(20) NOT NULL COMMENT '仓库编码',
    `inventoryName` CHARACTER(20) NOT NULL COMMENT '仓库名称',
    `address` CHARACTER(200) NOT NULL COMMENT '地址',
    `lock` CHARACTER(20) NOT NULL COMMENT '电子锁',
    `contactPerson` CHARACTER(20) NOT NULL COMMENT '联系人',
    `contactWay` CHARACTER(20) NOT NULL COMMENT '联系方式',
    `guardMan` CHARACTER(20) NOT NULL COMMENT '仓管员',
    `company` CHARACTER(20) NOT NULL COMMENT '公司',
    `remark` CHARACTER(200) NOT NULL COMMENT '备注'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_inventory`( `inventoryCode`, `inventoryName`, `address`, `lock`, `contactPerson`, `contactWay`, `guardMan`, `company`, `remark`) VALUES ('INV-1235','仓库 1','广州','1','mark','2222222','rookie','国家仓储中心','none');
INSERT INTO `trans_inventory`( `inventoryCode`, `inventoryName`, `address`, `lock`, `contactPerson`, `contactWay`, `guardMan`, `company`, `remark`) VALUES ('INV-6324','仓库 2','广州','1','surren','351222','air','广东省仓储中心','none');
INSERT INTO `trans_inventory`( `inventoryCode`, `inventoryName`, `address`, `lock`, `contactPerson`, `contactWay`, `guardMan`, `company`, `remark`) VALUES ('INV-4123','仓库 3','广州','1','alex','2212142','cokie','运输中心','none');

CREATE TABLE `trans_warePositionSetting` (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `warePositionCode` CHARACTER(20) NOT NULL COMMENT '货位编码',
    `warePositionName` CHARACTER(20) NOT NULL COMMENT '货位名称',
    `status` CHARACTER(20) NOT NULL COMMENT '状态',
    `wareShelf`  CHARACTER(20) NOT NULL COMMENT '货架',
    `cols`  CHARACTER(20) NOT NULL COMMENT '列',
    `rows` CHARACTER(20) NOT NULL COMMENT '行',
    `remark`  CHARACTER(20) NOT NULL COMMENT '备注'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_warePositionSetting`(`warePositionCode`, `warePositionName`, `status`, `wareShelf`, `cols`, `rows`, `remark`) VALUES ('POS-123456','position 1','有货','SHE-123-64','3','0','none');
INSERT INTO `trans_warePositionSetting`(`warePositionCode`, `warePositionName`, `status`, `wareShelf`, `cols`, `rows`, `remark`) VALUES ('POS-654741','position 2','停用','SHE-653-64','13','10','none');

CREATE TABLE `trans_pallet` (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `palletName` CHARACTER(20) NOT NULL COMMENT '托盘名称',
    `palletType` CHARACTER(20) NOT NULL COMMENT '托盘类型',
    `palletCode` CHARACTER(20) NOT NULL COMMENT '托盘编码',
    `warePosition` CHARACTER(20) NOT NULL COMMENT '所在货位',
    `remark` CHARACTER(200) NOT NULL COMMENT '备注'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_pallet`(`palletName`, `palletType`, `palletCode`, `warePosition`, `remark`) VALUES ('pallet 1','type 1','PAL-122','POS-123456','none')

CREATE TABLE `trans_project` (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `projectName` CHARACTER(20) NOT NULL COMMENT '工程名称',
    `projectCode` CHARACTER(20) NOT NULL COMMENT '工程编号',
    `projectType` CHARACTER(20) NOT NULL COMMENT '工程类别',
    `ProjectSeries` CHARACTER(20) NOT NULL COMMENT '工程系列',
    `financalOrganization` CHARACTER(20) NOT NULL COMMENT '财务组织',
    `createTime` datetime COMMENT '创建时间',
    `status` CHARACTER(20) NOT NULL COMMENT '状态',
    `address` CHARACTER(200) NOT NULL COMMENT '地址',
    `startTime` CHARACTER(20) NOT NULL COMMENT '开工时间',
    `progress` CHARACTER(20) NOT NULL COMMENT '进度',
    `remark` CHARACTER(20) DEFAULT NULL COMMENT '备注'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_project`(`projectName`, `projectCode`, `projectType`, `ProjectSeries`, `financalOrganization`, `status`, `address`, `startTime`, `progress`, `remark`) VALUES ('project 1','PRO-1235-543','big','-','中国银行','进行中','广州','2019-03-20','30','none');
INSERT INTO `trans_project`(`projectName`, `projectCode`, `projectType`, `ProjectSeries`, `financalOrganization`, `status`, `address`, `startTime`, `progress`, `remark`) VALUES ('project 2','PRO-6545-541','small','-','中国银行','已完工','广州','2019-03-20','100','none');

CREATE TABLE `trans_projectType` (
    `projectType` CHARACTER(20) NOT NULL COMMENT '工程类别',
    `createTime`  datetime COMMENT '创建时间',
    `createPerson`  CHARACTER(20) NOT NULL COMMENT '创建人',
    `remark` CHARACTER(200) NOT NULL COMMENT '备注'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_projectType`(`projectType`, `createPerson`, `remark`) VALUES ('type 1','leopord','none');
INSERT INTO `trans_projectType`(`projectType`, `createPerson`, `remark`) VALUES ('type 2','leopord','none');

CREATE TABLE `trans_projectSeries` (
    `projectSeries` CHARACTER(20) NOT NULL COMMENT '工程系列',
    `createTime`  datetime COMMENT '创建时间',
    `createPerson`  CHARACTER(20) NOT NULL COMMENT '创建人',
    `remark` CHARACTER(200) NOT NULL COMMENT '备注'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_projectSeries`(`projectSeries`, `createPerson`, `remark`) VALUES ('series 1','leopord','none');

CREATE TABLE `trans_role` (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `roleName` CHARACTER(20) NOT NULL COMMENT '角色名称',
    `roleLevel` CHARACTER(20) NOT NULL COMMENT '角色级别',
    `superRoleId` CHARACTER(20) NOT NULL COMMENT '上级角色ID',
    `roleDescription` CHARACTER(20) NOT NULL COMMENT '角色描述',
    `belongInstitution` CHARACTER(20) NOT NULL COMMENT '所属机构',
    `createTime` datetime COMMENT '创建时间'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_role`(`roleName`, `roleLevel`, `superRoleId`, `roleDescription`, `belongInstitution`) VALUES ('leopord','CEO','none','董事长','institution 1')

CREATE TABLE `trans_check` (
    `checkCode` CHARACTER(20) NOT NULL COMMENT '审核流编码',
    `checkName` CHARACTER(20) NOT NULL COMMENT '审核名称',
    `status` CHARACTER(20) NOT NULL COMMENT '状态',
    `remark` CHARACTER(200) DEFAULT NULL COMMENT '备注'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_check`(`checkCode`, `checkName`, `status`, `remark`) VALUES ('CHE-1265-123','check 1','启用中','none');
INSERT INTO `trans_check`(`checkCode`, `checkName`, `status`, `remark`) VALUES ('CHE-6541-246','check 2','停用中','none');

CREATE TABLE `trans_batchStore` (
    `inventoryName` CHARACTER(20) NOT NULL COMMENT '仓库名称',
    `loader` CHARACTER(20) NOT NULL COMMENT '货主',
    `materialName` CHARACTER(20) NOT NULL COMMENT '物料编码',
    `batch` CHARACTER(20) NOT NULL COMMENT '批次',
    `number` CHARACTER(20) NOT NULL COMMENT '数量',
    `unit` CHARACTER(20) NOT NULL COMMENT '单位'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_batchStore`(`inventoryName`, `loader`, `materialName`, `batch`, `number`, `unit`) VALUES ('仓库 1','阿里巴巴','metarial 1','第四批','6540','kg');
INSERT INTO `trans_batchStore`(`inventoryName`, `loader`, `materialName`, `batch`, `number`, `unit`) VALUES ('仓库 2','腾讯','metarial 3','第六批','9546','ea');
INSERT INTO `trans_batchStore`(`inventoryName`, `loader`, `materialName`, `batch`, `number`, `unit`) VALUES ('仓库 3','阿里巴巴','metarial 4','第一批','7644','pc');

CREATE TABLE `trans_materialStore` (
    `materialType` CHARACTER(20) NOT NULL COMMENT '物料类型',
    `materialCode` CHARACTER(20) NOT NULL COMMENT '物料编码',
    `materialName` CHARACTER(20) NOT NULL COMMENT '物料名称',
    `specs` CHARACTER(20) NOT NULL COMMENT '规格',
    `number` CHARACTER(20) NOT NULL COMMENT '数量',
    `unitName` CHARACTER(20) NOT NULL COMMENT '单位名称',
    `inventoryName` CHARACTER(20) NOT NULL COMMENT '仓库名称'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_materialStore`(`materialType`, `materialCode`, `materialName`, `specs`, `number`, `unitName`, `inventoryName`) VALUES ('type 1','MA-1452-126','material 1','specs 1','3560','kg','仓库 1');

CREATE TABLE `trans_sumup` (
    `materialName` CHARACTER(20) NOT NULL COMMENT '物料名称',
    `specs` CHARACTER(20) NOT NULL COMMENT '规格',
    `beginNumber` CHARACTER(20) NOT NULL COMMENT '开始库存',
    `instoreNumber` CHARACTER(20) NOT NULL COMMENT '入库数量',
    `outstoreNumber` CHARACTER(20) NOT NULL COMMENT '出库数量',
    `endNumber` CHARACTER(20) NOT NULL COMMENT '结束库存',
    `damageNumber` CHARACTER(20) NOT NULL COMMENT '损益量',
    `unitName` CHARACTER(20) NOT NULL COMMENT '单位',
    `beginTime` CHARACTER(20) NOT NULL COMMENT '开始时间',
    `endTime` datetime COMMENT '结束时间'
)ENGINE=myisam DEFAULT CHARSET=utf8;

INSERT INTO `trans_sumup`(`materialName`, `specs`, `beginNumber`, `instoreNumber`, `outstoreNumber`, `endNumber`, `damageNumber`, `unitName`, `beginTime`) VALUES ('material 1','specs 1','3500','5000','7000','1500','0','kg','2019-03-20')

CREATE TABLE `trans_user`(
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `username` CHARACTER(10) NOT NULL COMMENT '用户名',
    `password` CHARACTER(10) NOT NULL COMMENT '密码'
)ENGINE=myisam DEFAULT CHARSET=utf8;
