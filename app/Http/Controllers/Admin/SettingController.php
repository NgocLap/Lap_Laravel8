<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingRequest;
use App\Models\Setting;
use App\Traits\DeleteModelTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class SettingController extends Controller
{
    use DeleteModelTrait;
    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }

    public function show()
    {
        $settings = $this->setting->latest()->paginate(10);
        return view ('admin.setting.show', compact('settings'));
    }
    public function create()
    {
        return view ('admin.setting.add');
    }

    public function store(SettingRequest $request)
    {
        $this->setting->create([
            'config_key' => $request -> config_key,
            'config_value' => $request -> config_value,
            'type' => $request -> type,
        ]);
        return redirect()->route('show_setting');
    }

    public function edit($id, Request $request)
    {
        $settingEdit = $this->setting->find($id);
        return view('admin.setting.edit', compact('settingEdit'));
    }

    public function update($id, Request $request)
    {
        $this->setting->find($id)->update([
            'config_key' => $request -> config_key,
            'config_value' => $request -> config_value,
        ]);
        return redirect()->route('show_setting');
    }
    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->setting);
    }
}
