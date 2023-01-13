<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    public function index()
    {
        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex")->with("success", "gagal login");
        }
        $data = DB::table("mentorings")->get();

        return view("index", compact("data"));
    }



    public function logout(Request $request)
    {
        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex")->with("failed", "gagal login");
        }
        $request->session()->flush();
        return redirect("/loginIndex")->with("success", "berhasil logout");
    }



    public function register(Request $request)
    {
        $dataUser = DB::table("users")->where("email", $request->email)->first();
        if ($dataUser != null) {
            return redirect("/registerIndex")->with("failed", "failed register");
        }

        DB::table("users")->insert([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            'remember_token' => Str::random(60),
        ]);

        return redirect("/loginIndex")->with("success", "success register");
    }
    public function login(Request $request)
    {
        $data = DB::table("users")->where("email", $request->email)->first();

        if ($data == null) {

            return redirect("/loginIndex")->with("failed", "gagal login");
        }
        if (Hash::check($request->password, $data->password)) {
            $request->session()->put('remember_token', $data->remember_token);
            return redirect("/");
        } else {
            return redirect("/loginIndex");
        }
    }
    public function loginIndex()
    {


        return view("login");
    }
    public function registerIndex()
    {


        return view("register");
    }
    public function search(Request $request)
    {
        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex")->with("success", "gagal login");
        }
        $data = DB::table("mentorings")->where('project_name', 'LIKE', '%' .  $request->search . '%')->get();

        return view("index", compact("data"));
    }
    public function editIndex($id)
    {
        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex")->with("success", "gagal login");
        }
        $data = DB::table("mentorings")->where("id", $id)->first();

        return view("edit", compact("data"));
    }
    public function createIndex()
    {
        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex")->with("success", "gagal login");
        }

        return view("create");
    }
    public function create(Request $request)
    {
        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex")->with("success", "gagal login");
        }
        $file = $request->file('foto_leader');
        if ($file == null) {
            return redirect('/createIndex')->with("failed", "failed Create Data");
        }
        $nameFile = time() . $file->getClientOriginalName();
        if ($file->getClientMimeType() == 'application/pdf') {
            return redirect('/createIndex')->with("failed", "File harus berupa png or jpg");
        }
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images';


        // upload file
        $file->move($tujuan_upload, $nameFile);
        $nameFile = url('/images/' . $nameFile);




        DB::table("mentorings")->insert([
            "project_name" => $request->project_name,
            "client" => $request->client,
            "name_leader" => $request->name_leader,
            "email_leader" => $request->email_leader,
            "foto_leader" => $nameFile,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "progress" => $request->progress,
        ]);

        return redirect("/createIndex")->with("success", "Success Create Data");
    }
    public function edit(Request $request)
    {
        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex")->with("success", "gagal login");
        }
        if ($request->foto_leader == null) {
            DB::table("mentorings")->where("id", $request->id)->update([
                "project_name" => $request->project_name,
                "client" => $request->client,
                "name_leader" => $request->name_leader,
                "email_leader" => $request->email_leader,
                "start_date" => $request->start_date,
                "end_date" => $request->end_date,
                "progress" => $request->progress,
            ]);
            return redirect('/')->with("success", "tes Edit Data");
        }
        $data = DB::table("mentorings")->where("id", $request->id)->first();
        $delfil = preg_replace("/http:\/\/127.0.0.1:8000\//", "", $data->foto_leader);
        File::delete($delfil);
        $file = $request->file('foto_leader');
        if ($file == null) {
            return redirect('/')->with("failed", "failed Edit Data");
        }
        $nameFile = time() . $file->getClientOriginalName();
        if ($file->getClientMimeType() == 'application/pdf') {
            return redirect('/')->with("failed", "File harus berupa png or jpg");
        }
        // isi dengan nama folder tempat kemana file diupload
        $tujuan_upload = 'images';


        // upload file
        $file->move($tujuan_upload, $nameFile);
        $nameFile = url('/images/' . $nameFile);




        DB::table("mentorings")->where("id", $request->id)->update([
            "project_name" => $request->project_name,
            "client" => $request->client,
            "name_leader" => $request->name_leader,
            "email_leader" => $request->email_leader,
            "foto_leader" => $nameFile,
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "progress" => $request->progress,
        ]);

        return redirect("/")->with("success", "Success Edit Data");
    }
    public function delete($id)
    {
        if (session()->get("remember_token") == "") {
            return redirect("/loginIndex")->with("success", "gagal login");
        }
        $data = DB::table("mentorings")->where("id", $id)->first();
        $delfil = preg_replace("/http:\/\/127.0.0.1:8000\//", "", $data->foto_leader);
        File::delete($delfil);
        DB::table("mentorings")->where("id", $id)->delete();

        return redirect("/",)->with("success", "Berhasil Menghapus Data");
    }
}
