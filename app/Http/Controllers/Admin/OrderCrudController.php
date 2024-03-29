<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OrderRequest;
use Illuminate\Http\Request;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use App\Models\WeddingInfo;
use Route;
/**
 * Class OrderCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class OrderCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Order::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/order');
        CRUD::setEntityNameStrings('order', 'orders');
        $order_id = \Route::current()->parameter('order_id');
        CRUD::operation('list', function() {
            CRUD::removeButton('create');
        });
        $this->crud->addButtonFromModelFunction('line', 'open_google', 'openGoogle', "id");
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        $this->crud->removeButton("update");
        $this->crud->addColumn("id");
        CRUD::setFromDb();
        $this->crud->removeColumn("total");
        $this->crud->addColumn("total");
        /**
         * Columns can be defined using the fluent syntax or array syntax:
         * - CRUD::column('price')->type('number');
         * - CRUD::addColumn(['name' => 'price', 'type' => 'number']); 
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(OrderRequest::class);
        

        /**
         * Fields can be defined using the fluent syntax or array syntax:
         * - CRUD::field('price')->type('number');
         * - CRUD::addField(['name' => 'price', 'type' => 'number'])); 
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation(){
        $this->setupCreateOperation();
    }
    protected function setupDetailRoutes($segment, $routeName, $controller){
        Route::get($segment.'/{id}/detail', [
            'as'        => $routeName.'.detail',
            'uses'      => $controller.'@detail',
            'operation' => 'detail',
        ]);
        Route::post($segment.'/{id}/detail/search', [
            'as'        => $routeName.'.detailSearch',
            'uses'      => $controller.'@detailSearch',
            'operation' => 'detail',
        ]);
    }
    // protected function setupShowOperation(){
    //     $this->crud->set('show.setFromDb', false);
    //     $this->crud->setListView('vendor.backpack.order_detail');
    //     CRUD::addColumn('prices');
    // }
    protected function setupDetailOperation(){

    }
    function detail(Request $rq){
        // prepare the fields you need to show
        
        $this->data['crud'] = $this->crud;
        $this->data['title'] = $this->crud->getTitle() ?? 'detail '.$this->crud->entity_name;
        $this->data['info'] = WeddingInfo::join("order","order.id","=","wedding_info.order")->join("wedding_invitation","wedding_invitation.id","=","wedding_info.product")->where("wedding_info.order",$rq->id)->select("wedding_info.*","wedding_invitation.slug","wedding_invitation.name")->first();
        return view("admin.wedding_info", $this->data);
    }
}
