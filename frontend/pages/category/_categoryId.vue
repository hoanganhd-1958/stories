<template>
    <div class="container">
        <Header />
        <div class="content">
            <StoryList :categoryId="this.$route.params.categoryId" />
        </div>
        <Footer />
    </div>
</template>

<script>
    import Header from "@/components/Header.vue";
    import Breadcrumb from "@/components/Breadcrumb.vue";
    import StoryList from "@/components/StoryList.vue";
    import Footer from "@/components/Footer.vue";

    export default {
        components: {
            Header,
            Breadcrumb,
            StoryList,
            Footer
        },
        created() {}
    };
</script>

<style>
</style>
