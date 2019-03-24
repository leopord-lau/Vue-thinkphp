<template>
    <el-dialog :visible="ifshow" :before-close="handleClose">
        <el-form :model="form">
            <el-form-item label="货主编号"><el-input v-model="form.loaderCode" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="货主名称"><el-input v-model="form.loaderName" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="联系人"><el-input v-model="form.contactPerson" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="联系方式"><el-input v-model="form.contactWay" auto-complete="off"></el-input></el-form-item>
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
                loaderCode:'',
                loaderName:'',
                contactPerson:'',
                contactWay:'',
                remark:'',
            },
            handleClose:false
        }
    },
    methods:{
        dialogclose(){
            this.$emit('close')
        },
        submit(){
            this.$http.post('api/submitLoader',this.form).then((res)=>{
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
