<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Validator;
use \App\Rangos;

class CalculadoraController extends Controller {
    
    private $direccionIP;
    private $mascaraXX;
    private $mascaraIP;
    private $mascaraIPValor;
    
    private $host;
    private $subred;
    
    private $nuevaMascaraSubRed;
    private $nuevaMascaraSubRedHost;
    
    private $ArrayDireccionIP = [];
    private $ArrayMascara  = [];
    private $ArrayMascaraSubred  = [];
    private $ArrayMascaraSubredHost = [];
    
    private $claseRed;
    
    public function home() { //Carga los datos de la BD
        $mascarasXX = \App\MascaraXX::All();
        $mascarasIP = \App\MascaraIP::All();
        $hosts = \App\Host::All();
        $subredes = \App\Subred::All();
        Rangos::truncate();

        return view('Calculadora', compact('mascarasXX', 'mascarasIP', 'hosts', 'subredes'));
    } //Fin home
    
    public function principal(Request $request) {
      
        Rangos::truncate(); //limpia tabla
        
        if ($this->validarDireccionIP($request->direccionIP)) {
            $this->direccionIP = $request->direccionIP;
        } else {
            return back()->with('msj', "La dirección IP: $request->direccionIP no es válida");
        }
        
        $this->mascaraXX = $request->mascaraXX;
        $this->mascaraIP = $request->mascaraIP;
        
        if($this->mascaraXX != null) {
            $this->mascarasIP = \App\MascaraIP::where('IDMascaraIP', $this->mascaraXX) -> first();
            $this->mascaraIP =  $this->mascaraXX;
            $this->mascaraIPValor = $this->mascarasIP->Valor;
        } else {
            if($this->mascaraIP != null) {
                $this->mascarasIP = \App\MascaraIP::where('IDMascaraIP', $request->mascaraIP) -> first();
                $this->mascaraIP =  $request->mascaraIP;
                $this->mascaraXX = $this->mascaraIP;
                $this->mascaraIPValor = $this->mascarasIP->Valor;
            } else {
                return back()->with('msj', "Debe seleccionar la máscara");
            }
        } //else
        
        $this->ArrayDireccionIP = explode('.', $this->direccionIP); // explode: divide en varios string.
        $this->ArrayMascara = explode('.', $this->mascaraIPValor);
        
        $DireccionIPBinario = $this->convertirABinario( $this->ArrayDireccionIP ); //IP Binario
        $MascaraBinario = $this->convertirABinario( $this->ArrayMascara ); //Máscara Binario
        
        $this->host = $request->hosts;
        $this->subred = $request->subredes;
        
        if($this->host != null) {
            
            if($this->validarCantidadSubRedes_Hosts($this->mascaraXX, $this->bitsPrestadosHost())) { //debe ser 32 o menos

                $this->bitsMascaraSubredSegunHost = 32 - $this->bitsPrestadosHost(); //Cantidad de bits para la nueva máscara cuando piden hosts
                $this->mascaraSubredSegunHostHexadecimal = 0xFFFFFFFF << (32 - $this->bitsMascaraSubredSegunHost); //Nueva máscara cuando piden hosts en hexadecimal
                $this->nuevaMascaraSubRedHost = $this->calcularNuevaMascara($this->mascaraSubredSegunHostHexadecimal); // Nueva mascara cuando es por host
                $this->ArrayMascaraSubredHost = explode('.', $this->nuevaMascaraSubRedHost); 
                $nuevaMascaraSubRedHostBinario = $this->convertirABinario($this->ArrayMascaraSubredHost); // Nueva mascara cuando es por host en Binario
                
                $broadcast = $this->calcularBroadcast($this->nuevaMascaraSubRedHost);
                $direccionRed = $this->direccionAND();
                $hostInicial = $this->HostInicial($direccionRed);
                $hostFinal = $this->HostFinal($broadcast);
                
                $iteraciones = $this->bitsIteracion($this->nuevaMascaraSubRedHost); //cada cuanto itera
                $cantSubredes = $this->cantidadIteracionesParaHost($this->bitsMascaraSubredSegunHost, $this->mascaraXX); //cantidad de veces que itera
                $this->calcularRango($direccionRed, $hostInicial, $hostFinal, $broadcast);
                $this->calcularIteraciones($direccionRed, $broadcast, $iteraciones, $cantSubredes, 0); //0 es un contador para el metodo recursivo
                
                $rangos = \App\Rangos::All(); //trae los datos de la tabla
                
                $clase = $this-> ClasesRed($this->ArrayDireccionIP[0]);
                
                return view('Resultado', ['direccionesIP'=> $this->direccionIP, 'DireccionIPBinario' => $DireccionIPBinario, 'mascaraIP' => $this->mascaraIPValor, 'mascaraXX' => $this->mascaraXX, 
                'mascaraBinario' => $MascaraBinario, 'nuevaMascara' => $this->nuevaMascaraSubRedHost, 'nuevaMascaraXX' => $this->bitsMascaraSubredSegunHost, 
                'nuevaMascaraBinario' => $nuevaMascaraSubRedHostBinario, 'hosts' => $this->host, 'subredes' => ($cantSubredes + 1), 'rangos' => $rangos, 'clase' => $clase]);
                
            } else {
                return back()->with('msj', "La cantidad de hosts: $this->host es inválida para la máscara: $this->mascaraXX");
            }
         
        } else {
            
            if($this->subred != null) {
                
                if($this->validarCantidadSubRedes_Hosts($this->mascaraXX, $this->bitsPrestadosSubred())) { //debe ser 32 o menos
                    
                    $this->bitsMascaraSubred = $this->mascaraXX + $this->bitsPrestadosSubred(); //Cantidad de bits para la nueva máscara cuando piden subredes
                    $this->mascaraSubredHexadecimal = 0xFFFFFFFF << (32 - $this->bitsMascaraSubred); //Nueva máscara cuando piden subredes en hexadecimal
                    $this->nuevaMascaraSubRed = $this->calcularNuevaMascara($this->mascaraSubredHexadecimal); //Nueva mascara cuando es por subred
                    $this->ArrayMascaraSubred = explode('.', $this->nuevaMascaraSubRed);
                    $nuevaMascaraSubRedBinario = $this->convertirABinario($this->ArrayMascaraSubred); //Nueva mascara cuando es por subred en Binario
                    
                    $broadcast = $this->calcularBroadcast( $this->nuevaMascaraSubRed);
                    $direccionRed = $this->direccionAND();
                    $hostInicial = $this->HostInicial($direccionRed);
                    $hostFinal = $this->HostFinal($broadcast);
                
                    $iteraciones = $this->bitsIteracion($this->nuevaMascaraSubRed); //cada cuanto itera
                    $cantSubredes = $this->subred - 1; //cantidad de veces que itera. subred - 1 xq cuenta la primera de calcular rango
                    $this->calcularRango($direccionRed, $hostInicial, $hostFinal, $broadcast);
                    $this->calcularIteraciones($direccionRed, $broadcast, $iteraciones, $cantSubredes, 0); //0 es un contador para el metodo recursivo
                    
                    $cantidadHost = $this->cantidadHostPorSubred($this->bitsMascaraSubred);
                    
                    $rangos = \App\Rangos::All(); //trae los datos de la tabla
    
                    $clase = $this-> ClasesRed($this->ArrayDireccionIP[0]);
                    
                    return view('Resultado', ['direccionesIP'=> $this->direccionIP, 'DireccionIPBinario' => $DireccionIPBinario, 'mascaraIP' => $this->mascaraIPValor, 'mascaraXX' => $this->mascaraXX, 
                    'mascaraBinario' => $MascaraBinario, 'nuevaMascara' => $this->nuevaMascaraSubRed, 'nuevaMascaraXX' => $this->bitsMascaraSubred, 
                    'nuevaMascaraBinario' => $nuevaMascaraSubRedBinario, 'subredes' => $this->subred, 'hosts' => $cantidadHost, 'rangos' => $rangos, 'clase' => $clase]);

                } else {
                    return back()->with('msj', "La cantidad de subredes: $this->subred es inválida para la máscara: $this->mascaraXX");
                }
                
            } else {
                return back()->with('msj', "Debe seleccionar una cantidad de host o subred");
            }
        } //else

    } //Fin principal
    
