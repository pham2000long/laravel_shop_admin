<?php

namespace App\Http\Controllers;

use App\Components\Recusive;
use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    private $menu;
    public function __construct(Menu $menu)
    {
        $this->menu = $menu;
    }

    public function index()
    {
        $menus = $this->menu->latest()->paginate(5);
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        $htmlOption = $this->getMenu($parentId = '');
        return view('admin.menus.add', compact('htmlOption'));
    }

    public function store(Request $request)
    {
        $this->menu->create([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name, '-')
        ]);

        return redirect()->route('menus.index');
    }

    public function getMenu($parentId)
    {
        $data = $this->menu->all();
        $recusive = new Recusive($data);
        $htmlOption = $recusive->useRecusive($parentId);

        return $htmlOption;
    }

    public function edit($id)
    {
        $menu = $this->menu->find($id);

        $htmlOption = $this->getmenu($menu->parent_id);

        return view('admin.menus.edit', compact('menu', 'htmlOption'));
    }

    public function update($id, Request $request)
    {
        $this->menu->find($id)->update([
            'name' => $request->name,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name, '-')
        ]);

        return redirect()->route('menus.index');
    }

    public function delete($id)
    {
        $this->menu->find($id)->delete();
        return redirect()->route('menus.index');
    }
}
