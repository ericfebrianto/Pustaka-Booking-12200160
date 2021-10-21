<?php
namespace App\Database\Seeds;

use App\Models\PenggunaModel_12200160;
use CodeIgniter\Database\Seeder;

class PenggunaSeeder_12200160 extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama'     => 'eric',
                'password' => md5('12200160')
            ],
            [
                'nama'     => 'admin',
                'password' => md5('12345')
            ],
            [
                'nama'     => '12200160',
                'password' => md5('eric_febrianto')
            ]    
        ];

        $p = new PenggunaModel_12200160();
        $p->insertBatch($data);
    }
}
