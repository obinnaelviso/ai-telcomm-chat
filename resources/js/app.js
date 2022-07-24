import './bootstrap';
import '../css/app.css';

import { createApp, h } from 'vue';
import ElementPlus from 'element-plus';
import 'element-plus/dist/index.css';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import { ZiggyVue } from '../../vendor/tightenco/ziggy/dist/vue.m';
import * as ElementPlusIconsVue from '@element-plus/icons-vue';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';


createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.vue`, import.meta.glob('./Pages/**/*.vue')),
    setup({ el, app, props, plugin }) {
        const vueApp = createApp({ render: () => h(app, props) })
            for (const [key, component] of Object.entries(ElementPlusIconsVue)) {
                vueApp.component(key, component)
            }
        vueApp
            .use(plugin)
            .use(ElementPlus)
            .use(ElementPlusIconsVue)
            .use(InertiaProgress)
            .use(ZiggyVue, Ziggy)
            .mount(el);
        return vueApp;
    },
});

InertiaProgress.init({ color: '#4B5563' });
