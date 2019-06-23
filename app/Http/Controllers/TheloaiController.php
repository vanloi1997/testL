<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Theloai;

class TheloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getDS()
    {
        //   
        return view('theloai',['theloai'=>$theloai]);
    }
    public function getajax()
    {
        $theloai=Theloai::all();
        $data= array();
        foreach ($theloai as $lt) {
			$data[] = array(
				$lt->id,
				$lt->ten,
				'<button onclick="suatheloai('.$lt->id.')" class="create_ca btn btn-success"><a style="text-decoration:none" >Sửa</a></button>',
                '<button onclick="xoatheloai('.$lt->id.')" class="create_ca btn btn-danger"><a style="text-decoration:none" id="xoatheloai">Xóa</a></button>'
			);
		}
		$output = array(
			"draw" => "",
			"recordsTotal" => 100,
			"recordsFiltered" => 100,
			"data" => $data
		);
       // console.log("abc");
		echo json_encode($output);
		die();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Them()
    {
        //
        return view('theloai');
    }
    public function XuLyThemTL(Request $request)
    {
        $this->validate($request,[
            'ten'=>'required',
        ]);
        $em = new Theloai;
        
        $em -> ten =$request->input('ten');
        $em->save();
        
    }
    public function Sua($id){
        $theloai = Theloai::find($id);
        echo $theloai;
        die();
    }
    public function XuLySuaTL(Request $request){
        $id = $request->input('id');
    	$theloai = TheLoai::find($id);
    	$this->validate($request,
    		[
    			'ten' => 'required'
    		]);
        $theloai->ten=$request->input('ten');
    	$theloai->save();
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function Xoa($id){
        $theloai = Theloai::find($id);
        $theloai->Delete();
	}
}
