import App from "./app";
import Router from "vue-router";
import store from "./store";
import { mapActions, mapGetters } from "vuex";




App.use(Router);

function load(component) {
  return () => import(`./components/${component}`);
}

const router = new Router({
  routes: [
    {
      path: "/",
      component: load("employees/Table")
    },
    {
      path: "/employees",
      component: load("employees/Table")
    },
    {
      path: "/employees/add",
      component: load("employees/Form")
    },
    {
      path: "/employees/edit/:id",
      component: load("employees/Form")
    },
    // Always leave this last one
    {
      path: "*",
      component: load("Error404")
    } // Not found
  ]
});

const app = new App({
  el: "#app",
  router
});
