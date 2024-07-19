<?php

namespace App\Services;

use App\Models\Author;

class AuthorService {

    public function findById(int $id) {
        return Author::findOrFail($id);
    }

    public function findByName(string $name) {
        return Author::where('nombre', $name)->first();
    }

    public function findAllSortedByName() {
        return Author::all()->sortBy('nombre');
    }
}