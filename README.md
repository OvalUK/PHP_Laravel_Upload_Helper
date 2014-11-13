PHP_Laravel_Upload_Helper
======================

Include our library using the composer name: "oval/laravel-upload-helper": "v1.0.3"

**Controller:**

Here is an example of a controller method

    public function PostTestUpload()
    {
        $file = Input::file( "File" );
        
        // Check if any file was uploaded
        if( Input::hasFile( "File" ) )
        {            
            $validation = Validator::make( 
                array( "File" => $file ), // Values
                array( "File" => "mimes:png" ) // Rules
            );
            
            if( !$validation->fails() )
            {
                UploadHelper::UploadFile( $file, "location/of/file", uniqid() . "_" . $file->getClientOriginalName() );
            }            
            else
            {
                GeneralHelper::PrintExt( $validation->messages() );
            }            
        }
        else
        {
            // Redirect with some error saying upload a file!
            echo "Ah, no file was uploaded...<br />";
        }
    }
