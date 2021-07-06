@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <br><br>

          @if(session()->has('msj'))
            <div class="col s12 m3 l2"></div><div class="input-field col"></div><div class="input-field col"></div>
            <div class="col s12 m4 l7 card-panel red lighten-3 center-align">
              <span class="white-text">{{session('msj')}}</span>
            </div><br><br>
          @endif
        
        <div class="col s12 m3 l2"></div><div class="input-field col"></div><div class="input-field col"></div>
        <div class=" col s12 m4 l7 card-panel z-depth-5">
            <div class="row">
              <div class="col s12 m4 l4"></div>
              <br><h4 class="center-align">Complete los datos</h4>
              <div class="col s12 m4 l4"></div>
            </div>
            
            <div class="row">
                <form class="col s12" method="GET" action="/calcular">
                  {{ csrf_field() }}
                  
                  <div class="row">
                    <div class="input-field col"></div><div class="input-field col"></div><div class="input-field col"></div>
                    
                    <div class="input-field col m9">
                      <input id="direccionIP" name="direccionIP" type="text" class="validate"  required oninvalid="this.setCustomValidity('Debe ingresar una dirección IP con el formato: X.X.X.X')"
                        oninput="setCustomValidity('')" required>
                      <label for="direccionIP">Dirección IP</label>                    
                    </div>
                 
                    <div class="input-field col s5">
                        <div class="input-field col"></div><div class="input-field col"></div>
                        <input type="checkbox" id="checkMascaraIP"/>
                        <label for="checkMascaraIP">Máscara de subred IP</label><br><br>
                    </div>
                      
                    <div class="input-field col"></div><div class="input-field col"></div><div class="input-field col"></div>                       
                    
                    <div class="input-field col s4">
                        <select id='mascaraIP' name='mascaraIP' disabled>
                          @foreach ($mascarasIP as $maskIP)
                            <option value="{{ $maskIP->IDMascaraIP }}">{{ $maskIP->Valor }}</option>
                          @endforeach
                        </select>
                    </div> 
                    
                    <div class="input-field col s5">
                        <div class="input-field col"></div><div class="input-field col"></div>
                        <input type="checkbox" id="checkmascaraXX"/>
                        <label for="checkmascaraXX">Máscara de subred/ XX</label><br><br>
                    </div>
                    
                    <div class="input-field col"></div><div class="input-field col"></div><div class="input-field col"></div>                       
                      
                    <div class="input-field col s4">
                        <select id="mascaraXX" name='mascaraXX' disabled>
                          @foreach ($mascarasXX as $maskXX)
                            <option value="{{ $maskXX->IDMascaraXX }}">{{ $maskXX->Valor }}</option>
                          @endforeach
                        </select>
                    </div>
                  
                    <div class="input-field col s5">
                        <div class="input-field col"></div><div class="input-field col"></div>
                        <input type="checkbox" id="checkHost"/>
                        <label for="checkHost">Cantidad de HOST</label><br><br>
                    </div>
                    
                    <div class="input-field col"></div><div class="input-field col"></div><div class="input-field col"></div>
                      
                    <div class="input-field col s4">
                        <select id='hosts' name='hosts' disabled>
                          @foreach ($hosts as $host)
                            <option value="{{ $host->Valor }}">{{ $host->Valor }}</option>
                          @endforeach
                        </select>
                    </div>
                      
                    <div class="input-field col s5">
                        <div class="input-field col"></div><div class="input-field col"></div>
                        <input type="checkbox" id="checkSubredes"/>
                        <label for="checkSubredes">Cantidad de Subredes</label><br><br>
                    </div>
                    
                    <div class="input-field col"></div><div class="input-field col"></div><div class="input-field col"></div>
                      
                    <div class="input-field col s4">
                        <select id="subredes" name='subredes' disabled>
                          @foreach ($subredes as $subred)
                            <option value="{{ $subred->Valor }}">{{ $subred->Valor }}</option>
                          @endforeach
                        </select>
                    </div>
                  </div>

                  <div class="col s12">
                        <br>
                        <button class="btn waves-effect waves-light btn right" type="submit" name="action">Calcular</button>                        
                  </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script>
  
window.onload = function() {
  
   $('select').material_select();

    $("#checkmascaraXX").change(function() {  
        if($("#checkmascaraXX").is(':checked')) {  
            $("#mascaraXX").prop('disabled', false);
            $("#checkMascaraIP").prop('disabled', true);
            $('select').material_select();
        } else {
            $("#mascaraXX").prop('disabled', true);
            $("#checkMascaraIP").prop('disabled', false);
            $('select').material_select();
        }
    });
    
    $("#checkMascaraIP").change(function() {  
        if($("#checkMascaraIP").is(':checked')) {  
            $("#mascaraIP").prop('disabled', false);
            $("#checkmascaraXX").prop('disabled', true);
            $('select').material_select();
        } else {
            $("#mascaraIP").prop('disabled', true);
            $("#checkmascaraXX").prop('disabled', false);
            $('select').material_select();
        }
    });
    
        $("#checkHost").change(function() {  
        if($("#checkHost").is(':checked')) {  
            $("#hosts").prop('disabled', false);
            $("#checkSubredes").prop('disabled', true);
            $('select').material_select();
        } else {
            $("#hosts").prop('disabled', true);
            $("#checkSubredes").prop('disabled', false);
            $('select').material_select();
        }
    });
    
    $("#checkSubredes").change(function() {  
        if($("#checkSubredes").is(':checked')) {  
            $("#subredes").prop('disabled', false);
            $("#checkHost").prop('disabled', true);
            $('select').material_select();
        } else {
            $("#subredes").prop('disabled', true);
            $("#checkHost").prop('disabled', false);
            $('select').material_select();
        }
    });
    
}
  
</script>

@endsection
