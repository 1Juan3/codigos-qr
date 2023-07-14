<x-layout titulo="Vincular qrs">
    <x-slot name="css"><link rel="stylesheet" href="{{ asset('css/vincular.css') }}"> <x-slot>
    <section >
        <form action="{{ route('subir-excel') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-group mb-3" style="width: 100%">
                <input type="file" class="form-control" name="archivo_excel" >
              </div>
            <button type="submit" class="btn btn-outline-success">Subir Archivo</button>
        </form>
        <form action="{{ route('descargar-excel') }}" method="POST" >
            @csrf
            <div class="form-floating mb-3">
                <input type="text" class="form-control" placeholder="Nombre Grupo" name="grupo" style="width: 200px;">
                <label>Nombre del evento</label>
            </div> 
            <button class="btn btn-outline-info" href="{{ route('descargar-excel') }}">descargar información</button>
        </form>
        <form action="{{ route('limpiar') }}" method="POST" >
            @csrf
            <button class="button" style="width: 200px;">
                <svg class="svg-icon" width="24" viewBox="0 0 24 24" height="24" fill="none"><g stroke-width="2" stroke-linecap="round" stroke="#056dfa" fill-rule="evenodd" clip-rule="evenodd"><path d="m3 7h17c.5523 0 1 .44772 1 1v11c0 .5523-.4477 1-1 1h-16c-.55228 0-1-.4477-1-1z"></path><path d="m3 4.5c0-.27614.22386-.5.5-.5h6.29289c.13261 0 .25981.05268.35351.14645l2.8536 2.85355h-10z"></path></g></svg>
                <span class="lable">Archirvar</span>
              </button>
        </form>

    </section>

</x-layout>
