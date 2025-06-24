<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TentangKami;

class AdminTentangKamiController extends Controller
{
    public function index()
    {
        $biodataList = TentangKami::all();
        return view('pages.admin.tentang-kami', compact('biodataList'));
    }

    public function create()
    {
        return view('pages.admin.crud-tentang-kami', [
            'biodata' => null,
            'form_action' => route('admin.tentangkami.store'),
            'form_method' => 'POST',
            'button_label' => 'Simpan Biodata',
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:10000',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $validated['gambar'] = $filename;
        }

        TentangKami::create($validated);

        return redirect()->route('admin.tentangkami.index')->with('success', 'Biodata berhasil disimpan!');
    }

    public function edit($id)
    {
        $biodata = TentangKami::findOrFail($id);

        return view('pages.admin.crud-tentang-kami', [
            'biodata' => $biodata,
            'form_action' => route('admin.tentangkami.update', $biodata->id),
            'form_method' => 'PUT',
            'button_label' => 'Update Biodata',
        ]);
    }

    public function update(Request $request, $id)
    {
        $biodata = TentangKami::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:10000',
        ]);

        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $validated['gambar'] = $filename;
        }

        $biodata->update($validated);

        return redirect()->route('admin.tentangkami.index')->with('success', 'Biodata berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $biodata = TentangKami::findOrFail($id);

        if ($biodata->gambar && file_exists(public_path('images/' . $biodata->gambar))) {
            unlink(public_path('images/' . $biodata->gambar));
        }

        $biodata->delete();

        return redirect()->route('admin.tentangkami.index')->with('success', 'Biodata berhasil dihapus!');
    }
}
