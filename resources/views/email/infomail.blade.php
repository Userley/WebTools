<h3><strong>Consumo Luz Casa Covicorti</strong></h3>
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
                    <thead>
                        <tr>
                            <th>Consumo Kw</th>
                            <th>Precio x Kw</th>
                            <th>Cargos fijos</th>
                            <th>Fracc Deud</th>
                            <th>IGV</th>
                            <th>Total mes</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $reciboluz[0]['consumokwtotal'] }}</td>
                            <td>{{ $reciboluz[0]['precioxkw'] }}</td>
                            <td>{{ $reciboluz[0]['costoadministrativo'] }}</td>
                            <td>{{ $reciboluz[0]['costofraccionamiento'] }}</td>
                            <td>{{ $reciboluz[0]['igv'] }}</td>
                            <td style="font-size: 14;color: red">
                                <strong>{{ $reciboluz[0]['costototalconsumo'] }}</strong>
                            </td>

                        </tr>

                        <tr>

                            <td colspan="6">
                                <p><strong>Comentario:</strong></p>{{ $reciboluz[0]['comentarios'] }}
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
                    <thead>
                        <tr>
                            <th>Lugar</th>
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
                    <tbody>
                        @foreach ($reciboluz[1] as $dato)
                            <tr>
                                <td>{{ $dato['descripcion'] }}</td>
                                <td>{{ $dato['medidakw'] }}</td>
                                <td>{{ $dato['consumokw'] }}</td>
                                <td>{{ $dato['montocostoadministrativo'] }}</td>
                                <td>{{ $dato['montopagofraccionado'] }}</td>
                                <td>{{ $dato['montototalsinigv'] }}</td>
                                <td>{{ $dato['montoigv'] }}</td>
                                <td>{{ $dato['montototalconigv'] }}</td>
                                <td style="color:red"><strong>{{ $dato['montototal'] }}</strong></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </td>
    </tr>
</table>

<style>
    .datagrid table {
        border-collapse: collapse;
        text-align: left;
        width: 100%;
    }

    .datagrid {
        font: normal 12px/150% Arial, Helvetica, sans-serif;
        background: #fff;
        overflow: hidden;
        border: 1px solid #8C8C8C;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }

    .datagrid table td,
    .datagrid table th {
        padding: 3px 10px;
    }

    .datagrid table thead th {
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0.05, #00699E), color-stop(1, #0082C2));
        background: -moz-linear-gradient(center top, #00699E 5%, #0082C2 100%);
        filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#00699E', endColorstr='#0082C2');
        background-color: #00699E;
        color: #FFFFFF;
        font-size: 13px;
        font-weight: bold;
    }

    .datagrid table thead th:first-child {
        border: none;
    }

    .datagrid table tbody td {
        color: #7D7D7D;
        border-left: 1px solid #DBDBDB;
        font-size: 12px;
        font-weight: normal;
    }

    .datagrid table tbody .alt td {
        background: #EBEBEB;
        color: #7D7D7D;
    }

    .datagrid table tbody td:first-child {
        border-left: none;
    }

    .datagrid table tbody tr:last-child td {
        border-bottom: none;
    }
</style>
