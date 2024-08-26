<?php

namespace App\Http\Controllers;

use App\Http\Requests\CargoFilterRequest;
use App\Http\Requests\CargoRequest;
use App\Models\Cargo;
use App\Models\Region;
use App\Services\FilterService;
use App\Services\QrCodeService;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CargoController extends Controller
{

    public QrCodeService $qrCodeService;
    public FilterService $filterService;

    public function __construct(QrCodeService $qrCodeService, FilterService $filterService)
    {
        $this->qrCodeService = $qrCodeService;
        $this->filterService = $filterService;
    }

    public function index(CargoFilterRequest $request) {

        $cargosCount = Cargo::count();

        $filters = array_filter($request->all(), function($value) {
            return $value !== null && $value !== '';
        });

        $query = Cargo::with(['loadRegion', 'loadCity', 'unloadRegion', 'unloadCity'])->latest('id');

        $cargos = $this->filterService->filter($query, $filters);

        $cargos->appends($filters);

        return view('cargo.index', compact('cargos', 'cargosCount'));
        
    }

    public function create() {

        $regions = Region::all();

        return view('cargo.create', compact('regions'));

    }

    public function store(CargoRequest $request) {

        $validated = $request->validated();

        $cargo = Cargo::create([
            'name' => $validated['name'],
            'weight' => $validated['weight'],
            'body' => $validated['body'],
            'distance' => $validated['distance'],
            'price' => $validated['price'],
            'pay_method' => $validated['pay_method'],
            'load_region_id' => $validated['load_region_id'],
            'load_city_id' => $validated['load_city_id'],
            'load_date' => new Carbon($validated['load_date']),
            'unload_region_id' => $validated['unload_region_id'],
            'unload_city_id' => $validated['unload_city_id'],
            'unload_date' => new Carbon($validated['unload_date']),
            'description' => $validated['description'],
            'urgent' => $request->boolean('urgent'),
            'user_id' => Auth::id()
        ]);

        $this->qrCodeService->generateAndSave($cargo, 'cargo.show');

        return redirect()->back()->with('success', [
            'message' => 'Дані успішно додані!',
            'description' => 'Ваші дані були збережені в базі даних успішно. Ви можете переглянути їх у списку вантажів.'
        ]);

    }

    public function show($id) {

        $cargo = Cargo::with(['loadRegion', 'loadCity', 'unloadRegion', 'unloadCity', 'user', 'qrCode'])->findOrFail($id);

        return view('cargo.show', compact('cargo'));
    }
}
