require('./bootstrap');

// Import modules...
import { createApp, h } from 'vue';
import { App as InertiaApp, plugin as InertiaPlugin } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import mitt from 'mitt';

const el = document.getElementById('app');
const eventBus = mitt();
const app = createApp({
    provide: {
        captchaKey: '6LdQDp4aAAAAAKZX0uQ5-EdNWdAbmlbA2tO2WbBd'
    },
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Pages/${name}`).default,
        }),
})
.mixin({ methods: { route } })
.use(InertiaPlugin);
app.config.globalProperties.eventBus = eventBus;
app.mount(el);
InertiaProgress.init({ color: '#4B5563' });
