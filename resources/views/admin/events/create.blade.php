@extends('layouts.admin.admin')
@section('content')

{{-- Custom PHP Variables --}}
@php
    $arrayOfFieldResponses = [
        [
            "label" => "NIM Pendaftar",
            "value" => "NIM",
            "htmlId" => "pendaftarNim",
        ],
        [
            "label" => "Nama Pendaftar",
            "value" => "Nama",
            "htmlId" => "pendaftarNama",
        ],
        [
            "label" => "Email Peserta",
            "value" => "Email",
            "htmlId" => "pendaftarEmail",
        ],
        [
            "label" => "Id Line Pendaftar",
            "value" => "Id Line",
            "htmlId" => "pendaftarLineId",
        ],
        [
            "label" => "No. Telpon Peserta",
            "value" => "Nomor Telepon",
            "htmlId" => "pendaftarPhone",
        ],
        [
            "label" => "Angkatan Pendaftar",
            "value" => "Angkatan",
            "htmlId" => "pesertaAngkatan",
        ],
    ];
@endphp

<div class="card">
    <div class="card-header">
        <h4>
            {{ trans('global.create') }} {{ trans('cruds.event.title_singular') }}
        </h4>
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.events.store") }}" enctype="multipart/form-data">
            @csrf
            {{-- Nama nanti akan dijadikan sebagai link tautan --}}
            <div class="form-group">
                <label class="required" for="name">{{ trans('cruds.event.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.name_helper') }}</span>
            </div>
            {{-- Label dari Event Pendaftaran --}}
            <div class="form-group">
                <label for="label">{{ trans('cruds.event.fields.label') }}</label>
                <input class="form-control {{ $errors->has('label') ? 'is-invalid' : '' }}" type="text" name="label" id="label" value="{{ old('label', '') }}">
                @if($errors->has('label'))
                    <span class="text-danger">{{ $errors->first('label') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.label_helper') }}</span>
            </div>
            {{-- Description dari event pendaftaran --}}
            <div class="form-group">
                <label for="description">{{ trans('cruds.event.fields.description') }}</label>
                <input class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" type="text" name="description" id="description" value="{{ old('description', '') }}">
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.description_helper') }}</span>
            </div>
            {{-- Event type dari pendaftaran --}}
            {{-- Perlu triggering agar ada fields --}}
            <div class="form-group">
                <label class="required">{{ trans('cruds.event.fields.event_type') }}</label>
                <select class="form-control {{ $errors->has('event_type') ? 'is-invalid' : '' }}" name="event_type" id="event_type" required>
                    <option value disabled {{ old('event_type', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                    @foreach(App\Models\Event::EVENT_TYPE_SELECT as $key => $label)
                        <option value="{{ $key }}" {{ old('event_type', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                    @endforeach
                </select>
                @if($errors->has('event_type'))
                    <span class="text-danger">{{ $errors->first('event_type') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.event_type_helper') }}</span>
            </div>
            {{-- Expired date digunakan untuk membatasi kapan event ini menjadi expired --}}
            <div class="form-group">
                <label class="required" for="expired_date">{{ trans('cruds.event.fields.expired_date') }}</label>
                <input class="form-control date {{ $errors->has('expired_date') ? 'is-invalid' : '' }}" type="text" name="expired_date" id="expired_date" value="{{ old('expired_date') }}" required>
                @if($errors->has('expired_date'))
                    <span class="text-danger">{{ $errors->first('expired_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.expired_date_helper') }}</span>
            </div>
            {{-- Host atau orang yang menjadi host --}}
            <div class="form-group">
                <label for="user_id">{{ trans('cruds.event.fields.user') }}</label>
                <select class="form-control select2 {{ $errors->has('user') ? 'is-invalid' : '' }}" name="user_id" id="user_id">
                    {{-- Your role --}}
                    <option value="{{ Auth::user()->id }}" {{ old('user_id') == Auth::user()->id ? 'selected' : '' }}>{{Auth::user()->name}}</option>
                    {{-- Role --}}
                    @can('master_host_permission')
                        @foreach($users as $id => $entry)
                            <option value="{{ $id }}" {{ old('user_id') == $id ? 'selected' : '' }}>{{ $entry }}</option>
                        @endforeach    
                    @endcan
                </select>
                @if($errors->has('user'))
                    <span class="text-danger">{{ $errors->first('user') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.event.fields.user_helper') }}</span>
            </div>
            {{-- Field yang diiperlukan --}}
            <label>Daftar-Daftar Field yang Diperlukan:</label>
            <div class="form-group">
                <div class="col-6" id="fieldsSlider">
                    {{-- Row for slider --}}
                    <div class="row">
                        @foreach ($arrayOfFieldResponses as $fieldResponse)
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="{{ $fieldResponse["htmlId"] }}" value="{{ $fieldResponse["value"] }}" name="field[]" checked >
                                        <label class="custom-control-label" for="{{ $fieldResponse["htmlId"] }}">{{ $fieldResponse["label"] }}</label>
                                    </div>
                                </div>
                            </div>    
                        @endforeach
                    </div>
                </div>
                <div class="col-12">
                    <label>Tambahan</label>
                    <div class="row" id="addFieldAppend">
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-info btn-block" id="addFieldButton">
                            Tambahkan Field Lainnya
                            <i class="fa fa-plus-circle ml-2"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-danger" type="submit">
                        {{ trans('global.save') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
@parent
<script>
    let index = 0;
    $(document).ready(function() {
            // Listener for Addfieldbutton
            $("#addFieldButton").click(function(event) {
                event.preventDefault();
                $("#addFieldAppend").append(appendElement(index));
                document.getElementById(`removeSign-${index}`).addEventListener('click', removeFunction);
                index++;
            });

            // option-event handler
            $("#event_type").change(function(event) {
                let value = this.value
                let element = document.getElementById(`appendKepanitiaan`);
                if ((value == 'OPEN_TENDER' || value == 'KEPANITIAAN')) {
                    // Refresh
                    console.log(value);
                    if (element) {
                        element.remove();
                    }
                    let arrayAppendElement = [
                        {
                            label: "Pengalaman Keogranisasian",
                            value: "Organisasi",
                            htmlId: "pendaftarOrganisasi"
                        },
                        {
                            label: "Pengalaman Kepanitiaan",
                            value: "Kepanitiaan",
                            htmlId: "pendaftarKepanitiaan"
                        },
                        {
                            label: "Inovasi",
                            value: "Inovasi",
                            htmlId: "pendaftarInovasi"
                        }
                    ];

                    if (value == 'KEPANITIAAN') {
                        arrayAppendElement.push({
                            label: "Analisis SWOT",
                            value: "Swot",
                            htmlId: "pendaftarSwot"
                        });
                    }
                    $append = "<div id='appendKepanitiaan' class='row'>";
                    arrayAppendElement.forEach(element => {
                        $append += appendOptionEvent(element);
                    });
                    $append += "</div>"
                    $("#fieldsSlider").append($append);
                } else {
                    element.remove();
                }
            });

            // Helper dari #option-event on change
            function appendOptionEvent({ label, value, htmlId }) {
                let returnValue = "<div class='col-md-6'>" +
                                "<div class='form-group'>" +
                                    "<div class='custom-control custom-switch'>" +
                                        `<input type='checkbox' class='custom-control-input' id='peserta${htmlId}' value='${value}' name='field[]' checked>` +
                                        `<label class='custom-control-label' for='peserta${htmlId}'>${label}</label>` +
                                    "</div>" +
                                "</div>" +
                            "</div>";
                return returnValue;
            }

            // Helper dari #addFieldButton onClick (adder)
            function appendElement(numerical){
                $org = `<div class='form-group col-md-12' id='field-${numerical}'>` +
                "<div class='row'>" +
                "<div class='col-md-6'>" +
                "<input type='text' name='fieldNames[]' class='form-control' placeholder='Nama Field' required>" +
                "</div>" +
                "<div class='col-md-5'>" +
                "<select class='custom-select' name='fieldTypes[]' required>" +
                "<option selected>Open this select menu</option>" +
                "<option value='text'>Text</option>" +
                "<option value='number'>Number</option>" +
                "<option value='email'>Email</option>" +
                "<option value='password'>Password</option>" +
                "<option value='date'>Date</option>" +
                "<option value='textarea'>Textarea</option>" +
                "</select>" +
                "</div>" +
                "<div class='col-md-1'>" +
                `<button class='btn btn-warning btn-block' id='removeSign-${numerical}'>` +
                    "<i class='fas fa-times-circle'></i>" +
                "</button>" +
                "</div>" +
                "</div>" +
                "</div>";
                return $org;
            }

            // listener dari remover fieldbutton
            function removeFunction(event){
                event.preventDefault();
                if (event.target !== this) {
                    return;
                }
                let removeSignId = event.target.id
                let number = removeSignId.split("-")[1];
                let element = document.getElementById(`field-${number}`);
                element.remove();
                index--;
            } 
        });
    </script>    
@endsection