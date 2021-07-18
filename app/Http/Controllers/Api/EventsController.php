<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Entities\Companies;
use App\Models\Entities\Events;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Client\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection|Companies[]
     */
    public function index()
    {
        return Events::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return array
     */
    public function store(Request $request): array
    {

        #TODO valodator
        return Events::create([
            "event_name" => $request->name,
            "event_description" => $request->about_company,
            "city" => $request->about_company,
            "applied_at" => $request->about_company,
            "price" => $request->about_company,
            "age" => $request->about_company,
            "denied_at" => $request->about_company,
            "date_start" => $request->about_company,
            "date_end" => $request->about_company,
            "applied_by" => $request->about_company,
            "denied_by" => $request->about_company,
            "passed" => $request->about_company,
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse|Response|object
     */
    public function show(int $id)
    {
        $company = Companies::find($id);
        if (!$company) {
            return response()->json([
                "status" => false,
                "message" => "Event not found"
            ])->setStatusCode(404);
        }

        return $company;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return JsonResponse|Response|object
     */
    public function update(Request $request, int $id)
    {
        $company = Companies::find($id);
        if (!$company) {
            return response()->json([
                "status" => false,
                "message" => "Event not found"
            ])->setStatusCode(404);
        }
        $company->update([
            "event_name" => $request->name,
            "event_description" => $request->about_company,
            "city" => $request->about_company,
            "applied_at" => $request->about_company,
            "price" => $request->about_company,
            "age" => $request->about_company,
            "denied_at" => $request->about_company,
            "date_start" => $request->about_company,
            "date_end" => $request->about_company,
            "applied_by" => $request->about_company,
            "denied_by" => $request->about_company,
            "passed" => $request->about_company,
        ]);
        return $company;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return int
     */
    public function destroy(int $id): int
    {
        return Companies::find($id)->delete();
    }

}
