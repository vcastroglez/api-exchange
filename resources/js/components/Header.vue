<template>
    <div>
        <v-app-bar
            color="deep-purple accent-4"
            dense
            dark
            app
            clipped-left
        >
            <v-toolbar-title>API Exchange</v-toolbar-title>

            <v-spacer></v-spacer>
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
                    <v-list-item>
                        <v-list-item-title>{{$store.state.user.name}}</v-list-item-title>
                    </v-list-item>
                    <v-list-item @click="dialog=true">
                        <v-list-item-title>Change password</v-list-item-title>
                    </v-list-item>
                    <v-list-item href="/logout">
                        <v-list-item-title>Logout</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-app-bar>
        <change-password v-model="dialog"></change-password>
    </div>
</template>

<script>
import ChangePassword from "./dashboard/ChangePassword";
export default {
    name: "Header",
    components: {ChangePassword},
    data: () => ({
        dialog:false
    }),
}
</script>

<style scoped>

</style>
