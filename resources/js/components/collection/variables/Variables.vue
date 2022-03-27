<template>
    <div>
        <v-container>
            <v-row>
                <v-col>
                    <v-btn @click="save">save</v-btn>
                </v-col>
            </v-row>
            <v-row no-gutters v-for="(variable,index) in variables" :key="index">
                <v-col cols="3">
                    <v-text-field prepend-icon="mdi-plus"
                                  @click:prepend="variables.push({name:'',initial_value:'',current_value:''})" outlined
                                  v-model="variable.name"></v-text-field>
                </v-col>
                <v-col>
                    <v-text-field outlined v-model="variable.initial_value"></v-text-field>
                </v-col>
                <v-col>
                    <v-text-field outlined v-model="variable.current_value"></v-text-field>
                </v-col>
            </v-row>
        </v-container>
        <h1>{{ variables }}</h1>
    </div>
</template>

<script>
export default {
    name: "Variables",
    data: () => ({
        variables: []
    }),
    mounted() {
        this.getVariables();
    },
    methods: {
        async save() {
            await axios.post(`/save-variables/${this.id}`, {variables: this.variables});
            await this.getVariables();
        },
        async getVariables() {
            const response = await axios.get(`/get-variables/${this.id}`);
            this.variables = response.data.variables || [];
            if (!this.variables.length) this.variables.push({name: '', initial_value: '', current_value: ''});
        }
    },
    computed:{
        id(){
            return this.$route.params.id;
        }
    }
}
</script>

<style scoped>

</style>
