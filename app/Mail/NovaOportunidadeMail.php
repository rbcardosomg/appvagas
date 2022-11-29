<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\EstagioVaga;

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
    public function __construct(EstagioVaga $estagiovaga)
    {
        $this->area_atuacao = $estagiovaga->area_atuacao;
        $this->data_limite_procura = date('d/m/Y', strtotime($estagiovaga->data_limite_procura));
        $this->url = 'http://appvagas.test/estagiovaga/'.$estagiovaga->id;
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
