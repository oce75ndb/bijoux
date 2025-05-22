<?php
namespace App\Http\Controllers\Api;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Symfony\Component\Console\Output\ConsoleOutput;
use App\Models\Style;
use Illuminate\Support\Facades\Auth;

class StyleController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:sanctum');
    // }

    public function index()
    {
        // if (!Auth::guard('sanctum')->check()) {
        //     return response()->json(['message' => 'Unauthorized'], 401);
        // }
        $output = new ConsoleOutput();
        $output->writeln("Get all styles");
        return response()->json(Style::all());
    }

    public function store(Request $request)
    {
        $output = new ConsoleOutput();
        $output->writeln("Add new style");
        $output->writeln("Request data: " . json_encode($request->all()));

        $request->validate([
            'style' => 'required|string|max:255',
        ]);
        
        $style = Style::create($request->all());

        $output->writeln("Style created: " . json_encode($style));
        return response()->json($style, 201);
    }

    public function destroy($id)
    {
        $output = new ConsoleOutput();
        $output->writeln("Delete style with id: " . $id);
        $style = Style::findOrFail($id);
        $style->delete();
        $output->writeln("Style deleted: " . json_encode($style));
        return response()->json(null, 204);
    }
    public function show($id)
    {
        $output = new ConsoleOutput();
        $output->writeln("Get style with id: " . $id);
        $style = Style::findOrFail($id);
        return response()->json($style);
    }
}
