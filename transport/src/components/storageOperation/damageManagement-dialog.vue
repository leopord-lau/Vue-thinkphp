<template>
    <el-dialog  :visible="ifshow" :before-close="handleClose">
        <el-form :model="form">
            <el-form-item label="单据号"><el-input v-model="form.documentNumber" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="仓库"><el-input v-model="form.inventory" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="状态"><el-input v-model="form.status" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="制单人"><el-input v-model="form.makePerson" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="制单时间"><el-input v-model="form.makeTime" auto-complete="off"></el-input></el-form-item>
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
                documentNumber:'',
                inventory:'',
                status:'',
                makePerson:'',
                makeTime:'',
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
            this.$http.post('api/submitDamage',this.form).then((res)=>{
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
