<?php
abstract class Controller{

    /**
     * Get the list of model resources from storage.
     * @return Response
     */
    public function index(){

    }

    /**
     * Store newly created resource to storage
     * @param Request $request
     * @return Response;
     */
    public function store(Request $request){

    }

    /**
     * Update a specific request in the storage
     * @param Request $request
     * @param $id
     * @return Response
     */
    public function update(Request $request, $id){

    }

    /**
     * Displays a particular resource from storage
     * @param $id
     * @return Response
     */
    public function show($id){

    }

    /**
     * Deletes a specific resource from storage
     * @param $id
     */
    public function delete($id){

    }
}