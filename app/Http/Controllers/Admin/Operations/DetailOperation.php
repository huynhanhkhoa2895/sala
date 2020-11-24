<?php

namespace App\Http\Controllers\Admin\Operations;

use Illuminate\Support\Facades\Route;

trait DetailOperation
{
    /**
     * Define which routes are needed for this operation.
     *
     * @param string $segment    Name of the current entity (singular). Used as first URL segment.
     * @param string $routeName  Prefix of the route name.
     * @param string $controller Name of the current CrudController.
     */
    protected function setupDetailRoutes($segment, $routeName, $controller)
    {
        Route::get($segment.'/detail', [
            'as'        => $routeName.'.detail',
            'uses'      => $controller.'@detail',
            'operation' => 'detail',
        ]);
    }

    /**
     * Add the default settings, buttons, etc that this operation needs.
     */
    protected function setupDetailDefaults()
    {
        $this->crud->allowAccess('detail');

        $this->crud->operation('detail', function () {
            $this->crud->loadDefaultOperationSettingsFromConfig();
        });

        $this->crud->operation('list', function () {
            // $this->crud->addButton('top', 'detail', 'view', 'crud::buttons.detail');
            // $this->crud->addButton('line', 'detail', 'view', 'crud::buttons.detail');
        });
    }

    /**
     * Show the view for performing the operation.
     *
     * @return Response
     */
    public function detail()
    {
        $this->crud->hasAccessOrFail('detail');

        // prepare the fields you need to show
        $this->data['crud'] = $this->crud;
        $this->data['title'] = $this->crud->getTitle() ?? 'detail '.$this->crud->entity_name;

        // load the view
        return $this->crud->setListView('test');
    }
}
