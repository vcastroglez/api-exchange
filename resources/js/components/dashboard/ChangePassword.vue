<template>
    <v-dialog width="500" v-model="model">
        <v-card flat>
            <v-card-title>
                Dashboard
            </v-card-title>
            <v-form ref="pass_form" v-model="valid">
                <v-card-text>
                    <h3>Change password</h3>
                    <br>
                    <v-text-field
                        v-model="current_pass"
                        :append-icon="show1 ? 'mdi-eye' : 'mdi-eye-off'"
                        :rules="[rules.required]"
                        :type="show1 ? 'text' : 'password'"
                        :error-messages="error"
                        label="Current password"
                        @change="error = []"
                        outlined
                        hint="At least 8 characters"
                        @click:append="show1 = !show1"
                    ></v-text-field>
                    <v-text-field
                        v-model="new_pass"
                        :append-icon="show2 ? 'mdi-eye' : 'mdi-eye-off'"
                        :rules="[rules.required, rules.min, rules.pass]"
                        :type="show2 ? 'text' : 'password'"
                        label="New password"
                        outlined
                        @change="$refs.pass_form.validate()"
                        hint="At least 8 characters"
                        @click:append="show2 = !show2"
                    ></v-text-field>
                    <v-text-field
                        v-model="repeat_pass"
                        :append-icon="show3 ? 'mdi-eye' : 'mdi-eye-off'"
                        :rules="[rules.required, rules.min, rules.repeat]"
                        :type="show3 ? 'text' : 'password'"
                        label="Repeat new password"
                        @change="$refs.pass_form.validate()"
                        outlined
                        hint="At least 8 characters"
                        @click:append="show3 = !show3"
                    ></v-text-field>
                </v-card-text>
                <v-card-actions>
                    <v-spacer></v-spacer>
                    <v-btn @click="model=false" color="secondary">Cancel</v-btn>
                    <v-btn :loading="loading" @click="changePass" color="primary">Change</v-btn>
                </v-card-actions>
            </v-form>
        </v-card>
    </v-dialog>
</template>

<script>
export default {
    name: "ChangePassword",
    props:['value'],
    data: function () {
        return {
            valid: false,
            show1: false,
            show2: false,
            show3: false,
            rules: {
                required: value => !!value || 'Required.',
                min: v => v.length >= 8 || 'Min 8 characters',
                pass: (v) => {
                    return v === this.repeat_pass || 'Don\'t match'
                },
                repeat: (v) => {
                    return v === this.new_pass || 'Don\'t match'
                }
            },
            current_pass: '',
            new_pass: '',
            repeat_pass: '',
            loading: false,
            error: []
        }
    },
    methods: {
        async changePass() {
            this.$refs.pass_form.validate();
            if (this.valid) {
                this.loading = true;
                const response = await axios.post('/change-pass', {
                    current: this.current_pass,
                    new_pass: this.new_pass
                });
                if (response.data.success) {
                    this.current_pass = '';
                    this.new_pass = '';
                    this.repeat_pass = '';
                } else {
                    this.error.push(response.data.msg);
                }
                this.loading = false;
            }

        }
    },
    computed:{
        model:{
            get(){
                return this.value;
            },
            set(value){
                this.$emit('input',value);
            }
        }
    }
}
</script>

<style scoped>

</style>
