<?php

namespace App\Http\Controllers;

use App\Mail\CoursePurchased;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PaymentController extends Controller
{
    public function checkout(Course $course)
    {
        return view('payment.checkout', compact ('course'));
    }

    public function handlePayment(Request $request, Course $course)
    {
        // dd($request->all(), $course);

        $request->validate([
            'acceptance' => 'required',
        ]);

        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('payment.success', $course),
                "cancel_url" => route('payment.cancel', $course),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => config('paypal.currency'),
                        "value" => $course->price->value,
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            // No se obtubo el link de aprobación
            return redirect()->route('payment.cancel', $course, 'wrong');
        } else {
            // No se obtubo la orden de compra
            return redirect()->route('payment.cancel', $course, 'wrong');
        }
    }

    public function paymentCancel(Course $course, $type = '')
    {
        if ($type == 'wrong') {
            session()->flash('swal', [
                'icon' => 'error',
                'title' => 'Lo sentimos',
                'text' => "Algo salió mal con tu compra del curso '$course->title'. Por favor, inténtalo de nuevo.",
                'confirmButtonColor' => '#14b8a6',
            ]);

            return redirect()->route('payment.checkout', $course);
        } else {
            session()->flash('swal', [
                'icon' => 'info',
                'title' => 'Cancelada',
                'text' => "Has cancelado la compra del curso '$course->title'.",
                'confirmButtonColor' => '#14b8a6',
            ]);

            return redirect()->route('courses.show', $course);
        }
    }

    public function paymentSuccess(Request $request, Course $course)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return $this->purchase($course);
        } else {
            return redirect()->route('payment.cancel', $course, 'wrong');
        }
    }

    private function purchase(Course $course)
    {
        $course->students()->sync(auth()->user()->id);

        Mail::to(auth()->user()->email)->send(new CoursePurchased($course));

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Enhorabuena!',
            'text' => "Tu compra del curso '$course->title' se ha realizado con éxito.",
            'confirmButtonText' => '<a href="' . route('courses.learn', $course) . '">Ir al curso</a>',
            'confirmButtonColor' => '#14b8a6',
        ]);

        return redirect()->route('courses.show', $course);
    }
}
