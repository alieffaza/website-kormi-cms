<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::with(['roles', 'creator'])
            ->whereDoesntHave('roles', function($q) {
                $q->where('name', 'admin');
            })
            ->whereHas('roles', function($q) {
                $q->where('name', 'user');
            });
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%")
                  ->orWhereRaw("CASE WHEN is_active = 1 THEN 'aktif' WHEN is_active = 0 THEN 'nonaktif' END LIKE ?", ["%$search%"]);
            });
        }
        // Sorting
        $sort = $request->get('sort', 'name');
        $direction = $request->get('direction', 'asc');
        $sortable = ['name', 'email', 'phone', 'is_active', 'created_at'];
        if ($sort === 'role') {
            $query->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
                  ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
                  ->orderBy('roles.name', $direction)
                  ->select('users.*');
        } elseif (in_array($sort, $sortable)) {
            $query->orderBy($sort, $direction);
        }
        $users = $query->paginate(10)->withQueryString();
        return view('admin.users.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.users.user.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed',
            'is_active' => 'required|in:0,1',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_active' => $request->is_active == '1',
            'created_by' => auth()->id(),
        ]);
        $user->roles()->sync([Role::where('name', 'user')->first()->id]);
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil ditambahkan.');
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $userRoles = $user->roles->pluck('id')->toArray();
        return view('admin.users.user.edit', compact('user', 'roles', 'userRoles'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required|string|max:20',
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'is_active' => $request->has('is_active'),
        ]);
        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }
        $userRole = Role::where('name', 'user')->first();
        $user->roles()->sync([$userRole->id]);
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil diperbarui.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index')->with('success', 'Pengguna berhasil dihapus.');
    }

    public function editorIndex(Request $request)
    {
        $query = User::with(['roles', 'creator'])
            ->whereDoesntHave('roles', function($q) {
                $q->where('name', 'admin');
            })
            ->whereHas('roles', function($q) {
                $q->where('name', 'editor');
            });
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%")
                  ->orWhere('phone', 'like', "%$search%")
                  ->orWhereRaw("CASE WHEN is_active = 1 THEN 'aktif' WHEN is_active = 0 THEN 'nonaktif' END LIKE ?", ["%$search%"]);
            });
        }
        $sort = $request->get('sort', 'name');
        $direction = $request->get('direction', 'asc');
        $sortable = ['name', 'email', 'phone', 'is_active', 'created_at'];
        if ($sort === 'role') {
            $query->leftJoin('role_user', 'users.id', '=', 'role_user.user_id')
                  ->leftJoin('roles', 'role_user.role_id', '=', 'roles.id')
                  ->orderBy('roles.name', $direction)
                  ->select('users.*');
        } elseif (in_array($sort, $sortable)) {
            $query->orderBy($sort, $direction);
        }
        $users = $query->paginate(10)->withQueryString();
        return view('admin.users.editor.editors', compact('users'));
    }

    public function print(User $user)
    {
        if ($user->roles->contains('name', 'editor')) {
            return view('admin.users.editor.print', compact('user'));
        }
        return view('admin.users.user.print', compact('user'));
    }

    public function printAll(Request $request)
    {
        $role = $request->get('editor') ? 'editor' : 'user';
        $users = \App\Models\User::with(['roles'])
            ->whereDoesntHave('roles', function($q) {
                $q->where('name', 'admin');
            })
            ->whereHas('roles', function($q) use ($role) {
                $q->where('name', $role);
            })
            ->orderBy('name')
            ->get();
        if ($role === 'editor') {
            return view('admin.users.editor.print_all', compact('users', 'role'));
        }
        return view('admin.users.user.print_all', compact('users', 'role'));
    }

    public function createEditor()
    {
        return view('admin.users.editor.create_editor');
    }

    public function storeEditor(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'password' => 'required|string|min:6|confirmed',
            'is_active' => 'required|in:0,1',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'is_active' => $request->is_active == '1',
            'created_by' => auth()->id(),
        ]);
        $editorRole = \App\Models\Role::where('name', 'editor')->first();
        $user->roles()->sync([$editorRole->id]);
        return redirect()->route('users.editors')->with('success', 'Editor berhasil ditambahkan.');
    }

    public function editEditor(User $user)
    {
        return view('admin.users.editor.edit_editor', compact('user'));
    }

    public function updateEditor(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'phone' => 'required|string|max:20',
        ]);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'is_active' => $request->has('is_active'),
        ]);
        if ($request->filled('password')) {
            $user->update(['password' => Hash::make($request->password)]);
        }
        $editorRole = \App\Models\Role::where('name', 'editor')->first();
        $user->roles()->sync([$editorRole->id]);
        return redirect()->route('users.editors')->with('success', 'Editor berhasil diperbarui.');
    }
} 