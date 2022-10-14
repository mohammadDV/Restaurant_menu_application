import ManageIndex from './components/manage/Index.vue';
import MenuIndex from './components/menu/Index.vue';
import MenuCategory from './components/menu/Category.vue';

export const routes = [
    {
        path: '/',
        name: 'ManuIndex',
        component: MenuIndex
    },{
        path: '/category/:id',
        name: 'ManuCategory',
        component: MenuCategory,
        props: true
    },{
        path: '/manage',
        name: 'Manage',
        component: ManageIndex,
        props: true
    }
]
