@extends('layouts.doc')

@section('content')
    <div class="page-content--bge5">
        <div class="container">
            <div class="login-wrap">
                <div class="login-content">
                    <div class="login-logo">
                        {{--<a href="#">
                            <img src="images/icon/logo.png" alt="CoolAdmin">
                        </a>--}}
                        <h2>Connexion</h2>
                    </div>
                    <div class="login-form">
                        <form action="{{route('userLogin')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Mot de passe</label>
                                <input class="au-input au-input--full" type="password" name="password" placeholder="Mot de passe">
                            </div>
                            <div class="login-checkbox">
                                {{--<label>
                                    <input type="checkbox" name="remember">Remember Me
                                </label>
                                <label>--}}
                                    <a href="#">Mot de passe oublié?</a>
                                </label>
                            </div>
                            <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">se connecter</button>
                        </form>
                        <div class="register-link">
                            <p>
                                Pas de compte?
                               Créez un compte <a href="{{route('register')}}">ici</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
