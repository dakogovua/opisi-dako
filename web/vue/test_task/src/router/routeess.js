import Home from '../components/Home.vue';
import Details from '../components/Details.vue';
import Dynamic from '../components/Dynamic.vue';

const routes = [
    { path: '/', component: Home },
    { path: '/starwars/:link/:name', component: Dynamic, name: 'starwars'},
    { path: '/details/:link', component: Details, name: 'details'}
];

export default routes;