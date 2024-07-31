<?php

namespace App\Http\Controllers\Admin\Notify;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Notify\EmailFileRequest;
use App\Http\Services\File\FileService;
use App\Models\Notify\EmailFile;
use App\Models\Notify\Mail;
use Illuminate\Http\Request;

class EmailFileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Mail $mail)
    {
        return view("admin.notify.email-file.index", compact("mail"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Mail $mail)
    {
        return view("admin.notify.email-file.create", compact("mail"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmailFileRequest $request, Mail $mail, FileService $fileService)
    {
        $inputs = $request->all();
        if ($request->hasFile("file")) {
            $fileService->setExclusiveDirectory('files' . DIRECTORY_SEPARATOR . 'email-files');
            $fileService->setFileSize($request->file('file'));
            $fileSize = $fileService->getFileSize();
            $result = $fileService->moveToPublic($request->file('file'));
            $fileFormat = $fileService->getFileFormat();
        }
        if (!$result) {
            return redirect()->route('notify.email-file.index', $mail->id)->with('toast-error', 'ایجاد فایل ایمیل با خطا مواجه شد');
        }
        $inputs['public_mail_id'] = $mail->id;
        $inputs['file_path'] = $result;
        $inputs['file_size'] = $fileSize;
        $inputs['file_type'] = $fileFormat;
        $file = EmailFile::create($inputs);
        return redirect()->route('notify.email-file.index', $mail->id)->with('toast-success', 'ایجاد فایل ایمیل با موفقیت انجام شد');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EmailFile $file)
    {
        return view('admin.notify.email-file.edit', compact('file'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmailFileRequest $request, EmailFile $file, FileService $fileService)
    {
        $inputs = $request->all();
        if ($request->hasFile("file")) {
            if (!empty($file->file_path)) {
                $fileService->deleteFile($file->file_path);
            }
            $fileService->setExclusiveDirectory('files' . DIRECTORY_SEPARATOR . 'email-files');
            $fileService->setFileSize($request->file('file'));
            $fileSize = $fileService->getFileSize();
            $result = $fileService->moveToPublic($request->file('file'));
            $fileFormat = $fileService->getFileFormat();
        }
        if (!$result) {
            return redirect()->route('notify.email-file.index', $file->public_mail_id)->with('toast-error', 'ایجاد فایل ایمیل با خطا مواجه شد');
        }
        $inputs['file_path'] = $result;
        $inputs['file_size'] = $fileSize;
        $inputs['file_type'] = $fileFormat;
        $result = $file->update($inputs);
        return redirect()->route('notify.email-file.index', $file->public_mail_id)->with('toast-success', 'ویرایش فایل ایمیل با موفقیت انجام شد');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EmailFile $file)
    {
        $mailId = $file->public_mail_id;
        $result = $file->delete();
        return redirect()->route('notify.email-file.index', $mailId)->with('toast-success', 'ایجاد فایل ایمیل با موفقیت انجام شد');
    }

    public function status(EmailFile $file)
    {
        $file->status = $file->status === 0 ? 1 : 0;
        $result = $file->save();
        if ($result) {
            if ($file->status === 0) {
                return response()->json([
                    'status' => true,
                    'checked' => false
                ]);
            } else if ($file->status === 1) {
                return response()->json([
                    'status' => true,
                    'checked' => true
                ]);
            }
        } else {
            return response()->json(['status' => false]);
        }
    }
}
