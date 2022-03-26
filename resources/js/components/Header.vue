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
                    <v-list-item to="/logout">
                        <v-list-item-title>Logout</v-list-item-title>
                    </v-list-item>
                </v-list>
            </v-menu>
        </v-app-bar>
    </div>
</template>

<script>
export default {
    name: "Header"
}
</script>

<style scoped>

</style>
