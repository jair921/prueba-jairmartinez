<?php

namespace App;

/**
 * Description of Status
 *
 * @author adminnexura
 */
class Status {
    public static $APPROVED = 'APPROVED';
    public static $REJECTED = 'REJECTED';
    public static $PENDING = 'PENDING';
    
    public static $status = [
        'APPROVED' => 'Aprobado',
        'REJECTED' => 'Rechazado',
        'PENDING' => 'Pendiente',
    ];
}
