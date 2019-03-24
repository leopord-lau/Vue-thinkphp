<template>
    <div>
        <div class="container">
            <ul class="ul-1">
                <li class="li-1"><i class="i-1"></i><span class="span-1">所有入库</span><span class="num-1">{{storage.allin}}</span></li>
                <li class="li-2"><i class="i-2"></i><span class="span-2">待验收</span><span class="num-2">{{storage.waitcollect}}</span></li>
                <li class="li-3"><i class="i-3"></i><span class="span-3">所有出库</span><span class="num-3">{{storage.allout}}</span></li>
                <li class="li-4"><i class="i-4"></i><span class="span-4">待分拣</span><span class="num-4">{{storage.waitpickout}}</span></li>
            </ul>
            <ul class="ul-2">
                <li class="li-5"><i class="i-5"></i><span class="span-5">待上架</span><span class="num-5">{{storage.waitup}}</span></li>
                <li class="li-6"><i class="i-6"></i><span class="span-6">已上架</span><span class="num-6">{{storage.up}}</span></li>
                <li class="li-7"><i class="i-7"></i><span class="span-7">待复核</span><span class="num-7">{{storage.waitrecheck}}</span></li>
                <li class="li-8"><i class="i-8"></i><span class="span-8">已出库</span><span class="num-8">{{storage.out}}</span></li>
            </ul>
            <el-col :span="24">
                <el-dropdown class="tools" @command="handleCommand">
                    <span class="el-dropdown-link">
                        物料名称<i class="el-icon-arrow-down el-icon--right"></i>
                    </span>
                    <el-dropdown-menu slot="dropdown">
                        <el-dropdown-item command="1">material 1</el-dropdown-item>
                        <el-dropdown-item command="2">material 2</el-dropdown-item>
                        <el-dropdown-item command="3">material 3</el-dropdown-item>
                        <el-dropdown-item command="4">material 4</el-dropdown-item>
                        <el-dropdown-item command="5">material 5</el-dropdown-item>
                    </el-dropdown-menu>
                </el-dropdown>
                <el-dropdown class="sale">
                    <span class="el-dropdown-link">
                        食品<i class="el-icon-arrow-down el-icon--right"></i>
                    </span>
                    <el-dropdown-menu slot="dropdown">
                        <el-dropdown-item>咖啡</el-dropdown-item>
                    </el-dropdown-menu>
                </el-dropdown>
                <el-dropdown class="time">
                    <span class="el-dropdown-link">
                        本周<i class="el-icon-arrow-down el-icon--right"></i>
                    </span>
                    <el-dropdown-menu slot="dropdown">
                        <el-dropdown-item>本周</el-dropdown-item>
                        <el-dropdown-item>上周</el-dropdown-item>
                        <el-dropdown-item>本月</el-dropdown-item>
                        <el-dropdown-item>上月</el-dropdown-item>
                    </el-dropdown-menu>
                </el-dropdown>
            </el-col>
            <div>
                <div id="main" style="height:350px;width:850px; position: absolute;left:50px;top:300px;"></div>
                <div style="position:absolute;left:900px;top:280px;height:230px; width:230px;" id="shuiwei"></div>
                <div style="position:absolute;left:850px;top:500px;height:230px; width:500px;" id="wendu"></div>
            </div>
        </div>
        <div class="schedule homepage-hook"  style="left:10%;top:650px;position:absolute;"  >
            <el-badge :value="storealert" class="storage-alert">
                <el-button id="1" type="primary" @click="change(1)" plain>存量预警</el-button> 
            </el-badge>
            <el-badge :value="outdatealert" class="outdate-alert">
                <el-button class="outdate-alert" id="2" type="primary" @click="change(2)" plain>过期预警</el-button>
            </el-badge>
            <el-badge :value="waitcheck" class="wait-permission">
                <el-button  id="3" type="primary" @click="change(3)" plain>待审核</el-button> 
            </el-badge>
            <div class="info-tables" style = "top:70px;left:10%;position:absolute;">
                <div  v-if="isShow1">
                <el-table :data="tableData1.slice((currentPage1-1)*pageSize1,currentPage1*pageSize1)" stripe style="width:100%">
                    <el-table-column prop="inventory" label="仓库" width="180"></el-table-column>
                    <el-table-column prop="materialName" label="物料名称" width="180"></el-table-column>
                    <el-table-column prop="materialNumber" label="数量" width="180"></el-table-column>
                    <el-table-column prop="upLimit" label="库存上限" width="180" sortable></el-table-column>
                    <el-table-column prop="downLimit" label="库存下线" width="180" sortable></el-table-column>
                    <el-table-column prop="status" label="状态" width="180" :filters="[{text:'积压',value:'积压'},{text:'缺货',value:'缺货'}]" :filter-method="filterButton" filter-placement="bottom-end">
                        <template slot-scope="scope">
                            <el-button :type="scope.row.status==='积压'?'danger':'warning'" disabled-transtions>{{scope.row.status}}</el-button>
                        </template>
                    </el-table-column>
                </el-table>
                <el-pagination layout="prev,pager,next" @current-change="current_change1"
                        :current-page="currentPage1"
                        :page-size="pageSize1" :total="total1" background></el-pagination>
                </div>
                <div v-if="isShow2">
                <el-table :data="tableData2.slice((currentPage2-1)*pageSize2,currentPage2*pageSize2)" stripe style="width:100%">
                    <el-table-column prop="materialName" label="物料名称" width="180"></el-table-column>
                    <el-table-column prop="batch" label="批次" width="180"></el-table-column>
                    <el-table-column prop="materialNumber" label="数量" width="160"></el-table-column>
                    <el-table-column prop="instoreTime" label="入库时间" width="200"></el-table-column>
                    <el-table-column prop="keepFresh" label="保质期（天）" width="180"></el-table-column>
                    <el-table-column prop="status" label="状态" width="180"  :filters="[{text:'已过期',value:'已过期'},{text:'快过期',value:'快过期'}]" :filter-method="filterButton" filter-placement="bottom-end">
                        <template slot-scope="scope">
                            <el-button :type="scope.row.status==='已过期'?'danger':'warning'" disabled-transtions>{{scope.row.status}}</el-button>
                        </template>
                    </el-table-column>
                </el-table>
                <el-pagination layout="prev,pager,next" @current-change="current_change2"
                        :current-page="currentPage2"
                        :page-size="pageSize2" :total="total2" background></el-pagination>
                </div>
                <div v-if="isShow3">
                <el-table :data="tableData3.slice((currentPage3-1)*pageSize3,currentPage3*pageSize3)" stripe style="width:100%">
                    <el-table-column prop="type" label="类型" width="160"></el-table-column>
                    <el-table-column prop="number" label="数量" width="160"></el-table-column>
                    <el-table-column prop="documentNumber" label="单据号" width="220"></el-table-column>
                    <el-table-column prop="applyer" label="申请人" width="180"></el-table-column>
                    <el-table-column prop="applyTime" label="申请时间" width="180"></el-table-column>
                    <el-table-column label="操作" width="180">
                        <template slot-scope="scope">
                            <el-button size="mini" type="primary" @click="handleCheck(scope.$index, scope.row)">查看</el-button>
                        </template>
                    </el-table-column>
                </el-table>
                <el-pagination layout="prev,pager,next" @current-change="current_change3"
                        :current-page="currentPage3"
                        :page-size="pageSize3" :total="total3" background></el-pagination>
                </div>
            </div>
        </div>
    </div>  
