<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MoneyManagement;
class moneymangmentcontroller extends Controller
{
    public function index()
    {
        $money = MoneyManagement::all();

        return view('money.index', compact( 'money'));
    }
    public function create()
    {
        $money = MoneyManagement::all();

        return view('money.create', compact( 'money'));
    }
    public function store(Request $request)
    {
       // Validate only the initial_balance as the rest will be calculated
    $validated = $request->validate([
        'initial_balance' => 'required|numeric|min:0',
    ]);

    // Get the initial balance
    $initial_balance = $validated['initial_balance'];
    $balance = $initial_balance; // Set balance initially to the input balance

    // Define the base parameters
    $risk_percentage = 5; // 5% risk
    $risk_ratio = 2; // 2:1 risk/reward ratio
    $leverage = 100; // 100:1 leverage
    $max_drawdown = $initial_balance * 0.20; // 25% of the balance
    $exposure = $initial_balance * 0.10; // 10% of the balance
    $dolar = number_format(($balance * $risk_percentage) / 100, 2);
    $target = $dolar * $risk_ratio; // 5% of the balance
    // if ($risk_percentage > 100) {
    //     $risk_percentage = 100;
    // }
    

    
    // if (($exposure / $initial_balance) * 100 > 100) {
    //     $exposure = $initial_balance;
    // }
    

    // Further adjustments can be added if needed based on larger multiples of the balance

    // Create the new money management strategy
    MoneyManagement::create([
        'balance' => $balance, // Store the current balance
        'initial_balance' => $initial_balance,
        'target' => $target,
        'risk_percentage' => $risk_percentage,
        'risk_ratio' => $risk_ratio,
        'leverage' => $leverage,
        'max_drawdown' => $max_drawdown,
        'exposure' => $exposure,
    ]);

    // return redirect()->route('money.index')->with('success', 'Money management strategy created successfully!');
    $money = MoneyManagement::all();

    return view('money.index', compact( 'money'));
}







public function edit($id){
    $money = MoneyManagement::findOrfail($id);
    return view('money.edit',['money'=>$money]);
}



public function update(Request $request , $id){
    $money = MoneyManagement::findOrfail($id);


    $initial_balance = $request->input('initial_balance');
    $balance = $money->balance;
    
    
    $risk_percentage = 5; // 5% risk
    $risk_ratio = 2; // 2:1 risk/reward ratio
    $leverage = 100; // 100:1 leverage
    $max_drawdown = $initial_balance * 0.20; // 25% of the balance
    $exposure = $initial_balance * 0.10; // 10% of the balance
    $dolar = number_format(($balance * $risk_percentage) / 100, 2);
    $target = $dolar * $risk_ratio;
    
    


    $money->update([
        'initial_balance' => $request->input('initial_balance'),
        'balance' => $money->balance,
        'target' => $target,
        'risk_percentage' => $risk_percentage,
        'risk_ratio' => $risk_ratio,
        'leverage' => $leverage,
        'max_drawdown' => $max_drawdown,
        'exposure' => $exposure,
    ]);

    return redirect()->route('money.index')->with('success', 'Money management strategy updated successfully!');

}




public function destroy (Request $requestr , $id){
$money = MoneyManagement::findOrFail($id);
$money->delete();
$money = MoneyManagement::all();

return view('money.index', compact( 'money'));
}
public function complete($id){
    $money = MoneyManagement::findOrfail($id);
    return view('money.complete',compact('money'));
}

public function complete_money(Request $request, $id){
    $money = MoneyManagement::findOrfail($id);
    $balance =$request->input('balance');
    $initial_balance =$money->initial_balance;

    $risk_percentage = 5; // 5% risk
    $risk_ratio = 2; // 2:1 risk/reward ratio
    $leverage = 100; // 100:1 leverage
    $max_drawdown = $initial_balance * 0.20; // 25% of the balance
    $exposure = $initial_balance * 0.10; // 10% of the balance
    $dolar = ($balance * $risk_percentage) / 100;
    $target = $dolar * $risk_ratio;
    // Automatically increase parameters based on the balance size
    $balance_multiple = floor($balance / $initial_balance); // Calculate how many times the balance is greater than the initial balance

    // Scale the parameters based on the balance multiple
    if ($balance_multiple >= 2) {
        $risk_percentage = min(12, 5 + ($balance_multiple - 1) * 2); // Increase risk by 2% for every multiple of 2
        $dolar = ($balance * $risk_percentage) / 100;
        $risk_ratio = 1 *$balance_multiple;
        $target = $dolar * $risk_ratio;
        $target = min($target, $balance * 0.1);
        $max_drawdown = $balance * 0.20 ; // Increase max drawdown by 5% for every multiple of 2
        $exposure = $balance * 0.10; // Increase exposure by 5% for every multiple of 2
    }
    elseif ($balance < $initial_balance) {
        // Reduce parameters if the balance is less than the initial balance
        $risk_percentage = 3;
        $risk_ratio = 1;
        $dolar = ($balance * $risk_percentage) / 100;
        $target = $dolar * $risk_ratio ;// Adjust target accordingly
        $leverage = 50; // Lower leverage
        $max_drawdown = $balance * 0.15; // Reduce max drawdown
        $exposure = $balance * 0.05; // Reduce exposure
    }
    $money->update([
        'initial_balance' => $money->initial_balance,
        'balance' => $request->input('balance'),
        'target' => $target,
        'risk_percentage' => $risk_percentage,
        'risk_ratio' => $risk_ratio,
        'leverage' => $leverage,
        'max_drawdown' => $max_drawdown,
        'exposure' => $exposure,
    ]);



    $money = MoneyManagement::all();

    return view('money.index', compact( 'money'));
}
}
