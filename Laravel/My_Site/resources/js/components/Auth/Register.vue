<template>
    <div class="justify-content-center row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Register
                </div>

                <div class="card-body">
<!--                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />-->
                    <div class="form-group row">
                        <label for="name" class="col-md-4 text-md-right">Name</label>

                        <div class="col-md-6">
                            <input v-model="name" type="text" class="form-control" required />
                        </div>

                        <span v-if="errors.name.status" class="invalid-feedback" role="alert">
                            <strong>{{ this.errors.name.message }}</strong>
                        </span>
                    </div>

                    <!-- Email -->
                    <div class="form-group row">
                        <label for="email" class="col-md-4 text-md-right">E-mail</label>

                        <div class="col-md-6">
                            <input v-model="email" type="text" class="form-control" required />
                        </div>

                        <span v-if="errors.email.status" class="invalid-feedback" role="alert">
                            <strong>{{ this.errors.email.message }}</strong>
                        </span>
                    </div>

                    <!-- Password -->
                    <div class="form-group row">
                        <label for="password" class="col-md-4 text-md-right">Password</label>

                        <div class="col-md-6">
                            <input v-model="password" type="password" class="form-control" required />
                        </div>

                        <span v-if="errors.password.status" class="invalid-feedback" role="alert">
                            <strong>{{ this.errors.password.message }}</strong>
                        </span>
                    </div>

                    <!-- Password Confirm -->
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 text-md-right">Confirm Password</label>

                        <div class="col-md-6">
                            <input v-model="confirm" type="password" class="form-control" required />
                        </div>
                        <span v-if="errors.password.status" class="invalid-feedback" role="alert">
                            <strong>{{ this.errors.password.message }}</strong>
                        </span>
                    </div>

                    <!-- Register Button -->
                    <div class="form-group row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button @click="register" class="btn btn-primary">Register</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'register',
        data () {
            return {
                errors: {
                    password: {
                        status: false,
                        message: 'password errors'
                    },
                    name: {
                        status: false,
                        message: ''
                    },
                    email: {
                        status: false,
                        message: ''
                    }
                },
                name: '',
                email: '',
                password: '',
                confirm: ''
            };
        },
        methods: {
            register: function () {
                if (this.password !== this.confirm) {
                    console.log('password');
                    this.errors.password.status = true;
                    this.errors.password.message = "The password doesn't match";
                } else if (this.password.length <= 7) {
                    console.log('length');
                    this.errors.password.status = true;
                    this.errors.password.message = "The password minimal is 8 charactor";
                } else {
                    let data = {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    password_confirmation: this.password
                    };
                    
                    axios.post('/signup', data)
                    .then(response => {
                        if ((typeof response.data) === 'string') {
                            alert('success');
                        } else {
                            Object.keys(response.data).map(value => {
                                console.log('value', response.data[value]);
                                this.errors[value].status = true;
                                this.errors[value].message = response.data[value][0];
                            });
                            console.log('errors', this.errors);
                        }
                    })
                    .catch(err => {
                        // if (err.response.status == 401) {
                        //     window.location = '/login';
                        // }
                        console.log('err', err);
                    });    
                }
            }
        },
        watch: {
            name: function () {
                this.errors.name.status = false;
            },
            email: function () {
                this.errors.email.status = false;
            },
            password: function () {
                this.errors.password.status = false;
            },
            confirm: function () {
                this.errors.password.status = false;
            }
        }
    };
</script>

<style>
.form-group span {
    display: block !important;
}
</style>