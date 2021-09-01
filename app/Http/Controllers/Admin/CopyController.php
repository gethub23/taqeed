<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\ICopy;
use App\Http\Requests\Admin\copys\Store;

class CopyController extends Controller
{
    protected $Repo;

    public function __construct(ICopy $IRepo)
    {
        $this->Repo = $IRepo;
    }

    /***************************  get all   **************************/
    public function index()
    {
        $rows = $this->Repo->get();
        return view('admin.copys.index', compact('rows'));
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
