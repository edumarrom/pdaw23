<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
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
                        "value" => $course->price->price,
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
            /* return redirect()
                ->route('payment.cancel.payment', $course)
                ->with('error', 'Something went wrong.'); */
            return "Algo salio mal al cancelar el pago";
        } else {
            /* return redirect()
                ->route('payment.create.payment')
                ->with('error', $response['message'] ?? 'Something went wrong.'); */
                return "Algo salio mal al crear el pago";
        }

        /* $course->students()->sync(auth()->user()->id);

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Enhorabuena!',
            'text' => "Tu compra del curso '$course->title' se ha realizado con éxito.",
            'confirmButtonColor' => '#3B82F6',
        ]);

        return redirect()->route('courses.show', $course); */
    }

    public function paymentCancel(Course $course)
    {
        /* return redirect()
            ->route('payment.create.payment')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.'); */
        return "Has cancelado la compra";
    }

    public function paymentSuccess(Request $request, Course $course)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            /* return redirect()
                ->route('payment.create.payment')
                ->with('success', 'Transaction complete.'); */
            return $course;
        } else {
            /* return redirect()
                ->route('payment.create.payment')
                ->with('error', $response['message'] ?? 'Something went wrong.'); */
            return "Algo salio mal al confirmar el pago";
        }
    }
}