    ///////////////////////////// VALIDACIONES ///////////////////////////////////
    
    function validarDireccionIP($ip) {
        if (!filter_var($ip, FILTER_VALIDATE_IP)) { // FILTER_VALIDATE_IP: Verifica que la dirección IP esta en formato 0.0.0.0
            return false;
        } else {
            return true;
        }
    } //validarDireccionIP
    
    function validarCantidadSubRedes_Hosts($mascaraXX, $bits) {
        $mascaraTotal = $mascaraXX + $bits; //La suma debe dar 32 o menos. Si se pasa no es un valor permitido. Ejemplo para una máscara de 8 el mayor número de subredes es 2^24
        if ($mascaraTotal <= 32) {
            return true;
        } else {
            return false;
        }
    } //validarCantidadSubRedes_Hosts
    
    ///////////////////////////// BINARIO //////////////////////////////////////
    
    function convertirABinario($arrayABinario) { // Devuelve el array en binario
        $formato = '%08b'; //b = binario, 08 = formato de 8 bits
        $separador = '.';
        
        return implode($separador, array_map( //implode: Une elementos de un array en un string. // array_map: Aplica la función a los elementos de los arrays dados
            function ($x) use ($formato) {
                return sprintf($formato, $x); //sprintf — Devuelve un string formateado a binario
            }, $arrayABinario ));
    } //convertirABinario
    
