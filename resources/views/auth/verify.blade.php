@extends('site.layouts.app')

@section('content')
<br><br><br><br><br><br><br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="direction: rtl;text-align: right">{{ __('validation.Verify Your Email Address') }}</div>

                <div class="card-body" style="direction: rtl;text-align: right">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('validation.A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('validation.Before proceeding, please check your email for a verification link.') }}
                    {{ __('validation.If you did not receive the email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('validation.click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
