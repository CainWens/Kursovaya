<?php

namespace Geekbrains\Cainwens\Repositories;

use Geekbrains\Cainwens\Exeptions\ArgvNotFound;

class SaveArgv
{

    public function get(string $argv)
    {
        if (
            !($argv === "comment" ||
                $argv === "user" ||
                $argv === "post" ||
                $argv === null)
        ) {
            throw new ArgvNotFound("Not a parametr");
        }
    }
}