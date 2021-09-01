@extends('layouts.app')

@section('title', 'Profile Department')

@section('content')
<div class="container-fluid">
    <section class="department__top row">
        <div class="col-xl-6">
            <div class="department__top__divisi">
                <div class="container" data-aos="fade-right">
                    <div class="list-group department__top__list-group" id="list-tab" role="tablist">
                        <a class="list-group-item department__top__list-group__item list-group-item-action active button-group-trigger" id="list-emti-list" data-bs-toggle="list" href="#list-emti" role="tab" aria-controls="list-emti" data-group="emti">EMTI</a>
                        <a class="list-group-item department__top__list-group__item list-group-item-action button-group-trigger" id="list-bpmti-list" data-bs-toggle="list" href="#list-bpmti" role="tab" aria-controls="list-bpmti" data-group="bpmti">BPMTI</a>
                    </div>
                    {{-- Include Tab Panes --}}
                    @include('department.tab_panes', [ "group" => $group, "subGroup" => $subGroup ])
                </div>
            </div>
        </div>
        <div class="col-xl-6" data-aos="fade-left">
            {{-- Contoh dari Non-Departemen KBMTI --}}
            {{-- Non Dept --}}
            @include('department.detail', [ "deptName" => $arrayDept['kahim_wakahim']->initial ?? "", "group" => "emti", "detailCaption" => $arrayDept['kahim_wakahim']->description ?? "", "imageUrl" => ($arrayDept["kahim_wakahim"]->getMediaPath()->imageUrl ?? "") , "isVisible" => $arrayDept['kahim_wakahim']->isVisible ?? false, ])
            {{-- Sekben --}}
            @include('department.detail', [ "deptName" => $arrayDept['sekben']->initial ?? "", "group" => "emti", "detailCaption" => $arrayDept['sekben']->description ?? "", "imageUrl" => ($arrayDept["sekben"]->getMediaPath()->imageUrl ?? ""), "isVisible" => $arrayDept['sekben']->isVisible ?? false, ])
            {{-- Internal --}}
            @include('department.detail', [ "deptName" => $arrayDept['internal']->initial ?? "", "group" => "emti", "detailCaption" => $arrayDept['internal']->description ?? "", "imageUrl" => ($arrayDept["internal"]->getMediaPath()->imageUrl ?? ""), "isVisible" => $arrayDept['internal']->isVisible ?? false, ])
            {{-- HRD --}}
            @include('department.detail', [ "deptName" => $arrayDept['hrd']->initial ?? "", "group" => "emti", "detailCaption" => $arrayDept['hrd']->description ?? "", "imageUrl" => ($arrayDept["hrd"]->getMediaPath()->imageUrl ?? ""), "isVisible" => $arrayDept['hrd']->isVisible ?? false, ])
            {{-- Advo --}}
            @include('department.detail', [ "deptName" => $arrayDept['advo']->initial ?? "", "group" => "emti", "detailCaption" => $arrayDept['advo']->description ?? "", "imageUrl" => ($arrayDept["advo"]->getMediaPath()->imageUrl ?? ""), "isVisible" => $arrayDept['advo']->isVisible ?? false, ])
            {{-- SE --}}
            @include('department.detail', [ "deptName" => $arrayDept['se']->initial ?? "", "group" => "emti", "detailCaption" => $arrayDept['se']->description ?? "", "imageUrl" => ($arrayDept["se"]->getMediaPath()->imageUrl ?? ""), "isVisible" => $arrayDept['se']->isVisible ?? false, ])
            {{-- RnD --}}
            @include('department.detail', [ "deptName" => $arrayDept['rnd']->initial ?? "", "group" => "emti", "detailCaption" => $arrayDept['rnd']->description ?? "", "imageUrl" => ($arrayDept["rnd"]->getMediaPath()->imageUrl ?? ""), "isVisible" => $arrayDept['rnd']->isVisible ?? false, ])
            {{-- RnC --}}
            @include('department.detail', [ "deptName" => $arrayDept['rnc']->initial ?? "", "group" => "emti", "detailCaption" => $arrayDept['rnc']->description ?? "", "imageUrl" => ($arrayDept["rnc"]->getMediaPath()->imageUrl ?? ""), "isVisible" => $arrayDept['rnc']->isVisible ?? false, ])
            {{-- Entre --}}
            @include('department.detail', [ "deptName" => $arrayDept['entre']->initial ?? "", "group" => "emti", "detailCaption" => $arrayDept['entre']->description ?? "", "imageUrl" => ($arrayDept["entre"]->getMediaPath()->imageUrl ?? ""), "isVisible" => $arrayDept['entre']->isVisible ?? false, ])
            {{-- BPMTI --}}
            {{-- Non Komisi --}}
            @include('department.detail', [ "deptName" => $arrayDept["nonKomisi"]->initial ?? "", "group" => "bpmti", "detailCaption" => $arrayDept["nonKomisi"]->description ?? "", "isVisible" => $arrayDept['nonKomisi']->isVisible ?? false, ])
            {{-- Komisi 1 --}}
            @include('department.detail-bpmti', [ "deptName" => $arrayDept['komisi1']->initial ?? "", "group" => "bpmti", "detailCaption" => $arrayDept['komisi1']->description ?? "", "isVisible" => $arrayDept['komisi1']->isVisible ?? false, ])
            {{-- Komisi 2 --}}
            @include('department.detail-bpmti', [ "deptName" => $arrayDept['komisi2']->initial ?? "", "group" => "bpmti", "detailCaption" => $arrayDept['komisi2']->description ?? "", "isVisible" => $arrayDept['komisi2']->isVisible ?? false,])
            {{-- Komisi 3 --}}
            @include('department.detail-bpmti', [ "deptName" => $arrayDept['komisi3']->initial ?? "", "group" => "bpmti", "detailCaption" => $arrayDept['komisi3']->description ?? "", "isVisible" => $arrayDept['komisi3']->isVisible ?? false, ])
        </div>
