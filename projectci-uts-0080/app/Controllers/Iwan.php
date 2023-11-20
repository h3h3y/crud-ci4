<?php
namespace App\Controllers;
use App\Controllers\BaseController;
use App\Models\Model0080;


class Iwan extends BaseController
{
    public function index()
    {
        return view('utsview/berandaview');
    }

    public function databuku()
    {
        $buku = new Model0080();
        $getdata = $buku->findAll();

        $data =[
            'databuku' => $getdata
        ];
        return view('utsview/databukuview', $data);
    }

    public function detailbuku($bukukode)
    {
        $buku = new Model0080();
        $data['databuku'] = $buku->find($bukukode);
        return view('utsview/detailbukuview', $data);
    }

    public function inputbuku()
    {
        helper('form');
        return view('utsview/inputbukuview');
    }

    public function simpandatabuku()
    {
        $buku = new Model0080();
        $validationRules = [
            'sampul' => 'uploaded[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
            'kodebuku' => 'is_unique[tbbuku_0080.bukukode]',
        ];

        if (!$this->validate($validationRules)) {
            // Pesan Untuk Kode Buku yang sama
            if ($this->validator->hasError('kodebuku')) {
                session()->setFlashdata('duplikatkodebuku', 'Data Gagal Ditambah, Pastikan Kode Buku Yang di inputkan tidak sama');
                return redirect()->to('/buku/databuku');
            }

            // Pesan Gagal untuk sampul
            if ($this->validator->hasError('sampul')) {
                 session()->setFlashdata('inputsampulgagal', 'Gagal melakukan Input sampul. Pastikan file gambar (jpg, jpeg, png)');
                 return redirect()->to('/buku/inputbuku');
            }
        }
        $sampul = $this->request->getFile('sampul');
        $sampulname = $sampul->getRandomName();
        $sampul->move(ROOTPATH . 'public/uploads/sampul', $sampulname);
        $buku->insert([
        'bukukode' => $this->request->getVar('kodebuku'),
        'bukujudul' => $this->request->getVar('judulbuku'),
        'bukukategori' => $this->request->getVar('kategoribuku'),
        'bukuhalaman' => $this->request->getVar('jumlahhalamanbuku'),
        'bukupenerbit' => $this->request->getVar('penerbitbuku'),
        'bukuisbn' => $this->request->getVar('isbnbuku'),
        'bukuharga' => $this->request->getVar('hargabuku'),
        'bukusampul' =>'uploads/sampul/' . $sampulname,
        ]);
        
        session()->setFlashdata('inputberhasil', 'Data Berhasil Ditambah');
        return redirect()->to('/buku/databuku');
    }

    public function editbuku($bukukode)
    {
        helper('form');
        $buku = new Model0080();
        $select = $buku->find($bukukode);
        
        if($select){
            $data = [
                'editkode' => $bukukode,
                'editjudul' => $select['bukujudul'], 
                'editkategori' => $select['bukukategori'], 
                'edithalaman' => $select['bukuhalaman'], 
                'editpenerbit' => $select['bukupenerbit'], 
                'editisbn' => $select['bukuisbn'], 
                'editharga' => $select['bukuharga'], 
            ];
            return view('utsview/editbukuview' ,$data);
        }
    }

    public function updatebuku()
    {
        $bukuModel = new Model0080();

        $kodebuku = $this->request->getVar('kodebuku');

        // Ambil data buku yang akan diupdate
        $bukuedit = $bukuModel->find($kodebuku);

        // Validasi input
        $validationRules = [
            'sampul' => 'mime_in[sampul,image/jpg,image/jpeg,image/png]|max_size[sampul,1024]' 
        ];
        if (!$this->validate($validationRules)) {
            session()->setFlashdata('editsampulgagal', 'Gagal melakukan update sampul. Pastikan file gambar (jpg, jpeg, png)');
            return redirect()->to("buku/editbuku/{$kodebuku}");
        }

        if ($this->validate($validationRules)) {
            // Update data buku
            $data = [
                'bukukode' => $this->request->getVar('kodebuku'),
                'bukujudul' => $this->request->getVar('judulbuku'),
                'bukukategori' => $this->request->getVar('kategoribuku'),
                'bukuhalaman' => $this->request->getVar('jumlahhalamanbuku'),
                'bukupenerbit' => $this->request->getVar('penerbitbuku'),
                'bukuisbn' => $this->request->getVar('isbnbuku'),
                'bukuharga' => $this->request->getVar('hargabuku'),
            ];

            $sampul = $this->request->getFile('sampul');
            if ($sampul->isValid()) {
                // Pindahkan file sampul ke direktori penyimpanan
                $newSampulName = $sampul->getRandomName();
                $sampul->move(ROOTPATH . 'public/uploads/sampul', $newSampulName);

                // Update path sampul di data
                $data['bukusampul'] = 'uploads/sampul/' . $newSampulName;

                // Hapus gambar sampul lama jika ada
                $this->hapusSampulLama($bukuedit['bukusampul']);
            } else {
                // Jika sampul tidak diunggah, biarkan path tetap seperti sebelumnya
                $data['bukusampul'] = $bukuedit['bukusampul'];
            }

            $bukuModel->update($kodebuku, $data);

            session()->setFlashdata('editberhasil', 'Data Berhasil Di edit');
            return redirect()->to('buku/databuku');
        } else {
            // Jika validasi gagal, kembalikan ke halaman edit
            session()->setFlashdata('editgagal', 'Data Gagal Di Update');
            return redirect()->to("buku/editbuku/{$kodebuku}");
        }
    }

    // Funtion untuk menghapus gambar sampul lama
    private function hapusSampulLama($sampulPath)
    {
        if (!empty($sampulPath) && file_exists(ROOTPATH . 'public/' . $sampulPath)) {
            unlink(ROOTPATH . 'public/' . $sampulPath);
        }
    }


    public function deletebuku($bukukode)
    {
        $buku = new Model0080();
        $hapusbuku = $buku->find($bukukode);
        if($hapusbuku){
            if (!empty($hapusbuku['bukusampul'])) {
                // Path lengkap ke file sampul
                $fullPathSampul = FCPATH . $hapusbuku['bukusampul'];

                // Hapus file sampul jika ada
                if (is_file($fullPathSampul)) {
                    unlink($fullPathSampul);
                }
            }
            $buku->delete($bukukode);
            session()->setFlashdata('hapusberhasil', 'Data berhasil Dihapus');
            return redirect()->to('buku/databuku');
        }
    }
}
