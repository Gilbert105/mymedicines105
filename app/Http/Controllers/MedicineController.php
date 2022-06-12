<?php

namespace App\Http\Controllers;

use App\Category;
use App\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $listdata = DB::select(DB::raw('select * from medicines'));

        // $listdata = DB::table('medicines')->get();

        $listdata = Medicine::all();
        // dd($listdata);
        return view('medicines.index', compact("listdata"));

        //select * from categories

        //select generic_name, form, price FROM medicines

        //select m.generic_name, m.form, m.price, c.name FROM medicines m
        //INNER JOIN categories c ON m.category = c.id

        //select count(DISTINCT(c.id)) from categories c
        //INNER JOIN medicines m ON c.id = m.category

        //select c.name from categories c
        //LEFT JOIN medicines m ON c.id = m.category
        //WHERE m.category is NULL

        //select IFNULL(AVG(m.price),0) from categories c
        // LEFT JOIN medicines m ON c.id= m.category
        // group by c.id

        // select c.* from categories c
        // INNER JOIN medicines m ON c.id= m.category
        // group by c.id
        // having count(m.category) = 1;

        //SELECT *, count(DISTINCT(form)) FROM `medicines`
        // GROUP BY category
        // having count(DISTINCT(form)) = 1; 

        //SELECT c.name,m.generic_name,m.price FROM `medicines` m 
        // INNER JOIN categories c ON m.category = c.id
        // where m.price = (select max(m.price) as highest from medicines m)


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listdata = Category::get();
        return view("medicines.create",compact('listdata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Medicine();
        $data->generic_name = $request->get('medName');
        $data->form = $request->get('medform');
        $data->restriction_formula = $request->get('medformula');
        $data->description = $request->get('medDesc');
        $data->image = $request->get('medImage');
        $data->price = $request->get('medPrice');
        $data->category = $request->get('medCategory');
        $data->faskes_tk1 = $request->get('medFaskes1');
        $data->faskes_tk2 = $request->get('medFaskes2');
        $data->faskes_tk3 = $request->get('medFaskes3');
        $data->save();
        return redirect()->route('kategori_obat.index')->with('status','medicine is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show($medicine)
    {
        //
        $result = Medicine::find($medicine);
        if ($result) {
            $message = $result;
        } else {
            $message = NULL;
        }
        //echo "halo";
        //return view("medicines.show", compact('message'));
        return view('medicines.show', ['message' => $message]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit($medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medicine $medicine)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        //
    }

    public function listMedicine()
    {
        $result = Medicine::select('generic_name', 'form', 'price')->get();
        $result = DB::table('medicines')->select('generic_name', 'form', 'price')
            ->get();
        dd($result);
        return view('report.sembarangMed', compact('result'));
    }

    public function MedicineDetail()
    {
        // $result = Medicine::join('categories as c', 'medicines.category', '=', 'c.id')
        //     ->select(
        //         'medicines.id',
        //         'medicines.generic_name',
        //         'medicines.form',
        //         'medicines.restriction_formula',
        //         'medicines.description',
        //         'medicines.price',
        //         'c.name'
        //     )
        //     ->get();
        $result = DB::table('medicines as m')
            ->join('categories as c', 'm.category', '=', 'c.id')
            ->select(
                'm.id',
                'm.generic_name',
                'm.form',
                'm.restriction_formula',
                'm.description',
                'm.price',
                'c.name'
            )
            ->get();

        dd($result);
        return view('report.sembarangMed', compact('result'));
    }

    public function avgPrice()
    {
        //select IFNULL(AVG(m.price),0) from categories c
        // LEFT JOIN medicines m ON c.id= m.category
        // group by c.id
        $result = Medicine::leftjoin('categories as c', 'medicines.category', '=', 'c.id')
            ->groupby('c.id')
            ->select(DB::Raw('IFNULL(AVG(medicines.price),0)'))
            ->get();

        $result = DB::table('medicines as m')
            ->leftjoin('categories as c', 'm.category', '=', 'c.id')
            ->groupby('c.id')
            ->select(DB::Raw('IFNULL(AVG(m.price),0)'))
            ->get();
        //->avg('medicines.price');
        dd($result);
        return view('report.sembarangMed', compact('result'));
    }
    public function medicineWith1Form()
    {
        //SELECT *, count(DISTINCT(form)) FROM `medicines`
        // GROUP BY category
        // having count(DISTINCT(form)) = 1; 
        //select `generic_name`, `form`, `category`, ount(DISTINCT(form)) 
        //from `medicines` group by `category`, `generic_name`, `form` 
        //having count(DISTINCT(form)) = 3)

        // $result = DB::select(DB::Raw('SELECT generic_name, count(DISTINCT(form)) FROM medicines GROUP BY category, generic_name having count(DISTINCT(form)) = 3'));
        $result = Medicine::groupby('generic_name')
            ->having(DB::Raw('total'), 1)
            ->select('generic_name', DB::Raw('count(DISTINCT(form)) as total'))
            ->get();
        $result = DB::table('medicines')
            ->having(DB::Raw('total'), 1)
            ->select('generic_name', DB::Raw('count(DISTINCT(form)) as total'))
            ->get();

        dd($result);
        return view('report.sembarangMed', compact('result'));
    }

    public function highestMedicine()
    {
        //SELECT c.name,m.generic_name,m.price FROM `medicines` m 
        // INNER JOIN categories c ON m.category = c.id
        // where m.price = (select max(m.price) as highest from medicines m)
        $highest = Medicine::max('price');
        $result = Medicine::join('categories as c', 'medicines.category', '=', 'c.id')
            ->where('medicines.price', $highest)
            ->select('c.name', 'medicines.generic_name', 'medicines.price')
            ->get();
        $result = DB::table('medicines as m')
            ->join('categories as c', 'm.category', '=', 'c.id')
            ->where('m.price', $highest)
            ->select('c.name', 'm.generic_name', 'm.price')
            ->get();
        dd($result);
        return view('report.sembarangMed', compact('result'));
    }

    public function showInfo()
    {
        $result = Medicine::orderBy('price', 'DESC')->first();
        return response()->json(array(
            'status' => 'oke',
            'msg' => "<div class='alert alert-info'>
            Did you know? <br>The most expensive product is " 
            . $result->generic_name . "</div>"
        ), 200);
    }

    public function front_index()
    {
        $medicines = Medicine::all();
        return view('frontend.product', compact('medicines'));
    }
    public function addToCart($id){
        $m = Medicine::find($id);
        $cart = session()->get('cart');
        if(!isset($cart[$id])){
            $cart[$id]=[
                "name"=>$m->generic_name,
                "quantity"=> 1,
                "price"=>$m->price,
                "photo"=>$m->image
            ];
        }else{
            $cart[$id]['quantity']++;
        }
        session()->put('cart',$cart);
        return redirect()->back()-with("success","Medicine added to cart");
    }
    public function cart(){
        return view('frontend.cart');
    }
}