</section>
</div>

    {{-- EMTI --}}
    {{-- Non-Dept --}}
    @include('department.contents.kahim-wakahim_emti', [ "deptName" => $arrayDept['kahim_wakahim']->initial ?? "", 'anggotas' => $arrayDept["kahim_wakahim"]->anggotas ?? [], 'group' => 'emti' , "isVisible" => $arrayDept['kahim_wakahim']->isVisible ?? false, ])
    {{-- Sekben --}}
    @include('department.contents.base_anggota_departemen', [ "deptName" => $arrayDept['sekben']->initial ?? "", 'anggotas' => $arrayDept["sekben"]->anggotas ?? [], 'group'=> 'emti', "isVisible" => $arrayDept['sekben']->isVisible ?? false,])
    {{-- Intenral --}}
    @include('department.contents.internal_emti', [ "deptName" => $arrayDept['internal']->initial ?? "", 'anggotas' => $arrayDept["internal"]->anggotas ?? [], 'group'=> 'emti', "isVisible" => $arrayDept['internal']->isVisible ?? false,])
    {{-- HRD --}}
    @include('department.contents.base_anggota_departemen', [ "deptName" => $arrayDept['hrd']->initial ?? "", 'anggotas' => $arrayDept["hrd"]->anggotas ?? [], 'group'=> 'emti', "isVisible" => $arrayDept['hrd']->isVisible ?? false,])
    {{-- Advo --}}
    @include('department.contents.base_anggota_departemen', [ "deptName" => $arrayDept['advo']->initial ?? "", 'anggotas' => $arrayDept["advo"]->anggotas ?? [], 'group'=> 'emti', "isVisible" => $arrayDept['advo']->isVisible ?? false, ])
    {{-- SE --}}
    @include('department.contents.base_anggota_departemen', [ "deptName" => $arrayDept['se']->initial ?? "", 'anggotas' => $arrayDept["se"]->anggotas ?? [], 'group'=> 'emti', "isVisible" => $arrayDept['se']->isVisible ?? false, ])
    {{-- RnD --}}
    @include('department.contents.base_anggota_departemen', [ "deptName" => $arrayDept['rnd']->initial ?? "", 'anggotas' => $arrayDept["rnd"]->anggotas ?? [], 'group'=> 'emti', "isVisible" => $arrayDept['rnd']->isVisible ?? false, ])
    {{-- RnC --}}
    @include('department.contents.base_anggota_departemen', [ "deptName" => $arrayDept['rnc']->initial ?? "", 'anggotas' => $arrayDept["rnc"]->anggotas ?? [], 'group'=> 'emti', "isVisible" => $arrayDept['rnc']->isVisible ?? false, ])
    {{-- Entre --}}
    @include('department.contents.base_anggota_departemen', [ "deptName" => $arrayDept['entre']->initial ?? "", 'anggotas' => $arrayDept["entre"]->anggotas ?? [], 'group'=> 'emti', "isVisible" => $arrayDept['entre']->isVisible ?? false, ])

    {{-- BPMTI --}}
    {{-- Non Komisi --}}
    @include('department.contents.koordinator-sekjen_bpmti', ["deptName" => $arrayDept["nonKomisi"]->initial ?? "", "anggotas" => $arrayDept["nonKomisi"]->anggotas ?? [], 'group' => 'bpmti', "isVisible" => $arrayDept['nonKomisi']->isVisible ?? false,])
    {{-- Komisi 1 --}}
    @include('department.contents.base_anggota_departemen', ["deptName" => $arrayDept["komisi1"]->initial ?? "", "anggotas" => $arrayDept["komisi1"]->anggotas ?? [], 'group' => 'bpmti', "isVisible" => $arrayDept['komisi1']->isVisible ?? false,])
    {{-- Komisi 2 --}}
    @include('department.contents.base_anggota_departemen', ["deptName" => $arrayDept["komisi2"]->initial ?? "", "anggotas" => $arrayDept["komisi2"]->anggotas ?? [], 'group' => 'bpmti', "isVisible" => $arrayDept['komisi2']->isVisible ?? false,])
    {{-- Komisi 3 --}}
    @include('department.contents.base_anggota_departemen', ["deptName" => $arrayDept["komisi3"]->initial ?? "", "anggotas" => $arrayDept["komisi3"]->anggotas ?? [], 'group' => 'bpmti', "isVisible" => $arrayDept['komisi3']->isVisible ?? false,])
