<?php 

namespace App\Traits;

trait AdminAttributesTrait {
    public function initializeAdminAttributesTrait()
    {
        $this->hidden = [
            'password',
            'created_at',
            'updated_at',
        ];
    }
}
