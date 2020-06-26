
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '', component: () => import('pages/PageIndex.vue'), name: 'Main' },
      { path: '/login', component: () => import('pages/PageLogin.vue'), name: 'Login' },
      { path: '/settings', component: () => import('pages/PageSettings.vue'), name: 'Настройки' },
      { path: '/details', component: () => import('pages/PageDetails.vue'), name: 'Details' }
    ]
  }
]

// Always leave this as last one
if (process.env.MODE !== 'ssr') {
  routes.push({
    path: '*',
    component: () => import('pages/Error404.vue')
  })
}

export default routes
