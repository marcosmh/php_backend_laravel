<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BackendController extends Controller
{
    private $names = [
        1 => [ 'name' => 'Anakin', 'age' => 40 ],
        2 => [ 'name' => 'Luke', 'age' => 20 ],
        3 => [ 'name' => 'Obiwan', 'age' => 46 ],
    ];

    public function getAll() {
        return response()->json($this->names);
    }

    public function get(int $id = 0) {
        if(isset($this->names[$id])) {
            return response()->json($this->names[$id]);
        }

        return response()->json(["error" => "Persona no existente"],Response::HTTP_NOT_FOUND);
    }

    public function create(Request $request) {
        $person = [
            "id" => count($this->names) + 1 ,
            "name" => $request->input("name"),
            "age" => $request->input("age")
        ];

        $this->names[$person["id"]] = $person;

        return response()->json(["message" => "Persona Creada", "person" => $person ],
            Response::HTTP_CREATED);

    }

    public function update(Request $request, int $id) {
        if(isset($this->names[$id])) {
            $this->names[$id]["name"] = $request->input("name", $this->names[$id]["name"]);
            $this->names[$id]["age"] = $request->input("age");

            return response()->json(["message" => "Persona actualizada",
                        "person" => $this->names[$id]]);
        }

        return response()->json(["error" => "Persona no existe."],Response::HTTP_NOT_FOUND);
    }

    public function delete(int $id) {
        if(isset($this->names[$id])) {
            unset($this->names[$id]);
            return response()->json(["message" => "Persona eliminada."]);
        }

        return response()->json(["error" => "Persona no existe."],Response::HTTP_NOT_FOUND);
    }




    /*
    public function getId(int $id = 0) {
        return response()->json([
            'id' => $id,
            'success' => true,
            'message' => 'Hola'
        ]);
    }*/


}
