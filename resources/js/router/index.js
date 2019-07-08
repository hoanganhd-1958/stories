import Vue from 'vue'
import Router from 'vue-router'

import Story from '../components/story/StoryComponent'
import StoryForm from '../components/story/StoryFormComponent'
import StoryList from '../components/story/StoryListComponent'
import StoryShow from '../components/story/StoryShowComponent'
import Chapter from '../components/chapter/ChapterComponent'
import ChapterForm from '../components/chapter/ChapterFormComponent'
import User from '../components/UserComponent'

Vue.use(Router)

const router = new Router({
    // mode: 'history',
    linkActiveClass: 'active',
    routes: [
        {
            path: '/stories',
            component: Story,
            children: [
                {
                    path: 'list',
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
            children: [
                {
                    path: 'create',
                    name: 'chapter.create',
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

export default router;
