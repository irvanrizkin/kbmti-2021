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

        /**
         * Type
         * Slightly hard-coded in logic, so use this if create anggota seeder
         */
        $ketuaType = "Ketua Departemen";
        $wakilType = "Wakil Ketua Departemen";
        $staffType = "Staff Dept";

        /**
         * Tahun 2021
         * Department ids
         * 1 => HRD
         * 2 => Advocacy
         * 3 => Social Environment
         * 4 => Research and Development
         * 5 => Relation and Creative
         * 6 => Entrepreneurship
         * 7 => Non Departemen
         * 8 => BPMTI
         * 9 => Komisi 1
         * 10 => Komisi 2
         * 11 => Komisi 3
         * 12 => Sekretaris dan Bendahara
         * 13 => Internal
         */

        /**
         * Quick fix note
         * @Internal berada pada Non-Departemen pada posisi Staff
         * 
         */

        $anggotaEmtiNon = [

            // Non Departemen
            [
                'name' => 'Ediashta Revindra A',
                'instagram_acc' => 'https://www.instagram.com/not_ediashta/',
                'linkedin_acc' => 'https://www.linkedin.com/in/ediashta-revin-468a26193',
                'type' => $ketuaType,
                'caption' => 'Ketua Himpunan',
                'department_id' => 7,
            ],

            [
                'name' => 'Moch Izza Auladina L',
                'instagram_acc' => 'https://www.instagram.com/moizac_/',
                'linkedin_acc' => 'https://id.linkedin.com/in/mohammad-izza-a68b631b0',
                'type' => $wakilType,
                'caption' => 'Wakil Ketua Himpunan',
                'department_id' => 7,
            ],

        ];

        $sekben = [

            [
                'name' => 'Marchenda Fayza Madjid',
                'instagram_acc' => 'https://www.instagram.com/fay.loveu/',
                'linkedin_acc' => 'https://www.linkedin.com/in/marchenda-f-16a0b3128',
                'type' => $ketuaType,
                'caption' => 'Pemimpin Sekben',
                'department_id' => 12,
            ],

            [
                'name' => 'Ihza Aulya Nanda',
                'instagram_acc' => 'https://www.instagram.com/ihzaaulya/',
                'linkedin_acc' => '',
                'type' => $staffType,
                'caption' => 'Sekretaris 1',
                'department_id' => 12,
            ],

            [
                'name' => 'Lusiana Yulianto',
                'instagram_acc' => 'https://www.instagram.com/lusianaa.y/',
                'linkedin_acc' => 'https://www.linkedin.com/in/lusiana-yulianto-3a56b41b9',
                'type' => $staffType,
                'caption' => 'Sekretaris 2',
                'department_id' => 12,
            ],

            [
                'name' => 'Savira Yudith P.',
                'instagram_acc' => 'https://www.instagram.com/saviraayp/',
                'linkedin_acc' => '',
                'type' => $staffType,
                'caption' => 'Bendahara',
                'department_id' => 12,
            ],

        ];

        $internal = [
            
            [
                'name' => 'Qanita Nur Farhana',
                'instagram_acc' => 'http://instagram.com/farhanakey',
                'linkedin_acc' => 'http://linkedin.com/in/qonitafarhana',
                'type' => $staffType,
                'caption' => 'Internal',
                'department_id' => 13,
            ],

            [
                'name' => 'Yanuar Octavinaus',
                'instagram_acc' => 'https://www.instagram.com/yanuaroctaa/',
                'linkedin_acc' => 'https://www.linkedin.com/in/yanuaroctavianus/',
                'type' => $staffType,
                'caption' => 'Internal',
                'department_id' => 13,
            ],

            [
                'name' => 'Jasmine Pratiwi Putri',
                'instagram_acc' => 'https://www.instagram.com/jasmine.pratiwi/',
                'linkedin_acc' => 'https://www.linkedin.com/in/yanuaroctavianus/',
                'type' => $staffType,
                'caption' => 'Internal',
                'department_id' => 13,
            ],

        ];

        $anggotaBpmtiNon = [

            // BPMTI
            // Koordinator
            [
                'name' => 'Cahyo Gusti Indrayanto',
                'instagram_acc' => 'https://www.instagram.com/masss_c/',
                'linkedin_acc' => 'https://www.linkedin.com/in/cahyo-gusti-12a313132/',
                'type' => $ketuaType,
                'caption' => 'Koordinator',
                'department_id' => 8,
            ],

            [
                'name' => 'Muhammad Hafidz',
                'instagram_acc' => 'https://www.instagram.com/_hafizbi/',
                'linkedin_acc' => 'https://www.linkedin.com/in/muhammad-hafidz-b5133921a',
                'type' => 'Wwakil Ketua Departemen',
                'caption' => 'Sekretaris Jenderal',
                'department_id' => 8,
            ],

        ];

        $komisi1Bpmti = [

            [
                'name' => 'Faiz Yahya',
                'instagram_acc' => 'https://www.instagram.com/faizyahya87/',
                'linkedin_acc' => '',
                'type' => $ketuaType,
                'caption' => 'Ketua Komisi 1',
                'department_id' => 9,
            ],

        ];

        $komisi2Bpmti = [

            [
                'name' => 'Khairiyan Hidayat Ramadhan',
                'instagram_acc' => 'https://www.instagram.com/khairiyanhr/',
                'linkedin_acc' => 'https://www.linkedin.com/in/khairiyan-hidayat-ramadhan-a00189199/',
                'type' => $ketuaType,
                'caption' => 'Ketua Komisi 2',
                'department_id' => 10,
            ],

            [
                'name' => 'Rizky Nuansa Nanda Permana',
                'instagram_acc' => 'https://www.instagram.com/rizky.nuansa/',
                'linkedin_acc' => 'https://www.linkedin.com/in/rizky-nuansa-nanda-permana-170a1513b',
                'type' => $staffType,
                'caption' => 'Staff Komisi 2',
                'department_id' => 10,
            ],

        ];

        $komisi3Bpmti = [

            [
                'name' => 'Saifulloh Achmad Fajr',
                'instagram_acc' => 'https://www.instagram.com/saiful_fajr_/',
                'linkedin_acc' => '',
                'type' => $ketuaType,
                'caption' => 'Ketua Komisi 3',
                'department_id' => 11,
            ],

            [
                'name' => 'Rizky Nuansa Nanda Permana',
                'instagram_acc' => 'http://instagram.com/ais_farhan/',
                'linkedin_acc' => 'https://www.linkedin.com/in/aisfarhan/',
                'type' => $staffType,
                'caption' => 'Staff Komisi 3',
                'department_id' => 11,
            ],

        ];

        $advocacy = [

            [
                'name' => 'Aisyah Nurul Izza',
                'instagram_acc' => 'https://www.instagram.com/aisyahhnurl/',
                'linkedin_acc' => '',
                'type' => $ketuaType,
                'caption' => 'Ketua Departemen',
                'department_id' => 2,
            ],

            [
                'name' => 'Tsania Dzulkarnain',
                'instagram_acc' => 'https://www.instagram.com/tsnia.dzlkrnine/',
                'linkedin_acc' => 'https://www.linkedin.com/in/tsania-dzulkarnain-625772170/',
                'type' => $wakilType,
                'caption' => 'Wakil Ketua Departemen',
                'department_id' => 2,
            ],

            [
                'name' => 'Julina Larasati Pramudita',
                'instagram_acc' => 'https://www.instagram.com/julinalrs/',
                'linkedin_acc' => 'https://www.linkedin.com/in/julinalrs/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 2,
            ],

            [
                'name' => 'Anugrah Daffa Yanuardhana',
                'instagram_acc' => 'https://www.instagram.com/daffayanuardhana/',
                'linkedin_acc' => 'https://www.linkedin.com/in/DaffaYanuardhana/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 2,
            ],

            [
                'name' => 'Syafifa Alifah',
                'instagram_acc' => 'https://www.instagram.com/syafiralifah/',
                'linkedin_acc' => 'https://www.linkedin.com/in/syafira-alifah-986a80171',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 2,
            ],

            [
                'name' => 'Rifdah',
                'instagram_acc' => 'https://www.instagram.com/_rifdah28/',
                'linkedin_acc' => 'https://www.linkedin.com/in/rifdah-a0084a200',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 2,
            ],

            [
                'name' => 'Gilbert Aryaduta Pinem',
                'instagram_acc' => 'http://instagram.com/giarpin_',
                'linkedin_acc' => 'http://www.linkedin.com/in/GilbertPinem',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 2,
            ],

            [
                'name' => 'Salsabila Tjahya Kusuma Putri',
                'instagram_acc' => 'https://www.instagram.com/slsbilatjahya/',
                'linkedin_acc' => '',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 2,
            ],

            [
                'name' => 'Galang Fanoja',
                'instagram_acc' => 'https://www.instagram.com/galangfnj/',
                'linkedin_acc' => '',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 2,
            ],

            [
                'name' => 'Hesi Taka Maulana',
                'instagram_acc' => 'https://www.instagram.com/hesitakaa/',
                'linkedin_acc' => '',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 2,
            ],

            [
                'name' => 'Rezky Donny Putranto',
                'instagram_acc' => 'https://www.instagram.com/rezky_donny/',
                'linkedin_acc' => 'https://www.linkedin.com/in/rezky-donny-putranto-08a864200/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 2,
            ],

        ];

        $entre = [

            [
                'name' => 'Azzamuddien Hanifa',
                'instagram_acc' => 'https://www.instagram.com/azzamhfa/',
                'linkedin_acc' => '',
                'type' => $ketuaType,
                'caption' => 'Ketua Departemen',
                'department_id' => 6,
            ],

            [
                'name' => 'Dinar Fairus Salsabillah',
                'instagram_acc' => 'https://www.instagram.com/dinarfairuss/',
                'linkedin_acc' => '',
                'type' => $wakilType,
                'caption' => 'Wakil Ketua Departemen',
                'department_id' => 6,
            ],

            [
                'name' => 'Rheza Firmandha',
                'instagram_acc' => 'https://www.instagram.com/rheza.frmdha/',
                'linkedin_acc' => '',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 6,
            ],

            [
                'name' => 'Ricky Maulana Sani',
                'instagram_acc' => 'https://www.instagram.com/rickyms_27/',
                'linkedin_acc' => 'https://www.linkedin.com/in/ricky-maulana-61280921a',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 6,
            ],

            [
                'name' => 'Sofita Hidayatul Maghfiroh',
                'instagram_acc' => 'https://www.instagram.com/sofitahm/',
                'linkedin_acc' => 'http://linkedin.com/in/sofita-hidayatul-maghfiroh',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 6,
            ],

            [
                'name' => 'Imelda Fransisca',
                'instagram_acc' => 'https://www.instagram.com/imelda_sisca/',
                'linkedin_acc' => 'https://www.linkedin.com/in/imeldafransisca',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 6,
            ],

            [
                'name' => 'Muhammad Fauzan Hanif',
                'instagram_acc' => 'https://www.instagram.com/mfhanif_14/',
                'linkedin_acc' => '',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 6,
            ],

            [
                'name' => 'Lintang Bima Sakti Santoso',
                'instagram_acc' => 'https://www.instagram.com/lintangbimasakti/',
                'linkedin_acc' => 'https://www.linkedin.com/in/lintang-bima-sakti-santoso-838a45192/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 6,
            ],

            [
                'name' => 'Mikha Aziel Christian Sitepu',
                'instagram_acc' => 'https://www.instagram.com/mikhasitepu161101/',
                'linkedin_acc' => 'https://www.linkedin.com/in/mikha-sitepu-286671207',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 6,
            ],

        ];

        $hrd = [

            [
                'name' => 'Bayu Wicaksana Harimurti',
                'instagram_acc' => 'https://www.instagram.com/bayuwhx/',
                'linkedin_acc' => 'https://www.linkedin.com/in/bayuwhx/',
                'type' => $ketuaType,
                'caption' => 'Ketua Departemen',
                'department_id' => 1,
            ],

            [
                'name' => 'An Nur Jibril Awwalul M.',
                'instagram_acc' => 'https://www.instagram.com/daeng_early/',
                'linkedin_acc' => 'https://www.linkedin.com/in/annurjibril/',
                'type' => $wakilType,
                'caption' => 'Wakil Ketua Departemen',
                'department_id' => 1,
            ],

            [
                'name' => 'Vania Sahda Annabelle',
                'instagram_acc' => 'https://www.instagram.com/vaniasaa_/',
                'linkedin_acc' => 'https://www.linkedin.com/in/vania-sahda-annabelle-89141621a',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 1,
            ],

            [
                'name' => 'Ardhya Khrisna Chandra',
                'instagram_acc' => 'https://www.instagram.com/archndrx/',
                'linkedin_acc' => 'https://www.linkedin.com/in/ardhya-khrisna-chandra-a91a91201/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 1,
            ],

            [
                'name' => 'Raihan Winurputra',
                'instagram_acc' => 'https://www.instagram.com/raihan.wnrptr/',
                'linkedin_acc' => 'https://www.linkedin.com/in/raihan-winurputra-90ba2a219',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 1,
            ],

            [
                'name' => 'Raka Belva Raihansha',
                'instagram_acc' => 'https://www.instagram.com/rakablvv/',
                'linkedin_acc' => 'https://www.linkedin.com/in/raka-belva-14638b209/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 1,
            ],

            [
                'name' => 'Raihan Zahran Firdaus',
                'instagram_acc' => 'https://www.instagram.com/raihanzhrn/',
                'linkedin_acc' => 'https://www.linkedin.com/in/raihanzahran/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 1,
            ],

            [
                'name' => 'Catherine Vania',
                'instagram_acc' => 'https://www.instagram.com/catherinevaniaa/',
                'linkedin_acc' => 'https://www.linkedin.com/in/catherine-vania-78508b1ba',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 1,
            ],

            [
                'name' => 'Fausta Ega Aldisa',
                'instagram_acc' => 'https://www.instagram.com/faustaega/',
                'linkedin_acc' => 'https://www.linkedin.com/in/fausta-ega-aldisa-855283208',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 1,
            ],

        ];

        $rnc = [

            [
                'name' => 'Muhammad Magistra S.',
                'instagram_acc' => 'https://www.instagram.com/symagstra/',
                'linkedin_acc' => '',
                'type' => $ketuaType,
                'caption' => 'Ketua Biro',
                'department_id' => 5,
            ],

            [
                'name' => 'RE. Miracle Panjaitan',
                'instagram_acc' => 'https://www.instagram.com/iraremiracle/',
                'linkedin_acc' => 'https://www.linkedin.com/in/re-miracle-panjaitan-4103091b4/',
                'type' => $wakilType,
                'caption' => 'Kepala Bagian Relation',
                'department_id' => 5,
            ],

            [
                'name' => 'Shelvinia Tris S.',
                'instagram_acc' => 'https://www.instagram.com/shelviniatris/',
                'linkedin_acc' => 'https://id.linkedin.com/in/shelvinia-tris-91b5441a7',
                'type' => $wakilType,
                'caption' => 'Kepala Bagian Creative',
                'department_id' => 5,
            ],

            [
                'name' => 'Aufa Azmirania',
                'instagram_acc' => 'https://www.instagram.com/aufa.azmrn/',
                'linkedin_acc' => 'https://www.linkedin.com/in/aufa-azmirania-71a69621a/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 5,
            ],

            [
                'name' => 'Rifda Adrireswara Putri',
                'instagram_acc' => 'https://www.instagram.com/rifda.ap/',
                'linkedin_acc' => 'https://www.linkedin.com/in/rifda-adrireswara-9b9a87219',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 5,
            ],

            [
                'name' => 'Aurellia Ristivani Aisha Fitri',
                'instagram_acc' => 'https://www.instagram.com/aurell_ristivani/',
                'linkedin_acc' => 'https://www.linkedin.com/in/aurellia-ristivani-aisha-fitri-525912219',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 5,
            ],

            [
                'name' => 'Hendra Darmawan',
                'instagram_acc' => 'http://instagram.com/hendra_drmn',
                'linkedin_acc' => 'https://www.linkedin.com/in/raka-belva-14638b209/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 5,
            ],

            [
                'name' => 'Primula Juventauricula',
                'instagram_acc' => 'https://www.instagram.com/primulajuve/',
                'linkedin_acc' => '',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 5,
            ],

            [
                'name' => 'Angga Nasetya Caesara Putra',
                'instagram_acc' => 'https://www.instagram.com/11ancp/',
                'linkedin_acc' => 'https://www.linkedin.com/in/angga-nasetya-caesara-putra-b77a151bb/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 5,
            ],

            [
                'name' => 'Andira Mahendra Syahputra',
                'instagram_acc' => 'https://www.instagram.com/andiramahendra/',
                'linkedin_acc' => 'https://www.linkedin.com/in/andira-mahendra-aaaa141bb',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 5,
            ],

            [
                'name' => 'Furqan Maulana Pranata',
                'instagram_acc' => 'https://www.instagram.com/furqanmaulana26/',
                'linkedin_acc' => 'https://www.linkedin.com/in/furqan-maulana-4789721ba/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 5,
            ],

            [
                'name' => "Rif'atul ilmi",
                'instagram_acc' => 'https://www.instagram.com/rifatul_ilmi/',
                'linkedin_acc' => 'https://www.linkedin.com/in/rif-atul-ilmi-392b55158/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 5,
            ],

        ];

        $rnd = [

            [
                'name' => 'Fauzidan Iqbal Ghiffari',
                'instagram_acc' => 'https://www.instagram.com/fauzidanghiffari/',
                'linkedin_acc' => 'https://www.linkedin.com/in/fauzidan-iqbal-ghiffari/',
                'type' => $ketuaType,
                'caption' => 'Ketua Departemen',
                'department_id' => 4,
            ],

            [
                'name' => 'Della Akhidatul Izzah',
                'instagram_acc' => 'https://www.instagram.com/adellaiz/',
                'linkedin_acc' => 'https://www.linkedin.com/in/adellaiz/',
                'type' => $wakilType,
                'caption' => 'Kepala Bagian Research',
                'department_id' => 4,
            ],

            [
                'name' => 'Rahmadhani Lucky A.',
                'instagram_acc' => 'https://www.instagram.com/ramdanikurnia85/',
                'linkedin_acc' => 'https://www.linkedin.com/in/rahmadhani-lucky-a-2802789a/',
                'type' => $wakilType,
                'caption' => 'Kepala Bagian Development',
                'department_id' => 4,
            ],

            [
                'name' => 'Cantika Firalya',
                'instagram_acc' => 'https://www.instagram.com/cantikaf111/',
                'linkedin_acc' => 'https://www.linkedin.com/in/cantika-firalya/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 4,
            ],

            [
                'name' => 'Yerobal Gustaf Sekeon',
                'instagram_acc' => 'https://www.instagram.com/yerobal_2011/',
                'linkedin_acc' => 'https://www.linkedin.com/in/yerobal-gustaf-sekeon-31a3a1211',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 4,
            ],

            [
                'name' => 'Novel Bafagih',
                'instagram_acc' => 'https://www.instagram.com/novelbafagih9/',
                'linkedin_acc' => 'https://www.linkedin.com/in/novel-bafagih/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 4,
            ],

            [
                'name' => 'Nashihul Ibad Al Amin',
                'instagram_acc' => 'https://www.instagram.com/nasihulibadalamin',
                'linkedin_acc' => 'https://www.linkedin.com/in/ibad-alamin-8063481a1/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 4,
            ],

            [
                'name' => 'Irvan Rizki Nugraha',
                'instagram_acc' => 'https://www.instagram.com/irvanrizkin/',
                'linkedin_acc' => 'https://www.linkedin.com/in/irvan-rizki-n/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 4,
            ],

            [
                'name' => 'Mohammad Ali Rafli',
                'instagram_acc' => 'https://www.instagram.com/alirafli_/',
                'linkedin_acc' => 'https://www.linkedin.com/in/mohammad-ali-rafli-9a7a761bb/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 4,
            ],

            [
                'name' => 'Rakhmad Giffari Nurfadhilah',
                'instagram_acc' => 'https://www.instagram.com/fadhilmail/',
                'linkedin_acc' => 'https://www.linkedin.com/in/rakhmad-giffari-nurfadhilah/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 4,
            ],

        ];

        $se = [

            [
                'name' => 'Muhammad Rizqullah H.',
                'instagram_acc' => 'https://www.instagram.com/rizqullah.haditama/',
                'linkedin_acc' => 'https://www.linkedin.com/in/muhammad-rizqullah-haditama-a7869121a/',
                'type' => $ketuaType,
                'caption' => 'Ketua Departemen',
                'department_id' => 3,
            ],

            [
                'name' => 'Audima Oktasena',
                'instagram_acc' => 'https://www.instagram.com/audima31/',
                'linkedin_acc' => 'https://www.linkedin.com/in/audima-oktasena-9188881b8/',
                'type' => $wakilType,
                'caption' => 'Wakil Ketua Departemen',
                'department_id' => 3,
            ],

            [
                'name' => 'Maya Setiana	',
                'instagram_acc' => 'https://www.instagram.com/mmays__/',
                'linkedin_acc' => 'https://www.linkedin.com/in/maya-setiana-90729b21a/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 3,
            ],

            [
                'name' => "A'inun Sukmawati",
                'instagram_acc' => 'https://www.instagram.com/ainunsw_/',
                'linkedin_acc' => 'https://www.linkedin.com/in/a-inun-sukmawati-94073321a',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 3,
            ],

            [
                'name' => 'Ferry Setiawan',
                'instagram_acc' => 'https://www.instagram.com/ferrryyyyys/',
                'linkedin_acc' => 'https://www.linkedin.com/in/ferry-setiawan-a860911aa/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 3,
            ],

            [
                'name' => 'Robiata Tsania Salsabila Aditya Putri',
                'instagram_acc' => 'https://www.instagram.com/rtsaniaa_/',
                'linkedin_acc' => 'https://www.linkedin.com/in/robiata-tsania-salsabila-729077219/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 3,
            ],

            [
                'name' => 'Gheri Jelita',
                'instagram_acc' => 'https://www.instagram.com/gherijelitaaa/',
                'linkedin_acc' => 'https://www.linkedin.com/in/gheri-jelita-76bb0b206',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 3,
            ],

            [
                'name' => 'Shinta Dewi Putri Wibowo',
                'instagram_acc' => 'https://www.instagram.com/putribow/',
                'linkedin_acc' => 'https://www.linkedin.com/in/putri-wibowo-6370681b7/',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 3,
            ],

            [
                'name' => 'Made Yoga Adhitya',
                'instagram_acc' => 'https://www.instagram.com/madeyogaadhitya/',
                'linkedin_acc' => '',
                'type' => $staffType,
                'caption' => 'Staff',
                'department_id' => 3,
            ],

        ];

        /**
         * Inserting data
         */
        Anggotum::insert($anggotaEmtiNon);
        Anggotum::insert($sekben);
        Anggotum::insert($internal);
        Anggotum::insert($anggotaBpmtiNon);
        Anggotum::insert($komisi1Bpmti);
        Anggotum::insert($komisi2Bpmti);
        Anggotum::insert($komisi3Bpmti);
        Anggotum::insert($advocacy);
        Anggotum::insert($entre);
        Anggotum::insert($hrd);
        Anggotum::insert($rnc);
        Anggotum::insert($rnd);
        Anggotum::insert($se);
    }
}
