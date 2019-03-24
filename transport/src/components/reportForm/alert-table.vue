<template>
<div>
    <el-table :data="tableData.slice((currentPage-1)*pageSize,currentPage*pageSize)" stripe style="width:100%" class="select-form">
        <el-table-column prop="inventory" label="仓库"></el-table-column>
        <el-table-column prop="materialName" label="物料名称" ></el-table-column>
        <el-table-column prop="materialNumber" label="数量" ></el-table-column>
        <el-table-column prop="upLimit" label="库存上限"></el-table-column>
        <el-table-column prop="downLimit" label="库存下限"></el-table-column>
        <el-table-column prop="status" label="状态"  :filters="[{text:'缺货',value:'缺货'},{text:'积压',value:'积压'}]" :filter-method="filterButton" filter-placement="bottom-end">
            <template slot-scope="scope">
                <el-button :type="scope.row.status==='积压'?'danger':'warning'" disabled-transtions>{{scope.row.status}}</el-button>
            </template>
        </el-table-column>
    </el-table>
    <el-pagination class="pagination" layout="prev,pager,next" @current-change="current_change"
        :current-page="currentPage"
        :page-size="pageSize" :total="total" background></el-pagination>
</div>
</template>

<script>
export default {
    props:['tableData','total'],
    methods:{
        filterButton(value, row, column) {
            const property = column['property'];
            return row[property] === value;
        },
    },
    data(){
        return{
            pageSize:3,
            currentPage:1
        }
    },
    methods:{
        current_change(currentPage){
            this.currentPage=currentPage
        }
    }
}
</script>

<style lang="less">
    .btn-form{
        left:7%;position: absolute; top:280px;width: 100%;
        .select-btns-left{
            top:0px;position: absolute;width: 400px;
        }
        .select-btns-right{
            top: 0px;position: absolute;width: 400px;left: 55%;
        }
        .select-form{
            top:50px;position: absolute;
        }
        .pagination{
            top:400px;position: absolute;left: 60%;
        }
    }
</style>
