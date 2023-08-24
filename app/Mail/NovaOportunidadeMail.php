<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Vaga;

class NovaOportunidadeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $area_atuacao;
    public $data_limite_procura;
    public $url;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Vaga $vaga)
    {
        $this->area_atuacao = $vaga->area_atuacao;
        $this->data_limite_procura = date('d/m/Y', strtotime($vaga->data_limite_procura));
        $this->url = env('APP_URL').'/admin/vaga/'.$vaga->id.'/edit';
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.nova-oportunidadeestagio')->subject('Nova oportunidade de estágio');
    }
}