<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departemen;
use App\Models\cabang;
use App\Models\Skills;
use Illuminate\Support\Facades\Validator;
class MasterDataController extends Controller
{
    public function showListDept()
    {
        $depts = Departemen::all();
        return view('masterdata.departemen',compact('depts'));
    }

    public function deptStore(Request $request)
    {
       // Validasi data yang dikirimkan oleh form
       $validatedData = $request->validate([
        'departemen' => 'required|string|max:255|unique:tb_dept,departemen',
        'catatan' => 'nullable|string',
        'status' => 'string',
    ], [
        'departemen.required' => 'Departemen harus diisi.',
        'departemen.string' => 'Departemen harus berupa teks.',
        'departemen.max' => 'Departemen tidak boleh lebih dari :max karakter.',
        'departemen.unique' => 'Departemen sudah ada dalam database.',
        'catatan.string' => 'Catatan harus berupa teks.',
        'status.string' => 'Catatan harus berupa teks.',
    ]);

    // Buat instance dari model Departemen dengan data yang divalidasi
    $departemen = Departemen::create($validatedData);

    // Redirect ke halaman yang sesuai setelah menyimpan data
    return redirect()->route('masterdata.dept');
    }

    public function deletedept($id)
    {
        $data = Departemen::findOrFail($id);
        $data->delete();

        // Setelah menghapus data, Anda dapat melakukan tindakan lainnya,
        // seperti mengirimkan respon atau mengalihkan pengguna ke halaman lain.

        return redirect()->route('masterdata.dept')->with('success', 'Data berhasil dihapus');
    }

    public function showListCabang()
    {
        $cabang = cabang::all();
        return view('masterdata.cabang',compact('cabang'));
    }

    public function cabStore(Request $request)
    {
        // Retrieve input data from the request
        $nama_cabang = $request->input('nama_cabang');
        $pt = $request->input('pt');
        $keterangan = $request->input('keterangan');
        $alamat = $request->input('alamat');
        $status = $request->input('status');

        // Manual validation
        $validator = Validator::make($request->all(), [
        'nama_cabang' => 'required|string|max:255|unique:tb_cabang,nama_cabang',
        'pt' => 'required|string|max:255',
        'keterangan' => 'nullable|string',
        'alamat' => 'nullable|string',
        ], [
        'nama_cabang.required' => 'Nama cabang harus diisi.',
        'nama_cabang.string' => 'Nama cabang harus berupa teks.',
        'nama_cabang.max' => 'Nama cabang tidak boleh lebih dari :max karakter.',
        'nama_cabang.unique' => 'Nama cabang sudah ada dalam database.',
        'pt.required' => 'Nama PT harus diisi.',
        'pt.string' => 'Nama PT harus berupa teks.',
        'pt.max' => 'Nama PT tidak boleh lebih dari :max karakter.',
        'keterangan.string' => 'Catatan harus berupa teks.',
        'alamat.string' => 'Catatan harus berupa teks.',
        ]);

        // Check if validation fails
        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create an instance of the Cabang model with the validated data
        $cabang = Cabang::create([
        'nama_cabang' => $nama_cabang,
        'pt' => $pt,
        'keterangan' => $keterangan,
        'alamat' => $alamat,
        'status' => $status,
        ]);


    // Redirect ke halaman yang sesuai setelah menyimpan data
    return redirect()->route('masterdata.cabang');
    }

    public function deletecabang($id)
    {
        $data = Cabang::findOrFail($id);
        $data->delete();

        // Setelah menghapus data, Anda dapat melakukan tindakan lainnya,
        // seperti mengirimkan respon atau mengalihkan pengguna ke halaman lain.

        return redirect()->route('masterdata.cabang')->with('success', 'Data berhasil dihapus');
    }

    public function showListskill()
    {
        $skills = Skills::all();
        return view('masterdata.skill',compact('skills'));
    }

    public function skillStore(Request $request)
    {
       // Validasi data yang dikirimkan oleh form
       $validatedData = $request->validate([
        'nama_skill' => 'required|string|max:255|unique:tb_skills,nama_skill',
        'catatan' => 'nullable|string',
        'status'=>'numeric'
    ], [
        'nama_skill.required' => 'nama_skill harus diisi.',
        'nama_skill.string' => 'nama_skill harus berupa teks.',
        'nama_skill.max' => 'nama_skill tidak boleh lebih dari :max karakter.',
        'nama_skill.unique' => 'nama_skill sudah ada dalam database.',
        'catatan.string' => 'Catatan harus berupa teks.',
        'status.numeric' => ' status berupa teks.',
    ]);
     // Buat instance dari model skill dengan data yang divalidasi
     $skill = Skills::create($validatedData);

     // Redirect ke halaman yang sesuai setelah menyimpan data
     return redirect()->route('masterdata.skill');
    }
    public function deleteskill($id)
    {
        $data = Skills::findOrFail($id);
        $data->delete();

        // Setelah menghapus data, Anda dapat melakukan tindakan lainnya,
        // seperti mengirimkan respon atau mengalihkan pengguna ke halaman lain.

        return redirect()->route('masterdata.skill')->with('success', 'Data berhasil dihapus');
    }

    public function updateStatus(Request $request, $id, $model)
    {
        // Mendefinisikan nama kelas model berdasarkan parameter $model
        $modelClass = null;
        if ($model === 'Skills') {
            $modelClass = Skills::class;
        } elseif ($model === 'Cabang') {
            $modelClass = Cabang::class;
        } elseif ($model === 'Departemen') {
            $modelClass = Departemen::class;
        }

        if ($modelClass) {
            // Ambil data dari database berdasarkan $id
            $data = $modelClass::find($id);

            // Pastikan data ditemukan sebelum melakukan update
            if ($data) {
                // Toggle status (0 menjadi 1 atau sebaliknya)
                $data->status = $data->status == 1 ? 0 : 1;

                // Simpan perubahan ke database
                $data->save();

                // Redirect ke halaman yang sesuai dengan model yang digunakan
                $route = ($model === 'Skills') ? 'masterdata.skill' : (($model === 'Cabang') ? 'masterdata.cabang' : 'masterdata.dept');

                return redirect()->route($route)->with('success', 'Data berhasil diupdate.');
            } else {
                // Redirect dengan pesan error jika data tidak ditemukan
                return redirect()->back()->with('error', 'Data tidak ditemukan.');
            }
        } else {
            // Redirect dengan pesan error jika model tidak dikenali
            return redirect()->back()->with('error', 'Model tidak dikenali.');
        }
    }



}
