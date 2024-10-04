<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('examens', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->dateTime('date');
            $table->unsignedBigInteger("course_id");
            $table->foreign("course_id")->references("id")->on("courses")->onDelete("restrict")->onUpdate("restrict");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examens');
    }
};





<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Examen;
use Illuminate\Http\Request;

class ExamenController extends Controller
{
    public function index(){
        $examens = Examen::with('course')->paginate(10);
        return view("examens.index" , compact("examens"));
    }
    public function create(){
        $courses = Course::all();
        return view("examens.create", compact("courses"));
    }

    public function store(Request $request){
        $validation = $request->validate([
            "title" =>"required",
            "date" => "required|date",
            "course_id" => "required|exists:courses,id"
        ]);

        Examen::create($validation);
        return redirect()->route('examen.index')->with("success_message","L'examen  a été enregistré avec succès!");
    }

    public function edit(Examen $examen){
        $courses = Course::all();
        return view("examens.edit",compact("examen","courses"));
    }

    public function update(Request $request , Examen $examen){
        $validation = $request->validate([
            "title" =>"required",
            "date" => "required|date",
            "course_id" => "required|exists:courses,id"
        ]);
        Examen::where('id',$examen->id)->update($validation);
        return redirect()->route('examen.index')->with("success_message","Mise à jour de l'examen $examen->title avec succès!");

    }

    public function delete(Examen $examen){
       $result =  $examen -> delete();
       if ($result){
        return redirect()->route("examen.index")->with("success_message","Suppression de l'examen $examen->title avec succès!");
       }
        
    }
}

<?php

namespace App\Models;

use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Examen extends Model
{
    use HasFactory;

    protected $fillable =[
        "title",
        "date",
        "course_id"
    ];

    /**
     * Get the course that owns the Examen
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }
}
