<template>
    <div>
        <v-row justify="center">
            <v-col cols="11">
                <v-switch label="Pretty" v-model="pretty"></v-switch>
            </v-col>
        </v-row>
        <v-row justify="center">
            <v-col cols="11">
                <div class="response-wrap">
                    <pre v-if="!pretty">{{ model }}</pre>
                    <pre v-else>{{ JSON.parse(model) }}</pre>
                </div>
            </v-col>
        </v-row>
    </div>
</template>

<script>
export default {
    name: "Response",
    props: ['value'],
    data: () => ({
        pretty: false
    }),
    computed: {
        model: {
            get() {
                return this.value;
            },
            set(value) {
                this.$emit('input', value)
            }
        }
    }
}
</script>

<style scoped>
    .response-wrap{
        border: 1px solid black;
        padding: 10px;
        overflow: auto;
        word-wrap: break-word;
    }
</style>
