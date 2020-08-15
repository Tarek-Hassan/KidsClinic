<?php

namespace App\Http\Controllers;

use App\Order;
use Yajra\DataTables\DataTables ; 
use Illuminate\Http\Request;
use Alkoumi\LaravelArabicTafqeet\Tafqeet;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       
//         $digit = new \NumberFormatter("en", \NumberFormatter::SPELLOUT); 
// echo $digit->format(1000);
       
// dd("ddd");
// phpinfo();
        // dd (Tafqeet::inArabic(1000));
        
        // $d=Order::First();
        // $d=$d->price;

        if ($request->ajax()) {
            $data = Order::latest()->get();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $button = '&nbsp;&nbsp;&nbsp;<a href="/admin/users/'.$row->id.'/edit" class="edit btn btn-secondary btn-sm m-1"><i class="fas fa-pencil-alt">
                        </i> Edit</a>';
                        $button .= '&nbsp;&nbsp;&nbsp;<a  data-id="'.$row->id.'" class="del btn btn-danger btn-sm m-1 "  data-toggle="modal"data-target="#delete"><i class="fas fa-trash">
                        </i> Delete</a>';
                        return $button;
                    })
                    ->addColumn('pricear',function($row){ return Tafqeet::inArabic($row->price,'egp');})
                    ->addColumn('qty',function($row){ return $this->arabic_w2e($row->qty) ;})

                    ->rawColumns(['action'])

                    ->make(true);
        }
        return view('orders.index');
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('orders.create');
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $len=count($request->product);
        for($i=0; $i<$len;$i++){
        Order::create([
            'product'=>$request->product[$i],
            'price'=>$request->price[$i],
            'qty'=>$request->qty[$i],
        ]);
        }
        return redirect()->route('orders.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
/**
 * Converts numbers in string from western to eastern Arabic numerals.
 *
 * @param  string $str Arbitrary text
 * @return string Text with  Arabic numerals converted into English numerals.
 */
function arabic_w2e($str)
{
    $arNumber = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
    $enNumber= array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    return str_replace($enNumber, $arNumber, $str);
}

/**
 * Converts numbers from eastern to western Arabic numerals.
 *
 * @param  string $str Arbitrary text
 * @return string Text with English numerals converted into  Arabic numerals.
 */
function arabic_e2w($str)
{
    $arNumber = array('٠', '١', '٢', '٣', '٤', '٥', '٦', '٧', '٨', '٩');
    $enNumber= array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');

    return str_replace($arNumber, $enNumber, $str);
}

}
