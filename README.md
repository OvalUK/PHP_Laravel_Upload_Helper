PHP_Laravel_Pagination
======================

Include our library using the composer name: oval/laravel-pagination

**View:**

$Model->items was passed from our controller and contains the response from the database(see model)
    
    <?=$Model->items->appends( Input::except('page') )->links();?>
    
**Controller:**

Here is an example of a controller method


    public function Test()
    {
        
        $paginationViewModel = new PaginationViewModel();
        $paginationModel = new PaginationModel();
        
        $paginationModel->amount = 50;
        $paginationModel->columns[ "projectTitle" ] = new PaginationColumn( "project_title", Input::get( "projectTitle" ), Input::get('projectTitleSort') );
        $paginationModel->columns[ "partners" ] = new PaginationColumn( "partners", Input::get( "partners" ), Input::get('partnersSort') );        
        $paginationModel->page = isset( $_GET[ "page" ] ) ? $_GET[ "page" ] : 0;
        
        $paginationViewModel->paginationModel = $paginationModel;
        $paginationViewModel->items = $this->yourRepository->GetWithPagination( $paginationModel );
        
        return View::make('whatever/test', array( "Model" => $paginationViewModel ) );
        
    }

**Model:**

This is the GetWithPagination method we set up in our "yourRepository"


    public function GetWithPagination( PaginationModel $paginationModel )
    {
        $query = DB::table('tablename');   
        $whatevers = $query->paginate( PaginationHelper::PrepareForDb( $query, $paginationModel ) );
        return $whatevers;
    }
    
