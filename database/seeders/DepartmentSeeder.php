<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            // EMTI
            [
                'name' => 'Human and Resource Development',
                'initial' => 'HRD',
                'description' => '<p>HRD adalah Department yang mengurusi perihal resource</p>',
                'type' => 'EMTI',
                'sub_type' => 'Department',
            ],
            [
                'name' => 'Advocacy',
                'initial' => 'Advo',
                'description' => '<p>Department Advocacy adalah department yang menangani urusan advokasi mahasiswa</p>',
                'type' => 'EMTI',
                'sub_type' => 'Department',
            ],
            [
                'name' => 'Social Environment',
                'initial' => 'SE',
                'description' => '<p>Social Environment adalah departemen yang bla-bla-bla</p>',
                'type' => 'EMTI',
                'sub_type' => 'Department',
            ],
            [
                'name' => 'Research and Development',
                'initial' => 'RnD',
                'description' => '<p>Research and Development adalah departemen yang ......</p>',
                'type' => 'EMTI',
                'sub_type' => 'Department',
            ],
            [
                'name' => 'Relation and Creative',
                'initial' => 'RnC',
                'description' => '<p>Departemen Relation and Creative adalah ......</p>',
                'type' => 'EMTI',
                'sub_type' => 'Department',
            ],
            [
                'name' => 'Entrepreneurship',
                'initial' => 'Entre',
                'description' => '<p>Departemen Entrepreneurship adalah departemen yang .....</p>',
                'type' => 'EMTI',
                'sub_type' => 'Department',
            ],
            [
                'name' => 'Ketua dan Wakil Ketua Himpunan',
                'initial' => 'Kahim_dan_Wakahim',
                'description' => '<p>Ketua himpunan dan wakil ketua himpunan terdiri dari.....</p>',
                'type' => 'EMTI',
                'sub_type' => 'Non-Department',
            ],

            // BPMTI
            [
                'name' => 'BPMTI',
                'initial' => 'BPMTI',
                'description' => '<p>BPMTI adalah badan ......</p>',
                'type' => 'BPMTI',
                'sub_type' => 'Non-Department',
            ],
            [
                'name' => 'Komisi 1',
                'initial' => 'Komisi-1',
                'description' => '<p>Komisi 1 dalam BPMTI adalah komisi yang .....</p>',
                'type' => 'BPMTI',
                'sub_type' => 'Department',
            ],
            [
                'name' => 'Komisi 2',
                'initial' => 'Komisi-2',
                'description' => '<p>Komisi 2 BPMTI memiliki tanggung jawab</p>',
                'type' => 'BPMTI',
                'sub_type' => 'Department',
            ],
            [
                'name' => 'Komisi 3',
                'initial' => 'Komisi-3',
                'description' => '<p>Komisi 3 dalam BPMTI bertugas untuk</p>',
                'type' => 'BPMTI',
                'sub_type' => 'Department',
            ],

            // Quick Fix add on
            [
                'name' => 'Sekretaris dan Bendahara',
                'initial' => 'Sekben',
                'description' => '<p>Sekretaris dan Bendahara adalah</p>',
                'type' => 'EMTI',
                'sub_type' => 'Department',
            ],

            [
                'name' => 'Internal',
                'initial' => 'Internal',
                'description' => '<p>Internal adalah</p>',
                'type' => 'EMTI',
                'sub_type' => 'Department',
            ],
        ];

        Department::insert($departments);
    }
}
