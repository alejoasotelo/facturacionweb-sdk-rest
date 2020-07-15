<?php

namespace AlejoASotelo\FacturacionWeb;

class CondicionesVenta
{
    const CONTADO = 0;
    const CUENTA_CORRIENTE = 1;
    const TARJETA_DEBITO = 2;
    const TARJETA_CREDITO = 3;
    const CHEQUE = 4;
    const TICKET = 5;
    const OTRA = 6;
}
