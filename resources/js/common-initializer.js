import axios from 'axios'

export default {
  init ({ store, router }) {
    // Global hooks for ajax
    axios.interceptors.request.use(function (config) {
      store.commit('SET_IS_AJAX', true)
      return config
    }, function (error) {
      return Promise.reject(error)
    })

    axios.interceptors.response.use(function (response) {
      store.commit('SET_IS_AJAX', false)
      return response
    }, function (error) {
      store.commit('SET_IS_LOADING', false)
      store.commit('SET_IS_AJAX', false)
      store.commit('SET_AJAX_ERRORS', { response: error.response })

      return Promise.reject(error)
    })

    // Fix for IE11 (doesn't add new hash to history on navigate)
    if ('-ms-scroll-limit' in document.documentElement.style && '-ms-ime-align' in document.documentElement.style) { // detect it's IE11
      console.log('ie11')
      window.addEventListener('hashchange', function (event) {
        const currentPath = window.location.hash.slice(1)
        if (router.currentRoute.path !== currentPath) {
          router.push(currentPath)
        }
      }, false)
    }
    // End ie fix
  }
}
