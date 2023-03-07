<?php

namespace App\Mail;

use App\Models\Consumo;
use App\Models\Consumo_detalle;
use App\Models\ConsumoAgua;
use App\Models\ConsumoAgua_detalle;
use App\Models\ConsumoInternet;
use App\Models\ConsumoInternet_detalle;
use App\Models\Imagenes;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InfoMailMailable extends Mailable
{

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $mes;
    public $anio;

    public function __construct($mes,  $anio)
    {
        $this->mes = $mes;
        $this->anio = $anio;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Consumos Mz. P Prima Lt.27 Covicorti',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        $respluz = [];
        $respagua = [];
        $respinternet = [];
        $mes = $this->mes;
        $anio = $this->anio;

        //---------------------------------------------------------------
        //LUZ

        $ConsumoLuz = Consumo::query()->where('idanio', $anio)->where('idmes', $mes)->get();

        $detalleLuz = Consumo_detalle::join('pisos_casa', 'consumo_detalle.idpiso', '=', 'pisos_casa.idpiso')
            ->select('pisos_casa.idpiso', 'pisos_casa.descripcion', 'consumo_detalle.medidakw', 'consumo_detalle.costokw', 'consumo_detalle.igv', 'consumo_detalle.consumokw', 'consumo_detalle.montototalsinigv', 'consumo_detalle.montoigv', 'consumo_detalle.montototalconigv', 'consumo_detalle.montocostoadministrativo', 'consumo_detalle.montopagofraccionado', 'consumo_detalle.montototal')->where('consumo_detalle.idconsumo', '=', $ConsumoLuz[0]->idconsumo)->get();

        array_push($respluz, $ConsumoLuz[0]);
        array_push($respluz, $detalleLuz);


        //---------------------------------------------------------------
        //AGUA

        $ConsumoAgua = ConsumoAgua::query()->where('idanio', $anio)->where('idmes', $mes)->get();

        $detalleAgua = ConsumoAgua_detalle::join('pisos_casa', 'consumoagua_detalle.idpiso', '=', 'pisos_casa.idpiso')
            ->select('pisos_casa.idpiso', 'pisos_casa.descripcion', 'consumoagua_detalle.cantpersonas', 'consumoagua_detalle.montoxpersona', 'consumoagua_detalle.subtotal')->where('consumoagua_detalle.idconsumoagua', '=', $ConsumoAgua[0]->idconsumoagua)->get();

        array_push($respagua, $ConsumoAgua[0]);
        array_push($respagua, $detalleAgua);


        //---------------------------------------------------------------
        //INTERNET

        $ConsumoInternet = ConsumoInternet::query()->where('idanio', $anio)->where('idmes', $mes)->get();

        $detalleInternet = ConsumoInternet_detalle::join('pisos_casa', 'consumointernet_detalle.idpiso', '=', 'pisos_casa.idpiso')
            ->select('pisos_casa.idpiso', 'pisos_casa.descripcion', 'consumointernet_detalle.cantpersonas', 'consumointernet_detalle.montoxpersona', 'consumointernet_detalle.subtotal')->where('consumointernet_detalle.idconsumointernet', '=', $ConsumoInternet[0]->idconsumointernet)->get();

        array_push($respinternet, $ConsumoInternet[0]);
        array_push($respinternet, $detalleInternet);


        return new Content(
            view: 'email.infomail',
            with: ['reciboluz' => $respluz, 'reciboagua' => $respagua, 'recibointernet' => $respinternet],
        );
    }

    // public function build()
    // {
    //     return $this->view('email.infomail');
    // }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
