<template>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3
                            class="card-title float-left"
                        >{{ getChapter.name }} - {{ getChapter.story }}</h3>
                        <button class="btn btn-danger float-right" @click="updateContent()">
                            <i class="fas fa-save"></i>
                            {{ $t('Chapter.Save') }}
                        </button>
                        <button
                            class="btn btn-primary float-right helper"
                            @click="publishChapter()"
                        >
                            <i class="fas fa-upload"></i>
                            {{ $t('Chapter.Publish') }}
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="form-group">
                            <ckeditor
                                :editor="editor"
                                v-model="getChapter.content"
                                :config="editorConfig"
                            ></ckeditor>
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
    import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
    import axios from "axios";

    export default {
        data() {
            return {
                editor: ClassicEditor,
                editorConfig: {
                    // The configuration of the rich-text editor.
                    uiColor: "#9AB8F3"
                }
            };
        },
        methods: {
            ...mapActions(["fetchChapter", "updateChapterContent"]),
            async updateContent() {
                await this.updateChapterContent(this.$route.params.chapterId);
                this.$swal.fire("Success!", "Save successful", "success");
            },
            async publishChapter() {
                await axios.get(
                    `api/chapters/${this.$route.params.chapterId}/publish`
                );
                this.$swal.fire("Success!", "Publish successful", "success");
            }
        },
        computed: mapGetters(["getChapter"]),
        created() {
            this.fetchChapter(this.$route.params.chapterId);
        }
    };
</script>

<style>
    .helper {
        margin: 0px 5px;
    }
</style>

