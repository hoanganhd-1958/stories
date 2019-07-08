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
                                            <router-link
                                                :to="{ name: 'chapter.edit', params: { chapterId: element.id }}"
                                                role="button"
                                                v-if="element.has_content"
                                                class="btn btn-info float-right margin-right-5px"
                                            >
                                                <i class="fa fa-pen"></i>
                                                {{ $t('Story.Edit content') }}
                                            </router-link>
                                            <div
                                                class="dropdown float-right margin-right-5px"
                                                v-else
                                            >
                                                <button
                                                    class="btn btn-primary dropdown-toggle"
                                                    type="button"
                                                    id="dropdownMenuButton"
                                                    data-toggle="dropdown"
                                                    aria-haspopup="true"
                                                    aria-expanded="false"
                                                >
                                                    <i class="fas fa-plus"></i>
                                                    {{ $t('Story.Add content') }}
                                                </button>
                                                <div
                                                    class="dropdown-menu"
                                                    aria-labelledby="dropdownMenuButton"
                                                >
                                                    <router-link
                                                        :to="{ name: 'chapter.edit', params: { chapterId: element.id }}"
                                                        class="dropdown-item"
                                                    >{{ $t('Story.Composed') }}</router-link>
                                                    <a
                                                        @click="setChapterId(element.id)"
                                                        data-toggle="modal"
                                                        data-target="#modal"
                                                        role="button"
                                                        class="dropdown-item"
                                                        href="#"
                                                    >{{ $t('Story.From Another Source') }}</a>
                                                </div>
                                            </div>
                                            <ChapterDraftComponent
                                                v-if="!element.publish && element.has_content"
                                                class="float-right"
                                                :content="$t('Chapter.Draft')"
                                            ></ChapterDraftComponent>
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
        <!-- Modal -->
        <div
            class="modal fade"
            id="modal"
            tabindex="-1"
            role="dialog"
            aria-labelledby="exampleModalLabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5
                            class="modal-title"
                            id="exampleModalLabel"
                        >{{ $t('Story.From Another Source') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <input
                            type="text"
                            class="form-control"
                            :placeholder="$t('Story.Demo link')"
                            v-model="anotherSourceUrl"
                        />
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-primary"
                            @click="getContentFromAnotherSource()"
                        >{{ $t('Submit') }}</button>
                    </div>
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
    import ChapterDraftComponent from "../chapter/ChapterDraftComponent.vue";
    export default {
        components: {
            draggable,
            StoryCoverImageComponent,
            ChapterDraftComponent
        },
        data() {
            return {
                anotherSourceUrl: null,
                chapterId: null
            };
        },
        computed: mapGetters(["oneStory"]),
        methods: {
            ...mapActions(["fetchOneStory"]),
            async sort() {
                await axios.post(`api/chapters/sort`, this.oneStory.chapters);
                this.$swal.fire("Success!", "Update successful", "success");
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
            },
            setChapterId(chapterId) {
                this.chapterId = chapterId;
            },
            async getContentFromAnotherSource() {
                await axios.post(`api/chapters/get-content-from-another-source`, {
                    id: this.chapterId,
                    url: this.anotherSourceUrl
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
    .margin-right-5px {
        margin-right: 5px;
    }
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
