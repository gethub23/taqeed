<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IStationRole;
use App\Http\Requests\Admin\stationroles\Store;

class StationRoleController extends Controller
{
    protected $Repo;

    public function __construct(IStationRole $IRepo)
    {
        $this->Repo = $IRepo;
    }

    /***************************  get all   **************************/
    public function index($id)
    {
        $rows = $this->Repo->where(['station_id' => $id]);
        return view('admin.stationroles.index', compact('rows'));
    }

}
