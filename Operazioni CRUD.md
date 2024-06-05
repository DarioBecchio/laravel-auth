## Creazione 7 rotte operazioni crud

1a- Posso applicarle a tutto il listato. Apro il terminale:

php artisan make:model Nome -a (che genera una migration, seeder,factory,policy,resource controler, and form request for the model)

1b-se non servono posso eliminare i file che non mi servono.

1c-posso creare un controller per gli ospiti. Dovrò spostarlo nella cartella guests
Dovrò modificare il namespace e aggiungerci:

\Guests

Dovremo importare anche il controller:

use App\Http\Controllers\Controller;

Posso farne una copia per l'amministratore, dopo aver creato la cartella per l'admin. Dovrò modificare il namespace

2- Recuper il file creato precedentemente e vado a fare una migrazione:
public function up(): void
{
Schema::create('users', function (Blueprint $table) {
$table->id();
$table->string('name');
$table->string('email')->unique();
$table->timestamp('email_verified_at')->nullable();
$table->string('password');
$table->rememberToken();
$table->timestamps();
});
}
Creo la tabella con le colonne che mi servono e tutti i dati utili
3- Prima di fare la migrazione devo collegare il mio DB. VAdo su .env. Controllo la connection, il port, username e password. Creo un nuovo nome per il DB.
3b- Vado nel seeder

    Apro il terminale e digito php artisan migrate
