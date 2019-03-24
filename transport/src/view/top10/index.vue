<template>
    <el-row class="storagebuy">
        <el-col :span="24">
            <el-breadcrumb separator-class="el-icon-arrow-right" class="breadcrumb">
                <el-breadcrumb-item :to="{path:'/'}">首页</el-breadcrumb-item>
                <el-breadcrumb-item>统计报表</el-breadcrumb-item>
                <el-breadcrumb-item>出库量TOP10</el-breadcrumb-item>
            </el-breadcrumb>
        </el-col>
        <el-col class="search-box" :span="24">
        </el-col>
        <el-col :span="24" class="btn-form">
            <el-col :span="24" class="btns">
                <el-button type="primary" plain @click="show(0)">本月</el-button>
                <el-button type="primary" plain @click="show(1)">上月</el-button>
                <el-button type="primary" plain @click="show(2)">近六月</el-button>
                <el-button type="primary" plain @click="show(3)">本季度</el-button>
                <el-button type="primary" plain @click="show(4)">本年</el-button>
                <el-button type="primary" plain @click="show(5)">上一年</el-button>
            </el-col>
            <el-col :span="24" class="chart">
                <div id="myChart" style="width:800px;height:500px"></div>
            </el-col>
        </el-col>
    </el-row>
</template>

<script>
export default {
    data(){
        return{
            subtext:'本月',
            data:[8203, 3489, 9034, 14970, 11744, 20230]
        }
    },
    mounted(){
        this.showchart();
    },
    methods:{
        show(index){
            switch(index){
                case 0:
                this.subtext="本月",
                this.data=[8203, 3489, 9034, 14970, 11744, 20230];
                this.showchart();
                break;
                case 1:
                this.subtext="上月",
                this.data=[7203, 2489, 9634, 13970, 12744, 23230];
                this.showchart();
                break;
                case 2:
                this.subtext="近六月",
                this.data=[7303, 4489, 10634, 16970, 11714, 26330];
                this.showchart();
                break;
                case 3:
                this.subtext="本季度",
                this.data=[7301, 3489, 9834, 16100, 13144, 30230];
                this.showchart();
                break;
                case 4:
                this.subtext="本年",
                this.data=[7903, 4089, 9934, 15970, 13044, 30230];
                this.showchart();
                break;
                case 5:
                this.subtext="上一年",
                this.data=[6203, 7489, 7634, 9970, 10744, 33230];
                this.showchart();
                break;
            }
        },
        showchart(){
var mychart=this.$echarts.init(document.getElementById('myChart'));
        mychart.setOption({
            title: {
                text: '出库量TOP10',
                subtext: this.subtext
            },
            tooltip: {
                trigger: 'axis',
                axisPointer: {
                type: 'shadow'
                }
            },
        legend: {
            data: ["出库量"]
        },
        grid: {
            left: '3%',
            right: '4%',
            bottom: '3%',
            containLabel: true
        },
        xAxis: {
            type: 'value',
            boundaryGap: [0, 0.01]
        },
        yAxis: {
            type: 'category',
            data: ['material 1','material 2','material 3','material 4','material 5','material 6']
        },
        series: [
            {
                name: '出库量',
                type: 'bar',
                data: this.data,
                itemStyle:{
                    normal:{
                        color:'rgb(109, 146, 247)'
                    }
                }
            },
        ]
        })
        }
    }
}
</script>
<style lang="less">
.storagebuy{
    top:0px;width:100%;position: absolute;
    .breadcrumb{
        left:10%;position: absolute;
    }
    .search-box{
        position:absolute;top:25px;background-color:rgba(241, 241, 241, 0.349);height:15px;box-shadow:1px 1px 1px 1px rgb(235, 233, 233);
    }
    .btn-form{
        top:50px;position: absolute;
        .print{
            left:10%;position: absolute
        }
        .btns{
            left:10%;position: absolute;top: 60px
        }
        .chart{
            top:150px;position: absolute;left: 15%;
        }
    }
    .el-icon-success{
        color:green
    }
}
</style>
