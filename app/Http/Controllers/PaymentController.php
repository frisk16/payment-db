<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class PaymentController extends Controller
{
    private function validator($request)
    {
        return $request->validate([
            'category_id' => 'required|integer',
            'name' => 'required|string|max:20',
            'price' => 'required|integer',
            'type' => 'required|integer',
            'date' => 'required|string',
        ], [
            'name.max' => ':max文字以内で入力してください。',
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $categories = Auth::user()->categories;

        if($request->has('category_id')) {
            $category_id = $request->category_id;
        }

        if($request->has('year')) {
            $year = $request->year;
        } else {
            $year = Carbon::now()->year;
        }

        if($request->has('month')) {
            $month = $request->month;
        } else {
            $month = Carbon::now()->month;
        }

        if($month < 10) {
            $month_data = "0{$month}";
        } else {
            $month_data = $month;
        }

        $total = 0;
        if($request->has('category_id')) {
            $payments = Auth::user()->payments()
                ->where('category_id', $category_id)
                ->where('date', 'LIKE', "{$year}/{$month_data}/%")
                ->orderBy('date', 'desc')->paginate(5);

            $all_payments = Auth::user()->payments()
                ->where('category_id', $category_id)
                ->where('date', 'LIKE', "{$year}/{$month_data}/%")
                ->get();

            foreach($all_payments as $payment) {
                $total += $payment->price;
            }
        } else {
            $payments = Auth::user()->payments()
                ->where('date', 'LIKE', "{$year}/{$month_data}/%")
                ->orderBy('date', 'desc')->paginate(5);

            $all_payments = Auth::user()->payments()
                ->where('date', 'LIKE', "{$year}/{$month_data}/%")
                ->get();

            foreach($all_payments as $payment) {
                $total += $payment->price;
            }
        }

        $type_lists = [
            ['id' => 1, 'name' => 'クレジットカード'],
            ['id' => 2, 'name' => '現金払い'],
            ['id' => 3, 'name' => '銀行振込'],
            ['id' => 4, 'name' => '電子マネー'],
            ['id' => 5, 'name' => 'その他'],
        ];

        return view('payments.index',
            compact('categories', 'year', 'month', 'payments', 'type_lists', 'total'));
    }

    public function show_type(Request $request)
    {
        if($request->has('year')) {
            $year = $request->year;
        } else {
            $year = Carbon::now()->year;
        }

        if($request->has('month')) {
            $month = $request->month;
        } else {
            $month = Carbon::now()->month;
        }

        if($month < 10) {
            $month_data = "0{$month}";
        } else {
            $month_data = $month;
        }

        $total = 0;
        if($request->has('type_id')) {
            $payments = Auth::user()->payments()
                ->where('type', $request->type_id)
                ->where('date', 'LIKE', "{$year}/{$month_data}/%")
                ->orderBy('date', 'desc')->paginate(5);

            $all_payments = Auth::user()->payments()
                ->where('type', $request->type_id)
                ->where('date', 'LIKE', "{$year}/{$month_data}/%")
                ->get();

            foreach($all_payments as $payment) {
                $total += $payment->price;
            }
        } else {
            $payments = Auth::user()->payments()
                ->where('type', 1)
                ->where('date', 'LIKE', "{$year}/{$month_data}/%")
                ->orderBy('date', 'desc')->paginate(5);

            $all_payments = Auth::user()->payments()
                ->where('type', 1)
                ->where('date', 'LIKE', "{$year}/{$month_data}/%")
                ->get();

            foreach($all_payments as $payment) {
                $total += $payment->price;
            }
        }

        $type_lists = [
            ['id' => 1, 'name' => 'クレジットカード'],
            ['id' => 2, 'name' => '現金払い'],
            ['id' => 3, 'name' => '銀行振込'],
            ['id' => 4, 'name' => '電子マネー'],
            ['id' => 5, 'name' => 'その他'],
        ];


        return view('payments.show_type',
            compact('year', 'month', 'type_lists', 'payments', 'total'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validator($request);

        $payment = new Payment();
        $payment->user_id = Auth::id();
        $payment->category_id = $request->input('category_id');
        $payment->name = $request->input('name');
        $payment->price = $request->input('price');
        $payment->type = $request->input('type');
        $payment->date = $request->input('date');
        $payment->save();

        return to_route('payments.index')->with('add_payment', '支払いデータを追加しました。');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $this->validator($request);

        $payment->user_id = Auth::id();
        $payment->category_id = $request->input('category_id');
        $payment->name = $request->input('name');
        $payment->price = $request->input('price');
        $payment->type = $request->input('type');
        $payment->date = $request->input('date');
        $payment->update();

        return to_route('payments.index')->with('edit_payment', '支払いデータを更新しました。');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();

        return to_route('payments.index')->with('del_payment', '支払いデータを削除しました。');
    }
}
