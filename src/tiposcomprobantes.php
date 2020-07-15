<?php

namespace AlejoASotelo\FacturacionWeb;

class TiposComprobantes
{
    const FACTURA_A = 1;
    const NOTA_DE_DEBITO_A = 2;
    const NOTA_DE_CREDITO_A = 3;
    const RECIBO_A = 4;
    const NOTAS_DE_VENTA_AL_CONTADO_A = 5;
    const FACTURA_B = 6;
    const NOTA_DE_DEBITO_B = 7;
    const NOTA_DE_CREDITO_B = 8;
    const RECIBO_B = 9;
    const NOTAS_DE_VENTA_AL_CONTADO_B = 10;
    const FACTURA_C = 11;
    const NOTA_DE_DEBITO_C = 12;
    const NOTA_DE_CREDITO_C = 13;
    const RECIBO_C = 15;
    const CBTES_A_DEL_ANEXO_I_APARTADO_A_INC_F_RG_NRO_1415 = 34;
    const CBTES_B_DEL_ANEXO_I_APARTADO_A_INC_F_RG_NRO_1415 = 35;
    const OTROS_COMPROBANTES_A_QUE_CUMPLAN_CON_RG_NRO_1415 = 39;
    const OTROS_COMPROBANTES_B_QUE_CUMPLAN_CON_RG_NRO_1415 = 40;
    const COMPROBANTE_DE_COMPRA_DE_BIENES_USADOS_A_CONSUMIDOR_FINAL = 49;
    const FACTURA_M = 51;
    const NOTA_DE_DEBITO_M = 52;
    const NOTA_DE_CREDITO_M = 53;
    const RECIBO_M = 54;
    const CTA_DE_VTA_Y_LIQUIDO_PROD_A = 60;
    const CTA_DE_VTA_Y_LIQUIDO_PROD_B = 61;
    const LIQUIDACION_A = 63;
    const LIQUIDACION_B = 64;

    const FACTURA = 'factura';
    const NOTA_DE_DEBITO = 'nota_de_debito';
    const NOTA_DE_CREDITO = 'nota_de_credito';
    const RECIBO = 'recibo';

    // Devuelve la letra segun el tipo de comprobante.
    public static function getLetraByIdTipo($tipoComprobante)
    {
        switch ($tipoComprobante) {
            case self::FACTURA_A:
            case self::NOTA_DE_DEBITO_A:
            case self::NOTA_DE_CREDITO_A:
            case self::RECIBO_A:
                $_clase = 'A';
                break;

            case self::FACTURA_B:
            case self::NOTA_DE_DEBITO_B:
            case self::NOTA_DE_CREDITO_B:
            case self::RECIBO_B:
                $_clase = 'B';
                break;

            case self::FACTURA_C:
            case self::NOTA_DE_DEBITO_C:
            case self::NOTA_DE_CREDITO_C:
            case self::RECIBO_C:
                $_clase = 'C';
                break;

            default:
                $_clase = '';
                break;
        }

        return $_clase;
    }

    /**
     * Devuelve el tipo de comprobante "nota_de_credito", "nota_de_debito" o "factura"
     * según el tipo de comprobante.
     *
     * @param [int] $id_tipo_comprobante
     *
     * @return [string] "nota_de_credito", "nota_de_debito" o "factura"
     */
    public static function getTextComprobanteByIdTipo($idTipoComprobante)
    {
        switch ($idTipoComprobante) {
            case self::FACTURA_A:
            case self::FACTURA_B:
            case self::FACTURA_C:
                $text = self::FACTURA;
                break;

            case self::NOTA_DE_DEBITO_A:
            case self::NOTA_DE_DEBITO_B:
            case self::NOTA_DE_DEBITO_C:
                $text = self::NOTA_DE_DEBITO;
                break;

            case self::NOTA_DE_CREDITO_A:
            case self::NOTA_DE_CREDITO_C:
            case self::NOTA_DE_CREDITO_B:
                $text = self::NOTA_DE_CREDITO;
                break;

            case self::RECIBO_A:
            case self::RECIBO_C:
            case self::RECIBO_B:
                $text = self::NOTA_DE_CREDITO;
                break;

            default:
                $text = '';
                break;
        }

        return $text;
    }
}
