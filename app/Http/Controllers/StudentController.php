<?php

namespace App\Http\Controllers;

use App\Helpers\ResponseHelper;
use App\Http\Requests\StudentStoreRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Http\Resources\StudentResource;
use App\Interfaces\StudentRepositoriesInterface;
use App\Models\Student;
use Exception;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    private StudentRepositoriesInterface $studentRepositories;

    public function __construct(StudentRepositoriesInterface $studentRepositories)
    {
        $this->studentRepositories = $studentRepositories;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            $students = $this->studentRepositories->getAll(
                $request->search,
                $request->limit,
                true
            );

            return ResponseHelper::jsonResponse(
                true,
                'Data Students Berhasil Diambil',
                StudentResource::collection($students),
                200
            );
        } catch (Exception $e) {
            return ResponseHelper::jsonResponse(
                false,
                'Data Students Gagal Diambil',
                [
                    'error' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine()
                ],
                500
            );
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentStoreRequest $request)
    {
        $request = $request->validated();

        try {

            $student = $this->studentRepositories->create($request);

            return ResponseHelper::jsonResponse(
                true,
                'Data Students Berhasil Ditambahkan',
                StudentResource::make($student),
                200
            );
        } catch (Exception $e) {
            return ResponseHelper::jsonResponse(
                false,
                'Data Students Gagal Ditambahkan',
                [
                    'error' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine()
                ],
                500
            );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $student = $this->studentRepositories->getById($id);

            if (!$student) {
                return ResponseHelper::jsonResponse(
                    false,
                    'Data Students Tidak Ditemukan',
                    null,
                    404
                );
            } else {
                return ResponseHelper::jsonResponse(
                    true,
                    'Data Students Berhasil Diambil',
                    StudentResource::make($student),
                    200
                );
            }
        } catch (Exception $e) {
            return ResponseHelper::jsonResponse(
                false,
                'Data Students Gagal Diambil',
                [
                    'error' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine()
                ],
                500
            );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StudentUpdateRequest $request, string $id)
    {
        $request = $request->validated();

        try {

            $student = $this->studentRepositories->getById($id);

            if (!$student) {
                return ResponseHelper::jsonResponse(
                    false,
                    'Data Students Tidak Ditemukan',
                    null,
                    404
                );
            }

            $student = $this->studentRepositories->update($id, $request);

            return ResponseHelper::jsonResponse(
                true,
                'Data Students Berhasil Diupdate',
                StudentResource::make($student),
                200
            );
        } catch (Exception $e) {
            return ResponseHelper::jsonResponse(
                false,
                'Data Students Gagal Diupdate',
                [
                    'error' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine()
                ],
                500
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        //
    }
}