@endsection

@section('custom-script')
    <script>

        // Handle Functions

        // Function BPMTI x EMTI
        var buttonGroupTrigger = function () {
            let group = $(this).data('group');
            let target = "toggle-group-" + group
            let anotherClass = "toggle-group-" + (group == "emti" ? "bpmti" : "emti")

            // Hide the other class
            $("." + anotherClass).hide();
            // Show the target class
            $("." + target).show();

        }

        var subGroupTrigger = function () {
            // console.log("HELLO?");
            let group = $(this).data('group')
            let subGroup = $(this).data('subgroup')
            let target = "toggle-subgroup-" + subGroup
            let idParentThis = "button-subgroup-trigger-" + subGroup
            let anotherClass = "toggle-group-" + group

            // Hide All Non Corresponding Class
            $("." + anotherClass).hide()
            // Show the target class
            $("." + target).show()
            // Deactivate the item
            $('.button-subgroup-trigger-parent').removeClass("active")
            // Activate the item
            $("#" + idParentThis).toggleClass("active")
        }

        // Deactivate All Other Department
        var buttonEmtiTrigger = function () {
            // Hide All Item Group
            $('.toggle-group-emti').hide();
            // Show Non-Dept
            $(".toggle-subgroup-Kahim_dan_Wakahim").show();
            // Activate the Non-Department
            // Deactivate the item
            $('.button-subgroup-trigger-parent').removeClass("active")
            // Activate the item
            $("#button-subgroup-trigger-Kahim_dan_Wakahim").toggleClass("active")
        }

        var buttonBpmtiTrigger = function () {
            // Hide All Item Group
            $('.toggle-group-bpmti').hide();
            // Show Non-Dept
            $(".toggle-subgroup-BPMTI").show();
            // Deactivate the item
            $('.button-subgroup-trigger-parent').removeClass("active")
            // Activate the item
            $("#button-subgroup-trigger-Non-Komisi").toggleClass("active")
        }

        // Listeners
        $(".button-group-trigger").on('click', buttonGroupTrigger);
        $(".button-subgroup-trigger").on('click', subGroupTrigger);
        $("#list-emti-list").on('click', buttonEmtiTrigger);
        $("#list-bpmti-list").on('click', buttonBpmtiTrigger)
    </script>
@endsection