<?php

namespace App\Http\Controllers;

class FirebaseController extends Controller
{
    //
    protected $db;

    public function __construct()
    {
        $this->db = app('firebase.firestore')->database();
    }

    public function index()
    {

//        HOW TO ADD A NEW COLLECTION AND DOCUMENT

//        $data = [
//            'name' => 'Tokyo',
//            'country' => 'Japan'
//        ];
//        $this->db->collection('cities')->add($data);


//        DELETING A DOCUMENT
//        $db->collection('cities')->document('DC')->delete();


//        DELETING A FIELD
//        $cityRef = $db->collection('cities')->document('BJ');
//        $cityRef->update([
//          ['path' => 'capital', 'value' => FieldValue::deleteField()]
//          ]);

//        GET blogs COLLECTION
        $docRef = $this->db->collection('blogs');

//        GET ALL DOCUMENTS IN THAT COLLECTION
        $documents = $docRef->documents();

//        CREATE EMPTY ARRAY
        $response = array();
        foreach ($documents as $document) {
//            FOREACH DOCUMENT ADD IT TO THE ARRAY
            array_push($response, $document->data());
        }
//        RETURN THE ARRAY AS JSON
        return response()->json($response);
    }
}
