<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IFuel;
use App\Http\Requests\Admin\fuels\Store;

class FuelController extends Controller
{
    protected $Repo;

    public function __construct(IFuel $IRepo)
    {
        $this->Repo = $IRepo;
    }

    /***************************  get all   **************************/
    public function index($id)
    {
        $rows = $this->Repo->where(['station_id' => $id]);
        return view('admin.fuels.index', compact('rows'));
    }


    /***************************  store  **************************/
    public function store(Store $request)
    {
        $this->Repo->store($request->validated());
        return response()->json();
    }

    /***************************  update   **************************/
    public function update(Store $request, $id)
    {
        $row = $this->Repo->findOrFail($id);
        $this->Repo->update($row , $request->validated());
        return response()->json();
    }

    /***************************  delete  **************************/
    public function destroy($id)
    {
         $row = $this->Repo->findOrFail($id);
         $this->Repo->softDelete($row);
        return response()->json(['id' =>$id]);
    }

    public function destroyAll(Request $request)
    {
        $requestIds = json_decode($request->data);
        
        foreach ($requestIds as $id) {
            $ids[] = $id->id;
        }
        if ($this->Repo->delete($ids)) {
            return response()->json('success');
        } else {
            return response()->json('failed');
        }
    }
}
