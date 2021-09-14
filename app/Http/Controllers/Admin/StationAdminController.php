<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\IStationAdmin;
use App\Http\Requests\Admin\stationadmins\Store;

class StationAdminController extends Controller
{
    protected $Repo;

    public function __construct(IStationAdmin $IRepo)
    {
        $this->Repo = $IRepo;
    }

    /***************************  get all   **************************/
    public function index($id)
    {
        $rows = $this->Repo->where(['station_id' => $id]);
        return view('admin.stationadmins.index', compact('rows'));
    }
}
