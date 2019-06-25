<template>
    <div class="col-md-12 mt-4">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">{{ $t('Create') }}</h3>
            </div>
            <!-- /.card-header -->
            <form role="form" @submit.prevent="editMode ? editStory() : addStory()">
                <div class="card-body">
                    <!-- text input -->
                    <div class="form-group">
                        <label>{{ $t('Story.Story Name') }}</label>
                        <input type="text" class="form-control" v-model="oneStory.name" />
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
                        <textarea class="form-control" rows="3" v-model="oneStory.summary"></textarea>
                    </div>
                    <!-- Select multiple-->
                    <div class="form-group">
                        <label>{{ $t('Category.Name') }}</label>
                        <multiselect
                            v-model="oneStory.categorySelections"
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
    computed: mapGetters(["allCategories", "oneStory"]),
    methods: {
        ...mapActions([
            "fetchCategories",
            "newStory",
            "fetchOneStory",
            "clearState",
            "updateStory"
        ]),
        onFileSelected(e) {
            this.oneStory.coverImage = event.target.files[0];
        },
        addStory() {
            this.newStory();
        },
        editStory() {
            this.updateStory(this.$route.params.storyId);
        }
    },
    created() {
        if (typeof this.$route.params.storyId !== "undefined") {
            let response = this.fetchOneStory(this.$route.params.storyId);
            this.name = response.name;
            this.editMode = true;
        } else {
            this.clearState();
        }
        this.fetchCategories();
    }
};
</script>
