<template>
    <el-dialog :visible="ifshow" :before-close="handleClose">
      <el-form :model="form">
      <el-form-item label="物料名称"><el-input v-model="form.materialName" auto-complete="off"></el-input></el-form-item>
      <el-form-item label="请购人"><el-input v-model="form.applyPerson" auto-complete="off"></el-input></el-form-item>
      <el-form-item label="请购数量"><el-input v-model="form.applyNumber" auto-complete="off"></el-input></el-form-item>
      <el-form-item label="请购仓库"><el-input v-model="form.applyinventory" auto-complete="off"></el-input></el-form-item>
      <el-form-item label="工程编号"><el-input v-model="form.projectNumber" auto-complete="off"></el-input></el-form-item>
      <el-form-item label="请购时间"><el-input v-model="form.applyTime" auto-complete="off" ></el-input></el-form-item>
      <el-form-item label="审核人"><el-input v-model="form.checkName" auto-complete="off"></el-input></el-form-item>
      <el-form-item label="审核时间"><el-input v-model="form.checkTime" auto-complete="off"></el-input></el-form-item>
      <el-form-item label="采购时间"><el-input v-model="form.BuyTime" auto-complete="off"></el-input></el-form-item>
      <el-form-item label="收料人"><el-input v-model="form.receivePerson" auto-complete="off"></el-input></el-form-item>
      <el-form-item label="到货时间"><el-input v-model="form.receiveTime" auto-complete="off"></el-input></el-form-item>
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
        applyPerson:'',
        applyNumber:'',
        applyinventory:'',
        projectNumber:'',
        applyTime:'',
        checkName:'',
        checTime:'',
        buyTime:'',
        receivePerson:'',
        receiveTime:'',
        handleClose:false
      },
        }
    },
    methods:{
        dialogclose(){
            this.$emit('close')
        },
        submit(){
      this.$http.post('api/submitApplyBuy',this.form).then((res)=>{
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
