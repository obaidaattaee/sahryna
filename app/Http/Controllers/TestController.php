<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use ZipArchive;

class TestController extends Controller{
    public function index (){

    }
    public function store()
    {
        $filename = Carbon::now()->format('Y-m-d-H-i-s');

        $tempPath = base_path('storage\app\backup-temp\\') . $filename;
        $backPath = base_path('storage\app\backups\\') . $filename;

        $command = 'mysqldump -u root --password= ' . env('DB_DATABASE') . ' > ' . $tempPath . '.sql';
        exec($command);

        // zipping
        $zip = new ZipArchive;
        if ($zip->open($backPath . '.zip', ZipArchive::CREATE) === TRUE) {
            $zip->addFile($tempPath . '.sql', $filename . '.sql');
            $zip->close();
        }

        // clear temp folder
        $this->clearTempFolder();


        return response()->json(['success' => true]);
    }
    private function clearTempFolder()
    {
        //The name of the folder.
        $folder = base_path('storage\app\backup-temp\\');

        //Get a list of all of the file names in the folder.
        $files = glob($folder . '/*');

        //Loop through the file list.
        foreach ($files as $file) {
            //Make sure that this is a file and not a directory.
            if (is_file($file)) {
                //Use the unlink function to delete the file.
                unlink($file);
            }
        }
    }
}
