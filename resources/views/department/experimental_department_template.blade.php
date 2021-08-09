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
            @include('department.detail', [ "deptName" => "Non-Dept", "group" => "emti", "detailCaption" => "Ini nanti non-dept" ,"isVisible" => true ])
            {{-- HRD --}}
            @include('department.detail', [ "deptName" => "HRD", "group" => "emti", "detailCaption" => "Ini nanti HRD" ])
            {{-- Advo --}}
            @include('department.detail', [ "deptName" => "Advo", "group" => "emti", "detailCaption" => "Ini nanti Advo" ])
            {{-- SE --}}
            @include('department.detail', [ "deptName" => "SE", "group" => "emti", "detailCaption" => "Ini nanti SE" ])
            {{-- RnD --}}
            @include('department.detail', [ "deptName" => "RnD", "group" => "emti", "detailCaption" => "Ini nanti RnD" ])
            {{-- RnC --}}
            @include('department.detail', [ "deptName" => "RnC", "group" => "emti", "detailCaption" => "Ini nanti RnC" ])
            {{-- Entre --}}
            @include('department.detail', [ "deptName" => "Entre", "group" => "emti", "detailCaption" => "Ini nanti Entre" ])
            {{-- BPMTI --}}
            <div class="department__item-toggle__inactive fade show toggle-group-bpmti">
                <div class="department__top__detail">
                    <div class="container text-center">
                        <img src="{{ asset('img/blank-image.svg') }}" alt="">
                        <div class="department__top__detail__title d-flex justify-content-center">
                            <div class="department__top__detail__title__border"></div>
                            <span>Ini BPMTI</span>
                        </div>
                        <div class="department__top__detail__desc">
                            Ini nantinya adalah BPMTI
                        </div>
                        <div class="department__top__detail__scroll text-center">
                            <span>Scroll</span>
                            <div class="d-flex justify-content-center">
                                <div class="department__top__detail__scroll__border"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
</div>

{{-- KEY --}}
{{-- Non-Dept --}}
@include('department.content_emti', [ "deptName" => "Non-Dept", "isVisible" => true ])
{{-- HRD --}}
@include('department.content_emti', [ "deptName" => "HRD"])
{{-- Advo --}}
@include('department.content_emti', [ "deptName" => "Advo" ]);
{{-- SE --}}
@include('department.content_emti', [ "deptName" => "SE" ]);
{{-- RnD --}}
@include('department.content_emti', [ "deptName" => "RnD" ]);
{{-- RnC --}}
@include('department.content_emti', [ "deptName" => "RnC" ]);
{{-- Entre --}}
@include('department.content_emti', [ "deptName" => "Entre" ]);
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

        }

        // Listeners
        $(".button-group-trigger").on('click', buttonGroupTrigger);
        $(".button-subgroup-trigger").on('click', subGroupTrigger);
        $("#list-emti-list").on('click', buttonEmtiTrigger);
    </script>
@endsection