</template>

<script>
import 'echarts-liquidfill'

export default {
    data(){
        return{
            storage:{
                    allin:43,waitcollect:40,allout:706,waitpickout:150,waitup:1623,up:6468,waitrecheck:41646,out:46
            },
            inData: [],
            mainName:'',
            storealert:3,
            outdatealert:4,
            waitcheck:4,
            outData: [],
            inventory:[],
            timeData:[],
            isShow1:true,
            isShow2:false,
            isShow3:false,
            tableData1:[],
                /*   mock数据
                {inventory:'国库',
                materialName:"006",
                number:8,
                maxStorage:5341,
                minStorage:0,
                status:"积压"
                },
                {inventory:'国库',
                materialName:"可乐",
                number:4615,
                maxStorage:146643,
                minStorage:0,
                status:"缺货"
                },
                {inventory:'国库',
                materialName:"扳手",
                number:6434,
                maxStorage:56487,
                minStorage:0,
                status:"积压"
                }
                */
            total1:1000,
            pageSize1:2,
            currentPage1:1,
            tableData2:[],
            total2:1000,
            pageSize2:2,
            currentPage2:1,
            tableData3:[/*
                {
                    type:'入库',
                    number:'469',
                    documentNumber:'RK-108-1813544-18513541',
                    applyer:"令狐冲",
                    applyTime:'2019-03-06 23:01:04',
                },
                {
                    type:'入库',
                    number:'6857',
                    documentNumber:'RK-108-1813544-18513541',
                    applyer:"莱昂纳多",
                    applyTime:'2019-03-06 23:01:04',
                },
                {
                    type:'入库',
                    number:'413',
                    documentNumber:'RK-108-1813544-18513541',
                    applyer:"杰克",
                    applyTime:'2019-03-06 23:01:04',
                }*/
            ],
            total3:100,
            pageSize3:2,
            currentPage3:1,
        }
    },
    mounted(){
        this.handleCommand(1);
        this.change(1);
        var usageRate=this.$echarts.init(document.getElementById('shuiwei'));
        usageRate.setOption({
            title:{text:"货物利用率"},
            series: [{
                type: 'liquidFill',
                data: [0.02, 0.3, 0.2, 0.3],
                radius: '60%',
                color: ['#49d088', '#38b470', '#2aaf66'],
                center: ['50%', '50%'],
                outline: {
                    borderDistance: 5,
                    itemStyle: {
                        borderWidth: 5,
                        borderColor: '#13FDCE',
                    },
                },
                label: {
                    normal: {
                        color: '#00043d',
                        insideColor: '#fff',
                        fontSize: 47
                    }
                },
            }]
        })
        var chart = this.$echarts.init(document.getElementById('main'));
        chart.setOption({
            title:{
                text:this.mainName
            },
            tooltip: {
                trigger: 'axis'
            },
            legend: {
                data: ['入库数量', '出库数量', '剩余库存数量']
            },
            calculable: true,
            xAxis: [{
                type: 'category',
                boundaryGap: false,
                data:[0,0,0,0,0,0,0]
            }],
            yAxis: [{
                type: 'value'
            }],
            series: [
                {
                name: '入库数量',
                    type: 'line',
                    smooth: true,
                    data: [0.6,0.4,0.3,0.8,0.9,0.52,0.48]
                },
                {
                    name: '出库数量',
                    type: 'line',
                    smooth: true,
                    data: [0.1,0.5,0.5,0.9,0.463,0.6,0.645]
                },
                {
                    name: '剩余库存数量',
                    type: 'line',
                    smooth: true,
                    data: [0.7,0.6,0.92,0.41,0.41,0.65,0.5]
                }
            ]
        })
        var chart2 = this.$echarts.init(document.getElementById('wendu'));
        chart2.setOption({
            title:{
                text:'产量'
            },
            tooltip : {
                formatter: "{a} <br/>{b} : {c}%"
                },
                toolbox: {
                    feature: {
                        restore: {},
                        saveAsImage: {}
                    }
                },
            series: [
                {
                    name: '产量',
                    type: 'gauge',
                    detail: {formatter:'30%'},
                    data: [{value: 30, name: '产量'}]
                }
            ]
        })
    },
    created(){
    this.$http.get('api/getInventoryAlert').then((res)=>{
        if(res.data.code===1){
            this.tableData1=res.data.data;
            this.total1=this.tableData1.length
        }else{
            this.$message(res.data.msg)
        }
    })
    },
    methods:{
        handleCommand(command){
            switch(command){
                case 1:
                this.mainName='material 1'
                break;
                case 2:
                this.mainName='material 2'
                break;
                case 3:
                this.mainName='material 3'
                break;
                case 4:
                this.mainName='material 4'
                break;
                case 5:
                this.mainName='material 5'
                break;
            }
        },
        change(index){
            switch (index){
                case 1:
                this.isShow1=true,
                this.isShow2=false,
                this.isShow3=false,
                this.storealert=''
                break;
                case 2:
                this.isShow1=false,
                this.isShow2=true,
                this.isShow3=false,
                this.outdatealert='',
                this.showoutdateAlert()
                break;
                case 3:
                this.isShow1=false,
                this.isShow2=false,
                this.isShow3=true,
                this.waitcheck='',
                this.showwaitCheck()
                break;
            }
        },
        showoutdateAlert(){
            this.$http.get('api/getOutdateAlert').then((res)=>{
                if(res.data.code===1){
                    this.tableData2=res.data.data;
                    this.total2=this.tableData2.length
                }else{
                    this.$message(res.data.msg)
                }
            })
        },
        showoutdateAlert(){
            this.$http.get('api/getWaitCheck').then((res)=>{
                if(res.data.code===1){
                    this.tableData3=res.data.data;
                    this.total3=this.tableData3.length
                }else{
                    this.$message(res.data.msg)
                }
            })
        },
        handleCheck(index,row){
            console.log(index,row)
        },
        filterButton(value, row, column) {
            const property = column['property'];
            return row[property] === value;
        },
        current_change1(currentPage1){
            this.currentPage1=currentPage1
        },
        current_change2(currentPage2){
            this.currentPage2=currentPage2
        },
        current_change3(currentPage3){
            this.currentPage3=currentPage3
        }
    }
}
</script>

