<?php

namespace App;

/**
 * Description of Status
 *
 * @author adminnexura
 */
class Status {
    public static $CREATED = 'CREATED';
    public static $APPROVED = 'APPROVED';
    public static $PAYED = 'PAYED';
    public static $REJECTED = 'REJECTED';
    public static $PENDING = 'PENDING';
    
    public static $status = [
        'CREATED' => 'Creado',
        'APPROVED' => 'Aprobado',
        'PAYED' => 'Pagado',
        'REJECTED' => 'Rechazado',
        'PENDING' => 'Pendiente',
    ];
    
    public static $statusEquivalent = [
        'CREATED' => 'CREATED',
        'APPROVED' => 'PAYED',
        'PAYED' => 'PAYED',
        'REJECTED' => 'REJECTED',
        'PENDING' => 'PENDING',
    ];
}
