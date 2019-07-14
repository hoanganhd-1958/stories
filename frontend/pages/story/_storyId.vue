<template>
    <div class="container">
        <Header />
        <div class="content">
            <Breadcrumb />
        </div>
        <Footer />
    </div>
</template>

<script>
    import Header from "@/components/Header.vue";
    import Breadcrumb from "@/components/Breadcrumb.vue";
    import Footer from "@/components/Footer.vue";

    export default {
        components: {
            Header,
            Breadcrumb,
            Footer
        },
        created() {
            console.log(this.$route.params.storyId);
        }
    };
</script>

<style>
</style>
