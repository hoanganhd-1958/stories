<template>
    <div class>
        <div class="row list-recommend-book" style="padding-top:25px">
            <div
                class="col col-md-4 col-sm-6 col-6"
                v-for="(story, index) in listStory"
                :key="index"
            >
                <div class="recommed-book" itemscope itemtype="https://schema.org/Book">
                    <div class="book-img">
                        <img
                            class="lazy loaded"
                            :src="'http://localhost:8000/' + story.cover_image"
                        />
                    </div>
                    <div class="book-info">
                        <h4 itemprop="name">
                            <nuxt-link
                                :to="{ name: 'story-storyId', params: { storyId: story.id }}"
                                :title="story.name"
                            >{{ story.name }}</nuxt-link>
                        </h4>
                        <div class="state-box cf">
                            <span class="dark_text">Số phần:</span>
                            {{ story.total_chapters }}
                            <br />
                            <span class="dark_text">Lượt xem:</span>
                            {{ story.total_views }}
                            <br />
                            {{ story.summary.substring(0, 200) + "..." }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from "vuex";

    export default {
        props: ["categoryId"],
        computed: {
            ...mapGetters({
                listStory: "getListStoryInCategory"
            })
        },
        methods: {
            ...mapActions({
                fetchListStoryInCategory: "fetchListStoryInCategory"
            })
        },
        mounted() {
            this.fetchListStoryInCategory(this.categoryId);
        }
    };
</script>

<style>
</style>
