<?php

namespace App\Http\Controllers\Admin;

use App\DTO\Supports\CreateSupportDTO;
use App\DTO\Supports\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use DeepCopy\Filter\Filter;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    ) {}

    public function index(Request $request)
    {
        $supports = $this->service->paginate(
        page: $request->get('page',1),
        totalPerPage: $request->get('per_page',15),
        filter: $request->filter
        );
       
 
    

        return view('admin/supports/index', compact('supports', 'filters'));
                        
    }



    public function show(string $id)
    {
        // Support::find($id)
        // Support::where('id', $id)->first();
        // Support::where('id', '!=', $id)->first(); primeiro registro
        if (!$support = $this->service->findOne($id)) {
            return back();
        }
        dd($support->subject);
        
        
        return view('admin/supports/show', compact('support'));
    }

    public function create()
    {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupport $request, Support $support)
    {
        $this->service->new(
            CreateSupportDTO::makeFromRequest($request)
        );
        

        return redirect()
                ->route('supports.index')
                ->with('message', 'Cadastrado com sucesso!Inície');
    }

    public function edit(string $id)
    {
        // if (!$support = $support->where('id', $id)->first()) {
        if (!$support = $this->service->findOne($id)) {
            return back();
        }

        return view('admin/supports.edit', compact('support'));
    }

    public function update(StoreUpdateSupport $request, Support $support, string $id)
    {
        $support = $this->service->update(
            UpdateSupportDTO::makeFromRequest($request),
        );

        if (!$support) {
            return back();
        }

        return redirect()
                ->route('supports.index')
                ->with('message', 'Atualizado com sucesso!');
    }

    public function destroy(string $id)
    {
        $this->service->delete($id);

        return redirect()
                ->route('supports.index')
                ->with('message', 'Deletado com sucesso!');
    }
   
    
}
# public function delete(string $id): void
#{
#    $this->repository->delete($id);
#}
?>