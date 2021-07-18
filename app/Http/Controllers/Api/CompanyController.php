<?php


namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Models\Entities\Companies;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Client\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Collection|Companies[]
     */
    public function index()
    {
        return Companies::all();
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
        return Companies::create([
            "name" => $request->name,
            "about-company" => $request->about_company,
            "company_url" => $request->about_company,
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
                "message" => "Post not found"
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
                "message" => "Company not found"
            ])->setStatusCode(404);
        }
        $company->update([
            "name" => $request->name,
            "about-company" => $request->about_company,
            "company_url" => $request->about_company,
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
