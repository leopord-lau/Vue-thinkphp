import Vue from 'vue'

export const USER_LOGIN='USER_LOGIN'
export const USER_LOGOUT='USER_LOGOUT'

export default {
    state:JSON.parse(sessionStorage.getItem('user'))||{},
    mutations:{
        [USER_LOGIN](state,user){
            sessionStorage.setItem("user",JSON.stringify(user))
            Object.assign(state,user)
        },
        [USER_LOGOUT](state){
            sessionStorage.removeItem("user")
            Object.keys(state).forEach(k=>Vue.delete(state,k))
        }
    },
    actions:{
        [USER_LOGIN]({commit},user){
            commit(USER_LOGIN,user)
        },
        [USER_LOGOUT]({commit}){
            commit(USER_LOGOUT)
        }
    }
}