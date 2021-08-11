@extends('layouts.app')

@section('title', 'Profile Department')

@section('content')
<div class="container-fluid">
    <section class="department__top row">
        <div class="col-xl-6">
            <div class="department__top__divisi">
                <div class="container">
                    <div class="list-group department__top__list-group" id="list-tab" role="tablist">
                        <a class="list-group-item department__top__list-group__item list-group-item-action active button-group-trigger" id="list-emti-list" data-bs-toggle="list" href="#list-emti" role="tab" aria-controls="list-emti" data-group="emti">EMTI</a>
                        <a class="list-group-item department__top__list-group__item list-group-item-action button-group-trigger" id="list-bpmti-list" data-bs-toggle="list" href="#list-bpmti" role="tab" aria-controls="list-bpmti" data-group="bpmti">BPMTI</a>
                    </div>
                    {{-- Include Tab Panes --}}
                    @include('department.department_tab_panes')
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            {{-- Contoh dari Non-Departemen KBMTI --}}
            {{-- Non Dept --}}
            @include('department.detail', [ "deptName" => $arrayDept['nonDept']->initial ?? "", "group" => "emti", "detailCaption" => $arrayDept['nonDept']->description ?? "", "imageUrl" => ($arrayDept["nonDept"]->logo->getUrl() ?? "") ,"isVisible" => true ])
            {{-- HRD --}}
            @include('department.detail', [ "deptName" => $arrayDept['hrd']->initial ?? "", "group" => "emti", "detailCaption" => $arrayDept['hrd']->description ?? "", "imageUrl" => ($arrayDept["hrd"]->logo->getUrl() ?? "") ])
            {{-- Advo --}}
            @include('department.detail', [ "deptName" => $arrayDept['advo']->initial ?? "", "group" => "emti", "detailCaption" => $arrayDept['advo']->description ?? "", "imageUrl" => ($arrayDept["advo"]->logo->getUrl() ?? "") ])
            {{-- SE --}}
            @include('department.detail', [ "deptName" => $arrayDept['se']->initial ?? "", "group" => "emti", "detailCaption" => $arrayDept['se']->description ?? "", "imageUrl" => ($arrayDept["se"]->logo->getUrl() ?? "") ])
            {{-- RnD --}}
            @include('department.detail', [ "deptName" => $arrayDept['rnd']->initial ?? "", "group" => "emti", "detailCaption" => $arrayDept['rnd']->description ?? "", "imageUrl" => ($arrayDept["rnd"]->logo->getUrl() ?? "") ])
            {{-- RnC --}}
            @include('department.detail', [ "deptName" => $arrayDept['rnc']->initial ?? "", "group" => "emti", "detailCaption" => $arrayDept['rnc']->description ?? "", "imageUrl" => ($arrayDept["rnc"]->logo->getUrl() ?? "") ])
            {{-- Entre --}}
            @include('department.detail', [ "deptName" => $arrayDept['entre']->initial ?? "", "group" => "emti", "detailCaption" => $arrayDept['entre']->description ?? "", "imageUrl" => ($arrayDept["entre"]->logo->getUrl() ?? "") ])
            {{-- BPMTI --}}
            {{-- Non Komisi --}}
            @include('department.detail-bpmti', [ "deptName" => "Non-Komisi", "group" => "bpmti", "detailCaption" => "BPMTI Adalah ....", ])
            {{-- Komisi 1 --}}
            @include('department.detail', [ "deptName" => $arrayDept['komisi1']->initial ?? "", "group" => "bpmti", "detailCaption" => $arrayDept['komisi1']->description ?? "", ])
            {{-- Komisi 2 --}}
            @include('department.detail', [ "deptName" => $arrayDept['komisi2']->initial ?? "", "group" => "bpmti", "detailCaption" => $arrayDept['komisi2']->description ?? "", ])
            {{-- Komisi 3 --}}
            @include('department.detail', [ "deptName" => $arrayDept['komisi3']->initial ?? "", "group" => "bpmti", "detailCaption" => $arrayDept['komisi3']->description ?? "", ])
        </div>
</section>
</div>

    {{-- EMTI --}}
    {{-- Non-Dept --}}
    @include('department.content_anggota', [ "deptName" => $arrayDept['nonDept']->initial ?? "", 'anggotas' => $arrayDept["nonDept"]->anggotas ?? [], 'group' => 'emti' ,"isVisible" => true ])
    {{-- HRD --}}
    @include('department.content_anggota', [ "deptName" => $arrayDept['hrd']->initial ?? "", 'anggotas' => $arrayDept["hrd"]->anggotas ?? [], 'group'=> 'emti'])
    {{-- Advo --}}
    @include('department.content_anggota', [ "deptName" => $arrayDept['advo']->initial ?? "", 'anggotas' => $arrayDept["advo"]->anggotas ?? [], 'group'=> 'emti' ]);
    {{-- SE --}}
    @include('department.content_anggota', [ "deptName" => $arrayDept['se']->initial ?? "", 'anggotas' => $arrayDept["se"]->anggotas ?? [], 'group'=> 'emti' ]);
    {{-- RnD --}}
    @include('department.content_anggota', [ "deptName" => $arrayDept['rnd']->initial ?? "", 'anggotas' => $arrayDept["rnd"]->anggotas ?? [], 'group'=> 'emti' ]);
    {{-- RnC --}}
    @include('department.content_anggota', [ "deptName" => $arrayDept['rnc']->initial ?? "", 'anggotas' => $arrayDept["rnc"]->anggotas ?? [], 'group'=> 'emti' ]);
    {{-- Entre --}}
    @include('department.content_anggota', [ "deptName" => $arrayDept['entre']->initial ?? "", 'anggotas' => $arrayDept["entre"]->anggotas ?? [], 'group'=> 'emti' ]);

    {{-- BPMTI --}}
    {{-- Non Komisi --}}
    @include('department.content_anggota', ["deptName" => $arrayDept["nonKomisi"]->initial ?? "", "anggotas" => $arrayDept["nonKomisi"]->anggotas ?? [], 'group' => 'bpmti'])
    {{-- Komisi 1 --}}
    @include('department.content_anggota', ["deptName" => $arrayDept["komisi1"]->initial ?? "", "anggotas" => $arrayDept["komisi1"]->anggotas ?? [], 'group' => 'bpmti'])
    {{-- Komisi 2 --}}
    @include('department.content_anggota', ["deptName" => $arrayDept["komisi2"]->initial ?? "", "anggotas" => $arrayDept["komisi2"]->anggotas ?? [], 'group' => 'bpmti'])
    {{-- Komisi 3 --}}
    @include('department.content_anggota', ["deptName" => $arrayDept["komisi3"]->initial ?? "", "anggotas" => $arrayDept["komisi3"]->anggotas ?? [], 'group' => 'bpmti'])
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
            $(".toggle-subgroup-Non-Dept").show();
            // Activate the Non-Department
            // Deactivate the item
            $('.button-subgroup-trigger-parent').removeClass("active")
            // Activate the item
            $("#button-subgroup-trigger-Non-Dept").toggleClass("active")
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