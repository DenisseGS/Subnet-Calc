@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <br><br>
        <div class="col s12 m4 l2"></div>
        <div class=" col s12 m4 l8 card-panel z-depth-5">
            
            <div class="row">
              <div class="col s12 m4 l4"></div>
              <br><h4 class="center-align">Resultados</h4>
              <div class="col s12 m4 l4"></div>
            </div>
            
            <div class="row">
                <form class="col s12">
                  {{ csrf_field() }}
                   <div class="row">
                        <div class="input-field col"></div>

                        <div class="col s3">
                            <label for="direccionIP">Dirección IP: </label>
                          <input id="direccionIP" name="direccionIP" type="text" value="{{ $direccionesIP }}" readonly>
                        </div>
                        
                        <div class="input-field col"></div><div class="input-field col"></div>
                        
                        <div class="col s1">
                          <label for="mascaraIPBinario">Clase: </label>
                          <input id="clase" name="clase" type="text" value="{{ $clase }}" readonly=”readonly” style="text-align:center;">
                        </div>
                        
                        <div class="input-field col"></div><div class="input-field col"></div>
            
                        <div class="col s6">
                          <label for="direccionIP">Dirección IP Binario: </label>
                          <input id="direccionIPBinario" name="direccionIPBinario" type="text" value="{{ $DireccionIPBinario }}" readonly=”readonly”>
                        </div>
                   </div>
                  
                  <div class="row">
                      
                        <div class="input-field col"></div>

                        <div class="col s3">
                          <label for="mascaraIP">Máscara: </label> 
                          <input id="mascaraIP" name="mascaraIP" type="text" value="{{ $mascaraIP }}" readonly=”readonly”>
                        </div>
                        
                        <div class="input-field col"></div>
                        
                        <div class="col">
                          <br>
                          <p>/</p>                    
                        </div>
                        
                        <div class="col s1">
                          <br>
                          <input id="mascaraXX" name="mascaraXX" type="text" value="{{ $mascaraXX }}" readonly=”readonly” style="text-align:center;">
                        </div>
                        
                        <div class="input-field col"></div><div class="input-field col"></div>
                     
                        <div class="col s6">
                          <label for="mascaraIPBinario">Máscara Binario: </label>
                          <input id="mascaraIPBinario" name="mascaraIPBinario" type="text" value="{{ $mascaraBinario }}" readonly=”readonly”>
                        </div>
                  </div>
                  
                  <div class="row">
                      
                        <div class="input-field col"></div>

                        <div class="col s3">
                          <label for="mascaraIP">Nueva Máscara: </label>
                          <input id="mascaraIP" name="mascaraIP" type="text" value="{{ $nuevaMascara }}" readonly=”readonly”>
                        </div>
                        
                        <div class="input-field col"></div>

                        <div class="col">
                          <br>
                          <p>/</p>                    
                        </div>
                        
                        <div class="col s1">
                          <br>
                          <input id="mascaraXX" name="mascaraXX" type="text" value="{{ $nuevaMascaraXX }}" readonly=”readonly” style="text-align:center;">
                        </div>
                        
                        <div class="input-field col"></div><div class="input-field col"></div>
                     
                        <div class="col s6">
                          <label for="mascaraIPBinario">Nueva Máscara Binario: </label> 
                          <input id="mascaraIPBinario" name="mascaraIPBinario" type="text" value="{{ $nuevaMascaraBinario }}" readonly=”readonly”>
                        </div>
                  </div>
                  
                  <div class="row">
                       
                        <div class="input-field col"></div>

                        <div class="col s4">
                          <label for="host">Cantidad de host: </label> 
                          <input id="host" name="host" type="text" value="{{ $hosts }}" readonly=”readonly”>
                        </div>
                        
                        <div class="input-field col"></div>
                        
                         <div class="col s4">
                          <label for="subred">Cantidad de subredes: </label> 
                          <input id="subred" name="subred" type="text" value="{{ $subredes }}" readonly=”readonly”>
                        </div>

                        <div class="col s3">
                          <br>
                          <button class="btn waves-effect waves-light btn right"><a style="color:#FFFFFF;" href="{{ url('/') }}">Nuevo</a></button>  
                        </div>
                  </div>
                </form>
            </div>
            
            <table id='tablaResultados' class="bordered centered">
                <thead>
                    <tr>
                        <th>N°</th>
                        <th>Dirección de Red</th>
                        <th>IP Host Inicial</th>
                        <th>IP Host Final</th>
                        <th>Dirección de Broadcast</th>
                    </tr>
                </thead>
                
                @foreach($rangos as $rango)
                <tbody>
                    <td>{{$rango->IDRango - 1}}</td>
                    <td>{{$rango->DireccionRed}}</td>
                    <td>{{$rango->HostInicial}}</td>
                    <td>{{$rango->HostFinal}}</td>
                    <td>{{$rango->Broadcast}}</td>
                </tbody>
                @endforeach
            </table>
            
        </div>
    </div>
</div>
@endsection
