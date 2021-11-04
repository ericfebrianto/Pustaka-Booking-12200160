<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Pengguna12200160;
use Kint\Parser\SplFileInfoPlugin;

class PenggunaController extends BaseController
{
    public function index()
    {
        return view('halaman/pengguna/table', [
            'xx'    => (new Pengguna12200160())->get()->getResult(),
            'error' => $this->session->getFlashdata('error')
        ]);
    }

    public function form($data = [])
    {
        return view('halaman/pengguna/form', [
            'vd'    => $this->session->getFlashdata('validator'),
            'error' => $this->session->getFlashdata('error'),
            'data' => $data
        ]);
    }

    private function validasi()
    {
        return $this->validate(
            [
                'nama'      => 'required',
                'password'  => 'required|min_length[6]',
                'password2' => 'required|min_length[6]|matches[password]'
            ],
            [
                'nama'      => ['required' => 'Nama Pengguna Harus Diisikan'],
                'password'  => [
                    'required'   => 'Kata Sandi Harus Diisikan',
                    'min_length' => 'Minimal Karakter 6 Huruf'
                ],
                'password2'      => [
                    'required'   => 'Ulangi Kata Sandi Harus Diisikan',
                    'min_length' => 'Minimal Karakter 6 Huruf',
                    'matches'    => 'Ulangi Sandi Tidak Sama Isinya Dengan Kata Sandi'
                ]
            ]
        );
    }

    public function simpan()
    {
        $data = [
            'nama'     => $this->request->getPost('nama'),
            'password' => md5($this->request->getPost('password')),
        ];
        if ($this->validasi()) {
            $r = (new Pengguna12200160())->insert($data);

            if ($r == false) {
                return redirect()->to('/pengguna')->with('error', 'Data Pengguna Gagal Disimpan');
            } else {
                return redirect()->to('/pengguna-list');
            }
        } else {
            return redirect()->to('/pengguna')->with('validator', $this->validator);
        }
    }

    public function edit($id)
    {
        $data = (new Pengguna12200160())->where('id', $id)->first();

        if ($data == null) {
            return redirect()->to('/pengguna-list')->with('error', 'Pengguna Tidak Di temukan');
        } else {
            return $this->form($data);
        }
    }

    private function validasiPatch()
    {
        return $this->validate(
            [
                'nama'      => 'required',
            ],
            [
                'nama'      => ['required' => 'Nama Pengguna Harus Diisikan'],
            ]
        );
    }

    public function patch()
    {
        $id = $this->request->getPost('id');
        $data = [
            'nama' => $this->request->getPost('nama'),
        ];

        if ($this->request->getPost('password') != '') {
            $data['password'] = md5($this->request->getPost('password'));
        }

        if ($this->validasiPatch()) {
            $r = (new Pengguna12200160())->update($id, $data);
            if ($r == true) {
                return redirect()->to('/pengguna-list');
            } else {
                return redirect()->to('/pengguna/' . $id)->with('error', 'Data Gagal di Update');
            }
        } else {
            return redirect()->to('/pengguna/' . $id)->with('validator', $this->validator);
        }
    }
    public function delete()
    {
        $id = $this->request->getPost('id');
        $r = (new Pengguna12200160())->delete($id);

        $rd = redirect()->to('/pengguna-list');
        if ($r == false) {
            $rd->with('error', 'Pengguna Gagal dihapus');
        }
        return $rd;
    }
}