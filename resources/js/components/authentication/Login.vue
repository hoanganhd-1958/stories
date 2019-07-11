<template>
    <div class="card col-md-4 offset-md-4 mt-5">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <div class="alert alert-danger" v-if="error">
                <p>There was an error, unable to sign in with those credentials.</p>
            </div>
            <form autocomplete="off" @submit.prevent="login()" method="post">
                <div class="input-group mb-3">
                    <input type="email" v-model="email" class="form-control" placeholder="Email" />
                    <div class="input-group-append input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input
                        type="password"
                        v-model="password"
                        class="form-control"
                        placeholder="Password"
                    />
                    <div class="input-group-append input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" />
                            <label for="remember">Remember Me</label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
                </a>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="#">I forgot my password</a>
            </p>
            <p class="mb-0">
                <a href="register.html" class="text-center">Register a new membership</a>
            </p>
        </div>
        <!-- /.login-card-body -->
    </div>
</template>
<script>
    import Axios from "axios";
    export default {
        mounted() {
            if (localStorage.getItem("token") !== null) {
                this.$router.push("stories/list");
            }
        },
        data() {
            return {
                email: null,
                password: null,
                error: false
            };
        },
        methods: {
            async login() {
                var app = this;
                try {
                    const response = await axios.post("api/login", {
                        email: this.email,
                        password: this.password
                    });
                    localStorage.setItem("token", response.data.access_token);
                    this.$router.push("stories/list");
                } catch (error) {
                    app.error = true;
                }
            }
        }
    };
</script>
<style>
</style>
