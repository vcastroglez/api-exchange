<template>
    <div>
        <Header />
        <div id="wrapper">
            <Sidebar />
            <div id="content-wrapper">
                <router-view></router-view> <!-- container-fluid div Replaced by router-view -->
                <Footer />
            </div>
        </div>
    </div>
</template>

<script>
import Header from "./components/Header.vue";
import Sidebar from "./components/Sidebar.vue";
import Footer from "./components/Footer.vue";

export default {
    name: "App",
    components: {
        Header,
        Sidebar,
        Footer
    }
};
</script>
