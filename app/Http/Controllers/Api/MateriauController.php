<?php
namespace App\Http\Controllers\Api;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;
use App\Models\Materiau;

class MateriauController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        $output = new ConsoleOutput();
        $output->writeln("Get all materiaux");
        return response()->json(Materiau::all());
    }

    public function store(Request $request)
    {
        $output = new ConsoleOutput();
        $output->writeln("Add new materiau");
        $output->writeln("Request data: " . json_encode($request->all()));

        $request->validate([
            'materiau' => 'required|string|max:255',
        ]);

        $materiau = Materiau::create($request->all());

        $output->writeln("Materiau created: " . json_encode($materiau));
        return response()->json($materiau, 201);
    }
    public function update(Request $request, $id)
    {
        $output = new ConsoleOutput();
        $output->writeln("Update materiau");
        $output->writeln("Request data: " . json_encode($request->all()));

        try {
            $materiau = Materiau::find($id);
            if (!$materiau) {
                return response()->json(['error' => 'Materiau non trouvé'], 404);
            }
            $request->validate([
                'materiau' => 'required|string|unique:materiaux,materiau,' . $id
            ]);
            $materiau->update([
                'materiau' => $request->materiau
            ]);
            $output->writeln("Materiau updated: " . json_encode($materiau));
            return response()->json($materiau, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $output = new ConsoleOutput();
        $output->writeln("Delete materiau with id: " . $id);
        $materiau = Materiau::findOrFail($id);
        $materiau->delete();
        $output->writeln("Materiau deleted: " . json_encode($materiau));
        return response()->json(null, 204);
    }
    public function show($id)
    {
        $output = new ConsoleOutput();
        $output->writeln("Get materiau with id: " . $id);
        $materiau = Materiau::findOrFail($id);
        return response()->json($materiau);
    }
}
