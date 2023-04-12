<?php

declare(strict_types=1);

namespace App;

class Rover
{
    private string $direction;
    private int $y;
    private int $x;

    public function __construct(int $x, int $y, string $direction)
    {
        $this->direction = $direction;
        $this->y = $y;
        $this->x = $x;
    }

    /**
     * @param string $commandsSequence
     * @return void
     */
    public function receive(string $commandsSequence): void
    {

        $commandsList = str_split($commandsSequence);
        foreach ($commandsList as $command) {
            if ($command === "l" || $command === "r") {
                switch ($command . $this->direction) {
                    case "rN":
                    case "lS":
                        $this->direction = "E";
                        break;
                    case "rS":
                    case "lN":
                        $this->direction = "W";
                        break;
                    case "rW":
                    case "lE":
                        $this->direction = "N";
                        break;
                    case "rE":
                    case "lW":
                        $this->direction = "S";
                        break;
                }
            } else {
                $displacement = $command === "f" ? 1 : -1;

                switch ($this->direction) {
                    case "N":
                        $this->y += $displacement;
                        break;
                    case "S":
                        $this->y -= $displacement;
                        break;
                    case "W":
                        $this->x -= $displacement;
                        break;
                    case "E":
                        $this->x += $displacement;
                        break;
                }
            }
        }


    }
}
