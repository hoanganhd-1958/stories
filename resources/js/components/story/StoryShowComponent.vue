<template>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $t('Stories') }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-sm-12 col-md-3">
                                    <StoryCoverImageComponent :imageUrl="oneStory.coverImage"></StoryCoverImageComponent>
                                </div>
                                <div class="col-sm-12 col-md-9">
                                    <h3 class="text-center">{{ oneStory.name }}</h3>
                                    <hr />
                                    <div class="form-group">
                                        <span class="bold">{{ $t('Story.Summary') }}</span>
                                        <span class="text-justify">{{ oneStory.summary }}</span>
                                    </div>
                                    <div class="form-group">
                                        <span class="bold">{{ $t('Category.Name') }}</span>:
                                        <small
                                            class="badge badge-primary card-body__badge-primary"
                                            v-for="(category, id) in oneStory.categorySelections"
                                            :key="id"
                                        >{{ category.name }}</small>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <p></p>
                                    <div class="form-group">
                                        <span class="chapter-list">{{ $t('Story.Chapter List') }}</span>
                                        <button class="btn btn-success float-right" @click="sort()">
                                            <i class="fas fa-sort"></i>
                                            {{ $t('Story.Order') }}
                                        </button>
                                        <button
                                            class="btn btn-primary float-right create-chapter"
                                            @click="addChapter()"
                                        >
                                            <i class="fas fa-plus"></i>
                                            {{ $t('Chapter.Create') }}
                                        </button>
                                    </div>
                                    <draggable
                                        tag="ul"
                                        v-model="oneStory.chapters"
                                        class="list-group"
                                        handle=".handle"
                                    >
                                        <li
                                            class="list-group-item"
                                            v-for="(element) in oneStory.chapters"
                                            :key="element.id"
                                        >
                                            <i class="fa fa-align-justify handle"></i>
                                            <editable
                                                :content="element.name"
                                                @update="element.name = $event"
                                                class="text-editable"
                                            ></editable>
                                            <button class="btn btn-danger delete float-right">
                                                <i class="fa fa-trash"></i>
                                                {{ $t('Delete') }}
                                            </button>
                                        </li>
                                    </draggable>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from "vuex";
    import draggable from "vuedraggable";
    import axios from "axios";
    import StoryCoverImageComponent from "./StoryCoverImageComponent.vue";
    export default {
        components: {
            draggable,
            StoryCoverImageComponent
        },
        data() {
            return {};
        },
        computed: mapGetters(["oneStory"]),
        methods: {
            ...mapActions(["fetchOneStory"]),
            sort() {
                axios.post(`api/chapters/sort`, this.oneStory.chapters);
            },
            addChapter() {
                axios.post(`api/chapters`, {
                    story_id: this.$route.params.storyId
                });
            },
            async addChapter() {
                await axios.post(`api/chapters`, {
                    story_id: this.$route.params.storyId
                });
                this.fetchOneStory(this.$route.params.storyId);
            }
        },
        created() {
            this.fetchOneStory(this.$route.params.storyId);
        }
    };
</script>
<style scoped>
    .card-body {
        background: #ecf0f1;
    }
    .button {
        margin-top: 35px;
    }
    .handle {
        float: left;
        padding-top: 8px;
        padding-bottom: 8px;
    }
    .text {
        margin: 20px;
    }
    .chapter-list {
        font-size: 1.6em;
    }
    small.badge {
        margin: 0px 5px;
    }
    span.bold {
        font-weight: bold;
    }
    .text-editable {
        margin: 3px 0px 0px 30px;
        display: inline-block;
    }
    button.delete {
        display: inline-block;
    }
    .create-chapter {
        margin-right: 10px;
    }
</style>
