export default function (Vue) {

    Vue.auth = {
        // set token        
        setToken(token, expiration) {
            localStorage.setItem('token', token)
            localStorage.setItem('expiration', expiration)
            return true
        },
        // get token
        getToken() {
            //var token = this.tokenA;
            //var expiration = this.expirationA;
            var token = localStorage.getItem('token')
            var expiration = localStorage.getItem('expiration')

            // alert("token----"+token)
            // alert("expire"+expiration)
            if (!token || !expiration) {
                return null
            }

            if (Date.now() > parseInt(expiration)) {
                this.destroyToken()
                return null
            }
            else {
                return token
            }
        },
        // destroy token
        destroyToken() {
            localStorage.removeItem('token')
            localStorage.removeItem('expiration')
            localStorage.removeItem('user_id')
        },
        // isAuthenticated
        isAuthenticated() {
            if (this.getToken()) {
                return true
            }
            else {
                // console.log('Falso')
                return false
            }
        },

        //setUserID
        setUserId(userid) {
            localStorage.setItem('user_id', userid)
        },

        getUserId() {
            var user_id = localStorage.getItem('user_id')

            return user_id

        }
    }

    Object.defineProperties(Vue.prototype, {
        $auth: {
            get: () => {
                return Vue.auth
            }
        }
    })
}