<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loaitin;
use App\Theloai;
class LoaitinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getajax()
    {
        $loaitin=Loaitin::all();
        
        $data= array();
        foreach ($loaitin as $lt) {
            $theloai = Theloai::find($lt->idTheLoai);
			$data[] = array(
                $lt->id,
                $theloai->ten,
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
    public function loadTLajax(){
        $theloai = Theloai::all();
        echo $theloai;
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
        return view('loaitin');
    }
    public function XuLyThemTL(Request $request)
    {
        $this->validate($request,[
            'ten'=>'required',
        ]);
        $em = new Loaitin;
        
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
}
