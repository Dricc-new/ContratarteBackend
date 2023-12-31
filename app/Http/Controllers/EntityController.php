<?php

namespace App\Http\Controllers;

use App\Models\Entity;
use Illuminate\Http\Request;

class EntityController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $entity = Entity::with('contracts');
        $entity = SearchOnModel($request->search, $entity,['name','reeup','email']);
         
        if($request->exists('orderBy')){
            foreach ($request->orderBy as $value) {
                $entity = $entity->orderBy($value->col,$value->order);
            }
        } 
        
        if($request->exists('pagination')) $pagination = $request->pagination;
        else $pagination = 10;
        return $entity->paginate($pagination);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reeup' => 'required',
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $entity = new Entity;
        $entity->reeup = $request->reeup;
        $entity->name = $request->name;
        $entity->email = $request->email;
        $entity->save();
        $notify = ['success' => 'La entidad fue creada con exito'];
        return compact('entity','notify');
    }

    /**
     * Display the specified resource.
     */
    public function show(Entity $entity)
    {
        return $entity;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Entity $entity)
    {
        $request->validate([
            'email' => 'email'
        ]);

        $input = $request->all();
        $entity->update($input);
        $notify = ['success' => 'La entidad fue actualizada con exito'];
        return compact('entity','notify');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Entity $entity)
    {
    }
}
