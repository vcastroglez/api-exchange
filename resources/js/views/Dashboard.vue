<template>
    <v-container>
        <h1>Dashboard</h1>
        <v-row>
            <v-col>
                <import-postman></import-postman>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import ChangePassword from "../components/dashboard/ChangePassword";
import ImportPostman from "./ImportPostman";
export default {
    name: "Dashboard",
    components: {ImportPostman, ChangePassword},
}
</script>

<style scoped>

</style>
