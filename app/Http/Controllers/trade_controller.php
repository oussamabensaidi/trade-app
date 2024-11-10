<?php

namespace App\Http\Controllers; 

use Illuminate\Http\Request;
use App\Models\trade;
use App\Models\QuickPosition;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;



class trade_controller extends Controller
{
    public function index()
    {
        $quick = QuickPosition::all();
        $analysis = trade::all();
        return view('index', compact('analysis','quick'));
    }
    public function completed()
    {
        $analysis = trade::orderBy('id', 'desc')->get();
        return view('completed', compact('analysis'));
    }

    public function show($id) {
        $trade = trade::findOrFail($id);
        return view('show', ['trade' => $trade]);
    }


public function create(){
return view ('create');
}

public function indexQuick(){
    $quick = QuickPosition::all();
    return view('indexQuick', ['quick' => $quick]);
}

public function create_quickPosition($id){
    $trade = trade::findOrFail($id);
    return view('create_quick', ['trade' => $trade]);
}
public function complete_quick_page($id){
    $quick = QuickPosition::findOrFail($id);
    return view('completeQuick', ['quick' => $quick]);
}


public function inserquickposition(Request $request){
    QuickPosition::create([
        'trade_id' => $request->trade_id,
        'assetName' => $request->assetName,
        'operation' => $request->operation,
        'why_before' => $request->why_before,
        'why_after' => $request->why_after,
        'profit' => $request->profit,
        'result' => $request->result,
    ]);
    return redirect()->route('index')->with('success', 'Quick Position created successfully.');
   
}
public function complete_quick(Request $request, $id)
{
    $quickPosition = QuickPosition::findOrFail($id);
    $quickPosition->update([
        'trade_id' => $request->trade_id,
        'assetName' => $request->assetName,
        'operation' => $request->operation,
        'why_before' => $request->why_before,
        'why_after' => $request->why_after,
        'profit' => $request->profit,
        'result' => $request->result,
    ]);

    return redirect()->route('index')->with('success', 'Quick completed updated successfully.');
}
public function destroy($id)
{
    $quick = QuickPosition::findOrFail($id);
    $quick->delete();
    $currentUrl = URL::previous(); // or request()->url();

    // Define your conditions
    if (Str::contains($currentUrl, 'http://127.0.0.1:8000/indexQuick')) {
        return redirect()->route('indexQuick')->with('success', 'Item deleted successfully');
    }
    return redirect()->route('index')->with('success', 'Item deleted successfully');
}





public function create_position(Request $req)
    {
    if ($req->hasFile('picture')) {
    $file = $req->file('picture');
    $filename = time() . '.' . $file->getClientOriginalExtension();
    $file->move(public_path('images'), $filename);
    $picturePath = 'images/' . $filename;
}

    $analysis = new Trade([
    'ticker_name' => $req->ticker_name,
    'dow_1h' => $req->dow_1h,
    'dow_1h_note' => $req->dow_1h_note,
    'dow_day' => $req->dow_day,
    'dow_day_note' => $req->dow_day_note,
    'dow_4h' => $req->dow_4h,
    'dow_4h_note' => $req->dow_4h_note,
    'moving_average_1h' => $req->moving_average_1h,
    'moving_average_1h_note' => $req->moving_average_1h_note,
    'moving_average_day' => $req->moving_average_day,
    'moving_average_day_note' => $req->moving_average_day_note,
    'moving_average_4h' => $req->moving_average_4h,
    'moving_average_4h_note' => $req->moving_average_4h_note,
    'macd_1h' => $req->macd_1h,
    'macd_1h_note' => $req->macd_1h_note,
    'macd_day' => $req->macd_day,
    'macd_day_note' => $req->macd_day_note,
    'macd_4h' => $req->macd_4h,
    'macd_4h_note' => $req->macd_4h_note,
    'rsi_1h' => $req->rsi_1h,
    'rsi_1h_note' => $req->rsi_1h_note,
    'rsi_day' => $req->rsi_day,
    'rsi_day_note' => $req->rsi_day_note,
    'rsi_4h' => $req->rsi_4h,
    'rsi_4h_note' => $req->rsi_4h_note,
    'fibo' => $req->fibo,
    'post_notes' => $req->post_notes,
    'fibo_note' => $req->fibo_note,
    'gann' => $req->gann,
    'gann_note' => $req->gann_note,
    'major_notes' => $req->major_notes,
    'asset_type' => $req->asset_type,
    'result' => $req->result,
    'picture' => $picturePath
]);

$analysis->save();

return redirect()->route('index')->with('success', 'position created successfully');

    }





