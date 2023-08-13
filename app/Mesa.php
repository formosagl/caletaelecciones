<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'pmesa_escuela','pmesa_mesa','votoscambiacaleta','votoscoaliciontuespacio','votosjuntosparacambiarcaleta','votosjuntospodemos','votosporcaleta',
        'votos19dediciembre','votoscaletacrece','votoscaletanosune','votoscaletasi','votoscaminoalavictoria','votosdesarrollocaletense','votoselegimoscreer',
        'votosfuezajoven','votoshastalavictoria','votoskolinacaleta','votoslealtadycompromiso','votosmascerca','votosmejorcaleta','votosnaceunaesperanza',
        'votospensarcaletense','votospropuestajoven','votosproyectojoven','votosunidadycompromiso','votosfrentedeizquierda','votoscambiandostacruz','votosconsensopro',
        'votosesahora','votoslafuerzadelcambio','votosmassantacruz','votosmilei','votosparacrecer','votospodemosrenovar','votosporcaletaoliv','votossantacruzpuede',
        'votossoluciones','votossomosstacruz','votosnulos','votosrecurridos','votosimpugnados','votoscomelectoral','votosblanco','totalgral','cargadopor'
    ];

    protected $primaryKey = 'pmesa_id';    
    protected $table = 'pmesa';
}
