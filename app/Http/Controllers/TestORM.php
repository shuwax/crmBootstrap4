<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Department_info;
use App\Department_types;
use App\Departments;
use App\UserTypes;
use App\Agencies;
use App\Schedule;
use App\PenaltyBonus;
use App\Work_hour;
use App\Dkj;
use App\Links;
use App\LinkGroups;
use App\PrivilageRelation;
use App\SummaryPayment;
use App\EquipmentTypes;
use App\Equipments;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\MultipleDepartments;

class TestORM extends Controller
{
    public function test() {

      $user = User::find(43);

      return view('testorm')->with('multiple_departments', $user->multiple_departments);

      //dojebac do nawigacji czy użutkownik ma jakies multiple_departments i jak ma pokazac mu mozliwosc wyboru departamentów

    }

}
