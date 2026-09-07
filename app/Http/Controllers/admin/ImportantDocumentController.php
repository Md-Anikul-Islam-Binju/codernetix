<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\ImportantDocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class ImportantDocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware(function ($request, $next) {
            if (!Gate::allows('important-document')) {
                return redirect()->route('unauthorized.action');
            }

            return $next($request);
        });
    }

    public function index()
    {
        $importantDocument = ImportantDocument::where('id', 1)->first();

        return view(
            'admin.pages.importantDocument.index',
            compact('importantDocument')
        );
    }

    public function createOrUpdate(Request $request, $id = null)
    {
        $rules = [
            'tread_licence' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'tin_certificate' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'bin_certificate' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'company_pad_doc' => 'nullable|file|mimes:pdf,doc,docx|max:10240',
            'company_domain_renew_invoice' => 'nullable|file|mimes:pdf,doc,docx|max:10240',

            'old_tread_licence_multiple' => 'nullable|array',
            'old_tread_licence_multiple.*' => 'file|mimes:pdf,doc,docx|max:10240',

            'vat_certificate_multiple' => 'nullable|array',
            'vat_certificate_multiple.*' => 'file|mimes:pdf,doc,docx|max:10240',

            'long_details' => 'nullable|string',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        /*
        |--------------------------------------------------------------------------
        | Get/Create Record
        |--------------------------------------------------------------------------
        */

        if ($id) {
            $setting = ImportantDocument::findOrFail($id);
        } else {
            $setting = new ImportantDocument();
        }

        /*
        |--------------------------------------------------------------------------
        | Normal Fields
        |--------------------------------------------------------------------------
        */

        $setting->long_details = $request->long_details;

        /*
        |--------------------------------------------------------------------------
        | Single Documents
        |--------------------------------------------------------------------------
        */

        $singleDocuments = [
            'tread_licence',
            'tin_certificate',
            'bin_certificate',
            'company_pad_doc',
            'company_domain_renew_invoice',
        ];

        foreach ($singleDocuments as $document) {

            if ($request->hasFile($document)) {

                $file = $request->file($document);

                $fileName = time() . '_' . $document . '.' . $file->extension();

                $folder = 'images/important_documents/' . $document;

                $file->move(public_path($folder), $fileName);

                $setting->$document = $folder . '/' . $fileName;
            }
        }

        /*
        |--------------------------------------------------------------------------
        | Old Tread Licence Multiple
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('old_tread_licence_multiple')) {

            $oldFiles = $setting->old_tread_licence_multiple ?? [];

            foreach ($request->file('old_tread_licence_multiple') as $file) {

                $fileName = time() . '_' . uniqid() . '.' . $file->extension();

                $folder = 'images/important_documents/old_tread_licence_multiple';

                $file->move(public_path($folder), $fileName);

                $oldFiles[] = $folder . '/' . $fileName;
            }

            $setting->old_tread_licence_multiple = $oldFiles;
        }

        /*
        |--------------------------------------------------------------------------
        | VAT Certificate Multiple
        |--------------------------------------------------------------------------
        */

        if ($request->hasFile('vat_certificate_multiple')) {

            $vatFiles = $setting->vat_certificate_multiple ?? [];

            foreach ($request->file('vat_certificate_multiple') as $file) {

                $fileName = time() . '_' . uniqid() . '.' . $file->extension();

                $folder = 'images/important_documents/vat_certificate_multiple';

                $file->move(public_path($folder), $fileName);

                $vatFiles[] = $folder . '/' . $fileName;
            }

            $setting->vat_certificate_multiple = $vatFiles;
        }


        if ($request->hasFile('tin_return_certificate_multiple')) {

            $tinReturnFiles = $setting->tin_return_certificate_multiple ?? [];

            foreach ($request->file('tin_return_certificate_multiple') as $file) {

                $fileName = time() . '_' . uniqid() . '.' . $file->extension();

                $folder = 'images/important_documents/tin_return_certificate_multiple';

                $file->move(public_path($folder), $fileName);

                $tinReturnFiles[] = $folder . '/' . $fileName;
            }

            $setting->tin_return_certificate_multiple = $tinReturnFiles;
        }

        $setting->save();

        $message = $id
            ? 'Important documents updated successfully!'
            : 'Important documents created successfully!';

        return redirect()
            ->back()
            ->with('success', $message);
    }

    public function deleteFile($id, $field, $index = null)
    {
        $setting = ImportantDocument::findOrFail($id);

        /*
        |--------------------------------------------------------------------------
        | Single Documents
        |--------------------------------------------------------------------------
        */

        $singleFields = [
            'tread_licence',
            'tin_certificate',
            'bin_certificate',
            'company_pad_doc',
            'company_domain_renew_invoice',
        ];


        /*
        |--------------------------------------------------------------------------
        | Multiple Documents
        |--------------------------------------------------------------------------
        */

        $multipleFields = [
            'old_tread_licence_multiple',
            'vat_certificate_multiple',
            'tin_return_certificate_multiple',
        ];


        /*
        |--------------------------------------------------------------------------
        | Validate Field
        |--------------------------------------------------------------------------
        */

        if (
            !in_array($field, $singleFields) &&
            !in_array($field, $multipleFields)
        ) {
            abort(404);
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Single Document
        |--------------------------------------------------------------------------
        */

        if (in_array($field, $singleFields)) {

            $file = $setting->$field;


            // File exists?
            if ($file && file_exists(public_path($file))) {

                unlink(public_path($file));

            }


            // Remove database value
            $setting->$field = null;

            $setting->save();


            return redirect()
                ->back()
                ->with(
                    'success',
                    'Document deleted successfully!'
                );
        }


        /*
        |--------------------------------------------------------------------------
        | Delete Multiple Document
        |--------------------------------------------------------------------------
        */

        $files = $setting->$field ?? [];


        if (!isset($files[$index])) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Document not found.'
                );
        }


        $file = $files[$index];


        // Delete physical file
        if ($file && file_exists(public_path($file))) {

            unlink(public_path($file));

        }


        // Remove array item
        unset($files[$index]);


        // Re-index array
        $setting->$field = array_values($files);

        $setting->save();


        return redirect()
            ->back()
            ->with(
                'success',
                'Document deleted successfully!'
            );
    }

}
