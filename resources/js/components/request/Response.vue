<template>
    <v-row justify="center">
        <v-col cols="11" style="border: 1px solid black">
            <pre>{{ model }}</pre>
        </v-col>
    </v-row>
</template>

<script>
export default {
    name: "Response",
    props: ['value'],
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

</style>
