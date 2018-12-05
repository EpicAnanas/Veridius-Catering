<?php

namespace App\Http\Controllers;

use App\bestelling;
use App\Bread;
use App\User;
use Illuminate\Http\Request;

class FileController extends Controller
{
  public function showUploadForm()
  {
      $bestelling = bestelling::all();
      $breads = bread::all();
      $users = User::all();

      return view('admin', compact('bestelling', 'breads', 'users'));
  }
  public function create()
  {
    return view('breadCreate');
  }

  public function storeFile(Request $request)
  {
      if($request->hasFile('file')){
        $request->file->store('/public/upload');
        return 'yes';
      }
      return $request->all();
  }

  public function show(Role $role)
  {
      //
  }

  public function edit(Role $role)
  {
      //
  }

  public function update(Request $request, Role $role)
  {
      //
  }

  public function destroy(Role $role)
  {
      //
  }
}
