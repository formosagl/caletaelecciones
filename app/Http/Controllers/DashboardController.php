<?php

namespace App\Http\Controllers;

use App\article;
use App\breakingnew;
use App\headertop;
use App\categoria;
use App\ad;
use App\comment;
use App\visitors;
use App\subscriber;
use DB;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function mesas() {
        $categorias = categoria::orderBy('categorianombre')->get();

        return view('dashboardnotes', compact('categorias') );
    }

    public function mesas_store(Request $request) {
        $rules = [
            'titulo'        => 'required|string|min:5|max:110',
            'subtitulo'     => 'required|string|min:5|max:170',
            'imagen'        => 'required|string|min:5|max:180',
            'thumb'         => 'required|string|min:5|max:180',
            'enlace'        => 'required|string|min:5|max:150',
            'texto'         => 'required|min:20',
            'categoria'     => 'required|min:1',
            'hashtags'      => 'max:50'
        ];

        $messages = [
            'titulo.required'   => 'Es necesario ingresar el titulo.',
            'titulo.min'        => 'El titulo debe tener al menos 5 caracteres.',
            'titulo.max'        => 'El titulo no debe tener mas de 110 caracteres.',
            'subtitulo.required' => 'Es necesario ingresar el subtitulo.',
            'subtitulo.min'     => 'El subtitulo debe tener al menos 5 caracteres.',
            'subtitulo.max'     => 'El subtitulo no debe tener mas de 170 caracteres.',
            'imagen.required'   => 'Es necesario recortar la imagen grande.',
            'thumb.required'    => 'Es necesario recortar la imagen pequeña.',
            'enlace.required'   => 'Es necesario generar un enlace.',
            'texto.required'    => 'Es necesario ingresar el texto de la noticia.',
            'texto.min'         => 'Es necesario ingresar el texto de la noticia (mínimo 20 caracteres).',
            'categoria.required' => 'Es necesario ingresar la categoria.',
            'categoria.min'     => 'Es necesario ingresar la categoria.',
            'hashtags.max'      => 'Los hashtags no deben superar los 50 caracteres.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        
        $imagen2nombre = '';
        $imagen3nombre = '';
        $videonombre = '';
        $audionombre = '';
       
        try {
            Storage::disk("publictmp")->move("news-temp/" . $request->imagen, 'news-img/' . '700x435_' . $request->enlace . '.jpg');
            Storage::disk("publictmp")->move('news-temp/' . $request->thumb, 'news-img/' . '110x110_' . $request->enlace . '.jpg');
            Storage::disk("publictmp")->delete('news-temp/' . substr($request->imagen, 8));
        }
        catch (Exception $ex) {
            return back()->with('error', 'No pudimos guardar los recortes de imágen.')->withInput();
        }

        if ($request->hasFile('imagen2')) {
            if ($imagen2 = $request->file('imagen2')) {
                $imagen2nombre = '700x435_' . $request->enlace . '1.jpg';
                $imagen2->move(public_path('news-img'), $imagen2nombre);
            }
        }
        if ($request->hasFile('imagen3')) {
            if ($imagen3 = $request->file('imagen3')) {
                $imagen3nombre = '700x435_' . $request->enlace . '2.jpg';
                $imagen3->move(public_path('news-img'), $imagen3nombre);
            }
        }
        if ($request->hasFile('video')) {
            if ($video = $request->file('video')) {
                $videonombre = 'vid_' . $request->enlace . '.mp4';
                $video->move(public_path('news-vids'), $videonombre);
            }
        }
        if ($request->hasFile('audio')) {
            if ($audio = $request->file('audio')) {
                $audionombre = 'audio_' . $request->enlace . '.mp3';
                $audio->move(public_path('news-audio'), $audionombre);
            }
        }

        $article = new article();
        $article->titulo = $request->titulo;
        $article->subtitulo = $request->subtitulo;
        $article->categoria_id = $request->categoria;
        $article->imagen = '700x435_' . $request->enlace . '.jpg';
        $article->thumb = '110x110_' . $request->enlace . '.jpg';
        $article->imagen2 = $imagen2nombre;
        $article->descripcion2 = $request->descripcion2;
        $article->imagen3 = $imagen3nombre;
        $article->descripcion3 = $request->descripcion3;
        $article->video = $videonombre;
        $article->descripcionvideo = $request->descripcionvideo;
        $article->audio = $audionombre;
        $article->descripcionaudio = $request->descripcionaudio;
        $article->hashtags = $request->hashtags;
        $article->permalink = $request->permalink;
        $article->texto = str_replace(array('<br/>','<br />','<br/>'),'', preg_replace('/[\r\n|\n|\r]+/', '', $request->texto) );
        $article->autor = auth()->user()->name;
        $article->mostrarimagen = "1";
        $article->estado = "0";
        if ($request->nivel == "5") {
            $article->created_at = strtotime("+3 days");
        }
        $article->nivel = $request->nivel;
        $article->comentarios = $request->comentarios;
        $article->visible = "1";
        $article->vistas = "0";
        $article->permalink = $request->enlace;
        $article->save();

        return back()->with('error', 'todoquei.')->withInput();

        //return back()->with('success', 'Noticia creada con exito.');
    }

    public function notes_super() {
        $categorias = categoria::orderBy('categorianombre')->get();

        return view('dashboardnotessuper', compact('categorias') );
    }

    public function notes_super_store(Request $request) {
        $rules = [
            'titulo'        => 'required|string|min:5|max:110',
            'subtitulo'     => 'required|string|min:5|max:170',
            'imagen'        => 'required|string',
            'thumb'         => 'required|string',
            'enlace'        => 'required|string|min:5|max:150',
            'texto'         => 'required|min:20',
            'categoria'     => 'required|min:1',
            'hashtags'      => 'max:50',
            'created_at'    => 'required|string|max:10'
        ];

        $messages = [
            'titulo.required'   => 'Es necesario ingresar el titulo.',
            'titulo.min'        => 'El titulo debe tener al menos 5 caracteres.',
            'titulo.max'        => 'El titulo no debe tener mas de 110 caracteres.',
            'subtitulo.required' => 'Es necesario ingresar el subtitulo.',
            'subtitulo.min'     => 'El subtitulo debe tener al menos 5 caracteres.',
            'subtitulo.max'     => 'El subtitulo no debe tener mas de 170 caracteres.',
            'imagen.required'   => 'Es necesario ingresar la imagen grande.',
            'thumb.required'    => 'Es necesario ingresar la imagen pequeña.',
            'enlace.required'   => 'Es necesario generar un enlace.',
            'texto.required'    => 'Es necesario ingresar el texto de la noticia.',
            'categoria.required' => 'Es necesario ingresar la categoria.',
            'categoria.min'     => 'Es necesario ingresar la categoria.',
            'hashtags.max'      => 'Los hashtags no deben superar los 50 caracteres.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $article = new article();
        $article->titulo = $request->titulo;
        $article->subtitulo = $request->subtitulo;
        $article->categoria_id = $request->categoria;
        $article->imagen = $request->imagen;
        $article->imagen2 = $request->imagen2;
        $article->imagen3 =$request->imagen3;
        $article->thumb = $request->thumb;
        $article->hashtags = $request->hashtags;
        $article->permalink = $request->permalink;
        $article->texto = str_replace(array('<br/>','<br />','<br/>'),'', preg_replace('/[\r\n|\n|\r]+/', '', $request->texto) );
        $article->autor = auth()->user()->name;
        $article->mostrarimagen = "1";
        $article->estado = "1";
        $article->nivel = $request->nivel;
        $article->created_at = $request->created_at . " 03:00:00";
        $article->comentarios = $request->comentarios;
        $article->visible = "1";
        $article->vistas = "0";
        $article->permalink = $request->enlace;
        $article->save();

        return back()->with('success', 'Noticia SUPER creada con exito.');
    }

    public function notes_publish() {
        $borradores = article::where('estado','0')->orderBy('created_at','desc')->paginate(15);

        return view('dashboardnotes-publish', compact('borradores') );
    }

    public function notes_publish_update($articleid) {
       
        if ($article = article::findOrFail($articleid)) {
            $article->estado = "1";
            $article->save();

            return redirect()->route('notas.publish')->with('success', 'Noticia publicada con exito.');
        }

        return back()->with('error', 'No pudimos publicar la noticia.');
    }

    public function notes_edit_list() {
        $articles = article::orderBy('created_at','desc')->paginate(15);

        return view('dashboardnotes-edit-list', compact('articles') );
    }

    public function notes_edit($articleid) {
        if ($article = article::findOrFail($articleid)) {
            $categorias = categoria::all();

            return view('dashboardnotes-edit', compact('article','categorias') );
        }

        return back()->with('error', 'No pudimos editar la noticia.');
    }

    public function notes_edit_update(Request $request) {
       
       if ($article = article::findOrFail($request->articleid)) {

            $rules = [
                'titulo'        => 'required|string|min:5|max:110',
                'subtitulo'     => 'required|string|min:5|max:170',
                'texto'         => 'required|min:20',
                'hashtags'      => 'max:50'
            ];

            $messages = [
                'titulo.required'   => 'Es necesario ingresar el titulo',
                'titulo.min'        => 'El titulo debe tener al menos 5 caracteres.',
                'titulo.max'        => 'El titulo no debe tener mas de 110 caracteres.',
                'subtitulo.required' => 'Es necesario ingresar el subtitulo.',
                'subtitulo.min'     => 'El subtitulo debe tener al menos 5 caracteres.',
                'subtitulo.max'     => 'El subtitulo no debe tener mas de 170 caracteres.',
                'texto.required'    => 'Es necesario ingresar el texto de la noticia.',
                'hashtags.max'      => 'Los hashtags no deben superar los 50 caracteres.'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            if ($request->hasFile('imagen')) {
                if ($imagen1 = $request->file('imagen')) {
                    $imagen1nombre = '700x435_' . $request->enlace . date("YmBi") . '.jpg';
                    $imagen1->move(public_path('news-img'), $imagen1nombre);
                    $article->imagen = $imagen1nombre;
                }
            }
            if ($request->hasFile('imagen2')) {
                if ($imagen2 = $request->file('imagen2')) {
                    $imagen2nombre = '700x435_' . $request->enlace . date("YmBi") . '1.jpg';
                    $imagen2->move(public_path('news-img'), $imagen2nombre);
                    $article->imagen2 = $imagen2nombre;
                    $article->descripcion2 = $request->descripcion2;
                }
            }
            if ($request->hasFile('imagen3')) {
                if ($imagen3 = $request->file('imagen3')) {
                    $imagen3nombre = '700x435_' . $request->enlace . date("YmBi") . '2.jpg';
                    $imagen3->move(public_path('news-img'), $imagen3nombre);
                    $article->imagen3 = $imagen3nombre;
                    $article->descripcion3 = $request->descripcion3;
                }
            }
            if ($request->hasFile('thumb')) {
                if ($thumb = $request->file('thumb')) {
                    $thumbnombre = '110x110_' . $request->enlace . date("YmBi") . '.jpg';
                    $thumb->move(public_path('news-img'), $thumbnombre);
                    $article->thumb = $thumbnombre;
                }
            }
    
            if ($request->hasFile('video')) {
                if ($video = $request->file('video')) {
                    $videonombre = 'vid_' . $request->enlace . date("YmBi") . '.mp4';
                    $video->move(public_path('news-vids'), $videonombre);
                    $article->video = $videonombre;
                    $article->descripcionvideo = $request->descripcionvideo;
                }
            }

            if ($request->hasFile('audio')) {
                if ($audio = $request->file('audio')) {
                    $audionombre = 'audio_' . $request->enlace . date("YmBi") . '.mp3';
                    $audio->move(public_path('news-audio'), $audionombre);
                    $article->audio = $audionombre;
                    $article->descripcionaudio = $request->descripcionaudio;
                }
            }

            $article->titulo = $request->titulo;
            $article->subtitulo = $request->subtitulo;
            $article->categoria_id = $request->categoria;
            $article->hashtags = $request->hashtags;
            $article->texto = str_replace(array('<br/>','<br />','<br/>'),'', preg_replace('/[\r\n|\n|\r]+/', '', $request->texto) );
            $article->nivel = $request->nivel;
            $article->comentarios = $request->comentarios;
            $article->save();

            return redirect()->route('notas.edit.list')->with('success', 'Noticia editada con exito.'); 

        }

        return back()->with('error', 'No pudimos editar la noticia.');
    }

    public function notes_delete($articleid) {
        if ($article = article::findOrFail($articleid)) {
            $article->delete();

            return redirect()->route('notas.edit.list')->with('success', 'Noticia eliminada con exito.');
        }

        return back()->with('error', 'No pudimos eliminar la noticia.');
    }

    public function notes_hide($articleid) {
        if ($article = article::findOrFail($articleid)) {
            $article->visible = "0";
            $article->save();

            return back()->with('success', 'Noticia ocultada con exito.');
        }

        return back()->with('error', 'No pudimos ocultar la noticia.');
    }

    /**
     * Comentarios
     */
    public function comentarios() {
        $comentarios = comment::select('p18_comments.*', 'p18_subscribers.*', 'p18_articles.titulo')
                                ->join('p18_subscribers', 'p18_comments.subscriber_id', '=', 'p18_subscribers.subscriber_id')
                                ->join('p18_articles', 'p18_comments.article_id', '=', 'p18_articles.id')
                                ->orderBy('created_at','desc')->paginate(30);

        return view('dashboardcomments-list', compact('comentarios') );
    }

    public function comentarios_delete($id) {
        if ($comentarios = comment::findOrFail($id)) {
            $comentarios->delete();

            return back()->with('success', 'Comentario eliminado con exito.');
        }

        return back()->with('error', 'No pudimos eliminar el comentario.');
    }

    /**
     * Suscriptores
     */
    public function suscriptores() {
        $suscriptores = subscriber::orderBy('apellido')->paginate(20);

        return view('dashboardsubscriptors-list', compact('suscriptores') );
    }

    public function suscriptores_block($id) {
        if ($suscriptor = subscriber::findOrFail($id)) {
            $suscriptor->verificado = 0;
            $suscriptor->save();
            //$suscriptor->delete();

            return back()->with('success', 'Suscriptor bloqueado con exito.');
        }

        return back()->with('error', 'No pudimos bloquear al suscriptor.');
    }

    /**
     * Config
     */
    public function config() {
        $configuracion = headertop::findOrFail(1);

        return view('dashboardconfig', compact('configuracion') );
    }

    public function config_update(Request $request) {
        if ($configuracion = headertop::findOrFail(1)) {
            $rules = [
                'videoyoutube'        => 'required|string|min:5|max:15',
                'tituloelecciones1'   => 'required|string|min:3|max:60',
                'tituloelecciones2'   => 'required|string|min:3|max:60',
                'tituloelecciones3'   => 'required|string|min:3|max:60'
            ];

            $messages = [
                'videoyoutube.required'         => 'Es necesario ingresar el codigo de video',
                'videoyoutube.min'              => 'El codigo de video debe tener al menos 5 caracteres.',
                'videoyoutube.max'              => 'El codigo de video no debe tener mas de 15 caracteres.',
                'tituloelecciones1.required'    => 'Es necesario ingresar el titulo #1',
                'tituloelecciones1.min'         => 'El titulo #1 debe tener al menos 3 caracteres.',
                'tituloelecciones1.max'         => 'El titulo #1 no debe tener mas de 60 caracteres.',
                'tituloelecciones2.required'    => 'Es necesario ingresar el titulo #2',
                'tituloelecciones2.min'         => 'El titulo #2 debe tener al menos 3 caracteres.',
                'tituloelecciones2.max'         => 'El titulo #2 no debe tener mas de 60 caracteres.',
                'tituloelecciones3.required'    => 'Es necesario ingresar el titulo #3',
                'tituloelecciones3.min'         => 'El titulo #3 debe tener al menos 3 caracteres.',
                'tituloelecciones3.max'         => 'El titulo #3 no debe tener mas de 60 caracteres.'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $configuracion->visible = $request->mostrarencabezado == '1' ? 1 : 0;
            $configuracion->encuestavisible = $request->mostrarencuestas == '1' ? 1 : 0;
            $configuracion->eleccionesvisible1 = $request->mostrarelecciones1 == '1' ? 1 : 0;
            $configuracion->eleccionestitulo1 = $request->tituloelecciones1;
            $configuracion->eleccionesvisible2 = $request->mostrarelecciones2 == '1' ? 1 : 0;
            $configuracion->eleccionestitulo2 = $request->tituloelecciones2;
            $configuracion->eleccionesvisible3 = $request->mostrarelecciones3 == '1' ? 1 : 0;
            $configuracion->eleccionestitulo3 = $request->tituloelecciones3;
            $configuracion->eleccionesresvisible = $request->mostrareleccionesres;
            $configuracion->youtubevisible = $request->mostraryoutube == '1' ? 1 : 0;
            $configuracion->videoyoutube = $request->videoyoutube;
            
            $configuracion->save();

            return redirect()->route('config')->with('success', 'Configuración actualizada con exito.'); 
        }

        return back()->with('error', 'No pudimos actualizar la configuración.');
    }

    /**
     * Publicidades
     */
    public function ads() {
        $ads = ad::findOrFail(1);

        return view('dashboardads', compact('ads') );
    }

    public function ads_update(Request $request) {
        if ($ads = ad::findOrFail(1)) {

            $adslist = array('1l' => 'linea1_i',
                            '1r' => 'linea1_d',
                            '1c1' => 'linea1_c1',
                            '1c2' => 'linea1_c2',
                            '1c3' => 'linea1_c3',
                            '1c4' => 'linea1_c4',
                            '2l' => 'linea2_i',
                            '2r' => 'linea2_d',
                            '2c1' => 'linea2_c1',
                            '2c2' => 'linea2_c2',
                            '2c3' => 'linea2_c3',
                            '2c4' => 'linea2_c4',
                            '3l' => 'linea3_i',
                            '3r' => 'linea3_d',
                            '3c1' => 'linea3_c1',
                            'banner1' => 'banner1');

                            /*                            
                            '3c2' => 'linea3_c2',
                            '3c3' => 'linea3_c3',
                            '3c4' => 'linea3_c4',
                            */


            foreach ($adslist as $key => $val) {
                if ($request['quitar' . $key] == '1') {
                    $ads[$val] = "ads-" . $key . ".jpg";
                    $ads[$val . '_link'] = "https://wa.me/5492974725439";
                } else {
                    if ($request['enlace' . $key] != '') {
                        $ads[$val . '_link'] = $request['enlace' . $key];
                    } else {
                        $ads[$val . '_link'] = "#";
                    }
                    if ($request->hasFile('imagen' . $key)) {
                        // modificar imagen y enlace
                        if ($imagen = $request->file('imagen' . $key)) {
                            $extension = (strpos($request->file('imagen' . $key),'.gif') === false) ? ".jpg" : ".gif";

                            $imagennombre = 'ads_' . date("YmBi") . $extension;
                            $imagen->move(public_path('ads'), $imagennombre);
                            $ads[$val] = $imagennombre;
                        }
                    }
                }
            }

            $ads->save();

            return back()->with('success', 'Actualizamos con éxito las publicidades.'); 
 
         }
 
         return back()->with('error', 'No pudimos actualizar las publicidades.');
     }

    /*
    * Backup
    */
    public function backup() {

        if ($tables = DB::select('SHOW TABLES')) {
            $sqlScript = "";
            
            foreach ($tables as $table) {
                
                /* create table */

                if (auth()->user()->level == 5) {
                    $createtable = DB::select("SHOW CREATE TABLE " . $table->Tables_in_u813903447_premisa);

                    $sqlScript .= "\n\n" . $createtable[0]->{'Create Table'} . ";\n\n";
                }

                $fieldlist = DB::select("SHOW COLUMNS FROM " . $table->Tables_in_u813903447_premisa);

                $insertquery = "INSERT INTO " . $table->Tables_in_u813903447_premisa . " (";
                foreach ($fieldlist as $fieldname) {
                    $insertquery .= $fieldname->Field . ',';
                }
                $insertquery = substr($insertquery,0,-1) . ') VALUES (';
                
                /* Inserts */

                $rows = DB::select("SELECT * FROM " . $table->Tables_in_u813903447_premisa);

                foreach ($rows as $row) {
                    $sqlScript .= $insertquery;
                    foreach ($fieldlist as $fieldname) {
                        if (isset($row->{$fieldname->Field})) {
                            $sqlScript .= '"' . str_replace('"','\"', $row->{$fieldname->Field}) . '",';
                        } else {
                            $sqlScript .= '"",';
                        }
                    }
                    $sqlScript = substr($sqlScript,0,-1) . ");\n";
                }
                $sqlScript .= "\n";
            }
        } 

        if(!empty($sqlScript)) {
            $backup_file_name = 'public/img/premisa_backup_' . time() . '.bak';
            $fileHandler = fopen($backup_file_name, 'w+');
            $number_of_lines = fwrite($fileHandler, $sqlScript);
            fclose($fileHandler); 

            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
            header('Content-Transfer-Encoding: binary');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($backup_file_name));
            ob_clean();
            flush();
            readfile($backup_file_name);
            exec('rm ' . $backup_file_name); 
        }

        return back()->with('success', 'Backup realizado con exito.');
    }

    /**
     * Categorias
     */
    public function category() {
        $categorias = categoria::orderByDesc('visible')->orderBy('categoria_id')->paginate(10);

        return view('dashboardcategory', compact('categorias') );
    }

    public function category_store(Request $request) {
        $rules = [
            'nombre'        => 'required|string|min:5|max:45',
            'enlace'        => 'required|string|min:5|max:45'
        ];

        $messages = [
            'nombre.required'   => 'Es necesario ingresar el nombre',
            'nombre.min'        => 'El nombre debe tener al menos 5 caracteres.',
            'nombre.max'        => 'El nombre no debe tener mas de 45 caracteres.',
            'enlace.required'   => 'Es necesario generar un enlace',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $categoria = categoria::firstOrCreate([
            'categorianombre'   => $request->nombre,
            'enlace'            => $request->enlace,
            'visible'           => ($request->visible == '1')
        ]);

        $categorias = categoria::all();

        return redirect()->route('categorias')->with('categorias', $categorias)->with('success', 'Categoría creada con exito.');
    }

    public function category_showhide($categoryid, $value) {
        if ($categoria = categoria::findOrFail($categoryid)) {
            $categoria->visible = $value;
            $categoria->save();

            return back()->with('success', 'Visibilidad de Categoria actualizada.');
        }

        return back()->with('error', 'No pudimos actualizar la visibilidad de la categoria.');
    }

    /**
     * Ultimas noticias
     */
    public function breakingnews() {
        $breakingnews = breakingnew::orderBy('created_at','desc')->get();

        return view('dashboardbreakingnews', compact('breakingnews') );
    }

    public function breakingnews_store(Request $request) {
        $rules = [
            'titulo' => 'required|string|min:5|max:100',
            'enlace' => 'required|string|min:5|max:150'
        ];

        $messages = [
            'titulo.required'   => 'Es necesario ingresar el titulo',
            'titulo.min'        => 'El titulo debe tener al menos 5 caracteres.',
            'titulo.max'        => 'El titulo no debe tener mas de 100 caracteres.',
            'enlace.required'   => 'Es necesario ingresar el enlace',
            'enlace.min'        => 'El enlace debe tener al menos 5 caracteres.',
            'enlace.max'        => 'El enlace no debe tener mas de 150 caracteres.'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $request['autor'] = auth()->user()->name;

        breakingnew::create($request->all());

        return back()->with('success', 'Ultima Noticia creada con exito.');
    }

    public function breakingnews_delete($breakingid) {
        if ($breaking = breakingnew::findOrFail($breakingid)) {
            $breaking->delete();

            return back()->with('success', 'Ultima Noticia eliminada con exito.');
        }

        return back()->with('error', 'No pudimos eliminar la ultima noticia.');
    }

    /**
     * Encabezado
     */
    public function header() {
        $headertop = headertop::findOrFail(1);

        return view('dashboardheader', compact('headertop') );
    }

    public function header_update(Request $request) {
        if ($header = headertop::findOrFail(1)) {
            $rules = [
                'frase'         => 'required|string|min:5|max:240',
                'autor'         => 'required|string|min:5|max:20',
                'enlace'        => 'required|string|min:1|max:150',
                'imagen'        => 'image|mimes:png|max:2048'
            ];

            $messages = [
                'frase.required'    => 'Es necesario ingresar la frase',
                'frase.min'         => 'La frase debe tener al menos 5 caracteres.',
                'frase.max'         => 'La frase no debe tener mas de 240 caracteres.',
                'autor.required'    => 'Es necesario ingresar el autor.',
                'autor.min'         => 'El autor debe tener al menos 5 caracteres.',
                'autor.max'         => 'El autor no debe tener mas de 20 caracteres.',
                'enlace.required'   => 'Es necesario ingresar el enlace de la noticia.',
                'enlace.max'        => 'El enlace no debe tener mas de 150 caracteres.',
                'imagen.mimes'      => 'Es necesario ingresar la imagen en formato png'
            ];

            $validator = Validator::make($request->all(), $rules, $messages);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            $imagennombre = 'header_premisa.png';
        
            if ($request->hasFile('imagen')) {
                if ($imagen = $request->file('imagen')) {
                    $imagennombre = 'header_' . date('Ymdhis') . '.png';
                    $imagen->move(public_path('header-img'), $imagennombre);
                    $header->imagen = $imagennombre;
                }
            }

            $header->texto = $request->frase;
            $header->autor = $request->autor;

            if (strpos($request->enlace, "article/") === false) {
                $header->enlace = $request->enlace;
            } else {
                $header->enlace = explode("article/", $request->enlace)[1];
            }

            $header->visible = $request->visible == '1' ? 1 : 0;
            $header->save();

            return redirect()->route('encabezado')->with('success', 'Encabezado editado con exito.'); 
        }

        return back()->with('error', 'No pudimos actualizar el encabezado.');
    }

    /**
     * Show the application dashboard.
     */
    public function index() {
        $visitors = visitors::all()->count();
        $articles = article::where('estado','1')->orderByDesc('vistas')->take(5)->get();
        $noticias = article::where('estado','1')->count();
        $borradores = article::where('estado','0')->latest()->take(5)->get();
        $borradorescant = article::where('estado','0')->count();

        // SELECT distinct LEFT(created_at, 10) as fecha, count(*) as total FROM u813903447_premisa.p18_visitors group by fecha order by fecha limit 12

        $visitcharts = visitors::selectRaw('COUNT(*) as total, LEFT(created_at, 10) as fecha')
            ->distinct('fecha')
            ->groupBy('fecha')
            ->orderByDesc('fecha')
            ->take(15)
            ->get();

        $fechas = "";
        $visitas = "";

        foreach ($visitcharts as $visitchart) {
            $fechas = '"' . substr($visitchart->fecha,8,2) . '/' . substr($visitchart->fecha,5,2) . '",' . $fechas;
            $visitas = $visitchart->total . ',' . $visitas;
        }

        return view('dashboard', compact('articles','noticias','borradores','borradorescant','visitors', 'fechas', 'visitas') );
    }
}
