<?php

namespace App\Http\Controllers;
//use Spatie\Permission\Models\Role;
use App\Models\System\Role;
use Exception;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function __construct()
    {
        parent::__construct(Role::class);
    }

    public function store(Request $request)
    {
        $request->request->set('guard_name', 'web');
        return parent::store($request); // TODO: Change the autogenerated stub
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        check_required_lvl($role->level);
        return parent::update($request, $id);
    }

    public function destroy(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        check_required_lvl($role->level);
        return parent::destroy($request, $id);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws Exception
     */
    public function updatePermissions(Request $request, $id)
    {
        check_permission("PERMISSION_ASSIGN");
        /** @var Role $role */
        $role = Role::findOrFail($id);
        check_required_lvl($role->level);
        $permissions = $request->get('permissions');
        if (!$permissions)
            throw new Exception('Bad request', 404);
        $role->syncPermissions($permissions);
        return jsend_success($role, 200, trans("messages.request.update", ["module" => "Permissions"]));
    }
}