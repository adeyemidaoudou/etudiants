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
                        <h2 class="text-center">Créer un compte</h2>

                    </div>
                    <div class="login-form">
                        <form action="{{route('userRegister')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label>Nom d'utilisateur</label>
                                <input class="au-input au-input--full" type="text" name="username" placeholder="Nom d'utilisateur">
                            </div>
                            <div class="form-group">
                                <label>Mot de passe</label>
                                <input class="au-input au-input--full" type="password" name="password" placeholder="Mot de passe">
                            </div>
                            <div class="form-group">
                                <label>Confirmez le mot de passe</label>
                                <input class="au-input au-input--full" type="password" name="password_confirmation" placeholder="Retapez le mot de passe">
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
                                Vous avez déjà un compte?
                                Connectez-vous <a href="{{route('login')}}">ici</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
