<?php

namespace Whitecube\LaravelPreset\Components;

class BladeFile extends File
{
    /**
     * Replace a BEM class' "base".
     */
    public function replaceBemBase(string $original, string $replacement): static
    {
        preg_match_all('/class="(.+?)"/', $this->content, $matches);

        $classes = array_unique(array_combine($matches[0], $matches[1]));

        foreach ($classes as $search => $value) {
            $replaced = preg_replace('/' . $original . '((?:__|--)[a-zA-Z0-0\-\_]+)?/', $replacement . '$1', $value);
            $full = str_replace($value, $replaced, $search);

            $this->content = str_replace($search, $full, $this->content);
        }

        return $this;
    }
}
