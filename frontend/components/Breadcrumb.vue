<template>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="http://localhost:3000" title="Trang chủ">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span>Trang chủ</span>
            </a>
        </li>
        <span v-if="categoryId !== null">
            <li class="breadcrumb-item">
                <a :href=" 'http://localhost:3000/category/' + categoryId">
                    <span>{{ categoryName }}</span>
                </a>
            </li>
        </span>

        <li class="breadcrumb-item">
            <a :href=" 'http://localhost:3000/story/' + storyId">
                <span>{{ storyName }}aa</span>
            </a>
        </li>
    </ol>
</template>

<script>
    import axios from "axios";
    export default {
        props: {
            categoryName: null,
            categoryId: null,
            storyName: null,
            storyId: null
        },
        methods: {
            async getCategoryInfo() {
                var response = await axios.get(
                    "http://localhost:8000/api/categories/" +
                        this.$route.params.categoryId
                );
                this.categoryName = response.data.name;
                this.categoryId = response.data.id;
            }
        },
        created() {
            if (!this.$route.params.categoryId == "undefined") {
                this.getCategoryInfo();
            }
        }
    };
</script>

<style>
</style>
