<?php
    use App\Models\CursoCategoria;
    use App\Models\CursoListado;
    use App\Models\User;

    $users = User::all();
    $listados = CursoListado::all();
    $categorias = CursoCategoria::all();
?>