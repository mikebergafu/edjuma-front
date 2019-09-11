<?php

namespace App\Http\Controllers;

use App\Helpers\Sitso;
use App\Pro;
use App\ProStatus;
use Faker\Provider\Uuid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;


class ProController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pro/docs/index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photos' => 'required',
            'pro_field' => 'required|string',
            'photos.*' => 'mimes:pdf|max:10240'
        ],[
            'photos.required'=>'At least one document is required',
            'photos.pdf'=>'Upload Supported format Only',
        ]);

        if ($validator->fails()) {
            alert()->error('Edjuma Pro: Document Upload Error', $validator->errors()->first('photos'));
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            if($request->hasfile('photos'))
            {
                $already=DB::table('pros')->where('pro_id',Auth::user()->id)->count('pro_id');
                if ($already<1){
                    // new doc if it does not already exist
                    foreach($request->photos as $file)
                    {

                        $filename = str_random(16).'.'.$file->getClientOriginalExtension();
                        $image_path = $file->move(storage_path('pros_docs'), $filename);
                        base64_encode(file_get_contents($image_path));

                        $doc=new Pro();
                        $doc->filename=base64_encode(file_get_contents($image_path));
                        $doc->pro_id=Auth::user()->id;
                        $doc->save();
                    }
                    //Save Professional Approval Status
                    //Select user and get the fullname
                    $status=new ProStatus();
                    $data=DB::table('users')->where('id',Auth::user()->id)
                        ->select('first_name','last_name')
                        ->get();
                    $status->name=$data[0]->first_name ." ".$data[0]->last_name;
                    $status->status=false;
                    $status->pro_field=$request->get('pro_field');
                    $status->pro_rank='0000';
                    $status->pro_id=Auth::user()->id;
                    $status->save();
                }else{

                    //edit if it already exist
                    alert()->info('Edjuma Pro: Document Upload', 'Documents Uploaded Already.');
                }
            }else{
                alert()->error('Edjuma Pro: Upload', 'Upload was Unsuccessfully.');
            }
            alert()->info('Edjuma Pro: Document Upload', 'Documents Successfully Uploaded.');
        }
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pro  $pro
     * @return \Illuminate\Http\Response
     */
    public function show(Pro $pro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pro  $pro
     * @return \Illuminate\Http\Response
     */
    public function edit(Pro $pro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pro  $pro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pro $pro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pro  $pro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pro $pro)
    {
        //
    }

    public function store11(Request $request)
    {
        $this->validate($request, [
            'photos'=>'required',
        ]);
        if($request->hasFile('photos'))
        {
            $allowedfileExtension=['pdf','jpg','png','docx','jpeg'];
            $files = $request->photos;
            $isPro=Sitso::seePro();
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $check=in_array($extension,$allowedfileExtension);
                if($check)
                {
                    foreach ($request->photos as $photo) {
                        $filename = $photo->store('docs');

                        $doc=new Pro();
                        $doc->filename=$filename;
                        $doc->pro_id=Auth::user()->id;
                        $doc->save();

                        if($isPro<1){
                            //Save Professional Approval Status
                            //Select user and get the fullname
                            $status=new ProStatus();
                            $data=DB::table('users')->where('id',Auth::user()->id)
                                ->select('first_name','last_name')
                                ->get();
                            $status->name=$data[0]->first_name ." ".$data[0]->last_name;
                            $status->status=false;
                            $status->pro_field='yet to be determined';
                            $status->pro_rank='0000';
                            $status->pro_id=Auth::user()->id;
                            $status->save();
                        }else{

                        }
                    }

                    alert()->info('Edjuma Pro: Document Upload', 'Documents Successfully Uploaded.');
                }
                else
                {
                    alert()->error('Edjuma Pro: Document Upload Error', 'Sorry Only Upload png , jpg , doc');
                }
            }
        }

        return redirect()->route('home');
    }

    public function store2(Request $request){

        if ($request->hasFile('photos')) {
            $files = $request->photos;
            foreach($files as $file) {
                //generating unique file name;
                $file_name = 'image_' . time() . '.png';
                @list($type, $file) = explode(';', $file);
                @list(, $file) = explode(',', $file);
                if ($file != "") {
                    // storing image in storage/app/public Folder
                    \Storage::disk('public')->put($file_name, base64_decode($file));
                }
            }
        }


    }

    public function showImage(){
        $img_path=DB::table('pros')->where('id',1)->select('filename')->get();
        //return $img_path;
        //Storage::disk('gogo');
        $s=storage_path( $img_path[0]->filename);
       //$s='storage/app/'.$img_path[0]->filename;
       //return $s;

       return "<img src='".$s."' >";

    }

    public function store56(Request $request)
    {

        $originalImage= $request->file('photos');
        $thumbnailImage = Image::make($originalImage);
        $thumbnailPath = $originalImage->store('jj/thumb');
        $originalPath = $originalImage->store('jj/images');

        $to64=base64_encode($thumbnailImage);

        return $to64;

        //return back()->with('success', 'Your images has been successfully Upload');

    }

    public function store23456(Request $request) {

        $file = Input::file('photos'); // your file upload input field in the form should be named 'file'

        $destinationPath = 'uploads/'.str_random(8);
        $filename = $file->getClientOriginalName();
        $image_path = Input::file('photos')->move($destinationPath, $filename);
        base64_encode(file_get_contents($image_path));

        $doc=new Pro();
        $doc->filename=base64_encode(file_get_contents($image_path));
        $doc->pro_id=Auth::user()->id;
        $doc->save();

        return back() ;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storek(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'photos' => 'required',
            'photos.*' => 'mimes:pdf|max:10240'
        ],[
            'photos.required'=>'At least one document is required',
            'photos.pdf'=>'Upload Supported format Only',
        ]);

        if ($validator->fails()) {
            alert()->error('Edjuma Pro: Document Upload Error', $validator->errors()->first('photos'));
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        } else {
            if($request->hasfile('photos'))
            {
                foreach($request->photos as $file)
                {

                    $filename = str_random(16).'.'.$file->getClientOriginalExtension();
                    $image_path = $file->move(storage_path('pros_docs'), $filename);
                    base64_encode(file_get_contents($image_path));

                    $doc=new Pro();
                    $doc->filename=base64_encode(file_get_contents($image_path));
                    $doc->pro_id=Auth::user()->id;
                    $doc->save();
                }
                //Save Professional Approval Status
                //Select user and get the fullname
                $status=new ProStatus();
                $data=DB::table('users')->where('id',Auth::user()->id)
                    ->select('first_name','last_name')
                    ->get();
                $status->name=$data[0]->first_name ." ".$data[0]->last_name;
                $status->status=false;
                $status->pro_field='yet to be determined';
                $status->pro_rank='0000';
                $status->pro_id=Auth::user()->id;
                $status->save();
            }else{
                alert()->error('Edjuma Pro: Upload', 'Upload was Unsuccessfully.');
            }
            alert()->info('Edjuma Pro: Document Upload', 'Documents Successfully Uploaded.');
        }
        return redirect()->route('home');
    }

    public function showProDetails($id){
        $pro=DB::table('pro_statuses')->where('pro_id',$id)->get();

        alert()->info('Edjuma Professional', 'Profession: '.$pro[0]->pro_field)
            ->showConfirmButton('Close','#0994c');
        return redirect()->back();
    }



}
