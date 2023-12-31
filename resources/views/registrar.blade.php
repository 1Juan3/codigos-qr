<x-layout titulo="Registrar entrada">
  <x-slot name="css"><link rel="stylesheet" href="{{ asset('css/entrada.css') }}"> <x-slot>
  <form id="myForm" action="{{ route('consultar')}}" style="display: flex; justify-content: center; align-items: center"> 
    <input class="form-control" name="token" type="text"style="text-align: center; width: 20%; margin-top: 30px; margin-bottom:30px" placeholder="QR del graduando" oninput="submitForm()"autocomplete="off" pattern="\d{20}" maxlength="20"  >
</form>

{{-- Este script me permitira leer automaticamente el codigo --}}
<script>
    function submitForm() {
      document.getElementById("myForm").submit();
    }
  </script>
  <section style="display: flex; justify-content: center; align-content: center" >
    <div class="card text-center" style="width: 60%; text-align: ">
      <div class="card-header">
        Informacion del graduando
      </div>
      <p style="font-size: 25px; text-align: center; margin-top: 40px;  ">INVITADO ESPECIAL DE:</p>
      <div class="card-body" style="display: flex; justify-content: center; align-items: center; flex-direction: column;">
        @if(isset($datos['nombres']) && $datos['apellidos'])
        <h1 >{{ $datos['nombres'] }} {{$datos['apellidos']}}</h1>
        @endif
        <label for="Titulo"> <b>Titulo</b></label>
        @if(isset($datos['titulo']))
        <p class="card-text" id="titulo">{{ $datos['titulo'] }}</p>
        @endif
        <label for="Invitados"> <b>Invitados</b></label>
        @if(isset($datos['nombre_invitados']))
        <p class="card-text" id="nombre_invitados">{{ $datos['nombre_invitados'] }}</p>
        @endif
        <label for="numero_entradas"> <b>Numero entradas disponibles</b></label>
        @if(isset($datos['numero_entradas']))
        <p class="card-text" id="numero_entradas">{{ $datos['numero_entradas'] }}</p>
        @endif
        <label for="numero_entradas"> <b>Nombre de la ceremonia</b></label>
        @if(isset($datos['nombre_grupo']))
        <p class="card-text" id="numero_entradas">{{ $datos['nombre_grupo'] }}</p>
        @endif
        @if(isset($datos['token']))
        <form action="{{ route('registrar', $datos['token'])}}" method="POST" >
          @csrf
        @endif
          <div class="form-floating">
            <textarea class="form-control" placeholder="Si tiene alguna observacion registrela aqui por favor" id="floatingTextarea2" style="height: 100px; width: 500px;" name="comentario"></textarea>
              <label for="floatingTextarea2">Si tiene alguna observacion ingresela aqui por favor</label>
            </div>
            <button type="submit" class="btn btn-outline-success" style="margin-top: 20px;  ">Registrar Entrada</button>
        </form>

      </div>
      <div class="card-footer text-body-secondary">
        {{ date('Y-m-d') }}
    </div>
    
    </div>
  </section>


</x-layout>