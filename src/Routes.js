import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from './components/Dashboard.vue';
import Login from './components/Login.vue';
import ProjectsAlpha from './components/ProjectsAlpha.vue';
import HoliDay from './components/HoliDay.vue';
import HoliDayAdmin from './components/HolidayAdmin.vue'
import Members from './components/MembersAd.vue';
import TeamX from './components/TeamX.vue';
import TasksBeta from './components/TasksBeta.vue'
import Cookies from 'js-cookie';

const routes = [
  {
    path: '/',
    component: Dashboard,
    meta: { requiresAuth: true }
  },
  {
    path: '/Login',
    component: Login
  },
  {
    path: '/Projects',
    component: ProjectsAlpha,
    meta: { requiresAuth: true }
  },
  {
    path: '/Team',
    component: TeamX,
    meta: { requiresAuth: true }
  },
  {
    path: '/Members',
    component: Members,
    meta: { requiresAuth: true,role:'admin' }
  },
  {
    path: '/Tasks',
    component: TasksBeta,
    meta: { requiresAuth: true }
  },
  {
    path: '/Holidays',
    component: () => {
      const role = Cookies.get('TokkenJob');
      if (role === 'user') {
        return HoliDay;
      } else {
        return HoliDayAdmin;
      }
    },
    meta: { requiresAuth: true }
  }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});
router.beforeEach((to, from, next) => {
  const userRole = Cookies.get('TokkenJob');
  
  if (to.matched.some(record => record.meta.requiresAuth)) {
    if (!userRole) {
      next('/Login');
    } else if (to.meta.role && to.meta.role !== userRole) {
      next('/Login');
    } else {
      next()
    }
  } else {
    next();
  }
})
export default router;
