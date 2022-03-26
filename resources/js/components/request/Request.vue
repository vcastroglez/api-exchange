<template>
    <v-container>
        <v-row>
            <v-col>
                <v-breadcrumbs
                    :items="breadcrumbs"
                    divider=">"
                ></v-breadcrumbs>
            </v-col>
            <v-spacer></v-spacer>
            <v-col cols="1">
                <v-btn :disabled="original_hash===current_hash" x-large color="primary" @click="saveChanges" icon><v-icon>mdi-content-save</v-icon></v-btn>
                <v-btn x-large color="red" @click="deleteRequest" icon><v-icon>mdi-delete</v-icon></v-btn>
            </v-col>
        </v-row>
        <v-row no-gutters>
            <v-col cols="1">
                <v-select
                    v-model="request.method"
                    :items="methods"
                    outlined
                ></v-select>
            </v-col>
            <v-col>
                <v-text-field outlined v-model="request.uri"></v-text-field>
            </v-col>
            <v-col cols="1">
                <v-btn :loading="loading" :disabled="!request.uri" x-large color="primary" @click="sendRequest" icon><v-icon>mdi-send</v-icon></v-btn>
            </v-col>
        </v-row>
        <v-row no-gutters>
            <v-col cols="12">
                <v-tabs
                    v-model="tab"
                    align-with-title
                >
                    <v-tabs-slider color="primary"></v-tabs-slider>

                    <v-tab
                        v-for="item in tabs"
                        :key="item"
                    >
                        {{ item }}
                    </v-tab>
                </v-tabs>
            </v-col>
        </v-row>
        <v-row no-gutters>
            <v-col cols="12">
                <v-tabs-items v-model="tab">
                    <v-tab-item>
                        <v-card flat>
                            <v-card-text>
                                <params v-model="request.headers"></params>
                            </v-card-text>
                        </v-card>
                    </v-tab-item>
                    <v-tab-item>
                        <v-card flat>
                            <v-card-text>
                                <params v-model="request.params"></params>
                            </v-card-text>
                        </v-card>
                    </v-tab-item>
                    <v-tab-item>
                        <v-card flat>
                            <v-card-text>
                                <request-body v-model="request.body"></request-body>
                            </v-card-text>
                        </v-card>
                    </v-tab-item>
                </v-tabs-items>
            </v-col>
        </v-row>
        <response v-if="request.response"  v-model="request.response"></response>
    </v-container>
</template>

<script>
import Params from "./Params";
import Headers from "./Headers";
import RequestBody from "./Body";
import {bus} from "../../app";
import Response from "./Response";

export default {
    name: "Request",
    components: {Response, Headers, Params,RequestBody},
    data: function () {
        return {
            original_hash:null,
            loading:false,
            tab:0,
            tabs:['Headers','Params','Body'],
            request: {
            },
            methods:[
                'GET',
                'POST',
                'PUT',
                'DELETE',
            ]
        }
    },
    methods:{
        async deleteRequest(){
            const confirm = window.confirm("Are you sure to delete?");
            if(confirm) await axios.delete(`/delete-request/${this.request.id}`);
            bus.$emit('reload-collections')
            await this.$router.push('/');
        },
        async saveChanges() {
            await axios.post('/save-request', this.request);
            this.original_hash = JSON.stringify(this.request).hashCode()
        },
        async sendRequest(){
            this.loading = true;
            const response = await axios.post('/send-request',this.request);
            this.request = response.data.item;
            this.original_hash = JSON.stringify(this.request).hashCode()
            this.loading = false;
        },
        async getRequest(id){
            const response = await axios.get(`/get-request/${id}`);
            this.request = response.data.item;
            this.original_hash = JSON.stringify(this.request).hashCode()
        }
    },
    computed: {
        params_query(){
            if(!this.request.params || !this.request.params.length) return '';
            return this.request.params.reduce((prev, current) => {
                if (!current.name || !current.value) return prev;
                return `${prev}&${current.name}=${current.value}`
            }, '?').replace('?&', '?');
        },
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
        },
        current_hash(){
            return JSON.stringify(this.request).hashCode();
        }
    },
    watch: {
        id: {
            async handler(value) {
                this.getRequest(value)
            },
            immediate: true
        },
    }
}
</script>

<style scoped>

</style>
