<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Medicine;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listdata = Category::all();
        // $listdataMedicine = Medicine::all();
        return view('Categories.index2', compact('listdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("categories.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Category();
        $data->name = $request->get('CatName');
        $data->category_description = $request->get('CatDesc');
        $data->save();
        return redirect()->route('kategori_obat.index')->with('status','category is added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        //dd($kategori_obat);
        $category = Category::find($category);
        // dd($category);
        return view('Categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $category = Category::find($category);
        $category->name = $request->get('CatName');
        $category->category_description = $request->get('CatDesc');
        $category->save();
        return redirect()->route('kategori_obat.index')->with('status','category is changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {  
        try{
            $category = Category::find($category);
            // dd($category);
            $category->delete();
            return redirect()->route('kategori_obat.index')->with('status','category is Deleted');
        }
        catch(\PDOException $e){
            $msg = "Data Gagal dihapus. Pastikan data child sudh hilang atau tidak berhubungan";
            return redirect()->route('kategori_obat.index')->with('error',$msg);
        }
        
    }

    public function showList($id_category)
    {
        $data = Category::find($id_category);

        $nameCategory = $data->name;

        $result = $data->medicines;

        if ($result)
            $getTotalData = $result->count();
        else $getTotalData = 0;

        return view('report.list_medicines_by_category', compact('id_category', 'nameCategory', 'result', 'getTotalData'));
    }
    public function listCategory()
    {
        //select generic_name, form, price FROM medicines
        $result = Category::get();
        $result = DB::table('categories')->get();
        return view('report.list_category', compact('result'));
    }

    public function countCategoryWithMedicine()
    {
        //select count(DISTINCT(c.id)) from categories c
        //INNER JOIN medicines m ON c.id = m.category
        $result = Category::join('medicines as m', 'categories.id', '=', 'm.category')
            ->distinct()->count('categories.id');
        $result = DB::table('categories as c')
            ->join('medicines as m', 'c.id', '=', 'm.category')
            ->distinct()->count('c.id');

        // dd($result);
        return view('report.count_category_with_med', compact('result'));
    }

    public function getCatNameWithoutMed()
    {
        //select c.name from categories c
        //LEFT JOIN medicines m ON c.id = m.category
        //WHERE m.category is NULL
        $result = Category::leftjoin('medicines as m', 'categories.id', '=', 'm.category')
            ->where('m.category')->select('categories.name')->get();
        $result = DB::table('categories as c')
            ->leftjoin('medicines as m', 'c.id', '=', 'm.category')
            ->where('m.category')->select('c.name')->get();

        dd($result);
        return view('report.category_without_med', compact('result'));
    }

    public function getCatWithOnly1Med()
    {
        // select c.* from categories c
        // INNER JOIN medicines m ON c.id= m.category
        // group by c.id
        // having count(m.category) = 1;

        // $result = Category::join('medicines as m', 'categories.id', '=', 'm.category')
        //     ->groupby('categories.id', 'categories.name')
        //     ->having(DB::Raw('count(m.category)'), 1)
        //     ->select('categories.name')
        //     ->get();
        $result = DB::table('categories as c')
            ->join('medicines as m', 'c.id', '=', 'm.category')
            ->groupby('c.id', 'c.name')
            ->having(DB::Raw('count(m.category)'), 1)
            ->select('c.name')
            ->get();

        dd($result);
        return view('report.cat_with_only_1_med', compact('result'));
    }

    public function getEditForm(Request $request)
    {
        $id = $request->get('id');
        $data = Category::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('categories.getEditForm', compact('data'))->render()
        ), 200);
    }
    public function getEditForm2(Request $request)
    {
        $id = $request->get('id');
        $data = Category::find($id);
        return response()->json(array(
            'status' => 'oke',
            'msg' => view('categories.getEditForm2', compact('data'))->render()
        ), 200);
    }
    public function saveData(Request $request)
    {
        $id = $request->get('id');
        $category = Category::find($id);
        $category->name = $request->get('name');
        $category->category_description = $request->get("desc");
        $category->save();
        return response()->json(array(
            'status' => 'oke',
            'msg' => "sukses mengubah data category"
        ), 200);
    }
    public function deleteData(Request $request)
    {
        try{
            $id = $request->get('id');
            $category = Category::find($id);
            $category->delete();
            return response()->json(array(
                'status' => 'oke',
                'msg' => "sukses menghapus data category"
            ), 200);
        }catch(\PDOException $e){
            return response()->json(array(
                'status' => 'gagal',
                'msg' => "gagal menghapus data category"
            ), 200);
        }  
    }
    
}
