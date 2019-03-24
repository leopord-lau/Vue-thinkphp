<template>

    <el-dialog  :visible="ifshow" :before-close="handleClose"> 
        <el-form :model="form">
            <el-form-item label="客户编号"><el-input v-model="form.clientCode" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="客户名称"><el-input v-model="form.codeName" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="地址"><el-input v-model="form.address" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="联系人"><el-input v-model="form.contactPerson" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="联系电话"><el-input v-model="form.contactPhone" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="邮箱"><el-input v-model="form.email" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="传真"><el-input v-model="form.fax" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="创建时间"><el-input v-model="form.createTime" auto-complete="off"></el-input></el-form-item>
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
                clientCode:'',
                codeName:'',
                address:'',
                contactPerson:'',
                contactPhone:'',
                email:'',
                fax:'',
                createTime:'',
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
            this.$http.post('api/submitClient',this.form).then((res)=>{
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
