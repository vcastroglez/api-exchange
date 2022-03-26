<template>
    <v-container>
        <v-row no-gutters>
            <v-col>
                <v-textarea outlined v-model="model"></v-textarea>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
export default {
    name: "RequestBody",
    props:['value'],
    computed:{
        model:{
            get(){
                return this.value;
            },
            set(value){
                this.$emit('input',value)
            }
        }
    }
}
</script>

<style scoped>

</style>
