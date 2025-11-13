<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PublicAnimalController extends Controller
{
    private $apiBaseUrl;

    public function __construct()
    {
        // Evita concatenar con "/public" si no hay API definida
        $this->apiBaseUrl = rtrim(env('API_BASE_URL', ''), '/');
    }

    public function index()
    {
        // Si no hay una API externa configurada, muestra una vista vacía
        if (empty($this->apiBaseUrl)) {
            return view('public.animals.index', [
                'animals' => [],
                'paginator' => null,
            ])->with('error', 'No hay conexión con una API externa configurada.');
        }

        $response = Http::get("{$this->apiBaseUrl}/animals");

        if ($response->failed()) {
            return view('public.animals.index', ['animals' => [], 'paginator' => null])
                   ->with('error', 'No se pudieron cargar los animales en este momento.');
        }

        $apiResponse = $response->json();
        $animals = $apiResponse['data'] ?? [];
        $paginator = $apiResponse;
        return view('public.animals.index', compact('animals', 'paginator'));
    }

    public function show(string $id)
    {
        if (empty($this->apiBaseUrl)) {
            abort(404, 'API externa no configurada.');
        }

        $response = Http::get("{$this->apiBaseUrl}/animals/{$id}");

        if ($response->failed()) {
            abort(404, 'Animal no encontrado.');
        }

        $animal = $response->json();
        return view('public.animals.show', compact('animal'));
    }
}