    ///////////////////////////// BITS PRESTADOS ///////////////////////////////
    
    function bitsPrestadosSubred() {
        for ($i = 0; $i <= 31; $i++) {
            $bits = pow(2, ($i)); // 2^i me da la cantidad de redes seleccionadas
            if ($bits == $this->subred) {
                return $i;
            }
        }
    } //bitsPrestadosSubred
    
    function bitsPrestadosHost() {
        for ($i = 0; $i <= 31; $i++) {
            $bits = (pow(2, ($i))-2); // 2^i-2 me da la cantidad de hots seleccionados
            if ($bits == $this->host) {
                return $i;
            }
        }
    } //bitsPrestadosHost
    
    function cantidadHostPorSubred($nuevamascara) { //cantidad de host por subred
        $cant = 32 - $nuevamascara; // A 32 se le resta la nueva máscara tipo /XX para saber cuantos bits son para host
        $host = (pow(2, $cant) - 2); //2^$bits - 2 para saber la cantidad de host 
        
        return $host;
    } //cantidadHostPorSubred
    
    ///////////////////////////// DIRECCIÓN AND ////////////////////////////////
    
    function direccionAND() { 
        $DireccionIP = ip2long($this->direccionIP); //Convierte una cadena que contiene una dirección con puntos en un integer
        $MascaraIP = ip2long($this->mascaraIPValor);
        $RedInt = $DireccionIP & $MascaraIP;  // Red: Aplicar AND entre la direccion IP y la máscara
        $Red = long2ip($RedInt); // long2ip: Convierte una dirección en una cadena de texto en formato 0.0.0.0
        
        return $Red;
    } //direccionAND
    
    ///////////////////////////// NUEVA MÁSCARA ///////////////////////////////
    
    function calcularNuevaMascara($mascaraSubred) {
        $nuevaMascara = long2ip($mascaraSubred); // long2ip: Convierte una dirección en una cadena de texto en formato 0.0.0.0
        
        return $nuevaMascara;
    } //calcularNuevaMascara
    
    ///////////////////////////// BROADCAST ////////////////////////////////////
    
   function calcularBroadcast($nuevaMascara) {
        $ip = ip2long($this->direccionIP); 
        $mask = ip2long($nuevaMascara); 
        $broadcast = $ip | (~$mask); //OR entre la ip y la mascara de subred
        $bc = long2ip($broadcast); 
        
        return $bc;
    } //calcularBroadcast
    
