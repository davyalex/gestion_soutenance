@extends('admin.app')

    @section('title','information etudiant | Gestion soutenance')


    @section('content')

    <iframe src="{{ url('uploads/memoires/'.$etudiant->files_memoire) }}"  width="70%" frameborder="4"> eeeeeeeeeeeee{{ $etudiant->files_memoire }}</iframe>

    @endsection