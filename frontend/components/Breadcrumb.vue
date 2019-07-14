<template>
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <a href="http://localhost:3000" title="Trang chủ">
                <i class="fa fa-home" aria-hidden="true"></i>
                <span>Trang chủ</span>
            </a>
        </li>
        <li class="breadcrumb-item">
            <a :href=" 'http://localhost:3000/category/' + categoryId">
                <span>{{ categoryName }}</span>
            </a>
        </li>
    </ol>
</template>

<script>
    import axios from "axios";
    export default {
        props: {
            categoryName: null,
            categoryId: null
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
            this.getCategoryInfo();
        }
    };
</script>

<style>
</style>
