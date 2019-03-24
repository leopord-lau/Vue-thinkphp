<template>
    <el-dialog :visible="ifshow" :before-close="handleClose">
        <el-form :model="form">
            <el-form-item label="仓库编码"><el-input v-model="form.inventoryCode" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="仓库类型"><el-input v-model="form.inventoryName" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="地址"><el-input v-model="form.address" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="电子锁"><el-input v-model="form.lock" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="联系人"><el-input v-model="form.contactPerson" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="联系方式"><el-input v-model="form.contactWay" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="仓管员"><el-input v-model="form.guardMan" auto-complete="off"></el-input></el-form-item>
            <el-form-item label="公司"><el-input v-model="form.company" auto-complete="off"></el-input></el-form-item>
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
                inventoryCode:'',
                inventoryName:'',
                address:'',
                lock:'',
                contactPerson:'',
                contactWay:'',
                guardMan:'',
                company:'',
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
            this.$http.post('api/submitInventory',this.form).then((res)=>{
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
