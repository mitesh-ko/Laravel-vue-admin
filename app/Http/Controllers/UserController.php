<?php

namespace App\Http\Controllers;

use App\Contracts\UserContract;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use ProtoneMedia\LaravelQueryBuilderInertiaJs\InertiaTable;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller implements UserContract
{

    private function prepareDataTable($user, $request)
    {
        return DataTables::eloquent($user)
            ->addColumn('action', function ($row) {
                return [
                    'View/Update' => route('users.edit', $row->uuid),
                    'Delete' => route('users.destroy', $row->uuid)
                ];
            })
            ->rawColumns(['action'])
            ->addIndexColumn()
            ->make();
    }

    /**
     * {@inheritdoc}
     */
    public function index(Request $request): \Inertia\Response
    {
        if(!$request->length && !$request->start) {
            $request->merge(['length' => config('constants.page_length'), 'start'=> 1]);
        }
        $user = User::orderByDesc('id')->whereNotIn('id', [Auth::user()->id])->select(['id', 'uuid', 'name', 'email', 'created_at']);
        $users = $this->prepareDataTable($user, $request);
        return Inertia::render('User/IndexUser', ['users' => $users]);
    }
}
