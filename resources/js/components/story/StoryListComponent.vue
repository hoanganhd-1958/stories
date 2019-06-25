<template>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">
                                {{ $t('Stories') }}
                                <router-link
                                    role="button"
                                    to="/stories/create"
                                    class="btn btn-success"
                                >
                                    <i class="fas fa-plus"></i>
                                    {{ $t('Create') }}
                                </router-link>
                            </h3>
                            <div class="card-tools">
                                <div class="input-group input-group-sm" style="width: 150px;">
                                    <input
                                        type="text"
                                        name="table_search"
                                        class="form-control float-right"
                                        :placeholder="$t('Search')"
                                    />
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th style="width: 200px">{{ $t('Story.Cover Image') }}</th>
                                        <th>{{ $t('Story.Story Name') }}</th>
                                        <th>{{ $t('Story.Author') }}</th>
                                        <th>{{ $t('Story.Categories') }}</th>
                                        <th>{{ $t('Story.Total Views') }}</th>
                                        <th style="width: 90px">{{ $t('Story.Modify') }}</th>
                                    </tr>
                                    <tr v-for="story in allStories" :key="story.id">
                                        <td>
                                            <img
                                                class="card-body__cover-image"
                                                :src="story.cover_image"
                                                alt="cover_image"
                                            />
                                        </td>
                                        <td>
                                            <p>{{story.name}}</p>
                                        </td>
                                        <td>{{story.author.username}}</td>
                                        <td>
                                            <small
                                                class="badge badge-primary card-body__badge-primary"
                                                v-for="(category, id) in story.categories"
                                                :key="id"
                                            >{{category.name}}</small>
                                        </td>
                                        <td></td>
                                        <td>
                                            <router-link
                                                :to="{ name: 'story.edit', params: { storyId: story.id }}"
                                            >
                                                <i class="fa fa-edit"></i>
                                            </router-link>
                                            <span style="padding: 0px 5px"></span>
                                            <a href>
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer clearfix">
                            <ul class="pagination pagination-sm m-0 float-right">
                                <li class="page-item">
                                    <a class="page-link" href="#">«</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">3</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="#">»</a>
                                </li>
                            </ul>
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
    computed: mapGetters(["allStories"]),
    methods: {
        ...mapActions(["fetchStories"])
    },
    created() {
        this.fetchStories();
    }
};
</script>
<style lang="scss" scoped>
.card-body {
    font-size: 1.1em;
    &__cover-image {
        max-width: 100px;
    }
    &__badge-primary {
        margin-right: 5px;
    }
}
</style>
