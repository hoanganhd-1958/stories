<template>
    <div>
        <nav class="navbar navbar-expand-lg navbar-dark bg-panel-dark">
            <a class="navbar-brand logo visible-lg visible-md" href></a>
            <button
                class="navbar-toggler btn-block"
                type="button"
                data-toggle="collapse"
                data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="true"
                aria-label="Toggle navigation"
            >
                <i class="fa fa-search" aria-hidden="true"></i> Tìm kiếm
            </button>
            <div class="navbar-collapse collapse show" id="navbarSupportedContent" style>
                <div class="navbar-nav mr-auto"></div>
                <form
                    class="form-inline my-2 my-lg-0"
                    style="position: relative"
                    onsubmit="return false;"
                >
                    <input
                        class="form-control mr-sm-2 header-search-tool"
                        style="background: #1b1e21; border-color: #2b3137"
                        type="search"
                        placeholder="Tìm tác phẩm truyện!"
                        aria-label="Search"
                    />
                    <div
                        class="result-search-box-header p-2"
                        style="
            position: absolute; top: 40px; background-color: #2b3038; width: 100%; min-height: 50px;
            z-index: 9; display: none; overflow: hidden;
        "
                    >
                        Kết quả tìm kiếm :
                        <span class="pull-right btn-close">Đóng</span>
                        <div class="text-center loading-animate-header">
                            <div class="lds-ellipsis">
                                <div></div>
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        <div class="list-result-search-header mt-2"></div>
                    </div>
                </form>
            </div>
        </nav>
        <div class="topnav" id="myTopnav">
            <nuxt-link class="active-nav" to="/">Trang chủ</nuxt-link>

            <div class="dropdown">
                <button class="dropbtn">
                    Thể loại
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <div class="grid-container">
                        <div
                            class="grid-item"
                            v-for="(category, index) in listCategory"
                            :key="index"
                        >
                            <nuxt-link
                                :to="{ name: 'category-categoryId', params: { categoryId: category.id }}"
                            >
                                <h3
                                    class="header-sub pl-2"
                                >{{ category.name }} ({{ category.story_count }})</h3>
                            </nuxt-link>
                        </div>
                    </div>
                </div>
            </div>
            <a
                href="javascript:void(0);"
                style="font-size:15px;"
                class="icon"
                onclick="myFunction()"
            >☰</a>
        </div>
    </div>
</template>

<script>
    import { mapGetters, mapActions } from "vuex";

    export default {
        computed: {
            ...mapGetters({
                listCategory: "getListCategory"
            })
        },
        methods: {
            ...mapActions({
                fetchListCategory: "fetchListCategory"
            })
        },
        mounted() {
            this.fetchListCategory();
        }
    };
</script>
