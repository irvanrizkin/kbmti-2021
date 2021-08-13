<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Anggotum;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $anggota = [
            // Non-Acc
            [
                'name' => 'Ramdani Koernia',
                'instagram_acc' => 'Ini akun instagram',
                'linkedin_acc' => 'ini akun linkedin',
                'type' => 'Staff',
                'caption' => 'Staff',
            ],
            [
                'name' => 'Ketua HRD',
                'instagram_acc' => 'Akun IG Ketua HRD',
                'linkedin_acc' => 'Akun linkedin Ketua HRD',
                'type' => 'Ketua Departemen',
                'caption' => 'Ketua Departemen',
            ],
            [
                'name' => 'Wakil Ketua HRD',
                'instagram_acc' => 'Akun IG Wakil Ketua HRD',
                'linkedin_acc' => 'Akun linkedin Ketua HRD',
                'type' => 'Ketua Departemen',
                'caption' => 'Ketua Departemen',
            ],
            [
                'name' => 'Vania Sahda',
                'instagram_acc' => 'Akun IG',
                'linkedin_acc' => 'Akun Linkedin',
                'type' => 'Staff',
                'caption' => 'Staff',
            ],
            [
                'name' => 'Ardhya Khrisna Chandra',
                'instagram_acc' => 'Akun IG',
                'linkedin_acc' => 'Akun Linkedin',
                'type' => 'Staff',
                'caption' => 'Staff',
            ],
            [
                'name' => 'Raihan Winurputra',
                'instagram_acc' => 'Akun IG',
                'linkedin_acc' => 'Akun Linkedin',
                'type' => 'Staff',
                'caption' => 'Staff',
            ],
            [
                'name' => 'Ketua Advocacy',
                'instagram_acc' => 'Akun IG',
                'linkedin_acc' => 'Akun Linkedin',
                'type' => 'Ketua Departemen',
                'caption' => 'Ketua Departemen',
            ],
            [
                'name' => 'Wakil Ketua Advocacy',
                'instagram_acc' => 'Akun IG',
                'linkedin_acc' => 'Akun Linkedin',
                'type' => 'Ketua Departemen',
                'caption' => 'Ketua Departemen',
            ],
            [
                'name' => 'Wakil Ketua Advocacy',
                'instagram_acc' => 'Akun IG',
                'linkedin_acc' => 'Akun Linkedin',
                'type' => 'Wakil Ketua Departemen',
                'caption' => 'Wakil Ketua Departemen',
            ],
            [
                'name' => 'Julina Larasati Pramudita',
                'instagram_acc' => 'Akun IG',
                'linkedin_acc' => 'Akun Linkedin',
                'type' => 'Staff',
                'caption' => 'Staff',
            ],
            [
                'name' => 'Syafifa Alifah',
                'instagram_acc' => 'Akun IG',
                'linkedin_acc' => 'Akun Linkedin',
                'type' => 'Staff',
                'caption' => 'Staff',
            ],
            [
                'name' => 'Rifdah',
                'instagram_acc' => 'Akun IG',
                'linkedin_acc' => 'Akun Linkedin',
                'type' => 'Staff',
                'caption' => 'Staff',
            ],
        ];

        Anggotum::insert($anggota);
    }
}
