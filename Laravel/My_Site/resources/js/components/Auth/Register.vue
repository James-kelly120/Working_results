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
                    </div>

                    <!-- Email -->
                    <div class="form-group row">
                        <label for="email" class="col-md-4 text-md-right">E-mail</label>

                        <div class="col-md-6">
                            <input v-model="email" type="text" class="form-control" required />
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="form-group row">
                        <label for="password" class="col-md-4 text-md-right">Password</label>

                        <div class="col-md-6">
                            <input v-model="password" type="password" class="form-control" required />
                        </div>
                    </div>

                    <!-- Password Confirm -->
                    <div class="form-group row">
                        <label for="password-confirm" class="col-md-4 text-md-right">Confirm Password</label>

                        <div class="col-md-6">
                            <input v-model="confirm" type="password" class="form-control" required />
                        </div>
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
                errors: null,
                name: '',
                email: '',
                password: '',
                confirm: ''
            };
        },
        methods: {
            register: function () {
                let data = {
                    name: this.name,
                    email: this.email,
                    password: this.password,
                    confirm: this.confirm
                };
                axios.post('/signup', data)
                    .then(response => {
                        // console.log('response', response);
                    })
                    .catch(err => {
                        // if (err.response.status == 401) {
                        //     window.location = '/login';
                        // }
                        // console.log('err', err);
                    });
            }
        }
    };
</script>