    ///////////////////////////// HOST INICIAL /////////////////////////////////
    
    function HostInicial($direccionRed) { //Dirección AND + 1
        $And = ip2long($direccionRed); //Pasa la dirección a un int para poder sumar, luego el resultado lo vuelve a convertir en una dirección.
        $RangoAnd = long2ip($And + 1);

        return $RangoAnd;
    } //HostInicial
    
    ///////////////////////////// HOST FINAL ///////////////////////////////////

    function HostFinal($broadcast) { //Dirección Broadcast - 1
        $Broadcast = ip2long($broadcast); //Pasa la dirección a un int para poder restar, luego el resultado lo vuelve a convertir en una dirección.
        $RangoBroadcast = long2ip($Broadcast - 1);

        return $RangoBroadcast;
    } //HostFinal
    
    ///////////////////////////// RANGOS ///////////////////////////////////////
    
    function bitsIteracion($mascaraNueva) { //cada cuanto itera
        $mascaraTotal = ip2long("255.255.255.255");
        $mascara = ip2long($mascaraNueva);
        $total = $mascaraTotal - $mascara; //restar la mascara nueva a 255.255.255.255 da cada cuanto debe iterar. Ejm cada 16, cada 32....
        
        return long2ip(($total) + 1); //(255 - mask) + 1
    } //bitsIteracion
    
    function calcularRango($direccionRed, $hostInicial, $hostFinal, $broadcast) { // llena la tabla
        $Rangos = new Rangos;
        $Rangos->DireccionRed = $direccionRed;
        $Rangos->HostInicial = $hostInicial;
        $Rangos->HostFinal = $hostFinal;
        $Rangos->Broadcast = $broadcast;
        $Rangos->save();
        
        return $Rangos;
    } //calcularRango
    
    function calcularIteraciones($DR, $BC, $cantidadIteraciones, $cantidadSubredes, $contador) { //metodo recursivo

        if ($contador < $cantidadSubredes) {
            $resultadoDR = long2ip(ip2long($DR) + ip2long($cantidadIteraciones)); // a la direccion red le sumo la cantidad que debe iterar, el resultado se pasa a tipo dirección (long2ip)
            $resultadoBC = long2ip(ip2long($BC) + ip2long($cantidadIteraciones)); // al broadcast le sumo la cantidad que debe iterar, el resultado se pasa a tipo dirección (long2ip)
            $this->calcularRango($resultadoDR, $this->HostInicial($resultadoDR), $this->HostFinal($resultadoBC), $resultadoBC); //lo guarda en la tabla
            $this->calcularIteraciones($resultadoDR, $resultadoBC, $cantidadIteraciones, $cantidadSubredes, $contador + 1); //realiza el cálculo hasta que el contador llega a la cantidad de veces que debe iterar.
        }
    } //calcularIteraciones
    
    function cantidadIteracionesParaHost($nuevamascara, $mascara) { //cantidad de veces que itera cuando se selecciona host (subredes)
        $cant = $nuevamascara - $mascara; //La nueva máscara tipo /XX se le resta la máscara de red tipo /XX
        $bits = pow(2, $cant); //2^$cant para saber la cantidad de subredes
        
        return $bits - 1; // se resta 1 porque el primer dato es la direccion red y broadcast y ya las demás son las iteraciones.
    } //cantidadIteracionesParaHost
    
    ///////////////////////////// CLASE RED ////////////////////////////////////
    
    function ClasesRed($claseRed) {
      
        if($claseRed <= 127) {
            $clase = $this->claseRed = "A";
        } else if($claseRed >= 128 && $claseRed <= 191) {
            $clase = $this->claseRed = "B";
        } else if($claseRed >= 192 && $claseRed <= 223) {
            $clase = $this->claseRed = "C";
        } else if($claseRed >= 224 && $claseRed <= 239) {
            $clase = $this->claseRed = "D";
        } else if($claseRed >= 240 && $claseRed <= 255) {
            $clase = $this->claseRed = "E";
        }
        
        return $clase;
    } //ClasesRed

} //Fin clase CalculadoraController
