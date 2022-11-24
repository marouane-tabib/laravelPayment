<?php

namespace App\Resolvers;

use App\Models\PaymentPlatform;

class PaymentPlatformResolver{

    protected $paymentPlatform;

    public function __construct()
    {
        $this->paymentPlatform = PaymentPlatform::all();
    }

    public function resolveService($paymentPlatformId){
        $name = strtolower($this->paymentPlatform->firstWhere('id' , $paymentPlatformId)->name);

        $service = config("services.{$name}.class");
        if($service){
            return resolve($service);
        }

        throw new \Exception('The selected platform is not in the configuration');
    }
}
