<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Report;

class ReportController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $reports = Report::latest()->get();
        return view('page.report', compact('reports'));
    }

    public function store(Request $request) {
        if($request->qty[0] == 0 && $request->qty[1] == 0) {
            return redirect()->back()->withErrors('Add quantity for at least one product.');
        }

        $products = $request->product;
        $qtys = $request->qty;

        $data = [];
        $i = 0;
        foreach($products as $product)  {
            $data[] = [
                'name' => $product,
                'qty' => $qtys[$i++]
            ];
        }

        $productJson = json_encode($data);

        $report = new Report;
        $report->user = Auth::user()->name;
        $report->product = $productJson;
        $report->save();

        return redirect()->back()->with('success', 'The product has been submitted. View <a href="'.route("report").'">report?</a>');
    }
}
