<template>
    <div class="container">
        <div class="content">
            <ReadChapter />
        </div>
        <Footer />
    </div>
</template>

<script>
    import Header from "@/components/Header.vue";
    import Breadcrumb from "@/components/Breadcrumb.vue";
    import ReadChapter from "@/components/ReadChapter.vue";
    import Footer from "@/components/Footer.vue";

    export default {
        components: {
            Header,
            ReadChapter,
            Footer
        },
        created() {}
    };
</script>

<style>
</style>
