<template>
    <el-table :data="tableData" stripe style="width:100%" class="select-form">
        <el-table-column prop="country" label="国家"></el-table-column>
        <el-table-column prop="currency" label="货币" ></el-table-column>
        <el-table-column label="操作">
            <template slot-scope="scope">
                <el-button size="mini" type="primary" @click="handleChange(scope.$index, scope.row)">修改</el-button>
                <el-button size="mini" type="primary" @click="handleDelete(scope.$index, scope.row)">删除</el-button>
            </template>
        </el-table-column>
    </el-table>
</template>

<script>
export default {
    props:['tableData']
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
    }
</style>
