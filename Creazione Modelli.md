## CREAZIONE MODELLO MANY TO MANY

1- php artisan make:model nameModel category-mscrR (migration, seeder, controller,tipo risorsa, e form request);
2- Iniziamo andando dentro la migrazione e definiamo il Type $table->string('category' , 30)->unique() ; $table->string('slug');
3- Poi andiamo nel seeder e creiamo una lista di types: $types = ['','',];
Facciamo un foreach ($categories as $category){
    $categories = ['Programming', 'Fullstack','Backend', 'IoT', 'Cyber security'];
        foreach ($category as $cat) {
            $category = new Category();
            $category->name =$cat;
$category->slug = Str::slug($cat,'-');
$category->save();
}
}
3a- Aggiungo il seeder creato al database dei seeder
class DatabaseSeeder extends Seeder
{
/\*\*
_ Seed the application's database.
_/
public function run(): void
{
$this->call([
ProjectSeeder::class
]);
}
}
Scrivo nel terminale: php artisan db:seed --class=Nameseeder

3b- Importiamo il modello e Str nei seeder
use Illuminate\Support\Str;
use App\Models\Category;

3c- Dobbiamo fare la migrazione quindi tramite terminale: php artisan migrate

4- Adesso dobbiamo 'seedare', nel terminale scrivo:
-php artisan ti
Per recuperare i dati dal database
-App\Models\Category::all();

5- Creo la migrazione per la chiave esterna(relazione many to many):
php artisan make:migration add_category_id_foreign_to_projects_table
Apro la migrazione creata :
return new class extends Migration

    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
           //create the column that wil hold a foreign key
            $table->unsignedBigInteger('category_id')->nullable()->after('id');

           $table->foreign('category_id')
           ->references('id')
           ->on('categories')
           ->nullOnDelete();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //1.Drop the foreign
            $table->dropForeign('post_category_id_foreign');
              // 2.Drop the column
            $table->dropColumn('category_id');
        });
    }

};
5a- Apro terminale :

-   php artisan ti;
-   dovrebbe esserci la chiave esterna associata;

5b- Adesso creo la relazione, vado nel modello, Project.php:

class Project extends Model
{
use HasFactory;

    protected $fillable = ['title', 'content', 'slug', 'cover_image','category_id'];

    public function category():BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

}

Importo il belongsto:
use Illuminate\Database\Eloquent\Relations\BelongsTo;

Faccio la stessa cosa nel Modello Category
class Category extends Model
{
use HasFactory;

    public function project():HasMany
    {
        return $this->hasMany(Project::class);
    }

}

importo hasmany
use Illuminate\Database\Eloquent\Relations\HasMany;

5c-controllo che il collegamento funziona:
php artisan ti

-   seleziono il progetto id_1
    $project = Project::find(1);
-   assegno a category_id una chiave esterna id=1
    $project->type_id = 1;
-   salvo
    $project->save();

Riapro artisan ti
$project = Project::find(1);
Recupero la category associata:
$project->category

FAre un commit dopo tutte queste operazioni