<style lang="less">
.container{
    left:10%;
    position: absolute;

.ul-1{ 
   list-style: none; float: left;
   .li-1{
    width:260px;height: 100px; position: absolute;background-color:rgb(240, 85, 111);
    border-radius: 5px;
    .i-1{
        background: url("../../../static/img/icon/home-icon1.png");
        padding-top:40px;
        padding-left: 40px;
        position: absolute;
        top:30px;
        left: 30px;
    }
    .span-1{
        font-weight: 200;
        font-size: 21px;
        color: rgb(235, 232, 232);
        top:20px;
        left: 100px;
        position: absolute;
    }
    .num-1{
        font-size:26px;
        color: #fff;
        top:50px;
        left: 100px;
        position: absolute
    }
   }
   .li-2{
    width:260px;height: 100px; left:325px;  position: absolute;background-color:rgb(80, 118, 241);
    border-radius: 5px;
    .i-2{
        background: url("../../../static/img/icon/home-icon2.png");
        padding-top:40px;
        padding-left: 40px;
        position: absolute;
        top:30px;
        left: 30px;
    }
    .span-2{
        font-weight: 200;
        font-size: 21px;
        color: rgb(235, 232, 232);
        top:20px;
        left: 100px;
        position: absolute;
    }
    .num-2{
        font-size:26px;
        color: #fff;
        top:50px;
        left: 100px;
        position: absolute
    }
   }
   .li-3{
    width:260px;height: 100px; left:615px;  position: absolute;background-color:rgb(80, 241, 179);
    border-radius: 5px;
    .i-3{
        background: url("../../../static/img/icon/home-icon4.png");
        padding-top:40px;
        padding-left: 40px;
        position: absolute;
        top:30px;
        left: 30px;
    }
    .span-3{
        font-weight: 200;
        font-size: 21px;
        color: rgb(235, 232, 232);
        top:20px;
        left: 100px;
        position: absolute;
    }
    .num-3{
        font-size:26px;
        color: #fff;
        top:50px;
        left: 100px;
        position: absolute
    }
   }
   .li-4{
    width:260px;height: 100px; left:905px;  position: absolute;background-color:rgb(35, 102, 4);
    border-radius: 5px;
    .i-4{
        background: url("../../../static/img/icon/home-icon4.png");
        padding-top:40px;
        padding-left: 40px;
        position: absolute;
        top:30px;
        left: 30px;
    }
    .span-4{
        font-weight: 200;
        font-size: 21px;
        color: rgb(235, 232, 232);
        top:20px;
        left: 100px;
        position: absolute;
    }
    .num-4{
        font-size:26px;
        color: #fff;
        top:50px;
        left: 100px;
        position: absolute
    }
   }
}
.ul-2{ 
   list-style: none; float: left; top: 130px;position: absolute;
   .li-5{
    width:260px;height: 100px; position: absolute;background-color:rgb(73, 214, 8);
    border-radius: 5px;
    .i-5{
        background: url("../../../static/img/icon/home-icon1.png");
        padding-top:40px;
        padding-left: 40px;
        position: absolute;
        top:30px;
        left: 30px;
    }
    .span-5{
        font-weight: 200;
        font-size: 21px;
        color: rgb(235, 232, 232);
        top:20px;
        left: 100px;
        position: absolute;
    }
    .num-5{
        font-size:26px;
        color: #fff;
        top:50px;
        left: 100px;
        position: absolute
    }
   }
   .li-6{
    width:260px;height: 100px; left:325px;  position: absolute;background-color:rgb(133, 160, 250);
    border-radius: 5px;
    .i-6{
        background: url("../../../static/img/icon/home-icon2.png");
        padding-top:40px;
        padding-left: 40px;
        position: absolute;
        top:30px;
        left: 30px;
    }
    .span-6{
        font-weight: 200;
        font-size: 21px;
        color: rgb(235, 232, 232);
        top:20px;
        left: 100px;
        position: absolute;
    }
    .num-6{
        font-size:26px;
        color: #fff;
        top:50px;
        left: 100px;
        position: absolute
    }
   }
   .li-7{
    width:260px;height: 100px; left:615px;  position: absolute;background-color:rgb(192, 51, 9);
    border-radius: 5px;
    .i-7{
        background: url("../../../static/img/icon/home-icon4.png");
        padding-top:40px;
        padding-left: 40px;
        position: absolute;
        top:30px;
        left: 30px;
    }
    .span-7{
        font-weight: 200;
        font-size: 21px;
        color: rgb(235, 232, 232);
        top:20px;
        left: 100px;
        position: absolute;
    }
    .num-7{
        font-size:26px;
        color: #fff;
        top:50px;
        left: 100px;
        position: absolute
    }
   }
   .li-8{
    width:260px;height: 100px; left:905px;  position: absolute;background-color:rgb(214, 203, 214);
    border-radius: 5px;
    .i-8{
        background: url("../../../static/img/icon/home-icon4.png");
        padding-top:40px;
        padding-left: 40px;
        position: absolute;
        top:30px;
        left: 30px;
    }
    .span-8{
        font-weight: 200;
        font-size: 21px;
        color: rgb(235, 232, 232);
        top:20px;
        left: 100px;
        position: absolute;
    }
    .num-8{
        font-size:26px;
        color: #fff;
        top:50px;
        left: 100px;
        position: absolute
    }
   }
}
.tools{
    top:280px;
    position: absolute;
    left:50px;
    width: 80px;
    z-index: 44;
}
.sale{
    top:280px;
    position: absolute;
    left:150px;
    width:80px;
    z-index: 44;
}
.time{
    top:280px;
    position: absolute;
    left:240px;
    width:80px;
    z-index: 44;
}
.storage-alert{
    position: absolute;
    left:0px;
}
.outdate-alert{
    left:110px;
    position: absolute;
}
.wait-permission{
    left:220px;
    position: absolute;
}
}
</style>
