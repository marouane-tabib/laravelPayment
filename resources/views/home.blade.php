@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form action="#" method="POST" id="paymentForm">
                        @csrf
                        <div class="row">
                            <div class="col-auto">
                                <label for="">How much you want to pay?</label>
                                <input type="number" min="5" step="0.01" class="form-control" name="value" value="{{ mt_rand(500 , 100000) / 100 }}" required>
                                <small class="form-text text-muted">
                                    Use values with up to two decimal positions,using a dot "."
                                </small>
                            </div>
                            <div class="col-auto">
                                <label for="">Currencies</label>
                                <select class="form-control">
                                    @foreach ($currencies as $currencie)
                                        <option value="">{{ $currencie->iso }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                @foreach ($paymentPlatforms as $paymentPlatform)
                                    <label for="" class="btn btn-outline-secondary rounded m-2 p-1">
                                        {{ $paymentPlatform->name }}
                                        <input type="radio" name="payment_platform" value="{{ $paymentPlatform->id }}" required>
                                        {{-- <img src="../public/{{ $paymentPlatform->image }}" alt="" class="img-thumbnail"> --}}
                                    </label>
                                @endforeach
                            </div>
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
