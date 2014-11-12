<?php

namespace Oval;

class UploadHelper
{        
    public static function UploadFile( $file, $destinationPath, $fileName = NULL )
    {            
        if( $file->isValid() )
        {
            $file->move( $destinationPath, $fileName );
            return TRUE;
        }
        else {
            throw new Exception( "Something is wrong with the file." );
        }
    }
}