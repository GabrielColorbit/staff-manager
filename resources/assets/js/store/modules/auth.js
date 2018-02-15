import {
  LOGIN,
  LOGOUT
} from "../mutation-types"

const state = {
  auth: {}
}

const getters = {
  auth(state) {
    // console.log("getters.auth", state)
    return state.auth
  }
}

const mutations = {
  [LOGIN](state, auth) {
    state.auth = auth
  },
  [LOGOUT](state) {
    if (!state.auth.remember) {
      state.auth = {}
    }
  }
}

const actions = {
  login({
    commit,
    state
  }, auth) {
    commit(LOGIN, auth)
  },
  logout({
    commit
  }) {
    commit(LOGOUT)
  }
}

export default {
  state,
  getters,
  actions,
  mutations
}
