<template>
    <el-dialog title="确定要退出？">
        <div slot="footer" class="dialog-footer">
            <el-button @click="dialogclose">取消</el-button>
            <el-button @click="dialogconfirm">确认</el-button>
        </div>
    </el-dialog>
</template>

<script>
import {mapActions} from 'vuex'
import {USER_LOGOUT} from '../store/user'
export default {
    methods:{
        dialogclose(){
            this.$emit('close')
        },
        ...mapActions([USER_LOGOUT]),
        dialogconfirm(){
            this.USER_LOGOUT()
            this.$router.replace({path:'/login'})
        }
    }
}
</script>

<style>

</style>
