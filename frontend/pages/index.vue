<template>
    <div class="container">
        <Header />
        <div class="content">
            <br />
            <Nominations />
            <div class="row">
                <div class="col col-md-8 col-12">
                    <NewStory />
                </div>
                <div class="col col-md-4 col-12">
                    <Trending />
                </div>
            </div>
        </div>
        <Footer />
    </div>
</template>

<script>
    import Header from "../components/Header.vue";
    import Nominations from "../components/Nominations.vue";
    import ReadingStory from "../components/ReadingStory.vue";
    import NewStory from "../components/NewStory.vue";
    import Trending from "../components/Trending.vue";
    import Footer from "../components/Footer.vue";

    export default {
        components: {
            Header,
            Nominations,
            ReadingStory,
            NewStory,
            Trending,
            Footer
        }
    };
</script>

<style>
</style>
