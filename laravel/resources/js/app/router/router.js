import {createMemoryHistory, createRouter} from 'vue-router'

import Home from "../views/Home.vue";
import Character from "../views/Character.vue";

const routes = [
    {path: '/', name: 'home', component: Home},
    {path: '/character/:id', name: 'character', component: Character},
]

const router = createRouter({
    history: createMemoryHistory(),
    routes,
})

export default router
