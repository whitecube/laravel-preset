<?php

namespace Whitecube\LaravelPreset\Components;

class ScssFile extends File
{
    /**
     * Replace a BEM class' "base".
     */
    public function replaceBemBase(string $original, string $replacement): static
    {
        $this->content = preg_replace('/\.' . $original . '((?:__|--)[a-zA-Z0-0\-\_]+)?/', '.' . $replacement . '$1', $this->content);

        return $this;
    }
}
