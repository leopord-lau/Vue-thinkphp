<template>
<div class="table">
    <el-col :span="24" style="float:right">
        <el-col :span="8" class="header">
            物料种类：{{tableData.length}}&nbsp;&nbsp;
        </el-col>
    </el-col>
    <el-table :data="tableData" stripe style="width:100%" class="select-form">
        <el-table-column prop="materialType" label="物料类型"></el-table-column>
        <el-table-column prop="materialNumber" label="物料编码" ></el-table-column>
        <el-table-column prop="materialName" label="物料名称"></el-table-column>
        <el-table-column prop="spec" label="规格" ></el-table-column>
        <el-table-column prop="number" label="数量"></el-table-column>
        <el-table-column prop="unit" label="单位" ></el-table-column>
        <el-table-column prop="inventory" label="仓库"></el-table-column>
        <el-table-column prop="loader" label="货主" ></el-table-column>
        <el-table-column prop="total" label="总值（元）" ></el-table-column>
    </el-table>
</div>
</template>

<script>
export default {
    props:['tableData']
}
</script>

<style lang="less">
    .header{
        left:60%;position: absolute;font-weight: 100;
    }
</style>
