<template>
    <el-dialog :visible="ifshow" :before-close="handleClose">
        <el-form :model="form">
            <el-form-item label="物料名称"><el-input v-model="form.materialName" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="物料编码"><el-input v-model="form.materialNumber" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="规格"><el-input v-model="form.specs" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="型号"><el-input v-model="form.model" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="物料类型"><el-input v-model="form.type" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="单位名称"><el-input v-model="form.unitName" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="采购周期"><el-input v-model="form.circle" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="备注"><el-input v-model="form.remark" auto-complete="off"></el-input></el-form-item>
        </el-form>
        <div slot="footer" class="dialog-footer">
            <el-button @click="dialogclose">取 消</el-button>
            <el-button type="primary" @click="submit">确 定</el-button>
        </div>
    </el-dialog>
</template>

<script>
export default {
    props:['ifshow'],
    data(){
        return{
            form:{
                materialName:'',
                materialNumber:'',
                specs:'',
                model:'',
                type:'',
                unitName:'',
                circle:'',
                remark:''
            },
            handleClose:false
        }
    },
    methods:{
        dialogclose(){
            this.$emit('close')
        },
        submit(){
            this.$http.post('api/submitMaterial',this.form).then((res)=>{
                if(res.data.code===1){
                    this.$message({message:res.data.msg,type:'success'});
                    this.dialogclose()
                }else{
                    this.$message({message:res.data.msg,type:'error'})
                }
            })
        },
        handleClose(done) {
            this.$confirm('确认关闭？')
                .then(_ => {
                    this.dialogclose()
                })
                .catch(_ => {});
        }
    }
}
</script>

<style>

</style>
