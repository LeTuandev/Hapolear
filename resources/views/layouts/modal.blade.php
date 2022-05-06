<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content modal-cursor">
                <div class="modal-body">
                    <div class="login" id="login">
                        <div class="login-form">
                            <div class="close-form" id="close" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>
                            </div>
                            <div class="d-flex login-register">
                                <a class="link-login" id="btnLogin">login</a>
                                <a class="link-register" id="btnRegister">register</a>
                            </div>
                            <div class="col-md-12 form-lg">
                                <div id="closeFormLogin">
                                    <form action="{{ route('login') }}" method="post" id="loginForm">
                                        @csrf
                                        @if (session()->has('success'))
                                            <div class="alert alert-success reg-success" id="message">{{ session()->get('success')}}</div>
                                        @endif
                                        @if(session()->has('mess_login'))
                                        <div class="mess-login" id="messLogin"></div>
                                        @endif
                                        <div class="form-group">
                                            <label>Username:</label>
                                            <input type="text" name="login_username" class="form-control @error('login_username')
                                                is-invalid form-log
                                            @enderror"
                                                placeholder="User Name" />
                                            @if ($errors->has('login_username'))
                                            <p class="text-danger">{{ $errors->first('login_username') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Password:</label>
                                            <input type="password" name="login_password" class="form-control @error('login_password')
                                                is-invalid form-log
                                            @enderror"
                                                placeholder="Password" />
                                            @if ($errors->has('login_password'))
                                            <p class="text-danger">{{ $errors->first('login_password') }}</p>
                                            @endif
                                        </div>
                                        <div class="checkbox-a">
                                            <input type="checkbox" />
                                            <label class="control control--checkbox mb-0"><span class="caption">Remember
                                                    me</span></label>
                                            <a href="#">Forgot password</a>
                                        </div>
                                        @if (session()->has('error'))
                                            <div class="alert alert-danger log-error" id="error">{{ session()->get('error')}}</div>
                                        @endif
                                        <button class="btn btn-success btn-login" type="submit">LOGIN</button>
                                    </form>
                                    <p class="line"><span>Login with</span></p>
                                    <a class="login-gg" href="#"><i class="fa-brands fa-google-plus-g"></i>Google</a>
                                    <a class="login-rg" href="#"><i class="fa-brands fa-facebook-f"></i>Facebook</a>
                                </div>
                                <div id="closeRegisterForm">
                                    <form action="{{ route('register') }}" method="post" id="registerForm">
                                        @csrf
                                        <div class="form-group">
                                            <label>Username:</label>
                                            <input type="text" name="username" class="form-control @error('username')
                                                is-invalid form-reg
                                            @enderror"
                                                placeholder="User Name" />
                                            @if ($errors->has('username'))
                                            <p class="text-danger">{{ $errors->first('username') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input type="email" name="email" class="form-control @error('email')
                                                is-invalid form-reg
                                            @enderror" placeholder="Email" />
                                            @if ($errors->has('email'))
                                            <p class="text-danger">{{ $errors->first('email') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Password:</label>
                                            <input type="password" name="password" class="form-control @error('password')
                                                is-invalid form-reg
                                            @enderror"
                                                placeholder="Password" />
                                            @if ($errors->has('password'))
                                            <p class="text-danger">{{ $errors->first('password') }}</p>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>Repeat Password::</label>
                                            <input type="password" name="password_confirm" class="form-control @error('password_confirm')
                                            is-invalid form-reg
                                            @enderror"
                                                placeholder="Password" />
                                            @if ($errors->has('password_confirm'))
                                            <p class="text-danger">{{ $errors->first('password_confirm') }}</p>
                                            @endif
                                        </div>
                                        <button class="btn btn-success btn-login" type="submit">REGISTER</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
