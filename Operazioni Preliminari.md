## Creazione layout iniziale

1- Copio e incollo in una nuova cartella che creo (layouts) il file welcome.blade, che è nella cartella resources/views.
1b- Dò al nuovo file il nome app.blade.php:
-al posto di styles metto il link per nostre risorse: @vite(['resources/js/app.js' ,'resources/js/app.js']);

-aggiungo yeld <main class="">
@yield('content')

</main>

-nel body aggiungo gli @include(partials.header), @include(partials.footer);

2- Creo la cartella partials in views, per creare header.blade e footer.blade, che saranno uguali dappertutto.

3- Creo la pasgina di benvenuto welcome.blade:
@extends('layouts.app')
@section('content')
all'interno creo il layout
@endsection

4-Dal terminale devo lanciare:

-   npm i e run dev

---

## Creazione delle rotte

La pagina web che creo potrebbe avere bisogno delle rotte per connettersi a pagine diverse dalla principale, o per visualizzare immagini singole etc..

1- Apro il terminale e creo un Controller per gli utenti che si connettono al nostro sito:
php artisan make:controller Guests/PageController
1b- Vado in web.php:

Scrivo PageController e gli assegno il metodo , 'home'

Route::get('/', [PageController::class, 'home'])->name('home');

2b- Clicco con Ctrl+click mouse su PAge controller per aprire la classe:

class PageController extends Controller
{
public function home(){
return view(guests.home)
}
}

3-Apro la cartella views, creo la cartella guests, e creo il file home.blade.php, copio il contenuto del file welcome.blade e poi lo elimino.

4- Creo le rotte per tutto il listato su web.php

Route::get('/characters',[PageController::class, 'characters'])->name('characters');

5- Torno su PageController e le gestisco creando le view per tutte rotte create:

public function home(){
return view(characters.home)
}
