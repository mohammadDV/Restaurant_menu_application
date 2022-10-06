import MenuIndex from './components/menu/Index.vue';
import MenuCategory from './components/menu/Category.vue';

export const routes = [
    {
        path: '/menu',
        name: 'ManuIndex',
        component: MenuIndex
    },    {
        path: '/menu/category/:id',
        name: 'ManuCategory',
        component: MenuCategory
    }
]
