<template>
    <div>
        <v-row justify="center">
            <v-col cols="6">
                <v-radio-group v-model="mode" row>
                    <v-radio :value="1" label="Pretty"></v-radio>
                    <v-radio :value="2" label="Raw"></v-radio>
                    <v-radio :value="3" label="Preview"></v-radio>
                </v-radio-group>
            </v-col>
            <v-col cols="1">
                <response-headers v-model="model.headers"></response-headers>
            </v-col>
            <v-col cols="2">
                <span :class="model.status_code===200?'green--text':'red--text'">Status code: {{model.status_code}}</span>
            </v-col>
            <v-col cols="2">
                <span :class="model.status_code===200?'green--text':'red--text'">Reason phrase: {{model.reason_phrase}}</span>
            </v-col>
        </v-row>
        <v-row justify="center">
            <v-col cols="11">
                <div class="response-wrap">
                    <pre v-if="mode===2">{{ model.contents }}</pre>
                    <pre v-if="mode===1">{{ parseJson(model.contents) }}</pre>
                    <div v-if="mode===3" v-html="model.contents"></div>
                </div>
            </v-col>
        </v-row>
    </div>
</template>

<script>
import ResponseHeaders from "./response/ResponseHeaders";
export default {
    name: "Response",
    components: {ResponseHeaders},
    props: ['value'],
    data: () => ({
        mode:2,
    }),
    methods:{
        parseJson(item){
            try {
                return JSON.parse(item);
            }catch (e){
                return item;
            }
        }
    },
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
        min-height: 300px;
    }
</style>
