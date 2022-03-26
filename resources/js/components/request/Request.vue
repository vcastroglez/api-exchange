<template>
    <v-container>
        <v-breadcrumbs
            :items="breadcrumbs"
            divider=">"
        ></v-breadcrumbs>
        <h1>{{ request }}}</h1>
    </v-container>
</template>

<script>
export default {
    name: "Request",
    data: function () {
        return {
            request: {

            },
        }
    },
    computed: {
        breadcrumbs(){
            if(!this.request) return [];
            return [
                {
                    text: 'Dashboard',
                    disabled: false,
                    to: '/',
                },
                {
                    text: this.request?.collection?.name,
                    disabled: true,
                },
                {
                    text: this.request?.name,
                    disabled: true,
                },
            ];
        },
        id() {
            return this.$route.params.id
        }
    },
    watch: {
        id: {
            async handler(value) {
                const response = await axios.get(`/get-request/${value}`);
                this.request = response.data.item;
            },
            immediate: true
        }
    }
}
</script>

<style scoped>

</style>
