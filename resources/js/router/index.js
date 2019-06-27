import Vue from 'vue'
import Router from 'vue-router'

import Story from '../components/StoryComponent'
import User from '../components/UserComponent'

Vue.use(Router)

const router = new Router({
    mode: 'history',
    linkActiveClass: 'active',
    routes: [
        {
            path: '/stories',
            component: Story,
        },
        {
            path: '/users',
            component: User,
        }
    ]
})

export default router;
