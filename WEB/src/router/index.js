import { createRouter, createWebHistory } from 'vue-router';
import Home from '../views/Home.vue';
import PageNotFound from '../views/pageNotFound.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home
  },
  {
    path: '/pagenotfound',
    name: 'PageNotFound',
    component: PageNotFound
  },
  
  
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;