<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\AttachmentType;
use App\Models\Contract;
use App\Models\Entity;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $contract = Contract::with(['entity:id,name','type']);
        $contract = SearchOnModel($request->search, $contract, ['number']);

        if ($request->exists('orderBy')) {
            foreach ($request->orderBy as $value) {
                $contract = $contract->orderBy($value->col, $value->order);
            }
        }

        if ($request->exists('pagination')) $pagination = $request->pagination;
        else $pagination = 10;
        return $contract->paginate($pagination);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'entity_id' => 'required',
            'number' => 'required',
            'type_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'origin' => 'required|file',
            'datasheet' => 'required|file',
        ]);
        
        $entity = Entity::find($request->entity_id);
        
        $contract = new Contract();
        $contract->entity_id = $request->entity_id;
        $contract->number = $request->number;
        $contract->type_id = $request->type_id;
        $contract->start_date = $request->start_date;
        $contract->end_date = $request->end_date;
        $contract->save();
        
        $filename = newFilename();
        
        $orgFile = new Attachment();
        $orgFile->contract_id = $contract->id;
        $attachType1 = AttachmentType::where('name', 'Doc. Original')->first();
        $request->origin->storeAs('/' . $attachType1->folder, $filename . '.pdf', 'public');
        $orgFile->filename = $filename;
        $orgFile->attachmenttype_id = $attachType1->id;
        $orgFile->save();
        
        $datasheet = new Attachment;
        $datasheet->contract_id = $contract->id;
        $attachType2 = AttachmentType::where('name', 'Ficha Tecnica')->first();
        $request->datasheet->storeAs('/' . $attachType2->folder, $filename . '.pdf', 'public');
        $datasheet->filename = $filename;
        $datasheet->attachmenttype_id = $attachType2->id;
        $datasheet->save();
        
        $notify = ['success' => 'El contrato fue creado con exito'];
        return compact('contract','notify');
    }

    /**
     * Display the specified resource.
     */
    public function show(Contract $contract)
    {
        return $contract;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Contract $contract)
    {
        $request->validate([
            'entity_id' => 'required',
            'number' => 'required|numeric',
            'type_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        $contract = Contract::find($request->id);
        $contract->enterprise_id = $request->enterprise_id;
        $contract->number = $request->number;
        $contract->type_id = $request->type_id;
        $contract->start_date = $request->start_date;
        $contract->end_date = $request->end_date;
        $contract->save();
        if ($request->hasFile('pdf')) {
            $attach = Attachment::where('Doc. Original', 'name')->where('attachment_id', $request->id);
            $request->pdf->storeAs('/' . $attach->type->folder, $attach->filename . '.pdf', 'public');
        }
        if ($request->hasFile('datasheet')) {
            $attach = Attachment::where('Ficha Tecnica', 'name')->where('attachment_id', $request->id);
            $request->pdf->storeAs('/' . $attach->type->folder, $attach->filename . '.pdf', 'public');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contract $contract)
    {
        //
    }
}
