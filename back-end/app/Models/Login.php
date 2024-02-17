<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Login extends Model
{
    function checkPrimaryKey($email){
        $data = DB::table('users')
            ->where('email', '=', $email)
            ->count();
        return $data;
    }

    function register($email, $name, $password){
         $data =  DB::table('users')->insert([
            'email' => $email,
            'name' => $name,
            'password' => $password,
            'status' => 'Available',
        ]);
        return $data;
    }

    function getLogin($email){
        $data = DB::table('users')
            ->where('email', '=', $email)
            ->where('status', '=', 'Available')
            ->first();
        return $data;
    }
    

    function getSemesterData()
    {
        $data = DB::table('tb_tahun_ajaran AS a')
            ->join('tb_semester AS b', 'b.id_tahun_ajaran', '=', 'a.id_tahun_ajaran')
            ->where('a.status', '!=', 'Dihapus')
            ->where('b.status', '!=', 'Dihapus')
            ->orderby('a.tahun_ajaran', 'desc')
            ->orderby('b.semester', 'desc')
            ->get();
        return $data;
    }

    function comboboxAcademicYear(){
        $data = DB::table('tb_tahun_ajaran')
            ->where('status', '!=', 'Dihapus')
            ->orderby('tahun_ajaran', 'desc')
            ->get();
        return $data;
    }


    function isAvailable($id_tahun_ajaran, $semester)
    {
        $data = DB::table('tb_semester')
            ->where('id_tahun_ajaran', '=', $id_tahun_ajaran)
            ->where('semester', '=', $semester)
            ->where('status', '!=', 'Dihapus')
            ->count();
        return $data;
    }

    function isAvailable2($id_semester,$id_tahun_ajaran, $semester)
    {
        $data = DB::table('tb_semester')
            ->where('id_tahun_ajaran', '=', $id_tahun_ajaran)
            ->where('semester', '=', $semester)
            ->where('id_semester', '!=', $id_semester)
            ->where('status', '!=', 'Dihapus')
            ->count();
        return $data;
    }

   
    function updateSemester($id_semester, $id_tahun_ajaran, $semester)
    {
        $data =  DB::table('tb_semester')
            ->where('id_semester', $id_semester)
            ->update([
                'id_tahun_ajaran' => $id_tahun_ajaran,
                'semester' => $semester
            ]);
        return $data;
    } 
    
    function deleteSemester($id_semester)
    {
        $status='Dihapus';
        $data =  DB::table('tb_semester')
            ->where('id_semester', $id_semester)
            ->update(['status' => $status]);
        return $data;
    }  
}
