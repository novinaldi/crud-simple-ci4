<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modeltamu;

class Tamu extends BaseController
{
    public function index()
    {
        return view('form_tamu');
    }

    public function send()
    {
        // Tampung semua value dari inputan kedalam variabel

        $namaLengkap =  $this->request->getVar('namalengkap');
        $gender = $this->request->getVar('gender');
        $alamat = $this->request->getVar('alamat');
        $email = $this->request->getVar('alamatemail');
        $telp = $this->request->getVar('telp');
        $pass = $this->request->getVar('pass');
        $fileUpload = $this->request->getFile('upload');

        $rules = $this->validate([
            'namalengkap' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'gender' => [
                'label' => 'Gender',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} wajib dipilih'
                ]
            ],
            'alamat' => [
                'label' => 'Alamat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'alamatemail' => [
                'label' => 'Alamat Email',
                'rules' => 'required|valid_email|is_unique[tamu1234.email1234]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'valid_email' => '{field} harus valid',
                    'is_unique' => '{field} sudah ada, silahkan coba yang lain'
                ]
            ],
            'telp' => [
                'label' => 'Nomor Telp',
                'rules' => 'required|numeric|is_unique[tamu1234.telp1234]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'numeric' => '{field} harus angka',
                    'is_unique' => '{field} sudah ada, silahkan coba yang lain'
                ]
            ],
            'pass' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} tidak boleh kosong'
                ]
            ],
            'pass_confirm' => [
                'label' => 'Password Confirm',
                'rules' => 'required|matches[pass]',
                'errors' => [
                    'required' => '{field} tidak boleh kosong',
                    'matches' => '{field} harus sama'
                ]
            ],

            'upload' => [
                'label' => 'Upload Foto',
                'rules' => 'max_size[upload,2048]|mime_in[upload,image/png,image/jpeg,image/jpg]|ext_in[upload,png,jpg,jpeg]'
            ]
        ]);

        $model_tamu = new Modeltamu();
        if (!$rules) {
            $validation = \COnfig\Services::validation();
            $this->session->setFlashData([
                'errorNamaLengkap' => $validation->getError('namalengkap'),
                'errorGender' => $validation->getError('gender'),
                'errorAlamat' => $validation->getError('alamat'),
                'errorEmail' => $validation->getError('alamatemail'),
                'errorTelp' => $validation->getError('telp'),
                'errorPass' => $validation->getError('pass'),
                'errorPassConfirm' => $validation->getError('pass_confirm'),
                'errorUpload' => $validation->getError('upload')
            ]);
            return redirect()->back()->withInput();
        } else {
            if ($fileUpload != null || $fileUpload != "") {
                $fileUpload->move('uploads', $fileUpload->getRandomName());
                $fileName = $fileUpload->getName();
                $model_tamu->insert([
                    'namatamu1234' => $namaLengkap,
                    'gender1234' => $gender,
                    'alamat1234' => $alamat,
                    'email1234' => $email,
                    'telp1234' => $telp,
                    'pass1234' => password_hash($pass, PASSWORD_DEFAULT),
                    'foto1234' => $fileName
                ]);
            } else {
                $model_tamu->insert([
                    'namatamu1234' => $namaLengkap,
                    'gender1234' => $gender,
                    'alamat1234' => $alamat,
                    'email1234' => $email,
                    'telp1234' => $telp,
                    'pass1234' => password_hash($pass, PASSWORD_DEFAULT),
                    'foto1234' => null
                ]);
            }
            $this->session->setFlashData('pesan', 'Data tamu berhasil ditambahkan');
            return redirect()->to('/tamu/data');
        }
    }

    public function getData()
    {
        $tombol_cari = $this->request->getPost('cari');

        if (isset($tombol_cari)) {
            $cari = $this->request->getPost('cari');
            $this->session->set('cari_tamu', $cari);
            redirect()->to('/tamu/data');
        } else {
            $cari = $this->session->get('cari_tamu');
        }

        $nohalaman = ($this->request->getVar('page_tamu')) ? $this->request->getVar('page_tamu') : '1';


        $model_tamu = new Modeltamu();
        $totaldata = $cari ? $model_tamu->tampil_cari($cari)->countAllResults() : $model_tamu->countAllResults();
        // $dataTamu = $model_tamu->paginate(10, 'tamu');
        $dataTamu = $cari ? $model_tamu->tampil_cari($cari)->paginate(5, 'tamu') : $model_tamu->paginate(5, 'tamu');
        return view('tampil_datatamu', [
            'datatamu' => $dataTamu,
            'pager' => $model_tamu->pager,
            'nohalaman' => $nohalaman,
            'cari' => $cari,
            'totaldata' => $totaldata
        ]);
    }

    public function formedit($idtamu = null)
    {
        $modeltamu = new Modeltamu();
        $row = $modeltamu->find($idtamu);
        if ($row) {
            $data = [
                'idtamu' => $idtamu,
                'namalengkap' => $row['namatamu1234'],
                'gender' => $row['gender1234'],
                'alamat' => $row['alamat1234'],
                'email' => $row['email1234'],
                'telp' => $row['telp1234'],
            ];
            return view('formedit_tamu', $data);
        } else {
            return redirect()->to('/');
        }
    }

    public function updateData()
    {
        $idtamu = $this->request->getVar('idtamu');
        $namalengkap = $this->request->getVar('namalengkap');
        $gender = $this->request->getVar('gender');
        $alamat = $this->request->getVar('alamat');
        $email = $this->request->getVar('alamatemail');
        $telp = $this->request->getVar('telp');

        $modeltamu = new Modeltamu();

        $modeltamu->update($idtamu, [
            'namatamu1234' => $namalengkap, 'gender1234' => $gender,
            'alamat1234' => $alamat, 'email1234' => $email,
            'telp1234' => $telp
        ]);

        $this->session->setFlashData('pesan', "Data tamu dengan nama <strong>$namalengkap</strong> berhasil diupdate");

        return redirect()->to('/');
    }

    public function delete($idtamu = null)
    {
        $modeltamu = new Modeltamu();
        $row = $modeltamu->find($idtamu);
        if ($row) {
            $modeltamu->delete($idtamu);

            $this->session->setFlashData('pesan', "Data tamu berhasil terhapus");

            return redirect()->to('/tamu/data');
        } else {
            return redirect()->to('/');
        }
    }

    public function dataTrash()
    {
        $modeltamu = new Modeltamu();
        $data_terhapus = $modeltamu->onlyDeleted()->findAll();
        return view('data_tamu_terhapus', [
            'data_terhapus' => $data_terhapus
        ]);
    }

    public function restoreData($idtamu = null)
    {
        $modeltamu = new Modeltamu();

        $modeltamu->update($idtamu, [
            'deleted_at' => null,
        ]);

        $this->session->setFlashData('pesan', "Data berhasil di kembalikan");

        return redirect()->back();
    }

    public function deletePermanent($idtamu = null)
    {
        $modeltamu = new Modeltamu();
        $data = $modeltamu->onlyDeleted()->find($idtamu);
        if ($data['foto1234'] != null || $data['foto1234'] != "") {
            unlink('uploads/' . $data['foto1234']);
        }
        $modeltamu->delete($idtamu, true);
        $this->session->setFlashData('pesan', "Data berhasil <strong>Di-Hapus Secara Permanent</strong>");

        return redirect()->back();
    }
}