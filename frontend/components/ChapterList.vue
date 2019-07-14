<template>
    <div>
        <h1 class="header-title" style="text-align: center; padding-top: 25px;">Mục lục</h1>
        <div class="row p-2 block-list-chapters">
            <div class="chapter-col col-xs-12 col-sm-6 col-md-4" v-for="index in 3" :key="index">
                <ul class="list-chapter">
                    <li v-for="(chapter, id) in chunkedItems[index-1]" :key="id">
                        <nuxt-link
                            :to="{ name: 'chap-chapId', params: { chapId: chapter.id }}"
                            :title="chapter.name"
                        >
                            <div class="header-sub entry-title">
                                <span>{{ chapter.name }}</span>
                            </div>
                            <div class="byline">
                                <i class="fa fa-eye"></i>
                                {{ chapter.view_count }} lượt xem
                                -
                                <i
                                    class="fa fa-clock-o"
                                ></i>
                                {{ chapter.created_at }}
                            </div>
                        </nuxt-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from "vuex";
    import _ from "lodash";

    export default {
        props: ["storyId", "storyName"],
        computed: {
            ...mapGetters({
                listChapter: "getListChapterInStory"
            }),
            chunkedItems() {
                return _.chunk(_.toArray(this.listChapter.data), 25);
            }
        },
        methods: {
            ...mapActions({
                fetchListChapterInStory: "fetchListChapterInStory"
            }),

            async getStoryName() {
                var response = await this.axios.get(
                    "http:://localhost/8000/api/stories/" +
                        this.$route.params.storyId
                );
                return response.data;
            }
        },
        mounted() {
            this.fetchListChapterInStory(this.storyId);
        },
        created() {}
    };
</script>

<style>
</style>
