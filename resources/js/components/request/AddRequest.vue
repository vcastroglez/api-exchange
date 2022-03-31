<template>
    <v-dialog v-model="model" width="500px">
        <v-card>
            <v-card-title>Add Request for collection {{collection.name}}</v-card-title>
            <v-card-text>
                <v-text-field v-model="name" label="Name"></v-text-field>
            </v-card-text>
            <v-card-actions>
                <v-btn outlined @click="model=false" rounded color="secondary" text>Cancel</v-btn>
                <v-spacer></v-spacer>
                <v-btn :disabled="!name" @click="createCollection" rounded color="primary">Create</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</template>

<script>
import {bus} from "../../app";

export default {
    name: "AddRequest",
    props:['value','collection'],
    data:()=>({
        name:''
    }),
    computed:{
        model:{
            get(){
                return this.value
            },
            set(value){
                this.$emit('input',value);
            }
        }
    },
    methods:{
        createCollection(){
            axios.post('/create-request',{name:this.name,collection_id:this.collection.id}).then(response=>{
                bus.$emit('reload-collections');
                this.model = false
            })
        }
    }
}
</script>

<style scoped>

</style>
