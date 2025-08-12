<?php
if (!function_exists('bc_icon')) {
    function bc_icon(string $name, string $class = ''): string
    {
        $icons = [
            'dashboard' => '<svg viewBox="0 0 24 24" class="'.htmlspecialchars($class, ENT_QUOTES).'"><path d="M3 13h8V3H3v10zm0 8h8v-6H3v6zm10 0h8V11h-8v10zm0-18v6h8V3h-8z"/></svg>',
        ];
        return $icons[$name] ?? '<span class="'.htmlspecialchars($class, ENT_QUOTES).'">■</span>';
    }
}
