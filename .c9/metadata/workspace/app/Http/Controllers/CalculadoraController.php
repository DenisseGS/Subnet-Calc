{"filter":false,"title":"CalculadoraController.php","tooltip":"/app/Http/Controllers/CalculadoraController.php","undoManager":{"mark":100,"position":100,"stack":[[{"start":{"row":86,"column":16},"end":{"row":86,"column":17},"action":"insert","lines":["e"],"id":14}],[{"start":{"row":86,"column":17},"end":{"row":86,"column":18},"action":"insert","lines":["c"],"id":15}],[{"start":{"row":86,"column":18},"end":{"row":86,"column":19},"action":"insert","lines":["h"],"id":16}],[{"start":{"row":86,"column":19},"end":{"row":86,"column":20},"action":"insert","lines":["o"],"id":17}],[{"start":{"row":86,"column":20},"end":{"row":86,"column":21},"action":"insert","lines":[" "],"id":18}],[{"start":{"row":86,"column":21},"end":{"row":86,"column":32},"action":"insert","lines":["$broadcast2"],"id":19}],[{"start":{"row":86,"column":32},"end":{"row":86,"column":33},"action":"insert","lines":[";"],"id":20}],[{"start":{"row":90,"column":56},"end":{"row":90,"column":57},"action":"remove","lines":["2"],"id":24}],[{"start":{"row":90,"column":56},"end":{"row":90,"column":57},"action":"insert","lines":["2"],"id":25}],[{"start":{"row":85,"column":83},"end":{"row":85,"column":97},"action":"remove","lines":["mascaraIPValor"],"id":26},{"start":{"row":85,"column":83},"end":{"row":85,"column":105},"action":"insert","lines":["nuevaMascaraSubRedHost"]}],[{"start":{"row":90,"column":56},"end":{"row":90,"column":57},"action":"remove","lines":["2"],"id":43}],[{"start":{"row":90,"column":56},"end":{"row":90,"column":57},"action":"insert","lines":["2"],"id":44}],[{"start":{"row":85,"column":83},"end":{"row":85,"column":105},"action":"remove","lines":["nuevaMascaraSubRedHost"],"id":45},{"start":{"row":85,"column":83},"end":{"row":85,"column":97},"action":"insert","lines":["mascaraIPValor"]}],[{"start":{"row":87,"column":61},"end":{"row":87,"column":83},"action":"remove","lines":["nuevaMascaraSubRedHost"],"id":46},{"start":{"row":87,"column":61},"end":{"row":87,"column":75},"action":"insert","lines":["mascaraIPValor"]}],[{"start":{"row":90,"column":56},"end":{"row":90,"column":57},"action":"remove","lines":["2"],"id":47}],[{"start":{"row":250,"column":26},"end":{"row":251,"column":0},"action":"insert","lines":["",""],"id":48},{"start":{"row":251,"column":0},"end":{"row":251,"column":4},"action":"insert","lines":["    "]}],[{"start":{"row":252,"column":4},"end":{"row":259,"column":20},"action":"insert","lines":["   function direccionAND() { ","        $DireccionIP = ip2long($this->direccionIP); //Convierte una cadena que contiene una dirección con puntos en un integer","        $MascaraIP = ip2long($this->mascaraIPValor);","        $RedInt = $DireccionIP & $MascaraIP;  // Red: Aplicar AND entre la direccion IP y la máscara","        $Red = long2ip($RedInt); // long2ip: Convierte una dirección en una cadena de texto en formato 0.0.0.0","        ","        return $Red;","    } //direccionAND"],"id":55}],[{"start":{"row":252,"column":27},"end":{"row":252,"column":28},"action":"remove","lines":["D"],"id":56}],[{"start":{"row":252,"column":26},"end":{"row":252,"column":27},"action":"remove","lines":["N"],"id":57}],[{"start":{"row":252,"column":25},"end":{"row":252,"column":26},"action":"remove","lines":["A"],"id":58},{"start":{"row":252,"column":24},"end":{"row":252,"column":25},"action":"remove","lines":["n"]}],[{"start":{"row":252,"column":23},"end":{"row":252,"column":24},"action":"remove","lines":["o"],"id":59}],[{"start":{"row":252,"column":22},"end":{"row":252,"column":23},"action":"remove","lines":["i"],"id":60}],[{"start":{"row":252,"column":21},"end":{"row":252,"column":22},"action":"remove","lines":["c"],"id":61}],[{"start":{"row":252,"column":20},"end":{"row":252,"column":21},"action":"remove","lines":["c"],"id":62}],[{"start":{"row":252,"column":19},"end":{"row":252,"column":20},"action":"remove","lines":["e"],"id":63}],[{"start":{"row":252,"column":18},"end":{"row":252,"column":19},"action":"remove","lines":["r"],"id":64}],[{"start":{"row":252,"column":17},"end":{"row":252,"column":18},"action":"remove","lines":["i"],"id":65}],[{"start":{"row":252,"column":16},"end":{"row":252,"column":17},"action":"remove","lines":["d"],"id":66}],[{"start":{"row":252,"column":16},"end":{"row":252,"column":17},"action":"insert","lines":["B"],"id":67}],[{"start":{"row":252,"column":17},"end":{"row":252,"column":18},"action":"insert","lines":["C"],"id":68}],[{"start":{"row":255,"column":31},"end":{"row":255,"column":32},"action":"remove","lines":["&"],"id":69}],[{"start":{"row":255,"column":31},"end":{"row":255,"column":35},"action":"insert","lines":["| (~"],"id":70}],[{"start":{"row":255,"column":46},"end":{"row":255,"column":48},"action":"insert","lines":["()"],"id":71}],[{"start":{"row":255,"column":46},"end":{"row":255,"column":48},"action":"remove","lines":["()"],"id":72}],[{"start":{"row":255,"column":35},"end":{"row":255,"column":36},"action":"remove","lines":[" "],"id":73}],[{"start":{"row":255,"column":45},"end":{"row":255,"column":46},"action":"insert","lines":[")"],"id":74}],[{"start":{"row":85,"column":99},"end":{"row":86,"column":0},"action":"insert","lines":["",""],"id":75},{"start":{"row":86,"column":0},"end":{"row":86,"column":16},"action":"insert","lines":["                "]}],[{"start":{"row":86,"column":16},"end":{"row":86,"column":17},"action":"insert","lines":["$"],"id":76}],[{"start":{"row":86,"column":17},"end":{"row":86,"column":18},"action":"insert","lines":["B"],"id":77}],[{"start":{"row":86,"column":18},"end":{"row":86,"column":19},"action":"insert","lines":[" "],"id":78}],[{"start":{"row":86,"column":19},"end":{"row":86,"column":20},"action":"insert","lines":["="],"id":79}],[{"start":{"row":86,"column":20},"end":{"row":86,"column":21},"action":"insert","lines":[" "],"id":80}],[{"start":{"row":86,"column":21},"end":{"row":86,"column":22},"action":"insert","lines":["$"],"id":81}],[{"start":{"row":86,"column":22},"end":{"row":86,"column":23},"action":"insert","lines":["T"],"id":82}],[{"start":{"row":86,"column":23},"end":{"row":86,"column":24},"action":"insert","lines":["H"],"id":83}],[{"start":{"row":86,"column":24},"end":{"row":86,"column":25},"action":"insert","lines":["I"],"id":84}],[{"start":{"row":86,"column":25},"end":{"row":86,"column":26},"action":"insert","lines":["S"],"id":85}],[{"start":{"row":86,"column":26},"end":{"row":86,"column":27},"action":"insert","lines":["-"],"id":86}],[{"start":{"row":86,"column":27},"end":{"row":86,"column":28},"action":"insert","lines":[">"],"id":87}],[{"start":{"row":86,"column":28},"end":{"row":86,"column":29},"action":"insert","lines":["B"],"id":88}],[{"start":{"row":86,"column":29},"end":{"row":86,"column":30},"action":"insert","lines":["C"],"id":89}],[{"start":{"row":86,"column":30},"end":{"row":86,"column":32},"action":"insert","lines":["()"],"id":90}],[{"start":{"row":86,"column":32},"end":{"row":86,"column":33},"action":"insert","lines":[";"],"id":91}],[{"start":{"row":86,"column":0},"end":{"row":87,"column":0},"action":"remove","lines":["                $B = $THIS->BC();",""],"id":131}],[{"start":{"row":121,"column":20},"end":{"row":121,"column":24},"action":"remove","lines":["echo"],"id":132},{"start":{"row":121,"column":20},"end":{"row":121,"column":30},"action":"insert","lines":["$broadcast"]}],[{"start":{"row":123,"column":30},"end":{"row":123,"column":31},"action":"insert","lines":["2"],"id":133}],[{"start":{"row":121,"column":30},"end":{"row":121,"column":31},"action":"insert","lines":[" "],"id":134}],[{"start":{"row":121,"column":31},"end":{"row":121,"column":32},"action":"insert","lines":["="],"id":135}],[{"start":{"row":121,"column":86},"end":{"row":121,"column":100},"action":"remove","lines":["mascaraIPValor"],"id":138},{"start":{"row":121,"column":86},"end":{"row":121,"column":104},"action":"insert","lines":["nuevaMascaraSubRed"]}],[{"start":{"row":123,"column":67},"end":{"row":123,"column":85},"action":"remove","lines":["nuevaMascaraSubRed"],"id":139},{"start":{"row":123,"column":67},"end":{"row":123,"column":85},"action":"insert","lines":["nuevaMascaraSubRed"]}],[{"start":{"row":121,"column":30},"end":{"row":121,"column":31},"action":"insert","lines":["2"],"id":140}],[{"start":{"row":123,"column":30},"end":{"row":123,"column":31},"action":"remove","lines":["2"],"id":141}],[{"start":{"row":87,"column":61},"end":{"row":87,"column":75},"action":"remove","lines":["mascaraIPValor"],"id":142},{"start":{"row":87,"column":61},"end":{"row":87,"column":83},"action":"insert","lines":["nuevaMascaraSubRedHost"]}],[{"start":{"row":87,"column":26},"end":{"row":87,"column":27},"action":"insert","lines":["2"],"id":143}],[{"start":{"row":85,"column":26},"end":{"row":85,"column":27},"action":"remove","lines":["2"],"id":144}],[{"start":{"row":86,"column":31},"end":{"row":86,"column":32},"action":"remove","lines":["2"],"id":145}],[{"start":{"row":85,"column":82},"end":{"row":85,"column":96},"action":"remove","lines":["mascaraIPValor"],"id":146},{"start":{"row":85,"column":82},"end":{"row":85,"column":104},"action":"insert","lines":["nuevaMascaraSubRedHost"]}],[{"start":{"row":252,"column":0},"end":{"row":259,"column":20},"action":"remove","lines":["       function BC() { ","        $DireccionIP = ip2long($this->direccionIP); //Convierte una cadena que contiene una dirección con puntos en un integer","        $MascaraIP = ip2long($this->mascaraIPValor);","        $RedInt = $DireccionIP | (~$MascaraIP);  // Red: Aplicar AND entre la direccion IP y la máscara","        $Red = long2ip($RedInt); // long2ip: Convierte una dirección en una cadena de texto en formato 0.0.0.0","        ","        return $Red;","    } //direccionAND"],"id":147}],[{"start":{"row":251,"column":4},"end":{"row":252,"column":0},"action":"remove","lines":["",""],"id":148}],[{"start":{"row":251,"column":0},"end":{"row":251,"column":4},"action":"remove","lines":["    "],"id":149}],[{"start":{"row":250,"column":26},"end":{"row":251,"column":0},"action":"remove","lines":["",""],"id":150}],[{"start":{"row":243,"column":40},"end":{"row":243,"column":41},"action":"remove","lines":["r"],"id":151}],[{"start":{"row":243,"column":39},"end":{"row":243,"column":40},"action":"remove","lines":["d"],"id":152}],[{"start":{"row":243,"column":38},"end":{"row":243,"column":39},"action":"remove","lines":["d"],"id":153}],[{"start":{"row":243,"column":37},"end":{"row":243,"column":38},"action":"remove","lines":["a"],"id":154}],[{"start":{"row":243,"column":36},"end":{"row":243,"column":37},"action":"remove","lines":["_"],"id":155}],[{"start":{"row":244,"column":29},"end":{"row":244,"column":30},"action":"remove","lines":["r"],"id":156}],[{"start":{"row":244,"column":28},"end":{"row":244,"column":29},"action":"remove","lines":["d"],"id":157}],[{"start":{"row":244,"column":27},"end":{"row":244,"column":28},"action":"remove","lines":["d"],"id":158}],[{"start":{"row":244,"column":26},"end":{"row":244,"column":27},"action":"remove","lines":["a"],"id":159}],[{"start":{"row":244,"column":25},"end":{"row":244,"column":26},"action":"remove","lines":["_"],"id":160}],[{"start":{"row":244,"column":23},"end":{"row":244,"column":24},"action":"insert","lines":["d"],"id":161}],[{"start":{"row":244,"column":24},"end":{"row":244,"column":25},"action":"insert","lines":["I"],"id":162}],[{"start":{"row":244,"column":25},"end":{"row":244,"column":26},"action":"insert","lines":["R"],"id":163}],[{"start":{"row":244,"column":25},"end":{"row":244,"column":26},"action":"remove","lines":["R"],"id":164}],[{"start":{"row":244,"column":24},"end":{"row":244,"column":25},"action":"remove","lines":["I"],"id":165}],[{"start":{"row":244,"column":23},"end":{"row":244,"column":24},"action":"remove","lines":["d"],"id":166}],[{"start":{"row":244,"column":23},"end":{"row":244,"column":24},"action":"insert","lines":["D"],"id":167}],[{"start":{"row":244,"column":24},"end":{"row":244,"column":25},"action":"insert","lines":["i"],"id":168}],[{"start":{"row":244,"column":25},"end":{"row":244,"column":26},"action":"insert","lines":["r"],"id":169}],[{"start":{"row":243,"column":33},"end":{"row":243,"column":36},"action":"remove","lines":["$ip"],"id":170},{"start":{"row":243,"column":33},"end":{"row":243,"column":39},"action":"insert","lines":["$Dirip"]}],[{"start":{"row":87,"column":26},"end":{"row":87,"column":27},"action":"remove","lines":["2"],"id":176}],[{"start":{"row":85,"column":26},"end":{"row":85,"column":27},"action":"insert","lines":["l"],"id":177}],[{"start":{"row":86,"column":16},"end":{"row":86,"column":17},"action":"insert","lines":["/"],"id":178}],[{"start":{"row":86,"column":17},"end":{"row":86,"column":18},"action":"insert","lines":["/"],"id":179}],[{"start":{"row":85,"column":0},"end":{"row":86,"column":34},"action":"remove","lines":["                $broadcastl = $this->calcularBroadcast2($this->direccionIP, $this->nuevaMascaraSubRedHost);","                //echo $broadcast;"],"id":180}],[{"start":{"row":84,"column":16},"end":{"row":85,"column":0},"action":"remove","lines":["",""],"id":181}],[{"start":{"row":119,"column":0},"end":{"row":120,"column":20},"action":"remove","lines":["                    $broadcast2 = $this->calcularBroadcast2($this->direccionIP, $this->nuevaMascaraSubRed);","                    "],"id":182}],[{"start":{"row":118,"column":20},"end":{"row":119,"column":0},"action":"remove","lines":["",""],"id":183}],[{"start":{"row":237,"column":0},"end":{"row":246,"column":26},"action":"remove","lines":["    ","    ","     function calcularBroadcast2($Dirip, $nuevaMascara) {","        $ip = ip2long($Dirip); ","        $nm = ip2long($nuevaMascara); ","        $nw = ($ip & $nm); ","        $bc = $nw | (~$nm); ","        ","        return long2ip($bc);","    } //calcularBroadcast "],"id":184}],[{"start":{"row":236,"column":25},"end":{"row":237,"column":0},"action":"remove","lines":["",""],"id":185}]]},"ace":{"folds":[],"scrolltop":0,"scrollleft":0,"selection":{"start":{"row":236,"column":25},"end":{"row":236,"column":25},"isBackwards":false},"options":{"guessTabSize":true,"useWrapMode":false,"wrapToView":true},"firstLineState":0},"timestamp":1499284980925,"hash":"7a9ebecb2434591d5474344a70be6cdf26beaee9"}