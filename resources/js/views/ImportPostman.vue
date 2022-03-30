<template>
    <v-container>
        <h3>Import from postman (v2.1)</h3>
        <v-row align="center">
            <v-col>
                <v-file-input v-model="file" label="Collection" clearable accept="application/json"></v-file-input>
            </v-col>
            <v-col>
                <v-btn :loading="loading" color="primary" @click="importCollection">Import</v-btn>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import {bus} from "../app";

export default {
    name: "ImportPostman",
    data: () => ({
        file:{},
        loading:false
    }),
    methods:{
        async importCollection() {
            this.loading = true;
            let form_data = new FormData();
            form_data.append('collection', this.file);
            const response = await axios.post('/import-collection', form_data, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            });
            if(response.data.success){
                bus.$emit('reload-collections')
                alert('Imported!');
            }
            this.loading = false;
        }
    }
}
</script>

<style scoped>

</style>
