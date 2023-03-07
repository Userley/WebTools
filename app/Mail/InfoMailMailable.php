<?php

namespace App\Mail;

use App\Models\Consumo;
use App\Models\Consumo_detalle;
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

    public $luz;
    public $agua;
    public $internet;
    public function __construct($luz,  $agua,  $internet)
    {
        $this->luz = $luz;
        $this->agua = $agua;
        $this->internet = $internet;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Detalle de consumo',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        $resp = [];
        //LUZ
        $mesLuz = explode("-", $this->luz)[0];
        $anioLuz = explode("-", $this->luz)[1];

        $Consumo = Consumo::query()->where('idanio', $anioLuz)->where('idmes', $mesLuz)->get();

        $detalle = Consumo_detalle::join('pisos_casa', 'consumo_detalle.idpiso', '=', 'pisos_casa.idpiso')
            ->select('pisos_casa.idpiso', 'pisos_casa.descripcion', 'consumo_detalle.medidakw', 'consumo_detalle.costokw', 'consumo_detalle.igv', 'consumo_detalle.consumokw', 'consumo_detalle.montototalsinigv', 'consumo_detalle.montoigv', 'consumo_detalle.montototalconigv', 'consumo_detalle.montocostoadministrativo', 'consumo_detalle.montopagofraccionado', 'consumo_detalle.montototal')->where('consumo_detalle.idconsumo', '=', $Consumo[0]->idconsumo)->get();

        array_push($resp, $Consumo[0]);
        array_push($resp, $detalle);

        return new Content(
            view: 'email.infomail',
            with: ['reciboluz' => $resp, 'reciboagua' => $this->agua, 'recibointernet' => $this->internet],
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
