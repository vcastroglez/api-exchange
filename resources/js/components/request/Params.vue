<template>
    <v-container>
        <v-row no-gutters v-for="(header,index) in model" :key="index">
            <v-col cols="3">
                <v-text-field prepend-icon="mdi-plus" @click:prepend="model.push({key:'',value:''})" outlined
                              v-model="header.key"></v-text-field>
            </v-col>
            <v-col>
                <v-text-field outlined v-model="header.value"></v-text-field>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    name: "Params",
    props: ['value'],
    computed: {
        model: {
            get() {
                return this.value || [];
            },
            set(value) {
                this.$emit('input', value)
            }
        }
    },
    watch: {
        model: {
            handler(value) {
                if (value.length) return;
                value.push({key: '', value: ''})
                this.$emit('input', value)
            }, immediate: true, deep: true
        }
    }
}
</script>

<style scoped>

</style>
