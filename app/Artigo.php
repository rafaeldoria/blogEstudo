<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Artigo extends Model
{
    use SoftDeletes;

    protected $fillable = ['titulo', 'descricao', 'conteudo', 'data'];

    protected $dates = ['deleted_at'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public static function listaArtigos($pag)
    {
        $listaArtigos = DB::table('artigos')
                ->join('users','users.id','artigos.user_id')
                ->select('artigos.id','artigos.titulo','artigos.descricao','users.name','artigos.data')
                ->whereNull('deleted_at')
                ->paginate($pag);
        return $listaArtigos;
    }
    public static function listaArtigosSite($pag)
    {
        $listaArtigos = DB::table('artigos')
                ->join('users','users.id','artigos.user_id')
                ->select('artigos.id','artigos.titulo','artigos.descricao','users.name as autor','artigos.data')
                ->whereDate('data','<=',date('Y-m-d'))
                ->whereNull('deleted_at')
                ->orderBy('date','DESC')
                ->paginate($pag);
        return $listaArtigos;
    }
}
