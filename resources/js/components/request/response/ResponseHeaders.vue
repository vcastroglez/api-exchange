<template>
    <v-dialog v-model="dialog" width="auto">
        <template v-slot:activator="{ on, attrs }">
            <v-btn
                color="primary"
                v-bind="attrs"
                v-on="on"
                small
            >
                Headers
            </v-btn>
        </template>
        <v-card>
            <v-card-title>
                <v-spacer></v-spacer>
                <v-btn color="red" @click="dialog=false" icon><v-icon>mdi-close</v-icon></v-btn>
            </v-card-title>
            <v-card-text>
                <v-row style="border-bottom: 1px dashed black" no-gutters v-for="(header,index) in value" :key="index">
                    <v-col>
                        <span v-html="index"></span>
                    </v-col>
                    <v-col>
                        <span class="block" v-for="item in header" v-html="item"></span>
                    </v-col>
                </v-row>
            </v-card-text>
        </v-card>
    </v-dialog>
</template>

<script>
export default {
    name: "ResponseHeaders",
    props: ['value'],
    data: () => ({
        dialog: false
    })
}
</script>

<style scoped>

</style>
