<?php

namespace App\Repositories;

use App\Interfaces\StudentRepositoriesInterface;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\DB;

class StudentRepositories implements StudentRepositoriesInterface
{
    public function getAll(?string $search, ?int $limit, bool $execute)
    {
        $query = Student::where(function ($query) use ($search) {
            if ($search) {
                $query->search($search);
            }
        });

        if ($limit) {
            $query->limit($limit);
        }

        if ($execute) {
            return $query->get();
        }
        return $query;
    }

    public function getAllPaginated(?string $search, ?int $rowPerPage)
    {
        $query = $this->getAll($search, $rowPerPage, false);
        return $query->paginate($rowPerPage);
    }

    public function getById(
        string $id
    ) {
        $query = Student::where('id', $id);
        return $query->first();
    }

    public function create(array $data)
    {
        DB::beginTransaction();

        try {

            $userRepositories = new UserRepositories();

            $user = $userRepositories->create([
                'name' => $data['name'],
                'username' => $data['username'],
                'password' => $data['password'],
                'role' => $data['role'],
            ]);

            $student = new Student();
            $student->user_id = $user->id;

            if (isset($data['classroom_id'])) {
                $student->classroom_id = $data['classroom_id'];
            }

            $student->birth_date = $data['birth_date'];
            $student->parent_name = $data['parent_name'];
            $student->parent_number = $data['parent_number'];
            $student->address = $data['address'];
            $student->status = $data['status'];

            $student->save();
            DB::commit();
            return $student;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function update(string $id, array $data)
    {
        DB::beginTransaction();

        try {

            $student = Student::find($id);

            if (isset($data['classroom_id'])) {
                $student->classroom_id = $data['classroom_id'];
            }

            $student->birth_date = $data['birth_date'];
            $student->parent_name = $data['parent_name'];
            $student->parent_number = $data['parent_number'];
            $student->address = $data['address'];
            $student->status = $data['status'];
            $student->save();

            $userRepositories = new UserRepositories();

            $userRepositories->update($student->user_id, [
                'name' => $data['name'],
                'username' => $data['username'],
                'password' => isset($data['password']) ? bcrypt($data['password']) : $student->user->password,
                'role' => isset($data['role']) ? $data['role'] : $student->user->role
            ]);

            DB::commit();
            return $student;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }

    public function delete(string $id)
    {
        DB::beginTransaction();

        try {
            $student = Student::find($id);
            $student->delete();

            DB::commit();
            return $student;
        } catch (Exception $e) {
            DB::rollBack();
            throw new Exception($e->getMessage());
        }
    }
}
