<div style="width: 300px;" class="mx-auto mt-5">
    <div style="background-color: #F5F5F5;" class="p-4 rounded">
        <div class="row">
            <div class="col-md-12">
                <img class="rounded-circle mt-3" src='{{ ($source ?? false) ? $source : asset("img/anon.png") }}' style="width: 200px;" alt="">
            </div>
        </div>
        <h5 class="mt-4" style="font-family: Regis;">{{ $text }}</h5>
    </div>
    <button
    id="{{ $buttonId }}"
    class="border rounded-pill fs-5 p-3 text-white mt-4"
    style="background-color: #951C21; width:216px; font-family: ITC Cheltenham Std"
    >Pilih</button>
</div>
