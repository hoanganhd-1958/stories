<template>
    <div>
        <Sidebar />
        <Navbar />
        <div class="content-wrapper">
            <router-view></router-view>
            <vue-progress-bar></vue-progress-bar>
        </div>
    </div>
</template>

<script>
    import Sidebar from "../sidebar/SidebarComponent";
    import Navbar from "../navbar/NavbarComponent";
    export default {
        components: {
            Sidebar,
            Navbar
        }
    };
</script>
