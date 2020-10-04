import Vue from "vue";
import VueRouter from "vue-router";
import Login from "../pages/Login";
import Register from "../pages/Register";
import ManageUsers from "../pages/ManageUsers";
import ChangePermissions from "../pages/ChangePermissions";

Vue.use(VueRouter);

const routes = [
    { path: "/auth/login", component: Login },
    { path: "/auth/register", component: Register },
    { path: "/dashboard", component: ManageUsers },
    { path: "/users/:id/change-permissions", component: ChangePermissions },
];

const router = new VueRouter({
    routes
});

export default router;
