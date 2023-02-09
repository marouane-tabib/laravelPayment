@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form action="{{ route('subscribe.store') }}" method="POST" id="paymentForm">
                        @csrf
                        <div class="form-group">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                @foreach ($plans as $plan)
                                    <label for="" class="btn btn-outline-info rounded m-2 p-3">
                                        {{ $plan->name }}
                                        <input type="radio" name="plan" value="{{ $plan->slug }}" required>
                                        <p class="h2 font-weight-bold text-capitalize">
                                            {{ $plan->slug }}
                                        </p>
                                        <p class="display-4 text-capitalize">
                                            {{ $plan->visual_price }}
                                        </p>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group" id="toggler">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                @foreach ($paymentPlatforms as $paymentPlatform)
                                    <label for="" class="btn btn-outline-secondary rounded m-2 p-1"
                                            data-bs-toggle="collapse"
                                            data-bs-target="#{{ $paymentPlatform->name }}Collapse" >
                                        {{ $paymentPlatform->name }}
                                        <input type="radio" name="payment_platform" value="{{ $paymentPlatform->id }}" required>
                                    </label>
                                @endforeach
                            </div>
                            @foreach ($paymentPlatforms as $paymentPlatform)
                                <div class="collapse" id="{{ $paymentPlatform->name }}Collapse" data-parent="#toggler">
                                    @includeIf('components.'.strtolower($paymentPlatform->name).'-collapse')
                                </div>
                            @endforeach
                        </div>
                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary btn-lg" id="payButton">Pay</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
