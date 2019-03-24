<template>
    <el-dialog :visible="ifshow" :before-close="handleClose">
        <el-form :model="form">
            <el-form-item label="托盘名称"><el-input v-model="form.palletName" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="托盘类型"><el-input v-model="form.palletType" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="托盘编码"><el-input v-model="form.palletCode" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="所在货位"><el-input v-model="form.warePosition" auto-complete="off"></el-input></el-form-item>
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
                palletName:'',
                palletType:'',
                palletCode:'',
                warePosition:'',
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
            this.$http.post('api/submitPallet',this.form).then((res)=>{
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
