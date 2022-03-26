<template>
    <v-app>
        <Header />
        <Sidebar />
        <v-main>
            <router-view></router-view> <!-- container-fluid div Replaced by router-view -->
        </v-main>
    </v-app>
</template>

<script>
import Header from "./components/Header.vue";
import Sidebar from "./components/Sidebar.vue";
import Footer from "./components/Footer.vue";
import {bus} from "./app";

export default {
    name: "App",
    components: {
        Header,
        Sidebar,
        Footer
    },
    beforeMount() {
        bus.$on('reload-collections',()=>{
            this.$store.dispatch('getCollections');
        })
        this.$store.commit('setUser',window.USER);
        this.$store.dispatch('getCollections');
    }
};
</script>