    public function complete($id) {
        $position = trade::findOrFail($id);
        return view('complete',['position'=>$position]);
    }
    public function updateAll($id) {
        $position = trade::findOrFail($id);
        return view('updateAll',['position'=>$position]);
    }
    public function update_position(Request $req, $id){
        $position = trade::findOrFail($id);
        if ($req->hasFile('post_picture')) {
            $file = $req->file('post_picture');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $filename);
            $position->post_picture = 'images/' . $filename;
    }
    $position->succses = $req->succses;
    $position->major_notes = $req->major_notes;
    $position->profit = $req->profit;
    $position->post_notes = $req->post_notes;
    $position->save();
    return redirect()->route('index')->with('success', 'Trade updated successfully.');
}
    public function update_whole(Request $request, $id){
        $position = trade::findOrFail($id);

        // Update the position with request data
        $position->ticker_name = $request->ticker_name;
        $position->dow_1h = $request->dow_1h;
        $position->dow_1h_note = $request->dow_1h_note;
        $position->dow_day = $request->dow_day;
        $position->dow_day_note = $request->dow_day_note;
        $position->dow_4h = $request->dow_4h;
        $position->dow_4h_note = $request->dow_4h_note;
        $position->moving_average_1h = $request->moving_average_1h;
        $position->moving_average_1h_note = $request->moving_average_1h_note;
        $position->moving_average_day = $request->moving_average_day;
        $position->moving_average_day_note = $request->moving_average_day_note;
        $position->moving_average_4h = $request->moving_average_4h;
        $position->moving_average_4h_note = $request->moving_average_4h_note;
        $position->macd_1h = $request->macd_1h;
        $position->macd_1h_note = $request->macd_1h_note;
        $position->macd_day = $request->macd_day;
        $position->macd_day_note = $request->macd_day_note;
        $position->macd_4h = $request->macd_4h;
        $position->macd_4h_note = $request->macd_4h_note;
        $position->rsi_1h = $request->rsi_1h;
        $position->rsi_1h_note = $request->rsi_1h_note;
        $position->rsi_day = $request->rsi_day;
        $position->rsi_day_note = $request->rsi_day_note;
        $position->rsi_4h = $request->rsi_4h;
        $position->rsi_4h_note = $request->rsi_4h_note;
        $position->fibo = $request->fibo;
        $position->fibo_note = $request->fibo_note;
        $position->gann = $request->gann;
        $position->gann_note = $request->gann_note;
        $position->major_notes = $request->major_notes;
        $position->asset_type = $request->asset_type;
        $position->succses = $request->succses;
        $position->profit = $request->profit;
        $position->post_notes = $request->post_notes;
        
        if ($request->hasFile('picture')) {
            $filePicture = $request->file('picture');
            $filenamePicture = time() . '_picture.' . $filePicture->getClientOriginalExtension();
            $filePicture->move(public_path('images'), $filenamePicture);
        
            // Delete old picture if it exists
            if ($position->picture && file_exists(public_path($position->picture))) {
                unlink(public_path($position->picture));
            }
        
            $position->picture = 'images/' . $filenamePicture;
        }
        
        if ($request->hasFile('post_picture')) {
            $filePostPicture = $request->file('post_picture');
            $filenamePostPicture = time() . '_post_picture.' . $filePostPicture->getClientOriginalExtension();
            $filePostPicture->move(public_path('images'), $filenamePostPicture);
        
            // Delete old post picture if it exists
            if ($position->post_picture && file_exists(public_path($position->post_picture))) {
                unlink(public_path($position->post_picture));
            }
        
            $position->post_picture = 'images/' . $filenamePostPicture;
        }
        
        
        // Save the updated position
        $position->save();
        
    

        $position->save();
    return redirect()->route('index')->with('success', 'Trade fully updated successfully.');
}

}