<h3><strong>Consumo Luz Casa Covicorti - Febrero</strong></h3>
<hr>

<br>
<table border="0">
    <tr>
        <td><strong>Datos Principales</strong></td>
    </tr>
    <tr>
        <td>
            <div class="datagrid">
                <table border="1">
                    <thead style="text-align: center">
                        <tr>
                            <th>Consumo Kw</th>
                            <th>Precio x Kw</th>
                            <th>Cargos fijos</th>
                            <th>Fracc Deud</th>
                            <th>IGV</th>
                            <th>Total mes</th>

                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        <tr>
                            <td>{{ $reciboluz[0]['consumokwtotal'] }} kwh</td>
                            <td>S/ {{ $reciboluz[0]['precioxkw'] }}</td>
                            <td>S/ {{ round($reciboluz[0]['costoadministrativo'], 2) }}</td>
                            <td>S/ {{ round($reciboluz[0]['costofraccionamiento'], 2) }}</td>
                            <td>{{ round($reciboluz[0]['igv'], 0) }} %</td>
                            <td style="font-size: 14;color: red">
                                <strong>S/ {{ round($reciboluz[0]['costototalconsumo'], 2) }}</strong>
                            </td>

                        </tr>
                    </tbody>
                </table>

            </div>
        </td>
    </tr>
    <tr>
        <td>
            <br>
        </td>
    </tr>
    <tr>
        <td><strong>Detalle</strong></td>
    </tr>
    <tr>
        <td>
            <div class="datagrid">
                <table border="1">
                    <thead style="text-align: center">
                        <tr>
                            <th>Piso</th>
                            <th>Medida Mes</th>
                            <th>Consumo Kwh</th>
                            <th>Cost. Admin</th>
                            <th>Fracción Deu.</th>
                            <th>Monto S/IGV</th>
                            <th>Monto IGV</th>
                            <th>Monto C/IGV</th>
                            <th>Total Mes</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        @foreach ($reciboluz[1] as $dato)
                            <tr>
                                <td><strong>{{ $dato['descripcion'] }}</strong></td>
                                <td>{{ $dato['medidakw'] }} kwh</td>
                                <td>{{ $dato['consumokw'] }} kwh</td>
                                <td>S/ {{ round($dato['montocostoadministrativo'], 2) }}</td>
                                <td>S/ {{ round($dato['montopagofraccionado'], 2) }}</td>
                                <td>S/ {{ round($dato['montototalsinigv'], 2) }}</td>
                                <td>S/ {{ round($dato['montoigv'], 2) }}</td>
                                <td>S/ {{ round($dato['montototalconigv'], 2) }}</td>
                                <td style="color:red"><strong>S/ {{ round($dato['montototal'], 2) }}</strong></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </td>
    </tr>
</table>

<br>
<br>

<h3><strong>Consumo Agua Casa Covicorti</strong></h3>
<hr>

<br>
<table border="0">
    <tr>
        <td><strong>Datos Principales</strong></td>
    </tr>
    <tr>
        <td>
            <div class="datagrid">
                <table border="1">
                    <thead style="text-align: center">
                        <tr>
                            <th>Monto Recibo</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        <tr>
                            <td style="font-size: 14;color: red">
                                <strong>S/ {{ round($reciboagua[0]['costototalconsumo'], 2) }}</strong>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </td>
    </tr>
    <tr>
        <td>
            <br>
        </td>
    </tr>
    <tr>
        <td><strong>Detalle</strong></td>
    </tr>
    <tr>
        <td>
            <div class="datagrid">
                <table border="1">
                    <thead style="text-align: center">
                        <tr>
                            <th>Piso</th>
                            <th>Personas</th>
                            <th>Monto x Persona</th>
                            <th>Total x Piso</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        @foreach ($reciboagua[1] as $dato)
                            <tr>
                                <td><strong>{{ $dato['descripcion'] }}</strong></td>
                                <td>{{ $dato['cantpersonas'] }}</td>
                                <td>S/ {{ round($dato['montoxpersona'], 2) }}</td>
                                <td style="color:red"><strong>S/ {{ round($dato['subtotal'], 2) }}</strong></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </td>
    </tr>
</table>

<br>
<br>
<h3><strong>Consumo Internet Casa Covicorti</strong></h3>
<hr>

<br>
<table border="0">
    <tr>
        <td><strong>Datos Principales</strong></td>
    </tr>
    <tr>
        <td>
            <div class="datagrid">
                <table border="1">
                    <thead style="text-align: center">
                        <tr>
                            <th>Monto Recibo</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        <tr>
                            <td style="font-size: 14;color: red">
                                <strong>S/ {{ round($recibointernet[0]['costototalconsumo'], 2) }}</strong>
                            </td>
                        </tr>
                    </tbody>
                </table>

            </div>
        </td>
    </tr>
    <tr>
        <td>
            <br>
        </td>
    </tr>
    <tr>
        <td><strong>Detalle</strong></td>
    </tr>
    <tr>
        <td>
            <div class="datagrid">
                <table border="1">
                    <thead style="text-align: center">
                        <tr>
                            <th>Piso</th>
                            <th>Personas</th>
                            <th>Monto x Persona</th>
                            <th>Total x Piso</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        @foreach ($recibointernet[1] as $dato)
                            <tr>
                                <td><strong>{{ $dato['descripcion'] }}</strong></td>
                                <td>{{ $dato['cantpersonas'] }}</td>
                                <td>S/ {{ round($dato['montoxpersona'], 2) }}</td>
                                <td style="color:red"><strong>S/ {{ round($dato['subtotal'], 2) }}</strong></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </td>
    </tr>
</table>
<style>
.datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 1px solid #006699; -webkit-border-radius: 3px; -moz-border-radius: 3px; border-radius: 3px; }.datagrid table td, .datagrid table th { padding: 3px 10px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #006699), color-stop(1, #00557F) );background:-moz-linear-gradient( center top, #006699 5%, #00557F 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#006699', endColorstr='#00557F');background-color:#006699; color:#FFFFFF; font-size: 15px; font-weight: bold; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #000000; font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #E1EEf4; color: #00557F; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }
</style>
