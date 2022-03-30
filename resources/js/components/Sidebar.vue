<template>
    <div>
        <v-navigation-drawer width="20vw" app clipped dark color="black" v-model="drawer" style="overflow-x: auto">
            <h2 class="white--text pa-4">API Exchange</h2>
            <template v-slot:append>
                <div class="pa-2">
                    <v-btn href="/logout" block>
                        Logout
                    </v-btn>
                </div>
            </template>
            <v-list
                dense
                nav
            >
                <v-list-item
                    to="/"
                    link
                >
                    <v-list-item-title>Dashboard</v-list-item-title>
                    <v-list-item-action @click="addCollection">
                        <v-icon>mdi-folder-plus</v-icon>
                    </v-list-item-action>
                </v-list-item>
                <v-list-group
                    v-if="$store.state.collections.length"
                    :value="true"
                    prepend-icon="mdi-account-circle"
                >
                    <template v-slot:activator>
                        <v-list-item-title>Collections</v-list-item-title>
                    </template>

                    <v-list-group
                        :value="true"
                        v-for="collection in $store.state.collections"
                        :key="collection.id"
                        no-action
                        sub-group
                    >
                        <template v-slot:activator>
                            <v-list-item>
                                <v-list-item-title>{{ collection.name }} <span title="Shared" v-if="collection.user_id!==$store.state.user.id"><v-icon color="primary" small>mdi-account-multiple</v-icon></span></v-list-item-title>
                                <v-list-item-action>
                                    <v-menu
                                        left
                                        bottom
                                    >
                                        <template v-slot:activator="{ on, attrs }">
                                            <v-btn
                                                icon
                                                v-bind="attrs"
                                                v-on="on"
                                            >
                                                <v-icon>mdi-dots-vertical</v-icon>
                                            </v-btn>
                                        </template>

                                        <v-list>
                                            <v-list-item :to="`/variables/${collection.id}`">
                                                <v-list-item-title>Variables</v-list-item-title>
                                            </v-list-item>
                                            <v-list-item @click="rename(collection.id)">
                                                <v-list-item-title>Rename</v-list-item-title>
                                            </v-list-item>
                                            <v-list-item @click="share(collection.id)">
                                                <v-list-item-title>Share</v-list-item-title>
                                            </v-list-item>
                                            <v-list-item @click="addRequest(collection)">
                                                <v-list-item-title>Add request</v-list-item-title>
                                            </v-list-item>
                                            <v-list-item @click="deleteCollection(collection.id)">
                                                <v-list-item-title>Delete collection</v-list-item-title>
                                            </v-list-item>
                                        </v-list>
                                    </v-menu>
                                </v-list-item-action>
                            </v-list-item>
                        </template>

                        <v-list-item
                            v-for="request in collection.requests"
                            :key="request.id"
                            :to="`/request/${request.id}`"
                            link
                        >
                            <v-list-item-title>{{ request.name }}</v-list-item-title>
                        </v-list-item>
                    </v-list-group>
                </v-list-group>
            </v-list>
        </v-navigation-drawer>
        <add-collection v-model="add_collection_dialog"></add-collection>
        <add-request v-model="add_request_dialog" :collection="selected_collection"></add-request>
    </div>
</template>

<script>
import AddCollection from "./collection/AddCollection";
import {bus} from "../app";
import AddRequest from "./request/AddRequest";

export default {
    name: "Sidebar",
    components: {AddRequest, AddCollection},
    data: () => ({
        add_collection_dialog: false,
        add_request_dialog: false,
        selected_collection:{},
        drawer:true
    }),
    mounted() {
        bus.$on('toggle-sidebar',()=>{
            this.drawer = !this.drawer;
        })
    },
    methods: {
        async share(id) {
            const mail = window.prompt("Set the mail to share");
            const response = await axios.post(`/share-collection/${id}`, {mail});
            console.log(response.data);
        },
        async rename(id){
            const new_name = window.prompt("Set new name for collection");
            if(!new_name){
                alert('Insert a name!');
                return;
            }
            await axios.post(`/rename-collection/${id}`,{new_name});
            bus.$emit('reload-collections')
        },
        addRequest(collection) {
            this.selected_collection = collection;
            this.add_request_dialog = true;
        },
        addCollection() {
            this.add_collection_dialog = true;
        },
        deleteCollection(id){
            const confirm = window.confirm("Are you sure to delete this collection?");
            if(confirm)
            axios.delete(`/delete-collection/${id}`).then(()=>{
                bus.$emit('reload-collections')
            })
        }
    }
}
</script>

<style scoped>

</style>
