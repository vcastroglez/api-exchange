<template>
    <v-container>
        <v-row align-content="center" align="center" no-gutters>
            <v-col>
                <v-radio-group v-model="mode" row>
                    <v-radio label="Form data" :value="0"></v-radio>
                    <v-radio label="Raw" :value="1"></v-radio>
                </v-radio-group>
            </v-col>
            <v-col>
                <v-btn v-if="mode===1" text color="primary" @click="formatJson" class="text-none" small>Format json</v-btn>
            </v-col>
        </v-row>
        <v-row no-gutters>
            <v-col>
                <v-textarea v-if="mode===1" outlined v-model="model"></v-textarea>
                <v-row  v-if="mode===0" no-gutters v-for="(header,index) in json_model" :key="index">
                    <v-col cols="3">
                        <v-text-field prepend-icon="mdi-plus" @click:prepend="json_model.push({name:'',value:''})"
                                      outlined
                                      v-model="header.name"></v-text-field>
                    </v-col>
                    <v-col>
                        <v-text-field outlined v-model="header.value"></v-text-field>
                    </v-col>
                </v-row>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>
import Params from "./Params";

export default {
    name: "RequestBody",
    components: {Params},
    props: ['value'],
    data: () => ({
        mode: 0,
        json_model: []
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
    },
    methods: {
        objectToJson(object) {
            const json_format = {}
            object.forEach(item => {
                json_format[item.name] = item.value;
            })
            return JSON.stringify(json_format,null,2);
        },
        formatJson(){
            this.model = JSON.stringify(JSON.parse(this.model),null,2);
        }
    },
    watch: {
        json_model: {
            handler(value) {
                this.model = this.objectToJson(value);
            },
            deep:true
        },
        mode: {
            handler(value) {
                if (value === 0) {
                    this.json_model = [];
                    const elem = JSON.parse(this.model);
                    Object.keys(elem).forEach(item => {
                        this.json_model.push({name: item, value: elem[item]});
                    });
                }
            }, immediate: true
        }
    }
}
</script>

<style scoped>

</style>
