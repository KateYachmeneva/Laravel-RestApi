<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarRequest;
use App\Models\Car;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return LengthAwarePaginator
     */
    public function index()
    {
        return Car::query()->paginate(10 );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Builder|Model
     */


       public function store(CarRequest $request)
    {
        return Car::query()->create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @return Builder|Builder[]|Collection|Model
     */
    public function show($id)
    {
        return Car::query()->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *

     */

    public function update(CarRequest $request, Car $car)
    {
        $car->fill($request->validated());
        return $car->save();
    }

    public function destroy(Car $car)
    {
        if ($car->delete()) {
            return response(null, Response::HTTP_NO_CONTENT);
        }
        return null;
    }
}
