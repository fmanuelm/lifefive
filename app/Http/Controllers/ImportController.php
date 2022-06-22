<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class ImportController extends Controller
{

    public function __constructor()
    {

    }
    public function index()
    {
        return view('import_csv');
    }
    public function uploadContent(Request $request)
    {
        $request->validate([
            'uploaded_file' => ['required', 'mimes:csv,txt', 'max:2048']
        ]);

        $file = $request->file('uploaded_file');
        if ($file) {
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $this->checkUploadedFileProperties($extension, $fileSize);

            $location = 'uploads';

            $file->move($location, $filename);
            $filepath = public_path($location . "/" . $filename);
            $file = fopen($filepath, "r");
            $importData_arr = array();
            $i = 0;
            //Read the contents of the uploaded file
            while (($filedata = fgetcsv($file, 1000, ",")) !== FALSE) {
                $num = count($filedata);
                // Skip first row (Remove below comment if you want to skip the first row)
                if ($i == 0) {
                    $i++;
                    continue;
                }
                for ($c = 0; $c < $num; $c++) {
                    $importData_arr[$i][] = $filedata[$c];
                }
                $i++;
            }
            fclose($file); //Close after reading$j = 0;
            $j = 0;
            foreach ($importData_arr as $importData) {
                // si el departamento no existe, crealo
                // buscar el id de partamento
                $department = Department::where('department', $importData[3])->first();
                if (!($department))
                {
                    $department = Department::create(['department'=>$importData[3]]);
                    $department_id = $department->id;
                }
                else {
                    $department_id = $department->id;
                }

                $j++;
                try {
                    DB::beginTransaction();
                    Employee::create([
                    'id_emp' => $importData[0],
                    'firstname' => $importData[1],
                    'lastname' => $importData[2],
                    'department_id' => $department_id,
                    'allow_access' => 0,
                    ]);

                    DB::commit();
                } catch (\Exception $e) {
                    //throw $th;
                    DB::rollBack();
                }
            }
            return redirect()->route('import')->with('status', 'The File has upload successfully');
        } else {
            //no file was uploaded
            throw new \Exception('No file was uploaded', Response::HTTP_BAD_REQUEST);
        }

        return redirect()->route('import')->with('status', 'The File has upload successfully');
    }
    public function checkUploadedFileProperties($extension, $fileSize)
    {
        $valid_extension = array("csv", "xlsx"); //Only want csv and excel files
        $maxFileSize = 2097152; // Uploaded file size limit is 2mb
        if (in_array(strtolower($extension), $valid_extension)) {
            if ($fileSize <= $maxFileSize) {
            }
            else {
                throw new \Exception('No file was uploaded', Response::HTTP_REQUEST_ENTITY_TOO_LARGE); //413 error}
            }
        }
        else {
            throw new \Exception('Invalid file extension', Response::HTTP_UNSUPPORTED_MEDIA_TYPE); //415 error
        }
    }
}
