<template>
    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">
                            {{ $t('Stories') }}
                            <router-link to="/stories/create" class="btn btn-success" role="button">
                                <i class="fa fa-plus"></i>
                                {{ $t('Create') }}
                            </router-link>
                        </h3>
                        <div class="card-tools">
                            <div class="input-group input-group-sm search">
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
                        <table class="table table-bordered" id="my-table">
                            <tbody>
                                <tr>
                                    <th>{{ $t('Story.Cover Image') }}</th>
                                    <th>{{ $t('Story.Story Name') }}</th>
                                    <th>{{ $t('Story.Author') }}</th>
                                    <th>{{ $t('Story.Categories') }}</th>
                                    <th>{{ $t('Story.Number Of Chapters') }}</th>
                                    <th>{{ $t('Story.Total Views') }}</th>
                                    <th>{{ $t('Story.Modify') }}</th>
                                </tr>
                                <tr v-for="story in allStories.data" :key="story.id">
                                    <td>
                                        <img
                                            class="card-body__cover-image"
                                            :src="story.cover_image"
                                            alt="cover_image"
                                        />
                                    </td>
                                    <td>
                                        <p>{{ story.name }}</p>
                                    </td>
                                    <td>{{ story.author.username }}</td>
                                    <td>
                                        <small
                                            class="badge badge-primary card-body__badge-primary"
                                            v-for="(category, id) in story.categories"
                                            :key="id"
                                        >{{ category.name }}</small>
                                    </td>
                                    <td>{{ story.total_chapters }}</td>
                                    <td>{{ story.total_views }}</td>
                                    <td>
                                        <router-link
                                            title="Detail"
                                            :to="{ name: 'story.show', params: { storyId: story.id }}"
                                        >
                                            <i class="fas fa-door-open"></i>
                                        </router-link>
                                        <span class="helper"></span>
                                        <router-link
                                            title="Edit"
                                            :to="{ name: 'story.edit', params: { storyId: story.id }}"
                                        >
                                            <i class="fa fa-edit"></i>
                                        </router-link>
                                        <span class="helper"></span>
                                        <a href title="Delete">
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
                            <li
                                :class="[{disabled : !pagination.prev_page_url}]"
                                class="page-item"
                                @click="fetchStories(pagination.prev_page_url)"
                            >
                                <a class="page-link" href="#">«</a>
                            </li>
                            <li
                                :class="[{disabled : pagination.current_page == page}]"
                                class="page-item"
                                v-for="page in pagination.last_page"
                                :key="page"
                                @click="fetchStories(`/api/stories?page=` + page)"
                            >
                                <a class="page-link" href="#">{{ page }}</a>
                            </li>
                            <li
                                class="page-item"
                                :class="[{disabled : !pagination.next_page_url}]"
                                @click="fetchStories(pagination.next_page_url)"
                            >
                                <a class="page-link" href="#">»</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from "vuex";
    export default {
        computed: mapGetters(["allStories", "pagination"]),
        methods: {
            ...mapActions(["fetchStories"])
        },
        created() {
            this.fetchStories();
        }
    };
</script>
<style lang="scss" scoped>
    .search {
        width: 150px;
    }
    #my-table {
        th:first-child {
            width: 120px;
        }
        #my-table {
            th:first-child {
                width: 200px;
            }
            th:last-child {
                width: 120px;
            }
        }
        span.helper {
            padding: 0px 5px;
        }
        .card-body {
            font-size: 1.1em;
            &__cover-image {
                max-width: 100px;
            }
            &__badge-primary {
                margin-right: 5px;
            }
        }
    }
</style>
