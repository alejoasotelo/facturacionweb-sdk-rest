<?php

namespace AlejoASotelo\FacturacionWeb;

class TiposIva{
    const ID_EXENTO = 3;
    const ID_10_5 = 4;
    const ID_21 = 5;
    const ID_27 = 6;
    const ID_5 = 8;
    const ID_2_5 = 9;
    const ID_NO_GRAVADO = 100;

    const VALOR_0 = 0;
    const VALOR_10_5 = 1.105;
    const VALOR_21 = 1.21;
    const VALOR_27 = 1.27;
    const VALOR_5 = 1.05;
    const VALOR_2_5 = 1.025;

    public static function getList() {

        $list = array(
            array('label' => self::VALOR_0.'%', 'value' => self::ID_EXENTO),
            array('label' => ((self::VALOR_2_5 - 1) * 100).'%', 'value' => self::ID_2_5),
            array('label' => ((self::VALOR_5 - 1) * 100).'%', 'value' => self::ID_5),
            array('label' => ((self::VALOR_10_5 - 1) * 100).'%', 'value' => self::ID_10_5),
            array('label' => ((self::VALOR_21 - 1) * 100).'%', 'value' => self::ID_21),
            array('label' => ((self::VALOR_27 - 1) * 100).'%', 'value' => self::ID_27)
        );

        return $list;

    }
}
