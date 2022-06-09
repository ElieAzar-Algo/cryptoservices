@extends('auth.registermaster')

@section('content')
    <div class="login-container">

        <p>{{ __('voyager::login.signin_below') }}</p>

        <form action="{{ route('postregister') }}" method="POST">
            {{ csrf_field() }}
            <input type='number' name='role_id' hidden value='2'/>
            <input type='number' name='avatar' hidden value='users/default.png'/>
            <input type='number' name='settings' hidden value=''/>
            
            <div class="form-group form-group-default" id="emailGroup">
                <label>Name</label>
                <div class="controls">
                    <input type="text" name="name" id="name" value="{{ old('email') }}" placeholder="name" class="form-control" required>
                </div>
            </div>
            <div class="form-group form-group-default" id="emailGroup">
                <label>email</label>
                <div class="controls">
                    <input type="text" name="email" id="email" value="{{ old('email') }}" placeholder="email" class="form-control" required>
                </div>
            </div>

            <div class="form-group form-group-default" id="passwordGroup">
                <label>Password</label>
                <div class="controls">
                    <input type="password" name="password" placeholder="password" class="form-control" required>
                </div>
            </div>


            <button type="submit" class="btn btn-block login-button" style="margin-right:10px">
                <span class="signingin hidden"><span class="voyager-refresh"></span> Register</span>
                <span class="signin">Register</span>
            </button>

        </form>
        <a href="/admin/login"> Login</a>
        <div style="clear:both"></div>

        @if(!$errors->isEmpty())
            <div class="alert alert-red">
                <ul class="list-unstyled">
                    @foreach($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div> <!-- .login-container -->
@endsection

@section('post_js')

    <script>
        var btn = document.querySelector('button[type="submit"]');
        var form = document.forms[0];
        var email = document.querySelector('[name="email"]');
        var password = document.querySelector('[name="password"]');
        btn.addEventListener('click', function(ev){
            if (form.checkValidity()) {
                btn.querySelector('.signingin').className = 'signingin';
                btn.querySelector('.signin').className = 'signin hidden';
            } else {
                ev.preventDefault();
            }
        });
        email.focus();
        document.getElementById('emailGroup').classList.add("focused");

        // Focus events for email and password fields
        email.addEventListener('focusin', function(e){
            document.getElementById('emailGroup').classList.add("focused");
        });
        email.addEventListener('focusout', function(e){
            document.getElementById('emailGroup').classList.remove("focused");
        });

        password.addEventListener('focusin', function(e){
            document.getElementById('passwordGroup').classList.add("focused");
        });
        password.addEventListener('focusout', function(e){
            document.getElementById('passwordGroup').classList.remove("focused");
        });

    </script>
@endsection
