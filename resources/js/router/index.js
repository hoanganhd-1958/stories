import Vue from 'vue'
import Router from 'vue-router'

import Story from '../components/story/StoryComponent'
import StoryForm from '../components/story/StoryFormComponent'
import StoryList from '../components/story/StoryListComponent'
import StoryShow from '../components/story/StoryShowComponent'
import Chapter from '../components/chapter/ChapterComponent'
import ChapterForm from '../components/chapter/ChapterFormComponent'
import User from '../components/UserComponent'
import LoginApp from '../components/authentication/Login'
import Register from '../components/authentication/Register.vue';
import Login from '../components/authentication/Login.vue';
import { checkToken } from '../helper/local-storage'

Vue.use(Router)

const router = new Router({
    linkActiveClass: 'active',
    routes: [
        {
            path: '/register',
            name: 'register',
            component: Register,
            meta: {
                auth: false
            }
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            meta: {
                auth: false
            }
        },
        {
            path: '/stories',
            component: Story,
            meta: {
                auth: true
            },
            children: [
                {
                    path: 'list',
                    name: 'story.list',
                    component: StoryList,
                },
                {
                    path: 'create',
                    component: StoryForm,
                },
                {
                    path: ':storyId/edit',
                    name: 'story.edit',
                    component: StoryForm,
                },
                {
                    path: ':storyId',
                    name: 'story.show',
                    component: StoryShow,
                }
            ]
        },
        {
            path: '/chapters',
            component: Chapter,
            meta: {
                auth: true
            },
            children: [
                {
                    path: 'create',
                    name: 'chapter.create',
                    component: ChapterForm,
                },
                {
                    path: 'edit/:chapterId',
                    name: 'chapter.edit',
                    component: ChapterForm,
                }
            ]
        },
        {
            path: '/users',
            component: User,

        }
    ]
})
router.beforeEach((to, from, next) => {
    if (to.matched.some(record => record.meta.auth)) {
        if (!checkToken()) {
            next({
                path: '/login',
                query: { redirect: to.fullPath }
            })
        } else {
            next()
        }
    } else {
        next()
    }
})
export default router;
