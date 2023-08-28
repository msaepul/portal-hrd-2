<?php

namespace App\Http\Controllers;

use App\Models\cabang;
use App\Models\Departemen;
use App\Models\Loker;
use App\Models\Skills;
use App\Models\Province;
use App\Models\District;
use App\Models\Regency;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LokerController extends Controller
{
    public function index()
    {

        $cabang = cabang::where('status', '=', '1')->get();
        $loker = Loker::where('status', '=', '1')->get();
        $user= Auth::user();
          // Ekstrak nilai id_skill menjadi array untuk setiap data Loker
        foreach ($loker as $l) {
            $idSkillArray = explode(',', $l->id_skill);
            $l->id_skill = $idSkillArray; // Simpan hasil ekstraksi sebagai array di model Loker
        }
        return view('landing', compact('cabang', 'loker','user'));
    }
    public function detailLandingLoker($id)
    {
        $loker = Loker::findOrFail($id);
        $idSkillArray = explode(',', $loker->id_skill);
        $loker->id_skill = $idSkillArray; // Simpan hasil ekstraksi sebagai array di model Loker

        return view('landing.lokerlandingdetail', compact('loker'));
    }
    public function applyLandingLoker($id)
    {
        $loker = Loker::findOrFail($id);
        $provinsi = Province::all();
        $idSkillArray = explode(',', $loker->id_skill);
        $loker->id_skill = $idSkillArray; // Simpan hasil ekstraksi sebagai array di model Loker
        $user= Auth::user();
        return view('landing.lokerapply', compact('loker','provinsi','user'));
    }

    public function getkota(request $request){
        $id_provinsi = $request->id_provinsi;

        $kotas = Regency::where('province_id',$id_provinsi)->get();
        $option = "<option disabled selected>Pilih Kota</option>";
        foreach ($kotas as $kota){
            $option.="<option value='$kota->id'> $kota->name </option>";
        }
        echo $option; //respone ke View loker apply (get data kota ketika select provinsi)

    }
    public function getkecamatan(request $request){
        $id_kota = $request->id_kota;

        $kecamatans = District::where('regency_id',$id_kota)->get();
        $option = "<option disabled selected>Pilih Kecamatan</option>";
        foreach ($kecamatans as $kecamatan){
            $option.="<option value='$kecamatan->id'> $kecamatan->name </option>";
        }
        echo $option; //respone ke View loker apply (get data kecamatan ketika select kota)


    }

    public function showListLoker()
    {
        $lokers=Loker::where('id_cabang','=',getUserIDCabang())->get();
        return view('loker.list',compact('lokers'));
    }
    public function lokerdetail()
    {
        $cabang = cabang::all();
        $loker = Loker::where('status', '=', '1')->get();
        $skills = Skills::where('status', '=', '1')->get();
        return view('loker.lokerdetail', compact('cabang', 'loker', 'skills'));
    }

    public function addLoker()
    {
        $depts = Departemen::all();
        $cabang = cabang::all();
        $skills = Skills::all();
        return view('loker.addloker', compact('depts','cabang','skills'));
    }

    public function addLokerstore(Request $request)
    {
        $cabang = $request->input('id_cabang');
        $depts = $request->input('id_dept');
        $content1 = $request->input('quill_content1');
        $content2 = $request->input('quill_content2');
        $startdate = Carbon::createFromFormat('Y-m-d', $request->input('start_date'));
        $enddate = Carbon::createFromFormat('Y-m-d', $request->input('end_date'));
        // Mengambil nilai dari masing-masing checkbox
        $gender = $request->input('gender', 0); // Mengambil nilai dari input checkbox1 atau kembalikan 0 jika tidak ada
        $date_birth = $request->input('date_birth', 0); // Mengambil nilai dari input checkbox2 atau kembalikan 0 jika tidak ada
        $country = $request->input('country', 0); // Mengambil nilai dari input checkbox3 atau kembalikan 0 jika tidak ada
        $profile_image = $request->input('profile_image', 0); // Mengambil nilai dari input checkbox4 atau kembalikan 0 jika tidak ada
        $resume = $request->input('resume', 0); // Mengambil nilai dari input checkbox5 atau kembalikan 0 jika tidak ada
        $tac = $request->input('tac', 0); // Mengambil nilai dari input checkbox6 atau kembalikan 0 jika tidak ada
        $cv = $request->input('cv', 0); // Mengambil nilai dari input checkbox7 atau kembalikan 0 jika tidak ada
        $pf = $request->input('pf', 0); // Mengambil nilai dari input checkbox7 atau kembalikan 0 jika tidak ada
        $generate = Loker::generateNomor();
        $selectedOptions = $request->input('id_skill');
        $joinedOptions = implode(',', $selectedOptions);

        // // Simpan data ke basis data
        Loker::create([
            'id_loker' => $generate,
            'id_cabang' =>$cabang,
            'id_dept' => $depts,
            'desc_job' => $content1,
            'require_job' => $content2,
            'start_date' => $startdate,
            'end_date' => $enddate,
            'resume' =>$resume,
            'gender'=>$gender,
            'date_birth'=>$date_birth,
            'country'=>$country,
            'profile_image'=>$profile_image,
            'cv'=>$cv,
            'tac'=>$tac,
            'id_skill'=>$joinedOptions,

            'status'=>1

        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan!');

    }

     public function updateStatus(Request $request, $id)
    {

            // Ambil data Loker dari database berdasarkan $id
        $loker = Loker::find($id);

        $loker->status = $loker->status == 1 ? 0 : 1;

        // Simpan perubahan ke database
        $loker->save();

            // Loker::create($request->all());
            // // Membuat data Loker baru berdasarkan data yang diambil dari request

            return redirect()->route('loker')->with('success', 'Data loker berhasil diupdate.');
            // Melakukan redirect dan menyertakan pesan sukses
    }

    public function showEditloker($id)
    {
        $depts = Departemen::all();
        $cabang = cabang::all();
        $loker = Loker::findOrFail($id);
        // Melakukan pengecekan apakah data dengan ID yang diberikan ditemukan atau tidak

        return view('loker.editloker', compact('loker','depts','cabang'));
        // Mengirimkan data loker ke view 'edit'
    }
    public function editLokerstore(Request $request, $id)
{
    // // Validasi input jika diperlukan
    // $request->validate([
    //     // ... Atur aturan validasi jika diperlukan ...
    // ]);

    // Dapatkan data loker berdasarkan ID
    $loker = Loker::find($id);

    // Ubah data loker berdasarkan input form
    $loker->id_cabang = $request->input('id_cabang');
    $loker->id_dept = $request->input('id_dept');
    $loker->desc_job = $request->input('quill_content1');
    $loker->require_job = $request->input('quill_content2');
    $loker->start_date = Carbon::createFromFormat('Y-m-d', $request->input('start_date'));
    $loker->end_date = Carbon::createFromFormat('Y-m-d', $request->input('end_date'));
    $loker->resume = $request->input('resume', 0);
    $loker->gender = $request->input('gender', 0);
    $loker->date_birth = $request->input('date_birth', 0);
    $loker->country = $request->input('country', 0);
    $loker->profile_image = $request->input('profile_image', 0);
    $loker->cv = $request->input('cv', 0);
    $loker->tac = $request->input('tac', 0);
    $loker->status = 1; // Jika ada data status, sesuaikan dengan input form yang sesuai

    // dd($request);
    // Simpan perubahan ke basis data
    $loker->save();

    return redirect()->back()->with('success', 'Data berhasil diperbarui!');
}


    public function deleteLoker($id)
    {
        $data = Loker::findOrFail($id);
        $data->delete();

        // Setelah menghapus data, Anda dapat melakukan tindakan lainnya,
        // seperti mengirimkan respon atau mengalihkan pengguna ke halaman lain.

        return redirect()->route('loker')->with('success', 'Data berhasil dihapus');
    }

    public function showListApply()
    {
        $lokers=Loker::where('id_cabang','=',getUserIDCabang())->get();
        return view('loker.listapply',compact('lokers'));
    }

}
