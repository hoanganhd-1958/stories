<template>
    <div class="col-md-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ editMode ? $t('Update') : $t('Create') }}</h3>
            </div>
            <!-- /.card-header -->
            <form role="form" @submit="editMode ? updateStory() : addStory()">
                <div class="card-body">
                    <!-- text input -->
                    <div class="form-group">
                        <label>{{ $t('Story.Story Name') }}</label>
                        <input type="text" class="form-control" v-model="story.name" />
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">{{ $t('Story.Cover Image') }}</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input
                                    type="file"
                                    class="custom-file-input"
                                    id="exampleInputFile"
                                    @change="onFileSelected"
                                />
                                <label
                                    class="custom-file-label"
                                    for="exampleInputFile"
                                >{{ $t('Story.Choose File') }}</label>
                            </div>
                        </div>
                    </div>
                    <!-- textarea -->
                    <div class="form-group">
                        <label>{{ $t('Summary') }}</label>
                        <textarea class="form-control" rows="3" v-model="story.summary"></textarea>
                    </div>
                    <!-- Select multiple-->
                    <div class="form-group">
                        <label>{{ $t('Category.Name') }}</label>
                        <multiselect
                            v-model="story.categorySelections"
                            :selected.sync="story.categorySelections"
                            :options="allCategories"
                            :multiple="true"
                            :close-on-select="false"
                            :clear-on-select="false"
                            :preserve-search="true"
                            :placeholder="$t('Category.Pick One')"
                            label="name"
                            track-by="id"
                            :preselect-first="false"
                        >
                            <template slot="selection" slot-scope="{ values, search, isOpen }">
                                <span
                                    class="multiselect__single"
                                    v-if="values.length &amp;&amp; !isOpen"
                                >{{ values.length }} {{ $t('Category.Options Selected') }}</span>
                            </template>
                        </multiselect>
                    </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer pull-right">
                    <button
                        type="submit"
                        class="btn btn-primary"
                    >{{ editMode ? $t('Update') : $t('Submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
import Multiselect from "vue-multiselect";
import { mapGetters, mapActions } from "vuex";
export default {
    components: { Multiselect },
    data() {
        return {
            editMode: false
        };
    },
    computed: mapGetters(["allCategories", "story"]),
    methods: {
        ...mapActions([
            "fetchCategories",
            "newStory",
            "fetchStory",
            "updateOneStory"
        ]),
        onFileSelected(e) {
            this.story.coverImage = event.target.files[0];
        },
        prepareData() {
            let data = new FormData();
            data.append("name", this.story.name);
            data.append("summary", this.story.summary);
            data.append("coverImage", this.story.coverImage);
            data.append(
                "categorySelections",
                JSON.stringify(this.story.categorySelections)
            );
            //way to debug FormData
            // for (var abc of data.entries()) {
            //     console.log(abc[0] + ", " + abc[1]);
            // }
            return data;
        },
        addStory() {
            this.newStory(this.prepareData());
        },
        updateStory() {
            this.updateOneStory(this.prepareData(), this.$route.params.storyId);
        }
    },
    created() {
        if (typeof this.$route.params.storyId !== "undefined") {
            this.fetchStory(this.$route.params.storyId);
            this.editMode = true;
        }
        this.fetchCategories();
    }
};
</script>
