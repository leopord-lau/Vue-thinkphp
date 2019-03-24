import $ from 'jQuery';


(function () {

    let $setTimeout = null;
    let ec = window.echarts;
    const BRANCH_NAME = '全国';
    var $chart = null;
    var data = null;
    var option = null;
    // 初始化地图实力
    setTimeout(() => {
        let $vue = new Vue({
                el: '.main-hook',
                data: {
                    boxs: {
                        box1: {show: true, hook: '.box1-hook', lock: true, url: '/back/homepage/page', params: {}},
                        box2: {show: false, hook: '.box2-hook', url: '', params: {}},
                        box3: {show: false, hook: '.box3-hook', url: '', params: {}},
                        box4: {show: false, hook: '.box4-hook', url: '', params: {}}
                    },

                    itemItems:[],
                    timeItems:[],
                    typeItems:[],
                    itemTypeCode:'',
                    itemCode:'',
                    type:1,
                    statistics: {


                    },
                    inData: [],
                    outData: [],
                    inventory:[],
                    timeData:[],
                    removeData: [],
                    branch: {
                        province: BRANCH_NAME,
                        directTotal: 0,
                        /*  agentTotal: 0,*/
                        customerTotal: 0,
                        palletTotal: 0
                    },
                    storyData: []
                },
                created: function () {
                    var that = this;
                    //获取统计
                    var wareCode = IOT.getLocalStore("backWare");
                    var itemMasterId = IOT.getLocalStore("itemMasterId");
                    IOT.getServerData(URI.BILL.BILL_IN.TONGJI, {wareCode:wareCode,itemMasterId:itemMasterId}, (ret) => {
                        if (ret.code === 200) {
                            $vue.$data.statistics = ret.data;
                            var cellDouble = ret.data.cellDouble;

                           /*     var str=Number(cellDouble*100).toFixed(2);
                                str+="%";
                            $vue.$data.statistics.cellDouble = str;*/
                           if(cellDouble == null || cellDouble == undefined){
                               cellDouble = 0
                           }
                            this.setEchaets2(cellDouble);


                        } else {
                            IOT.tips(ret.message || '服务器请求失败，稍后再试！', 'error');
                        }
                    });


                    //获取物料信息




                    //获取产品种类信息
                    IOT.getServerData(URI.BASE.TYPE.LIST,{wareCode:wareCode,itemMasterId:itemMasterId},(ret) => {
                        if (ret.code === 200) {
                            var  list = ret.rows;

                            $.each(list,function(i,v){
                                $vue.$data.typeItems.push({text:v.itemTypeName,value:v.itemTypeCode})

                            });

                            var itemTypeCode =list[0].itemTypeCode;
                            $vue.$data.itemTypeCode = itemTypeCode;
                            IOT.getServerData(URI.BASE.ITEM.LIST,{itemTypeCode:itemTypeCode},(ret) => {
                                $vue.$data.itemItems=[];
                                if (ret.code === 200) {
                                    var  list = ret.rows;

                                    $.each(list,function(i,v){
                                        $vue.$data.itemItems.push({text:v.itemName,value:v.itemCode})

                                    });
                                    var itemCode =list[0].itemCode;
                                    $vue.$data.itemCode = itemCode;
                                    $vue.$data.type = 1;
                                    that.getInventoryReport();
                                } else {
                                    IOT.tips(ret.message || '服务器请求失败，稍后再试！', 'error');
                                }
                            });

                        } else {
                            IOT.tips(ret.message || '服务器请求失败，稍后再试！', 'error');
                        }
                    });










                },


                mounted: function () {


                    this.$nextTick(() => {
                        var $accountBox = $('.homepage-hook');


                        let tableHookName = '.inventoryWarning-table-hook';


                        var $tableHook = $accountBox.find(tableHookName).bootstrapTable({
                            scrollbar: 'inventory-table-body',
                            striped: true, // 设置为 true 会有隔行变色效果
                            pagination: true, // true 显示分页
                            paginationDetail: false, // 分页详情
                            sidePagination: 'server', // 服务器端
                            method: 'post',
                            url: URI.REPORT.INVENTORY.WARNING.LIST,
                            debug: false,
                            cache: false,
                            pageNumber: 1,
                            pageSize: 10,
                            // fixedColumns: true,
                            customButton: '',
                            customQueryParams: function (params) {

                                var wareCode = IOT.getLocalStore("backWare");
                                var itemMasterId = IOT.getLocalStore("itemMasterId");

                                var queryParams = $.extend({type:1,wareCode:wareCode,itemMasterId:itemMasterId}, params);
                                return queryParams;
                            },
                            onLoadSuccess: function () {
                            },
                            onLoadError: function (status, xhr) {
                            },
                            onCheckAll: function (rows) {

                            },
                            columns: [
                                {
                                    field: 'wareName', title: '仓库', align: 'center',
                                },

                                {
                                    field: 'itemName', title: '物料名称', align: 'center', fixedLeft: true, tips: true
                                },

                                {
                                    field: 'quantity', title: '数量', align: 'center', fixedLeft: true, tips: true
                                },

                                {
                                    field: 'upperLimit', title: '库存上限', align: 'center', fixedLeft: true, tips: true
                                },
                                {
                                    field: 'floorLimit', title: '库存下限', align: 'center', fixedLeft: true, tips: true
                                },
                                {
                                    field: 'quantityState', title: '状态', align: 'center', fixedLeft: true, tips: true,
                                    formatter: function (value, row, index) {




                                        if (value ==='积压' ){return "<button style='background-color: #dd4444;border-style: none' class='btn btn-blue detail-account'>积压</button>";}
                                        else if (value === '缺货' ){return "<button style='background-color: #f0ad4e;border-style: none' class='btn btn-blue detail-account'>缺货</button>";}


                                    }
                                },

                            ]
                        });

                    });




                    this.setEchaets3();


                    this.setEchart();



                    this.setEchaets2();








                },

                methods:{

                    emitPage: function () {
                        M.Page.load(this.boxs);
                    },
                    // 上一页
                    prePage: function () {
                        M.Page.prePage(this.boxs);
                    },
                    // 触发刷新页(当前显示的页面)
                    refreshPage: function () {

                        M.Page.refreshPage(this.boxs);
                    },


                    changeType:function(){

                        //获取物料信息

                        $vue.$data.itemItems = [];
                        var selectVal = $vue.$data.itemTypeCode;
                        IOT.getServerData(URI.BASE.ITEM.LIST2,{itemTypeCode:selectVal},(ret) => {
                            if (ret.code === 200) {
                                var  list = ret.data.list;

                                $.each(list,function(i,v){
                                    $vue.$data.itemItems.push({text:v.itemName,value:v.itemCode})
                                });
                            } else {
                                IOT.tips(ret.message || '服务器请求失败，稍后再试！', 'error');
                            }
                        });



                    },


                    getInventoryReport:function(){
                        var wareCode = IOT.getLocalStore("backWare");
                        var itemMasterId = IOT.getLocalStore("itemMasterId");
                        var itemCode = $vue.$data.itemCode;
                        var type = $vue.$data.type;
                        IOT.getServerData(URI.REPORT.INVENTORY.REPORT.LIST,{wareCode:wareCode,itemMasterId:itemMasterId,itemCode:itemCode,type:type,reportType:1},(ret) => {
                            if (ret.code === 200) {
                                var  list = ret.rows;
                                var list2 = [];
                                if(list.length != 0){
                                    for(var i = 0;i<list.length;i++){
                                        list2.push(list[list.length -1 - i]);
                                    }
                                }

                                if(list2.length !=0){
                                    $vue.$data.inData=[];
                                    $vue.$data.outData=[];
                                    $vue.$data.timeData=[];
                                    $vue.$data.inventory=[];
                                    $.each(list2,function(i,v){
                                        $vue.$data.inData.push(v.inInventory);
                                        $vue.$data.outData.push(v.outInventory);
                                        $vue.$data.timeData.push(v.startTime);
                                        $vue.$data.inventory.push(v.inventory);


                                    });
                                    this.setEchart();
                                }else {
                                    $vue.$data.inData=[0,0,0,0,0,0,0];
                                    $vue.$data.outData=[0,0,0,0,0,0,0];
                                    $vue.$data.timeData=[0,0,0,0,0,0,0];
                                    $vue.$data.inventory=[0,0,0,0,0,0,0];
                                    this.setEchart();
                                }

                            } else {
                                IOT.tips(ret.message || '服务器请求失败，稍后再试！', 'error');
                            }
                        });

                    },



                    setEchart:function(data){
                        $chart = ec.init(document.getElementById('main'));


                      var inData = $vue.$data.inData;
                        var outData = $vue.$data.outData;
                        var inventory = $vue.$data.inventory;
                        var date = $vue.$data.timeData;

                      var option = {

                            tooltip: {
                                trigger: 'axis'
                            },
                            legend: {
                                data: ['入库数量', '出库数量', '剩余库存数量']
                            },

                            calculable: true,
                            xAxis: [
                                {
                                    type: 'category',
                                    boundaryGap: false,
                                    data:date
                                }
                            ],
                            yAxis: [
                                {
                                    type: 'value'
                                }
                            ],
                            series: [

                                {
                                    name: '入库数量',
                                    type: 'line',
                                    smooth: true,

                                    data: inData
                                },
                                {
                                    name: '出库数量',
                                    type: 'line',
                                    smooth: true,

                                    data: outData
                                },
                                {
                                    name: '剩余库存数量',
                                    type: 'line',
                                    smooth: true,

                                    data: inventory
                                }
                            ]
                        };
                        $chart.setOption(option);
                    },

                    setEchaets2:function(cellDouble){
                        var $chart2 = ec.init(document.getElementById('shuiwei'));
                        option = {
                            title: {
                                text: '货位利用率'
                            },

                            series: [{
                                type: 'liquidFill',
                                //data: [0.6, 0.5, 0.4, 0.3],
                                data: [cellDouble, 0.3, 0.2, 0.3],
                                radius: '60%',
                                // 水球颜色
                                color: ['#49d088', '#38b470', '#2aaf66'],
                                center: ['50%', '50%'],
                                // outline  外边
                                outline: {
                                    // show: false
                                    borderDistance: 5,
                                    itemStyle: {
                                        borderWidth: 5,
                                        borderColor: '#13FDCE',
                                    },
                                },
                                label: {
                                    normal: {
                                        // textStyle: {
                                        color: 'red',
                                        insideColor: 'yellow',
                                        fontSize: 40
                                        // }
                                    }
                                },
                                // 内图 背景色 边
                                backgroundStyle: {

                                    // borderWidth: 5,
                                    // borderColor: 'red',
                                }

                            }]
                        };

                        $chart2.setOption(option);
                    },

                    setEchaets3:function(){
                        var $chart2 = ec.init(document.getElementById('wendu'));
                        option = {
                            title: {
                                text: '温度'
                            },

                            series: [
                                {
                                    name: '温度',
                                    type: 'gauge',
                                    data: [{value: 50, name: '温度'}]
                                }
                            ]
                        };
                        debugger
                        $chart2.setOption(option,true);
                    }



                }
            })
        ;
    })
})();
