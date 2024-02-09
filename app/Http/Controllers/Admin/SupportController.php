<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupportRequest;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{

    public function __construct(protected SupportService $service)
    {

    }
    public function index(Request $request)
    {
        $supports = $this->service->getAll($request->filter);
        return view('admin/supports/index', compact('supports'));
    }

    public function show(string $id)
    {
        if (!$support = $this->service->findOne($id)){
            return back();
        }
        return view('admin/supports/show', compact('support'));
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    public function store(StoreSupportRequest $request, Support $support)
    {
        $this->service->new(CreateSupportDTO::makeFromRequest($request));

        return redirect()->route('supports.index');
    }

    public function edit(string $id)
    {
        if(!$support = $this->service->findOne($id))
        return view('admin/supports/edit', compact('support'));
    }

    public function update(StoreSupportRequest $request, Support $support, string $id)
    {
        $support = $this->service->update(UpdateSupportDTO::makeFromRequest($request));

        if (!$support){
            return back();
        }

        return redirect()->route('supports.index');
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);
        return redirect()->route('supports.index');
    }

}
