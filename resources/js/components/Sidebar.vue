<template>
    <div>
        <v-navigation-drawer clipped app dark color="black">
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
                                <v-list-item-title>{{ collection.name }}</v-list-item-title>
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
        selected_collection:{}
    }),
    methods: {
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
