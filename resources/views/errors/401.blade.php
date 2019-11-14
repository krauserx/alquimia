{{-- \resources\views\errors\401.blade.php --}}
@extends('layouts.app')

@section('content')
    <div class="login-form-bg h-100">
            <div class="container h-100">
                <div class="row justify-content-center h-100">
                    <div class="col-xl-6">
                        <div class="error-content">
                            <div class="card mb-0">
                                <div class="card-body text-center">
                                    <h1 class="error-text text-primary">401</h1>
                                    <h4 class="mt-4"><i class="fa fa-thumbs-down text-danger"></i> ACCESS DENIED</h4>
                                    <p>Your Request was DENIED.</p>
                                    <form class="mt-5 mb-5">

                                        <div class="text-center mb-4 mt-4"><a href="{{ url('/') }}" class="btn btn-primary">Go to Homepage</a>
                                        </div>
                                    </form>
                                    <div class="text-center">
                                        <p>Copyright © Designed by <a href="https://themeforest.net/user/digitalheaps">Digitalheaps</a>, Developed by <a href="https://themeforest.net/user/quixlab">Quixlab</a> 2018</p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
